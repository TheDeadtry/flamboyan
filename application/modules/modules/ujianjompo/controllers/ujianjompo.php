<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class ujianjompo extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		$this->load->model('M_ujianjompo');			
	}

	function index() {
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']) {
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status == 1){
			//user sudah login
				$stat = "Jompo";
				$this->session->set_userdata('status',$stat);
				$data['status'] = $this->session->userdata('status');
				$data['tampil_data_ujian'] = $this->M_ujianjompo->tampil_data_ujian();
				$data['tampil_data_personal'] = $this->M_ujianjompo->tampil_data_personal();
				$data['tampil_data_nilai'] = $this->M_ujianjompo->tampil_data_nilai();
				$data['namamodule'] = "ujianjompo";
				$data['namafileview'] = "jompoadmin";
				echo Modules::run('template/admin_template', $data);
			}
		}
	}

	function simpan_data_ujian() {
		$this->M_ujianjompo->simpan_data_ujian();
		redirect('ujianjompo');
	}

	function simpan_data_nilai() {
		$this->M_ujianjompo->simpan_data_nilai();
		redirect('ujianjompo');
	}

	function update_data_ujian($id) {
		if($this->input->post('submit')) {
			$this->M_ujianjompo->update_data_ujian($id);
			redirect('ujianjompo');
		}
		$stat = "Jompo";
		$this->session->set_userdata('status',$stat);
		$data['status'] = $this->session->userdata('status');
		$data['tampil_data_ujian'] = $this->M_ujianjompo->tampil_data_ujian();
		$data['ujian'] = $this->M_ujianjompo->ambil_id($id);
		$data['namamodule'] = "ujianjompo";
		$data['namafileview'] = "wanitaupdate";
		echo Modules::run('template/admin_template', $data);
	}

	function hapus_data_ujian($id) {
		$this->M_ujianjompo->hapus_data_ujian($id);
		redirect('ujianjompo');
	}

	function set_detail() {
		if(isset($_POST['atur'])) {
			$stat = "Jompo";
			$this->session->set_userdata('status',$stat);
			$data['status'] = $this->session->userdata('status');
			$data['tampil_data_ujian'] = $this->M_ujianjompo->tampil_data_ujian();
			$data['tampil_data_personal'] = $this->M_ujianjompo->tampil_data_personal();
			$data['tampil_data_nilai'] = $this->M_ujianjompo->tampil_detail_nilai();
			$data['namamodule'] = "ujianjompo";
			$data['namafileview'] = "detailnilai";
			echo Modules::run('template/admin_template', $data);
		}
	}
}