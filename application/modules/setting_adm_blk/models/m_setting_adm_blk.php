<?php
class M_setting_adm_blk extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//==============================================PEMILIK TKI======================================================//

 function simpan_data_pemilik_tki(){
		
		$isi	= $this->input->post('isi');
		$negara	= $this->input->post('negara');
		$data = array (
			'isi'		=>	$isi, 
			'negara'	=>	$negara
			);
		$this->db->insert('blk_pemilik',$data);
	}

	function tampil_data_pemilik_tki(){
		$sql = "SELECT * FROM blk_pemilik";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_pemilik_tki() {
		$id = $this->input->post('id_pemilik');
		$isi = $this->input->post('isi');
		$negara = $this->input->post('negara');
		$data = array(
			'isi' 		=> $isi,
			'negara' 	=> $negara,
			);
		$this->db->where('id_pemilik', $id);
		$this->db->update('blk_pemilik', $data);
	}

	function hapus_data_pemilik_tki() {
		$id = $this->input->post('id_pemilik');
		$this->db->where('id_pemilik', $id);
		$this->db->delete('blk_pemilik');
	}

	/* function ambil_id($id) {
		return $this->db->get_where('blk_pemilik', array('id_pemilik' => $id))->row();
	} */
 
 //==============================================Jenis Kelamin======================================================//
 
	function tampil_data_jenis_kelamin(){
		$sql = "SELECT * FROM blk_jk";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_jenis_kelamin(){
		
		$isi	= $this->input->post('isi');
		$data = array (
			'isi'		=>	$isi			
			);
		$this->db->insert('blk_jk',$data);
	}
	function update_data_jenis_kelamin() {
		$id = $this->input->post('id_jk');
		$isi = $this->input->post('isi');
		$data = array(
			'isi' 		=> $isi
			);
		$this->db->where('id_jk', $id);
		$this->db->update('blk_jk', $data);
	}
	function hapus_data_jenis_kelamin() {
		$id = $this->input->post('id_jk');
		$this->db->where('id_jk', $id);
		$this->db->delete('blk_jk');
	}
	/* function ambil_id($id) {
	return $this->db->get_where('blk_jk', array('id_jk' => $id))->row();
	} */
	
	//==============================================Jenis Ujian======================================================//
	
	function tampil_data_jenis_ujian(){
		$sql = "SELECT * FROM blk_jenisujian";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_jenis_ujian(){
		
		$isi	= $this->input->post('isi');
		$data = array (
			'isi'		=>	$isi			
			);
		$this->db->insert('blk_jenisujian',$data);
	}
	function update_data_jenis_ujian() {
		$id = $this->input->post('id_jenisujian');
		$isi = $this->input->post('isi');
		$data = array(
			'isi' 		=> $isi
			);
		$this->db->where('id_jenisujian', $id);
		$this->db->update('blk_jenisujian', $data);
	}
	function hapus_data_jenis_ujian() {
		$id = $this->input->post('id_jenisujian');
		$this->db->where('id_jenisujian', $id);
		$this->db->delete('blk_jenisujian');
	}
	
	//============================================= Cluster / Profesi =======================================================//
	
	function tampil_data_cluster(){
		$sql = "SELECT * FROM blk_cluster_profesi";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_cluster(){
		
		$isi	= $this->input->post('isi');
		$data = array (
			'isi'		=>	$isi			
			);
		$this->db->insert('blk_cluster_profesi',$data);
	}
	function update_data_cluster() {
		$id = $this->input->post('id_cluster');
		$isi = $this->input->post('isi');
		$data = array(
			'isi' 		=> $isi
			);
		$this->db->where('id_cluster', $id);
		$this->db->update('blk_cluster_profesi', $data);
	}
	function hapus_data_cluster() {
		$id = $this->input->post('id_cluster');
		$this->db->where('id_cluster', $id);
		$this->db->delete('blk_cluster_profesi');
	}
	
	//============================================= Negara / Tujuan =======================================================//
	
	function tampil_data_negara_tujuan(){
		$sql = "SELECT * FROM blk_negara_tujuan";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_negara_tujuan(){
		
		$isi	= $this->input->post('isi');
		$data = array (
			'isi'		=>	$isi			
			);
		$this->db->insert('blk_negara_tujuan',$data);
	}
	function update_data_negara_tujuan() {
		$id = $this->input->post('id_negara_tujuan');
		$isi = $this->input->post('isi');
		$data = array(
			'isi' 		=> $isi
			);
		$this->db->where('id_negara_tujuan', $id);
		$this->db->update('blk_negara_tujuan', $data);
	}
	function hapus_data_negara_tujuan() {
		$id = $this->input->post('id_negara_tujuan');
		$this->db->where('id_negara_tujuan', $id);
		$this->db->delete('blk_negara_tujuan');
	}
	
	//============================================= EKS / NON =======================================================//
	
	function tampil_data_eks_non(){
		$sql = "SELECT * FROM blk_eks_non";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_eks_non(){
		
		$isi	= $this->input->post('isi');
		$data = array (
			'isi'		=>	$isi			
			);
		$this->db->insert('blk_eks_non',$data);
	}
	function update_data_eks_non() {
		$id = $this->input->post('id_eks_non');
		$isi = $this->input->post('isi');
		$data = array(
			'isi' 		=> $isi
			);
		$this->db->where('id_eks_non', $id);
		$this->db->update('blk_eks_non', $data);
	}
	function hapus_data_eks_non() {
		$id = $this->input->post('id_eks_non');
		$this->db->where('id_eks_non', $id);
		$this->db->delete('blk_eks_non');
	}
	
	//============================================= BAHASA =======================================================//
	
	function tampil_data_bahasa(){
		$sql = "SELECT * FROM blk_bahasa";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_bahasa(){
		
		$isi	= $this->input->post('isi');
		$data = array (
			'isi'		=>	$isi			
			);
		$this->db->insert('blk_bahasa',$data);
	}
	function update_data_bahasa() {
		$id = $this->input->post('id_bahasa');
		$isi = $this->input->post('isi');
		$data = array(
			'isi' 		=> $isi
			);
		$this->db->where('id_bahasa', $id);
		$this->db->update('blk_bahasa', $data);
	}
	function hapus_data_bahasa() {
		$id = $this->input->post('id_bahasa');
		$this->db->where('id_bahasa', $id);
		$this->db->delete('blk_bahasa');
	}
	
	//============================================= Hasil UJK =======================================================//
	
	function tampil_data_hasil_ujk(){
		$sql = "SELECT * FROM blk_hasil_ujk";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_hasil_ujk(){
		
		$isi	= $this->input->post('isi');
		$data = array (
			'isi'		=>	$isi			
			);
		$this->db->insert('blk_hasil_ujk',$data);
	}
	function update_data_hasil_ujk() {
		$id = $this->input->post('id_hasil_ujk');
		$isi = $this->input->post('isi');
		$data = array(
			'isi' 		=> $isi
			);
		$this->db->where('id_hasil_ujk', $id);
		$this->db->update('blk_hasil_ujk', $data);
	}
	function hapus_data_hasil_ujk() {
		$id = $this->input->post('id_hasil_ujk');
		$this->db->where('id_hasil_ujk', $id);
		$this->db->delete('blk_hasil_ujk');
	}
	
	//============================================= Lembaga LSP =======================================================//
	
	function tampil_data_lembaga_lsp(){
		$sql = "SELECT * FROM blk_lembaga_lsp";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_lembaga_lsp(){
		
		$nama	= $this->input->post('nama');
		$alamat	= $this->input->post('alamat');
		$bank	= $this->input->post('bank');
		$ket	= $this->input->post('ket');
		$data = array (
			'nama'		=>	$nama,			
			'alamat'	=>	$alamat,			
			'bank'		=>	$bank,			
			'ket'		=>	$ket			
			);
		$this->db->insert('blk_lembaga_lsp',$data);
	}
	function update_data_lembaga_lsp() {
		$id = $this->input->post('id_lembaga_lsp');
		$nama	= $this->input->post('nama');
		$alamat	= $this->input->post('alamat');
		$bank	= $this->input->post('bank');
		$ket	= $this->input->post('ket');
		$data = array(
			'nama'		=>	$nama,			
			'alamat'	=>	$alamat,			
			'bank'		=>	$bank,			
			'ket'		=>	$ket
			);
		$this->db->where('id_lembaga_lsp', $id);
		$this->db->update('blk_lembaga_lsp', $data);
	}
	function hapus_data_lembaga_lsp() {
		$id = $this->input->post('id_lembaga_lsp');
		$this->db->where('id_lembaga_lsp', $id);
		$this->db->delete('blk_lembaga_lsp');
	}

	//============================================= Nilai =======================================================//
	
	function tampil_data_nilai(){
		$sql = "SELECT * FROM blk_nilai";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_nilai(){
		
		$kode_nilai	= $this->input->post('kode_nilai');
		$nilai		= $this->input->post('nilai');
		$ket		= $this->input->post('ket');
		$data = array (
			'kode_nilai'		=>	$kode_nilai,			
			'nilai'				=>	$nilai,		
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_nilai',$data);
	}
	function update_data_nilai() {
		$id = $this->input->post('id_nilai');
		$kode_nilai	= $this->input->post('kode_nilai');
		$nilai		= $this->input->post('nilai');
		$ket		= $this->input->post('ket');
		$data = array(
			'kode_nilai'		=>	$kode_nilai,			
			'nilai'				=>	$nilai,			
			'keterangan'		=>	$ket
			);
		$this->db->where('id_nilai', $id);
		$this->db->update('blk_nilai', $data);
	}
	function hapus_data_nilai() {
		$id = $this->input->post('id_nilai');
		$this->db->where('id_nilai', $id);
		$this->db->delete('blk_nilai');
	}
	
	//============================================= Tempat PKL =======================================================//
	
	function tampil_data_tempat_pkl(){
		$sql = "SELECT * FROM blk_tempatpkl";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_tempat_pkl(){
		
		$nama_tempat	= $this->input->post('nama_tempat');
		$alamat	= $this->input->post('alamat');
		$data = array (
			'nama_tempat'		=>	$nama_tempat,			
			'alamat'			=>	$alamat,			
			);
		$this->db->insert('blk_tempatpkl',$data);
	}
	function update_data_tempat_pkl() {
		$id = $this->input->post('id_tempatpkl');
		$nama_tempat	= $this->input->post('nama_tempat');
		$alamat	= $this->input->post('alamat');
		$data = array(
			'nama_tempat'		=>	$nama_tempat,			
			'alamat'	=>	$alamat,
			);
		$this->db->where('id_tempatpkl', $id);
		$this->db->update('blk_tempatpkl', $data);
	}
	function hapus_data_tempat_pkl() {
		$id = $this->input->post('id_tempatpkl');
		$this->db->where('id_tempatpkl', $id);
		$this->db->delete('blk_tempatpkl');
	}


	//============================================= Setting Minggu =======================================================//
	
	function tampil_data_minggu(){
		$sql = "SELECT * FROM blk_minggu";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_minggu(){
		$kode_materi		= $this->input->post('kode_minggu');
		$nama_materi		= $this->input->post('minggu');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_minggu'		=>	$kode_materi,			
			'minggu'			=>	$nama_materi,		
			'ket'				=>	$ket		
			);
		$this->db->insert('blk_minggu',$data);
	}
	function update_data_minggu() {
		$id 				= $this->input->post('id_minggu');
		$kode_materi		= $this->input->post('kode_minggu');
		$nama_materi		= $this->input->post('minggu');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_minggu'		=>	$kode_materi,			
			'minggu'			=>	$nama_materi,		
			'ket'				=>	$ket			
			);
		$this->db->where('id_minggu', $id);
		$this->db->update('blk_minggu', $data);
	}
	function hapus_data_minggu() {
		$id = $this->input->post('id_minggu');
		$this->db->where('id_minggu', $id);
		$this->db->delete('blk_minggu');
	}

	//============================================= Setting Hari =======================================================//
		
	function tampil_data_hari(){
		$sql = "SELECT * FROM blk_hari";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_hari(){
		$kode_materi		= $this->input->post('kode_hari');
		$nama_materi		= $this->input->post('hari');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_hari'		=>	$kode_materi,			
			'hari'			=>	$nama_materi,		
			'ket'				=>	$ket		
			);
		$this->db->insert('blk_hari',$data);
	}
	function update_data_hari() {
		$id 				= $this->input->post('id_hari');
		$kode_materi		= $this->input->post('kode_hari');
		$nama_materi		= $this->input->post('hari');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_hari'		=>	$kode_materi,			
			'hari'			=>	$nama_materi,		
			'ket'				=>	$ket			
			);
		$this->db->where('id_hari', $id);
		$this->db->update('blk_hari', $data);
	}
	function hapus_data_hari() {
		$id = $this->input->post('id_hari');
		$this->db->where('id_hari', $id);
		$this->db->delete('blk_hari');
	}

	//============================================= Setting Jam =======================================================//
	
	function tampil_data_jam(){
		$sql = "SELECT * FROM blk_jam";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_jam(){
		$kode_materi		= $this->input->post('kode_jam');
		$nama_materi		= $this->input->post('jam');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_jam'		=>	$kode_materi,			
			'jam'			=>	$nama_materi,		
			'ket'				=>	$ket		
			);
		$this->db->insert('blk_jam',$data);
	}
	function update_data_jam() {
		$id 				= $this->input->post('id_jam');
		$kode_materi		= $this->input->post('kode_jam');
		$nama_materi		= $this->input->post('jam');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_jam'		=>	$kode_materi,			
			'jam'			=>	$nama_materi,		
			'ket'				=>	$ket			
			);
		$this->db->where('id_jam', $id);
		$this->db->update('blk_jam', $data);
	}
	function hapus_data_jam() {
		$id = $this->input->post('id_jam');
		$this->db->where('id_jam', $id);
		$this->db->delete('blk_jam');
	}

	//============================================= Setting Lokasi =======================================================//
	
	function tampil_data_lokasi(){
		$sql = "SELECT * FROM blk_lokasi";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_lokasi(){
		$kode_materi		= $this->input->post('kode_lokasi');
		$nama_materi		= $this->input->post('lokasi');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_lokasi'		=>	$kode_materi,			
			'lokasi'			=>	$nama_materi,		
			'ket'				=>	$ket		
			);
		$this->db->insert('blk_lokasi',$data);
	}
	function update_data_lokasi() {
		$id 				= $this->input->post('id_lokasi');
		$kode_materi		= $this->input->post('kode_lokasi');
		$nama_materi		= $this->input->post('lokasi');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_lokasi'		=>	$kode_materi,			
			'lokasi'			=>	$nama_materi,		
			'ket'				=>	$ket			
			);
		$this->db->where('id_lokasi', $id);
		$this->db->update('blk_lokasi', $data);
	}
	function hapus_data_lokasi() {
		$id = $this->input->post('id_lokasi');
		$this->db->where('id_lokasi', $id);
		$this->db->delete('blk_lokasi');
	}

	//============================================= Setting jadwal =======================================================//
	
	function tampil_data_jadwal(){
		$sql = "SELECT * FROM blk_akm_jadwal";
		$query = $this->db->query($sql);

		return $query->result();
	}

	function simpan_data_jadwal(){
		$kode_jadwal		= $this->input->post('kode_jadwal');
		$nama_jadwal		= $this->input->post('nama_jadwal');
		$minggu 			= $this->input->post('minggu');
		$data = array (
			'kode_jadwal'		=>	$kode_jadwal,
			'nama_jadwal'		=>	$nama_jadwal
		);
		
		if ($minggu  != NULL) {
			$data2 = array();
			for ($jk=0;$jk<count($minggu);$jk++) {
				for ($th=0;$th<7;$th++) {
					$data2[] = array (
						'minggu_id' 	=> $minggu[$jk],
						'hari_id'		=> $th+1,
						'kode_jadwal' 	=> $kode_jadwal
					);
				}
			}
			
		}
		//return $data2;
		$this->db->insert('blk_akm_jadwal',$data);
		$this->db->insert_batch('blk_akm_jadwaldetail',$data2);
	}

	function distinct_jadwal($kode) {
		return $this->db->query("SELECT distinct minggu_id FROM blk_akm_jadwaldetail where kode_jadwal='$kode'")->result();
	}

	function update_data_jadwal($kode) {
		$id 				= $this->input->post('id_jadwal');
		$nama_jadwal		= $this->input->post('jadwal');
		$minggu 			= $this->input->post('minggu');
		$data = array (
			'nama_jadwal'		=>	$nama_jadwal		
		);
		$this->db->where('id_jadwal', $id);
		$this->db->update('blk_akm_jadwal', $data);

		if ($minggu  != NULL) {
			$data2 = array();
			for ($jk=0;$jk<count($minggu);$jk++) {
				$mrow = $this->db->query("SELECT * FROM blk_akm_jadwaldetail where kode_jadwal='$kode' and minggu_id=$minggu[$jk]")->row();
				if ($mrow == NULL) {
					for ($th=0;$th<7;$th++) {
						$data2[] = array (
							'minggu_id' 	=> $minggu[$jk],
							'hari_id'		=> $th+1,
							'kode_jadwal' 	=> $kode
						);
					}
				}
			}
		}
		//return $data2;
		if (!empty($data2)) {
			$this->db->insert_batch('blk_akm_jadwaldetail', $data2); 
		}
		
		//$this->db->update('blk_akm_jadwal', $data, "id_jadwal = ".$id);
		
	}

	function hapus_data_jadwal() {
		$id = $this->input->post('id_jadwal');
		$this->db->where('id_jadwal', $id);
		$this->db->delete('blk_akm_jadwal');
	}
	function jadwal_minggu_get($kode) {
		return $this->db->query("SELECT distinct b.kode_minggu FROM blk_akm_jadwaldetail a JOIN blk_minggu b ON a.minggu_id=b.id_minggu where kode_jadwal='$kode'")->result();
	}

	function tampil_data_select($tbl) {
		$sql = "SELECT * FROM $tbl";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function tampil_data_jadwaldetail($pilihan) {
		$sql = "SELECT c.kode_minggu,b.* FROM blk_akm_jadwaldetail b JOIN blk_minggu c
		WHERE b.kode_jadwal='$pilihan' and b.minggu_id=c.id_minggu
		ORDER BY b.minggu_id";
		$query = $this->db->query($sql);

		return $query->result();
	}
/*
	function tampil_data_jadwaldetail($pilihan) {
		$sql = "SELECT c.kode_minggu,d.hari,a.kode_jadwal FROM blk_akm_jadwal a JOIN blk_akm_jadwaldetail b JOIN blk_minggu c JOIN blk_hari d
		WHERE b.kode_jadwal='$pilihan' AND b.minggu_id=c.id_minggu and b.hari_id=d.id_hari";
		$query = $this->db->query($sql);

		return $query->result();
	}
*/
	function simpan_data_jadwal_p_minggu() {
		$idj			= $this->input->post('id_jadwal');
		$idm			= $this->input->post('minggu');
		$data = array (
			array (
				'minggu_id'			=> $idm,
				'hari_id' 			=> '1',
				'kode_jadwal' 		=> $idj	
			),
			array (
				'minggu_id'			=> $idm,
				'hari_id' 			=> '2',
				'kode_jadwal' 		=> $idj	
			),
			array (
				'minggu_id'			=> $idm,
				'hari_id' 			=> '3',
				'kode_jadwal' 		=> $idj	
			),
			array (
				'minggu_id'			=> $idm,
				'hari_id' 			=> '4',
				'kode_jadwal' 		=> $idj	
			),
			array (
				'minggu_id'			=> $idm,
				'hari_id' 			=> '5',
				'kode_jadwal' 		=> $idj	
			),
			array (
				'minggu_id'			=> $idm,
				'hari_id' 			=> '6',
				'kode_jadwal' 		=> $idj	
			),	
			array (
				'minggu_id'			=> $idm,
				'hari_id' 			=> '7',
				'kode_jadwal' 		=> $idj	
			),
		);
		$this->db->insert_batch('blk_akm_jadwaldetail',$data);
	}

	function tampil_all_materi() {
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
		";
		$q = $this->db->query($query);
		return $q->result();
	}

	function select_per_content_minggu($id) {
		$query = "SELECT kode_minggu FROM blk_minggu where id_minggu=$id";
		$q = $this->db->query($query);
		return $q->row();
	}

	function select_per_content_hari($id) {
		$query = "SELECT hari FROM blk_hari where id_hari=$id";
		$q = $this->db->query($query);
		return $q->row();
	}

	function select_per_content_waktu($id) {
		$query = "SELECT waktu FROM blk_waktu where id_waktu=$id";
		$q = $this->db->query($query);
		return $q->row();
	}

	function select_per_content_materi($tbl,$fd,$mid) {
		$tbl2 		= 'blk_pelajaran_'.$fd;
		$field_id 	= 'id_'.$fd;
		$query = "SELECT $field_id as id,kode_materi,nama_materi FROM $tbl JOIN $tbl2 where $field_id=$mid";
		$q = $this->db->query($query);
		return $q->row();
	}

	function update_data_jadwaldetail($ukode,$sesiv) {
		$idjd 				= $this->input->post('id_jadwal_pelatihan');
		$s1mm				= $this->input->post('s1_m');
		$s2mm				= $this->input->post('s2_m');
		$s3mm				= $this->input->post('s3_m');
		$s4mm				= $this->input->post('s4_m');
		if ($sesiv == 1) {
			$s1m_ex = '';
			$s1t_ex = '';
			if ($this->input->post('s1_w') != NULL) {
				$s1_w = $this->input->post('s1_w');
			} else {
				$s1_w = '';
			}
			if ($s1m_ex == ',' || $s1t_ex == ',') {
				$s1m_ex = '';
				$s1t_ex = '';
			}
			if ($s1mm != NULL) {
				for ($jk=0;$jk<count($s1mm);$jk++) {
					$exp_1[$jk] 		= explode("||", $s1mm[$jk]);
					$s1m_ex 			= $exp_1[$jk][0].','.$s1m_ex;
					$s1t_ex 			= $exp_1[$jk][1].','.$s1t_ex;
				}
			}
			$s1m 				= substr($s1m_ex,0,-1);
			$s1w 				= $s1_w;
			$s1t 				= substr($s1t_ex,0,-1);
			$data = array();
			$data = array (
					'sesi1_materi_id' 	=> $s1m,
					'sesi1_waktu_id' 	=> $s1w,
					'sesi1_tabel_id' 	=> $s1t,
			);
		} elseif ($sesiv == 2) {
			$s2m_ex = '';
			$s2t_ex = '';
			if ($this->input->post('s2_w') != NULL) {
				$s2_w = $this->input->post('s2_w');
			} else {
				$s2_w = '';
			}
			if ($s2m_ex == ',' || $s2t_ex == ',') {
				$s2m_ex = '';
				$s2t_ex = '';
			}
			if ($s2mm != NULL) {
				for ($jk=0;$jk<count($s2mm);$jk++) {
					$exp_2[$jk] 		= explode("||", $s2mm[$jk]);
					$s2m_ex 			= $exp_2[$jk][0].','.$s2m_ex;
					$s2t_ex 			= $exp_2[$jk][1].','.$s2t_ex;
				}
			}
			$s2m 				= substr($s2m_ex,0,-1);
			$s2w 				= $s2_w;
			$s2t 				= substr($s2t_ex,0,-1);
			$data = array();
			$data = array (
					'sesi2_materi_id' 	=> $s2m,
					'sesi2_waktu_id' 	=> $s2w,
					'sesi2_tabel_id' 	=> $s2t
			);
		} elseif ($sesiv == 3) {
			$s3m_ex = '';
			$s3t_ex = '';
			if ($this->input->post('s3_w') != NULL) {
				$s3_w = $this->input->post('s3_w');
			} else {
				$s3_w = '';
			}
			if ($s3m_ex == ',' || $s3t_ex == ',') {
				$s3m_ex = '';
				$s3t_ex = '';
			}
			if ($s3mm != NULL) {
				for ($jk=0;$jk<count($s3mm);$jk++) {
					$exp_3[$jk] 		= explode("||", $s3mm[$jk]);
					$s3m_ex 			= $exp_3[$jk][0].','.$s3m_ex;
					$s3t_ex 			= $exp_3[$jk][1].','.$s3t_ex;
				}
			}
			$s3m 				= substr($s3m_ex,0,-1);
			$s3w 				= $s3_w;
			$s3t 				= substr($s3t_ex,0,-1);
			$data = array();
			$data = array (
					'sesi3_materi_id' 	=> $s3m,
					'sesi3_waktu_id' 	=> $s3w,
					'sesi3_tabel_id' 	=> $s3t
			);
		} elseif ($sesiv == 4) {
			$s4m_ex = '';
			$s4t_ex = '';
			if ($this->input->post('s4_w') != NULL) {
				$s4_w = $this->input->post('s4_w');
			} else {
				$s4_w = '';
			}
			if ($s4m_ex == ',' || $s4t_ex == ',') {
				$s4m_ex = '';
				$s4t_ex = '';
			}
			if ($s4mm != NULL) {
				for ($jk=0;$jk<count($s4mm);$jk++) {
					$exp_4[$jk] 		= explode("||", $s4mm[$jk]);
					$s4m_ex 			= $exp_4[$jk][0].','.$s4m_ex;
					$s4t_ex 			= $exp_4[$jk][1].','.$s4t_ex;
				}
			}
			$s4m 				= substr($s4m_ex,0,-1);
			$s4w 				= $s4_w;
			$s4t 				= substr($s4t_ex,0,-1);
			$data = array();
			$data = array (
					'sesi4_materi_id' 	=> $s4m,
					'sesi4_waktu_id' 	=> $s4w,
					'sesi4_tabel_id' 	=> $s4t
			);
		} 

		//return $data;
		$this->db->where('id_jadwal_pelatihan', $idjd);
		$this->db->update('blk_akm_jadwaldetail', $data);
	}

	function tampil_data_select23($primer) {
		$tbl = "blk_pelajaran_".$primer;
		$id = "id_".$primer;
		$sql = "SELECT kode_materi, nama_materi, concat( $id,'||$primer') as id FROM $tbl";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function valid_if_there($tbl, $sesi, $idm, $id_akm, $hari, $minggu, $kode) {
		$tblx = "blk_pelajaran_".$tbl;
		$idx  = "id_".$idm;
		$sesim = $sesi.'_materi_id';
		$sesit = $sesi.'_tabel_id';
		$q = "SELECT concat( $sesim,'||$sesit') as id FROM $tblx WHERE $idx=$id_akm and hari_id=$hari and minggu_id=$minggu and kode_jadwal=$kode" /*and $sesim not null and $sesit not null*/;
		$data = $this->db->query($q);
		return $data->result();
	}

	function tampil_data_select_dist($tbl) {
		$sql = "SELECT distinct minggu_id FROM $tbl";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function detect_minggu($minggu, $kode) {
		$this->db->where('minggu_id', $minggu);
		$this->db->where('kode_jadwal', $kode);
		$this->db->from('blk_akm_jadwaldetail');
		$data = $this->db->get();
		return $data->row();
		/*
		if ($data != NULL) {
			return TRUE;
		} else {
			return FALSE;
		}*/

	}
/*
	function valid_if_there22($tbl, $sesi, $idm, $idt) {
		$sesim = $sesi.'_materi_id';
		$sesit = $sesi.'_tabel_id';
		$q = "SELECT concat( $sesim,'||$sesit') as id FROM $tbl WHERE $sesim=$idm and $sesit=$idt";
		$data = $this->db->query($q);
		return $data->result();
	}

	function get_valid($tbl, $sesi, $minggu, $hari) {
		$sesim = $sesi.'_materi_id';
		$sesit = $sesi.'_tabel_id';
		$q = "SELECT concat( $sesim,'||$sesit') as id FROM $tbl WHERE $sesim=$idm and $sesit=$idt";
		$data = $this->db->query($q);
		return $data;
	}*/

/*
	function tampil_data_jam2() {
		$query ="SELECT * FROM blk_jam";
		$q = $this->db->query($query);
		return $q->result();
	}*/

	//============================================= Setting Berat =======================================================//
	
	function tampil_data_berat(){
		$sql = "SELECT * FROM blk_berat";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_berat(){
		$kode_materi		= $this->input->post('kode_berat');
		$nama_materi		= $this->input->post('berat');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_berat'	=>	$kode_materi,			
			'berat'			=>	$nama_materi,		
			'ket'			=>	$ket		
			);
		$this->db->insert('blk_berat',$data);
	}
	function update_data_berat() {
		$id 				= $this->input->post('id_berat');
		$kode_materi		= $this->input->post('kode_berat');
		$nama_materi		= $this->input->post('berat');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_berat'	=>	$kode_materi,			
			'berat'			=>	$nama_materi,		
			'ket'			=>	$ket			
			);
		$this->db->where('id_berat', $id);
		$this->db->update('blk_berat', $data);
	}
	function hapus_data_berat() {
		$id = $this->input->post('id_berat');
		$this->db->where('id_berat', $id);
		$this->db->delete('blk_berat');
	}

	//============================================= Setting Waktu =======================================================//
	
	function tampil_data_waktu(){
		$sql = "SELECT * FROM blk_waktu";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_waktu(){
		$kode_materi		= $this->input->post('kode_waktu');
		$nama_materi		= $this->input->post('waktu');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_waktu'	=>	$kode_materi,			
			'waktu'			=>	$nama_materi,		
			'ket'			=>	$ket		
			);
		$this->db->insert('blk_waktu',$data);
	}
	function update_data_waktu() {
		$id 				= $this->input->post('id_waktu');
		$kode_materi		= $this->input->post('kode_waktu');
		$nama_materi		= $this->input->post('waktu');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_waktu'	=>	$kode_materi,			
			'waktu'			=>	$nama_materi,		
			'ket'			=>	$ket			
			);
		$this->db->where('id_waktu', $id);
		$this->db->update('blk_waktu', $data);
	}
	function hapus_data_waktu() {
		$id = $this->input->post('id_waktu');
		$this->db->where('id_waktu', $id);
		$this->db->delete('blk_waktu');
	}

	//============================================= Setting Sektor =======================================================//
	
	function tampil_data_sektor(){
		$sql = "SELECT * FROM datasektor_nt";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_sektor(){
		$kode_materi		= $this->input->post('kode_sektor');
		$nama_materi		= $this->input->post('sektor');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_sektor'	=>	$kode_materi,			
			'sektor'		=>	$nama_materi,		
			'ket'			=>	$ket		
			);
		$this->db->insert('datasektor_nt',$data);
	}
	function update_data_sektor() {
		$id 				= $this->input->post('id_sektor');
		$kode_materi		= $this->input->post('kode_sektor');
		$nama_materi		= $this->input->post('sektor');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_sektor'	=>	$kode_materi,			
			'sektor'		=>	$nama_materi,		
			'ket'			=>	$ket			
			);
		$this->db->where('id_sektor', $id);
		$this->db->update('datasektor_nt', $data);
	}
	function hapus_data_sektor() {
		$id = $this->input->post('id_sektor');
		$this->db->where('id_sektor', $id);
		$this->db->delete('datasektor_nt');
	}

}
?>