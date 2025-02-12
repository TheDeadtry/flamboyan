<?php
class M_surat_rekom_ijin extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal($id_bio){
		$sql = "SELECT * FROM pembuatan_ijin 
				INNER JOIN personal 
				ON pembuatan_ijin.id_tki = personal.id_biodata
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
        $nomor = $this->input->post('nomor');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $kepada = $this->input->post('kepada');
        $imigrasi = $this->input->post('imigrasi');
        $jabatan = $this->input->post('jabatan');
        $daerah = $this->input->post('daerah');
        $tampilkan = $this->input->post('tampilkan');
        $tanggal = $this->input->post('tanggal');


        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'kepada' => $kepada,
            'imigrasi' => $imigrasi,
            'jabatan' => $jabatan,
            'daerah' => $daerah,
            'tampilkan' => $tampilkan,
            'tanggal' => $tanggal,
            );

        $this->db->insert('pembuatan_ijin',$data);
    }

 function edit_surat($id_bio){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $kepada = $this->input->post('kepada');
        $imigrasi = $this->input->post('imigrasi');
        $jabatan = $this->input->post('jabatan');
         $daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
        $tampilkan = $this->input->post('tampilkan');

        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'kepada' => $kepada,
            'imigrasi' => $imigrasi,
            'jabatan' => $jabatan,
            'daerah' => $daerah,
            'tampilkan' => $tampilkan,
            'tanggal' => $tanggal,
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