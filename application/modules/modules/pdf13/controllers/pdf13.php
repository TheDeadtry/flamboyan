<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pdf13 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf13');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
     $pdf->SetMargins(5, 10, 5);
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
	
    $html = '<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> DAFTAR NOMINASI CALON TKI YANG DINYATAKAN LULUS SELEKSI UNTUK PASPOR DARI</b></th>   
				</tr>
				<tr>
					<th><b>PT. FLAMBOYAN GEMAJASA LAWANG</b></th>  
				</tr>				
			 </table><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" > NO</th>  
					<th colspan="3" > PAS FOTO</th> 
					<th colspan="8" > NAMA CALON TCKI</th> 
					<th colspan="8" > JENIS KELAMIN</th>
					<th colspan="4" > STATUS</th>
					<th colspan="7" > ALAMAT CTKI</th>
					<th colspan="5" > AGAMA</th>
					<th colspan="5" > PEND AKHIR</th>
					<th colspan="5" > JABATAN</th>  
					<th colspan="9" > NAMA & ALAMAT SUAMI/ISTRI CTKI</th>  
					<th colspan="9" > NAMA & ALAMAT ORANG TUA CTKI</th>  
					<th colspan="5" > TUJUAN</th>  
				</tr>
				<tr>
					<th colspan="2" >1 </th>  
					<th colspan="3" > .....</th> 
					<th colspan="8" > .....</th> 
					<th colspan="8" > ....</th>
					<th colspan="4" >..... </th>
					<th colspan="7" >..... </th>
					<th colspan="5" >..... </th>
					<th colspan="5" >..... </th>
					<th colspan="5" >..... </th>  
					<th colspan="9" > ....</th>  
					<th colspan="9" >..... </th>  
					<th colspan="5" > ....</th>  
				</tr>
							
			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" height="50" > Kediri, 09 Januari 2015 </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" > </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" > ANIK WINARSIH
									Direktur Utama </th> 
					<th colspan="8" >  </th>  
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}