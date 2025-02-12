<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_visapermit extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_visapermit');			
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
				$data['tampil_data_personal'] = $this->M_upload_visapermit->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_visapermit'] = $this->M_upload_visapermit->tampil_data_visapermit($detailidnya);
				$data['hitungan'] = $this->M_upload_visapermit->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_visapermit->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_visapermit";
				$data['namafileview'] = "visapermitadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_visapermit->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_visapermit'] = $this->M_upload_visapermit->tampil_data_visapermit($detailidnya);
				$data['namamodule'] = "upload_visapermit";
				$data['namafileview'] = "visapermitadmin";
				echo Modules::run('template/visapermit_template', $data);
			}
		}	 
	}

	function simpan_data_visapermit(){
		
		$this->M_upload_visapermit->simpan_data_visapermit();

		redirect('upload_visapermit');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_visapermit";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_visapermit->simpan_foto_visapermit($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_visapermit->hapus_foto_visapermit();
	}


	function update_data_visapermit() {
			$this->M_upload_visapermit->update_data_visapermit();
			redirect('upload_visapermit');
	}

	function hapus_data_visapermit() {
		$this->M_upload_visapermit->hapus_data_visapermit();
		redirect('upload_visapermit');
	}
}