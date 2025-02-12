<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Jabatan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_jabatan');			
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
				$data['tampil_data_jabatan'] = $this->M_jabatan->tampil_data_jabatan();

				$data['namamodule'] = "jabatan";
				$data['namafileview'] = "jabatanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "jabatan";
				$data['namafileview'] = "jabatanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_jabatan(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_jabatan	= $this->input->post('nama_jabatan');
		$nama_jabatan_taiwan	= $this->input->post('nama_jabatan_taiwan');
		
		$this->M_jabatan->simpan_data_jabatan($nama_jabatan,$nama_jabatan_taiwan);

		redirect('jabatan');
	}

	function update_data_jabatan() {
			$this->M_jabatan->update_data_jabatan();
			redirect('jabatan');

	}

	function hapus_data_jabatan() {
		$this->M_jabatan->hapus_data_jabatan();
		redirect('jabatan');
	}
}