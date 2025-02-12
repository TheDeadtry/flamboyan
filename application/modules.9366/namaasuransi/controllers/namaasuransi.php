<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class namaasuransi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namaasuransi');			
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
				$data['tampil_data_namaasuransi'] = $this->M_namaasuransi->tampil_data_namaasuransi();
				$data['namamodule'] = "namaasuransi";
				$data['namafileview'] = "namaasuransiadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namaasuransi";
				$data['namafileview'] = "namaasuransiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namaasuransi(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_namaasuransi	= $this->input->post('nama_namaasuransi');
		$nama_namaasuransi_taiwan	= $this->input->post('nama_namaasuransi_taiwan');
		
		$this->M_namaasuransi->simpan_data_namaasuransi($nama_namaasuransi,$nama_namaasuransi_taiwan);

		redirect('namaasuransi');
	}

	function update_data_namaasuransi() {
			$this->M_namaasuransi->update_data_namaasuransi();
			redirect('namaasuransi');
	}

	function hapus_data_namaasuransi() {
		$this->M_namaasuransi->hapus_data_namaasuransi();
		redirect('namaasuransi');
	}
}