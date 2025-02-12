<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pendidikan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pendidikan');			
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

				$data['tampil_data_pendidikan'] = $this->M_pendidikan->tampil_data_pendidikan();


				$data['namamodule'] = "pendidikan";
				$data['namafileview'] = "pendidikanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "pendidikan";
				$data['namafileview'] = "pendidikanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_pendidikan(){
		$nama_pendidikan	= $this->input->post('nama_pendidikan');
		$nama_pendidikan_taiwan	= $this->input->post('nama_pendidikan_taiwan');
		
		$this->M_pendidikan->simpan_data_pendidikan($nama_pendidikan,$nama_pendidikan_taiwan);

		redirect('pendidikan');
	}

	
}