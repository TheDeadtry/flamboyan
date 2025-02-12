<?php
class Personal extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function document($doc=null, $id="", $sektor=""){
        ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
        if($doc){
            $personal = $this->db->query("SELECT * FROM personal WHERE id_biodata = '$id'")->row();
            // alamat ktp
            $doc->setValue('nama', $personal ? $personal->nama : "");
            $doc->setValue('jurusan', $personal && $personal->jurusan ? $personal->jurusan : "...");
            
            if($sektor == "HM" || $sektor == "HF"){
                $doc->setValue('tgl', $personal && $personal->tglinput ? explode("-",$personal->tglinput)[2] : "...");
                $doc->setValue('bln', $personal && $personal->tglinput ? explode("-",$personal->tglinput)[1] : "...");
                $doc->setValue('thn', $personal && $personal->tglinput ? explode("-",$personal->tglinput)[0] : "...");
            }
            
        }
    }

}
?>