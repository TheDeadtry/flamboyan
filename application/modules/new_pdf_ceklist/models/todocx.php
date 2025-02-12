<?php
class Todocx extends CI_Model{

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

    public function datapk($data, $document){
        $row = $data['disnaker'];
        $nama = $row->nama;
    $tempatlahir = $row->tempatlahir;
    $tanggallahir2 = $row->tanggallahir;
    $noktp = $row->noktp;
    $jeniskelamin = $row->jeniskelamin;
    $agama = $row->agama;
    $status = $row->status;
    $pendidikan = $row->pendidikan;
    $alamat = $row->alamat;
    $propinsi = $row->propinsi;
    $namaayah = $row->namaayah;
    $namaibu = $row->namaibu;
    $namaahli = $row->namaahli;
    $namakontak = $row->namakontak;
    $alamatkontak = $row->alamatkontak;
    $hubkontak = $row->hubkontak;
    $tglonline = $row->tglonline;
    $perkiraan = $row->perkiraan;
    $negara = $row->negara;
    $jabatan = $row->jabatan;
    $ahliwaris = $row->ahliwaris;
    $jmlanak = $row->jmlanak;
    $agency2 = $row->agency;
    $matauang = $row->matauang;
    $sektorusaha = $row->sektorusaha;
    $gaji = $row->gaji;
    $nopaspor = $row->nopaspor;
    $masaberlaku = $row->masaberlaku;
    $masahabis = $row->masahabis;
    $tglberangkat = $row->tglberangkat;
    $tgltiba = $row->tgltiba;

    $datamap = [
        "ktp_y" => "V",
        "ktp_n" => "",
        "akte_y" => "V",
        "akte_n" => "",
        "kk_y" => "V",
        "kk_n" => "",
        "ijasah_y" => "V",
        "ijasah_n" => "",
        "akte_mati_y" => "",
        "akte_mati_n" => "",
        "surat_ortu_y" => "V",
        "surat_ortu_n" => "",
        "nik" => $noktp,
        "nama" => $nama,
        "nama_ibu" => $namaibu,
        "nama_ayah" => $namaayah,
        "jenis_kelamin" => $jeniskelamin,
        "tempat_lahir" => $tempatlahir,
        "tgl_lahir" => $tanggallahir2,
        "alamat" => $alamat,
        "kecamatan" => "",
        "alamat_ortu" => "",
        "status" => $status,
        "agama" => $agama,
        "pendidikan" => $pendidikan,
        "agency" => $agency2,
        "jabatan" => $jabatan,
        "sektor_usaha" => $sektorusaha,
        "mata_uang" => $matauang,
        "no_paspor" => $nopaspor,
        "masa_berlaku" => $masaberlaku,
        "masa_habis_berlaku" => $masahabis,
        "tgl_berangkat" => $tglberangkat,
        "tgl_tiba" => $tgltiba,
        "ket_ktp" => "",
        "ket_akte" => "",
        "ket_kk" => "",
        "ket_ijazah" => "",
        "ket_surat_nikah" => "",
        "ket_surat_ijin_ortu" => "",
        "nama_pptki" => "",
        "nik_pptki" => "",
        "petugas" => ""
    ];

    foreach ($datamap as $key => $value) {
    //   $datamap[$key] = $data[$key];
        $document->setValue($key, $value);
    }

    //   $document->cloneRow('value2',count($data));
      	// foreach ($data as $key => $res){
		// 	$key += 1;
		// 	$document->setValue('value2#'.$key, $key);
		// 	$document->setValue('value3#'.$key , $res->kode."\n".$res->nama);
		// 	$document->setValue('value4#'.$key , $res->tglterbit != "" && $res->tglterbit != 0 && $res->tglterbit != null? $res->tglterbit:"-");
		// 	$document->setValue('value5#'.$key , ($res->tglterpilih != ""? date('d-m-Y' ,strtotime($res->tglterpilih)):"-") . "\n".$res->kode_agen);
		// 	$document->setValue('value6#'.$key , $res->tglpk != ''? date('d-m-Y' ,strtotime($res->tglpk)):"-");
		// 	$document->setValue('value7#'.$key , $res->tgl_pk);
		// 	$document->setValue('value8#'.$key , $res->keterangan);
		// 	$document->setValue('kerja#'.$key , $res->pekerjaan);
		// 	$document->setValue('marketing#'.$key , $res->marketing);
		// 	$document->setValue('tiba#'.$key , $res->tiba != '' ? date('d-m-Y' ,strtotime($res->tiba)):"-");
		// }
    }
}