<?php
class M_surat_pernyataan extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM surat_pernyataan 
				INNER JOIN personal 
				ON surat_pernyataan.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_pernyataan.id_keluarga = family.id_family;";
                $query = $this->db->query($sql);
 
 
            return $query->result();
	} 
 
 function tampil_data_tki(){
		$sql = "SELECT * FROM personal ";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
 function tampil_data_ahli(){
		$sql = "SELECT * FROM family ";
                $query = $this->db->query($sql);

            return $query->result();
	}

 function simpan_data_surat(){
		
		$id_tki = $this->input->post('id_tki');
		$id_keluarga = $this->input->post('id_keluarga');
		$tempat = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$alamat2 = $this->input->post('alamat2');
		$tempat3 = $this->input->post('tempat3');

		$data = array (
			'id_tki' => $id_tki,
			'id_keluarga' => $id_keluarga,
			'tempat' => $tempat,
			'tgl' => $tgl,
			'alamat2' => $alamat2,
			'tempat3' => $tempat3,
			);

		$this->db->insert('surat_pernyataan',$data);
	}

 function edit_surat(){
		
		$id_pernyataan = $this->input->post('id_pernyataan');
		$id_tki = $this->input->post('id_tki');
		$id_keluarga = $this->input->post('id_keluarga');
		$tempat = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$alamat2 = $this->input->post('alamat2');
		$tempat3 = $this->input->post('tempat3');

		$data = array (
			'id_tki' => $id_tki,
			'id_keluarga' => $id_keluarga,
			'tempat' => $tempat,
			'tgl' => $tgl,
			'alamat2' => $alamat2,
			'tempat3' => $tempat3,
			);

		$this->db->update('surat_pernyataan',$data);
	}

	function hapus_data_surat() {
		$id_pernyataan = $this->input->post('id_pernyataan');
		$this->db->where('id_pernyataan', $id_pernyataan);
		$this->db->delete('surat_pernyataan');
	}

}
?>