<?php
class M_surat_keabsahan extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal($id_bio){
		$sql = "SELECT * FROM pembuatan_keabsahan 
				INNER JOIN personal 
				ON pembuatan_keabsahan.id_tki = personal.id_biodata
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
        function tampil_data_imigrasi(){
        $sql = "SELECT * FROM dataimigrasi";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_surat($id_bio){
        
        $id_tki = $id_bio;
        $daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
        $nomor = $this->input->post('nomor');
        $kepada = $this->input->post('kepada');


        $data = array (
            'id_tki' => $id_tki,
            'daerah' => $daerah,
            'tanggal' => $tanggal,
            'nomor' => $nomor,
            'kepada' => $kepada,
            );

        $this->db->insert('pembuatan_keabsahan',$data);
    }

 function edit_surat($id_bio){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
        $id_tki = $id_bio;
        $daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
        $nomor = $this->input->post('nomor');
        $kepada = $this->input->post('kepada');


        $data = array (
            'id_tki' => $id_tki,
            'daerah' => $daerah,
            'tanggal' => $tanggal,
            'nomor' => $nomor,
            'kepada' => $kepada,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_keabsahan',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_keabsahan');
    }

}
?>