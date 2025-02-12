<?php
class M_surat_rekom_ppdis extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM pembuatan_ppdis order by id_pembuatan DESC";
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

 function simpan_data_surat(){
        
        $nomor = $this->input->post('nomor');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $kepada = $this->input->post('kepada');
        $hongkong = $this->input->post('hongkong');
        $malaysia = $this->input->post('malaysia');
        $singapura = $this->input->post('singapura');
        $taiwan = $this->input->post('taiwan');

        $data = array (
            'nomor' => $nomor,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'kepada' => $kepada,
            'hongkong' => $hongkong,
            'malaysia' => $malaysia,
            'singapura' => $singapura,
            'taiwan' => $taiwan,
            );

        $this->db->insert('pembuatan_ppdis',$data);
    }

 function edit_surat(){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
        $nomor = $this->input->post('nomor');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $kepada = $this->input->post('kepada');
        $hongkong = $this->input->post('hongkong');
        $malaysia = $this->input->post('malaysia');
        $singapura = $this->input->post('singapura');
        $taiwan = $this->input->post('taiwan');
        
        $data = array (
            'nomor' => $nomor,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'kepada' => $kepada,
            'hongkong' => $hongkong,
            'malaysia' => $malaysia,
            'singapura' => $singapura,
            'taiwan' => $taiwan,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_ppdis',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_ppdis');
    }

}
?>