<?php
class M_pembuatan_ijin extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM pembuatan_ijin 
				INNER JOIN personal 
				ON pembuatan_ijin.id_tki = personal.id_personal";
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

        $this->db->insert('pembuatan_ijin',$data);
    }

 function edit_surat(){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
        $id_tki = $this->input->post('id_tki');
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
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_ijin',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_ijin');
    }

}
?>