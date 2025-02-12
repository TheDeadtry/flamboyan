<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Akhir2 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_akhir2');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('PENGAJUAN KE BANK TANPA ID');
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
  
	// Set some content to print
	
    $html = '<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" > NO</th>  
					<th colspan="8" > NAM TKI</th> 
					<th colspan="4" > NO. PASSPORT</th> 
					<th colspan="2" > NO. ID</th>
					<th colspan="6" > NO. SURAT PENGAJUAN</th>
					<th colspan="6" > NAMA PJTKI</th>
					<th colspan="6" > MARKETING MANAGER </th>
					
				</tr>
				<tr>
					<th colspan="2" >1 </th>  
					<th colspan="8" > .....</th> 
					<th colspan="4" > .....</th> 
					<th colspan="8" > .....</th> 
					<th colspan="6" >..... </th>
					<th colspan="6" >..... </th>
					
				</tr>
							
			 </table>
			
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}