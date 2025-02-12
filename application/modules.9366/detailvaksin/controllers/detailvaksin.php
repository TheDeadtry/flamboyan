<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detailvaksin extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');	
			$this->load->model('m_detailvaksin');		
			$this->load->library('form_validation');
		
	}
	
	function index()
	{
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status'])
		{
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else
		{
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
			
			$data['tampil_data_negara'] = $this->m_detailvaksin->tampil_data_negara();
			$data['tampil_data_calling'] = $this->m_detailvaksin->tampil_data_calling();
			$data['tampil_data_skillnya'] = $this->m_detailvaksin->tampil_data_skillnya();
			$data['tampil_data_agama'] = $this->m_detailvaksin->tampil_data_agama();
			$data['tampil_data_pendidikan'] = $this->m_detailvaksin->tampil_data_pendidikan();
			$data['tampil_data_provinsi'] = $this->m_detailvaksin->tampil_data_provinsi();
			$data['tampil_data_jobs'] = $this->m_detailvaksin->tampil_data_jobs();
			$data['tampil_data_lokasi'] = $this->m_detailvaksin->tampil_data_lokasi();

			$data['tampilvaksin'] = $this->M_session->select("SELECT * FROM setting_vaksinlist order by nama");
			$data['detailpersonalid'] = $this->session->userdata("detailuser");
			$data['tampil_data_request'] = $this->m_detailvaksin->tampil_data_request($this->session->userdata("detailuser"));
			$data['tampil_data_personal'] = $this->m_detailvaksin->tampil_data_personal($this->session->userdata("detailuser"));

			$data['hitungrequest'] = $this->m_detailvaksin->hitung_data_request($this->session->userdata("detailuser"));
			$data['namamodule'] = "detailvaksin";
			if ($id_user && $status==1)
			{
				$data['namafileview'] = "detailvaksin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2)
			{
				$data['namafileview'] = "detailrequestagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function tambah(){
		$this->m_detailvaksin->tambahrequest();
		redirect('detailvaksin');
	}

	function ubah() {
		$this->m_detailvaksin->ubahrequest();
		redirect('detailvaksin');
	}

	function hapus($id) {
		$this->m_detailvaksin->hapusrequest($id);
		redirect('detailvaksin');
	}
}