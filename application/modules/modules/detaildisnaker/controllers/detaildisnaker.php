<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detaildisnaker extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detaildisnaker');	
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

				$data['tampil_data_sektor'] = $this->M_detaildisnaker->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detaildisnaker->tampil_data_negara();
				$data['tampil_data_jabatan'] = $this->M_detaildisnaker->tampil_data_jabatan();
				$data['tampil_data_calling'] = $this->M_detaildisnaker->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detaildisnaker->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detaildisnaker->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detaildisnaker->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detaildisnaker->tampil_data_provinsi();
	$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_disnaker'] = $this->M_detaildisnaker->tampil_data_disnaker($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detaildisnaker->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_family'] = $this->M_detaildisnaker->tampil_data_family($this->session->userdata("detailuser"));

				$data['hitungdisnaker'] = $this->M_detaildisnaker->hitung_data_disnaker($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detaildisnaker";
				$data['namafileview'] = "detaildisnaker";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detaildisnaker";
				$data['namafileview'] = "detaildisnakeragen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

		function vtambahdisnaker() {
				$data['tampil_data_sektor'] = $this->M_detaildisnaker->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detaildisnaker->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detaildisnaker->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detaildisnaker->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detaildisnaker->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detaildisnaker->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detaildisnaker->tampil_data_provinsi();
				$data['tampil_data_jabatan'] = $this->M_detaildisnaker->tampil_data_jabatan();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");

				$data['tampil_data_disnaker'] = $this->M_detaildisnaker->tampil_data_disnaker($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detaildisnaker->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_family'] = $this->M_detaildisnaker->tampil_data_family($this->session->userdata("detailuser"));

				$data['hitungdisnaker'] = $this->M_detaildisnaker->hitung_data_disnaker($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detaildisnaker";
				$data['namafileview'] = "tambahdisnaker";
				echo Modules::run('template/admin_template', $data);

		}

				function vubahdisnaker() {
				$data['tampil_data_sektor'] = $this->M_detaildisnaker->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detaildisnaker->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detaildisnaker->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detaildisnaker->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detaildisnaker->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detaildisnaker->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detaildisnaker->tampil_data_provinsi();
				$data['tampil_data_jabatan'] = $this->M_detaildisnaker->tampil_data_jabatan();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");

				$data['tampil_data_disnaker'] = $this->M_detaildisnaker->tampil_data_disnaker($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detaildisnaker->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_family'] = $this->M_detaildisnaker->tampil_data_family($this->session->userdata("detailuser"));

				$data['hitungdisnaker'] = $this->M_detaildisnaker->hitung_data_disnaker($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detaildisnaker";
				$data['namafileview'] = "ubahdisnaker";
				echo Modules::run('template/admin_template', $data);

		}



	function tambahdisnaker() {

$this->M_detaildisnaker->tambahdisnaker();

		redirect('detaildisnaker');
		}
			function ubahdisnaker() {

$this->M_detaildisnaker->ubahdisnaker();

		redirect('detaildisnaker');
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

		function updatektp() {
		$this->M_detaildisnaker->update_ktp();
		redirect('detaildisnaker');
	}
	function updatekuasa() {
		$this->M_detaildisnaker->update_kuasa();
		redirect('detaildisnaker');
	}
	function updatenyata() {
		$this->M_detaildisnaker->update_nyata();
		redirect('detaildisnaker');
	}
	function updatelegal() {
		$this->M_detaildisnaker->update_legal();
		redirect('detaildisnaker');
	}

}