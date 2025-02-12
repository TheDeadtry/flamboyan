<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Blk_search extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');		
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
			$data['namamodule'] = "blk_search";
			$data['namafileview'] = "index";
			echo Modules::run('template/blk_template', $data); 
		}	 
	}
	
}