<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_rekom_ijin_batch extends MX_Controller{
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
		$data['ambil_nama'] = $this->M_session->select("SELECT distinct(a.id_tki) as idbio, b.nama FROM pembuatan_ijin a JOIN disnaker b ON a.id_tki=b.id_biodata ORDER BY idbio asc");

		$data['namamodule'] = "surat_rekom_ijin_batch";
		$data['namafileview'] = "utama";
		echo Modules::run('template/new_admin_template', $data);
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

		$tampil_data = $this->M_session->select("SELECT * FROM surat_rekom_ijin_batch $where_dd order by id desc $limit");

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
                    '<a class="btn btn-xs bg-orange" href="'.site_url('surat_rekom_ijin_batch/print_pdf/'.$row->id).'">PRINT</a> '.
                    '<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button>',
                    $row->tipe,
                    $row->tgl,
                    $disnkbb
                )
            );
        }

        $resFilterLength 	= $this->M_session->select_row("SELECT count(*) as total FROM surat_rekom_ijin_batch $where_dd");
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->M_session->select_row("SELECT count(*) as total FROM surat_rekom_ijin_batch");
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
		$get_batch = $this->M_session->select_row("SELECT * FROM surat_rekom_ijin_batch WHERE id='$id'");
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

		$strr = array();
		for ( $i=0; $i<count($nama_list_exp); $i++ ) {
			$strr[] = " lower(id_tki) LIKE '%".strtolower( $nama_list_exp[$i] )."%'";
		}
		$where = '';
		if ( count( $strr ) ) {
			$where = '('.implode(' OR ', $strr).')';
		}
		if ( $where !== '' ) {
			$where = $where;
		}

		$where_dd 	= "";
		if ($where != NULL) {
			$where_dd = "where ".$where;
		}

		$this->load->library('Pdf');
		$tampil_data_detail = $this->M_session->select("SELECT 
			a.tampilkan,
			a.tanggal,
			b.namaayah,
			b.namaibu,
			b.namakontak,
			b.alamatkontak,
			b.alamatortu,
			b.namapasangan,
			b.alamatpasangan,
			b.tanggallahir,
			b.jeniskelamin,
			b.status,
			b.agama,
			b.pendidikan,
			b.nama,
			b.tempatlahir,
			b.alamat,
			b.jabatan,
			b.negara,
			a.daerah

			FROM pembuatan_ijin a 
			LEFT JOIN disnaker b 
			ON a.id_tki=b.id_biodata 
			$where_dd");

		$BulanIndo 		= array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$originalDate3 	= str_replace('.','-',$tglll);
		$newDate3 		= date("Y-m-d", strtotime($originalDate3));
	    $tahuna 		= substr($newDate3, 0, 4);               
	    $bulana 		= substr($newDate3, 5, 2);
	    $tgla   		= substr($newDate3, 8, 2);
	    $tgna 			= $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;
		
		$nmdaerah = '';

		$no = 1;
		$tampildata = '';
		foreach($tampil_data_detail as $row) {

			$statusnya = '';
			$tampilkan = $row->tampilkan;
			if($tampilkan=='Orang Tua') {
				$statusnya = '<th colspan="9"></th>  
							<th colspan="9">'.$row->namaayah.' <br>'.$row->alamatortu.'</th>';
			} elseif($tampilkan=='Ibu') {
				$statusnya = '<th colspan="9"></th>  
							<th colspan="9">'.$row->namaibu.' <br>'.$row->alamatortu.'</th>';
			} elseif($tampilkan=='wali') {
				$statusnya = '<th colspan="9"></th>  
							<th colspan="9">'.$row->namakontak.' <br>'.$row->alamatkontak.'</th>';
			} else {
				$statusnya = '<th colspan="9">'.$row->namapasangan.'<br>'.$row->alamatpasangan.'</th>  
							<th colspan="9"></th>';
			}

			$originalDate4 	= str_replace('.','-',$row->tanggallahir);
			$newDate4 		= date("d-m-Y", strtotime($originalDate4));

			$jeniskelamin 	= $row->jeniskelamin;
			if($jeniskelamin == "女" || $jeniskelamin == "Wanita" || $jeniskelamin == "wanita"){
				$jeniskelamin="Perempuan";
			}
			if($jeniskelamin == "男" || $jeniskelamin == "pria" || $jeniskelamin == "Pria"){
				$jeniskelamin="Laki-Laki";
			}

			$status 		= $row->status;
			$status=str_replace("未婚","",$status);
			$status=str_replace("已婚","",$status);
			$status=str_replace("離婚","",$status);
			$status=str_replace("丈夫去世","",$status);

			$agama 			= $row->agama;
			$agama=str_replace("回教","",$agama);
			$agama=str_replace("基督教","",$agama);
			$agama=str_replace("天主教","",$agama);
			$agama=str_replace("印度教","",$agama);
			$agama=str_replace("佛教","",$agama);

			$pendidikan 	= $row->pendidikan;
			$datapen = $this->M_session->select("SELECT * FROM datapendidikan");
			foreach ($datapen as $row2) {
				$pendidikan = str_replace($row2->mandarin,"",$pendidikan);
			}

			$tampildata.='<tr>
					<th colspan="2" >'.$no.'</th>  
					<th colspan="8" ></th> 
					<th colspan="8" >'.$row->nama.'<br>'.$row->tempatlahir.', <br>'.$newDate4.' </th> 
					<th colspan="4" >'.$jeniskelamin.'</th>
					<th colspan="4" >'.$status.'</th>
					<th colspan="7" >'.$row->alamat.'</th>
					<th colspan="5" >'.$agama.'</th>
					<th colspan="5" >'.$pendidikan.'</th>
					<th colspan="5" >'.$row->jabatan.'</th>  
					'.$statusnya.'
					<th colspan="5" >'.$row->negara.'</th>  
				</tr>';

			$nmdaerah = $row->daerah;
			$no++;
		}

	    // create new PDF document
	    $pdf = new TCPDF($posisi, PDF_UNIT, 'F4', true, 'UTF-8', false);
	    // set document information
	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('SURAT REKOM IJIN BATCH');
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
						<th><b> DAFTAR NOMINASI CALON TKI YANG DINYATAKAN LULUS SELEKSI UNTUK PASPOR DARI </b></th>   
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
						<th colspan="8" > FOTO </th> 
						<th colspan="8" > NAMA CALON CTKI</th> 
						<th colspan="4" > JENIS KELAMIN</th>
						<th colspan="4" > STATUS</th>
						<th colspan="7" > ALAMAT CTKI</th>
						<th colspan="5" > AGAMA</th>
						<th colspan="5" > PEND AKHIR</th>
						<th colspan="5" > JABATAN</th>  
						<th colspan="9" > NAMA & ALAMAT SUAMI/ISTRI CTKI</th>  
						<th colspan="9" > NAMA & ALAMAT ORANG TUA/WALI CTKI</th>  
						<th colspan="5" > TUJUAN</th>  
					</tr>
					'.$tampildata.'
								
				</table>
				<br><br>
				<table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
					<tr>
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="16" align="center">'.$nmdaerah.', '.$tgna.' </th> 
						<th colspan="8" >  </th>  
					</tr><tr>
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" > </th> 
						<th colspan="8" >  </th>  
					</tr><tr>
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th>  
					</tr>
					<tr>
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th>  
					</tr>
					<tr>
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="16" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
										Direktur Utama </th> 
						<th colspan="8" >  </th>  
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

		$inserting = $this->M_session->insert_return_id($data260998, 'surat_rekom_ijin_batch');
		if ($inserting != NULL) {
			$info['success'] = TRUE;
			$info['message'] = $inserting;
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }           

    function edit_show() {
    	$id = $this->input->post('id');

    	$data = $this->M_session->select_row(" SELECT * FROM surat_rekom_ijin_batch WHERE id='$id' ");

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

			$query = $this->M_session->select_row("SELECT * FROM surat_rekom_ijin_batch where id='$id'");

			$data = array (
			    'date_modified' => date("Y-m-d H:i:s"),
			    'table' 		=> 'surat_rekom_ijin_batch',
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

				$inserting = $this->M_session->update( $data260998, 'surat_rekom_ijin_batch', $id, 'id' );
				if ($inserting == TRUE) {
					$info['success'] = TRUE;
					$info['message'] = 'Berhasil...';
				}
			}
		}
    
    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }                                    

}