<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_ijin_keluarga extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_surat_ijin_keluarga');			
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
 
			$data['tampil_data_personal'] = $this->M_surat_ijin_keluarga->tampil_data_personal();
			$data['tampil_data_tki'] = $this->M_surat_ijin_keluarga->tampil_data_tki();
			$data['tampil_data_ahli'] = $this->M_surat_ijin_keluarga->tampil_data_ahli();



				$data['namamodule'] = "surat_ijin_keluarga";
				$data['namafileview'] = "surat_ijin_keluarga";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "surat_ijin_keluarga";
				$data['namafileview'] = "surat_ijin_keluarga";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}	
	
	function simpan_data_surat(){
		$this->M_surat_ijin_keluarga->simpan_data_surat();

		redirect('surat_ijin_keluarga');
	}

	function edit_surat() {
			$this->M_surat_ijin_keluarga->edit_surat();
			redirect('surat_ijin_keluarga');
	}

	function hapus_data_surat() {
		$this->M_surat_ijin_keluarga->hapus_data_surat();
		redirect('surat_ijin_keluarga');
	}
        
}