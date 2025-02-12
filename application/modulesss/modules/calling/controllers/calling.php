<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Calling extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_calling');			
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
			//user sudah login

				$data['tampil_data_calling'] = $this->M_calling->tampil_data_calling();


				$data['namamodule'] = "calling";
				$data['namafileview'] = "callingadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "calling";
				$data['namafileview'] = "callingagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_calling(){
		$kode_calling	= $this->input->post('kode_calling');
		$nama_calling	= $this->input->post('nama_calling');
		
		$this->M_calling->simpan_data_calling($kode_calling,$nama_calling);

		redirect('calling');
	}

	
}