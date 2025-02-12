<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Terbang extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_terbang');			
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
				$data['tampil_data_terbang'] = $this->M_terbang->tampil_data_terbang();
				$data['namamodule'] = "terbang";
				$data['namafileview'] = "terbangadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "terbang";
				$data['namafileview'] = "terbangagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_terbang(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		
		$this->M_terbang->simpan_data_terbang();

		redirect('terbang');
	}

	function update_data_terbang() {
			$this->M_terbang->update_data_terbang();
			redirect('terbang');
	}

	function hapus_data_terbang() {
		$this->M_terbang->hapus_data_terbang();
		redirect('terbang');
	}
}