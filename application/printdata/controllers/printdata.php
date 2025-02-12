<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class printdata extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_printdata');
			$this->load->library('Pdf');
	}
	
	

      function cetak1($id_pernyataan) {
      	$nama 				= $this->m_printdata->tampilnamatki1($id_pernyataan);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir1($id_pernyataan);
		$tgllahir 			= $this->m_printdata->tampiltgllahir1($id_pernyataan);
		$alamat 			= $this->m_printdata->tampilalamat1($id_pernyataan);
		$nama_bapak 		= $this->m_printdata->tampilnama_bapak1($id_pernyataan);
		$tempat 			= $this->m_printdata->tampiltempat1($id_pernyataan);
		$tgl 				= $this->m_printdata->tampiltgl1($id_pernyataan);
		$alamat2 			= $this->m_printdata->tampilalamat21($id_pernyataan);
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT PERNYATAAN AHLI WARIS (Banyuwangi)');
    $pdf->SetSubject('SURAT PERNYATAAN AHLI WARIS BANYUWANGI');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('times', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table width="100%" cellspacing="3" cellpadding="2">
					<tr>	
						<td><h3 align="center"><u>SURAT PERNYATAAN AHLI WARIS</u></h3></td>
					</tr>
					<br>
					<br>
					<br>
					<tr>
						<td width="40%">Saya yang bertanda tangan di bawah ini :</td>
					</tr>
					<tr>
						<td width="25%">Nama</td>
						<td width="2%">:</td>
						<td width="20%">'.$nama.'</td>
					</tr>
					<tr>
						<td width="25%">Tempat/Tanggal Lahir</td>
						<td width="2%">:</td>
						<td width="30%">'.$tempatlahir.' / '.$tgllahir.'</td>
					</tr>
					<tr>
						<td width="25%">Alamat</td>
						<td width="2%">:</td>
						<td width="20%">'.$alamat.'</td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="100%" align="justify">Menyatakan bahwa selama menjadi tenaga kerja diluar negeri bilamana terjadi kecelakaan atau kematian maka saya melimpahkan/mewariskan kepada :</td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="25%">Nama</td>
						<td width="2%">:</td>
						<td width="20%">'.$nama_bapak.'</td>
					</tr>
					<tr>
						<td width="25%">Tempat/Tanggal Lahir</td>
						<td width="2%">:</td>
						<td width="30%">'.$tempat.' / '.$tgl.'</td>
					</tr>
					<tr>
						<td width="25%">Alamat</td>
						<td width="2%">:</td>
						<td width="20%">'.$alamat2.'</td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="100%" align="justify">Demikian surat pernyataan ahli waris ini saya buat dengan sebenarnya, tanpa ada paksaan dari pihak manapun dan untuk dipergunakan sebagaimana mestinya.</td>
					</tr>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
			 	<tr>
					<td width="73%"></td>
					<td width="25%">Bayuwangi</td>
				</tr>
			 	<tr>
					<td width="10%"></td>
					<td width="30%">Yang Memberi Kuasa</td>
					<td width="32%"></td>
					<td width="25%">Yang diberi kuasa</td>
				</tr>
					<br>
					<br>
					<br>
					<br>
			 	<tr>
					<td width="8%"></td>
					<td width="30%">(..........................................)</td>
					<td width="30%"></td>
					<td width="25%">(..........................................)</td>
				</tr>
			</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT PERNYATAAN AHLI WARIS (Banyuwangi).pdf', 'I');    
    }
	
	
	
	function cetak2($id_pembuatan) {
		$nomor 				= $this->m_printdata->tampilnomor2($id_pembuatan);
		$lampiran 			= $this->m_printdata->tampillampiran2($id_pembuatan);
		$perihal 			= $this->m_printdata->tampilperihal2($id_pembuatan);
		$kepada 			= $this->m_printdata->tampilkepada2($id_pembuatan);
		$nama 				= $this->m_printdata->tampilnamatki2($id_pembuatan);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir2($id_pembuatan);
		$tgllahir 			= $this->m_printdata->tampiltgllahir2($id_pembuatan);
		$jabatan 			= $this->m_printdata->tampiljabatan2($id_pembuatan);
		$alamat 			= $this->m_printdata->tampilalamat2($id_pembuatan);
		$tanggal 			=date('d-m-Y');

		$originalDate = $tgllahir;
$newDate = date("d-m-Y", strtotime($originalDate));

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('REKOM IJIN KE DISNAKER & DESA');
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
     $pdf->SetMargins(3, 4, 10);
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
    $pdf->SetFont('times', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = ' <br><br><br><br><br><br><br><br>
    <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="16">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="25">YTH.'.$kepada.' <br>Di tempat.</th> 
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
											
			 </table><br><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" > Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br>
								
			 </table>
			 <br><br>
			  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">IMMANUEL DARMAWAN SANTOSO</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Direktur Utama PT.FLAMBOYAN GEMAJASA LAWANG</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI LAWANG-MALANG</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6"></th> 
					<th colspan="32">dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Tempat Tanggal Lahir</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$jabatan.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$alamat.'</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk Pengurusan Ijin sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan. </th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</th> 
				</tr>
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>											
			 </table>
			 <br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24">        PT.FLAMBOYAN GEMAJASA LAWANG</th> 
				</tr><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24">             <u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="15"></th> 
				<th colspan="24"><b>Direktur Utama</b></th> 
					</tr>						
			 </table><br><br>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('REKOM IJIN KE DISNAKER & DESA.pdf', 'I');    
    }

    function cetak_rekom_desa($id_pembuatan) {
		$nomor 				= $this->m_printdata->tampilnomordesa($id_pembuatan);
		$lampiran 			= $this->m_printdata->tampillampirandesa($id_pembuatan);
		$perihal 			= $this->m_printdata->tampilperihaldesa($id_pembuatan);
		$kepada 			= $this->m_printdata->tampilkepadadesa($id_pembuatan);
		$nama 				= $this->m_printdata->tampilnamatkidesa($id_pembuatan);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahirdesa($id_pembuatan);
		$tgllahir 			= $this->m_printdata->tampiltgllahirdesa($id_pembuatan);
		$jabatan 			= $this->m_printdata->tampiljabatandesa($id_pembuatan);
		$alamat 			= $this->m_printdata->tampilalamatdesa($id_pembuatan);
		$tanggal 			=date('d-m-Y');

		$originalDate = $tgllahir;
$newDate = date("d-m-Y", strtotime($originalDate));

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'f4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('REKOM IJIN KE DISNAKER & DESA');
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
     $pdf->SetMargins(3, 4, 10);
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
    $pdf->SetFont('times', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = ' <br><br><br><br><br><br><br><br>
    <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="16">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="25">YTH.'.$kepada.' <br>Di tempat.</th> 
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
											
			 </table><br><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" > Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br>
								
			 </table>
			 <br><br>
			  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">IMMANUEL DARMAWAN SANTOSO</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Direktur Utama PT.FLAMBOYAN GEMAJASA LAWANG</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI LAWANG-MALANG</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6"></th> 
					<th colspan="32">dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Tempat Tanggal Lahir</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$jabatan.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$alamat.'</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk Pengurusan Ijin sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan. </th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</th> 
				</tr>
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>											
			 </table>
			 <br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24">        PT.FLAMBOYAN GEMAJASA LAWANG</th> 
				</tr><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24">             <u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="15"></th> 
				<th colspan="24"><b>Direktur Utama</b></th> 
					</tr>						
			 </table><br><br>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('REKOM IJIN KE DISNAKER & DESA.pdf', 'I');    
    }
	
	
	function cetak31($id_perjanjian) {
      	$nama 				= $this->m_printdata->tampilnamatki3($id_perjanjian);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir3($id_perjanjian);
		$tgllahir 			= $this->m_printdata->tampiltgllahir3($id_perjanjian);
		$nopass				= $this->m_printdata->tampilnopass3($id_perjanjian);
		$jeniskelamin		= $this->m_printdata->tampiljeniskelamin3($id_perjanjian);
		$alamat 			= $this->m_printdata->tampilalamat3($id_perjanjian);
		$tanggal 			=date('d-m-Y');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT NOTARISAN KELUARGA ( INFORMAL )');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('sim', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" style="font-size:20px;">
				<tr>
					<td><b>SURAT PERJANJIAN / PERNYATAAN</b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="20">Yang bertanda tangan di bawah ini: </td>
				</tr>
			 </table>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="4%"></th><th width="20%">Nama  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$nama.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Tanggal lahir  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$tgllahir.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">NO. Paspor  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$nopass.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Jenis Kelamin  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$jeniskelamin.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Alamat  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="88%"> '.$alamat.'</th>
				</tr>
			 </table>
			 <br><br>
			 <table>
			 	<tr>
					<td colspan="20">Menyatakan bahwa :</td>
				</tr>
			 </table>	
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
				<th align="center" colspan="4" >1. </th>
					<th align="justify" colspan="80" >Saya bersedia bekerja di Taiwan sebagai <b><u><i>WORKER</b></u></i> dengan gaji pokok <b>NT$ 19.047</b> /bulan.
Untuk kontrak kerja selama 3 tahun dengan biaya serta pelaksanaan pengurusan proses
Administrasi sampai pemberangkatan dilaksanakan oleh 
						Administrasi sampai pemberangkatan dilaksanakan oleh 
						 <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >2. </th>
					<th align="justify" colspan="80" >Untuk mendapatkan pekerjaan di Taiwan saya mempunyai tanggungan ke Bank sebesar 
<b>NT$ 62.780</b> atau <b>Rp 18.406.295,-</b> (Delapan Belas Juta Empat Ratus Enam Ribu Dua Ratus Sembilan Puluh Lima Rupiah) untuk biaya proses, yang pengembaliannya ditetapkan oleh disnaker Indonesia dan Badan Perburuan Taiwan (<b>NT$ 5.886</b>/bulannya untuk total <b>10</b> bulan periode) diproses melalui pemotongan gaji oleh Bank Taiwan sesuai perjanjian dengan pihak Bank Taiwan.


					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >3. </th>
					<th align="justify" colspan="80" >3.	Saya bersedia dan sanggup mengikuti pendidikan dan pelatihan yang diadakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >4. </th>
					<th align="justify" colspan="80" >Saya bersedia dan sanggup mengganti biaya proses administrasi dan pelatihan di <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b> apabila mengundurkan diri atau dikeluarkan dari <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b> karena melanggar aturan dan ketentuan<b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>, sebagai berikut :
					</th>
				</tr>
				<br>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >a.</th>
					<th colspan="25" >Setelah medical</th>
					<th colspan="60" >Rp 500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >b.</th>
					<th colspan="25" >Setelah proses passport		</th>
					<th colspan="60" >Rp 2.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >c.</th>
					<th colspan="25" >Setelah proses administrasi		</th>
					<th colspan="60" >Rp 4.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >d.</th>
					<th colspan="25" >Setelah mendapatkan majikan		</th>
					<th colspan="60" >Rp 7.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >e.</th>
					<th colspan="25" >Setelah pemberangkatan		</th>
					<th colspan="60" >Rp 15.000.000,-</th>
				</tr>
				<br>
			 	<tr>
				<th align="center" colspan="4" >5. </th>
					<th align="justify" colspan="80" >Saya tidak akan menuntut dalam bentuk apapun apabila tidak lulus seleksi yang diadakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b> dan <b>DISNAKER</b>.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >6. </th>
					<th align="justify" colspan="80">6.	Apabila tidak dapat menyelesaikan kontrak kerja selama 3 tahun dikarenakan kesalahan saya, maka saya dan keluarga harus mengganti semua biaya, dan bila sampai terlibat kasus narkoba tidak akan melibatkan  <b>PT. FLAMBOYAN GEMAJASA – LAWANG</b>.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >7. </th>
					<th align="justify" colspan="80">Saya tidak keberatan serta menyetujui dan menunjuk keluarga yang menandatangani surat ijin keluarga dan ikut bertanggung jawab apabila terjadi penyimpangan.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >8. </th>
					<th align="justify" colspan="80">Saya bersedia dan sanggup mentaati peraturan yang ada di<b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b></th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >9. </th>
					<th align="justify" colspan="80">Saya bersedia dan sanggup mentaati peraturan yang ada di <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b></th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >10. </th>
					<th align="justify" colspan="80">Pernyataan / perjanjian ini dibuat oleh saya dalam keadaan sadar tanpa adanya paksaan dari pihak manapun juga.</th>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="6"></td>

					<td colspan="40">Lawang, '.$tanggal.'</td>
				</tr>
			 	<tr>
					<td colspan="6"></td>
					<td colspan="15">Yang menyatakan / membuat perjanjian,</td>
					<td colspan="12"></td>
					<td colspan="15">Sponsor / Saksi,</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="6"></td>
					<td colspan="15">(.........................)</td>
					<td colspan="10"></td>
					<td colspan="15">(.........................)</td>
				</tr>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT NOTARISAN KELUARGA ( INFORMAL ).pdf', 'I');    
    }
	
	
	function cetak32($id_perjanjian) {
      	$nama 				= $this->m_printdata->tampilnamatki3($id_perjanjian);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir3($id_perjanjian);
		$tgllahir 			= $this->m_printdata->tampiltgllahir3($id_perjanjian);
		$nopass				= $this->m_printdata->tampilnopass3($id_perjanjian);
		$jeniskelamin		= $this->m_printdata->tampiljeniskelamin3($id_perjanjian);
		$alamat 			= $this->m_printdata->tampilalamat3($id_perjanjian);
		$tanggal 			= date('d-m-Y');
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT NOTARISAN KELUARGA ( INFORMAL )');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('sim', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" style="font-size:20px;">
				<tr>
					<td><b>SURAT PERJANJIAN / PERNYATAAN</b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="20">Yang bertanda tangan di bawah ini: </td>
				</tr>
			 </table>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="4%"></th>
					<th width="20%">Nama  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$nama.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Tanggal lahir  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$tgllahir.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">NO. Paspor  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$nopass.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Jenis Kelamin  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$jeniskelamin.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Alamat  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="88%"> '.$alamat.'</th>
				</tr>
			 </table>
			 <br><br>
			 <table>
			 	<tr>
					<td colspan="20">Menyatakan bahwa :</td>
				</tr>
			 </table>	
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
				<th align="center" colspan="4" >1. </th>
					<th align="justify" colspan="80" >Saya bersedia bekerja di Taiwan sebagai <b><u><i>Care Taker</b></u></i> dengan gaji pokok <b>NT$ 15840</b> /bulan.
Untuk kontrak kerja selama 3 tahun dengan biaya serta pelaksanaan pengurusan proses
Administrasi sampai pemberangkatan dilaksanakan oleh 
						Administrasi sampai pemberangkatan dilaksanakan oleh 
						 <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >2. </th>
					<th align="justify" colspan="80" >Untuk mendapatkan pekerjaan di Taiwan saya mempunyai tanggungan ke Bank sebesar 
<b>NT$ 45.441</b> atau <b>Rp 17.591.050,-</b> (Tujuh Belas Juta Lima Ratus Sembilan Puluh Satu Lima Puluh Rupiah) untuk biaya proses, yang pengembaliannya ditetapkan oleh disnaker Indonesia dan Badan Perburuan Taiwan (<b>NT$ 5.890</b>/bulannya untuk total 9 bulan periode) diproses melalui pemotongan gaji oleh Bank Taiwan sesuai perjanjian dengan pihak Bank Taiwan.


					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >3. </th>
					<th align="justify" colspan="80" >3.	Saya bersedia dan sanggup mengikuti pendidikan dan pelatihan yang diadakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >4. </th>
					<th align="justify" colspan="80" >Saya bersedia dan sanggup mengganti biaya proses administrasi dan pelatihan di <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b> apabila mengundurkan diri atau dikeluarkan dari <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b> karena melanggar aturan dan ketentuan<b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>, sebagai berikut :
					</th>
				</tr>
				<br>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >a.</th>
					<th colspan="25" >Setelah medical</th>
					<th colspan="60" >Rp 500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >b.</th>
					<th colspan="25" >Setelah proses passport		</th>
					<th colspan="60" >Rp 2.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >c.</th>
					<th colspan="25" >Setelah proses administrasi		</th>
					<th colspan="60" >Rp 4.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >d.</th>
					<th colspan="25" >Setelah mendapatkan majikan		</th>
					<th colspan="60" >Rp 7.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >e.</th>
					<th colspan="25" >Setelah pemberangkatan		</th>
					<th colspan="60" >Rp 15.000.000,-</th>
				</tr>
				<br>
			 	<tr>
				<th align="center" colspan="4" >5. </th>
					<th align="justify" colspan="80" >Saya tidak akan menuntut dalam bentuk apapun apabila tidak lulus seleksi yang diadakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b> dan <b>DISNAKER</b>.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >6. </th>
					<th align="justify" colspan="80">6.	Apabila tidak dapat menyelesaikan kontrak kerja selama 3 tahun dikarenakan kesalahan saya, maka saya harus membiayai kepulangan saya sendiri.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >7. </th>
					<th align="justify" colspan="80">Saya tidak keberatan serta menyetujui dan menunjuk keluarga yang menandatangani surat ijin keluarga dan ikut bertanggung jawab apabila terjadi penyimpangan.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >8. </th>
					<th align="justify" colspan="80">Saya bersedia dan sanggup mentaati peraturan yang ada di<b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b></th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >9. </th>
					<th align="justify" colspan="80">Saya bersedia dan sanggup mentaati peraturan yang ada di <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b></th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >10. </th>
					<th align="justify" colspan="80">Pernyataan / perjanjian ini dibuat oleh saya dalam keadaan sadar tanpa adanya paksaan dari pihak manapun juga.</th>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="6"></td>

					<td colspan="40">Lawang, '.$tanggal.'</td>
				</tr>
			 	<tr>
					<td colspan="6"></td>
					<td colspan="15">Yang menyatakan / membuat perjanjian,</td>
					<td colspan="12"></td>
					<td colspan="15">Sponsor / Saksi,</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="6"></td>
					<td colspan="15">(.........................)</td>
					<td colspan="10"></td>
					<td colspan="15">(.........................)</td>
				</tr>
				<br>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT NOTARISAN KELUARGA ( INFORMAL ).pdf', 'I');    
    }
	
	
	
	
	function cetak33($id_perjanjian) {
      	$nama 				= $this->m_printdata->tampilnamatki3($id_perjanjian);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir3($id_perjanjian);
		$tgllahir 			= $this->m_printdata->tampiltgllahir3($id_perjanjian);
		$nopass				= $this->m_printdata->tampilnopass3($id_perjanjian);
		$jeniskelamin		= $this->m_printdata->tampiljeniskelamin3($id_perjanjian);
		$alamat 			= $this->m_printdata->tampilalamat3($id_perjanjian);
		$tanggal 			=date('d-m-Y');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT NOTARISAN KELUARGA ( INFORMAL )');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('sim', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" style="font-size:20px;">
				<tr>
					<td><b>SURAT PERJANJIAN / PERNYATAAN</b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="20">Yang bertanda tangan di bawah ini: </td>
				</tr>
			 </table>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="4%"></th>
					<th width="20%">Nama  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$nama.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Tanggal lahir  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$tgllahir.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">NO. Paspor  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$nopass.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Jenis Kelamin  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$jeniskelamin.'</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Alamat  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="88%"> '.$alamat.'</th>
				</tr>
			 </table>
			 <br><br>
			 <table>
			 	<tr>
					<td colspan="20">Menyatakan bahwa :</td>
				</tr>
			 </table>	
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
				<th align="center" colspan="4" >1. </th>
					<th align="justify" colspan="80" >Saya bersedia bekerja di Taiwan sebagai <i><b><u>NURSE</b></u></i> dengan gaji pokok <b>NT$ 20.008</b> /bulan.
						Untuk kontrak kerja selama 3 tahun dengan biaya serta pelaksanaan pengurusan proses
							Administrasi sampai pemberangkatan dilaksanakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >2. </th>
					<th align="justify" colspan="80" >Untuk mendapatkan pekerjaan di Taiwan saya mempunyai tanggungan ke Bank sebesar 
							<b>NT$ 47.361</b> atau <b>Rp 17.760.400,-</b> (Tujuh Belas Juta Tujuh Ratus Enam Puluh Empat Ratus Rupiah) untuk biaya proses, yang pengembaliannya ditetapkan oleh disnaker Indonesia dan Badan Perburuan Taiwan (<b>NT$ 5.932</b> / bulannya untuk total <b>10</b> bulan periode) diproses melalui pemotongan gaji oleh Bank Taiwan sesuai perjanjian dengan pihak Bank Taiwan.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >3. </th>
					<th align="justify" colspan="80" >Saya bersedia dan sanggup mengikuti pendidikan dan pelatihan yang diadakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >4. </th>
					<th align="justify" colspan="80" >Saya bersedia dan sanggup mengganti biaya proses administrasi dan pelatihan di <b>PT. FLAMBOYAN GEMAJASA – LAWANG</b> apabila mengundurkan diri atau dikeluarkan dari <b>PT. FLAMBOYAN GEMAJASA – LAWANG</b> karena melanggar aturan dan ketentuan <b>PT. FLAMBOYAN GEMAJASA – LAWANG,</b> sebagai berikut :
					</th>
				</tr>
				<br>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >a.</th>
					<th colspan="25" >Setelah medical</th>
					<th colspan="60" >Rp 500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >b.</th>
					<th colspan="25" >Setelah proses passport		</th>
					<th colspan="60" >Rp 2.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >c.</th>
					<th colspan="25" >Setelah proses administrasi		</th>
					<th colspan="60" >Rp 4.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >d.</th>
					<th colspan="25" >Setelah mendapatkan majikan		</th>
					<th colspan="60" >Rp 7.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >e.</th>
					<th colspan="25" >Setelah pemberangkatan		</th>
					<th colspan="60" >Rp 15.000.000,-</th>
				</tr>
				<br>
			 	<tr>
				<th align="center" colspan="4" >5. </th>
					<th colspan="80" >Saya tidak akan menuntut dalam bentuk apapun apabila tidak lulus seleksi yang diadakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG</b> dan <b>DISNAKER.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >6. </th>
					<th align="justify" colspan="80"> Apabila tidak dapat menyelesaikan kontrak kerja selama 3 tahun dikarenakan kesalahan saya, maka saya harus membiayai kepulangan saya sendiri.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >7. </th>
					<th align="justify" colspan="80">Saya tidak keberatan serta menyetujui dan menunjuk keluarga yang menandatangani surat ijin keluarga dan ikut bertanggung jawab apabila terjadi penyimpangan.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >8. </th>
					<th align="justify" colspan="80">Saya bersedia dan sanggup mentaati peraturan yang ada di <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b></th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >9. </th>
					<th align="justify" colspan="80">Pernyataan / perjanjian ini dibuat oleh saya dalam keadaan sadar tanpa adanya paksaan dari pihak manapun juga.</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >10. </th>
					<th align="justify" colspan="80">Keluarga yang bertanda tangan sudah mengetahui pernyataan ini dan ikut bertanggung jawab penuh atas perihal di atas.</th>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="6"></td>

					<td colspan="40">Lawang, '.$tanggal.'</td>
				</tr>
			 	<tr>
					<td colspan="6"></td>
					<td colspan="15">Yang menyatakan / membuat perjanjian,</td>
					<td colspan="12"></td>
					<td colspan="15">Sponsor / Saksi,</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="6"></td>
					<td colspan="15">(.........................)</td>
					<td colspan="10"></td>
					<td colspan="15">(.........................)</td>
				</tr>
				<br>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT NOTARISAN KELUARGA ( INFORMAL ).pdf', 'I');    
    }
	
	
	
	
	
	function cetak4($id_legalitas) {
      	$nama 				= $this->m_printdata->tampilnamatki4($id_legalitas);
		$noid		 		= $this->m_printdata->tampilnoid4($id_legalitas);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir4($id_legalitas);
		$tgllahir 			= $this->m_printdata->tampiltgllahir4($id_legalitas);
		$jeniskelamin		= $this->m_printdata->tampiljeniskelamin4($id_legalitas);
		$alamat 			= $this->m_printdata->tampilalamat4($id_legalitas);
		$tanggal 			=date('d-m-Y');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT PERNYATAAN LEGALITAS DOKUMEN');
    $pdf->SetSubject('SURAT PERNYATAAN DOKUMEN');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('sim', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table width="100%" cellspacing="3" cellpadding="2">
					<tr>	
						<td><h3 align="center"><u>SURAT PERNYATAAN LEGALITAS DOKUMEN</u></h3></td>
					</tr>
					<br>
					<br>
					<br>
					<tr>
						<td width="40%">Yang bertanda tangan dibawah ini saya :</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Nama 	/ No. ID</td>
						<td width="2%">:</td>
						<td width="50%">'.$nama.' / '.$noid.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Tempat /Tanggal lahir</td>
						<td width="2%">:</td>
						<td width="50%">'.$tempatlahir.' / '.$tgllahir.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Jenis Kelamin</td>
						<td width="2%">:</td>
						<td width="20%">'.$jeniskelamin.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Alamat</td>
						<td width="2%">:</td>
						<td width="20%">'.$alamat.'</td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="100%" align="justify low">Dengan ini menyatakan sesungguhnya bahwa dokumen – dokumen yang saya bawa sendiri dari rumah yang terdiri dari :</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="4%">1.</td>
						<td width="50%">KTP</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="4%">2.</td>
						<td width="50%">Kartu Keluarga ( KK )</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="4%">3.</td>
						<td width="50%">Ijazah / Akte Lahir / Surat Nikah</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="4%">4.</td>
						<td width="50%">Ijin Keluarga</td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify">Adalah <b>BENAR</b> dan <b>DAPAT DIPERTANGGUNG JAWABKAN</b>.</td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify">Apabila dokumen – dokumen tersebut ternyata tidak benar / palsu, maka dalam hal ini saya bertanggung jawab atas denda maupun hukum yang berlaku serta tidak akan melibatkan <b>PT.Flamboyan Gemajasa Lawang</b>.</td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify">Dengan ini menyatakan pula bahwa saya <b>BELUM / PERNAH</b> berangkat ke <b>LUAR NEGERI</b> dalam rangka apapun.</td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify">Demikian surat pernyataan ini saya buat dengan sebenarnya tanpa ada paksaan dari pihak manapun.</td>
					</tr>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
			 	<tr>
					<td width="10%"></td>
					<td width="30%">Malang,'.$tanggal.'</td>
				</tr>
			 	<tr>
					<td width="10%"></td>
					<td width="30%">Yang membuat pernyataan,</td>
					<td width="32%"></td>
					<td width="25%">Mengetahui sponsor,</td>
				</tr>
					<br>
					<br>
					<br>
					<br>
			 	<tr>
					<td width="10%"></td>
					<td width="30%">(......................)</td>
					<td width="30%"></td>
					<td width="25%">(......................)</td>
				</tr>
			</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT PERNYATAAN LEGALITAS DOKUMEN.pdf', 'I');    
    }
	
	
	
	
	
	function cetak5($id_surat) {
    - 	$nama_bapak			= $this->m_printdata->tampilnama_bapak5($id_surat);
		$noktp		 		= $this->m_printdata->tampilnoktp5($id_surat);
		$tmp 				= $this->m_printdata->tampiltempatlahir5($id_surat);
		$tgl 				= $this->m_printdata->tampiltgllahir5($id_surat);
		$alamat2			= $this->m_printdata->tampilalamat25($id_surat);
	-	$nama 				= $this->m_printdata->tampilnamatki5($id_surat);
	-	$tempatlahir 		= $this->m_printdata->tampiltempatlahir5($id_surat);
	-	$tgllahir 			= $this->m_printdata->tampiltgllahir5($id_surat);
	-	$nopass 			= $this->m_printdata->tampilnopass5($id_surat);
	-	$alamat 			= $this->m_printdata->tampilalamat5($id_surat);
		$tujuan 			= $this->m_printdata->tampiltujuan5($id_surat);
		$sebagai 			= $this->m_printdata->tampilsebagai5($id_surat);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT IJIN KELUARGA BANYUWANGI');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" width="100%"style="font-size:20px;">
				<tr>
					<td><b>SURAT IJIN KELUARGA BANYUWANGI</b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="2"></td><td colspan="20">Yang bertanda tangan di bawah ini: </td>
				</tr>
			 </table>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="4%"></th><th width="20%">Nama  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$nama_bapak.' </th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">No. KTP / SIM  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$noktp.' </th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Tempat/Tanggal lahir  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$tmp.' / '.$tgl.' </th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Alamat  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$alamat2.' </th>
				</tr>
			 </table>
			 <br><br><br>
			 <table>
			 	<tr>
					<td colspan="2"></td><td colspan="20">Memberikan ijin kepada '.$nama.' saya :</td>
				</tr>
			 </table>			 
			 <br>
			 <br>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="4%"></th><th width="20%">Nama  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$nama.' </th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Tempat/Tanggal lahir  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$tempatlahir.' / '.$tgllahir.' </th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">NO. Paspor  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$nopass.' </th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Alamat</th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="50%"> '.$alamat.' </th>
				</tr>
				<br><br>
			 	<tr>
					<th width="4%"></th><th width="20%">Tujuan</th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> '.$tujuan.' </th>
				</tr>
			 </table>
			
			 <br>
			 <br>
			 <table>
			 	<tr>
					<th width="12%" ></th>
					<th width="88%">Saya sebagai '.$sebagai.' memberikan ijin / tidak keberatan '.$nama.' saya</th>
				</tr>
				<tr>
					<th width="4%" ></th>
					<th width="96%">bekerja ke '.$tujuan.' sebagai TKI / TKW dan saya bersedia menanggung resiko dan akibatnya.</th>
				</tr>
			 </table>
			 <br><br>
			 <table>
			 	<tr>
					<th width="12%" ></th>
					<th width="88%">Demikian Surat Pernyataan ini saya buat dengan sebenarnya dalam keadaan sadar dan tanpa ada</th>
				</tr>
				<tr>
					<th width="4%" ></th>
					<th width="96%"> unsur paksaan dari pihak manapun dan dapat dipergunakan sebagaimana mestinya.</th>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="1"></td>
					<td colspan="5"></td>
					<td colspan="7"></td>
					<td colspan="5">Banyuwangi,..........................</td>
				</tr>
				<br>
			 	<tr>
					<td colspan="1"></td>
					<td colspan="5">Yang diberi persyaratan,</td>
					<td colspan="6"></td>
					<td colspan="5">Yang Memberi persyaratan,</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="1"></td>
					<td colspan="5">(............................................)</td>
					<td colspan="6"></td>
					<td colspan="5">(............................................)</td>
				</tr>
				<br>
				<br>
			 	<tr>
					<td colspan="8"></td>
					<td colspan="5">Mengetahui,</td>
				</tr>
				<tr>
					<td colspan="7"></td>
					<td colspan="5">Kepala Desa Keluarahan</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="7"></td>
					<td colspan="5">(.......................................)</td>
				</tr>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT IJIN KELUARGA BANYUWANGI.pdf', 'I');    
    }
	
	
	
	
	function cetak6($id_kuasa) {
      	$nama 				= $this->m_printdata->tampilnamatki6($id_kuasa);
		$noid		 		= $this->m_printdata->tampilnoid6($id_kuasa);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir6($id_kuasa);
		$tgllahir 			= $this->m_printdata->tampiltgllahir6($id_kuasa);
		$jeniskelamin		= $this->m_printdata->tampiljeniskelamin6($id_kuasa);
		$nopass				= $this->m_printdata->tampilnopass6($id_kuasa);
		$alamat 			= $this->m_printdata->tampilalamat6($id_kuasa);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('NOTARIS SURAT KUASA');
    $pdf->SetSubject('SURAT KUASA');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('sim', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table width="100%" cellspacing="3" cellpadding="2">
					<tr>	
						<td><h3 align="center"><u>SURAT KUASA</u></h3></td>
					</tr>
					<br>
					<br>
					<br>
					<tr>
						<td width="40%">Yang bertanda tangan dibawah ini saya :</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Nama 	/ No. ID</td>
						<td width="2%">:</td>
						<td width="50%"> '.$nama.' /'.$noid.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Tempat /Tanggal lahir</td>
						<td width="2%">:</td>
						<td width="50%"> '.$tempatlahir.' / '.$tgllahir.' </td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">No. Pasport</td>
						<td width="2%">:</td>
						<td width="20%"> '.$nopass.' </td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Jenis Kelamin</td>
						<td width="2%">:</td>
						<td width="20%"> '.$jeniskelamin.' </td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Alamat</td>
						<td width="2%">:</td>
						<td width="20%"> '.$alamat.' </td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="100%" align="justify low">Dengan ini memberikan kuasa kepada <b> PT. FLAMBOYAN GEMAJASA LAWANG </b> untuk menerima claim Asuransi.</td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify">Demikian Surat Kuasa ini dapat dipergunakan dengan semestinya, atas kerjasamanya kami ucapkan terima kasih</td>
					</tr>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
			 	<tr>
					<td width="10%"></td>
					<td width="30%">Malang,............................</td>
				</tr>
			 	<tr>
					<td width="10%"></td>
					<td width="30%">Yang Memberi Kuasa</td>
					<td width="32%"></td>
					<td width="25%">Yang diberi kuasa</td>
				</tr>
					<br>
					<br>
					<br>
					<br>
			 	<tr>
					<td width="8%"></td>
					<td width="30%">(..........................................)</td>
					<td width="30%"></td>
					<td width="25%">(..........................................)</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<br>
					<tr>
						<td width="5%"></td>
						<td width="25%">NAMA KELUARGA BISA DIHUBUNGI & TEL </td>
						<td width="2%">:</td>
						<td width="60%">................................../................................../..................................</td>
					</tr>
			</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('FOTOCOPY NOTARIS SURAT KUASA.pdf', 'I');    
    }
	
	
	
	
	      function cetak7($id_keterangan) {
      	$nama 				= $this->m_printdata->tampilnamatki7($id_keterangan);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir7($id_keterangan);
		$tgllahir 			= $this->m_printdata->tampiltgllahir7($id_keterangan);
		$status 			= $this->m_printdata->tampilstatus7($id_keterangan);
		$alamat 			= $this->m_printdata->tampilalamat7($id_keterangan);
		$nama_bapak 		= $this->m_printdata->tampilnama_bapak7($id_keterangan);
		$tempat 			= $this->m_printdata->tampiltempat7($id_keterangan);
		$tgl 				= $this->m_printdata->tampiltgl7($id_keterangan);
		$status2 			= $this->m_printdata->tampilstatus7($id_keterangan);
		$hubungan 			= $this->m_printdata->tampilhubungan7($id_keterangan);
		$alamat2 			= $this->m_printdata->tampilalamat27($id_keterangan);
		$tujuan 			= $this->m_printdata->tampiltujuan7($id_keterangan);
		$kontrak 			= $this->m_printdata->tampilkontrak7($id_keterangan);
		
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT PERNYATAAN AHLI WARIS (MALANG) OK');
    $pdf->SetSubject('SURAT PERNYATAAN AHLI WARIS');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('sim', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table width="100%" cellspacing="3" cellpadding="2">
					<tr>	
						<td><h3 align="center"><u>SURAT PERNYATAAN KETERANGAN AHLI WARIS</u></h3></td>
					</tr>
					<br>
					<br>
					<br>
					<tr>
						<td width="40%">Yang bertanda tangan dibawah ini saya :</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Nama</td>
						<td width="2%">:</td>
						<td width="20%">'.$nama.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Tempat/Tanggal Lahir</td>
						<td width="2%">:</td>
						<td width="20%">'.$tempatlahir.' / '.$tgllahir.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Status</td>
						<td width="2%">:</td>
						<td width="20%">'.$status.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Alamat</td>
						<td width="2%">:</td>
						<td width="20%">'.$alamat.'</td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="60%">Sebagai Pihak ke I ( satu ) memberikan kuasa kepada :</td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="5%"></td>
						<td width="25%">Nama</td>
						<td width="2%">:</td>
						<td width="20%">'.$nama_bapak.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Tempat/Tanggal Lahir</td>
						<td width="2%">:</td>
						<td width="20%">'.$tempat.' / '.$tgl.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Status</td>
						<td width="2%">:</td>
						<td width="20%">'.$status.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Hubungan Keluarga</td>
						<td width="2%">:</td>
						<td width="20%">'.$hubungan.'</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Alamat</td>
						<td width="2%">:</td>
						<td width="20%">'.$alamat2.'</td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="50%">Sebagai Pihak ke II (dua) yang selanjutnya di beri kuasa</td>
					</tr>
					<tr>
						<td width="100%" align="justify">Pihak ke satu akan bekerja ke luar negeri dengan negera tujuan  <u>'.$tujuan.'</u> selama kontrak <u>'.$kontrak.'</u>  Tahun melalui <b>PT FLAMBOYAN GEMAJASA LAWANG</b> </td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify low">Apabila selama masa kontrak kerja terjadi kecelakaan/sakit/meninggal dunia, maka untuk selanjutnya segala urusan tentang hak dan kewajiban saya berikan kepada Pihak ke II ( dua ) untuk mengurus, menerima hak dan kewajiban saya sesuai dengan aturan yang berlaku.</td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify">Demikian surat pernyataan keterangan ahli waris ini saya buat dengan sadar tanpa adanya paksaan dari pihak manapun dan di pergunakan sebagaimana mestinya.</td>
					</tr>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
			 	<tr>
					<td width="73%"></td>
					<td width="25%">Malang,</td>
				</tr>
			 	<tr>
					<td width="10%"></td>
					<td width="30%">Yang Memberi Kuasa</td>
					<td width="32%"></td>
					<td width="25%">Yang diberi kuasa</td>
				</tr>
					<br>
					<br>
					<br>
					<br>
			 	<tr>
					<td width="8%"></td>
					<td width="30%">(....................)</td>
					<td width="30%"></td>
					<td width="25%">(.......................)</td>
				</tr>
			</table>
	
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT PERNYATAAN AHLI WARIS (MALANG) OK.pdf', 'I');    
    }
	
	
	
	
	
	function cetak8($id_kerja) {
      	$namanya 			= $this->m_printdata->tampilnamamajikan8($id_kerja);
      	$alamatnya 			= $this->m_printdata->tampilalamatmajikan8($id_kerja);
      	$hpnya 				= $this->m_printdata->tampilhpmajikan8($id_kerja);
      	$nama 				= $this->m_printdata->tampilnamatki8($id_kerja);
      	$alamat 			= $this->m_printdata->tampilalamattki8($id_kerja);
      	$nopass 			= $this->m_printdata->tampilnopasstki8($id_kerja);
      	$tempatlahir 		= $this->m_printdata->tampiltempatlahirtki8($id_kerja);
      	$tgllahir 			= $this->m_printdata->tampiltgllahirtki8($id_kerja);
      	$jeniskelamin 		= $this->m_printdata->tampiljeniskelamintki8($id_kerja);
      	$jmanak 			= $this->m_printdata->tampiljmanaktki8($id_kerja);
      	$nama_bapak 		= $this->m_printdata->tampilnama_bapak8($id_kerja);
      	$alamat2 			= $this->m_printdata->tampilalamat28($id_kerja);
      	$hp2 				= $this->m_printdata->tampilhp28($id_kerja);
      	$hubungan2 			= $this->m_printdata->tampilhubungan28($id_kerja);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('1. PKJ03-PK WANITA FORMAL BLANK');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('simsun', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table>
				<tr>
					<td style="width:25%; font-size:10px;" >
						<table cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>
									<p>台仲中文/英名稱 :.........</p>
									<p>地址/電話/傳真 :.........</p>
									<p><U>TEL:..........</U></p>
									<p><U>FAX:..........</u></p>
								</td>
							</tr>
						</table>
				</td>
				<td style="width:50%; font-size:18px; margin-left:5px;">
				<table style="text-align:center;" cellspacing="5" cellpadding="0">
					<tr>
						<td>勞動契約 監護工</td>
					</tr>
					<tr>
						<td>PERJANJIAN KERJA ANTARA</td>
					</tr>
					<tr>
						<td>MAJIKAN DENGAN</td>
					</tr>
					<tr>
						<td>Perawat Orang Sakit (Care Giver)</td>
					</tr>
				</table>
				</td>
				<td align="center" style="width:20%; font-size:20px;" >
						<table cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>
									SEKTOR
									INFORMAL
								</td>
							</tr>
						</table>
				</td>
				</tr>
			 </table><br><br>
			 	<table width="100%">
					<tr>
						<th colspan="2" >甲方名稱 (以下簡稱為 甲方)</th>
						<th colspan="3" >: '.$namanya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama Majikan</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >地址</th>
						<th colspan="3" >: '.$alamatnya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >電話</th>
						<th colspan="3" >: '.$hpnya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nomor Telepon</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="3" >SELANJUTNYA DISEBUT PIHAK PERTAMA</th>		
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="2" >Nama Pekerja</th>
						<th colspan="3" >: '.$nama.'</th>						
					</tr>
					<tr>
						<th colspan="2" >在印尼住址</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat di Indonesia</th>
						<th colspan="3" >: '.$alamat.'</th>						
					</tr>
					<tr>
						<th colspan="2" >護照號碼，簽發日期及地點</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >Nomor paspor,</th>
						<th colspan="3" >: '.$nopass.'</th>						
					</tr>
					<tr>
						<th colspan="2" >tanggal dan tempat pengeluaran</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th width="15%" >出生日期</th>
						<th >: '.$tempatlahir.'</th>
						<th width="15%" >出生地點</th>
						<th >: '.$tgllahir.'.</th>		
						<th width="15%" >性別</th>
						<th >: '.$jeniskelamin.'</th>								
					</tr>
					<tr>
						<th width="15%"  >Tanggal Lahir</th>
						<th >: </th>
						<th width="15%"  >Tempat Lahir</th>
						<th >: </th>		
						<th width="15%"  >Jenis Kelamin</th>
						<th >: </th>								
					</tr>
					<tr>
						<th width="25%" >婚姻狀況 :</th>
						<th width="25%" >□已婚</th>	
						<th width="25%" >□未婚</th>
						<th width="25%" >□離婚</th>							
					</tr>
					<tr>
						<th width="25%" >Status Perkawinan :</th>
						<th width="25%" >Menikah</th>	
						<th width="25%" >Belum menikah</th>
						<th width="25%" >Cerai</th>					
					</tr>
					<tr>
						<th colspan="2" >十八歲以下未婚子女數目</th>
						<th colspan="3" >: '.$jmanak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Jumlah anak dibawah umur 18 tahun dan belum menikah</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >受益人姓名</th>
						<th colspan="3" >: '.$nama_bapak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama ahli waris</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >如遇意外時通知</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >姓名</th>
						<th colspan="3" >: '.$nama_bapak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >住址</th>
						<th colspan="3" >: '.$alamat2.'.</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th width="25%"  >電話</th>
						<th >: '.$hp2.'</th>
						<th width="25%"  >關係</th>
						<th >: '.$hubungan2.'</th>						
					</tr>
					<tr>
						<th width="25%"  >Telepon</th>
						<th >: </th>
						<th width="25%"  >Hubungan</th>
						<th >: </th>						
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="3" >SELANJUTNYA DISEBUT PIHAK PERTAMA</th>		
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="4" >甲方僱用乙方於中華民國境內擔任    監護工    工作而簽訂本合約。雙方約定事項有關條件詳列於下</th>					
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="4" >PIHAK PERTAMA menempatkan PIHAK KEDUA di Taiwan, ROC sebagai _PERAWAT ORANG SAKIT_ dan kedua belah pihak sepakat untuk menandatangani Perjanjian Kerja mengenai hal-hal sebagai berikut : </th>					
					</tr>
				</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('1. PKJ03-PK WANITA FORMAL BLANK.pdf', 'I');    
    }
	
	
	
	
	
	function cetak9($id_kerja) {
      	$namanya 			= $this->m_printdata->tampilnamamajikan8($id_kerja);
      	$alamatnya 			= $this->m_printdata->tampilalamatmajikan8($id_kerja);
      	$hpnya 				= $this->m_printdata->tampilhpmajikan8($id_kerja);
      	$nama 				= $this->m_printdata->tampilnamatki8($id_kerja);
      	$alamat 			= $this->m_printdata->tampilalamattki8($id_kerja);
      	$nopass 			= $this->m_printdata->tampilnopasstki8($id_kerja);
      	$tempatlahir 		= $this->m_printdata->tampiltempatlahirtki8($id_kerja);
      	$tgllahir 			= $this->m_printdata->tampiltgllahirtki8($id_kerja);
      	$jeniskelamin 		= $this->m_printdata->tampiljeniskelamintki8($id_kerja);
      	$jmanak 			= $this->m_printdata->tampiljmanaktki8($id_kerja);
      	$nama_bapak 		= $this->m_printdata->tampilnama_bapak8($id_kerja);
      	$alamat2 			= $this->m_printdata->tampilalamat28($id_kerja);
      	$hp2 				= $this->m_printdata->tampilhp28($id_kerja);
      	$hubungan2 			= $this->m_printdata->tampilhubungan28($id_kerja);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('2. PKJ01-PK WANITA INFOMAL-BLANK');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('simsun', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table>
				<tr>
					<td style="width:25%; font-size:10px;" >
						<table cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>
									<p> </p>
									<p> </p>
									<p> </p>
									<p> </p>
								</td>
							</tr>
						</table>
				</td>
				<td style="width:50%; font-size:18px; margin-left:5px;">
				<table style="text-align:center;" cellspacing="5" cellpadding="0">
					<tr>
						<td>勞動契約 監護工</td>
					</tr>
					<tr>
						<td>PERJANJIAN KERJA ANTARA</td>
					</tr>
					<tr>
						<td>MAJIKAN DENGAN <u>PEKERJA</u></td>
					</tr>
				</table>
				</td>
				<td align="center" style="width:20%; height="10%" font-size:20px;" >
						<table cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>
									<p> </p>
									<p> </p>									
								</td>
							</tr>
							
						</table>
				</td>
				</tr>
			 </table><br><br>
			 	<table width="100%">
					<tr>
						<th colspan="2" >甲方名稱 (以下簡稱為 甲方)</th>
						<th colspan="3" >: '.$namanya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama Majikan</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >地址</th>
						<th colspan="3" >: '.$alamatnya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >電話</th>
						<th colspan="3" >: '.$hpnya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nomor Telepon</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="3" >SELANJUTNYA DISEBUT PIHAK PERTAMA</th>		
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="2" >Nama Pekerja</th>
						<th colspan="3" >: '.$nama.'</th>						
					</tr>
					<tr>
						<th colspan="2" >在印尼住址</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat di Indonesia</th>
						<th colspan="3" >: '.$alamat.'</th>						
					</tr>
					<tr>
						<th colspan="2" >護照號碼，簽發日期及地點</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >Nomor paspor,</th>
						<th colspan="3" >: '.$nopass.'</th>						
					</tr>
					<tr>
						<th colspan="2" >tanggal dan tempat pengeluaran</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th width="15%" >出生日期</th>
						<th >: '.$tempatlahir.'</th>
						<th width="15%" >出生地點</th>
						<th >: '.$tgllahir.'.</th>		
						<th width="15%" >性別</th>
						<th >: '.$jeniskelamin.'</th>								
					</tr>
					<tr>
						<th width="15%"  >Tanggal Lahir</th>
						<th >: </th>
						<th width="15%"  >Tempat Lahir</th>
						<th >: </th>		
						<th width="15%"  >Jenis Kelamin</th>
						<th >: </th>								
					</tr>
					<tr>
						<th width="25%" >婚姻狀況 :</th>
						<th width="25%" >□已婚</th>	
						<th width="25%" >□未婚</th>
						<th width="25%" >□離婚</th>							
					</tr>
					<tr>
						<th width="25%" >Status Perkawinan :</th>
						<th width="25%" >Menikah</th>	
						<th width="25%" >Belum menikah</th>
						<th width="25%" >Cerai</th>					
					</tr>
					<tr>
						<th colspan="2" >十八歲以下未婚子女數目</th>
						<th colspan="3" >: '.$jmanak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Jumlah anak dibawah umur 18 tahun dan belum menikah</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >受益人姓名</th>
						<th colspan="3" >: '.$nama_bapak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama ahli waris</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >如遇意外時通知</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >姓名</th>
						<th colspan="3" >: '.$nama_bapak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >住址</th>
						<th colspan="3" >: '.$alamat2.'.</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th width="25%"  >電話</th>
						<th >: '.$hp2.'</th>
						<th width="25%"  >關係</th>
						<th >: '.$hubungan2.'</th>						
					</tr>
					<tr>
						<th width="25%"  >Telepon</th>
						<th >: </th>
						<th width="25%"  >Hubungan</th>
						<th >: </th>						
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="3" >SELANJUTNYA DISEBUT PIHAK PERTAMA</th>		
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="4" >甲方僱用乙方於中華民國境內擔任 <u>操作工</u>    工作而簽訂本合約。雙方約定事項有關條件詳列於下：</th>					
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="4" >PIHAK PERTAMA menempatkan PIHAK KEDUA di Taiwan sebagai  <u>operator</u>        dan kedua belah pihak sepakat untuk menandatangani Perjanjian Kerja mengenai hal-hal sebagai berikut:</th>					
					</tr>
				</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('2. PKJ01-PK WANITA INFOMAL-BLANK.pdf', 'I');    
    }
	
	
	
	
	
	function cetak10($id_kerja) {
      	$namanya 			= $this->m_printdata->tampilnamamajikan8($id_kerja);
      	$alamatnya 			= $this->m_printdata->tampilalamatmajikan8($id_kerja);
      	$hpnya 				= $this->m_printdata->tampilhpmajikan8($id_kerja);
      	$nama 				= $this->m_printdata->tampilnamatki8($id_kerja);
      	$alamat 			= $this->m_printdata->tampilalamattki8($id_kerja);
      	$nopass 			= $this->m_printdata->tampilnopasstki8($id_kerja);
      	$tempatlahir 		= $this->m_printdata->tampiltempatlahirtki8($id_kerja);
      	$tgllahir 			= $this->m_printdata->tampiltgllahirtki8($id_kerja);
      	$jeniskelamin 		= $this->m_printdata->tampiljeniskelamintki8($id_kerja);
      	$jmanak 			= $this->m_printdata->tampiljmanaktki8($id_kerja);
      	$nama_bapak 		= $this->m_printdata->tampilnama_bapak8($id_kerja);
      	$alamat2 			= $this->m_printdata->tampilalamat28($id_kerja);
      	$hp2 				= $this->m_printdata->tampilhp28($id_kerja);
      	$hubungan2 			= $this->m_printdata->tampilhubungan28($id_kerja);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('3. PKJ05 PK PANTI JOMPO 勞動契約-養護機構(BMB)-BLANK');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('simsun', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table>
				<tr>
					<td style="width:25%; font-size:10px;" >
						<table cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>
									<p>台仲中文/英名稱 :.........</p>
									<p>地址/電話/傳真 :.........</p>
									<p><U>TEL:..........</U></p>
									<p><U>FAX:..........</u></p>
								</td>
							</tr>
						</table>
				</td>
				<td style="width:50%; font-size:18px; margin-left:5px;">
				<table style="text-align:center;" cellspacing="5" cellpadding="0">
					<tr>
						<td>勞動契約 監護工</td>
					</tr>
					<tr>
						<td>PERJANJIAN KERJA ANTARA</td>
					</tr>
					<tr>
						<td>MAJIKAN DENGAN</td>
					</tr>
					<tr>
						<td>PERAWAT  DI  PANTI  JOMPO/RUMAH  SAKIT
 (NURSING HOME)
</td>
					</tr>
				</table>
				</td>
				<td align="center" style="width:20%; font-size:20px;" >
						<table cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>
									SEKTOR
									FORMAL
								</td>
							</tr>
						</table>
				</td>
				</tr>
			 </table><br><br>
			 	<table width="100%">
					<tr>
						<th colspan="2" >甲方名稱 (以下簡稱為 甲方)</th>
						<th colspan="3" >: '.$namanya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama Majikan</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >地址</th>
						<th colspan="3" >: '.$alamatnya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >電話</th>
						<th colspan="3" >: '.$hpnya.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nomor Telepon</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="3" >SELANJUTNYA DISEBUT PIHAK PERTAMA</th>		
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="2" >Nama Pekerja</th>
						<th colspan="3" >: '.$nama.'</th>						
					</tr>
					<tr>
						<th colspan="2" >在印尼住址</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat di Indonesia</th>
						<th colspan="3" >: '.$alamat.'</th>						
					</tr>
					<tr>
						<th colspan="2" >護照號碼，簽發日期及地點</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >Nomor paspor,</th>
						<th colspan="3" >: '.$nopass.'</th>						
					</tr>
					<tr>
						<th colspan="2" >tanggal dan tempat pengeluaran</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th width="15%" >出生日期</th>
						<th >: '.$tempatlahir.'</th>
						<th width="15%" >出生地點</th>
						<th >: '.$tgllahir.'.</th>		
						<th width="15%" >性別</th>
						<th >: '.$jeniskelamin.'</th>								
					</tr>
					<tr>
						<th width="15%"  >Tanggal Lahir</th>
						<th >: </th>
						<th width="15%"  >Tempat Lahir</th>
						<th >: </th>		
						<th width="15%"  >Jenis Kelamin</th>
						<th >: </th>								
					</tr>
					<tr>
						<th width="25%" >婚姻狀況 :</th>
						<th width="25%" >□已婚</th>	
						<th width="25%" >□未婚</th>
						<th width="25%" >□離婚</th>							
					</tr>
					<tr>
						<th width="25%" >Status Perkawinan :</th>
						<th width="25%" >Menikah</th>	
						<th width="25%" >Belum menikah</th>
						<th width="25%" >Cerai</th>					
					</tr>
					<tr>
						<th colspan="2" >十八歲以下未婚子女數目</th>
						<th colspan="3" >: '.$jmanak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Jumlah anak dibawah umur 18 tahun dan belum menikah</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >受益人姓名</th>
						<th colspan="3" >: '.$nama_bapak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama ahli waris</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >如遇意外時通知</th>
						<th colspan="3" >:</th>						
					</tr>
					<tr>
						<th colspan="2" >姓名</th>
						<th colspan="3" >: '.$nama_bapak.'</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th colspan="2" >住址</th>
						<th colspan="3" >: '.$alamat2.'.</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat</th>
						<th colspan="3" >: </th>						
					</tr>
					<tr>
						<th width="25%"  >電話</th>
						<th >: '.$hp2.'</th>
						<th width="25%"  >關係</th>
						<th >: '.$hubungan2.'</th>						
					</tr>
					<tr>
						<th width="25%"  >Telepon</th>
						<th >: </th>
						<th width="25%"  >Hubungan</th>
						<th >: </th>						
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="3" >SELANJUTNYA DISEBUT PIHAK PERTAMA</th>		
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="4" >甲方僱用乙方於中華民國境內擔任養護機構/醫院監護工工作而簽訂本合約。雙方約定事項有關條件詳列於下：</th>					
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="4" >PIHAK PERTAMA menempatkan PIHAK KEDUA di Taiwan sebagai  Perawat di panti jompo/rumah sakit dan kedua belah pihak sepakat untuk menandatangani Perjanjian Kerja mengenai hal-hal sebagai berikut:</th>					
					</tr>
				</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('3. PKJ05 PK PANTI JOMPO 勞動契約-養護機構(BMB)-BLANK.pdf', 'I');    
    }
	
	
	
	
	
	function cetak11($id_ijinku) {
     	$nama_bapak 		= $this->m_printdata->tampil1($id_ijinku);
      	$tempat4 			= $this->m_printdata->tampil2($id_ijinku);
      	$tanggal4 			= $this->m_printdata->tampil3($id_ijinku);
      	$pekerjaan1 		= $this->m_printdata->tampil4($id_ijinku);
      	$alamat4 			= $this->m_printdata->tampil5($id_ijinku);
      	$desa1 				= $this->m_printdata->tampil6($id_ijinku);
      	$kel1 				= $this->m_printdata->tampil7($id_ijinku);
      	$kab1 				= $this->m_printdata->tampil8($id_ijinku);
      	$kec1 				= $this->m_printdata->tampil9($id_ijinku);
      	$rt1 				= $this->m_printdata->tampil10($id_ijinku);
      	$hubungan4 			= $this->m_printdata->tampil11($id_ijinku);
      	$nama 				= $this->m_printdata->tampil12($id_ijinku);
      	$status 			= $this->m_printdata->tampil13($id_ijinku);
      	$tempatlahir		= $this->m_printdata->tampil14($id_ijinku);
      	$tgllahir 			= $this->m_printdata->tampil15($id_ijinku);
      	$pekerjaan2 		= $this->m_printdata->tampil16($id_ijinku);
      	$alamat 			= $this->m_printdata->tampil17($id_ijinku);
      	$desa2 				= $this->m_printdata->tampil18($id_ijinku);
      	$kel2				= $this->m_printdata->tampil19($id_ijinku);
      	$kab2 				= $this->m_printdata->tampil20($id_ijinku);
      	$kec2 				= $this->m_printdata->tampil21($id_ijinku);
      	$rt2 				= $this->m_printdata->tampil22($id_ijinku);
      	$tujuan4 			= $this->m_printdata->tampil23($id_ijinku);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('004 -- DLO01. SURAT IJIN KELUARGA KOSONGAN');
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
     $pdf->SetMargins(10, 10, 10);
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
    $pdf->SetFont('sim', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" style="font-size:20px;">
				<tr>
					<td><b>SURAT PERNYATAAN IJIN KELUARGA</b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="12">Yang bertanda tangan di bawah ini: </td>
				</tr>
			 </table>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="10%"></th><th width="25%">Nama</th><th width="50%"> : '.$nama_bapak.'</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="25%">Tempat/Tanggal lahir</th><th width="50%"> : '.$tempat4.' / '.$tanggal4.'</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="25%">Pekerjaan</th><th width="50%"> : '.$pekerjaan1.'</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="25%">Alamat</th><th width="50%"> : '.$alamat4.'</th>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<td colspan="12">Selaku '.$hubungan4.' dari calon tenaga kerja tersebut dibawah ini : </td>
				</tr>
			 </table>			 
			 <br>
			 <br>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="10%"></th><th width="25%">Nama</th><th width="50%"> : '.$nama.'</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="25%">Status</th><th width="50%"> : '.$status.'</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="25%">Tempat/Tanggal lahir</th><th width="50%"> : '.$tempatlahir.' / '.$tgllahir.' </th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="25%">Pekerjaan</th><th width="50%"> : '.$pekerjaan2.'</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="25%">Alamat</th><th width="50%"> : '.$alamat.'</th>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td>
					<p align="justify">Dengan ini menyatakan bahwa saya memberi ijin dengan ikhlas kepada '.$nama.'
saya untuk bekerja ke luar Negeri dengan Negara Tujuan '.$tujuan4.', sebagai Tenaga Kerja Indonesia sesuai dengan perjanjian kontrak kerja yang berlaku., maka saya selaku menyatakan akan bertanggung jawab penuh atas segala resiko serta tuntutan dari pihak manapun juga.
</p>
<p>Demikian pernyataan ini saya buat dengan sebenarnya dan dengan penuh rasa tanggung jawab dan disaksikan pejabat pemerintahan setempat untuk dijadikan data ikatan pedoman masing-masing pihak serta dapat digunakan sebagaimana mestinya.
</p>
					</td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="10%"></td>
					<td colspan="5">Yang diberi ijin,</td>
					<td colspan="6"></td>
					<td colspan="5">........,tgl.......</td>
				</tr>
				<tr>
					<td colspan="12"></td>
					<td colspan="5">Yang Memberi Ijin,</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td width="8%"></td>
					<td colspan="5">(....................)</td>
					<td colspan="6"></td>
					<td colspan="5">(....................)</td>
				</tr>
				<br>
				<br>
			 	<tr>
					<td colspan="8"></td>
					<td colspan="5">Mengetahui,</td>
				</tr>
				<tr>
					<td colspan="7"></td>
					<td colspan="5">Kepala Desa Keluarahan</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="7"></td>
					<td colspan="5">(....................)</td>
				</tr>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('004 -- DLO01. SURAT IJIN KELUARGA KOSONGAN.pdf', 'I');    
	}
	
		
	
	function cetak12($id_ktkln) {
     	$nomor_2 			= $this->m_printdata->data1($id_ktkln);
      	$tki_2 				= $this->m_printdata->data2($id_ktkln);
      	$kepada_2 			= $this->m_printdata->data3($id_ktkln);
		$tanggal 			= date('d-m-Y');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('Surat Pengajuan E KTKLN FGJ SURABAYA');
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
     $pdf->SetMargins(10, 10, 10);
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
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="15%">Nomor Surat</td>
					<td>: '.$nomor_2.'</td>
				</tr>
			 	<tr>
					<td width="15%">Lampiran</td>
					<td>: 1 ( satu ) berkas</td>
				</tr>
			 	<tr>
					<td width="15%">Perihal</td>
					<td>: <b>Permohonan Pengurusan E-KTKLN</b></td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="25%">Kepada :</td>
				</tr>
			 	<tr>
					<td width="25%">'.$kepada_2.'</td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="25%">Dengan Hormat,</td>
				</tr>
			 <br>
			 	<tr>
					<td align="justify" width="100%">Bersama ini kami mengajukan permohonan untuk dapat diproses E-KTKLN bagi Calon TKI yang telah memenuhi syarat untuk bekerja di luar negeri sebagaimana daftar nominative terlampir. Dengan Negara Tujuan <b>TAIWAN</b> sejumlah <b>'.$tki_2.'</b> Orang CTKI.</td>
				</tr>
			 <br>
			 	<tr>
					<td align="justify" width="100%">Demikian Surat Permohonan ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
				</tr>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 	<tr>
					<td width="50%">Batu, '.$tanggal.'</td>
				</tr>
			 	<tr>
					<td width="50%">Hormat kami,</td>
				</tr>
			 	<tr>
					<td width="50%"><b>PT. FLAMBOYAN GEMAJASA</b></td>
				</tr>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 	<tr>
					<td width="50%"><b><u>AGNATIUS ATMAJAYA</u></b></td>
				</tr>
			 	<tr>
					<td width="50%"><b>Direktur Utama</b></td>
				</tr>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('Surat Pengajuan E KTKLN FGJ SURABAYA.pdf', 'I');    
	}
	
	
	
	function cetak13($id_pktkln) {
     	$nomor_3 			= $this->m_printdata->data21($id_pktkln);
      	$tki_3 				= $this->m_printdata->data22($id_pktkln);
		$tanggal 			= date('d-m-Y');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT PENGANTAR E-KTKLN MALANG');
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
     $pdf->SetMargins(10, 10, 10);
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
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="15%">Nomor Surat</td>
					<td>: '.$nomor_3.'</td>
				</tr>
			 	<tr>
					<td width="15%">Lampiran</td>
					<td>: 1 ( satu ) berkas</td>
				</tr>
			 	<tr>
					<td width="15%">Perihal</td>
					<td>: <b>Permohonan Pengurusan E-KTKLN</b></td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="50%"><b>Kepada YTH</b></td>
				</tr>
			 	<tr>
					<td width="50%"><b>Kepala Pos Pelayanan Penempatan</b></td>
				</tr>
			 	<tr>
					<td width="60%"><b>Dan Perlindungan TenagaKerja  Indonesia (P4TKI) Malang</b></td>
				</tr>
			 	<tr>
					<td width="50%"><b>Jl.Raya Sulfat No.58</b></td>
				</tr>
			 	<tr>
					<td width="50%"><b><u>MALANG</u></b></td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="25%">Dengan Hormat,</td>
				</tr>
			 <br>
			 	<tr>
					<td align="justify" width="100%">Dalam rangka peningkatan perlindungan TKI yang akan ditempatkan di luar Negeri, maka bersama ini kami PT.FLAMBOYAN GEMAJASA mengajukan calon TKI untuk diberikan e-KTKLN, dengan jumlah '.$tki_3.' orang, </td>
				</tr>
			 <br>
			 	<tr>
					<td align="justify" width="100%">Demikian Surat Permohonan ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
				</tr>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 	<tr>
					<td width="50%">Batu, '.$tanggal.'</td>
				</tr>
			 	<tr>
					<td width="50%">Hormat kami,</td>
				</tr>
			 	<tr>
					<td width="50%"><b>PT. FLAMBOYAN GEMAJASA</b></td>
				</tr>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 	<tr>
					<td width="50%"><b><u>AGNATIUS ATMAJAYA</u></b></td>
				</tr>
			 	<tr>
					<td width="50%"><b>Direktur Utama</b></td>
				</tr>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT PENGANTAR E-KTKLN MALANG.pdf', 'I');    
	}
	
	
	
	function cetak14($id_ppap) {
     	$nomor_2 			= $this->m_printdata->data31($id_ppap);
      	$tki_2 				= $this->m_printdata->data32($id_ppap);
      	$tanggal_2			= $this->m_printdata->data33($id_ppap);
		$tanggal 			= date('d-m-Y');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT PENGANTAR PAP MALANG');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="15%">Nomor Surat</td>
					<td>: '.$nomor_2.'</td>
				</tr>
			 	<tr>
					<td width="15%">Lampiran</td>
					<td>: 1 ( satu ) berkas</td>
				</tr>
			 	<tr>
					<td width="15%">Perihal</td>
					<td>: <b>Permohonan PAP</b></td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="50%"><b>Kepada YTH</b></td>
				</tr>
			 	<tr>
					<td width="50%"><b>Kepala Pos Pelayanan Penempatan</b></td>
				</tr>
			 	<tr>
					<td width="60%"><b>Dan Perlindungan TenagaKerja  Indonesia (P4TKI) Malang</b></td>
				</tr>
			 	<tr>
					<td width="50%"><b>Jl.Raya Sulfat No.58</b></td>
				</tr>
			 	<tr>
					<td width="50%"><b><u>MALANG</u></b></td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td width="25%">Dengan Hormat,</td>
				</tr>
			 <br>
			 	<tr>
					<td align="justify" width="100%">Dalam rangka peningkatan perlindungan TKI yang akan ditempatkan di luar Negeri, maka bersama ini kami PT.FLAMBOYAN GEMAJASA mengajukan calon TKI untuk diberikan Pembekalan Akhir Pemberangkatan TKI <i>(PAP TKI)</i> pada tanggal '.$tanggal_2.', dengan jumlah '.$tki_2.' orang,</td>
				</tr>
			 <br>
			 	<tr>
					<td align="justify" width="100%">Demikian Surat Permohonan ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
				</tr>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 	<tr>
					<td width="50%">Batu, '.$tanggal.'</td>
				</tr>
			 	<tr>
					<td width="50%">Hormat kami,</td>
				</tr>
			 	<tr>
					<td width="50%"><b>PT. FLAMBOYAN GEMAJASA</b></td>
				</tr>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 	<tr>
					<td width="50%"><b><u>AGNATIUS ATMAJAYA</u></b></td>
				</tr>
			 	<tr>
					<td width="50%"><b>Direktur Utama</b></td>
				</tr>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT PENGANTAR PAP MALANG.pdf', 'I');    
	}
}