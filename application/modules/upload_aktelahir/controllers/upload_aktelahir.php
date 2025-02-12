<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_aktelahir extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_aktelahir');			
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
				$data['tampil_data_personal'] = $this->M_upload_aktelahir->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_aktelahir'] = $this->M_upload_aktelahir->tampil_data_aktelahir($detailidnya);
				$data['hitungan'] = $this->M_upload_aktelahir->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_aktelahir->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_aktelahir";
				$data['namafileview'] = "aktelahiradmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_aktelahir->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_aktelahir'] = $this->M_upload_aktelahir->tampil_data_aktelahir($detailidnya);
				$data['namamodule'] = "upload_aktelahir";
				$data['namafileview'] = "aktelahiradmin";
				echo Modules::run('template/aktelahir_template', $data);
			}
		}	 
	}

	function simpan_data_aktelahir(){
		
		$this->M_upload_aktelahir->simpan_data_aktelahir();

		redirect('upload_aktelahir');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_aktelahir";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_aktelahir->simpan_foto_aktelahir($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_aktelahir->hapus_foto_aktelahir();
	}


	function update_data_aktelahir() {
			$this->M_upload_aktelahir->update_data_aktelahir();
			redirect('upload_aktelahir');
	}

	function hapus_data_aktelahir() {
		$this->M_upload_aktelahir->hapus_data_aktelahir();
		redirect('upload_aktelahir');
	}
}