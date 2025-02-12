<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pdf7 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf7');
			$this->load->model('M_session');
			$this->load->library('Pdf');
	}
	
	function cetaks($idbiodata) {

			$tampil_data_detail = $this->m_pdf7->tampil_data_detail($idbiodata);
$ambilpaspor=$this->m_pdf7->ambilpaspor($idbiodata);
$masaberlakupaspor=$this->m_pdf7->masaberlakupaspor($idbiodata);
$tanggaltiba=$this->m_pdf7->tanggaltiba($idbiodata);
$penerbangan1=$this->m_pdf7->penerbangan1($idbiodata);
$penerbangan2=$this->m_pdf7->penerbangan2($idbiodata);

$jamtiba=$this->m_pdf7->jamtiba($idbiodata);
$idtki =$this->m_pdf7->idtki($idbiodata);
$namatki=$this->m_pdf7->namatki($idbiodata);
$namatkimandarin=$this->m_pdf7->namatkimandarin($idbiodata);
$namabank=$this->m_pdf7->namabank($idbiodata);
$tanggallahir=$this->m_pdf7->tanggallahir($idbiodata);
$nilaikredit=$this->m_pdf7->nilaikredit($idbiodata);
$totalkredit=$this->m_pdf7->totalkredit($idbiodata);
$status=$this->m_pdf7->ambilstatus($idbiodata);
$airport=$this->m_pdf7->airport($idbiodata);
$ambilfoto1 = $this->m_pdf7->ambilfoto1($idbiodata);
$ambilfoto2 = $this->m_pdf7->ambilfoto2($idbiodata);

$penerbangan='';
  if($penerbangan2!=""){

   $penerbangan='<tr>
					<td coslpan="6" >:  '.$penerbangan1.'</td>
				</tr>
				<tr>
					<td coslpan="6" >:  '.$penerbangan2.'</td>
				</tr>';
 }else{
            $penerbangan='<tr>
					<td coslpan="6" >:  '.$penerbangan1.'</td>
				</tr>
				<tr>
					<td coslpan="6" >: </td>
				</tr>';
  }

$stts = substr($idbiodata, 0, 2);
$namaagen="";
$namamajikan="";
$namamajikantaiwan="";
$nosuhan="";
$novisapermit="";
if($stts == 'FI' ||$stts == 'MI'){ 
$namaagen=$this->m_pdf7->namaagenfi($idbiodata);
$namamajikan=$this->m_pdf7->namamajikanfi($idbiodata);
$namamajikantaiwan=$this->m_pdf7->namataiwanmajikanfi($idbiodata);
$nosuhan=$this->m_pdf7->nosuhanfi($idbiodata);
$novisapermit=$this->m_pdf7->novisapermitfi($idbiodata);
}else{
$namaagen=$this->m_pdf7->namaagenformal($idbiodata);
$namamajikan=$this->m_pdf7->namamajikanformal($idbiodata);
$namamajikantaiwan=$this->m_pdf7->namataiwanmajikanformal($idbiodata);
$nosuhan=$this->m_pdf7->nosuhanformal($idbiodata);
$novisapermit=$this->m_pdf7->novisapermitformal($idbiodata);


}
$statusnya="";
$tglnikah="";
$namapasangan="";
$notelp="";


if($status=="Menikah 已婚"){
$statusnya="已婚";
$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
$notelp=$this->m_pdf7->hpkel($idbiodata);
}

if($status=="Cerai 離婚"){
$statusnya="離婚";
$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
$notelp=$this->m_pdf7->hpkel($idbiodata);
}

if($status=="Cerai mati 丈夫去世"){
$statusnya="丈夫去世";
$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
$notelp=$this->m_pdf7->hpkel($idbiodata);
}

if($status=="Belum Nikah 未婚"){
$statusnya="未婚";
$tglnikah="X";
$namapasangan="X";
$notelp="X";
}	

	$hitungfoto= $this->m_pdf7->hitungfoto($idbiodata);
	$datagambar=base_url()."assets/upload_arc/".$ambilfoto1;

$datafotonya="";
  // if($hitungfoto==1){

  	$datafotonya='<td width="50%">
						<table align="center" cellspacing="0" cellpadding="2" >
							<tr>
								<td><img src="'.$datagambar.'" alt=""  style="width:554px;height:228px;" /></td>
							</tr> 
						</table>
					</td>
					';

// $datagambarnya=' <th align="center"  ></th>';
  // }
  // else{
  // 	 	$datafotonya='<td width="25%">
		// 				<table align="center" cellspacing="0" cellpadding="2" >
		// 					<tr>
		// 						<td><img src="'.$datagambar.'" alt=""  style="width:284px;height:208px;" /></td>
		// 					</tr> 
		// 				</table>
		// 			</td>
		// 			<td width="25%">
		// 				<table align="center" cellspacing="0" cellpadding="2" >
		// 					<tr>
		// 						<td><img src="'.$datagambar2.'" alt=""  style="width:284px;height:208px;" /></td>
		// 					</tr> 
		// 				</table>
		// 			</td>';

	// $datagambarnya=' <th align="center"  ><img src="'.$datagambar.'" alt=""  style="width:284px;height:208px;" /></th>
	// <th align="center"  ><img src="'.$datagambar2.'" alt=""  style="width:284px;height:208px;" /></th>';
  // }

  $hitungpaspor= $this->m_pdf7->hitungpaspor($idbiodata);

		$fotopaspor				= $this->m_pdf7->fotopaspor($idbiodata);
				$fotopaspor2				= $this->m_pdf7->fotopaspor2($idbiodata);

				$datapaspor=base_url()."assets/uploadpasporbaru/".$fotopaspor;
	$datapaspor2=base_url()."assets/uploadpasporbaru/".$fotopaspor2;

  $datagambarnya="";
  if($hitungpaspor==1){
$datagambarnya='<td width="25%">
						<table align="center" cellspacing="0" cellpadding="2" >
							<tr>
								<td><img src="'.$datapaspor.'" alt=""  style="width:304px;height:228px;" /></td>
							</tr> 
						</table>
					</td>
						<td width="25%">
						<table align="center" cellspacing="0" cellpadding="2" >
							<tr>
								<td></td>
							</tr> 
						</table>
					</td>';
  }
  else{
	$datagambarnya='<td width="25%">
						<table align="center" cellspacing="0" cellpadding="2" >
							<tr>
								<td><img src="'.$datapaspor.'" alt=""  style="width:304px;height:228px;" /></td>
							</tr> 
						</table>
					</td>
						<td width="25%">
						<table align="center" cellspacing="0" cellpadding="2" >
							<tr>
								<td><img src="'.$datapaspor2.'" alt=""  style="width:304px;height:228px;" /></td>
							</tr> 
						</table>
					</td>';
  }

    // create new PDF document=$this->m_pdf7->ambilpaspor($idbiodata);
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
   $pdf->SetAutoPageBreak(TRUE, 0);
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

    <table width="153%">	
    <tr>
    <td>
			<table align ="left">
				<tr>
					<td><table width="60%" align ="left">
				<tr>
					<td>PT. Flamboyan Gemajasa</td>
				</tr>
				<tr>
					<td>JL. INSPEKTUR SUWOTO NO 95B, DS.SIDODADI,LAWANG</td>
				</tr>
				<tr>
					<td>EAST JAVA – 65153 – INDONESIA</td>
				</tr>
				<tr>
					<td>TEL : 0341-452742</td>
				</tr>
			</table></td>
			<td><table width="30%" align ="left" border="1">
				<tr>
					<td> <br><br> 外勞 以後回來印尼的返鄉地點 : 
					<br> '.$airport.'

					<br>
					</td>
				</tr>
			
			</table></td>
				</tr>
			</table>

				

			</td>
			
					</tr>
					
			</table>
			<br>
			<br>
			
			<table align="center">			
				<tr>
					<td>入　　境　　通　　知</td>
				</tr>
			</table>
			<br>
			<br>
			<table width="100%">
			<tr>
			<td width="20%">
			<table>
				<tr>
					<td coslpan="2" >國內仲介公司</td>
				</tr>
				<tr>
					<td coslpan="2" >入境日期</td>
				</tr>
				<tr>
					<td coslpan="2" >班機</td>
				</tr>
				<tr>
					<td coslpan="2" ></td>
				</tr>
				<tr>
					<td coslpan="2" >到達時間</td>
				</tr>
			</table>
			</td>
			<td width="50%">
			<table>
				<tr>
					<td coslpan="6" >:  '.$namaagen.'</td>
				</tr>
				<tr>
					<td coslpan="6" >:  '.$tanggaltiba.'</td>
				</tr>
				'.$penerbangan.'
				<tr>
					<td coslpan="6" >: '.$jamtiba.'</td>
				</tr>
			</table>
			</td>
			<td>
				<table>
					<tr>
						<td >請安排接機</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td >謝謝 !</td>
					</tr>
				</table>
			</td>
			</tr>
			</table>
			<br>
			<br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">				
				<tr>
					<td colspan="4">僱 主 姓 名 <br>NAMA MAJIKAN</td>
					<td colspan="4">外 勞 姓 名 <br>NAMA TKW</td>
					<td colspan="4">護 照 號 碼 <br>NO PASPORT</td>
					<td colspan="4">護照有效日期 <br>MASA BERLAKU</td>
					<td colspan="4">核准函號碼 <br>SUHAN NO.</td>
					<td colspan="4">簽証函號碼 <br>VISA PERMIT NO.</td>
					<td colspan="4">出生日期 <br>TGL LAHIR</td>
					<td colspan="4">銀行貸款 <br>BANK</td>
				</tr>
				<tr>
					<td rowspan="2" colspan="4">'.$namamajikan.'('.$namamajikantaiwan.') </td>
					<td rowspan="2" colspan="4">'.$idtki.'<br>'.$namatki.'<br>'.$namatkimandarin.'</td>
					<td rowspan="2" colspan="4">'.$ambilpaspor.'</td>
					<td rowspan="2" colspan="4">'.$masaberlakupaspor.'</td>
					<td rowspan="2" colspan="4">'.$nosuhan.'</td>
					<td rowspan="2" colspan="4">'.$novisapermit.'</td>
					<td rowspan="2" colspan="4">'.$tanggallahir.'</td>
					<td colspan="5" rowspan="2">'.$namabank.'<br>'.$nilaikredit.'</td>
				</tr>
				<tr>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td colspan="16"  align="left"> 婚姻狀況 STATUS : '.$statusnya.' </td>
					<td colspan="4" rowspan="2" align="center"> 配偶 <br> PASANGAN</td>
					<td colspan="16"  align="left"> 姓名 NAMA : '.$namapasangan.'</td>
				</tr>	
				<tr>
					<td colspan="16"  align="left"> 结婚/离婚日期 -TGL NIKAH/CERAI : '.$tglnikah.' </td>
					<td colspan="16"  align="left"> 電話 NO TEL : '.$notelp.' </td>
				</tr>					
			 </table><br><br>
			 <table width="100%" border="0">
			 	<tr>
					'.$datafotonya.'
					'.$datagambarnya.'
					
				</tr>
			 </table>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('1. PKJ01-PK WANITA INFOMAL-BLANK.pdf', 'I');    
    }


// start word 
	function cetak($idbiodata) {
include("html_to_doc.php");
			$tampil_data_detail = $this->m_pdf7->tampil_data_detail($idbiodata);
$ambilpaspor=$this->m_pdf7->ambilpaspor($idbiodata);
$masaberlakupaspor=$this->m_pdf7->masaberlakupaspor($idbiodata);
$tanggaltiba=$this->m_pdf7->tanggaltiba($idbiodata);
$penerbangan1=$this->m_pdf7->penerbangan1($idbiodata);
$penerbangan2=$this->m_pdf7->penerbangan2($idbiodata);

$jamtiba=$this->m_pdf7->jamtiba($idbiodata);
$idtki =$this->m_pdf7->idtki($idbiodata);
$namatki=$this->m_pdf7->namatki($idbiodata);
$namatkimandarin=$this->m_pdf7->namatkimandarin($idbiodata);
$namabank=$this->m_pdf7->namabank($idbiodata);
$tanggallahir=$this->m_pdf7->tanggallahir($idbiodata);
$nilaikredit=$this->m_pdf7->nilaikredit($idbiodata);
$totalkredit=$this->m_pdf7->totalkredit($idbiodata);
$status=$this->m_pdf7->ambilstatus($idbiodata);
$airport=$this->m_pdf7->airport($idbiodata);
$ambilfoto1 = $this->m_pdf7->ambilfoto1($idbiodata);
$ambilfoto2 = $this->m_pdf7->ambilfoto2($idbiodata);

$penerbangan='';
  if($penerbangan2!=""){

   $penerbangan='<tr>
					<td coslpan="2" >:  '.$penerbangan1.'</td>
				</tr>
				<tr>
					<td coslpan="2" >:  '.$penerbangan2.'</td>
				</tr>';
 }else{
            $penerbangan='<tr>
					<td coslpan="2" >:  '.$penerbangan1.'</td>
				</tr>
				<tr>
					<td coslpan="2" >: </td>
				</tr>';
  }

$stts = substr($idbiodata, 0, 2);
$namaagen="";
$namamajikan="";
$namamajikantaiwan="";
$nosuhan="";
$novisapermit="";
if($stts == 'FI' ||$stts == 'MI'){ 
$namaagen=$this->m_pdf7->namaagenfi($idbiodata);
$namamajikan=$this->m_pdf7->namamajikanfi($idbiodata);
$namamajikantaiwan=$this->m_pdf7->namataiwanmajikanfi($idbiodata);
$nosuhan=$this->m_pdf7->nosuhanfi($idbiodata);
$novisapermit=$this->m_pdf7->novisapermitfi($idbiodata);
}else{
$namaagen=$this->m_pdf7->namaagenformal($idbiodata);
$namamajikan=$this->m_pdf7->namamajikanformal($idbiodata);
$namamajikantaiwan=$this->m_pdf7->namataiwanmajikanformal($idbiodata);
$nosuhan=$this->m_pdf7->nosuhanformal($idbiodata);
$novisapermit=$this->m_pdf7->novisapermitformal($idbiodata);


}
$statusnya="";
$tglnikah="";
$namapasangan="";
$notelp="";


if($status=="Menikah 已婚"){
$statusnya="已婚";
$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
$notelp=$this->m_pdf7->hpkel($idbiodata);
}

if($status=="Cerai 離婚"){
$statusnya="離婚";
$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
$notelp=$this->m_pdf7->hpkel($idbiodata);
}

if($status=="Cerai mati 丈夫去世"){
$statusnya="丈夫去世";
$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
$notelp=$this->m_pdf7->hpkel($idbiodata);
}

if($status=="Belum Nikah 未婚"){
$statusnya="未婚";
$tglnikah="X";
$namapasangan="X";
$notelp="X";
}	

	$hitungfoto= $this->m_pdf7->hitungfoto($idbiodata);
	$datagambar=base_url()."assets/upload_arc/".$ambilfoto1;

$datafotonya="";
  // if($hitungfoto==1){

$imagedata = file_get_contents("assets/upload_arc/".$ambilfoto1);
             // alternatively specify an URL, if PHP settings allow
$image = base64_encode($imagedata);
// $src = 'data: '.mime_content_type($imagedata).';base64,'.$image;


  	$datafotonya='<td width="1%">
						<table align="center" width="1px" cellspacing="0" cellpadding="2" >
							<tr>
								<td width="1px"><img src="'.$image.'" alt="" width="334" height="238" /></td>
							</tr> 
						</table>
					</td>
					';

// $datagambarnya=' <th align="center"  ></th>';
  // }
  // else{
  // 	 	$datafotonya='<td width="25%">
		// 				<table align="center" cellspacing="0" cellpadding="2" >
		// 					<tr>
		// 						<td><img src="'.$datagambar.'" alt=""  style="width:284px;height:208px;" /></td>
		// 					</tr> 
		// 				</table>
		// 			</td>
		// 			<td width="25%">
		// 				<table align="center" cellspacing="0" cellpadding="2" >
		// 					<tr>
		// 						<td><img src="'.$datagambar2.'" alt=""  style="width:284px;height:208px;" /></td>
		// 					</tr> 
		// 				</table>
		// 			</td>';

	// $datagambarnya=' <th align="center"  ><img src="'.$datagambar.'" alt=""  style="width:284px;height:208px;" /></th>
	// <th align="center"  ><img src="'.$datagambar2.'" alt=""  style="width:284px;height:208px;" /></th>';
  // }

  $hitungpaspor= $this->m_pdf7->hitungpaspor($idbiodata);

		$fotopaspor				= $this->m_pdf7->fotopaspor($idbiodata);
				$fotopaspor2				= $this->m_pdf7->fotopaspor2($idbiodata);

				$datapaspor=base_url()."assets/uploadpasporbaru/".$fotopaspor;
	$datapaspor2=base_url()."assets/uploadpasporbaru/".$fotopaspor2;

  $datagambarnya="";
  if($hitungpaspor==1){
$datagambarnya='<td width="1%">
						<table align="center" width="1px" cellspacing="0" cellpadding="2" >
							<tr>
								<td width="1px"><img src="'.$datapaspor.'" alt="Gambar Paspor" width="334" height="238" /></td>
							</tr> 
						</table>
					</td>
						<td width="1%">
						<table align="center" width="1px" cellspacing="0" cellpadding="2" >
							<tr>
								<td></td>
							</tr> 
						</table>
					</td>';
  }
  else{
	$datagambarnya='<td width="1%">
						<table align="center" width="1px" cellspacing="0" cellpadding="2" >
							<tr>
								<td width="1px"><img src="'.$datapaspor.'" alt=""  width="334" height="238" /></td>
							</tr> 
						</table>
					</td>
						<td width="1%">
						<table align="center" width="1px" cellspacing="0" cellpadding="2" >
							<tr>
								<td width="1px"><img src="'.$datapaspor2.'" alt="" width="334" height="238" /></td>
							</tr> 
						</table>
					</td>';
  }
	// Set some content to print
	
    $html = '
     <style type="text/css">
            .kuning {
                background-color: #FCD5B4;
            }

            .coklat {
                background-color: #e88e25;
            }

            .yellow {
                background-color: #FFFF66;
            }
             .merah {
                background-color: #FF99CC;
            }
            .biru {
                background-color: #B6DDE8;
            }
      .tengah {
                text-align: center;
            }
        </style>

<div class="Section3">	<font size="10">
<table align ="center" cellspacing="0" width="100%">
<tr><td>
			<table align ="left" cellspacing="0" width="100%" border="0">
				<tr>
					<td><font size="2">
					PT. FLAMBOYAN GEMAJASA<br>
					JL.INSPEKTUR SUWOTO NO.95B, DS.SIDODADI, <br>
					LAWANG ,EAST JAVA – 65153 – INDONESIA<br>
					TEL : 0341-452742<br><br>
					</font></td>
				</tr>
			</table></td>
			<td><table align ="right" cellspacing="1" width="60%" border="1">
				<tr>
					<td><font size="2">
					 <br> 外勞 以後回來印尼的返鄉地點 : 
					<br> '.$airport.'
					<br><br>
					</font></td>
				</tr>
			</table></td>
			</tr>
</table>
			<table align ="center" cellspacing="0" width="100%">
				<tr>
				<br>
					<td align ="center"><font size="6"><b>入　　境　　通　　知</b></font></td>
				</tr>
			</table>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
    <tbody>
        <tr>
            <td width="228" class="kuning" >
                <p align="center"><font size="2">
                    <strong>國內仲介公司</strong>
                    <strong></strong></font>
                </p>
            </td>
            <td width="600" colspan="7">
                <p><font size="2">
                    '.$namaagen.'<strong></strong><font>
                </p>
            </td>
            <td width="102"  class="kuning" rowspan="4" align ="center">
               <font size="2">
                    <strong>請安</strong>
                    <strong></strong></font>
                
               <font size="2">
                    <strong>排接機</strong>
                    <strong>,</strong></font><br>
                
                <font size="2">
                    <strong>謝謝</strong>
                    <strong>!</strong>
                    <strong></strong></font>
               
            </td>
        </tr>
        <tr>
            <td width="228" class="kuning">
                <p align="center"><font size="2">
                    <strong>入境日期</strong>
                    <strong></strong></font>
                </p>
            </td>
            <td width="600" colspan="7">
                <p><font size="2">
                    '.$tanggaltiba.'<strong></strong>
                </p></font>
            </td>
        </tr>
        <tr>
            <td width="228" class="kuning">
                <p align="center"><font size="2">
                    <strong>班機</strong>
                    <strong></strong></font>
                </p>
            </td>
            <td width="600" colspan="7">
                <p><font size="2">
                    '.$penerbangan1.'<br>'.$penerbangan2.'<strong></strong></font>
                </p>
            </td>
        </tr>
        <tr>
            <td width="228" class="kuning">
                <p align="center"><font size="2">
                    <strong>到達時間</strong>
                    <strong></strong></font>
                </p>
            </td>
            <td width="600" colspan="7">
               <font size="2">
                    '.$jamtiba.'</font>
                
            </td>
        </tr>
        <tr>
            <td width="228" rowspan="3" class="biru" align ="center">
                <font size="2">
                    <strong>僱</strong>
                    <strong>主</strong>
                    <strong>姓</strong>
                    <strong>名</strong>
                    <strong> NAMA MAJIKAN</strong></font>
                
            </td>
            <td width="264" colspan="3" class="biru" align ="center">
               <font size="2">
                    <strong>外</strong>
                    <strong>勞</strong>
                    <strong>TKI</strong></font>
               
            </td>
            <td width="156" colspan="2" rowspan="2" class="biru" align ="center">
         <font size="2">
                    <strong>護</strong>
                    <strong>照</strong>
                    <strong>PASPORT</strong>
                    <strong>號</strong>
                    <strong>碼</strong>
                    <strong>NO </strong></font>
            </td>
            <td width="216" rowspan="2" class="biru" align ="center">
                <font size="2">
                    <strong>核准函號碼</strong>
                    <strong>SUHAN NO.</strong></font>
                
            </td>
            <td width="126" colspan="2" rowspan="3" class="biru" align ="center">
                <font size="2">
                    <strong>銀行貸款</strong></font>
                
                <font size="2">
                    <strong>PEMBIAYAAN</strong></font>
                
            </td>
        </tr>
        <tr>
            <td width="138" class="biru" align ="center">
                <font size="2">
                    <strong>ID</strong></font>
                
            </td>
            <td width="126" colspan="2" rowspan="2" class="biru" align ="center">
                <font size="2">
                    <strong>出生日期</strong>
                    <strong>TGL LAHIR</strong></font>
               
            </td>
        </tr>
        <tr>
            <td width="138" class="biru" align ="center">
                <font size="2">
                    <strong>姓</strong>
                    <strong>名</strong>
                    <strong> NAMA</strong></font>
               
            </td>
            <td width="156" colspan="2" class="biru" align ="center">
                <font size="2">
                    <strong>有效日期</strong>
                    <strong>MASA BERLAKU</strong></font>
            </td>
            <td width="216" class="biru" align ="center">
                <font size="2">
                    <strong>簽証函號碼</strong>
                    <strong>VISA PERMIT NO.</strong></font>
                
            </td>
        </tr>
        <tr>
            <td width="228">
                <font size="2">
                    '.$namamajikantaiwan.'<font>
                </p>
            </td>
            <td width="138">
                <p align="center"><font size="2">
                   '.$idtki.' </font>
                </p>
            </td>
            <td width="126" colspan="2" rowspan="3">
                <p align="center"><font size="2">
                    '.$tanggallahir.' </font>
                </p>
            </td>
            <td width="156" colspan="2">
                <p align="center"><font size="2">
                    '.$ambilpaspor.'	</font>
                </p>
            </td>
            <td width="216">
                <p align="center"><font size="2">
                    '.$nosuhan.'	</font>
                </p>
            </td>
            <td width="126" colspan="2">
                <p align="center"><font size="2">
                    '.$namabank.'	</font>
                </p>
            </td>
        </tr>
        <tr>
            <td width="228" rowspan="2">
                <p align="center"><font size="2">
                    '.$namamajikan.'</font>
                </p>
            </td>
            <td width="138">
                <p align="center"><font size="2">
                    '.$namatki.'	</font>
                </p>
            </td>
            <td width="156" colspan="2" rowspan="2">
                <p align="center"><font size="2">
                    '.$masaberlakupaspor.'</font>
                </p>
            </td>
            <td width="216" rowspan="2">
                <p align="center"><font size="2">
                    '.$novisapermit.'	</font>
                </p>
            </td>
            <td width="126" colspan="2">
                <p align="center"><font size="2">
                  '.$nilaikredit.'	</font>
                </p>
            </td>
        </tr>
        <tr>
            <td width="138">
                <p align="center"><font size="2">
                    '.$namatkimandarin.'	</font>
                </p>
            </td>
            <td width="126" colspan="2">
                <p align="center"><font size="2">
                    </font>
                </p>
            </td>
        </tr>
        <tr>
            <td width="486" colspan="3">
                <p><font size="2">
                    <strong>婚姻狀況</strong>
                    <strong> STATUS : </strong>
                    <strong>'.$statusnya.'</strong>
                    <strong></strong>	</font>
                </p>
            </td>
            <td width="108" colspan="2" rowspan="2">
                <p align="center"><font size="2">
                    <strong>配偶</strong>
                    <strong>PASANGAN</strong>	</font>
                </p>
            </td>
            <td width="396" colspan="4">
                <p><font size="2">
                    <strong>姓名</strong>
                    <strong>NAMA :  '.$namapasangan.'</strong>	</font>
                </p>
            </td>
        </tr>
        <tr>
            <td width="486" colspan="3">
                <p><font size="2">
结婚/<strong>离婚</strong><strong>日期</strong><strong>-TGL NIKAH/CERAI : </strong>                    <strong>'.$tglnikah.'</strong>	</font>
                </p>
            </td>
            <td width="396" colspan="4">
                <p><font size="2">
                    <strong>電話</strong>
                    <strong>NO TEL : </strong>
                    <strong>'.$notelp.'</strong>	</font>
                </p>
            </td>
        </tr>
    </tbody>
</table>
			 <table width="30%" border="0">
			 	<tr>
					'.$datafotonya.'
					'.$datagambarnya.'
				</tr>
			 </table></font>
</div>			 
			';
// Create the object from the class
$htmltodoc= new HTML_TO_DOC();
 
// Pass the variable which contains the code to the object. 
// The 3rd parameter forces to download the generated Microsoft Word document.
 
$htmltodoc->createDoc($html, "pkj.doc", true); 
    }

	function cetakbaru($idbiodata) {
		require_once 'assets/phpword/PHPWord.php';

			$tampil_data_detail = $this->m_pdf7->tampil_data_detail($idbiodata);
			$ambilpaspor=$this->m_pdf7->ambilpaspor($idbiodata);
			$masaberlakupaspor=$this->m_pdf7->masaberlakupaspor($idbiodata);
			$tanggaltiba=$this->m_pdf7->tanggaltiba($idbiodata);
			$penerbangan1=$this->m_pdf7->penerbangan1($idbiodata);
			$penerbangan2=$this->m_pdf7->penerbangan2($idbiodata);

			$jamtiba=$this->m_pdf7->jamtiba($idbiodata);
			$idtki =$this->m_pdf7->idtki($idbiodata);
			$namatki=$this->m_pdf7->namatki($idbiodata);
			$namatkimandarin=$this->m_pdf7->namatkimandarin($idbiodata);
			$namabank=$this->m_pdf7->namabank($idbiodata);
			$tanggallahir=$this->m_pdf7->tanggallahir($idbiodata);
			$nilaikredit=$this->m_pdf7->nilaikredit($idbiodata);
			$totalkredit=$this->m_pdf7->totalkredit($idbiodata);
			$status=$this->m_pdf7->ambilstatus($idbiodata);
			$airport=$this->m_pdf7->airport($idbiodata);
			$ambilfoto1 = $this->m_pdf7->ambilfoto1($idbiodata);
			$ambilfoto2 = $this->m_pdf7->ambilfoto2($idbiodata);

			$stts = substr($idbiodata, 0, 2);
			$namaagen="";
			$namamajikan="";
			$namamajikantaiwan="";
			$nosuhan="";
			$novisapermit="";
			if($stts == 'FI' ||$stts == 'MI'){ 
			$namaagen=$this->m_pdf7->namaagenfi($idbiodata);
			$namamajikan=$this->m_pdf7->namamajikanfi($idbiodata);
			$namamajikantaiwan=$this->m_pdf7->namataiwanmajikanfi($idbiodata);
			$nosuhan=$this->m_pdf7->nosuhanfi($idbiodata);
			$novisapermit=$this->m_pdf7->novisapermitfi($idbiodata);
			}else{
			$namaagen=$this->m_pdf7->namaagenformal($idbiodata);
			$namamajikan=$this->m_pdf7->namamajikanformal($idbiodata);
			$namamajikantaiwan=$this->m_pdf7->namataiwanmajikanformal($idbiodata);
			$nosuhan=$this->m_pdf7->nosuhanformal($idbiodata);
			$novisapermit=$this->m_pdf7->novisapermitformal($idbiodata);
			}

			$statusnya="";
			$tglnikah="";
			$namapasangan="";
			$notelp="";
			$hubkontak2="配偶 PASANGAN";


			if($status=="Menikah 已婚"){
			$statusnya="已婚 Menikah";
			$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
			$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
			$notelp=$this->m_pdf7->hpkel($idbiodata);
			}

			if($status=="Cerai 離婚"){
			$statusnya="離婚 Cerai";
			$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
			$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
			$notelp=$this->m_pdf7->hpkel($idbiodata);
			}

			if($status=="Cerai mati 丈夫去世"){
			$statusnya="丈夫去世 Cerai mati";
			$tglnikah=$this->m_pdf7->tglmenikah($idbiodata);
			$namapasangan=$this->m_pdf7->namapasangan($idbiodata);
			$notelp=$this->m_pdf7->hpkel($idbiodata);
			}

			if($status=="Belum Nikah 未婚"){
			$statusnya="未婚 Belum Nikah";
			$tglnikah="X";
			$namapasangan=$this->M_session->select_row("SELECT namakontak FROM disnaker where id_biodata='$idbiodata'")->namakontak;
			$notelp=$this->M_session->select_row("SELECT telpkontak FROM disnaker where id_biodata='$idbiodata'")->telpkontak;
			$hubkontak=$this->M_session->select_row("SELECT hubkontak FROM disnaker where id_biodata='$idbiodata'")->hubkontak;
				if ( $hubkontak == "AYAH" || $hubkontak == "BAPAK" || $hubkontak == "ORANG TUA" )
				{
					$hubkontak2 = "父親 ".$hubkontak;
				}
				elseif ( $hubkontak == "IBU" )
				{
					$hubkontak2 = "母親 ".$hubkontak;
				}
				elseif ( $hubkontak == "KAKAK" )
				{
					$hubkontak2 = "哥哥 ".$hubkontak;
				}
				elseif ( $hubkontak == "ANAK" )
				{
					$hubkontak2 = "孩子 ".$hubkontak;
				}
			}	
			$fotopaspor= $this->m_pdf7->fotopaspor($idbiodata);
			$fotopaspor2= $this->m_pdf7->fotopaspor2($idbiodata);
			$hitungpaspor= $this->m_pdf7->hitungpaspor($idbiodata);
			$jeniskelamin= $this->m_pdf7->jeniskelamin($idbiodata);

			$PHPWord = new PHPWord();

			$document = $PHPWord->loadTemplate('files/lt.docx');

			$document->setValue('Value1', $airport);
			$document->setValue('Value2', $namaagen);
			$document->setValue('Value3', $tanggaltiba);
			$document->setValue('Value4', $penerbangan1.'; '.$penerbangan2);
			$document->setValue('Value5', $jamtiba);
			$document->setValue('Value6', $namamajikantaiwan);
			$document->setValue('Value7', $namamajikan);
			$document->setValue('Value8', $idtki);
			$document->setValue('Value9', $namatki);
			$document->setValue('Value10', $namatkimandarin);
			$document->setValue('Value11', $tanggallahir);
			$document->setValue('Value12', $ambilpaspor);
			$document->setValue('Value13', $masaberlakupaspor);
			$document->setValue('Value14', $nosuhan);
			$document->setValue('Value15', $novisapermit);
			$document->setValue('Value16', $namabank);
			$document->setValue('Value17', $nilaikredit);
			$document->setValue('Value18', $statusnya);
			$document->setValue('Value19', $tglnikah);
			$document->setValue('Value20', $namapasangan);
			$document->setValue('Value21', $notelp);
			$document->setValue('Value200',$jeniskelamin);
			$document->setValue('valuepasangan', $hubkontak2);

			if($ambilfoto1==null){
			$document->setValue( 'Value22','');

			}else{

			$datagambar="assets/upload_arc/".$ambilfoto1;
			$aImgs1 = array(
					array(
					'img' => $datagambar,
					'size' => array(265, 165),
					)
				);
			$document->replaceStrToImg( 'Value22', $aImgs1);
			}


			$datapaspor="";
			$datapaspor2="";

			if ($fotopaspor != '' && $fotopaspor2 != '') {



			if($hitungpaspor==1){
			$datapaspor="assets/uploadpasporbaru/".$fotopaspor;
			$aImgs2 = array(
					array(
							'img' => $datapaspor,
					'size' => array(265, 165),
					)
				);
				$document->replaceStrToImg( 'Value23', $aImgs2);
				$document->setValue( 'Value24','');
			}
			else{
			$datapaspor="assets/uploadpasporbaru/".$fotopaspor;
			$datapaspor2="assets/uploadpasporbaru/".$fotopaspor2;
			$datapaspor="assets/uploadpasporbaru/".$fotopaspor;
			$aImgs2 = array(
					array(
							'img' => $datapaspor,
					'size' => array(265, 165),
					)
				);
				$document->replaceStrToImg( 'Value23', $aImgs2);
				$aImgs3 = array(
					array(
							'img' => $datapaspor2,
					'size' => array(265, 165),
					)
				);

			$document->replaceStrToImg( 'Value24', $aImgs3);
			}

			}else{

				$document->setValue('Value23', $fotopaspor);
				$document->setValue('Value24', $fotopaspor2);

			}


			$ambilktp = "SELECT * FROM foto WHERE id_biodata='$idbiodata' AND jenis='ktp'";
			$tampildataktp = $this->db->query($ambilktp)->row();
			$namaktp = $tampildataktp->namafile;

			if(isset($namaktp)){

				$dataktpsaya="upload-ktp/".$namaktp;

				$aImgs7 = array(
					array(
						'img' => $dataktpsaya,
						'size' => array(265, 165),
					)
				);
				$document->replaceStrToImg( 'Value25', $aImgs7);


			}else{

				$document->setValue('Value25', '');

			}
			

			$ambildataalamat = $this->db->query("SELECT alamat FROM disnaker where id_biodata='$idbiodata'")->row();
			$alamatsaya = $ambildataalamat->alamat;
			$document->setValue('Value28', $alamatsaya);

			 //$document->setValue('Value29', 'Tes');
			// $document->setValue('Value23', 'Pluto');

			$document->setValue('weekday', date('l'));
			$document->setValue('time', date('H:i'));
				
			$filename = 'filenyasa.docx';

			$isinya=$document->save($filename);

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.$isinya);
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($isinya));
			flush();
			readfile($isinya);
			unlink($isinya); // deletes the temporary file
			exit;
				}



	function cetakdokumen($idbiodata) {
		require_once 'assets/phpword/PHPWord.php';


$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('files/lt.docx');

$document->setValue('Value1', $airport);
$document->setValue('Value2', $namaagen);
$document->setValue('Value3', $tanggaltiba);
$document->setValue('Value4', $penerbangan1.''.$penerbangan2);
$document->setValue('Value5', $jamtiba);
$document->setValue('Value6', $namamajikantaiwan);
$document->setValue('Value7', $namamajikan);
$document->setValue('Value8', $idtki);
$document->setValue('Value9', $namatki);
$document->setValue('Value10', $namatkimandarin);
$document->setValue('Value11', $tanggallahir);
$document->setValue('Value12', $ambilpaspor);
$document->setValue('Value13', $masaberlakupaspor);
$document->setValue('Value14', $nosuhan);
$document->setValue('Value15', $novisapermit);
$document->setValue('Value16', $namabank);
$document->setValue('Value17', $nilaikredit);
$document->setValue('Value18', $statusnya);
$document->setValue('Value19', $tglnikah);
$document->setValue('Value20', $namapasangan);
$document->setValue('Value21', $notelp);
$datagambar="assets/upload_arc/".$ambilfoto1;

$datapaspor="assets/uploadpasporbaru/".$fotopaspor;
$datapaspor2="assets/uploadpasporbaru/".$fotopaspor2;
$aImgs1 = array(
        array(
         'img' => $datagambar,
		'size' => array(305, 205),
        )
    );
$aImgs2 = array(
        array(
            	'img' => $datapaspor,
		'size' => array(305, 205),
        )
    );
$aImgs3 = array(
        array(
            	'img' => $datapaspor2,
		'size' => array(305, 205),
        )
    );

$document->replaceStrToImg( 'Value22', $aImgs1);
$document->replaceStrToImg( 'Value23', $aImgs2);
$document->replaceStrToImg( 'Value24', $aImgs3);

// $document->setValue('Value22', 'Pluto');
// $document->setValue('Value23', 'Pluto');
// $document->setValue('Value24', 'Pluto');

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));
	
$filename = 'filenya.docx';

$isinya=$document->save($filename);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$isinya);
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($isinya));
flush();
readfile($isinya);
unlink($isinya); // deletes the temporary file
exit;
	}


	function cetakan05($idlaporan) {
		require_once 'assets/phpword/PHPWord.php';

			$ambilnomorlaporan = $this->m_pdf7->ambilnomorlaporan($idlaporan);
			$ambiltanggallaporan = $this->m_pdf7->ambiltanggallaporan($idlaporan);

			$ambiltglmulai = $this->m_pdf7->ambiltglmulai($idlaporan);
			$ambiltglakhir = $this->m_pdf7->ambiltglakhir($idlaporan);

$originalDate3 =str_replace('.','-',$ambiltglmulai);
$newDate3 = date("d-m-Y", strtotime($originalDate3));
$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 2);               
    $bulana = substr($newDate3, 3, 2);
    $tgla   = substr($newDate3, 6, 4);


$tglla =str_replace('.','-',$ambiltanggallaporan);
$tgllapors = date("d-m-Y", strtotime($tglla));

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('files/an.docx');

$document->setValue('Nomor',$ambilnomorlaporan);
$document->setValue('Tanggal',$tgllapors);
$document->setValue('Bulan',$BulanIndo[(int)$bulana-1]);
$document->setValue('Tahun',$tgla);

$tampidatanya=$this->m_pdf7->tampidatanya($ambiltglmulai,$ambiltglakhir);
$hitungdatanya=$this->m_pdf7->hitungdatanya($ambiltglmulai,$ambiltglakhir);

$document->cloneRow('Formal',$hitungdatanya);
$no=1;
foreach($tampidatanya->result() as $row) {
$document->setValue('No#'.$no,$no);
$document->setValue('Nama#'.$no, $row->namatkinya);
$document->setValue('Alamat#'.$no, $row->alamattkinya);
$stts = substr($row->id_biodata, 0, 2);
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria'  ||$row->jeniskelamin=='男'){
$document->setValue('jk#'.$no,'L');
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita' ||$row->jeniskelamin=='女'){
$document->setValue('jk#'.$no,'P');
}
$document->setValue('Tempat#'.$no, $row->tempatlahir);
$document->setValue('tgllahir#'.$no, $row->tanggallahir);
if($stts == 'FI' ||$stts == 'MI'){ 
$document->setValue('Informal#'.$no,'INFORMAL');
$document->setValue('Formal#'.$no,'');
}else{
$document->setValue('Formal#'.$no,'FORMAL');
$document->setValue('Informal#'.$no,'');
}
$document->setValue('nopaspor#'.$no, $row->paspornya);
$document->setValue('novisa#'.$no, $row->novisa);
if($stts == 'FI' ||$stts == 'MI'){ 
$document->setValue('namamajikan#'.$no,$row->informalmajikan);
$document->setValue('alamatmajikan#'.$no,$row->informalalamat);
}else{
$document->setValue('namamajikan#'.$no,$row->formalmajikan);
$document->setValue('alamatmajikan#'.$no,$row->formalalamat);
}
$document->setValue('namaagen#'.$no, $row->namaagennya);
$document->setValue('tglberangkat#'.$no, $row->tglberangkat);
$no++;
}

$filename = 'filenya.docx';

$isinya=$document->save($filename);

// header('Content-Description: File Transfer');
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename='.$isinya);
// header('Content-Transfer-Encoding: binary');
// header('Expires: 0');
// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
// header('Pragma: public');
// header('Content-Length: ' . filesize($isinya));

header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="' . $isinya . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    
flush();
readfile($isinya);
unlink($isinya); // deletes the temporary file
exit;
	}



	function cetakdokdibawa($idbiodata) {
		require_once 'assets/phpword/PHPWord.php';
$PHPWord = new PHPWord();

$idtki=$this->m_pdf7->idtki($idbiodata);
$namatki=$this->m_pdf7->namatki($idbiodata);
$namatkimandarin=$this->m_pdf7->namatkimandarin($idbiodata);
$tanggaltiba=$this->m_pdf7->tanggaltiba($idbiodata);
$ambilpaspor=$this->m_pdf7->ambilpaspor($idbiodata);

$ambilvisa=$this->m_pdf7->ambilvisa($idbiodata);
foreach($ambilvisa->result() as $row) {
$statsuhan=$row->statsuhandok;
$doksuhan=$row->tempatsuhandok;
$statvp=$row->statvpdok;
$dokvp=$row->tempatvpdok;
$jddok=$row->jddok;
$arcdok=$row->arcdok;
$icdok=$row->icdok;

$isidok1=$row->isidok1;
$statdok1=$row->statdok1;

$isidok2=$row->isidok2;
$statdok2=$row->statdok2;

$isidok3=$row->isidok3;
$statdok3=$row->statdok3;

$isidok4=$row->isidok4;
$statdok4=$row->statdok4;

$isidok5=$row->isidok5;
$statdok5=$row->statdok5;

$isidok6=$row->isidok6;
$statdok6=$row->statdok6;

$isidok7=$row->isidok7;
$statdok7=$row->statdok7;

$isidok8=$row->isidok8;
$statdok8=$row->statdok8;

$ketdok=$row->ketdok;

}


$stts = substr($idbiodata, 0, 2);
$idagen="";
$namaagen="";
$namamajikan="";
$namamajikantaiwan="";
$nosuhan="";
$novisapermit="";
if($stts == 'FI' ||$stts == 'MI'){ 
	$document = $PHPWord->loadTemplate('files/dokinformal.docx');
$idagen=$this->m_pdf7->ambilidagen($idbiodata);
$namaagen=$this->m_pdf7->namaagenfi($idbiodata);
$namamajikan=$this->m_pdf7->namamajikanfi($idbiodata);
$namamajikantaiwan=$this->m_pdf7->namataiwanmajikanfi($idbiodata);
$nosuhan=$this->m_pdf7->nosuhanfi($idbiodata);
$novisapermit=$this->m_pdf7->novisapermitfi($idbiodata);

$ambildokagen=$this->m_pdf7->ambildokagen($idagen,'informal');
$hitungdokagen=$this->m_pdf7->hitungdokagen($idagen,'informal');

} else {
	$document = $PHPWord->loadTemplate('files/dokformal.docx');
$idagen=$this->m_pdf7->ambilidagen($idbiodata);
$ambilidmajikan=$this->m_pdf7->ambilidmajikan($idbiodata);
$namaagen=$this->m_pdf7->namaagenformal($idbiodata);
$namamajikan=$this->m_pdf7->namamajikanformal($idbiodata);
$namamajikantaiwan=$this->m_pdf7->namataiwanmajikanformal($idbiodata);
$nosuhan=$this->m_pdf7->nosuhanformal($idbiodata);
$novisapermit=$this->m_pdf7->novisapermitformal($idbiodata);

$ambildokagen=$this->m_pdf7->ambildokagen($idagen,'formal');
$hitungdokagen=$this->m_pdf7->hitungdokagen($idagen,'formal');

$ambildokmajikan=$this->m_pdf7->ambildokmajikan($ambilidmajikan,'formal');
$hitungdokmajikan=$this->m_pdf7->hitungdokmajikan($ambilidmajikan,'formal');

$document->cloneRow('value15',$hitungdokmajikan);
$nos=1;
foreach($ambildokmajikan->result() as $rows) {
$document->setValue('value14#'.$nos,$nos);
$document->setValue('value15#'.$nos, $rows->dokumen);
$document->setValue('value16#'.$nos, $rows->stats);
$nos++;
}

}






$document->setValue('namaagen',$namaagen);
$document->setValue('value1',$namamajikan);
$document->setValue('value2',$namamajikantaiwan);
$document->setValue('value3',$idtki);
$document->setValue('value4',$namatki);
$document->setValue('value5',$namatkimandarin);
$document->setValue('value6',$tanggaltiba);

$document->setValue('value7',$nosuhan);
$document->setValue('value10',$novisapermit);
$document->setValue('value13',$ambilpaspor);

$document->setValue('value8',$statsuhan);
$document->setValue('value9',$doksuhan);
$document->setValue('value11',$statvp);
$document->setValue('value12',$dokvp);

$document->setValue('statdok1',$jddok);
$document->setValue('statdok2',$arcdok);
$document->setValue('statdok3',$icdok);




$document->cloneRow('value18',$hitungdokagen);
$no=1;
foreach($ambildokagen->result() as $row) {
$document->setValue('value17#'.$no,$no);
$document->setValue('value18#'.$no, $row->dokumen);
$document->setValue('value19#'.$no, $row->stats);
$no++;
}
$doke = array();
$state = array();
if($isidok1!=""){
$doke[]=$isidok1;
$state[]=$statdok1;
}
if($isidok2!=""){
$doke[]=$isidok2;
$state[]=$statdok2;
}
if($isidok3!=""){
$doke[]=$isidok3;
$state[]=$statdok3;
}
if($isidok4!=""){
$doke[]=$isidok4;
$state[]=$statdok4;
}
if($isidok5!=""){
$doke[]=$isidok5;
$state[]=$statdok5;
}
if($isidok6!=""){
$doke[]=$isidok6;
$state[]=$statdok6;
}
if($isidok7!=""){
$doke[]=$isidok7;
$state[]=$statdok7;
}
if($isidok8!=""){
$doke[]=$isidok8;
$state[]=$statdok8;
}

if(count($doke)>0){
$document->cloneRow('value21',count($doke));
$nn=1;
foreach ($doke as $value) {
    $document->setValue('value20#'.$nn,$nn+12);
    $document->setValue('value21#'.$nn,$doke[$nn-1]);
    $document->setValue('value22#'.$nn,$state[$nn-1]);

$nn++;
}
}else{
$document->setValue('value20','');
$document->setValue('value21','');
$document->setValue('value22','');

}
$document->setValue('value24',$ketdok);
// $document->setValue('noa',$jddok);
// $document->setValue('doka',$arcdok);
// $document->setValue('stata',$icdok);

// $document->setValue('nob',$jddok);
// $document->setValue('dokb',$arcdok);
// $document->setValue('statb',$icdok);

// $document->setValue('noc',$jddok);
// $document->setValue('dokc',$arcdok);
// $document->setValue('statc',$icdok);

// $document->cloneRow('Formal',$hitungdatanya);
// $no=1;
// foreach($tampidatanya->result() as $row) {
// }

$filename = 'dokdibawa.docx';

$isinya=$document->save($filename);

// header('Content-Description: File Transfer');
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename='.$isinya);
// header('Content-Transfer-Encoding: binary');
// header('Expires: 0');
// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
// header('Pragma: public');
// header('Content-Length: ' . filesize($isinya));

header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="' . $isinya . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    
flush();
readfile($isinya);
unlink($isinya); // deletes the temporary file
exit;
	}

	function cetaklaporanagen_semua($tglmulai, $tglakhir) {
			$sql = $this->M_session->select("SELECT disnaker.id_biodata,visa.tanggalterbang
		        ,dataagen.kode_agen as kodeagennya
		        ,dataagen.nama as namaagennya
		        ,disnaker.nama as namatkinya
		        ,personal.negara1 as negara1
		        ,personal.negara2 as negara2
		        ,personal.calling as calling
		        ,personal.skill1 as skill1
		        ,personal.skill2 as skill2
		        ,personal.skill3 as skill3
		        from disnaker 
				LEFT JOIN visa
				ON disnaker.id_biodata=visa.id_biodata 
				LEFT JOIN majikan
				ON majikan.id_biodata=disnaker.id_biodata
				LEFT JOIN paspor
				ON paspor.id_biodata=disnaker.id_biodata
				LEFT JOIN dataagen
				ON majikan.kode_agen=dataagen.id_agen
				LEFT JOIN personal
				ON disnaker.id_biodata=personal.id_biodata
				WHERE visa.tanggalterbang != ''
				AND visa.tanggalterbang between '$tglmulai' and '$tglakhir'
				AND paspor.keterangan = 'sudah' 
				ORDER BY visa.tanggalterbang ASC");

			$namanyaagen='-';

			require_once 'assets/phpword/PHPWord.php';

			$PHPWord = new PHPWord();

			$document = $PHPWord->loadTemplate('files/laporan_2.docx');

			$document->setValue('value1',$namanyaagen);
			$document->setValue('value2',$tglmulai);
			$document->setValue('value3',$tglakhir);

			$document->cloneRow('value4',count($sql));

			$no=1;

			foreach($sql as $row) {
			$document->setValue('value4#'.$no,$no);
			$document->setValue('value5#'.$no, $row->tanggalterbang);
			$document->setValue('value6#'.$no, $row->id_biodata."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3);
			$document->setValue('value7#'.$no, $row->namatkinya);
			$document->setValue('value8#'.$no, $row->kodeagennya);
			$document->setValue('value9#'.$no, $row->namaagennya);


		$no++;
		}


		$filename = 'Laporan AN05 - Semua List Agen.docx';

		$isinya=$document->save($filename);
		header("Content-Description: File Transfer");
		    header('Content-Disposition: attachment; filename="' . $filename  . '"');
		    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		    header('Content-Transfer-Encoding: binary');
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}


	function cetaklaporanagen() {

		$tglmulai	= $this->input->post('tglmulai');
		$tglakhir	= $this->input->post('tglakhir');

		$idagen	= $this->input->post('id_agen');
		if ($idagen == 'x_semua_agen') {
			redirect('pdf7/cetaklaporanagen_semua/'.$tglmulai.'/'.$tglakhir);
		}
$tampidatanyaagen=$this->m_pdf7->tampidatanyaagen($tglmulai,$tglakhir,$idagen);
$hitungdatanyaagen=$this->m_pdf7->hitungdatanyaagen($tglmulai,$tglakhir,$idagen);

$namanyaagen=$this->m_pdf7->namanyaagen($idagen);
		// echo "".$idagen;
		// echo "".$tglmulai;
		// echo "".$tglakhir;


		require_once 'assets/phpword/PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('files/laporan.docx');

$document->setValue('value1',$namanyaagen);
$document->setValue('value2',$tglmulai);
$document->setValue('value3',$tglakhir);


$document->cloneRow('value4',$hitungdatanyaagen);


$no=1;



foreach($tampidatanyaagen->result() as $row) {
$document->setValue('value4#'.$no,$no);
$document->setValue('value6#'.$no, $row->id_biodata."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3);
$document->setValue('value7#'.$no, $row->namatkinya);
$document->setValue('valuea7#'.$no, $row->namamandarintkinya);
$stts = substr($row->id_biodata, 0, 2);

$document->setValue('value8#'.$no, $row->paspornya);
$document->setValue('value9#'.$no, $row->expired);



if($stts == 'FI' ||$stts == 'MI'){ 
	$document->setValue('value10#'.$no, $row->id_suhan);
$document->setValue('value11#'.$no, $row->id_visapermit);
$document->setValue('value12#'.$no,$row->informalmajikan);
$document->setValue('valuea12#'.$no,$row->informalmandarinmajikan);
$document->setValue('value13#'.$no,$row->informalalamat);
$document->setValue('value14#'.$no,$row->hpinformal);
}else{
$document->setValue('value10#'.$no, $row->nosuhan);
$document->setValue('value11#'.$no, $row->novisapermit);
$document->setValue('value12#'.$no,$row->formalmajikan);
$document->setValue('valuea12#'.$no,$row->formalmandarinmajikan);
$document->setValue('value13#'.$no,$row->formalalamat);
$document->setValue('value14#'.$no,$row->hpformal);
}
$document->setValue('value5#'.$no, $row->tanggalterbang);

$document->setValue('value15#'.$no,$row->namakredit);
$document->setValue('value16#'.$no,$row->isikredit);
$document->setValue('value17#'.$no,$row->nilaikredit);



// $setelahterbang=$this->m_pdf7->setelahterbang($row->id_biodata);
// $document->cloneRow('value18',3);
// $nos=1;
// foreach($setelahterbang->result() as $rows) {
// $document->setValue('value18#'.$nos,$rows->tgl_setelah_terbang);
// $document->setValue('value19#'.$nos,$rows->ket_setelah_terbang);
// $nos++;
// }

$no++;
}

$filename = 'filenya.docx';

$isinya=$document->save($filename);

// header('Content-Description: File Transfer');
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename='.$isinya);
// header('Content-Transfer-Encoding: binary');
// header('Expires: 0');
// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
// header('Pragma: public');
// header('Content-Length: ' . filesize($isinya));

header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="' . $isinya . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    
flush();
readfile($isinya);
unlink($isinya); // deletes the temporary file
exit;
	}

	function blk_cetak_biaya_ujk($id_bayar_ujk) {
		$tampil_data_bayarujk	= $this->m_pdf7->tampil_data_bayarujk($id_bayar_ujk);
		$tampil_data_ctkinya	= $this->m_pdf7->tampil_data_ctkinya($id_bayar_ujk);
		$hitung_data_ctkinya 	= $this->m_pdf7->hitung_data_ctkinya($id_bayar_ujk);
		
		$tglujkx 	= $this->m_pdf7->tglujkx($id_bayar_ujk);
		$tglujkxx	= str_replace('.','-',$tglujkx);
		$tglujkxxx		= date("d-m-Y", strtotime($tglujkxx));

		$nopengajuanujk 	= $this->m_pdf7->nopengajuanujk($id_bayar_ujk);

		require_once 'assets/phpword/PHPWord.php';

		$PHPWord = new PHPWord();

		$document = $PHPWord->loadTemplate('files/bayarujk.docx');
		$hasilnya = 0;
		$tampunghasil = array(); 

	  	foreach($tampil_data_bayarujk->result() as $row) {
			// $hasilnya	= $row->biaya;
			
			$hasilmurni	= $row->biayamurni;
			$hasilulang	= $row->biayaulang;

			$tanggal 		= $row->tglsurat;
			$originalDate	= str_replace('.','-',$tanggal);
			$tanggalnya		= date("d-m-Y", strtotime($originalDate));
			
			$document->setValue('value1',$row->noresi);
			$document->setValue('value2',$tanggalnya);
			$document->setValue('value3',$row->nama_kepada);
			$document->setValue('value4',$row->alamat_kepada);
			// $document->setValue('value5',$row->biaya);
			$document->setValue('value6',$row->bank);
			// $document->setValue('value7',$row->biaya);
		} 
	 
		$document->cloneRow('nomor',$hitung_data_ctkinya);
		$no=1; 
	 	foreach($tampil_data_ctkinya->result() as $rows) {
			$zyxpilsek = substr($rows->blk_nodaftar, 0, 2);
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
				$asliname = $rows->personal_namaperblk;
				$aslinodo = $rows->personal_nodisnakernya;
				$aslinegr = $rows->personal_negaranya;
			} else {
				$asliname = $rows->blk_namaperblk;
				$aslinodo = $rows->blk_nodisnakernya;
				$aslinegr = $rows->blk_negaranya;
			}

			$document->setValue('nomor#'.$no,$no);
			$document->setValue('nodisnakernya#'.$no, $aslinodo);
			$document->setValue('nodaftar#'.$no, $rows->blk_nodaftar);
			$document->setValue('namablk#'.$no, $asliname);
			$document->setValue('negaranya#'.$no, $aslinegr);
			$document->setValue('valuef4#'.$no, $tglujkxxx);
			$nilais=0;
			if($rows->ket=='MURNI'){
			$nilais=$hasilmurni;
			}
			if($rows->ket=='ULANG'){
			$nilais=$hasilulang;
			}
			$document->setValue('value5#'.$no, $nilais);
			$document->setValue('value7#'.$no, $nilais);
			
		 	$tampunghasil[] = $nilais;
		 	$no++;
		}  
	 
		$hasiltampungan = array_sum($tampunghasil);
		$document->setValue('total',$hasiltampungan);
	 	$document->setValue('noaju',$nopengajuanujk);

		//$document->setValue('value1',$id_bayar_ujk);
		//$document->setValue('value3',"asat");
		//$document->cloneRow('value4',2);
		// $no=1;
		// foreach($tampidatanyaagen->result() as $row) {
		// $document->setValue('value4#'.$no,$no);
		// $document->setValue('value6#'.$no, $row->id_biodata);
		// $document->setValue('value7#'.$no, $row->namatkinya);
		// $document->setValue('valuea7#'.$no, $row->namamandarintkinya);
		// $stts = substr($row->id_biodata, 0, 2);

		// $document->setValue('value8#'.$no, $row->paspornya);
		// $document->setValue('value9#'.$no, $row->expired);
		// if($stts == 'FI' ||$stts == 'MI'){ 
		// 	$document->setValue('value10#'.$no, $row->id_suhan);
		// $document->setValue('value11#'.$no, $row->id_visapermit);
		// $document->setValue('value12#'.$no,$row->informalmajikan);
		// $document->setValue('valuea12#'.$no,$row->informalmandarinmajikan);
		// $document->setValue('value13#'.$no,$row->informalalamat);
		// $document->setValue('value14#'.$no,$row->hpinformal);
		// }else{
		// $document->setValue('value10#'.$no, $row->nosuhan);
		// $document->setValue('value11#'.$no, $row->novisapermit);
		// $document->setValue('value12#'.$no,$row->formalmajikan);
		// $document->setValue('valuea12#'.$no,$row->formalmandarinmajikan);
		// $document->setValue('value13#'.$no,$row->formalalamat);
		// $document->setValue('value14#'.$no,$row->hpformal);
		// }
		// $document->setValue('value5#'.$no, $row->tanggalterbang);

		// $document->setValue('value15#'.$no,$row->namakredit);
		// $document->setValue('value16#'.$no,$row->isikredit);
		// $document->setValue('value17#'.$no,$row->nilaikredit);


		// $no++;
		// }

		$filename = 'filenya.docx';

		$isinya=$document->save($filename);

		// header('Content-Description: File Transfer');
		// header('Content-Type: application/octet-stream');
		// header('Content-Disposition: attachment; filename='.$isinya);
		// header('Content-Transfer-Encoding: binary');
		// header('Expires: 0');
		// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		// header('Pragma: public');
		// header('Content-Length: ' . filesize($isinya));

		header("Content-Description: File Transfer");
	    header('Content-Disposition: attachment; filename="' . $isinya . '"');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	    header('Content-Transfer-Encoding: binary');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}
	
function blk_cetak_invoice_ujk($idnyalengkap) {

	$tampungnya= explode('-',$idnyalengkap);

	
	$id_invoice_ujk=$tampungnya[0];
	$idpemilik=$tampungnya[1];

	$tampil_data_invoiceujk			= $this->m_pdf7->tampil_data_invoiceujk($id_invoice_ujk);
	$tampil_data_ctkinya_invoujk	= $this->m_pdf7->tampil_data_ctkinya_invoujk($id_invoice_ujk,$idpemilik);
	$hitung_data_ctkinya_invoujk 	= $this->m_pdf7->hitung_data_ctkinya_invoujk($id_invoice_ujk,$idpemilik);
	
	$nopengajuanujk 	= $this->m_pdf7->nopengajuanujk($id_invoice_ujk);

	$tglujkx 	= $this->m_pdf7->tglujkx($id_invoice_ujk);
	$tglujkxx	= str_replace('.','-',$tglujkx);
	$tglujkxxx		= date("d-m-Y", strtotime($tglujkxx));

	require_once 'assets/phpword/PHPWord.php';

	$PHPWord = new PHPWord();

	$document = $PHPWord->loadTemplate('files/invoiceujk.docx');
	$hasilnya = 0;
	$tampunghasil = array(); 

	foreach($tampil_data_invoiceujk->result() as $row) {
	$hasilnya	= $row->biaya;
	$tanggal 		= $row->tglsurat;
	$originalDate	= str_replace('.','-',$tanggal);
	$tanggalnya		= date("d-m-Y", strtotime($originalDate));
	
		$document->setValue('value1',$row->noinvoice_ujk);
		$document->setValue('value2',$tanggalnya);
		$document->setValue('value3',$row->nama_kepada);
		$document->setValue('value4',$row->negara_p);
		$document->setValue('value5',$row->biaya);
		$document->setValue('value6',$row->bank);
		$document->setValue('value7',$hasilnya);
 
 }  


 
 	$document->cloneRow('nomor',$hitung_data_ctkinya_invoujk);
	$no=1; 
	foreach($tampil_data_ctkinya_invoujk->result() as $rows) {
		$zyxpilsek = substr($rows->blk_nodaftar, 0, 2);
		if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
			$asliname = $rows->personal_namaperblk;
			$aslinodo = $rows->personal_nodisnakernya;
			$aslinegr = $rows->personal_negaranya;
		} else {
			$asliname = $rows->blk_namaperblk;
			$aslinodo = $rows->blk_nodisnakernya;
			$aslinegr = $rows->blk_negaranya;
		}

		$document->setValue('nomor#'.$no,$no);
		$document->setValue('value8#'.$no, $aslinodo);
		$document->setValue('value9#'.$no, $rows->blk_nodaftar);
		$document->setValue('value10#'.$no, $asliname);
		$document->setValue('value11#'.$no, $aslinegr);
		$document->setValue('tanggalx#'.$no, $tglujkxxx);
		
		$tampunghasil[] = $hasilnya;
	$no++;
	}  
 
	$hasiltampungan = array_sum($tampunghasil);
	$document->setValue('total',$hasiltampungan);
	 $document->setValue('noaju',$nopengajuanujk);

	$filename = 'filenya.docx';

	$isinya=$document->save($filename);
	header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $isinya . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		
	flush();
	readfile($isinya);
	unlink($isinya); // deletes the temporary file
	exit;
}
	
function blk_cetak_invoice_reftuk($id_invoice_reftuk) {

	$tampil_data_invoicereftuk			= $this->m_pdf7->tampil_data_invoicereftuk($id_invoice_reftuk);
	$tampil_data_ctkinya_invoreftuk		= $this->m_pdf7->tampil_data_ctkinya_invoreftuk($id_invoice_reftuk);
	$hitung_data_ctkinya_invoreftuk 	= $this->m_pdf7->hitung_data_ctkinya_invoreftuk($id_invoice_reftuk);
	
	require_once 'assets/phpword/PHPWord.php';

	$PHPWord = new PHPWord();

	$document = $PHPWord->loadTemplate('files/invoicereftuk.docx');
	$hasilnya = 0;
	$tampunghasil = array(); 


	foreach($tampil_data_invoicereftuk->result() as $row) {
	$hasilnya	= $row->biaya;
	
	$tanggal 		= $row->tglsurat;
	$originalDate	= str_replace('.','-',$tanggal);
	$tanggalnya		= date("d-m-Y", strtotime($originalDate));
	
		$document->setValue('value1',$row->noinvoice_reftuk);
		$document->setValue('value2',$tanggalnya);
		$document->setValue('value3',$row->nama_kepada);
		$document->setValue('value4',$row->alamat_kepada);
		$document->setValue('value5',$row->biaya);
		$document->setValue('value6',$row->bank);
		$document->setValue('value7',$row->biaya);
 
 }  
 
 	$document->cloneRow('nomor',$hitung_data_ctkinya_invoreftuk);
	$no=1; 
	foreach($tampil_data_ctkinya_invoreftuk->result() as $rows) {
		$document->setValue('nomor#'.$no,$no);
		$document->setValue('value8#'.$no, $rows->iddisnaker);
		$document->setValue('value9#'.$no, $rows->nodaftar);
		$document->setValue('value10#'.$no, $rows->namaperblk);
		$document->setValue('value11#'.$no, $rows->negaranya);
		
	$tampunghasil[] = $hasilnya;
	$no++;
	}    
 
	$hasiltampungan = array_sum($tampunghasil);
	$document->setValue('total',$hasiltampungan);
	
	$filename = 'filenya.docx';

	$isinya=$document->save($filename);
	header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $isinya . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		
	flush();
	readfile($isinya);
	unlink($isinya); // deletes the temporary file
	exit;
}
	
function blk_cetak_invoice_pelatihan($id_invoice_pelatihan) {

	$tampil_data_invoicepelatihan		= $this->m_pdf7->tampil_data_invoicepelatihan($id_invoice_pelatihan);
	$tampil_data_ctkinya_invopelatihan	= $this->m_pdf7->tampil_data_ctkinya_invopelatihan($id_invoice_pelatihan);
	$hitung_data_ctkinya_invopelatihan 	= $this->m_pdf7->hitung_data_ctkinya_invopelatihan($id_invoice_pelatihan);
	
	require_once 'assets/phpword/PHPWord.php';

	$PHPWord = new PHPWord();

	$document = $PHPWord->loadTemplate('files/invoicepelatihan.docx');
	$hasilnya = 0;
	$tampunghasil = array(); 


	foreach($tampil_data_invoicepelatihan->result() as $row) {
	$hasilnya	= $row->biaya;
	
	$tanggal 		= $row->tglsurat;
	$originalDate	= str_replace('.','-',$tanggal);
	$tanggalnya		= date("d-m-Y", strtotime($originalDate));
	
		$document->setValue('value1',$row->noinvoice_pelatihan);
		$document->setValue('value2',$tanggalnya);
		$document->setValue('value3',$row->nama_kepada);
		$document->setValue('value4',$row->negara_p);
		$document->setValue('value5',$row->biaya);
		$document->setValue('value6',$row->bank);
		$document->setValue('value7',$row->biaya);
 
 }  
 
 	$document->cloneRow('nomor',$hitung_data_ctkinya_invopelatihan);
	$no=1; 
	foreach($tampil_data_ctkinya_invopelatihan->result() as $rows) {
		$document->setValue('nomor#'.$no,$no);
		$document->setValue('value8#'.$no, $rows->iddisnaker);
		$document->setValue('value9#'.$no, $rows->nodaftar);
		$document->setValue('value10#'.$no, $rows->namaperblk);
		$document->setValue('value11#'.$no, $rows->negaranya);
		
	$tampunghasil[] = $hasilnya;
	$no++;
	} 
 
	$hasiltampungan = array_sum($tampunghasil);
	$document->setValue('total',$hasiltampungan);
	
	$filename = 'filenya.docx';

	$isinya=$document->save($filename);
	header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $isinya . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		
	flush();
	readfile($isinya);
	unlink($isinya); // deletes the temporary file
	exit;
}


function blk_cetak_pengajuan_ujk($id_formulir) {

function Terbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
 
}

	$tampil_data_pengajuan_ujk			= $this->m_pdf7->tampil_data_pengajuan_ujk($id_formulir);
	// $tampil_data_ctkinya_pengajuan_ujk	= $this->m_pdf7->tampil_data_ctkinya_pengajuan_ujk($id_pengajuan_ujk);
	$hitungisi 	= $this->m_pdf7->hitungisi($id_formulir);

	$hitungman	= $this->m_pdf7->hitungbahasa($id_formulir,'MANDARIN');
	$hitungkan 	= $this->m_pdf7->hitungbahasa($id_formulir,'KANTONIS');
	$hitunging 	= $this->m_pdf7->hitungbahasa($id_formulir,'INGGRIS');


	$hitungmana	= $this->m_pdf7->hitungbahasastatus($id_formulir,'MANDARIN','MURNI');
	$hitungmanb	= $this->m_pdf7->hitungbahasastatus($id_formulir,'MANDARIN','ULANG');

	$hitungkana 	= $this->m_pdf7->hitungbahasastatus($id_formulir,'KANTONIS','MURNI');
	$hitungkanb 	= $this->m_pdf7->hitungbahasastatus($id_formulir,'KANTONIS','ULANG');

	$hitunginga 	= $this->m_pdf7->hitungbahasastatus($id_formulir,'INGGRIS','MURNI');
	$hitungingb 	= $this->m_pdf7->hitungbahasastatus($id_formulir,'INGGRIS','ULANG');
	
	require_once 'assets/phpword/PHPWord.php';

	$PHPWord = new PHPWord();

	$ambil_tipe = $this->M_session->select_row(" SELECT tipe FROM blk_formulir WHERE id_formulir='$id_formulir' ");
	if ( $ambil_tipe->tipe == 'BLK-LN' ) 
	{
		$document = $PHPWord->loadTemplate('files/pengajuanujk.docx');
	}
	elseif ( $ambil_tipe->tipe == 'LPKS' ) 
	{
		$document = $PHPWord->loadTemplate('files/lpkskib_pengajuanujk.docx');
	}
	else
	{
		exit('ERROR-4005');
	}

	foreach($tampil_data_pengajuan_ujk->result() as $row) {
	
	$tanggal 		= $row->tgl_pengajuan;
	$originalDate	= str_replace('.','-',$tanggal);
	$tanggalnya		= date("d-m-Y", strtotime($originalDate));
	
		$document->setValue('value1',$row->no_pengajuan);
		$document->setValue('value2',$row->nama_kepada);
		$document->setValue('value3',$row->alamat_kepada);
		$document->setValue('value4',$tanggalnya);
 
 }  
 $document->setValue('value5',$hitungisi);
  $document->setValue('value6',Terbilang($hitungisi));
  $document->setValue('value7',$hitungman);
  $document->setValue('value8',$hitungkan);
  $document->setValue('value9',$hitunging);

   $document->setValue('value7a',$hitungmana);
    $document->setValue('value7b',$hitungmanb);

    $document->setValue('value8a',$hitungkana);
    $document->setValue('value8b',$hitungkanb);

    $document->setValue('value9a',$hitunginga);
    $document->setValue('value9b',$hitungingb);
 //	$document->cloneRow('nomor',$hitung_data_ctkinya_pengajuan_ujk);
 //	$no=1; 
 //	foreach($tampil_data_ctkinya_pengajuan_ujk->result() as $rows) {
	//	$document->setValue('nomor#'.$no,$no);
	//	$document->setValue('value8#'.$no, $rows->iddisnaker);
	//	$document->setValue('value9#'.$no, $rows->nodaftar);
	//	$document->setValue('value10#'.$no, $rows->namaperblk);
	//	$document->setValue('value11#'.$no, $rows->negaranya);
		
	//$no++;
	//} 
 
	$filename = 'filenya.docx';

	$isinya=$document->save($filename);
	header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $isinya . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		
	flush();
	readfile($isinya);
	unlink($isinya); // deletes the temporary file
	exit;
}



}