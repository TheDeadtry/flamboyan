<?php
class M_ujianwanita extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function tampil_data_ujian() {
        $sql = "SELECT * FROM dataujian WHERE status='Wanita Informal'";
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }

    function tampil_data_personal() {
        $sql = "SELECT * FROM personal";
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }

    function tampil_data_nilai() {
        $sql = "SELECT personal.nama, dataujian.nama AS ujian, ujian.nilai1, ujian.nilai2, ujian.nilai3, ujian.keterangan, ujian.tanggal, ujian.status 
                FROM ujian 
                JOIN personal ON ujian.id_biodata = personal.id_biodata 
                JOIN dataujian ON ujian.jenis_ujian = dataujian.id_jenis
                WHERE ujian.status = 'Wanita Informal'";
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }

    function tampil_detail_nilai() {
        $jens = $this->input->post('jenis');
        $tggl = date("Y.m.d", strtotime($this->input->post('tanggal')));
        $sql = "SELECT personal.nama, dataujian.nama as ujian, ujian.nilai1, ujian.nilai2, ujian.nilai3, ujian.keterangan, ujian.tanggal, ujian.status 
                FROM ujian 
                JOIN personal ON ujian.id_biodata = personal.id_biodata 
                JOIN dataujian ON ujian.jenis_ujian = dataujian.id_jenis 
                WHERE ujian.jenis_ujian = '$jens' AND ujian.tanggal = '$tggl' AND ujian.status = 'Wanita Informal'";
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }

    function simpan_data_ujian() {
        $nama = $this->input->post('nama');
        $stts = $this->input->post('status');
        $tggl = date("Y.m.d", strtotime($this->input->post('tanggal')));
        $data = array(
            'id_jenis' => '',
            'nama' => $nama,
            'status' => $stts,
            'tanggal' => $tggl,
            );
        return $this->db->insert('dataujian', $data);
    }

    function simpan_data_nilai() {
        $nama = $this->input->post('nama');
        $ujan = $this->input->post('jenis');
        $nil1 = $this->input->post('kerapihan');
        $nil2 = $this->input->post('kebersihan');
        $nil3 = $this->input->post('kesimpulan');
        $ketr = $this->input->post('keterangan');
        $tggl = date("Y.m.d", strtotime($this->input->post('tanggal')));
        $stts = $this->input->post('status');
        $data = array(
            'id_ujian' => '',
            'id_biodata' => $nama,
            'jenis_ujian' => $ujan,
            'nilai1' => $nil1,
            'nilai2' => $nil2,
            'nilai3' => $nil3,
            'keterangan' => $ketr,
            'tanggal' => $tggl,
            'status' => $stts,
            );
        return $this->db->insert('ujian', $data);
    }

    function update_data_ujian($id) {
        $nama = $this->input->post('nama');
        $tggl = date("Y.m.d", strtotime($this->input->post('tanggal')));
        $data = array(
            'nama' => $nama,
            'tanggal' => $tggl,
            );
        $this->db->where('id_jenis', $id);
        $this->db->update('dataujian', $data);
    }

    function hapus_data_ujian($id) {
        $this->db->where('id_jenis', $id);
        $this->db->delete('dataujian');
    }

    function ambil_id($id) {
        return $this->db->get_where('dataujian', array('id_jenis' => $id))->row();
    }
}