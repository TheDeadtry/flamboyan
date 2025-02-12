<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Provinsi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_provinsi');			
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

				$data['tampil_data_provinsi'] = $this->M_provinsi->tampil_data_provinsi();


				$data['namamodule'] = "provinsi";
				$data['namafileview'] = "provinsiadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "provinsi";
				$data['namafileview'] = "provinsiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_provinsi(){
		$nama_provinsi	= $this->input->post('nama_provinsi');
		$nama_provinsi_taiwan	= $this->input->post('nama_provinsi_taiwan');
		
		$this->M_provinsi->simpan_data_provinsi($nama_provinsi,$nama_provinsi_taiwan);

		redirect('provinsi');
	}

	
}