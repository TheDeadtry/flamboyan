<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pencairan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pencairan');	
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

				$data['tampil_data_sektor'] = $this->M_pencairan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_pencairan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_pencairan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_pencairan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_pencairan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_pencairan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_pencairan->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pencairan'] = $this->M_pencairan->tampil_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_pencairan->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpencairan'] = $this->M_pencairan->hitung_data_pencairan($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "pencairan";
				$data['namafileview'] = "detailpencairan";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "pencairan";
				$data['namafileview'] = "detailpencairan";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
function ubahpencairan() {

$this->M_pencairan->ubahpencairan();

		redirect('pencairan');
		}

				function tampilemail() {

			$data['tampil_data_sektor'] = $this->M_pencairan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_pencairan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_pencairan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_pencairan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_pencairan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_pencairan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_pencairan->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pencairan'] = $this->M_pencairan->tampil_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_pencairan->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpencairan'] = $this->M_pencairan->hitung_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_datapencairan'] = $this->M_pencairan->tampil_datapencairan();

				
			//user sudah login
				$data['namamodule'] = "pencairan";
				$data['namafileview'] = "detailemail";
				echo Modules::run('template/admin_template', $data);
		}
function ubahemail() {

$this->M_pencairan->ubahemail();

		redirect('pencairan/tampilemail');
		}

						function tampilsetelahterbang() {

			$data['tampil_data_sektor'] = $this->M_pencairan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_pencairan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_pencairan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_pencairan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_pencairan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_pencairan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_pencairan->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pencairan'] = $this->M_pencairan->tampil_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_pencairan->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpencairan'] = $this->M_pencairan->hitung_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_datapencairan'] = $this->M_pencairan->tampil_datapencairan();

				
			//user sudah login
				$data['namamodule'] = "pencairan";
				$data['namafileview'] = "detailketterbang";
				echo Modules::run('template/admin_template', $data);
		}



function ubahsetelahterbang() {

$this->M_pencairan->ubahsetelahterbang();

		redirect('pencairan/tampilsetelahterbang');
		}
			
function tampilberkas() {

			$data['tampil_data_sektor'] = $this->M_pencairan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_pencairan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_pencairan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_pencairan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_pencairan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_pencairan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_pencairan->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pencairan'] = $this->M_pencairan->tampil_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_pencairan->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpencairan'] = $this->M_pencairan->hitung_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_datapencairan'] = $this->M_pencairan->tampil_datapencairan();

				
			//user sudah login
				$data['namamodule'] = "pencairan";
				$data['namafileview'] = "detailberkas";
				echo Modules::run('template/admin_template', $data);
		}
function ubahberkas() {

$this->M_pencairan->ubahberkas();

		redirect('pencairan/tampilberkas');
		}
			

function tampilambildokumen() {

			$data['tampil_data_sektor'] = $this->M_pencairan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_pencairan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_pencairan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_pencairan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_pencairan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_pencairan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_pencairan->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pencairan'] = $this->M_pencairan->tampil_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_pencairan->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpencairan'] = $this->M_pencairan->hitung_data_pencairan($this->session->userdata("detailuser"));
				$data['tampil_datapencairan'] = $this->M_pencairan->tampil_datapencairan();

				
			//user sudah login
$data['namamodule'] = "pencairan";
				$data['namafileview'] = "detailambildokumen";
				echo Modules::run('template/admin_template', $data);
		}
function ubahambil() {

$this->M_pencairan->ubahambil();

		redirect('pencairan/tampilambildokumen');
		}
			

}