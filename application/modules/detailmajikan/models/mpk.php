<?php
class Mpk extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    /*
      Cetak Laporan Daftar TKI Majikan PK
    */

    public function datapk($post, $document){
      $id = $post["id"];
      $personal = $this->db->query("SELECT * FROM personal WHERE id_biodata = '$id'")->row();
      $paspor = $this->db->query("SELECT nopaspor nama FROM paspor WHERE id_biodata = '$id'")->row();
      $m = $this->db->query("SELECT m.kode_agen, a.nama, a.direktur FROM majikan m 
      LEFT JOIN dataagen a ON m.kode_agen = a.id_agen
      WHERE m.id_biodata = '$id'")->row();
      $mm =$this->db->query("SELECT m.id_biodata, IF(nullif(m.namamajikan,'') IS NOT NULL, m.namamajikan, d.nama) direktur FROM majikan m
      LEFT JOIN datamajikan d ON d.id_majikan = m.kode_majikan
      WHERE m.id_biodata = '$id'")->row();
      $document->setValue('pin', $id);
      $document->setValue('date', date("Y.m.d"));
      $document->setValue('nama', isset($personal->nama) ?  $personal->nama : "");
      $document->setValue('nopasport',isset($paspor->nama) ? $paspor->nama : "");
      $document->setValue('perush',isset($mm->direktur) ? $mm->direktur : "");
      $document->setValue('agen',isset($m->nama) ? $m->nama : "");
      
      // $this->db
      // var_dump($post);
      // die();
    }
}