<?php
class M_laporandokformal extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function select($query) {
        return $this->db->query($query)->result();
    }

    function select_row($query) {
        return $this->db->query($query)->row();
    }

    function update($data, $id_value) {
        $this->db->where('id_biodata',$id_value);
        $this->db->update('majikan',$data);
    }
}
?>