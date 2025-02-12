<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pdf11 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf11');
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
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>PERJANJIAN PENEMPATANANTARA</b></th>   
				</tr>
				<tr>
					<th><b>PELAKSANA PENEMPATAN TENAGA KERJA INDONESIA SWASTA (PPTKIS)</b></th>  
				</tr>
				<tr>
					<th><b>DENGAN CALON TENAGA KERJA INDONESIA</b></th>   
				</tr>
				<tr>
					<th><b>Nomor : …………………………………………</b></th>   
				</tr>
				<tr>
					<th><b>NEGARA PENEMPATAN : .TAIWAN</b></th>      
				</tr>
				
			 </table>
			 <br><br>
		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center" colspan="73" >Pada hari ini ……………… tanggal …  bulan …………..tahun ……….telah diadakan Perjanjian Penempatan antara :</th>      
				</tr>
				<br>
				<tr>
					<th colspan="2" >1</th>
					<th colspan="25" >Nama Penanggung Jawab</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. KTP </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" > Jabatan </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama PPTKIS </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nomor SIPPTKI </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. Telepon/Fax/E-mail  </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				 <br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya disebut PIHAK PERTAMA </th>           
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" >2</th>
					<th colspan="25" >Nama Calon TKI</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Tempat & Tanggal Lahir </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Jenis Kelamin </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat (sesuai E-KTP) </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. Telepon / HP </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Orang Tua / Wali </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. Telepon / HP </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Pendidikan Terakhir </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Status Perkawinan </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya disebut PIHAK KEDUA </th>           
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk melakukan dan melaksanakan perjanjian penempatan dengan ketentuan dan syarat-syarat sebagai berikut. </th>           
				 </tr>
			 </table>
			 <br><br>
			  <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>BAB I</b></th>   
				</tr>
				<tr>
					<th><b>HAK DAN KEWAJIBAN PIHAK PERTAMA</b></th>  
				</tr>				
			 </table>
			 <br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center" colspan="64" >pasal 1</th>   
				</tr>	
				<br>	
				<tr>
					<th colspan="3" >(1)</th>   
					<th colspan="61" > PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA untuk bekerja pada :</th>   
				</tr>	
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >a. Negara Tempat Bekerja	</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >b. Nama Pengguna	</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >c. ID Pengguna		</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >d. No. Telp Pengguna	</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >e. Alamat Pengguna	</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >f. Jabatan Pekerjaan	</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >g. Gaji Pokok		</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >h. Lembur				</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >i. Lama Kontrak Kerja		</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >j. Hari Libur		</th>
					<th colspan="1">:</th>
					<th colspan="35">.....</th>            
				 </tr>	
				</table>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}