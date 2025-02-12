<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detailskckpolres extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('m_detailskckpolres');	
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

				$data['tampil_data_sektor'] = $this->m_detailskckpolres->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->m_detailskckpolres->tampil_data_negara();
				$data['tampil_data_calling'] = $this->m_detailskckpolres->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->m_detailskckpolres->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->m_detailskckpolres->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->m_detailskckpolres->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->m_detailskckpolres->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skck'] = $this->m_detailskckpolres->tampil_data_skck($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->m_detailskckpolres->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungskck'] = $this->m_detailskckpolres->hitung_data_skck($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailskckpolres";
				$data['namafileview'] = "detailskckpolres";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailskckpolres";
				$data['namafileview'] = "detailskckagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}




	function tambahskck() {

$this->m_detailskckpolres->tambahskck();

		redirect('detailskckpolres');
		}
			function ubahskck() {

$this->m_detailskckpolres->ubahskck();

		redirect('detailskckpolres');
		}

}