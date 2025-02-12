<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class akhir7 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_akhir7');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('PAP02-PENGAJUAN KPA PAP TGL 28-01-2015');
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
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html ='
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th width="10%"  > Nomor </th>
					<th width="2%"  > : </th>
					<th width="40%" > 075/BMB/- BLK- LN/XII/2014 </th>
				</tr>
                <tr>
                    <th width="10%"  > Lampiran </th>
                    <th width="2%"  > : </th>
                    <th width="40%" > 7 ( Tujuh ) Lembar </th>
                </tr>
                <tr>
                    <th width="10%"  > Perihal </th>
                    <th width="2%"  > : </th>
                    <th width="40%" > Permohonan Pendaftaran Peserta PAP </th>
                </tr>
            <br>
            <tr>
                <td width="50%">Kepada  Yth:</td>
            </tr>
            <tr>
                <td width="50%">Ketua Pelaksana PAP TKI </td>
            </tr>
            <tr>
                <td width="50%">Propinsi Jawa Timur</td>
            </tr>
            <tr>
                <td width="50%">Di Malang</td>
            </tr>
            <br>
            <tr>
                <td width="50%">Dengan Hormat:</td>
            </tr>
            <tr>
                <td width="100%" align="justify">Bersama ini kami BLK-LN PT. Bama Mapan Bahagia mengajukan Permohonan PAP, bagi calon TKI kami sebanyak 5 (lima) orang dengan rincian sebagai berikut :</td>
            </tr>
            <tr>
                <td width="5%"></td>
                <td width="15%">1. Taiwan</td>
                <td width="8%"></td>
                <td width="15%">: 5 orang</td>
            </tr>
            <tr>
                <td width="100%" align="justify">Demikian permohonan kami ini atas kerjasamanya kami sampaikan terima kasih.</td>
            </tr>
            <br>
            <br>
            <br>
            <tr>
                <td width="50%">Malang, 11 Desember 2014</td>
            </tr>
            <tr>
                <td width="50%">BLK – LN FLAMBOYAN GEMAJASA LAWANG</td>
            </tr>
            <br>
            <tr>
            <br>
            <br>
            <br>
            <br>
                <td width="50%"><u>Anik Winarsih</u></td>
            </tr>
            <tr>
                <td width="50%">Direktur Utama</td>
            </tr>
			</table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('PAP02-PENGAJUAN KPA PAP TGL 28-01-2015.pdf', 'I');    
    }
}