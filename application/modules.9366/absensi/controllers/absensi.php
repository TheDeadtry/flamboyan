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
				$data['jenis'] = $this->session->userdata("jenis");
				$data['namamodule'] = "absensi";
				$data['namafileview'] = "absensiadmin";
				echo Modules::run('template/admin_template', $data);
			}
		}
	}

	function detail_kehadiran($id) {
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
				$data['personal'] = $this->M_absensi->detail_personal($id);
				$data['dethadir'] = $this->M_absensi->detail_hadir($id);
				$data['detsakit'] = $this->M_absensi->detail_sakit($id);
				$data['detijin'] = $this->M_absensi->detail_ijin($id);
				$data['dettk'] = $this->M_absensi->detail_tk($id);
				$data['namamodule'] = "absensi";
				$data['namafileview'] = "detailkehadiran";
				echo Modules::run('template/admin_template', $data);
			}
		}
	}

	function tes() {
		$this->load->view('test.php');
	}

	function selisihtgl() {
		$tggl1 = strtotime($this->input->post('tgl1'));
		$tggl2 = strtotime($this->input->post('tgl2'));
		$selis = $tggl2 - $tggl1;
		if($selis < 0) {
			$hasl = $selis - $selis - $selis;
			$menit = floor($hasl / 60);
			$detik = floor($hasl - ($menit * 60));
			$jammm = floor($menit / 60);
			//echo $jammm." ".$menit." ".$detik."<br>";
			
			if($jammm == 0 && $menit == 0 && $detik == 0) {
				echo "Tepat waktu";
			} else if($jammm == 0 && $menit == 0 && $detik > 0) {
				echo "Telat ".$detik." detik";
			} else if($jammm == 0 && $menit > 0 && $detik == 0) {
				echo "Telat ".$menit." menit";
			} else if($jammm > 0 && $menit == 0 || $menit > 60 && $detik == 0) {
				echo "Telat ".$jammm." jam";
			} else if($jammm == 0 && $menit > 0 && $detik > 0) {
				echo "Telat ".$menit." menit, ".$detik." detik";
			} else if($jammm > 0 && $menit > 0 && $detik == 0) {
				echo "Telat ".$jammm." jam, ".$menit." menit";
			} else if($jammm > 0 && $menit == 0 && $menit == 60 && $detik > 0) {
				echo "Telat ".$jammm." jam, ".$detik." detik";
			} else if($jammm > 0 && $menit > 0 && $detik > 0) {
				echo "Telat ".$jammm." jam, ".($menit)." menit, ".$detik." detik";
			} else {
				echo "Hitungan diluar jangkauan";
			}
		} else {
			$hasl = $selis;
			$menit = $hasl / 60;
			$detik = $hasl - (floor($menit) * 60);
			$jammm = $menit / 60;
			if($jammm == 0 && $menit == 0 && $detik == 0) {
				echo "Tepat waktu";
			} else if($jammm == 0 && $menit == 0 && $detik > 0) {
				echo "Datang awal ".floor($detik)." detik";
			} else if($jammm == 0 && $menit > 0 && $detik == 0) {
				echo "Datang awal ".floor($menit)." menit";
			} else if($jammm > 0 && $menit == 0 && $detik == 0) {
				echo "Datang awal ".floor($jammm)." jam";
			} else if($jammm == 0 && $menit > 0 && $detik > 0) {
				echo "Datang awal ".floor($menit)." menit, ".floor($detik)." detik";
			} else if($jammm > 0 && $menit > 0 && $detik == 0) {
				echo "Datang awal ".floor($jammm)." jam, ".floor($menit)." menit";
			} else if($jammm > 0 && $menit == 0 && $detik > 0) {
				echo "Datang awal ".floor($jammm)." jam, ".floor($detik)." detik";
			} else if($jammm > 0 && $menit > 0 && $detik > 0) {
				echo "Datang awal ".floor($jammm)." jam, ".floor($menit-60)." menit, ".floor($detik)." detik";
			} else {
				echo "Hitungan diluar jangkauan";
			}
		}
		echo "<br>".$hasl;
	}

	function tanggal_set() {
		if(isset($_POST['tanggal'])) {
			$tggl = $this->input->post("tanggal");
			$sekt = $this->input->post("sektor");
			$jens = $this->input->post("jenis");
			$stts = "1";
			$this->session->set_userdata("tanggal",$tggl);
			$this->session->set_userdata("sektor",$sekt);
			$this->session->set_userdata("jenis",$jens);
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

	function hadir_konf($id) {
		$this->M_absensi->tambahhadir($id);
		redirect('absensi');
	}

	function tidakhadir_konf($id) {
		$this->M_absensi->tambahtidakhadir($id);
		redirect('absensi');
	}

	function tambahabsensi($id) {
		$this->M_absensi->tambah($id);
		redirect('absensi');
	}
}