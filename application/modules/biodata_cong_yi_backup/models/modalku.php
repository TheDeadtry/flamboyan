<?php
class Modalku extends CI_Model {
    function __construct() {
        parent::__construct();
    }



function ambildatarow($kode ,$dari, $selector='', $key=''){
	if ($selector != '') {
		$where = "WHERE ".$selector." = '".$key."'";
	}else{
		$where = "";
	}

	$data = $this->db->query("SELECT $kode FROM $dari $where")->row();
	return $data;
}

function ambildataresult($kode ,$dari, $selector='', $key=''){
	if ($selector != '') {
		$where = "WHERE ".$selector." = '".$key."'";
	}else{
		$where = "";
	}

	$data = $this->db->query("SELECT $kode FROM $dari $where")->result();
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