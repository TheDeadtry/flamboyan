<?php

    function file_read($path = "") {
        if(!file_exists($path))
        {
            return null;
        }
        $myfile = fopen($path, "r") or die("Unable to open file!");
        $er = fread($myfile,filesize($path));
        fclose($myfile);
        return $er;
    }
    function file_write($path = '', $data = '') {
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = $data;
        fwrite($myfile, $txt);
        fclose($myfile);
    }
