<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_pelatihan extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			

		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		}		
		if ($id_user && $status!=2){
			redirect('dashboard');
		}
	}
	
	function index($pilihan) {	
		$session 	= $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];

		if ($id_user && $status==2) {
			$data['idbio'] = $pilihan;
			$pil_paket2 = $this->session->userdata('pil_paket');

				$sql_min = $this->M_session->select_row("SELECT min(id_setting_paket) as id FROM blk_setting_paket");
			if ($pil_paket2 != NULL) {
				$pil_paket = $pil_paket2;
				$whered    = "AND c.nama_paket='$pil_paket2'";
			} else {
				$pil_paket  = $sql_min->id;
				$whered 	= "AND c.nama_paket='$sql_min->id'";
			}

			$sql_ambil_nama_paket 		= $this->M_session->select_row("SELECT nama_paket FROM blk_setting_paket WHERE id_setting_paket='$pil_paket'");
			$data['xpil_nama_paket'] 	= $sql_ambil_nama_paket->nama_paket;
			$data['u_pil_paket'] 			= $pil_paket;

		 	$sql = "SELECT 
		 				*,
		 				personalblk.nama as namanya,
		 				blk_pemilik.isi as pemilikx, 
		 				blk_pemilik.negara as negarapemilikx,
		 				datasponsor.kode_sponsor as kdsponsor
						FROM personalblk 
						LEFT JOIN blk_pemilik
						ON personalblk.pemilik=blk_pemilik.id_pemilik 
						LEFT JOIN datasponsor
						ON personalblk.sponsor=datasponsor.nama
						WHERE personalblk.nodaftar='$pilihan'";
			$tampil_data_blk_personaldetail = $this->M_session->select_row($sql);
			$data['namanya'] 				= $tampil_data_blk_personaldetail->namanya;

			if ($pil_paket2 == 3) {
				$sql1a = "SELECT * FROM blk_pelajaran_fisik_mental where kode_materi like 'FS%'";
				$sql1b = "SELECT * FROM blk_pelajaran_fisik_mental where kode_materi like 'KM%'";
				$sql2 = "SELECT * FROM blk_nilai";
				$sql3 = "SELECT * FROM blk_setting_paket";
				$sql4 = "SELECT * FROM blk_instruktur";
				$sql5 = "SELECT distinct(tgl_ang), instruktur FROM blk_penilaian_fisik_mental where idbio='$pilihan' order by id_penilaian_fisik_mental DESC";

				$ambil_angkatan = $this->M_session->select_row("SELECT * FROM personal_angkatan where nodaftar='$pilihan'");
				$tgl_array = array ();
				if ($ambil_angkatan != NULL) {
					$tgl_sabtu = date('Y-m-d', strtotime('next saturday', strtotime($ambil_angkatan->date_angkatan)));
					for ($x=0; $x<20; $x++) {
						$tgl_array[] = date('Y-m-d', strtotime("+".$x." week", strtotime($tgl_sabtu)));
					}
				}


				$ambil_materi1 = $this->M_session->select($sql1a);
				$ambil_materi2 = $this->M_session->select($sql1b);
				$ambil_pilihan = $this->M_session->select($sql2);
				$ambil_data_settingpaket = $this->M_session->select($sql3);
				$ambil_instruktur = $this->M_session->select($sql4);
				$ambil_penilaian = $this->M_session->select($sql5);

				$data['tampil_materi1'] = $ambil_materi1;
				$data['tampil_materi2'] = $ambil_materi2;
				$data['tampil_pilihan'] = $ambil_pilihan;
				$data['tampil_data_settingpaket'] 	= $ambil_data_settingpaket;
				$data['tampil_instruktur'] = $ambil_instruktur;
				$data['tampil_tgl_ang'] = $tgl_array;
				$data['tampil_penilaian'] = $ambil_penilaian;

				$data['namamodule'] = "blk_pelatihan";
				$data['namafileview'] = "blk_pelatihan";
				$data['pelatihanModular'] = "blk_pelatihan_fisik";
				echo Modules::run('template/blk_template', $data); 
			} elseif ($pil_paket2 == 4) {
				$sql1a = "SELECT * FROM blk_pelajaran_graha_boga";
				$sql2 = "SELECT * FROM blk_nilai";
				$sql3 = "SELECT * FROM blk_setting_paket";
				$sql4 = "SELECT * FROM blk_instruktur";
				$sql5 = "SELECT distinct(tgl), penilai_id FROM blk_penilaian_graha_boga where no_daftar='$pilihan' order by id_penilaian_graha_boga DESC";

				$ambil_materi1 = $this->M_session->select($sql1a);
				$ambil_pilihan = $this->M_session->select($sql2);
				$ambil_data_settingpaket = $this->M_session->select($sql3);
				$ambil_instruktur = $this->M_session->select($sql4);
				$ambil_penilaian = $this->M_session->select($sql5);

				$data['tampil_materi1'] = $ambil_materi1;
				$data['tampil_pilihan'] = $ambil_pilihan;
				$data['tampil_data_settingpaket'] 	= $ambil_data_settingpaket;
				$data['tampil_instruktur'] = $ambil_instruktur;
				$data['tampil_penilaian'] = $ambil_penilaian;

				$data['namamodule'] = "blk_pelatihan";
				$data['namafileview'] = "blk_pelatihan";
				$data['pelatihanModular'] = "blk_pelatihan_boga";
				echo Modules::run('template/blk_template', $data); 
			} elseif ($pil_paket2 == 5) {
				$sql1a = "SELECT * FROM blk_pelajaran_graha_laundry";
				$sql2 = "SELECT * FROM blk_nilai";
				$sql3 = "SELECT * FROM blk_setting_paket";
				$sql4 = "SELECT * FROM blk_instruktur";
				$sql5 = "SELECT distinct(tgl), penilai_id FROM blk_penilaian_graha_laundry where no_daftar='$pilihan' order by id_penilaian_graha_laundry DESC";

				$ambil_materi1 = $this->M_session->select($sql1a);
				$ambil_pilihan = $this->M_session->select($sql2);
				$ambil_data_settingpaket = $this->M_session->select($sql3);
				$ambil_instruktur = $this->M_session->select($sql4);
				$ambil_penilaian = $this->M_session->select($sql5);

				$data['tampil_materi1'] = $ambil_materi1;
				$data['tampil_pilihan'] = $ambil_pilihan;
				$data['tampil_data_settingpaket'] 	= $ambil_data_settingpaket;
				$data['tampil_instruktur'] = $ambil_instruktur;
				$data['tampil_penilaian'] = $ambil_penilaian;

				$data['namamodule'] = "blk_pelatihan";
				$data['namafileview'] = "blk_pelatihan";
				$data['pelatihanModular'] = "blk_pelatihan_laundry";
				echo Modules::run('template/blk_template', $data); 
			} else {

				$sql2 = "SELECT 
							distinct(a.tanggal),
							a.tanggal,
							a.paket_id,
							a.instruktur_kode,
							a.id_jadwal_data
							FROM blk_jadwal_data a 
							JOIN blk_jadwal_data_tki b
							ON a.id_jadwal_data=b.jadwal_data_id
							JOIN blk_jadwal_paket c 
							ON a.paket_id=c.id_paket
							WHERE b.biodata_id='$pilihan'
							$whered
							";
				$tampil_data_penilaian = $this->M_session->select($sql2);

				$sql3 = "SELECT
							*
							FROM blk_setting_paket";
				$ambil_data_settingpaket = $this->M_session->select($sql3);

				$data['tampil_data_penilaian'] 	= $tampil_data_penilaian;
				$data['tampil_data_settingpaket'] 	= $ambil_data_settingpaket;

				$data['namamodule'] = "blk_pelatihan";
				$data['namafileview'] = "blk_pelatihan";
				$data['pelatihanModular'] = "blk_pelatihan_all";
				echo Modules::run('template/blk_template', $data); 
			}

				
		} 
	}

	function set_pilihan($bio, $id) {
		$this->session->set_userdata('pil_paket', $id);

		redirect('blk_pelatihan/index/'.$bio);
	}

	function tambah_nilai($no) {
		$this->session->set_userdata('buka','in');
		$this->session->set_userdata('buka2','true');

		$tgl 			= $this->input->post('tgl');
		$penilai 		= $this->input->post('penilai');
		$materi 		= $this->input->post('materi');
		$nilai_tulis 	= $this->input->post('nilai_tulis');
		$nilai_praktik 	= $this->input->post('nilai_praktik');
		$keterangan 	= $this->input->post('keterangan');
		$tipe 			= 1;

		$data = array (
			'no_daftar' 		=> $no,
			'tgl' 				=> $tgl,
			'penilai_id' 		=> $penilai,
			'graha_laundry_id' 	=> $materi,
			'nilai_a_id' 		=> $nilai_tulis,
			'nilai_b_id' 		=> $nilai_praktik,
			'keterangan'		=> $keterangan,
			'tipe' 				=> $tipe
		);

		$this->M_blk_graha_laundry->tambah_nilai($data);
		redirect('blk_graha_laundry/index/'.$no);
	}

	function ubah_nilai($no) {
		$id 			= $this->input->post('tatagraha_id');
		$tgl 			= $this->input->post('tgl');
		$penilai 		= $this->input->post('penilai');
		$materi 		= $this->input->post('materi');
		$nilai_tulis 	= $this->input->post('nilai_tulis');
		$nilai_praktik 	= $this->input->post('nilai_praktik');
		$keterangan 	= $this->input->post('keterangan');
		$tipe 			= 1;

		$data = array (
			'tgl' 				=> $tgl,
			'penilai_id' 		=> $penilai,
			'graha_laundry_id' 	=> $materi,
			'nilai_a_id' 		=> $nilai_tulis,
			'nilai_b_id' 		=> $nilai_praktik,
			'keterangan'		=> $keterangan,
			'tipe' 				=> $tipe
		);

		$this->M_blk_graha_laundry->ubah_nilai($data,$id);
		redirect('blk_graha_laundry/index/'.$no);
	}

	function hapus_nilai($no) {
		$this->M_blk_graha_laundry->hapus_nilai();
		redirect('blk_graha_laundry/index/'.$no);
	}

	function setdata($no) {
		$tgl 		= $this->input->post('tgl');
		$penilai 	= $this->input->post('penilai');
		$penilai_explode = explode(",",$penilai);
		$this->session->set_userdata('tgl',$tgl);
		$this->session->set_userdata('id_penilai',$penilai_explode[0]);
		$this->session->set_userdata('nama_penilai',$penilai_explode[1]);

		redirect('blk_graha_laundry/index/'.$no);
	}


	function tambah_fisik($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');
		$instruktur = $this->input->post('instruktur');
		$id_nilai 	= $this->input->post('id_nilai');
		$id_materi 	= $this->input->post('id_materi');

		$data = array ();
		for ($x=0; $x<count($id_nilai); $x++) {
			$data[] = array (
				'idbio' 		=> $idbio,
				'tgl_ang' 		=> $tgl_ang,
				'instruktur' 	=> $instruktur,
				'id_nilai' 		=> $id_nilai[$x],
				'id_materi' 	=> $id_materi[$x]
			);
		}

		$this->M_session->insert_batch($data ,"blk_penilaian_fisik_mental");

		redirect('blk_pelatihan/index/'.$no);
	}

	function ubah_fisik($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');
		$instruktur = $this->input->post('instruktur');
		$id_nilai 	= $this->input->post('id_nilai');
		$id_materi 	= $this->input->post('id_materi');
		$id_pen 	= $this->input->post('id_data_penilaian');

		$data = array ();
		for ($x=0; $x<count($id_nilai); $x++) {
			$data[] = array (
				'id_penilaian_fisik_mental' => $id_pen[$x],
				'idbio' 					=> $idbio,
				'tgl_ang' 					=> $tgl_ang,
				'instruktur' 				=> $instruktur,
				'id_nilai' 					=> $id_nilai[$x],
				'id_materi' 				=> $id_materi[$x]
			);
		}

		$this->M_session->update_batch($data ,"blk_penilaian_fisik_mental", 'id_penilaian_fisik_mental');

		redirect('blk_pelatihan/index/'.$no);
	}

	function delete_fisik($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');

		$ambil_id_per_mat = $this->M_session->select("SELECT * FROM blk_penilaian_fisik_mental WHERE idbio='$idbio' and tgl_ang='$tgl_ang'");
		foreach ($ambil_id_per_mat as $rrr) {
			$this->M_session->delete("blk_penilaian_fisik_mental", $rrr->id_penilaian_fisik_mental, 'id_penilaian_fisik_mental');
		}

		redirect('blk_pelatihan/index/'.$no);
	}

	function tambah_laundry($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');
		$instruktur = $this->input->post('instruktur');
		$id_nilai 	= $this->input->post('id_nilai');
		$id_materi 	= $this->input->post('id_materi');

		$data = array ();
		for ($x=0; $x<count($id_nilai); $x++) {
			$data[] = array (
				'no_daftar'		=> $idbio,
				'tgl' 			=> $tgl_ang,
				'penilai_id' 	=> $instruktur,
				'id_nilai' 		=> $id_nilai[$x],
				'id_materi' 	=> $id_materi[$x]
			);
		}

		$this->M_session->insert_batch($data ,"blk_penilaian_graha_laundry");

		redirect('blk_pelatihan/index/'.$no);
	}

	function ubah_laundry($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');
		$instruktur = $this->input->post('instruktur');
		$id_nilai 	= $this->input->post('id_nilai');
		$id_materi 	= $this->input->post('id_materi');
		$id_pen 	= $this->input->post('id_data_penilaian');

		$data = array ();
		for ($x=0; $x<count($id_nilai); $x++) {
			$data[] = array (
				'id_penilaian_graha_laundry' 	=> $id_pen[$x],
				'no_daftar'						=> $idbio,
				'tgl'  							=> $tgl_ang,
				'penilai_id' 					=> $instruktur,
				'id_nilai' 						=> $id_nilai[$x],
				'id_materi' 					=> $id_materi[$x]
			);
		}

		$this->M_session->update_batch($data ,"blk_penilaian_graha_laundry", 'id_penilaian_graha_laundry');

		redirect('blk_pelatihan/index/'.$no);
	}

	function delete_laundry($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');

		$ambil_id_per_mat = $this->M_session->select("SELECT * FROM blk_penilaian_graha_laundry WHERE no_daftar='$idbio' and tgl='$tgl_ang'");
		foreach ($ambil_id_per_mat as $rrr) {
			$this->M_session->delete("blk_penilaian_graha_laundry", $rrr->id_penilaian_graha_laundry, 'id_penilaian_graha_laundry');
		}

		redirect('blk_pelatihan/index/'.$no);
	}

	function tambah_boga($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');
		$instruktur = $this->input->post('instruktur');
		$id_nilai 	= $this->input->post('id_nilai');
		$id_materi 	= $this->input->post('id_materi');

		$data = array ();
		for ($x=0; $x<count($id_nilai); $x++) {
			$data[] = array (
				'no_daftar'		=> $idbio,
				'tgl' 			=> $tgl_ang,
				'penilai_id' 	=> $instruktur,
				'id_nilai' 		=> $id_nilai[$x],
				'id_materi' 	=> $id_materi[$x]
			);
		}

		$this->M_session->insert_batch($data ,"blk_penilaian_graha_boga");

		redirect('blk_pelatihan/index/'.$no);
	}

	function ubah_boga($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');
		$instruktur = $this->input->post('instruktur');
		$id_nilai 	= $this->input->post('id_nilai');
		$id_materi 	= $this->input->post('id_materi');
		$id_pen 	= $this->input->post('id_data_penilaian');

		$data = array ();
		for ($x=0; $x<count($id_nilai); $x++) {
			$data[] = array (
				'id_penilaian_graha_boga' 	=> $id_pen[$x],
				'no_daftar'						=> $idbio,
				'tgl'  							=> $tgl_ang,
				'penilai_id' 					=> $instruktur,
				'id_nilai' 						=> $id_nilai[$x],
				'id_materi' 					=> $id_materi[$x]
			);
		}

		$this->M_session->update_batch($data ,"blk_penilaian_graha_boga", 'id_penilaian_graha_boga');

		redirect('blk_pelatihan/index/'.$no);
	}

	function delete_boga($no) {
		$idbio 		= $this->input->post('idbio');
		$tgl_ang 	= $this->input->post('tgl_ang');

		$ambil_id_per_mat = $this->M_session->select("SELECT * FROM blk_penilaian_graha_boga WHERE no_daftar='$idbio' and tgl='$tgl_ang'");
		foreach ($ambil_id_per_mat as $rrr) {
			$this->M_session->delete("blk_penilaian_graha_boga", $rrr->id_penilaian_graha_boga, 'id_penilaian_graha_boga');
		}

		redirect('blk_pelatihan/index/'.$no);
	}

	function test() {
		$tgl_sabtu = "2017-10-28";
		for ($x=0; $x<20; $x++) {
			$tgl_array[] = strtotime("+".$x." week", strtotime($tgl_sabtu));
		}
		print_r($tgl_array);
	}

}