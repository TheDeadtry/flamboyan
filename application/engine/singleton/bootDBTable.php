<?php

class tableParser {
    private $page;
    private $js;
    public function __construct($appurl,$filepath) {
        $this->appurl = $appurl;
        $this->filepath = $filepath;
    }
    function run() {
        $this->findTRFiles($this->filepath.'gear/tables');
    }
    private function findTRFiles($dir) {
        foreach(scandir($dir) as $filename) {
            if ($filename[0] === '.') continue;
            $result = $dir . '/' . $filename;
            $this->parseData($result);
        }
    }
    private function parseData($res) {
        //$content = file_read($res);
        $file = fopen($res,"r");
        while(! feof($file)) {
            $e = fgets($file);
            $f = explode(" ",$e);
            if (count($f) >= 1) {
                $f[0]
            }
            print_r($f);
        }
        fclose($file);
    }
}
class DBR {
    static $table1;
    static $table2;
    static function t($a) {
        static::$table1 = $a;
        return new static;
    }
    static function toOne($a) {
        static::$table2 = $a;
        static::get('one');
    }
    static function toMany($a) {
        return new static;
    }
    static function get($type) {
        
    }
}
?>