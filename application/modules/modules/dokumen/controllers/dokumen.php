<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Dokumen extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_Dokumen');			
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
			$id_biodata = $this->session->userdata("detailuser");
			$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_Dokumen->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_dokumen'] = $this->M_Dokumen->tampil_data_dokumen($this->session->userdata("detailuser"));
			//user sudah login
				$data['namamodule'] = "Dokumen";
				$data['namafileview'] = "Dokumenadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "Dokumen";
				$data['namafileview'] = "Dokumenagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_Dokumen(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_Dokumen	= $this->input->post('nama_Dokumen');
		$nama_Dokumen_taiwan	= $this->input->post('nama_Dokumen_taiwan');
		
		$this->M_Dokumen->simpan_data_Dokumen($nama_Dokumen,$nama_Dokumen_taiwan);

		redirect('Dokumen');
	}

	function update_data_Dokumen($id) {
		if($this->input->post('submit')) {
			$this->M_Dokumen->update_data_Dokumen($id);
			redirect('Dokumen');
		}
		$data['Dokumen'] = $this->M_Dokumen->ambil_id($id);
		$data['namamodule'] = "Dokumen";
		$data['namafileview'] = "updateDokumen";
		echo Modules::run('template/admin_template', $data);
	}

	function hapus_data_Dokumen($id) {
		$this->M_Dokumen->hapus_data_Dokumen($id);
		redirect('Dokumen');
	}


			function ubahktp(){
		$this->M_Dokumen->ubahktp();
		redirect('dokumen');
		}
			function ubahkk(){
		$this->M_Dokumen->ubahkk();
		redirect('dokumen');
		}

			function ubahakte(){
		$this->M_Dokumen->ubahakte();
		redirect('dokumen');
		}

			function ubahijazah(){
		$this->M_Dokumen->ubahijazah();
		redirect('dokumen');
		}

			function ubahpaspor(){
		$this->M_Dokumen->ubahpaspor();
		redirect('dokumen');
		}
			function ubaharc(){
		$this->M_Dokumen->ubaharc();
		redirect('dokumen');
		}

}