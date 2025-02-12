<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pdf1 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf1');
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
    $pdf->SetFont('simsun', '', '12', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table>
				<tr>
					<td style="width:25%; font-size:10px;" >
						<table cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>
									<p>台仲中文/英名稱 :.........</p>
									<p>地址/電話/傳真 :.........</p>
									<p><U>TEL:..........</U></p>
									<p><U>FAX:..........</u></p>
								</td>
							</tr>
						</table>
				</td>
				<td style="width:50%; font-size:18px; margin-left:5px;">
				<table style="text-align:center;" cellspacing="5" cellpadding="0">
					<tr>
						<td>勞動契約 監護工</td>
					</tr>
					<tr>
						<td>PERJANJIAN KERJA ANTARA</td>
					</tr>
					<tr>
						<td>MAJIKAN DENGAN</td>
					</tr>
					<tr>
						<td>Perawat Orang Sakit (Care Giver)</td>
					</tr>
				</table>
				</td>
				<td align="center" style="width:20%; font-size:20px;" >
						<table cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<td>
									SEKTOR
									INFORMAL
								</td>
							</tr>
						</table>
				</td>
				</tr>
			 </table><br><br>
			 	<table width="100%">
					<tr>
						<th colspan="2" >甲方名稱 (以下簡稱為 甲方)</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama Majikan</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >地址</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >電話</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Nomor Telepon</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="3" >SELANJUTNYA DISEBUT PIHAK PERTAMA</th>		
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="2" >Nama Pekerja</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >在印尼住址</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat di Indonesia</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >護照號碼，簽發日期及地點</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Nomor paspor,</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >tanggal dan tempat pengeluaran</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th width="15%" >出生日期</th>
						<th >: ...........</th>
						<th width="15%" >出生地點</th>
						<th >: ...........</th>		
						<th width="15%" >性別</th>
						<th >: ...........</th>								
					</tr>
					<tr>
						<th width="15%"  >Tanggal Lahir</th>
						<th >: ...........</th>
						<th width="15%"  >Tempat Lahir</th>
						<th >: ...........</th>		
						<th width="15%"  >Jenis Kelamin</th>
						<th >: ...........</th>								
					</tr>
					<tr>
						<th width="25%" >婚姻狀況 :</th>
						<th width="25%" >□已婚</th>	
						<th width="25%" >□未婚</th>
						<th width="25%" >□離婚</th>							
					</tr>
					<tr>
						<th width="25%" >Status Perkawinan :</th>
						<th width="25%" >Menikah</th>	
						<th width="25%" >Belum menikah</th>
						<th width="25%" >Cerai</th>					
					</tr>
					<tr>
						<th colspan="2" >十八歲以下未婚子女數目</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Jumlah anak dibawah umur 18 tahun dan belum menikah</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >受益人姓名</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama ahli waris</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >如遇意外時通知</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >姓名</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Nama</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >住址</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th colspan="2" >Alamat</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th width="25%"  >電話</th>
						<th colspan="3" >: ...................</th>						
					</tr>
					<tr>
						<th width="25%"  >電話</th>
						<th >: ...........</th>
						<th width="25%"  >關係</th>
						<th >: ...........</th>						
					</tr>
					<tr>
						<th width="25%"  >Telepon</th>
						<th >: ...........</th>
						<th width="25%"  >Hubungan</th>
						<th >: ...........</th>						
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="3" >SELANJUTNYA DISEBUT PIHAK PERTAMA</th>		
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="4" >甲方僱用乙方於中華民國境內擔任    監護工    工作而簽訂本合約。雙方約定事項有關條件詳列於下</th>					
					</tr>
					<tr><td></td></tr>
					<tr>
						<th colspan="4" >PIHAK PERTAMA menempatkan PIHAK KEDUA di Taiwan, ROC sebagai _PERAWAT ORANG SAKIT_ dan kedua belah pihak sepakat untuk menandatangani Perjanjian Kerja mengenai hal-hal sebagai berikut : </th>					
					</tr>
				</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('1. PKJ01-PK WANITA INFOMAL-BLANK.pdf', 'I');    
    }
}