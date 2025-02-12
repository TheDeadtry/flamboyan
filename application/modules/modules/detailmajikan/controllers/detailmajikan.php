<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailmajikan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailmajikan');	
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

				$data['tampil_data_sektor'] = $this->M_detailmajikan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailmajikan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailmajikan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailmajikan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailmajikan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailmajikan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailmajikan->tampil_data_provinsi();
				$data['tampil_data_agen'] = $this->M_detailmajikan->tampil_data_agen();
				$data['tampil_data_group'] = $this->M_detailmajikan->tampil_data_group();
				$data['tampil_data_majikanfi'] = $this->M_detailmajikan->tampilmajikandatanya($this->session->userdata("detailuser"));
				$data['detailmajikanid'] = $this->session->userdata("detailuser");
				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_majikan'] = $this->M_detailmajikan->tampil_data_majikan($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailmajikan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['hitungmajikan'] = $this->M_detailmajikan->hitung_data_majikan($this->session->userdata("detailuser"));
 				$data['option_posisi'] = $this->M_detailmajikan->getmajikanList();
 				$data['option_group'] = $this->M_detailmajikan->getposisiList_group();


			//user sudah login
				$data['namamodule'] = "detailmajikan";
				$data['namafileview'] = "detailmajikan";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){

				$data['namamodule'] = "detailmajikan";
				$data['namafileview'] = "detailmajikanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

		function vtambahmajikan() {
				$data['tampil_data_sektor'] = $this->M_detailmajikan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailmajikan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailmajikan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailmajikan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailmajikan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailmajikan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailmajikan->tampil_data_provinsi();
				$data['tampil_data_agen'] = $this->M_detailmajikan->tampil_data_agen();
				$data['tampil_data_group'] = $this->M_detailmajikan->tampil_data_group();
				$data['detailmajikanid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['tampil_data_majikanfi'] = $this->M_detailmajikan->tampilmajikandatanya($this->session->userdata("detailuser"));

				$data['tampil_data_majikan'] = $this->M_detailmajikan->tampil_data_majikan($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailmajikan->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungmajikan'] = $this->M_detailmajikan->hitung_data_majikan($this->session->userdata("detailuser"));
 				$data['option_posisi'] = $this->M_detailmajikan->getmajikanList();
$data['option_group'] = $this->M_detailmajikan->getposisiList_group();
				
			//user sudah login
				$data['namamodule'] = "detailmajikan";
				$data['namafileview'] = "tambahmajikan";
				echo Modules::run('template/admin_template', $data);

		}

				function vubahmajikan() {
					$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_sektor'] = $this->M_detailmajikan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailmajikan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailmajikan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailmajikan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailmajikan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailmajikan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailmajikan->tampil_data_provinsi();
				$data['tampil_data_agen'] = $this->M_detailmajikan->tampil_data_agen();
				$data['tampil_data_group'] = $this->M_detailmajikan->tampil_data_group();
				$data['detailmajikanid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['tampil_data_majikanfi'] = $this->M_detailmajikan->tampilmajikandatanya($this->session->userdata("detailuser"));
				$data['tampil_data_majikan'] = $this->M_detailmajikan->tampil_data_majikan($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailmajikan->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungmajikan'] = $this->M_detailmajikan->hitung_data_majikan($this->session->userdata("detailuser"));
				$data['option_posisi'] = $this->M_detailmajikan->getmajikanList();
 				$data['option_group'] = $this->M_detailmajikan->getposisiList_group();
				
			//user sudah login
				$data['namamodule'] = "detailmajikan";
				$data['namafileview'] = "ubahmajikan";
				echo Modules::run('template/admin_template', $data);

		}


	 function select_suhan(){
        $data['option_suhan'] = $this->M_detailmajikan->getSuhanList();
        $data['option_visapermit'] = $this->M_detailmajikan->getvisapermitList();
        $this->load->view('detailmajikan/detailsuhan',$data);

    }
function simpan_data_majikan(){
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$hp	= $this->input->post('hp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$status = $this->input->post('status');
		$this->M_detailmajikan->simpan_data_majikan($kode, $nama, $hp, $email,$alamat,$status);
		redirect('detailmajikan/vtambahmajikan');
	}

	function tambahmajikan() {

$this->M_detailmajikan->tambahmajikan();

		redirect('detailmajikan');
		}
			function ubahmajikan() {

$this->M_detailmajikan->ubahmajikan();

		redirect('detailmajikan');
		}

			function ubahgrupmajikan() {

$this->M_detailmajikan->ubahgrupmajikan();

		redirect('detailmajikan');
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