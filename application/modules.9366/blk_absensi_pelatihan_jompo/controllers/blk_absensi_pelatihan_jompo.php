<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_absensi_pelatihan_jompo extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_blk_absensi_pelatihan_jompo');			
	}
	
	function index($pilihan){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else
		{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			 if ($id_user && $status==2){
			 	$idbio=$pilihan;
			 	$data['idbio'] = $idbio;

			 	$tampil_data_blk_personaldetail = $this->M_blk_absensi_pelatihan_jompo->tampil_data_blk_personal($pilihan);
				$data['namanya'] = $tampil_data_blk_personaldetail['namanya'];
			 	$data['tampil_data_berat'] = $this->M_blk_absensi_pelatihan_jompo->tampil_data('blk_berat');
			 	$data['tampil_data_minggu'] = $this->M_blk_absensi_pelatihan_jompo->tampil_data('blk_minggu');
			 	$data['tampil_data_instruktur'] = $this->M_blk_absensi_pelatihan_jompo->tampil_data('blk_instruktur');
			 	$data['tampil_data_abs_pel_jompo'] = $this->M_blk_absensi_pelatihan_jompo->tampil_data_adv('blk_penilaian_pel_jompo',1);
			 	$data['tampil_data_abs_pel_jompo2'] = $this->M_blk_absensi_pelatihan_jompo->tampil_data_adv('blk_penilaian_pel_jompo',2);

				$data['namamodule'] = "blk_absensi_pelatihan_jompo";
				$data['namafileview'] = "abs_pel_jompo";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

	function tambah_nilai($no) {
		$tgl 			= $this->input->post('tgl');
		$penilai 		= $this->input->post('penilai');
		$berat  		= $this->input->post('berat');
		$keterangan 	= $this->input->post('keterangan');
		$minggu 	 	= $this->input->post('minggu');
		$tipe 			= $this->input->post('tipee');

		$data = array (
			'no_daftar' 		=> $no,
			'tgl' 				=> $tgl,
			'penilai_id' 		=> $penilai,
			'berat_id' 			=> $berat,
			'ket'				=> $keterangan,
			'minggu_id' 		=> $minggu,
			'tipe' 				=> $tipe
		);

		$this->M_blk_absensi_pelatihan_jompo->tambah_nilai($data);
		redirect('blk_absensi_pelatihan_jompo/index/'.$no);
	}

	function ubah_nilai($no) {
		$id 			= $this->input->post('tatagraha_id');
		$tgl 			= $this->input->post('tgl');
		$penilai 		= $this->input->post('penilai');
		$berat  		= $this->input->post('berat');
		$keterangan 	= $this->input->post('keterangan');
		$minggu 	 	= $this->input->post('minggu');

		$data = array (
			'tgl' 				=> $tgl,
			'penilai_id' 		=> $penilai,
			'berat_id' 			=> $berat,
			'ket'				=> $keterangan,
			'minggu_id' 		=> $minggu
		);

		$this->M_blk_absensi_pelatihan_jompo->ubah_nilai($data,$id);
		redirect('blk_absensi_pelatihan_jompo/index/'.$no);
	}

	function hapus_nilai($no) {
		$this->M_blk_absensi_pelatihan_jompo->hapus_nilai();
		redirect('blk_absensi_pelatihan_jompo/index/'.$no);
	}

	function setdata($no) {
		$tgl 		= $this->input->post('tgl');
		$penilai 	= $this->input->post('penilai');
		$minggu 	= $this->input->post('minggu');
		$penilai_explode = explode(",",$penilai);
		$minggu_explode = explode(",",$minggu);
		$this->session->set_userdata('tgl',$tgl);
		$this->session->set_userdata('id_penilai',$penilai_explode[0]);
		$this->session->set_userdata('nama_penilai',$penilai_explode[1]);
		$this->session->set_userdata('id_minggu',$minggu_explode[0]);
		$this->session->set_userdata('nama_minggu',$minggu_explode[1]);

		redirect('blk_absensi_pelatihan_jompo/index/'.$no);
	}
}