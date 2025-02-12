<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_devisapermit extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_devisapermit');			
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
				$data['tampil_data_personal'] = $this->M_upload_devisapermit->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_devisapermit'] = $this->M_upload_devisapermit->tampil_data_devisapermit($detailidnya);
				$data['hitungan'] = $this->M_upload_devisapermit->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_devisapermit->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_devisapermit";
				$data['namafileview'] = "devisapermitadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_devisapermit->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_devisapermit'] = $this->M_upload_devisapermit->tampil_data_devisapermit($detailidnya);
				$data['namamodule'] = "upload_devisapermit";
				$data['namafileview'] = "devisapermitadmin";
				echo Modules::run('template/devisapermit_template', $data);
			}
		}	 
	}

	function simpan_data_devisapermit(){
		
		$this->M_upload_devisapermit->simpan_data_devisapermit();

		redirect('upload_devisapermit');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_devisapermit";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_devisapermit->simpan_foto_devisapermit($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_devisapermit->hapus_foto_devisapermit();
	}


	function update_data_devisapermit() {
			$this->M_upload_devisapermit->update_data_devisapermit();
			redirect('upload_devisapermit');
	}

	function hapus_data_devisapermit() {
		$this->M_upload_devisapermit->hapus_data_devisapermit();
		redirect('upload_devisapermit');
	}
}