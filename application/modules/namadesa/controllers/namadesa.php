<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Namadesa extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namadesa');			
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
				$data['tampil_data_namadesa'] = $this->M_namadesa->tampil_data_namadesa();
				$data['namamodule'] = "namadesa";
				$data['namafileview'] = "namadesa";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namadesa";
				$data['namafileview'] = "namadesa";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namadesa(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_desa	= $this->input->post('nama_desa');
		$alamat_desa	= $this->input->post('alamat_desa');
		
		$this->M_namadesa->simpan_data_namadesa($nama_desa,$alamat_desa);

		redirect('namadesa');
	}

	function update_data_namadesa() {
			$this->M_namadesa->update_data_namadesa();
			redirect('namadesa');
	}

	function hapus_data_namadesa() {
		$this->M_namadesa->hapus_data_namadesa();
		redirect('namadesa');
	}
}