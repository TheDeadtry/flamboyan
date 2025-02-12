<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class setting_nikpptkis extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_nikpptkis');			
	}
	
	function index($datatrima = ""){
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
				$data['linkfeedback'] = $datatrima;
				$data['tampil_data_dokdibawa'] = $this->M_nikpptkis->tampil_data_dokdibawa();
				$data['namamodule'] = "setting_nikpptkis";
				$data['namafileview'] = "dokdibawaadmin";
				echo Modules::run('template/new_admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['linkfeedback'] = $datatrima;
				$data['namamodule'] = "setting_nikpptkis";
				$data['namafileview'] = "dokdibawaagen";
				echo Modules::run('template/new_agen_template', $data); 
			}
		}	 
	}

	function simpan_data_dokdibawa(){
		$status	= $this->input->post('status');
		$nama = $this->input->post('nama');
		
		$this->M_nikpptkis->simpan_data_dokdibawa($status,$nama);

		redirect('setting_nikpptkis');
	}

	function update_data_dokdibawa() {
			$this->M_nikpptkis->update_data_dokdibawa();
			redirect('setting_nikpptkis');
	}

	function hapus_data_dokdibawa($id) {
		$this->M_nikpptkis->hapus_data_dokdibawa($id);
		redirect('setting_nikpptkis');
	}
}