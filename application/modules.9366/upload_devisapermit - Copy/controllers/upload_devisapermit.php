<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Upload_devisapermit extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_devisapermit');			
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
			//user sudah login
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_devisapermit'] = $this->M_upload_devisapermit->tampil_data_devisapermit($this->session->userdata("detailuser"));
				$data['namamodule'] = "upload_devisapermit";
				$data['namafileview'] = "devisapermitadminpersonal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_devisapermit'] = $this->M_upload_devisapermit->tampil_data_devisapermit($this->session->userdata("detailuser"));
				$data['namamodule'] = "upload_devisapermit";
				$data['namafileview'] = "devisapermitadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

		function devisapermitadminpersonal($idvisapermit){
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
			//user sudah login
				$data['tampil_data_devisapermit'] = $this->M_upload_devisapermit->tampil_data_devisapermit($idvisapermit);
				$data['idvisapermit'] = $idvisapermit;
				$data['namamodule'] = "upload_devisapermit";
				$data['namafileview'] = "devisapermitadminpersonal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['tampil_data_devisapermit'] = $this->M_upload_devisapermit->tampil_data_devisapermit($idagen);
				$data['namamodule'] = "upload_devisapermit";
				$data['namafileview'] = "devisapermitadminpersonal";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_devisapermit($idvisapermit){
		
		$this->M_upload_devisapermit->simpan_data_devisapermit();

		redirect('upload_devisapermit/devisapermitadminpersonal/'.$idvisapermit);
	}

	function update_data_devisapermit($idvisapermit) {
			$this->M_upload_devisapermit->update_data_devisapermit();
			redirect('upload_devisapermit/devisapermitadminpersonal/'.$idvisapermit);
	}

	function hapus_data_devisapermit($idvisapermit) {
		$this->M_upload_devisapermit->hapus_data_devisapermit();
		redirect('upload_devisapermit/devisapermitadminpersonal/'.$idvisapermit);
	}
}