<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class akhir6 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_akhir6');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('PAP01-PENGAJUAN KPA PAP TGL 28-01-2015');
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
  
	// Set some content to print
	
    $html ='<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
					<h3><b>LAMPIRAN BUKTI SETOR</b></h3>
					<h3><b>PEMBAYARAN PREMI ASURANSI TKI TAIWAN</b></h3>
    		</table>
    		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="4"  > No </th>
					<th colspan="8"  > No ID </th>
					<th colspan="15" > Nama /Tt l</th>
					<th colspan="4"  > L/P </th>
					<th colspan="15" > Alamat </th>
					<th colspan="10" > No.Paspor </th>
					<th colspan="8"  > Jml Uang (Rp) </th>
					<th colspan="8"  > Ahli Waris </th>
				</tr>
				<tr>
					<td colspan="4"  >1</td>
					<td colspan="8"  >..............</td>
					<td colspan="15" >..............</td>
					<td colspan="4"  >....</td>
					<td colspan="15" >..............</td>
					<td colspan="10" >..............</td>
					<td colspan="8"  >..............</td>
					<td colspan="8"  >..............</td>
				</tr>
			</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('PAP01-PENGAJUAN KPA PAP TGL 28-01-2015.pdf', 'I');    
    }
}