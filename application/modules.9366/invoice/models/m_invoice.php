<?php
class M_invoice extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function select($qq) {
    	return $this->db->query($qq)->result();
    }

    function select_row($qq) {
    	return $this->db->query($qq)->row();
    }
 	
 	function insert($data, $tbl) {
 		$this->db->insert($tbl, $data);
 	}

 	function update($data, $tbl, $value_id, $field_id) {
 		$this->db->where($field_id, $value_id);
 		$this->db->update($tbl, $data);
 	}

 	function delete($data, $tbl, $value_id, $field_id) {
 		$this->db->where($field_id, $value_id);
 		$this->db->delete($tbl, $data);
 	}
}
?>