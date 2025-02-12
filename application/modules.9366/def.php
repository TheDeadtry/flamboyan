<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Def extends MX_Controller{
    public function __construct(){
            parent::__construct();
            $this->load->model('modelku');           
            $this->load->model('M_session'); 
    }
    
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

                $data['namamodule'] = "def";
                $data['namafileview'] = "def_view";
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
          $hitunganfingernodafbelas = $this->modelku->hitunganfingernodaftujuh($isidata->id_biodata, 67);
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
          
          // data suhan
          $id_suhan = $this->modelku->ambildatamod($isidata->id_biodata, "kode_suhan", "majikan", "id_biodata", "kode_suhan");
          $tglterimasuhan = $this->modelku->ambildatamod($id_suhan, "tglterima", "datasuhan", "id_suhan", "tglterima");
          $nosuhan = $this->modelku->ambildatamod($id_suhan, "no_suhan", "datasuhan", "id_suhan", "no_suhan");
          $tglterbitsuhan = $this->modelku->ambildatamod($id_suhan, "tglterbit", "datasuhan", "id_suhan", "tglterbit");
          $tglexp_suhan = $this->modelku->ambildatamod($id_suhan, "tglexp", "datasuhan", "id_suhan", "tglterbit + INTERVAL '6' MONTH AS tglexp");
          $ketsuhan = $this->modelku->ambildatamod($isidata->id_biodata, "ketsuhan", "majikan", "id_biodata", "ketsuhan");


          // data visa
          $id_visapermit = $this->modelku->ambildatamod($isidata->id_biodata, "kode_visapermit", "majikan", "id_biodata", "kode_visapermit");
          $tglterimapermit = $this->modelku->ambildatamod($id_visapermit, "tglterimavs", "datavisapermit", "id_visapermit", "tglterimavs");
          $no_visapermit = $this->modelku->ambildatamod($id_visapermit, "no_visapermit", "datavisapermit", "id_visapermit", "no_visapermit");
          $tgl_terbitVisa = $this->modelku->ambildatamod($id_visapermit, "tglterbitvs", "datavisapermit", "id_visapermit", "tglterbitvs");
          $tglexp_visapermit = $this->modelku->ambildatamod($id_visapermit, "tglpermit", "datavisapermit", "id_visapermit", "tglterbitvs + INTERVAL '6' MONTH as tglpermit");



          $perkiraan_manual = "<option>-chose-</option>";
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
          $array_keterangan_perkiraan = array("-chose-","月初","月中","月底");

          for ($i=0; $i < count($array_keterangan_perkiraan) ; $i++) { 
            if ($i == $selector1) {
              $keterangan_perkiraan_manual .="<option selected value='".$i."'>".htmlspecialchars($array_keterangan_perkiraan[$i])."</option>";
            }else{
              $keterangan_perkiraan_manual .="<option value='".$i."'>".htmlspecialchars($array_keterangan_perkiraan[$i])."</option>";
            }
          }




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
          $finger_visa = $this->modelku->ambildatamod($isidata->id_biodata, "statusfinger", "visa", "id_biodata", "statusfinger");
          $terima_visa = $this->modelku->ambildatamod($isidata->id_biodata, "terima", "visa", "id_biodata", "terima");
          $terimastats_visa = $this->modelku->ambildatamod($isidata->id_biodata, "statusterima", "visa", "id_biodata", "statusterima");
          $loanbank = $this->modelku->ambildatamod($isidata->id_biodata, "tgl_tki_ttd", "signingbank", "id_biodata", "tgl_tki_ttd");
          $visa_pap = $this->modelku->ambildatamod($isidata->id_biodata, "pap", "visa", "id_biodata", "pap");
          $status_pap = $this->modelku->ambildatamod($isidata->id_biodata, "statuspap", "visa", "id_biodata", "statuspap");
          $visa_ktkln = $this->modelku->ambildatamod($isidata->id_biodata, "ktkln", "visa", "id_biodata", "ktkln");
          $status_ktkln = $this->modelku->ambildatamod($isidata->id_biodata, "statusktkln", "visa", "id_biodata", "statusktkln");
          $namamajikanman = $this->modelku->ambildatamod($isidata->kode_majikan, "namamajikan", "datamajikan", "id_majikan", "namamajikan");
          $namamajikan = $this->modelku->ambildatamod($isidata->kode_majikan, "nama", "datamajikan", "id_majikan", "nama");


          $bandaratuju = $this->modelku->ambildatamod($isidata->id_biodata, "bandaratuju", "majikan", "id_biodata", "bandaratuju");





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



          $plus40 = $this->modelku->hitunganfingernodaftujuh($isidata->id_biodata, 100);

          $statusUjk = $this->modelku->ambildatamod($isidata->id_biodata, "statujk", "personalblk", "nodaftar", "statujk");

          if ($statusUjk == 'LULUS') {
            $statusnya = "OK";
          }else{
            $statusnya = "";
          }

          
            $tglpkpk = str_replace("~", " ", $this->modelku->ambildatamod($isidata->id_biodata, "tgl_pk", "personal", "id_biodata", "tgl_pk"));
            $statuspk = $this->modelku->ambildatamod($isidata->id_biodata, "status_pk", "personal", "id_biodata", "status_pk");
            if ($statuspk == 1) {
              $tatusnyapk = "ADA 有";
            }else{
              $tatusnyapk = "TIDAK ADA-沒有";
            }

            $kirim .="
            <tr>
                <td class='fixed-side2'>".($no+$start)."</td>
                <td class='fixed-side2'>".$isidata->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6."</td>
                <td class='fixed-side2'>".$isidata->nama."</td>
                <td class='fixed-side2'>".$isidata->nama_mandarin."</td>
                <td><input type='text' name='".$isidata->id_biodata."' value='".$isidata->keterangan."' disabled><input type='button' id='data".$isidata->id_biodata."' value='ubah' onclick='keterangan(".'"'.$isidata->id_biodata.'"'.")'></td>
                <td><input type='text' name='dua".$isidata->id_biodata."' value='".$isidata->keterangan2."' disabled><input type='button' id='data2".$isidata->id_biodata."' value='ubah' onclick='keterangan2(".'"'.$isidata->id_biodata.'"'.")'></td>
                <td>".$namamajikanman."</td>
                <td>".$namamajikan."</td>
                <td>".$tatusnyapk.'<br>'.$tglpkpk."</td>
                <td>".$tgl_to_agen."</td>
                <td>".$tanggalonline."</td>
                <td>".$perkiraan."</td>
                <td>".$nodisnaker."</td>
                <td>".$nopaspor."</td>
                <td>".$tglterakhirfinger."</td>
                <td> ( pagi :".$pagi." ) ( sore :".$sore." )</td>
                <td>".$hitunganfingernodaftujuh."</td>
                <td>".$plus40."</td>
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
                <td>".$nosuhan."</td>
                <td>".$tglterbitsuhan."</td>
                <td>".$tglexp_suhan."</td>
                <td>".$ketsuhan."</td>
                <td>".$tglterimapermit."</td>
                <td>".$no_visapermit."</td>
                <td>".$tgl_terbitVisa."</td>
                <td>".$tglexp_visapermit."</td>
                <td></td>
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
        $objReader    = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load("files/dew_pgm_formal.xls");

        $datauntukprint = $this->modelku->table_print($key, $keydua, $sesi);




        $objWorksheet = $objPHPExcel->getActiveSheet();
        $objWorksheet2 = $objPHPExcel->getSheet(1);
        $objWorksheet3 = $objPHPExcel->getSheet(2);
        $objWorksheet4 = $objPHPExcel->getSheet(3);
        $objWorksheet5 = $objPHPExcel->getSheet(4);
        $objWorksheet->insertNewRowBefore(8, (count($datauntukprint)-2));

        $range_data = 7;
        $datasheet2 = [];
        $datasheet3 = [];
        $datasheet4 = [];
        $datasheet5 = [];
        $datasheet2_no = 0;
        $datasheet3_no = 0;
        $datasheet4_no = 0;
        $datasheet5_no = 0;
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
          

          // data suhan
          $id_suhan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "kode_suhan", "majikan", "id_biodata", "kode_suhan");

          $tglterimasuhan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglsimpansuhan", "majikan", "id_biodata", "tglsimpansuhan");
          
          $nosuhan = $this->modelku->ambildatamod($id_suhan, "no_suhan", "datasuhan", "id_suhan", "no_suhan");
          $tglterbitsuhan = $this->modelku->ambildatamod($id_suhan, "tglterbit", "datasuhan", "id_suhan", "tglterbit");
          $tglexp_suhan = $this->modelku->ambildatamod($id_suhan, "tglexp", "datasuhan", "id_suhan", "tglterbit + INTERVAL '6' MONTH AS tglexp");
          $ketsuhan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "ketsuhan", "majikan", "id_biodata", "ketsuhan");


            // data visa

          $id_visapermit = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "kode_visapermit", "majikan", "id_biodata", "kode_visapermit");

          $tglterimapermit = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglsimpanvp", "majikan", "id_biodata", "tglsimpanvp");
          
          $no_visapermit = $this->modelku->ambildatamod($id_visapermit, "no_visapermit", "datavisapermit", "id_visapermit", "no_visapermit");
          $tgl_terbitVisa = $this->modelku->ambildatamod($id_visapermit, "tglterbitvs", "datavisapermit", "id_visapermit", "tglterbitvs");
          $tglexp_visapermit = $this->modelku->ambildatamod($id_visapermit, "tglpermit", "datavisapermit", "id_visapermit", "tglterbitvs + INTERVAL '6' MONTH as tglpermit");

          // data agen
          // $id_agen = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "kode_agen", "majikan", "id_biodata", "kode_agen");
          // $kodeAgen = $this->modelku->ambildatamod($id_agen, "kode_agen", "dataagen", "id_agen", "kode_agen");
          // if ($kodeAgen != ''|| $kodeAgen != null) {
          //   $isiKodeAgen = $kodeAgen;
          // }else{
          //   $isiKodeAgen = 'no agen';
          // }

          $id_agen = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "nama_agen", "marka_biotoagen", "id_biodata", "nama_agen", " AND tgldilepas = '' ");
          $kodeAgen = $this->modelku->ambildatamod($id_agen, "kode_agen", "dataagen", "id_agen", "kode_agen");
          if ($kodeAgen != ''|| $kodeAgen != null) {
            $isiKodeAgen = $kodeAgen;
          }else{
            $isiKodeAgen = 'no agen';
          }
          


          $pasporlama = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgl", "personal
          LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata
          LEFT JOIN pasporlama ON personal.id_biodata = pasporlama.id_biodata", "personal.id_biodata", "DATE_ADD(IF(paspor.tglterbit = '', pasporlama.tglterbit, paspor.tglterbit), INTERVAL 5 YEAR) as tgl");
          // diedit
          $tglpengajuan = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglpengajuan", "paspor", "id_biodata", "tglpengajuan");
          
          $statuspengajuanpaspor = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statuspengajuan", "paspor", "id_biodata", "statuspengajuan");
          $tglfoto = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglfoto", "paspor", "id_biodata", "tglfoto");
          $statusfoto = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statusfoto", "paspor", "id_biodata", "statusfoto");
          $tglterima = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tglterima", "paspor", "id_biodata","tglterima");
          $statusterimapaspor = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statusterima", "paspor", "id_biodata", "statusterima");
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
          $namamajikanman = $this->modelku->ambildatamod($datauntukprint[$data]->kode_majikan, "namamajikan", "datamajikan", "id_majikan", "namamajikan");
          $namamajikan = $this->modelku->ambildatamod($datauntukprint[$data]->kode_majikan, "nama", "datamajikan", "id_majikan", "nama");



          $bandaratuju = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "bandaratuju", "majikan", "id_biodata", "bandaratuju");



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

             $tglpkpk = str_replace("~", " ", $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgl_pk", "personal", "id_biodata", "tgl_pk"));
            $statuspk = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "status_pk", "personal", "id_biodata", "status_pk");
            if ($statuspk == 1) {
              $tatusnyapk = "ADA 有";
            }else{
              $tatusnyapk = "TIDAK ADA-沒有";
            }

            $visa_exp = "";
            if($finger != "" || $finger != null){

              $tanggal = $finger;
              $tanggal_edt = str_replace(".", "-",$tanggal);
              $dateno1 = $tanggal_edt;
              $dateno2 = date("Y-m-d");
              $kurang = strtotime($dateno2)-strtotime($dateno1);
              $banyakbulandilewati = ceil($kurang/(3600*24*30));
              $tanggal_plus_1_month = date("Y-m-d", strtotime($tanggal_edt." +".$banyakbulandilewati."month")); // tambah 1 bulan
              $visa_exp = $tanggal_plus_1_month;
            }

            $visanomor = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "novisa", "visa", "id_biodata", "novisa");

            $visaexpired3moth = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "expiredd", "visa", "id_biodata", "DATE(tglberlaku) + INTERVAL 3 MONTH AS expiredd");


            $statusUjk = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "statujk", "personalblk", "nodaftar", "statujk");

            if ($statusUjk == 'LULUS') {
              $statusnya = "OK";
            }else{
              $statusnya = "";
            }

            $abjad = array();
            $letter = 'A';
            while ($letter !== 'CG') {
                $abjad[] = $letter++;
            }
            //---revoso dewa
              
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
            //eend of revisi dewa
          $notelp = str_replace("+62","0",$datauntukprint[$data]->notelp);
          $notelp = str_replace("+","0",$notelp);
          $adh_dakt = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "dakt", "asuransi_dan_hotel", "id_biodata", "*");
          $adh_daki = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "daki", "asuransi_dan_hotel", "id_biodata", "*");
          $adh_dattt = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "dattt", "asuransi_dan_hotel", "id_biodata", "*");
          $adh_aju_ht = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "aju_ht", "asuransi_dan_hotel", "id_biodata", "*");
          $adh_idhotel = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "idhotel", "asuransi_dan_hotel", "id_biodata", "*");
          $adh_kodehotel = $this->modelku->ambildatamod($adh_idhotel, "kodehotel", "setting_hotellist", "id_setting_hotellist", "*");
          $adh_namahotel = $this->modelku->ambildatamod($adh_idhotel, "namahotel", "setting_hotellist", "id_setting_hotellist", "*");
          $kur = $this->modelku->ambildatamod($datauntukprint[$data]->id_biodata, "tgl_tki_ttd", "signingbank", "id_biodata", "tgl_tki_ttd");

          $datanya = array(
            '',
          ($data+1),
          $datauntukprint[$data]->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6,
          $datauntukprint[$data]->nama,
          $datauntukprint[$data]->nama_mandarin,
          $vaksinnama1,
          $vaksintgl1,
          $vaksinnama2,
          $vaksintgl2,
          $vaksinnama3,
          $vaksintgl3,
          $medical3_tgl.' '.$medical3_nama,
          $namamajikanman,
          $namamajikan,
          $jdmajikan,
          $jdmajikan,
          $terbangmajikan,
          $bandaratuju,
          $terpilihmajikan,
          $tgl_to_agen,
          $nodisnaker,
          $tanggalonline,
          $perkiraan,
          $nopaspor,
          $pasporlama,
          $tglpengajuan,
          $statuspengajuanpaspor,
          $tglfoto,
          $statusfoto,
          $tglterima,
          $statusterimapaspor,
          '00',
          $tglpkpk,
          '00',
          '00',
          $tglexp_skck,
          $pengajuan_skck,
          $pengajuanstat_skck,
          $terima_skck,
          $terimastatpaspor,
          $medicalexp,
          $medical,
          $tglpk,
          $tglterimasuhan,
          $nosuhan,
          $tglterbitsuhan,
          $tglexp_suhan,
          '',
          $tglterimapermit,
          $no_visapermit,
          $tgl_terbitVisa,
          $tglexp_visapermit,
          '',
          $visanomor,
          $visaexpired3moth, //penambahan masa expired visa
          $kocokan_visa,
          $kocokanstats_visa,
          $finger,
          $finger_visa,
          $terima_visa,
          $terimastats_visa,
          $notelp,
          '',
          '',

          $adh_dakt,
          $adh_daki,
          $adh_dattt,

          $adh_aju_ht,

          $visa_pap,
          $status_pap,
          $visa_ktkln,
          $status_ktkln,
          $adh_namahotel,
          $adh_kodehotel,
          $tanggalterbang,
          $statusterbang,
          $detailberangkat1.' '.$detailberangkat2,
          $jamtiba,
          $tiket,
          $tglberangkat,
          $statusterbang,
          $dataketerangan1." - ".$dataketerangan2,
          $tglterakhirfinger,
          "( pagi: ".$pagi.") ( sore: ".$sore." )",
          );

          if ($tglpkpk, != '' && $namamajikan != '')
          {
            $datasheet2[$datasheet2_no] = [
              '',
              $datasheet2_no+1,
              $datauntukprint[$data]->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6,
              $datauntukprint[$data]->nama,
              $datauntukprint[$data]->nama_mandarin,
              $vaksinnama1,
              $vaksintgl1,
              $vaksinnama2,
              $vaksintgl2,
              $vaksinnama3,
              $vaksintgl3,
              $namamajikanman,
              $namamajikan,
              $jdmajikan,
              $jdmajikan,
              $terbangmajikan,
              $bandaratuju,
              $terpilihmajikan,
              $tgl_to_agen,
              $nodisnaker,
              $nopaspor,
              $pasporlama,
              '00',
              $tglpkpk,
              '00',
              '00',
              $tglexp_skck,
              $pengajuan_skck,
              $pengajuanstat_skck,
              $terima_skck,
              $terimastatpaspor,
              $medicalexp,
              $medical,
              $dataketerangan1." - ".$dataketerangan2,
              $tglterakhirfinger,
              "( pagi: ".$pagi.") ( sore: ".$sore." )",
            ];
            $datasheet2_no++;


            if (str_replace(' ','',$tglpk) != '')
            {
              $datasheet3[$datasheet3_no] = [
                '',
                $datasheet3_no+1,
                $datauntukprint[$data]->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6,
                $datauntukprint[$data]->nama,
                $datauntukprint[$data]->nama_mandarin,
                $vaksinnama1,
                $vaksintgl1,
                $vaksinnama2,
                $vaksintgl2,
                $vaksinnama3,
                $vaksintgl3,
                $namamajikanman,
                $namamajikan,
                $jdmajikan,
                $jdmajikan,
                $terbangmajikan,
                $bandaratuju,
                $nodisnaker,
                $nopaspor,
                $pasporlama,
                '00',
                $tglpkpk,
                '00',
                '00',
                $tglexp_skck,
                $pengajuan_skck,
                $pengajuanstat_skck,
                $terima_skck,
                $terimastatpaspor,
                $medicalexp,
                $medical,
                $tglpk,
                $tglterimasuhan,
                $nosuhan,
                $tglterbitsuhan,
                $tglexp_suhan,
                '',
                $tglterimapermit,
                $no_visapermit,
                $tgl_terbitVisa,
                $tglexp_visapermit,
                '',
                $visanomor,
                $visaexpired3moth, //penambahan masa expired visa
                $kocokan_visa,
                $kocokanstats_visa,
                $finger,
                $finger_visa,
                $terima_visa,
                $terimastats_visa,
                $notelp,
                '',
                '',
                $visa_pap,
                $status_pap,
                $visa_ktkln,
                $status_ktkln,
                $adh_namahotel,
                $adh_kodehotel,
                $tanggalterbang,
                $statusterbang,
                $detailberangkat1.' '.$detailberangkat2,
                $jamtiba,
                $tiket,
                $tglberangkat,
                $statusterbang,
                $dataketerangan1." - ".$dataketerangan2,
                $tglterakhirfinger,
                "( pagi: ".$pagi.") ( sore: ".$sore." )",
              ];
              $datasheet3_no++;

              if (str_replace(' ','',$visanomor) != '' && $visanomor != null)
              {
                  $datasheet4[$datasheet4_no] = [
                    '',
                    $datasheet4_no+1,
                    $datauntukprint[$data]->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6,
                    $datauntukprint[$data]->nama,
                    $datauntukprint[$data]->nama_mandarin,
                    $vaksinnama1,
                    $vaksintgl1,
                    $vaksinnama2,
                    $vaksintgl2,
                    $vaksinnama3,
                    $vaksintgl3,
                    $namamajikanman,
                    $namamajikan,
                    $jdmajikan,
                    $jdmajikan,
                    $terbangmajikan,
                    $bandaratuju,
                    $nopaspor,
                    $pasporlama,
                    $tglpkpk,
                    '00',
                    '00',
                    $tglexp_skck,
                    $medicalexp,
                    $tglpk,
                    $tglterimasuhan,
                    $tglterimapermit,
                    $visanomor,
                    $visaexpired3moth, //penambahan masa expired visa
                    $notelp,
                    '',
                    '',
                    $adh_dakt,
                    $adh_daki,
                    $adh_dattt,
                    $adh_aju_ht,
                    $visa_pap,
                    $status_pap,
                    $visa_ktkln,
                    $status_ktkln,
                    $adh_namahotel,
                    $adh_kodehotel,
                    $dataketerangan1." - ".$dataketerangan2,
                    $tglterakhirfinger,
                    "( pagi: ".$pagi.") ( sore: ".$sore." )",
                  ];
                  $datasheet4_no++;
                  if (str_replace(' ','',$adh_dattt) != ''){

                    $datasheet5[$datasheet5_no] = [
                      '',
                      $datasheet5_no+1,
                      $datauntukprint[$data]->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6,
                      $datauntukprint[$data]->nama,
                      $datauntukprint[$data]->nama_mandarin,
                      $vaksinnama1,
                      $vaksintgl1,
                      $vaksinnama2,
                      $vaksintgl2,
                      $vaksinnama3,
                      $vaksintgl3,
                      $namamajikanman,
                      $namamajikan,
                      $jdmajikan,
                      $jdmajikan,
                      $terbangmajikan,
                      $bandaratuju,
                      $nopaspor,
                      $pasporlama,
                      $tglpkpk,
                      '00',
                      '00',
                      $tglexp_skck,
                      $medicalexp,
                      $tglpk,
                      $tglterimasuhan,
                      $tglterimapermit,
                      $visanomor,
                      $visaexpired3moth, //penambahan masa expired visa
                      $notelp,
                      '',
                      '',
                      $adh_dakt,
                      $adh_daki,
                      $adh_dattt,
                      $adh_aju_ht,
                      $visa_pap,
                      $visa_ktkln,
                      $status_ktkln,
                      $adh_namahotel,
                      $adh_kodehotel,
                      $tanggalterbang,
                      $statusterbang,
                      $detailberangkat1.' '.$detailberangkat2,
                      $jamtiba,
                      $tiket,
                      $tglberangkat,
                      $statusterbang,
                      $dataketerangan1." - ".$dataketerangan2,
                      $tglterakhirfinger,
                      "( pagi: ".$pagi.") ( sore: ".$sore." )",
                    ];
                    $datasheet5_no++;
                  }
                }
            }
          }


          for ($i=0; $i < count($datanya) ; $i++) { 
            if ($abjad[$i] == 'BJ')
            {
              $objWorksheet->setCellValueExplicit($abjad[$i].($data+$range_data), $datanya[$i], PHPExcel_Cell_DataType::TYPE_STRING);
            }
            else 
            {
              $objWorksheet->setCellValue($abjad[$i].($data+$range_data), $datanya[$i]);
            }
          }

          $total_row = $data+1;

        }

        
        $objWorksheet2->insertNewRowBefore(8, (count($datasheet2)-2));
        $objWorksheet3->insertNewRowBefore(8, (count($datasheet3)-2));
        $objWorksheet4->insertNewRowBefore(8, (count($datasheet4)-2));
        $objWorksheet5->insertNewRowBefore(8, (count($datasheet5)-2));

        foreach($datasheet2 as $key => $val) {
          for ($i=0; $i < count($val) ; $i++) { 
            $objWorksheet2->setCellValue($abjad[$i].( ($key) + $range_data), $val[$i]);
          }
        }
        foreach($datasheet3 as $key => $val) {
          for ($i=0; $i < count($val) ; $i++) { 
            $objWorksheet3->setCellValue($abjad[$i].( ($key) + $range_data), $val[$i]);
          }
        }print_r($datasheet4);
        foreach($datasheet4 as $key => $val) {
          for ($i=0; $i < count($val) ; $i++) { 
            $objWorksheet4->setCellValue($abjad[$i].( ($key) + $range_data), $val[$i]);
          }
        }
        foreach($datasheet5 as $key => $val) {
          for ($i=0; $i < count($val) ; $i++) { 
            $objWorksheet5->setCellValue($abjad[$i].( ($key) + $range_data), $val[$i]);
          }
        }

        $namdarigroupagen = $this->modelku->ambildatamod($key, "nama", "datagroup", "id_group", "nama");


        if ($key == 'all') {
          $namaGroup = " SEMUA GROUP ";
          $fileGroup = " SEMUA GROUP ";
        } else{
          $namaGroup = $namdarigroupagen;
          $fileGroup = $namdarigroupagen;
        }

        if ($keydua == 'all') {
          $namaAgen = " ";
          $fileAgen = "";
        } else{
        $namdariagen = $this->modelku->ambildatamod($keydua, "nama", "dataagen", "id_agen", "nama");
        $namaAgen = $namdariagen;
          $fileAgen = $namdariagen;
          //$objWorksheet->setCellValue("A2", $namaAgen);
        }
/*
        if ($sesi == 0) {
          $objWorksheet->setCellValue("A1", "BELUM TERBANG -".$namaGroup);
        }else{
          $objWorksheet->setCellValue("A1", "SUDAH TERBANG -".$namaGroup);
        }
*/

        if($fileAgen == ""){
          $namafilesimpan = $fileGroup;
        }else{
          $namafilesimpan = $fileAgen;
        }

        $tanggalsimpan = date("Y-m-d");


        $keteranganNamaFile = htmlspecialchars("工廠-養護機構-進度表");


        //$objWorksheet->setCellValue("A3", $tanggalsimpan.' '.$keteranganNamaFile);

        $objWorksheet->setCellValue("B1", $tanggalsimpan.' '.$keteranganNamaFile.' : '.$namaAgen);
        $objWorksheet2->setCellValue("B1", $tanggalsimpan.' '.$keteranganNamaFile.' : '.$namaAgen);
        $objWorksheet3->setCellValue("B1", $tanggalsimpan.' '.$keteranganNamaFile.' : '.$namaAgen);
        $objWorksheet4->setCellValue("B1", $tanggalsimpan.' '.$keteranganNamaFile.' : '.$namaAgen);
        $objWorksheet5->setCellValue("B1", $tanggalsimpan.' '.$keteranganNamaFile.' : '.$namaAgen);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $date = gmdate("D, d M Y H:i:s");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$tanggalsimpan.' . '.$namafilesimpan.' . '.$keteranganNamaFile.'.xls"');

        $objWriter->save("php://output");

    }


    function dataGroupAgen(){
      $kirim = '<option value="all"> --- pilih group --- </option>';
      $data = $this->modelku->ambildata("datagroup");
      foreach ($data as $key => $group) {
         $kirim .= "<option value='".$group->id_group."'>".$group->nama."</option>";
      }
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
      
      $data = $this->db->query("UPDATE personal SET keterangan = '".$dataTransfer."' WHERE id_biodata = '".$iddata."' ");
      
      if ($data) {
          $status_ktkln = $this->modelku->ambildatamod($iddata, "keterangan", "personal", "id_biodata", "keterangan");
          echo $status_ktkln;
      }else{
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



    function ubahKeterangan2(){
      // $tipe = $_POST['tipe'];  
      // $value = $_POST['value'];   
      $iddata = $_POST['iddata'];
      $dataTransfer = $_POST['dataTransfer'];
      // $tipe = $_POST['tipe'];
      
      $data = $this->db->query("UPDATE personal SET keterangan2 = '".$dataTransfer."' WHERE id_biodata = '".$iddata."' ");
      
      if ($data) {
          $status_ktkln = $this->modelku->ambildatamod($iddata, "keterangan2", "personal", "id_biodata", "keterangan2");
          echo $status_ktkln;
      }else{
          echo "gagal";
      }
    }

}