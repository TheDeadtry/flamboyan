<?php
class M_pengantar_pktkln extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM pengantar_pktkln";
                $query = $this->db->query($sql);
 
 
            return $query->result();
	} 
	
 function simpan_data_surat(){
		
		$nomor_3 = $this->input->post('nomor_3');
		$tki_3 = $this->input->post('tki_3');

		$data = array (
			'nomor_3' => $nomor_3,
			'tki_3' => $tki_3,
			);

		$this->db->insert('pengantar_pktkln',$data);
	}

 function edit_surat(){
		
		$id_pktkln = $this->input->post('id_pktkln');
		$nomor_3 = $this->input->post('nomor_3');
		$tki_3 = $this->input->post('tki_3');

		$data = array (
			'nomor_3' => $nomor_3,
			'tki_3' => $tki_3,
			);

		$this->db->where('id_pktkln', $id_pktkln);
		$this->db->update('pengantar_pktkln',$data);
	}

	function hapus_data_surat() {
		$id_pktkln = $this->input->post('id_pktkln');
		$this->db->where('id_pktkln', $id_pktkln);
		$this->db->delete('pengantar_pktkln');
	}

}
?>