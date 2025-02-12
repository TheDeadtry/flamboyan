<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_jadwal2 extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');		
		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		} 	
		if ($id_user && $status!=2){
			redirect('dashboard');
		}
	}
	
	function index() {
		redirect('blk_jadwal2/paket');	
	}

	//============================ SETTING PAKET JADWAL ===//
	function paket() {
		$paket = "SELECT 
					a.id_paket,
					a.minggu,
					a.nama_paket as kode_paket,
					b.nama_paket,
					c.kode_jam as kode_jam,
					c.jam,
					a.nama_full 
					FROM blk_jadwal_paket a
					LEFT JOIN blk_setting_paket b
					ON a.nama_paket=b.id_setting_paket
					LEFT JOIN blk_jam c
					ON a.jam=c.kode_jam
					order by a.id_paket DESC
					";
	 	$data['tampil_data_paket'] 	= $this->M_session->select($paket);

	 	$data['tampil_data_setting_paket'] = $this->M_session->select("SELECT * FROM blk_setting_paket");
	 	$data['tampil_data_minggu'] 	= $this->M_session->select("SELECT * FROM blk_minggu");
	 	$data['tampil_data_jam'] 		= $this->M_session->select("SELECT * FROM blk_jam");

		$data['namamodule'] 	= "blk_jadwal2";
		$data['namafileview'] 	= "v_paket";
		echo Modules::run('template/blk_template', $data); 
	}

	function paket_simpan() {
		$nama2 			= $this->input->post('nama_full');
		$nama 			= $this->input->post('nama');
		$minggu 		= $this->input->post('minggu');
		$jam 			= $this->input->post('jam');
		
		$minggu_final 	= implode(",", $minggu);

		$data = array(
			'nama_full' 	=> $nama2,
			'nama_paket' 	=> $nama,
			'minggu' 		=> $minggu_final,
			'jam' 			=> $jam
		);

		$this->M_session->insert($data, 'blk_jadwal_paket');

		redirect('blk_jadwal2/paket');
	}

	function paket_ubah() {
		$id2  			= $this->input->post('id');

		$nama2 			= $this->input->post('nama_full');
		$nama 			= $this->input->post('nama');
		$minggu 		= $this->input->post('minggu');
		$jam 			= $this->input->post('jam');
		
		$minggu_final 	= implode(",", $minggu);

		$data = array(
			'nama_full' 	=> $nama2,
			'nama_paket' 	=> $nama,
			'minggu' 		=> $minggu_final,
			'jam' 			=> $jam
		);

		$this->M_session->update($data, 'blk_jadwal_paket', $id2, 'id_paket');

		redirect('blk_jadwal2/paket');
	}

	function paket_hapus() {
		$id2  			= $this->input->post('id');

		$this->M_session->delete('blk_jadwal_paket', $id2, 'id_paket');

		redirect('blk_jadwal2/paket');
	}

	function add_hari($id) {
	 	$data['tampil_data_paketjadwal'] 	= $this->M_session->select("SELECT * FROM blk_jadwal_paketjadwal where paket_id='".$id."'");

		$query = $query = "
			SELECT a.kode_materi,a.nama_materi,concat(a.id_berhitung,'||berhitung') as id FROM blk_pelajaran_berhitung a
			                  UNION 
			SELECT b.kode_materi,b.nama_materi,concat(b.id_bhs_taiyu,'||bhs_taiyu') as id  FROM blk_pelajaran_bhs_taiyu b
			                  UNION 
			SELECT c.kode_materi,c.nama_materi,concat(c.id_fisik_mental,'||fisik_mental') as id  FROM blk_pelajaran_fisik_mental c
			                  UNION 
			SELECT d.kode_materi,d.nama_materi,concat(d.id_graha_boga,'||graha_boga') as id  FROM blk_pelajaran_graha_boga d
			                  UNION 
			SELECT e.kode_materi,e.nama_materi,concat(e.id_graha_laundry,'||graha_laundry') as id  FROM blk_pelajaran_graha_laundry e
			                  UNION 
			SELECT f.kode_materi,f.nama_materi,concat(f.id_graha_ruang,'||graha_ruang') as id  FROM blk_pelajaran_graha_ruang f
			                  UNION 
			SELECT g.kode_materi,g.nama_materi,concat(g.id_jompo,'||jompo') as id  FROM blk_pelajaran_jompo g
			                  UNION 
			SELECT h.kode_materi,h.nama_materi,concat(h.id_mandarin_inf_jompo,'||mandarin_inf_jompo') as id  FROM blk_pelajaran_mandarin_inf_jompo h
			                  UNION 
			SELECT i.kode_materi,i.nama_materi,concat(i.id_mandarin_pabrik,'||mandarin_pabrik') as id  FROM blk_pelajaran_mandarin_pabrik i
			                  UNION 
			SELECT j.kode_materi,j.nama_materi,concat(j.id_olah_raga,'||olah_raga') as id  FROM blk_pelajaran_olah_raga j
			                  UNION 
			SELECT k.kode_materi,k.nama_materi,concat(k.id_tata_boga,'||tata_boga') as id  FROM blk_pelajaran_tata_boga k
		";
		$data['tampil_data_materi'] 		= $this->M_session->select($query);

		$data['tampil_data_hari'] 			= $this->M_session->select("SELECT * FROM blk_hari");
		$data['izpaket'] 					= $this->M_session->select_row("SELECT b.nama_paket FROM blk_jadwal_paket a JOIN blk_setting_paket b where a.id_paket='".$id."'")->nama_paket;

		$data['zid_paket'] = $id;

		$data['namamodule'] 	= "blk_jadwal2";
		$data['namafileview'] 	= "v_add_hari";
		echo Modules::run('template/blk_template', $data); 
	}

	function add_hari_simpan($id) {
		$hari 			= $this->input->post('hari');
		$materi 		= $this->input->post('materi');
		
		$materi_final 	= implode(",", $materi);

		$data = array(
			'hari' 		=> $hari,
			'materi' 	=> $materi_final,
			'paket_id'	=> $id
		);

		$this->M_session->insert($data, 'blk_jadwal_paketjadwal');

		redirect('blk_jadwal2/add_hari/'.$id);
	}

	function add_hari_ubah($id) {
		$id2  			= $this->input->post('id');

		$hari 			= $this->input->post('hari');
		$materi 		= $this->input->post('materi');
		
		$materi_final 	= implode(",", $materi);

		$data = array(
			'hari' 		=> $hari,
			'materi' 	=> $materi_final
		);

		$this->M_session->update($data, 'blk_jadwal_paketjadwal', $id2, 'id_jadwal_paket_jadwal');

		redirect('blk_jadwal2/add_hari/'.$id);
	}

	function add_hari_hapus($id) {
		$id2  			= $this->input->post('id');

		$this->M_session->delete('blk_jadwal_paketjadwal', $id2, 'id_jadwal_paket_jadwal');

		redirect('blk_jadwal2/add_hari/'.$id);
	}

	//============================ DATA JADWAL PER SENIN ===//
	function jadwal() {
		$d_paket = $this->session->userdata('jadwal_pil_paket');
		$d_tgl   = $this->session->userdata('jadwal_pil_tgl');

		$wherez = "";

		if ($d_paket != NULL) {
			$e_paket = $d_paket;
			if ($d_tgl != NULL) {
				$e_tgl = $d_tgl;
				$wherez = "where b.nama_paket='$e_paket' AND a.tanggal='$e_tgl'";
			} else {
				$e_tgl = '';
				$wherez = "where b.nama_paket='$e_paket'";
			}
		} else {
			$e_paket = '';
			if ($d_tgl != NULL) {
				$e_tgl = $d_tgl;
				$wherez = "where a.tanggal='$e_tgl'";
			} else {
				$e_tgl = '';
				$wherez = "";
			}
		} 
		//$wherez = "WHERE b.nama_paket='$e_paket' AND a.tanggal='$e_tgl'";

		$data['e_paket'] 	= $e_paket;
		$data['e_tgl'] 		= $e_tgl;
		$data['e_where'] 	= $wherez;

	 	$jadwal 						= "SELECT 
							 				a.id_jadwal_data as id,
							 				a.paket_id as paket_id,
							 				d.nama_paket as nama,
							 				c.jam as jam,
							 				a.tanggal as tgl,
							 				a.instruktur_kode
							 				FROM blk_jadwal_data a
							 				LEFT JOIN blk_jadwal_paket b
							 				ON a.paket_id=b.id_paket
							 				LEFT JOIN blk_jam c
							 				ON b.jam=c.kode_jam 
							 				LEFT JOIN blk_setting_paket d 
							 				ON b.nama_paket=d.id_setting_paket
							 				$wherez 
							 				ORDER BY a.id_jadwal_data DESC
							 				";
	 	$data['tampil_data_jadwaldata'] = $this->M_session->select($jadwal);

	 	$paket 							= "SELECT 
	 										a.id_paket as id_paket, 
	 										b.nama_paket as nama_paket,
	 										a.nama_paket as id_paket2,
	 										a.nama_full as nama_full
	 										FROM blk_jadwal_paket a 
	 										JOIN blk_setting_paket b 
	 										ON a.nama_paket=b.id_setting_paket 
	 										";
	 	$data['tampil_data_paket'] 		= $this->M_session->select($paket);

	 	$data['tampil_data_minggu'] 	= $this->M_session->select("SELECT * FROM blk_minggu");
	 	$data['tampil_data_instruktur'] = $this->M_session->select("SELECT * FROM blk_instruktur");

		$data['namamodule'] = "blk_jadwal2";
		$data['namafileview'] = "v_jadwal";
		echo Modules::run('template/blk_template', $data); 
	}

	function jadwal_add() {
		$pil_paket 		= $this->input->post('pil_paket');
		$pil_tgl 	 	= $this->input->post('pil_tgl');
		$pil_ins		= $this->input->post('pil_ins');

		$data = array (
			'paket_id' 			=> $pil_paket,
			'tanggal' 			=> $pil_tgl,
			'instruktur_kode' 	=> $pil_ins
		);
		$idins = $this->M_session->insert_return_id($data, 'blk_jadwal_data');

		//===============================
		$get_minggu = "SELECT a.minggu,a.id_paket,b.tanggal FROM blk_jadwal_paket a LEFT JOIN blk_jadwal_data b ON a.id_paket=b.paket_id where a.id_paket=".$pil_paket;
		$exm_minggu	= $this->M_session->select_row($get_minggu);

		$exp_minggu = explode(",", $exm_minggu->minggu);

		$angktan 		= "SELECT * FROM personal_angkatan";
		$qry_angkatan 	= $this->M_session->select($angktan);

		$data2 = array();
		for ($b=0; $b<count($exp_minggu); $b++) {
            $fnl_minggu = substr($exp_minggu[$b], 1);
			foreach ($qry_angkatan as $key) {
				$startpast = $key->date_angkatan;
	            $xnowday = $exm_minggu->tanggal;
	            $datetimeee = new DateTime($startpast);
	            $dayzz = $datetimeee->format('w');
	            if($dayzz == 1) {
	                $xfirstday  = $startpast;
	            } else {
	                $xfirstday  = date('Y-m-d', strtotime('next monday', strtotime($startpast)));
	            }
	            if ($xfirstday <= $xnowday) {
	                $dayss = round(abs(strtotime($xnowday)-strtotime($xfirstday))/86400);
	                $weekk = (int)($dayss / 7)+1;
	            } elseif ($xfirstday >= $xnowday) {
	                $weekk = 0;
	            } else {
	                $weekk = 0;
	            }
/*
	            $ambil_listhari = $this->M_session->select("SELECT * FROM blk_jadwal_paketjadwal WHERE paket_id='$exm_minggu->id_paket'");

				$data_hari1="";
				$data_hari2="";
				$data_hari3="";
				$data_hari4="";
				$data_hari5="";
				$data_hari6="";
				$data_hari7="";
				for ($d=1; $d<=7; $d++) {
					foreach ($ambil_listhari as $listhari) {
						if ($listhari->hari == "H".$d) {
							${"data_hari".$d} = '1 ';
						}
					}
				}*/

            	if ($weekk == $fnl_minggu) {
					$zidbio 	= $key->nodaftar;
					$zangkatan 	= $weekk;
					$data2[] = array (
						'biodata_id' 		=> $zidbio,
						'angkatan' 			=> $zangkatan,
						'jadwal_data_id' 	=> $idins,
						'hari1' 			=> 1,
						'hari2' 			=> 1,
						'hari3' 			=> 1,
						'hari4' 			=> 1,
						'hari5' 			=> 1,
						'hari6' 			=> 1,
						'hari7' 			=> 1,
					);
            	}
			}
		}
		if ($data2 != NULL) {
			$this->M_session->insert_batch($data2, 'blk_jadwal_data_tki');
		}

		redirect('blk_jadwal2/jadwal/');
	}

	function jadwal_detail($v_id) {
		$data['tampil_data_hari'] 	= $this->M_session->select("SELECT * FROM blk_hari");
		$hari 						= $this->session->userdata('jadwal_detail_hari');


		//===============
		$hari_paket 						 = "SELECT
												MIN(b.id_jadwal_paket_jadwal),
												b.hari
												FROM blk_jadwal_data a
												JOIN blk_jadwal_paketjadwal b
												ON a.paket_id=b.paket_id
												JOIN blk_hari c
												ON b.hari=c.kode_hari
												WHERE a.id_jadwal_data='$v_id'";
		$hari_paket_query 					 = $this->M_session->select_row($hari_paket);

		if ($hari != NULL) {
			$zhari = $hari;
		} else {
			$zhari = $hari_paket_query->hari;
		}
		$substr_hari = substr($zhari, 1,1);
		$whered = "AND hari".$substr_hari."=1";

		//===============
		$haries 							 = "SELECT
												*
												FROM blk_hari";
		$data['tampil_data_harinew'] = $this->M_session->select($haries); 

		$hari_paket 						 = "SELECT
												c.hari,
												c.kode_hari
												FROM blk_jadwal_data a
												LEFT JOIN blk_jadwal_paketjadwal b
												ON a.paket_id=b.paket_id
												LEFT JOIN blk_hari c
												ON b.hari=c.kode_hari
												WHERE a.id_jadwal_data='$v_id'";
		$data['tampil_data_hari_dari_paket'] = $this->M_session->select($hari_paket); 
		
		//================
		$jadwal_data 						= "SELECT 
												*,
												d.hari,
												d.satuan,
												a.instruktur_kode
												FROM blk_jadwal_data a 
												JOIN blk_jadwal_paket b 
												ON a.paket_id=b.id_paket 
												JOIN blk_jadwal_paketjadwal c 
												ON b.id_paket=c.paket_id 
												LEFT JOIN blk_hari d
												ON c.hari=d.kode_hari
												where a.id_jadwal_data='$v_id'
												AND c.hari='$zhari'";
		$data['tampil_data_jadwal_data'] 	= $this->M_session->select($jadwal_data);

		//====================
	 	$tkw 								= "SELECT 
		 										personalblk.nodaftar as id,
		 										personalblk.nama as nama_hk,
		 										personal.nama as nama_tw 
		 										FROM personalblk 
		 										LEFT JOIN personal 
		 										ON personalblk.nodaftar=personal.id_biodata 
		 										WHERE (personal.statterbang is null && personalblk.statterbang is null )
		 										AND (statusaktif!='Mengundurkan diri' && statusaktif!='UNFIT')
												AND (personalblk.nodaftar not like 'MF%' && personalblk.nodaftar not like 'MI%' && personalblk.nodaftar not like 'FF%')
												ORDER BY personalblk.nodaftar ASC
	 										";
	 	$data['tampil_data_tkw'] 			= $this->M_session->select($tkw);

		//================
		$tkw2 								= "SELECT 
												*
												FROM blk_jadwal_data_tki a
												where a.jadwal_data_id='$v_id'
												$whered";
		$data['tampil_data_tkw2'] 			= $this->M_session->select($tkw2);

		//==============
		$data['tampil_data_nilai'] 			= $this->M_session->select("SELECT * FROM blk_nilai");

		//==============
		$tki = "SELECT a.nama, b.date_angkatan, a.nodaftar FROM personalblk a LEFT JOIN personal_angkatan b ON a.nodaftar=b.nodaftar ORDER BY b.date_angkatan DESC";
		$tampil_data_tki2 = $this->M_session->select($tki);
		$tanggal_ori = $this->M_session->select_row("SELECT a.tanggal,b.minggu FROM blk_jadwal_data a LEFT JOIN blk_jadwal_paket b ON a.paket_id=b.id_paket WHERE a.id_jadwal_data='$v_id'");
		
		$tanggal_ori2 = "";
		if ($tanggal_ori != NULL) {
			$tanggal_ori2 = $tanggal_ori->tanggal;
		}
		$minggu_ori2 = "";
		if ($tanggal_ori != NULL) {
			$minggu_ori2 = $tanggal_ori->minggu;
		}

		$minggu_exp = explode(",", $minggu_ori2);

		$data33 = array();
		foreach($tampil_data_tki2 as $pkt) {
			if ($pkt->date_angkatan != NULL) {
	            $startpast = $pkt->date_angkatan;
	            $xnowday = $tanggal_ori2;
	            $datetimeee = new DateTime($startpast);
	            $dayzz = $datetimeee->format('w');
	            if($dayzz == 1) {
	                $xfirstday  = $startpast;
	            } else {
	                $xfirstday  = date('Y-m-d', strtotime('next monday', strtotime($startpast)));
	            }
	            if ($xfirstday <= $xnowday) {
	                $dayss = round(abs(strtotime($xnowday)-strtotime($xfirstday))/86400);
	                $weekk = (int)($dayss / 7)+1;
	            } elseif ($xfirstday >= $xnowday) {
	                $weekk = 0;
	            } else {
	                $weekk = 0;
	            }
	            $weekk = 'M'.$weekk;
	        } else {
	            $weekk = "BELUM DIISI";
	        }

	        if (count($minggu_exp) == 1) {
	        	if ($weekk == $minggu_exp[0]) {
		        	$data33[] = array(
		        		'nama' 		=> $pkt->nama,
		        		'nodaftar' 	=> $pkt->nodaftar,
		        		'angkatan' 	=> $weekk
		        	);
		        }
	        } elseif (count($minggu_exp) == 2) {
	        	if ($weekk == $minggu_exp[0] || $weekk == $minggu_exp[1]) {
		        	$data33[] = array(
		        		'nama' 		=> $pkt->nama,
		        		'nodaftar' 	=> $pkt->nodaftar,
		        		'angkatan' 	=> $weekk
		        	);
	        	}
	        } 
	    }

		$data['tampil_data_update_tki_angkatan'] = $data33;

		$data['v_id'] 	= $v_id;
		$data['e_hari'] = $zhari;

		$data['namamodule'] = "blk_jadwal2";
		$data['namafileview'] = "v_jadwal_detail";
		echo Modules::run('template/blk_template', $data); 
	}

	function set_hari($v_id) {
		$hari = $this->input->post('pil_hari');
		$this->session->set_userdata('jadwal_detail_hari', $hari);
		redirect('blk_jadwal2/jadwal_detail/'.$v_id); 
	}

	function jadwal_detail_add_tki_manual($v_id) {
		$id 	 	= $this->input->post('id');
		$datatkw 	= $this->input->post('dt_tkw');
		$kode_hari	= $this->input->post('vie_hari');
		$cek_hari 	= $this->input->post('cek_hari');


		$data = array();
		for ($y=0; $y<count($datatkw); $y++) {
			$data_hari = "";
			for ($i=0; $i<count($kode_hari); $i++) {
				$substr_hari 		= substr($kode_hari[$i], 1, 1);
				$data_hari = $data_hari.",hari".$substr_hari." => ".$cek_hari[$i]."";
			}

			$data_hari1="";
			$data_hari2="";
			$data_hari3="";
			$data_hari4="";
			$data_hari5="";
			$data_hari6="";
			$data_hari7="";
			for ($d=1; $d<=7; $d++) {
				for ($u=0; $u<count($kode_hari); $u++) {
					if ($kode_hari[$u] == "H".$d) {
						${"data_hari".$d} = '1 ';
					}
				}
			}

			$substr_data_hari = substr($data_hari, 1);
			$data[] = array (
				'biodata_id' 	 	=> $datatkw[$y],
				'tipe_data'  	 	=> 'manual',
				'hari1' 			=> $data_hari1,
				'hari2' 			=> $data_hari2,
				'hari3' 			=> $data_hari3,
				'hari4' 			=> $data_hari4,
				'hari5' 			=> $data_hari5,
				'hari6' 			=> $data_hari6,
				'hari7' 			=> $data_hari7,
				'jadwal_data_id'	=> $id
			);
		}
		//print_r($kode_hari);
		//print_r($cek_hari);
		$this->M_session->insert_batch($data, 'blk_jadwal_data_tki');

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function jadwal_detail_update_tki_angkatan($v_id) {
		$datatkw 	= $this->input->post('id_tki');

		$tanggal_ori = $this->M_session->select_row("SELECT a.tanggal,b.minggu FROM blk_jadwal_data a LEFT JOIN blk_jadwal_paket b ON a.paket_id=b.id_paket WHERE a.id_jadwal_data='$v_id'");
		
		$tanggal_ori2 = "";
		if ($tanggal_ori != NULL) {
			$tanggal_ori2 = $tanggal_ori->tanggal;
		}

		$data = array();
		for ($y=0; $y<count($datatkw); $y++) {
			$tki = "SELECT a.nama, b.date_angkatan, a.nodaftar FROM personalblk a LEFT JOIN personal_angkatan b ON a.nodaftar=b.nodaftar WHERE b.nodaftar='$datatkw[$y]' ORDER BY b.date_angkatan DESC";
			$tampil_data_tki2 = $this->M_session->select_row($tki);

			if ($tampil_data_tki2->date_angkatan != NULL) {
	            $startpast = $tampil_data_tki2->date_angkatan;
	            $xnowday = $tanggal_ori2;
	            $datetimeee = new DateTime($startpast);
	            $dayzz = $datetimeee->format('w');
	            if($dayzz == 1) {
	                $xfirstday  = $startpast;
	            } else {
	                $xfirstday  = date('Y-m-d', strtotime('next monday', strtotime($startpast)));
	            }
	            if ($xfirstday <= $xnowday) {
	                $dayss = round(abs(strtotime($xnowday)-strtotime($xfirstday))/86400);
	                $weekk = (int)($dayss / 7)+1;
	            } elseif ($xfirstday >= $xnowday) {
	                $weekk = 0;
	            } else {
	                $weekk = 0;
	            }
	            $weekk = $weekk;
	        } else {
	            $weekk = "BELUM DIISI";
	        }

			$data[] = array (
				'biodata_id' 	 	=> $datatkw[$y],
				'tipe_data'  	 	=> 'angkatan',
				'hari1' 			=> 1,
				'hari2' 			=> 1,
				'hari3' 			=> 1,
				'hari4' 			=> 1,
				'hari5' 			=> 1,
				'hari6' 			=> 1,
				'hari7' 			=> 1,
				'angkatan' 			=> $weekk,
				'jadwal_data_id'	=> $v_id
			);
		}
		//echo '<pre>';
		//print_r($data);
		$this->M_session->insert_batch($data, 'blk_jadwal_data_tki');

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function jadwal_detail_tdk_hadir($v_id) {
		$id_jadwal_data_tki = $this->input->post('id_jadwal_data_tki');
		$tdk_hadir 			= $this->input->post('tdk_hadir');
		$hari 			 	= $this->input->post('hari');

		$substr_hari 		= substr($hari, 1, 1);

		$data = array();
		for($h=0; $h<count($id_jadwal_data_tki); $h++) {
			$data[] = array(
				'id_jadwal_data_tki' 	 => $id_jadwal_data_tki[$h],
				'tdk_hadir'.$substr_hari => $tdk_hadir[$h]
			);
		}
		$this->M_session->update_batch($data, 'blk_jadwal_data_tki', 'id_jadwal_data_tki');

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function jadwal_detail_penilaian($v_id) {
		$id_penilaian = $this->input->post('id_penilaian');

		$tki_id 	= $this->input->post('id');
		$hari 		= $this->input->post('hari');
		$p_materi 	= $this->input->post('p_materi');
		$p_nilai 	= $this->input->post('p_nilai');
		$p_id_nilai = $this->input->post('p_id_nilai');

		if ($id_penilaian != NULL) {
			$data = array();
			for($o=0; $o<count($p_materi); $o++) {
				$data[] = array(
					'id_penilaian'  	 => $p_id_nilai[$o],
					'jadwal_data_tki_id' => $tki_id,
					'hari'		 	 	 => $hari,
					'nilai'  		 	 => $p_nilai[$o],
					'materi_id' 	 	 => $p_materi[$o]
				);
			}
			$this->M_session->update_batch($data, 'blk_jadwal_penilaian', 'id_penilaian');
		} else {
			$data = array();
			for($o=0; $o<count($p_materi); $o++) {
				$data[] = array(
					'jadwal_data_tki_id' => $tki_id,
					'hari'		 	 	 => $hari,
					'nilai'  		 	 => $p_nilai[$o],
					'materi_id' 		 => $p_materi[$o]
				);
			}
			$this->M_session->insert_batch($data, 'blk_jadwal_penilaian');
		}

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function jadwal_detail_delete($v_id) {
		$tki_id 	= $this->input->post('id');

		$ambil_data_tki = "SELECT * FROM blk_jadwal_data_tki WHERE id_jadwal_data_tki='$tki_id'";
		$key = $this->M_session->select_row($ambil_data_tki);

		$data = array (
			'biodata_id' => $key->biodata_id,
			'hari1' 	 => $key->hari1,
			'hari2' 	 => $key->hari2,
			'hari3'		 => $key->hari3,
			'hari4'		 => $key->hari4,
			'hari5'		 => $key->hari5,
			'hari6'		 => $key->hari6,
			'hari7'		 => $key->hari7,
			'tdk_hadir1' => $key->tdk_hadir1,
			'tdk_hadir2' => $key->tdk_hadir2,
			'tdk_hadir3' => $key->tdk_hadir3,
			'tdk_hadir4' => $key->tdk_hadir4,
			'tdk_hadir5' => $key->tdk_hadir5,
			'tdk_hadir6' => $key->tdk_hadir6,
			'tdk_hadir7' => $key->tdk_hadir7,
			'angkatan' 	 => $key->angkatan,
			'tipe_data'  => $key->tipe_data,
			'nonaktif_flag'  => $key->nonaktif_flag,
			'jadwal_data_id' => $key->jadwal_data_id,
		);

		$this->M_session->insert($data, 'blk_jadwal_data_tki_delete');

		$this->M_session->delete('blk_jadwal_data_tki', $tki_id, 'id_jadwal_data_tki');

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function all_print($v_id, $v_hari) {

		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/new_jadwal2_jompo.docx');

		$get_materi   = "SELECT 
						c.hari as hari,
						a.instruktur_kode as guru,
						c.materi as materi,
						a.tanggal as tanggal,
						b.jam as jam
						FROM blk_jadwal_data a 
						JOIN blk_jadwal_paket b 
						ON a.paket_id=b.id_paket
						JOIN blk_jadwal_paketjadwal c 
						ON b.id_paket=c.paket_id
						WHERE a.id_jadwal_data='$v_id'
						AND c.hari='$v_hari'
						";
		$value 		  = $this->M_session->select_row($get_materi);


		$f_hari = $this->M_session->select_row("SELECT * FROM blk_hari where kode_hari='$value->hari'")->hari;
		$f_guru = $this->M_session->select_row("SELECT * FROM blk_instruktur where kode_instruktur='$value->guru'")->nama;
		$f_tgl 	= date("d/m/Y", strtotime($value->tanggal));
		$exp_materi = explode(",", $value->materi);
		
		$exp_jam = explode(",", $value->jam);
		if (count($exp_jam) == 1) {
			$f_jam1  = $this->M_session->select_row("SELECT * FROM blk_jam where kode_jam='$exp_jam[0]'")->jam;
			$f_jam 	 = $f_jam1;
		} elseif (count($exp_jam) == 2) {
			$f_jam1  = $this->M_session->select_row("SELECT * FROM blk_jam where kode_jam='$exp_jam[0]'")->jam;
			$f_jam2  = $this->M_session->select_row("SELECT * FROM blk_jam where kode_jam='$exp_jam[1]'")->jam;
			$f_jam 	 = $f_jam1.' - '.$f_jam2;
		}

		$f_materi = "";


		$document->setValue('val8', strtoupper($f_hari));
		$document->setValue('jam', $f_jam);

		$document->cloneRow('val1',count($exp_materi));
		$nn=1;
		for ($b=0; $b<count($exp_materi); $b++) {
			$exp_materi2 = explode("|-|", $exp_materi[$b]);
			$x_materi = $this->M_session->select_row("SELECT * FROM blk_pelajaran_jompo where kode_materi='$exp_materi2[0]'");
			if ($b == 1) {
				$f_hari = "";
				$f_guru = "";
				$f_tgl  = "";
			}

		    $document->setValue('val1#'.$nn, $f_hari);
		    $document->setValue('val2#'.$nn, $f_tgl);
		    $document->setValue('val3#'.$nn, $f_guru);

		    $document->setValue('val4#'.$nn, $b);
		    $document->setValue('val5#'.$nn, $x_materi->kode_materi.'-'.$x_materi->nama_materi);
		    $document->setValue('val6#'.$nn, $x_materi->keterangan);
		    $document->setValue('val7#'.$nn, $x_materi->buku_hal);
		$nn++;
		}

		$field_hari = "hari".substr($v_hari, 1, 1);
		$where23 = "and $field_hari='1'";

		$get_tkw   = "SELECT 
						biodata_id
						FROM blk_jadwal_data_tki
						WHERE jadwal_data_id='$v_id'
						$where23 
						";
		$query_tkw = $this->M_session->select($get_tkw);
		
		$document->cloneRow('no',count($query_tkw));

		$nn = 1;
		foreach($query_tkw as $value2) {
			
            $sektor 		= substr($value2->biodata_id, 2, 0);
            $biodata_nama 	= "";
            if ($sektor == 'FI' || $sektor == 'FF' || $sektor == 'MF' || $sektor == 'MI' || $sektor == 'JP') {
                $ambil_tw = $this->M_session->select_row("SELECT nama FROM personal where id_biodata='$value2->biodata_id'");
                $biodata_nama    = $ambil_tw->nama;
            } else {
                $ambil_hk = $this->M_session->select_row("SELECT nama FROM personalblk where nodaftar='$value2->biodata_id'");
                $biodata_nama    = $ambil_hk->nama;
            }

		    $document->setValue('no#'.$nn, $nn);
		    $document->setValue('id#'.$nn, $value2->biodata_id);
		    $document->setValue('xxnama#'.$nn, $biodata_nama);
		$nn++;
		}

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

	function search() {
		$pil_paket = $this->input->post('pil_paket');
		$pil_tgl   = $this->input->post('pil_tgl');

		$this->session->set_userdata('jadwal_pil_paket', $pil_paket);
		$this->session->set_userdata('jadwal_pil_tgl', $pil_tgl);

		redirect('blk_jadwal2/jadwal');
	}



}