<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Markmed extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_markmed');	
			$this->load->library('form_validation');
	}
	
	function tampillegalitas() {
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
				$data['tampil_data_personal'] = $this->M_markmed->tampil_data_personal($idnya);
				$data['tampil_data_markmed'] = $this->M_markmed->tampil_data_markmed($idnya);
				$data['keterangan'] = "legalitas";
				$data['namamodule'] = "markmed";
				$data['namafileview'] = "markmed";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function tampilnotaris() {
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
				$data['tampil_data_personal'] = $this->M_markmed->tampil_data_personal($idnya);
				$data['tampil_data_markmed'] = $this->M_markmed->tampil_data_markmed($idnya);
				$data['keterangan'] = "notaris";
				$data['namamodule'] = "markmed";
				$data['namafileview'] = "markmed";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}
	
	function tampilpramed() {
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
				$data['tampil_data_personal'] = $this->M_markmed->tampil_data_personal($idnya);
				$data['tampil_data_markmed'] = $this->M_markmed->tampil_data_markmed($idnya);
				$data['keterangan'] = "pramed";
				$data['namamodule'] = "markmed";
				$data['namafileview'] = "markmed";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}
	
	function tampilsambungmed() {
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
				$data['tampil_data_personal'] = $this->M_markmed->tampil_data_personal($idnya);
				$data['tampil_data_markmed'] = $this->M_markmed->tampil_data_markmed($idnya);
				$data['keterangan'] = "sambungmed";
				$data['namamodule'] = "markmed";
				$data['namafileview'] = "markmed";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}
	
	function tampilmurni() {
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
				$data['tampil_data_personal'] = $this->M_markmed->tampil_data_personal($idnya);
				$data['tampil_data_markmed'] = $this->M_markmed->tampil_data_markmed($idnya);
				$data['keterangan'] = "murni";
				$data['namamodule'] = "markmed";
				$data['namafileview'] = "markmed";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}
	
	function tampilpaspor() {
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
				$data['tampil_data_personal'] = $this->M_markmed->tampil_data_personal($idnya);
				$data['tampil_data_markmed'] = $this->M_markmed->tampil_data_markmed($idnya);
				$data['keterangan'] = "paspor";
				$data['namamodule'] = "markmed";
				$data['namafileview'] = "markmed";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function tampilskck() {
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
				$data['tampil_data_personal'] = $this->M_markmed->tampil_data_personal($idnya);
				$data['tampil_data_markmed'] = $this->M_markmed->tampil_data_markmed($idnya);
				$data['keterangan'] = "skck";
				$data['namamodule'] = "markmed";
				$data['namafileview'] = "markmed";
				echo Modules::run('template/admin_template', $data);
			} 
		}
	}

	function updatelegal() {
		$this->M_markmed->update_legal();
		redirect('markmed/tampillegalitas');
	}

	function updatenota() {
		$this->M_markmed->update_nota();
		redirect('markmed/tampilprarot');
	}

	function updatepram() {
		$this->M_markmed->update_pram();
		redirect('markmed/tampilpramed');
	}

	function updatesamm() {
		$this->M_markmed->update_samm();
		redirect('markmed/tampilsambungmed');
	}

	function updatemurm() {
		$this->M_markmed->update_murm();
		redirect('markmed/tampilmurni');
	}

	function updatepaspor() {
		$this->M_markmed->update_paspor();
		redirect('markmed/tampilpaspor');
	}

	function updateskck() {
		$this->M_markmed->update_skck();
		redirect('markmed/tampilskck');
	}

	function updatemedikal1() {
		$this->M_markmed->update_medikal1();
		redirect('markmed/tampilpramed');
	}

	function updatemedikal2() {
		$this->M_markmed->update_medikal2();
		redirect('markmed/tampilsambungmed');
	}

	function updatemedikal3() {
		$this->M_markmed->update_medikal3();
		redirect('markmed/tampilmurni');
	}

	function updatedokpas() {
		$this->M_markmed->update_dokpas();
		redirect('markmed/tampilpaspor');
	}

	function updatedokskck() {
		$this->M_markmed->update_dokskck();
		redirect('markmed/tampilskck');
	}
}