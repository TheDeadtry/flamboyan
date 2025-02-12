<?php
class Modalku extends CI_Model {
    function __construct() {
        parent::__construct();
    }


function loadWord(){
    include_once 'gugus/phpword/PHPWord2.php';
    $PHPWord = new PHPWord2();
    return $PHPWord;
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

function buatarray($kode, $diminta, $dari, $key , $selector='id_biodata', $urutan = ''){
    $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."' ".$urutan."  ")->result();
    $array = array();
    if (isset($data)) {
        foreach ($data as $key => $dataarr) {
            $array[] = strtoupper($dataarr->$diminta);        
        }
    }else{
        $array[] = "";
    }

    return $array;  
}

function detail_gaji($kode, $diminta, $dari, $key ,$selector='id_biodata', $lanjutan = ""){
    $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."' ".$lanjutan." ")->result();
    $array = array();
    if (isset($data)) {
        foreach ($data as $key => $dataarr) {

            if ($dataarr->$diminta == '/bulan') {
                $mandarin = '/Bulan 月';
            }elseif ($dataarr->$diminta == '/minggu') {
                $mandarin = '/Minggu 週';
            }elseif ($dataarr->$diminta == '/hari') {
                $mandarin = '/Hari 這一天';
            }elseif ($dataarr->$diminta == '/perkiraan') {
                $mandarin = '/perkiraan 估計';
            }else{
                $mandarin = '';
            }

            $array[] = strtoupper($mandarin);        
        }
    }else{
        $array[] = "";
    }

    return $array;  
}

}