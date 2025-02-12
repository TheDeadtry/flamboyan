<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Blk_personaldetail extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_blk_personaldetail');			
	}
	
	function index($pilihan){
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
			 if ($id_user && $status==2){
			 	$idbio=$pilihan;
			 	$data['idbio'] = $idbio;

				$data['tampil_data_blk_personaldetail'] = $this->M_blk_personaldetail->tampil_data_blk_personal($pilihan);
				$data['jmlfingerpagi'] = $this->M_blk_personaldetail->jmlfingerpagi($pilihan);
				$data['jmlfingersore'] = $this->M_blk_personaldetail->jmlfingersore($pilihan);

				$adm_tglreg = $this->M_blk_personaldetail->adm_tglreg($pilihan);
				if($adm_tglreg==''){
					$data['tglns'] = $adm_tglreg;
				}else{
					$date1 = date('Y-m-d');
					$date2 = $adm_tglreg;
					$data['tglns'] = $this->M_blk_personaldetail->hitunganfinger($date1,$date2,$pilihan);
				}

				$data['tglawalfinger'] = $this->M_blk_personaldetail->tglawalfinger($pilihan);
				$data['hitunganfingernodaft'] = $this->M_blk_personaldetail->hitunganfingernodaft($pilihan);
				$data['hitunganfingernodaftujuh'] = $this->M_blk_personaldetail->hitunganfingernodaftujuh($pilihan);
				$data['hitunganfingernodafbelas'] = $this->M_blk_personaldetail->hitunganfingernodafbelas($pilihan);

			 	$data['tampil_data_pemilik_tki'] = $this->M_blk_personaldetail->tampil_data_pemilik_tki();
			 	$data['tampil_data_jk_tki'] = $this->M_blk_personaldetail->tampil_data_jk_tki();
			 	$data['tampil_data_negara_tki'] = $this->M_blk_personaldetail->tampil_data_negara_tki();
			 	$data['tampil_data_bahasa_tki'] = $this->M_blk_personaldetail->tampil_data_bahasa_tki();
			 	$data['tampil_data_eksnon_tki'] = $this->M_blk_personaldetail->tampil_data_eksnon_tki();
			 	$data['tampil_data_cluster_tki'] = $this->M_blk_personaldetail->tampil_data_cluster_tki();
				$data['tampil_data_instruktur'] = $this->M_blk_personaldetail->tampil_data_instruktur();
				$data['tampil_data_ranjang'] = $this->M_blk_personaldetail->tampil_data_ranjang();

				$data['ujk_pengajuan'] = $this->M_blk_personaldetail->ujk_pengajuan($pilihan);
				$data['ujk_keluar'] = $this->M_blk_personaldetail->ujk_keluar($pilihan);
				$data['ujk_ujian'] = $this->M_blk_personaldetail->ujk_ujian($pilihan);
				$data['ujk_namalsp'] = $this->M_blk_personaldetail->ujk_namalsp($pilihan);
				$data['ujk_noserlok'] = $this->M_blk_personaldetail->ujk_noserlok($pilihan);

				$data['ujk_noresibayar'] = $this->M_blk_personaldetail->ujk_noresibayar($pilihan);
				$data['ujk_noinvoice'] = $this->M_blk_personaldetail->ujk_noinvoice($pilihan);
				$data['kelulusan'] = $this->M_blk_personaldetail->kelulusan($pilihan);

				$data['namamodule'] = "blk_personaldetail";
				$data['namafileview'] = "blk_personaldetail";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

		function pembinaan($pilihan){
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
			 if ($id_user && $status==2){
			 	$idbio=$pilihan;
			 	$data['idbio'] = $idbio;

			 	$data['tampil_data_kb'] = $this->M_blk_personaldetail->tampil_data_kb($idbio);
				$data['tampil_data_Jenis_kb'] = $this->M_blk_personaldetail->tampil_data_Jenis_kb();
				$data['tampil_data_instruktur'] = $this->M_blk_personaldetail->tampil_data_instruktur();

				$data['tampil_data_blk_personaldetail'] = $this->M_blk_personaldetail->tampil_data_blk_personal($pilihan);
				$data['jmlfingerpagi'] = $this->M_blk_personaldetail->jmlfingerpagi($pilihan);
				$data['jmlfingersore'] = $this->M_blk_personaldetail->jmlfingersore($pilihan);

				$adm_tglreg = $this->M_blk_personaldetail->adm_tglreg($pilihan);
				if($adm_tglreg==''){
					$data['tglns'] = $adm_tglreg;
				}else{
					$date1 = date('Y-m-d');
					$date2 = $adm_tglreg;
					$data['tglns'] = $this->M_blk_personaldetail->hitunganfinger($date1,$date2,$pilihan);
				}

				$data['tglawalfinger'] = $this->M_blk_personaldetail->tglawalfinger($pilihan);
				$data['hitunganfingernodaft'] = $this->M_blk_personaldetail->hitunganfingernodaft($pilihan);
				$data['hitunganfingernodaftujuh'] = $this->M_blk_personaldetail->hitunganfingernodaftujuh($pilihan);
				$data['hitunganfingernodafbelas'] = $this->M_blk_personaldetail->hitunganfingernodafbelas($pilihan);

			 	$data['tampil_data_pemilik_tki'] = $this->M_blk_personaldetail->tampil_data_pemilik_tki();
			 	$data['tampil_data_jk_tki'] = $this->M_blk_personaldetail->tampil_data_jk_tki();
			 	$data['tampil_data_negara_tki'] = $this->M_blk_personaldetail->tampil_data_negara_tki();
			 	$data['tampil_data_bahasa_tki'] = $this->M_blk_personaldetail->tampil_data_bahasa_tki();
			 	$data['tampil_data_eksnon_tki'] = $this->M_blk_personaldetail->tampil_data_eksnon_tki();
			 	$data['tampil_data_cluster_tki'] = $this->M_blk_personaldetail->tampil_data_cluster_tki();
				$data['tampil_data_instruktur'] = $this->M_blk_personaldetail->tampil_data_instruktur();
				$data['tampil_data_ranjang'] = $this->M_blk_personaldetail->tampil_data_ranjang();

				$data['namamodule'] = "blk_personaldetail";
				$data['namafileview'] = "blk_administrasidetail";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

		function setpilih($pilihan){
		$this->session->set_userdata('pilsektor', $pilihan);
		redirect('blk_personaldetail/');
	}

	function simpan_data_blk_personaldetail(){
		$this->M_blk_personaldetail->simpan_data_blk_personaldetail();

		redirect('blk_personaldetail');
	}

	function update_data_blk_personaldetail() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_blk_personaldetail();
			redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_blk_registrasi() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_blk_registrasi();
			redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_blk_ranjang() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_blk_ranjang();
			redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_blk_cek() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_blk_cek();
			redirect('blk_personaldetail/index/'.$id);
	}

	function hapus_data_blk_personaldetail() {
		$this->M_blk_personaldetail->hapus_data_blk_personaldetail();
		redirect('blk_personaldetail');
	}

		function simpan_data_kb(){
			$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_kb();
		redirect('blk_personaldetail/pembinaan/'.$id);
	}

	function update_data_kb() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_kb();
		redirect('blk_personaldetail/pembinaan/'.$id);
	}

	function hapus_data_kb() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->hapus_data_kb();
		redirect('blk_personaldetail/pembinaan/'.$id);
	}


}