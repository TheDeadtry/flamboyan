<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_perjanjianpenempatan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_perjanjianpenempatan');			
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
				$data['tampil_data_personal'] = $this->M_upload_perjanjianpenempatan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_perjanjianpenempatan'] = $this->M_upload_perjanjianpenempatan->tampil_data_perjanjianpenempatan($detailidnya);
				$data['hitungan'] = $this->M_upload_perjanjianpenempatan->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_perjanjianpenempatan->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_perjanjianpenempatan";
				$data['namafileview'] = "perjanjianpenempatanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_perjanjianpenempatan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_perjanjianpenempatan'] = $this->M_upload_perjanjianpenempatan->tampil_data_perjanjianpenempatan($detailidnya);
				$data['namamodule'] = "upload_perjanjianpenempatan";
				$data['namafileview'] = "perjanjianpenempatanadmin";
				echo Modules::run('template/perjanjianpenempatan_template', $data);
			}
		}	 
	}

	function simpan_data_perjanjianpenempatan(){
		
		$this->M_upload_perjanjianpenempatan->simpan_data_perjanjianpenempatan();

		redirect('upload_perjanjianpenempatan');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_perjanjianpenempatan";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_perjanjianpenempatan->simpan_foto_perjanjianpenempatan($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_perjanjianpenempatan->hapus_foto_perjanjianpenempatan();
	}


	function update_data_perjanjianpenempatan() {
			$this->M_upload_perjanjianpenempatan->update_data_perjanjianpenempatan();
			redirect('upload_perjanjianpenempatan');
	}

	function hapus_data_perjanjianpenempatan() {
		$this->M_upload_perjanjianpenempatan->hapus_data_perjanjianpenempatan();
		redirect('upload_perjanjianpenempatan');
	}
}