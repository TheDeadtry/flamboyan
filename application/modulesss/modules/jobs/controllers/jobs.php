<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Jobs extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_jobs');			
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

				$data['tampil_data_jobs'] = $this->M_jobs->tampil_data_jobs();


				$data['namamodule'] = "jobs";
				$data['namafileview'] = "jobsadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "jobs";
				$data['namafileview'] = "jobsagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_jobs(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_jobs	= $this->input->post('nama_jobs');
		$nama_jobs_taiwan	= $this->input->post('nama_jobs_taiwan');
		
		$this->M_jobs->simpan_data_jobs($nama_jobs,$nama_jobs_taiwan);

		redirect('jobs');
	}

	
}