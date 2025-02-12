<?php
class M_pengantar_ppap extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM pengantar_ppap";
                $query = $this->db->query($sql);
 
 
            return $query->result();
	} 
	
 function simpan_data_surat(){
		
		$nomor_2 = $this->input->post('nomor_2');
		$tki_2 = $this->input->post('tki_2');
		$tanggal_2 = $this->input->post('tanggal_2');

		$data = array (
			'nomor_2' => $nomor_2,
			'tki_2' => $tki_2,
			'tanggal_2' => $tanggal_2,
			);

		$this->db->insert('pengantar_ppap',$data);
	}

 function edit_surat(){
		
		$id_ppap = $this->input->post('id_ppap');
		$nomor_2 = $this->input->post('nomor_2');
		$tki_2 = $this->input->post('tki_2');
		$tanggal_2 = $this->input->post('tanggal_2');

		$data = array (
			'nomor_2' => $nomor_2,
			'tki_2' => $tki_2,
			'tanggal_2' => $tanggal_2,
			);

		$this->db->where('id_ppap', $id_ppap);
		$this->db->update('pengantar_ppap',$data);
	}

	function hapus_data_surat() {
		$id_ppap = $this->input->post('id_ppap');
		$this->db->where('id_ppap', $id_ppap);
		$this->db->delete('pengantar_ppap');
	}

}
?>