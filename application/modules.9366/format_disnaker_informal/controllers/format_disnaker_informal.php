<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Format_disnaker_informal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_format_disnaker_informal');			
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

			$data['tampil_data_personal'] = $this->M_format_disnaker_informal->tampil_data_personal();
			$data['tampil_data_tki'] = $this->M_format_disnaker_informal->tampil_data_tki();
			$data['tampil_data_data'] = $this->M_format_disnaker_informal->tampil_data_data();
			$data['tampil_data_paspor'] = $this->M_format_disnaker_informal->tampil_data_paspor();
			$data['tampil_data_keluarga'] = $this->M_format_disnaker_informal->tampil_data_keluarga();
			$data['tampil_data_agen'] = $this->M_format_disnaker_informal->tampil_data_agen();
			$data['tampil_data_jabatan'] = $this->M_format_disnaker_informal->tampil_data_jabatan();

				$data['namamodule'] = "format_disnaker_informal";
				$data['namafileview'] = "format_disnaker_informal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "format_disnaker_informal";
				$data['namafileview'] = "format_disnaker_informal";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function simpan_data_surat(){
		$this->M_format_disnaker_informal->simpan_data_surat();

		redirect('format_disnaker_informal');
	}
	
	
	function edit_data_surat(){
		$this->M_format_disnaker_informal->edit_data_surat();

		redirect('format_disnaker_informal');
	}
	
 function hapus_data_surat() {
		$this->M_format_disnaker_informal->hapus_data_surat();
		redirect('format_disnaker_informal');
	}

	
	
}