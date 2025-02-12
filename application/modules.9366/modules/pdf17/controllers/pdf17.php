<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pdf17 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf17');
			$this->load->library('Pdf');
	}
	
	function cetak() {

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
     $pdf->SetMargins(10, 50, 10);
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
  
	// Set some content to print
	
    $html = '<p align="left">DATA ENTRY VISKAL SURABAYA</p>
			<br>		 
			<table align="left" width="80%" cellspacing="0" cellpadding="2" border="0.1em">
			<tr>
                <th colspan="20" >ID DISNAKER ONLINE</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th align="center" colspan="20" >ID SBK</th>
              	<th align="center" colspan="35" >F862</th>         
             </tr>
			<tr>
                <th colspan="20" >NAMA</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TAMPAT LAHIR</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TANGGAL LAHIR</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NOMER KTP</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >JENIS KELAMIN</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >AGAMA</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >STATUS PERKAWINAN</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >PENDIDIKAN</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >ALAMAT</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NAMA AYAH</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NAMA IBU</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NAMA MEDICAL</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NOMER MEDICAL</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TANGGAL MEDICAL</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NOMER PASSWORD</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TANGGAL BERLAKU - BERAKHIR</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >ISSUING OFFICE</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NO VISA</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NEGARA</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >JABATAN</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NAMA AGENCY</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NAMA MAJIKAN</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TELEPON</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >ALAMAT MAJIKAN</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TELEPON</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NOMER PAP</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TANGGAL PAP</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NAMA BANK</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NOMER REKENING BANK</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TANGGAL REKENING BANK</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >NOMER ASURANSI PALADIN</th>
              	<th colspan="35" ></th>         
             </tr>
			<tr>
                <th colspan="20" >TANGGAL ARUSANSI</th>
              	<th colspan="35" ></th>         
             </tr>
			</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}