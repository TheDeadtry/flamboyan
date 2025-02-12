<?php
class Modelku extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function tabel($table, $search = ''){
    return $this->db->query("SELECT * FROM $table WHERE id_biodata LIKE '%$search%' ")->result();
    }

    function tabel_limit($table, $search ='', $start, $end, $settingType, $kodeGroup = '', $kodeAgen = ''){

        if ($kodeGroup != 'all' && $kodeAgen == 'all') {
             $dataNilaiAgen = '

             AND (
                    majikan.kode_group = '.$kodeGroup.' OR marka_biotoagen.grup_to_agen = '.$kodeGroup.'
             )

             ';
         }elseif($kodeGroup != 'all' && $kodeAgen != 'all'){
            $dataNilaiAgen = '

             AND (
                    majikan.kode_agen = '.$kodeAgen.' OR marka_biotoagen.nama_agen = '.$kodeAgen.'
             )

             ';
         }else{
            $dataNilaiAgen = '';
         }

        if ($settingType == 0) {
            $settdatakehasil = "
            
            AND ( 
                (
                    visa.statusterbang = 'A'
                    AND visa.tanggalterbang >= CURDATE()
                )
                OR (	
                    visa.statusterbang = 'C'
                    OR visa.tanggalterbang >= CURDATE()
                    OR visa.tanggalterbang >= CURDATE()
                )
                OR (
                    visa.statusterbang IS NULL
                    OR visa.tanggalterbang IS NULL
                )
            )
            
            ";
        }else{
            $settdatakehasil = "
                AND DATE(visa.tglberangkat) < CURDATE()
                AND visa.statusterbang = 'A'
            ";
        }

        if (is_numeric($search)) {
        	$fill01 = 'IM-%'.$search.'%';
            $pencarian = '';
        }else{
            $fill01 = '%IM%';
            if ($search != '') {
                $pencarian = '
                AND (
                    personal.nama LIKE "%'.$search.'%"
                )
                ';
            }else{
                $pencarian = '';
            }

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
                majikan.namataiwan,
                marka_biotoagen.tgl_to_agen,
                marka_biotoagen.tgldilepas,
                visa.statusterbang,
                visa.tglberangkat
            FROM
                personal
            LEFT JOIN majikan ON personal.id_biodata = majikan.id_biodata
            LEFT JOIN marka_biotoagen ON personal.id_biodata = marka_biotoagen.id_biodata
            LEFT JOIN visa on personal.id_biodata = visa.id_biodata
            WHERE
            1=1
            $dataNilaiAgen
            
            $settdatakehasil
            
            AND (
                personal.id_biodata LIKE '$fill01'
            ) $pencarian
             LIMIT $start, $end
        ")->result();
    return $data;
    }

    function table_print($kodeGroup = 'all', $kodeAgen = 'all', $settingType){

        if ($kodeGroup != 'all' && $kodeAgen == 'all') {
             $dataNilaiAgen = '

             AND (
                    majikan.kode_group = '.$kodeGroup.' OR marka_biotoagen.grup_to_agen = '.$kodeGroup.'
             )

             ';
         }elseif($kodeGroup != 'all' && $kodeAgen != 'all'){
            $dataNilaiAgen = '

             AND (
                 majikan.kode_agen = '.$kodeAgen.' OR marka_biotoagen.nama_agen = '.$kodeAgen.'
             )

             ';
         }else{
            $dataNilaiAgen = '';
         }


        if ($settingType == 0) {
            $settdatakehasil = "
            
            AND ( 
                (
                    visa.statusterbang = 'A'
                    AND visa.tanggalterbang >= CURDATE()
                )
                OR (	
                    visa.statusterbang = 'C'
                    OR visa.tanggalterbang >= CURDATE()
                    OR visa.tanggalterbang >= CURDATE()
                )
                OR (
                    visa.statusterbang IS NULL
                    OR visa.tanggalterbang IS NULL
                )
            )
            
            ";
        }else{
            $settdatakehasil = "
                AND DATE(visa.tglberangkat) < CURDATE()
                AND visa.statusterbang = 'A'
            ";
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
                majikan.namataiwan,
                marka_biotoagen.tgl_to_agen,
                marka_biotoagen.tgldilepas,
                visa.statusterbang,
                visa.tglberangkat,
                majikan.kode_agen,
                majikan.kode_majikan,
                disnaker.jabatan
            FROM
                personal
            LEFT JOIN majikan ON personal.id_biodata = majikan.id_biodata
            LEFT JOIN disnaker ON personal.id_biodata = disnaker.id_biodata
            LEFT JOIN marka_biotoagen ON personal.id_biodata = marka_biotoagen.id_biodata
            LEFT JOIN visa on personal.id_biodata = visa.id_biodata
            WHERE
                1=1
            
            $dataNilaiAgen
           
            $settdatakehasil
          
            AND (
                personal.id_biodata LIKE '%IM%'
            )
            ORDER BY kode_agen ASC, kode_majikan ASC, tgl_to_agen ASC, id_biodata ASC 
        ")->result();
    return $data;
    }

    function tabel_num_row($table, $search = '', $settingType, $kodeGroup = '', $kodeAgen = ''){

        if ($kodeGroup != 'all' && $kodeAgen == 'all') {
             $dataNilaiAgen = '

             AND (
                    majikan.kode_group = '.$kodeGroup.' OR marka_biotoagen.grup_to_agen = '.$kodeGroup.'
             )

             ';
         }elseif($kodeGroup != 'all' && $kodeAgen != 'all'){
            $dataNilaiAgen = '

             AND (
                majikan.kode_agen = '.$kodeAgen.' OR marka_biotoagen.nama_agen = '.$kodeAgen.'
             )

             ';
         }else{
            $dataNilaiAgen = '';
         }
        

       if ($settingType == 0) {
            $settdatakehasil = "
            
            AND ( 
                (
                    visa.statusterbang = 'A'
                    AND visa.tanggalterbang >= CURDATE()
                )
                OR (	
                    visa.statusterbang = 'C'
                    OR visa.tanggalterbang >= CURDATE()
                    OR visa.tanggalterbang >= CURDATE()
                )
                OR (
                    visa.statusterbang IS NULL
                    OR visa.tanggalterbang IS NULL
                )
            )
            
            ";
        }else{
            $settdatakehasil = "
                AND DATE(visa.tglberangkat) < CURDATE()
                AND visa.statusterbang = 'A'
            ";
        }
    	
    	if (is_numeric($search)) {
            $fill01 = 'IM-%'.$search.'%';
            $pencarian = '';
        }else{
            $fill01 = '%IM%';
            if ($search != '') {
                $pencarian = '
                AND (
                    personal.nama LIKE "%'.$search.'%"
                )
                ';
            }else{
                $pencarian = '';
            }

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
                majikan.namataiwan,
                marka_biotoagen.tgl_to_agen,
                marka_biotoagen.tgldilepas,
                visa.statusterbang,
                visa.tglberangkat
            FROM
                personal
            LEFT JOIN majikan ON personal.id_biodata = majikan.id_biodata
            LEFT JOIN marka_biotoagen ON personal.id_biodata = marka_biotoagen.id_biodata
            LEFT JOIN visa on personal.id_biodata = visa.id_biodata
            WHERE
                1=1
            $dataNilaiAgen
            
            $settdatakehasil
         


            AND (
                personal.id_biodata LIKE '$fill01'
            ) $pencarian 
        ")->result();
    return count($data);
    }


    function ambildata($table, $where = '' , $key = ''){
        if ($where == '') {
            $kondisi = "";
        }else{
            $kondisi = " WHERE ".$where." = '".$key."' ";
        }
        $data =  $this->db->query("SELECT * FROM $table $kondisi")->result();
        return $data;
    }




    function ambildatamod($key, $diminta, $dari, $selector, $kode, $tambahan=""){
        $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."' ".$tambahan."  ")->row();
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

    function ujk_ujian($nodaftar){

        $kode_desa="";
$result = $this->db->query("SELECT tgl_ujk FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1")->row();
$dikirim = isset($result->tgl_ujk);
if ($dikirim == 1) {
    $paket = $result->tgl_ujk;
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

    function ubahdatamod($data, $data1, $nama_table, $kunci, $id){
        $row = explode(",",$data);
        $value = explode(",", $data1);

        $ubah = "";


        for ($i=0; $i < count($row) ; $i++) {
          if ($i == (count($row)-1)) {
            $ubah .= $row[$i]."= '".$value[$i]."'";
           }else{
            $ubah .= $row[$i]."= '".$value[$i]."',";
           }
        }
        $update = $this->db->query("UPDATE $nama_table SET $ubah WHERE $kunci = '$id'");
      
      }

      function ambildatamod1($qq,$diminta) {
		$data = $this->db->query($qq)->row();
        $dikirim = isset($data->$diminta);
        if ($dikirim == 1) {
            $paket = $data->$diminta;
        }else{
            $paket = "";
        }
        return $paket;
	}

}