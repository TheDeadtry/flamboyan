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
      $d1 = $post['id'];
      $query = "
        SELECT kwitansi.*, personal_nama.nama FROM kwitansi
        LEFT JOIN personal_nama ON kwitansi.id_biodata = personal_nama.id_biodata
        WHERE id = ?
      ";
      $data = $this->db->query($query, array($d1))->result();
      if(count($data)>0){
        $dd = $data[0];
        $document->setValue('id_biodata', $dd->id_biodata);
        $document->setValue('nama', $dd->nama);
        $document->setValue('biaya', ucwords($this->pembilang($dd->jumlah)) . ' Rupiah');
        $document->setValue('keterangan', $dd->keterangan);
        $document->setValue('total', 'Rp ' . number_format($dd->jumlah, 0, ',', '.'));
        $document->setValue('tgl_daftar', date('d-m-Y', strtotime($dd->tgl)));
        $document->setValue('tgl_cetak', date('d-m-Y', strtotime($dd->tgl)));      }
    }

    private function pembilang($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->pembilang($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = $this->pembilang($nilai/10)." puluh". $this->pembilang($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->pembilang($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->pembilang($nilai/100) . " ratus" . $this->pembilang($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->pembilang($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->pembilang($nilai/1000) . " ribu" . $this->pembilang($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->pembilang($nilai/1000000) . " juta" . $this->pembilang($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->pembilang($nilai/1000000000) . " milyar" . $this->pembilang(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->pembilang($nilai/1000000000000) . " trilyun" . $this->pembilang(fmod($nilai,1000000000000));
        }
        return $temp;
    }
}