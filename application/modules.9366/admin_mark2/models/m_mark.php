<?php
class M_mark extends CI_Model {
    function __construct() {
        parent::__construct();
    }


    function datapersonal($page, $pencarian, $agen, $terbang){

        if ($terbang == '0') {
            $belum_terbang = "";
        }else{
            $belum_terbang = '1';
        }
        if ($agen == "") {
            $where_agen = "majikan.kode_group != '' ||";
        }else{
            $where_agen = "majikan.kode_group = '".$agen."' ||";
        }

        if (is_numeric($pencarian)) {
            $nama = "";
            $FI = "FI-".$pencarian."";
            $MI = "MI-".$pencarian."";
        }else{
            $nama = "
                AND ( 
                personal.nama LIKE '%".strtoupper($pencarian)."%'
            ) LIMIT ".$page.", 10
            ";
            $FI = "FI";
            $MI = "MI";
        }

        $data = $this->db->query("
            SELECT DISTINCT
                personal.id_biodata,
                personal.negara1,
                personal.negara2,
                personal.calling,
                personal.skill1,
                personal.skill2,
                personal.skill3,
                personal.nama,
                personal.nama_mandarin,
                personal.keterangan,
                personal.keterangan2,
                majikan.namamajikan,
                majikan.namataiwan
            FROM
                personal
            JOIN majikan ON personal.id_biodata = majikan.id_biodata
            WHERE
                (
                    ".$where_agen." majikan.kode_group IS NULL
                )
            AND (personal.statterbang = '".$belum_terbang."')
            AND (
                personal.id_biodata LIKE '".$FI."%'
                OR personal.id_biodata LIKE '".$MI."%'
            ) ".$nama."
        ")->result();
        return $data;
    }



    function agengroup(){
        $data = $this->db->query("SELECT * FROM datagroup")->result();
        return $data;
    }




    function total_data($pencarian, $agen, $terbang){
        if ($terbang == '0') {
            $belum_terbang = "";
        }else{
            $belum_terbang = '1';
        }
        if ($agen == "") {
            $where_agen = "majikan.kode_group != '' ||";
        }else{
            $where_agen = "majikan.kode_group = '".$agen."' ||";
        }
        
        $data = $this->db->query("
            SELECT DISTINCT
                personal.id_biodata,
                personal.negara1,
                personal.negara2,
                personal.calling,
                personal.skill1,
                personal.skill2,
                personal.skill3,
                personal.nama,
                personal.nama_mandarin,
                personal.keterangan,
                personal.keterangan2,
                majikan.namamajikan,
                majikan.namataiwan
            FROM
                personal
            JOIN majikan ON personal.id_biodata = majikan.id_biodata
            WHERE
                (
                    ".$where_agen." majikan.kode_group IS NULL
                )
            AND (personal.statterbang = '".$belum_terbang."')
            AND (
                personal.id_biodata LIKE 'FI%'
                OR personal.id_biodata LIKE 'MI%'
            )AND ( 
                personal.nama LIKE '%".$pencarian."%'
            )
        ")->result();
        return $data;
    }

    function ambildatamod($key, $diminta, $dari, $selector, $kode){
        $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."'")->row();
        $dikirim = isset($data->$diminta);
        if ($dikirim == 1) {
            $paket = $data->$diminta;
        }else{
            $paket = "";
        }
        return $paket;
    }

    function tglterakhirfinger($key){
        $data = $this->db->query("SELECT dteDate FROM tblattendance WHERE idblk = '".$key."' GROUP BY dteDate DESC LIMIT 1")->row();
        $dikirim = isset($data->dteDate);
        if ($dikirim == 1) {
            $paket = $data->dteDate;
        }else{
            $paket = "";
        }
        return $paket;
    }

    function jmlfingerpagi($key, $kondisi){
        $data = $this->db->query("SELECT count(DISTINCT(DATE(dteDate))) as hitung FROM tblattendance WHERE idblk = '".$key."' AND waktu = '".$kondisi."'")->row();
        $dikirim = isset($data->hitung);
        if ($dikirim == 1) {
            $paket = $data->hitung;
        }else{
            $paket = "";
        }
        return $paket;
    }

    function hitunganfingernodaftujuh($key, $kondisi){
        $data = $this->db->query("SELECT DATE_ADD(adm_tglreg, INTERVAL ".$kondisi." DAY) as date FROM personalblk WHERE nodaftar = '".$key."'")->row();
        $dikirim = isset($data->date);
        if ($dikirim == 1) {
            $paket = $data->date;
        }else{
            $paket = "";
        }
        return $paket;
    }

    function stat_tgl_durasi($key, $kondisi){
        $tanggal_durasi = $key;
          if ($kondisi == 3) {
            $tanggal_durasi = '';
          }

          $stat_tgl_durasi = '';
          if ( $tanggal_durasi != NULL )
          {
              $stat_tgl_durasi = 'C';
              if ( $tanggal_durasi < date('Y-m-d') )
              {
                  $stat_tgl_durasi = 'A';
              }
          }

          return $stat_tgl_durasi;
    }

    function stat_tgl_ujk($key){
        $stat_tgl_ujk = 'C';
        if ( $key != NULL )
        {
            $stat_tgl_ujk = 'A';
        }
        return $stat_tgl_ujk;
    }

    // function opsi_keterangan($keterangan, $value, $id){
        
    //     if ($keterangan == 1) {
    //         $nilai = "keterangan";
    //     }else{
    //         $nilai = "keterangan2"
    //     }

    //     $data = $this->db->query("UPDATE personal SET $nilai = '".$value."' WHERE id_biodata = '".$id."' ");

    //     return $data;
    // }
    
}