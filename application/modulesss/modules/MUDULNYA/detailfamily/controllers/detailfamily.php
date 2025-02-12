<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailfamily extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailfamily');	
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

				$data['tampil_data_sektor'] = $this->M_detailfamily->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailfamily->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailfamily->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailfamily->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailfamily->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailfamily->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailfamily->tampil_data_provinsi();

				$data['detailfamilyid'] = $this->session->userdata("detailuser");
				$data['tampil_data_family'] = $this->M_detailfamily->tampil_data_family($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailfamily->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungfamily'] = $this->M_detailfamily->hitung_data_family($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailfamily";
				$data['namafileview'] = "detailfamily";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailfamily";
				$data['namafileview'] = "detailfamilyagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function tambahbiodata() {

// $idnya = $this->input->post("idp");

// echo "aasas".$idnya;
$this->form_validation->set_rules('idp', 'Idp', 'trim|required|is_unique[family.id_biodata]');

$this->M_tambahbio->tambahfamily();

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