<?php
class M_blk_jadwal extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function select($ress) {
		return $this->db->query($ress)->result();
    }

    function select_row($ress) {
		return $this->db->query($ress)->row();
    }

	function tampil_all_materi() {
		$query = "
			SELECT a.kode_materi,a.nama_materi,concat(a.kode_materi,'||berhitung') as id FROM blk_pelajaran_berhitung a
			                  UNION 
			SELECT b.kode_materi,b.nama_materi,concat(b.kode_materi,'||bhs_taiyu') as id  FROM blk_pelajaran_bhs_taiyu b
			                  UNION 
			SELECT c.kode_materi,c.nama_materi,concat(c.kode_materi,'||fisik_mental') as id  FROM blk_pelajaran_fisik_mental c
			                  UNION 
			SELECT d.kode_materi,d.nama_materi,concat(d.kode_materi,'||graha_boga') as id  FROM blk_pelajaran_graha_boga d
			                  UNION 
			SELECT e.kode_materi,e.nama_materi,concat(e.kode_materi,'||graha_laundry') as id  FROM blk_pelajaran_graha_laundry e
			                  UNION 
			SELECT f.kode_materi,f.nama_materi,concat(f.kode_materi,'||graha_ruang') as id  FROM blk_pelajaran_graha_ruang f
			                  UNION 
			SELECT g.kode_materi,g.nama_materi,concat(g.kode_materi,'||jompo') as id  FROM blk_pelajaran_jompo g
			                  UNION 
			SELECT h.kode_materi,h.nama_materi,concat(h.kode_materi,'||mandarin_inf_jompo') as id  FROM blk_pelajaran_mandarin_inf_jompo h
			                  UNION 
			SELECT i.kode_materi,i.nama_materi,concat(i.kode_materi,'||mandarin_pabrik') as id  FROM blk_pelajaran_mandarin_pabrik i
			                  UNION 
			SELECT j.kode_materi,j.nama_materi,concat(j.kode_materi,'||olah_raga') as id  FROM blk_pelajaran_olah_raga j
			                  UNION 
			SELECT k.kode_materi,k.nama_materi,concat(k.kode_materi,'||tata_boga') as id  FROM blk_pelajaran_tata_boga k
		";/*
		$query = "
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
		";*/
		$q = $this->db->query($query);
		return $q->result();
	}

	function tampil_boga_materi() {
		$query = "
			SELECT k.kode_materi,k.nama_materi,concat(k.id_tata_boga,'||tata_boga') as id  FROM blk_pelajaran_tata_boga k
		";
		$q = $this->db->query($query);
		return $q->result();
	}

	function simpan() {
		$nama 	= $this->input->post('nama_jadwal');
		$minggu = $this->input->post('minggu');
		$kode 	= substr($nama, 0, 1).'_'.$minggu;

		if ($minggu != NULL) {
			$ggminggu = "";
			$ggminggu2 = "";

			for ($tfb=0;$tfb<count($minggu);$tfb++) {
				$ggminggu = $ggminggu.','.$minggu[$tfb];
				$ggminggu2 = $ggminggu2.'zz'.$minggu[$tfb];
			}

			$hjminggu = substr($ggminggu, 1);
			$hjminggu2 = substr($ggminggu2, 2);

			$kode 	= substr($nama, 0, 3).'_'.$hjminggu2;

			$data 	= array(
				'kode_jadwal' 		=> $kode,
				'nama_jadwal' 		=> $nama,
				'minggu_id' 		=> $hjminggu
			);
			
			$data2 = array();
			for ($th=1;$th<=7;$th++) {
				$data2[] = array (
					'hari_id'		=> "H".$th,
					'kode_jadwal' 	=> $kode
				);
			}
				
			//return $data2;
			$this->db->insert('blk_jadwal',$data);
			$this->db->insert_batch('blk_jadwaldetail',$data2);
		}
	}

	function simpandetail() {
		$mh 	= $this->input->post('mh');
		$materi = $this->input->post('materi');
		$jam	= $this->input->post('jam');
		$kode 	= $this->input->post('kode');
		$hari	= $this->input->post('hari');
		$kodpel	= $this->input->post('kodpel');

		if ($materi != NULL && $jam != NULL) {
			$ggmateri = "";
			$ggjam	  = "";
/*
			for ($vdt=0;$vdt<count($materi);$vdt++) {
				$ggmateri = $ggmateri.','.$materi[$vdt];
			}
*/
			for ($tfb=0;$tfb<count($jam);$tfb++) {
				$ggjam = $ggjam.','.$jam[$tfb];
			}

			$explode_kodpel = explode(",", $kodpel);
			$count_kodpel = count($explode_kodpel);
			if ($kodpel != NULL) {
				$next_kodpel = $count_kodpel+1;
				$final_kodpel = $kodpel.','.$next_kodpel;
			} elseif ($kodpel == NULL) {
				$next_kodpel = 1;
				$final_kodpel = $next_kodpel;
			} else {
				$next_kodpel = $count_kodpel+1;
				$final_kodpel = $kodpel.','.$next_kodpel;
			}

			//$hjmateri = substr($ggmateri, 1);
			$hjjam	  = substr($ggjam, 1);

			$data 	= array(
				'kode_pelajaran' => $final_kodpel
			);
			
			$data2 = array();
			for ($th=0;$th<count($materi);$th++) {
				$data2[] = array (
					'header_nama'	=> $mh,
					'body_nama'		=> $materi[$th],
					'kode_detail'	=> $hari.'._.'.$kode.'<>'.$next_kodpel,
					'jam'			=> $jam[0]
				);
			}
				
			//return $dddjam;
			$this->db->where('kode_jadwal', $kode);
			$this->db->where('hari', $hari);
			$this->db->update('absen_jadwal_detail', $data);

			$this->db->insert_batch('absen_jadwal_materi', $data2);
		}

		
	}

	function simpanmateri($kode, $hari) {
		$kode_ins 	= $this->input->post('kode_instruktur');
		$kode_jam	= $this->input->post('kode_jam');
		$materi 	= $this->input->post('materi');

		$data = array (
			'instruktur_id' => $kode_ins,
			'jam_id' 		=> $kode_jam,
			'materi_id'		=> $materi,
			'kode_jadwal' 	=> $kode,
			'kode_detail' 	=> $hari,
		);

		$this->db->insert('blk_jadwalmateri',$data);
	}

	function simpantki($kode, $hari) {

		$data = array (
			'nodaftar' 		=> $this->input->post('idtki'),
			'kode_jadwal' 	=> $kode,
			'kode_detail' 	=> $hari,
		);

		//return $data;

		$this->db->insert('blk_jadwaltki',$data);

	}

	function ubahmateri() {
		$id 		= $this->input->post('id_ubah');
		$kode_ins 	= $this->input->post('instruktur');
		$kode_jam	= $this->input->post('jam');
		$materi 	= $this->input->post('materi');

		$data = array (
			'instruktur_id' => $kode_ins,
			'jam_id' 		=> $kode_jam,
			'materi_id'		=> $materi,
		);
		$this->db->where('id_blk_jadwalmateri', $id);
		$this->db->update('blk_jadwalmateri', $data);
	}

	function ubahtki() {
		$id = $this->input->post('idx');
		
		$data = array (
			'nodaftar' 		=> $this->input->post('idtki'),
		);
		$this->db->where('id_jadwaltki', $id);
		$this->db->update('blk_jadwaltki', $data);
	}

	function hapusmateri() {
		$id = $this->input->post('id_hapus');

		$this->db->where('id_blk_jadwalmateri', $id);
		$this->db->delete('blk_jadwalmateri');
	}

	function hapustki() {
		$id = $this->input->post('idxd');

		$this->db->where('id_jadwaltki', $id);
		$this->db->delete('blk_jadwaltki');
	}
}
?>