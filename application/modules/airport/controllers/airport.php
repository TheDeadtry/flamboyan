<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class airport extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_airport');			
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
				$data['tampil_data_airport'] = $this->M_airport->tampil_data_airport();
				$data['namamodule'] = "airport";
				$data['namafileview'] = "airportadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "airport";
				$data['namafileview'] = "airportagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_airport(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_airport	= $this->input->post('nama_airport');
		
		$this->M_airport->simpan_data_airport($nama_airport);

		redirect('airport');
	}

	function update_data_airport() {
			$this->M_airport->update_data_airport();
			redirect('airport');
	}

	function hapus_data_airport() {
		$this->M_airport->hapus_data_airport();
		redirect('airport');
	}
}