<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use PhpOffice\PhpSpreadsheet\IOFactory;

require "library_php/vendor/autoload.php";

class excellap extends MX_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('M_param');
    }

    private function toArray2($data = null, $name = ""){
        $new = [];
        $start = 5;
        foreach ($data as $key => $n) {
            $e = ( array ) $n;
            $new[] = str_replace("{no}",$start+$key, $e[$name]);
        }
        return $new;
    }

    public function spbg_accurate(){
        // ini_set('display_errors', 1);
        // error_reporting(E_ALL);
        
        try {
            $file = 'excel/output.xlsx';
            $filex = 'excel/spbg_accurate.xlsx';
            define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);

            // $qr = "";

            // $data = DB::query_result_object($qr);
            
            $dataParse = [];
            $newPar = new M_param();

            // $dataParse[ 'no' ] = $this->toArray2($data, 'no'); 
            // $newPar->add( 'no' , $dataParse);
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