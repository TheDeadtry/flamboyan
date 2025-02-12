<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Setting_pembinaan_tki_inf extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_setting_pembinaan_tki_inf');			
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
				$data['tampil_data_agama'] = $this->M_agama->tampil_data_agama();
				$data['namamodule'] = "setting_pembinaan_tki_inf";
				$data['namafileview'] = "agamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				//$data['tampil_data_jk'] = $this->M_setting_pembinaan_tki_inf->tampil_data_jk();
				$data['namamodule'] = "setting_pembinaan_tki_inf";
				$data['namafileview'] = "pembinaan_tki";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}
	
//==============================================INSTRUKTUR / STAF BLK=======================================================//

	
	function instruktur() {
			$data['tampil_data_instruktur'] = $this->M_setting_pembinaan_tki_inf->tampil_data_instruktur();
			$data['namamodule'] = "setting_pembinaan_tki_inf";
			$data['namafileview'] = "instruktur";
			echo Modules::run('template/blk_template', $data); 
	}

	function simpan_data_instruktur(){
			
		$this->M_setting_pembinaan_tki_inf->simpan_data_instruktur();
		redirect('setting_pembinaan_tki_inf/instruktur');
	}

	function update_data_instruktur() {
			$this->M_setting_pembinaan_tki_inf->update_data_instruktur();
			redirect('setting_pembinaan_tki_inf/instruktur');
	}

	function hapus_data_instruktur() {
		$this->M_setting_pembinaan_tki_inf->hapus_data_instruktur();
		redirect('setting_pembinaan_tki_inf/instruktur');
	}
	
//============================================== MARKETING =======================================================//
	
	function marketing() {
			$data['tampil_data_marketing'] = $this->M_setting_pembinaan_tki_inf->tampil_data_marketing();
			$data['namamodule'] = "setting_pembinaan_tki_inf";
			$data['namafileview'] = "marketing";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_marketing(){
			
		$this->M_setting_pembinaan_tki_inf->simpan_data_marketing();
		redirect('setting_pembinaan_tki_inf/marketing');
	}
	function update_data_marketing() {
			$this->M_setting_pembinaan_tki_inf->update_data_marketing();
			redirect('setting_pembinaan_tki_inf/marketing');
	}
	function hapus_data_marketing() {
		$this->M_setting_pembinaan_tki_inf->hapus_data_marketing();
		redirect('setting_pembinaan_tki_inf/marketing');
	}

//==============================================ADM KANTOR=======================================================//	
	
	function adm_kantor() {
			$data['tampil_data_adm_kantor'] = $this->M_setting_pembinaan_tki_inf->tampil_data_adm_kantor();
			$data['namamodule'] = "setting_pembinaan_tki_inf";
			$data['namafileview'] = "adm_kantor";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_adm_kantor(){
			
		$this->M_setting_pembinaan_tki_inf->simpan_data_adm_kantor();
		redirect('setting_pembinaan_tki_inf/adm_kantor');
	}
	function update_data_adm_kantor() {
			$this->M_setting_pembinaan_tki_inf->update_data_adm_kantor();
			redirect('setting_pembinaan_tki_inf/adm_kantor');
	}
	function hapus_data_adm_kantor() {
		$this->M_setting_pembinaan_tki_inf->hapus_data_adm_kantor();
		redirect('setting_pembinaan_tki_inf/adm_kantor');
	}
	
//============================================= Ranjang =======================================================//

	function ranjang() {
			$data['tampil_data_ranjang'] = $this->M_setting_pembinaan_tki_inf->tampil_data_ranjang();
			$data['namamodule'] = "setting_pembinaan_tki_inf";
			$data['namafileview'] = "ranjang";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_ranjang(){
			
		$this->M_setting_pembinaan_tki_inf->simpan_data_ranjang();
		redirect('setting_pembinaan_tki_inf/ranjang');
	}
	function update_data_ranjang() {
			$this->M_setting_pembinaan_tki_inf->update_data_ranjang();
			redirect('setting_pembinaan_tki_inf/ranjang');
	}
	function hapus_data_ranjang() {
		$this->M_setting_pembinaan_tki_inf->hapus_data_ranjang();
		redirect('setting_pembinaan_tki_inf/ranjang');
	}

//============================================= JENIS KB =======================================================//

	function jenis_kb() {
			$data['tampil_data_jenis_kb'] = $this->M_setting_pembinaan_tki_inf->tampil_data_jenis_kb();
			$data['namamodule'] = "setting_pembinaan_tki_inf";
			$data['namafileview'] = "jenis_kb";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_jenis_kb(){
			
		$this->M_setting_pembinaan_tki_inf->simpan_data_jenis_kb();
		redirect('setting_pembinaan_tki_inf/jenis_kb');
	}
	function update_data_jenis_kb() {
			$this->M_setting_pembinaan_tki_inf->update_data_jenis_kb();
			redirect('setting_pembinaan_tki_inf/jenis_kb');
	}
	function hapus_data_jenis_kb() {
		$this->M_setting_pembinaan_tki_inf->hapus_data_jenis_kb();
		redirect('setting_pembinaan_tki_inf/jenis_kb');
	}
	
//============================================= Izin Keperluan =======================================================//

	function izin_keperluan() {
			$data['tampil_data_izin_keperluan'] = $this->M_setting_pembinaan_tki_inf->tampil_data_izin_keperluan();
			$data['namamodule'] = "setting_pembinaan_tki_inf";
			$data['namafileview'] = "izin_keperluan";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_izin_keperluan(){
			
		$this->M_setting_pembinaan_tki_inf->simpan_data_izin_keperluan();
		redirect('setting_pembinaan_tki_inf/izin_keperluan');
	}
	function update_data_izin_keperluan() {
			$this->M_setting_pembinaan_tki_inf->update_data_izin_keperluan();
			redirect('setting_pembinaan_tki_inf/izin_keperluan');
	}
	function hapus_data_izin_keperluan() {
		$this->M_setting_pembinaan_tki_inf->hapus_data_izin_keperluan();
		redirect('setting_pembinaan_tki_inf/izin_keperluan');
	}
	
	
}