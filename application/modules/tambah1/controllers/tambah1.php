<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambah1 extends MX_Controller{

    public function __construct(){
            parent::__construct();
            $this->load->model('m_tambah1');
            $this->load->library('Pdf');
    }

    function coba($id_biodata) {
        echo $nama_agen              = $this->m_tambah1->tampil_nama_agen($id_biodata);
        echo $nama_majikan           = $this->m_tambah1->tampil_nama_majikan($id_biodata);
        echo $nama_majikanmandarin   = $this->m_tambah1->tampil_nama_majikanmandarin($id_biodata);
        echo $id_tki                 = $this->m_tambah1->idtki($id_biodata);
        
        echo $nodisnaker             = $this->m_tambah1->tampil_nodisnaker($id_biodata);
        echo $nama                   = $this->m_tambah1->tampil_nama($id_biodata);
        echo $namamandarin           = $this->m_tambah1->tampil_nama_mandarin($id_biodata);
        echo $jabatan                = $this->m_tambah1->tampil_jabatan($id_biodata);
        echo $alamat                 = $this->m_tambah1->tampil_alamat($id_biodata);

        echo $nopaspor               = $this->m_tambah1->tampil_nopaspor($id_biodata);
        echo $tglterima              = $this->m_tambah1->tampil_tglterima($id_biodata);
        echo $office                 = $this->m_tambah1->tampil_office($id_biodata);


        echo $tanggallahir           = $this->m_tambah1->tampil_tanggallahir($id_biodata);
        echo $tempatlahir            = $this->m_tambah1->tampil_tempatlahir($id_biodata);
        echo $jeniskelamin           = $this->m_tambah1->tampil_jeniskelamin($id_biodata);
        echo $status                 = $this->m_tambah1->tampil_status($id_biodata);
        echo $jumlah_anak            = $this->m_tambah1->tampil_jumlah_anak($id_biodata);
        echo $namaahli               = $this->m_tambah1->tampil_namaahli($id_biodata);
        echo $namakontak             = $this->m_tambah1->tampil_namakontak($id_biodata);
        echo $alamatkontak           = $this->m_tambah1->tampil_alamatkontak($id_biodata);
        echo $telpkontak             = $this->m_tambah1->tampil_telpkontak($id_biodata);
        echo $hubkontak              = $this->m_tambah1->tampil_hubkontak($id_biodata);
    }
    
    function cetak($id_biodata) {
        $sektors='';
        $judul='';
        $stts='';
            //$stts = 'FI'; 


       

    
        $nama_agen              = $this->m_tambah1->tampil_nama_agen($id_biodata);
        $nama_majikan           = $this->m_tambah1->tampil_nama_majikan($id_biodata);
        $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarin($id_biodata);

        
        $nodisnaker             = $this->m_tambah1->tampil_nodisnaker($id_biodata);
        $nama                   = $this->m_tambah1->tampil_nama($id_biodata);
        $namamandarin           = $this->m_tambah1->tampil_nama_mandarin($id_biodata);
        $jabatan                = $this->m_tambah1->tampil_jabatan($id_biodata);
        $alamat                 = $this->m_tambah1->tampil_alamat($id_biodata);

        $nopaspor               = $this->m_tambah1->tampil_nopaspor($id_biodata);
        $tglterima              = $this->m_tambah1->tampil_tglterima($id_biodata);
        $office                 = $this->m_tambah1->tampil_office($id_biodata);

        $tanggallahir           = $this->m_tambah1->tampil_tanggallahir($id_biodata);
        $tempatlahir            = $this->m_tambah1->tampil_tempatlahir($id_biodata);
        $jeniskelamin           = $this->m_tambah1->tampil_jeniskelamin($id_biodata);
        $status                 = $this->m_tambah1->tampil_status($id_biodata);
        $jumlah_anak            = $this->m_tambah1->tampil_jumlah_anak($id_biodata);
        $namaahli               = $this->m_tambah1->tampil_namaahli($id_biodata);
        $namakontak             = $this->m_tambah1->tampil_namakontak($id_biodata);
        $alamatkontak           = $this->m_tambah1->tampil_alamatkontak($id_biodata);
        $telpkontak             = $this->m_tambah1->tampil_telpkontak($id_biodata);
        $hubkontak              = $this->m_tambah1->tampil_hubkontak($id_biodata);

            $stts = substr($id_biodata, 0, 2);
            if($stts == 'FI') {
                $judul='監護工 PERAWAT ORANG SAKIT (CARE GIVER)';
                $sektors='INFORMAL';
            }
            if($stts == 'MI') {
                $judul='監護工 PERAWAT ORANG SAKIT (CARE GIVER)';
                $sektors='INFORMAL';
            }
            if($stts == 'MF') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'FF') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'JP') {
                $judul='養護機構/醫院類 / PANTI JOMPO/ RUMAH SAKIT (NURSING HOME)';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }

$hitungpaspor= $this->m_tambah1->hitungpaspor($id_biodata);

        $fotopaspor             = $this->m_tambah1->fotopaspor($id_biodata);
                $fotopaspor2                = $this->m_tambah1->fotopaspor2($id_biodata);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'f4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT PERJANJIAN KERJA MAJIKAN DENGAN PEKERJA INFORMAL');
    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,0)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins(3, 2, 3);
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
    $pdf->SetFont('sim', '', '10', '', false);   
    $pdf->AddPage(); 

        $jk="";
    $jk2="";
    if($jeniskelamin=='女'|| $jeniskelamin=='Perempuan'|| $jeniskelamin=='Wanita'){
    $jk2="Perempuan";
        $jk="女";
    }
    if($jeniskelamin=='男'|| $jeniskelamin=='pria'|| $jeniskelamin=='Pria'){
    $jk2="Laki-Laki";
        $jk="男";

    }
  
        $datagambar=base_url()."assets/uploadpasporbaru/".$fotopaspor;
    $datagambar2=base_url()."assets/uploadpasporbaru/".$fotopaspor2;

  $datagambarnya="";
  if($hitungpaspor==1){
$datagambarnya=' <th align="center"  ><img src="'.$datagambar.'" alt=""  style="width:284px;height:208px;" /></th>';
  }
  else{
    $datagambarnya=' <th align="center"  ><img src="'.$datagambar.'" alt=""  style="width:284px;height:208px;" /></th>
    <th align="center"  ><img src="'.$datagambar2.'" alt=""  style="width:284px;height:208px;" /></th>';
  }
    // Set some content to print
    
    
    $html = '<table>
                <tr>
                    <td style="width:34%; font-size:10px;" >
                        <table cellspacing="0" cellpadding="2" border="0">
                            <tr>
                                <td>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                </td>
                            </tr>
                        </table>
                </td>
                <td style="width:35%; font-size:18px; margin-left:5px;">
                <table style="text-align:center;" cellspacing="5" cellpadding="0" border="0">
                    <tr>
                        <td></td>
                    </tr>
                    <tr >
                        <td>印尼勞動契約</td>
                    </tr>
                </table>
                </td>
                <td align="center" style="width:25%; font-size:20px;" >
                        <table cellspacing="0" cellpadding="2" border="0.1em">
                            <tr>
                                <td>
                                    SEKTOR      <BR>'.$sektors.'
                                </td>
                            </tr>
                        </table>
                </td>
                </tr>
             </table>
             
            <table align="left" width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th align="center" colspan="62" ><strong><h2>PERJANJIAN KERJA ANTARA <br>MAJIKAN DENGAN PEKERJA</h2></strong></th>
            </tr>
            <tr>
                <th align="left" colspan="62" ><h2>國外認證仲介名稱 ：PT FLAMBOYAN GEMAJASA</h2></th>
            </tr>
             </table><br><br>    
             
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
            <tr>
                <th align="center" colspan="62"> '.$judul .'</th>
            </tr>
            <tr>
                <th colspan="35">臺灣仲介/  NAMA AGENT TAIWAN</th>
                <th colspan="27"> '.$nama_agen .'</th>
            </tr>
            <tr>
                <th colspan="35">雇主姓名/ NAMA MAJIKAN :</th>
                <th colspan="14"> '.$nama_majikan .'</th>
                 <th colspan="13"> '.$nama_majikanmandarin .'</th>

            </tr>
            <tr>
                <th colspan="35">工人編號:  NO PENDAFTARAN TKI</th>
                <th colspan="27"> '.$id_biodata .'</th>
            </tr>
             </table><br><br>
             
             <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
            <tr>
                <th colspan="35">工人勞工部號碼/NO ID TKI</th>
                <th colspan="27"> '.$nodisnaker .'</th>
            </tr>
            <tr>
                <th colspan="35">NAMA TKI姓名</th>
                <th colspan="14"> '.$nama .'</th>
                <th colspan="13"> '.$namamandarin.'</th>
            </tr>
            <tr>
                <th colspan="35">Alamat 地址</th>
                <th colspan="27"> '.$alamat .'</th>
            </tr>
            <tr>
                <th colspan="35">No.Paspor 謢照號碼</th>
                <th colspan="27"> '.$nopaspor .'</th>
            </tr>
            <tr>
                <th colspan="35">Tgl.Pengeluaran / 發照護照日期/PASPOR</th>
                <th colspan="27"> '.$tglterima .'</th>
            </tr>
            <tr>
                <th colspan="35">TempatPengeluaran 點發照護照地點/PASPOR</th>
                <th colspan="27"> '.$office .'</th>
            </tr>
            <tr>
                <th colspan="35">Tgl.Lahir 出生日期</th>
                <th colspan="27"> '.$tanggallahir .'</th>
            </tr>
            <tr>
                <th colspan="35">Tempatlahir出生地</th>
                <th colspan="27"> '.$tempatlahir .'</th>
            </tr>
            <tr>
                <th colspan="35">Jeniskelamin 性別</th>
                <th colspan="14"> '.$jk2 .'</th>
                 <th colspan="13"> '.$jk .'</th>
            </tr>
            <tr>
                <th colspan="35">Status Perkawinan 婚姻</th>
                <th colspan="27"> '.$status .'</th>
            </tr>
            <tr>
                <th colspan="35">Jumlah anak dibawah umur 18 tahun dan belum menikah 十八歲以下未婚子女數目 </th>
                <th colspan="27"> '.$jumlah_anak .'</th>
            </tr>
            <tr>
                <th colspan="35">Nama ahli waris 受益人</th>
                <th colspan="27"> '.$namaahli .'</th>
            </tr>
            <tr>
                <th colspan="35">Nama Kontak Darurat 連絡人</th>
                <th colspan="27"> '.$namakontak .'</th>
            </tr>
            <tr>
                <th colspan="35">Alamat 地址</th>
                <th colspan="27"> '.$alamatkontak .'</th>
            </tr>
            <tr>
                <th colspan="35">Telepon Kontak Darurat 電話</th>
                <th colspan="27"> '.$telpkontak .'</th>
            </tr>
            <tr>
                <th colspan="35">Hubungan Kontak Darurat 關係</th>
                <th colspan="27"> '.$hubkontak .'</th>
            </tr>
            <tr>
                <th colspan="62">印尼仲介 (PPTKIS Pengirim) :PT.FLAMBOYAN GEMAJASA</th>
            </tr>
            <tr>
                <th colspan="62">公司地址及聯絡電話(Alamatdan No Telepon) :<br>
                                JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI KEC.LAWANG, KAB.MALANG, EAST JAVA , POST CODE 65251, INDONESIA <br>
                                Telepon：(0341) 597231</th>
            </tr>
             </table><br><br>
             
             <table align="center" width="100%" height="40%" cellspacing="0" cellpadding="2" border="0.1em">
            <tr>
              '.$datagambarnya.'

            </tr>
            
             </table>
            ';
            
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->Output('example_001.pdf', 'I');    
    }

    function cetakword($id_biodata) {
        include("html_to_doc.php");
        $sektors='';
        $judul='';
        $stts='';
            //$stts = 'FI'; 


       

    
        $nama_agen              = $this->m_tambah1->tampil_nama_agen($id_biodata);
        $nama_majikan           = $this->m_tambah1->tampil_nama_majikan($id_biodata);
        $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarin($id_biodata);
        $id_tki=$this->m_tambah1->idtki($id_biodata);
        
        $nodisnaker             = $this->m_tambah1->tampil_nodisnaker($id_biodata);
        $nama                   = $this->m_tambah1->tampil_nama($id_biodata);
        $namamandarin           = $this->m_tambah1->tampil_nama_mandarin($id_biodata);
        $jabatan                = $this->m_tambah1->tampil_jabatan($id_biodata);
        $alamat                 = $this->m_tambah1->tampil_alamat($id_biodata);

        $nopaspor               = $this->m_tambah1->tampil_nopaspor($id_biodata);
        $tglterima              = $this->m_tambah1->tampil_tglterima($id_biodata);
        $office                 = $this->m_tambah1->tampil_office($id_biodata);

        $tanggallahir           = $this->m_tambah1->tampil_tanggallahir($id_biodata);
        $tempatlahir            = $this->m_tambah1->tampil_tempatlahir($id_biodata);
        $jeniskelamin           = $this->m_tambah1->tampil_jeniskelamin($id_biodata);
        $status                 = $this->m_tambah1->tampil_status($id_biodata);
        $jumlah_anak            = $this->m_tambah1->tampil_jumlah_anak($id_biodata);
        $namaahli               = $this->m_tambah1->tampil_namaahli($id_biodata);
        $namakontak             = $this->m_tambah1->tampil_namakontak($id_biodata);
        $alamatkontak           = $this->m_tambah1->tampil_alamatkontak($id_biodata);
        $telpkontak             = $this->m_tambah1->tampil_telpkontak($id_biodata);
        $hubkontak              = $this->m_tambah1->tampil_hubkontak($id_biodata);

            $stts = substr($id_biodata, 0, 2);
            if($stts == 'FI') {
                $judul='監護工 PERAWAT ORANG SAKIT (CARE GIVER)';
                $sektors='INFORMAL';
            }
            if($stts == 'MI') {
                $judul='監護工 PERAWAT ORANG SAKIT (CARE GIVER)';
                $sektors='INFORMAL';
            }
            if($stts == 'MF') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'FF') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'JP') {
                $judul='養護機構/醫院類 / PANTI JOMPO/ RUMAH SAKIT (NURSING HOME)';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }

$hitungpaspor= $this->m_tambah1->hitungpaspor($id_biodata);

        $fotopaspor             = $this->m_tambah1->fotopaspor($id_biodata);
                $fotopaspor2                = $this->m_tambah1->fotopaspor2($id_biodata);

   

        $jk="";
    $jk2="";
    if($jeniskelamin=='女'|| $jeniskelamin=='Perempuan'|| $jeniskelamin=='Wanita'){
    $jk2="Perempuan";
        $jk="女";
    }
    if($jeniskelamin=='男'|| $jeniskelamin=='pria'|| $jeniskelamin=='Pria'){
    $jk2="Laki-Laki";
        $jk="男";

    }
  
        $datagambar=base_url()."assets/uploadpasporbaru/".$fotopaspor;
    $datagambar2=base_url()."assets/uploadpasporbaru/".$fotopaspor2;

  $datagambarnya="";


  $newheight = 200;
list($originalwidth, $originalheight) = getimagesize($datagambar);
$ratio = $originalheight / $newheight;
$newwidth = $originalwidth / $ratio;

$newheight2 = 200;
list($originalwidth2, $originalheight2) = getimagesize($datagambar2);
$ratio2 = $originalheight2 / $newheight2;
$newwidth2 = $originalwidth2 / $ratio2;

  if($hitungpaspor==1){
$datagambarnya=' <th align="center"  ><img src="'.$datagambar.'" alt=""  style="width:284px;height:208px;" /></th>';
  }
  else{
    $datagambarnya=' <th align="center"  ><img src="'.$datagambar.'" alt=""  height="200" width="' . $newwidth . '" /></th>
    <th align="center"  ><img src="'.$datagambar2.'" alt=""  height="200" width="' . $newwidth2. '" /></th>';
  }
    // Set some content to print
    
    
    $html = '
    <style>
.tidakbold { font-weight:normal; }
</style>

    <div class="Section1"> <table width="100%">
                <tr>
                    <td style="width:34%; font-size:10px;" >
                        <table cellspacing="0" cellpadding="2" border="0">
                            <tr>
                                <td>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                </td>
                            </tr>
                        </table>
                </td>
                <td>
                <table style="text-align:center;" width:100%  cellspacing="2"border="0">
                    <tr >
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印尼勞動契約</td>
                    </tr>
                </table>
                </td>
                <td align="center" >
                        <table width="162" border="1" >
<tbody>
<tr>
<td align="center">
<p>SEKTOR <br /> FORMAL</p>
</td>
</tr>
</tbody>
</table>
                </td>
                </tr>
             </table>
             
            <table align="left" width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <th align="center" colspan="62" ><strong>PERJANJIAN KERJA ANTARA <br>MAJIKAN DENGAN PEKERJA</strong></th>
            </tr>
            <tr>
                <th align="left" colspan="62" ><br><br>國外認證仲介名稱 ：PT FLAMBOYAN GEMAJASA</th>
            </tr>
             </table>  
             
            <table align="left" width="100%" cellspacing="0" border="1">
            <tr>
                <th align="center" width="100%" colspan="3"class="tidakbold" > '.$judul .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">臺灣仲介/  NAMA AGENT TAIWAN</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$nama_agen .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">雇主姓名/ NAMA MAJIKAN :</th>
                <th width="33%" class="tidakbold" align="left"> '.$nama_majikan .'</th>
                <th width="23%" class="tidakbold" align="left"> '.$nama_majikanmandarin .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">工人編號:  NO PENDAFTARAN TKI</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$id_tki .'</th>
            </tr>
            </tbody>
             </table><br><br>
             
             <table width="100%" border="1" cellspacing="0" class="tidakbold" align="left">
             <tbody>
            <tr>
                <th width="43%" class="tidakbold" align="left">工人勞工部號碼/NO ID TKI</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$nodisnaker .'</th>
            </tr>
              <tr>
                <th width="43%" class="tidakbold" align="left">NAMA TKI姓名</th>
                <th width="33%" class="tidakbold" align="left"> '.$nama .'</th>
                <th width="23%" class="tidakbold" align="left"> '.$namamandarin.'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Alamat 地址</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$alamat .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">No.Paspor 謢照號碼</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$nopaspor .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Tgl.Pengeluaran / 發照護照日期/PASPOR</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$tglterima .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">TempatPengeluaran 點發照護照地點/PASPOR</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$office .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Tgl.Lahir 出生日期</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$tanggallahir .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Tempatlahir出生地</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$tempatlahir .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Jeniskelamin 性別</th>
                <th width="33%" class="tidakbold" align="left"> '.$jk2 .'</th>
                <th width="23%" class="tidakbold" align="left"> '.$jk .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Status Perkawinan 婚姻</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$status .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Jumlah anak dibawah umur 18 tahun dan belum menikah <br>十八歲以下未婚子女數目 </th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$jumlah_anak .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Nama ahli waris 受益人</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$namaahli .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Nama Kontak Darurat 連絡人</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$namakontak .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Alamat 地址</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$alamatkontak .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Telepon Kontak Darurat 電話</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$telpkontak .'</th>
            </tr>
            <tr>
                <th width="43%" class="tidakbold" align="left">Hubungan Kontak Darurat 關係</th>
                <th width="56%" colspan="2" class="tidakbold" align="left"> '.$hubkontak .'</th>
            </tr>
            <tr>
                <th colspan="3" class="tidakbold" align="left">印尼仲介 (PPTKIS Pengirim) : PT.FLAMBOYAN GEMAJASA</th>
            </tr>
            <tr>
                <th colspan="3" class="tidakbold" align="left">公司地址及聯絡電話(Alamatdan No Telepon) :<br>
                                JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI KEC.LAWANG, KAB.MALANG, EAST JAVA , POST CODE 65251, INDONESIA <br>
                                Telepon：(0341) 597231</th>
            </tr>
            </tbody>
             </table><br><br>
             
             <table align="center" width="100%" height="40%" cellspacing="0" cellpadding="2" border="0.1em">
            <tr>
              '.$datagambarnya.'

            </tr>
            
             </table>
             </div>
            ';
            
  // ;

   // Create the object from the class
$htmltodoc= new HTML_TO_DOC();
 
// Pass the variable which contains the code to the object. 
// The 3rd parameter forces to download the generated Microsoft Word document.
$htmltodoc->createDoc($html, "Perjanjian Kerja.doc", true);
    }

    function cetakbaru($id_biodata) {
        require_once 'assets/phpword/PHPWord.php';
        $sektors='';
        $judul='';
        $stts='';
    
        $nama_agen              = $this->m_tambah1->tampil_nama_agen($id_biodata);
        $nama_majikan           = $this->m_tambah1->tampil_nama_majikan($id_biodata);
        $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarin($id_biodata);
        $id_tki=$this->m_tambah1->idtki($id_biodata);
        
        $nodisnaker             = $this->m_tambah1->tampil_nodisnaker($id_biodata);
        $nama                   = $this->m_tambah1->tampil_nama($id_biodata);
        $namamandarin           = $this->m_tambah1->tampil_nama_mandarin($id_biodata);
        $jabatan                = $this->m_tambah1->tampil_jabatan($id_biodata);
        $alamat                 = $this->m_tambah1->tampil_alamat($id_biodata);

        $nopaspor               = $this->m_tambah1->tampil_nopaspor($id_biodata);
        $tglterima              = $this->m_tambah1->tampil_tglterima($id_biodata);
        $office                 = $this->m_tambah1->tampil_office($id_biodata);


        $tanggallahir           = $this->m_tambah1->tampil_tanggallahir($id_biodata);
        $tempatlahir            = $this->m_tambah1->tampil_tempatlahir($id_biodata);
        $jeniskelamin           = $this->m_tambah1->tampil_jeniskelamin($id_biodata);
        $status                 = $this->m_tambah1->tampil_status($id_biodata);
        $jumlah_anak            = $this->m_tambah1->tampil_jumlah_anak($id_biodata);
        $namaahli               = $this->m_tambah1->tampil_namaahli($id_biodata);
        $namakontak             = $this->m_tambah1->tampil_namakontak($id_biodata);
        $alamatkontak           = $this->m_tambah1->tampil_alamatkontak($id_biodata);
        $telpkontak             = $this->m_tambah1->tampil_telpkontak($id_biodata);
        $hubkontak              = $this->m_tambah1->tampil_hubkontak($id_biodata);

            $stts = substr($id_biodata, 0, 2);
            if($stts == 'FI') {
                $judul='監護工 PERAWAT ORANG SAKIT (CARE GIVER)';
                $sektors='INFORMAL';
            }
            if($stts == 'MI') {
                $judul='監護工 PERAWAT ORANG SAKIT (CARE GIVER)';
                $sektors='INFORMAL';
            }
            if($stts == 'MF') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'MH') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'MC') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'FH') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'FF') {
                $judul='工廠 PABRIK';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }
            if($stts == 'JP') {
                $judul='養護機構/醫院類 / PANTI JOMPO/ RUMAH SAKIT (NURSING HOME)';
                $sektors='FORMAL';
                $nama_majikan           = $this->m_tambah1->tampil_nama_majikanformal($id_biodata);
                $nama_majikanmandarin         = $this->m_tambah1->tampil_nama_majikanmandarinformal($id_biodata);
            }

        $hitungpaspor= $this->m_tambah1->hitungpaspor($id_biodata);

        $fotopaspor             = $this->m_tambah1->fotopaspor($id_biodata);
                $fotopaspor2                = $this->m_tambah1->fotopaspor2($id_biodata);

        $jk="";
        $jk2="";
        if($jeniskelamin=='女'|| $jeniskelamin=='Perempuan'|| $jeniskelamin=='Wanita'){
        $jk2="Perempuan";
            $jk="女";
        }
        if($jeniskelamin=='男'|| $jeniskelamin=='pria'|| $jeniskelamin=='Pria'){
        $jk2="Laki-Laki";
            $jk="男";

        }
      
        $hitungpaspor= $this->m_tambah1->hitungpaspor($id_biodata);




if($sektors==""){
    $sektors = "";
}
if($judul==""){
    $judul = "";
}
if($nama_agen==""){
    $nama_agen = "";
}
if($nama_majikan==""){
    $nama_majikan = "";
}
if($nama_majikanmandarin==""){
    $nama_majikanmandarin = "";
}
if($id_tki==""){
    $id_tki = "";
}
if($nodisnaker==""){
    $nodisnaker = "";
}
if($nama==""){
    $nama = "";
}
if($namamandarin==""){
    $namamandarin = "";
}
if($alamat==""){
    $alamat = "";
}
if($nopaspor==""){
    $nopaspor = "";
}
if($tglterima==""){
    $tglterima = "";
}
if($office==""){
    $office = "";
}
if($tanggallahir==""){
    $tanggallahir = "";
}
if($tempatlahir==""){
    $tempatlahir = "";
}
if($jk2==""){
    $jk2 = "";
}
if($jk==""){
    $jk = "";
}
if($status==""){
    $status = "";
}
if($jumlah_anak==""){
    $jumlah_anak = "";
}
if($namaahli==""){
    $namaahli = "";
}
if($namakontak==""){
    $namakontak = "";
}
if($alamatkontak==""){
    $alamatkontak = "";
}
if($telpkontak==""){
    $telpkontak = "";
}
if($hubkontak==""){
    $hubkontak = "";
}








$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('files/pk.docx');

$document->setValue('Value1', $sektors);
$document->setValue('Value2', $judul);
$document->setValue('Value3', $nama_agen);
$document->setValue('Value4', $nama_majikan);
$document->setValue('Value26', $nama_majikanmandarin);
$document->setValue('Value5', $id_tki);
$document->setValue('Value6', $nodisnaker);
$document->setValue('Value7', $nama);
$document->setValue('Value8', $namamandarin);
$document->setValue('Value9', $alamat);
$document->setValue('Value10', $nopaspor);
$document->setValue('Value11', $tglterima);
$document->setValue('Value12', $office);
$document->setValue('Value13', $tanggallahir);
$document->setValue('Value14', $tempatlahir);
$document->setValue('Value15', $jk2);
$document->setValue('Value16', $jk);
$document->setValue('Value17', $status);
$document->setValue('Value18', $jumlah_anak);
$document->setValue('Value19', $namaahli);
$document->setValue('Value20', $namakontak);
$document->setValue('Value21', $alamatkontak);
$document->setValue('Value22', $telpkontak);
$document->setValue('Value23', $hubkontak);

     $datagambar="assets/uploadpasporbaru/".$fotopaspor;   
    $datagambar2="assets/uploadpasporbaru/".$fotopaspor2;

if ($fotopaspor == '' && $fotopaspor2 == '') {
$document->setValue('Value24', $fotopaspor);
    $document->setValue('Value25', $fotopaspor2);
}else{

      if($hitungpaspor==1){
            $aImgs1 = array(
                array(
                 'img' => $datagambar,
                'size' => array(305, 205),
                )
            );
            $document->replaceStrToImg( 'Value24', $aImgs1);
            $document->setValue('Value25','');
      }

      else{
        $aImgs1 = array(
            array(
             'img' => $datagambar,
            'size' => array(305, 205),
            )
        );
        $document->replaceStrToImg( 'Value24', $aImgs1);

        $aImgs2 = array(
                array(
                'img' => $datagambar2,
                'size' => array(305, 205),
                )
            );
        $document->replaceStrToImg( 'Value25', $aImgs2);
    }

}





// $document->setValue('Value22', 'Pluto');
// $document->setValue('Value23', 'Pluto');

// $document->setValue('weekday', date('l'));
// $document->setValue('time', date('H:i'));

    
$filename = 'pktki.docx';


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
}