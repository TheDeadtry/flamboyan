<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Setting extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_setting');			
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
				$data['namamodule'] = "setting";
				$data['namafileview'] = "settingadmin";
				echo Modules::run('template/new_admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "setting";
				$data['namafileview'] = "settingagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}

	function spbg(){
		$this->session->set_userdata('backagen', 'malaysia');
		$data['namamodule'] = "setting";
		$data['namafileview'] = "spbg";
		echo Modules::run('template/admin_template', $data);
	}

	function spbg_accurate(){
		$this->session->set_userdata('backagen', 'malaysia');
		$data['namamodule'] = "setting";
		$data['namafileview'] = "spbg_accurate";
		echo Modules::run('template/admin_template', $data);
	}

	function spbg_accurate_tki($id=null){
		$this->session->set_userdata('backagen', 'malaysia');
		$data['id'] = $id;
		$data['namamodule'] = "setting";
		$data['namafileview'] = "spbg_accurate_tki";
		echo Modules::run('template/admin_template', $data);
	}

	function cetak_spbg_tahunan(){
		$data['namamodule'] = "setting";
		$data['namafileview'] = "spbg_tahunan";
		echo Modules::run('template/new_admin2_template', $data);
	}


	function laporan(...$data){
		if(isset($data[0])){
			$this->load->model('lap_'.$data[0]);
			$lapoption = ucfirst('lap_'.$data[0]);
			$lap = new $lapoption();
			$lap->index();
		}
	}

	function spbg_formal(){
		$this->session->set_userdata('backagen', 'malaysia');
		$data['namamodule'] = "setting";
		$data['namafileview'] = "spbg_formal";
		echo Modules::run('template/admin_template', $data);
	}

	function spbg_informal(){
		$this->session->set_userdata('backagen', 'malaysia');
		$data['namamodule'] = "setting";
		$data['namafileview'] = "spbg_informal";
		echo Modules::run('template/admin_template', $data);
	}

	function biaya_pelatihan(){
		$this->session->set_userdata('backagen', 'malaysia');
		$data['namamodule'] = "setting";
		$data['namafileview'] = "biaya_pelatihan";
		echo Modules::run('template/admin_template', $data);
	}
	
}