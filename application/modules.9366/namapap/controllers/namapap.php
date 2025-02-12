<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class namapap extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namapap');			
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
				$data['tampil_data_namapap'] = $this->M_namapap->tampil_data_namapap();
				$data['namamodule'] = "namapap";
				$data['namafileview'] = "namapapadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namapap";
				$data['namafileview'] = "namapapagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namapap(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_namapap	= $this->input->post('nama_namapap');
		$nama_namapap_taiwan	= $this->input->post('nama_namapap_taiwan');
		
		$this->M_namapap->simpan_data_namapap($nama_namapap,$nama_namapap_taiwan);

		redirect('namapap');
	}

	function update_data_namapap() {
			$this->M_namapap->update_data_namapap();
			redirect('namapap');
	}

	function hapus_data_namapap() {
		$this->M_namapap->hapus_data_namapap();
		redirect('namapap');
	}
}