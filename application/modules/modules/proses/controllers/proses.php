<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Proses extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_proses');			
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
				$data['tampil_data_proses'] = $this->M_proses->tampil_data_proses();
				$data['namamodule'] = "proses";
				$data['namafileview'] = "prosesadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "proses";
				$data['namafileview'] = "prosesagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_proses(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_proses	= $this->input->post('nama_proses');
		$tgl_proses	= $this->input->post('tgl_proses');
		$status_proses	= $this->input->post('status_proses');
		
		$this->M_proses->simpan_data_proses($nama_proses,$status_proses);

		redirect('proses');
	}

	function detail_proses($id) {
	//	if($this->input->post('submit')) {
			//$this->M_proses->detail_proses($id);
		// 	redirect('proses');
		// }
		$data['tampil_data_proses'] = $this->M_proses->tampil_data_proses();
		//$data['proses'] = $this->M_proses->ambil_id($id);
		$data['namamodule'] = "proses";
		$data['namafileview'] = "detailproses";
		echo Modules::run('template/admin_template', $data);
	}

	function hapus_data_proses($id) {
		$this->M_proses->hapus_data_proses($id);
		redirect('proses');
	}
}