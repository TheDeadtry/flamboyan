<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pdf9 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf9');
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
	
    $html = '<p align="center">FORMAT PENGISIAN TKI ON LINE</p>
			<br>
			
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
                <th colspan="3" ></th>
                <th colspan="25" >TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">EKS/Baru</th> 
              	<th colspan="15">*)</th>             
             </tr>
			 <tr>
                <th colspan="3" ></th>
                <th colspan="25" >Sektor</th>
                <th colspan="2">:</th>
              	<th colspan="35">Formal / Informal</th> 
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
                <th colspan="25" >NAMA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >2</th>
                <th colspan="25" >NAMA IBU</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >3</th>
                <th colspan="25" >NAMA AYAH</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >4</th>
                <th colspan="25" >JENIS KELAMIN</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >5</th>
                <th colspan="25" >TEMPAT LAHIR</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >6</th>
                <th colspan="25" >TANGGAL LAHIR</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >7</th>
                <th colspan="25" >NO. KTP TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >8</th>
                <th colspan="25" >ALAMAT TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >9</th>
                <th colspan="25" >PROPINSI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >10</th>
                <th colspan="25" >KOTA ASAL TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >11</th>
                <th colspan="25" >ALAMAT ORANG TUA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >12</th>
                <th colspan="25" >KOTA ORANG TUA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >13</th>
                <th colspan="25" >STATUS PERKAWINAN TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >14</th>
                <th colspan="25" >AGAMA</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >15</th>
                <th colspan="25" >PENDIDIKAN</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >16</th>
                <th colspan="25" >AGENCY</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >17</th>
                <th colspan="25" >MATA UANG</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >18</th>
                <th colspan="25" >JABATAN</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >19</th>
                <th colspan="25" >SEKTOR USAHA</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >20</th>
                <th colspan="25" >GAJI TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >21</th>
                <th colspan="25" >NO PASPOR</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15">NO. 21 s/d 25</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >22</th>
                <th colspan="25" >MASA BERLAKU</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15">Harus diisi</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >23</th>
                <th colspan="25" >MASA HABIS BERLAKU</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15">Bagi TKI yang</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >24</th>
                <th colspan="25" >TGL. BERANGKAT </th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
              	<th colspan="15">Eks/pernah</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >25</th>
                <th colspan="25" >TGL. TIBA</th>
                <th colspan="2">:</th>
              	<th colspan="35">.....</th> 
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
}