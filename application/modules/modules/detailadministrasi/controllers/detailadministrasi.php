<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailadministrasi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailadministrasi');	
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
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_sektor'] = $this->M_detailadministrasi->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailadministrasi->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailadministrasi->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailadministrasi->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailadministrasi->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailadministrasi->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailadministrasi->tampil_data_provinsi();
				$data['hitung_biodatamf'] = $this->M_detailadministrasi->hitung_biodatamf($this->session->userdata("detailuser"));
				$data['hitung_biodatafi'] = $this->M_detailadministrasi->hitung_biodatafi($this->session->userdata("detailuser"));
				$data['hitung_biodatajp'] = $this->M_detailadministrasi->hitung_biodatajp($this->session->userdata("detailuser"));
				$data['hitung_family'] = $this->M_detailadministrasi->hitung_family($this->session->userdata("detailuser"));
				$data['hitung_working'] = $this->M_detailadministrasi->hitung_working($this->session->userdata("detailuser"));
				$data['hitung_skill'] = $this->M_detailadministrasi->hitung_skillcondition($this->session->userdata("detailuser"));
				$data['hitung_request'] = $this->M_detailadministrasi->hitung_request($this->session->userdata("detailuser"));
				$data['hitung_pengalaman'] = $this->M_detailadministrasi->hitung_pengalaman($this->session->userdata("detailuser"));
				$data['hitung_tugas'] = $this->M_detailadministrasi->hitung_tugas($this->session->userdata("detailuser"));
				$data['hitung_kettugas'] = $this->M_detailadministrasi->hitung_kettugas($this->session->userdata("detailuser"));
				$data['hitung_interview'] = $this->M_detailadministrasi->hitung_interview($this->session->userdata("detailuser"));
				$data['hitung_paspor'] = $this->M_detailadministrasi->hitung_paspor($this->session->userdata("detailuser"));
				$data['hitung_medical'] = $this->M_detailadministrasi->hitung_medical($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailadministrasi->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_sponsor'] = $this->M_detailadministrasi->tampil_data_sponsor();


				
			//user sudah login
				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "detailadministrasi";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "detailadministrasiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

		function ubahpersonal(){


				$data['tampil_data_sektor'] = $this->M_detailadministrasi->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailadministrasi->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailadministrasi->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailadministrasi->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailadministrasi->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailadministrasi->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailadministrasi->tampil_data_provinsi();

				$data['personalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_detailadministrasi->tampil_data_personal($this->session->userdata("detailuser"));

$data['tampil_data_sponsor'] = $this->M_detailadministrasi->tampil_data_sponsor();

				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "ubahpersonal";
				echo Modules::run('template/admin_template', $data);
	}

			function ubahdatapersonal(){

$idnya = $this->input->post("idp");

//echo "aasas".$idnya;

		$this->M_detailadministrasi->ubahpersonal();
		redirect('detailadministrasi');
		}

function ubahstatus(){

$idnya = $this->input->post("idp");

//echo "aasas".$idnya;

		$this->M_detailadministrasi->ubahstatus();
		redirect('detailadministrasi');
		}

	function tambahbiodata() {

// $idnya = $this->input->post("idp");

// echo "aasas".$idnya;
$this->form_validation->set_rules('idp', 'Idp', 'trim|required|is_unique[personal.id_biodata]');

$this->M_tambahbio->tambahpersonal();

		redirect('tambahbio');
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