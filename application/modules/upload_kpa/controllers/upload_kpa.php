<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_kpa extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_kpa');			
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
				$data['tampil_data_personal'] = $this->M_upload_kpa->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kpa'] = $this->M_upload_kpa->tampil_data_kpa($detailidnya);
				$data['hitungan'] = $this->M_upload_kpa->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_kpa->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_kpa";
				$data['namafileview'] = "kpaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_kpa->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kpa'] = $this->M_upload_kpa->tampil_data_kpa($detailidnya);
				$data['namamodule'] = "upload_kpa";
				$data['namafileview'] = "kpaadmin";
				echo Modules::run('template/kpa_template', $data);
			}
		}	 
	}

	function simpan_data_kpa(){
		
		$this->M_upload_kpa->simpan_data_kpa();

		redirect('upload_kpa');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_kpa";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_kpa->simpan_foto_kpa($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_kpa->hapus_foto_kpa();
	}


	function update_data_kpa() {
			$this->M_upload_kpa->update_data_kpa();
			redirect('upload_kpa');
	}

	function hapus_data_kpa() {
		$this->M_upload_kpa->hapus_data_kpa();
		redirect('upload_kpa');
	}
}