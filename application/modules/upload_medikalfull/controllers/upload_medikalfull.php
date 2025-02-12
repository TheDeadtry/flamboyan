<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_medikalfull extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_medikalfull');			
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
				$data['tampil_data_personal'] = $this->M_upload_medikalfull->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_medikalfull'] = $this->M_upload_medikalfull->tampil_data_medikalfull($detailidnya);
				$data['hitungan'] = $this->M_upload_medikalfull->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_medikalfull->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_medikalfull";
				$data['namafileview'] = "medikalfulladmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_medikalfull->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_medikalfull'] = $this->M_upload_medikalfull->tampil_data_medikalfull($detailidnya);
				$data['namamodule'] = "upload_medikalfull";
				$data['namafileview'] = "medikalfulladmin";
				echo Modules::run('template/medikalfull_template', $data);
			}
		}	 
	}

	function simpan_data_medikalfull(){
		
		$this->M_upload_medikalfull->simpan_data_medikalfull();

		redirect('upload_medikalfull');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_medikalfull";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_medikalfull->simpan_foto_medikalfull($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_medikalfull->hapus_foto_medikalfull();
	}


	function update_data_medikalfull() {
			$this->M_upload_medikalfull->update_data_medikalfull();
			redirect('upload_medikalfull');
	}

	function hapus_data_medikalfull() {
		$this->M_upload_medikalfull->hapus_data_medikalfull();
		redirect('upload_medikalfull');
	}
}