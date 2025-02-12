<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Bank extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_bank');			
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

				$data['tampil_data_bank'] = $this->M_bank->tampil_data_bank();


				$data['namamodule'] = "bank";
				$data['namafileview'] = "bankadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "bank";
				$data['namafileview'] = "bankagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_bank(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_bank	= $this->input->post('nama_bank');
		$nama_bank_taiwan	= $this->input->post('nama_bank_taiwan');
		
		$this->M_bank->simpan_data_bank($nama_bank,$nama_bank_taiwan);

		redirect('bank');
	}

	function update_data_bank() {
			$this->M_bank->update_data_bank();
			redirect('bank');

	}

	function hapus_data_bank() {
		$this->M_bank->hapus_data_bank();
		redirect('bank');
	}	
}