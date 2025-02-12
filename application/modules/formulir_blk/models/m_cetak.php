<?php

use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class M_cetak extends CI_Model{
    private $arr;
    
    function __construct(){
        parent::__construct();
    }
    
    private function add($name = "", $akun){
        $this->arr["[".$name."]"] = new ExcelParam(SPECIAL_ARRAY_TYPE, $akun[$name]);
        return $this;
    }

    private function single($name = "", $val){
        $this->arr["{".$name."}"] = $val;
        return $this;
    }
    
    private function get(){
        return $this->arr;
    }

    public function getdata($data){
        return $this->db->query("
        SELECT 
        '{no}' no
        , p.nama
        , 'MANDARIN' bhs
        , substring_index( skema(substring_index(p.id_biodata, '-',1)),', ',1) skema
        , substring_index( skema(substring_index(p.id_biodata, '-',1)),', ',-1) negara
        , p.email
        , substring_index( p.pendidikan, ' - ', 1) pendidikan
        , p.tempatlahir
        , ubahFormatTanggal(p.tgllahir) tgllahir
        , if(p.jeniskelamin = '女', 'Perempuan', 'Laki-laki') jk
        , ifnull(d.pekerjaan, '-') pekerjaan
        , ifnull(d.alamat,p.alamat) alamat
        , CONCAT(\"'\", ifnull(d.noktp, d.ktp)) ktp
        , p.alamat kab
        , d.propinsi prov
        , p.notelp
        , ifnull(b.tmp_uji,'-') tmp_uji 
        , ifnull(b.nama_blk,'-') blk
        , b.resi_no
        , b.tipe
        , b.tgl_pengajuan
        , b.tgl_keluar
        , b.tgl_ujk
        , f.*
        , p.foto 
        FROM blk_detail_formulir f 
        LEFT JOIN blk_formulir b ON f.id_formulir = b.id_formulir 
        LEFT JOIN personal p ON p.id_biodata = f.nodaftar
        LEFT JOIN disnaker d ON p.id_biodata = d.id_biodata
        WHERE f.id_formulir = '$data'
        ")->result();
    }

    private function toArray2($data = null, $name = ""){
        $new = [];
        $start = 1;
        foreach ($data as $key => $n) {
            $e = ( array ) $n;
            $new[] = str_replace("{no}",$start+$key, $e[$name]);
        }
        return $new;
    }

    function ubahFormatTanggal($tanggal) {
        // Memisahkan tanggal, bulan, dan tahun dari input
        list($hari, $bulan, $tahun) = explode('-', $tanggal);

        // Array bulan dalam bahasa Indonesia
        $namaBulan = array(
            '01' => 'JANUARI',
            '02' => 'FEBRUARI',
            '03' => 'MARET',
            '04' => 'APRIL',
            '05' => 'MEI',
            '06' => 'JUNI',
            '07' => 'JULI',
            '08' => 'AGUSTUS',
            '09' => 'SEPTEMBER',
            '10' => 'OKTOBER',
            '11' => 'NOVEMBER',
            '12' => 'DESEMBER'
        );

        // Mengubah format tanggal
        $tanggalBaru = $hari . ' ' . $namaBulan[$bulan] . ' ' . $tahun;

        return $tanggalBaru;
    }

    public function excel($data){
        require_once 'external/vendor/autoload.php';
        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
        $tmp = 'files/xls_tmp/ujk_tmp.xlsx';
        $data = $this->getdata($data);

        $dataParse = [];
        $dataParse["no"] = $this->toArray2($data, "no"); 
        $this->add("no", $dataParse);

        $dataParse["nama"] = $this->toArray2($data, "nama"); 
        $this->add("nama", $dataParse);

        $dataParse["ktp"] = $this->toArray2($data, "ktp"); 
        $this->add("ktp", $dataParse);

        $dataParse["tmp_lahir"] = $this->toArray2($data, "tempatlahir"); 
        $this->add("tmp_lahir", $dataParse);

        $dataParse["tgl_lahir"] = $this->toArray2($data, "tgllahir"); 
        $this->add("tgl_lahir", $dataParse);

        $dataParse["jk"] = $this->toArray2($data, "jk"); 
        $this->add("jk", $dataParse);

        $dataParse["tmp_tgl"] = $this->toArray2($data, "alamat"); 
        $this->add("tmp_tgl", $dataParse);

        $dataParse["kota"] = $this->toArray2($data, "kab"); 
        $this->add("kota", $dataParse);

        $dataParse["prov"] = $this->toArray2($data, "prov"); 
        $this->add("prov", $dataParse);

        $dataParse["telp"] = $this->toArray2($data, "notelp"); 
        $this->add("telp", $dataParse);

        $dataParse["ulang"] = $this->toArray2($data, "ket"); 
        $this->add("ulang", $dataParse);

        $dataParse["email"] = $this->toArray2($data, "email"); 
        $this->add("email", $dataParse);

        $dataParse["pendidikan"] = $this->toArray2($data, "pendidikan"); 
        $this->add("pendidikan", $dataParse);

        $dataParse["pekerjaan"] = $this->toArray2($data, "pekerjaan"); 
        $this->add("pekerjaan", $dataParse);

        $dataParse["skema"] = $this->toArray2($data, "skema"); 
        $this->add("skema", $dataParse);

        $dataParse["negara"] = $this->toArray2($data, "negara"); 
        $this->add("negara", $dataParse);

        $dataParse["bhs"] = $this->toArray2($data, "bhs"); 
        $this->add("bhs", $dataParse);

        $dataParse["blk"] = $this->toArray2($data, "blk"); 
        $this->add("blk", $dataParse);

        $dataParse["lokasi"] = $this->toArray2($data, "tmp_uji"); 
        $this->add("lokasi", $dataParse);

        $dataParse["foto"] = $this->toArray2($data, "foto"); 
        $this->add("foto", $dataParse);
        
        $this->single("tujk", isset($this->toArray2($data, "tgl_ujk")[0]) ? 
        $this->ubahFormatTanggal(date('d-m-Y', strtotime($this->toArray2($data, "tgl_ujk")[0] )))
         : "" );

        $out = 'files/xls_tmp/ujk-'.(isset($this->toArray2($data, "tgl_ujk")[0]) ? 
        $this->ubahFormatTanggal(date('d-m-Y', strtotime($this->toArray2($data, "tgl_ujk")[0] )))
         : "").'.xlsx';

         
        $GLOBALS['fotos'] = $this->toArray2($data, "foto");

        $params = $this->get();

        $events = [
            PhpExcelTemplator::AFTER_INSERT_PARAMS => function(Worksheet $sheet, array $templateVarsArr) {
                $imageVarCol = null;
                $imageVarColIndex = null;
                $imageVarRow = null;
                foreach ($templateVarsArr as $rowKey => $row) {
                    foreach ($row as $colKey => $colContent) {
                        if ($colContent == '[foto]') {
                            $imageVarColIndex = $colKey + 1;
                            $imageVarRow = $rowKey + 1;
                            $imageVarCol = Coordinate::stringFromColumnIndex($imageVarColIndex);
                        }
                    }
                }
                $col_width = $sheet->getColumnDimension($imageVarCol)->getWidth();
                $i = 0;
                foreach($GLOBALS['fotos'] as $img){

                    $colIndex = $imageVarColIndex + $i;
                    $coordinate = 'R' . ($imageVarRow + $i);
                    $drawing = new Drawing();
                    // echo 'assets/uploads/' . $img;
                    $drawing->setPath('assets/uploads/' . $img);
                    $drawing->setCoordinates($coordinate);
                    $drawing->setWorksheet($sheet);
                    $drawing->setHeight(143);
                    // The templator copy style of cell, but not width. Let's make it manually
                    $sheet->getColumnDimension(Coordinate::stringFromColumnIndex($colIndex))->setWidth($col_width);
                    // Clear cell, which must contain just an image
                    $sheet->getCell($coordinate)->setValue(null);
                    $i++;
                }
                // die();
            },
        ];
        // var_dump($dataParse["foto"]);
        PhpExcelTemplator::outputToFile($tmp, $out, $params, [], $events);

    }
}
