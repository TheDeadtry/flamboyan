<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class databiofemaleformal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_databiofemaleformal');			
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

			$data['tampil_data_personal'] = $this->M_databiofemaleformal->tampil_data_personal();



				$data['namamodule'] = "databiofemaleformal";
				$data['namafileview'] = "databiofemaleformaladmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){

							$data['tampil_data_personal'] = $this->M_databiofemaleformal->tampil_data_personal();

				
				$data['namamodule'] = "databiofemaleformal";
				$data['namafileview'] = "databiofemaleformalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

  public function deletedata($user_id) {

        $this->M_databiofemaleformal->delete_personal($user_id);
		redirect('databiofemaleformal');

        }

	  public function detaildata($user_id) {

	  	  	$this->session->set_userdata("detailuser",$user_id);

		redirect('detailpersonal');

        }

         public function detaildataupload($user_id) {

	  	  	$this->session->set_userdata("detailuser",$user_id);

		redirect('detailupload');

        }
	
}