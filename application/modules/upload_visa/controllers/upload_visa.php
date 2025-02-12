<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_visa extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_visa');			
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
				$data['tampil_data_personal'] = $this->M_upload_visa->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_visa'] = $this->M_upload_visa->tampil_data_visa($detailidnya);
				$data['hitungan'] = $this->M_upload_visa->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_visa->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_visa";
				$data['namafileview'] = "visaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_visa->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_visa'] = $this->M_upload_visa->tampil_data_visa($detailidnya);
				$data['namamodule'] = "upload_visa";
				$data['namafileview'] = "visaadmin";
				echo Modules::run('template/visa_template', $data);
			}
		}	 
	}

	function simpan_data_visa(){
		
		$this->M_upload_visa->simpan_data_visa();

		redirect('upload_visa');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_visa";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_visa->simpan_foto_visa($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_visa->hapus_foto_visa();
	}


	function update_data_visa() {
			$this->M_upload_visa->update_data_visa();
			redirect('upload_visa');
	}

	function hapus_data_visa() {
		$this->M_upload_visa->hapus_data_visa();
		redirect('upload_visa');
	}
}