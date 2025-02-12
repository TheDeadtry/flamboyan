<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Logout extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');			
	}
	
	function index(){
		$this->M_session->destroy_session();
		
		    $data['namamodule'] = "login";
            $data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
	}
	
}
?>