<?php
class M_blk_rekapitulasi extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
	function tampil_data_graha_laundry($tgl,$nodaftar) {
		$sql = "SELECT a.id_penilaian_graha_laundry as idpgl, 
		a.keterangan as ket,d.kode_materi as kode, a.tgl as tgl, b.id_instruktur, d.id_graha_laundry,
		d.nama_materi as nama,b.nama as instruktur,a.nilai_a_id as nt,a.nilai_b_id as np, b.kode_instruktur as kodinst,
		e.kode_minggu as mgid, e.id_minggu
		from blk_penilaian_graha_laundry a JOIN blk_instruktur b JOIN blk_pelajaran_graha_laundry d JOIN blk_minggu e 
		where a.penilai_id=b.id_instruktur and a.graha_laundry_id=d.id_graha_laundry and a.no_daftar='$nodaftar' and a.tgl='$tgl' and tipe=1 
		and a.minggu_id=e.id_minggu
		order by a.minggu_id, a.tgl desc, a.penilai_id desc
		";
        $query = $this->db->query($sql);
	    return $query->result();
	} 

	function tampil_personal() {
		$sql = "SELECT a.nodaftar,a.negara,a.nama,a.sponsor,b.* FROM personalblk a JOIN personal b where a.nodaftar=b.id_biodata and a.nodaftar like 'FI%'";
		$q = $this->db->query($sql);
		return $q->result();
	}

	function count() {
		$sql = "SELECT count(*) as total FROM blk_penilaian_tata_boga";
		$q = $this->db->query($sql);
		return $q->row();
	}

	function select_tbl($tbl,$tbl2,$field_where,$field_join) {
		$ajoin = $tbl.'.'.$field_where;
		$bjoin = $tbl2.'.'.$field_join;
		$sql = "SELECT * FROM $tbl JOIN $tbl2 where $ajoin=$bjoin";
		$q = $this->db->query($sql);
		return $q->result();
	}
/*
	function select_distinct($tbl,$field,$field_where,$key_like) {
		$sql = "SELECT distinct($field) FROM $tbl where $field_where like '%$key_like%'";
		$q = $this->db->query($sql);
		return $q->result();
	}

	function select_like($tbl, $select, $field_where, $key_like, $type, $order_field=1, $order_rule='asc') { 	// $type = 'before' => '%AAA' atau 
		$this->db->select($select);											// $type = 'after' => 'AAA%' atau 
		$this->db->from($tbl);												// $type = 'both' => '%AAA%'
		$this->db->like($field_where, $key_like, $type);
		//$this->db->order_by($order_field, $order_rule);
		$query = $this->db->get();
		return $query->result();
	}

	function get_tbl_finger() {
		$query = "SELECT a.*,b.nama as blknama FROM tblattendance a JOIN personal b where a.idblk=b.id_biodata";
		$sql = $this->db->query($query);
		return $sql->result();
	}
*/
	function distinct($tbl, $tbl2, $sektor) {
		if ($sektor == 'pabrik') {
			$q = "SELECT DISTINCT a.idblk,b.nodaftar,b.nama as hk_nama, c.nama as personal_nama FROM $tbl a JOIN $tbl2 b LEFT JOIN personal c ON a.idblk=c.id_biodata where (b.nodaftar like 'FF%' or b.nodaftar like 'MF%') and a.idblk=b.nodaftar";
		} elseif ($sektor == 'informal') {
			$q = "SELECT DISTINCT a.idblk,b.nodaftar,b.nama as hk_nama, c.nama as personal_nama FROM $tbl a JOIN $tbl2 b LEFT JOIN personal c ON a.idblk=c.id_biodata where (b.nodaftar like 'FI%' or b.nodaftar like 'MI%') and a.idblk=b.nodaftar";
		} elseif ($sektor == 'pjompo') {
			$q = "SELECT DISTINCT a.idblk,b.nodaftar,b.nama as hk_nama, c.nama as personal_nama FROM $tbl a JOIN $tbl2 b LEFT JOIN personal c ON a.idblk=c.id_biodata where a.idblk=b.nodaftar and b.nodaftar like 'JP%'";
		} else {
			return false;
		}
		$q2 = $this->db->query($q);
		return $q2->result();
	}

	function get_tgl($tbl,$tgl) {
		$hj = "SELECT * FROM $tbl where dteDate=$tgl";
		$q = $this->db->query($hj);
		return $q->result();
	}

	function get_finger_time($tbl,$id,$date,$waktu) {
		$qq = "SELECT tmeTime  FROM $tbl where idblk='$id' and dteDate='$date' and waktu='$waktu'";
		$q2 = $this->db->query($qq);
		return $q2->row();
	}

	function select($tbl, $order_field=NULL, $order_rule=NULL, $select=NULL) { // $select = '*';
		if ($select != NULL) {											// $order_rule = 'asc' atau 'desc' atau 'random'
			$this->db->select($select);
		}
		if ($order_field != NULL && $order_rule == NULL) {
			$this->db->order_by($order_field);
		} elseif ($order_field != NULL && $order_rule != NULL) {
			$this->db->order_by($order_field, $order_rule);
		}
		$this->db->from($tbl);
		$query = $this->db->get();
		return $query->result();
	}

	function select_count($tbl) {
        return $this->db->count_all($tbl);
    }

    function get_count($tbl,$nodaftar,$bln) {
    	$query1 = "SELECT count(*) as tot FROM $tbl where idblk='$nodaftar' and dteDate like '%$bln'";
    	$q = $this->db->query($query1);
    	return $q->row();
    }

    //--------------------------------------------------------- DATA PEMBINAAN ---------------------------------//

	function pemb_count($tbl,$no) {
		$sql = "SELECT count(*) as total FROM $tbl where nodaftar='$no'";
		$q = $this->db->query($sql);
		return $q->row();
	}

	function pemb_count2($tbl,$no) {
		$sql = "SELECT count(*) as total FROM $tbl where id_personalblk='$no'";
		$q = $this->db->query($sql);
		return $q->row();
	}

	function rata($id_pkl, $abj){
		$sql = "SELECT AVG(n.nilai) as rata FROM blk_penilaianpkl p JOIN blk_nilai n ON p.id_nilai=n.id_nilai JOIN blk_materipkl m ON p.id_materipkl=m.id_materipkl JOIN blk_aspekpkl a ON m.id_aspek=a.id_aspek WHERE a.abjad='$abj' and p.id_pkl='$id_pkl' GROUP BY m.id_aspek";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function rata2($id_pkl){
		$sql = "SELECT AVG(n.nilai) as rata2 FROM blk_penilaianpkl p JOIN blk_nilai n ON p.id_nilai=n.id_nilai WHERE p.id_pkl='$id_pkl'";
		$query = $this->db->query($sql);
		return $query->row();
	}

    function select_adv($query) {
    	$que = $query;
    	$hue = $this->db->query($que);
    	return $hue->result();
    }

    function select_row($query) {
    	$que = $query;
    	$hue = $this->db->query($que);
    	return $hue->row();
    }

    function select_kb() {
    	$que = "SELECT distinct
    	a.nodaftar,
    	b.nama
    	FROM blk_kb a 
    	JOIN personal b
    	WHERE a.nodaftar=b.id_biodata";
    	$hue = $this->db->query($que);
    	return $hue->result();
    }

    function select_ijin_inap() {
    	$que = "SELECT distinct
    	a.nodaftar,
    	b.nama
    	FROM blk_izin_inap a 
    	JOIN personal b
    	WHERE a.nodaftar=b.id_biodata";
    	$hue = $this->db->query($que);
    	return $hue->result();
    }

    function select_ijin_keluar() {
    	$que = "SELECT distinct
    	a.nodaftar,
    	b.nama
    	FROM blk_izin_keluar a 
    	JOIN personal b
    	WHERE a.nodaftar=b.id_biodata";
    	$hue = $this->db->query($que);
    	return $hue->result();
    }

    function select_ijin_pulang() {
    	$que = "SELECT distinct
    	a.nodaftar,
    	b.nama
    	FROM blk_izin_pulang a 
    	JOIN personal b
    	WHERE a.nodaftar=b.id_biodata";
    	$hue = $this->db->query($que);
    	return $hue->result();
    }

    function select_ijin_tidak_hadir() {
    	$que = "SELECT distinct
    	a.nodaftar,
    	b.nama
    	FROM blk_izin_tdk_hadir a 
    	JOIN personal b
    	WHERE a.nodaftar=b.id_biodata";
    	$hue = $this->db->query($que);
    	return $hue->result();
    }

    function select_pkl() {
    	$que = "SELECT distinct
    	a.id_personalblk,
    	b.nama
    	FROM blk_hasilpkl a 
    	JOIN personal b
    	WHERE a.id_personalblk=b.id_biodata";
    	$hue = $this->db->query($que);
    	return $hue->result();
    }
}
?>