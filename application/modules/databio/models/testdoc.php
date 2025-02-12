<?php
class Testdoc extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    /*
      Cetak Laporan Daftar TKI Majikan PK
    */

    private function datapilihan(){
        $data = [
          "SM" => [
            "name" => "tglterpilih",
            "title" => "MAJIKAN"
          ] // Sudah Majikan
          , "SC" => [
            "name" => "pk"
            ,"title" => "SCAN PK"
          ] // Sudah Scan PK
          , "TPA" => [
            "name"=>"tglpk",
            "title"=>"TERIMA PK ASLI"
          ] // Terima PK Asli
          , "TT" => [
            "name"=>"tglterbang",
            "title"=>"TERBANG"
          ] // Tanggal Terbang
          , "FR" => [
            "name"=>"tglterbang",
            "title"=>"PERTAMA FINGER"
          ] // Tanggal Terbang
        ];
		return $data;
    }

    public function datapk($post, $document){
        $idbio = $post["idtki"];

        $qr = $this->db->query("
            SELECT 
                p.id_biodata,
                concat(p.id_biodata,' / ', p.nama) nama,
                (SELECT REPLACE(terima_pk,\"/\",\".\") FROM personal WHERE id_biodata = p.id_biodata LIMIT 1) terima_pk,
                (SELECT tglpk FROM majikan WHERE id_biodata = p.id_biodata LIMIT 1) tglpk,
                (SELECT pekerjaan FROM majikan WHERE id_biodata = p.id_biodata LIMIT 1) pekerjaan,
                (SELECT namamajikan FROM majikan WHERE id_biodata = p.id_biodata LIMIT 1) majikan,
                (SELECT tglterpilih FROM majikan WHERE id_biodata = p.id_biodata LIMIT 1) tglterpilih
            FROM personal_nama p WHERE p.id_biodata = '$idbio'
        ")->row();

        $document->setValue('nama', $qr->nama);
        $document->setValue('majikan', $qr->tglterpilih);
        $document->setValue('kasihpk', $qr->terima_pk);
        $document->setValue('scanpk', $qr->tglpk);
        $document->setValue('pkasli', "");
        $document->setValue('tiba', "");
        $document->setValue('pekerjaan', $qr->pekerjaan);
    }
}