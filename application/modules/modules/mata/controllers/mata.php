<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class mata extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_mata');			
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

				$data['tampil_data_mata'] = $this->M_mata->tampil_data_mata();


				$data['namamodule'] = "mata";
				$data['namafileview'] = "mataadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "mata";
				$data['namafileview'] = "mataagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_mata(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_mata	= $this->input->post('nama_mata');
		$nama_mata_taiwan	= $this->input->post('nama_mata_taiwan');
		
		$this->M_mata->simpan_data_mata($nama_mata,$nama_mata_taiwan);

		redirect('mata');
	}

	function update_data_mata() {
			$this->M_mata->update_data_mata();
			redirect('mata');
	}

	function hapus_data_mata() {
		$this->M_mata->hapus_data_mata();
		redirect('mata');
	}	
}