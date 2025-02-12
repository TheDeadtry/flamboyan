<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_pdf_ceklist extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');
			$this->load->model('m_printdata');
			$this->load->library('Pdf');
	}

	function forms($id_pembuatan)
	{
		$data['datanikpptkis'] = $this->M_session->select("SELECT * FROM setting_nikpptkis");
		$data['id_pembuatan'] = $id_pembuatan;
		$data['namamodule'] = "new_pdf_ceklist";
		$data['namafileview'] = "forms";
		echo Modules::run('template/new_admin_template', $data);
	}

	function ceklist($id_pembuatan) 
	{

		$idtkinya = $this->m_printdata->ambilidtki($id_pembuatan);
		$eksnya = $this->m_printdata->ambileksnya($id_pembuatan);

		$dataeks='<th colspan="35">EKS/Baru</th> ';
		if($eksnya=='eks'){
$dataeks='<th colspan="35">EKS/<strike>Baru</strike></th> ';
		}else{
$dataeks='<th colspan="35"><strike>EKS</strike>/Baru</th> ';
		}

		$datadisnaker = $this->m_printdata->ambildisnakernya($idtkinya);

		$stts = substr($idtkinya, 0, 2);
		$formal='<th colspan="35">Formal / Informal</th>';
		if($stts=='FI'){
			$formal='<th colspan="35"><strike>Formal</strike> / Informal</th>';
		}
		if($stts=='MI'){
			$formal='<th colspan="35"><strike>Formal</strike> / Informal</th>';
		}
		if($stts=='FF'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
		if($stts=='MF'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
		if($stts=='JP'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
$nama='';
		foreach($datadisnaker->result() as $row) {
			$nama = $row->nama;
			$tempatlahir = $row->tempatlahir;
			$tanggallahir2 = $row->tanggallahir;
			$noktp = $row->noktp;
			$jeniskelamin = $row->jeniskelamin;
			$agama = $row->agama;
			$status = $row->status;
			$pendidikan = $row->pendidikan;
			$alamat = $row->alamat;
			$propinsi = $row->propinsi;
			$namaayah = $row->namaayah;
			$namaibu = $row->namaibu;
			$namaahli = $row->namaahli;
			$namakontak = $row->namakontak;
			$alamatkontak = $row->alamatkontak;
			$hubkontak = $row->hubkontak;
			$tglonline = $row->tglonline;
			$perkiraan = $row->perkiraan;
			$negara = $row->negara;
			$jabatan = $row->jabatan;
			$ahliwaris = $row->ahliwaris;
			$jmlanak = $row->jmlanak;
			$agency2 = $row->agency;
			$matauang = $row->matauang;
			$sektorusaha = $row->sektorusaha;
			$gaji = $row->gaji;
			$nopaspor = $row->nopaspor;
			$masaberlaku = $row->masaberlaku;
			$masahabis = $row->masahabis;
			$tglberangkat = $row->tglberangkat;
			$tgltiba = $row->tgltiba;

		}

		if ( $propinsi == null )
		{
			$propinsi = 'JAWA TIMUR';
		}

		$dtprov = $this->M_session->select('SELECT * FROM dataprovinsi');

		$provs = "";
		foreach ($dtprov as $key => $value) {
			if ( $value->isi.' '.$value->mandarin == $propinsi )
			{
				$provs = $value->isi;
				break;
			}
		}

		if ( $provs != NULL )
		{
			$propinsi = $provs;
		}

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

		$datapen = $this->m_printdata->ambilpendmandarin();
		$agency = $this->m_printdata->ambilagency($agency2);

		for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

$lahiran=str_replace(".","-",$tanggallahir2);
$tanggallahir = date("d-m-Y", strtotime($lahiran));

if($tglberangkat==null || $tglberangkat==0){
$tglbrkt ="";

}else{
	$originalDate2=str_replace(".","-",$tglberangkat);
$tglbrkt = date("d-m-Y", strtotime($originalDate2));
}

if($tgltiba==null || $tgltiba==0){
$tgltb ="";

}else{
$originalDate3=str_replace(".","-",$tgltiba);
$tgltb = date("d-m-Y", strtotime($originalDate3));
}




$tgl4="";
if($masaberlaku==null || $masaberlaku == 0){
$tgl4="";
}else{
$originalDate4=str_replace(".","-",$masaberlaku);
$tgl4 = date("d-m-Y", strtotime($originalDate4));
}

$tgl5="";
if($masahabis==null || $masahabis==0){
$masahabis="";
}else{
$originalDate5=str_replace(".","-",$masahabis);
$tgl5 = date("d-m-Y", strtotime($originalDate5));
}
	$idnikpptkis = $this->input->post('nikpptkis');

	$nikpptkis = $this->M_session->select_row('SELECT * FROM setting_nikpptkis where id_setting_nikpptkis='.$idnikpptkis);
	$nikpptkis = $nikpptkis->nik;

	$d = $alamat;
	$s = stripos($d,"kecamatan");
	$e1 = stripos($d,"kabupaten");
	$e2 = ($e1 - 1) - $s;
	$new_kecamatan = substr($d, $s, $e2);
	$new_alamat = $new_alamatkontak = substr($d, 0, $s).' '.substr($d, $e1);


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
     $pdf->SetMargins(10, 20, 10);
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
	
    $html = '<p align="center"><b>CEKLIST DOKUMEN CTKI<br/>NEGARA TAIWAN<br/>PPTKIS PT. FLAMBOYAN GEMA JASA</b></p>
			

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th align="center" colspan="5">No</th>
					<th align="left" colspan="40"> DOKUMEN CTKI YANG HARUS DIPENUHI</th>
					<th align="center" colspan="15">ADA</th>
					<th align="center" colspan="15">TIDAK ADA</th>
				</tr>
				<tr>
					<th align="right" colspan="5">1.</th>
					<th  colspan="40"> KTP</th>
					<th align="center" colspan="15">V</th>
					<th align="center" colspan="15"></th>
				</tr>
				<tr>
					<th align="right" colspan="5">2.</th>
					<th  colspan="40"> AKTE</th>
					<th align="center" colspan="15">V</th>
					<th align="center" colspan="15"></th>
				</tr>
				<tr>
					<th align="right" colspan="5">3.</th>
					<th  colspan="40"> KK</th>
					<th align="center" colspan="15">V</th>
					<th align="center" colspan="15"></th>
				</tr>
				<tr>
					<th align="right" colspan="5">4.</th>
					<th  colspan="40"> IJAZAH</th>
					<th align="center" colspan="15">V</th>
					<th align="center" colspan="15"></th>
				</tr>
				<tr>
					<th align="right" colspan="5">5.</th>
					<th  colspan="40"> AKTE KEMATIAN</th>
					<th align="center" colspan="15"></th>
					<th align="center" colspan="15"></th>
				</tr>
				<tr>
					<th align="right" colspan="5">6.</th>
					<th  colspan="40"> SURAT IJIN ORANG TUA / ISTRI / SUAMI</th>
					<th align="center" colspan="15">V</th>
					<th align="center" colspan="15"></th>
				</tr>
			</table>
			<table align="left" width="100%">
			<tr>
				<th><br/></th>
				</tr>
			</table>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			
			 <tr>
                <th align="right" colspan="5" >1.</th>
                <th colspan="25" > NIK CTKI</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$noktp.'</th>    
             </tr>
			 <tr>
                <th align="right" colspan="5" >2.</th>
                <th colspan="25" > NAMA CTKI</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$nama.'</th>      
             </tr>
			 <tr>
                <th align="right" colspan="5" >3.</th>
                <th colspan="25" > NAMA IBU</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$namaibu.'</th>      
             </tr>
			 <tr>
                <th align="right" colspan="5" >4.</th>
                <th colspan="25" > NAMA AYAH</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$namaayah.'</th>   
             </tr>
			 <tr>
                <th align="right" colspan="5" >5.</th>
                <th colspan="25" > JENIS KELAMIN</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$jeniskelamin.'</th> 
             </tr>
			 <tr>
                <th align="right" colspan="5" >6.</th>
                <th colspan="25" > TEMPAT LAHIR</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$tempatlahir.'</th> 
             </tr>
			 <tr>
                <th align="right" colspan="5" >7.</th>
                <th colspan="25" > TANGGAL LAHIR</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$tanggallahir.'</th> 
             </tr>
			 <tr>
                <th align="right" colspan="5" >8.</th>
                <th colspan="25" > ALAMAT</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$new_alamat.'</th>    
             </tr>
			 <tr>
                <th align="right" colspan="5" >9.</th>
                <th colspan="25" > KECAMATAN</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$new_kecamatan.'</th> 
             </tr>
			 <tr>
                <th align="right" colspan="5" >10.</th>
                <th colspan="25" > ALAMAT ORANG TUA TKI</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$new_alamatkontak.'</th>           
             </tr>
			 <tr>
                <th align="right" colspan="5" >11.</th>
                <th colspan="25" > STATUS PERKAWINAN TKI</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$status.'</th> 
             </tr>
			 <tr>
                <th align="right" colspan="5" >12.</th>
                <th colspan="25" > AGAMA</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$agama.'</th>        
             </tr>
			 <tr>
                <th align="right" colspan="5" >13.</th>
                <th colspan="25" > PENDIDIKAN</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$pendidikan.'</th>          
             </tr>
			 <tr>
                <th align="right" colspan="5" >14.</th>
                <th colspan="25" > AGENCY</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$agency.'</th>    
             </tr>
			 <tr>
                <th align="right" colspan="5" >15.</th>
                <th colspan="25" > JABATAN</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$jabatan.'</th>        
             </tr>
			 <tr>
                <th align="right" colspan="5" >16.</th>
                <th colspan="25" > SEKTOR USAHA</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$sektorusaha.'</th>   
             </tr>
			 <tr>
                <th align="right" colspan="5" >17.</th>
                <th colspan="25" > MATA UANG</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$matauang.'</th> 
             </tr>
			 <tr>
                <th align="right" colspan="5" >18.</th>
                <th colspan="25" > NO PASPOR</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$nopaspor.'</th>             
             </tr>
			 <tr>
                <th align="right" colspan="5" >19.</th>
                <th colspan="25" > MASA BERLAKU</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$tgl4.'</th>           
             </tr>
			 <tr>
                <th align="right" colspan="5" >20.</th>
                <th colspan="25" > MASA HABIS BERLAKU</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$tgl5.'</th>             
             </tr>
			 <tr>
                <th align="right" colspan="5" >21.</th>
                <th colspan="25" > TGL. BERANGKAT </th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$tglbrkt.'</th>          
             </tr>
			 <tr>
                <th align="right" colspan="5" >22.</th>
                <th colspan="25" > TGL. TIBA</th>
                <th align="center" colspan="2">:</th>
              	<th colspan="43"> '.$tgltb.'</th>            
             </tr>
			
			 </table><br><br>

			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			<tr>
                <th align="center" colspan="5" >NO</th>
                <th align="center" colspan="40">DOKUMEN</th>
                <th align="center" colspan="40">KETERANGAN</th>
              	       
             </tr>
			 <tr>
                <th align="right" colspan="5" >1.</th>
                <th colspan="40">KTP</th>
                <th colspan="40"></th>       
             </tr>
			 <tr>
                <th align="right" colspan="5" >2.</th>
                <th colspan="40">AKTE</th>
                <th colspan="40"></th>       
             </tr>
			 <tr>
                <th align="right" colspan="5" >3.</th>
                <th colspan="40">KK</th>
                <th colspan="40"></th>       
             </tr>
			 <tr>
                <th align="right" colspan="5" >4.</th>
                <th colspan="40">IJAZAH</th>
                <th colspan="40"></th>       
             </tr>
			 <tr>
                <th align="right" colspan="5" >5.</th>
                <th colspan="40">SURAT NIKAH (BAGI YANG SUDAH NIKAH)</th>
                <th colspan="40"></th>       
             </tr>
			 <tr>
                <th align="right" colspan="5" >6.</th>
                <th colspan="40">SURAT IJIN ORANG TUA / ISTRI / SUAMI</th>
                <th colspan="40"></th>       
			 </tr>
			 </table>
			 
			<table align="left" width="100%">
			<tr>
				<th><br/></th>
				</tr>
			</table>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center" colspan="5" >1.</th>
					<th  colspan="40">NAMA PPTKIS</th>
					<th align="center" colspan="2">:</th>
					<th  colspan="40">PT. FLAMBOYAN GEMA JASA</th>
						
				</tr>
				<tr>
					<th align="center" colspan="5" >2.</th>
					<th  colspan="40">NIK PPTKIS</th>
					<th align="center" colspan="2">:</th>
					<th colspan="40">'.$nikpptkis.'</th>
						
				</tr>
				<tr>
					<th align="center" colspan="5" >3.</th>
					<th colspan="40">PETUGAS SELEKSI DARI DINAS</th>
					<th align="center" colspan="2">:</th>
					<th colspan="40"></th>
						
				</tr>
			 </table>';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

	
}