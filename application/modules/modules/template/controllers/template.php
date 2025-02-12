<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan!');
class Template extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("m_template");
		$this->load->model("M_session");
	}	
	public function admin_template($data){
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		
		$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_admin($username);
		$this->load->view('view_admin_template', $data);
	}
	public function agen_template($data){
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
				$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_agen($username);

	//	$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_kec($username);
		$this->load->view('view_agen_template', $data);
	}

	public function group_template($data){
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
				$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_group($username);

	//	$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_kec($username);
		$this->load->view('view_group_template', $data);
	}
	
		public function login_template($data){
		$this->load->view('view_login_template', $data);
	}
	public function menu_utama(){
		$this->load->view('menu_utama');
	}

}