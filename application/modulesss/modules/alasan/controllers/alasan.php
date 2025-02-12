<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Alasan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_alasan');			
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

				$data['tampil_data_alasan'] = $this->M_alasan->tampil_data_alasan();


				$data['namamodule'] = "alasan";
				$data['namafileview'] = "alasanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "alasan";
				$data['namafileview'] = "alasanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_alasan(){
		$nama_alasan	= $this->input->post('nama_alasan');
		$nama_alasan_taiwan	= $this->input->post('nama_alasan_taiwan');
		
		$this->M_alasan->simpan_data_alasan($nama_alasan,$nama_alasan_taiwan);

		redirect('alasan');
	}

	
}