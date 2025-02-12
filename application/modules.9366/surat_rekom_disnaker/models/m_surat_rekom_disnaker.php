<?php
class M_surat_rekom_disnaker extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal($id_bio){
		$sql = "SELECT * FROM pembuatan_disnaker 
				INNER JOIN personal 
				ON pembuatan_disnaker.id_tki = personal.id_biodata
                WHERE personal.id_biodata='$id_bio'";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
 function tampil_data_tki(){
        $sql = "SELECT * FROM personal ";
                $query = $this->db->query($sql);
            return $query->result();
    } 

    function tampil_data_namadisnaker(){
        $sql = "SELECT * FROM datanamadisnaker";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_surat($id_bio){
        
        $id_tki = $id_bio;
        $tki = $this->input->post('tki');
        $data = array (
            'id_tki' => $id_tki,
            'tki' => $tki,
            );

        $this->db->insert('pembuatan_disnaker',$data);
    }

 function edit_surat($id_bio){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
        $id_tki = $id_bio;
        $tki = $this->input->post('tki');
        $data = array (
            'id_tki' => $id_tki,
            'tki' => $tki,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_disnaker',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_disnaker');
    }

}
?>