<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pdf13 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf13');
			$this->load->library('Pdf');
	}
	function cetakfilter() {
		$bulans = $this->input->get('bulan');
        $tahuns = $this->input->get('tahun');

	$tampil_data_detail = $this->m_pdf13->tampil_data_detailfilter($bulans,$tahuns);

	$daerah = $this->m_pdf13->daerahfilter($bulans,$tahuns);
	$tanggal = $this->m_pdf13->tanggalfilter($bulans,$tahuns);
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	$tampildata='';
	$no=1;
	$hasilnya=0;

	foreach($tampil_data_detail->result() as $row) {
		$jknya='';
		if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria'  ||$row->jeniskelamin=='男'){
		$jknya='L';
		}
		if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita' ||$row->jeniskelamin=='女'){
		$jknya='P';
	}

	$datenya2= $row->tgllahirpersonal;
	$originalDate2 =str_replace('.','-',$datenya2);
	$newDate2sd = date("d-m-Y", strtotime($originalDate2));


	$tampildata.='<tr nobr="true">
					<th colspan="2"  align="center">'.$no.'</th>  
					<th colspan="4"  align="left">'.$row->nodisnaker.'</th> 
					<th colspan="8"  align="left">'.$row->namapersonal.'<br>'.$row->personaltempat.','.$newDate2sd.' </th> 
					<th colspan="2"  align="left"> '.$jknya.'</th>
					<th colspan="8"  align="left"> '.$row->alamat.'</th>
					<th colspan="5"  align="left"> '.$row->biaya.' </th>
				
				</tr>';

			$nilainya=$row->biaya;
			$hasil =str_replace('Rp.','',$nilainya);
			$hasil =str_replace('.','',$hasil);
			$hasil2=$hasil;
			$hasilnya=$hasilnya+$hasil2;
			$no++;
		}

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(5, 10, 5);
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
    $pdf->SetFont('times', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	$originalDate3 =str_replace('.','-',$tanggal);
	$newDate3 = date("Y-m-d", strtotime($originalDate3));

	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

    $html = '
    <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				
										
			 </table>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> LAMPIRAN BUKTI SETOR PEMBAYARAN BULAN '.$BulanIndo[(int)$bulans-1].' - '.$tahuns.' <br> PREMI ASURANSI PRA TKI TAIWAN
 </b></th>   
				</tr>			
			 </table><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="4" ><b> No ID</b></th> 
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="8" ><b> Alamat</b></th>
					<th colspan="5" ><b> Jumlah Uang (Rp)</b></th>
				
				</tr>

				'.$tampildata.'
				<tr>
					<th colspan="2" > </th>  
					<th colspan="4" > </th> 
					<th colspan="8" > </th> 
					<th colspan="2" > </th>
					<th colspan="8" > TOTAL </th>
					<th colspan="5" > Rp. '.number_format($hasilnya,2,',','.').'</th>
				
				</tr>
			 </table>
			 <br><br>
			  <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
									<th colspan="24" align="center">Lawang, '. date('01').' - '.date('t').' '.$BulanIndo[(int)$bulans-1].' '.$tahuns.'</th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }



	function cetak($id_pembuatan) {

	$tampil_data_detail = $this->m_pdf13->tampil_data_detail($id_pembuatan);

	$daerah = $this->m_pdf13->daerah($id_pembuatan);
	$tanggal = $this->m_pdf13->tanggal($id_pembuatan);

	$asuransi = $this->m_pdf13->tampillembaga($id_pembuatan);

$tampildata='';
$no=1;
$hasilnya=0;

foreach($tampil_data_detail->result() as $row) {

$datenya= $row->tglterbit;
$originalDate =str_replace('.','-',$datenya);
$newDate = date("d-m-Y", strtotime($originalDate));

$originalDate2 =$row->expired;
$newDate2 = date("d-m-Y", strtotime($originalDate2));
$pass='';
if($datenya==''){
$pass='<th colspan="7" ></th>';
}else{
$pass='<th colspan="7" >'.$row->nopaspor.'<br>'.$newDate.' s.d. '.$newDate2.'</th>';
}


$jknya='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria'  ||$row->jeniskelamin=='男'){
$jknya='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita' ||$row->jeniskelamin=='女'){
$jknya='P';
}

$datenya2= $row->tgllahirpersonal;
$originalDate2 =str_replace('.','-',$datenya2);
$newDate2sd = date("d-m-Y", strtotime($originalDate2));


$tampildata.='<tr nobr="true">
					<th colspan="2"  align="center">'.$no.'</th>  
					<th colspan="4"  align="left">'.$row->nodisnaker.'</th> 
					<th colspan="8"  align="left">'.$row->namapersonal.'<br>'.$row->personaltempat.',<br>'.$newDate2sd.' </th> 
					<th colspan="2"  align="left"> '.$jknya.'</th>
					<th colspan="8"  align="left">'.$row->alamattampil.'</th>
					'.$pass.'
					<th colspan="5"  align="left"> '.$row->biaya.' </th>
				
				</tr>';

$nilainya=$row->biaya;
$hasil =str_replace('Rp.','',$nilainya);
$hasil =str_replace('.','',$hasil);
$hasil2=$hasil;
$hasilnya=$hasilnya+$hasil2;
$no++;
		}

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(5, 10, 5);
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
    $pdf->SetFont('times', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	$originalDate3 =str_replace('.','-',$tanggal);
$newDate3 = date("Y-m-d", strtotime($originalDate3));

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

    $html = '
    <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>
			 <table  width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center"><b> LAMPIRAN BUKTI SETOR PEMBAYARAN PREMI ASURANSI PRA TKI TAIWAN<br></b></th>   
				</tr>			
				<tr>
					<th align="left"><b> Nama Lembaga Asuransi : '.$asuransi.'</b></th>   
				</tr>	
			 </table>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="4" ><b> No ID</b></th> 
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="8" ><b> Alamat</b></th>
					<th colspan="7" ><b> No/tgl<br>Paspor</b></th>
					<th colspan="5" ><b> Jumlah Uang (Rp)</b></th>
				
				</tr>

				'.$tampildata.'
				<tr>
					<th colspan="2" > </th>  
					<th colspan="4" > </th> 
					<th colspan="8" > </th> 
					<th colspan="2" > </th>
					<th colspan="15" > TOTAL </th>
					<th colspan="5" > Rp. '.number_format($hasilnya,2,',','.').'</th>
				
				</tr>
			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
									<th colspan="24" align="center">'.$daerah.', '.$tgna.' </th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

    function cetak22filter() {
		$bulans = $this->input->get('bulan');
        $tahuns = $this->input->get('tahun');
	$tampil_data_detail2 = $this->m_pdf13->tampil_data_detail2filter($bulans,$tahuns);

	// $daerah = $this->m_pdf13->daerah2($id_pembuatan);
	// $tanggal = $this->m_pdf13->tanggal2($id_pembuatan);

$tampildata='';
$no=1;
$hasilnya=0;

foreach($tampil_data_detail2->result() as $row) {



$jknya='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria' ||$row->jeniskelamin=='男'){
$jknya='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita'||$row->jeniskelamin=='女'){
$jknya='P';
}
$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$datenya22= $row->tgllahirpersonal;
$originalDate22 =str_replace('.','-',$datenya22);
$newDate222 = date("d-m-Y", strtotime($originalDate22));


$tampildata.='<tr nobr="true">
					<th colspan="2"  align="center">'.$no.'</th>  
					<th colspan="4"  align="left">'.$row->nodisnaker.'</th> 
					<th colspan="8"  align="left">'.$row->namapersonal.'<br>'.$row->personaltempat.','.$newDate222.' </th> 
					<th colspan="2"  align="left"> '.$jknya.'</th>
					<th colspan="8"  align="left"> '.$row->alamat.'</th>
					<th colspan="5"  align="left"> '.$row->biaya.' </th>
				
				</tr>';

$nilainya=$row->biaya;
$hasil =str_replace('Rp.','',$nilainya);
$hasil =str_replace('.','',$hasil);
$hasil2=$hasil;
$hasilnya=$hasilnya+$hasil2;
$no++;
		}

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(5, 10, 5);
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
    $pdf->SetFont('times', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
// 	$originalDate3 =str_replace('.','-',$tanggal);
// $newDate3 = date("Y-m-d", strtotime($originalDate3));

// $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

//     $tahuna = substr($newDate3, 0, 4);               
//     $bulana = substr($newDate3, 5, 2);
//     $tgla   = substr($newDate3, 8, 2);
//     $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;
$tgna='';
    $html = '<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> LAMPIRAN BUKTI SETOR PEMBAYARAN BULAN '.$BulanIndo[(int)$bulans-1].' - '.$tahuns.' <br>PREMI ASURANSI PRA TKI TAIWAN
 </b></th>   
				</tr>			
			 </table><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="4" ><b> No ID</b></th> 
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="8" ><b> Alamat</b></th>
					<th colspan="5" ><b> Jumlah Uang (Rp)</b></th>
				
				</tr>

				'.$tampildata.'
				<tr>
					<th colspan="2" > </th>  
					<th colspan="4" > </th> 
					<th colspan="8" > </th> 
					<th colspan="2" > </th>
					<th colspan="8" > TOTAL </th>
					<th colspan="5" > Rp. '.number_format($hasilnya,2,',','.').'</th>
				
				</tr>
			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
					<th colspan="24" align="center">Lawang, '. date('01').' - '.date('t').' '.$BulanIndo[(int)$bulans-1].' '.$tahuns.'</th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

    function cetak22($id_pembuatan) {

	$tampil_data_detail2 = $this->m_pdf13->tampil_data_detail2($id_pembuatan);

	$daerah = $this->m_pdf13->daerah2($id_pembuatan);
	$tanggal = $this->m_pdf13->tanggal2($id_pembuatan);
	$asuransi = $this->m_pdf13->tampillembaga2($id_pembuatan);

$tampildata='';
$no=1;
$hasilnya=0;

foreach($tampil_data_detail2->result() as $row) {



$jknya='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria' ||$row->jeniskelamin=='男'){
$jknya='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita'||$row->jeniskelamin=='女'){
$jknya='P';
}

$datenya22= $row->tgllahirpersonal;
$originalDate22 =str_replace('.','-',$datenya22);
$newDate222 = date("d-m-Y", strtotime($originalDate22));

$datenya= $row->tglterbit;
$originalDate =str_replace('.','-',$datenya);
$newDate = date("d-m-Y", strtotime($originalDate));

$originalDate2 =$row->expired;
$newDate2 = date("d-m-Y", strtotime($originalDate2));
$pass='';
if($datenya==''){
$pass='<th colspan="7" ></th>';
}else{
$pass='<th colspan="7" >'.$row->nopaspor.'<br>'.$newDate.' s.d. '.$newDate2.'</th>';
}

$tampildata.='<tr nobr="true">
					<th colspan="2"  align="center">'.$no.'</th>  
					<th colspan="4"  align="left">'.$row->nodisnaker.'</th> 
					<th colspan="8"  align="left">'.$row->namapersonal.'<br>'.$row->personaltempat.',<br>'.$newDate222.' </th> 
					<th colspan="2"  align="left"> '.$jknya.'</th>
					<th colspan="8"  align="left">'.$row->alamattampil.'</th>
					'.$pass.'
					<th colspan="5"  align="left"> '.$row->biaya.' </th>
				
				</tr>';

$nilainya=$row->biaya;
$hasil =str_replace('Rp.','',$nilainya);
$hasil =str_replace('.','',$hasil);
$hasil2=$hasil;
$hasilnya=$hasilnya+$hasil2;
$no++;
		}

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(5, 10, 5);
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
    $pdf->SetFont('times', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	$originalDate3 =str_replace('.','-',$tanggal);
$newDate3 = date("Y-m-d", strtotime($originalDate3));

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

    $html = '<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> LAMPIRAN BUKTI SETOR PEMBAYARAN PREMI ASURANSI PRA TKI TAIWAN<br>
 </b></th>   
				</tr>	
				<tr>
					<th align="left"><b> Nama Lembaga Asuransi : '.$asuransi.'</b></th>   
				</tr>			
			 </table>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="4" ><b> No ID</b></th> 
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="8" ><b> Alamat</b></th>
					<th colspan="7" ><b> No/tgl<br>Paspor</b></th>
					<th colspan="5" ><b> Jumlah Uang (Rp)</b></th>
				
				</tr>

				'.$tampildata.'
				<tr>
					<th colspan="2" > </th>  
					<th colspan="4" > </th> 
					<th colspan="8" > </th> 
					<th colspan="2" > </th>
					<th colspan="15" > TOTAL </th>
					<th colspan="5" > Rp. '.number_format($hasilnya,2,',','.').'</th>
				
				</tr>
			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
									<th colspan="24" align="center">'.$daerah.', '.$tgna.' </th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

function cetak33($id_pembuatan) {

	$tampil_data_detail3 = $this->m_pdf13->tampil_data_detail3($id_pembuatan);

	$daerah = $this->m_pdf13->daerah3($id_pembuatan);
	$tanggal = $this->m_pdf13->tanggal3($id_pembuatan);
$asuransi = $this->m_pdf13->tampillembaga3($id_pembuatan);

$tampildata='';
$no=1;
$hasilnya=0;

foreach($tampil_data_detail3->result() as $row) {



$jknya='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria' ||$row->jeniskelamin=='男'){
$jknya='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita'||$row->jeniskelamin=='女'){
$jknya='P';
}

$datenya22= $row->tgllahirpersonal;
$originalDate22 =str_replace('.','-',$datenya22);
$newDate222 = date("d-m-Y", strtotime($originalDate22));

$datenya= $row->tglterbit;
$originalDate =str_replace('.','-',$datenya);
$newDate = date("d-m-Y", strtotime($originalDate));

$originalDate2 =$row->expired;
$newDate2 = date("d-m-Y", strtotime($originalDate2));
$pass='';
if($datenya==''){
$pass='<th colspan="7" ></th>';
}else{
$pass='<th colspan="7" >'.$row->nopaspor.'<br>'.$newDate.' s.d. '.$newDate2.'</th>';
}


$tampildata.='<tr nobr="true">
					<th colspan="2"  align="center">'.$no.'</th>  
					<th colspan="4"  align="left">'.$row->nodisnaker.'</th> 
					<th colspan="8"  align="left">'.$row->namapersonal.'<br>'.$row->personaltempat.',<br>'.$newDate222.' </th> 
					<th colspan="2"  align="left"> '.$jknya.'</th>
					<th colspan="8"  align="left">'.$row->alamattampil.'</th>
					'.$pass.'
					<th colspan="5"  align="left"> '.$row->biaya.' </th>
				
				</tr>';

$nilainya=$row->biaya;
$hasil =str_replace('Rp.','',$nilainya);
$hasil =str_replace('.','',$hasil);
$hasil2=$hasil;
$hasilnya=$hasilnya+$hasil2;
$no++;
		}

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(5, 10, 5);
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
    $pdf->SetFont('times', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	$originalDate3 =str_replace('.','-',$tanggal);
$newDate3 = date("Y-m-d", strtotime($originalDate3));

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

    $html = '<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> LAMPIRAN BUKTI SETOR PEMBAYARAN PREMI ASURANSI MASA TKI TAIWAN<br>
 </b></th>   
				</tr>	
				<tr>
					<th align="left"><b> Nama Lembaga Asuransi : '.$asuransi.'</b></th>   
				</tr>			
			 </table>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="4" ><b> No ID</b></th> 
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="8" ><b> Alamat</b></th>
					<th colspan="7" ><b> No/tgl<br>Paspor</b></th>
					<th colspan="5" ><b> Jumlah Uang (Rp)</b></th>
				
				</tr>

				'.$tampildata.'
				<tr>
					<th colspan="2" > </th>  
					<th colspan="4" > </th> 
					<th colspan="8" > </th> 
					<th colspan="2" > </th>
					<th colspan="15" > TOTAL </th>
					<th colspan="5" > Rp. '.number_format($hasilnya,2,',','.').'</th>
				
				</tr>
			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
									<th colspan="24" align="center">'.$daerah.', '.$tgna.' </th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }


function cetak33filter() {
		$bulans = $this->input->get('bulan');
        $tahuns = $this->input->get('tahun');
	$tampil_data_detail3 = $this->m_pdf13->tampil_data_detail3filter($bulans,$tahuns);


$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$tampildata='';
$no=1;
$hasilnya=0;

foreach($tampil_data_detail3->result() as $row) {



$jknya='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria' ||$row->jeniskelamin=='男'){
$jknya='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita'||$row->jeniskelamin=='女'){
$jknya='P';
}

$datenya22= $row->tgllahirpersonal;
$originalDate22 =str_replace('.','-',$datenya22);
$newDate222 = date("d-m-Y", strtotime($originalDate22));


$tampildata.='<tr nobr="true">
					<th colspan="2"  align="center">'.$no.'</th>  
					<th colspan="4"  align="left">'.$row->nodisnaker.'</th> 
					<th colspan="8"  align="left">'.$row->namapersonal.'<br>'.$row->personaltempat.','.$newDate222.' </th> 
					<th colspan="2"  align="left"> '.$jknya.'</th>
					<th colspan="8"  align="left"> '.$row->alamat.'</th>
					<th colspan="5"  align="left"> '.$row->biaya.' </th>
				
				</tr>';

$nilainya=$row->biaya;
$hasil =str_replace('Rp.','',$nilainya);
$hasil =str_replace('.','',$hasil);
$hasil2=$hasil;
$hasilnya=$hasilnya+$hasil2;
$no++;
		}

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(5, 10, 5);
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
    $pdf->SetFont('times', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
// 	$originalDate3 =str_replace('.','-',$tanggal);
// $newDate3 = date("Y-m-d", strtotime($originalDate3));

// $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

//     $tahuna = substr($newDate3, 0, 4);               
//     $bulana = substr($newDate3, 5, 2);
//     $tgla   = substr($newDate3, 8, 2);
//     $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

    $html = '<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> LAMPIRAN BUKTI SETOR PEMBAYARAN BULAN '.$BulanIndo[(int)$bulans-1].' - '.$tahuns.' <br> PREMI ASURANSI MASA TKI TAIWAN
 </b></th>   
				</tr>			
			 </table><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="4" ><b> No ID</b></th> 
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="8" ><b> Alamat</b></th>
					<th colspan="5" ><b> Jumlah Uang (Rp)</b></th>
				
				</tr>

				'.$tampildata.'
				<tr>
					<th colspan="2" > </th>  
					<th colspan="4" > </th> 
					<th colspan="8" > </th> 
					<th colspan="2" > </th>
					<th colspan="8" > TOTAL </th>
					<th colspan="5" > Rp. '.number_format($hasilnya,2,',','.').'</th>
				
				</tr>
			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
				<th colspan="24" align="center">Lawang, '. date('01').' - '.date('t').' '.$BulanIndo[(int)$bulans-1].' '.$tahuns.'</th>

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

    function cetak2($id_pembuatan) {


		// $ambilidbio = $this->m_pdf13->ambilidbio($id_pembuatan);

	$tampil_data_detailhapap = $this->m_pdf13->tampil_data_detailhapap($id_pembuatan);

	$daerah = $this->m_pdf13->daerahhapap($id_pembuatan);
	$tanggal = $this->m_pdf13->tanggalhapap($id_pembuatan);


$tampildata='';
$no=1;
$hasilnya=0;

foreach($tampil_data_detailhapap->result() as $row) {

			$stts = substr($row->id_biodata, 0, 2);
		$formal='';
		if($stts=='FI'){
			$formal='WORKER';
		}
		if($stts=='MI'){
			$formal='Care Giver';
		}
		if($stts=='FF'){
			$formal='WORKER';
		}
		if($stts=='MF'){
			$formal='WORKER';
		}
		if($stts=='JP'){
			$formal='WORKER';
		}
$datenya= $row->tglterbit;
$originalDate =str_replace('.','-',$datenya);
$newDate = date("d-m-Y", strtotime($originalDate));

$originalDate2 =$row->expired;
$newDate2 = date("d-m-Y", strtotime($originalDate2));
$jknya='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria' ||$row->jeniskelamin=='男' ){
$jknya='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita'||$row->jeniskelamin=='女'){
$jknya='P';
}


$tampildata.='<tr nobr="true">
				<th colspan="2" >'.$no.'</th>  
					<th colspan="8">'.$row->nama.'<br>'.$row->tempatlahir.', <br>'.$row->tanggallahir.' </th> 
					<th colspan="2" > '.$jknya.'</th>
					<th colspan="5" > '.$formal.'</th> 
					<th colspan="7" > '.$row->nopaspor.' '.$newDate.' s.d. '.$newDate2.'</th>
					<th colspan="7" > '.$row->asuransi.'</th>
					<th colspan="4" > </th>
					<th colspan="4" > </th>
				</tr>';

$nilainya=$row->jumlah;
$hasil =str_replace('Rp.','',$nilainya);
$hasil =str_replace('.','',$hasil);
$hasil2=trim($hasil," ");
$hasilnya=$hasilnya+$hasil2;
$no++;
		}

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(5, 10, 5);
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
    $pdf->SetFont('times', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	$originalDate3 =str_replace('.','-',$tanggal);
$newDate3 = date("Y-m-d", strtotime($originalDate3));

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;


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
$nohasil=$no-1;
		$angkahuruf =ucwords(Terbilang($nohasil));

    $html = '
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> DAFTAR HADIR <br>
PEMBEKALAN AKHIR PEMBERANGKATAN ( PAP ) <br>
CALON TENAGA KERJA INDONESIA <br>
SEKTOR FORMAL <br>

 </b></th>   
				</tr>			
			 </table><br><br>
			 			<table align="left" width="100%" cellspacing="0">
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Nama PPTKIS</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> PT. FLAMBOYAN GEMA JASA</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Alamat PPTKIS</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI  KEC.LAWANG-MALANG</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Jumlah Peserta PAP</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> '.$nohasil.' ('.$angkahuruf.')</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Negara Tujuan</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> TAIWAN</b></th> 
				</tr>

			 </table><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="5" ><b> Jabatan</b></th> 
					<th colspan="7" ><b> No/tgl<br>Paspor</b></th>
					<th colspan="7" ><b> Nama Asuransi</b></th>
					<th colspan="4" ><b> TTD</b></th>
					<th colspan="4" ><b> Ket</b></th>
				
				</tr>
				'.$tampildata.'

				

			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="24" align="center">'.$daerah.', '.$tgn2.' </th> 

					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="24" >  Panitia PAP </th> 

					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>

										<th colspan="24" align="center"><u>____________________</u><br></th> 
 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

    function cetakppad($id_pembuatan) {
		$nomor 				= $this->m_pdf13->nomorpap($id_pembuatan);
		$nomorktkln			= $this->m_pdf13->nomorkt($id_pembuatan);
		$daerah 			= $this->m_pdf13->daerahpap( $id_pembuatan);
		$tanggal 			= $this->m_pdf13->tanggalx($id_pembuatan);
		$tanggalpap 			= $this->m_pdf13->tanggalpap($id_pembuatan);

		$kepada 			= $this->m_pdf13->kepadapap($id_pembuatan);
        
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

        $pemisah='';
        $pemisah=' <br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>';
		    $pemisah2 = ' 
			<br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
										
			</table>';

	// Set some content to print
	$originalDate3 =str_replace('.','-',$tanggal);
    $newDate3 = date("Y-m-d", strtotime($originalDate3));

	$originalDate4 =str_replace('.','-',$tanggalpap);
    $newDate4 = date("Y-m-d", strtotime($originalDate4));

    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

    $tahun2 = substr($newDate4, 0, 4);               
    $bulan2 = substr($newDate4, 5, 2);
    $tgl2   = substr($newDate4, 8, 2);
    $tgn2 = $tgl2 . " " . $BulanIndo[(int)$bulan2-1]. " ". $tahun2;

    $day = date('D', strtotime($newDate4));
    $dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
    );


    $tampildata='';
	$tampil_data_detailpap = $this->m_pdf13->tampil_data_detailpap($id_pembuatan);
    $no=1;

    foreach($tampil_data_detailpap->result() as $row) {

		$stts = substr($row->id_biodata, 0, 2);
		$formal='';
		$sektornya='';
		if($stts=='FI'){
			$formal='WORKER';
			$sektornya='INFORMAL';
		}
		if($stts=='MI'){
			$formal='Care Giver';
			$sektornya='INFORMAL';
		}
		if($stts=='FF'){
			$formal='WORKER';
			$sektornya='FORMAL';
		}
		if($stts=='MF'){
			$formal='WORKER';
			$sektornya='FORMAL';
		}
		if($stts=='JP'){
			$formal='WORKER';
			$sektornya='FORMAL';
		}

        if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria' ||$row->jeniskelamin=='男' ){
            $jknya='L';
        }
        if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita'||$row->jeniskelamin=='女'){
            $jknya='P';
        }

        $tampildata.='<tr nobr="true">
    			<th colspan="2" > '.$no.'</th>  
    			<th colspan="7" > '.$row->nodisnaker.'</th>
    			<th colspan="8" > '.$row->nama.'</th> 
    			<th colspan="7" > '.$row->nopaspor.'</th>
    			<th colspan="2" > '.$jknya.'</th>
    			<th colspan="6" > '.$row->jabatan.'</th> 
    			<th colspan="5" > '.$sektornya.'</th>
		    </tr>';
		    $no++;
		}
	    $tampil_data_detail = $this->m_pdf13->tampil_data_detailpap($id_pembuatan);

        $tampildata2='';
        $no2=1;
        $hasilnya=0;

        foreach($tampil_data_detail->result() as $row) {
            $jknya='';
                if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria' ||$row->jeniskelamin=='男' ){
                $jknya='L';
            }
                if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita'||$row->jeniskelamin=='女' ){
                $jknya='P';
            }
            $tampildata2.='<tr nobr="true">
    			<th colspan="2"  align="center">'.$no2.'</th>  
    			<th colspan="4"  align="left">'.$row->nodisnaker.'</th> 
    			<th colspan="8"  align="left">'.$row->nama.'<br>'.$row->tempatlahir.','.$row->tanggallahir.' </th> 
    			<th colspan="2"  align="left"> '.$jknya.'</th>
    			<th colspan="8"  align="left"> '.$row->alamat.'</th>
    			<th colspan="5"  align="left"> '.$row->jumlah.'</th>
    		</tr>';
    
            $nilainya=$row->jumlah;
            $hasil =str_replace('Rp','',$nilainya);
            $hasil =str_replace('Rp.','',$nilainya);
            $hasil =str_replace('.','',$hasil);
            $hasil =str_replace('-','',$hasil);
            $hasil2=trim($hasil," ");
            $hasilnya=$hasilnya+$hasil2;
            $no2++;
    	}


        $tampildata3='';
        $tampilhasil='';
        $no3=1;
        $hasilnya3=0;
        	$tampil_data_detailhapapformal = $this->m_pdf13->tampil_data_detailpapformal($id_pembuatan);
        
        if(count($tampil_data_detailhapapformal)==0){
        $tampilhasil='
        
        
        ';


}else{

foreach($tampil_data_detailhapapformal->result() as $row) {

			$stts3 = substr($row->id_biodata, 0, 2);
		$formal3='';
		if($stts3=='FI'){
			$formal3='WORKER';
		}
		if($stts3=='MI'){
			$formal3='Care Giver';
		}
		if($stts3=='FF'){
			$formal3='WORKER';
		}
		if($stts3=='MF'){
			$formal3='WORKER';
		}
		if($stts3=='JP'){
			$formal3='WORKER';
		}
$datenya4= $row->tglterbit;
$originalDate4 =str_replace('.','-',$datenya4);
$newDate4 = date("d-m-Y", strtotime($originalDate4));

$originalDate24 =$row->expired;
$newDate24 = date("d-m-Y", strtotime($originalDate24));

$originalDatetgl =$row->tanggallahir;
// $newDatetgl = date("d-m-Y", strtotime($originalDatetgl));
$newDatetgl = str_replace(".", "/", $originalDatetgl);

$jknya3='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria' ||$row->jeniskelamin=='男'){
$jknya3='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita'||$row->jeniskelamin=='女'){
$jknya3='P';
}


$tampildata3.='<tr nobr="true">
				<th colspan="2" ><font size="10">'.$no3.'</font></th>  
					<td colspan="8" align="left"><font size="10">'.$row->nama.'<br>'.$row->tempatlahir.', <br>'.$newDatetgl.' </font></td> 
					<th colspan="2" ><font size="10">'.$jknya3.'</font></th>
					<th colspan="5" ><font size="10">'.$row->jabatan.'</font></th> 
					<th colspan="7" ><font size="10"> '.$row->nopaspor.' '.$newDate4.' s.d. '.$newDate24.'</font></th>
					<th colspan="7" ><font size="10">'.$row->asuransi.'</font></th>
					<th colspan="7" ><font size="10">'.$row->dtkode.'</font></th>
					<th colspan="4" ></th>
					<th colspan="4" > </th>
				</tr>';

// $nilainya3=$row->jumlah;
// $hasil3 =str_replace('Rp.','',$nilainya3);
// $hasil3 =str_replace('.','',$hasil3);
// $hasil23=trim($hasil3," ");
// $hasilnya3=$hasilnya3+$hasil23;
$no3++;
		}

		$nohasil3=$no3-1;
		$angkahuruf3 =ucwords(Terbilang($nohasil3));

		$tampilhasil=' '.$pemisah2.'

	 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> DAFTAR HADIR <br>
PEMBEKALAN AKHIR PEMBERANGKATAN ( PAP ) <br>
CALON TENAGA KERJA INDONESIA <br>
SEKTOR FORMAL <br>

 </b></th>   
				</tr>			
			 </table><br><br>
			 			<table align="left" width="100%" cellspacing="0">
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Nama PPTKIS</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> PT. FLAMBOYAN GEMA JASA</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Alamat PPTKIS</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI  KEC.LAWANG-MALANG</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Jumlah Peserta PAP</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> '.$nohasil3.' ('.$angkahuruf3.')</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Negara Tujuan</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> TAIWAN</b></th> 
				</tr>

			 </table><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="5" ><b> Jabatan</b></th> 
					<th colspan="7" ><b> No/tgl<br>Paspor</b></th>
					<th colspan="7" ><b> Nama Asuransi</b></th>
					<th colspan="7" ><b> Majikan</b></th>
					<th colspan="4" ><b> TTD</b></th>
					<th colspan="4" ><b> Ket</b></th>
				
				</tr>
				'.$tampildata3.'

				

			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="24" align="center">'.$daerah.', '.$tgn2.' </th> 

					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="24" >  Panitia PAP </th> 

					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>

										<th colspan="24" align="center"><u>____________________</u><br></th> 
 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
		';
		if($nohasil3==0){
		$tampilhasil='';
		}

}

$tampildata4='';
$tampilhasil2='';
$no4=1;
$hasilnya4=0;


	$tampil_data_detailhapapinformal = $this->m_pdf13->tampil_data_detailpapinformal($id_pembuatan);
	

if(count($tampil_data_detailhapapinformal)==0){
$tampilhasil2='


';


}else{
foreach($tampil_data_detailhapapinformal->result() as $row) {

			$stts4 = substr($row->id_biodata, 0, 2);
		$formal4='';
		if($stts4=='FI'){
			$formal4='Care Giver';
		}
		if($stts4=='MI'){
			$formal4='Care Giver';
		}
		if($stts4=='FF'){
			$formal4='WORKER';
		}
		if($stts4=='MF'){
			$formal4='WORKER';
		}
		if($stts4=='JP'){
			$formal4='WORKER';
		}
$datenya4= $row->tglterbit;
$originalDate4 =str_replace('.','-',$datenya4);
$newDate4 = date("d-m-Y", strtotime($originalDate4));

$originalDate24 =$row->expired;
$newDate24 = date("d-m-Y", strtotime($originalDate24));

$originaltgl24 =$row->tanggallahir;
$newtgl24 = str_replace(".", "/", $originaltgl24);


$jknya4='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria'  ||$row->jeniskelamin=='男' ){
$jknya4='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita' ||$row->jeniskelamin=='女'){
$jknya4='P';
}


$tampildata4.='<tr nobr="true" >
				<th colspan="2" ><font size="10">'.$no4.'</font></th>  
					<th colspan="8" align="left" ><font size="10">'.$row->nama.'<br>'.$row->tempatlahir.', <br>'.$newtgl24.' </font></th> 
					<th colspan="2" ><font size="10">'.$jknya4.'</font></th>
					<th colspan="6" ><font size="10">'.$row->jabatan.'</font></th> 
					<th colspan="7" ><font size="10">'.$row->nopaspor.' <br>'.$newDate4.' s.d. '.$newDate24.'</font></th>
					<th colspan="7" ><font size="10">'.$row->asuransi.'</font></th>
					<th colspan="3" ></th>
					<th colspan="4" > </th>
				</tr>';

// $nilainya4=$row->jumlah;
// $hasil4 =str_replace('Rp.','',$nilainya4);
// $hasil4 =str_replace('.','',$hasil4);
// $hasil24=trim($hasil4," ");
// $hasilnya4=$hasilnya4+$hasil24;
$no4++;
		}
	$nohasil4=$no4-1;
		$angkahuruf4 =ucwords(Terbilang($nohasil4));





$tampilhasil2=' '.$pemisah2.'
 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> DAFTAR HADIR <br>
PEMBEKALAN AKHIR PEMBERANGKATAN ( PAP )  <br>
CALON TENAGA KERJA INDONESIA <br>
SEKTOR INFORMAL <br>

 </b></th>   
				</tr>			
			 </table><br><br>
			 			<table align="left" width="100%" cellspacing="0">
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Nama PPTKIS</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> PT. FLAMBOYAN GEMA JASA</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Alamat PPTKIS</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI  KEC.LAWANG-MALANG</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Jumlah Peserta PAP</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> '.$nohasil4.' ('.$angkahuruf4.')</b></th> 
				</tr>
				<tr>
				<th colspan="3" ><b> </b></th>  
					<th colspan="15" ><b> Negara Tujuan</b></th>  
					<th colspan="1" ><b> : </b></th>  
					<th colspan="28" ><b> TAIWAN</b></th> 
				</tr>

			 </table><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="6" ><b> Jabatan</b></th> 
					<th colspan="7" ><b> No/tgl<br>Paspor</b></th>
					<th colspan="7" ><b> Nama Asuransi</b></th>
					<th colspan="3" ><b> TTD</b></th>
					<th colspan="4" ><b> Ket</b></th>
				
				</tr>
				'.$tampildata4.'

				

			 </table>
			 <br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="24" align="center">'.$daerah.', '.$tgn2.' </th> 

					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="24" >  Panitia PAP </th> 

					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>

										<th colspan="24" align="center"><u>____________________</u><br></th> 
 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>

';
		if($nohasil4==0){
		$tampilhasil2='';
		}
	}



		// $tanggal 			=date('d-m-Y');

// 		$originalDate = $tgllahir;
// $newDate = date("d-m-Y", strtotime($originalDate));

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('REKOM IJIN KE DISNAKER & DESA');
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
     $pdf->SetMargins(20, 4, 20);
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
    $pdf->SetFont('times', '', '10.5', '', false);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print

	
$harinya=$dayList[$day];
$nohasil=$no-1;
		$angkahuruf =ucwords(Terbilang($nohasil));


	
	
    $html = ' <br><br><br><br><br><br><br><br>
      <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<br>
				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="25">'.$nomor.'</th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Lampiran</th> 
					<th colspan="3">:</th> 
					<th colspan="16">1 ( satu ) lembar </th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>

				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Perihal</th> 
					<th colspan="3">:</th> 
					<th colspan="25">Permohonan Mengikuti PAP</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>	<br><br>
			       <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="25">Kepada Yth </th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>
				<tr>
					<th colspan="20">'.$kepada.'</th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>

				<tr>
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
											
			 </table><br>

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
	
				<tr> 
					<th style="text-align:justify" >Bersama ini kami mengajukan permohonan untuk dapat mengikuti Pembekalan Akhir Pemberangkatan (PAP) bagi Calon TKI yang akan bekerja di luar negeri Negara TAIWAN pada hari '.$harinya.', Tanggal '.$tgn2.' sejumlah '.$nohasil.' ( '.$angkahuruf.' ) Orang CTKI dengan data sebagai berikut: </th> 
				</tr>							
			 </table><br><br>
			  <table align="center" width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="2" > NO</th>  
					<th colspan="7" > ID TKI</th>
					<th colspan="8" > NAMA</th> 
					<th colspan="7" > No. Paspor</th>
					<th colspan="2" > L/P</th>
					<th colspan="6" > JABATAN</th> 
					<th colspan="5" > SEKTOR</th>			
				</tr>
				'.$tampildata.'

			 </table><br><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
	
				<tr> 
					<th style="text-align:justify" >Demikian permohonan ini disampaikan, atas perhatian dan kerjasamanya disampaikan terima kasih.</th> 
				</tr>							
			 </table>
			 <br><br><br><br><br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
			 <tr>
									<th colspan="24" align="left">'.$daerah.', '.$tgna.' </th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
			 <tr>
									<th colspan="24" align="left">Hormat Kami,</th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="30" align="left"><b>PT FLAMBOYAN GEMA JASA</b></th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" > </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="30" align="left"><b><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </b></th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table>
			'.$pemisah.'
   <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<br>
				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="25">'.$nomorktkln.'</th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Lampiran</th> 
					<th colspan="3">:</th> 
					<th colspan="16">1 ( satu ) lembar </th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>

				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Perihal</th> 
					<th colspan="3">:</th> 
					<th colspan="25">Pendaftaran Peserta E-KTKLN</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>	<br><br>
			       <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="25">Kepada Yth </th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>
				<tr>
					<th colspan="20">'.$kepada.'</th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>

				<tr>
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
											
			 </table><br>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th>Dengan Hormat,</th> 

				</tr>
				<tr> 
					<th style="text-align:justify" >Bersama ini kami mengajukan permohonan untuk dapat diproses E-KTKLN bagi Calon TKI yang telah memenuhi syarat untuk bekerja di luar negeri sebagaimana daftar nominative terlampir. Dengan Negara Tujuan TAIWAN sejumlah '.$nohasil.' ( '.$angkahuruf.' ) Orang CTKI.</th> 
				</tr>							
			 </table>

			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th style="text-align:justify" >Demikian Surat Permohonan ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</th> 
				</tr>							
			 </table>

			 <br><br><br><br><br><br>
			   <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
			 <tr>
									<th colspan="24" align="left">'.$daerah.', '.$tgna.' </th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
			 <tr>
									<th colspan="24" align="left">Hormat Kami,</th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="30" align="left"><b>PT FLAMBOYAN GEMA JASA</b></th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" > </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="30" align="left"><b><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </b></th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br><br><br>
'.$tampilhasil.'
'.$tampilhasil2.'
		
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('REKOM PEMBUATAN SKCK.pdf', 'I');    
    }

        function cetakktkln($id_pembuatan) {
		$nomor 				= $this->m_pdf13->nomorktkln($id_pembuatan);
		$daerah 			= $this->m_pdf13->daerahktkln( $id_pembuatan);
		$tanggal 			= $this->m_pdf13->tanggalktkln($id_pembuatan);
		$kepada 			= $this->m_pdf13->kepadaktkln($id_pembuatan);
		$jumlah 			= $this->m_pdf13->jumlahktkln($id_pembuatan);


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


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('REKOM IJIN KE DISNAKER & DESA');
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
     $pdf->SetMargins(20, 4, 20);
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

		// Set some content to print
	$originalDate3 =str_replace('.','-',$tanggal);
$newDate3 = date("Y-m-d", strtotime($originalDate3));

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

    $day = date('D', strtotime($newDate3));
$dayList = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);
$harinya=$dayList[$day];
// $nohasil=$no-1;
		$angkahuruf =ucwords(Terbilang($jumlah));
	
    $html = ' <br><br><br><br><br><br><br><br>
   <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<br>
				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="25">'.$nomor.'</th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Lampiran</th> 
					<th colspan="3">:</th> 
					<th colspan="16">1 ( satu ) lembar </th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>

				<tr>
				<th colspan="1"></th> 
					<th colspan="8">Perihal</th> 
					<th colspan="3">:</th> 
					<th colspan="25">Permohonan Mengikuti PAP</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>	<br><br>
			       <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="25">Kepada Yth </th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>
				<tr>
					<th colspan="20">'.$kepada.'</th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
				</tr>

				<tr>
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
											
			 </table><br>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th>Dengan Hormat,</th> 

				</tr>
				<tr> 
					<th style="text-align:justify" >Bersama ini kami mengajukan permohonan untuk dapat diproses E-KTKLN bagi Calon TKI yang telah memenuhi syarat untuk bekerja di luar negeri sebagaimana daftar nominative terlampir. Dengan Negara Tujuan TAIWAN sejumlah '.$jumlah.' ( '.$angkahuruf.' ) Orang CTKI.</th> 
				</tr>							
			 </table>

			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th style="text-align:justify" >Demikian Surat Permohonan ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</th> 
				</tr>							
			 </table>

			 <br><br><br><br><br><br>
			   <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
			 <tr>
									<th colspan="24" align="left">'.$daerah.', '.$tgna.' </th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
			 <tr>
									<th colspan="24" align="left">Hormat Kami,</th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="30" align="left"><b>PT FLAMBOYAN GEMA JASA</b></th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" > </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					
					<th colspan="30" align="left"><b><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </b></th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br><br><br>
			';
			
  // ;  

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('REKOM PEMBUATAN SKCK.pdf', 'I');    
    }

   function exportword($id_pembuatan)
    {
include("html_to_doc.php");

$tampil_data_detail = $this->m_pdf13->tampil_data_detail($id_pembuatan);

	$daerah = $this->m_pdf13->daerah($id_pembuatan);
	$tanggal = $this->m_pdf13->tanggal($id_pembuatan);

	$asuransi = $this->m_pdf13->tampillembaga($id_pembuatan);

$tampildata='';
$no=1;
$hasilnya=0;

foreach($tampil_data_detail->result() as $row) {

$datenya= $row->tglterbit;
$originalDate =str_replace('.','-',$datenya);
$newDate = date("d-m-Y", strtotime($originalDate));

$originalDate2 =$row->expired;
$newDate2 = date("d-m-Y", strtotime($originalDate2));
$pass='';
if($datenya==''){
$pass='<th colspan="7" class="tidakbold"></th>';
}else{
$pass='<th colspan="7" class="tidakbold">'.$row->nopaspor.'<br>'.$newDate.' s.d. '.$newDate2.'</th>';
}


$jknya='';
if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria'  ||$row->jeniskelamin=='男'){
$jknya='L';
}
if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita' ||$row->jeniskelamin=='女'){
$jknya='P';
}

$datenya2= $row->tgllahirpersonal;
$originalDate2 =str_replace('.','-',$datenya2);
$newDate2sd = date("d-m-Y", strtotime($originalDate2));


$tampildata.='<tr nobr="true">
					<th colspan="2"  align="center" class="tidakbold">'.$no.'</th>  
					<th colspan="4"  align="left" class="tidakbold">'.$row->nodisnaker.'</th> 
					<th colspan="8"  align="left" class="tidakbold">'.$row->namapersonal.'<br>'.$row->personaltempat.',<br>'.$newDate2sd.' </th> 
					<th colspan="2"  align="left" class="tidakbold"> '.$jknya.'</th>
					<th colspan="8"  align="left" class="tidakbold"> '.$row->alamat.'</th>
					'.$pass.'
					<th colspan="5"  align="left" class="tidakbold"> '.$row->biaya.' </th>
				
				</tr>';

$nilainya=$row->biaya;
$hasil =str_replace('Rp.','',$nilainya);
$hasil =str_replace('.','',$hasil);
$hasil2=$hasil;
$hasilnya=$hasilnya+$hasil2;
$no++;
		}
	$originalDate3 =str_replace('.','-',$tanggal);
$newDate3 = date("Y-m-d", strtotime($originalDate3));

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

    $html = '
<style>
.tidakbold { font-weight:normal; }
</style>
<div class=Section1>
    <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr><tr>
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
										
			 </table>
			 <table  width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center"><b> LAMPIRAN BUKTI SETOR PEMBAYARAN PREMI ASURANSI PRA TKI TAIWAN<br></b></th>   
				</tr>			
				<tr>
					<th align="left"><b> Nama Lembaga Asuransi : '.$asuransi.'</b></th>   
				</tr>	
			 </table>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th colspan="2" ><b> NO</b></th>  
					<th colspan="4" ><b> No ID</b></th> 
					<th colspan="8" ><b> Nama /Ttl</b></th> 
					<th colspan="2" ><b> L/P</b></th>
					<th colspan="8" ><b> Alamat</b></th>
					<th colspan="7" ><b> No/tgl<br>Paspor</b></th>
					<th colspan="5" ><b> Jumlah Uang (Rp)</b></th>
				
				</tr>

				'.$tampildata.'
				<tr>
					<th colspan="2" > </th>  
					<th colspan="4" > </th> 
					<th colspan="8" > </th> 
					<th colspan="2" > </th>
					<th colspan="15" > TOTAL </th>
					<th colspan="5" > Rp. '.number_format($hasilnya,2,',','.').'</th>
				
				</tr>
			 </table>
			 <br><br>
			 <table align="left" width="50%" cellspacing="0" cellpadding="2" border="">
				<tr>
									<th colspan="24" align="center">'.$daerah.', '.$tgna.' </th> 

					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" > <br><br><br><br><br><br><br><br> </th>  
				</tr>
				<tr>
					
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>   
				</tr>
											
			 </table><br>
			</div>
			';

			$html2='';
            
            // Create the object from the class
            $htmltodoc= new HTML_TO_DOC();
             
            // Pass the variable which contains the code to the object. 
            // The 3rd parameter forces to download the generated Microsoft Word document.
            $htmltodoc->createDoc($html, "my_filename.doc", true);

    }
    
    
     function penyebut($nilai="") {
         $nilai = abs($nilai);
         $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
         $temp = "";
         if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
         } else if ($nilai <20) {
            $temp = $this->penyebut($nilai - 10). " belas";
         } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
         } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
         } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
         } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
         } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
         } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
         } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
         } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
         }     
         return $temp;
     }
         
     function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }     
        return $hasil;
     }    
    function cetakopp($id_pembuatan=""){
        
		error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        $data['nomor'] 				= $this->m_pdf13->nomorpap($id_pembuatan);
		$data['nomorktkln']			= $this->m_pdf13->nomorkt($id_pembuatan);
		$data['daerah'] 			= $this->m_pdf13->daerahpap( $id_pembuatan);
		$data['tanggal'] 			= $this->m_pdf13->tanggalx($id_pembuatan);
	    $data['tanggalpap'] 		= $this->m_pdf13->tanggalpap($id_pembuatan);
		$data['kepada'] 			= $this->m_pdf13->kepadapap($id_pembuatan);
    	$data['tampil_data_detailhapapinformal'] = $this->m_pdf13->tampil_data_detailpapinformal($id_pembuatan)->result();
    	$data['tampil_data_detailpap'] = $this->m_pdf13->tampil_data_detailpap($id_pembuatan)->result();
        $data['total'] = count($data['tampil_data_detailpap']); 
        $data['total_penyebut'] = $this->terbilang(count($data['tampil_data_detailpap'])); 
        $newDate4 = str_replace('.','-',$data['tanggalpap']);
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun2 = substr($newDate4, 0, 4);               
        $bulan2 = substr($newDate4, 5, 2);
        $tgl2   = substr($newDate4, 8, 2);
        $tgn2 = $tgl2 . " " . $BulanIndo[(int)$bulan2-1]. " ". $tahun2;
        $tgn3 = date('d'). " " . $BulanIndo[(int)date('m')-1]. " ". date('Y');
        $data['tglopp'] = $tgn2;
        $data['tglopp1'] = $tgn3;
        // end data
        		
        $this->load->library('Pdf');
	    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('SURAT REKOM PASPOR MALANG');
	    $pdf->SetSubject('SURAT REKOMENDASI PASPOR');
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
	    $pdf->SetMargins(5, 10, 5);
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
		// Set some content to print
		$html = $this->load->view('pdf13/temp', $data, TRUE);;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		ob_end_clean();
		$pdf->Output('REKOM PASPOR MALANG .pdf', 'I'); 
    }
    

}