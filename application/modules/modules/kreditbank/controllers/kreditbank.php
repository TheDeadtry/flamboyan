<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Kreditbank extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_kreditbank');			
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

				$data['tampil_data_kreditbank'] = $this->M_kreditbank->tampil_data_kreditbank();
				$data['tampil_data_sektor'] = $this->M_kreditbank->tampil_data_sektor();


				$data['namamodule'] = "kreditbank";
				$data['namafileview'] = "kreditbankadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "kreditbank";
				$data['namafileview'] = "kreditbankagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_kreditbank(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$namasektor	= $this->input->post('namasektor');
		$nama_kredit	= $this->input->post('nama_kredit');
		$jumlahkredit	= $this->input->post('jumlahkredit');
		$nilaikredit	= $this->input->post('nilaikredit');
		
		$this->M_kreditbank->simpan_data_kreditbank($namasektor,$nama_kredit,$jumlahkredit,$nilaikredit);

		redirect('kreditbank');
	}

	function update_data_kreditbank($id) {
		if($this->input->post('submit')) {
			$this->M_kreditbank->update_data_kreditbank($id);
			redirect('kreditbank');
		}
		$data['tampil_data_kreditbank'] = $this->M_kreditbank->tampil_data_kreditbank();
		$data['tampil_data_sektor'] = $this->M_kreditbank->tampil_data_sektor();
		$data['kreditbank'] = $this->M_kreditbank->ambil_id($id);
		$data['namamodule'] = "kreditbank";
		$data['namafileview'] = "updatekreditbank";
		echo Modules::run('template/admin_template', $data);
	}

	function hapus_data_kreditbank($id) {
		$this->M_kreditbank->hapus_data_kreditbank($id);
		redirect('kreditbank');
	}
}