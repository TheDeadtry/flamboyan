<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Negara extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_negara');			
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

				$data['tampil_data_negara'] = $this->M_negara->tampil_data_negara();


				$data['namamodule'] = "negara";
				$data['namafileview'] = "negaraadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "negara";
				$data['namafileview'] = "negaraagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_negara(){
		$kode_negara	= $this->input->post('kode_negara');
		$nama_negara	= $this->input->post('nama_negara');
		$nama_negara_taiwan	= $this->input->post('nama_negara_taiwan');
		
		$this->M_negara->simpan_data_negara($kode_negara,$nama_negara,$nama_negara_taiwan);

		redirect('negara');
	}

	
}