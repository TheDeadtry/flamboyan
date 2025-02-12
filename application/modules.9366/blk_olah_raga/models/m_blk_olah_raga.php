<?php
class M_blk_olah_raga extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
	function tampil_data_olah_raga($tgl,$nodaftar) {
		$sql = "SELECT a.id_penilaian_olah_raga as idpgl, 
		a.keterangan as ket,d.kode_materi as kode, a.tgl as tgl, b.id_instruktur, d.id_olah_raga,
		d.nama_materi as nama,b.nama as instruktur,a.nilai_id as nt, b.kode_instruktur as kodinst
		from blk_penilaian_olah_raga a JOIN blk_instruktur b JOIN blk_pelajaran_olah_raga d 
		where a.penilai_id=b.id_instruktur and a.olah_raga_id=d.id_olah_raga and a.no_daftar='$nodaftar' and a.tgl='$tgl' and tipe=1 
		order by a.tgl desc, a.penilai_id desc
		";
        $query = $this->db->query($sql);
	    return $query->result();
	} 
	/* -- BACKUP
	function tampil_data_olah_raga($nodaftar) {
		$sql = "SELECT a.id_penilaian_olah_raga as idpgl,
		a.tgl as tgl,a.keterangan as ket,d.kode_materi as kode,
		d.nama_materi as nama,b.nama as instruktur,a.nilai_tulis_id as nt,a.nilai_praktik_id as np
		from blk_penilaian_olah_raga a JOIN blk_instruktur b JOIN blk_pelajaran_olah_raga d 
		where a.penilai_id=b.id_instruktur and a.olah_raga_id=d.id_olah_raga and a.no_daftar='$nodaftar' order by a.tgl desc, a.penilai_id desc";
        $query = $this->db->query($sql);
	    return $query->result();
	} */

 	function get_nilai($id) { 
 		$sql = "SELECT kode_nilai, id_nilai FROM blk_nilai where id_nilai='$id'";
 		$query = $this->db->query($sql);
 		return $query->row_array();
 	}

 	function tampil_data_blk_personal($pilihan){
		$sql = "SELECT *,personalblk.nama as namanya,blk_pemilik.isi as pemilikx, blk_pemilik.negara as negarapemilikx,datasponsor.kode_sponsor as kdsponsor
		FROM personalblk 
		LEFT JOIN blk_pemilik
		ON personalblk.pemilik=blk_pemilik.id_pemilik 
		LEFT JOIN datasponsor
		ON personalblk.sponsor=datasponsor.nama
		WHERE personalblk.nodaftar='$pilihan'";
        $query = $this->db->query($sql);
		return $query->row_array();
	} 

	function tampil_data_select($tbl) {
		$sql = "SELECT * FROM $tbl";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function tambah_nilai($data) {
		$this->db->insert('blk_penilaian_olah_raga',$data);
	}

	function tampil_group() {
		$sql = "SELECT MIN(id_penilaian_olah_raga) AS id, tgl
		FROM blk_penilaian_olah_raga
		WHERE tipe=1
		GROUP BY tgl order by tgl desc";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function tampil_data_laundry($tgl,$id) {
		$sql = "SELECT *
		FROM blk_penilaian_olah_raga
		WHERE tgl='$tgl' and no_daftar='$id' and tipe=1
		order by tgl desc";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function tampil_data_count($tgl,$id) {
		$sql = "SELECT count(*) as total
		from blk_penilaian_olah_raga a JOIN blk_instruktur b JOIN blk_pelajaran_olah_raga d 
		where a.penilai_id=b.id_instruktur and a.olah_raga_id=d.id_olah_raga 
		and a.no_daftar='$id' and a.tgl='$tgl' and tipe=1";
		$query = $this->db->query($sql);
		return $query->row();
	}

	function tampil_data_count2($tgl,$id,$inst) {
		$sql = "SELECT count(*) as total2
		from blk_penilaian_olah_raga a JOIN blk_instruktur b JOIN blk_pelajaran_olah_raga d 
		where a.penilai_id=b.id_instruktur and a.olah_raga_id=d.id_olah_raga 
		and a.no_daftar='$id' and a.tgl='$tgl' and a.penilai_id='$inst' and tipe=1";
		$query = $this->db->query($sql);
		return $query->row();
	}

	function ubah_nilai($data,$id) {
		$this->db->where('id_penilaian_olah_raga', $id);
		$this->db->update('blk_penilaian_olah_raga', $data);
	}

	function hapus_nilai() {
		$id = $this->input->post('tatagraha_id');
		$this->db->where('id_penilaian_olah_raga', $id);
		$this->db->delete('blk_penilaian_olah_raga');
	}

	function ambil_kali($field,$nodaftar,$materi) {
		$sql = "SELECT count(*) as kali FROM blk_penilaian_olah_raga where tipe=1 and no_daftar='$nodaftar' and olah_raga_id='$materi' and '$field' IS NOT NULL";
		$q = $this->db->query($sql);
		return $q->row();
	}

	function ambil_rata($nodaftar,$materi) {
		$sql = "SELECT avg(b.nilai) as nilai FROM blk_penilaian_olah_raga a JOIN blk_nilai b where tipe=1 and a.nilai_id=b.id_nilai and a.no_daftar='$nodaftar' and a.olah_raga_id='$materi'";
		$q = $this->db->query($sql);
		return $q->row();
	}
	function count_row($tbl,$nodaftar,$field) {
		$sql = "SELECT count(nilai_id) as total FROM $tbl where tipe=1 and no_daftar='$nodaftar' and '$field' IS NOT NULL";
		$query = $this->db->query($sql);
		return $query->row();
	}

	function sum_row($tbl,$nodaftar,$field) {
		$a = 'a.'.$field;
		$sql = "SELECT avg(b.nilai) as total FROM $tbl a JOIN blk_nilai b where tipe=1 and no_daftar='$nodaftar' and $a=b.id_nilai";
		$query = $this->db->query($sql);
		return $query->row();
	}

}
?>