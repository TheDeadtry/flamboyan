<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_serkes extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_serkes');			
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
				$data['tampil_data_personal'] = $this->M_upload_serkes->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_serkes'] = $this->M_upload_serkes->tampil_data_serkes($detailidnya);
				$data['hitungan'] = $this->M_upload_serkes->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_serkes->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_serkes";
				$data['namafileview'] = "serkesadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_serkes->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_serkes'] = $this->M_upload_serkes->tampil_data_serkes($detailidnya);
				$data['namamodule'] = "upload_serkes";
				$data['namafileview'] = "serkesadmin";
				echo Modules::run('template/serkes_template', $data);
			}
		}	 
	}

	function simpan_data_serkes(){
		
		$this->M_upload_serkes->simpan_data_serkes();

		redirect('upload_serkes');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_serkes";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_serkes->simpan_foto_serkes($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_serkes->hapus_foto_serkes();
	}


	function update_data_serkes() {
			$this->M_upload_serkes->update_data_serkes();
			redirect('upload_serkes');
	}

	function hapus_data_serkes() {
		$this->M_upload_serkes->hapus_data_serkes();
		redirect('upload_serkes');
	}
}