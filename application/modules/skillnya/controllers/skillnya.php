<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Skillnya extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_skillnya');			
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

				$data['tampil_data_skillnya'] = $this->M_skillnya->tampil_data_skillnya();


				$data['namamodule'] = "skillnya";
				$data['namafileview'] = "skillnyaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "skillnya";
				$data['namafileview'] = "skillnyaagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_skillnya(){
		$kode_skillnya	= $this->input->post('kode_skillnya');
		$nama_skillnya	= $this->input->post('nama_skillnya');
		
		$this->M_skillnya->simpan_data_skillnya($kode_skillnya,$nama_skillnya);

		redirect('skillnya');
	}

		function update_data_skillnya($id) {
		if($this->input->post('submit')) {
			$this->M_skillnya->update_data_skillnya($id);
			redirect('skillnya');
		}
		$data['tampil_data_skillnya'] = $this->M_skillnya->tampil_data_skillnya();
		$data['skillnya'] = $this->M_skillnya->ambil_id($id);
		$data['namamodule'] = "skillnya";
		$data['namafileview'] = "updateskillnya";
		echo Modules::run('template/admin_template', $data);
	}

	function hapus_data_skillnya($id) {
		$this->M_skillnya->hapus_data_skillnya($id);
		redirect('skillnya');
	}

	
}