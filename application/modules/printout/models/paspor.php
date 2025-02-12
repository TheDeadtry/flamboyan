<?php
class Paspor extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function document($doc=null, $id="", $sektor=""){
        ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
        if($doc){
            $paspor = $this->db->query("SELECT * FROM paspor WHERE id_biodata = '$id'")->row();
            // alamat ktp
            $doc->setValue('paspor', $paspor ? $paspor->nopaspor : "");
            
        }
    }

}
?>