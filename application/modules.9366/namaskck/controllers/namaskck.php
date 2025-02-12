<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class namaskck extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namaskck');			
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
				$data['tampil_data_namaskck'] = $this->M_namaskck->tampil_data_namaskck();
				$data['namamodule'] = "namaskck";
				$data['namafileview'] = "namaskck";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namaskck";
				$data['namafileview'] = "namaskck";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namaskck(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_polda	= $this->input->post('nama_polda');
		$alamat	= $this->input->post('alamat');
		
		$this->M_namaskck->simpan_data_namaskck($nama_polda,$alamat);

		redirect('namaskck');
	}

	function update_data_namaskck() {
			$this->M_namaskck->update_data_namaskck();
			redirect('namaskck');
	}

	function hapus_data_namaskck() {
		$this->M_namaskck->hapus_data_namaskck();
		redirect('namaskck');
	}
}