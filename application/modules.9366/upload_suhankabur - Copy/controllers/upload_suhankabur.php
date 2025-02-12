<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Upload_suhankabur extends MX_Controller{
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
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_suhankabur(){
		
		$this->M_upload_suhankabur->simpan_data_suhankabur();

		redirect('upload_suhankabur');
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