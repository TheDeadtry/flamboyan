<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Tmp extends CI_Model {
    
    private $arr;
    private $start;
    private $filex;
    private $export;
    
    function __construct($start = 4, $temp="", $export=""){
        if(!defined('SPECIAL_ARRAY_TYPE')){
            define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
        }
		parent::__construct();
		$this->filex = $temp;
		$this->export = $export;
        $this->start = $start;
        $this->arr = [];
	}
	
	private function toArray2($data = null, $name = ""){
        $new = [];
        $start = $this->start;
        foreach ($data as $key => $n) {
            $e = ( array ) $n;
            $new[] = str_replace("{no}",$start+$key, $e[$name]);
        }
        return $new;
    }
	
	private function add($sheet = 0,  $name = "", $akun = []){
	    if(!isset($this->arr[$sheet])){
	        $this->arr[$sheet] = [];
	    }
        $this->arr[$sheet]["[".$name."]"] = new ExcelParam(SPECIAL_ARRAY_TYPE, $akun[$name]);
        return $this;
    }
    
    private function single($sheet=0, $name = "", $val = ''){
        if(!isset($this->arr[$sheet])){
	        $this->arr[$sheet] = [];
	    }
        $this->arr[$sheet]["{".$name."}"] = $val;
        return $this;
    }

    public function excel($data = [], $config = []){
        require_once 'newvendor/vendor/autoload.php';
        $spreadsheet = IOFactory::load($this->filex);
        $dataParse = [];
        $sheet = [];
        $thempvar = [];
        $callbacks = [];
        $events = [];
        foreach ($config as $key => $conf){
            if(!isset($dataParse[$key])){
                $dataParse[$key] = [];
            }
            foreach ($conf as $confsecond){
                if( isset($confsecond['type']) && $confsecond['type'] == 'single' ){
                    $this->single($key, $confsecond['name'], isset($confsecond['value'])?$confsecond['value']:"");
                }else{
                    $dataParse[$key][$confsecond['name']] = $this->toArray2($data[$key], $confsecond['name']); 
                    $this->add($key, $confsecond['name'], $dataParse[$key]);
                }
            }
            $sheet[$key] = $spreadsheet->getSheet($key);
            $thempvar[$key] = $spreadsheet->getSheet($key)->toArray();
            PhpExcelTemplator::renderWorksheet(
                $sheet[$key]
                , $thempvar[$key]
                , $this->arr[$key]
                , $callbacks
                , $events
            );
        }
        PhpExcelTemplator::outputSpreadsheetToFile($spreadsheet, $this->export);
    }
}