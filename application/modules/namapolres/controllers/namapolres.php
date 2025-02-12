<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class namapolres extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namapolres');			
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
				$data['tampil_data_namapolres'] = $this->M_namapolres->tampil_data_namapolres();
				$data['namamodule'] = "namapolres";
				$data['namafileview'] = "namapolres";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namapolres";
				$data['namafileview'] = "namapolres";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namapolres(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_polda	= $this->input->post('nama_polda');
		$alamat	= $this->input->post('alamat');
		
		$this->M_namapolres->simpan_data_namapolres($nama_polda,$alamat);

		redirect('namapolres');
	}

	function update_data_namapolres() {
			$this->M_namapolres->update_data_namapolres();
			redirect('namapolres');
	}

	function hapus_data_namapolres() {
		$this->M_namapolres->hapus_data_namapolres();
		redirect('namapolres');
	}
}