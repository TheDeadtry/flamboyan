<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_ktp extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_ktp');			
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
				$data['tampil_data_personal'] = $this->M_upload_ktp->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_ktp'] = $this->M_upload_ktp->tampil_data_ktp($detailidnya);
				$data['hitungan'] = $this->M_upload_ktp->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_ktp->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_ktp";
				$data['namafileview'] = "ktpadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_ktp->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_ktp'] = $this->M_upload_ktp->tampil_data_ktp($detailidnya);
				$data['namamodule'] = "upload_ktp";
				$data['namafileview'] = "ktpadmin";
				echo Modules::run('template/ktp_template', $data);
			}
		}	 
	}

	function simpan_data_ktp(){
		
		$this->M_upload_ktp->simpan_data_ktp();

		redirect('upload_ktp');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_ktp";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_ktp->simpan_foto_ktp($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_ktp->hapus_foto_ktp();
	}


	function update_data_ktp() {
			$this->M_upload_ktp->update_data_ktp();
			redirect('upload_ktp');
	}

	function hapus_data_ktp() {
		$this->M_upload_ktp->hapus_data_ktp();
		redirect('upload_ktp');
	}
}