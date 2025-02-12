<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class baru14 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_baru14');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT NOTARISAN KELUARGA ( FORMAL )');
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
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" style="font-size:20px;">
				<tr>
					<td><b>SURAT PERNYATAAN LEGALITAS DOKUMEN </b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="20">Yang bertanda tangan di bawah ini: </td>
				</tr>
			 </table>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="4%"></th><th width="20%">Nama  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Tempat/Tanggal lahir  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Jenis Kelamin  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Alamat  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="88%"> ........................................................................................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%"></th>
					<th width="4%"></th>
					<th width="4%">  </th>
					<th width="88%"> ........................................................................................</th>
				</tr>
			 </table>
			 <br><br>
			 <table>
			 	<tr>
					<td colspan="20">Dengan ini menyatakan sesungguhnya bahwa dokumen – dokumen yang saya bawa sendiri dari rumah yang terdiri dari :</td>
				</tr>
			 </table>			 
			 <br>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
				<th  colspan="3" ></th>
				<th align="center" colspan="3" >1. </th>
					<th colspan="80" >KTP</th>
				</tr>
			 	<tr>
				<th  colspan="3" ></th>
				<th align="center" colspan="3" >2. </th>
					<th colspan="80" >Kartu Keluarga </th>
				</tr>
			 	<tr>
				<th  colspan="3" ></th>
				<th align="center" colspan="3" >3. </th>
					<th colspan="80" >Ijazah / Akte Lahir / Surat Nikah</th>
				</tr>
			 	<tr>
				<th  colspan="3" ></th>
				<th align="center" colspan="3" >1. </th>
					<th colspan="80" >Ijin Keluarga</th>
				</tr>
				<br>
			 	<tr>
					<td colspan="90">Adalah <b>BENAR</b> dan <b>DAPAT DI PERTANGGUNG JAWABKAN</b></td>
				</tr>
				<br>
			 	<tr>
					<td colspan="90">Apabila dokumen – dokumen tersebut ternyata tidak benar / palsu, maka dalam hal ini saya bertanggung jawab atas denda maupun hukum yang berlaku serta tidak akan melibatkan <b>PT. FLAMBOYAN GEMAJASA – MALANG.</b></td>
				</tr>
				<br>
			 	<tr>
					<td colspan="90">Dengan ini menyatakan pula bahwa saya <b>BELUM / PERNAH</b> berangkat ke <b>LUAR NEGERI</b> dalam rangka apapun.</td>
				</tr>
				<br>
			 	<tr>
					<td colspan="90">Demikian surat pernyataan ini saya buat dengan sebenarnya tanpa ada paksaan dari pihak manapun.</td>
				</tr>
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="6"></td>
					<td colspan="40">Malang,</td>
				</tr>
			 	<tr>
					<td colspan="6"></td>
					<td colspan="15">Yang menyatakan / membuat perjanjian,</td>
					<td colspan="12"></td>
					<td colspan="15">Sponsor / Saksi,</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="8"></td>
					<td colspan="15">(............................................)</td>
					<td colspan="8"></td>
					<td colspan="15">(............................................)</td>
				</tr>
				<br>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('SURAT NOTARISAN KELUARGA ( FORMAL ).pdf', 'I');    
    }
}