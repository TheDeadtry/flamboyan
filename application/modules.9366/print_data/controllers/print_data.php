<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class print_data extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_print_data');			
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
/*
				$data['hitung_data_mf'] = $this->M_print_data->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_print_data->hitung_data_mi();
				$data['hitung_data_jp'] = $this->M_print_data->hitung_data_jp();
				$data['hitung_data_ijin_kbanyuwangi'] = $this->M_print_data->hitung_data_ijin_kbanyuwangi();
				$data['hitung_data_2'] = $this->M_print_data->hitung_data_2();
				$data['hitung_data_3'] = $this->M_print_data->hitung_data_3();
				$data['hitung_data_4'] = $this->M_print_data->hitung_data_4();
				$data['hitung_data_5'] = $this->M_print_data->hitung_data_5();
				$data['hitung_data_6'] = $this->M_print_data->hitung_data_6();
				$data['hitung_data_7'] = $this->M_print_data->hitung_data_7();
				$data['hitung_data_8'] = $this->M_print_data->hitung_data_8();
				$data['hitung_data_9'] = $this->M_print_data->hitung_data_9();
				$data['hitung_data_10'] = $this->M_print_data->hitung_data_10();
				$data['hitung_data_11'] = $this->M_print_data->hitung_data_11();
				$data['tampil_data_personal'] = $this->M_print_data->tampil_data_personal();
				$data['hitung_data_disnaker_informal'] = $this->M_print_data->hitung_data_disnaker_informal();
				$data['hitung_data_disnaker_formal'] = $this->M_print_data->hitung_data_disnaker_formal();
				$data['hitung_data_disnaker_jompo'] = $this->M_print_data->hitung_data_disnaker_jompo();
				$data['hitung_surat_perjanjian_kerja_formal'] = $this->M_print_data->hitung_surat_perjanjian_kerja_formal();
				$data['hitung_surat_perjanjian_kerja_informal'] = $this->M_print_data->hitung_surat_perjanjian_kerja_informal();
*/
				$data['hitung1'] = $this->M_print_data->hitung1();
				$data['hitung2'] = $this->M_print_data->hitung2();
				$data['hitung3'] = $this->M_print_data->hitung3();
				$data['hitung4'] = $this->M_print_data->hitung4();
				$data['hitung5'] = $this->M_print_data->hitung5();
				$data['hitung6'] = $this->M_print_data->hitung6();

			//user sudah login
				$data['namamodule'] = "print_data";
				$data['namafileview'] = "print_data";
				echo Modules::run('template/new_admin_template', $data);
			}
			
		
		}
		 
	}
	
}