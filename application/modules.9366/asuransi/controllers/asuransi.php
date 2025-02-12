<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class asuransi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_asuransi');			
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
				$data['tampil_data_asuransi'] = $this->M_asuransi->tampil_data_asuransi();
				$data['namamodule'] = "asuransi";
				$data['namafileview'] = "asuransiadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "asuransi";
				$data['namafileview'] = "asuransiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_asuransi(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_asuransi	= $this->input->post('nama_asuransi');
		$nama_asuransi_taiwan	= $this->input->post('nama_asuransi_taiwan');
		
		$this->M_asuransi->simpan_data_asuransi($nama_asuransi,$nama_asuransi_taiwan);

		redirect('asuransi');
	}

	function update_data_asuransi() {
			$this->M_asuransi->update_data_asuransi();
			redirect('asuransi');
	}

	function hapus_data_asuransi() {
		$this->M_asuransi->hapus_data_asuransi();
		redirect('asuransi');
	}
}