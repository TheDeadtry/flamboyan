<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Setjagaanak extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_setjagaanak');			
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
				$data['tampil_data_setjagaanak'] = $this->M_setjagaanak->tampil_data_setjagaanak();
				$data['namamodule'] = "setjagaanak";
				$data['namafileview'] = "setjagaanak";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "agama";
				$data['namafileview'] = "setjagaanakagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_setjagaanak(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_setjagaanak	= $this->input->post('nama_setjagaanak');
		$nama_setjagaanak_taiwan	= $this->input->post('nama_setjagaanak_taiwan');
		
		$this->M_setjagaanak->simpan_data_setjagaanak($nama_setjagaanak,$nama_setjagaanak_taiwan);

		redirect('setjagaanak');
	}

	function update_data_setjagaanak() {
			$this->M_setjagaanak->update_data_setjagaanak();
			redirect('setjagaanak');
	}

	function hapus_data_setjagaanak() {
		$this->M_setjagaanak->hapus_data_setjagaanak();
		redirect('setjagaanak');
	}
}