<?php
class M_namadesa extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namadesa($nama_desa, $alamat_desa){

		$data = array (
			'namadesa'=>$nama_desa, 
			'alamatdesa'=>$alamat_desa,
			);

		$this->db->insert('datanamadesa',$data);
	}

	function tampil_data_namadesa(){
		$sql = "SELECT * FROM datanamadesa";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namadesa() {
		$id = $this->input->post('id_namadesa');
		$nama_desa = $this->input->post('nama_desa');
		$alamat_desa = $this->input->post('alamat_desa');
		$data = array(
			'namadesa'=>$nama_desa, 
			'alamatdesa'=>$alamat_desa,
			);
		$this->db->where('id_namadesa', $id);
		$this->db->update('datanamadesa', $data);
	}

	function hapus_data_namadesa() {
		$id = $this->input->post('id_namadesa');
		$this->db->where('id_namadesa', $id);
		$this->db->delete('datanamadesa');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamadesa', array('id_namadesa' => $id))->row();
	}
 
}
?>