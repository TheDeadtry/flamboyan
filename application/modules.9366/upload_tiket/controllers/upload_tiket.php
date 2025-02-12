<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_tiket extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_tiket');			
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
				$data['tampil_data_personal'] = $this->M_upload_tiket->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_tiket'] = $this->M_upload_tiket->tampil_data_tiket($detailidnya);
				$data['hitungan'] = $this->M_upload_tiket->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_tiket->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_tiket";
				$data['namafileview'] = "tiketadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_tiket->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_tiket'] = $this->M_upload_tiket->tampil_data_tiket($detailidnya);
				$data['namamodule'] = "upload_tiket";
				$data['namafileview'] = "tiketadmin";
				echo Modules::run('template/tiket_template', $data);
			}
		}	 
	}

	function simpan_data_tiket(){
		
		$this->M_upload_tiket->simpan_data_tiket();

		redirect('upload_tiket');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_tiket";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_tiket->simpan_foto_tiket($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_tiket->hapus_foto_tiket();
	}


	function update_data_tiket() {
			$this->M_upload_tiket->update_data_tiket();
			redirect('upload_tiket');
	}

	function hapus_data_tiket() {
		$this->M_upload_tiket->hapus_data_tiket();
		redirect('upload_tiket');
	}
}