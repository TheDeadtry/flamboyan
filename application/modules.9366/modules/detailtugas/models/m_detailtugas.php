<?php 
class M_detailtugas extends CI_Model {
	function __construct(){
        parent::__construct();
    }

    function tampil_data_tugas($idnya) {
    	$sql = "SELECT tugas.*, personal.foto, personal.nama FROM tugas 
    			JOIN personal ON tugas.id_biodata = personal.id_biodata 
    			WHERE tugas.id_biodata='$idnya'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function hitung_data_tugas($idnya) {
    	$sql = "SELECT tugas.*, personal.foto, personal.nama FROM tugas 
    			JOIN personal ON tugas.id_biodata = personal.id_biodata 
    			WHERE tugas.id_biodata='$idnya'";
    	$tampil = $this->db->query($sql);
    	return $tampil->num_rows();
    }
            function tampil_data_personal($idnya){
        $sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
    function tambah_tugas() {
        $idid = $this->input->post('idbiodata');
        $tug1 = $this->input->post('t1');
        $tug2 = $this->input->post('t2');
        $tug3 = $this->input->post('t3');
        $tug4 = $this->input->post('t4');
        $tug5 = $this->input->post('t5');
        $tug6 = $this->input->post('t6');
        $data = array(
            "id_tugas" => '',
            "id_biodata" => $idid,
            "pekerjaan_rt" => $tug1,
            "merawat_bayi" => $tug2,
            "cacat" => $tug3,
            "anak_kecil" => $tug4,
            "memasak" => $tug5,
            "jompo" => $tug6,
            );
        $this->db->insert('tugas', $data);
    }

    function update_tugas() {
    	$idid = $this->input->post('idbiodata');
    	$tug1 = $this->input->post('t1');
    	$tug2 = $this->input->post('t2');
    	$tug3 = $this->input->post('t3');
    	$tug4 = $this->input->post('t4');
    	$tug5 = $this->input->post('t5');
    	$tug6 = $this->input->post('t6');
    	$data = array(
    		"pekerjaan_rt" => $tug1,
    		"merawat_bayi" => $tug2,
    		"cacat" => $tug3,
    		"anak_kecil" => $tug4,
    		"memasak" => $tug5,
    		"jompo" => $tug6,
    		);
    	$this->db->where('id_biodata', $idid);
    	$this->db->update('tugas', $data);
    }
}
?>