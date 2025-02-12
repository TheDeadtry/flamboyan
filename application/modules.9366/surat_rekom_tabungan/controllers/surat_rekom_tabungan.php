<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_rekom_tabungan extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');		
		$this->load->library('form_validation');	
	}

	function index()
	{
		$data['tampil_data_tki']		= $this->M_session->select("SELECT * FROM personal order by id_biodata asc");
		$data['tampil_data_bank']		= $this->M_session->select("SELECT * FROM databank");

		$data['namamodule'] = "surat_rekom_tabungan";
		$data['namafileview'] = "index";
		echo Modules::run('template/new_admin_template', $data);
	}

	function index_show()
	{
		$columns22 = array(
			'nomor',
            'lampiran',
            'perihal',
            'kepada',
            'nama',
            'tempatlahir',
            'tgllahir',
            'jabatan',
            'alamat'
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

		$where_ori = "";
		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		$where_dd = $where_ori;
		if ($where != NULL) {
			$where_dd = 'where '.$where;
		}

		$idbio = $this->M_session->select("SELECT 
			*
			FROM pembuatan_tabungan JOIN personal ON pembuatan_tabungan.id_tki=personal.id_biodata
        	$where_dd 
        	order by pembuatan_tabungan.id_pembuatan DESC 
        	$limit");

		$i=0;
		$data2 = array(); 
		foreach ( $idbio as $key => $row )
		{
			$i++;
			array_push($data2,
				array(
                    $i,
                    	'<button class="btn btn-xs bg-success sets_ubah" data-id="'.$row->id_pembuatan.'">UBAH</button>'.
                    	'<button class="btn btn-xs bg-danger sets_hapus" data-id="'.$row->id_pembuatan.'">HAPUS</button>',
                    	'<a class="btn btn-xs bg-orange-600" target="_blank" href="'.site_url('surat_rekom_tabungan/printdata/'.$row->id_pembuatan).'">PRINT</a>',
                    $row->id_biodata,
                    $row->nama,
                    $row->tempatlahir.'<br/>'.$row->tgllahir,
                    $row->jabatan,
                    $row->alamat,
                    $row->nomor,
                    $row->lampiran,
                    $row->perihal,
                    $row->kepada
				)
			);

		}

		$recordsFiltered 	= $this->M_session->select_count("pembuatan_tabungan JOIN personal ON pembuatan_tabungan.id_tki=personal.id_biodata
        	$where_dd");

		$recordsTotal 		= $this->M_session->select_count("pembuatan_tabungan JOIN personal ON pembuatan_tabungan.id_tki=personal.id_biodata
        	$where_ori");

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
/*
	function index_show()
	{
		$var = $this->index_data();

		$this->output->set_content_type('application/json')->set_output(json_encode($var));
	}*/

	function index_simpan()
	{
		$data['success'] = FALSE;
		$data['message'] = 'Terjadi Kesalahan';

		$data2 = array (
			'id_tki' 		=> $this->input->post('idbio'),
	        'nomor' 		=> $this->input->post('nomorsurat'),
	        'lampiran' 		=> $this->input->post('lampiran'),
	        'perihal' 		=> $this->input->post('perihal'),
	        'jabatan' 		=> $this->input->post('jabatan'),
	        'kepada' 		=> $this->input->post('kepada'),
		);
		$cek = $this->M_session->insert($data2, "pembuatan_tabungan");

		if ( $cek == TRUE ) 
		{
			$data['success'] = TRUE;
			$data['message'] = 'Sukses';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function index_edit($id)
	{
		$data = $this->M_session->select_custom("pembuatan_tabungan JOIN personal ON pembuatan_tabungan.id_tki=personal.id_biodata WHERE id_pembuatan='".$id."'", "*", "row");

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function index_ubah($id)
	{
		$data['success'] = FALSE;
		$data['message'] = 'Terjadi Kesalahan';
		
		$data2 = array (
			'id_tki' 		=> $this->input->post('idbio'),
	        'nomor' 		=> $this->input->post('nomorsurat'),
	        'lampiran' 		=> $this->input->post('lampiran'),
	        'perihal' 		=> $this->input->post('perihal'),
	        'jabatan' 		=> $this->input->post('jabatan'),
	        'kepada' 		=> $this->input->post('kepada'),
		);
		$cek = $this->M_session->update($data2, "pembuatan_tabungan", $id, 'id_pembuatan');

		if ( $cek == TRUE ) 
		{
			$data['success'] = TRUE;
			$data['message'] = 'Sukses';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function index_hapus()
	{
		$data['success'] = FALSE;
		$data['message'] = 'Terjadi Kesalahan';

		$id = $this->input->post('id');

		$cek = $this->M_session->delete('pembuatan_tabungan', $id, 'id_pembuatan');

		if ( $cek == TRUE ) 
		{
			$data['success'] = TRUE;
			$data['message'] = 'Sukses';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function printdata($id) 
	{
		$bulan_arr = array(
			'1' => 'Januari',
			'Februari','Maret','April','Mei',
			'Juni','Juli','Agustus','September',
			'Oktober','November','Desember'
		);

		$this->load->library('Pdf');

		$data = $this->M_session->select_custom("pembuatan_tabungan JOIN disnaker ON pembuatan_tabungan.id_tki=disnaker.id_biodata WHERE id_pembuatan='".$id."'", "*, pembuatan_tabungan.jabatan as jbt", "row");
		$tanggal 		= date('d-m-Y');
		$tanggal_exp 	= explode("-", $tanggal);

		$tanggalan = str_replace(".","-",$data->tanggallahir);
		$newDate = date("d-m-Y", strtotime($tanggalan));

		$tanggalxyz = $tanggal_exp[0].' '.$bulan_arr[ (int) $tanggal_exp[1] ].' '.$tanggal_exp[2];

	    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);

	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('REKOM IJIN KE DISNAKER & DESA');
	    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
	    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   

	    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	    $pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
	    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 

	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  

	    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 

	    $pdf->SetMargins(3, 4, 10);
	    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

	    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

	    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  

	    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	        require_once(dirname(__FILE__).'/lang/eng.php');
	        $pdf->setLanguageArray($l);
	    }   
	    $pdf->setFontSubsetting(true);   
	    $pdf->SetFont('times', '', '11', '', false);   
		$pdf->AddPage(); 
	    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal')); 
		
   		$html = ' 
   			<br/><br/>
   			<br/><br/>
   			<br/><br/>
   			<br/><br/>
   			<br/>
      		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">Lawang, '.$tanggalxyz.'</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$data->nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="22">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="16">'.$data->lampiran.' <br>'.$data->perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="29">YTH. '.$data->kepada.' <br>Di tempat.</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
			</table>
			<br/>
			<br/>
			<table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6" > </th> 
					<th colspan="32" > Dengan Hormat</th> 
				</tr>		
				<tr>
					<th colspan="8" > </th> 
					<th colspan="34" > Yang bertanda tangan ini, saya : </th> 
				</tr>
				<br/>	
			</table>
			<br/>
			<br/>
			<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Immanuel Darmawan Santoso</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI KEC.LAWANG-MALANG</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="6"></th> 
					<th colspan="32">Dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$data->nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Tempat Tanggal Lahir</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$data->tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.strtoupper($data->jbt).'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$data->alamat.'</th> 
				</tr>
				<br/>
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Pengurusan pembukaan Rekening Tabungan di '.$data->kepada.'</th> 
				</tr>
				<br/>
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >terima kasih.</th> 
				</tr>											
			</table>
			<br/>
			<br/>
			<br/>
			<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<br/>
				<br/>
				<br/>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><b>Direktur Utama</b></th> 
				</tr>						
			</table>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('REKOM PEMBUATAN SKCK.pdf', 'I');    
	}
}