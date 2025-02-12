<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Majikans extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('m_majikans');			
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
			//user sudah login
				$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();

				$data['namamodule'] = "majikans";
				$data['namafileview'] = "majikanadmin";
				echo Modules::run('template/admin_template', $data);
			}
		}
		 
	}

	function select_suhanlist(){
        $data['option_suhan'] = $this->m_majikans->getsuhanList();
        $this->load->view('majikans/detailmajikans',$data);
    }
    function select_agenlist(){
        $data['option_agen'] = $this->m_majikans->getagenList();
        $this->load->view('majikans/detailgroup',$data);
    }
    function select_agenlist2(){
        $data['option_agen'] = $this->m_majikans->getagenList2();
        $this->load->view('majikans/detailgroup2',$data);
    }

	function simpan_data_majikan(){
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$hp	= $this->input->post('hp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$status = $this->input->post('status');
		$this->m_majikans->simpan_data_majikan($kode, $nama, $hp, $email,$alamat,$status);
		redirect('majikans');
	}

	function simpan_data_suhan(){
		$this->m_majikans->simpan_data_suhan();
		redirect('majikans');
	}

	function simpan_data_visapermit(){
		$this->m_majikans->simpan_data_visapermit();
		redirect('majikans');
	}

	function update_data_suhan($id) {
		if($this->input->post('submit')) {
			$this->m_majikans->update_data_suhan($id);
			redirect('majikans');
		}
		//$stts = '2'; 
		//$this->session->set_userdata("status",$stts);
		$data['status'] = $this->session->userdata("status");
		$data['suhan'] = $this->m_majikans->ambil_id_suhan($id);
		$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
		$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
										$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "updatesuhan";
		echo Modules::run('template/admin_template', $data);
	}

	function update_data_visapermit($id) {
		if($this->input->post('submit')) {
			$this->m_majikans->update_data_visapermit($id);
			redirect('majikans');
		}
		//$stts = '3'; 
		//$this->session->set_userdata("status",$stts);
		$data['status'] = $this->session->userdata("status");
		$data['visapermit'] = $this->m_majikans->ambil_id_visapermit($id);
		$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
		$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
										$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "updatevisapermit";
		echo Modules::run('template/admin_template', $data);
	}

	function hapus_data_suhan($id) {
		$this->m_majikans->hapus_data_suhan($id);
		redirect('majikans');
	}

	function hapus_data_visapermit($id) {
		$this->m_majikans->hapus_data_visapermit($id);
		redirect('majikans');
	}


	function update_majikan() {
		$this->m_majikans->update_majikan();
		redirect('majikans');
	}

	function hapus_majikan() {
		$this->m_majikans->hapus_majikan();
		redirect('majikans');
	}

	function update_suhan() {
		$this->m_majikans->update_suhan();
		redirect('majikans');
	}

		function hapus_suhan() {
		$this->m_majikans->hapus_suhan();
		redirect('majikans');
	}

		function update_visapermit() {
		$this->m_majikans->update_visapermit();
		redirect('majikans');
	}

		function hapus_visapermit() {
		$this->m_majikans->hapus_visapermit();
		redirect('majikans');
	}

}