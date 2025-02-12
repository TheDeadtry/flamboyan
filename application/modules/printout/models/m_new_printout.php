<?php
class M_new_printout extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function ambil_id_negara1($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysqli_fetch_array($result)){
            $kode_desa=$row['negara1'];
        }
        return $kode_desa;
    } 

    function ambil_id_negara2($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysqli_fetch_array($result)){
            $kode_desa=$row['negara2'];
        }
        return $kode_desa;
    } 

    function ambil_id_calling($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysqli_fetch_array($result)){
            $kode_desa=$row['calling'];
        }
        return $kode_desa;
    } 

    function ambil_id_skill1($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysqli_fetch_array($result)){
            $kode_desa=$row['skill1'];
        }
        return $kode_desa;
    } 

    function ambil_id_skill2($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysqli_fetch_array($result)){
            $kode_desa=$row['skill2'];
        }
        return $kode_desa;
    } 

    function ambil_id_skill3($id){
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysqli_fetch_array($result)){
            $kode_desa=$row['skill3'];
        }
        return $kode_desa;
    } 

    function tampil_data_personal($idnya) {
        $sql = "SELECT personal.*,YEAR(CURDATE()) - YEAR(tgllahir) AS umur,datapendidikan.mandarin as pendidikan_mandarin FROM personal LEFT JOIN datapendidikan ON personal.pendidikan=datapendidikan.isi WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_family($idnya){
        $sql = "SELECT * FROM family WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_pengalaman($idnya){
        $sql = "SELECT * FROM pengalaman WHERE id_biodata='".$idnya."' order by periodekerja asc";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function tampil_data_tugas($idnya){
        $sql = "SELECT * FROM tugas WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_kettugas($idnya){
        $sql = "SELECT * FROM kettugas WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_paspor($idnya){
        $sql = "SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_medical($idnya){
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
                $query = $this->db->query($sql);

        return $query->row();
    }

    function hitung_data_medical($idnya) {
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 WHERE id_biodata='".$idnya."'  ORDER BY id_medical DESC LIMIT 1";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_data_medical3($idnya) {
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 WHERE id_biodata='".$idnya."'  ORDER BY id_medical DESC LIMIT 1";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function tampil_data_medical2($idnya){
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2 WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
                $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_medical3($idnya){
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
                $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_skill($idnya){
        $sql = "SELECT * FROM skillcondition WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_working($idnya){
        $sql = "SELECT * FROM working INNER JOIN kategoripekerjaan ON kategoripekerjaan.id_kategori=working.jenis_usaha WHERE id_biodata='".$idnya."' ORDER BY tahun ASC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function tampil_data_request($idnya){
        $sql = "SELECT * FROM request WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_majikan($idnya) {
        $sql = "SELECT kode_agen, kode_majikan, namamajikan FROM majikan WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function select_agen($idnya) {
        $sql = "SELECT kode_agen FROM dataagen WHERE id_agen='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function select_maji($idnya) {
        $sql = "SELECT kode_majikan FROM datamajikan WHERE id_majikan='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_interview($idnya) {
        $sql = "SELECT * FROM interview WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }
    
    function tampil_data_keterangan($idnya){
        $sql = "SELECT * FROM upload_keterangan WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    } 
}
?>