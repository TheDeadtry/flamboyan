<?php
class M_dataadminmaleformal extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT 
personal.id_biodata as id_biodata,
personal.negara1 as negara1,
personal.negara2 as negara2,
personal.calling as calling,
personal.skill1 as skill1,
personal.skill2 as skill2,
personal.skill3 as skill3,
personal.nama as nama,
personal.nama_mandarin as nama_mandarin,
personal.notelp as notelp,
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.statusaktif as statusaktif
FROM personal 
LEFT JOIN disnaker
ON personal.id_biodata=disnaker.id_biodata 
LEFT JOIN datasponsor
ON personal.kode_sponsor=datasponsor.kode_sponsor
WHERE personal.id_biodata LIKE 'mf%' order by id_biodata DESC" ;
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 function delete_personal($id)
    {
        //delete employee record
        $this->db->where('id_biodata', $id);
        $this->db->delete('personal');
        redirect('dataadminmaleformal');
    } 

}
?>