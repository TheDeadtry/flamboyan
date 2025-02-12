<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Upload_arc extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_arc');			
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
				
				$data['tampil_data_personal'] = $this->M_upload_arc->tampil_data_personal($detailidnya);
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_arc'] = $this->M_upload_arc->tampil_data_arc($this->session->userdata("detailuser"));
				$data['namamodule'] = "upload_arc";
				$data['namafileview'] = "arcadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_arc->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_arc'] = $this->M_upload_arc->tampil_data_arc($this->session->userdata("detailuser"));
				$data['namamodule'] = "upload_arc";
				$data['namafileview'] = "arcadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

		function arcadminpersonal(){
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
			//user sudah login
				$data['tampil_data_personal'] = $this->M_upload_arc->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_arc'] = $this->M_upload_arc->tampil_data_arc($this->session->userdata("detailuser"));
				$data['namamodule'] = "upload_arc";
				$data['namafileview'] = "arcadminpersonal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['tampil_data_personal'] = $this->M_upload_arc->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_arc'] = $this->M_upload_arc->tampil_data_arc($this->session->userdata("detailuser"));
				$data['namamodule'] = "upload_arc";
				$data['namafileview'] = "arcadminpersonal";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_arc(){
		
		$this->M_upload_arc->simpan_data_arc();

		redirect('upload_arc/arcadminpersonal');
	}

	function update_data_arc() {
			$this->M_upload_arc->update_data_arc();
			redirect('upload_arc/arcadminpersonal');
	}

	function hapus_data_arc() {
		$this->M_upload_arc->hapus_data_arc();
		redirect('upload_arc/arcadminpersonal');
	}
}