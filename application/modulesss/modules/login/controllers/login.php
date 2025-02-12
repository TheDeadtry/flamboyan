<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Login extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');	
			$this->load->model('M_dashboard');				
	}
	
	function index(){
		    $data['namamodule'] = "login";
            $data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
	}
	
	function proses(){
	$this->load->model('M_master_userid','',true);
		
		// tangkap data dari inputan form
		$userid = $_POST['userid'];
		$password = sha1($_POST['password']);
		//$password = sha1(sha1($_POST['password']).$_POST['password']);
		
		// validasi form
		$this->form_validation->set_rules('userid', 'Userid', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->run();
		
		//  inisialisasi variabel
		$data['userid'] = '';
		$data['password'] = '';
		$data['status'] = '';
		
		// ambil record dari tabel user
		$result= $this->M_master_userid->get_userid($userid);
		
		foreach ($result->result() as $row ){
			$data['userid'] = $row->username;
			$data['password'] = $row->password;
			$data['status'] = $row->status;
		}
		
		// bandingkan inputan form dengan record tabel
		if ($userid==$data['userid'] and $password==$data['password']){
			//echo $data['status'];
			$status = $data['status'];
			$this->M_session->store_session($userid,$status);  // simpan session userid
			
			if($data['status']==1){




				$this->dashboard_admin();
			}
			else if($data['status']==2){
				$this->dashboard_agen();
			}
			else{
				redirect('login');
			}
		}else{
			//redirect('login');
			$this->index();
		}
	
	}
	
	function dashboard_admin(){
				$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();

		
		$data['namamodule'] = "dashboard";
        $data['namafileview'] = "admin";
		
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		$this->session->set_userdata("idbiodata","");
		$this->session->set_userdata("jeniskelamin","");
		$this->session->set_userdata("detailuser","");

		//echo "adminnya";
		echo Modules::run('template/admin_template', $data);		
	}
	
	function dashboard_agen(){
		$data['namamodule'] = "dashboard";
        $data['namafileview'] = "agen";
		
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			

		echo Modules::run('template/agen_template', $data);		
	}
	
}