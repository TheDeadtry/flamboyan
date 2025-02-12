<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pdf4 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf4');
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
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" style="font-size:20px;">
				<tr>
					<td><b>SURAT PERNYATAAN IJIN KELUARGA</b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="12">Yang bertanda tangan di bawah ini: </td>
				</tr>
			 </table>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="10%"></th><th width="20%">Nama</th><th> : ......................</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="20%">Tempat/Tanggal lahir</th><th> : ......................</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="20%">Pekerjaan</th><th> : ......................</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="20%">Alamat</th><th> : ......................</th>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th colspan="10"></th>
				</tr>
			 	<tr>
					<th colspan="3"></th>
					<th colspan="1">Ds</th>
					<th colspan="2">: ...............................</th>
					<th colspan="1">RT/RW</th>
					<th colspan="2">: ...............................</th>
				</tr>
			 	<tr>
					<th colspan="3"></th>
					<th colspan="1">Kel</th>
					<th colspan="2">: ...............................</th>
					<th colspan="1">Kec</th>
					<th colspan="2">: ...............................</th>
				</tr>
			 	<tr>
					<th colspan="3"></th>
					<th coslpan="1">Kab</th>
					<th colspan="4">: ..............................................................</th>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<td colspan="12">Selaku……………………………dari calon tenaga kerja tersebut dibawah ini : </td>
				</tr>
			 </table>			 
			 <br>
			 <br>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="10%"></th><th width="20%">Nama</th><th> : ......................</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="20%">Status</th><th width="50%"> : Belum Kawin/Kawin/Cerai hidup/Cerai Mati</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="20%">Tempat/Tanggal lahir</th><th> : ......................</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="20%">Pekerjaan</th><th> : ......................</th>
				</tr>
			 	<tr>
					<th width="10%"></th><th width="20%">Alamat</th><th> : ......................</th>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th colspan="10"></th>
				</tr>
			 	<tr>
					<th colspan="3"></th>
					<th colspan="1">Ds</th>
					<th colspan="2">: ...............................</th>
					<th colspan="1">RT/RW</th>
					<th colspan="2">: ...............................</th>
				</tr>
			 	<tr>
					<th colspan="3"></th>
					<th colspan="1">Kel</th>
					<th colspan="2">: ...............................</th>
					<th colspan="1">Kec</th>
					<th colspan="2">: ...............................</th>
				</tr>
			 	<tr>
					<th colspan="3"></th>
					<th coslpan="1">Kab</th>
					<th colspan="4">: ..............................................................</th>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td>
					<p align="justify">Dengan ini menyatakan bahwa saya memberi ijin dengan ikhlas kepada…………..
saya untuk bekerja ke luar Negeri dengan Negara Tujuan…………………., sebagai Tenaga Kerja Indonesia sesuai dengan perjanjian kontrak kerja yang berlaku., maka saya selaku menyatakan akan bertanggung jawab penuh atas segala resiko serta tuntutan dari pihak manapun juga.
</p>
<p>Demikian pernyataan ini saya buat dengan sebenarnya dan dengan penuh rasa tanggung jawab dan disaksikan pejabat pemerintahan setempat untuk dijadikan data ikatan pedoman masing-masing pihak serta dapat digunakan sebagaimana mestinya.
</p>
					</td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="2"></td>
					<td colspan="5">Yang diberi ijin,</td>
					<td colspan="6"></td>
					<td colspan="5">........,tgl.......</td>
				</tr>
				<tr>
					<td colspan="13"></td>
					<td colspan="5">Yang Memberi Ijin,</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="1"></td>
					<td colspan="5">(............................................)</td>
					<td colspan="6"></td>
					<td colspan="5">(............................................)</td>
				</tr>
				<br>
				<br>
			 	<tr>
					<td colspan="8"></td>
					<td colspan="5">Mengetahui,</td>
				</tr>
				<tr>
					<td colspan="7"></td>
					<td colspan="5">Kepala Desa Keluarahan</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="7"></td>
					<td colspan="5">(.......................................)</td>
				</tr>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('1. PKJ01-PK WANITA INFOMAL-BLANK.pdf', 'I');    
    }
}