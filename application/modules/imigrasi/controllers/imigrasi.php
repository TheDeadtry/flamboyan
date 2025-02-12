<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class imigrasi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_imigrasi');			
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
				$data['tampil_data_imigrasi'] = $this->M_imigrasi->tampil_data_imigrasi();
				$data['namamodule'] = "imigrasi";
				$data['namafileview'] = "imigrasiadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "imigrasi";
				$data['namafileview'] = "imigrasiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_imigrasi(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_imigrasi	= $this->input->post('nama_imigrasi');
		
		$this->M_imigrasi->simpan_data_imigrasi($nama_imigrasi);

		redirect('imigrasi');
	}

	function update_data_imigrasi() {
			$this->M_imigrasi->update_data_imigrasi();
			redirect('imigrasi');
	}

	function hapus_data_imigrasi() {
		$this->M_imigrasi->hapus_data_imigrasi();
		redirect('imigrasi');
	}
}