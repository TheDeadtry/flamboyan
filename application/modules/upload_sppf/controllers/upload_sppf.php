<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_sppf extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_sppf');			
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
				$data['tampil_data_personal'] = $this->M_upload_sppf->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_sppf'] = $this->M_upload_sppf->tampil_data_sppf($detailidnya);
				$data['hitungan'] = $this->M_upload_sppf->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_sppf->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_sppf";
				$data['namafileview'] = "sppfadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_sppf->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_sppf'] = $this->M_upload_sppf->tampil_data_sppf($detailidnya);
				$data['namamodule'] = "upload_sppf";
				$data['namafileview'] = "sppfadmin";
				echo Modules::run('template/sppf_template', $data);
			}
		}	 
	}

	function simpan_data_sppf(){
		
		$this->M_upload_sppf->simpan_data_sppf();

		redirect('upload_sppf');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_sppf";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_sppf->simpan_foto_sppf($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_sppf->hapus_foto_sppf();
	}


	function update_data_sppf() {
			$this->M_upload_sppf->update_data_sppf();
			redirect('upload_sppf');
	}

	function hapus_data_sppf() {
		$this->M_upload_sppf->hapus_data_sppf();
		redirect('upload_sppf');
	}
}