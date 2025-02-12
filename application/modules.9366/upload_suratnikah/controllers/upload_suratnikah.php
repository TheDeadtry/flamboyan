<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_suratnikah extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_suratnikah');			
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
				$data['tampil_data_personal'] = $this->M_upload_suratnikah->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_suratnikah'] = $this->M_upload_suratnikah->tampil_data_suratnikah($detailidnya);
				$data['hitungan'] = $this->M_upload_suratnikah->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_suratnikah->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_suratnikah";
				$data['namafileview'] = "suratnikahadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_suratnikah->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_suratnikah'] = $this->M_upload_suratnikah->tampil_data_suratnikah($detailidnya);
				$data['namamodule'] = "upload_suratnikah";
				$data['namafileview'] = "suratnikahadmin";
				echo Modules::run('template/suratnikah_template', $data);
			}
		}	 
	}

	function simpan_data_suratnikah(){
		
		$this->M_upload_suratnikah->simpan_data_suratnikah();

		redirect('upload_suratnikah');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_suratnikah";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_suratnikah->simpan_foto_suratnikah($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_suratnikah->hapus_foto_suratnikah();
	}


	function update_data_suratnikah() {
			$this->M_upload_suratnikah->update_data_suratnikah();
			redirect('upload_suratnikah');
	}

	function hapus_data_suratnikah() {
		$this->M_upload_suratnikah->hapus_data_suratnikah();
		redirect('upload_suratnikah');
	}
}