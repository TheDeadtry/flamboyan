<?php
class M_surat_rekom_tabelpap extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT *,pembuatan_tabelpap.id_pembuatanpap as idnyabuat FROM pembuatan_tabelpap ";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
    function tampil_data_tki(){
        $sql = "SELECT * FROM personal ORDER BY id_biodata ASC";
        $query = $this->db->query($sql);

        return $query->result();
    } 

     function tampil_data_personalcari($id){
        $sql = "SELECT *,pembuatan_tabelpap.id_pembuatanpap as idnyabuat FROM pembuatan_tabelpap JOIN detail_tabelpap ON pembuatan_tabelpap.id_pembuatanpap = detail_tabelpap.id_tabelpap where detail_tabelpap.id_biodata='$id'
                ";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function tampil_data_namapap(){
        $sql = "SELECT * FROM datanamapap";
                $query = $this->db->query($sql);

            return $query->result();
    } 
    function tampil_data_namadisnaker(){
        $sql = "SELECT * FROM datanamadisnaker";
                $query = $this->db->query($sql);

            return $query->result();
    } 



        function tampil_data_detail($idtabelpap){
        $sql = "SELECT * FROM detail_tabelpap 
LEFT JOIN personal
ON personal.id_biodata=detail_tabelpap.id_biodata
where detail_tabelpap.id_tabelpap='$idtabelpap'";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_surat(){
        
        $daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
        $tanggalpap = $this->input->post('tanggalpap');
          $kepada = $this->input->post('kepada');
            $nomor = $this->input->post('nomor');
            $nomorktkln = $this->input->post('nomorktkln');

        $data = array (
            'daerah' => $daerah,
            'tanggal' => $tanggal,
            'tanggalpap' => $tanggalpap,
            'kepada' => $kepada,
            'nomor' => $nomor,
            'nomorktkln' => $nomorktkln,
            );

        $this->db->insert('pembuatan_tabelpap',$data);
    }

 function edit_surat(){
        
        $id_pembuatan = $this->input->post('id_pembuatanpap');
$daerah = $this->input->post('daerah');
        $tanggal = $this->input->post('tanggal');
                $tanggalpap = $this->input->post('tanggalpap');
         $kepada = $this->input->post('kepada');
            $nomor = $this->input->post('nomor');
            $nomorktkln = $this->input->post('nomorktkln');

        $data = array (
            'daerah' => $daerah,
            'tanggal' => $tanggal,
            'tanggalpap' => $tanggalpap,
            'kepada' => $kepada,
            'nomor' => $nomor,
            'nomorktkln' => $nomorktkln,
            );
		
        $this->db->where('id_pembuatanpap', $id_pembuatan);
        $this->db->update('pembuatan_tabelpap',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatanpap');
        $this->db->where('id_pembuatanpap', $id_pembuatan);
        $this->db->delete('pembuatan_tabelpap');
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
            'id_tabelpap'=>$id_pembuatan,
            'id_biodata'=> $idsimpan,
            );
        $this->db->insert('detail_tabelpap',$data);
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
        $this->db->update('detail_tabelpap', $data);
    }
        function hapus_ctki() {
        $id = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id);
        $this->db->delete('detail_tabelpap');
    }



    function tampil_data_all_sektor(){
        $sql = "SELECT * 
                FROM personal 
                LEFT JOIN paspor
                ON paspor.id_biodata=personal.id_biodata 
                WHERE (personal.id_biodata LIKE 'ff%'
                || personal.id_biodata LIKE 'fi%' 
                || personal.id_biodata LIKE 'mf%'
                || personal.id_biodata LIKE 'mi%'
                || personal.id_biodata LIKE 'jp%')
                AND paspor.keterangan='sudah' 
                order by personal.id_biodata ASC";
                
        $query = $this->db->query($sql);
        return $query->result();
    }


     function tampil_data_ff(){
        $sql = "SELECT * FROM personal
                LEFT JOIN paspor
                ON paspor.id_biodata=personal.id_biodata 
                WHERE personal.id_biodata LIKE 'ff%' 
                AND paspor.keterangan='sudah' 
                order by personal.id_biodata ASC
                ";
                $query = $this->db->query($sql);
            return $query->result();
    }

     function tampil_data_fi(){
        $sql = "SELECT * FROM personal
                LEFT JOIN paspor
                ON paspor.id_biodata=personal.id_biodata 
                WHERE personal.id_biodata LIKE 'fi%' 
                AND paspor.keterangan='sudah' 
                order by personal.id_biodata ASC
                ";
                $query = $this->db->query($sql);

            return $query->result();
    }

     function tampil_data_mf(){
        $sql = "SELECT * FROM personal
                LEFT JOIN paspor
                ON paspor.id_biodata=personal.id_biodata 
                WHERE personal.id_biodata LIKE 'mf%' 
                AND paspor.keterangan='sudah' 
                order by personal.id_biodata ASC
                ";
                $query = $this->db->query($sql);

            return $query->result();
    }
     function tampil_data_mi(){
        $sql = "SELECT * FROM personal
                LEFT JOIN paspor
                ON paspor.id_biodata=personal.id_biodata 
                WHERE personal.id_biodata LIKE 'mi%' 
                AND paspor.keterangan='sudah' 
                order by personal.id_biodata ASC
                ";
                $query = $this->db->query($sql);

            return $query->result();
    }

     function tampil_data_jp(){
        $sql = "SELECT * FROM personal
                LEFT JOIN paspor
                ON paspor.id_biodata=personal.id_biodata 
                WHERE personal.id_biodata LIKE 'jp%' 
                AND paspor.keterangan='sudah' 
                order by personal.id_biodata ASC
                ";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function select($yy) {
        return $this->db->query($yy)->result();
    }

    function select_row($kp) {
        return $this->db->query($kp)->row();
    }
}
?>