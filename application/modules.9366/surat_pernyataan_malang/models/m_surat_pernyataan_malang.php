<?php
class M_surat_pernyataan_malang extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM surat_pernyataan_malang 
				LEFT JOIN personal 
				ON surat_pernyataan_malang.id_tki = personal.id_personal
				LEFT JOIN family 
				ON surat_pernyataan_malang.id_keluarga = family.id_family;";
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
		$status2 = $this->input->post('status2');
		$hubungan2 = $this->input->post('hubungan2');
		$alamat2 = $this->input->post('alamat2');
		$tujuan2 = $this->input->post('tujuan2');
		$kontrak2 = $this->input->post('kontrak2');

		$data = array (
			'id_tki' => $id_tki,
			'id_keluarga' => $id_keluarga,
			'tempat' => $tempat,
			'tgl' => $tgl,
			'status2' => $status2,
			'hubungan2' => $hubungan2,
			'alamat2' => $alamat2,
			'tujuan2' => $tujuan2,
			'kontrak2' => $kontrak2,
			);

		$this->db->insert('surat_pernyataan_malang',$data);
	}

 function edit_surat(){
		
		$id_keterangan = $this->input->post('id_keterangan');
		$id_tki = $this->input->post('id_tki');
		$id_keluarga = $this->input->post('id_keluarga');
		$tempat = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$status2 = $this->input->post('status2');
		$hubungan2 = $this->input->post('hubungan2');
		$alamat2 = $this->input->post('alamat2');
		$tujuan2 = $this->input->post('tujuan2');
		$kontrak2 = $this->input->post('kontrak2');

		$data = array (
			'id_tki' => $id_tki,
			'id_keluarga' => $id_keluarga,
			'tempat' => $tempat,
			'tgl' => $tgl,
			'status2' => $status2,
			'hubungan2' => $hubungan2,
			'alamat2' => $alamat2,
			'tujuan2' => $tujuan2,
			'kontrak2' => $kontrak2,
			);
		
		$this->db->where('id_keterangan', $id_keterangan);
		$this->db->update('surat_pernyataan_malang',$data);
	}

	function hapus_data_surat() {
		$id_keterangan = $this->input->post('id_keterangan');
		$this->db->where('id_keterangan', $id_keterangan);
		$this->db->delete('surat_pernyataan_malang');
	}

}
?>