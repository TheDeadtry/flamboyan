<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_berkas extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_berkas');			
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
				$data['tampil_data_personal'] = $this->M_upload_berkas->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_berkas'] = $this->M_upload_berkas->tampil_data_berkas($detailidnya);
				$data['hitungan'] = $this->M_upload_berkas->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_berkas->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_berkas";
				$data['namafileview'] = "berkasadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_berkas->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_berkas'] = $this->M_upload_berkas->tampil_data_berkas($detailidnya);
				$data['namamodule'] = "upload_berkas";
				$data['namafileview'] = "berkasadmin";
				echo Modules::run('template/berkas_template', $data);
			}
		}	 
	}

	function simpan_data_berkas(){
		
		$this->M_upload_berkas->simpan_data_berkas();

		redirect('upload_berkas');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_berkas";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_berkas->simpan_foto_berkas($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_berkas->hapus_foto_berkas();
	}


	function update_data_berkas() {
			$this->M_upload_berkas->update_data_berkas();
			redirect('upload_berkas');
	}

	function hapus_data_berkas() {
		$this->M_upload_berkas->hapus_data_berkas();
		redirect('upload_berkas');
	}
}