<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_kehilanganpaspor extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_kehilanganpaspor');			
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
				$data['tampil_data_personal'] = $this->M_upload_kehilanganpaspor->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kehilanganpaspor'] = $this->M_upload_kehilanganpaspor->tampil_data_kehilanganpaspor($detailidnya);
				$data['hitungan'] = $this->M_upload_kehilanganpaspor->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_kehilanganpaspor->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_kehilanganpaspor";
				$data['namafileview'] = "kehilanganpasporadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_kehilanganpaspor->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kehilanganpaspor'] = $this->M_upload_kehilanganpaspor->tampil_data_kehilanganpaspor($detailidnya);
				$data['namamodule'] = "upload_kehilanganpaspor";
				$data['namafileview'] = "kehilanganpasporadmin";
				echo Modules::run('template/kehilanganpaspor_template', $data);
			}
		}	 
	}

	function simpan_data_kehilanganpaspor(){
		
		$this->M_upload_kehilanganpaspor->simpan_data_kehilanganpaspor();

		redirect('upload_kehilanganpaspor');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_kehilanganpaspor";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_kehilanganpaspor->simpan_foto_kehilanganpaspor($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_kehilanganpaspor->hapus_foto_kehilanganpaspor();
	}


	function update_data_kehilanganpaspor() {
			$this->M_upload_kehilanganpaspor->update_data_kehilanganpaspor();
			redirect('upload_kehilanganpaspor');
	}

	function hapus_data_kehilanganpaspor() {
		$this->M_upload_kehilanganpaspor->hapus_data_kehilanganpaspor();
		redirect('upload_kehilanganpaspor');
	}
}