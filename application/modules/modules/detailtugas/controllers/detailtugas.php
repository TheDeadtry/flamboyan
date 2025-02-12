<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailtugas extends MX_Controller {
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailtugas');	
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
				$data['hitungtugas'] = $this->M_detailtugas->hitung_data_tugas($this->session->userdata("detailuser"));
				$data['tugas'] = $this->M_detailtugas->tampil_data_tugas($this->session->userdata("detailuser"));
								$data['tampil_data_personal'] = $this->M_detailtugas->tampil_data_personal($this->session->userdata("detailuser"));

				$data['namamodule'] = "detailtugas";
				$data['namafileview'] = "detailtugas";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function update_tugas() {
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
				$data['tugas'] = $this->M_detailtugas->tampil_data_tugas($this->session->userdata("detailuser"));
								$data['tampil_data_personal'] = $this->M_detailtugas->tampil_data_personal($this->session->userdata("detailuser"));

				$data['namamodule'] = "detailtugas";
				$data['namafileview'] = "updatetugas";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function tambah_tugas() {
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
				$data['tugas'] = $this->M_detailtugas->tampil_data_tugas($this->session->userdata("detailuser"));
								$data['tampil_data_personal'] = $this->M_detailtugas->tampil_data_personal($this->session->userdata("detailuser"));

				$data['namamodule'] = "detailtugas";
				$data['namafileview'] = "tambahtugas";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function updatetugas() {
		$this->M_detailtugas->update_tugas();
		redirect('detailtugas');
	}

	function tambahtugas() {
		$this->M_detailtugas->tambah_tugas();
		redirect('detailtugas');
	}
}
?>