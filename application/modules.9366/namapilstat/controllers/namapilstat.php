<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class namapilstat extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namapilstat');			
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
				$data['tampil_data_namapilstat'] = $this->M_namapilstat->tampil_data_namapilstat();
				$data['namamodule'] = "namapilstat";
				$data['namafileview'] = "namapilstat";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namapilstat";
				$data['namafileview'] = "namapilstat";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namapilstat(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_polda	= $this->input->post('nama_polda');
		$alamat	= $this->input->post('alamat');
		
		$this->M_namapilstat->simpan_data_namapilstat($nama_polda,$alamat);

		redirect('namapilstat');
	}

	function update_data_namapilstat() {
			$this->M_namapilstat->update_data_namapilstat();
			redirect('namapilstat');
	}

	function hapus_data_namapilstat() {
		$this->M_namapilstat->hapus_data_namapilstat();
		redirect('namapilstat');
	}
}