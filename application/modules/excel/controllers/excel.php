<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use PhpOffice\PhpSpreadsheet\IOFactory;

require "library_php/vendor/autoload.php";

class excel extends MX_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('Param');	
    }

    private function toArray2($data = null, $name = ""){
        $new = [];
        $start = 10;
        foreach ($data as $key => $n) {
            $e = ( array ) $n;
            $new[] = str_replace("{no}",$start+$key, $e[$name]);
        }
        return $new;
    }

    function exist($dataArray, $property, $value) {
        foreach ($dataArray as $item) {
            if (isset($item[$property]) && $item[$property] === $value) {
                return true;
            }
        }
        return false;
    }

    public function transformArray($dataArray, $groupKeys, $transformKeys) {
        $result = [];

        $group = [];
        foreach ($dataArray as $key => $value) {
            $value = (array) $value;
            if($this->exist($group, $groupKeys, $value[$groupKeys]) === false){
                $group[] = [
                    $groupKeys => $value[$groupKeys]
                ];
            }
        }
        return $group;
    }

    public function do(){
        echo "ok";
    }

    public function spbg_accurate($start="", $end=""){
        try {
            $file = 'excel/output.xlsx';
            $filex = 'excel/spbg_accurate.xlsx';
            define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);

            $qr = "
            SELECT 
 '={no} - 9' no,
 '=sum(H{no}:P{no})' spbg,
 c.tanggal tgl_slip,
 c.data_tki id_biodata,
 p.nama,
 dp.nopaspor,
 (SELECT max(IF(kode = 'PEMERIKSAAN KESEHATAN', nilai, 0)) FROM spbg_master) pemeriksaan,
 (SELECT max(IF(kode = 'PEMERIKSAAN PSIKOLOGI', nilai, 0)) FROM spbg_master) pemeriksaan_psikolog,
 (SELECT max(IF(kode = 'VISA KERJA', nilai, 0)) FROM spbg_master) visa,
 (SELECT max(IF(kode = 'BPJS KETENAGAKERJAAN', nilai, 0)) FROM spbg_master) bpjs,
 (SELECT max(IF(kode = 'SKCK', nilai, 0)) FROM spbg_master) skck,
 IF(s.propinsi_tipe IS NOT NULL, (SELECT max(IF(kode = 'TRANSPORT JAWA', nilai, 0)) FROM spbg_master), '-') trans_jawa,
 IF(s.propinsi_tipe IS NOT NULL, (SELECT max(IF(kode = 'TRANSPORT LUAR JAWA', nilai, 0)) FROM spbg_master), '-') trans_luar,
 (SELECT max(IF(kode = 'TIKET KEBERANGKATAN', nilai, 0)) FROM spbg_master) tiket,
 (SELECT max(IF(kode = (IF(ds.`status` = 'formal','JASA PERUSAHAAN FORMAL','JASA PERUSAHAAN INFORMAL')), nilai, 0)) FROM spbg_master) jasa,
 SUBSTRING_INDEX(c.data_tki,\"-\",1) sektor
  , ds.`status`
FROM
  spbg_print_accurate c 
  LEFT JOIN personal_nama p ON c.data_tki = p.id_biodata
  LEFT JOIN data_paspor dp ON c.data_tki = dp.id_biodata
  LEFT JOIN asal_tki s ON c.data_tki = s.id_biodata
  LEFT JOIN datasektor ds ON SUBSTRING_INDEX(c.data_tki,\"-\",1) = ds.kode_jenis
            
            
            WHERE
            c.tanggal BETWEEN '$start' 
            AND ' $end'
            ";

            $data = $this->db->query($qr)->result();
            
            $dataParse = [];
            $newPar = new Param();

            $dataobject = [
               (object) [
                    "no" => 1,
                ]
               ,(object) [
                    "no" => 2,
                ]
            ];

            $dataParse[ 'no' ] = $this->toArray2($data, 'no'); 
            $newPar->add( 'no' , $dataParse);

            $dataParse[ 'tgl_slip' ] = $this->toArray2($data, 'tgl_slip'); 
            $newPar->add( 'tgl_slip' , $dataParse);

            $dataParse[ 'id_biodata' ] = $this->toArray2($data, 'id_biodata'); 
            $newPar->add( 'id_biodata' , $dataParse);

            $dataParse[ 'nama' ] = $this->toArray2($data, 'nama'); 
            $newPar->add( 'nama' , $dataParse);

            $dataParse[ 'nopaspor' ] = $this->toArray2($data, 'nopaspor'); 
            $newPar->add( 'nopaspor' , $dataParse);

            $dataParse[ 'pemeriksaan' ] = $this->toArray2($data, 'pemeriksaan'); 
            $newPar->add( 'pemeriksaan' , $dataParse);

            $dataParse[ 'pemeriksaan_psikolog' ] = $this->toArray2($data, 'pemeriksaan_psikolog'); 
            $newPar->add( 'pemeriksaan_psikolog' , $dataParse);

            $dataParse[ 'visa' ] = $this->toArray2($data, 'visa'); 
            $newPar->add( 'visa' , $dataParse);

            $dataParse[ 'bpjs' ] = $this->toArray2($data, 'bpjs'); 
            $newPar->add( 'bpjs' , $dataParse);

            $dataParse[ 'skck' ] = $this->toArray2($data, 'skck'); 
            $newPar->add( 'skck' , $dataParse);

            $dataParse[ 'tiket' ] = $this->toArray2($data, 'tiket'); 
            $newPar->add( 'tiket' , $dataParse);

            $dataParse[ 'jasa' ] = $this->toArray2($data, 'jasa'); 
            $newPar->add( 'jasa' , $dataParse);

            $dataParse[ 'trans_jawa' ] = $this->toArray2($data, 'trans_jawa'); 
            $newPar->add( 'trans_jawa' , $dataParse);

            $dataParse[ 'trans_luar' ] = $this->toArray2($data, 'trans_luar'); 
            $newPar->add( 'trans_luar' , $dataParse);

            $dataParse[ 'spbg' ] = $this->toArray2($data, 'spbg'); 
            $newPar->add( 'spbg' , $dataParse);

            $newPar->single( 'tahun' , date('Y'));

            $params = $newPar->get();
            $callbacks = [];
            
            if (!file_exists($filex)) {
                throw new Exception("Template file not found: " . $filex);
            }
            
            PhpExcelTemplator::outputToFile($filex, $file, $params, $callbacks);
            
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}