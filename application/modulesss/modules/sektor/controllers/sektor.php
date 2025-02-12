<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Sektor extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_sektor');			
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

				$data['tampil_data_sektor'] = $this->M_sektor->tampil_data_sektor();


				$data['namamodule'] = "sektor";
				$data['namafileview'] = "sektoradmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "sektor";
				$data['namafileview'] = "sektoragen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function simpan_data_sektor(){
		$kode_sektor	= $this->input->post('kode_sektor');
		$nama_sektor	= $this->input->post('nama_sektor');
		$nama_sektor_taiwan	= $this->input->post('nama_sektor_taiwan');
		$urut_sektor	= $this->input->post('urut_sektor');
		$jenis_kelamin	= $this->input->post('jenis_kelamin');
		$this->M_sektor->simpan_data_sektor($kode_sektor, $nama_sektor, $nama_sektor_taiwan, $urut_sektor,$jenis_kelamin);

		redirect('sektor');
	}

	
}