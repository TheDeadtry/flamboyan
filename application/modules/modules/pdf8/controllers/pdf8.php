<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pdf8 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf8');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
    $pdf->SetFont('simsun', '', '11', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '
		<table align="center" style="font-size:20px;">
			<tr>
				<td>驗證檢查表(印尼) SERAH TERIMA DOKUMEN DIBAWA TKI</td>
			</tr>
			<tr>
				<td>印尼仲介: PT Flamboyan Gemajasa Lawang </td>
			</tr>
		</table>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<td colspan="5">臺灣仲介/ AGENT TAIWAN </td>
					<td colspan="8">TA LIN MANPOWER CO.,LTD</td>
				</tr>
				<tr>
					<td colspan="5">雇主名稱 / NAMA MAJIKAN</td>
					<td colspan="8">CHONG SIN ENTERPRISE CO.,LTD 崇新企業股份有限公司</td>
				</tr>
				<tr>
					<td colspan="13">檢附文件: (請打^ , 並依序排列）</td>
				</tr>
			</table>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<td rowspan="2"></td>
					<td colspan="5">外勞名字 /外勞號碼  :YAMUHAIMINU (F1151T) 米努</td>
					<td rowspan="2">印尼仲介 PT Flamboyan Gemajasa Lawang</td>
					<td rowspan="2">臺灣仲介/ AGENT TAIWAN </td>					
				</tr>
				<tr>
					<td colspan="5">入境日期：2014.04.12</td>
				</tr>
				<tr>
					<td colspan="1">1</td>
					<td colspan="5">護照 Pasport , No. AT234567</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1"2></td>
					<td colspan="5">核凖函正本（Original CLA Letter) 函號  SUHAN N0. …10345689</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">3</td>
					<td colspan="5">人境簽證函 VISA PERMIT - 函號 N0 10893456</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">4</td>
					<td colspan="5">授權書 Power of Attorney</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">5</td>
					<td colspan="5">需求書Job Order /Demand Letter</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">6</td>
					<td colspan="5">勞動契約 Employment Contract</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">7</td>
					<td colspan="5">外國人入國工作費用及來臺灣工資切結書 Surat Pernyataaan Biaya Penempatan Calon Tenaga Kerja Indonesia ke Taiwan</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">8</td>
					<td colspan="5">聘工表/Job description</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">9</td>
					<td colspan="7">ARC</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">10</td>
					<td colspan="7">外勞保險卡Insurance Card-TKI</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td rowspan="6">11</td>
					<td colspan="9">雇主要求的文件 Dokumen atas permintaan Majikan </td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td rowspan="6">12</td>
					<td colspan="9">臺灣仲介要求的文件 Dokumen atas permintaan Agen ：</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4">A</td>
					<td colspan="">SURAT PERJANJIAN TKI - AGEN</td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"></td>
					<td colspan=""></td>
					<td colspan=""></td>
				</tr>
				<tr>
					<td colspan="1">13</td>
					<td colspan="5">核凖函影本Copies of CLA Letter .</td>
					<td ></td>
					<td ></td>
				</tr>
				<tr>
					<td colspan="1">14</td>
					<td colspan="5">工廠)公司 證照 CorporateLicense</td>
					<td ></td>
					<td ></td>
				</tr>
			</table>
			<br>
			<br>
			<table>
				<tr>
					<td>請國外仲介收到文件後，聯繫或回覆我們，謝謝</td>
				</tr>
				<br>
				<tr>
					<td>臺灣仲介-受文件-簽名-日期</td>
				</tr>
			</table>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('1. PKJ01-PK WANITA INFOMAL-BLANK.pdf', 'I');    
    }
}