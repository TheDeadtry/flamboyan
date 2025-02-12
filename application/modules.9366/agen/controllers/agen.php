<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Agen extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_agen');			
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

				$data['tampil_data_agen'] = $this->M_agen->tampil_data_agen();
				$data['tampil_data_group'] = $this->M_agen->tampil_data_group();
				$data['tampil_pilihan_group'] = $this->M_agen->tampil_pilihan_group();


				$data['namamodule'] = "agen";
				$data['namafileview'] = "agenadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "agen";
				$data['namafileview'] = "agenagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function detaildokumen($idagen){
		$data['tampil_data_detail'] = $this->M_agen->tampil_data_detail($idagen);
		$data['tampil_nama_agree'] = $this->M_agen->tampil_nama_agree1($idagen);
		$data['tampil_data_dok'] = $this->M_agen->tampil_data_dok();
		$data['id_agen'] = $idagen;
				$data['namamodule'] = "agen";
				$data['namafileview'] = "detaildokumen";
				echo Modules::run('template/admin_template', $data);
		
	}

		function simpandokumen($idagen){
		$this->M_agen->simpandokumen();
		redirect('agen/detaildokumen/'.$idagen);
	}
	function updatedokumen($idagen) {
		$this->M_agen->updatedokumen();
		redirect('agen/detaildokumen/'.$idagen);
	}

	function hapusdokumen($idagen) {
		$this->M_agen->hapusdokumen();
		redirect('agen/detaildokumen/'.$idagen);
	}


	
	function filterdataagen(){
		$data['tampil_data_agen'] = $this->M_agen->tampil_data_agen_group();
				$data['tampil_data_group'] = $this->M_agen->tampil_data_group();
				$data['tampil_pilihan_group'] = $this->M_agen->tampil_pilihan_group();
				$data['tampil_pilihan_group2'] = $this->M_agen->tampil_pilihan_group2();


				$data['namamodule'] = "agen";
				$data['namafileview'] = "agenadmin";
				echo Modules::run('template/admin_template', $data);
		
	}
		function detailagen1($idagen){
		$data['tampil_data_agree1'] = $this->M_agen->tampil_data_agree1($idagen);
		$data['tampil_nama_agree1'] = $this->M_agen->tampil_nama_agree1($idagen);
		$data['tampil_jenis_agree1'] = $this->M_agen->tampil_jenis_agree1($idagen);
		$data['idagree'] = $idagen;
				$data['namamodule'] = "agen";
				$data['namafileview'] = "agendetail1";
				echo Modules::run('template/admin_template', $data);
		
	}
		function simpan_data_agree1($idagen){
		$this->M_agen->simpan_data_agree1();
		redirect('agen/detailagen1/'.$idagen);
	}
	function update_agree1($idagen) {
		$this->M_agen->update_agree1();
		redirect('agen/detailagen1/'.$idagen);
	}

	function hapus_agree1($idagen) {
		$this->M_agen->hapus_agree1();
		redirect('agen/detailagen1/'.$idagen);
	}





	function detailagen2($idagen){
		$data['tampil_data_agree2'] = $this->M_agen->tampil_data_agree2($idagen);
		$data['tampil_nama_agree2'] = $this->M_agen->tampil_nama_agree2($idagen);
		$data['tampil_jenis_agree2'] = $this->M_agen->tampil_jenis_agree2($idagen);
		$data['idagree'] = $idagen;
				$data['namamodule'] = "agen";
				$data['namafileview'] = "agendetail2";
				echo Modules::run('template/admin_template', $data);
		
	}
		function simpan_data_agree2($idagen){
		$this->M_agen->simpan_data_agree2();
		redirect('agen/detailagen2/'.$idagen);
	}
	function update_agree2($idagen) {
		$this->M_agen->update_agree2();
		redirect('agen/detailagen2/'.$idagen);
	}

	function hapus_agree2($idagen) {
		$this->M_agen->hapus_agree2();
		redirect('agen/detailagen2/'.$idagen);
	}


		function detailagen3($idagen){
		$data['tampil_data_agree3'] = $this->M_agen->tampil_data_agree3($idagen);
		$data['tampil_nama_agree3'] = $this->M_agen->tampil_nama_agree3($idagen);
		$data['tampil_jenis_agree3'] = $this->M_agen->tampil_jenis_agree3($idagen);
		$data['idagree'] = $idagen;
				$data['namamodule'] = "agen";
				$data['namafileview'] = "agendetail3";
				echo Modules::run('template/admin_template', $data);
		
	}
		function simpan_data_agree3($idagen){
		$this->M_agen->simpan_data_agree3();
		redirect('agen/detailagen3/'.$idagen);
	}
	function update_agree3($idagen) {
		$this->M_agen->update_agree3();
		redirect('agen/detailagen3/'.$idagen);
	}

	function hapus_agree3($idagen) {
		$this->M_agen->hapus_agree3();
		redirect('agen/detailagen3/'.$idagen);
	}


	function simpan_data_agen(){

		
		$this->M_agen->simpan_data_agen();

		redirect('agen');
	}


		function simpan_data_group(){
		$this->M_agen->simpan_data_group();

		redirect('agen');
	}

function update_group() {
		$this->M_agen->update_group();
		redirect('agen');
	}

	function hapus_group() {
		$this->M_agen->hapus_group();
		redirect('agen');
	}

	function update_agen() {
		$this->M_agen->update_agen();
		redirect('agen');
	}

		function hapus_agen() {
		$this->M_agen->hapus_agen();
		redirect('agen');
	}

	function changestatus($t,$id) {
		if ($t == 1) {
			$data['statusnonaktif'] = 1;
		} else if ($t == 0) {
			$data['statusnonaktif'] = 0;
		}

		$this->M_session->update($data,'dataagen',$id,'id_agen');

		redirect('agen');


	}
	
}