<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Databio extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_databio');			
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

			$data['hitung_data_mf'] = $this->M_databio->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_databio->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_databio->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_databio->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_databio->hitung_data_jp();
				$data['tampil_data_personal'] = $this->M_databio->tampil_data_personal();



				$data['namamodule'] = "databio";
				$data['namafileview'] = "databioadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "databio";
				$data['namafileview'] = "databioagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

  public function deletedata($user_id) {

        $this->M_databio->delete_personal($user_id);
		redirect('databio');

        }

	  public function detaildata($user_id) {

	  	  	$this->session->set_userdata("detailuser",$user_id);

		redirect('detailpersonal');

        }
	
}