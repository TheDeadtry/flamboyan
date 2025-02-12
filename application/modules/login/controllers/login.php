<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Login extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');	
			$this->load->model('M_dashboard');				
	}
	
	function index(){
		redirect('template/menu_utama');
	}
	
	function login_admin()
	{
		    $data['namamodule'] = "login";
	        $data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
	}
	
	function login_blk()
	{
		    $data['namamodule'] = "login";
	        $data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
	}
	
	function login_agen(){
		$session = $this->M_session->get_session();
		$status = $session['session_status'];

		    $data['namamodule'] = "login";
	        $data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
	}

	// function sha(){
	// 	echo sha1('Flamboyan$123$');
	// }
	
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
		$sqlll = "select a.status,a.username,a.password from user a where lower(username)='$userid' 
										union select b.status,b.username,b.password from datagroup b where lower(username)='$userid'
										union select CONCAT('3') AS status,c.kode_agen as username,c.password from dataagen c where lower(kode_agen)=lower('".$userid."')
										";
		echo $sqlll;
		foreach ($result->result() as $row ){
			$data['userid'] = $row->username;
			$data['password'] = $row->password;
			$data['status'] = $row->status;
		}
		
		// bandingkan inputan form dengan record tabel
		if (strtolower($userid)==strtolower($data['userid']) and strtolower($password)==strtolower($data['password'])){
			//echo $data['status'];
			$status = $data['status'];
			$this->M_session->store_session($userid,$status);  // simpan session userid
			
			if($data['status']==1){
				redirect('dashboard');
				//$this->dashboard_admin();
			}
			else if($data['status']==2){
				
				redirect('dashboard');
			}
			else if($data['status']==3){
				
				redirect('dashboard');
			}
			else{
				redirect('login');
			}
		}else{
			//redirect('login');
			$this->index();
		}
	
	}
	
	function dashboard_admin(){/*
				$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();

				$data['hitung_data_mf_md'] = $this->M_dashboard->hitung_data_mf_md();
				$data['hitung_data_mi_md'] = $this->M_dashboard->hitung_data_mi_md();
				$data['hitung_data_ff_md'] = $this->M_dashboard->hitung_data_ff_md();
				$data['hitung_data_fi_md'] = $this->M_dashboard->hitung_data_fi_md();
				$data['hitung_data_jp_md'] = $this->M_dashboard->hitung_data_jp_md();

				$data['hitung_data_mf_terbang'] = $this->M_dashboard->hitung_data_mf_terbang();
				$data['hitung_data_mi_terbang'] = $this->M_dashboard->hitung_data_mi_terbang();
				$data['hitung_data_ff_terbang'] = $this->M_dashboard->hitung_data_ff_terbang();
				$data['hitung_data_fi_terbang'] = $this->M_dashboard->hitung_data_fi_terbang();
				$data['hitung_data_jp_terbang'] = $this->M_dashboard->hitung_data_jp_terbang();

				$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();*/

		
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		$this->session->set_userdata("idbiodata","");
		$this->session->set_userdata("jeniskelamin","");
		$this->session->set_userdata("detailuser","");

		
		$data['namamodule'] = "dashboard";
        $data['namafileview'] = "admin";
		//echo "adminnya";
		echo Modules::run('template/admin_template', $data);		
	}
	
	function dashboard_agen(){
		
				$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();
$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();

		
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		$this->session->set_userdata("idbiodata","");
		$this->session->set_userdata("jeniskelamin","");
		$this->session->set_userdata("detailuser","");

		
			
		$data['namamodule'] = "dashboard";
        $data['namafileview'] = "agen";
		echo Modules::run('template/agen_template', $data);		
	}

		function dashboard_group(){
			$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();
				$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();

		
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		$this->session->set_userdata("idbiodata","");
		$this->session->set_userdata("jeniskelamin","");
		$this->session->set_userdata("detailuser","");
			
		$data['namamodule'] = "dashboard";
        $data['namafileview'] = "group";
		echo Modules::run('template/group_template', $data);	
	}

	function super_user() {
		redirect('super');
	}
	
}