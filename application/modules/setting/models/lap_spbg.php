<?php
class Lap_spbg extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
		$data['namamodule'] = "setting";
		$data['namafileview'] = "lap/spbg";
		echo Modules::run('template/admin_template', $data);
    }
 
}
?>