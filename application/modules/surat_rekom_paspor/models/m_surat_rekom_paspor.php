<?php
class M_surat_rekom_paspor extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal($id_bio){
		$sql = "SELECT * FROM pembuatan_paspor
                INNER JOIN personal
                ON pembuatan_paspor.id_tki = personal.id_biodata  
				INNER JOIN disnaker 
				ON pembuatan_paspor.id_tki = disnaker.id_biodata
                WHERE disnaker.id_biodata='$id_bio' AND personal.id_biodata='$id_bio' ";
                $query = $this->db->query($sql);
            return $query->result();
	}
 
    function tampil_data_kantorpaspor(){
		$sql = "SELECT * FROM setting_kantorpaspor ";
                $query = $this->db->query($sql);
            return $query->result();
	}
    function tampil_data_kantorpaspor2($id){
		$sql = "SELECT * FROM setting_kantorpaspor 
                WHERE id_setting_kantorpaspor='$id' ";
                $query = $this->db->query($sql);
            return $query->row();
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

 function simpan_data_surat_paspor($id_bio){
        
        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $tempat_rekom = $this->input->post('tempat_rekom');
        $tanggal = $this->input->post('tanggal');
        $kantorpaspor = $this->input->post('kantorpaspor');


        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'tempat_rekom' => $tempat_rekom,
            'tanggal' => $tanggal,
            'kantorpaspor' => $kantorpaspor,
            );

        $this->db->insert('pembuatan_paspor',$data);
    }

 function edit_surat($id_bio){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $tempat_rekom = $this->input->post('tempat_rekom');
        $tanggal = $this->input->post('tanggal');
        $kantorpaspor = $this->input->post('kantorpaspor');

        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'tempat_rekom' => $tempat_rekom,
            'tanggal' => $tanggal,
            'kantorpaspor' => $kantorpaspor,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_paspor',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_paspor');
    }

}
?>