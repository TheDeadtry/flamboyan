<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Spl_cost extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			

		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_admin');
		}		
		if ($id_user && $status!=1){
			redirect('dashboard');
		}
	}
	
	function index() {	
		$data['ambil_nama'] = $this->M_session->select("SELECT * FROM disnaker ORDER BY nama ASC");

		$data['namamodule'] = "spl_cost";
		$data['namafileview'] = "utama";
		echo Modules::run('template/new_admin_template', $data);
	}

	function tampilkandataopsi(){
		$data = $this->db->query("SELECT * FROM disnaker ORDER BY nama ASC")->result();
		$datakirim = "";
		foreach ($data as $key => $ssp) {
			$datakirim .= "<option value='".$ssp->id_biodata."'>".$ssp->id_biodata."-".$ssp->nama."</option>";
		}
		exit($datakirim);
	}

	function utama_show() {
		$columns22 = array(
            'tgl'
		);

		$strr = array();
		$string1 = $_POST['search']['value'];
		for ($i=0;$i<count($columns22);$i++) {
			$strr[] = " lower(".$columns22[$i].") LIKE '%".strtolower($string1)."%'";
		}
		$where = '';
		if ( count( $strr ) ) {
			$where = '('.implode(' OR ', $strr).')';
		}
		if ( $where !== '' ) {
			$where = $where;
		}

		$limit 		= "";
		$where_dd 	= "";
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "where ".$where;
		}

		$tampil_data = $this->M_session->select("SELECT * FROM spl_cost $where_dd order by id desc $limit");

        $data2 	= array();
        $no 	= intval($_POST['start']);

	    foreach ($tampil_data as $row) {
	    	$tki 		= $row->tki;
	    	$tki_exp 	= explode(",", $tki);

		    $disnkbb = "";
	    	if ($tki_exp != NULL) {
	    		foreach ($tki_exp as $key => $value) {
		    		$disnker = $this->M_session->select_row("SELECT * FROM disnaker WHERE id_biodata='$value'");
		    		$disnk 	 = "";
		    		if ($disnker != NULL) {
		    			$disnk = $disnker->id_biodata.' - '.$disnker->nama;
		    		}
		    		$disnkbb .= $disnk.'<br/>';
		    	}
	    	}

			$ambil_nama = $this->M_session->select("SELECT distinct(a.id_tki) as idbio, b.nama FROM pembuatan_ijin a JOIN disnaker b ON a.id_tki=b.id_biodata ORDER BY idbio asc");

			$tampil_peserta = "";

            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a class="btn btn-xs bg-orange" href="'.site_url('spl_cost/print_pdf/'.$row->id).'">PRINT</a> '.
                    '<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button>',
                    $row->tipe,
                    $row->tgl,
                    $disnkbb
                )
            );
        }

        $resFilterLength 	= $this->M_session->select_row("SELECT count(*) as total FROM spl_cost $where_dd");
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->M_session->select_row("SELECT count(*) as total FROM spl_cost");
        $recordsTotal 		= $resTotalLength->total;

        $r = array(
            "draw"            => isset ( $request['draw'] ) ?
                                    intval( $request['draw'] ) :
                                    0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $data2
        );

		$this->output->set_content_type('application/json')->set_output(json_encode($r));
	}

	function print_pdf($id) {
		$get_batch = $this->M_session->select_row("SELECT * FROM spl_cost WHERE id='$id'");
		if ($get_batch != NULL) {
			$nama_list_exp 	= explode(",",$get_batch->tki);
			$tglll 			= $get_batch->tgl;
			$tipe 			= $get_batch->tipe;
		} else {
			exit('error 1');
		}

		if ($tipe == 'PORTRAIT') {
			$posisi = 'P';
		} elseif ($tipe == 'LANDSCAPE') {
			$posisi = 'L';
		} else {
			exit('error 2');
		}

		$dd = array();
		$aksinya = "a.id_biodata";
		$tipe_aksi = "OR";
		$where_dd = 'WHERE ';

		for ($i=0; $i < count($nama_list_exp); $i++) { 
			$dd[] = $aksinya.' = "'.$nama_list_exp[$i].'"';
		}
		
		$totaldd = count($dd)-1;

		for ($y=0; $y < count($dd); $y++) {
			$where_dd .= $dd[$y]." OR ";
			if ($y ==  $totaldd) {
			 	$where_dd .= $dd[$y];
			 } 
		}




		$this->load->library('Pdf');
		$tampil_data_detail = $this->M_session->select('SELECT
				b.nopaspor,
				b.tglterbit as tglterima,
				ADDDATE(b.tglterbit,INTERVAL 5 YEAR) as tgl_berakhir,
				IF(b.id_biodata LIKE "%FI%", "INFORMAL", "FORMAL") AS jabatan,
				a.nama,
				a.jeniskelamin,
				a.tempatlahir,
				a.tanggallahir,
				a.alamat,
				a.negara,
				c.kode_majikan,
				c.kode_agen,
				c.namamajikan,
				d.nama AS nama_majikan1,
				e.nama AS nama_agen,
				IF(c.namamajikan = "0", d.nama, c.namamajikan) AS namamajikannya
            
        FROM
            disnaker a
        LEFT JOIN paspor b ON a.id_biodata = b.id_biodata
        LEFT JOIN majikan c ON a.id_biodata = c.id_biodata
        LEFT JOIN datamajikan d ON c.kode_majikan = d.id_majikan
        LEFT JOIN dataagen e ON c.kode_agen = e.id_agen 
			'.$where_dd.'');

		$BulanIndo 		= array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$originalDate3 	= str_replace('.','-',$tglll);
		$newDate3 		= date("Y-m-d", strtotime($originalDate3));
	    $tahuna 		= substr($newDate3, 0, 4);               
	    $bulana 		= substr($newDate3, 5, 2);
	    $tgla   		= substr($newDate3, 8, 2);
	    $tgna 			= $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;
		
	

		$no = 1;
		$tampildata = '';
		foreach($tampil_data_detail as $row) {

			

			$originalDate4 	= str_replace('.','-',$row->tanggallahir);
			$newDate4 		= date("d-m-Y", strtotime($originalDate4));

			$jeniskelamin 	= $row->jeniskelamin;
			if($jeniskelamin == "女" || $jeniskelamin == "Wanita" || $jeniskelamin == "wanita"){
				$jeniskelamin="Perempuan";
			}
			if($jeniskelamin == "男" || $jeniskelamin == "pria" || $jeniskelamin == "Pria"){
				$jeniskelamin="Laki-Laki";
			}

			$majikan1 = $row->namamajikan;

			if ($majikan1 == 0) {
				$majikannya = 'ook';
			}else{
				$majikannya = 'del';
			}

			$tampildata.='<tr>
					<th colspan="2" >'.$no.'</th>  
					<th colspan="8" >'.$row->nama.'<br>'.$row->tempatlahir.', <br>'.$newDate4.' </th> 
					<th colspan="4" >'.$jeniskelamin.'</th>
					<th colspan="6" >'.$row->nopaspor.'<br>'.$row->tglterima.' s/d '.$row->tgl_berakhir.'</th>
					<th colspan="10" >'.$row->alamat.'</th>
					<th colspan="4" >'.$row->jabatan.'</th>
					<th colspan="6" >'.$row->namamajikannya.'</th>
					<th colspan="6" >'.$row->nama_agen.'</th>
					<th colspan="4" >'.$row->negara.'</th>
				</tr>';

			$no++;
		}

	    // create new PDF document
	    $resolution= array(215.9, 330.2);
	    $pdf = new TCPDF($posisi, PDF_UNIT, $resolution, true, 'UTF-8', false);
	    // set document information
	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('SURAT PENGAJUAN LEGALISASI COST STRUCTURE');
	    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
	    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
	    // set default header data
	    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	    $pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
	    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
	    // set header and footer fonts
	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    // set default monospaced font
	    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
	    // set margins
	    $pdf->SetMargins(5, 10, 5);
	    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
	    // set auto page breaks
	    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
	    // set image scale factor
	    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
	    // set some language-dependent strings (optional)
	    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	        require_once(dirname(__FILE__).'/lang/eng.php');
	    	$pdf->setLanguageArray($l);
	    }   
	    $pdf->setFontSubsetting(true);   
	    $pdf->SetFont('times', '', '8', '', false);   
		$pdf->AddPage(); 
  
		// Set some content to print
	
    	$html = '<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
					<tr>
						<th><b> DAFTAR NOMINATIF CALON TKI UNTUK PENGAJUAN LEGALISASI DAN COST STRUCTURE </b></th>   
					</tr>
					<tr>
						<th><b>PT. FLAMBOYAN GEMAJASA LAWANG</b></th>  
					</tr>				
				</table>
				<br>
				<br>
				<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
					<tr>
						<th colspan="2" > NO</th>  
						<th colspan="8" > NAMA CALON CTKI </th> 
						<th colspan="4" > JENIS KELAMIN</th> 
						<th colspan="6" > NO PASPOR</th>
						<th colspan="10" > ALAMAT CTKI</th>
						<th colspan="4" > JABATAN</th>
						<th colspan="6" > NAMA PENGGUNA</th>
						<th colspan="6" > NAMA AGENCY</th>
						<th colspan="4" > TUJUAN</th>
					</tr>
					'.$tampildata.'
								
				</table>
				<br><br>
				<table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
					<tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" align="center">Malang, '.$tgna.' </th> 
					</tr><tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" > </th> 
						<th colspan="10" >  </th>  
					</tr><tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" > </th> 
						<th colspan="10" >  </th>   
					</tr>
					<tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" > </th> 
						<th colspan="10" >  </th>   
					</tr>
					<tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" > </th> 
						<th colspan="10" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>Direktur Utama </th> 
					</tr>
												
				</table>
				<br>
			';

    	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('SURAT REKOM IJIN TANGGAL '.$tglll.'.pdf', 'I'); 
 
			
    }     

    function add_process() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$nama_list_exp = $this->input->post('select_nama');
		$tglll = $this->input->post('tgl');
		$tipe = $this->input->post('pilih_tipe');
		
		$data260998 = array (
			'tki' 			=> $nama_list_exp,
			'tgl' 			=> $tglll,
			'tipe' 			=> $tipe,
			'date_created' 	=> date('Y-m-d'),
			'date_modified' => date('Y-m-d')
		);

		$inserting = $this->M_session->insert_return_id($data260998, 'spl_cost');
		if ($inserting != NULL) {
			$info['success'] = TRUE;
			$info['message'] = $inserting;
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }           

    function edit_show() {
    	$id = $this->input->post('id');

    	$data = $this->M_session->select_row(" SELECT * FROM spl_cost WHERE id='$id' ");

    	$tki_exp = explode(",", $data->tki);
    	$tki_final = array();
    	foreach ( $tki_exp as $row ) {
    		$tki_final[] = $row;
    	}

    	$data2 = array (
    		'tipe' => $data->tipe,
    		'tgl' => $data->tgl,
    		'tki' => $tki_final
    	);
    
    	$this->output->set_content_type('application/json')->set_output(json_encode( $data2 ));
    }       

    function edit_process($id) {
		$validasi = array(
			array('field'=>'select_nama','label'=>'1','rules'=>'required'),
			array('field'=>'tgl','label'=>'2','rules'=>'required'),
			array('field'=>'pilih_tipe','label'=>'3','rules'=>'required'),
		);
		$this->form_validation->set_rules($validasi);
		if ($this->form_validation->run()===FALSE) {
			$info['success'] = FALSE;
			$info['message'] = validation_errors();
		} else {
			$info['success'] = FALSE;
			$info['message'] = 'Terjadi Kesalahan';

			$query = $this->M_session->select_row("SELECT * FROM spl_cost where id='$id'");

			$data = array (
			    'date_modified' => date("Y-m-d H:i:s"),
			    'table' 		=> 'spl_cost',
			    'datafield' 	=> implode(',.|', array_keys( (array) $query) ),
			    'datavalue' 	=> implode(',.|',(array) $query ),
	            'source_id' 	=> $id
			);

			$cek = $this->M_session->insert($data, "_editrecords");

			if ($cek == TRUE) {

				$namalee 	= $this->input->post('select_nama');
				$tglll 		= $this->input->post('tgl');
				$tipe 		= $this->input->post('pilih_tipe');
				
				$data260998 = array (
					'tki' 			=> $namalee,
					'tgl' 			=> $tglll,
					'tipe' 			=> $tipe,
					'date_modified' => date('Y-m-d')
				);

				$inserting = $this->M_session->update( $data260998, 'spl_cost', $id, 'id' );
				if ($inserting == TRUE) {
					$info['success'] = TRUE;
					$info['message'] = 'Berhasil...';
				}
			}
		}
    
    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }                                    

}