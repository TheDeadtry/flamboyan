<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahbio extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahbio');	
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

				$data['tampil_data_sektor'] = $this->M_tambahbio->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahbio->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahbio->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahbio->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahbio->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahbio->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahbio->tampil_data_provinsi();

				$data['idbiodatanya'] = $this->session->userdata("idbiodata");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");



				
			//user sudah login
				$data['namamodule'] = "tambahbio";
				$data['namafileview'] = "tambahbioadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahbio";
				$data['namafileview'] = "tambahbioagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function tambahbiodata() {

$idnya = $this->input->post("idp");
$idarr = explode("-", $idnya);

//echo "aasas".$idarr[0];

$dataid = $this->M_tambahbio->getnourut($idarr[0])+1;
//echo "aasas".$dataid;

$this->M_tambahbio->updateidsektor($idarr[0],$dataid);
$this->M_tambahbio->tambahpersonal();

  	$this->session->set_userdata("idbiodata","");
  	$this->session->set_userdata("jeniskelamin","");
	$this->session->set_userdata("detailuser",$idnya);

		redirect('detailpersonal');
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