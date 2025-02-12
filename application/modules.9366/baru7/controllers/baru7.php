<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Baru7 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_baru7');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT IJIN KELUARGA BANYUWANGI');
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
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" style="font-size:20px;">
				<tr>
					<td><b>SURAT IJIN KELUARGA</b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="2"></td><td colspan="20">Yang bertanda tangan di bawah ini: </td>
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
					<th width="4%"></th><th width="20%">No. KTP / SIM  </th>
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
					<th width="4%"></th><th width="20%">Alamat  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 </table>
			 <br><br><br>
			 <table>
			 	<tr>
					<td colspan="2"></td><td colspan="20">Memberikan ijin kepada ……………………………….. saya :</td>
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
					<th width="4%"></th><th width="20%">NO. Paspor  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Alamat</th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
				<br><br>
			 	<tr>
					<th width="4%"></th><th width="20%">Tujuan</th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 </table>
			
			 <br>
			 <br>
			 <table>
			 	<tr>
					<th width="12%" ></th>
					<th width="88%">Saya sebagai ……………………….. memberikan ijin / tidak keberatan …………………………saya</th>
				</tr>
				<tr>
					<th width="4%" ></th>
					<th width="96%">bekerja ke ………………………….sebagai TKI / TKW dan saya bersedia menanggung resiko dan akibatnya.</th>
				</tr>
			 </table>
			 <br><br>
			 <table>
			 	<tr>
					<th width="12%" ></th>
					<th width="88%">Demikian Surat Pernyataan ini saya buat dengan sebenarnya dalam keadaan sadar dan tanpa ada</th>
				</tr>
				<tr>
					<th width="4%" ></th>
					<th width="96%"> unsur paksaan dari pihak manapun dan dapat dipergunakan sebagaimana mestinya.</th>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="1"></td>
					<td colspan="5"></td>
					<td colspan="7"></td>
					<td colspan="5">Banyuwangi,</td>
				</tr>
				<br>
			 	<tr>
					<td colspan="1"></td>
					<td colspan="5">Yang diberi persyaratan,</td>
					<td colspan="6"></td>
					<td colspan="5">Yang Memberi persyaratan,</td>
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