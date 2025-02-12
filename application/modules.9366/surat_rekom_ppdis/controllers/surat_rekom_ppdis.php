<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_rekom_ppdis extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_surat_rekom_ppdis');			
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

			$data['tampil_data_personal'] = $this->M_surat_rekom_ppdis->tampil_data_personal();
			$data['tampil_data_tki'] = $this->M_surat_rekom_ppdis->tampil_data_tki();
			$data['tampil_data_namadisnaker'] = $this->M_surat_rekom_ppdis->tampil_data_namadisnaker();


				$data['namamodule'] = "surat_rekom_ppdis";
				$data['namafileview'] = "surat_rekom_ppdis";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "surat_rekom_ppdis";
				$data['namafileview'] = "surat_rekom_ppdis";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function simpan_data_surat($id_bio){
		$this->M_surat_rekom_ppdis->simpan_data_surat($id_bio);

		redirect('surat_rekom_ppdis/index/'.$id_bio);
	}

	function edit_surat($id_bio) {
			$this->M_surat_rekom_ppdis->edit_surat($id_bio);
			redirect('surat_rekom_ppdis/index/'.$id_bio);
	}

	function hapus_data_surat($id_bio) {
		$this->M_surat_rekom_ppdis->hapus_data_surat();
		redirect('surat_rekom_ppdis/index/'.$id_bio);
	}
        
}