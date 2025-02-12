<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailbank extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailbank');	
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

				$data['tampil_data_sektor'] = $this->M_detailbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailbank->tampil_data_provinsi();
				$data['tampil_data_pilihanbank'] = $this->M_detailbank->tampil_data_pilihanbank();


				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_bank'] = $this->M_detailbank->tampil_data_bank($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungbank'] = $this->M_detailbank->hitung_data_bank($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailbank";
				$data['namafileview'] = "detailbank";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailbank";
				$data['namafileview'] = "detailbankagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

		function vtambahbank() {
				$data['tampil_data_sektor'] = $this->M_detailbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailbank->tampil_data_provinsi();

				$data['detailbankid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['tampil_data_pilihanbank'] = $this->M_detailbank->tampil_data_pilihanbank();

				$data['tampil_data_bank'] = $this->M_detailbank->tampil_data_bank($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungbank'] = $this->M_detailbank->hitung_data_bank($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailbank";
				$data['namafileview'] = "tambahbank";
				echo Modules::run('template/admin_template', $data);

		}

				function vubahbank() {
				$data['tampil_data_sektor'] = $this->M_detailbank->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailbank->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailbank->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailbank->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailbank->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailbank->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailbank->tampil_data_provinsi();
				$data['tampil_data_pilihanbank'] = $this->M_detailbank->tampil_data_pilihanbank();

				$data['detailbankid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");

				$data['tampil_data_bank'] = $this->M_detailbank->tampil_data_bank($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailbank->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungbank'] = $this->M_detailbank->hitung_data_bank($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailbank";
				$data['namafileview'] = "ubahbank";
				echo Modules::run('template/admin_template', $data);

		}



	function tambahbank() {

$this->M_detailbank->tambahbank();

		redirect('detailbank');
		}
			function ubahbank() {

$this->M_detailbank->ubahbank();

		redirect('detailbank');
		}


function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahbio');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahbio');
} 
		}

}