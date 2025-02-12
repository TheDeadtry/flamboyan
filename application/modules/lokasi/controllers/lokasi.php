<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Lokasi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_lokasi');			
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

				$data['tampil_data_lokasi'] = $this->M_lokasi->tampil_data_lokasi();


				$data['namamodule'] = "lokasi";
				$data['namafileview'] = "lokasiadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "lokasi";
				$data['namafileview'] = "lokasiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_lokasi(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_lokasi	= $this->input->post('nama_lokasi');
		$nama_lokasi_taiwan	= $this->input->post('nama_lokasi_taiwan');
		
		$this->M_lokasi->simpan_data_lokasi($nama_lokasi,$nama_lokasi_taiwan);

		redirect('lokasi');
	}

	function update_data_lokasi() {
			$this->M_lokasi->update_data_lokasi();
			redirect('lokasi');
	}

	function hapus_data_lokasi() {
		$this->M_lokasi->hapus_data_lokasi();
		redirect('lokasi');
	}	
}