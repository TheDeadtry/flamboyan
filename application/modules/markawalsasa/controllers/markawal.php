<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Markawal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_markawal');	
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
				$data['tampil_data_personal'] = $this->M_markawal->tampil_data_personal($this->session->userdata("detailuser"));
				$data['hitung_data_marka'] = $this->M_markawal->hitung_data_marka($this->session->userdata("detailuser"));
				
				$data['data_marka'] = $this->M_markawal->tampil_marka($this->session->userdata("detailuser"));
			//user sudah login
				$data['namamodule'] = "markawal";
				$data['namafileview'] = "v_markawal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "detailadministrasiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function tambahdptmaj() {	 
			$id_biodata = $this->session->userdata("detailuser");
			$id = $id_biodata;
			$majmntgl = $this->input->post('majmntgl');
			$tgl = $this->input->post('tgl');
			$nmajikan = $this->input->post('nmajikan');
			$agen = $this->input->post('agen');
			$grup = $this->input->post('grup');
			$ket = $this->input->post('ket');
			
			$tgl_to_agen = $this->input->post('tgl_to_agen');
			$nama_agen = $this->input->post('nama_agen');
			$grup_to_agen = $this->input->post('grup_to_agen');
			$nama_pabrik = $this->input->post('nama_pabrik');
			$tgl_pauliu = $this->input->post('tgl_pauliu');
			$tgl_inter = $this->input->post('tgl_inter');
			
			$this->M_markawal->tambahdptmaj($id,$majmntgl,$tgl,$nmajikan,$agen,$grup,$ket,$tgl_to_agen,$nama_agen,$grup_to_agen,$nama_pabrik,$tgl_pauliu,$tgl_inter);
			redirect('markawal');	
		}
	function ubahmarkawal($id){	
			if($this->input->post('submit')) {
				$this->M_markawal->updatemarkawal($id);
				redirect('markawal');
			}
		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['tampil_data_personal'] = $this->M_markawal->tampil_data_personal($this->session->userdata("detailuser"));
		$data['data_marka'] = $this->M_markawal->tampil_marka($this->session->userdata("detailuser"));
		$data['id_marka'] = $this->M_markawal->getById($id);
		
		$data['namamodule'] = "markawal";
		$data['namafileview'] = "ubahmarka";
		echo Modules::run('template/admin_template', $data);
		
	}
	
	function hapus_data(){
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->M_markawal->get_data_marka($kode);
			if($result == null) redirect('markawal');
			else $this->M_markawal->delete_data($kode);
			redirect('markawal');
	}
	
}