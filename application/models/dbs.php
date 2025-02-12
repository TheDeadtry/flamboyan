<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbs extends CI_Model {
    function __construct(){
		parent::__construct();
	}

    private function db(){
        return $this->db;
    } 

    public static function load($query=""){
        $data = (new self)->db();
        $cond = mysqli_connect($data->hostname, $data->username, $data->password, $data->database);
        return mysqli_query($cond, $query);
    }

    public static function getSektor($idbiodata=""){
        if(isset($idbiodata) && $idbiodata && $idbiodata != ""){
            return str_replace(" ","", explode("-",$idbiodata)[0]);
        }else{
            return null;
        }
    }

}