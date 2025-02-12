<?php
class M_terbang extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_terbang(){

$nama_maskapai	= $this->input->post('nama_maskapai');
		$detailberangkat1	= $this->input->post('detailberangkat1');

		$detailberangkat2	= $this->input->post('detailberangkat2');
		$jam_tiba	= $this->input->post('jam_tiba');

		$data = array (
			'namamaskapai'=>$nama_maskapai, 
			'detailberangkat1'=>$detailberangkat1,
			'detailberangkat2'=>$detailberangkat2,
			'jamtiba'=>$jam_tiba,

			);

		$this->db->insert('dataterbang',$data);
	}

	function tampil_data_terbang(){
		$sql = "SELECT * FROM dataterbang order by namamaskapai";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_terbang() {
		$id	= $this->input->post('id_terbang');
			$nama_maskapai	= $this->input->post('nama_maskapai');
		$detailberangkat1	= $this->input->post('detailberangkat1');

		$detailberangkat2	= $this->input->post('detailberangkat2');
		$jam_tiba	= $this->input->post('jam_tiba');
		
		$data = array(
						'namamaskapai'=>$nama_maskapai, 
			'detailberangkat1'=>$detailberangkat1,
			'detailberangkat2'=>$detailberangkat2,
			'jamtiba'=>$jam_tiba,
			);
		$this->db->where('id_terbang', $id);
		$this->db->update('dataterbang', $data);
	}

	function hapus_data_terbang() {
				$id	= $this->input->post('id_terbang');

		$this->db->where('id_terbang', $id);
		$this->db->delete('dataterbang');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataterbang', array('id_terbang' => $id))->row();
	}
 
}
?>