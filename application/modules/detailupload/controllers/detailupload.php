<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailupload extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailupload');	
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
				$data['tampil_data_personal'] = $this->M_detailupload->tampil_data_personal($this->session->userdata("detailuser"));

				$data['tampil_data_fotovisa'] = $this->M_detailupload->tampil_data_fotovisa($this->session->userdata("detailuser"));
				$data['hitung_fotovisa'] = $this->M_detailupload->hitung_fotovisa($this->session->userdata("detailuser"));

				$data['tampil_data_ktp'] = $this->M_detailupload->tampil_data_ktp($this->session->userdata("detailuser"));
				$data['hitung_ktp'] = $this->M_detailupload->hitung_ktp($this->session->userdata("detailuser"));

				$data['tampil_data_kk'] = $this->M_detailupload->tampil_data_kk($this->session->userdata("detailuser"));
				$data['hitung_kk'] = $this->M_detailupload->hitung_kk($this->session->userdata("detailuser"));

				$data['tampil_data_aktelahir'] = $this->M_detailupload->tampil_data_aktelahir($this->session->userdata("detailuser"));
				$data['hitung_aktelahir'] = $this->M_detailupload->hitung_aktelahir($this->session->userdata("detailuser"));

				$data['tampil_data_ijasah'] = $this->M_detailupload->tampil_data_ijasah($this->session->userdata("detailuser"));
				$data['hitung_ijasah'] = $this->M_detailupload->hitung_ijasah($this->session->userdata("detailuser"));

				$data['tampil_data_suratnikah'] = $this->M_detailupload->tampil_data_suratnikah($this->session->userdata("detailuser"));
				$data['hitung_suratnikah'] = $this->M_detailupload->hitung_suratnikah($this->session->userdata("detailuser"));

				$data['tampil_data_suratijinkeluarga'] = $this->M_detailupload->tampil_data_suratijinkeluarga($this->session->userdata("detailuser"));
				$data['hitung_suratijinkeluarga'] = $this->M_detailupload->hitung_suratijinkeluarga($this->session->userdata("detailuser"));

				$data['tampil_data_pasporlama'] = $this->M_detailupload->tampil_data_pasporlama($this->session->userdata("detailuser"));
				$data['hitung_pasporlama'] = $this->M_detailupload->hitung_pasporlama($this->session->userdata("detailuser"));

				$data['tampil_data_perjanjianpenempatan'] = $this->M_detailupload->tampil_data_perjanjianpenempatan($this->session->userdata("detailuser"));
				$data['hitung_perjanjianpenempatan'] = $this->M_detailupload->hitung_perjanjianpenempatan($this->session->userdata("detailuser"));

				$data['tampil_data_pasportampil'] = $this->M_detailupload->tampil_data_pasportampil($this->session->userdata("detailuser"));
				$data['hitung_pasportampil'] = $this->M_detailupload->hitung_pasportampil($this->session->userdata("detailuser"));

				$data['tampil_data_kehilanganpaspor'] = $this->M_detailupload->tampil_data_kehilanganpaspor($this->session->userdata("detailuser"));
				$data['hitung_kehilanganpaspor'] = $this->M_detailupload->hitung_kehilanganpaspor($this->session->userdata("detailuser"));

				$data['tampil_data_skck'] = $this->M_detailupload->tampil_data_skck($this->session->userdata("detailuser"));
				$data['hitung_skck'] = $this->M_detailupload->hitung_skck($this->session->userdata("detailuser"));

				$data['tampil_data_skckpolres'] = $this->M_detailupload->tampil_data_skckpolres($this->session->userdata("detailuser"));
				$data['hitung_skckpolres'] = $this->M_detailupload->hitung_skckpolres($this->session->userdata("detailuser"));

				$data['tampil_data_legalitas'] = $this->M_detailupload->tampil_data_legalitas($this->session->userdata("detailuser"));
				$data['hitung_legalitas'] = $this->M_detailupload->hitung_legalitas($this->session->userdata("detailuser"));

				$data['tampil_data_medikal'] = $this->M_detailupload->tampil_data_medikal($this->session->userdata("detailuser"));
				$data['hitung_medikal'] = $this->M_detailupload->hitung_medikal($this->session->userdata("detailuser"));

				$data['tampil_data_serkes'] = $this->M_detailupload->tampil_data_serkes($this->session->userdata("detailuser"));
				$data['hitung_serkes'] = $this->M_detailupload->hitung_serkes($this->session->userdata("detailuser"));

				$data['tampil_data_medikalfull'] = $this->M_detailupload->tampil_data_medikalfull($this->session->userdata("detailuser"));
				$data['hitung_medikalfull'] = $this->M_detailupload->hitung_medikalfull($this->session->userdata("detailuser"));

				$data['tampil_data_sertifikatujian'] = $this->M_detailupload->tampil_data_sertifikatujian($this->session->userdata("detailuser"));
				$data['hitung_sertifikatujian'] = $this->M_detailupload->hitung_sertifikatujian($this->session->userdata("detailuser"));

				$data['tampil_data_kpa'] = $this->M_detailupload->tampil_data_kpa($this->session->userdata("detailuser"));
				$data['hitung_kpa'] = $this->M_detailupload->hitung_kpa($this->session->userdata("detailuser"));

				$data['tampil_data_pk'] = $this->M_detailupload->tampil_data_pk($this->session->userdata("detailuser"));
				$data['hitung_pk'] = $this->M_detailupload->hitung_pk($this->session->userdata("detailuser"));

				$data['tampil_data_suhan'] = $this->M_detailupload->tampil_data_suhan($this->session->userdata("detailuser"));
				$data['hitung_suhan'] = $this->M_detailupload->hitung_suhan($this->session->userdata("detailuser"));

				$data['tampil_data_visapermit'] = $this->M_detailupload->tampil_data_visapermit($this->session->userdata("detailuser"));
				$data['hitung_visapermit'] = $this->M_detailupload->hitung_visapermit($this->session->userdata("detailuser"));

				$data['tampil_data_visa'] = $this->M_detailupload->tampil_data_visa($this->session->userdata("detailuser"));
				$data['hitung_visa'] = $this->M_detailupload->hitung_visa($this->session->userdata("detailuser"));

				$data['tampil_data_tiket'] = $this->M_detailupload->tampil_data_tiket($this->session->userdata("detailuser"));
				$data['hitung_tiket'] = $this->M_detailupload->hitung_tiket($this->session->userdata("detailuser"));

				$data['tampil_data_visaarrival'] = $this->M_detailupload->tampil_data_visaarrival($this->session->userdata("detailuser"));
				$data['hitung_visaarrival'] = $this->M_detailupload->hitung_visaarrival($this->session->userdata("detailuser"));

				$data['tampil_data_job'] = $this->M_detailupload->tampil_data_job($this->session->userdata("detailuser"));
				$data['hitung_job'] = $this->M_detailupload->hitung_job($this->session->userdata("detailuser"));

				$data['tampil_data_suhankabur'] = $this->M_detailupload->tampil_data_suhankabur($this->session->userdata("detailuser"));
				$data['hitung_suhankabur'] = $this->M_detailupload->hitung_suhankabur($this->session->userdata("detailuser"));

				$data['tampil_data_berkas'] = $this->M_detailupload->tampil_data_berkas($this->session->userdata("detailuser"));
				$data['hitung_berkas'] = $this->M_detailupload->hitung_berkas($this->session->userdata("detailuser"));

				$data['tampil_data_slain'] = $this->M_detailupload->tampil_data_slain($this->session->userdata("detailuser"));
				$data['hitung_slain'] = $this->M_detailupload->hitung_slain($this->session->userdata("detailuser"));


				$data['tampil_data_kpapra'] = $this->M_detailupload->tampil_data_kpapra($this->session->userdata("detailuser"));
				$data['hitung_kpapra'] = $this->M_detailupload->hitung_kpapra($this->session->userdata("detailuser"));
				
				$data['tampil_data_ttdt'] = $this->M_detailupload->tampil_data_ttdt($this->session->userdata("detailuser"));
				$data['hitung_ttdt'] = $this->M_detailupload->hitung_ttdt($this->session->userdata("detailuser"));

				$data['tampil_data_servak'] = $this->M_detailupload->tampil_data_servak($this->session->userdata("detailuser"));
				$data['hitung_servak'] = $this->M_detailupload->hitung_servak($this->session->userdata("detailuser"));

				//user sudah login
				$data['namamodule'] = "detailupload";
				$data['namafileview'] = "detailupload";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){

				$data['detailpersonalid'] = $this->session->userdata("detailuser");		
				$data['tampil_data_personal'] = $this->M_detailupload->tampil_data_personal($this->session->userdata("detailuser"));
				
				$data['namamodule'] = "detailupload";
				$data['namafileview'] = "detailuploaddokumen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

		
}