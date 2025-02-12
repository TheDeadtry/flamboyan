<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Hobi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_hobi');			
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

				$data['tampil_data_hobi'] = $this->M_hobi->tampil_data_hobi();


				$data['namamodule'] = "hobi";
				$data['namafileview'] = "hobiadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "hobi";
				$data['namafileview'] = "hobiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_hobi(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_hobi	= $this->input->post('nama_hobi');
		$nama_hobi_taiwan	= $this->input->post('nama_hobi_taiwan');
		
		$this->M_hobi->simpan_data_hobi($nama_hobi,$nama_hobi_taiwan);

		redirect('hobi');
	}
	
	function update_data_hobi() {
			$this->M_hobi->update_data_hobi();
			redirect('hobi');
	}

	function hapus_data_hobi() {
		$this->M_hobi->hapus_data_hobi();
		redirect('hobi');
	}	
}