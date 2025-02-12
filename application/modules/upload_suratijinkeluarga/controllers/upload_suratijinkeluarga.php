<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_suratijinkeluarga extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_suratijinkeluarga');			
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
				$data['tampil_data_personal'] = $this->M_upload_suratijinkeluarga->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_suratijinkeluarga'] = $this->M_upload_suratijinkeluarga->tampil_data_suratijinkeluarga($detailidnya);
				$data['hitungan'] = $this->M_upload_suratijinkeluarga->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_suratijinkeluarga->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_suratijinkeluarga";
				$data['namafileview'] = "suratijinkeluargaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_suratijinkeluarga->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_suratijinkeluarga'] = $this->M_upload_suratijinkeluarga->tampil_data_suratijinkeluarga($detailidnya);
				$data['namamodule'] = "upload_suratijinkeluarga";
				$data['namafileview'] = "suratijinkeluargaadmin";
				echo Modules::run('template/suratijinkeluarga_template', $data);
			}
		}	 
	}

	function simpan_data_suratijinkeluarga(){
		
		$this->M_upload_suratijinkeluarga->simpan_data_suratijinkeluarga();

		redirect('upload_suratijinkeluarga');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_suratijinkeluarga";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_suratijinkeluarga->simpan_foto_suratijinkeluarga($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_suratijinkeluarga->hapus_foto_suratijinkeluarga();
	}


	function update_data_suratijinkeluarga() {
			$this->M_upload_suratijinkeluarga->update_data_suratijinkeluarga();
			redirect('upload_suratijinkeluarga');
	}

	function hapus_data_suratijinkeluarga() {
		$this->M_upload_suratijinkeluarga->hapus_data_suratijinkeluarga();
		redirect('upload_suratijinkeluarga');
	}
}