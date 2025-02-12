<?php
class M_datadokumen extends CI_Model{
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
        redirect('datadatadokumen');
    } 
	
		function tampil_pengguna_agen($id_user){
		$nama;
        $result = Dbs::load("SELECT kode_agen FROM dataagen where username='$id_user'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['kode_agen'];
			}
		return $nama;
	}


}
?>