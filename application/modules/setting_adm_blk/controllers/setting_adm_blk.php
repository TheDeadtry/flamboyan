<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Setting_adm_blk extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_setting_adm_blk');			
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
				$data['namamodule'] = "setting_adm_blk";
				$data['namafileview'] = "agamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				//$data['tampil_data_jk'] = $this->M_setting_adm_blk->tampil_data_jk();
				$data['namamodule'] = "setting_adm_blk";
				$data['namafileview'] = "pemilik_tki";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}
	
//==============================================PEMILIK TKI=======================================================//

	
	function pemilik_tki() {
			$data['tampil_data_pemilik_tki'] = $this->M_setting_adm_blk->tampil_data_pemilik_tki();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "pemilik_tki";
			echo Modules::run('template/blk_template', $data); 
	}

	function simpan_data_pemilik_tki(){
			
		$this->M_setting_adm_blk->simpan_data_pemilik_tki();
		redirect('setting_adm_blk/pemilik_tki');
	}

	function update_data_pemilik_tki() {
			$this->M_setting_adm_blk->update_data_pemilik_tki();
			redirect('setting_adm_blk/pemilik_tki');
	}

	function hapus_data_pemilik_tki() {
		$this->M_setting_adm_blk->hapus_data_pemilik_tki();
		redirect('setting_adm_blk/pemilik_tki');
	}
	
//==============================================JENIS KELAMIN=======================================================//
	
	function jenis_kelamin() {
			$data['tampil_data_jenis_kelamin'] = $this->M_setting_adm_blk->tampil_data_jenis_kelamin();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "jenkel";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_jenis_kelamin(){
			
		$this->M_setting_adm_blk->simpan_data_jenis_kelamin();
		redirect('setting_adm_blk/jenis_kelamin');
	}
	function update_data_jenis_kelamin() {
			$this->M_setting_adm_blk->update_data_jenis_kelamin();
			redirect('setting_adm_blk/jenis_kelamin');
	}
	function hapus_data_jenis_kelamin() {
		$this->M_setting_adm_blk->hapus_data_jenis_kelamin();
		redirect('setting_adm_blk/jenis_kelamin');
	}

//==============================================JENIS UJIAN=======================================================//	
	
	function jenis_ujian() {
			$data['tampil_data_jenis_ujian'] = $this->M_setting_adm_blk->tampil_data_jenis_ujian();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "jenuj";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_jenis_ujian(){
			
		$this->M_setting_adm_blk->simpan_data_jenis_ujian();
		redirect('setting_adm_blk/jenis_ujian');
	}
	function update_data_jenis_ujian() {
			$this->M_setting_adm_blk->update_data_jenis_ujian();
			redirect('setting_adm_blk/jenis_ujian');
	}
	function hapus_data_jenis_ujian() {
		$this->M_setting_adm_blk->hapus_data_jenis_ujian();
		redirect('setting_adm_blk/jenis_ujian');
	}
	
//============================================= Cluster / Profesi =======================================================//

	function cluster() {
			$data['tampil_data_cluster'] = $this->M_setting_adm_blk->tampil_data_cluster();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "cluster";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_cluster(){
			
		$this->M_setting_adm_blk->simpan_data_cluster();
		redirect('setting_adm_blk/cluster');
	}
	function update_data_cluster() {
			$this->M_setting_adm_blk->update_data_cluster();
			redirect('setting_adm_blk/cluster');
	}
	function hapus_data_cluster() {
		$this->M_setting_adm_blk->hapus_data_cluster();
		redirect('setting_adm_blk/cluster');
	}

//============================================= Negara / Tujuan =======================================================//

	function negara_tujuan() {
			$data['tampil_data_negara_tujuan'] = $this->M_setting_adm_blk->tampil_data_negara_tujuan();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "negara_tujuan";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_negara_tujuan(){
			
		$this->M_setting_adm_blk->simpan_data_negara_tujuan();
		redirect('setting_adm_blk/negara_tujuan');
	}
	function update_data_negara_tujuan() {
			$this->M_setting_adm_blk->update_data_negara_tujuan();
			redirect('setting_adm_blk/negara_tujuan');
	}
	function hapus_data_negara_tujuan() {
		$this->M_setting_adm_blk->hapus_data_negara_tujuan();
		redirect('setting_adm_blk/negara_tujuan');
	}
	
//============================================= EKS / NON =======================================================//

	function eks_non() {
			$data['tampil_data_eks_non'] = $this->M_setting_adm_blk->tampil_data_eks_non();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "eks_non";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_eks_non(){
			
		$this->M_setting_adm_blk->simpan_data_eks_non();
		redirect('setting_adm_blk/eks_non');
	}
	function update_data_eks_non() {
			$this->M_setting_adm_blk->update_data_eks_non();
			redirect('setting_adm_blk/eks_non');
	}
	function hapus_data_eks_non() {
		$this->M_setting_adm_blk->hapus_data_eks_non();
		redirect('setting_adm_blk/eks_non');
	}
	
//============================================= BAHASA =======================================================//

	function bahasa() {
			$data['tampil_data_bahasa'] = $this->M_setting_adm_blk->tampil_data_bahasa();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "bahasa";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_bahasa(){
			
		$this->M_setting_adm_blk->simpan_data_bahasa();
		redirect('setting_adm_blk/bahasa');
	}
	function update_data_bahasa() {
			$this->M_setting_adm_blk->update_data_bahasa();
			redirect('setting_adm_blk/bahasa');
	}
	function hapus_data_bahasa() {
		$this->M_setting_adm_blk->hapus_data_bahasa();
		redirect('setting_adm_blk/bahasa');
	}

//============================================= Hasil UJK =======================================================//

	function hasil_ujk() {
			$data['tampil_data_hasil_ujk'] = $this->M_setting_adm_blk->tampil_data_hasil_ujk();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "hasil_ujk";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_hasil_ujk(){
			
		$this->M_setting_adm_blk->simpan_data_hasil_ujk();
		redirect('setting_adm_blk/hasil_ujk');
	}
	function update_data_hasil_ujk() {
			$this->M_setting_adm_blk->update_data_hasil_ujk();
			redirect('setting_adm_blk/hasil_ujk');
	}
	function hapus_data_hasil_ujk() {
		$this->M_setting_adm_blk->hapus_data_hasil_ujk();
		redirect('setting_adm_blk/hasil_ujk');
	}	

//============================================= Lembaga LSP =======================================================//

	function lembaga_lsp() {
		$data['tampil_data_lembaga_lsp'] = $this->M_setting_adm_blk->tampil_data_lembaga_lsp();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "lembaga_lsp";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_lembaga_lsp(){
			
		$this->M_setting_adm_blk->simpan_data_lembaga_lsp();
		redirect('setting_adm_blk/lembaga_lsp');
	}
	function update_data_lembaga_lsp() {
			$this->M_setting_adm_blk->update_data_lembaga_lsp();
			redirect('setting_adm_blk/lembaga_lsp');
	}
	function hapus_data_lembaga_lsp() {
		$this->M_setting_adm_blk->hapus_data_lembaga_lsp();
		redirect('setting_adm_blk/lembaga_lsp');
	}

//============================================== Nilai =======================================================//

	function nilai() {
		$data['tampil_data_nilai'] = $this->M_setting_adm_blk->tampil_data_nilai();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "nilai";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_nilai(){
			
		$this->M_setting_adm_blk->simpan_data_nilai();
		redirect('setting_adm_blk/nilai');
	}
	function update_data_nilai() {
			$this->M_setting_adm_blk->update_data_nilai();
			redirect('setting_adm_blk/nilai');
	}
	function hapus_data_nilai() {
		$this->M_setting_adm_blk->hapus_data_nilai();
		redirect('setting_adm_blk/nilai');
	}

//============================================== Tata Graha Laundry =======================================================//

	function graha_laundry() {
		$data['tampil_data_graha_laundry'] = $this->M_setting_adm_blk->tampil_data_graha_laundry();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "graha_laundry";
		echo Modules::run('template/blk_template', $data); 
	}
	function tambah_sub_data_graha_laundry() {
		$data['tambah_sub_data_graha_laundry'] = $this->M_setting_adm_blk->tambah_sub_data_graha_laundry();
		redirect('setting_adm_blk/graha_laundry');
	}
	function simpan_data_graha_laundry(){
			
		$this->M_setting_adm_blk->simpan_data_graha_laundry();
		redirect('setting_adm_blk/graha_laundry');
	}
	function update_data_graha_laundry() {
		$this->M_setting_adm_blk->update_data_graha_laundry();
		redirect('setting_adm_blk/graha_laundry');
	}
	function update_data_graha_laundry_sub() {
		$this->M_setting_adm_blk->update_data_graha_laundry_sub();
		redirect('setting_adm_blk/graha_laundry');
	}
	function hapus_data_graha_laundry() {
		$this->M_setting_adm_blk->hapus_data_graha_laundry();
		redirect('setting_adm_blk/graha_laundry');
	}
	function hapus_data_sub_graha_laundry() {
		$this->M_setting_adm_blk->hapus_data_sub_graha_laundry();
		redirect('setting_adm_blk/graha_laundry');
	}

//============================================== Tata Graha Ruang =======================================================//

	function graha_ruang() {
		$data['tampil_data_graha_ruang'] = $this->M_setting_adm_blk->tampil_data_graha_ruang();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "graha_ruang";
		echo Modules::run('template/blk_template', $data); 
	}
	function tambah_sub_data_graha_ruang() {
		$data['tambah_sub_data_graha_ruang'] = $this->M_setting_adm_blk->tambah_sub_data_graha_ruang();
		redirect('setting_adm_blk/graha_ruang');
	}
	function simpan_data_graha_ruang(){
			
		$this->M_setting_adm_blk->simpan_data_graha_ruang();
		redirect('setting_adm_blk/graha_ruang');
	}
	function update_data_graha_ruang() {
		$this->M_setting_adm_blk->update_data_graha_ruang();
		redirect('setting_adm_blk/graha_ruang');
	}
	function update_data_graha_ruang_sub() {
		$this->M_setting_adm_blk->update_data_graha_ruang_sub();
		redirect('setting_adm_blk/graha_ruang');
	}
	function hapus_data_graha_ruang() {
		$this->M_setting_adm_blk->hapus_data_graha_ruang();
		redirect('setting_adm_blk/graha_ruang');
	}
	function hapus_data_sub_graha_ruang() {
		$this->M_setting_adm_blk->hapus_data_sub_graha_ruang();
		redirect('setting_adm_blk/graha_ruang');
	}

//============================================== Mental & Fisik =======================================================//

	function mental_fisik() {
		$data['tampil_data_mental_fisik'] = $this->M_setting_adm_blk->tampil_data_mental_fisik();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "mental_fisik";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_mental_fisik(){
		$this->M_setting_adm_blk->simpan_data_mental_fisik();
		redirect('setting_adm_blk/mental_fisik');
	}
	function update_data_mental_fisik() {
			$this->M_setting_adm_blk->update_data_mental_fisik();
			redirect('setting_adm_blk/mental_fisik');
	}
	function hapus_data_mental_fisik() {
		$this->M_setting_adm_blk->hapus_data_mental_fisik();
		redirect('setting_adm_blk/mental_fisik');
	}

//============================================== Perawatan Jompo =======================================================//

	function jompo() {
		$data['tampil_data_jompo'] = $this->M_setting_adm_blk->tampil_data_jompo();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "jompo";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_jompo(){
		$this->M_setting_adm_blk->simpan_data_jompo();
		redirect('setting_adm_blk/jompo');
	}
	function update_data_jompo() {
			$this->M_setting_adm_blk->update_data_jompo();
			redirect('setting_adm_blk/jompo');
	}
	function hapus_data_jompo() {
		$this->M_setting_adm_blk->hapus_data_jompo();
		redirect('setting_adm_blk/jompo');
	}

//============================================== Bahasa Mandarin 1 =======================================================//

	function mandarin1() {
		$data['tampil_data_mandarin1'] = $this->M_setting_adm_blk->tampil_data_mandarin1();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "mandarin1";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_mandarin1(){
		$this->M_setting_adm_blk->simpan_data_mandarin1();
		redirect('setting_adm_blk/mandarin1');
	}
	function update_data_mandarin1() {
			$this->M_setting_adm_blk->update_data_mandarin1();
			redirect('setting_adm_blk/mandarin1');
	}
	function hapus_data_mandarin1() {
		$this->M_setting_adm_blk->hapus_data_mandarin1();
		redirect('setting_adm_blk/mandarin1');
	}

//============================================== Bahasa Mandarin 2 =======================================================//

	function mandarin2() {
		$data['tampil_data_mandarin2'] = $this->M_setting_adm_blk->tampil_data_mandarin2();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "mandarin2";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_mandarin2(){
		$this->M_setting_adm_blk->simpan_data_mandarin2();
		redirect('setting_adm_blk/mandarin2');
	}
	function update_data_mandarin2() {
			$this->M_setting_adm_blk->update_data_mandarin2();
			redirect('setting_adm_blk/mandarin2');
	}
	function hapus_data_mandarin2() {
		$this->M_setting_adm_blk->hapus_data_mandarin2();
		redirect('setting_adm_blk/mandarin2');
	}

//============================================== Bahasa Mandarin 3 =======================================================//

	function mandarin3() {
		$data['tampil_data_mandarin3'] = $this->M_setting_adm_blk->tampil_data_mandarin3();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "mandarin3";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_mandarin3(){
		$this->M_setting_adm_blk->simpan_data_mandarin3();
		redirect('setting_adm_blk/mandarin3');
	}
	function update_data_mandarin3() {
			$this->M_setting_adm_blk->update_data_mandarin3();
			redirect('setting_adm_blk/mandarin3');
	}
	function hapus_data_mandarin3() {
		$this->M_setting_adm_blk->hapus_data_mandarin3();
		redirect('setting_adm_blk/mandarin3');
	}

//============================================== Bahasa Taiyu =======================================================//

	function taiyu() {
		$data['tampil_data_taiyu'] = $this->M_setting_adm_blk->tampil_data_taiyu();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "taiyu";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_taiyu(){
		$this->M_setting_adm_blk->simpan_data_taiyu();
		redirect('setting_adm_blk/taiyu');
	}
	function update_data_taiyu() {
			$this->M_setting_adm_blk->update_data_taiyu();
			redirect('setting_adm_blk/taiyu');
	}
	function hapus_data_taiyu() {
		$this->M_setting_adm_blk->hapus_data_taiyu();
		redirect('setting_adm_blk/taiyu');
	}
	
	//============================================= Tempat PKL =======================================================//
	
	function tempat_pkl() {
			$data['tampil_data_tempat_pkl'] = $this->M_setting_adm_blk->tampil_data_tempat_pkl();
			$data['namamodule'] = "setting_adm_blk";
			$data['namafileview'] = "tempat_pkl";
			echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_tempat_pkl(){
			
		$this->M_setting_adm_blk->simpan_data_tempat_pkl();
		redirect('setting_adm_blk/tempat_pkl');
	}
	function update_data_tempat_pkl() {
			$this->M_setting_adm_blk->update_data_tempat_pkl();
			redirect('setting_adm_blk/tempat_pkl');
	}
	function hapus_data_tempat_pkl() {
		$this->M_setting_adm_blk->hapus_data_tempat_pkl();
		redirect('setting_adm_blk/tempat_pkl');
	}

//============================================== Minggu =======================================================//

	function minggu() {
		$data['tampil_data_minggu'] = $this->M_setting_adm_blk->tampil_data_minggu();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "minggu";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_minggu(){
			
		$this->M_setting_adm_blk->simpan_data_minggu();
		redirect('setting_adm_blk/minggu');
	}
	function update_data_minggu() {
			$this->M_setting_adm_blk->update_data_minggu();
			redirect('setting_adm_blk/minggu');
	}
	function hapus_data_minggu() {
		$this->M_setting_adm_blk->hapus_data_minggu();
		redirect('setting_adm_blk/minggu');
	}

//============================================== Hari =======================================================//

	function hari() {
		$data['tampil_data_hari'] = $this->M_setting_adm_blk->tampil_data_hari();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "hari";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_hari(){
			
		$this->M_setting_adm_blk->simpan_data_hari();
		redirect('setting_adm_blk/hari');
	}
	function update_data_hari() {
			$this->M_setting_adm_blk->update_data_hari();
			redirect('setting_adm_blk/hari');
	}
	function hapus_data_hari() {
		$this->M_setting_adm_blk->hapus_data_hari();
		redirect('setting_adm_blk/hari');
	}

//============================================== Jam =======================================================//

	function jam() {
		$data['tampil_data_jam'] = $this->M_setting_adm_blk->tampil_data_jam();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "jam";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_jam(){
			
		$this->M_setting_adm_blk->simpan_data_jam();
		redirect('setting_adm_blk/jam');
	}
	function update_data_jam() {
			$this->M_setting_adm_blk->update_data_jam();
			redirect('setting_adm_blk/jam');
	}
	function hapus_data_jam() {
		$this->M_setting_adm_blk->hapus_data_jam();
		redirect('setting_adm_blk/jam');
	}

//============================================== Lokasi =======================================================//

	function lokasi() {
		$data['tampil_data_lokasi'] = $this->M_setting_adm_blk->tampil_data_lokasi();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "lokasi";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_lokasi(){
			
		$this->M_setting_adm_blk->simpan_data_lokasi();
		redirect('setting_adm_blk/lokasi');
	}
	function update_data_lokasi() {
			$this->M_setting_adm_blk->update_data_lokasi();
			redirect('setting_adm_blk/lokasi');
	}
	function hapus_data_lokasi() {
		$this->M_setting_adm_blk->hapus_data_lokasi();
		redirect('setting_adm_blk/lokasi');
	}

//============================================== Berat =======================================================//

	function berat() {
		$data['tampil_data_berat'] = $this->M_setting_adm_blk->tampil_data_berat();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "berat";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_berat(){
			
		$this->M_setting_adm_blk->simpan_data_berat();
		redirect('setting_adm_blk/berat');
	}
	function update_data_berat() {
			$this->M_setting_adm_blk->update_data_berat();
			redirect('setting_adm_blk/berat');
	}
	function hapus_data_berat() {
		$this->M_setting_adm_blk->hapus_data_berat();
		redirect('setting_adm_blk/berat');
	}

//============================================== Waktu =======================================================//

	function waktu() {
		$data['tampil_data_waktu'] = $this->M_setting_adm_blk->tampil_data_waktu();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "waktu";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_waktu(){
			
		$this->M_setting_adm_blk->simpan_data_waktu();
		redirect('setting_adm_blk/waktu');
	}
	function update_data_waktu() {
			$this->M_setting_adm_blk->update_data_waktu();
			redirect('setting_adm_blk/waktu');
	}
	function hapus_data_waktu() {
		$this->M_setting_adm_blk->hapus_data_waktu();
		redirect('setting_adm_blk/waktu');
	}

//============================================== Sektor =======================================================//

	function sektor() {
		$data['tampil_data_sektor'] = $this->M_setting_adm_blk->tampil_data_sektor();
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "sektor_non_taiwan";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_sektor(){
			
		$this->M_setting_adm_blk->simpan_data_sektor();
		redirect('setting_adm_blk/sektor');
	}
	function update_data_sektor() {
			$this->M_setting_adm_blk->update_data_sektor();
			redirect('setting_adm_blk/sektor');
	}
	function hapus_data_sektor() {
		$this->M_setting_adm_blk->hapus_data_sektor();
		redirect('setting_adm_blk/sektor');
	}

//============================================== Alasan Izin Pembelajaran =======================================================//

	function alasan_izin_belajar_read() {
		$data['tampil_data'] = $this->M_session->select("SELECT * FROM blk_jadwal_absen_ref order by id desc");
		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "alasan_izin_belajar";
		echo Modules::run('template/blk_template', $data); 
	}

	function alasan_izin_belajar_create(){
		$data = array (
			'nama' => $this->input->post('nama'),		
		);

		$this->M_session->insert($data, 'blk_jadwal_absen_ref');

		redirect('setting_adm_blk/alasan_izin_belajar_read');
	}

	function alasan_izin_belajar_update() {
		$id = $this->input->post('id');

		$data = array (
			'nama' => $this->input->post('nama'),		
		);

		$this->M_session->update($data, 'blk_jadwal_absen_ref', $id, 'id');

		redirect('setting_adm_blk/alasan_izin_belajar_read');
	}
	function hapus_data_sektor_destroy() {
		$id = $this->input->post('id');

		$this->M_session->delete('blk_jadwal_absen_ref', $id, 'id');

		redirect('setting_adm_blk/alasan_izin_belajar_read');
	}

//============================================== jadwal =======================================================//

	function jadwal() {
		$data['tampil_data_jadwal'] = $this->M_setting_adm_blk->tampil_data_jadwal();
		$data['tampil_data_blk_minggu'] 	= $this->M_setting_adm_blk->tampil_data_select('blk_minggu');
		//$data['tampil_data_jam']    = $this->M_setting_adm_blk->tampil_data_jam();

		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "jadwal";
		echo Modules::run('template/blk_template', $data); 
	}
	function simpan_data_jadwal(){
			
		$d = $this->M_setting_adm_blk->simpan_data_jadwal();
		//echo '<pre>';
		//print_r($d);
		//echo '</pre>';
		redirect('setting_adm_blk/jadwal');
	}
	function update_data_jadwal($kode) {
		$d = $this->M_setting_adm_blk->update_data_jadwal($kode);
		//echo '<pre>';
		//print_r($d);
		//echo '</pre>';
		redirect('setting_adm_blk/jadwal');
	}
	function hapus_data_jadwal() {
		$this->M_setting_adm_blk->hapus_data_jadwal();
		redirect('setting_adm_blk/jadwal');
	}

	function jadwalprintdata($id) {
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/jadwal.docx');

		$jadwal_id 	= $id;
		$this->M_setting_adm_blk->get_jadwalprint();

		$quww = 'SELECT * FROM personal where lower(statusaktif)="'.strtolower($status_half).'" and kode_sponsor="'.$sponsorr.'" and tanggaldaftar BETWEEN "'.$dante.'" AND "'.$dante2.'"';
		$zselectionz = $this->M_setting_adm_blk->select($quww);

		$document->cloneRow('value3',count($zselectionz));
		$nn=1;
		foreach ($zselectionz as $value) {
			
			$xsponsor[$nn] 	= $value->kode_sponsor;
			$xnama[$nn] 	= $value->nama;
			//$xnegara[$nn] 	= $value->;
			$xtglhadir[$nn] = $value->tanggaldaftar;
			$xalamat[$nn] 	= $value->alamat;
			$xstatus[$nn] 	= $value->statusaktif;
/*
		    $document->setValue('value1#'.$nn,$nn);
		    $document->setValue('value2#'.$nn,$xsponsor[$nn]);
		    $document->setValue('value3#'.$nn,$xnama[$nn]);
		    //$document->setValue('value4#'.$nn,$xnegara[$nn-1]);
		    $document->setValue('value5#'.$nn,$xtglhadir[$nn]);
		    $document->setValue('value6#'.$nn,$xalamat[$nn]);
		    */
		    $document->setValue('value1#'.$nn,$nn);
		    $document->setValue('value2#'.$nn,$value->kode_sponsor);
		    $document->setValue('value3#'.$nn,$value->nama);
		    //$document->setValue('value4#'.$nn,$xnegara[$nn-1]);
		    $document->setValue('value4#'.$nn,$value->tanggaldaftar);
		    $document->setValue('value5#'.$nn,$value->alamat);
		    //echo $xsponsor[$nn].' '.$xnama[$nn].' '.$xtglhadir[$nn].' '.$xalamat[$nn].'<br/>';
		$nn++;
		}
		//echo '<pre>';
		//print_r($xalamat);
		//echo '</pre>';

		$document->setValue('value8',$dat);
		$document->setValue('value6',$dat2);
		$document->setValue('value7',$status_word);
		$filename = 'filenya.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		    header('Content-Disposition: attachment; filename="' . $isinya . '"');
		    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		    header('Content-Transfer-Encoding: binary');
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}

	function jadwaldetail($kode) {

		$array1 = array (
			0 => 'berhitung',
			1 => 'bhs_taiyu',
			2 => 'fisik_mental',
			3 => 'graha_boga',
			4 => 'graha_laundry',
			5 => 'graha_ruang',
			6 => 'jompo',
			7 => 'mandarin_inf_jompo',
			8 => 'mandarin_jompo',
			9 => 'olah_raga',
			10 => 'tata_boga'
		);
		//$data['tampil_data_jadwaldetail'] = $this->M_setting_adm_blk->tampil_data_jadwaldetail($kode);
		$data['tampil_data_jadwaldetail'] 	= $this->M_setting_adm_blk->tampil_data_jadwaldetail($kode);
		$data['tampil_data_blk_minggu'] 	= $this->M_setting_adm_blk->tampil_data_select('blk_minggu');
		$data['tampil_data_blk_waktu']		= $this->M_setting_adm_blk->tampil_data_select('blk_waktu');
		$data['tampil_data_dist_minggu']	= $this->M_setting_adm_blk->tampil_data_select_dist('blk_akm_jadwaldetail');
		$data['tampil_all_materi']  		= $this->M_setting_adm_blk->tampil_all_materi();
		
		$data['ukode'] = $kode;
		$data['array1'] = $array1;

		$data['namamodule'] = "setting_adm_blk";
		$data['namafileview'] = "jadwal_detail";
		echo Modules::run('template/blk_template', $data); 
	}

	function update_data_jadwaldetail($ukode, $sesiv) {
		$this->M_setting_adm_blk->update_data_jadwaldetail($ukode, $sesiv);
		//print_r($data);
		redirect('setting_adm_blk/jadwaldetail/'.$ukode);
	}

	function simpan_data_jadwal_p_minggu($ukode){
			
		$this->M_setting_adm_blk->simpan_data_jadwal_p_minggu();
		redirect('setting_adm_blk/jadwaldetail/'.$ukode);
	}

	function get_edit() {
		$id = $this->input->post('sesi');
		$this->output->set_content_type('application/json')->set_output(json_encode($id));
	}
	
	function ff() {
		$array1 = array (
			0 => 'berhitung',
			1 => 'bhs_taiyu',
			2 => 'fisik_mental',
			3 => 'graha_boga',
			4 => 'graha_laundry',
			5 => 'graha_ruang',
			6 => 'jompo',
			7 => 'mandarin_inf_jompo',
			8 => 'mandarin_pabrik',
			9 => 'olah_raga',
			10 => 'tata_boga'
		);
		foreach ($array1 as $keyys2) {
			$poli = $this->M_setting_adm_blk->tampil_data_select23($keyys2);
				echo '<pre>';
				print_r($poli);
				echo '</pre>';/*
			foreach ($poli as $keiz) {
				echo '
				<optgroup label="'.$keyys2.'">
					<option value="'.$keiz->id.'">'.$keiz->id.$keiz->kode_materi.'" : "'.$keiz->nama_materi.'</option>
				</optgroup>';
			}*/
		}	
	}
}