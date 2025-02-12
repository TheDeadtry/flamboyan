<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class dashboard_surat_perjanjian extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_dashboard_surat_perjanjian');			
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

				$data['hitung_data_mf'] = $this->M_dashboard_surat_perjanjian->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard_surat_perjanjian->hitung_data_mi();
				$data['hitung_data_jp'] = $this->M_dashboard_surat_perjanjian->hitung_data_jp();


			$data['tampil_data_personal'] = $this->M_dashboard_surat_perjanjian->tampil_data_personal();
			$data['tampil_data_personal2'] = $this->M_dashboard_surat_perjanjian->tampil_data_personal2();
			$data['tampil_data_personal3'] = $this->M_dashboard_surat_perjanjian->tampil_data_personal3();
			
				$data['namamodule'] = "dashboard_surat_perjanjian";
				$data['namafileview'] = "dashboard_surat_perjanjian";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "dashboard_surat_perjanjian";
				$data['namafileview'] = "dashboard_surat_perjanjian";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
}