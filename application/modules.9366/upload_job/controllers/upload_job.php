<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_job extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_job');			
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
				$data['tampil_data_personal'] = $this->M_upload_job->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_job'] = $this->M_upload_job->tampil_data_job($detailidnya);
				$data['hitungan'] = $this->M_upload_job->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_job->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_job";
				$data['namafileview'] = "jobadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_job->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_job'] = $this->M_upload_job->tampil_data_job($detailidnya);
				$data['namamodule'] = "upload_job";
				$data['namafileview'] = "jobadmin";
				echo Modules::run('template/job_template', $data);
			}
		}	 
	}

	function simpan_data_job(){
		
		$this->M_upload_job->simpan_data_job();

		redirect('upload_job');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_job";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_job->simpan_foto_job($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_job->hapus_foto_job();
	}


	function update_data_job() {
			$this->M_upload_job->update_data_job();
			redirect('upload_job');
	}

	function hapus_data_job() {
		$this->M_upload_job->hapus_data_job();
		redirect('upload_job');
	}
}