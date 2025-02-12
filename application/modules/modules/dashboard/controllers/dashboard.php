<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Dashboard extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_dashboard');			
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

				$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();
				$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();


			//user sudah login
				$data['namamodule'] = "dashboard";
				$data['namafileview'] = "admin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$id_user = $session['session_userid'];
		//$id_agen = $this->M_dashboard->tampil_pengguna_agen($id_user);
$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();
				$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();


				$data['namamodule'] = "dashboard";
				$data['namafileview'] = "agen";
				echo Modules::run('template/agen_template', $data); 
			}			
			else if ($id_user && $status==3){

				$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();
				$data['tampil_data_personal_group'] = $this->M_dashboard->tampil_data_personal_group();
								$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();

				$data['namamodule'] = "dashboard";
				$data['namafileview'] = "group";
				echo Modules::run('template/group_template', $data); 
			}
		
		}
		 
	}
	
}