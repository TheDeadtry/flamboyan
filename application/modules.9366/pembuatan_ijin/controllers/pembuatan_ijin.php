<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pembuatan_ijin extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pembuatan_ijin');			
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

			$data['tampil_data_personal'] = $this->M_pembuatan_ijin->tampil_data_personal();
			$data['tampil_data_tki'] = $this->M_pembuatan_ijin->tampil_data_tki();



				$data['namamodule'] = "pembuatan_ijin";
				$data['namafileview'] = "pembuatan_ijin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "pembuatan_ijin";
				$data['namafileview'] = "pembuatan_ijin";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function simpan_data_surat(){
		$this->M_pembuatan_ijin->simpan_data_surat();

		redirect('pembuatan_ijin');
	}

	function edit_surat() {
			$this->M_pembuatan_ijin->edit_surat();
			redirect('pembuatan_ijin');
	}

	function hapus_data_surat() {
		$this->M_pembuatan_ijin->hapus_data_surat();
		redirect('pembuatan_ijin');
	}
        
}