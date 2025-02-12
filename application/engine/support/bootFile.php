<?php

class file
{
    private static $root_path;
    public static function init($root_path) {
        static::$root_path = $root_path
    }
    public static function root_path($path) {
        return static::$root_path.$path
    }
    public static function read($path = "") {
        $path = root_path($path);
        if(!file_exists($path))
        {
            return null;
        }
        $myfile = fopen($path, "r") or die("Unable to open file!");
        $er = fread($myfile,filesize($path));
        fclose($myfile);
        return $er;
    }
    public static function write($path = '', $data = '') {
        $path = root_path($path);
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = $data;
        fwrite($myfile, $txt);
        fclose($myfile);
    }

}