<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class view_finger extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		}		
		if ($id_user && $status!=2){
			redirect('dashboard');
		}					
	}
	
	function index(){

		$data['finger'] = $this->M_session->select("SELECT * FROM datafinger");

		$data['namamodule'] = "view_finger";
		$data['namafileview'] = "view_finger";
		echo Modules::run('template/blk_template', $data); 
	}

}