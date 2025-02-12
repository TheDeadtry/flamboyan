<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_sertifikatujian extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_sertifikatujian');			
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
				$data['tampil_data_personal'] = $this->M_upload_sertifikatujian->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_sertifikatujian'] = $this->M_upload_sertifikatujian->tampil_data_sertifikatujian($detailidnya);
				$data['hitungan'] = $this->M_upload_sertifikatujian->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_sertifikatujian->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_sertifikatujian";
				$data['namafileview'] = "sertifikatujianadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_sertifikatujian->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_sertifikatujian'] = $this->M_upload_sertifikatujian->tampil_data_sertifikatujian($detailidnya);
				$data['namamodule'] = "upload_sertifikatujian";
				$data['namafileview'] = "sertifikatujianadmin";
				echo Modules::run('template/sertifikatujian_template', $data);
			}
		}	 
	}

	function simpan_data_sertifikatujian(){
		
		$this->M_upload_sertifikatujian->simpan_data_sertifikatujian();

		redirect('upload_sertifikatujian');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_sertifikatujian";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_sertifikatujian->simpan_foto_sertifikatujian($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_sertifikatujian->hapus_foto_sertifikatujian();
	}


	function update_data_sertifikatujian() {
			$this->M_upload_sertifikatujian->update_data_sertifikatujian();
			redirect('upload_sertifikatujian');
	}

	function hapus_data_sertifikatujian() {
		$this->M_upload_sertifikatujian->hapus_data_sertifikatujian();
		redirect('upload_sertifikatujian');
	}
}