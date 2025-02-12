<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailvisa extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_session');			
		$this->load->model('M_detailvisa');	
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
				$data['tampil_data_sektor'] = $this->M_detailvisa->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailvisa->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailvisa->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailvisa->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailvisa->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailvisa->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailvisa->tampil_data_provinsi();
				$data['tampil_data_pildok'] = $this->M_detailvisa->tampil_data_pildok();
				$data['tampil_data_signing'] = $this->M_detailvisa->tampil_data_signing($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_visa'] = $this->M_detailvisa->tampil_data_visa($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailvisa->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_dataairport'] = $this->M_detailvisa->tampil_data_dataairport();
				$data['tampil_dataterbang'] = $this->M_detailvisa->tampil_dataterbang();
				$data['hitungvisa'] = $this->M_detailvisa->hitung_data_visa($this->session->userdata("detailuser"));
				$data['tanggaltiba'] = $this->M_detailvisa->tanggaltiba($this->session->userdata("detailuser"));
				//user sudah login
				$data['namamodule'] = "detailvisa";
				$data['namafileview'] = "detailvisa";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "detailvisa";
				$data['namafileview'] = "detailvisaagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}

	function vtambahvisa() {
		$data['tampil_data_sektor'] = $this->M_detailvisa->tampil_data_sektor();
		$data['tampil_data_negara'] = $this->M_detailvisa->tampil_data_negara();
		$data['tampil_data_calling'] = $this->M_detailvisa->tampil_data_calling();
		$data['tampil_data_skillnya'] = $this->M_detailvisa->tampil_data_skillnya();
		$data['tampil_data_agama'] = $this->M_detailvisa->tampil_data_agama();
		$data['tampil_data_pendidikan'] = $this->M_detailvisa->tampil_data_pendidikan();
		$data['tampil_data_provinsi'] = $this->M_detailvisa->tampil_data_provinsi();
		$data['tampil_data_pildok'] = $this->M_detailvisa->tampil_data_pildok();
		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['idbiodatanya'] = $this->session->userdata("detailuser");
		$data['tampil_data_visa'] = $this->M_detailvisa->tampil_data_visa($this->session->userdata("detailuser"));
		$data['tampil_data_personal'] = $this->M_detailvisa->tampil_data_personal($this->session->userdata("detailuser"));
		$data['tampil_dataterbang'] = $this->M_detailvisa->tampil_dataterbang();
		$data['tampil_data_dataairport'] = $this->M_detailvisa->tampil_data_dataairport();
		$data['tanggaltiba'] = $this->M_detailvisa->tanggaltiba($this->session->userdata("detailuser"));
		$data['hitungvisa'] = $this->M_detailvisa->hitung_data_visa($this->session->userdata("detailuser"));
		//user sudah login
		$data['namamodule'] = "detailvisa";
		$data['namafileview'] = "tambahvisa";
		echo Modules::run('template/admin_template', $data);

	}

	function vubahvisa() {
		$data['tampil_data_sektor'] = $this->M_detailvisa->tampil_data_sektor();
		$data['tampil_data_negara'] = $this->M_detailvisa->tampil_data_negara();
		$data['tampil_data_calling'] = $this->M_detailvisa->tampil_data_calling();
		$data['tampil_data_skillnya'] = $this->M_detailvisa->tampil_data_skillnya();
		$data['tampil_data_agama'] = $this->M_detailvisa->tampil_data_agama();
		$data['tampil_data_pendidikan'] = $this->M_detailvisa->tampil_data_pendidikan();
		$data['tampil_data_provinsi'] = $this->M_detailvisa->tampil_data_provinsi();
		$data['tampil_data_dataairport'] = $this->M_detailvisa->tampil_data_dataairport();
		$data['tampil_data_pildok'] = $this->M_detailvisa->tampil_data_pildok();
		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['idbiodatanya'] = $this->session->userdata("detailuser");
		$data['tampil_dataterbang'] = $this->M_detailvisa->tampil_dataterbang();
		$data['tampil_data_visa'] = $this->M_detailvisa->tampil_data_visa($this->session->userdata("detailuser"));
		$data['tampil_data_personal'] = $this->M_detailvisa->tampil_data_personal($this->session->userdata("detailuser"));
		$data['tanggaltiba'] = $this->M_detailvisa->tanggaltiba($this->session->userdata("detailuser"));
		$data['hitungvisa'] = $this->M_detailvisa->hitung_data_visa($this->session->userdata("detailuser"));
		//user sudah login
		$data['namamodule'] = "detailvisa";
		$data['namafileview'] = "ubahvisa";
		echo Modules::run('template/admin_template', $data);
	}

	function tambahvisa() {
		$this->M_detailvisa->tambahvisa();
		redirect('detailvisa');
	}

	function ubahvisa() {
		$this->M_detailvisa->ubahvisa();
		redirect('detailvisa');
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