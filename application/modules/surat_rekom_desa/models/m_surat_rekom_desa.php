<?php
class M_surat_rekom_desa extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal($id_bio){
		$sql = "SELECT * FROM pembuatan_ijin_desa 
				INNER JOIN personal 
				ON pembuatan_ijin_desa.id_tki = personal.id_biodata
                WHERE personal.id_biodata='$id_bio'";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
 function tampil_data_tki(){
        $sql = "SELECT * FROM personal ";
                $query = $this->db->query($sql);

            return $query->result();
    } 

    function tampil_data_namadesa(){
        $sql = "SELECT * FROM datanamadesa";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_surat($id_bio){
        
        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $kepada = $this->input->post('kepada');
        $jabatan = $this->input->post('jabatan');

        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'kepada' => $kepada,
            'jabatan' => $jabatan,
            );

        $this->db->insert('pembuatan_ijin_desa',$data);
    }

 function edit_surat($id_bio){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $kepada = $this->input->post('kepada');
        $jabatan = $this->input->post('jabatan');

        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'kepada' => $kepada,
            'jabatan' => $jabatan,
            );
		
        $this->db->where('id_pembuatan_desa', $id_pembuatan);
        $this->db->update('pembuatan_ijin_desa',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan_desa', $id_pembuatan);
        $this->db->delete('pembuatan_ijin_desa');
    }

}
?>