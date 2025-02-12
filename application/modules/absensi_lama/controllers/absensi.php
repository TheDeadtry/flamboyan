<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Absensi extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		$this->load->model('M_absensi');			
	}

	function index() {
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']) {
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status == 1) {
				//user sudah login
				$data['bulan'] = $this->session->userdata("bulan");
				$data['tahun'] = $this->session->userdata("tahun");
				$data['personal'] = $this->M_absensi->tampil_data_personal();
				$data['absensi'] = $this->M_absensi->tampil_data_absensi();
				$data['tampt'] = $this->M_absensi->tampil_data_tahun();
				$data['masuk'] = $this->M_absensi->get_masuk();
				$data['sakit'] = $this->M_absensi->get_sakit();
				$data['ijin'] = $this->M_absensi->get_ijin();
				$data['alpha'] = $this->M_absensi->get_alpha();
				$data['tanggal'] = $this->session->userdata("tanggal");
				$data['sektor'] = $this->session->userdata("sektor");
				$data['namamodule'] = "absensi";
				$data['namafileview'] = "absensiadmin";
				echo Modules::run('template/admin_template', $data);
			}
		}
	}

	function tanggal_set() {
		if(isset($_POST['tanggal'])) {
			$tggl = $this->input->post("tanggal");
			$sekt = $this->input->post("sektor");
			$stts = "1";
			$this->session->set_userdata("tanggal",$tggl);
			$this->session->set_userdata("sektor",$sekt);
			$this->session->set_userdata("status",$stts);
			redirect('absensi');
		}
	}

	function detail() {
		if(isset($_POST['bulantahun'])) {
			$buln = $this->input->post("bulan");
			$tahn = $this->input->post("tahun");
			$sekt = $this->input->post("sektor");
			$stts = "2";
			$this->session->set_userdata("status",$stts);
			$this->session->set_userdata("bulan",$buln);
			$this->session->set_userdata("tahun",$tahn);
			$this->session->set_userdata("sektor",$sekt);
			$data['bulan'] = $this->session->userdata("bulan");
			$data['tahun'] = $this->session->userdata("tahun");
			$data['personal'] = $this->M_absensi->tampil_data_personal();
			$data['absensi'] = $this->M_absensi->tampil_absensi_detail();
			$data['tampt'] = $this->M_absensi->tampil_data_tahun();
			$data['masuk'] = $this->M_absensi->get_masuk();
			$data['sakit'] = $this->M_absensi->get_sakit();
			$data['ijin'] = $this->M_absensi->get_ijin();
			$data['alpha'] = $this->M_absensi->get_alpha();
			$data['tanggal'] = $this->session->userdata("tanggal");
			$data['status'] = $this->session->userdata("status");
			$data['sektor'] = $this->session->userdata("sektor");
			$data['namamodule'] = "absensi";
			$data['namafileview'] = "detailabsensi";
			echo Modules::run('template/admin_template', $data);
		}
	}

	function tambah_absensi($id) {
		$data['personal'] = $this->M_absensi->ambil_id($id);
		$data['tanggal'] = $this->session->userdata("tanggal");
		$data['namamodule'] = "absensi";
		$data['namafileview'] = "tambahabsensi";
		echo Modules::run('template/admin_template', $data);
	}

	function tambahabsensi($id) {
		$this->M_absensi->tambah($id);
		redirect('absensi');
	}
}