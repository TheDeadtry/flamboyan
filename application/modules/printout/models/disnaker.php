<?php
class Disnaker extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function document($doc=null, $id="", $sektor=""){
        ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
        if($doc){
            $disnaker = $this->db->query("SELECT * FROM disnaker WHERE id_biodata = '$id'")->row();
            // alamat ktp
            $doc->setValue('alamat_ktp', $disnaker ? $disnaker->alamat : "");
            // if($sektor == 'HM'){
            //     die();
            // }
        }
    }

}
?>