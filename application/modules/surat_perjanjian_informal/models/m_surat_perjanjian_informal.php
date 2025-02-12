<?php
class M_surat_perjanjian_informal extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM surat_perjanjian 
				INNER JOIN personal 
				ON surat_perjanjian.nama_tki = personal.id_personal WHERE id_biodata LIKE 'mi%';";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
 function tampil_data_tki(){
		$sql = "SELECT * FROM personal WHERE id_biodata LIKE 'mi%'; ";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 function simpan_data_surat(){
		
		$nama_tki = $this->input->post('nama_tki');
		$nopass = $this->input->post('nopass');

		$data = array (
			'nama_tki' => $nama_tki,
			'nopass' => $nopass,
			);

		$this->db->insert('surat_perjanjian',$data);
	}

 function edit_surat(){
		
		$id_perjanjian = $this->input->post('id_perjanjian');
		$nama_tki = $this->input->post('nama_tki');
		$nopass = $this->input->post('nopass');

		$data = array (
			'nama_tki' => $nama_tki,
			'nopass' => $nopass,
			);
		
		$this->db->where('id_perjanjian', $id_perjanjian);
		$this->db->update('surat_perjanjian',$data);
	}

	function hapus_data_surat() {
		$id_perjanjian = $this->input->post('id_perjanjian');
		$this->db->where('id_perjanjian', $id_perjanjian);
		$this->db->delete('surat_perjanjian');
	}

}
?>