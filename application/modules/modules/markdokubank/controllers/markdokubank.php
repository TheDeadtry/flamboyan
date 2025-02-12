<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class markdokubank extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_markdokubank');	
			$this->load->library('form_validation');
	}
	
	function index() {
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1) {
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$idnya = $this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_markdokubank->tampil_data_personal($idnya);
				$data['tampil_data_markdokubank'] = $this->M_markdokubank->tampil_data_markdokubank($idnya);
				$data['hitung_markdokubank'] = $this->M_markdokubank->hitung_data_markdokubank($idnya);
				$data['namamodule'] = "markdokubank";
				$data['namafileview'] = "markdokubank";
				echo Modules::run('template/admin_template', $data);
			} else if ($id_user && $status==2) {	
				$data['namamodule'] = "markdokubank";
				$data['namafileview'] = "markdokubank";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function update_markdokubank() {
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status == 1) {
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$idnya = $this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_markdokubank->tampil_data_personal($idnya);
				$data['tampil_data_markdokubank'] = $this->M_markdokubank->tampil_data_markdokubank($idnya);
				$data['namamodule'] = "markdokubank";
				$data['namafileview'] = "updatemarkdokubank";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function updatemarkdokubank() {
		$this->M_markdokubank->update_markdokubank();
		redirect('markdokubank');
	}

	function tambah_markdokubank() {
		$idnya = $this->session->userdata("detailuser");
		$this->M_markdokubank->tambah_markdokubank($idnya);
		redirect('markdokubank');
	}
}