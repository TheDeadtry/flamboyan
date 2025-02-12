<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Setketerangan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_setketerangan');			
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
				$data['tampil_data_setketerangan'] = $this->M_setketerangan->tampil_data_setketerangan();
				$data['namamodule'] = "setketerangan";
				$data['namafileview'] = "setketeranganadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "setketerangan";
				$data['namafileview'] = "setketeranganagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_setketerangan(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_setketerangan	= $this->input->post('nama_setketerangan');
		$nama_setketerangan_taiwan	= $this->input->post('nama_setketerangan_taiwan');
		
		$this->M_setketerangan->simpan_data_setketerangan($nama_setketerangan,$nama_setketerangan_taiwan);

		redirect('setketerangan');
	}

	function update_data_setketerangan() {
			$this->M_setketerangan->update_data_setketerangan();
			redirect('setketerangan');
	}

	function hapus_data_setketerangan() {
		$this->M_setketerangan->hapus_data_setketerangan();
		redirect('setketerangan');
	}
}