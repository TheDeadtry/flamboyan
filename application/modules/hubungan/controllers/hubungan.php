<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class hubungan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_hubungan');			
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
				$data['tampil_data_hubungan'] = $this->M_hubungan->tampil_data_hubungan();
				$data['namamodule'] = "hubungan";
				$data['namafileview'] = "hubunganadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "hubungan";
				$data['namafileview'] = "hubunganagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_hubungan(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_hubungan	= $this->input->post('nama_hubungan');
		$nama_hubungan_taiwan	= $this->input->post('nama_hubungan_taiwan');
		
		$this->M_hubungan->simpan_data_hubungan($nama_hubungan,$nama_hubungan_taiwan);

		redirect('hubungan');
	}

	function update_data_hubungan() {
			$this->M_hubungan->update_data_hubungan();
			redirect('hubungan');
	}

	function hapus_data_hubungan() {
		$this->M_hubungan->hapus_data_hubungan();
		redirect('hubungan');
	}
}