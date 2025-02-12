<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Medical extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_medical');			
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
				$data['tampil_data_medical'] = $this->M_medical->tampil_data_medical();
				$data['namamodule'] = "medical";
				$data['namafileview'] = "medicaladmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "medical";
				$data['namafileview'] = "medicalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_medical(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_medical	= $this->input->post('nama_medical');
		$nama_medical_taiwan	= $this->input->post('nama_medical_taiwan');
		
		$this->M_medical->simpan_data_medical($nama_medical,$nama_medical_taiwan);

		redirect('medical');
	}

	function update_data_medical() {
			$this->M_medical->update_data_medical();
			redirect('medical');
	}

	function hapus_data_medical() {
		$this->M_medical->hapus_data_medical();
		redirect('medical');
	}
}