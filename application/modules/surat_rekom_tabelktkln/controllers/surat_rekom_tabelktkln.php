<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_rekom_tabelktkln extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_surat_rekom_tabelktkln');			
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

			$data['tampil_data_personal'] = $this->M_surat_rekom_tabelktkln->tampil_data_personal();
			$data['tampil_data_tki'] = $this->M_surat_rekom_tabelktkln->tampil_data_tki();
			$data['tampil_data_namapap'] = $this->M_surat_rekom_tabelktkln->tampil_data_namapap();


				$data['namamodule'] = "surat_rekom_tabelktkln";
				$data['namafileview'] = "surat_rekom_tabelktkln";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "surat_rekom_tabelktkln";
				$data['namafileview'] = "surat_rekom_tabelktkln";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function detailtabelktkln($idtabelktkln){
		$data['tampil_data_detail'] = $this->M_surat_rekom_tabelktkln->tampil_data_detail($idtabelktkln);
		
		$data['tampil_data_ff'] = $this->M_surat_rekom_tabelktkln->tampil_data_ff();
		$data['tampil_data_fi'] = $this->M_surat_rekom_tabelktkln->tampil_data_fi();
		$data['tampil_data_mf'] = $this->M_surat_rekom_tabelktkln->tampil_data_mf();
		$data['tampil_data_mi'] = $this->M_surat_rekom_tabelktkln->tampil_data_mi();
		$data['tampil_data_jp'] = $this->M_surat_rekom_tabelktkln->tampil_data_jp();

		$data['id_pembuatan'] = $idtabelktkln;
				$data['namamodule'] = "surat_rekom_tabelktkln";
				$data['namafileview'] = "detailtabelktkln";
				echo Modules::run('template/admin_template', $data);
		
	}
		function simpan_data_tabelktkln($idagen){
		$this->M_surat_rekom_tabelktkln->simpan_data_ctki();
		redirect('surat_rekom_tabelktkln/detailtabelktkln/'.$idagen);
	}
	function update_tabelktkln($idagen) {
		$this->M_surat_rekom_tabelktkln->update_ctki();
		redirect('surat_rekom_tabelktkln/detailtabelktkln/'.$idagen);
	}

	function hapus_tabelktkln($idagen) {
		$this->M_surat_rekom_tabelktkln->hapus_ctki();
		redirect('surat_rekom_tabelktkln/detailtabelktkln/'.$idagen);
	}
	
	function simpan_data_surat(){
		$this->M_surat_rekom_tabelktkln->simpan_data_surat();

		redirect('surat_rekom_tabelktkln/index/');
	}

	function edit_surat() {
			$this->M_surat_rekom_tabelktkln->edit_surat();
			redirect('surat_rekom_tabelktkln/index/');
	}

	function hapus_data_surat() {
		$this->M_surat_rekom_tabelktkln->hapus_data_surat();
		redirect('surat_rekom_tabelktkln/index/');
	}
        
}