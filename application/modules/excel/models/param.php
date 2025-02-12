<?php
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;

require "library_php/vendor/autoload.php";

class Param {
    private $arr;
    public function __construct(Type $var = null) {
        $this->arr = [];
    }

    public function add($name = "", $akun){
        $this->arr["[".$name."]"] = new ExcelParam(SPECIAL_ARRAY_TYPE, $akun[$name]);
        return $this;
    }

    public function single($name = "", $val){
        $this->arr["{".$name."}"] = $val;
        return $this;
    }
    
    public function get(){
        return $this->arr;
    }

} 