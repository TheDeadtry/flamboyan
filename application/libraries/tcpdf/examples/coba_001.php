<?php


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 12);

// add a page
$pdf->AddPage();

// create some HTML content

$html = '<h2 align="center">SURAT PERNYATAAN AHLI WARIS</h2>
<br>
<table cellspacing="2" cellpadding="2">
<tbody>
<tr>
<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
</tr>
<tr>
<td colspan="2" width="246">Nama</td>
<td width="19">:</td>
<td colspan="2" width="397"></td>
</tr>
<tr>
<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
<td width="19">:</td>
<td colspan="2" width="397"></td>
</tr>
<tr>
<td colspan="2" width="246">Alamat</td>
<td rowspan="2" width="19">:</td>
<td colspan="2" rowspan="2" width="397"></td>
</tr>
<tr>
<td colspan="2" width="246"></td>
</tr>
<tr>
<td colspan="5" width="662"></td>
</tr>
<tr>
<td colspan="5" width="662">Menyatakan bahwa selama menjadi tenaga kerja diluar negeri bilamana terjadi kecelakaan atau kematian maka saya melimpahkan/mewariskan kepada :</td>
</tr>
<tr>
<td colspan="2" width="246">Nama</td>
<td width="19">:</td>
<td colspan="2" width="397"></td>
</tr>
<tr>
<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
<td width="19">:</td>
<td colspan="2" width="397"></td>
</tr>
<tr>
<td colspan="2" width="246">Alamat</td>
<td rowspan="2" width="19">:</td>
<td colspan="2" rowspan="2" width="397"></td>
</tr>
<tr>
<td colspan="2" width="246"></td>
</tr>
<tr>
<td colspan="5" width="662"></td>
</tr>
<tr>
<td colspan="5" width="662">Demikian surat pernyataan ahli waris ini saya buat dengan sebenarnya, tanpa ada paksaan dari pihak manapun dan untuk dipergunakan sebagaimana mestinya.<br><br><br><br><br></td>
</tr>
<tr>
<td colspan="5" width="662"></td>
</tr>
<tr>
<td colspan="4" width="406"></td>
<td width="255">Banyuwangi/Malang, tgl-bln-tahun</td>
</tr>
<tr>
<td rowspan="3" width="76"></td>
<td colspan="3" width="331">Yang Memberi Kuasa</td>
<td width="255">Yang Diberi Kuasa</td>
</tr>
<tr>
<td colspan="3" width="331"></td>
<td width="255"></td>
</tr>
<tr><br><br><br><br><br>
<td colspan="3" width="331">Nama terang</td>
<td width="255">Nama terang</td>
</tr>
</tbody>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('coba_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
