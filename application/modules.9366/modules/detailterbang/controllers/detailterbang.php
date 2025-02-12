<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailterbang extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailterbang');	
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

				$data['tampil_data_sektor'] = $this->M_detailterbang->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailterbang->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailterbang->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailterbang->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailterbang->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailterbang->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailterbang->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_terbang'] = $this->M_detailterbang->tampil_data_terbang($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailterbang->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungterbang'] = $this->M_detailterbang->hitung_data_terbang($this->session->userdata("detailuser"));
				$data['tampil_dataterbang'] = $this->M_detailterbang->tampil_dataterbang();

				
			//user sudah login
				$data['namamodule'] = "detailterbang";
				$data['namafileview'] = "detailterbang";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailterbang";
				$data['namafileview'] = "detailterbangagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

		function vtambahterbang() {
				$data['tampil_data_sektor'] = $this->M_detailterbang->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailterbang->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailterbang->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailterbang->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailterbang->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailterbang->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailterbang->tampil_data_provinsi();
				$data['tampil_dataterbang'] = $this->M_detailterbang->tampil_dataterbang();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");

				$data['tampil_data_terbang'] = $this->M_detailterbang->tampil_data_terbang($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailterbang->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungterbang'] = $this->M_detailterbang->hitung_data_terbang($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailterbang";
				$data['namafileview'] = "tambahterbang";
				echo Modules::run('template/admin_template', $data);

		}

				function vubahterbang() {
				$data['tampil_data_sektor'] = $this->M_detailterbang->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailterbang->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailterbang->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailterbang->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailterbang->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailterbang->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailterbang->tampil_data_provinsi();
				$data['tampil_dataterbang'] = $this->M_detailterbang->tampil_dataterbang();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");

				$data['tampil_data_terbang'] = $this->M_detailterbang->tampil_data_terbang($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailterbang->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungterbang'] = $this->M_detailterbang->hitung_data_terbang($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailterbang";
				$data['namafileview'] = "ubahterbang";
				echo Modules::run('template/admin_template', $data);

		}



	function tambahterbang() {

$this->M_detailterbang->tambahterbang();

		redirect('detailterbang');
		}
			function ubahterbang() {

$this->M_detailterbang->ubahterbang();

		redirect('detailterbang');
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