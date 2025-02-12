<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class printdata extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');
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
		$imigrasi 			= $this->m_printdata->tampilimigrasi($id_pembuatan);
		$daerah 			= $this->m_printdata->daerah2($id_pembuatan);
		$tglnya 			= $this->m_printdata->tglnya2($id_pembuatan);

		$idtki 			= $this->m_printdata->ambilidijin($id_pembuatan);


		$nama 				= $this->m_printdata->tampilnamatki2($idtki);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir2($idtki);
		$tgllahir 			= $this->m_printdata->tampiltgllahir2($idtki);
		$jabatan 			= $this->m_printdata->tampiljabatan2($idtki);
		$alamat 			= $this->m_printdata->tampilalamat2($idtki);
		$tanggal 			=date('d-m-Y');

		$tanggalan = str_replace(".","-",$tgllahir);
$newDate = date("d-m-Y", strtotime($tanggalan));

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
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
     $pdf->SetMargins(3, 16, 10);
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
	
    $html = ' 		   <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
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
    <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">'.$daerah.', '.$tglnya.'</th> 
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
					<th colspan="25">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
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
					<th colspan="25">Calon Tenaga Kerja Indonesia (CTKI)</th> 
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
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
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
			  <br pagebreak="true">

			   <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
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
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">'.$daerah.', '.$tglnya.'</th> 
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
											
			 </table>
			<table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32"  style="text-align:justify" >Dengan ini kami mengajukan permohonan kepada Bapak untuk diterbitkan permohonan Perjanjian Penempatan Calon TKI sebanyak 1 ( Satu ) orang  orang untuk Negara tujuan:</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>	
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Hongkong</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"></th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Malaysia</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Singapura</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Taiwan</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> 1 </th> 
					<th colspan="8" > orang</th> 
				</tr>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" ></th> 
					<th colspan="2" ></th>
					<th colspan="8" >__________________</th> 
					<th colspan="8" > </th> 
				</tr>			
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th align="right" colspan="10" >JUMLAH</th> 
					<th colspan="2" >:</th>
					<th colspan="8" align="center">1</th>  
					<th colspan="8" > orang</th> 
				</tr>				
				<br>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30"  style="text-align:justify">Daftar nominasi terlampir. <br>Rekom Paspor tersebut kami mohon ditujukan kepada '.$imigrasi.'.</th>
				</tr>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30" >Demikian atas bantuan Bapak, kami sampaikan terima kasih</th>
				</tr>							
			 </table>
			 <br><br><br><br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
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
		$imigrasi 			= $this->m_printdata->tampilimigrasi($id_pembuatan);

		$idtki 			= $this->m_printdata->ambiliddesa($id_pembuatan);

		$nama 				= $this->m_printdata->tampilnamatkidesa($idtki);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahirdesa($idtki);
		$tgllahir 			= $this->m_printdata->tampiltgllahirdesa($idtki);
		$jabatan 			= $this->m_printdata->tampiljabatandesa($idtki);
		$alamat 			= $this->m_printdata->tampilalamatdesa($idtki);
		$tanggal 			=date('d-m-Y');

		$tanggalan = str_replace(".","-",$tgllahir);
		// $originalDate = ;
$newDate = date("d-m-Y", strtotime($tanggalan));

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
					<th colspan="25">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
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
					<th colspan="25">Calon Tenaga Kerja Indonesia (CTKI)</th> 
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
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
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

	function cetakdisnaker($id_pembuatan) {

		$idtkinya = $this->m_printdata->ambilidtki($id_pembuatan);
		$eksnya = $this->m_printdata->ambileksnya($id_pembuatan);

		$dataeks='<th colspan="35">EKS/Baru</th> ';
		if($eksnya=='eks'){
$dataeks='<th colspan="35">EKS/<strike>Baru</strike></th> ';
		}else{
$dataeks='<th colspan="35"><strike>EKS</strike>/Baru</th> ';
		}

		$datadisnaker = $this->m_printdata->ambildisnakernya($idtkinya);

		$stts = substr($idtkinya, 0, 2);
		$formal='<th colspan="35">Formal / Informal</th>';
		if($stts=='FI'){
			$formal='<th colspan="35"><strike>Formal</strike> / Informal</th>';
		}
		if($stts=='MI'){
			$formal='<th colspan="35"><strike>Formal</strike> / Informal</th>';
		}
		if($stts=='FF'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
		if($stts=='MF'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
		if($stts=='JP'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
$nama='';
		foreach($datadisnaker->result() as $row) {
			$nama = $row->nama;
			$tempatlahir = $row->tempatlahir;
			$tanggallahir2 = $row->tanggallahir;
			$noktp = $row->noktp;
			$jeniskelamin = $row->jeniskelamin;
			$agama = $row->agama;
			$status = $row->status;
			$pendidikan = $row->pendidikan;
			$alamat = $row->alamat;
			$propinsi = $row->propinsi;
			$namaayah = $row->namaayah;
			$namaibu = $row->namaibu;
			$namaahli = $row->namaahli;
			$namakontak = $row->namakontak;
			$alamatkontak = $row->alamatkontak;
			$hubkontak = $row->hubkontak;
			$tglonline = $row->tglonline;
			$perkiraan = $row->perkiraan;
			$negara = $row->negara;
			$jabatan = $row->jabatan;
			$ahliwaris = $row->ahliwaris;
			$jmlanak = $row->jmlanak;
			$agency2 = $row->agency;
			$matauang = $row->matauang;
			$sektorusaha = $row->sektorusaha;
			$gaji = $row->gaji;
			$nopaspor = $row->nopaspor;
			$masaberlaku = $row->masaberlaku;
			$masahabis = $row->masahabis;
			$tglberangkat = $row->tglberangkat;
			$tgltiba = $row->tgltiba;

		}

		if ( $propinsi == null )
		{
			$propinsi = 'JAWA TIMUR';
		}

		$dtprov = $this->M_session->select('SELECT * FROM dataprovinsi');

		$provs = "";
		foreach ($dtprov as $key => $value) {
			if ( $value->isi.' '.$value->mandarin == $propinsi )
			{
				$provs = $value->isi;
				break;
			}
		}

		if ( $provs != NULL )
		{
			$propinsi = $provs;
		}

if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

		$agama=str_replace("回教","",$agama);
		$agama=str_replace("基督教","",$agama);
		$agama=str_replace("天主教","",$agama);
		$agama=str_replace("印度教","",$agama);
		$agama=str_replace("佛教","",$agama);

		$datapen = $this->m_printdata->ambilpendmandarin();
		$agency = $this->m_printdata->ambilagency($agency2);

		for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

$lahiran=str_replace(".","-",$tanggallahir2);
$tanggallahir = date("d-m-Y", strtotime($lahiran));

if($tglberangkat==null || $tglberangkat==0){
$tglbrkt ="";

}else{
	$originalDate2=str_replace(".","-",$tglberangkat);
$tglbrkt = date("d-m-Y", strtotime($originalDate2));
}

if($tgltiba==null || $tgltiba==0){
$tgltb ="";

}else{
$originalDate3=str_replace(".","-",$tgltiba);
$tgltb = date("d-m-Y", strtotime($originalDate3));
}




$tgl4="";
if($masaberlaku==null || $masaberlaku == 0){
$tgl4="";
}else{
$originalDate4=str_replace(".","-",$masaberlaku);
$tgl4 = date("d-m-Y", strtotime($originalDate4));
}

$tgl5="";
if($masahabis==null || $masahabis==0){
$masahabis="";
}else{
$originalDate5=str_replace(".","-",$masahabis);
$tgl5 = date("d-m-Y", strtotime($originalDate5));
}


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '<p align="center">FORMAT PENGISIAN TKI ON LINE</p>
			<br>
			
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
                <th colspan="3" ></th>
                <th colspan="25" >TKI</th>
                <th colspan="2">:</th>
              	'.$dataeks.'
              	<th colspan="15">*)</th>             
             </tr>
			 <tr>
                <th colspan="3" ></th>
                <th colspan="25" >Sektor</th>
                <th colspan="2">:</th>
              	'.$formal.'
              	<th colspan="15">**)</th>             
             </tr>
			 </table><br><br>
			 
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			<tr>
                <th align="center" colspan="3">No</th>
                <th align="center" colspan="62">Uraian</th>
                <th align="center" colspan="15">Ket</th>
                
             </tr>
			 <tr>
                <th align="center" colspan="3" >1</th>
                <th colspan="25" > NAMA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$nama.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >2</th>
                <th colspan="25" > NAMA IBU</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$namaibu.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >3</th>
                <th colspan="25" > NAMA AYAH</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$namaayah.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >4</th>
                <th colspan="25" > JENIS KELAMIN</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$jeniskelamin.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >5</th>
                <th colspan="25" > TEMPAT LAHIR</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tempatlahir.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >6</th>
                <th colspan="25" > TANGGAL LAHIR</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tanggallahir.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >7</th>
                <th colspan="25" > NO. KTP TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$noktp.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >8</th>
                <th colspan="25" > ALAMAT TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$alamat.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >9</th>
                <th colspan="25" > PROPINSI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$propinsi.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >10</th>
                <th colspan="25" > KOTA ASAL TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tempatlahir.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >11</th>
                <th colspan="25" > ALAMAT ORANG TUA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$alamatkontak.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >12</th>
                <th colspan="25" > KOTA ORANG TUA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$namaahli.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >13</th>
                <th colspan="25" > STATUS PERKAWINAN TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$status.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >14</th>
                <th colspan="25" > AGAMA</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$agama.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >15</th>
                <th colspan="25" > PENDIDIKAN</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$pendidikan.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >16</th>
                <th colspan="25" > AGENCY</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$agency.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >17</th>
                <th colspan="25" > MATA UANG</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$matauang.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >18</th>
                <th colspan="25" > JABATAN</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$jabatan.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >19</th>
                <th colspan="25" > SEKTOR USAHA</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$sektorusaha.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >20</th>
                <th colspan="25" > GAJI TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$gaji.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >21</th>
                <th colspan="25" > NO PASPOR</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$nopaspor.'</th> 
              	<th colspan="15">NO. 21 s/d 25</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >22</th>
                <th colspan="25" > MASA BERLAKU</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tgl4.'</th> 
              	<th colspan="15">Harus diisi</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >23</th>
                <th colspan="25" > MASA HABIS BERLAKU</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tgl5.'</th> 
              	<th colspan="15">Bagi TKI yang</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >24</th>
                <th colspan="25" > TGL. BERANGKAT </th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tglbrkt.'</th> 
              	<th colspan="15">Eks/pernah</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >25</th>
                <th colspan="25" > TGL. TIBA</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tgltb.'</th> 
              	<th colspan="15">ke luar negeri</th>             
             </tr>
			
			 </table><br><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
                <th colspan="5" >*)</th>
                <th  colspan="77">Coret Salah Satu</th>
              	       
             </tr>
			 <tr>
                <th colspan="5" >**)</th>
                <th  colspan="77">Bagi TKI Baru/yang belum pernah ke luar negeri untuk nomor 21 s/d 25 tidak perlu diisi</th>
              	          
             </tr>
			 </table>';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

function cetakskck($id_pembuatan) {

		$nomor 				= $this->m_printdata->tampilnomor3($id_pembuatan);
		$lampiran 			= $this->m_printdata->tampillampiran3($id_pembuatan);
		$perihal 			= $this->m_printdata->tampilperihal3($id_pembuatan);
		$kepada 			= $this->m_printdata->tampilkepada3($id_pembuatan);
		$kepada2 			= $this->m_printdata->tampilkepada3b($id_pembuatan);
		$kepada3 			= $this->m_printdata->tampilkepada3c($id_pembuatan);
		$kepada4 			= $this->m_printdata->tampilkepada4c($id_pembuatan);

		$idtki 			= $this->m_printdata->ambilidskck($id_pembuatan);

		$nama 				= $this->m_printdata->tampilnamatki3($idtki);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir3($idtki);
		$tgllahir 			= $this->m_printdata->tampiltgllahir3($idtki);
		$jabatan 			= $this->m_printdata->tampiljabatanskck($idtki);
		$alamat 			= $this->m_printdata->tampilalamat3($idtki);
		$tanggal 			=date('d-m-Y');

		$data12321wadaw91 = array (
			'pengajuan' => $tanggal,
			'statuspengajuan' => 'A'
		);

		$total_skck_polres = $this->M_session->select_count("skck_polres");

		if ( $total_skck_polres == 0 )
		{
			$this->M_session->insert($data12321wadaw91, "skck_polres" );
		}

		// $kepada=$kepada."".$kepada2."".$kepada3;

		$tanggalan = str_replace(".","-",$tgllahir);
$newDate = date("d-m-Y", strtotime($tanggalan));


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
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
	
    $html = ' <br><br><br><br><br><br><br><br><br>
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
					<th colspan="22">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="16">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="29">YTH.'.$kepada.' <br>Di tempat.</th> 
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
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
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
					<th colspan="8" > </th> 
					<th colspan="34" > Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan  ke Negara Taiwan</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >terima kasih.</th> 
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
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
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
			  <br pagebreak="true">
<br><br><br><br><br><br><br><br><br>
      <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"><br><br><br><br><br><br><br><br><br>Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="22">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="16">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="29">YTH.'.$kepada2.' <br>Di tempat.</th> 
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
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
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
					<th colspan="8" > </th> 
					<th colspan="34" > Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan  ke Negara Taiwan</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >terima kasih.</th> 
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
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
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

 <br pagebreak="true">
			 <br><br><br><br><br><br><br><br><br>
      <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"><br><br><br><br><br><br><br><br><br>Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="22">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="16">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="29">YTH.'.$kepada3.' <br>Di tempat.</th> 
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
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
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
					<th colspan="8" > </th> 
					<th colspan="34" > Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan  ke Negara Taiwan</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >terima kasih.</th> 
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
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
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
 <br pagebreak="true">
      <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"><br><br><br><br><br><br><br><br><br>Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="22">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="16">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="29">YTH.'.$kepada4.' <br>Di tempat.</th> 
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
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
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
					<th colspan="8" > </th> 
					<th colspan="34" > Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan  ke Negara Taiwan</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >terima kasih.</th> 
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
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
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

function cetakppdis($id_pembuatan) {
		$nomor 				= $this->m_printdata->tampilnomor4($id_pembuatan);
		$lampiran 			= $this->m_printdata->tampillampiran4( $id_pembuatan);
		$perihal 			= $this->m_printdata->tampilperihal4($id_pembuatan);
		$kepada 			= $this->m_printdata->tampilkepada4($id_pembuatan);

		$hongkong 			= $this->m_printdata->hongkong($id_pembuatan);
		$malaysia 			= $this->m_printdata->malaysia($id_pembuatan);
		$singapura 			= $this->m_printdata->singapura($id_pembuatan);
		$taiwan 			= $this->m_printdata->taiwan($id_pembuatan);
function Terbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
 
 
}

		$total= $hongkong+$malaysia+$singapura+$taiwan;
		$angkahuruf =ucwords(Terbilang($total));

		$tanggal 			=date('d-m-Y');

// 		$originalDate = $tgllahir;
// $newDate = date("d-m-Y", strtotime($originalDate));

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
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
			<table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32"  style="text-align:justify" >Dengan ini kami mengajukan permohonan kepada Bapak untuk diterbitkan permohonan Perjanjian Penempatan Calon TKI sebanyak '.$total.' ('.$angkahuruf.') orang  orang untuk Negara tujuan:</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>	
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Hongkong</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> '.$hongkong.'</th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Malaysia</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> '.$malaysia.'</th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Singapura</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> '.$singapura.'</th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Taiwan</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> '.$taiwan.'</th> 
					<th colspan="8" > orang</th> 
				</tr>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" ></th> 
					<th colspan="2" ></th>
					<th colspan="8" >__________________</th> 
					<th colspan="8" > </th> 
				</tr>			
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th align="right" colspan="10" >JUMLAH</th> 
					<th colspan="2" >:</th>
					<th colspan="8" align="center"> '.$total.'</th>  
					<th colspan="8" > orang</th> 
				</tr>				
				<br>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30"  style="text-align:justify">Daftar nominasi terlampir. <br>Rekom Paspor tersebut kami mohon ditujukan kepada '.$imigrasi.'.</th>
				</tr>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30" >Demikian atas bantuan Bapak, kami sampaikan terima kasih</th>
				</tr>							
			 </table>
			 <br><br><br><br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
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
			 </table><br><br>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('REKOM PEMBUATAN SKCK.pdf', 'I');    
    }

    	function cetaksponsor() {

    				$tampil_data_sponsor = $this->m_printdata->tampil_data_sponsor();

$datasponsornya='';
$no=1;
   foreach ($tampil_data_sponsor as $row) {

                $datasponsornya.='
                 <tr>
                 <th>'.$no.'</th>
						<th>'.strtoupper($row->kode_sponsor).'</th>
						<th>'.strtoupper($row->nama).' </th>
						<th>'.$row->hp.' </th>
						<th>'.$row->email.'</th>
						<th>'.strtoupper($row->alamat).' </th>
						<th>'.strtoupper($row->status).' </th>
					</tr>';

					$no++;
                }
		
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-16', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMA JASA');
    $pdf->SetTitle('DATA SPONSOR');
    $pdf->SetSubject('SPONSOR');
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
    $pdf->SetFont('times', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '
			  <table align="center" width="100%" cellspacing="0" cellpadding="2" >
				<tr>
					<th colspan="2"  ></th>
					<th align="CENTER" colspan="120"><b>DATA SPONSOR PT FLAMBOYAN GEMA JASA </b></th>
					<th><b></b></th>
					<th><b></b></th>
				 </tr>
				 <br>
				<tr>
					<th ></th>
					<th width="100%"><table align="center"  cellspacing="0" cellpadding="2" border="0.1em">
					<tr>
						<th width="4%" > <b>NO</b> </th>
						<th width="10%"> <b>KODE SPONSOR</b></th>
						<th width="26%" > <b>NAMA</b> </th>
						<th width="10%" > <b>HP </b></th>
						<th width="10%" > <b>EMAIL</b> </th>
						<th width="30%" > <b>ALAMAT</b> </th>
						<th width="10%" > <b>STATUS </b></th>
					</tr>
					'.$datasponsornya.'
				
					</table>
					</th>   
				</tr>
			</table><br><br>
		
			 
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   

	$pdf->Output('Data Sponsor PT FLAMBOYAN.pdf', 'I');    
    }


function cetakdisnakerword($id_pembuatan) {
include("html_to_doc.php");

		$idtkinya = $this->m_printdata->ambilidtki($id_pembuatan);
		$eksnya = $this->m_printdata->ambileksnya($id_pembuatan);

		$dataeks='<th colspan="35">EKS/Baru</th> ';
		if($eksnya=='eks'){
$dataeks='<th colspan="35">EKS/<strike>Baru</strike></th> ';
		}else{
$dataeks='<th colspan="35"><strike>EKS</strike>/Baru</th> ';
		}

		$datadisnaker = $this->m_printdata->ambildisnakernya($idtkinya);

		$stts = substr($idtkinya, 0, 2);
		$formal='<th colspan="35">Formal / Informal</th>';
		if($stts=='FI'){
			$formal='<th colspan="35"><strike>Formal</strike> / Informal</th>';
		}
		if($stts=='MI'){
			$formal='<th colspan="35"><strike>Formal</strike> / Informal</th>';
		}
		if($stts=='FF'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
		if($stts=='MF'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
		if($stts=='JP'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
$nama='';
		foreach($datadisnaker->result() as $row) {
			$nama = $row->nama;
			$tempatlahir = $row->tempatlahir;
			$tanggallahir2 = $row->tanggallahir;
			$noktp = $row->noktp;
			$jeniskelamin = $row->jeniskelamin;
			$agama = $row->agama;
			$status = $row->status;
			$pendidikan = $row->pendidikan;
			$alamat = $row->alamat;
			$namaayah = $row->namaayah;
			$namaibu = $row->namaibu;
			$namaahli = $row->namaahli;
			$namakontak = $row->namakontak;
			$alamatkontak = $row->alamatkontak;
			$hubkontak = $row->hubkontak;
			$tglonline = $row->tglonline;
			$perkiraan = $row->perkiraan;
			$negara = $row->negara;
			$jabatan = $row->jabatan;
			$ahliwaris = $row->ahliwaris;
			$jmlanak = $row->jmlanak;
			$agency2 = $row->agency;
			$matauang = $row->matauang;
			$sektorusaha = $row->sektorusaha;
			$gaji = $row->gaji;
			$nopaspor = $row->nopaspor;
			$masaberlaku = $row->masaberlaku;
			$masahabis = $row->masahabis;
			$tglberangkat = $row->tglberangkat;
			$tgltiba = $row->tgltiba;

		}

if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

		$agama=str_replace("回教","",$agama);
		$agama=str_replace("基督教","",$agama);
		$agama=str_replace("天主教","",$agama);
		$agama=str_replace("印度教","",$agama);
		$agama=str_replace("佛教","",$agama);

		$datapen = $this->m_printdata->ambilpendmandarin();
		$agency = $this->m_printdata->ambilagency($agency2);

		for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

$lahiran=str_replace(".","-",$tanggallahir2);
$tanggallahir = date("d-m-Y", strtotime($lahiran));

if($tglberangkat==null){
$tglbrkt ="";

}else{
	$originalDate2=str_replace(".","-",$tglberangkat);
$tglbrkt = date("d-m-Y", strtotime($originalDate2));
}

if($tgltiba==null){
$tgltb ="";

}else{
$originalDate3=str_replace(".","-",$tgltiba);
$tgltb = date("d-m-Y", strtotime($originalDate3));
}




$tgl4="";
if($masaberlaku==null){
$tgl4="";
}else{
$originalDate4=str_replace(".","-",$masaberlaku);
$tgl4 = date("d-m-Y", strtotime($originalDate4));
}

$tgl5="";
if($masahabis==null){
$masahabis="";
}else{
$originalDate5=str_replace(".","-",$masahabis);
$tgl5 = date("d-m-Y", strtotime($originalDate5));
}


	// Set some content to print
	
    $html = '
    <style>
.tidakbold{ font-weight:normal; }
</style>
<div class="Section1"> <p align="center">FORMAT PENGISIAN TKI ON LINE</p>
			<br>
			
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
                <th colspan="3" ></th>
                <th colspan="25" >TKI</th>
                <th colspan="2">:</th>
              	'.$dataeks.'
              	<th colspan="15">*)</th>             
             </tr>
			 <tr>
                <th colspan="3" ></th>
                <th colspan="25" >Sektor</th>
                <th colspan="2">:</th>
              	'.$formal.'
              	<th colspan="15">**)</th>             
             </tr>
			 </table><br><br>
			 
			<table align="left" class="tidakbold" width="100%" cellspacing="0" cellpadding="2" border="1">
			<tr>
                <th align="center" colspan="3">No</th>
                <th align="center" colspan="62">Uraian</th>
                <th align="center" colspan="15">Ket</th>
                
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >1</th>
                <th class="tidakbold"  colspan="25" align="left" > NAMA TKI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$nama.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >2</th>
                <th class="tidakbold"  colspan="25"  align="left"> NAMA IBU</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$namaibu.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >3</th>
                <th class="tidakbold"  colspan="25" align="left" > NAMA AYAH</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$namaayah.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >4</th>
                <th class="tidakbold"  colspan="25" align="left" > JENIS KELAMIN</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$jeniskelamin.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >5</th>
                <th class="tidakbold"  colspan="25" align="left" > TEMPAT LAHIR</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$tempatlahir.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >6</th>
                <th class="tidakbold"  colspan="25" align="left" > TANGGAL LAHIR</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$tanggallahir.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >7</th>
                <th class="tidakbold"  colspan="25"  align="left"> NO. KTP TKI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$noktp.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >8</th>
                <th class="tidakbold"  colspan="25" align="left" > ALAMAT TKI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$alamat.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >9</th>
                <th class="tidakbold"  colspan="25" align="left" > PROPINSI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> JAWA TIMUR</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >10</th>
                <th class="tidakbold"  colspan="25" align="left" > KOTA ASAL TKI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$tempatlahir.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >11</th>
                <th class="tidakbold"  colspan="25" align="left" > ALAMAT ORANG TUA TKI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$alamatkontak.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >12</th>
                <th class="tidakbold"  colspan="25" align="left" > KOTA ORANG TUA TKI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$namaahli.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >13</th>
                <th class="tidakbold"  colspan="25" align="left" > STATUS PERKAWINAN TKI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$status.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >14</th>
                <th class="tidakbold"  colspan="25" align="left"> AGAMA</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$agama.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >15</th>
                <th class="tidakbold"  colspan="25" align="left"> PENDIDIKAN</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$pendidikan.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >16</th>
                <th class="tidakbold"  colspan="25" align="left"> AGENCY</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$agency.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >17</th>
                <th class="tidakbold"  colspan="25" align="left"> MATA UANG</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$matauang.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >18</th>
                <th class="tidakbold"  colspan="25" align="left"> JABATAN</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$jabatan.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >19</th>
                <th class="tidakbold"  colspan="25" align="left"> SEKTOR USAHA</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$sektorusaha.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >20</th>
                <th class="tidakbold"  colspan="25" align="left"> GAJI TKI</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$gaji.'</th> 
              	<th class="tidakbold"  colspan="15" align="left"></th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >21</th>
                <th class="tidakbold"  colspan="25" align="left"> NO PASPOR</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$nopaspor.'</th> 
              	<th class="tidakbold"  colspan="15" align="left">NO. 21 s/d 25</th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >22</th>
                <th class="tidakbold"  colspan="25" align="left"> MASA BERLAKU</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$tgl4.'</th> 
              	<th class="tidakbold"  colspan="15" align="left">Harus diisi</th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >23</th>
                <th class="tidakbold"  colspan="25" align="left"> MASA HABIS BERLAKU</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$tgl5.'</th> 
              	<th class="tidakbold"  colspan="15" align="left">Bagi TKI yang</th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >24</th>
                <th class="tidakbold"  colspan="25" align="left"> TGL. BERANGKAT </th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$tglbrkt.'</th> 
              	<th class="tidakbold"  colspan="15" align="left">Eks/pernah</th>             
             </tr>
			 <tr>
                <th class="tidakbold"  align="center" colspan="3" >25</th>
                <th class="tidakbold"  colspan="25" align="left"> TGL. TIBA</th>
                <th class="tidakbold"  colspan="2" align="left">:</th>
              	<th class="tidakbold"  colspan="35" align="left"> '.$tgltb.'</th> 
              	<th class="tidakbold"  colspan="15" align="left">ke luar negeri</th>             
             </tr>
			
			 </table><br><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
                <th class="tidakbold"  colspan="5"  align="left">*)</th>
                <th class="tidakbold"   colspan="77" align="left">Coret Salah Satu</th>
              	       
             </tr>
			 <tr>
                <th class="tidakbold"  colspan="5"  align="left">**)</th>
                <th class="tidakbold"   colspan="77" align="left">Bagi TKI Baru/yang belum pernah ke luar negeri untuk nomor 21 s/d 25 tidak perlu diisi</th>
              	          
             </tr>
			 </table>

			 <div>';
			
  // ;
$htmltodoc= new HTML_TO_DOC();
 
// Pass the variable which contains the code to the object. 
// The 3rd parameter forces to download the generated Microsoft Word document.
$htmltodoc->createDoc($html, "cetakdisnaker.doc", true);
  
    }

    function cetak_rekom_desa_word($id_pembuatan) {
    	include("html_to_doc.php");
		$nomor 				= $this->m_printdata->tampilnomordesa($id_pembuatan);
		$lampiran 			= $this->m_printdata->tampillampirandesa($id_pembuatan);
		$perihal 			= $this->m_printdata->tampilperihaldesa($id_pembuatan);
		$kepada 			= $this->m_printdata->tampilkepadadesa($id_pembuatan);

		$idtki 			= $this->m_printdata->ambiliddesa($id_pembuatan);

		$nama 				= $this->m_printdata->tampilnamatkidesa($idtki);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahirdesa($idtki);
		$tgllahir 			= $this->m_printdata->tampiltgllahirdesa($idtki);
		$jabatan 			= $this->m_printdata->tampiljabatandesa($idtki);
		$alamat 			= $this->m_printdata->tampilalamatdesa($idtki);
		$tanggal 			=date('d-m-Y');

		$tanggalan = str_replace(".","-",$tgllahir);
		// $originalDate = ;
$newDate = date("d-m-Y", strtotime($tanggalan)); 
    
	// Set some content to print
	
    $html = '<div class="Section1"><style>.tidakbold{ font-weight:normal; }</style>
	<br><br><br><br><br>
    <table align="left" width="110%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18" align="left" class="tidakbold">Lawang, '.$tanggal.'<br><br></th>
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8" align="left" class="tidakbold">Nomor</th> 
					<th colspan="3" align="left" class="tidakbold">:</th> 
					<th colspan="16" align="left" class="tidakbold">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18" class="tidakbold">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8" align="left" class="tidakbold">Lampiran <br>Perihal</th> 
					<th colspan="3" align="left" class="tidakbold">: <br>:</th> 
					<th colspan="16" align="left" class="tidakbold">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="21" align="left" class="tidakbold">YTH.'.$kepada.' <br>Di tempat.</th> 
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
											
			 </table><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" align="left" class="tidakbold">Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="5" > </th> 
					<th colspan="30" align="left" class="tidakbold">Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br>
								
			 </table>
			 <br><br>
			  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="20" align="left" class="tidakbold">Nama</th> 
					<th colspan="2" align="left" class="tidakbold">:</th> 
					<th colspan="25" align="left" class="tidakbold">IMMANUEL DARMAWAN SANTOSO</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="20" align="left" class="tidakbold">Jabatan</th> 
					<th colspan="2" align="left" class="tidakbold">:</th> 
					<th colspan="25" align="left" class="tidakbold">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="20" align="left" class="tidakbold">Alamat</th> 
					<th colspan="2" align="left" class="tidakbold">:</th> 
					<th colspan="25" align="left" class="tidakbold">JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI LAWANG-MALANG</th> 
				</tr>
				<tr>
				<br><br><br>
					<th colspan="6"></th> 
					<th colspan="36" align="left" class="tidakbold">dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<tr>
				<br><br>
					<th colspan="6"></th> 
					<th colspan="20" align="left" class="tidakbold">Nama</th> 
					<th colspan="2" align="left" class="tidakbold">:</th> 
					<th colspan="25" align="left" class="tidakbold">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="20" align="left" class="tidakbold">Tempat Tanggal Lahir</th> 
					<th colspan="2" align="left" class="tidakbold">:</th> 
					<th colspan="25" align="left" class="tidakbold">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="20" align="left" class="tidakbold">Jabatan</th> 
					<th colspan="2" align="left" class="tidakbold">:</th> 
					<th colspan="25" align="left" class="tidakbold">Calon Tenaga Kerja Indonesia (CTKI)</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="20" align="left" class="tidakbold">Alamat</th> 
					<th colspan="2" align="left" class="tidakbold">:</th> 
					<th colspan="25" align="left" class="tidakbold">'.$alamat.'</th>
				</tr>
				<tr> 
				<br><br><br><br>
					<th colspan="4" > </th> 
					<th colspan="50" align="left" class="tidakbold">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk Pengurusan Ijin sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan. </th> 
				</tr>
				<tr>
					<th colspan="4" > </th> 
					<th colspan="50" align="left" class="tidakbold">Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</th> 
				</tr>
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="42" ></th> 
				</tr>											
			 </table>
			 <br><br>
			  <table align="right" width="50%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="24" align="center" class="tidakbold">PT.FLAMBOYAN GEMA JASA <br><br><br><br><br><br></th> 
				</tr>
				<tr>

					<th colspan="24" align="center" class="tidakbold"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr> 
				<th colspan="24" align="center"><b>Direktur Utama</b></th> 
					</tr>						
			 </table><br><br>


</div>

			';
			
  // ;  

$htmltodoc= new HTML_TO_DOC();
 
$htmltodoc->createDoc($html, "Rekom Ijin Desa.doc", true);  
    }


    function word($id_pembuatan) {
		include("html_to_doc.php");	
		$nomor 				= $this->m_printdata->tampilnomor2($id_pembuatan);
		$lampiran 			= $this->m_printdata->tampillampiran2($id_pembuatan);
		$perihal 			= $this->m_printdata->tampilperihal2($id_pembuatan);
		$kepada 			= $this->m_printdata->tampilkepada2($id_pembuatan);

		$daerah 			= $this->m_printdata->daerah2($id_pembuatan);
		$tglnya 			= $this->m_printdata->tglnya2($id_pembuatan);

		$idtki 			= $this->m_printdata->ambilidijin($id_pembuatan);


		$nama 				= $this->m_printdata->tampilnamatki2($idtki);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir2($idtki);
		$tgllahir 			= $this->m_printdata->tampiltgllahir2($idtki);
		$jabatan 			= $this->m_printdata->tampiljabatan2($idtki);
		$alamat 			= $this->m_printdata->tampilalamat2($idtki);
		$tanggal 			=date('d-m-Y');

		$tanggalan = str_replace(".","-",$tgllahir);
$newDate = date("d-m-Y", strtotime($tanggalan));

    // create new doc document
    
	// Set some content to print
	
    $html = '
    <div Class="Section1">
	<style type="text/css">
	  .a {
		  font-weight:normal;
		  font-size:16px;
	  }
	</style>
	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
			 
    <table align="left" width="110%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18" class="a" align="left">'.$daerah.', '.$tglnya.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="9" class="a">Nomor</th> 
					<th colspan="2">:</th> 
					<th colspan="16" class="a" align="left">'.$nomor.'</th> 
					<th colspan="6"></th> 
					<th colspan="3"></th> 
					<th colspan="18" class="a" align="left">Kepada</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="6" class="a">&emsp;Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="14" class="a" align="left">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="27" class="a" align="left">YTH.'.$kepada.' <br>Di tempat.</th> 
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

			 <br><br>
			 <table align="left" width="60%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="1" > </th> 
					<th colspan="11" class="a" style="margin-right:24%;"> Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th> </th> 
					<th colspan="50" class="a" style=""> Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br><br>
								
			 </table>
			 <br><br>
			  <table align="left" width="110%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6" align="left"></th> 
					<th colspan="10" class="a" align="left">Nama</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">IMMANUEL DARMAWAN SANTOSO</th> 
				</tr>
				<tr>
					<th colspan="6" align="left"></th> 
					<th colspan="10" class="a" align="left">Jabatan</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6" align="left"></th> 
					<th colspan="10" class="a" align="left">Alamat</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="30" class="a" align="left">JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI <br> LAWANG-MALANG</th> 
				</tr>
				
				<tr>
					<th colspan="6"></th>
					<th colspan="34" class="a"><br>dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				
				<br>
				<tr>
					<th colspan="6" class="a" align="left"></th> 
					<th colspan="10" class="a" align="left">Nama</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6" class="a" align="left"></th> 
					<th colspan="10" class="a" align="left">Tempat Tanggal Lahir</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6" class="a" align="left"></th> 
					<th colspan="10" class="a" align="left">Jabatan</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">Calon Tenaga Kerja Indonesia (CTKI)</th> 
				</tr>
				<tr>
					<th colspan="6" align="left"></th> 
					<th colspan="10" class="a" align="left">Alamat</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$alamat.'</th> 
				</tr>
				
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" class="a" align="left"><br>Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk Pengurusan Ijin sebagai <br>salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan. </th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40"  class="a" align="left">Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</th> 
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
					<th colspan="24" align="right" class="a">PT.FLAMBOYAN GEMA JASA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
				</tr><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" class="a" align="right"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" class="a" align="right" style="margin-right:10%;"><b>Direktur Utama</b></th> 
					</tr>						
			 </table>
			 <br style="page-break-before: always">
			 
			  <br pagebreak="true">
				<br><br><br><br>
			   <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
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
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18" class="a">'.$daerah.', '.$tglnya.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8" class="a" align="left">Nomor</th> 
					<th colspan="3" class="a" align="left">:</th> 
					<th colspan="16" class="a" align="left">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18" class="a" align="left">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8" class="a" align="left">Lampiran <br>Perihal</th> 
					<th colspan="3" class="a" align="left">: <br>:</th> 
					<th colspan="16" class="a" align="left">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="25" class="a" align="left">YTH.'.$kepada.' <br>Di tempat.</th> 
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
			<table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" class="a" align="left"><br>Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32"  style="text-align:justify" class="a">Dengan ini kami mengajukan permohonan kepada Bapak untuk diterbitkan permohonan Perjanjian Penempatan Calon TKI sebanyak 1 ( Satu ) orang  orang untuk Negara tujuan:</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>	
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" class="a">Hongkong</th> 
					<th colspan="2" class="a">:</th> 
					<th colspan="8" align="center"></th> 
					<th colspan="6" class="a">orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" class="a">Malaysia</th> 
					<th colspan="2" class="a">:</th> 
					<th colspan="8" align="center"> </th> 
					<th colspan="6" class="a">orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" class="a">Singapura</th> 
					<th colspan="2" class="a">:</th> 
					<th colspan="8" align="center"> </th> 
					<th colspan="6" class="a">orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" class="a">Taiwan</th> 
					<th colspan="2" class="a">:</th> 
					<th colspan="8" class="a"align="center"> 1 </th> 
					<th colspan="6" class="a">orang</th> 
				</tr>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" ></th> 
					<th colspan="2" ></th>
					<th colspan="8" class="a">__________________</th> 
					<th colspan="6" > </th> 
				</tr>			
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th align="right" colspan="10" class="a">JUMLAH</th> 
					<th colspan="2" class="a">:</th>
					<th colspan="8" align="center" class="a">1</th>  
					<th colspan="6" class="a"> orang</th> 
				</tr>				
				<br>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30"  class="a" style="text-align:left"><br>Daftar nominasi terlampir. <br>Rekom Paspor tersebut kami mohon ditujukan kepada Kepala Kantor Imigrasi di kelas I Malang.</th>
				</tr>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30" class="a">Demikian atas bantuan Bapak, kami sampaikan terima kasih<br><br><br><br><br></th>
				</tr>							
			 </table>
			 <br><br><br><br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="right" class="a">PT.FLAMBOYAN GEMA JASA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
				</tr><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="right" class="a"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
				<th colspan="24" align="right" class="a" style="margin-right:10%;"><b>Direktur Utama</b></th> 
					</tr>						
			 </table><br><br>
</div>
			';
  // Create the object from the class
$htmltodoc= new HTML_TO_DOC();
 
// Pass the variable which contains the code to the object. 
// The 3rd parameter forces to download the generated Microsoft Word document.
 
$htmltodoc->createDoc($html, "surat dl03/dl07.doc", true); 
    }

    function skckword($id_pembuatan) {
		include("html_to_doc.php");
		$nomor 				= $this->m_printdata->tampilnomor3($id_pembuatan);
		$lampiran 			= $this->m_printdata->tampillampiran3($id_pembuatan);
		$perihal 			= $this->m_printdata->tampilperihal3($id_pembuatan);
		$kepada 			= $this->m_printdata->tampilkepada3($id_pembuatan);
		$kepada2 			= $this->m_printdata->tampilkepada3b($id_pembuatan);
		$kepada3 			= $this->m_printdata->tampilkepada3c($id_pembuatan);
		$kepada4 			= $this->m_printdata->tampilkepada4c($id_pembuatan);

		$idtki 			= $this->m_printdata->ambilidskck($id_pembuatan);

		$nama 				= $this->m_printdata->tampilnamatki3($idtki);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahir3($idtki);
		$tgllahir 			= $this->m_printdata->tampiltgllahir3($idtki);
		$jabatan 			= $this->m_printdata->tampiljabatan3($idtki);
		$alamat 			= $this->m_printdata->tampilalamat3($idtki);
		$tanggal 			=date('d-m-Y');

		// $kepada=$kepada."".$kepada2."".$kepada3;

		$tanggalan = str_replace(".","-",$tgllahir);
		$newDate = date("d-m-Y", strtotime($tanggalan));

     $html = ' 
	 <style type="text/css">
	   .a {
		   font-weight:normal;
		   
	   }
	 </style>
      <div class="Section1">
	        <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18" class="a">Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8" class="a" align="left">Nomor</th> 
					<th colspan="3" class="a" align="left">:</th> 
					<th colspan="16" class="a" align="left">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th style="padding-right:40px;" colspan="22" class="a" align="left">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8" class="a" align="left">Lampiran <br>Perihal</th> 
					<th colspan="3" class="a" align="left">: <br>:</th> 
					<th colspan="16" class="a" align="left">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th style="padding-right:70px;" colspan="29" class="a" align="left">YTH.'.$kepada.' <br>Di tempat.</th> 
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
											
			 </table><br>
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" class="a" align="left"> Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="34" class="a" align="left"> Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br>
								
			 </table>
			 <br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Nama</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">Immanuel Darmawan Santoso</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Jabatan</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Alamat</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI KEC.LAWANG-MALANG</th> 
				</tr>
				<br>
				<tr>
				<br><br><br>
					<th colspan="6"></th> 
					<th colspan="40" class="a" align="left">dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br>
				<tr>
				<br><br>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Nama</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Tempat Tanggal Lahir</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Jabatan</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$jabatan.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Alamat</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$alamat.'</th> 
				</tr>
				<br>
				<tr> 
				<br><br>
					<th colspan="6" > </th> 
					<th colspan="40" class="a" align="left"><br>&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp; Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="40" class="a" align="left">Pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan  ke Negara Taiwan</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="40" class="a" align="left"><br>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp; Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" class="a" align="left">terima kasih.</th> 
				</tr>											
			 </table>
			 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24"  class="a" align="right">PT.FLAMBOYAN GEMA JASA</th>

				</tr><br><br><br><br>
				<tr>
				<br>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" class="a" align="right"><br><br><br><br><br><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
				<th colspan="24" align="right"><b>Direktur Utama</b></th> 
					</tr>						
			 </table>
			
			<br style="page-break-before: always">
	  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th class="a" colspan="18"><br><br><br><br>Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th align="left" class="a" style="font-size:14px;" colspan="8">Nomor</th> 
					<th align="left" class="a" style="font-size:14px;" colspan="3">:</th> 
					<th align="left" class="a" style="font-size:14px;" colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th align="left" class="a" colspan="22">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th align="left" class="a"  colspan="8">Lampiran <br>Perihal</th> 
					<th align="left" class="a"  colspan="3">: <br>:</th> 
					<th align="left" class="a"  colspan="16">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th align="left" class="a"  colspan="29">YTH.'.$kepada2.' <br>Di tempat.</th> 
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
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th align="left" class="a"  colspan="32" > Dengan Hormat</th> 
				</tr>			
				<tr> 

					<th colspan="6" > </th> 
					<th align="left" class="a" colspan="34">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan ini, saya :</th> 
				</tr>					
			 </table>
			 <br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0"><br>
				<tr>
					<th colspan="6"></th> 
					<th align="left" class="a"  colspan="10">Nama</th> 
					<th align="left" class="a"  colspan="2">:</th> 
					<th align="left" class="a"  colspan="25">Immanuel Darmawan Santoso</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th align="left" class="a"  colspan="10">Jabatan</th> 
					<th align="left" class="a"  colspan="2">:</th> 
					<th align="left" class="a"  colspan="25">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th align="left" class="a"  colspan="10">Alamat</th> 
					<th align="left" class="a"  colspan="2">:</th> 
					<th align="left" class="a"  colspan="25">JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI KEC.LAWANG-MALANG</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6"></th> 
					<th align="left" class="a"  colspan="45"><br>dengan ini memberikan rekomendasi kepada :<br><br></th> 
				</tr>
				<br><br><br>
				<tr>
					<th colspan="6"></th> 
					<th align="left" class="a"  colspan="10">Nama</th> 
					<th align="left" class="a"  colspan="2">:</th> 
					<th align="left" class="a"  colspan="25">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th align="left" class="a"  colspan="10">Tempat Tanggal Lahir</th> 
					<th align="left" class="a"  colspan="2">:</th> 
					<th align="left" class="a"  colspan="25">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th align="left" class="a"  colspan="10">Jabatan</th> 
					<th align="left" class="a"  colspan="2">:</th> 
					<th align="left" class="a"  colspan="25">'.$jabatan.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th align="left" class="a"  colspan="10">Alamat</th> 
					<th align="left" class="a"  colspan="2">:</th> 
					<th align="left" class="a" colspan="25">'.$alamat.'</th> 
				<br><br>
				</tr>
				
				<tr> 
					<th colspan="5" > </th> 
					<th align="left" class="a"  colspan="40" ><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="5" > </th> 
					<th align="left" class="a"  colspan="40" >Pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan  ke Negara Taiwan</th> 
				</tr>
				<br><br><br>
				<tr> 
					<th colspan="8" > </th> 
					<th align="left" class="a"  colspan="40" ><br> Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th style="margin-left:5%;" align="left" class="a"  colspan="32" >terima kasih.</th> 
				</tr>											
			 </table>
			 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			  <table style="padding-left:50px;" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>

					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th class="a"  colspan="24" align="center"><br><br><br><br><br><br><br><br>PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th>
					<th class="a"  colspan="24" align="center"><br><br><br><br><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
				<th colspan="24" align="center">Direktur Utama</b></th> 
					</tr>						
			 </table>
		<br style="page-break-before: always;">	 
	  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18" class="a"><br><br><br><br>Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8" class="a" align="left">Nomor</th> 
					<th colspan="3" class="a" align="left">:</th> 
					<th colspan="16" class="a" align="left">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="22" class="a" align="left">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8" class="a" align="left">Lampiran <br>Perihal</th> 
					<th colspan="3" class="a" align="left">: <br>:</th> 
					<th colspan="16" class="a" align="left">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="29" class="a" align="left">YTH.'.$kepada3.' <br>Di tempat.</th> 
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
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" class="a" align="left"> Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="34" class="a" align="left" style="margin-left:5%;"> Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br>
								
			 </table>
			 <br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Nama</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">Immanuel Darmawan Santoso</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Jabatan</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10"class="a" align="left">Alamat</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI KEC.LAWANG-MALANG</th> 
				</tr>
				
				<tr>
					<th colspan="6"></th> 
					<th colspan="34" class="a" align="left"><br>dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Nama</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Tempat Tanggal Lahir</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Jabatan</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$jabatan.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10" class="a" align="left">Alamat</th> 
					<th colspan="2" class="a" align="left">:</th> 
					<th colspan="25" class="a" align="left">'.$alamat.'</th> 
				</tr>
				
				<tr> 
					<th colspan="5" > </th> 
					<th colspan="40" class="a" align="center"> <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="5" > </th> 
					<th colspan="38" class="a" align="left" style="margin-left:5%;">Pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan  ke Negara Taiwan</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="5" > </th> 
					<th colspan="38" class="a" align="center"> Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" class="a" align="left" style="margin-left:5%;">terima kasih.</th> 
				</tr>											
			 </table>
			 
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="right" class="a"><br><br><br><br><br>PT.FLAMBOYAN GEMA JASA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
				</tr><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="right" class="a"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
				<th colspan="24" align="right" class="a" style="margin-right:10%;"><b>Direktur Utama</b></th> 
					</tr>						
			 </table>
		<br style="page-break-before:always;">
      <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4" class="a" ></th> 
					<th colspan="8" class="a" ></th> 
					<th colspan="3" class="a" ></th> 
					<th colspan="16" class="a" ></th> 
					<th colspan="8" class="a" ></th> 
					<th colspan="8" class="a" ></th> 
					<th colspan="18" class="a" ><br><br>Lawang, '.$tanggal.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Nomor</th> 
					<th colspan="3" class="a" >:</th> 
					<th colspan="16" class="a" align="left" >'.$nomor.'</th> 
					<th colspan="8" class="a" ></th> 
					<th colspan="22" class="a" align="left" >Kepada</th> 
				</tr>
				<tr>
					<th colspan="4" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Lampiran <br>Perihal</th> 
					<th colspan="3" class="a" >: <br>:</th> 
					<th colspan="16" class="a" align="left" >'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8" class="a" ></th> 
					<th colspan="29" class="a" align="left" >YTH.'.$kepada4.' <br>Di tempat.</th> 
				</tr>

				<tr>
					<th colspan="4" class="a" ></th> 
					<th colspan="8" class="a" ></th> 
					<th colspan="3" class="a" ></th> 
					<th colspan="16" class="a" ></th> 
					<th colspan="8" class="a" ></th> 
					<th colspan="4" class="a" ></th> 
					<th colspan="18" class="a" ></th> 
				</tr>
											
			 </table><br><br>
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" class="a" > </th>  
					<th colspan="32" class="a" align="left"> Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="5" class="a" > </th> 
					<th colspan="34" class="a" align="left" >&nbsp&nbsp&nbsp&nbsp; Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br>
								
			 </table>
			 <br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Nama</th> 
					<th colspan="2" class="a" align="left" >:</th> 
					<th colspan="25" class="a" align="left" >Immanuel Darmawan Santoso</th> 
				</tr>
				<tr>
					<th colspan="6" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Jabatan</th> 
					<th colspan="2" class="a" align="left" >:</th> 
					<th colspan="25" class="a" align="left" >Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Alamat</th> 
					<th colspan="2" class="a" align="left" >:</th> 
					<th colspan="25" class="a" align="left" >JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI KEC.LAWANG-MALANG</th> 
				</tr>
			
				<tr>
					<th colspan="6" class="a" ></th> <br><br>
					<th colspan="40" class="a" align="left" ><br><br>dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Nama</th> 
					<th colspan="2" class="a" align="left" >:</th> 
					<th colspan="25" class="a" align="left" >'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Tempat Tanggal Lahir</th> 
					<th colspan="2" class="a" align="left" >:</th> 
					<th colspan="25" class="a" align="left" >'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Jabatan</th> 
					<th colspan="2" class="a" align="left" >:</th> 
					<th colspan="25" class="a" align="left" >'.$jabatan.'</th> 
				</tr>
				<tr>
					<th colspan="6" class="a" ></th> 
					<th colspan="8" class="a" align="left" >Alamat</th> 
					<th colspan="2" class="a" align="left" >:</th> 
					<th colspan="25" class="a" align="left" >'.$alamat.'</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" class="a" > </th> 
					<th colspan="48" class="a" align="left" > <br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk</th> 
				</tr>	
				<tr> 
					<th colspan="4" class="a" > </th> 
					<th colspan="38" class="a" align="left" >Pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan  ke Negara Taiwan</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" class="a" > </th> 
					<th colspan="48" class="a" align="left" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak </th> 
				</tr>	
				<tr> 
					<th colspan="6" class="a" > </th> 
					<th colspan="32" class="a" align="left" >terima kasih.</th> 
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
					<th colspan="24" align="center" class="a" align="right" style="margin-right:3%;"><br><br>  PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center" class="a" align="right" ><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
				<th colspan="24" align="center" class="a" align="right" style="margin-right:10%;" >Direktur Utama</th> 
					</tr>						
			 </table>	 
			 
</div>			 
			';		
		
 // Create the object from the class
$htmltodoc= new HTML_TO_DOC();
 
// Pass the variable which contains the code to the object. 
// The 3rd parameter forces to download the generated Microsoft Word document.
 
$htmltodoc->createDoc($html, "skck.doc", true); 
	}
	
function cetakpaspor($id_pembuatan) {

		$nomor 				= $this->m_printdata->nomorrekompaspor($id_pembuatan);
		$tempat_rekom 		= $this->m_printdata->tempatrekompaspor($id_pembuatan);
		$tanggal 			= $this->m_printdata->tanggalrekompaspor($id_pembuatan);

		$idtki 				= $this->m_printdata->ambilidpaspor($id_pembuatan);

		$nama 				= $this->m_printdata->tampilnamatkipaspor($idtki);
		$tempatlahir 		= $this->m_printdata->tampiltempatlahirpaspor($idtki);
		$tgllahir 			= $this->m_printdata->tampiltgllahirpaspor($idtki);
		$alamat 			= $this->m_printdata->tampilalamatpaspor($idtki);
		$noktp 				= $this->m_printdata->tampilnoktppaspor($idtki);
		$tanggal 			=date('d-m-Y');

		
		$tanggalan = str_replace(".","-",$tgllahir);
	$newDate = date("d-m-Y", strtotime($tanggalan));
	// create new PDF document
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	$pdf->SetTitle('REKOM PASPOR');
	$pdf->SetSubject('SURAT REKOMENDASI PASPOR');
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

	$html = ' <br><br><br><br><br><br><br><br><br>
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
					<th colspan="2">:</th> 
					<th colspan="18">'.$nomor.'</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="2">: <br>:</th> 
					<th colspan="16"> - <br>Permohonan Penerbitan Paspor TKI</th> 
					 
				</tr>
				<br><br>
				<tr>
				<th colspan="4"></th> 
				<th colspan="22">Kepada YTH.<br>Kepala Kantor Imigrasi Kelas II '.$tempat_rekom.'<br>Di '.$tempat_rekom.'.</th>
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
			<table align="left" margin-right="500px;" width="95%" cellspacing="0" cellpadding="2" border="0">
			
			<tr> 
			<th colspan="2" > </th> 
			<th colspan="34" >Bersama ini kami mengajukan permohonan Penerbitan Pembuatan Paspor kepada Calon Pekerja Migran Indonesia (CPMI) sebanyak 1 (satu) orang, tujuan Negara Taiwan kepada Kantor Imigrasi '.$tempat_rekom.', sebagaimana daftar terlampir.</th> 
			</tr>		
			</table>
			<br><br><br>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2">No</th> 
					<th colspan="13">Nama & Tempat Tanggal Lahir </th> 
					<th colspan="19">Alamat</th> 
					<th colspan="9">No.KTP</th> 
				</tr>
				<tr> 
					<th colspan="2">1</th> 
					<th colspan="13">'.$nama.',<br>'.$tempatlahir.','.$tgllahir.'</th> 
					<th colspan="19">'.$alamat.'</th> 
					<th colspan="9">'.$noktp.'</th> 
				</tr>
			</table>
			<br><br><br>
			<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="2"></th>
					<th colspan="28">Demikian atas bantuan dan kerjasamanya kami ucapkan terima kasih. </th>
				</tr>
			</table>
			<br><br><br>
			<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="2"></th>
					<th colspan="28">Hormat kami,<br>
					PT. FLAMBOYAN GEMAJASA
					</th>
				</tr>
				
			<br><br><br><br><br>
				<tr>
					<th colspan="2"></th>
					<th colspan="28"><b><u>IMMANUEL DARMAWAN SANTOSO</u></b><br>
					Direktur Utama 
					</th>
				</tr>
			</table>
			';
			
	// ;  

	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	ob_end_clean();   
	$pdf->Output('REKOM PEMBUATAN PASPOR.pdf', 'I');    
	}
	
}