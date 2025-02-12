<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pengantar_ppap extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pengantar_ppap');			
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
 
			$data['tampil_data_personal'] = $this->M_pengantar_ppap->tampil_data_personal();


				$data['namamodule'] = "pengantar_ppap";
				$data['namafileview'] = "pengantar_ppap";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "pengantar_ppap";
				$data['namafileview'] = "pengantar_ppap";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}	
	
	function simpan_data_surat(){
		$this->M_pengantar_ppap->simpan_data_surat();

		redirect('pengantar_ppap');
	}

	function edit_surat() {
			$this->M_pengantar_ppap->edit_surat();
			redirect('pengantar_ppap');
	}

	function hapus_data_surat() {
		$this->M_pengantar_ppap->hapus_data_surat();
		redirect('pengantar_ppap');
	}
        
}