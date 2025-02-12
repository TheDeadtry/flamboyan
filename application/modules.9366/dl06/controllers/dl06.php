<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class dl06 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_dl06');
			$this->load->library('Pdf');
	}
	
	function cetak($id_pembuatan) {


		$ambilidbio = $this->m_dl06->ambilidbio($id_pembuatan);

	$tampil_data_detail = $this->m_dl06->tampil_data_detail($ambilidbio);

	$daerah = $this->m_dl06->daerah($id_pembuatan);
	$tampilkan = $this->m_dl06->tampilkan($id_pembuatan);
	$tanggal = $this->m_dl06->tanggal($id_pembuatan);

	$originalDate3 =str_replace('.','-',$tanggal);
$newDate3 = date("Y-m-d", strtotime($originalDate3));

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

$tampildata='';
$no=1;

foreach($tampil_data_detail->result() as $row) {

$jeniskelamin = $row->jeniskelamin;
$status = $row->status;
$agama = $row->agama;
$pendidikan = $row->pendidikan;

if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

		$agama=str_replace("回教","",$agama);
		$agama=str_replace("基督教","",$agama);
		$agama=str_replace("天主教","",$agama);
		$agama=str_replace("印度教","",$agama);
		$agama=str_replace("佛教","",$agama);

		$datapen = $this->m_dl06->ambilpendmandarin();


		for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

$statusnya='';
		if($tampilkan=='Orang Tua'){
$statusnya='<th colspan="9" ></th>  
			<th colspan="9" >'.$row->namaayah.' <br>'.$row->alamatortu.'</th>  ';

		}elseif($tampilkan=='Ibu') {
				$statusnya = '<th colspan="9"></th>  
							<th colspan="9">'.$row->namaibu.' <br>'.$row->alamatortu.'</th>';
			}elseif($tampilkan=='wali') {
				$statusnya = '<th colspan="9"></th>  
							<th colspan="9">'.$row->namakontak.' <br>'.$row->alamatkontak.'</th>';
			}else{
$statusnya='<th colspan="9" >'.$row->namapasangan.'<br>'.$row->alamatpasangan.'</th>  
			<th colspan="9" ></th>   
			 ';
		}


$datafoto = $this->m_dl06->ambilfoto($row->id_biodata);


	$originalDate4 =str_replace('.','-',$row->tanggallahir);
$newDate4 = date("d-m-Y", strtotime($originalDate4));


$tampildata.='<tr>
					<th colspan="2" >'.$no.'</th>  
					<th colspan="8" ></th> 
					<th colspan="8" >'.$row->nama.'<br>'.$row->tempatlahir.', <br>'.$newDate4.' </th> 
					<th colspan="4" >'.$jeniskelamin.'</th>
					<th colspan="4" >'.$status.'</th>
					<th colspan="7" >'.$row->alamat.'</th>
					<th colspan="5" >'.$agama.'</th>
					<th colspan="5" >'.$pendidikan.'</th>
					<th colspan="5" >'.$row->jabatan.'</th>  
					'.$statusnya.'
					<th colspan="5" >'.$row->negara.'</th>  
				</tr>';

$no++;
		}

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, 'F4', true, 'UTF-8', false);
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
	
    $html = '<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> DAFTAR NOMINASI CALON TKI YANG DINYATAKAN LULUS SELEKSI UNTUK PASPOR DARI </b></th>   
				</tr>
				<tr>
					<th><b>PT. FLAMBOYAN GEMAJASA LAWANG</b></th>  
				</tr>				
			 </table><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" > NO</th>  
					<th colspan="8" > FOTO </th> 
					<th colspan="8" > NAMA CALON CTKI</th> 
					<th colspan="4" > JENIS KELAMIN</th>
					<th colspan="4" > STATUS</th>
					<th colspan="7" > ALAMAT CTKI</th>
					<th colspan="5" > AGAMA</th>
					<th colspan="5" > PEND AKHIR</th>
					<th colspan="5" > JABATAN</th>  
					<th colspan="9" > NAMA & ALAMAT SUAMI/ISTRI CTKI</th>  
					<th colspan="9" > NAMA & ALAMAT ORANG TUA/WALI CTKI</th>  
					<th colspan="5" > TUJUAN</th>  
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
					<th colspan="8" >  </th> 
					<th colspan="16" align="center">'.$daerah.', '.$tgna.' </th> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
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
					<th colspan="16" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th>  
				</tr>
											
			 </table><br>
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

    function word($id_pembuatan) {
include("html_to_doc.php");

		$ambilidbio = $this->m_dl06->ambilidbio($id_pembuatan);

	$tampil_data_detail = $this->m_dl06->tampil_data_detail($ambilidbio);

	$daerah = $this->m_dl06->daerah($id_pembuatan);
	$tampilkan = $this->m_dl06->tampilkan($id_pembuatan);
	$tanggal = $this->m_dl06->tanggal($id_pembuatan);

	$originalDate3 =str_replace('.','-',$tanggal);
$newDate3 = date("Y-m-d", strtotime($originalDate3));

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahuna = substr($newDate3, 0, 4);               
    $bulana = substr($newDate3, 5, 2);
    $tgla   = substr($newDate3, 8, 2);
    $tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

$tampildata='';
$no=1;

foreach($tampil_data_detail->result() as $row) {

$jeniskelamin = $row->jeniskelamin;
$status = $row->status;
$agama = $row->agama;
$pendidikan = $row->pendidikan;

if($jeniskelamin=="?" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="?" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}

		$status=str_replace("??","",$status);
		$status=str_replace("??","",$status);
		$status=str_replace("??","",$status);
		$status=str_replace("????","",$status);

		$agama=str_replace("??","",$agama);
		$agama=str_replace("???","",$agama);
		$agama=str_replace("???","",$agama);
		$agama=str_replace("???","",$agama);
		$agama=str_replace("??","",$agama);

		$datapen = $this->m_dl06->ambilpendmandarin();


		for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

$statusnya='';
		if($tampilkan=='Orang Tua'){
$statusnya='<th colspan="9" style="font-weight:normal;font-size:13px;"></th>  
			<th colspan="9" style="font-weight:normal;font-size:13px;">'.$row->namaayah.' <br>'.$row->alamatortu.'</th>  ';

		}else{
$statusnya='<th colspan="9" style="font-weight:normal;font-size:13px;">'.$row->namapasangan.'<br>'.$row->alamatpasangan.'</th>  
			<th colspan="9" style="font-weight:normal;font-size:13px;"></th>   
			 ';
		}


$datafoto = $this->m_dl06->ambilfoto($row->id_biodata);


	$originalDate4 =str_replace('.','-',$row->tanggallahir);
$newDate4 = date("d-m-Y", strtotime($originalDate4));



$tampildata.='
<style type="text/css">
	  .a
	  {
		  font-weight:normal;
		  font-size:13px;
	  }
	</style>
				<tr>
					<th colspan="2" class="a">'.$no.'</th>  
					<th colspan="8" class="a"></th> 
					<th colspan="8" class="a">'.$row->nama.'<br>'.$row->tempatlahir.', <br>'.$newDate4.' </th> 
					<th colspan="4" class="a">'.$jeniskelamin.'</th>
					<th colspan="4" class="a">'.$status.'</th>
					<th colspan="7" class="a">'.$row->alamat.'</th>
					<th colspan="5" class="a">'.$agama.'</th>
					<th colspan="5" class="a">'.$pendidikan.'</th>
					<th colspan="5" class="a">'.$row->jabatan.'</th>  
					'.$statusnya.'
					<th colspan="5" class="a">'.$row->negara.'</th>  
				</tr>';

$no++;
		}

        $html = '
		
	<style type="text/css">
	  .tidakbold 
	  {
		  font-weight:normal;
		  font-size:14px;
	  }
	</style>
<div class="Section2">	
		<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0" >
				<tr>
					<th> DAFTAR NOMINASI CALON TKI YANG DINYATAKAN LULUS SELEKSI UNTUK PASPOR DARI </th>   
				</tr>
				<tr>
					<th>PT. FLAMBOYAN GEMAJASA LAWANG</th>  
				</tr>				
			 </table><br><br>
			<table align="center" width="110%" cellspacing="0" cellpadding="2" border="1" >
				<tr>
					<th colspan="2" class="tidakbold"> NO</th>  
					<th colspan="8" class="tidakbold"> FOTO </th> 
					<th colspan="8" class="tidakbold"> NAMA CALON CTKI</th> 
					<th colspan="4" class="tidakbold"> JENIS KELAMIN</th>
					<th colspan="4" class="tidakbold"> STATUS</th>
					<th colspan="7" class="tidakbold"> ALAMAT CTKI</th>
					<th colspan="5" class="tidakbold"> AGAMA</th>
					<th colspan="5" class="tidakbold"> PEND AKHIR</th>
					<th colspan="5" class="tidakbold"> JABATAN</th>  
					<th colspan="9" class="tidakbold"> NAMA & ALAMAT SUAMI/ISTRI CTKI</th>  
					<th colspan="9" class="tidakbold"> NAMA & ALAMAT ORANG TUA CTKI</th>  
					<th colspan="5" class="tidakbold"> TUJUAN</th>  
				</tr>
				'.$tampildata.'
							
			 </table>
			 <br><br>
			 <table align="center" width="110%" cellspacing="0" cellpadding="2" border="">
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="16" align="center" class="tidakbold" style="margin-left:45%;">'.$daerah.', '.$tgna.' </th><br><br><br><br> 
					<th colspan="8" >  </th>  
				</tr><tr>
					<th colspan="8" >  </th> 
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
					<th colspan="16" align="center" class="tidakbold" style="margin-left:45%;">
					<u>IMMANUEL DARMAWAN SANTOSO</u><br>
						Direktur Utama </th> 
					<th colspan="8" >  </th>  
				</tr>
											
			 </table></div><br>
			
			';

// Create the object from the class
$htmltodoc= new HTML_TO_DOC();
 
// Pass the variable which contains the code to the object. 
// The 3rd parameter forces to download the generated Microsoft Word document.
 
$htmltodoc->createDoc($html, "my_filename.doc", true);
    
    }
}