<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailupload extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailupload');	
			$this->load->library('form_validation');
		
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
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){
				$data['detailpersonalid'] = $this->session->userdata("detailuser");		
				$data['tampil_data_personal'] = $this->M_detailupload->tampil_data_personal($this->session->userdata("detailuser"));
				
			//user sudah login
				$data['namamodule'] = "detailupload";
				$data['namafileview'] = "detailupload";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){

				$data['detailpersonalid'] = $this->session->userdata("detailuser");		
				$data['tampil_data_personal'] = $this->M_detailupload->tampil_data_personal($this->session->userdata("detailuser"));
				
				$data['namamodule'] = "detailupload";
				$data['namafileview'] = "detailuploaddokumen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

		
}