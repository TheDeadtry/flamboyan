<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahfamily extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahfamily');	
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

				$data['tampil_data_sektor'] = $this->M_tambahfamily->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahfamily->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahfamily->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahfamily->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahfamily->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahfamily->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahfamily->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahfamily->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahfamily->tampil_data_personal($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahfamily";
				$data['namafileview'] = "tambahfamilyadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahfamily";
				$data['namafileview'] = "tambahfamilyagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function v_ubah_family(){


				$data['tampil_data_sektor'] = $this->M_tambahfamily->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahfamily->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahfamily->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahfamily->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahfamily->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahfamily->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahfamily->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahfamily->tampil_data_jobs();

				$data['tampil_data_family'] = $this->M_tambahfamily->tampil_data_family($this->session->userdata("detailuser"));

				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahfamily->tampil_data_personal($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahfamily";
				$data['namafileview'] = "ubahfamilyadmin";
				echo Modules::run('template/admin_template', $data);


	}

		function ubahfamilydata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahfamily->ubahfamily();

		redirect('detailfamily');
		}

	function tambahfamilydata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahfamily->tambahfamily();

		redirect('detailfamily');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahfamily');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahfamily');
} 
		}

}