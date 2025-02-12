<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Kondisijompo extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_kondisijompo');			
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

				$data['tampil_data_kondisijompo'] = $this->M_kondisijompo->tampil_data_kondisijompo();


				$data['namamodule'] = "kondisijompo";
				$data['namafileview'] = "kondisijompoadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "kondisijompo";
				$data['namafileview'] = "kondisijompoagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_kondisijompo(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_kondisijompo	= $this->input->post('nama_kondisijompo');
		$nama_kondisijompo_taiwan	= $this->input->post('nama_kondisijompo_taiwan');
		
		$this->M_kondisijompo->simpan_data_kondisijompo($nama_kondisijompo,$nama_kondisijompo_taiwan);

		redirect('kondisijompo');
	}

	function update_data_kondisijompo() {
			$this->M_kondisijompo->update_data_kondisijompo();
			redirect('kondisijompo');
	}

	function hapus_data_kondisijompo() {
		$this->M_kondisijompo->hapus_data_kondisijompo();
		redirect('kondisijompo');
	}
}