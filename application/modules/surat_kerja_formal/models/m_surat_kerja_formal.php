<?php
class M_surat_kerja_formal extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family WHERE personal.id_biodata LIKE 'mf%';";
                $query = $this->db->query($sql);
 
 
            return $query->result();
	} 
 
 function tampil_data_majikan(){
		$sql = "SELECT * FROM datamajikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
 function tampil_data_tki(){
		$sql = "SELECT * FROM personal WHERE id_biodata LIKE 'mf%'; ";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
 function tampil_data_ahli(){
		$sql = "SELECT * FROM family";
                $query = $this->db->query($sql);

            return $query->result();
	}

 function simpan_data_surat(){
		
		$id_majikan = $this->input->post('id_majikan');
		$id_tki = $this->input->post('id_tki');
		$nopass = $this->input->post('nopass');
		$jmanak = $this->input->post('jmanak');
		$id_keluarga = $this->input->post('id_keluarga');
		$alamat2 = $this->input->post('alamat2');
		$hp2 = $this->input->post('hp2');
		$hubungan2 = $this->input->post('hubungan2');

		$data = array (
			'id_majikan' => $id_majikan,
			'id_tki' => $id_tki,
			'nopass' => $nopass,
			'jmanak' => $jmanak,
			'id_keluarga' => $id_keluarga,
			'alamat2' => $alamat2,
			'hp2' => $hp2,
			'hubungan2' => $hubungan2,
			);

		$this->db->insert('surat_kerja',$data);
	}

 function edit_surat(){
		
		$id_kerja = $this->input->post('id_kerja');
		$id_majikan = $this->input->post('id_majikan');
		$id_tki = $this->input->post('id_tki');
		$nopass = $this->input->post('nopass');
		$jmanak = $this->input->post('jmanak');
		$id_keluarga = $this->input->post('id_keluarga');
		$alamat2 = $this->input->post('alamat2');
		$hp2 = $this->input->post('hp2');
		$hubungan2 = $this->input->post('hubungan2');

		$data = array (
			'id_majikan' => $id_majikan,
			'id_tki' => $id_tki,
			'nopass' => $nopass,
			'jmanak' => $jmanak,
			'id_keluarga' => $id_keluarga,
			'alamat2' => $alamat2,
			'hp2' => $hp2,
			'hubungan2' => $hubungan2,
			);

		$this->db->where('id_kerja', $id_kerja);
		$this->db->update('surat_kerja',$data);
	}

	function hapus_data_surat() {
		$id_kerja = $this->input->post('id_kerja');
		$this->db->where('id_kerja', $id_kerja);
		$this->db->delete('surat_kerja');
	}

}
?>