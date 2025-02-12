<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Upload_desuhan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_desuhan');			
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
				$data['tampil_data_desuhan'] = $this->M_upload_desuhan->tampil_data_desuhan($this->session->userdata("detailuser"));
				$data['namamodule'] = "upload_desuhan";
				$data['namafileview'] = "desuhanadminpersonal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_desuhan'] = $this->M_upload_desuhan->tampil_data_desuhan($this->session->userdata("detailuser"));
				$data['namamodule'] = "upload_desuhan";
				$data['namafileview'] = "desuhanadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

		function desuhanadminpersonal($idsuhan){
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
				$data['tampil_data_desuhan'] = $this->M_upload_desuhan->tampil_data_desuhan($idsuhan);
				$data['idsuhan'] = $idsuhan;
				$data['namamodule'] = "upload_desuhan";
				$data['namafileview'] = "desuhanadminpersonal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['tampil_data_desuhan'] = $this->M_upload_desuhan->tampil_data_desuhan($idagen);
				$data['namamodule'] = "upload_desuhan";
				$data['namafileview'] = "desuhanadminpersonal";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_desuhan($idsuhan){
		
		$this->M_upload_desuhan->simpan_data_desuhan();

		redirect('upload_desuhan/desuhanadminpersonal/'.$idsuhan);
	}

	function update_data_desuhan($idsuhan) {
			$this->M_upload_desuhan->update_data_desuhan();
			redirect('upload_desuhan/desuhanadminpersonal/'.$idsuhan);
	}

	function hapus_data_desuhan($idsuhan) {
		$this->M_upload_desuhan->hapus_data_desuhan();
		redirect('upload_desuhan/desuhanadminpersonal/'.$idsuhan);
	}
}