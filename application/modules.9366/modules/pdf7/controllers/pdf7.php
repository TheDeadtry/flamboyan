<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pdf7 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf7');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
			<table width="25%">
				<tr>
					<td>PT. Flamboyan Gemajasa Lawang</td>
				</tr>
				<tr>
					<td>JL. INSPEKTUR SUWOTO NO 95B RT.02 RW.02, DS.SIDODADI/LAWANG</td>
				</tr>
				<tr>
					<td>EAST JAVA – 65153 – INDONESIA</td>
				</tr>
				<tr>
					<td>TEL : 0341-425642</td>
				</tr>
			</table>
			<br>
			<br>
			
			<table align="center">			
				<tr>
					<td style="font-size:30px;">入　　境　　通　　知</td>
				</tr>
			</table>
			<br>
			<br>
			<table width="100%">
			<tr>
			<td width="20%">
			<table>
				<tr>
					<td coslpan="2">國內仲介公司</td>
				</tr>
				<tr>
					<td coslpan="2">入境日期</td>
				</tr>
				<tr>
					<td coslpan="2">班機</td>
				</tr>
				<tr>
					<td coslpan="2"></td>
				</tr>
				<tr>
					<td coslpan="2">到達時間</td>
				</tr>
			</table>
			</td>
			<td width="50%">
			<table>
				<tr>
					<td coslpan="6">:  CHAMPION SHINE MANPOWER CO.,LTD</td>
				</tr>
				<tr>
					<td coslpan="6">:  05JAN2015</td>
				</tr>
				<tr>
					<td coslpan="6">:  CI-752 : SUB-TPE :06.05 -15.10, 05JAN2015</td>
				</tr>
				<tr>
					<td coslpan="6">:  CI-309 : TPE-KHH :22.45– 23.40, 05JAN2015</td>
				</tr>
				<tr>
					<td coslpan="6">: 高雄/ 23。40, 05JAN2015</td>
				</tr>
			</table>
			</td>
			<td>
				<table>
					<tr>
						<td>請安排接機</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td>謝謝 !</td>
					</tr>
				</table>
			</td>
			</tr>
			</table>
			<br>
			<br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">				
				<tr>
					<td colspan="4">僱 主 姓 名 NAMA MAJIKAN</td>
					<td colspan="4">外 勞 姓 名 NAMA TKW</td>
					<td colspan="4">護 照 號 碼 NO PASPORT</td>
					<td colspan="4">護照有效日期 MASA BERLAKU</td>
					<td colspan="4">核准函號碼 SUHAN NO.</td>
					<td colspan="4">簽証函號碼 VISA PERMIT NO.</td>
					<td colspan="4">出生日期 TGL LAHIR</td>
					<td colspan="4">銀行貸款 BANK</td>
				</tr>
				<tr>
					<td rowspan="2" colspan="4">KUO HSING POULTRY & LIVESTOCK FEEDS CO.,LTD 國興畜產股份有限公司</td>
					<td rowspan="2" colspan="4">SUEDAH (FF136)</td>
					<td rowspan="2" colspan="4">AS277046</td>
					<td rowspan="2" colspan="4">2017.09.05</td>
					<td rowspan="2" colspan="4">1032149981</td>
					<td rowspan="2" colspan="4">1032175342</td>
					<td rowspan="2" colspan="4">1979.08.09</td>
					<td colspan="4">KSB</td>
				</tr>
				<tr>
					<td colspan="4">9XNT.8100</td>
				</tr>
				<tr>
					<td colspan="32">婚姻狀況 STATUS :Belum menikah 未婚</td>
				</tr>					
			 </table><br><br>
			 <table width="100%">
			 	<tr>
					<td width="50%">
						<table align="center" cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>TABEL A</td>
							</tr> 
						</table>
					</td>
					<td width="25%">
						<table align="center" cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>TABEL B</td>
							</tr> 
						</table>
					</td>
					<td width="25%">
						<table align="center" cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>TABEL A</td>
							</tr> 
						</table>
					</td>
				</tr>
			 </table>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('1. PKJ01-PK WANITA INFOMAL-BLANK.pdf', 'I');    
    }
}