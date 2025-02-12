<?php
class M_surat_rekom_tabelktkln extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM pembuatan_tabelktkln ";
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
    function tampil_data_namapap(){
        $sql = "SELECT * FROM datanamapap";
                $query = $this->db->query($sql);

            return $query->result();
    } 

        function tampil_data_detail($idtabelktkln){
        $sql = "SELECT * FROM detail_tabelktkln 
LEFT JOIN personal
ON personal.id_biodata=detail_tabelktkln.id_biodata
where detail_tabelktkln.id_tabelktkln='$idtabelktkln'";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_surat(){
        
        $daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
         $nomor = $this->input->post('nomor');
          $kepada = $this->input->post('kepada');
           $jumlah = $this->input->post('jumlah');
        $data = array (
            'daerah' => $daerah,
            'tanggal' => $tanggal,
             'nomor' => $nomor,
            'kepada' => $kepada,
             'jumlah' => $jumlah,
            );

        $this->db->insert('pembuatan_tabelktkln',$data);
    }

 function edit_surat(){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
$daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
         $nomor = $this->input->post('nomor');
          $kepada = $this->input->post('kepada');
           $jumlah = $this->input->post('jumlah');

        $data = array (
            'daerah' => $daerah,
            'tanggal' => $tanggal,
            'nomor' => $nomor,
            'kepada' => $kepada,
             'jumlah' => $jumlah,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_tabelktkln',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_tabelktkln');
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
            'id_tabelktkln'=>$id_pembuatan,
            'id_biodata'=> $idsimpan,
            );
        $this->db->insert('detail_tabelktkln',$data);
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
        $this->db->update('detail_tabelktkln', $data);
    }
        function hapus_ctki() {
        $id = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id);
        $this->db->delete('detail_tabelktkln');
    }





     function tampil_data_ff(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'ff%' order by id_biodata ASC";
                $query = $this->db->query($sql);
            return $query->result();
    }

     function tampil_data_fi(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'fi%' order by id_biodata ASC";
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