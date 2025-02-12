<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Detailkettugas extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		$this->load->model('M_detailkettugas');	
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
			if ($id_user && $status == 1) {
				//user sudah login
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['hitungkettugas'] = $this->M_detailkettugas->hitung_data_kettugas($this->session->userdata("detailuser"));
				$data['kettugas'] = $this->M_detailkettugas->tampil_data_kettugas($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailkettugas->tampil_data_personal($this->session->userdata("detailuser"));

				$data['namamodule'] = "detailkettugas";
				$data['namafileview'] = "detailkettugas";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}
	
	// function update_kettugas() {
	// 	$session = $this->M_session->get_session();
	// 	if (!$session['session_userid'] && !$session['session_status']){
	// 		//user belum login
	// 		$data['namamodule'] = "login";
	// 		$data['namafileview'] = "login";
	// 		echo Modules::run('template/login_template', $data);
	// 	} else {
	// 		$id_user = $session['session_userid'];
	// 		$status = $session['session_status'];
	// 		//user sudah login
	// 		if ($id_user && $status == 1) {
	// 			$data['detailpersonalid'] = $this->session->userdata("detailuser");
	// 			$data['kettugas'] = $this->M_detailkettugas->tampil_data_kettugas($this->session->userdata("detailuser"));
	// 							$data['tampil_data_personal'] = $this->M_detailkettugas->tampil_data_personal($this->session->userdata("detailuser"));

	// 			$data['namamodule'] = "detailkettugas";
	// 			$data['namafileview'] = "updatekettugas";
	// 			echo Modules::run('template/admin_template', $data);
	// 		} 
	// 	}
	// }

	// function tambah_kettugas() {
	// 	$session = $this->M_session->get_session();
	// 	if (!$session['session_userid'] && !$session['session_status']){
	// 		//user belum login
	// 		$data['namamodule'] = "login";
	// 		$data['namafileview'] = "login";
	// 		echo Modules::run('template/login_template', $data);
	// 	} else {
	// 		$id_user = $session['session_userid'];
	// 		$status = $session['session_status'];
	// 		//user sudah login
	// 		if ($id_user && $status == 1) {
	// 			$data['detailpersonalid'] = $this->session->userdata("detailuser");
	// 			$data['kettugas'] = $this->M_detailkettugas->tampil_data_kettugas($this->session->userdata("detailuser"));
	// 							$data['tampil_data_personal'] = $this->M_detailkettugas->tampil_data_personal($this->session->userdata("detailuser"));

	// 			$data['namamodule'] = "detailkettugas";
	// 			$data['namafileview'] = "tambahkettugas";
	// 			echo Modules::run('template/admin_template', $data);
	// 		} 
	// 	}
	// }
	
	function updatekettugas() {
		$this->M_detailkettugas->update_kettugas();
		redirect('detailkettugas');
	}

	function tambahkettugas() {
		$this->M_detailkettugas->tambah_kettugas();
		redirect('detailkettugas');
	}
}