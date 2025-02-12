<?php
class M_absensi extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function tampil_data_absensi() {
        $sql = "SELECT * FROM absensi";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_data_personal() {
        $sektor = $this->session->userdata("sektor");
        if(empty($sektor)) {
            $sql = "SELECT * FROM personal";
        } else {
            $sql = "SELECT * FROM personal WHERE LEFT(id_biodata,2) = '$sektor'";
        }
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_absensi_detail() {
        $buln = $this->input->post("bulan");
        $tahn = $this->input->post("tahun");
        $sektor = $this->session->userdata("sektor");
        if(empty($sektor)) {
            $sql = "SELECT * FROM absensi WHERE SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn'";
        } else {
            $sql = "SELECT * FROM absensi WHERE SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn' AND LEFT(id_biodata,2) = '$sektor'";
        }
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }

    function tampil_data_tahun() {
        $sql = "SELECT DISTINCT LEFT(tanggal_abs,4) as tanggal_abs FROM absensi";
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }

    function get_masuk() {
        $buln = $this->input->post("bulan");
        $tahn = $this->input->post("tahun");
        $sektor = $this->session->userdata("sektor");
        if(empty($sektor)) {
            $sql = "SELECT * FROM absensi WHERE jenis='Masuk' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn'";
        } else {
            $sql = "SELECT * FROM absensi WHERE jenis='Masuk' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn' AND LEFT(id_biodata,2) = '$sektor'";
        }
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function get_sakit() {
        $buln = $this->input->post("bulan");
        $tahn = $this->input->post("tahun");
        $sektor = $this->session->userdata("sektor");
        if(empty($sektor)) {
            $sql = "SELECT * FROM absensi WHERE jenis='Sakit' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn'";
        } else {
            $sql = "SELECT * FROM absensi WHERE jenis='Sakit' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn' AND LEFT(id_biodata,2) = '$sektor'";
        }
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function get_ijin() {
        $buln = $this->input->post("bulan");
        $tahn = $this->input->post("tahun");
        $sektor = $this->session->userdata("sektor");
        if(empty($sektor)) {
            $sql = "SELECT * FROM absensi WHERE jenis='Ijin' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn'";
        } else {
            $sql = "SELECT * FROM absensi WHERE jenis='Ijin' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn' AND LEFT(id_biodata,2) = '$sektor'";
        }
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function get_alpha() {
        $buln = $this->input->post("bulan");
        $tahn = $this->input->post("tahun");
        $sektor = $this->session->userdata("sektor");
        if(empty($sektor)) {
            $sql = "SELECT * FROM absensi WHERE jenis='Tidak Masuk' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn'";
        } else {
            $sql = "SELECT * FROM absensi WHERE jenis='Tidak Masuk' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn' AND LEFT(id_biodata,2) = '$sektor'";
        }
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function tambah($id) {
    	date_default_timezone_set('Asia/Jakarta');
        $idbi = $this->input->post('id_biodata');
    	$nama = $this->input->post('nama');
        $jens = $this->input->post('jenis');
        $ketr = $this->input->post('keterangan');
        $tgg1 = $this->input->post('tanggal');
        $tggl = date("Y-m-d", strtotime($tgg1));
    	$wakt = date('H:m:s');
        $data = array(
            'id_absensi' => '',
            'id_biodata' => $idbi,
            'nama' => $nama,
            'jenis' => $jens,
            'keterangan' => $ketr,
            'tanggal_abs' => $tggl,
            'waktu' => $wakt,
            );
        return $this->db->insert('absensi', $data);
    }

    function ambil_id($id) {
        return $this->db->get_where('personal', array('id_biodata' => $id))->row();
    }
}