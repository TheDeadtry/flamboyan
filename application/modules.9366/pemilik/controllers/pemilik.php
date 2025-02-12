<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pemilik extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pemilik');			
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
				$data['tampil_data_pemilik'] = $this->M_pemilik->tampil_data_pemilik();
				$data['namamodule'] = "pemilik";
				$data['namafileview'] = "pemilikadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$data['tampil_data_pemilik'] = $this->M_pemilik->tampil_data_pemilik();
				$data['tampil_biaya'] = $this->M_pemilik->tampil_biaya();
				
				
				$data['namamodule'] = "pemilik";
				$data['namafileview'] = "pemilikadmin";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_pemilik(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_pemilik	= $this->input->post('nama_pemilik');
		$negara	= $this->input->post('negara');
		
		$this->M_pemilik->simpan_data_pemilik($nama_pemilik,$negara);

		redirect('pemilik');
	}

	function update_data_pemilik() {
			$this->M_pemilik->update_data_pemilik();
			redirect('pemilik');
	}

	function hapus_data_pemilik() {
		$this->M_pemilik->hapus_data_pemilik();
		redirect('pemilik');
	}

	function updatebiaya() {
			$this->M_pemilik->updatebiaya();
			redirect('pemilik');
	}
}