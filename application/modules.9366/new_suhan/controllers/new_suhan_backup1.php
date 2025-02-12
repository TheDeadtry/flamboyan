<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class New_suhan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('m_new_suhan');			
	}
	
	function index(){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){
			//user sudah login
				$data['option_group'] = $this->m_new_suhan->getposisiList_group();

				$data['namamodule'] = "new_suhan";
				$data['namafileview'] = "detailsuhan";
				echo Modules::run('template/new_admin_template', $data);
			}
		}
	}

	function show_suhan() {

		$request = '$_POST';
		//$table = 'suhan';

		//$primaryKey = 'nodaftar';

		$columns22 = array(
            0 => 'no_suhan',
            1 => 'datamajikan.nama',
            2 => 'tglterbit',
            3 => 'tglexp',
            4 => 'dataagen.nama'
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

		$bindings = array();
		$limit 		= "";
		$where_dd 	= "";
		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "where ".$where;
		} else {
			$where_dd = "";
		}

		$tampil_data_suhan = $this->m_new_suhan->tampil_data_suhan2($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_suhan);$kjl++) {
        	$fff = $fff.','.$kjl;
		}


        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_suhan as $row) {
	    	if ($row->filesuhan != NULL) {
	    		$filesuhan_data = '<a target="_blank" href="'.base_url().'/assets/doksuhan/'.$row->filesuhan.'">
				                    	<img width="50px" height="50px" src="'.base_url().'assets/doksuhan/'.$row->filesuhan.'"/>
				                    </a>'; 
	    	} else {
	    		$filesuhan_data = 'KOSONG';
	    	}
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapussuhan'.$no.'"><span>Hapus</span></a>
                    <a href="'.site_url('new_suhan/ubahagensuhan/'.$row->id_suhan).'"class="btn btn-mini btn-primary"></i>Edit Agen </a>
                    <a href="'.site_url('new_suhan/update_data_suhan/'.$row->id_suhan).'" class="btn btn-mini btn-primary" type="button">Ubah  Data</a>
                    <a href="'.site_url('new_suhan/tambah_file/'.$row->id_suhan).'" class="btn btn-mini btn-primary" type="button">Tambah File</a>',
                    '<a class="btn btn-mini btn-primary" href="'.site_url('new_suhan/tampilsuhan/'.$row->id_suhan).'" >Tanggal Terima</a>
                    <a class="btn btn-mini btn-primary" onclick="popupcc()" href="'.site_url('new_suhan/tampiltki/'.$row->id_suhan).'">Data TKI</a>',
                    $filesuhan_data,
                    $row->no_suhan,
                    $row->namamajikannya,
                    $row->tglterbit,
                    $row->tglexp,
                    $row->namaagen.
		            '<div class="modal fade" id="hapussuhan'.$no.'" tabindex="-2" role="dialog">
		                <div class="modal-dialog">
		                    <div class="modal-content">
		                        <form class="form-horizontal" method="post" action="'.site_url('new_suhan/hapus_suhan').'">
		                            <div class="modal-header">
		                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
		                                <h4 class="modal-title">Hapus Data SUHAN</h4>
		                            </div>
		                            <div class="modal-body">
		                                <input type="hidden" class="form-control" name="id_suhan" value="'.$row->id_suhan.'">
		                                <p>Apakah anda yakin akan menghapus data SUHAN ini? : '.$row->id_suhan.'</p>
		                            </div>
		                            <div class="modal-footer">
		                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>'
                )
            );
        }

        $resFilterLength 	= $this->m_new_suhan->suhan_count_where($where_dd);
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->m_new_suhan->suhan_count();
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

	function tambah_file($id){
		$data['idnya'] = $id;
		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "uploadfile";
		echo Modules::run('template/new_admin_template', $data);
	}

	function hapus($file, $id){
		$files = glob('assets/doksuhan/'.$file); //get all file names
		foreach($files as $file){
		if(is_file($file))
		unlink($file);
		redirect('new_suhan/tambah_file/'.$id); //delete file
}
	}

    function select_agenlist3(){
    	$idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_new_suhan->getagenlist_group($idgrup);
        $this->load->view('new_suhan/detailgroup3',$data);
    }

    function select_majikanlist(){
        $kodeagen= $this->input->post('kode_agen');
        $data['option_majikan'] = $this->m_new_suhan->ambilmajikan($kodeagen);
        $this->load->view('new_suhan/detailmajikannya',$data);
    }

	function simpan_data_suhan(){
		$this->m_new_suhan->simpan_data_suhan();
		redirect('new_suhan/');
	}
	function ubahagensuhan($id){	
		if($this->input->post('submit')) {
			$this->m_new_suhan->updatesuhan_majikan();
			redirect('new_suhan/');
		}
		$data['idnya'] = $id;
		$data['tampil_data_suhan'] = $this->m_new_suhan->tampil_data_suhandetail($id);
		$data['option_group'] = $this->m_new_suhan->getposisiList_group();

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "ubahagensuhan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function update_data_suhan($id) {
		if($this->input->post('submit')) {
			$this->m_new_suhan->update_data_suhan($id);
			redirect('majikans/suhan');
		}
		//$stts = '2'; 
		//$this->session->set_userdata("status",$stts);
		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_new_suhan->ambil_id_suhan($id);

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "updatesuhan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function update_suhan() {
		$this->m_new_suhan->update_suhan();
		redirect('new_suhan');
	}

	function tampilsuhan($id){	
		$data['idnya'] = $id;

		$data['tampil_datahistory'] = $this->m_new_suhan->tampil_datahistory($id);
		$data['ambidatasuhan'] = $this->m_new_suhan->ambidatasuhan($id);
		$data['ambidatasuhanmajikan'] = $this->m_new_suhan->ambidatasuhanmajikan($id);

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "tampilsuhan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function simpan_history_suhan($id){
		$this->m_new_suhan->simpan_history_suhan($id);
		redirect('new_suhan/tampilsuhan/'.$id);
	}

	function update_history_suhan($id) {
		$this->m_new_suhan->update_history_suhan($id);
		redirect('new_suhan/tampilsuhan/'.$id);
	}

	function hapus_history_suhan($id) {
		$this->m_new_suhan->hapus_history_suhan($id);
		redirect('new_suhan/tampilsuhan/'.$id);
	}

	function tampiltki($id) {	
		$data['idnya'] = $id;

		$data['tampil_datatki'] = $this->m_new_suhan->tampil_datatki($id);
		$data['ambidatasuhan'] = $this->m_new_suhan->ambidatasuhan($id);
		$data['ambidatasuhanmajikan'] = $this->m_new_suhan->ambidatasuhanmajikan($id);

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "tampiltki";
		echo Modules::run('template/new_admin_template', $data);
	}

	function hapus_suhan() {
		$this->m_new_suhan->hapus_suhan();
		redirect('new_suhan/');
	}

	function kontroldata() {
		$data['listmajikan'] = $this->M_session->select("SELECT * FROM datamajikan ORDER BY nama ASC");

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "kontroldata";
		echo Modules::run('template/new_admin_template', $data);
	}
	
	function kontroldata_print() {
		$this->load->library('Pdf');

		$kode = $this->input->post('majikan');
		$query = "SELECT 
			datamajikan.nama,
			dataagen.kode_agen,
			datasuhan.no_suhan, 
			datasuhan.id_suhan, 
			datasuhan.tglterbit, 
			datasuhan.tglexp, 
			datavisapermit.no_visapermit, 
			datavisapermit.id_visapermit, 
			datavisapermit.tglterbitvs,
			datavisapermit.tglexpvs,
			datavisapermit.tglexpext
			FROM datamajikan
			LEFT JOIN dataagen ON datamajikan.kode_agen=dataagen.id_agen
			LEFT JOIN datasuhan ON datamajikan.id_majikan=datasuhan.id_majikan
			LEFT JOIN datavisapermit ON datasuhan.id_suhan=datavisapermit.id_suhan
			WHERE datamajikan.id_majikan=$kode
		";
		$tampil_data_majikan = $this->M_session->select($query);
		$tampildata='';
		$no=1;
		$namamajikan = '';
		foreach($tampil_data_majikan as $row) {	
			$d = "";
			$d5 = "";
			$d6 = "";
			if(trim($row->id_suhan) != "") {
				$d .= " WHERE majikan.kode_suhan=".trim($row->id_suhan);
				$df = $this->M_session->select_row("SELECT tgl_terima FROM suhanhistory WHERE id_suhan=$row->id_suhan ORDER BY tgl_terima DESC");
				$d5 = $df->tgl_terima;
				if(trim($row->id_visapermit) != "") {
					$d .= " AND majikan.kode_visapermit=".trim($row->id_visapermit);
					$dg = $this->M_session->select_row("SELECT tgl_terima FROM visapermithistory WHERE id_visapermit=$row->id_visapermit ORDER BY tgl_terima DESC");
					$d6 = $dg->tgl_terima;
				}
			}

			$d1 = "";
			$d2 = "";
			$d3 = "";
			$d4 = "";
			if ($d != "") {
				$de = $this->M_session->select_row("SELECT
					visa.tempatsuhandok,
					visa.tempatvpdok,
					visa.ketdoksuhan,
					visa.ketdokvp
					FROM majikan
					LEFT JOIN visa ON majikan.id_biodata=visa.id_biodata 
					$d
				");
				$d1 = $de->tempatsuhandok;
				$d2 = $de->tempatvpdok;
				$d3 = $de->ketdoksuhan;
				$d4 = $de->ketdokvp;

				$xdf = $this->M_session->select_row("SELECT ket FROM suhanhistory WHERE id_suhan=$row->id_suhan ORDER BY tgl_terima DESC");
				$xdg = $this->M_session->select_row("SELECT ket FROM visapermithistory WHERE id_visapermit=$row->id_visapermit ORDER BY tgl_terima DESC");
				$xdfk = $xdf->ket;
				$xdgk = $xdg->ket;
				if ($xdfk != "") {
					$d3 = $xdfk;
				}
				if ($xdgk != "") {
					$d4 = $xdgk;
				}
			}

			$tampildata.='<tr nobr="true">
				  <td> '.$row->kode_agen.$row->id_biodata.'</td>
				  <td> '.$d5.'</td>
				  <td> '.$row->no_suhan.'</td>
				  <td> '.$row->tglterbit.'</td>
				  <td> '.$row->tglexp.'</td>
				  <td> '.$d1.'</td>
				  <td> '.$d3.'</td>
				  <td> '.$d6.'</td>
				  <td> '.$row->no_visapermit.'</td>
				  <td> '.$row->tglterbitvs.'</td>
				  <td> '.$row->tglexpvs.'</td>
				  <td> '.$row->tglexpext.'</td>
				  <td> '.$d2.'</td>
				  <td> '.$d4.'</td>
				</tr>';
		  	$namamajikan = $row->nama;
		  	$no++;       
		}
		//print_r($tampildata);
		
		// create new PDF document
		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
		$pdf->SetTitle('IM');
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
		  $pdf->SetMargins(10, 20, 10);
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
		$pdf->SetFont('simsun', '', '8', '', false);   
		$pdf->AddPage(); 
			
		$html = '<p align="center">KONTROL DATA SUHAN & VISAPERMIT MAJIKAN '.$namamajikan.' </p>
			<br>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th align="center" width="6%">KODE</th>
					<th align="center" width="44%">SUHAN</th>
					<th align="center" width="50%">VISAPERMIT</th>
				</tr>
				<tr>
					<th align="center" width="6%">AGEN</th>
					<th align="center" width="6%">TGL TERIMA</th>
					<th align="center" width="6%">NO</th>
					<th align="center" width="6%">TGL TERBIT</th>
					<th align="center" width="6%">TGL EXP</th>
					<th align="center" width="10%">STATUS</th>
					<th align="center" width="10%">KET</th>
					<th align="center" width="6%">TGL TERIMA</th>
					<th align="center" width="6%">NO</th>
					<th align="center" width="6%">TGL TERBIT</th>
					<th align="center" width="6%">TGL EXP</th>
					<th align="center" width="6%">TGL EXP PERP.</th>
					<th align="center" width="10%">STATUS</th>
					<th align="center" width="10%">KET</th>
				</tr>
				'.$tampildata.'
			</table>';
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('example_001.pdf', 'I');    
	  }

	  function listdata() {
		  $data['listmajikan'] = $this->M_session->select("SELECT * FROM datamajikan ORDER BY nama ASC");
  
		  $data['namamodule'] = "new_suhan";
		  $data['namafileview'] = "listdata";
		  echo Modules::run('template/new_admin_template', $data);
	  }
	
	  function listdata_print() {
		  $this->load->library('Pdf');
  
		  $kode = $this->input->post('majikan');
		  $query = "SELECT 
			  datamajikan.nama,
			  dataagen.kode_agen,
			  datasuhan.no_suhan, 
			  datasuhan.id_suhan, 
			  datavisapermit.no_visapermit, 
			  datavisapermit.id_visapermit
			  FROM datamajikan
			  LEFT JOIN dataagen ON datamajikan.kode_agen=dataagen.id_agen
			  LEFT JOIN datasuhan ON datamajikan.id_majikan=datasuhan.id_majikan
			  LEFT JOIN datavisapermit ON datasuhan.id_suhan=datavisapermit.id_suhan
			  WHERE datamajikan.id_majikan=$kode
		  ";
		  $tampil_data_majikan = $this->M_session->select($query);
		  $tampildata='';
		  $no=1;
		  $namamajikan = '';
		  foreach($tampil_data_majikan as $row) {	
			  $d = "";
			  if(trim($row->id_suhan) != "") {
				  $d .= " WHERE majikan.kode_suhan=".trim($row->id_suhan);
				  if(trim($row->id_visapermit) != "") {
					  $d .= " AND majikan.kode_visapermit=".trim($row->id_visapermit);
				  }
			  }
  
			  $d1 = "";
			  $d2 = "";
			  $d3 = "";
			  if ($d != "") {
				  $de = $this->M_session->select_row("SELECT
					  majikan.id_biodata,
					  personal.nama,
					  majikan.tglterbang
					  FROM majikan
					  LEFT JOIN personal ON majikan.id_biodata=personal.id_biodata 
					  $d
				  ");
				  $d1 = $de->id_biodata;
				  $d2 = $de->nama;
				  $d3 = $de->tglterbang;
			  }
  
		  $tampildata.='<tr nobr="true">
					<td> '.$row->kode_agen.'</td>
					<td> '.$row->no_suhan.'</td>
					<td> '.$row->no_visapermit.'</td>
					<td> '.$d1.'</td>
					<td> '.$d2.'</td>
					<td> '.$d3.'</td>
				  </tr>';
			$namamajikan = $row->nama;
			$no++;       
		  }
		  //print_r($tampildata);
		  
		  // create new PDF document
		  $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		  // set document information
		  $pdf->SetCreator(PDF_CREATOR);
		  $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
		  $pdf->SetTitle('IM');
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
			$pdf->SetMargins(10, 20, 10);
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
		  $pdf->SetFont('simsun', '', '10', '', false);   
		  $pdf->AddPage(); 
			  
		  $html = '<p align="center">KONTROL DATA SUHAN & VISAPERMIT MAJIKAN '.$namamajikan.' </p>
			  <br>
			  <table width="100%" cellspacing="0" cellpadding="2" border="1">
				  <tr>
					  <th align="center" width="10%" rowspan="2">KODE AGEN</th>
					  <th align="center" width="10%" rowspan="2">NO SUHAN</th>
					  <th align="center" width="10%" rowspan="2">NO VP</th>
					  <th align="center" width="70%">TKI</th>
				  </tr>
				  <tr>
					  <th align="center" width="10%">KODE</th>
					  <th align="center" width="40%">NAMA</th>
					  <th align="center" width="20%">TGL TERBANG</th>
				  </tr>
				  '.$tampildata.'
			  </table>';
		  $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		  $pdf->Output('example_001.pdf', 'I');    
		}
}