<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahagen extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahagen');	
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

				$data['tampil_data_sektor'] = $this->M_tambahagen->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahagen->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahagen->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahagen->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahagen->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahagen->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahagen->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahagen->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahagen->tampil_data_personal($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahagen";
				$data['namafileview'] = "tambahagenadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahagen";
				$data['namafileview'] = "tambahagenagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function v_ubahagen(){

				$data['tampil_data_sektor'] = $this->M_tambahagen->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahagen->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahagen->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahagen->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahagen->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahagen->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahagen->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahagen->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahagen->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_agen'] = $this->M_tambahagen->tampil_data_agen($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahagen";
				$data['namafileview'] = "ubahagenadmin";
				echo Modules::run('template/admin_template', $data);


	}
	function ubahagendata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahagen->ubahagen();

		redirect('detailagen');
		}
	function tambahagendata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahagen->tambahagen();

		redirect('detailagen');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahagen');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahagen');
} 
		}

}