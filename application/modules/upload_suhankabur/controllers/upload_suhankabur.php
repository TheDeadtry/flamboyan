<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_suhankabur extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_suhankabur');			
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
				$data['tampil_data_personal'] = $this->M_upload_suhankabur->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_suhankabur'] = $this->M_upload_suhankabur->tampil_data_suhankabur($detailidnya);
				$data['hitungan'] = $this->M_upload_suhankabur->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_suhankabur->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_suhankabur";
				$data['namafileview'] = "suhankaburadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_suhankabur->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_suhankabur'] = $this->M_upload_suhankabur->tampil_data_suhankabur($detailidnya);
				$data['namamodule'] = "upload_suhankabur";
				$data['namafileview'] = "suhankaburadmin";
				echo Modules::run('template/suhankabur_template', $data);
			}
		}	 
	}

	function simpan_data_suhankabur(){
		
		$this->M_upload_suhankabur->simpan_data_suhankabur();

		redirect('upload_suhankabur');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_suhankabur";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_suhankabur->simpan_foto_suhankabur($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_suhankabur->hapus_foto_suhankabur();
	}


	function update_data_suhankabur() {
			$this->M_upload_suhankabur->update_data_suhankabur();
			redirect('upload_suhankabur');
	}

	function hapus_data_suhankabur() {
		$this->M_upload_suhankabur->hapus_data_suhankabur();
		redirect('upload_suhankabur');
	}
}