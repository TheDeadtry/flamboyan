<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class akhir8 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_akhir8');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('PAP03. DAFTAR HADIR PAP INFORMAL 11 DESEMBER 2014');
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
	
    $html ='<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
                    <tr>
                        <td><b>DAFTAR HADIR</b></td>
                    </tr>
                    <tr>
                        <td><b>PEMBEKALAN AKHIR PEMBERANGKATAN (PAP)</b></td>
                    </tr>
                    <tr>
                        <td><b>CALON TENAGA KERJA INDONESIA</b></td>
                    </tr>
                    <tr>
                        <td><b>SEKTOR INFORMAL</b></td>
                    </tr>
			</table>
            <br>
            <br>
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="25%">Nama PPTKIS</td>
                    <td width="2%" >:</td>
                    <td width="50%"><b>PT. FLAMBOYAN GEMAJASA LAWANG</b></td>
                </tr>
                <tr>
                    <td width="25%">Alamat PPTKIS</td>
                    <td width="2%" >:</td>
                    <td width="50%">JL.RAYA KEDIRI KERTOSONO KM.7 DSN.CLEDEK RT.02/04 DS.TURUS KEC.GAMAPANG REJO KAB.KEDIRI</td>
                </tr>
                <tr>
                    <td width="25%">Jumlah Peserta PAP</td>
                    <td width="2%" >:</td>
                    <td width="50%"><b>...............</b></td>
                </tr>
                <tr>
                    <td width="25%">Negara Tujuan</td>
                    <td width="2%" >:</td>
                    <td width="50%"><b>...............</b></td>
                </tr>
            </table>
            <br>
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
                <tr>
                    <th colspan="8">No.</th>
                    <th colspan="30">Nama/TTL</th>
                    <th colspan="20">Jenis Kelamin</th>
                    <th colspan="20">Jabatan</th>
                    <th colspan="20">Alamat Asal CTKI</th>
                    <th colspan="20">No/TGL Paspor</th>
                    <th colspan="20">No/Tgl. Sertifikat UJK/UKOM</th>
                    <th colspan="10">TTD</th>
                    <th colspan="10">Ke</th>
                </tr>
                <tr>
                    <td colspan="8">1</td>
                    <td colspan="30">...............</td>
                    <td colspan="20">...............</td>
                    <td colspan="20">...............</td>
                    <td colspan="20">...............</td>
                    <td colspan="20">...............</td>
                    <td colspan="20">...............</td>
                    <td colspan="10">.......</td>
                    <td colspan="10">.......</td>
                </tr>
            </table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('PAP03. DAFTAR HADIR PAP INFORMAL 11 DESEMBER 2014.pdf', 'I');    
    }
}