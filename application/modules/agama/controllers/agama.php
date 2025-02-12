<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Agama extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_agama');			
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
				$data['tampil_data_agama'] = $this->M_agama->tampil_data_agama();
				$data['namamodule'] = "agama";
				$data['namafileview'] = "agamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "agama";
				$data['namafileview'] = "agamaagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_agama(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_agama	= $this->input->post('nama_agama');
		$nama_agama_taiwan	= $this->input->post('nama_agama_taiwan');
		
		$this->M_agama->simpan_data_agama($nama_agama,$nama_agama_taiwan);

		redirect('agama');
	}

	function update_data_agama() {
			$this->M_agama->update_data_agama();
			redirect('agama');
	}

	function hapus_data_agama() {
		$this->M_agama->hapus_data_agama();
		redirect('agama');
	}
}