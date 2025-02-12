<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Markonline extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_markonline');	
			$this->load->library('form_validation');
	}

	function tampildokrumah() {
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
				$idnya = $this->session->userdata("detailuser");
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				//$data['stts'] = $this->session->userdata("status");
				$data['tampil_data_personal'] = $this->M_markonline->tampil_data_personal($idnya);
				$data['tampil_data_markonline'] = $this->M_markonline->tampil_data_markonline($idnya);
				$data['hitung_markonline'] = $this->M_markonline->hitung_data_markonline($idnya);
				$data['keterangan'] = "dokrumah";
				$data['namamodule'] = "markonline";
				$data['namafileview'] = "markonline";
				echo Modules::run('template/admin_template', $data);
			} else if ($id_user && $status == 2) {	
				$data['namamodule'] = "markonline";
				$data['namafileview'] = "markonline";
				echo Modules::run('template/agen_template', $data); 
			}
		}	
	}

	function tampildoksurat() {
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
				$idnya = $this->session->userdata("detailuser");
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				//$data['stts'] = $this->session->userdata("status");
				$data['tampil_data_personal'] = $this->M_markonline->tampil_data_personal($idnya);
				$data['tampil_data_markonline'] = $this->M_markonline->tampil_data_markonline($idnya);
				$data['hitung_markonline'] = $this->M_markonline->hitung_data_markonline($idnya);
				$data['keterangan'] = "doksurat";
				$data['namamodule'] = "markonline";
				$data['namafileview'] = "markonline";
				echo Modules::run('template/admin_template', $data);
			} else if ($id_user && $status == 2) {	
				$data['namamodule'] = "markonline";
				$data['namafileview'] = "markonline";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}

	function tampildokrekom() {
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
				$idnya = $this->session->userdata("detailuser");
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				//$data['stts'] = $this->session->userdata("status");
				$data['tampil_data_personal'] = $this->M_markonline->tampil_data_personal($idnya);
				$data['tampil_data_markonline'] = $this->M_markonline->tampil_data_markonline($idnya);
				$data['hitung_markonline'] = $this->M_markonline->hitung_data_markonline($idnya);
				$data['keterangan'] = "rekom";
				$data['namamodule'] = "markonline";
				$data['namafileview'] = "markonline";
				echo Modules::run('template/admin_template', $data);
			} else if ($id_user && $status == 2) {	
				$data['namamodule'] = "markonline";
				$data['namafileview'] = "markonline";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}

	function updatedokrumah() {
		$this->M_markonline->update_dokrumah();
		redirect('markonline/tampildokrumah');
	}

	function updatesuratsk() {
		$this->M_markonline->update_suratsk();
		redirect('markonline/tampildoksurat');
	}

	function updaterekom() {
		$this->M_markonline->update_rekom();
		redirect('markonline/tampildokrekom');
	}

	function updatektp() {
		$this->M_markonline->update_ktp();
		redirect('markonline/tampildokrumah');
	}

	function updatekk() {
		$this->M_markonline->update_kk();
		redirect('markonline/tampildokrumah');
	}

	function updateijazah() {
		$this->M_markonline->update_ijazah();
		redirect('markonline/tampildokrumah');
	}

	function updatesi() {
		$this->M_markonline->update_si();
		redirect('markonline/tampildokrumah');
	}

	function updatesn() {
		$this->M_markonline->update_sn();
		redirect('markonline/tampildokrumah');
	}

	function updatearc() {
		$this->M_markonline->update_arc();
		redirect('markonline/tampildokrumah');
	}

	function updateasuransi() {
		$this->M_markonline->update_asuransi();
		redirect('markonline/tampildokrumah');
	}
}