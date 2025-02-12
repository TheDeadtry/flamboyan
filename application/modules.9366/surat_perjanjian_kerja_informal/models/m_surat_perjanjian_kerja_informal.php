<?php
class M_surat_perjanjian_kerja_informal extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT dataagen.nama as nama_agen,dataagen.alamat as alamat_agen,disnaker.nama as namatki, disnaker.alamat as alamattki ,disnaker.*,paspor.*,majikan.*,dataagen.*,surat_perjanjian_kerja_informal.* FROM surat_perjanjian_kerja_informal 
				LEFT JOIN disnaker 
				ON surat_perjanjian_kerja_informal.id_biodata = disnaker.id_biodata 
				LEFT JOIN paspor 
				ON surat_perjanjian_kerja_informal.id_biodata = paspor.id_biodata 
				LEFT JOIN majikan 
				ON surat_perjanjian_kerja_informal.id_biodata = majikan.id_biodata 
				LEFT JOIN dataagen 
				ON majikan.kode_agen = dataagen.id_agen 
				";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
 function tampil_data_tki(){
		$sql = "SELECT * FROM personal WHERE id_biodata LIKE 'mi%' || 'fi%' ";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 function simpan_data_surat(){
		
		$id_biodata = $this->input->post('id_biodata');
		$jumlah_anak 				= $this->input->post('jumlah_anak');

		$data = array (
			'id_biodata' => $id_biodata,
			'jumlah_anak' => $jumlah_anak,
			);

		$this->db->insert('surat_perjanjian_kerja_informal',$data);
	}

 function edit_surat(){
		
		$id_surat_perjanjian_kerja = $this->input->post('id_surat_perjanjian_kerja');
		$id_biodata 				= $this->input->post('id_biodata');
		$jumlah_anak 				= $this->input->post('jumlah_anak');

		$data = array (
			'id_biodata' => $id_biodata,
			'jumlah_anak' => $jumlah_anak,
			);
		
		$this->db->where('id_surat_perjanjian_kerja', $id_surat_perjanjian_kerja);
		$this->db->update('surat_perjanjian_kerja_informal',$data);
	}

	function hapus_data_surat() {
		$id_surat_perjanjian_kerja = $this->input->post('id_surat_perjanjian_kerja');
		$this->db->where('id_surat_perjanjian_kerja', $id_surat_perjanjian_kerja);
		$this->db->delete('surat_perjanjian_kerja_informal');
	}

}
?>