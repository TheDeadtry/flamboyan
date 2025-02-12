<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_pasporlama extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_pasporlama');			
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
				$data['tampil_data_personal'] = $this->M_upload_pasporlama->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pasporlama'] = $this->M_upload_pasporlama->tampil_data_pasporlama($detailidnya);
				$data['hitungan'] = $this->M_upload_pasporlama->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_pasporlama->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_pasporlama";
				$data['namafileview'] = "pasporlamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_pasporlama->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pasporlama'] = $this->M_upload_pasporlama->tampil_data_pasporlama($detailidnya);
				$data['namamodule'] = "upload_pasporlama";
				$data['namafileview'] = "pasporlamaadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_pasporlama(){
		
		$this->M_upload_pasporlama->simpan_data_pasporlama();

		redirect('upload_pasporlama');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_pasporlama";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_pasporlama->simpan_foto_pasporlama($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_pasporlama->hapus_foto_pasporlama();
	}


	function update_data_pasporlama() {
			$this->M_upload_pasporlama->update_data_pasporlama();
			redirect('upload_pasporlama');
	}

	function hapus_data_pasporlama() {
		$this->M_upload_pasporlama->hapus_data_pasporlama();
		redirect('upload_pasporlama');
	}
}