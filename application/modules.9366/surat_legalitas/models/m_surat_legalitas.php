<?php
class M_surat_legalitas extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM surat_legalitas 
				INNER JOIN personal 
				ON surat_legalitas.id_tki = personal.id_personal";
                $query = $this->db->query($sql);
 
 
            return $query->result();
	} 
 
 function tampil_data_tki(){
		$sql = "SELECT * FROM personal ";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 function simpan_data_surat(){
		
		$id_tki = $this->input->post('id_tki');
		$noid = $this->input->post('noid');

		$data = array (
			'id_tki' => $id_tki,
			'noid' => $noid,
			);

		$this->db->insert('surat_legalitas',$data);
	}

 function edit_surat(){
		
		$id_legalitas = $this->input->post('id_legalitas');
		$id_tki = $this->input->post('id_tki');
		$noid = $this->input->post('noid');

		$data = array (
			'id_tki' => $id_tki,
			'noid' => $noid,
			);
		
		
		$this->db->where('id_legalitas', $id_legalitas);
		$this->db->update('surat_legalitas',$data);
	}

	function hapus_data_surat() {
		$id_legalitas = $this->input->post('id_legalitas');
		$this->db->where('id_legalitas', $id_legalitas);
		$this->db->delete('surat_legalitas');
	}

}
?>