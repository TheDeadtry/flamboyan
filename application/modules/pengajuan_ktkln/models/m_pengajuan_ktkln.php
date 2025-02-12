<?php
class M_pengajuan_ktkln extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM pengajuan_ktkln";
                $query = $this->db->query($sql);
 
 
            return $query->result();
	} 
	
 function simpan_data_surat(){
		
		$nomor_2 = $this->input->post('nomor_2');
		$kepada_2 = $this->input->post('kepada_2');
		$tki_2 = $this->input->post('tki_2');

		$data = array (
			'nomor_2' => $nomor_2,
			'kepada_2' => $kepada_2,
			'tki_2' => $tki_2,
			);

		$this->db->insert('pengajuan_ktkln',$data);
	}

 function edit_surat(){
		
		$id_ktkln = $this->input->post('id_ktkln');
		$nomor_2 = $this->input->post('nomor_2');
		$kepada_2 = $this->input->post('kepada_2');
		$tki_2 = $this->input->post('tki_2');

		$data = array (
			'nomor_2' => $nomor_2,
			'kepada_2' => $kepada_2,
			'tki_2' => $tki_2,
			);

		$this->db->where('id_ktkln', $id_ktkln);
		$this->db->update('pengajuan_ktkln',$data);
	}

	function hapus_data_surat() {
		$id_ktkln = $this->input->post('id_ktkln');
		$this->db->where('id_ktkln', $id_ktkln);
		$this->db->delete('pengajuan_ktkln');
	}

}
?>