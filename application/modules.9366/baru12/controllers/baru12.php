<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class baru12 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_baru12');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('FOTOCOPY NOTARIS LEGALITAS');
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
						<td width="50%">................................../..................................</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Tempat /Tanggal lahir</td>
						<td width="2%">:</td>
						<td width="50%">................................../..................................</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Jenis Kelamin</td>
						<td width="2%">:</td>
						<td width="20%">..................................</td>
					</tr>
					<tr>
						<td width="5%"></td>
						<td width="25%">Alamat</td>
						<td width="2%">:</td>
						<td width="20%">..................................</td>
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
						<td width="100%" align="justify">Adalah BENAR dan DAPAT DIPERTANGGUNG JAWABKAN.</td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify">Apabila dokumen – dokumen tersebut ternyata tidak benar / palsu, maka dalam hal ini saya bertanggung jawab atas denda maupun hukum yang berlaku serta tidak akan melibatkan PT.Flamboyan Gemajasa Lawang.</td>
					</tr>
					<br>
					<tr>
						<td width="100%" align="justify">Dengan ini menyatakan pula bahwa saya BELUM / PERNAH berangkat ke LUAR NEGERI dalam rangka apapun.</td>
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
					<td width="30%">Malang,............................</td>
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
					<td width="30%">(..........................................)</td>
					<td width="30%"></td>
					<td width="25%">(..........................................)</td>
				</tr>
			</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('FOTOCOPY NOTARIS LEGALITAS.pdf', 'I');    
    }
}