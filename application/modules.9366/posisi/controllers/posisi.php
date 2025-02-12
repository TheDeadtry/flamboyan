<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Posisi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_posisi');			
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

				$data['tampil_data_posisi'] = $this->M_posisi->tampil_data_posisi();


				$data['namamodule'] = "posisi";
				$data['namafileview'] = "posisiadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "posisi";
				$data['namafileview'] = "posisiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_posisi(){
		$nama_posisi	= $this->input->post('nama_posisi');
		$nama_posisi_taiwan	= $this->input->post('nama_posisi_taiwan');
		
		$this->M_posisi->simpan_data_posisi($nama_posisi,$nama_posisi_taiwan);

		redirect('posisi');
	}

	function update_posisi() {
		$this->M_posisi->update_posisi();
		redirect('posisi');
	}

	function hapus_posisi() {
		$this->M_posisi->hapus_posisi();
		redirect('posisi');
	}

	
}