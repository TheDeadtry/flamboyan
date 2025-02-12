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

	function change() {
		$id = 'admin';
		$st = '1';
		$this->M_session->destroy_session();
		$this->M_session->store_session($id, $st);

		redirect('dashboard');
	}

	function change2() {
		$id = 'blk';
		$st = '2';
		$this->M_session->destroy_session();
		$this->M_session->store_session($id, $st);

		redirect('dashboard');
	}
	
}
?>