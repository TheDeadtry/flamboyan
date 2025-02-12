<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Sektormajikan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_sektormajikan');			
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
            $data['tampil_data_sektor'] = $this->M_sektormajikan->tampil_data_sektor();
            $data['sektor'] = $this->M_sektormajikan->sektor();
            $data['namamodule'] = "sektormajikan";
            $data['namafileview'] = "sektoradmin";
            echo Modules::run('template/admin_template', $data);
		}
	}

	function simpan_data_sektor(){
		$this->M_sektormajikan->simpan_data_sektor();

		redirect('sektormajikan');
	}

    function update_data_sektor($id) {
		if($this->input->post('submit')) {
			$this->M_sektormajikan->update_data_sektor($id);
			redirect('sektormajikan');
		}
		$data['tampil_data_sektor'] = $this->M_sektormajikan->tampil_data_sektor();
		$data['sektor'] = $this->M_sektormajikan->ambil_id($id);
		$data['namamodule'] = "sektormajikan";
		$data['namafileview'] = "updatesektor";
		echo Modules::run('template/admin_template', $data);
	}

	function hapus_data_sektor($id) {
		$this->M_sektormajikan->hapus_data_sektor($id);
		redirect('sektormajikan');
	}

	
}