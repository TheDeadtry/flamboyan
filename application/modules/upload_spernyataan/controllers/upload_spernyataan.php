<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_spernyataan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_spernyataan');			
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
				$data['tampil_data_personal'] = $this->M_upload_spernyataan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_spernyataan'] = $this->M_upload_spernyataan->tampil_data_spernyataan($detailidnya);
				$data['hitungan'] = $this->M_upload_spernyataan->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_spernyataan->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_spernyataan";
				$data['namafileview'] = "spernyataanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_spernyataan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_spernyataan'] = $this->M_upload_spernyataan->tampil_data_spernyataan($detailidnya);
				$data['namamodule'] = "upload_spernyataan";
				$data['namafileview'] = "spernyataanadmin";
				echo Modules::run('template/spernyataan_template', $data);
			}
		}	 
	}

	function simpan_data_spernyataan(){
		
		$this->M_upload_spernyataan->simpan_data_spernyataan();

		redirect('upload_spernyataan');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_spernyataan";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_spernyataan->simpan_foto_spernyataan($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_spernyataan->hapus_foto_spernyataan();
	}


	function update_data_spernyataan() {
			$this->M_upload_spernyataan->update_data_spernyataan();
			redirect('upload_spernyataan');
	}

	function hapus_data_spernyataan() {
		$this->M_upload_spernyataan->hapus_data_spernyataan();
		redirect('upload_spernyataan');
	}
}