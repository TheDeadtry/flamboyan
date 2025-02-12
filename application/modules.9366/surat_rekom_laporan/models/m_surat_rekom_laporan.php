<?php
class M_surat_rekom_laporan extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT *,pembuatan_laporan.id_pembuatan as idnyabuat FROM pembuatan_laporan ";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
     function tampil_data_personalcari($id){
        $sql = "SELECT *,pembuatan_laporan.id_pembuatan as idnyabuat FROM pembuatan_laporan JOIN detail_laporan ON pembuatan_laporan.id_pembuatan = detail_laporan.id_laporan where detail_laporan.id_biodata='$id'
                ";
                $query = $this->db->query($sql);

            return $query->result();
    }
 
 
 function tampil_data_tki(){
        $sql = "SELECT * FROM personal ORDER BY NAMA ASC";
                $query = $this->db->query($sql);

            return $query->result();
    } 

    function tampil_data_namadisnaker(){
        $sql = "SELECT * FROM datanamadisnaker";
                $query = $this->db->query($sql);

            return $query->result();
    } 

        function tampil_data_namaagen(){
        $sql = "SELECT a.*,b.nama as groupnama FROM dataagen a LEFT JOIN datagroup b ON a.kode_group=b.id_group ORDER BY a.nama";
                $query = $this->db->query($sql);

            return $query->result();
    } 


        function tampil_data_namaasuransi(){
        $sql = "SELECT * FROM datanamaasuransi";
                $query = $this->db->query($sql);

            return $query->result();
    } 
    


        function tampil_data_detail($idlaporan){
        $sql = "SELECT * FROM detail_laporan 
LEFT JOIN personal
ON personal.id_biodata=detail_laporan.id_biodata
where detail_laporan.id_laporan='$idlaporan'";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_surat(){
        
        $nomor = $this->input->post('nomor');
        $tanggal = $this->input->post('tanggal');
        $tglmulai = $this->input->post('tglmulai');
        $tglakhir= $this->input->post('tglakhir');
        $data = array (
            'nomor' => $nomor,
            'tanggal' => $tanggal,
            'tglmulai' => $tglmulai,
            'tglakhir' => $tglakhir,
            );

        $this->db->insert('pembuatan_laporan',$data);
    }

 function edit_surat(){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
$nomor = $this->input->post('nomor');
        $tanggal = $this->input->post('tanggal');
        $tglmulai = $this->input->post('tglmulai');
        $tglakhir= $this->input->post('tglakhir');

        $data = array (
            'nomor' => $nomor,
            'tanggal' => $tanggal,
            'tglmulai' => $tglmulai,
            'tglakhir' => $tglakhir,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_laporan',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_laporan');
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
            'id_laporan'=>$id_pembuatan,
            'id_biodata'=> $idsimpan,
            );
        $this->db->insert('detail_laporan',$data);
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
        $this->db->update('detail_laporan', $data);
    }
        function hapus_ctki() {
        $id = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id);
        $this->db->delete('detail_laporan');
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

    function select($fork) {
        return $this->db->query($fork)->result();
    }

    function select_row($fork) {
        return $this->db->query($fork)->row();
    }

}
?>