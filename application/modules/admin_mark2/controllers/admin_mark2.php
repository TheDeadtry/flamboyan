<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Admin_mark2 extends MX_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mark');
            $this->load->model('M_session');            
    }

    //------------------------------------------- MARK FORMAL ------------------------------------------//
    
    function formal()
    {
        $this->session->unset_userdata('mark_idagen');
        $this->session->unset_userdata('mark_statterbang');

        $data['tampil_pilihan_agen'] = $this->M_session->select("SELECT * FROM dataagen ORDER BY nama ASC");

        $data['namamodule']   = "admin_mark2";
        $data['namafileview'] = "markformal";
        echo Modules::run('template/new_admin2_template', $data);
    }

    function dataformal(){
        $no = 1;
        $page = $_POST['page'];
        $data = '';
        $pencarian = $_POST['pencarian'];
        $agen = $_POST['agen'];
        $blmterbang = $_POST['blmterbang'];
        $personal = $this->M_mark->datapersonal($page, $pencarian, $agen, $blmterbang);
        $total = $this->M_mark->total_data($pencarian, $agen, $blmterbang);

        if ($_POST['key'] == 'data') {
        foreach ($personal as $key => $personal) {
          
          $tgl_to_agen = $this->M_mark->ambildatamod($personal->id_biodata, "tgl_to_agen", "marka_biotoagen", "id_biodata", "tgl_to_agen");
          $tanggalonline = $this->M_mark->ambildatamod($personal->id_biodata, "tglonline", "disnaker", "id_biodata", "tglonline");
          $perkiraan = $this->M_mark->ambildatamod($personal->id_biodata, "perkiraan", "disnaker", "id_biodata", "perkiraan");
          $nodisnaker = $this->M_mark->ambildatamod($personal->id_biodata, "nodisnaker", "disnaker", "id_biodata", "nodisnaker");
          $nopaspor = $this->M_mark->ambildatamod($personal->id_biodata, "nopaspor", "paspor", "id_biodata", "nopaspor");
          $tglterakhirfinger = $this->M_mark->tglterakhirfinger($personal->id_biodata);
          $pagi = $this->M_mark->jmlfingerpagi($personal->id_biodata, "pagi");
          $sore = $this->M_mark->jmlfingerpagi($personal->id_biodata, "sore");
          $hitunganfingernodaftujuh = $this->M_mark->hitunganfingernodaftujuh($personal->id_biodata, 60);
          $hitunganfingernodafbelas = $this->M_mark->hitunganfingernodaftujuh($personal->id_biodata, 67);
          $status_monitoring = $this->M_mark->ambildatamod($personal->id_biodata, "sektor_tki", "personalblk", "nodaftar", "sektor_tki");
          $stat_tgl_durasi = $this->M_mark->stat_tgl_durasi($hitunganfingernodaftujuh, $status_monitoring);
          $stat_tgl_ujk = $this->M_mark->stat_tgl_ujk($hitunganfingernodafbelas);
          $terpilihmajikan = $this->M_mark->ambildatamod($personal->id_biodata, "tglterpilih", "majikan", "id_biodata", "tglterpilih");
          $jdmajikan = $this->M_mark->ambildatamod($personal->id_biodata, "JD", "majikan", "id_biodata", "JD");
          $terbangmajikan = $this->M_mark->ambildatamod($personal->id_biodata, "tglterbang", "majikan", "id_biodata", "tglterbang");
          $tanggalterbang = $this->M_mark->ambildatamod($personal->id_biodata, "tanggalterbang", "visa", "id_biodata", "tanggalterbang");
          $statusterbang = $this->M_mark->ambildatamod($personal->id_biodata, "statusterbang", "visa", "id_biodata", "statusterbang");
          $id_terbang = $this->M_mark->ambildatamod($personal->id_biodata, "id_terbang", "visa", "id_biodata", "id_terbang");
          $detailberangkat1 = $this->M_mark->ambildatamod($id_terbang, "detailberangkat1", "dataterbang", "id_terbang", "detailberangkat1");
          $jamtiba = $this->M_mark->ambildatamod($id_terbang, "jamtiba", "dataterbang", "id_terbang", "jamtiba");
          $tiket = $this->M_mark->ambildatamod($personal->id_biodata, "tiket", "visa", "id_biodata", "tiket");
          $tglberangkat = $this->M_mark->ambildatamod($personal->id_biodata, "tglberangkat", "visa", "id_biodata", "tglberangkat");
          $statusterbang = $this->M_mark->ambildatamod($personal->id_biodata, "statusterbang", "visa", "id_biodata", "statusterbang");
          $tglpk = $this->M_mark->ambildatamod($personal->id_biodata, "tglpk", "majikan", "id_biodata", "tglpk");
          $tglterimasuhan = $this->M_mark->ambildatamod($personal->id_biodata, "tglterimasuhan", "majikan", "id_biodata", "tglterimasuhan");
          $id_suhan = $this->M_mark->ambildatamod($personal->id_biodata, "id_suhan", "majikan", "id_biodata", "id_suhan");
          $tglterbitsuhan = $this->M_mark->ambildatamod($personal->id_biodata, "tglterbitsuhan", "majikan", "id_biodata", "tglterbitsuhan");
          $tglexp_suhan = $this->M_mark->ambildatamod($personal->id_biodata, "tglexp_suhan", "majikan", "id_biodata", "tglterbitsuhan + INTERVAL '6' MONTH AS tglexp_suhan");
          $ketsuhan = $this->M_mark->ambildatamod($personal->id_biodata, "ketsuhan", "majikan", "id_biodata", "ketsuhan");
          $tglterimapermit = $this->M_mark->ambildatamod($personal->id_biodata, "tglterimapermit", "majikan", "id_biodata", "tglterimapermit");
          $id_visapermit = $this->M_mark->ambildatamod($personal->id_biodata, "id_visapermit", "majikan", "id_biodata", "id_visapermit");
          $tglterbitpermit = $this->M_mark->ambildatamod($personal->id_biodata, "tglterbitpermit", "majikan", "id_biodata", "tglterbitpermit");
          $tglexp_visapermit = $this->M_mark->ambildatamod($personal->id_biodata, "tglpermit", "majikan", "id_biodata", "tglterbitpermit + INTERVAL '6' MONTH as tglpermit");
          $ketpermit = $this->M_mark->ambildatamod($personal->id_biodata, "ketpermit", "majikan", "id_biodata","ketpermit");
          $pasporlama = $this->M_mark->ambildatamod($personal->id_biodata, "tgl", "pasporlama", "id_biodata", "DATE_ADD(pasporlama.tglterbit, INTERVAL 5 YEAR) as tgl");
          $tglpengajuan = $this->M_mark->ambildatamod($personal->id_biodata, "tglpengajuan", "paspor", "id_biodata", "tglpengajuan");
          $statuspengajuanpaspor = $this->M_mark->ambildatamod($personal->id_biodata, "statuspengajuan", "paspor", "id_biodata", "statuspengajuan");
          $tglfoto = $this->M_mark->ambildatamod($personal->id_biodata, "tglfoto", "paspor", "id_biodata", "tglfoto");
          $statusfoto = $this->M_mark->ambildatamod($personal->id_biodata, "statusfoto", "paspor", "id_biodata", "statusfoto");
          $tglterima = $this->M_mark->ambildatamod($personal->id_biodata, "tglterima", "paspor", "id_biodata","tglterima");
          $statusterimapaspor = $this->M_mark->ambildatamod($personal->id_biodata, "statusterima", "paspor", "id_biodata", "statusterima");
          $pengajuan_skck = $this->M_mark->ambildatamod($personal->id_biodata, "pengajuan", "skck", "id_biodata", "pengajuan");
          $pengajuanstat_skck = $this->M_mark->ambildatamod($personal->id_biodata, "statuspengajuan", "skck", "id_biodata", "statuspengajuan");
          $terima_skck = $this->M_mark->ambildatamod($personal->id_biodata, "terima", "skck", "id_biodata", "terima");
          $terimastatpaspor = $this->M_mark->ambildatamod($personal->id_biodata, "statusterima", "skck", "id_biodata", "statusterima");
          $tglexp_skck = $this->M_mark->ambildatamod($personal->id_biodata, "tglexp", "skck", "id_biodata", "tglexp");


          $medical3_total = $this->M_mark->ambildatamod($personal->id_biodata, "total", "medical3", "id_biodata", "count(*) as total");
          $medical2_expired = $this->M_mark->ambildatamod($personal->id_biodata, "medical2_expired", "medical2", "id_biodata", "tanggal + INTERVAL '3' MONTH as medical2_expired");
          $medical2_tanggal = $this->M_mark->ambildatamod($personal->id_biodata, "tanggal", "medical2", "id_biodata", "tanggal");

          $medical3_expired = $this->M_mark->ambildatamod($personal->id_biodata, "medical3_expired", "medical3", "id_biodata", "tanggal + INTERVAL '3' MONTH as medical3_expired");
          $medical3_tanggal = $this->M_mark->ambildatamod($personal->id_biodata, "tanggal", "medical3", "id_biodata", "tanggal");

          

          if ($medical3_total == 0)
          {
            $medical  = $medical2_tanggal;
            $medicalexp = $medical2_expired;
          } else{
            $medical  = $medical3_tanggal;
            $medicalexp = $medical3_expired;
          }
          
          $kocokan_visa = $this->M_mark->ambildatamod($personal->id_biodata, "kocokan", "visa", "id_biodata", "kocokan");
          $kocokanstats_visa = $this->M_mark->ambildatamod($personal->id_biodata, "statuskocokan", "visa", "id_biodata", "statuskocokan");
          $finger = $this->M_mark->ambildatamod($personal->id_biodata, "finger", "visa", "id_biodata", "finger");
          $finger_visa = $this->M_mark->ambildatamod($personal->id_biodata, "statusfinger", "visa", "id_biodata", "statusfinger");
          $terima_visa = $this->M_mark->ambildatamod($personal->id_biodata, "terima", "visa", "id_biodata", "terima");
          $terimastats_visa = $this->M_mark->ambildatamod($personal->id_biodata, "statusterima", "visa", "id_biodata", "statusterima");
          $loanbank = $this->M_mark->ambildatamod($personal->id_biodata, "tgl_tki_ttd", "signingbank", "id_biodata", "tgl_tki_ttd");
          $visa_pap = $this->M_mark->ambildatamod($personal->id_biodata, "pap", "visa", "id_biodata", "pap");
          $status_pap = $this->M_mark->ambildatamod($personal->id_biodata, "statuspap", "visa", "id_biodata", "statuspap");
          $visa_ktkln = $this->M_mark->ambildatamod($personal->id_biodata, "ktkln", "visa", "id_biodata", "ktkln");
          $status_ktkln = $this->M_mark->ambildatamod($personal->id_biodata, "statusktkln", "visa", "id_biodata", "statusktkln");
          
           $data .= "
           <tr>
           <td class='fixed-side2'>".($no+$page)."</td>
           <td class='fixed-side2'>".$personal->id_biodata."</td>
           <td class='fixed-side2'>".$personal->nama."</td>
           <td class='fixed-side2'>".$personal->nama_mandarin."</td>
           <td>".$personal->namamajikan."</td>
           <td>".$personal->namataiwan."</td>
           <td>".$tgl_to_agen."</td>
           <td>".$tanggalonline."</td>
           <td>".$perkiraan."</td>
           <td>".$nodisnaker."</td>
           <td>".$nopaspor."</td>
           <td>".$tglterakhirfinger."</td>
           <td> ( pagi :".$pagi." ) ( sore :".$sore." )</td>
           <td>".$hitunganfingernodaftujuh."</td>
           <td>".$stat_tgl_durasi."</td>
           <td>".$hitunganfingernodafbelas."</td>
           <td>".$stat_tgl_ujk."</td>
           <td>".$terpilihmajikan."</td>
           <td>".$jdmajikan."</td>
           <td>".$terbangmajikan."</td>
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
           <td>".$pasporlama."</td>
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
           <td><input type='text' name='".$personal->id_biodata."' value='".$personal->keterangan."' disabled><input type='button' id='data".$personal->id_biodata."' value='ubah' onclick='keterangan(".'"'.$personal->id_biodata.'"'.")'></td>
           <td><input type='text' name='dua".$personal->id_biodata."' value='".$personal->keterangan2."' disabled><input type='button' id='data2".$personal->id_biodata."' value='ubah' onclick='keterangan2(".'"'.$personal->id_biodata.'"'.")'></td>
           </tr>";
           $no++;
        }
        }

        if ($_POST['key'] == "opsiagen") {
          $opsi = $this->M_mark->agengroup();
          $data .= "<option>pilih group agen</option>";
          $data .= "<option value=''>all</option>";
          foreach ($opsi as $key => $opsi) {
            $data .= "<option value='".$opsi->id_group."'>".$opsi->nama."</option>";
          }
        }
            

//  ----- pagination --------->>>

        if ($_POST['key']=='pagin') {
            $page = $_POST['page'];
            $prev = "prev";
            $next = "next";
            $pencarian = $_POST['pencarian'];
            $total_data = count($total);
            $halaman =ceil($total_data/10);
            $data .= "<li class='pagin'><a onclick='page(".'"'.$prev.'",'.$total_data.")' href='#'>prev</a></li>";
            for ($i=$page; $i < $halaman; $i++) { 
                $data .= "<li class='pagin'><a onclick='page(".(($i+$page)*10).','.$total_data.")' href='#'>".($i+1)."</a></li>";
            }
            $data .= "<li class='pagin'><a onclick='page(".'"'.$next.'",'.$total_data.")' href='#'>".$total_data."</a></li>";

        }

        

        exit($data);
    }




    function printdata($pencarian, $agen, $terbang){
      
      if ($pencarian == "all") {
        $pencarian = "";
      }

      if ($agen == "all") {
        $agen = "";
      }

      $this->load->library("PHPExcel");
      $objPHPExcel  = new PHPExcel();
      $objReader    = PHPExcel_IOFactory::createReader('Excel5');
      $objPHPExcel = $objReader->load("files/informal.xls");

      $total = $this->M_mark->total_data($pencarian, $agen, $terbang);

      $objWorksheet = $objPHPExcel->getActiveSheet();

      $banyak_data = count($total);
      $objWorksheet->insertNewRowBefore(6, ($banyak_data-1));
      $range_data = 5;
      for ($data=0; $data < ($banyak_data) ; $data++) {

          $tgl_to_agen = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tgl_to_agen", "marka_biotoagen", "id_biodata", "tgl_to_agen");
          $tanggalonline = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglonline", "disnaker", "id_biodata", "tglonline");
          $perkiraan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "perkiraan", "disnaker", "id_biodata", "perkiraan");
          $nodisnaker = $this->M_mark->ambildatamod($total[$data]->id_biodata, "nodisnaker", "disnaker", "id_biodata", "nodisnaker");
          $nopaspor = $this->M_mark->ambildatamod($total[$data]->id_biodata, "nopaspor", "paspor", "id_biodata", "nopaspor");
          $tglterakhirfinger = $this->M_mark->tglterakhirfinger($total[$data]->id_biodata);
          $pagi = $this->M_mark->jmlfingerpagi($total[$data]->id_biodata, "pagi");
          $sore = $this->M_mark->jmlfingerpagi($total[$data]->id_biodata, "sore");
          $hitunganfingernodaftujuh = $this->M_mark->hitunganfingernodaftujuh($total[$data]->id_biodata, 60);
          $hitunganfingernodafbelas = $this->M_mark->hitunganfingernodaftujuh($total[$data]->id_biodata, 67);
          $status_monitoring = $this->M_mark->ambildatamod($total[$data]->id_biodata, "sektor_tki", "personalblk", "nodaftar", "sektor_tki");
          $stat_tgl_durasi = $this->M_mark->stat_tgl_durasi($hitunganfingernodaftujuh, $status_monitoring);
          $stat_tgl_ujk = $this->M_mark->stat_tgl_ujk($hitunganfingernodafbelas);
          $terpilihmajikan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglterpilih", "majikan", "id_biodata", "tglterpilih");
          $jdmajikan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "JD", "majikan", "id_biodata", "JD");
          $terbangmajikan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglterbang", "majikan", "id_biodata", "tglterbang");
          $tanggalterbang = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tanggalterbang", "visa", "id_biodata", "tanggalterbang");
          $statusterbang = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statusterbang", "visa", "id_biodata", "statusterbang");
          $id_terbang = $this->M_mark->ambildatamod($total[$data]->id_biodata, "id_terbang", "visa", "id_biodata", "id_terbang");
          $detailberangkat1 = $this->M_mark->ambildatamod($id_terbang, "detailberangkat1", "dataterbang", "id_terbang", "detailberangkat1");
          $jamtiba = $this->M_mark->ambildatamod($id_terbang, "jamtiba", "dataterbang", "id_terbang", "jamtiba");
          $tiket = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tiket", "visa", "id_biodata", "tiket");
          $tglberangkat = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglberangkat", "visa", "id_biodata", "tglberangkat");
          $statusterbang = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statusterbang", "visa", "id_biodata", "statusterbang");
          $tglpk = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglpk", "majikan", "id_biodata", "tglpk");
          $tglterimasuhan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglterimasuhan", "majikan", "id_biodata", "tglterimasuhan");
          $id_suhan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "id_suhan", "majikan", "id_biodata", "id_suhan");
          $tglterbitsuhan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglterbitsuhan", "majikan", "id_biodata", "tglterbitsuhan");
          $tglexp_suhan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglexp_suhan", "majikan", "id_biodata", "tglterbitsuhan + INTERVAL '6' MONTH AS tglexp_suhan");
          $ketsuhan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "ketsuhan", "majikan", "id_biodata", "ketsuhan");
          $tglterimapermit = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglterimapermit", "majikan", "id_biodata", "tglterimapermit");
          $id_visapermit = $this->M_mark->ambildatamod($total[$data]->id_biodata, "id_visapermit", "majikan", "id_biodata", "id_visapermit");
          $tglterbitpermit = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglterbitpermit", "majikan", "id_biodata", "tglterbitpermit");
          $tglexp_visapermit = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglpermit", "majikan", "id_biodata", "tglterbitpermit + INTERVAL '6' MONTH as tglpermit");
          $ketpermit = $this->M_mark->ambildatamod($total[$data]->id_biodata, "ketpermit", "majikan", "id_biodata","ketpermit");
          $pasporlama = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tgl", "pasporlama", "id_biodata", "DATE_ADD(pasporlama.tglterbit, INTERVAL 5 YEAR) as tgl");
          $tglpengajuan = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglpengajuan", "paspor", "id_biodata", "tglpengajuan");
          $statuspengajuanpaspor = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statuspengajuan", "paspor", "id_biodata", "statuspengajuan");
          $tglfoto = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglfoto", "paspor", "id_biodata", "tglfoto");
          $statusfoto = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statusfoto", "paspor", "id_biodata", "statusfoto");
          $tglterima = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglterima", "paspor", "id_biodata","tglterima");
          $statusterimapaspor = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statusterima", "paspor", "id_biodata", "statusterima");
          $pengajuan_skck = $this->M_mark->ambildatamod($total[$data]->id_biodata, "pengajuan", "skck", "id_biodata", "pengajuan");
          $pengajuanstat_skck = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statuspengajuan", "skck", "id_biodata", "statuspengajuan");
          $terima_skck = $this->M_mark->ambildatamod($total[$data]->id_biodata, "terima", "skck", "id_biodata", "terima");
          $terimastatpaspor = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statusterima", "skck", "id_biodata", "statusterima");
          $tglexp_skck = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tglexp", "skck", "id_biodata", "tglexp");


          $medical3_total = $this->M_mark->ambildatamod($total[$data]->id_biodata, "total", "medical3", "id_biodata", "count(*) as total");
          $medical2_expired = $this->M_mark->ambildatamod($total[$data]->id_biodata, "medical2_expired", "medical2", "id_biodata", "tanggal + INTERVAL '3' MONTH as medical2_expired");
          $medical2_tanggal = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tanggal", "medical2", "id_biodata", "tanggal");

          $medical3_expired = $this->M_mark->ambildatamod($total[$data]->id_biodata, "medical3_expired", "medical3", "id_biodata", "tanggal + INTERVAL '3' MONTH as medical3_expired");
          $medical3_tanggal = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tanggal", "medical3", "id_biodata", "tanggal");

          

          if ($medical3_total == 0)
          {
            $medical  = $medical2_tanggal;
            $medicalexp = $medical2_expired;
          } else{
            $medical  = $medical3_tanggal;
            $medicalexp = $medical3_expired;
          }
          
          $kocokan_visa = $this->M_mark->ambildatamod($total[$data]->id_biodata, "kocokan", "visa", "id_biodata", "kocokan");
          $kocokanstats_visa = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statuskocokan", "visa", "id_biodata", "statuskocokan");
          $finger = $this->M_mark->ambildatamod($total[$data]->id_biodata, "finger", "visa", "id_biodata", "finger");
          $finger_visa = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statusfinger", "visa", "id_biodata", "statusfinger");
          $terima_visa = $this->M_mark->ambildatamod($total[$data]->id_biodata, "terima", "visa", "id_biodata", "terima");
          $terimastats_visa = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statusterima", "visa", "id_biodata", "statusterima");
          $loanbank = $this->M_mark->ambildatamod($total[$data]->id_biodata, "tgl_tki_ttd", "signingbank", "id_biodata", "tgl_tki_ttd");
          $visa_pap = $this->M_mark->ambildatamod($total[$data]->id_biodata, "pap", "visa", "id_biodata", "pap");
          $status_pap = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statuspap", "visa", "id_biodata", "statuspap");
          $visa_ktkln = $this->M_mark->ambildatamod($total[$data]->id_biodata, "ktkln", "visa", "id_biodata", "ktkln");
          $status_ktkln = $this->M_mark->ambildatamod($total[$data]->id_biodata, "statusktkln", "visa", "id_biodata", "statusktkln");



        $objWorksheet->setCellValue("A".($data+$range_data), ($data+1));
        $objWorksheet->setCellValue("B".($data+$range_data), $total[$data]->id_biodata);
        $objWorksheet->setCellValue("C".($data+$range_data), $total[$data]->nama);
        $objWorksheet->setCellValue("D".($data+$range_data), $total[$data]->nama_mandarin);
        $objWorksheet->setCellValue("E".($data+$range_data), $total[$data]->namamajikan);
        $objWorksheet->setCellValue("F".($data+$range_data), $total[$data]->namataiwan);
        $objWorksheet->setCellValue("G".($data+$range_data), $tgl_to_agen);
        $objWorksheet->setCellValue("H".($data+$range_data), $tanggalonline);
        $objWorksheet->setCellValue("I".($data+$range_data), $perkiraan);
        $objWorksheet->setCellValue("J".($data+$range_data), $nodisnaker);
        $objWorksheet->setCellValue("K".($data+$range_data), $nopaspor);
        $objWorksheet->setCellValue("L".($data+$range_data), $tglterakhirfinger);
        $objWorksheet->setCellValue("M".($data+$range_data), "( pagi: ".$pagi.") ( sore: ".$sore." )");
        $objWorksheet->setCellValue("N".($data+$range_data), $hitunganfingernodaftujuh);
        $objWorksheet->setCellValue("O".($data+$range_data), $stat_tgl_durasi);
        $objWorksheet->setCellValue("P".($data+$range_data), $hitunganfingernodafbelas);
        $objWorksheet->setCellValue("Q".($data+$range_data),$stat_tgl_ujk);
        $objWorksheet->setCellValue("R".($data+$range_data),$terpilihmajikan);
        $objWorksheet->setCellValue("S".($data+$range_data),$jdmajikan);
        $objWorksheet->setCellValue("T".($data+$range_data),$terbangmajikan);
        $objWorksheet->setCellValue("U".($data+$range_data),$tanggalterbang);
        $objWorksheet->setCellValue("V".($data+$range_data),$statusterbang);
        $objWorksheet->setCellValue("W".($data+$range_data),$detailberangkat1);
        $objWorksheet->setCellValue("X".($data+$range_data),$jamtiba);
        $objWorksheet->setCellValue("Y".($data+$range_data),$tiket);
        $objWorksheet->setCellValue("Z".($data+$range_data),$tglberangkat);
        $objWorksheet->setCellValue("AA".($data+$range_data),$statusterbang);
        $objWorksheet->setCellValue("AB".($data+$range_data),$tglpk);
        $objWorksheet->setCellValue("AC".($data+$range_data),$tglterimasuhan);
        $objWorksheet->setCellValue("AD".($data+$range_data),$id_suhan);
        $objWorksheet->setCellValue("AE".($data+$range_data),$tglterbitsuhan);
        $objWorksheet->setCellValue("AF".($data+$range_data),$tglexp_suhan);
        $objWorksheet->setCellValue("AG".($data+$range_data),$ketsuhan);
        $objWorksheet->setCellValue("AH".($data+$range_data),$tglterimapermit);
        $objWorksheet->setCellValue("AI".($data+$range_data),$id_visapermit);
        $objWorksheet->setCellValue("AJ".($data+$range_data),$tglterbitpermit);
        $objWorksheet->setCellValue("AK".($data+$range_data),$tglexp_visapermit);
        $objWorksheet->setCellValue("AL".($data+$range_data),$ketpermit);
        $objWorksheet->setCellValue("AM".($data+$range_data),$pasporlama);
        $objWorksheet->setCellValue("AN".($data+$range_data),$tglpengajuan);
        $objWorksheet->setCellValue("AO".($data+$range_data),$statuspengajuanpaspor);
        $objWorksheet->setCellValue("AP".($data+$range_data),$tglfoto);
        $objWorksheet->setCellValue("AQ".($data+$range_data),$statusfoto);
        $objWorksheet->setCellValue("AR".($data+$range_data),$tglterima);
        $objWorksheet->setCellValue("AS".($data+$range_data),$statusterimapaspor);
        $objWorksheet->setCellValue("AT".($data+$range_data),$pengajuan_skck);
        $objWorksheet->setCellValue("AU".($data+$range_data),$pengajuanstat_skck);
        $objWorksheet->setCellValue("AV".($data+$range_data),$terima_skck);
        $objWorksheet->setCellValue("AW".($data+$range_data),$terimastatpaspor);
        $objWorksheet->setCellValue("AX".($data+$range_data),$tglexp_skck);
       
        $objWorksheet->setCellValue("AY".($data+$range_data),$medical);
        $objWorksheet->setCellValue("AZ".($data+$range_data),$medicalexp);
        $objWorksheet->setCellValue("BA".($data+$range_data),$kocokan_visa);
        $objWorksheet->setCellValue("BB".($data+$range_data),$kocokanstats_visa);
        $objWorksheet->setCellValue("BC".($data+$range_data),$finger);
        $objWorksheet->setCellValue("BD".($data+$range_data),$finger_visa);
        $objWorksheet->setCellValue("BE".($data+$range_data),$terima_visa);
        $objWorksheet->setCellValue("BF".($data+$range_data),$terimastats_visa);
        $objWorksheet->setCellValue("BG".($data+$range_data),$loanbank);
        $objWorksheet->setCellValue("BH".($data+$range_data),$visa_pap);
        $objWorksheet->setCellValue("BI".($data+$range_data),$status_pap);
        $objWorksheet->setCellValue("BJ".($data+$range_data),$visa_ktkln);
        $objWorksheet->setCellValue("BK".($data+$range_data),$status_ktkln);
        $objWorksheet->setCellValue("BL".($data+$range_data),$total[$data]->keterangan." - ".$total[$data]->keterangan2);
        $total_row = $data+1;
      }


      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      $date = gmdate("D, d M Y H:i:s");
      header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
      header("Cache-Control: no-store, no-cache, must-revalidate");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="informal-'.$date.'.xls"');

      $objWriter->save("php://output");
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
          $status_ktkln = $this->M_mark->ambildatamod($iddata, "keterangan", "personal", "id_biodata", "keterangan");
          echo $status_ktkln;
        }else{
          echo "gagal";
        }
      }else{
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
          $status_ktkln = $this->M_mark->ambildatamod($iddata, "keterangan2", "personal", "id_biodata", "keterangan2");
          echo $status_ktkln;
        }else{
          echo "gagal";
        }
      }else{
        echo "gagal";
      }
      
    }
    // function printdata(){
    //   $total = $this->M_mark->total_data("", "");
    //   echo $total[0]->id_biodata;
    // }


    //------------------------------------------- MARK INFORMAL ------------------------------------------//

}