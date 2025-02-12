<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class akhir10 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_akhir10');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('DATA BASE DOKUMEN DIBAWA KE TAIWAN PERMINTAAN AGEN TAIWAN');
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
    $pdf->SetFont('simsun', '', '12', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html ='<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
                    <p><u>DATA BASE DOKUMEN DIBAWA KE TAIWAN NO.11 ( DOKUMEN KHUSUS DIMINTA MAJIKAN)</u></p>
            </table>
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
                <tr>
                    <td colspan="15">臺灣仲介/ AGENT TAIWAN </td>
                    <td colspan="30">HUNG CHIANG INTERNATIONAL DEVELOPMENT</td>
                </tr>
                <tr>
                    <td colspan="15">雇主名稱 / NAMA MAJIKAN</td>
                    <td colspan="30">HON M YUE ENTERPRISE CO.,LTD. 弘裕企業股份有限公司</td>
                </tr>
            </table>
            <table align="left" width="60%" cellspacing="0" cellpadding="2" border="0.1em">
                <tr>
                    <td colspan="2">A</td>
                    <td colspan="20">休息時間不需打卡申請書 waktu istirahat tidak usah isi surat izi</td>
                </tr>
                <tr>
                    <td colspan="2">B</td>
                    <td colspan="20">同 意 書(銀行帳戶)surat persetujuan (Tabungan</td>
                </tr>
                <tr>
                    <td colspan="2">C</td>
                    <td colspan="20">外 出 登 記 簿PENCATATAN IJIN KELUAR</td>
                </tr>
                <tr>
                    <td colspan="2">D</td>
                    <td colspan="20">外籍員工外出規範公告Pengumuman Aturan keluar masuk pekerja asing</td>
                </tr>
                <tr>
                    <td colspan="2">E</td>
                    <td colspan="20">外勞匯款明細No. Rek Pengiriman uang TKI</td>
                </tr>
                <tr>
                    <td colspan="2">F</td>
                    <td colspan="20">夜 間 點 名 規 範 Aturan Malam Hari</td>
                </tr>
                <tr>
                    <td colspan="2">G</td>
                    <td colspan="20">工作申請書 Pengajuan Kerja</td>
                </tr>
                <tr>
                    <td colspan="2">H</td>
                    <td colspan="20">同 意 書(護照) Surat Persetujuan (paspor)</td>
                </tr>
            </table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('DATA BASE DOKUMEN DIBAWA KE TAIWAN PERMINTAAN AGEN TAIWAN.pdf', 'I');    
    }
}