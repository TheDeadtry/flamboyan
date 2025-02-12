<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Markvisa extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_markvisa');	
			$this->load->library('form_validation');
	}
	
	function tampilkocokan() {
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
				$data['tampil_data_personal'] = $this->M_markvisa->tampil_data_personal($idnya);
				$data['tampil_data_markvisa'] = $this->M_markvisa->tampil_data_markvisa($idnya);
				$data['keterangan'] = "kocokan";
				$data['namamodule'] = "markvisa";
				$data['namafileview'] = "markvisa";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function tampilfp() {
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
				$data['tampil_data_personal'] = $this->M_markvisa->tampil_data_personal($idnya);
				$data['tampil_data_markvisa'] = $this->M_markvisa->tampil_data_markvisa($idnya);
				$data['keterangan'] = "fp";
				$data['namamodule'] = "markvisa";
				$data['namafileview'] = "markvisa";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function tampilvisa() {
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
				$data['tampil_data_personal'] = $this->M_markvisa->tampil_data_personal($idnya);
				$data['tampil_data_markvisa'] = $this->M_markvisa->tampil_data_markvisa($idnya);
				$data['keterangan'] = "visa";
				$data['namamodule'] = "markvisa";
				$data['namafileview'] = "markvisa";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function tampilpap() {
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
				$data['tampil_data_personal'] = $this->M_markvisa->tampil_data_personal($idnya);
				$data['tampil_data_markvisa'] = $this->M_markvisa->tampil_data_markvisa($idnya);
				$data['keterangan'] = "pap";
				$data['namamodule'] = "markvisa";
				$data['namafileview'] = "markvisa";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function updatekocokan() {
		$this->M_markvisa->update_kocokan();
		redirect('markvisa/tampilkocokan');
	}

	function updatefingerprint() {
		$this->M_markvisa->update_fingerprint();
		redirect('markvisa/tampilfp');
	}

	function updatevisa() {
		$this->M_markvisa->update_visa();
		redirect('markvisa/tampilvisa');
	}

	function updatepap() {
		$this->M_markvisa->update_pap();
		redirect('markvisa/tampilpap');
	}

	function updatedokfingerprint() {
		$this->M_markvisa->update_dokfp();
		redirect('markvisa/tampilfp');
	}

	function updatedokvisa() {
		$this->M_markvisa->update_dokvisa();
		redirect('markvisa/tampilvisa');
	}

	function updatedokpap() {
		$this->M_markvisa->update_dokpap();
		redirect('markvisa/tampilpap');
	}
}