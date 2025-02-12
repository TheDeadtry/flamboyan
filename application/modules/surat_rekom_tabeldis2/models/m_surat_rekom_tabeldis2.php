<?php
class M_surat_rekom_tabeldis2 extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT *,pembuatan_tabeldis2.id_pembuatan as idnyabuat FROM pembuatan_tabeldis2 ";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
     function tampil_data_personalcari($id){
        $sql = "SELECT *,pembuatan_tabeldis2.id_pembuatan as idnyabuat FROM pembuatan_tabeldis2 JOIN detail_tabeldis2 ON pembuatan_tabeldis2.id_pembuatan = detail_tabeldis2.id_tabeldis2 where detail_tabeldis2.id_biodata='$id'
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

        function tampil_data_namaasuransi(){
        $sql = "SELECT * FROM datanamaasuransi";
                $query = $this->db->query($sql);

            return $query->result();
    } 
    


        function tampil_data_detail($idtabeldis){
        $sql = "SELECT * FROM detail_tabeldis2
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis2.id_biodata
where detail_tabeldis2.id_tabeldis2='$idtabeldis'";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_surat(){
        
        $daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
         $asuransi = $this->input->post('namaasuransi');
          $biaya = $this->input->post('biaya');
        $data = array (
            'daerah' => $daerah,
            'tanggal' => $tanggal,
            'asuransi' => $asuransi,
             'biaya' => $biaya,
            );

        $this->db->insert('pembuatan_tabeldis2',$data);
    }

 function edit_surat(){
        
        $id_pembuatan = $this->input->post('id_pembuatan');
$daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
          $asuransi = $this->input->post('namaasuransi');
          $biaya = $this->input->post('biaya');

        $data = array (
            'daerah' => $daerah,
            'tanggal' => $tanggal,
             'asuransi' => $asuransi,
             'biaya' => $biaya,
            );
		
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_tabeldis2',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_tabeldis2');
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
            'id_tabeldis2'=>$id_pembuatan,
            'id_biodata'=> $idsimpan,
            );
        $this->db->insert('detail_tabeldis2',$data);
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
        $this->db->update('detail_tabeldis2', $data);
    }
        function hapus_ctki() {
        $id = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id);
        $this->db->delete('detail_tabeldis2');
    }





    function tampil_data_all_sektor(){
        $sql = "SELECT * 
                FROM personal 
                WHERE id_biodata LIKE 'ff%'
                || id_biodata LIKE 'fi%' 
                || id_biodata LIKE 'mf%'
                || id_biodata LIKE 'mi%'
                || id_biodata LIKE 'jp%'
                order by id_biodata ASC";
        $query = $this->db->query($sql);
        return $query->result();
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