<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan!');
class Template extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("m_template");
		$this->load->model("M_session");
		//$this->check_statterbang();
	}

	function check_statterbang()
	{
		$tanggal_sekarang = date('Y-m-d');

		$ambil_data = $this->M_session->select("SELECT 
			personal.id_biodata,
			personal.statterbang,
			visa.tanggalterbang 
			FROM personal
			JOIN visa ON personal.id_biodata=visa.id_biodata
			where statterbang != 1
			and tanggalterbang != ''
			order by statterbang, tanggalterbang desc
		");

		if ( $ambil_data != NULL )
		{
			$datass = array(
				'statterbang' => 1
			);
			foreach ( $ambil_data as $key => $value )
			{
				$tanggalterbang = str_replace(".", "-", $value->tanggalterbang);
				if ( $tanggalterbang < $tanggal_sekarang )
				{
					$this->M_session->update($datass, "personal", $value->id_biodata, "id_biodata");
				}
			}
		}

		return true;
	}

	public function admin_template($data){
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		
		$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_admin($username);
		$this->load->view('view_admin_template', $data);
	}
	public function blk_template($data){
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
				$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_agen($username);

	//	$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_kec($username);
		$this->load->view('view_blk_template', $data);
	}

	public function group_template($data){
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_group($username);

	//	$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_kec($username);
		$this->load->view('view_group_template', $data);
	}

	function agen_template($data){
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		$ss1 		= "SELECT nama FROM dataagen where kode_agen='".$username."'";
		$data['tampil_nama_user'] = $this->M_session->select_row($ss1)->nama;
		$this->load->view('view_kosongan3', $data);
	}
	
		public function login_template($data){
		$this->load->view('view_login_template', $data);
	}

		public function kosongan_template($data){
		$this->check_statterbang();
		$this->load->view('view_kosongan', $data);
	}
		public function kosongan_template2($data){
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		
		$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_admin($username);
		$this->load->view('view_kosongan2', $data);
	}

	public function menu_utama(){
		$this->load->view('menu_utama');
	}

	public function new_admin_template($data) {
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		
		$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_admin($username);
		$this->load->view('view_new_admin_template', $data);
	}

	public function new_admin_template3($data) {
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		
		$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_admin($username);
		$this->load->view('view_new_admin_template3', $data);
	}

	public function new_admin2_template($data) {
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		
		$data['tampil_nama_user'] = $this->m_template->tampil_pengguna_admin($username);
		$this->load->view('view_new_admin2_template', $data);
	}

	function bootstrap3($data){
		$this->check_statterbang();
		$session = $this->M_session->get_session();
		$username = $session['session_userid'];
		$this->load->view('bootstrap3', $data);
	}

}