<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class namagaji extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namagaji');			
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
				$data['tampil_data_namagaji'] = $this->M_namagaji->tampil_data_namagaji();
				$data['namamodule'] = "namagaji";
				$data['namafileview'] = "namagaji";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namagaji";
				$data['namafileview'] = "namagaji";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namagaji(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_gaji	= $this->input->post('nama_gaji');
		
		$this->M_namagaji->simpan_data_namagaji($nama_gaji);

		redirect('namagaji');
	}

	function update_data_namagaji() {
			$this->M_namagaji->update_data_namagaji();
			redirect('namagaji');
	}

	function hapus_data_namagaji() {
		$this->M_namagaji->hapus_data_namagaji();
		redirect('namagaji');
	}
}