<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Printout extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');
			$this->load->model('m_printout');
			$this->load->library('Pdf');
	}
	
	function index(){
		$id 				= $this->session->userdata("detailuser");
		$nama 				= $this->m_printout->nama($id);
		$tempatlahir		= $this->m_printout->tempatlahir($id);
		$tgllahir			= $this->m_printout->tgllahir($id);
		$alamat 			= $this->m_printout->alamat($id);
		$nama_waris 		= $this->m_printout->nama_waris($id);
		$ttl_waris 			= "-";
		$alamat_waris 		= $this->m_printout->alamat($id);
		$nama_direktur 		= "AGNATIUS ATMADJAJA";
		$jabatan_direktur	= "Direktur Utama PT. FLMABOYAN GEMEJASA";
		$alamat_perusahaan 	= "Jl. TVRI Gang I Oro-Oro Ombo Batu Malang";
		$jabatan_tki		= "Calon Tenaga Kerja Indonesia (CTKI)";
	}
	
	function print_spaw(){
		
		$pdf = new Pdf('P','mm','A4',true,'UTF-8',false);
		$pdf->setTitle('PDF Example');
		$pdf->setHeaderMargin(30);
		$pdf->setTopMargin(20);
		$pdf->setFooterMargin(20);
		$pdf->setAutoPageBreak(true);
		$pdf->setDisplayMode('real','default');
		$pdf->write(5,'CodeIgniter TCPDF Integration');
		$pdf->Output('example.pdf','I');
	}
	
	function sr_ijin() {
		$id 				= $this->session->userdata("detailuser");
		$nama 				= $this->m_printout->nama($id);
		$tempatlahir		= $this->m_printout->tempatlahir($id);
		$tgllahir			= $this->m_printout->tgllahir($id);
		$alamat 			= $this->m_printout->alamat($id);
		$nama_waris 		= $this->m_printout->nama_waris($id);
		$ttl_waris 			= "-";
		$alamat_waris 		= $this->m_printout->alamat($id);
		$nama_direktur 		= "AGNATIUS ATMADJAJA";
		$jabatan_direktur	= "Direktur Utama PT. FLMABOYAN GEMEJASA";
		$alamat_perusahaan 	= "Jl. TVRI Gang I Oro-Oro Ombo Batu Malang";
		$jabatan_tki		= "Calon Tenaga Kerja Indonesia (CTKI)";
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
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
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
    $html = '<h2 align="center">SURAT REKOMENDASI PEMBUATAN IJIN</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
			<tbody>
			<tr>
			<td width="87"></td>
			<td width="20"></td>
			<td colspan="3" width="232">&nbsp;</td>
			<td colspan="2" width="323">Malang, '.date("d F Y").'</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td width="87">Nomor</td>
			<td width="20">:</td>
			<td colspan="3" width="232">&nbsp;</td>
			<td colspan="2" width="323">Kepada</td>
			</tr>
			<tr>
			<td width="87">Lampiran</td>
			<td width="20">:</td>
			<td colspan="3" width="232">&nbsp;</td>
			<td colspan="2" width="323">Yth. Kepala Dinas Tenaga Kerja Malang</td>
			</tr>
			<tr>
			<td width="87">Perihal</td>
			<td width="20">:</td>
			<td colspan="3" width="232"><strong>Surat Rekomendasi Untuk</strong>

			<strong>Pembuatan Ijin</strong></td>
			<td colspan="2" width="323">Di tempat.</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="7" width="662">Dengan hormat,</td>
			</tr>
			<tr>
			<td width="87">&nbsp;</td>
			<td colspan="6" width="575">Yang bertandatangan ini, saya :</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Nama</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$nama_direktur.';</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Jabatan</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$jabatan_direktur.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="3" rowspan="2" width="453">'.$alamat_perusahaan.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">&nbsp;</td>
			</tr>
			<tr>
			<td width="87">&nbsp;</td>
			<td colspan="6" width="575">Dengan ini memberikan rekomendasi kepada :</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Nama</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$nama.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$tempatlahir.', '.$tgllahir.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Jabatan</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$jabatan_tki.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Alamat</td>
			<td width="19">:</td>
			<td colspan="3" rowspan="2" width="453">'.$alamat.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">&nbsp;</td>
			<td width="19">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="7" width="662">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk pengurusan ijin sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan</td>
			</tr>
			<tr>
			<td colspan="7" width="662">Demikian atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" rowspan="3" width="366">&nbsp;</td>
			<td width="296">PT. FLAMBOYAN GEMAJASA</td>
			</tr>
			<tr>
			<td width="296">&nbsp;

			&nbsp;

			&nbsp;</td>
			</tr><br><br><br>
			<tr>
			<td width="296"><strong><u>'.$nama_direktur.'</u></strong>
			<br>
			Direktur Utama</td>
			</tr>
			</tbody>
			</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
	
	function sp_ahli_waris() {
	
	$id 		= $this->session->userdata("detailuser");
	$nama 		= $this->m_printout->nama($id);
	$tempatlahir= $this->m_printout->tempatlahir($id);
	$tgllahir	= $this->m_printout->tgllahir($id);
	$alamat 	= $this->m_printout->alamat($id);
	$nama_waris = $this->m_printout->nama_waris($id);
	$ttl_waris 	= "-";
	$alamat_waris = $this->m_printout->alamat($id);
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
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
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN AHLI WARIS</h2>
			<br>
			<table cellspacing="2" cellpadding="2">
			<tbody>
			<tr>
			<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">'."$nama".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">'."$tempatlahir, $tgllahir".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">'."$alamat".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246"></td>
			</tr>
			<tr>
			<td colspan="5" width="662"></td>
			</tr>
			<tr>
			<td colspan="5" width="662">Menyatakan bahwa selama menjadi tenaga kerja diluar negeri bilamana terjadi kecelakaan atau kematian maka saya melimpahkan/mewariskan kepada :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">'."$nama_waris".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">'."$ttl_waris".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">'."$alamat_waris".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246"></td>
			</tr>
			<tr>
			<td colspan="5" width="662"></td>
			</tr>
			<tr>
			<td colspan="5" width="662">Demikian surat pernyataan ahli waris ini saya buat dengan sebenarnya, tanpa ada paksaan dari pihak manapun dan untuk dipergunakan sebagaimana mestinya.<br><br><br><br><br></td>
			</tr>
			<tr>
			<td colspan="5" width="662"></td>
			</tr>
			<tr>
			<td colspan="4" width="406"></td>
			<td width="255">Malang, '.date("d F Y").'</td>
			</tr>
			<tr>
			<td rowspan="3" width="76"></td>
			<td colspan="3" width="331">Yang Memberi Kuasa</td>
			<td width="255">Yang Diberi Kuasa</td>
			</tr>
			<tr>
			<td colspan="3" width="331"></td>
			<td width="255"></td>
			</tr>
			<tr><br><br><br><br><br>
			<td colspan="3" width="331">'."$nama".'</td>
			<td width="255">'."$nama_waris".'</td>
			</tr>
			</tbody>
			</table>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

    function s_ijin_keluarga() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT IJIN KELUARGA</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
			<tbody>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="4" width="605">Saya yang bertanda tangan di bawah ini :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">No KTP/SIM</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="4" width="605">Memberikan ijin kepada  ...........................................................  saya :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">No Paspor</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="4" width="605">Saya sebagai _____________ memberikan ijin/tidak keberatan ___________ saya</td>
			</tr>
			<tr>
			<td colspan="5" width="662">bekerja ke ______________ sebagai TKI/TKW dan saya bersedia menanggung resiko dan akibatnya.</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="4" width="605">Demikian syarat pernyataan ini saya buat dengan sebenarnya dalam keadaan sadar</td>
			</tr>
			<tr>
			<td colspan="5" width="662">dan tanpa ada unsur paksaan dari pihak manapun dan dapat dipergunakan sebagaimana mestinya.</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="4" width="416">&nbsp;</td>
			<td width="246">Banyuwangi/Malang, tgl-bln-tahun</td>
			</tr>
			<tr>
			<td rowspan="3" width="57">&nbsp;</td>
			<td colspan="3" width="359">Yang diberi pernyataan</td>
			<td width="246">Yang membuat pernyataan,</td>
			</tr>
			<br><br><br><br>
			<tr>
			<td colspan="3" width="359">Nama terang</td>
			<td width="246">Nama terang</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="3" width="359">&nbsp;</td>
			<td width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662" align="center">Mengetahui,</td>
			</tr>
			<tr>
			<td colspan="5" width="662" align="center">Kepala Desa Kelurahan</td>
			</tr>
			<br><br><br><br>
			<tr>
			<td colspan="5" width="662" align="center">Nama Terang</td>
			</tr>
			</tbody>
			</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
	

	 function sp_ket_ahli_waris() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN KETERANGAN AHLI WARIS</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
			<tbody>
			<br>
			<tr>
			<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">&nbsp;</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Status</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Sebagai pihak I(satu) memberikan kuasa kepada :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Status</td>
			<td width="19">&nbsp;</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Hubungan Keluarga</td>
			<td width="19">&nbsp;</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Sebagai pihak ke II (dua) yang selanjutnya diberi kuasa.</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Pihak ke satu akan bekerja ke luar negeri dengan negara tujuan ________________ selama kontrak ______________ tahun melalui PT __________________________</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Apabila selama masa kontrak kerja terjadi kecelakaan/sakit/meninggal dunia, maka untuk selanjutnya segala urusan tentang hak dan kewajiban saya berikan kepada pihak ke II (dua) untuk mengurus, menerima hak dan kewajiban saya sesuai dengan aturan yang berlaku.</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Demikian surat pernyataan keterangan ahli waris ini saya buat dengan sadar tanpa adanya paksaan dari pihak manapun dan di pergunakan sebagaimana mestinya.</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="4" width="416">&nbsp;</td>
			<td width="246">Banyuwangi/Malang, tgl-bln-tahun</td>
			</tr>
			<tr>
			<td rowspan="3" width="57">&nbsp;</td>
			<td colspan="3" width="359">Yang diberi kuasa</td>
			<td width="246">Yang memberi kuasa</td>
			</tr>
			<tr>
			<td colspan="3" width="359">&nbsp;</td>
			<td width="246">&nbsp;

			&nbsp;

			&nbsp;</td>
			</tr>
			<tr>
			<td colspan="3" width="359">Nama terang</td>
			<td width="246">Nama terang</td>
			</tr>
			</tbody>
			</table>
			

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }


     function s_perjanjian() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
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
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 11, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERJANJIAN / PERNYATAAN</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="6" width="662"><strong>SURAT PERJANJIAN / PERNYATAAN</strong></td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Saya yang bertanda tangan di bawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="161">Nama</td>
				<td width="19">:</td>
				<td colspan="3" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">Tanggal Lahir</td>
				<td width="19">&nbsp;</td>
				<td colspan="3" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">No Paspor</td>
				<td width="19">:</td>
				<td colspan="3" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">Status</td>
				<td width="19">&nbsp;</td>
				<td colspan="3" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="3" rowspan="2" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Menyatakan bahwa :</td>
				</tr>
				<tr>
				<td colspan="6" width="662">1.      Saya bersedia bekerja di Taiwan sebagai <strong><em><u>Care Taker</u></em></strong> dengan gaji pokok <strong>NT$</strong> 15840 /bulan. Untuk kontrak kerja selama 3 tahun dengan biaya serta pelaksanaan pengurusan proses Administrasi sampai pemberangkatan dilaksanakan oleh <strong>PT.FLAMBOYAN GEMA JASA  - MALANG</strong>

				2.      Untuk mendapatkan pekerjaan di Taiwan saya mempunyai tanggungan ke bank sebesar <strong>NT$ 45.441</strong> atau <strong>Rp 17.591.050,-</strong> (Tujuh belas juta lima ratus sembilan satu lima puluh rupiah) untuk biaya proses, yang pengembaliannya ditetapkan oleh disnaker Indonesia dan badan Perburuan Taiwan (<strong>NT$ 5.890</strong>/bulannya untuk total 9 bulan periode) diproses melalui pemotongan gaji oleh Bank Taiwan sesuai perjanjian dengan pihak Bank Taiwan.

				3.      Saya bersedia dan sanggup mengikuti pendidikan dan pelatihan yang diadakan oleh <strong>PT.FLAMBOYAN GEMA JASA – MALANG</strong>

				4.      Saya bersedia dan sanggup mengganti biaya proses administrasi dan pelatihan di <strong>PT. FLAMBOYAN GEMA JASA – MALANG</strong> apabila mengundurkan diri atau dikeluarkan dari <strong>PT. FLAMBOYAN GEMA JASA – MALANG</strong> karena melanggar aturan dan ketentuan <strong>PT. FLAMBOYAN GEMA JASA – MALANG</strong> sebagai berikut:</td>
				</tr>
				<tr>
				<td colspan="4" width="331">a.       Setelah medical

				b.      Setelah proses passport

				c.       Setelah proses administrasi

				d.      Setelah mendapat majikan

				e.       Setelah pemberangkatan</td>
				<td colspan="2" width="331">Rp      500.000,-

				Rp   2.500.000,-

				Rp   4.500.000,-

				Rp   7.500.000,-

				Rp 15.000.000,-</td>
				</tr>
				<tr>
				<td colspan="6" width="662">5.      Saya tidak akan menuntut dalam bentuk apapun apabila tidak lulus seleksi yang diadakan oleh PT. FLAMBOYAN GEMA JASA – MALANG dan DISNAKER.

				6.      Apabila tidak dapaat menyelesaikan kontrak kerja selama 3 tahun dikarenakan kesalahan saya, maka saya harus membiayai kepulangan saya sendiri.

				7.      Saya tidak keberatan serta menyetujui dan menunjuk keluarga yang menandatangi surat ijin keluarga dan ikut bertanggungjawab apabila terjadi penyimpangan.

				8.      Saya bersedia dan sanggup mentaati peraturan yang ada di <strong>PT. FLAMBOYAN GEMA JASA – MALANG.</strong>

				9.      Penyataan /perjanjian ini dibuat oleh saya dalam keadaan sadar tanpa adanya paksaan dari pihak manapun juga.</td>
				</tr>
				<tr>
				<td colspan="5" width="340">Banyuwangi/Malang, tgl-bln-tahun</td>
				<td width="321">&nbsp;</td>
				</tr>
				<tr>
				<td rowspan="3" width="19">&nbsp;</td>
				<td colspan="4" width="321">Yang menyatakan/membuat perjanjian</td>
				<td width="321">Sponsor / Saksi</td>
				</tr>
				<tr>
				<td colspan="4" width="321">&nbsp;</td>
				<td width="321">&nbsp;

				&nbsp;

				&nbsp;</td>
				</tr>
				<tr>
				<td colspan="4" width="321">Nama terang</td>
				<td width="321">Nama terang</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }


     function s_kuasa() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT KUASA</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
			<tbody>
			<tr>
			<td colspan="6" width="662"><strong>SURAT KUASA</strong></td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">Saya yang bertanda tangan di bawah ini :</td>
			</tr>
			<tr>
			<td colspan="2" width="180">Nama / No ID</td>
			<td width="19">:</td>
			<td colspan="2" width="265">&nbsp;</td>
			<td width="198">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">Tempat / Tanggal Lahir</td>
			<td width="19">&nbsp;</td>
			<td colspan="2" width="265">&nbsp;</td>
			<td width="198">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">No Passport</td>
			<td width="19">:</td>
			<td colspan="3" width="463">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">Jenis Kelamin</td>
			<td width="19">&nbsp;</td>
			<td colspan="3" width="463">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="3" rowspan="2" width="463">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">Dengan ini memberikan kuasa kepada PT. FLAMBOYAN GEMA JASA untuk menerima claim asuransi.</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">Demikian surat kuasa ini dapat dipergunakan dengan semestinya, atas kerjasamanya kami ucapkan terima kasih.</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="4" width="359">Banyuwangi/Malang, tgl-bln-tahun</td>
			<td colspan="2" width="302">&nbsp;</td>
			</tr>
			<tr>
			<td rowspan="3" width="19">&nbsp;</td>
			<td colspan="3" width="340">Yang memberi kuasa</td>
			<td colspan="2" width="302">Yang diberi kuasa</td>
			</tr>
			<tr>
			<td colspan="3" width="340">&nbsp;</td>
			<td colspan="2" width="302">&nbsp;

			&nbsp;

			&nbsp;</td>
			</tr>
			<tr>
			<td colspan="3" width="340">Nama terang</td>
			<td colspan="2" width="302">Nama terang</td>
			</tr>
			<tr>
			<td width="19">&nbsp;</td>
			<td colspan="3" width="340">&nbsp;</td>
			<td colspan="2" width="302">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="4" rowspan="2" width="359">NAMA KELUARGA BISA DIHUBUNGI &amp; TELP</td>
			<td colspan="2" width="302">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="302">&nbsp;</td>
			</tr>
			</tbody>
			</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }



     function sp_legalitas_dok() {
		$id 				= $this->session->userdata("detailuser");
		$nama 				= $this->m_printout->nama($id);
		$tempatlahir		= $this->m_printout->tempatlahir($id);
		$tgllahir			= $this->m_printout->tgllahir($id);
		$alamat 			= $this->m_printout->alamat($id);
		$jenis_kelamin 		= $this->m_printout->jenis_kelamin($id);
		$nama_direktur 		= "AGNATIUS ATMADJAJA";
		$jabatan_direktur	= "Direktur Utama PT. FLMABOYAN GEMEJASA";
		$alamat_perusahaan 	= "Jl. TVRI Gang I Oro-Oro Ombo Batu Malang";
		$jabatan_tki		= "Calon Tenaga Kerja Indonesia (CTKI)";
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
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
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN LEGALITAS DOKUMEN</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="5" width="662"><strong>SURAT PERNYATAAN LEGALITAS DOKUMEN</strong></td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="180">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="463">'.$nama.'</td>
				</tr>
				<tr>
				<td colspan="2" width="180">Tempat / Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="463">'.$tempatlahir.', '.$tgllahir.'</td>
				</tr>
				<tr>
				<td colspan="2" width="180">Jenis Kelamin</td>
				<td width="19">:</td>
				<td colspan="2" width="463">'.$jenis_kelamin.'</td>
				</tr>
				<tr>
				<td colspan="2" width="180">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="463">'.$alamat.'</td>
				</tr>
				<tr>
				<td colspan="2" width="180">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Dengan ini menyatakan sesungguhnya bahwa dokumen-dokumen yang saya bawa sendiri dari rumah yang terdiri dari :</td>
				</tr>
				<tr>
				<td colspan="5" width="662">
				a.      KTP
				<br>
				b.      Kartu Keluarga (KK)
				<br>
				c.      Ijazah / Akte Lahir/Surat Nikah
				<br>
				d.      Ijin Keluarga</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Adalah <strong>BENAR</strong> dan <strong>DAPAT DI PERTANGGUNGJAWABKAN.</strong></td>
				</tr><br>
				<tr>
				<td colspan="5" width="662">Apabila dokumen-dokumen tersebut ternyata tidak benar/palsu, maka dalam hal ini saya bertanggungjawab atas denda maupun hukum yang berlaku serta tidak akan melibatkan PT. FLAMBYAN GEMAJASA – MALANG.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Dengan ini menyatakan pula bahwa saya BELUM/PERNAH berangkat ke LUAR NEGERI dalam rangka apapun.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Demikian surat pernyataan ini saya buat dengan sebenarnya tanpa ada paksaan dari pihak manapun.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="4" width="359">Malang, '.date("d F Y").'</td>
				<td width="302">&nbsp;</td>
				</tr>
				<tr>
				<td rowspan="3" width="19">&nbsp;</td>
				<td colspan="3" width="340">Yang membuat pernyataan</td>
				<td width="302">Mengetahui sponsor,</td>
				</tr>
				<tr>
				<td colspan="3" width="340">&nbsp;</td>
				<td width="302">&nbsp;

				&nbsp;

				&nbsp;</td>
				</tr><br><br><br>
				<tr>
				<td colspan="3" width="340">'.$nama.'</td>
				<td width="302">Nama terang</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

     function sr_skck() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT REKOMENDASI PEMBUATAN SKCK</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="7" width="662">Malang/Batu/banyuwangi, tanggal-bln-thn</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td width="87">Nomor</td>
				<td width="20">:</td>
				<td colspan="3" width="232">&nbsp;</td>
				<td colspan="2" width="323">Kepada</td>
				</tr>
				<tr>
				<td width="87">Lampiran</td>
				<td width="20">:</td>
				<td colspan="3" width="232">&nbsp;</td>
				<td colspan="2" width="323">Yth.</td>
				</tr>
				<tr>
				<td width="87">Perihal</td>
				<td width="20">:</td>
				<td colspan="3" width="232"><strong>Surat Rekomendasi Untuk</strong>

				<strong>Pembuatan SKCK</strong></td>
				<td colspan="2" width="323">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">Dengan hormat,</td>
				</tr>
				<tr>
				<td width="87">&nbsp;</td>
				<td colspan="6" width="575">Yang bertandatangan ini, saya :</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Nama</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Jabatan</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="3" rowspan="2" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">&nbsp;</td>
				</tr>
				<tr>
				<td width="87">&nbsp;</td>
				<td colspan="6" width="575">Dengan ini memberikan rekomendasi kepada :</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Nama</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Jabatan</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Alamat</td>
				<td width="19">:</td>
				<td colspan="3" rowspan="2" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">&nbsp;</td>
				<td width="19">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan</td>
				</tr>
				<tr>
				<td colspan="7" width="662">Demikian atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" rowspan="3" width="366">&nbsp;</td>
				<td width="296">PT. FLAMBOYAN GEMAJASA</td>
				</tr>
				<tr>
				<td width="296">&nbsp;

				&nbsp;

				&nbsp;</td>
				</tr>
				<tr>
				<td width="296"><strong><u>Agnatius Atmadjaja</u></strong>

				Direktur Utama</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

     function sp_ahli_waris_1() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN KETERANGAN AHLI WARIS</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
				<td width="19">&nbsp;</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Status</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Sebagai pihak I(satu) memberikan kuasa kepada :</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Status</td>
				<td width="19">&nbsp;</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Hubungan Keluarga</td>
				<td width="19">&nbsp;</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Sebagai pihak ke II (dua) yang selanjutnya diberi kuasa.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Pihak ke satu akan bekerja ke luar negeri dengan negara tujuan ________________ selama kontrak ______________ tahun melalui PT __________________________</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Apabila selama masa kontrak kerja terjadi kecelakaan/sakit/meninggal dunia, maka untuk selanjutnya segala urusan tentang hak dan kewajiban saya berikan kepada pihak ke II (dua) untuk mengurus, menerima hak dan kewajiban saya sesuai dengan aturan yang berlaku.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Demikian surat pernyataan keterangan ahli waris ini saya buat dengan sadar tanpa adanya paksaan dari pihak manapun dan di pergunakan sebagaimana mestinya.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="4" width="416">&nbsp;</td>
				<td width="246">Banyuwangi/Malang, tgl-bln-tahun</td>
				</tr>
				<tr>
				<td rowspan="3" width="57">&nbsp;</td>
				<td colspan="3" width="359">Yang diberi kuasa</td>
				<td width="246">Yang memberi kuasa</td>
				</tr>
				<br><br><br>
				<tr>
				<td colspan="3" width="359">Nama terang</td>
				<td width="246">Nama terang</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }


     function sp_ijin_keluarga() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN IJIN KELUARGA</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Pekerjaan</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Selaku  ............................................. dari calon tenaga kerja tersebut dibawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Status</td>
				<td width="19">:</td>
				<td colspan="2" width="397">Belum kawin/kawin/cerai hidup/cerai mati</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Pekerjaan</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Dengan ini menyatakan bahwa saya memberi ijin ikhlas kepada .......................... saya untuk bekerja ke luar negeri dengan negara tujuan .................................., sebagai tenaga kerja Indonesia sesuai perjanjian kontrak kerja yang berlaku, maka saya selaku menyatakan akan bertanggungjawab penuh atas segala resiko serta tuntutan dari pihak manapun juga.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Demikian pernyataan ini saya buat dengan sebanarnya dan dengan penuh rasa tanggungjawab dan disaksikan pejabat pemerintahan setempat untuk dijadikan data ikatan pedoman masing-masing pihak serta dapat digunakan sebagaimana mestinya.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="4" width="416">&nbsp;</td>
				<td width="246">Banyuwangi/Malang, tgl-bln-tahun</td>
				</tr>
				<tr>
				<td rowspan="3" width="47">&nbsp;</td>
				<td colspan="3" width="369">Yang diberi ijin</td>
				<td width="246">Yang memberi ijin</td>
				</tr>
				<br><br><br>
				<tr>
				<td colspan="3" width="369">Nama terang</td>
				<td width="246">Nama terang</td>
				</tr>
				<tr>
				<td width="47">&nbsp;</td>
				<td colspan="3" width="369">&nbsp;</td>
				<td width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662" align="center">Mengetahui,</td>
				</tr>
				<tr>
				<td colspan="5" width="662" align="center">Kepala Desa Kelurahan</td>
				</tr>
				<br><br><br>
				<tr>
				<td colspan="5" width="662" align="center">Nama Terang</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

     function sp_ijin_wali() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN IJIN ORANGTUA/SUAMI/ISTRI/WALI</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="6" width="662">Saya yang bertanda tangan di bawah ini orangtua/suami/isteri/wali :</td>
				</tr>
				<tr>
				<td colspan="2" rowspan="7" width="57">&nbsp;</td>
				<td width="217">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">N.I.K</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Alamat</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Desa/Kelurahan</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Kecamatan</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Kabupaten/Kota</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">No Telp yang bisa dihubungi</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Memberikan izin untuk bekerja ke luar negeri kepada anak/suami/isteri dengan nama sbb:</td>
				</tr>
				<tr>
				<td colspan="2" rowspan="8" width="57">&nbsp;</td>
				<td width="217">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">N.I.K</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Jenis Kelamin</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Alamat</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Desa/Kelurahan</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Kecamatan</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Kabupaten/Kota</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Yang akan ditempatkan melalui PTTKIS .............................................................. dan Agensi ........................................................ ke negara tujuan ......................................... jabatan ................................... dengan mana kontrak kerja selama ............................ tahun dengan gaji perbulan sebesar ............................................</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Demikian surat ini saya buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<br><br>
				<tr>
				<td colspan="5" width="340">&nbsp;</td>
				<td width="321">Banyuwangi/Malang, tgl-bln-tahun</td>
				</tr>
				<tr>
				<td rowspan="3" width="47">&nbsp;</td>
				<td colspan="4" width="293">Yang diberi ijin</td>
				<td width="321">Yang memberi ijin</td>
				</tr>
				<tr>
				<td colspan="4" width="293">&nbsp;</td>
				<td width="321">&nbsp;</td>
				</tr>
				<br><br><br>
				<tr>
				<td colspan="4" width="293">Nama terang</td>
				<td width="321">Nama orangtua/wali/suami/isteri</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

}
