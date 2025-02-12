<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Skill extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_skill');			
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

				$data['tampil_data_kategori_skill'] = $this->M_skill->tampil_data_kategoriskill();
				$data['tampil_data_skill'] = $this->M_skill->tampil_data_skill();



				$data['namamodule'] = "skill";
				$data['namafileview'] = "skilladmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "skill";
				$data['namafileview'] = "skillagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_kategoriskill(){
		$nama_kategoriskill	= $this->input->post('nama_kategoriskill');
		$nama_kategoriskill_taiwan	= $this->input->post('nama_kategoriskill_taiwan');
		
		$this->M_skill->simpan_data_kategoriskill($nama_kategoriskill,$nama_kategoriskill_taiwan);

		redirect('skill');
	}

	function simpan_data_skill(){
		$id_kategori	= $this->input->post('kategori');
		$nama_skill	= $this->input->post('nama_skill');
		$nama_skill_taiwan	= $this->input->post('nama_skill_taiwan');
		$this->M_skill->simpan_data_skill($id_kategori,$nama_skill,$nama_skill_taiwan);

		redirect('skill');
	}
	
	function update_kategori() {
		$this->M_skill->update_kategori();
		redirect('skill');
	}

	function hapus_kategori() {
		$this->M_skill->hapus_kategori();
		redirect('skill');
	}

	function update_skill() {
		$this->M_skill->update_skill();
		redirect('skill');
	}

	function hapus_skill() {
		$this->M_skill->hapus_skill();
		redirect('skill');
	}
	
}