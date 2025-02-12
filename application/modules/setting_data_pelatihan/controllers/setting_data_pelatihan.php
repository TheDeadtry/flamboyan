<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Setting_data_pelatihan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_setting_data_pelatihan');			
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
				$data['namamodule'] = "setting_data_pelatihan";
				$data['namafileview'] = "agamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				//$data['tampil_data_jk'] = $this->M_setting_data_pelatihan->tampil_data_jk();
				$data['namamodule'] = "setting_data_pelatihan";
				$data['namafileview'] = "pemilik_tki";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

//============================================== Graha Laundry =======================================================//

	function graha_laundry() {
		$data['tampil_data_graha_laundry'] = $this->M_setting_data_pelatihan->tampil_data_graha_laundry();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "graha_laundry";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_graha_laundry(){
			
		$this->M_setting_data_pelatihan->simpan_data_graha_laundry();
		redirect('setting_data_pelatihan/graha_laundry');
	}
	function update_data_graha_laundry() {
		$this->M_setting_data_pelatihan->update_data_graha_laundry();
		redirect('setting_data_pelatihan/graha_laundry');
	}
	function hapus_data_graha_laundry() {
		$this->M_setting_data_pelatihan->hapus_data_graha_laundry();
		redirect('setting_data_pelatihan/graha_laundry');
	}

//============================================== Graha Ruang =======================================================//

	function graha_ruang() {
		$data['tampil_data_graha_ruang'] = $this->M_setting_data_pelatihan->tampil_data_graha_ruang();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "graha_ruang";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_graha_ruang(){
			
		$this->M_setting_data_pelatihan->simpan_data_graha_ruang();
		redirect('setting_data_pelatihan/graha_ruang');
	}
	function update_data_graha_ruang() {
		$this->M_setting_data_pelatihan->update_data_graha_ruang();
		redirect('setting_data_pelatihan/graha_ruang');
	}
	function hapus_data_graha_ruang() {
		$this->M_setting_data_pelatihan->hapus_data_graha_ruang();
		redirect('setting_data_pelatihan/graha_ruang');
	}

//============================================== Graha Boga =======================================================//

	function graha_boga() {
		$data['tampil_data_graha_boga'] = $this->M_setting_data_pelatihan->tampil_data_graha_boga();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "graha_boga";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_graha_boga(){
			
		$this->M_setting_data_pelatihan->simpan_data_graha_boga();
		redirect('setting_data_pelatihan/graha_boga');
	}
	function update_data_graha_boga() {
		$this->M_setting_data_pelatihan->update_data_graha_boga();
		redirect('setting_data_pelatihan/graha_boga');
	}
	function hapus_data_graha_boga() {
		$this->M_setting_data_pelatihan->hapus_data_graha_boga();
		redirect('setting_data_pelatihan/graha_boga');
	}

//============================================== Fisik Mental =======================================================//

	function fisik_mental() {
		$data['tampil_data_fisik_mental'] = $this->M_setting_data_pelatihan->tampil_data_fisik_mental();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "fisik_mental";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_fisik_mental(){
		$this->M_setting_data_pelatihan->simpan_data_fisik_mental();
		redirect('setting_data_pelatihan/fisik_mental');
	}
	function update_data_fisik_mental() {
			$this->M_setting_data_pelatihan->update_data_fisik_mental();
			redirect('setting_data_pelatihan/fisik_mental');
	}
	function hapus_data_fisik_mental() {
		$this->M_setting_data_pelatihan->hapus_data_fisik_mental();
		redirect('setting_data_pelatihan/fisik_mental');
	}

//============================================== Jompo =======================================================//

	function jompo() {
		$data['tampil_data_jompo'] = $this->M_setting_data_pelatihan->tampil_data_jompo();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "jompo";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_jompo(){
		$this->M_setting_data_pelatihan->simpan_data_jompo();
		redirect('setting_data_pelatihan/jompo');
	}
	function update_data_jompo() {
			$this->M_setting_data_pelatihan->update_data_jompo();
			redirect('setting_data_pelatihan/jompo');
	}
	function hapus_data_jompo() {
		$this->M_setting_data_pelatihan->hapus_data_jompo();
		redirect('setting_data_pelatihan/jompo');
	}

//============================================== Bahasa Taiyu =======================================================//

	function bhs_taiyu() {
		$data['tampil_data_bhs_taiyu'] = $this->M_setting_data_pelatihan->tampil_data_bhs_taiyu();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "bhs_taiyu";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_bhs_taiyu(){
		$this->M_setting_data_pelatihan->simpan_data_bhs_taiyu();
		redirect('setting_data_pelatihan/bhs_taiyu');
	}
	function update_data_bhs_taiyu() {
			$this->M_setting_data_pelatihan->update_data_bhs_taiyu();
			redirect('setting_data_pelatihan/bhs_taiyu');
	}
	function hapus_data_bhs_taiyu() {
		$this->M_setting_data_pelatihan->hapus_data_bhs_taiyu();
		redirect('setting_data_pelatihan/bhs_taiyu');
	}

//============================================== Mandarin Informal-Jompo =======================================================//

	function mandarin_inf_jompo() {
		$data['tampil_data_mandarin_inf_jompo'] = $this->M_setting_data_pelatihan->tampil_data_mandarin_inf_jompo();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "mandarin_inf_jompo";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_mandarin_inf_jompo(){
		$this->M_setting_data_pelatihan->simpan_data_mandarin_inf_jompo();
		redirect('setting_data_pelatihan/mandarin_inf_jompo');
	}
	function update_data_mandarin_inf_jompo() {
			$this->M_setting_data_pelatihan->update_data_mandarin_inf_jompo();
			redirect('setting_data_pelatihan/mandarin_inf_jompo');
	}
	function hapus_data_mandarin_inf_jompo() {
		$this->M_setting_data_pelatihan->hapus_data_mandarin_inf_jompo();
		redirect('setting_data_pelatihan/mandarin_inf_jompo');
	}

//============================================== Tata Boga =======================================================//

	function tata_boga() {
		$data['tampil_data_tata_boga'] = $this->M_setting_data_pelatihan->tampil_data_tata_boga();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "tata_boga";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_tata_boga(){
		$this->M_setting_data_pelatihan->simpan_data_tata_boga();
		redirect('setting_data_pelatihan/tata_boga');
	}
	function update_data_tata_boga() {
			$this->M_setting_data_pelatihan->update_data_tata_boga();
			redirect('setting_data_pelatihan/tata_boga');
	}
	function hapus_data_tata_boga() {
		$this->M_setting_data_pelatihan->hapus_data_tata_boga();
		redirect('setting_data_pelatihan/tata_boga');
	}

//============================================== Psikotest =======================================================//

	function psikotest() {
		$data['tampil_data_psikotest'] = $this->M_setting_data_pelatihan->tampil_data_psikotest();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "psikotest";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_psikotest(){
		$this->M_setting_data_pelatihan->simpan_data_psikotest();
		redirect('setting_data_pelatihan/psikotest');
	}
	function update_data_psikotest() {
			$this->M_setting_data_pelatihan->update_data_psikotest();
			redirect('setting_data_pelatihan/psikotest');
	}
	function hapus_data_psikotest() {
		$this->M_setting_data_pelatihan->hapus_data_psikotest();
		redirect('setting_data_pelatihan/psikotest');
	}

//============================================== Mandarin Pabrik =======================================================//

	function mandarin_pabrik() {
		$data['tampil_data_mandarin_pabrik'] = $this->M_setting_data_pelatihan->tampil_data_mandarin_pabrik();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "mandarin_pabrik";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_mandarin_pabrik(){
		$this->M_setting_data_pelatihan->simpan_data_mandarin_pabrik();
		redirect('setting_data_pelatihan/mandarin_pabrik');
	}
	function update_data_mandarin_pabrik() {
			$this->M_setting_data_pelatihan->update_data_mandarin_pabrik();
			redirect('setting_data_pelatihan/mandarin_pabrik');
	}
	function hapus_data_mandarin_pabrik() {
		$this->M_setting_data_pelatihan->hapus_data_mandarin_pabrik();
		redirect('setting_data_pelatihan/mandarin_pabrik');
	}

//============================================== Olah Raga =======================================================//

	function olah_raga() {
		$data['tampil_data_olah_raga'] = $this->M_setting_data_pelatihan->tampil_data_olah_raga();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "olah_raga";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_olah_raga(){
		$this->M_setting_data_pelatihan->simpan_data_olah_raga();
		redirect('setting_data_pelatihan/olah_raga');
	}
	function update_data_olah_raga() {
			$this->M_setting_data_pelatihan->update_data_olah_raga();
			redirect('setting_data_pelatihan/olah_raga');
	}
	function hapus_data_olah_raga() {
		$this->M_setting_data_pelatihan->hapus_data_olah_raga();
		redirect('setting_data_pelatihan/olah_raga');
	}

//============================================== Berhitung =======================================================//

	function berhitung() {
		$data['tampil_data_berhitung'] = $this->M_setting_data_pelatihan->tampil_data_berhitung();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "berhitung";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_berhitung(){
		$this->M_setting_data_pelatihan->simpan_data_berhitung();
		redirect('setting_data_pelatihan/berhitung');
	}
	function update_data_berhitung() {
			$this->M_setting_data_pelatihan->update_data_berhitung();
			redirect('setting_data_pelatihan/berhitung');
	}
	function hapus_data_berhitung() {
		$this->M_setting_data_pelatihan->hapus_data_berhitung();
		redirect('setting_data_pelatihan/berhitung');
	}

//============================================== Umum Informal-Jompo =======================================================//

	function umum_inf_jompo() {
		$data['tampil_data_umum_inf_jompo'] = $this->M_setting_data_pelatihan->tampil_data_umum_inf_jompo();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "umum_inf_jompo";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_umum_inf_jompo(){
		$this->M_setting_data_pelatihan->simpan_data_umum_inf_jompo();
		redirect('setting_data_pelatihan/umum_inf_jompo');
	}
	function update_data_umum_inf_jompo() {
			$this->M_setting_data_pelatihan->update_data_umum_inf_jompo();
			redirect('setting_data_pelatihan/umum_inf_jompo');
	}
	function hapus_data_umum_inf_jompo() {
		$this->M_setting_data_pelatihan->hapus_data_umum_inf_jompo();
		redirect('setting_data_pelatihan/umum_inf_jompo');
	}

//============================================== Umum Pabrik =======================================================//

	function umum_pabrik() {
		$data['tampil_data_umum_pabrik'] = $this->M_setting_data_pelatihan->tampil_data_umum_pabrik();
		$data['namamodule'] = "setting_data_pelatihan";
		$data['namafileview'] = "umum_pabrik";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_umum_pabrik(){
		$this->M_setting_data_pelatihan->simpan_data_umum_pabrik();
		redirect('setting_data_pelatihan/umum_pabrik');
	}
	function update_data_umum_pabrik() {
			$this->M_setting_data_pelatihan->update_data_umum_pabrik();
			redirect('setting_data_pelatihan/umum_pabrik');
	}
	function hapus_data_umum_pabrik() {
		$this->M_setting_data_pelatihan->hapus_data_umum_pabrik();
		redirect('setting_data_pelatihan/umum_pabrik');
	}
}