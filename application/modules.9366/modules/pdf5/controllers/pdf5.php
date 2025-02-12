<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pdf5 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf5');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('1. PKJ01-PK WANITA INFOMAL-BLANK');
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
    $pdf->SetFont('times', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = ' <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">Kediri, 07-01-2015</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">   /SR-BMB/I/2015</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran</th> 
					<th colspan="3">:</th> 
					<th colspan="16">-</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">YTH. Kepala Ds. Wonorejo</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Perihal</th> 
					<th colspan="3">:</th> 
					<th colspan="16">:  Surat Rekomendasi Untuk</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Kec.Pagerwojo Kab.Tulungagung </th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16">Pembuatan Ijin</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Di Tempat.</th> 
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
					<th colspan="25">......</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">......</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">......</th> 
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
					<th colspan="25">......</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Tempat Tanggal Lahir</th> 
					<th colspan="2">:</th> 
					<th colspan="25">......</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">......</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">......</th> 
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
					<th colspan="24">        PT.FAMBOYAN GEMASJASA LAWANG</th> 
				</tr><br><br><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="5"></th> 
					<th align="center" colspan="10"> Anik Winarsih Direktur Utama </th> 
				</tr>
				
											
			 </table><br><br>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('1. PKJ01-PK WANITA INFOMAL-BLANK.pdf', 'I');    
    }
}