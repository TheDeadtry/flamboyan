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
					a.nama_paket as kode_paket,
					b.nama_paket,
					a.nama_full 
					FROM blk_jadwal_paket a
					LEFT JOIN blk_setting_paket b
					ON a.nama_paket=b.id_setting_paket
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
		
		$minggu_final 	= implode(",", $minggu);

		$data = array(
			'nama_full' 	=> $nama2,
			'nama_paket' 	=> $nama
		);

		$this->M_session->insert($data, 'blk_jadwal_paket');

		redirect('blk_jadwal2/paket');
	}

	function paket_ubah() {
		$id2  			= $this->input->post('id');

		$nama2 			= $this->input->post('nama_full');
		$nama 			= $this->input->post('nama');
		
		$minggu_final 	= implode(",", $minggu);

		$data = array(
			'nama_full' 	=> $nama2,
			'nama_paket' 	=> $nama
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
	 	$data['tampil_data_paketjadwal'] 	= $this->M_session->select("SELECT distinct(hari) as hari FROM blk_jadwal_paketjadwal where paket_id='".$id."' ORDER BY hari ASC");
	 	$setting_nama_paket					= $this->M_session->select_row("SELECT b.nama_paket, b.source, b.source2 FROM blk_jadwal_paket a JOIN blk_setting_paket b ON a.nama_paket=b.id_setting_paket where a.id_paket='".$id."'");
	 	$nama_tabel 						= $setting_nama_paket->source;
	 	$nama_concat 						= $setting_nama_paket->source2;
	 	$data['izpaket']					= $setting_nama_paket->nama_paket;


		$query = "
			SELECT a.kode_materi,a.nama_materi,concat(a.kode_materi,'|-|".$nama_concat."') as id FROM $nama_tabel a";
			/*
		$query = "
			SELECT a.kode_materi,a.nama_materi,concat(a.kode_materi,'|-|berhitung') as id FROM blk_pelajaran_berhitung a
			                  UNION 
			SELECT b.kode_materi,b.nama_materi,concat(b.kode_materi,'|-|bhs_taiyu') as id  FROM blk_pelajaran_bhs_taiyu b
			                  UNION 
			SELECT c.kode_materi,c.nama_materi,concat(c.kode_materi,'|-|fisik_mental') as id  FROM blk_pelajaran_fisik_mental c
			                  UNION 
			SELECT d.kode_materi,d.nama_materi,concat(d.kode_materi,'|-|graha_boga') as id  FROM blk_pelajaran_graha_boga d
			                  UNION 
			SELECT e.kode_materi,e.nama_materi,concat(e.kode_materi,'|-|graha_laundry') as id  FROM blk_pelajaran_graha_laundry e
			                  UNION 
			SELECT f.kode_materi,f.nama_materi,concat(f.kode_materi,'|-|graha_ruang') as id  FROM blk_pelajaran_graha_ruang f
			                  UNION 
			SELECT g.kode_materi,g.nama_materi,concat(g.kode_materi,'|-|jompo') as id  FROM blk_pelajaran_jompo g
			                  UNION 
			SELECT h.kode_materi,h.nama_materi,concat(h.kode_materi,'|-|mandarin_inf_jompo') as id  FROM blk_pelajaran_mandarin_inf_jompo h
			                  UNION 
			SELECT i.kode_materi,i.nama_materi,concat(i.kode_materi,'|-|mandarin_pabrik') as id  FROM blk_pelajaran_mandarin_pabrik i
			                  UNION 
			SELECT j.kode_materi,j.nama_materi,concat(j.kode_materi,'|-|olah_raga') as id  FROM blk_pelajaran_olah_raga j
			                  UNION 
			SELECT k.kode_materi,k.nama_materi,concat(k.kode_materi,'|-|tata_boga') as id  FROM blk_pelajaran_tata_boga k
		";*/
		$data['tampil_data_materi'] 		= $this->M_session->select($query);
		$data['ddd'] = $query;
		$data['tampil_data_hari'] 			= $this->M_session->select("SELECT * FROM blk_hari ORDER BY kode_hari ASC");
		$data['tampil_data_jam'] 			= $this->M_session->select("SELECT * FROM blk_jam ORDER BY kode_jam ASC");
	 	$data['tampil_data_minggu'] 		= $this->M_session->select("SELECT * FROM blk_minggu ORDER BY id_minggu ASC");
		$data['izpaket'] 					= $this->M_session->select_row("SELECT b.nama_paket FROM blk_jadwal_paket a JOIN blk_setting_paket b where a.id_paket='".$id."'")->nama_paket;

		$data['zid_paket'] = $id;

		$data['namamodule'] 	= "blk_jadwal2";
		$data['namafileview'] 	= "v_add_hari";
		echo Modules::run('template/blk_template', $data); 
	}

	function add_hari_simpan($id) {
		$hari 			= $this->input->post('hari');
		$jam 			= $this->input->post('jam');
		$minggu			= $this->input->post('minggu');
		$materi 		= $this->input->post('materi');
		
		$minggu_final 	= implode(",", $minggu);
		$materi_final 	= implode(",", $materi);

		$data = array(
			'hari' 		=> $hari,
			'jam' 		=> $jam,
			'minggu' 	=> $minggu_final,
			'materi' 	=> $materi_final,
			'paket_id'	=> $id
		);

		$this->M_session->insert($data, 'blk_jadwal_paketjadwal');

		redirect('blk_jadwal2/add_hari/'.$id);
	}

	function add_hari_ubah($id) {
		$id2  			= $this->input->post('id');

		$hari 			= $this->input->post('hari');
		$jam 			= $this->input->post('jam');
		$minggu			= $this->input->post('minggu');
		$materi 		= $this->input->post('materi');
		
		$minggu_final 	= implode(",", $minggu);
		$materi_final 	= implode(",", $materi);

		$data = array(
			'hari' 		=> $hari,
			'jam' 		=> $jam,
			'minggu' 	=> $minggu_final,
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
	 	$jadwal 						= "SELECT 
	 										a.tanggal,
	 										b.nama_full,
	 										a.instruktur_kode,
	 										a.id_jadwal_data
							 				FROM blk_jadwal_data a
							 				LEFT JOIN blk_jadwal_paket b
							 				ON a.paket_id=b.id_paket
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
		$get_paketjadwal_id = "SELECT 
								b.id_jadwal_paket_jadwal as id, 
								b.minggu,
								b.hari,
								b.jam,
								c.tanggal
								FROM blk_jadwal_paket a 
								LEFT JOIN blk_jadwal_paketjadwal b
								ON a.id_paket=b.paket_id 
								LEFT JOIN blk_jadwal_data c
								ON a.id_paket=c.paket_id
								where a.id_paket=".$pil_paket;
		$exm_paketjadwal_id	= $this->M_session->select($get_paketjadwal_id);
		foreach ($exm_paketjadwal_id as $value) {
			$exp_minggu = explode(",", $value->minggu);

			$angktan 		= "SELECT * FROM personal_angkatan";
			$qry_angkatan 	= $this->M_session->select($angktan);

			$data2 = array();
			for ($b=0; $b<count($exp_minggu); $b++) {
	            $fnl_minggu = substr($exp_minggu[$b], 1);
				foreach ($qry_angkatan as $key) {
					$startpast = $key->date_angkatan;
		            $xnowday = $value->tanggal;
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
							'biodata_id' 				=> $zidbio,
							'angkatan' 					=> $zangkatan,
							'hari' 						=> $value->hari,
							'jam' 						=> $value->jam,
							'jadwal_paketjadwal_id' 	=> $value->id,
							'jadwal_data_id' 			=> $idins
						);
	            	}
				}
			}
			if ($data2 != NULL) {
				$this->M_session->insert_batch($data2, 'blk_jadwal_data_tki');
			}
		}

		redirect('blk_jadwal2/jadwal/');
	}

	function jadwal_detail_prolog($v_id) {
		$this->session->unset_userdata('jadwal_detail_hari');
		$this->session->unset_userdata('jadwal_detail_jam');

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function jadwal_detail($v_id) {
		$data['tampil_data_hari'] 	= $this->M_session->select("SELECT * FROM blk_hari");

		$hari 						= $this->session->userdata('jadwal_detail_hari');
		$jam  						= $this->session->userdata('jadwal_detail_jam');
/*
		//===============
		$hari_paket 						 = "SELECT
												min(distinct(jadwal_paketjadwal_id)),
												b.hari,
												b.jam
												FROM blk_jadwal_data a
												JOIN blk_jadwal_data_tki b
												ON a.id_jadwal_data=b.jadwal_data_id
												WHERE a.id_jadwal_data='$v_id'";
		$hari_paket_query 					 = $this->M_session->select_row($hari_paket);
*/
		//===============
		$hari_paket 						 = "SELECT
												min(distinct(id_jadwal_paket_jadwal)),
												b.hari,
												b.jam
												FROM blk_jadwal_data a
												JOIN blk_jadwal_paketjadwal b
												ON a.paket_id=b.paket_id
												WHERE a.id_jadwal_data='$v_id'";
		$hari_paket_query 					 = $this->M_session->select_row($hari_paket);

		if ($hari != NULL) {
			$zhari = $hari;
		} else {
			$zhari = $hari_paket_query->hari;
		}
		if ($jam != NULL) {
			$zjam = $jam;
		} else {
			$zjam = $hari_paket_query->jam;
		}
		$substr_hari = substr($zhari, 1,1);
		$whered = "AND hari".$substr_hari."=1";

		//================
		$hari_paket 						 = "SELECT
												distinct(c.hari),
												c.kode_hari
												FROM blk_jadwal_data a
												LEFT JOIN blk_jadwal_paketjadwal b
												ON a.paket_id=b.paket_id
												LEFT JOIN blk_hari c
												ON b.hari=c.kode_hari
												WHERE a.id_jadwal_data='$v_id'";
		$data['tampil_data_hari_dari_paket'] = $this->M_session->select($hari_paket); 
		//================
		$jam_paket = "SELECT
					distinct(c.jam),
					c.kode_jam
					FROM blk_jadwal_data a
					LEFT JOIN blk_jadwal_paketjadwal b
					ON a.paket_id=b.paket_id
					LEFT JOIN blk_jam c
					ON b.jam=c.kode_jam
					WHERE a.id_jadwal_data='$v_id'
					AND b.hari='$zhari'
					ORDER BY c.kode_jam ASC";
		$data['option_jam'] = $this->M_session->select($jam_paket); 
		//================
		$jadwal_data 						= "SELECT 
												*,
												a.tanggal,
												d.hari,
												c.hari as kode_hari,
												c.materi,
												a.instruktur_kode,
												c.jam
												FROM blk_jadwal_data a 
												JOIN blk_jadwal_paket b 
												ON a.paket_id=b.id_paket 
												JOIN blk_jadwal_paketjadwal c 
												ON b.id_paket=c.paket_id 
												LEFT JOIN blk_hari d
												ON c.hari=d.kode_hari
												where a.id_jadwal_data='$v_id'
												AND c.hari='$zhari'
												AND c.jam='$zjam'";
		$data['tampil_data_jadwal_data'] 	= $this->M_session->select($jadwal_data);
		$data['dewa'] = $jadwal_data;

		//================
		$tkw2 								= "SELECT 
												*
												FROM blk_jadwal_data_tki a
												where a.jadwal_data_id='$v_id'
												AND hari='$zhari'
												AND jam='$zjam'";
		$tampil_data_tkw2 					= $this->M_session->select($tkw2);
		$data['tampil_data_tkw2'] 			= $tampil_data_tkw2;

		//====================
	 	$bio_array = "";
	 	foreach ($tampil_data_tkw2 as $tor) {
	 		$bio_array = $bio_array."personalblk.nodaftar!=".$tor->biodata_id;
	 	}

		$strr = array();
	 	foreach ($tampil_data_tkw2 as $tor) {
			$strr[] = " personalblk.nodaftar!='".$tor->biodata_id."'";
		}
		$where = '';
		if ( count( $strr ) ) {
			$where = '('.implode(' AND ', $strr).')';
		}
		if ( $where !== '' ) {
			$where = "WHERE (personal.statterbang is null && personalblk.statterbang is null )
		 										AND (statusaktif!='Mengundurkan diri' && statusaktif!='UNFIT')
												AND (personalblk.nodaftar not like 'MF%' && personalblk.nodaftar not like 'MI%' && personalblk.nodaftar not like 'FF%') AND ".$where;
		}

	 	$tkw 								= "SELECT 
		 										personalblk.nodaftar as id,
		 										personalblk.nama as nama_hk,
		 										personal.nama as nama_tw 
		 										FROM personalblk 
		 										LEFT JOIN personal 
		 										ON personalblk.nodaftar=personal.id_biodata 
		 										$where 
												ORDER BY personalblk.nodaftar ASC
	 										";
	 	$data['tampil_data_tkw'] 			= $this->M_session->select($tkw);
		//==============
		$data['tampil_data_nilai'] 			= $this->M_session->select("SELECT * FROM blk_nilai");
/*		
		//===============
		$haries 							 = "SELECT
												*
												FROM blk_hari";
		$data['tampil_data_harinew'] = $this->M_session->select($haries); 
		*/



		//==============
		$tki = "SELECT a.nama, b.date_angkatan, a.nodaftar FROM personalblk a LEFT JOIN personal_angkatan b ON a.nodaftar=b.nodaftar ORDER BY b.date_angkatan DESC";
		$tampil_data_tki2 = $this->M_session->select($tki);
		$tanggal_ori = $this->M_session->select_row("SELECT 
													a.tanggal,b.minggu 
													FROM blk_jadwal_data a  
													LEFT JOIN blk_jadwal_paketjadwal b 
													ON a.paket_id=b.paket_id 
													WHERE a.id_jadwal_data='$v_id'
													AND b.hari='$zhari'
													AND b.jam='$zjam'");
		
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
	        } elseif (count($minggu_exp) == 3) {
	        	if ($weekk == $minggu_exp[0] || $weekk == $minggu_exp[1] || $weekk == $minggu_exp[2]) {
		        	$data33[] = array(
		        		'nama' 		=> $pkt->nama,
		        		'nodaftar' 	=> $pkt->nodaftar,
		        		'angkatan' 	=> $weekk
		        	);
	        	}
	        } 
	    }

		$data['tampil_data_update_tki_angkatan'] = $data33;

		//===================
		$jadwal_ambil_id = $this->M_session->select_row("SELECT * FROM blk_jadwal_paketjadwal WHERE hari='$zhari' AND jam='$zjam' ORDER BY id_jadwal_paket_jadwal DESC");
		$ambil_tipe_jadwal = $this->M_session->select_row("SELECT b.nama_paket FROM blk_jadwal_data a LEFT JOIN blk_jadwal_paket b ON a.paket_id=b.id_paket WHERE a.id_jadwal_data='$v_id'");
		//==================
		$data['v_id'] 	= $v_id;
		$data['ztipe_paket'] = $ambil_tipe_jadwal->nama_paket;
		$data['v_jadwal_id'] = $jadwal_ambil_id->id_jadwal_paket_jadwal;
		$data['e_hari'] = $zhari;
		$data['e_jam'] = $zjam;

		$data['namamodule'] = "blk_jadwal2";
		$data['namafileview'] = "v_jadwal_detail";
		echo Modules::run('template/blk_template', $data); 
	}

	function set_hari($v_id) {
		$hari = $this->input->post('pil_hari');
		$jam  = $this->input->post('pil_jam');
		$this->session->set_userdata('jadwal_detail_hari', $hari);
		$this->session->set_userdata('jadwal_detail_jam', $jam);
		redirect('blk_jadwal2/jadwal_detail/'.$v_id); 
	}

	function select_jamlist($v_id) {
		$kode = $this->input->post('kode');

		$jam_paket = "SELECT
					distinct(c.jam),
					c.kode_jam
					FROM blk_jadwal_data a
					LEFT JOIN blk_jadwal_paketjadwal b
					ON a.paket_id=b.paket_id
					LEFT JOIN blk_jam c
					ON b.jam=c.kode_jam
					WHERE a.id_jadwal_data='$v_id'
					AND b.hari='$kode'
					ORDER BY c.kode_jam ASC";
		$data['option_jam'] = $this->M_session->select($jam_paket); 

        $this->load->view('blk_jadwal2/v_jadwal_detail_jam',$data);
	}

	function jadwal_detail_add_tki_manual($v_id) {
		$jadwal_id 	 = $this->input->post('jadwal_id');
		$data_id 	 = $this->input->post('data_id');

		$datatkw 	= $this->input->post('dt_tkw');
		$hari		= $this->input->post('vie_hari');
		$jam		= $this->input->post('vie_jam');

		$data = array();
		for ($y=0; $y<count($datatkw); $y++) {

			$data[] = array (
				'biodata_id' 			=> $datatkw[$y],
				'hari' 					=> $hari,
				'jam' 					=> $jam,
				'tipe_data'  			=> 'manual',
				'jadwal_paketjadwal_id' => $jadwal_id,
				'jadwal_data_id' 		=> $data_id
			);

		}
		$this->M_session->insert_batch($data, 'blk_jadwal_data_tki');
			
		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function jadwal_detail_update_tki_angkatan($v_id) {
		$datatkw 	= $this->input->post('id_tki');

		$jadwal_id 	 = $this->input->post('jadwal_id');
		$data_id 	 = $this->input->post('data_id');

		$hari		= $this->input->post('vie_hari');
		$jam		= $this->input->post('vie_jam');

		$tanggal_ori = $this->M_session->select_row("SELECT a.tanggal FROM blk_jadwal_data a LEFT JOIN blk_jadwal_paket b ON a.paket_id=b.id_paket WHERE a.id_jadwal_data='$v_id'");
		
		$tanggal_ori2 = "";
		if ($tanggal_ori != NULL) {
			$tanggal_ori2 = $tanggal_ori->tanggal;
		}

		$data = array();
		for ($y=0; $y<count($datatkw); $y++) {
			$tki = "SELECT 
					a.nama, 
					b.date_angkatan, 
					a.nodaftar 
					FROM personalblk a 
					LEFT JOIN personal_angkatan b 
					ON a.nodaftar=b.nodaftar 
					WHERE b.nodaftar='$datatkw[$y]' 
					ORDER BY b.date_angkatan DESC";
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
				'biodata_id' 			=> $datatkw[$y],
				'hari' 					=> $hari,
				'jam' 					=> $jam,
				'angkatan' 				=> $weekk,
				'jadwal_paketjadwal_id' => $jadwal_id,
				'jadwal_data_id'		=> $data_id
			);
		}
		$this->M_session->insert_batch($data, 'blk_jadwal_data_tki');
		

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function jadwal_detail_tdk_hadir($v_id) {
		$id_jadwal_data_tki = $this->input->post('id_jadwal_data_tki');
		$tdk_hadir 			= $this->input->post('tdk_hadir');

		$substr_hari 		= substr($hari, 1, 1);

		$data = array();
		for($h=0; $h<count($id_jadwal_data_tki); $h++) {
			$data[] = array(
				'id_jadwal_data_tki' 	 => $id_jadwal_data_tki[$h],
				'tdk_hadir'				 => $tdk_hadir[$h]
			);
		}
		$this->M_session->update_batch($data, 'blk_jadwal_data_tki', 'id_jadwal_data_tki');

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}
/*
	function jadwal_detail_checklist() {
		$tdk_hadir 		= $this->input->post('value');
		$tdk_hadir_exp 	= explode("/", $tdk_hadir);

		$value 			= $tdk_hadir_exp[0];
		$id 			= $tdk_hadir_exp[1];

		$data = array(
			'tdk_hadir'				 => $value
		);
		$d = $this->M_session->update($data, 'blk_jadwal_data_tki', $id,'id_jadwal_data_tki');

		if ($d) {
			$info['message'] = "Berhasil Diubah";
		} else {
			$info['message'] = "Gagal Diubah";
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($info));
	}*/

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
			'biodata_id' 			=> $key->biodata_id,
			'angkatan' 	 			=> $key->angkatan,
			'hari' 					=> $key->hari,
			'tdk_hadir' 			=> $key->tdk_hadir,
			'jam' 					=> $key->jam,
			'tipe_data'  			=> $key->tipe_data,
			'nonaktif_flag'  		=> $key->nonaktif_flag,
			'jadwal_paketjadwal_id' => $key->jadwal_paketjadwal_id,
			'jadwal_data_id' 		=> $key->jadwal_data_id,
			'jadwal_data_tki_id' 	=> $key->id_jadwal_data_tki
		);

		$this->M_session->insert($data, 'blk_jadwal_data_tki_delete');

		$this->M_session->delete('blk_jadwal_data_tki', $tki_id, 'id_jadwal_data_tki');

		redirect('blk_jadwal2/jadwal_detail/'.$v_id);
	}

	function all_print($v_id, $v_hari, $v_jam) {

			require_once 'assets/phpword/PHPWord.php';
			$PHPWord = new PHPWord();
			$document = $PHPWord->loadTemplate('files/new_jadwal2_jompo.docx');

			$get_materi   = "SELECT 
							c.hari as hari,
							a.instruktur_kode as guru,
							c.materi as materi,
							a.tanggal as tanggal,
							c.jam as jam,
							b.nama_full,
							d.satuan
							FROM blk_jadwal_data a 
							JOIN blk_jadwal_paket b 
							ON a.paket_id=b.id_paket
							JOIN blk_jadwal_paketjadwal c 
							ON b.id_paket=c.paket_id
							LEFT JOIN blk_hari d
							ON c.hari=d.kode_hari
							WHERE a.id_jadwal_data='$v_id'
							AND c.hari='$v_hari'
							AND c.jam='$v_jam'
							";
			$value 		  = $this->M_session->select_row($get_materi);

			$f_hari = $this->M_session->select_row("SELECT * FROM blk_hari where kode_hari='$value->hari'")->hari;
			$f_guru = $this->M_session->select_row("SELECT * FROM blk_instruktur where kode_instruktur='$value->guru'")->nama;

			$f_tgl 	= date("d/m/Y", strtotime("+$value->satuan day", strtotime($value->tanggal)));
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

			;
			$title = "PERSERTA ".$value->nama_full." HARI ".strtoupper($f_hari)."  : ".$f_jam."			T-TEORI, P-PRAKTEK";

			$document->setValue('title', $title);
			
			$document->cloneRow('val1',count($exp_materi));
			$nn=1;
			for ($b=0; $b<count($exp_materi); $b++) {
				$exp_materi2 = explode("|-|", $exp_materi[$b]);
				$table = "blk_pelajaran_".$exp_materi2[1];
				$x_materi = $this->M_session->select_row("SELECT * FROM $table where kode_materi='$exp_materi2[0]'");
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

			$where23 = "and hari='$v_hari' AND jam='$v_jam'";

			$get_tkw   = "SELECT 
							biodata_id,angkatan
							FROM blk_jadwal_data_tki
							WHERE jadwal_data_id='$v_id'
							$where23 
							";
			$query_tkw = $this->M_session->select($get_tkw);
			
			$total_materi 	= count($exp_materi);
			$total_row 		= count($query_tkw);
			$total_final 	= $total_materi*$total_row;
			$document->cloneRow('no',$total_final);


			$nn  = 1;
			$nn2 = 1;
			$nn3 = 1;
			foreach($query_tkw as $value2) {
				for ($b=0; $b<count($exp_materi); $b++) {

		            $sektor 		= substr($value2->biodata_id, 2, 0);
		            $biodata_nama 	= "";
		            if ($sektor == 'FI' || $sektor == 'FF' || $sektor == 'MF' || $sektor == 'MI' || $sektor == 'JP') {
		                $ambil_tw = $this->M_session->select_row("SELECT nama FROM personal where id_biodata='$value2->biodata_id'");
		                $biodata_nama    = $ambil_tw->nama;
		            } else {
		                $ambil_hk = $this->M_session->select_row("SELECT nama FROM personalblk where nodaftar='$value2->biodata_id'");
		                $biodata_nama    = $ambil_hk->nama;
		            }

					if ($nn2 == $nn) {
						$document->setValue('no#'.$nn, $nn3);
					    $document->setValue('id#'.$nn, $value2->biodata_id);
					    $document->setValue('xxnama#'.$nn, $biodata_nama);
					    $document->setValue('v#'.$nn, $value2->angkatan);
					} else {
						$document->setValue('no#'.$nn2, '');
					    $document->setValue('id#'.$nn2, '');
					    $document->setValue('xxnama#'.$nn2, '');
					    $document->setValue('v#'.$nn2, '');
					}
					$document->setValue('km#'.$nn2, $b);

					  
				$nn2++;  
				}

			$nn = $nn+$total_materi;
			$nn3++;
			}

			$filename = 'filenya.docx';

			$isinya=$document->save($filename);

			header("Content-Description: File Transfer");
		    header('Content-Disposition: attachment; filename="JADWAL '.$value->nama_full.' ('.$value->tanggal.').docx"');
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

    function select_agenlist3(){
    	$idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_new_suhan->getagenlist_group($idgrup);
        $this->load->view('new_suhan/detailgroup3',$data);
    }

    function print_full_hari($v_id) {

    		require_once 'assets/phpword/PHPWord.php';
			$PHPWord = new PHPWord();
			$document = $PHPWord->loadTemplate('files/new_jadwal2_jompo.docx');

			$get_materi   = "SELECT 
							c.hari as hari,
							a.instruktur_kode as guru,
							c.materi as materi,
							a.tanggal as tanggal,
							c.jam as jam,
							b.nama_full
							FROM blk_jadwal_data a 
							JOIN blk_jadwal_paket b 
							ON a.paket_id=b.id_paket
							JOIN blk_jadwal_paketjadwal c 
							ON b.id_paket=c.paket_id
							WHERE a.id_jadwal_data='$v_id'
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

			;
			$title = "PERSERTA ".$value->nama_full." HARI ".strtoupper($f_hari)."  : ".$f_jam."			T-TEORI, P-PRAKTEK";

			$document->setValue('title', $title);
			
			$document->cloneRow('val1',count($exp_materi));
			$nn=1;
			for ($b=0; $b<count($exp_materi); $b++) {
				$exp_materi2 = explode("|-|", $exp_materi[$b]);
				$table = "blk_pelajaran_".$exp_materi2[1];
				$x_materi = $this->M_session->select_row("SELECT * FROM $table where kode_materi='$exp_materi2[0]'");
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

			$where23 = "and hari='$v_hari' AND jam='$v_jam'";

			$get_tkw   = "SELECT 
							biodata_id
							FROM blk_jadwal_data_tki
							WHERE jadwal_data_id='$v_id'
							$where23 
							";
			$query_tkw = $this->M_session->select($get_tkw);
			

			$total_row = count($query_tkw);
			$divided = $total_row%2;
			if ($divided == 1) {
				$half_total2 = ($total_row-1)/2;
				$half_total = $half_total2+1;
			} elseif ($divided == 0) {
				$half_total = $total_row/2;
			}
			$document->cloneRow('no',$half_total);

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

				if ($nn < $half_total || $nn == $half_total) {
				    $document->setValue('no#'.$nn, $nn);
				    $document->setValue('id#'.$nn, $value2->biodata_id);
				    $document->setValue('xxnama#'.$nn, $biodata_nama);
				    //echo $nn.' '.$value2->biodata_id.' '.$biodata_nama.'1<br/>';
				} elseif ($nn > $half_total) {
					$nno = $nn-$half_total;
			    	$document->setValue('nu#'.$nno, $nno);
			    	$document->setValue('ids#'.$nno, $value2->biodata_id);
			    	$document->setValue('yynama#'.$nno, $biodata_nama);
				    //echo $nno.' '.$value2->biodata_id.' '.$biodata_nama.'2<br/>';
				} 
			$nn++;
			}

			$nno = $nn-$half_total;
	    	$document->setValue('nu#'.$nno, '');
	    	$document->setValue('ids#'.$nno, '');
	    	$document->setValue('yynama#'.$nno, '');

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



}