<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pengajuan_ktkln extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pengajuan_ktkln');			
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
 
			$data['tampil_data_personal'] = $this->M_pengajuan_ktkln->tampil_data_personal();


				$data['namamodule'] = "pengajuan_ktkln";
				$data['namafileview'] = "pengajuan_ktkln";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "pengajuan_ktkln";
				$data['namafileview'] = "pengajuan_ktkln";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}	
	
	function simpan_data_surat(){
		$this->M_pengajuan_ktkln->simpan_data_surat();

		redirect('pengajuan_ktkln');
	}

	function edit_surat() {
			$this->M_pengajuan_ktkln->edit_surat();
			redirect('pengajuan_ktkln');
	}

	function hapus_data_surat() {
		$this->M_pengajuan_ktkln->hapus_data_surat();
		redirect('pengajuan_ktkln');
	}
        
}