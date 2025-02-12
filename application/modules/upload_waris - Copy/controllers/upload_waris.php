<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Upload_waris extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_waris');			
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
				$data['tampil_data_personal'] = $this->M_upload_waris->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_waris'] = $this->M_upload_waris->tampil_data_waris($detailidnya);
				$data['namamodule'] = "upload_waris";
				$data['namafileview'] = "warisadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_waris->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_waris'] = $this->M_upload_waris->tampil_data_waris($detailidnya);
				$data['namamodule'] = "upload_waris";
				$data['namafileview'] = "warisadmin";
				echo Modules::run('template/admin_template', $data);
			}
		}	 
	}

	function simpan_data_waris(){
		
		$this->M_upload_waris->simpan_data_waris();

		redirect('upload_waris');
	}

	function update_data_waris() {
			$this->M_upload_waris->update_data_waris();
			redirect('upload_waris');
	}

	function hapus_data_waris() {
		$this->M_upload_waris->hapus_data_waris();
		redirect('upload_waris');
	}
}