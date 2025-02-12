<?php
class M_sektormajikan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    function simpan_data_sektor(){
		$sektor = $this->input->post('sektor');
		$nama = $this->input->post('nama');
		$data = array(
			'sektor'=>$sektor, 
			'nama'=>$nama, 
        );
		$this->db->insert('sektormajikan',$data);
	}

	function tampil_data_sektor(){
		$sql = "SELECT * FROM sektormajikan";
        $query = $this->db->query($sql);
        return $query->result();
	}
	
    function sektor(){
		$sql = "SELECT * FROM datasektor";
        $query = $this->db->query($sql);
        return $query->result();
	}

    function update_data_sektor($id) {
		$sektor = $this->input->post('sektor');
		$nama = $this->input->post('nama');

		$data = array(
			'sektor'=>$sektor, 
			'nama'=>$nama, 
        );
		$this->db->where('id', $id);
		$this->db->update('sektormajikan', $data);
	}

	function hapus_data_sektor($id) {
		$this->db->where('id', $id);
		$this->db->delete('sektormajikan');
	}

	function ambil_id($id) {
		return $this->db->get_where('sektormajikan', array('id' => $id))->row();
	} 
 
}
?>