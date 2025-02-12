<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Dataadmin extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_dataadmin');			
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

			$data['hitung_data_mf'] = $this->M_dataadmin->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dataadmin->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dataadmin->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dataadmin->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dataadmin->hitung_data_jp();
				$data['tampil_data_personal'] = $this->M_dataadmin->tampil_data_personal();



				$data['namamodule'] = "dataadmin";
				$data['namafileview'] = "dataadminadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "dataadmin";
				$data['namafileview'] = "dataadminagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

  public function deletedata($user_id) {

        $this->M_dataadmin->delete_personal($user_id);
		redirect('dataadmin');

        }

	  public function detaildata($user_id) {

	  	  	$this->session->set_userdata("detailuser",$user_id);

		redirect('detailpersonal');

        }
	
}