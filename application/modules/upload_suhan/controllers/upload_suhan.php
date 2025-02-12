<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_suhan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_suhan');			
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
				$data['tampil_data_personal'] = $this->M_upload_suhan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_suhan'] = $this->M_upload_suhan->tampil_data_suhan($detailidnya);
				$data['hitungan'] = $this->M_upload_suhan->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_suhan->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_suhan";
				$data['namafileview'] = "suhanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_suhan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_suhan'] = $this->M_upload_suhan->tampil_data_suhan($detailidnya);
				$data['namamodule'] = "upload_suhan";
				$data['namafileview'] = "suhanadmin";
				echo Modules::run('template/suhan_template', $data);
			}
		}	 
	}

	function simpan_data_suhan(){
		
		$this->M_upload_suhan->simpan_data_suhan();

		redirect('upload_suhan');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_suhan";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_suhan->simpan_foto_suhan($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_suhan->hapus_foto_suhan();
	}


	function update_data_suhan() {
			$this->M_upload_suhan->update_data_suhan();
			redirect('upload_suhan');
	}

	function hapus_data_suhan() {
		$this->M_upload_suhan->hapus_data_suhan();
		redirect('upload_suhan');
	}
}