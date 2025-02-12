<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Agen extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_agen');			
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

				$data['tampil_data_agen'] = $this->M_agen->tampil_data_agen();


				$data['namamodule'] = "agen";
				$data['namafileview'] = "agenadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "agen";
				$data['namafileview'] = "agenagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_agen(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$kode	= $this->input->post('kode');
		$nama	= $this->input->post('nama');
		$hp	= $this->input->post('hp');
		$email	= $this->input->post('email');
		$alamat	= $this->input->post('alamat');
		$status	= $this->input->post('status');
		
		$this->M_agen->simpan_data_agen($kode, $nama, $hp, $email,$alamat,$status);

		redirect('agen');
	}

	
}