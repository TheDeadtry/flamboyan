<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Personal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_personal');	
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

				$data['tampil_data_sektor'] = $this->M_personal->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_personal->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_personal->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_personal->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_personal->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_personal->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_personal->tampil_data_provinsi();

				$data['personalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_personal->tampil_data_personal($this->session->userdata("detailuser"));


				
			//user sudah login
				$data['namamodule'] = "personal";
				$data['namafileview'] = "personal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "personal";
				$data['namafileview'] = "personalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function ubahpersonal(){


				$data['tampil_data_sektor'] = $this->M_personal->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_personal->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_personal->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_personal->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_personal->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_personal->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_personal->tampil_data_provinsi();

				$data['personalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_personal->tampil_data_personal($this->session->userdata("detailuser"));


				$data['namamodule'] = "personal";
				$data['namafileview'] = "ubahpersonal";
				echo Modules::run('template/admin_template', $data);
	}


	function tambahpersonal() {
	$data['tampil_data_sektor'] = $this->M_personal->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_personal->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_personal->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_personal->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_personal->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_personal->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_personal->tampil_data_provinsi();

				$data['personalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_personal->tampil_data_personal($this->session->userdata("detailuser"));


$data['idbiodatanya'] = $this->session->userdata("idbiodata");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");

				$data['namamodule'] = "personal";
				$data['namafileview'] = "tambahpersonal";
				echo Modules::run('template/admin_template', $data);
		}

		function ubahdatapersonal(){

$idnya = $this->input->post("idp");

echo "aasas".$idnya;

		$this->M_personal->ubahpersonal();
		//redirect('personal/personal');
		}

	function tambahbiodata() {

$idnya = $this->input->post("idp");
$idarr = explode("-", $idnya);

//echo "aasas".$idarr[0];

$dataid = $this->M_personal->getnourut($idarr[0])+1;
//echo "aasas".$dataid;

$this->M_personal->updateidsektor($idarr[0],$dataid);
$this->M_personal->tambahpersonal();

  	$this->session->set_userdata("idbiodata","");
  	$this->session->set_userdata("jeniskelamin","");
	$this->session->set_userdata("detailuser",$idnya);

		redirect('personal/tambahpersonal');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('personal/tambahpersonal');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('personal/tambahpersonal');
} 
		}

}