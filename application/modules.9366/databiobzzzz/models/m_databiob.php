<?php
class M_databiob extends CI_Model{
    function __construct(){
        parent::__construct();
    }
  function hitung_data_mf(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_mi(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_ff(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'ff%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_fi(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'fi%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_jp(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'jp%'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
 function tampil_data_personal(){
		$sql = "SELECT * FROM personal";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 function delete_personal($id)
    {
        //delete employee record
        $this->db->where('id_biodata', $id);
        $this->db->delete('personal');
        redirect('databiob');
    } 
	
		function tampil_pengguna_agen($id_user){
		$nama;
        $result = Dbs::load("SELECT kode_agen FROM dataagen where username='$id_user'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['kode_agen'];
			}
		return $nama;
	}

    function ambiltki($where, $limit){
        $kode_desa=array();
        $result = Dbs::load("SELECT * FROM personal 
        $where order by personal.id_biodata DESC $limit  ");
        while($row = mysqli_fetch_array($result)){
                $kode_desa[]=$row['id_biodata'];
        }
        return $kode_desa;
    } 

    function ambilnama($where){
        $kode_desa=array();
        $result = Dbs::load("SELECT *,@curRow := @curRow + 1 AS row_number FROM personal JOIN (SELECT @curRow := 0) r $where");

        while($row = mysqli_fetch_array($result)){
            // Tanggal Lahir
            $tglnya = $row['tgllahir'];
            $birthday=str_replace(".","-",$tglnya);
            // Convert Ke Date Time
            $biday = new DateTime($birthday);
            $today = new DateTime();
            $diff = $today->diff($biday);

            $kode_desa[]=$row['id_biodata'];
            $kode_desa[]=$row['nama'];
            $kode_desa[]=$row['kode_sponsor'];
            $kode_desa[]=$row['tanggaldaftar'];
            $kode_desa[]=$row['tempatlahir'];
            $kode_desa[]=$row['tgllahir'];
            $kode_desa[]=$row['tinggi'];
            $kode_desa[]=$row['berat'];
            $kode_desa[]=$row['pendidikan'];
            $kode_desa[]=$row['status'];
            $kode_desa[]=$row['notelp'];
            $kode_desa[]=$row['notelpkel'];
            $kode_desa[]=$diff->y." Tahun";
            $kode_desa[]=$row['status'];
            $kode_desa[]=$row['row_number'];
        }
        return $kode_desa;
    } 
    /*
    function ambilnama($where){
        $kode_desa=array();
        $result = Dbs::load("SELECT * FROM personal $where");
        while($row = mysqli_fetch_array($result)){
            // Tanggal Lahir
        	$tglnya = $row['tgllahir'];
        	$birthday=str_replace(".","-",$tglnya);
        	// Convert Ke Date Time
        	$biday = new DateTime($birthday);
        	$today = new DateTime();
        	$diff = $today->diff($biday);

            $kode_desa[]=$row['id_biodata'];
            $kode_desa[]=$row['nama'];
            $kode_desa[]=$row['kode_sponsor'];
            $kode_desa[]=$row['tanggaldaftar'];
            $kode_desa[]=$row['tempatlahir'];
            $kode_desa[]=$row['tgllahir'];
            $kode_desa[]=$row['tinggi'];
            $kode_desa[]=$row['berat'];
            $kode_desa[]=$row['pendidikan'];
            $kode_desa[]=$row['status'];
            $kode_desa[]=$row['notelp'];
            $kode_desa[]=$row['notelpkel'];
            $kode_desa[]=$diff->y." Tahun";

        }
        return $kode_desa;
    } */

  function namadisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['nama'];
            }
        return $kode_desa;
    } 

    function ttldisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tempatlahir'];
            }
        return $kode_desa;
    } 
     function tanggaltldisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggallahir'];
            }
        return $kode_desa;
    } 

    function statusdisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['status'];
            }
        return $kode_desa;
    } 

    function datatables_sql_exec($table, $bindings, $limit, $select) {
        $query = "SELECT $select FROM $table where id_biodata is not null $limit";
        $q = $this->db->query($query);
        return $q->result_array();
    }

    function datatables_count($table, $primaryKey, $pilsek) {
        $query = "SELECT COUNT($primaryKey) as 'key' FROM $table where id_biodata is not null and id_biodata LIKE '$pilsek%'";
        $q = $this->db->query($query);
        return $q->row();
    }

    function datatables_count_where($table, $primaryKey, $where) {
        $query = "SELECT COUNT($primaryKey) as 'filter' FROM $table $where";
        $q = $this->db->query($query);
        return $q->row();
    }

}
?>