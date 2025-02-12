<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Akhir4 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_akhir4');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('LAPORAN PENERBANGAN');
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
					<th colspan="1" rowspan="2"> NO</th>  
					<th colspan="5" rowspan="1"> NAMA LENGKAP  </th>
					<th align="center" colspan="2" rowspan="1"> JENIS KELAMIN  </th> 	
					<th colspan="3" rowspan="1">  NO. PASPOR  </th> 	
					<th colspan="5" rowspan="1">  ALAMAT LENGKAP  </th> 	
					<th colspan="8" rowspan="1">  NAMA DAN ALAMAT LENGKAP  </th> 	
					<th colspan="3" rowspan="1">  TGL  </th> 					
					
				</tr>
				<tr>
					<th colspan="5" rowspan="1"> TEMPAT, TANGGAL LAHIR </th> 	
					<th colspan="2" rowspan="1">  L/P  </th> 	
					<th colspan="3" rowspan="1">  & TGL PASPOR  </th> 	
					<th colspan="5" rowspan="1">  DI INDONESIA  </th> 	
					<th colspan="8" rowspan="1">  PEGGUNA JASA / MAJIKAN  </th> 	
					<th colspan="3" rowspan="1">  BERANGKAT  </th> 					
					
				</tr>
				<tr>
					<th colspan="1" rowspan="2"> 1</th>  
					<th colspan="5" rowspan="1"> ..... </th>
					<th colspan="2" rowspan="1">  .....  </th> 	
					<th colspan="3" rowspan="1"> .....  </th> 	
					<th colspan="5" rowspan="1">  .....  </th> 	
					<th colspan="8" rowspan="1">  .....  </th> 	
					<th colspan="3" rowspan="1">  .....  </th> 					
					
				</tr>
				<tr>
					<th colspan="5" rowspan="1"> ..... </th> 	
					<th colspan="2" rowspan="1">  .....  </th> 	
					<th colspan="3" rowspan="1"> .....  </th> 	
					<th colspan="5" rowspan="1">  .....  </th> 	
					<th colspan="8" rowspan="1"> .....  </th> 	
					<th colspan="3" rowspan="1"> .....  </th> 					
					
				</tr>
				
			 </table>
			
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}