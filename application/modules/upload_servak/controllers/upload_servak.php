<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_servak extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_servak');			
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
				$data['tampil_data_personal'] = $this->M_upload_servak->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_servak'] = $this->M_upload_servak->tampil_data_servak($detailidnya);
				$data['hitungan'] = $this->M_upload_servak->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_servak->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_servak";
				$data['namafileview'] = "servakadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_servak->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_servak'] = $this->M_upload_servak->tampil_data_servak($detailidnya);
				$data['namamodule'] = "upload_servak";
				$data['namafileview'] = "servakadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_servak(){
		
		$this->M_upload_servak->simpan_data_servak();

		redirect('upload_servak');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_servak";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_servak->simpan_foto_servak($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_servak->hapus_foto_servak();
	}


	function update_data_servak() {
			$this->M_upload_servak->update_data_servak();
			redirect('upload_servak');
	}

	function hapus_data_servak() {
		$this->M_upload_servak->hapus_data_servak();
		redirect('upload_servak');
	}
}