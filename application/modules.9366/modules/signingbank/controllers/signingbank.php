<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Signingbank extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_signingbank');	
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

				$data['tampil_data_sektor'] = $this->M_signingbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_signingbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_signingbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_signingbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_signingbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_signingbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_signingbank->tampil_data_provinsi();
				$data['tampil_data_bank'] = $this->M_signingbank->tampil_data_bank();
				$data['tampil_data_kredit'] = $this->M_signingbank->tampil_data_kredit();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_signing'] = $this->M_signingbank->tampil_data_signing($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_signingbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungsigning'] = $this->M_signingbank->hitung_data_signing($this->session->userdata("detailuser"));
				$data['tampil_datasigning'] = $this->M_signingbank->tampil_datasigning();

				
			//user sudah login
				$data['namamodule'] = "signingbank";
				$data['namafileview'] = "detailsigning";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "signingbank";
				$data['namafileview'] = "detailsigning";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
function ubahsigning() {

$this->M_signingbank->ubahsigning();

		redirect('signingbank');
		}

				function tampilemail() {

			$data['tampil_data_sektor'] = $this->M_signingbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_signingbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_signingbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_signingbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_signingbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_signingbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_signingbank->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_signing'] = $this->M_signingbank->tampil_data_signing($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_signingbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungsigning'] = $this->M_signingbank->hitung_data_signing($this->session->userdata("detailuser"));
				$data['tampil_datasigning'] = $this->M_signingbank->tampil_datasigning();

				
			//user sudah login
				$data['namamodule'] = "signingbank";
				$data['namafileview'] = "detailemail";
				echo Modules::run('template/admin_template', $data);
		}
function ubahemail() {

$this->M_signingbank->ubahemail();

		redirect('signingbank/tampilemail');
		}

						function tampilsetelahterbang() {

			$data['tampil_data_sektor'] = $this->M_signingbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_signingbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_signingbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_signingbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_signingbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_signingbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_signingbank->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_signing'] = $this->M_signingbank->tampil_data_signing($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_signingbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungsigning'] = $this->M_signingbank->hitung_data_signing($this->session->userdata("detailuser"));
				$data['tampil_datasigning'] = $this->M_signingbank->tampil_datasigning();

				
			//user sudah login
				$data['namamodule'] = "signingbank";
				$data['namafileview'] = "detailketterbang";
				echo Modules::run('template/admin_template', $data);
		}



function ubahsetelahterbang() {

$this->M_signingbank->ubahsetelahterbang();

		redirect('signingbank/tampilsetelahterbang');
		}
			
function tampilberkas() {

			$data['tampil_data_sektor'] = $this->M_signingbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_signingbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_signingbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_signingbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_signingbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_signingbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_signingbank->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_signing'] = $this->M_signingbank->tampil_data_signing($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_signingbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungsigning'] = $this->M_signingbank->hitung_data_signing($this->session->userdata("detailuser"));
				$data['tampil_datasigning'] = $this->M_signingbank->tampil_datasigning();

				
			//user sudah login
				$data['namamodule'] = "signingbank";
				$data['namafileview'] = "detailberkas";
				echo Modules::run('template/admin_template', $data);
		}
function ubahberkas() {

$this->M_signingbank->ubahberkas();

		redirect('signingbank/tampilberkas');
		}
			

function tampilambildokumen() {

			$data['tampil_data_sektor'] = $this->M_signingbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_signingbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_signingbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_signingbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_signingbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_signingbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_signingbank->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_signing'] = $this->M_signingbank->tampil_data_signing($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_signingbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungsigning'] = $this->M_signingbank->hitung_data_signing($this->session->userdata("detailuser"));
				$data['tampil_datasigning'] = $this->M_signingbank->tampil_datasigning();

				
			//user sudah login
$data['namamodule'] = "signingbank";
				$data['namafileview'] = "detailambildokumen";
				echo Modules::run('template/admin_template', $data);
		}
function ubahambil() {

$this->M_signingbank->ubahambil();

		redirect('signingbank/tampilambildokumen');
		}


function tampilujk() {

			$data['tampil_data_sektor'] = $this->M_signingbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_signingbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_signingbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_signingbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_signingbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_signingbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_signingbank->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_signing'] = $this->M_signingbank->tampil_data_signing($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_signingbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungsigning'] = $this->M_signingbank->hitung_data_signing($this->session->userdata("detailuser"));
				$data['tampil_datasigning'] = $this->M_signingbank->tampil_datasigning();

				
			//user sudah login
$data['namamodule'] = "signingbank";
				$data['namafileview'] = "detailujk";
				echo Modules::run('template/admin_template', $data);
		}
function ubahujk() {

$this->M_signingbank->ubahujk();

		redirect('signingbank/tampilujk');
		}
			

}