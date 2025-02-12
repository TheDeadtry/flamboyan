<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class durasi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_durasi');	
			$this->load->library('form_validation');
		
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

				$data['tampil_data_sektor'] = $this->M_durasi->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_durasi->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_durasi->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_durasi->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_durasi->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_durasi->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_durasi->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_durasi'] = $this->M_durasi->tampil_data_durasi($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_durasi->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_durasidetail'] = $this->M_durasi->tampil_data_durasidetail($this->session->userdata("detailuser"));

				$data['hitungdurasi'] = $this->M_durasi->hitung_data_durasi($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "durasi";
				$data['namafileview'] = "detaildurasi";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "durasi";
				$data['namafileview'] = "detaildurasi";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	function ubahdurasidata() {

// echo "".$this->session->userdata("detailuser");
$this->M_durasi->ubahdurasi();

		redirect('durasi');
		}


function tambahdurasi() {

$this->M_durasi->tambahdurasi();

		redirect('durasi');
		}

			
function v_ubahdurasi(){

				$data['tampil_data_sektor'] = $this->M_durasi->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_durasi->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_durasi->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_durasi->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_durasi->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_durasi->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_durasi->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_durasi'] = $this->M_durasi->tampil_data_durasi($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_durasi->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungdurasi'] = $this->M_durasi->hitung_data_durasi($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "durasi";
				$data['namafileview'] = "ubahdurasiadmin";
				echo Modules::run('template/admin_template', $data);


}
	function updatedurasidetail() {
		$this->M_durasi->updatedurasidetail();
		redirect('durasi');
	}

		function hapusdurasi($id) {
		$this->M_durasi->hapus_durasi($id);
		redirect('durasi');
	}


}