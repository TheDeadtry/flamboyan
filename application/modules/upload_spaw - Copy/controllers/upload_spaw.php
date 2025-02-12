<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Upload_spaw extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_spaw');			
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
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_spaw->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_spaw'] = $this->M_upload_spaw->tampil_data_spaw($detailidnya);
				$data['namamodule'] = "upload_spaw";
				$data['namafileview'] = "spawadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_spaw->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_spaw'] = $this->M_upload_spaw->tampil_data_spaw($detailidnya);
				$data['namamodule'] = "upload_spaw";
				$data['namafileview'] = "spawadmin";
				echo Modules::run('template/admin_template', $data);
			}
		}	 
	}

	function simpan_data_spaw(){
		
		$this->M_upload_spaw->simpan_data_spaw();

		redirect('upload_spaw');
	}

	function update_data_spaw() {
			$this->M_upload_spaw->update_data_spaw();
			redirect('upload_spaw');
	}

	function hapus_data_spaw() {
		$this->M_upload_spaw->hapus_data_spaw();
		redirect('upload_spaw');
	}
}