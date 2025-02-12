<?php
class M_detailagengroup extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_detailagengroup($nama_detailagengroup, $nama_detailagengroup_taiwan){

		$data = array (
			'isi'=>$nama_detailagengroup, 
			'mandarin'=>$nama_detailagengroup_taiwan,
			);

		$this->db->insert('datadetailagengroup',$data);
	}

	function tampil_data_detailagengroup(){
		$sql = "SELECT * FROM datadetailagengroup";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_detailagengroup($id) {
		$nama = $this->input->post('nama_detailagengroup');
		$taiw = $this->input->post('nama_detailagengroup_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_detailagengroup', $id);
		$this->db->update('datadetailagengroup', $data);
	}

	function hapus_data_detailagengroup($id) {
		$this->db->where('id_detailagengroup', $id);
		$this->db->delete('datadetailagengroup');
	}

	function ambil_id($id) {
		return $this->db->get_where('datadetailagengroup', array('id_detailagengroup' => $id))->row();
	}

		 function tampil_data_personal_group(){
		$sql = "SELECT *,datasponsor.nama as namasponsor,majikan.kode_agen as kodeagennya ,datamajikan.nama as namanyamajikan 
FROM personal
INNER JOIN 
datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor INNER JOIN 
majikan ON personal.id_biodata=majikan.id_biodata INNER JOIN
datamajikan ON majikan.id_majikan=datamajikan.id_majikan ";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
}
?>