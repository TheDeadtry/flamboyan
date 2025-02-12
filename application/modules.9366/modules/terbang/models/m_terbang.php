<?php
class M_terbang extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_terbang($nama_maskapai,$kode_terbang,$rute_terbang,$jam_terbang,$kode_terbang2,$rute_terbang2,$jam_terbang2,$jam_tiba){

		$data = array (
			'namamaskapai'=>$nama_maskapai, 
			'kodeterbang'=>$kode_terbang,
			'ruteterbang'=>$rute_terbang, 
			'jamterbang'=>$jam_terbang,

			'kodeterbang2'=>$kode_terbang2, 
			'ruteterbang2'=>$rute_terbang2,
			'jamterbang2'=>$jam_terbang2, 

			'jamtiba'=>$jam_tiba,

			);

		$this->db->insert('dataterbang',$data);
	}

	function tampil_data_terbang(){
		$sql = "SELECT * FROM dataterbang";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_terbang() {
		$id	= $this->input->post('id_terbang');
			$nama_maskapai	= $this->input->post('nama_maskapai');
		$kode_terbang	= $this->input->post('kode_terbang');
		$rute_terbang	= $this->input->post('rute_terbang');
		$jam_terbang	= $this->input->post('jam_terbang');

		$kode_terbang2	= $this->input->post('kode_terbang2');
		$rute_terbang2	= $this->input->post('rute_terbang2');
		$jam_terbang2	= $this->input->post('jam_terbang2');
		
		$jam_tiba	= $this->input->post('jam_tiba');
		$data = array(
						'namamaskapai'=>$nama_maskapai, 
			'kodeterbang'=>$kode_terbang,
			'ruteterbang'=>$rute_terbang, 
			'jamterbang'=>$jam_terbang,

			'kodeterbang2'=>$kode_terbang2, 
			'ruteterbang2'=>$rute_terbang2,
			'jamterbang2'=>$jam_terbang2, 

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