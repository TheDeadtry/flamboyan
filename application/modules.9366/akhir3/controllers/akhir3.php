<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Akhir3 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_akhir3');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('PERINCIAN KEUANGAN KE AGENCY TAIWAN');
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
    $pdf->SetFont('simsun', '', '11', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="62" >PERINCIAN KEUANGAN KE AGENCY TAIWAN</th>  
				</tr>
				<tr>
					<th colspan="62" >TO : NAMA AGEN /NAMA GRUP</th>  
				</tr>
							
			 </table>
			 <br><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="1" > NO</th>  
					<th colspan="3" > ID TKI 工人編號 </th> 
					<th colspan="4" > NAMA TKI 工人名字 </th> 
					<th colspan="3" > NAMA AGEN 仲介名字 </th>
					<th colspan="4" > NAMA MAJIKAN 雇主/工廠名字 </th>
					<th colspan="4" > FEE KE TAIWAN 國外款 </th>
					<th colspan="6" > PENCAIRAN DARI BANK 銀行撥款 </th>
					<th colspan="4" > KE PJTKI 給印仲 </th>
					<th colspan="2" > SALDO 結餘 </th>
					<th colspan="4" > KETERANGAN 備註 </th>
					
				</tr>
				<tr>
					<th colspan="1" > 1</th>  
					<th colspan="3" > ........ </th> 
					<th colspan="4" > ........ </th> 
					<th colspan="3" > ........ </th>
					<th colspan="4" > ........ </th>
					<th colspan="4" > ........ </th>
					<th colspan="6" > ........ </th>
					<th colspan="4" > ........ </th>
					<th colspan="2" > ...... </th>
					<th colspan="4" > ........ </th>
					
				</tr>
							
			 </table>
			
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}