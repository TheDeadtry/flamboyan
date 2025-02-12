<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailmedical extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailmedical');	
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

				$data['tampil_data_sektor'] = $this->M_detailmedical->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailmedical->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailmedical->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailmedical->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailmedical->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailmedical->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailmedical->tampil_data_provinsi();
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pilihanmedical'] = $this->M_detailmedical->tampil_data_pilihanmedical();

				$data['detailmedicalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_medical'] = $this->M_detailmedical->tampil_data_medical($this->session->userdata("detailuser"));
				$data['tampil_data_medical2'] = $this->M_detailmedical->tampil_data_medical2($this->session->userdata("detailuser"));
				$data['tampil_data_medical3'] = $this->M_detailmedical->tampil_data_medical3($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailmedical->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungmedical'] = $this->M_detailmedical->hitung_data_medical($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailmedical";
				$data['namafileview'] = "detailmedical";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailmedical";
				$data['namafileview'] = "detailmedicalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
function ubahstatus(){

$idnya = $this->input->post("idp");

//echo "aasas".$idnya;

		$this->M_detailmedical->ubahstatus();
		redirect('detailmedical');
		}

	function tambahbiodata() {

// $idnya = $this->input->post("idp");

// echo "aasas".$idnya;
$this->form_validation->set_rules('idp', 'Idp', 'trim|required|is_unique[medical.id_biodata]');

$this->M_tambahbio->tambahmedical();

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

		function tambahmedicaldata() {
		$this->M_detailmedical->tambahmedical();
		redirect('detailmedical');
		}

		function ubahmedicaldata() {
		$this->M_detailmedical->ubahmedical();
		redirect('detailmedical');
		}

		function hapusmedical() {
		$this->M_detailmedical->hapusmedical();
		redirect('detailmedical');
		}

		function tambahmedicaldata2() {
		$this->M_detailmedical->tambahmedical2();
		redirect('detailmedical');
		}

		function ubahmedicaldata2() {
		$this->M_detailmedical->ubahmedical2();
		redirect('detailmedical');
		}

		function hapusmedical2() {
		$this->M_detailmedical->hapusmedical2();
		redirect('detailmedical');
		}

		function tambahmedicaldata3() {
		$this->M_detailmedical->tambahmedical3();
		redirect('detailmedical');
		}

		function ubahmedicaldata3() {
		$this->M_detailmedical->ubahmedical3();
		redirect('detailmedical');
		}

		function hapusmedical3() {
		$this->M_detailmedical->hapusmedical3();
		redirect('detailmedical');
		}

}