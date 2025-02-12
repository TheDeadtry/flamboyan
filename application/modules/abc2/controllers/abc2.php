<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Abc2 extends MX_Controller{
    public function __construct(){
            parent::__construct();
            $this->load->model('modelku');           
            $this->load->model('M_session'); 
    }
    
    // cek tersimpan tidak
    
    function index(){
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']){
            //user belum login
            $data['namamodule'] = "login";
            $data['namafileview'] = "login";
            echo Modules::run('template/login_template', $data);
        }
        else{
        $id_user = $session['session_userid'];
        $status = $session['session_status'];
            //user sudah login
            if ($id_user && $status==1){
            //user sudah login

                $data['namamodule'] = "abc2";
                $data['namafileview'] = "abc_view";
                echo Modules::run('template/new_admin_template', $data);
            }
        }
    }

    function json($start = 0, $search = '', $jumlah_tampil = 10){

        $keyDataGroupAgen = $_POST["keyagen"];
        $keyDataAgen = $_POST["keyDataAgen"];
        $dataSettingType = $_POST["kondisiData"];

        $kirim = "";
        $Kirim_data = $this->modelku->tabel_limit("asuransi", strtoupper($search), $start, $jumlah_tampil, $dataSettingType, $keyDataGroupAgen, $keyDataAgen);
        $totaldata = $this->modelku->tabel_num_row("asuransi", strtoupper($search), $dataSettingType, $keyDataGroupAgen, $keyDataAgen);
        $total_halaman = ceil($totaldata/$jumlah_tampil);
        $no = 1;
        foreach ($Kirim_data as $key => $isidata) {


            $tgl_to_agen = $this->modelku->ambildatamod($isidata->id_biodata, "tgl_to_agen", "marka_biotoagen", "id_biodata", "tgl_to_agen");
          $tanggalonline = $this->modelku->ambildatamod($isidata->id_biodata, "tglonline", "disnaker", "id_biodata", "tglonline");
          $perkiraan = $this->modelku->ambildatamod($isidata->id_biodata, "perkiraan", "disnaker", "id_biodata", "perkiraan");
          $nodisnaker = $this->modelku->ambildatamod($isidata->id_biodata, "nodisnaker", "disnaker", "id_biodata", "nodisnaker");
          $nopaspor = $this->modelku->ambildatamod($isidata->id_biodata, "nopaspor", "paspor", "id_biodata", "nopaspor");
          $tglterakhirfinger = $this->modelku->tglterakhirfinger($isidata->id_biodata);
          $pagi = $this->modelku->jmlfingerpagi($isidata->id_biodata, "pagi");
          $sore = $this->modelku->jmlfingerpagi($isidata->id_biodata, "sore");
          
          $hitunganfingernodaftujuh = $this->modelku->hitunganfingernodaftujuh($isidata->id_biodata, 60);
          $hitunganfingernodaf = $this->modelku->hitunganfingernodaftujuh($isidata->id_biodata, 40);
          $monitoring = $this->modelku->ambildatamod($isidata->id_biodata, "sektor", "personalblk a LEFT JOIN blk_sektor_tki b ON a.sektor_tki = b.id_sektor_tki", "nodaftar", "b.nama_sektor AS sektor");


          if ($monitoring == 'INFORMAL NEW - MONITORING') {
            $hasilmonitoring = htmlspecialchars("如考試過");
          }else{
            $hasilmonitoring = $hitunganfingernodaftujuh;
          }



          $hitunganfingernodafbelas = $this->modelku->hitunganfingernodaftujuh($isidata->id_biodata, 67);

          $statusUjk = $this->modelku->ambildatamod($isidata->id_biodata, "statujk", "personalblk", "nodaftar", "statujk");

          if ($statusUjk == 'LULUS') {
            $statusnya = "OK";
          }else{
            $statusnya = "";
          }

          $plus40 = $this->modelku->ambildatamod($isidata->id_biodata, "tgl_ujk", "blk_detail_formulir a LEFT JOIN blk_formulir b ON a.id_formulir = b.id_formulir", "nodaftar", "tgl_ujk");

          $status_monitoring = $this->modelku->ambildatamod($isidata->id_biodata, "sektor_tki", "personalblk", "nodaftar", "sektor_tki");
          $stat_tgl_durasi = $this->modelku->stat_tgl_durasi($hitunganfingernodaftujuh, $status_monitoring);
          $stat_tgl_ujk = $this->modelku->stat_tgl_ujk($hitunganfingernodafbelas);
          $terpilihmajikan = $this->modelku->ambildatamod($isidata->id_biodata, "tglterpilih", "majikan", "id_biodata", "tglterpilih");
          $jdmajikan = $this->modelku->ambildatamod($isidata->id_biodata, "JD", "majikan", "id_biodata", "JD");
          $terbangmajikan = $this->modelku->ambildatamod($isidata->id_biodata, "tglterbang", "majikan", "id_biodata", "tglterbang");
          $tanggalterbang = $this->modelku->ambildatamod($isidata->id_biodata, "tanggalterbang", "visa", "id_biodata", "tanggalterbang");
          $statusterbang = $this->modelku->ambildatamod($isidata->id_biodata, "statusterbang", "visa", "id_biodata", "statusterbang");
          $id_terbang = $this->modelku->ambildatamod($isidata->id_biodata, "id_terbang", "visa", "id_biodata", "id_terbang");
          $detailberangkat1 = $this->modelku->ambildatamod($id_terbang, "detailberangkat1", "dataterbang", "id_terbang", "detailberangkat1");
          $jamtiba = $this->modelku->ambildatamod($id_terbang, "jamtiba", "dataterbang", "id_terbang", "jamtiba");
          $tiket = $this->modelku->ambildatamod($isidata->id_biodata, "tiket", "visa", "id_biodata", "tiket");
          $tglberangkat = $this->modelku->ambildatamod($isidata->id_biodata, "tglberangkat", "visa", "id_biodata", "tglberangkat");
          $statusterbang = $this->modelku->ambildatamod($isidata->id_biodata, "statusterbang", "visa", "id_biodata", "statusterbang");
          $tglpk = $this->modelku->ambildatamod($isidata->id_biodata, "tglpk", "majikan", "id_biodata", "tglpk");
          $tglterimasuhan = $this->modelku->ambildatamod($isidata->id_biodata, "tglterimasuhan", "majikan", "id_biodata", "tglterimasuhan");
          $id_suhan = $this->modelku->ambildatamod($isidata->id_biodata, "id_suhan", "majikan", "id_biodata", "id_suhan");
          $tglterbitsuhan = $this->modelku->ambildatamod($isidata->id_biodata, "tglterbitsuhan", "majikan", "id_biodata", "tglterbitsuhan");
          $tglexp_suhan = $this->modelku->ambildatamod($isidata->id_biodata, "tglexp_suhan", "majikan", "id_biodata", "tglterbitsuhan + INTERVAL '6' MONTH AS tglexp_suhan");
          $ketsuhan = $this->modelku->ambildatamod($isidata->id_biodata, "ketsuhan", "majikan", "id_biodata", "ketsuhan");
          $tglterimapermit = $this->modelku->ambildatamod($isidata->id_biodata, "tglterimapermit", "majikan", "id_biodata", "tglterimapermit");
          $id_visapermit = $this->modelku->ambildatamod($isidata->id_biodata, "id_visapermit", "majikan", "id_biodata", "id_visapermit");
          $tglterbitpermit = $this->modelku->ambildatamod($isidata->id_biodata, "tglterbitpermit", "majikan", "id_biodata", "tglterbitpermit");
          $tglexp_visapermit = $this->modelku->ambildatamod($isidata->id_biodata, "tglpermit", "majikan", "id_biodata", "tglterbitpermit + INTERVAL '6' MONTH as tglpermit");
          $ketpermit = $this->modelku->ambildatamod($isidata->id_biodata, "ketpermit", "majikan", "id_biodata","ketpermit");
         
// ambil data passpor ---------------------------------

         
            $exprpaspor = $this->modelku->ambildatamod($isidata->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "ADDDATE(IF(paspor.tglterbit = '', pasporlama.tglterbit, paspor.tglterbit),INTERVAL 5 YEAR) AS nilai");

            $tglpengajuan = $this->modelku->ambildatamod($isidata->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.tglpengajuan = '', pasporlama.tglpengajuan, paspor.tglpengajuan) as nilai");

            $statuspengajuanpaspor = $this->modelku->ambildatamod($isidata->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.statuspengajuan = '', '', paspor.statuspengajuan) as nilai");

            $tglfoto = $this->modelku->ambildatamod($isidata->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.tglfoto= '', pasporlama.tglfoto, paspor.tglfoto) as nilai");

            $statusfoto = $this->modelku->ambildatamod($isidata->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.statusfoto= '', 'A', paspor.statusfoto) as nilai");
            
            $tglterima = $this->modelku->ambildatamod($isidata->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.tglterima= '', pasporlama.tglterima, paspor.tglterima) as nilai");

            $statusterimapaspor = $this->modelku->ambildatamod($isidata->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.statusterima= '', 'A', paspor.statusterima) as nilai");
        

// ------------------------------------------------------

          $pengajuan_skck = $this->modelku->ambildatamod($isidata->id_biodata, "pengajuan", "skck", "id_biodata", "pengajuan");
          $pengajuanstat_skck = $this->modelku->ambildatamod($isidata->id_biodata, "statuspengajuan", "skck", "id_biodata", "statuspengajuan");
          $terima_skck = $this->modelku->ambildatamod($isidata->id_biodata, "terima", "skck", "id_biodata", "terima");
          $terimastatpaspor = $this->modelku->ambildatamod($isidata->id_biodata, "statusterima", "skck", "id_biodata", "statusterima");
          $tglexp_skck = $this->modelku->ambildatamod($isidata->id_biodata, "tglexp", "skck", "id_biodata", "tglexp");




          $medical3_total = $this->modelku->ambildatamod($isidata->id_biodata, "total", "medical3", "id_biodata", "count(*) as total");
          $medical2_expired = $this->modelku->ambildatamod($isidata->id_biodata, "medical2_expired", "medical2", "id_biodata", "tanggal + INTERVAL '3' MONTH as medical2_expired");
          $medical2_tanggal = $this->modelku->ambildatamod($isidata->id_biodata, "tanggal", "medical2", "id_biodata", "tanggal");

          $medical3_expired = $this->modelku->ambildatamod($isidata->id_biodata, "medical3_expired", "medical3", "id_biodata", "tanggal + INTERVAL '3' MONTH as medical3_expired");
          $medical3_tanggal = $this->modelku->ambildatamod($isidata->id_biodata, "tanggal", "medical3", "id_biodata", "tanggal");


          if ($medical3_total == 0)
          {
            $medical  = $medical2_tanggal;
            $medicalexp = $medical2_expired;
          } else{
            $medical  = $medical3_tanggal;
            $medicalexp = $medical3_expired;
          }
          
          $kocokan_visa = $this->modelku->ambildatamod($isidata->id_biodata, "kocokan", "visa", "id_biodata", "kocokan");
          $kocokanstats_visa = $this->modelku->ambildatamod($isidata->id_biodata, "statuskocokan", "visa", "id_biodata", "statuskocokan");
          
          $finger = $this->modelku->ambildatamod($isidata->id_biodata, "finger", "visa", "id_biodata", "finger");
          $finger_expr = $this->modelku->ambildatamod($isidata->id_biodata, "mambo", "visa", "id_biodata", "ADDDATE(finger,INTERVAL 3 MONTH) AS mambo");


          $finger_visa = $this->modelku->ambildatamod($isidata->id_biodata, "statusfinger", "visa", "id_biodata", "statusfinger");
          $terima_visa = $this->modelku->ambildatamod($isidata->id_biodata, "terima", "visa", "id_biodata", "terima");
          $terimastats_visa = $this->modelku->ambildatamod($isidata->id_biodata, "statusterima", "visa", "id_biodata", "statusterima");
          $loanbank = $this->modelku->ambildatamod($isidata->id_biodata, "tgl_tki_ttd", "signingbank", "id_biodata", "tgl_tki_ttd");
          $visa_pap = $this->modelku->ambildatamod($isidata->id_biodata, "pap", "visa", "id_biodata", "pap");
          $status_pap = $this->modelku->ambildatamod($isidata->id_biodata, "statuspap", "visa", "id_biodata", "statuspap");
          $visa_ktkln = $this->modelku->ambildatamod($isidata->id_biodata, "ktkln", "visa", "id_biodata", "ktkln");
          $status_ktkln = $this->modelku->ambildatamod($isidata->id_biodata, "statusktkln", "visa", "id_biodata", "statusktkln");

          $perkiraan_manual = "<option value=''>-chose-</option>";
          $selector = $this->modelku->ambildatamod($isidata->id_biodata, "perkiraan_manual", "personal", "id_biodata", "perkiraan_manual");
          $selector1 = $this->modelku->ambildatamod($isidata->id_biodata, "keterangan_perkiraan_manual", "personal", "id_biodata", "keterangan_perkiraan_manual");
          for ($i=1; $i <= 12 ; $i++) { 
            if ($i == $selector) {
              $perkiraan_manual .="<option selected>".$i."</option>";
            }else{
              $perkiraan_manual .="<option>".$i."</option>";
            }
          }
          $keterangan_perkiraan_manual = "";
// tambah data yang dibutuhkan di dalam array
          $array_keterangan_perkiraan = array("-chose-","月初","月中","月底", "可以快");

          for ($i=0; $i < count($array_keterangan_perkiraan) ; $i++) { 
            if ($i == $selector1) {
              $keterangan_perkiraan_manual .="<option selected value='".$i."'>".htmlspecialchars($array_keterangan_perkiraan[$i])."</option>";
            }else{
              $keterangan_perkiraan_manual .="<option value='".$i."'>".htmlspecialchars($array_keterangan_perkiraan[$i])."</option>";
            }
          }

            $negara1 = $this->modelku->ambildatamod($isidata->id_biodata, "negara1", "personal", "id_biodata", "negara1");
            if ($negara1 != '') {
              $review1 = '-'.$negara1;
            }else{
              $review1 = '';
            }
            $negara2 = $this->modelku->ambildatamod($isidata->id_biodata, "negara2", "personal", "id_biodata", "negara2");
            if ($negara2 != '') {
              $review2 = '-'.$negara2;
            }else{
              $review2 = '';
            }
            $calling = $this->modelku->ambildatamod($isidata->id_biodata, "calling", "personal", "id_biodata", "calling");
            if ($calling != '') {
              $review3 = '-'.$calling;
            }else{
              $review3 = '';
            }
            $skill1 = $this->modelku->ambildatamod($isidata->id_biodata, "skill1", "personal", "id_biodata", "skill1");
            if ($skill1 != '') {
              $review4 = '-'.$skill1;
            }else{
              $review4 = '';
            }
            $skill2 = $this->modelku->ambildatamod($isidata->id_biodata, "skill2", "personal", "id_biodata", "skill2");
            if ($skill2 != '') {
              $review5 = '-'.$skill2;
            }else{
              $review5 = '';
            }
            $skill3 = $this->modelku->ambildatamod($isidata->id_biodata, "skill3", "personal", "id_biodata", "skill3");
            if ($skill3 != '') {
              $review6 = '-'.$skill3;
            }else{
              $review6 = '';
            }          


            $bandaratuju = $this->modelku->ambildatamod($isidata->id_biodata, "bandaratuju", "majikan", "id_biodata", "bandaratuju");
            
            $tglpkpk = str_replace("~", " ", $this->modelku->ambildatamod($isidata->id_biodata, "tgl_pk", "personal", "id_biodata", "tgl_pk"));
            $statuspk = $this->modelku->ambildatamod($isidata->id_biodata, "status_pk", "personal", "id_biodata", "status_pk");
            
            if ($statuspk == 1) {
              $tatusnyapk = "ADA 有";
            }else{
              $tatusnyapk = "TIDAK ADA-沒有";
            }


            if ($ketsuhan == "ASLI") {
              $suhanmandarin = 'albaba';
            }elseif ($ketsuhan == "SIMPANAN") {
              $suhanmandarin = 'aquo';
            }



            $kirim .="
            <tr>
                <td class='fixed-side2'>".($no+$start)."</td>
                <td class='fixed-side2'>".$isidata->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6."</td>
                <td class='fixed-side2'>".$isidata->nama."</td>
                <td class='fixed-side2'>".$isidata->nama_mandarin."</td>
                <td><input type='text' name='".$isidata->id_biodata."' value='".$isidata->keterangan."' disabled><input type='button' id='data".$isidata->id_biodata."' value='ubah' onclick='keterangan(".'"'.$isidata->id_biodata.'"'.")'></td>
                <td><input type='text' name='dua".$isidata->id_biodata."' value='".$isidata->keterangan2."' disabled><input type='button' id='data2".$isidata->id_biodata."' value='ubah' onclick='keterangan2(".'"'.$isidata->id_biodata.'"'.")'></td>
                <td>".$isidata->namataiwan."</td>
                <td>".$isidata->namamajikan."</td>
                <td>".$tatusnyapk.'<br>'.$tglpkpk."</td>
                <td>".$tgl_to_agen."</td>
                <td>".$tanggalonline."</td>
                <td>".$perkiraan."</td>
                <td>".$nodisnaker."</td>
                <td>".$nopaspor."</td>
                <td>".$tglterakhirfinger."</td>
                <td> ( pagi :".$pagi." ) ( sore :".$sore." )</td>
                <td>".$hasilmonitoring."</td>
                <td>".$hitunganfingernodaf."</td>
                <td>".$statusnya."</td>
                <td><select class='perkiraan' onchange='perkiraan(".'"'.$isidata->id_biodata.'"'.")' name='".$isidata->id_biodata."'>".$perkiraan_manual."</select></td>
                <td><select class='perkiraan' onchange='keteranganPerkiraan(".'"'.$isidata->id_biodata.'"'.")' name='keterangan".$isidata->id_biodata."'>".$keterangan_perkiraan_manual."</select></td>
                <td>".$terpilihmajikan."</td>
                <td>".$jdmajikan."</td>
                <td>".$terbangmajikan."</td>
                <td>".$bandaratuju."</td>
                <td>".$tanggalterbang."</td>
                <td>".$statusterbang."</td>
                <td>".$detailberangkat1."</td>
                <td>".$jamtiba."</td>
                <td>".$tiket."</td>
                <td>".$tglberangkat."</td>
                <td>".$statusterbang."</td>
                <td>".$tglpk."</td>
                <td>".$tglterimasuhan."</td>
                <td>".$id_suhan."</td>
                <td>".$tglterbitsuhan."</td>
                <td>".$tglexp_suhan."</td>
                <td>".$ketsuhan."</td>
                <td>".$tglterimapermit."</td>
                <td>".$id_visapermit."</td>
                <td>".$tglterbitpermit."</td>
                <td>".$tglexp_visapermit."</td>
                <td>".$ketpermit."</td>

                <td>".$exprpaspor."</td>
                <td>".$tglpengajuan."</td>
                <td>".$statuspengajuanpaspor."</td>
                <td>".$tglfoto."</td>
                <td>".$statusfoto."</td>
                <td>".$tglterima."</td>
                <td>".$statusterimapaspor."</td>

                <td>".$pengajuan_skck."</td>
                <td>".$pengajuanstat_skck."</td>
                <td>".$terima_skck."</td>
                <td>".$terimastatpaspor."</td>
                <td>".$tglexp_skck."</td>
               
                <td>".$medical."</td>
                <td>".$medicalexp."</td>
                <td>".$kocokan_visa."</td>
                <td>".$kocokanstats_visa."</td>
                <td>".$finger."</td>
                <td>".$finger_visa."</td>
                <td>".$finger_expr."</td>
                <td>".$terima_visa."</td>
                <td>".$terimastats_visa."</td>
                <td>".$loanbank."</td>
                <td>".$visa_pap."</td>
                <td>".$status_pap."</td>
                <td>".$visa_ktkln."</td>
                <td>".$status_ktkln."</td>
                </tr>";

            $no++;
        }

        $data = array(
            "drawer" => 0,
            "totaldata" => $totaldata,
            "pages" => $total_halaman,
            "data" => $kirim
        );

        echo json_encode($data);

    }



    function printData($key, $keydua, $sesi, $opsi = 'all' ){

        $this->load->library("PHPExcel");
        $objPHPExcel  = new PHPExcel();
        $objReader    = PHPExcel_IOFactory::createReader('Excel2007');
        //$objPHPExcel = $objReader->load("files/informal1.xls");
        $objPHPExcel = $objReader->load("files/pgm_malaysia.xlsx");

        $datauntukprint = $this->modelku->table_print($key, $keydua, $sesi);

        $objWorksheet = $objPHPExcel->getSheet(0);
        $objWorksheet2 = $objPHPExcel->getSheet(1);
        
        $datasheet1 = [];
        $datasheet2 = [];
        $datasheet1_no = 0;
        $datasheet2_no = 0;
        $total_row = 0;
        $range_data = 8;
        for ($data=0; $data < count($datauntukprint) ; $data++) {

           $tgl_to_agen = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgl_to_agen", "marka_biotoagen", "id_biodata", "tgl_to_agen");
          $tanggalonline = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglonline", "disnaker", "id_biodata", "tglonline");
          $perkiraan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "perkiraan", "disnaker", "id_biodata", "perkiraan");
          $nodisnaker = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nodisnaker", "disnaker", "id_biodata", "nodisnaker");
          $nopaspor = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nopaspor", "paspor", "id_biodata", "nopaspor");
          $tglterakhirfinger = $this->modelku->tglterakhirfinger($datauntukprint[$data]->id_biodata);
          $pagi = $this->modelku->jmlfingerpagi($datauntukprint[$data]->id_biodata, "pagi");
          $sore = $this->modelku->jmlfingerpagi($datauntukprint[$data]->id_biodata, "sore");
          $hitunganfingernodaftujuh = $this->modelku->hitunganfingernodaftujuh($datauntukprint[$data]->id_biodata, 60);
          $hitunganfingernodaf = $this->modelku->hitunganfingernodaftujuh($datauntukprint[$data]->id_biodata, 40);

          $monitoring = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "sektor", "personalblk a LEFT JOIN blk_sektor_tki b ON a.sektor_tki = b.id_sektor_tki", "nodaftar", "b.nama_sektor AS sektor");

          if ($monitoring == 'INFORMAL NEW - MONITORING') {
            $hasilmonitoring = htmlspecialchars("如考試過");
          }else{
            $hasilmonitoring = $hitunganfingernodaftujuh;
          }

          $plus40 = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgl_ujk", "blk_detail_formulir a LEFT JOIN blk_formulir b ON a.id_formulir = b.id_formulir", "nodaftar", "tgl_ujk");

          $statusUjk = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statujk", "personalblk", "nodaftar", "statujk");

          if ($statusUjk == 'LULUS') {
            $statusnya = "OK";
          }else{
            $statusnya = "";
          }




          $tglujk = $this->modelku->ujk_ujian($datauntukprint[$data]->id_biodata);
          $hitunganfingernodafbelas = $this->modelku->hitunganfingernodaftujuh($datauntukprint[$data]->id_biodata, 67);
          $status_monitoring = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "sektor_tki", "personalblk", "nodaftar", "sektor_tki");
          $stat_tgl_durasi = $this->modelku->stat_tgl_durasi($hitunganfingernodaftujuh, $status_monitoring);
          $stat_tgl_ujk = $this->modelku->stat_tgl_ujk($hitunganfingernodafbelas);
          $terpilihmajikan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglterpilih", "majikan", "id_biodata", "tglterpilih");
          $jdmajikan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "JD", "majikan", "id_biodata", "JD");
          $terbangmajikan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglterbang", "majikan", "id_biodata", "tglterbang");
          $tanggalterbang = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tanggalterbang", "visa", "id_biodata", "tanggalterbang");
          $statusterbang = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statusterbang", "visa", "id_biodata", "statusterbang");
          $id_terbang = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "id_terbang", "visa", "id_biodata", "id_terbang");
          $detailberangkat1 = $this->modelku->ambildatamod($id_terbang, "detailberangkat1", "dataterbang", "id_terbang", "detailberangkat1");
          $detailberangkat2 = $this->modelku->ambildatamod($id_terbang, "detailberangkat2", "dataterbang", "id_terbang", "detailberangkat2");
          $jamtiba = $this->modelku->ambildatamod($id_terbang, "jamtiba", "dataterbang", "id_terbang", "jamtiba");
          $tiket = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tiket", "visa", "id_biodata", "tiket");
          $tglberangkat = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglberangkat", "visa", "id_biodata", "tglberangkat");
          $statusterbang = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statusterbang", "visa", "id_biodata", "statusterbang");
          $tglpk = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglpk", "majikan", "id_biodata", "tglpk");
          $tglterimasuhan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglterimasuhan", "majikan", "id_biodata", "tglterimasuhan");
          $id_suhan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "id_suhan", "majikan", "id_biodata", "id_suhan");
          $tglterbitsuhan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglterbitsuhan", "majikan", "id_biodata", "tglterbitsuhan");
          $tglexp_suhan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglexp_suhan", "majikan", "id_biodata", "tglterbitsuhan + INTERVAL '6' MONTH AS tglexp_suhan");
          $ketsuhan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "ketsuhan", "majikan", "id_biodata", "ketsuhan");
          $tglterimapermit = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglterimapermit", "majikan", "id_biodata", "tglterimapermit");
          $id_visapermit = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "id_visapermit", "majikan", "id_biodata", "id_visapermit");
          $tglterbitpermit = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglterbitpermit", "majikan", "id_biodata", "tglterbitpermit");
          $tglexp_visapermit = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglpermit", "majikan", "id_biodata", "tglterbitpermit + INTERVAL '6' MONTH as tglpermit");
          $ketpermit = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "ketpermit", "majikan", "id_biodata","ketpermit");
          $exprpaspor = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "ADDDATE(IF(paspor.tglterbit = '', pasporlama.tglterbit, paspor.tglterbit),INTERVAL 5 YEAR) AS nilai");
          $tglpengajuan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.tglpengajuan = '', pasporlama.tglpengajuan, paspor.tglpengajuan) as nilai");
          $statuspengajuanpaspor = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.statuspengajuan = '', '', paspor.statuspengajuan) as nilai");
          $tglfoto = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.tglfoto= '', pasporlama.tglfoto, paspor.tglfoto) as nilai");
          $statusfoto = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.statusfoto= '', 'A', paspor.statusfoto) as nilai");
          $tglterima = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.tglterima= '', pasporlama.tglterima, paspor.tglterima) as nilai");
          $statusterimapaspor = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nilai", "personal LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "IF(paspor.statusterima= '', 'A', paspor.statusterima) as nilai");
        
// data agen------------------------------------------------

          $id_agen = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nama_agen", "marka_biotoagen", "id_biodata", "nama_agen", " AND tgldilepas = '' ");
          $kodeAgen = $this->modelku->ambildatamod($id_agen, "kode_agen", "dataagen", "id_agen", "kode_agen");
          if ($kodeAgen != ''|| $kodeAgen != null) {
            $isiKodeAgen = $kodeAgen;
          }else{
            $isiKodeAgen = 'no agen';
          }


          $pengajuan_skck = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "pengajuan", "skck", "id_biodata", "pengajuan");
          $pengajuanstat_skck = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statuspengajuan", "skck", "id_biodata", "statuspengajuan");
          $terima_skck = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "terima", "skck", "id_biodata", "terima");
          $terimastatpaspor = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statusterima", "skck", "id_biodata", "statusterima");
          $tglexp_skck = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglexp", "skck", "id_biodata", "tglexp");


          $medical3_total = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "total", "medical3", "id_biodata", "count(*) as total");
          $medical2_expired = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "medical2_expired", "medical2", "id_biodata", "tanggal + INTERVAL '3' MONTH as medical2_expired");
          $medical2_tanggal = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tanggal", "medical2", "id_biodata", "tanggal");

          $medical3_expired = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "medical3_expired", "medical3", "id_biodata", "tanggal + INTERVAL '3' MONTH as medical3_expired");
          $medical3_tanggal = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tanggal", "medical3", "id_biodata", "tanggal");
          

          if ($medical3_total == 0)
          {
            $medical  = $medical2_tanggal;
            $medicalexp = $medical2_expired;
          } else{
            $medical  = $medical3_tanggal;
            $medicalexp = $medical3_expired;
          }
          
          $kocokan_visa = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "kocokan", "visa", "id_biodata", "kocokan");
          $kocokanstats_visa = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statuskocokan", "visa", "id_biodata", "statuskocokan");
          $finger = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "finger", "visa", "id_biodata", "finger");
          $finger_visa = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statusfinger", "visa", "id_biodata", "statusfinger");
          $terima_visa = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "terima", "visa", "id_biodata", "terima");
          $terimastats_visa = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statusterima", "visa", "id_biodata", "statusterima");
          $loanbank = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgl_tki_ttd", "signingbank", "id_biodata", "tgl_tki_ttd");
          $visa_pap = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "pap", "visa", "id_biodata", "pap");
          $status_pap = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statuspap", "visa", "id_biodata", "statuspap");
          $visa_ktkln = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "ktkln", "visa", "id_biodata", "ktkln");
          $status_ktkln = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statusktkln", "visa", "id_biodata", "statusktkln");




          // $finger_expr = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "mambo", "visa", "id_biodata", "ADDDATE(finger,INTERVAL 3 MONTH) AS mambo"); 

          $finger_expr = "";
            if($finger != "" || $finger != null){

              $tanggal = $finger;
              $tanggal_edt = str_replace(".", "-",$tanggal);
              $dateno1 = $tanggal_edt;
              $dateno2 = date("Y-m-d");
              $kurang = strtotime($dateno2)-strtotime($dateno1);
              $banyakbulandilewati = ceil($kurang/(3600*24*30));
              $tanggal_plus_1_month = date("Y-m-d", strtotime($tanggal_edt." +".$banyakbulandilewati." month")); // tambah 1 bulan
              $finger_expr = $tanggal_plus_1_month;
            }

            $visaexpired3moth = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "expiredd", "visa", "id_biodata", "DATE(tglberlaku) + INTERVAL 3 MONTH AS expiredd");


          $negara1 = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "negara1", "personal", "id_biodata", "negara1");
            if ($negara1 != '') {
              $review1 = '-'.$negara1;
            }else{
              $review1 = '';
            }
            $negara2 = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "negara2", "personal", "id_biodata", "negara2");
            if ($negara2 != '') {
              $review2 = '-'.$negara2;
            }else{
              $review2 = '';
            }
            $calling = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "calling", "personal", "id_biodata", "calling");
            if ($calling != '') {
              $review3 = '-'.$calling;
            }else{
              $review3 = '';
            }
            $skill1 = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "skill1", "personal", "id_biodata", "skill1");
            if ($skill1 != '') {
              $review4 = '-'.$skill1;
            }else{
              $review4 = '';
            }
            $skill2 = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "skill2", "personal", "id_biodata", "skill2");
            if ($skill2 != '') {
              $review5 = '-'.$skill2;
            }else{
              $review5 = '';
            }
            $skill3 = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "skill3", "personal", "id_biodata", "skill3");
            if ($skill3 != '') {
              $review6 = '-'.$skill3;
            }else{
              $review6 = '';
            }          

            
            $perkiraan_manual = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "perkiraan_manual", "personal", "id_biodata", "perkiraan_manual");
            
            $keterangan_perkiraan_manual = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "keterangan_perkiraan_manual", "personal", "id_biodata", "keterangan_perkiraan_manual");

            if ($keterangan_perkiraan_manual == NULL || $keterangan_perkiraan_manual == '') {
              $numberofketpermen = 0;
            }else{
              $numberofketpermen = $keterangan_perkiraan_manual;
            }

            $ket_per_man = array('','月初','月中','月底', '可以快');


            $bandaratuju = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "bandaratuju", "majikan", "id_biodata", "bandaratuju");


            $tglpkpk = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgl_pk", "personal", "id_biodata", "tgl_pk");
            if($tglpkpk){
              $tglpkpkPK = '-'.$tglpkpk;
            }else{
              $tglpkpkPK = "";
            }

            $statuspk = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "status_pk", "personal", "id_biodata", "status_pk");
            if ($statuspk == 1) {
              $tatusnyapk = "ADA 有";
            }else{
              $tatusnyapk = "TIDAK ADA-沒有";
            }


            $dataketerangan1 =  $datauntukprint[$data]->keterangan;

            $dataketerangan1 = str_replace("&amp;", "$", $dataketerangan1);
            $dataketerangan1 = str_replace("&lt;", "<", $dataketerangan1);
            $dataketerangan1 = str_replace("&gt;", ">", $dataketerangan1);
            $dataketerangan1 = str_replace("&quot;", '"', $dataketerangan1);
            $dataketerangan1 = str_replace("&#039;", "'", $dataketerangan1);



            $dataketerangan2 =  $datauntukprint[$data]->keterangan2;
            $dataketerangan2 = str_replace("&amp;", "$", $dataketerangan2);
            $dataketerangan2 = str_replace("&lt;", "<", $dataketerangan2);
            $dataketerangan2 = str_replace("&gt;", ">", $dataketerangan2);
            $dataketerangan2 = str_replace("&quot;", '"', $dataketerangan2);
            $dataketerangan2 = str_replace("&#039;", "'", $dataketerangan2);
            
            $majikan_modaltglpk = str_replace("~", " ", $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgl_pk", "personal", "id_biodata", "tgl_pk"));
            $majikan_modaltglterima = str_replace("~", " ", $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "terima_pk", "personal", "id_biodata", "terima_pk"));
            $spbgkirimtaiwan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglspbgtaiwan", "personal", "id_biodata", "tglspbgtaiwan");
            $spbgterima = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgltrmspbg", "majikan", "id_biodata", "tgltrmspbg");

            $sql = "SELECT a.*,b.id_setting_vaksinlist as xid1,c.id_setting_vaksinlist as xid2,d.id_setting_vaksinlist as xid3,b.nama as xnama1,c.nama as xnama2,d.nama as xnama3 FROM vaksin a
            LEFT JOIN setting_vaksinlist b ON a.nama1=b.id_setting_vaksinlist
            LEFT JOIN setting_vaksinlist c ON a.nama2=c.id_setting_vaksinlist
            LEFT JOIN setting_vaksinlist d ON a.nama3=d.id_setting_vaksinlist
            WHERE a.id_biodata='".$datauntukprint[$data]->id_biodata."'";
            $vaksinnama1 = $this->modelku->ambildatamod1($sql,'xnama1');
            $vaksinnama2 = $this->modelku->ambildatamod1($sql,'xnama2');
            $vaksinnama3 = $this->modelku->ambildatamod1($sql,'xnama3');
            $vaksintgl1 = $this->modelku->ambildatamod1($sql,'tgl1');
            $vaksintgl2 = $this->modelku->ambildatamod1($sql,'tgl2');
            $vaksintgl3 = $this->modelku->ambildatamod1($sql,'tgl3');
            $medical3_nama = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nama", "medical", "id_biodata", "nama");
            $medical3_nama = ($medical3_nama != 'FIT 適合') ? '' : 'FIT';
            $medical3_tgl = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tanggal", "medical", "id_biodata", "tanggal");

            $abjad = array();
            $letter = 'A';
            while ($letter !== 'CB') {
                $abjad[] = $letter++;
            }

          $datasheet1[$datasheet1_no] = array( 
            ($data+1),
            $isiKodeAgen,
            $datauntukprint[$data]->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6,
            $datauntukprint[$data]->nama,
            $datauntukprint[$data]->jabatan,
            $datauntukprint[$data]->namamajikan,
            $dataketerangan1." - ".$dataketerangan2,
            $vaksinnama1,
            $vaksintgl1,
            $vaksinnama2,
            $vaksintgl2,
            $vaksinnama3,
            $vaksintgl3,
            $medical3_tgl.' '.$medical3_nama,
            $majikan_modaltglterima,
            $tatusnyapk.' '.$majikan_modaltglpk,
            $spbgkirimtaiwan,
            $tgl_to_agen,
            $tanggalonline,
            $perkiraan,
            $nodisnaker,
            $nopaspor,
            $tglterakhirfinger,
            "( pagi: ".$pagi.") ( sore: ".$sore." )",
            $hasilmonitoring,
            $tglujk,
            $statusnya,
            $perkiraan_manual,
            $ket_per_man[$numberofketpermen],
            $terpilihmajikan,
            $jdmajikan,
            $terbangmajikan,
            $bandaratuju,
            $tglpk,
            $spbgterima,
            // $tglterimasuhan,
            // $id_suhan,
            // $tglterbitsuhan,
            // $tglexp_suhan,
            // $ketsuhan,
            $tglterimapermit,
            $id_visapermit,
            $tglterbitpermit,
            $tglexp_visapermit,
            $ketpermit,
            $exprpaspor,
            $tglpengajuan,
            $statuspengajuanpaspor,
            $tglfoto,
            $statusfoto,
            $tglterima,
            $statusterimapaspor,
            $medical,
            $medicalexp,
            $kocokan_visa,
            $kocokanstats_visa,
            $finger,
            $finger_visa,
            $visaexpired3moth,
            $terima_visa,
            $terimastats_visa,
            $loanbank,
            $visa_pap,
            $status_pap,
            $visa_ktkln,
            $status_ktkln,
            $tanggalterbang, // keberangkatan
            $statusterbang,
            $detailberangkat1.' '.$detailberangkat2,
            $jamtiba,
            $tiket,
            $tglberangkat,
            $statusterbang, // end keberangkatan
          );


          if ($datauntukprint[$data]->namamajikan != '' && trim($jdmajikan) == '')
          {
                $datasheet2[$datasheet2_no] = $datasheet1[$datasheet1_no];
                $datasheet2[$datasheet2_no][1] = $datasheet2_no+1;
                $datasheet2_no++;
          }
          
          $datasheet1_no++;

        }
        
        $objWorksheet->insertNewRowBefore(9, (count($datasheet1)-1));
        $objWorksheet2->insertNewRowBefore(9, (count($datasheet2)-1));

        // foreach($datanya as $k => $val) {
        //   for ($i=0; $i < count($val) ; $i++) {
        //     $objWorksheet->setCellValueExplicit($abjad[$i].($k+$range_data), trim($val[$i]) , PHPExcel_Cell_DataType::TYPE_STRING);
        //   }
        // }
        
        foreach($datasheet1 as $key => $val) {
          for ($i=0; $i < count($val) ; $i++) {
              $objWorksheet->setCellValueExplicit($abjad[$i].($key+$range_data), trim($val[$i]) , PHPExcel_Cell_DataType::TYPE_STRING);

          }
        }
        foreach($datasheet2 as $key => $val) {
          for ($i=0; $i < count($val) ; $i++) {
            $objWorksheet2->setCellValueExplicit($abjad[$i].( ($key) + $range_data), $val[$i], PHPExcel_Cell_DataType::TYPE_STRING);
          }
        }
        
        $namdarigroupagen = $this->modelku->ambildatamod($key, "nama", "datagroup", "id_group", "nama");


        if ($key == 'all') {
          $namaGroup = " SEMUA GROUP ";
          $fileGroup = " SEMUA GROUP ";
        } else{
          $namaGroup = 'GROUP - '.$namdarigroupagen;
          $fileGroup = $namdarigroupagen;
        }

        if ($keydua == 'all') {
          $namaAgen = " ";
          $fileAgen = "";
        } else{
        $namdariagen = $this->modelku->ambildatamod($keydua, "nama", "dataagen", "id_agen", "nama");
        $namaAgen = 'Agen - '.$namdariagen;
          $fileAgen = $namdariagen;
          $objWorksheet->setCellValue("A2", $namaAgen);
          $objWorksheet2->setCellValue("A2", $namaAgen);
        }

        if ($sesi == 0) {
          $objWorksheet->setCellValue("A1", "BELUM TERBANG -".$namaGroup);
          $objWorksheet2->setCellValue("A1", "BELUM TERBANG -".$namaGroup);
        }else{
          $objWorksheet->setCellValue("A1", "SUDAH TERBANG".$namaGroup);
          $objWorksheet2->setCellValue("A1", "SUDAH TERBANG".$namaGroup);
        }
        


        if($fileAgen == ""){
          $namafilesimpan = $fileGroup;
        }else{
          $namafilesimpan = $fileAgen;
        }

        $tanggalsimpan = date("Y-m-d");

        $keteranganNamaFile = htmlspecialchars("看護工-進度表");


        $objWorksheet->setCellValue("A3", $tanggalsimpan.' '.$keteranganNamaFile);
        $objWorksheet2->setCellValue("A3", $tanggalsimpan.' '.$keteranganNamaFile);

        $objPHPExcel->getActiveSheet()->freezePane('H1'); 


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $date = gmdate("D, d M Y H:i:s");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$tanggalsimpan.' . '.$namafilesimpan.' . '.$keteranganNamaFile.'.xlsx"');

        $objWriter->save("php://output");

    }


    function dataGroupAgen(){
      $kirim = '<option value="all"> --- pilih group --- </option>';
      $data = $this->modelku->ambildata("datagroup");
      $kirim .= "<option value='IM'>Malaysia</option>";
      exit($kirim);
    }

    function dataAgen(){
      $value = $_POST["value"];
      $kirim = '<option value="all"> --- pilih group --- </option>';
      $data = $this->modelku->ambildata("dataagen", "kode_group" ,$value);
      foreach ($data as $key => $group) {
         $kirim .= "<option value='".$group->id_agen."'>".$group->nama."</option>";
      }
      exit($kirim);
    }




    function ubahKeterangan(){
      // $tipe = $_POST['tipe'];  
      // $value = $_POST['value'];   
      $iddata = $_POST['iddata'];
      $dataTransfer = $_POST['dataTransfer'];
      // $tipe = $_POST['tipe'];
      if($iddata != ""){
        $data = $this->db->query("UPDATE personal SET keterangan = '".$dataTransfer."' WHERE id_biodata = '".$iddata."' ");
        if ($data) {
            $status_ktkln = $this->modelku->ambildatamod($iddata, "keterangan", "personal", "id_biodata", "keterangan");
            echo $status_ktkln;
        }
        else{
            echo "gagal";
        }
      }
      else{
          echo "gagal";
      }
      
    }


    function ubahKeterangan2(){
      // $tipe = $_POST['tipe'];  
      // $value = $_POST['value'];   
      $iddata = $_POST['iddata'];
      $dataTransfer = $_POST['dataTransfer'];
      // $tipe = $_POST['tipe'];
      if($iddata != ""){
        $data = $this->db->query("UPDATE personal SET keterangan2 = '".$dataTransfer."' WHERE id_biodata = '".$iddata."' ");
        
        if ($data) {
            $status_ktkln = $this->modelku->ambildatamod($iddata, "keterangan2", "personal", "id_biodata", "keterangan2");
            echo $status_ktkln;
        }
        else{
            echo "gagal";
        }
      }
      else{
          echo "gagal";
      }
    }

    function simpanperkiraan($key, $kunci){
      $update = $this->modelku->ubahdatamod("perkiraan_manual", $key, "personal", "id_biodata", $kunci);
      if ($update) {
        echo "berhasiil update";
      }else{
        echo "success update";
      }
    }

    function keterangan_simpanperkiraan($key, $kunci){
      $update = $this->modelku->ubahdatamod("keterangan_perkiraan_manual", $key, "personal", "id_biodata", $kunci);
      if ($update) {
        echo "berhasiil update";
      }else{
        echo "success update";
      }
    }




     function print_personal(){

      $this->load->library("PHPExcel");
      $objPHPExcel = new PHPExcel();
      $objReader   = PHPExcel_IOFactory::createReader('Excel5');
      $objPHPExcel = $objReader->load("files/blank.xls");

      $objWorksheet = $objPHPExcel->getActiveSheet();

      $data = $this->db->query("SELECT * FROM personal")->result();

      foreach($datasheet1 as $key => $val) {
        for ($i=0; $i < count($val) ; $i++) {
            $objWorksheet->setCellValueExplicit($abjad[$i].($key+$range_data), trim($val[$i]) , PHPExcel_Cell_DataType::TYPE_STRING);

        }
      }
      $no = 1;
      for ($i=0; $i < count($data); $i++) { 

        $objWorksheet->setCellValue("A".($i+$no), $data[$i]->id_personal);
        $objWorksheet->setCellValue("B".($i+$no), $data[$i]->id_biodata);
        $objWorksheet->setCellValue("C".($i+$no), $data[$i]->negara1);
        $objWorksheet->setCellValue("D".($i+$no), $data[$i]->negara2);
        $objWorksheet->setCellValue("E".($i+$no), $data[$i]->calling);
        $objWorksheet->setCellValue("F".($i+$no), $data[$i]->skill1);
        $objWorksheet->setCellValue("G".($i+$no), $data[$i]->skill2);
        $objWorksheet->setCellValue("H".($i+$no), $data[$i]->skill3);
        $objWorksheet->setCellValue("I".($i+$no), $data[$i]->kode_proses);
        $objWorksheet->setCellValue("J".($i+$no), $data[$i]->kode_sponsor);
        $objWorksheet->setCellValue("K".($i+$no), $data[$i]->kode_agen);
        $objWorksheet->setCellValue("L".($i+$no), $data[$i]->nama);
        $objWorksheet->setCellValue("M".($i+$no), $data[$i]->nama_mandarin);
        $objWorksheet->setCellValue("N".($i+$no), $data[$i]->jeniskelamin);
        $objWorksheet->setCellValue("O".($i+$no), $data[$i]->notelp);
        $objWorksheet->setCellValue("P".($i+$no), $data[$i]->notelpkel);
        $objWorksheet->setCellValue("Q".($i+$no), $data[$i]->tanggaldaftar);
        $objWorksheet->setCellValue("R".($i+$no), $data[$i]->tinggi);
        $objWorksheet->setCellValue("S".($i+$no), $data[$i]->berat);
        $objWorksheet->setCellValue("T".($i+$no), $data[$i]->hp);
        $objWorksheet->setCellValue("U".($i+$no), $data[$i]->hpkel);
        $objWorksheet->setCellValue("V".($i+$no), $data[$i]->warganegara);
        $objWorksheet->setCellValue("W".($i+$no), $data[$i]->tempatlahir);
        $objWorksheet->setCellValue("X".($i+$no), $data[$i]->tgllahir);
        $objWorksheet->setCellValue("Y".($i+$no), $data[$i]->agama);
        $objWorksheet->setCellValue("Z".($i+$no), $data[$i]->status);
        $objWorksheet->setCellValue("AA".($i+$no), $data[$i]->tglmenikah);
        $objWorksheet->setCellValue("AB".($i+$no), $data[$i]->pendidikan);
        $objWorksheet->setCellValue("AC".($i+$no), $data[$i]->alamat);
        $objWorksheet->setCellValue("AD".($i+$no), $data[$i]->alamatlengkap);
        $objWorksheet->setCellValue("AE".($i+$no), $data[$i]->provinsi);
        $objWorksheet->setCellValue("AF".($i+$no), $data[$i]->mandarin);
        $objWorksheet->setCellValue("AG".($i+$no), $data[$i]->taiyu);
        $objWorksheet->setCellValue("AH".($i+$no), $data[$i]->inggris);
        $objWorksheet->setCellValue("AI".($i+$no), $data[$i]->cantonese);
        $objWorksheet->setCellValue("AJ".($i+$no), $data[$i]->hakka);
        $objWorksheet->setCellValue("AK".($i+$no), $data[$i]->foto);
        $objWorksheet->setCellValue("AL".($i+$no), $data[$i]->statusaktif);
        $objWorksheet->setCellValue("AM".($i+$no), $data[$i]->indukagen);
        $objWorksheet->setCellValue("AN".($i+$no), $data[$i]->kirimbio);
        $objWorksheet->setCellValue("AO".($i+$no), $data[$i]->pk);
        $objWorksheet->setCellValue("AP".($i+$no), $data[$i]->pap);
        $objWorksheet->setCellValue("AQ".($i+$no), $data[$i]->remark);
        $objWorksheet->setCellValue("AR".($i+$no), $data[$i]->datafoto);
        $objWorksheet->setCellValue("AS".($i+$no), $data[$i]->keterangan);
        $objWorksheet->setCellValue("AT".($i+$no), $data[$i]->keterangan2);
        $objWorksheet->setCellValue("AU".($i+$no), $data[$i]->lokasikerja);
        $objWorksheet->setCellValue("AV".($i+$no), $data[$i]->idpemilik);
        $objWorksheet->setCellValue("AW".($i+$no), $data[$i]->statterbang);
        $objWorksheet->setCellValue("AX".($i+$no), $data[$i]->ketdok);
        $objWorksheet->setCellValue("AY".($i+$no), $data[$i]->ketadm);
        $objWorksheet->setCellValue("AZ".($i+$no), $data[$i]->ip_created);
        $objWorksheet->setCellValue("BB".($i+$no), $data[$i]->ip_modified);
        $objWorksheet->setCellValue("BA".($i+$no), $data[$i]->perkiraan_manual);
        $objWorksheet->setCellValue("BB".($i+$no), $data[$i]->keterangan_perkiraan_manual);
        $objWorksheet->setCellValue("BC".($i+$no), $data[$i]->terima_pk);
        $objWorksheet->setCellValue("BD".($i+$no), $data[$i]->tgl_pk);
        $objWorksheet->setCellValue("BE".($i+$no), $data[$i]->status_pk);
        $objWorksheet->setCellValue("BF".($i+$no), $data[$i]->statuspendidikan);

      }



      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      $date = gmdate("D, d M Y H:i:s");
      header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
      header("Cache-Control: no-store, no-cache, must-revalidate");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="informal.xls"');

      $objWriter->save("php://output");


    }

}