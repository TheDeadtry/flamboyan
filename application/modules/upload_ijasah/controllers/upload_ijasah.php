<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_ijasah extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_ijasah');			
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
				$data['tampil_data_personal'] = $this->M_upload_ijasah->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_ijasah'] = $this->M_upload_ijasah->tampil_data_ijasah($detailidnya);
				$data['hitungan'] = $this->M_upload_ijasah->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_ijasah->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_ijasah";
				$data['namafileview'] = "ijasahadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_ijasah->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_ijasah'] = $this->M_upload_ijasah->tampil_data_ijasah($detailidnya);
				$data['namamodule'] = "upload_ijasah";
				$data['namafileview'] = "ijasahadmin";
				echo Modules::run('template/ijasah_template', $data);
			}
		}	 
	}

	function simpan_data_ijasah(){
		
		$this->M_upload_ijasah->simpan_data_ijasah();

		redirect('upload_ijasah');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_ijasah";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_ijasah->simpan_foto_ijasah($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_ijasah->hapus_foto_ijasah();
	}


	function update_data_ijasah() {
			$this->M_upload_ijasah->update_data_ijasah();
			redirect('upload_ijasah');
	}

	function hapus_data_ijasah() {
		$this->M_upload_ijasah->hapus_data_ijasah();
		redirect('upload_ijasah');
	}
}