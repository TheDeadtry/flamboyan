<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pekerjaan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pekerjaan');			
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

				$data['tampil_data_kategori_pekerjaan'] = $this->M_pekerjaan->tampil_data_kategoripekerjaan();
				$data['tampil_data_pekerjaan'] = $this->M_pekerjaan->tampil_data_pekerjaan();



				$data['namamodule'] = "pekerjaan";
				$data['namafileview'] = "pekerjaanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "pekerjaan";
				$data['namafileview'] = "pekerjaanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_kategoripekerjaan(){
		$nama_kategoripekerjaan	= $this->input->post('nama_kategoripekerjaan');
		$nama_kategoripekerjaan_taiwan	= $this->input->post('nama_kategoripekerjaan_taiwan');
		
		$this->M_pekerjaan->simpan_data_kategoripekerjaan($nama_kategoripekerjaan,$nama_kategoripekerjaan_taiwan);

		redirect('pekerjaan');
	}

	function simpan_data_pekerjaan(){
		$id_kategori	= $this->input->post('kategori');
		$nama_pekerjaan	= $this->input->post('nama_pekerjaan');
		$nama_pekerjaan_taiwan	= $this->input->post('nama_pekerjaan_taiwan');
		$this->M_pekerjaan->simpan_data_pekerjaan($id_kategori,$nama_pekerjaan,$nama_pekerjaan_taiwan);

		redirect('pekerjaan');
	}
	
}