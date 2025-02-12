<?php
class Mpk extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    /*
      Cetak Laporan Daftar TKI Majikan PK
    */

    private function datapilihan(){
        $data = [
          "SM" => [
            "name" => "tglterpilih_majikan",
            "title" => "MAJIKAN"
          ] // Sudah Majikan
          , "SC" => [
            "name" => "tglpk"
            ,"title" => "SCAN PK"
          ] // Sudah Scan PK
          , "TPA" => [
            "name"=>"terimapk",
            "title"=>"TERIMA PK ASLI"
          ] // Terima PK Asli
          , "TT" => [
            "name"=>"tglterbang",
            "title"=>"TERBANG"
          ] // Tanggal Terbang
          , "FR" => [
            "name"=>"finger_pertama",
            "title"=>"PERTAMA FINGER"
          ] // Tanggal Terbang
        ];
		return $data;
    }

    public function datapk($post, $document){

      $data = $this->datapilihan();
      
      $d1 = $post['date1'];
      $d2 = $post['date2'];
      $datapilih = $post['datapilih'];

      $sektor = $post['sektor'] != "SEMUA" ? $post['sektor'] : null ;

	  $name = $data[$datapilih]["name"];

      $kondisiSektor = ($sektor?" AND ( ".join(" OR ",array_map(function($sc){
		return "substring_index(p.id_biodata,\"-\",1) = '$sc'";
	  },explode(",", $sektor)) )." ) ":"");
	$document->setValue('value1' , "TKI ".($sektor?$sektor." ":"")."".$data[$datapilih]["title"]." ".date('d-m-Y' ,strtotime($d1))." s/d " . date('d-m-Y' ,strtotime($d2)) );

      $query = "
      SELECT
        p.kode,
        kode_agen,
        p.nama,
        format_tanggal ( tglterbit ) tglterbit,
        ifnull( format_tanggal ( nullif( tglterpilih_majikan, '' ) ), '' ) tglterpilih,
        ifnull( format_tanggal ( nullif( tglpk, '' )), '' ) tglpk,
        ifnull( nullif( terimapk, '00-00-0000' ), '' ) tgl_pk,
        ifnull( keterangan, '' ) keterangan,
        ifnull( p.pekerjaan, '' ) pekerjaan,
        ifnull( marketing, '' ) marketing,
        tgltiba tiba,
        finger_pertama,
        statusaktif,
        max(IF(rp.kode_nama = 'jompo', rp.pekerjaan, '')) jompo,
        max(IF(rp.kode_nama = 'masak', rp.pekerjaan, '')) masak,
        max(IF(rp.kode_nama = 'tasau', rp.pekerjaan, '')) tasau,
        max(IF(rp.kode_nama = 'taiyi', rp.pekerjaan, '')) taiyi,
        max(IF(rp.kode_nama = 'jaga_anak', rp.pekerjaan, '')) jaga_anak,
        max(IF(rp.kode_nama = 'gendong', rp.pekerjaan, '')) gendong
      FROM
        personal_nama p
        LEFT JOIN rangkuman_pekerjaan rp ON p.id_biodata= rp.id_biodata
		  WHERE 1=1 $kondisiSektor AND format_tanggal(format_date_dd_mm_yyyy_to_yyyy_mm_dd($name)) BETWEEN '$d1' AND '$d2'
      GROUP BY p.id_biodata
        ";
	  // 	echo $query;
		// die();
      $data = $this->db->query($query)->result();
      $document->cloneRow('value2',count($data));
      	foreach ($data as $key => $res){
			$key += 1;
			$document->setValue('value2#'.$key, $key);
			$document->setValue('value3#'.$key , $res->kode."\n".$res->nama);
			$document->setValue('value4#'.$key , $res->tglterbit != "" && $res->tglterbit != 0 && $res->tglterbit != null? $res->tglterbit:"-");
			$document->setValue('value5#'.$key , ($res->tglterpilih != ""? date('d-m-Y' ,strtotime($res->tglterpilih)):"-") . "\n".$res->kode_agen);
			$document->setValue('value6#'.$key , $res->tglpk != ''? date('d-m-Y' ,strtotime($res->tglpk)):"-");
			$document->setValue('value7#'.$key , $res->tgl_pk);
			$document->setValue('value8#'.$key , $res->keterangan);
			$document->setValue('kerja#'.$key , $res->pekerjaan);
			$document->setValue('jompo#'.$key , str_replace("[;]", "\n", $res->jompo));
			$document->setValue('masak#'.$key , str_replace("[;]", "\n", $res->masak));
			$document->setValue('tasau#'.$key , str_replace("[;]", "\n", $res->tasau));
			$document->setValue('taiyi#'.$key , str_replace("[;]", "\n", $res->taiyi));
			$document->setValue('jaga_anak#'.$key , str_replace("[;]", "\n", $res->jaga_anak));
			$document->setValue('gendong#'.$key , str_replace("[;]", "\n", $res->gendong));
			$document->setValue('marketing#'.$key , $res->marketing);
			$document->setValue('tiba#'.$key , $res->tiba != '' ? date('d-m-Y' ,strtotime($res->tiba)):"-");
		}
    }
}