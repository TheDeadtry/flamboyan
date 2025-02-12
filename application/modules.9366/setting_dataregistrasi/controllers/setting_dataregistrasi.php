<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class setting_dataregistrasi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_setting_dataregistrasi');			
	}
	
	function index(){
		$data['tampil_data_setketerangan'] = $this->M_setting_dataregistrasi->tampil_data_setketerangan();
		$data['namamodule'] = "setting_dataregistrasi";
		$data['namafileview'] = "setting_dataregistrasiadmin";
		echo Modules::run('template/admin_template', $data);
	}

	function simpan_data(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama	= $this->input->post('nama');
		
		$this->M_setting_dataregistrasi->simpan_data_setketerangan($nama);

		redirect('setting_dataregistrasi');
	}

	function update_data() {
			$this->M_setting_dataregistrasi->update_data_setketerangan();
			redirect('setting_dataregistrasi');
	}

	function hapus_data() {
		$this->M_setting_dataregistrasi->hapus_data_setketerangan();
		redirect('setting_dataregistrasi');
	}
}