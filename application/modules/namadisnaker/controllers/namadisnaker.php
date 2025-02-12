<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Namadisnaker extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namadisnaker');			
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
				$data['tampil_data_namadisnaker'] = $this->M_namadisnaker->tampil_data_namadisnaker();
				$data['namamodule'] = "namadisnaker";
				$data['namafileview'] = "namadisnaker";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namadisnaker";
				$data['namafileview'] = "namadisnaker";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namadisnaker(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_disnaker	= $this->input->post('nama_disnaker');
		$alamat_disnaker	= $this->input->post('alamat_disnaker');
		$wilayah_disnaker	= $this->input->post('wilayah_disnaker');
		
		$this->M_namadisnaker->simpan_data_namadisnaker($nama_disnaker,$alamat_disnaker,$wilayah_disnaker);

		redirect('namadisnaker');
	}

	function update_data_namadisnaker() {
			$this->M_namadisnaker->update_data_namadisnaker();
			redirect('namadisnaker');
	}

	function hapus_data_namadisnaker() {
		$this->M_namadisnaker->hapus_data_namadisnaker();
		redirect('namadisnaker');
	}
}