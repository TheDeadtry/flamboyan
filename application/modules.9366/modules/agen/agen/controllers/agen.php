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
				$data['tampil_data_group'] = $this->M_agen->tampil_data_group();
				$data['tampil_pilihan_group'] = $this->M_agen->tampil_pilihan_group();


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

		
		$this->M_agen->simpan_data_agen();

		redirect('agen');
	}

		function simpan_data_group(){
		$this->M_agen->simpan_data_group();

		redirect('agen');
	}

function update_group() {
		$this->M_agen->update_group();
		redirect('agen');
	}

	function hapus_group() {
		$this->M_agen->hapus_group();
		redirect('agen');
	}

	function update_agen() {
		$this->M_agen->update_agen();
		redirect('agen');
	}

		function hapus_agen() {
		$this->M_agen->hapus_agen();
		redirect('agen');
	}
	
}