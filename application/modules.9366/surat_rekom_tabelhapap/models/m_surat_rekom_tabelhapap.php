<?php
class M_surat_rekom_tabelhapap extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM pembuatan_tabelhapap ";
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


        function tampil_data_detail($idtabelhapap){
        $sql = "SELECT * FROM detail_tabelhapap 
LEFT JOIN personal
ON personal.id_biodata=detail_tabelhapap.id_biodata
where detail_tabelhapap.id_tabelhapap='$idtabelhapap'";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_surat(){
        
        $daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
        $data = array (
            'daerah' => $daerah,
            'tanggal' => $tanggal,
            );

        $this->db->insert('pembuatan_tabelhapap',$data);
    }

 function edit_surat(){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
$daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');

        $data = array (
            'daerah' => $daerah,
            'tanggal' => $tanggal,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_tabelhapap',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_tabelhapap');
    }

    




      function simpan_data_ctki(){

        $id_pembuatan=$this->input->post('id_pembuatan');
        $id1=$this->input->post('id1');
         $id2=$this->input->post('id2');
          $id3=$this->input->post('id3');
           $id4=$this->input->post('id4');
            $id5=$this->input->post('id5');

            $idsimpan=$id1."".$id2."".$id3."".$id4."".$id5;

        $data = array (
            'id_tabelhapap'=>$id_pembuatan,
            'id_biodata'=> $idsimpan,
            );
        $this->db->insert('detail_tabelhapap',$data);
    }

    function update_ctki() {
        $id_pembuatan=$this->input->post('id_pembuatan');
        $id1=$this->input->post('id1');
         $id2=$this->input->post('id2');
          $id3=$this->input->post('id3');
           $id4=$this->input->post('id4');
            $id5=$this->input->post('id5');
            $idsimpan=$id1."".$id2."".$id3."".$id4."".$id5;

        $data = array (
            'id_biodata'=> $idsimpan,
            );       
             $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('detail_tabelhapap', $data);
    }
        function hapus_ctki() {
        $id = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id);
        $this->db->delete('detail_tabelhapap');
    }





     function tampil_data_ff(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'ff%' order by id_biodata ASC";
                $query = $this->db->query($sql);
            return $query->result();
    }

     function tampil_data_fi(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE '%FI%' order by id_biodata ASC ";
                $query = $this->db->query($sql);

            return $query->result();
    }

     function tampil_data_mf(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'mf%' order by id_biodata ASC" ;
                $query = $this->db->query($sql);

            return $query->result();
    }
     function tampil_data_mi(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'mi%' order by id_biodata ASC";
                $query = $this->db->query($sql);

            return $query->result();
    }

     function tampil_data_jp(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'jp%' order by id_biodata ASC";
                $query = $this->db->query($sql);

            return $query->result();
    }

}
?>