<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends MX_Controller
{
    private $nama_table;
    private $limit_start;
    private $limit_end;
    private $table_search;
    private $table_search_config;
    private $table_draw;
    private $table_set_show;
    private $set_data_order;
    private $set_config_order;
    private $table_action;
    private $keyword_update;
    private $location_update;
    private $keys;
    private $table_set_show_key;
    private $edit_show;

    public function set_table($aa){
        $this->nama_table = $aa;
    }

    public function action($aa){
        $this->table_action = $aa;
    }

    public function set_limit($start, $end){
        $this->limit_start = $start;
        $this->limit_end = $end;
    }

    public function set_search($search, $data){
        $this->table_search = $search;
        $this->table_search_config = $data;
    }

    public function set_table_show($key ,$value)
    {
        $this->table_set_show_key = $key;
        $this->table_set_show = $value;
    }

    public function set_draw($draw)
    {
        $this->table_draw = $draw;
    }

    public function location_update($aa)
    {
        $this->location_update = $aa;
    }

    private function search_configurasi(){
        $parameter_search = $this->table_search;
        $getConfig = $this->table_search_config;
        $var = " WHERE ";
        foreach($getConfig as $key => $value){
            if($key == 0){
                $var .= $value.' like "%'.$parameter_search.'%" ';
            }else{
                $var .= ' OR '.$value.' like "%'.$parameter_search.'%" ';
            }
        }
        return $var;
    }

    public function set_order_data($data, $order)
    {
        $this->set_data_order = $data;
        $this->set_config_order = $order;
    }

    private function set_order(){
        $arr = $this->set_data_order;
        $order = $this->set_config_order;
        if ($order != "") {
            $columnName = "";
            foreach ($arr as $key => $nilaicolumn) {
                if ($key == $order[0]["column"]) {
                    $columnName = $nilaicolumn;
                }
            }
            $columnOrder = $_POST["order"][0]["dir"];
            $order = 'ORDER BY '.$columnName.' '.$columnOrder.' ';
        }else{
            $order = ' ORDER BY id DESC ';
        }
        return $order;
    }

    private function panggil_tabel(){
        return $this->db->query("SELECT * FROM ".$this->nama_table);
    }

    public function set_delete_query()
    {
        return $this->panggil_tabel();
    }

    public function edit_show($aa)
    {
        return $this->edit_show = $aa;
    }

    public function delete_data($aa)
    {
        return $aa->delete();
    }

    public function get_key_update($oo ,$aa){
        $this->keys = $oo;
        $this->keyword_update = $aa;
    }

    private function dapatkan_data_table(){
        return $this->db->query('SELECT * FROM '.$this->nama_table.' '.$this->search_configurasi().' '.$this->set_order().' LIMIT '.$this->limit_start.','.$this->limit_end)->result();
    }

    private function jumlah_tabel()
    {
        return $this->panggil_tabel()->num_rows();
    }

    private function buat_table(){
        $arr = [];
        $theTable = $this->dapatkan_data_table();
        $show_table = $this->table_set_show;
        $key_id = $this->table_set_show_key;
        foreach($theTable as $key => $value){
            $child = [];
            $child[] = $key + 1;
            foreach($show_table as $evelop => $variable){
                $child[] = $value->$variable;
            }
            if($this->edit_show == true){
                $child[] = "
                <center>
                <button data-id='".$value->$key_id."' class='btn btn-success edit'>edit</button>
                <button data-id='".$value->$key_id."' class='btn btn-danger delete'>hapus</button>
                </center>
                ";
            }
            array_push($arr, $child);
        }
        return $arr;
    }

    public function get_data_update()
    {
        $datarealaeseupdate = $this->("SELECT * FROM ".$this->nama_table." WHERE ".$this->keys." = '".$this->keyword_update."'")->row();
        return $getdata = $datarealaeseupdate;
    }


    public function release()
    {

        if($this->table_action == "show"){

            if($this->jumlah_tabel() == 0){
                $data = array();
            }else{
                $data = $this->buat_table();
            }

            $r = array(
                "draw"            => $this->table_draw,
                "recordsTotal"    => intval( $this->jumlah_tabel() ),
                "recordsFiltered" => intval( $this->jumlah_tabel() ),
                "data"            => $data
            );
            echo json_encode($r);
        }
    }
}
