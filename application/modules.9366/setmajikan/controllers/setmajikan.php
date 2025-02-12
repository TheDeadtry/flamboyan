<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Setmajikan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_setmajikan');			
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
				$data['tampil_data_setmajikan'] = $this->M_setmajikan->tampil_data_setmajikan();
				$data['namamodule'] = "setmajikan";
				$data['namafileview'] = "setmajikanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "setmajikan";
				$data['namafileview'] = "setmajikanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_setmajikan(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_setmajikan	= $this->input->post('nama_setmajikan');
		$nama_setmajikan_taiwan	= $this->input->post('nama_setmajikan_taiwan');
		
		$this->M_setmajikan->simpan_data_setmajikan($nama_setmajikan,$nama_setmajikan_taiwan);

		redirect('setmajikan');
	}

	function update_data_setmajikan() {
			$this->M_setmajikan->update_data_setmajikan();
			redirect('setmajikan');
	}

	function hapus_data_setmajikan() {
		$this->M_setmajikan->hapus_data_setmajikan();
		redirect('setmajikan');
	}
}