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

    function detail_personal($id) {
        $sql = "SELECT * FROM personal WHERE id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }
    /*
    function tampil_data_personal() {
        $sektor = $this->session->userdata("sektor");
        if(empty($sektor)) {
            $sql = "SELECT *,
                    COUNT((SELECT id_biodata FROM absensi WHERE jenis='Hadir')) AS jumlah_hadir,
                    COUNT((SELECT id_biodata FROM absensi WHERE jenis='Sakit')) AS jumlah_sakit, 
                    COUNT((SELECT id_biodata FROM absensi WHERE jenis='Ijin')) AS jumlah_ijin, 
                    COUNT((SELECT id_biodata FROM absensi WHERE jenis='Tanpa Keterangan')) AS jumlah_tk
                    FROM personal";
        } else {
            $sql = "SELECT *,
                    COUNT((SELECT id_biodata FROM absensi WHERE LEFT(id_biodata,2) AND jenis='Hadir')) AS jumlah_hadir,
                    COUNT((SELECT id_biodata FROM absensi WHERE LEFT(id_biodata,2) AND jenis='Sakit')) AS jumlah_sakit, 
                    COUNT((SELECT id_biodata FROM absensi WHERE LEFT(id_biodata,2) AND jenis='Ijin')) AS jumlah_ijin, 
                    COUNT((SELECT id_biodata FROM absensi WHERE LEFT(id_biodata,2) AND jenis='Tanpa Keterangan')) AS jumlah_tk
                    FROM personal WHERE LEFT(id_biodata,2) = '$sektor'";
        }
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }*/

    function detail_hadir($id) {
        $sql = "SELECT * FROM absensi WHERE jenis='Hadir' AND id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil;
    }

    function detail_sakit($id) {
        $sql = "SELECT * FROM absensi WHERE jenis='Sakit' AND id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil;
    }

    function detail_ijin($id) {
        $sql = "SELECT * FROM absensi WHERE jenis='Ijin' AND id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil;
    }

    function detail_tk($id) {
        $sql = "SELECT * FROM absensi WHERE jenis='Tanpa Keterangan' AND id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil;
    }

    function tampil_data_belumabsen() {
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
            $sql = "SELECT * FROM absensi WHERE jenis='Hadir'";
        } else {
            $sql = "SELECT * FROM absensi WHERE jenis='Hadir' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn' AND LEFT(id_biodata,2) = '$sektor'";
        }
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function get_sakit() {
        $buln = $this->input->post("bulan");
        $tahn = $this->input->post("tahun");
        $sektor = $this->session->userdata("sektor");
        if(empty($sektor)) {
            $sql = "SELECT * FROM absensi WHERE jenis='Sakit'";
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
            $sql = "SELECT * FROM absensi WHERE jenis='Ijin'";
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
            $sql = "SELECT * FROM absensi WHERE jenis='Tanpa Keterangan'";
        } else {
            $sql = "SELECT * FROM absensi WHERE jenis='Tanpa Keterangan' AND SUBSTR(tanggal_abs,6,2) = '$buln' AND LEFT(tanggal_abs,4) = '$tahn' AND LEFT(id_biodata,2) = '$sektor'";
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

    function tambahhadir($id) {
        date_default_timezone_set('Asia/Jakarta');
        $sql = Dbs::load("SELECT * FROM personal WHERE id_personal='$id'");
        $hasl = mysqli_fetch_row($sql);
        $idbi = $hasl[1];
        $nama = $hasl[5];
        $jeni = "Hadir";
        $tggl = $this->session->userdata("tanggal");
        $jens = $this->session->userdata("jenis");
        if($jens == "Pagi") {
            $wksl = "07:00:00";
        } else {
            $wksl = "18:00:00";
        }
        $wakt = date('H:m:s');
        $sels = strtotime($wksl) - strtotime($wakt);
        if($sels < 0) {
            $hasl = $sels - $sels - $sels;
            $menit = $hasl / 60;
            $detik = $hasl - (floor($menit) * 60);
            $ketr = "Telat ".floor($menit)." menit, ".$detik." detik";
        } else {
            $hasl = $sels;
            $menit = $hasl / 60;
            $detik = $hasl - (floor($menit) * 60);
            $ketr = "Datang kurang ".floor($menit)." menit, ".$detik." detik";
        }
        $data = array(
            'id_absensi' => '',
            'id_biodata' => $idbi,
            'nama' => $nama,
            'jenis' => $jeni,
            'keterangan' => $ketr,
            'tanggal_abs' => $tggl,
            'waktu' => $wakt,
            'jenis_abs' => $jens,
            );
        return $this->db->insert('absensi', $data);
    }

    function tambahtidakhadir($id) {
        date_default_timezone_set('Asia/Jakarta');
        $idbi = $this->input->post('biodata');
        $nama = $this->input->post('nama');
        $jeni = $this->input->post('jenis');
        $ketr = $this->input->post('keterangan');
        $tggl = $this->session->userdata("tanggal");
        $jens = $this->session->userdata("jenis");
        $data = array(
            'id_absensi' => '',
            'id_biodata' => $idbi,
            'nama' => $nama,
            'jenis' => $jeni,
            'keterangan' => $ketr,
            'tanggal_abs' => $tggl,
            'waktu' => NULL,
            'jenis_abs' => $jens,
            );
        return $this->db->insert('absensi', $data);
    }

    function ambil_id($id) {
        return $this->db->get_where('personal', array('id_biodata' => $id))->row();
    }
}