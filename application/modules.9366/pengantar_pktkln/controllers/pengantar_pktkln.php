<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pengantar_pktkln extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pengantar_pktkln');			
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
 
			$data['tampil_data_personal'] = $this->M_pengantar_pktkln->tampil_data_personal();


				$data['namamodule'] = "pengantar_pktkln";
				$data['namafileview'] = "pengantar_pktkln";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "pengantar_pktkln";
				$data['namafileview'] = "pengantar_pktkln";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}	
	
	function simpan_data_surat(){
		$this->M_pengantar_pktkln->simpan_data_surat();

		redirect('pengantar_pktkln');
	}

	function edit_surat() {
			$this->M_pengantar_pktkln->edit_surat();
			redirect('pengantar_pktkln');
	}

	function hapus_data_surat() {
		$this->M_pengantar_pktkln->hapus_data_surat();
		redirect('pengantar_pktkln');
	}
        
}