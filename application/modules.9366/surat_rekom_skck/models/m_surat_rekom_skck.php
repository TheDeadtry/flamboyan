<?php
class M_surat_rekom_skck extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal($id_bio){
		$sql = "SELECT * FROM pembuatan_skck 
				INNER JOIN personal 
				ON pembuatan_skck.id_tki = personal.id_biodata
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

        function tampil_data_polda(){
        $sql = "SELECT * FROM datanamapolda";
                $query = $this->db->query($sql);

            return $query->result();
    } 
            function tampil_data_polsek(){
        $sql = "SELECT * FROM datanamapolsek";
                $query = $this->db->query($sql);

            return $query->result();
    } 
            function tampil_data_polres(){
        $sql = "SELECT * FROM datanamapolres";
                $query = $this->db->query($sql);

            return $query->result();
    } 



 function simpan_data_surat($id_bio){
        
        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $kepada1 = $this->input->post('kepada1');
        $kepada2 = $this->input->post('kepada2');
        $kepada3 = $this->input->post('kepada3');
        $kepada4 = $this->input->post('kepada4');
        $jabatan = $this->input->post('jabatan');

        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'kepada1' => $kepada1,
            'kepada2' => $kepada2,
            'kepada3' => $kepada3,
             'kepada4' => $kepada4,
            'jabatan' => $jabatan,
            );

        $this->db->insert('pembuatan_skck',$data);
    }
      function tampil_data_namadesa(){
        $sql = "SELECT * FROM datanamadesa";
                $query = $this->db->query($sql);

            return $query->result();
    } 


 function edit_surat($id_bio){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
       $kepada1 = $this->input->post('kepada1');
        $kepada2 = $this->input->post('kepada2');
        $kepada3 = $this->input->post('kepada3');
         $kepada4 = $this->input->post('kepada4');
        $jabatan = $this->input->post('jabatan');

        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'kepada1' => $kepada1,
            'kepada2' => $kepada2,
            'kepada3' => $kepada3,
             'kepada4' => $kepada4,
            'jabatan' => $jabatan,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_skck',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_skck');
    }

}
?>