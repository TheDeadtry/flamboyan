<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Baru9 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_baru9');
			$this->load->library('Pdf');
	}
	
	

      function cetak($id_pernyataan) {
      	$nama 				= $this->m_baru9->tampilnamatki($id_pernyataan);
		$tempatlahir 		= $this->m_baru9->tampiltempatlahir($id_pernyataan);
		$tgllahir 			= $this->m_baru9->tampiltgllahir($id_pernyataan);
		$alamat 			= $this->m_baru9->tampilalamat($id_pernyataan);
		$nama_bapak 		= $this->m_baru9->tampilnama_bapak($id_pernyataan);
		$tempat 			= $this->m_baru9->tampiltempat($id_pernyataan);
		$tgl 				= $this->m_baru9->tampiltgl($id_pernyataan);
		$alamat2 			= $this->m_baru9->tampilalamat2($id_pernyataan);
		$tempat3 			= $this->m_baru9->tampiltempat3($id_pernyataan);
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT PERNYATAAN AHLI WARIS (banyuwangi) OK');
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
					<td width="25%">'.$tempat3.'</td>
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
	$pdf->Output('SURAT PERNYATAAN AHLI WARIS (banyuwangi) OK.pdf', 'I');    
    }
}