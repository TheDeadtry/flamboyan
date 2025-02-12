<?php
class Modelku extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function query( $table = '', $data = '*', $where = ''){

        

        $data = $this->db->query("SELECT $data FROM $table $where ")->result();
        return $data;
    }


    function ambildatamod($key, $diminta, $dari, $selector, $kode){
        $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."'")->row();
        $dikirim = isset($data->$diminta);
        if ($dikirim == 1) {
            $paket = $data->$diminta;
        }else{
            $paket = "";
        }
        return $paket;
    }
}