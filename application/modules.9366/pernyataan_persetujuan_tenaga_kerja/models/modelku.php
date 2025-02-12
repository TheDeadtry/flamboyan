<?php
class Modelku extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function query( $table = '', $data = '*', $where = ''){

        

        $data = $this->db->query("SELECT $data FROM $table $where ")->result();
        return $data;
    }

    function ambildatarow($kode ,$dari, $selector='', $key=''){
    if ($selector != '') {
        $where = "WHERE ".$selector." = '".$key."'";
    }else{
        $where = "";
    }

    $data = $this->db->query("SELECT $kode FROM $dari $where")->row();
    return $data;
}

function ambildataresult($kode ,$dari, $selector='', $key=''){
    if ($selector != '') {
        $where = "WHERE ".$selector." = '".$key."'";
    }else{
        $where = "";
    }

    $data = $this->db->query("SELECT $kode FROM $dari $where")->result();
    return $data;
}

function ambildatamod($key, $diminta, $dari, $selector, $kode){
    $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."'")->row();
    $dikirim = isset($data->$diminta);
    if ($dikirim == 1) {
        $paket = $data->$diminta;
    }else{
        $paket = "";
    }
    return $paket;
}

function buatarray($kode, $diminta, $dari, $key ,$selector='id_biodata'){
    $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."'")->result();
    $array = array();
    if (isset($data)) {
        foreach ($data as $key => $dataarr) {
            $array[] = strtoupper($dataarr->$diminta);        
        }
    }else{
        $array[] = "";
    }

    return $array;  
}

function tampil_data_barangdiproduksi() {
    $sql = "SELECT * FROM databarangdiproduksi ORDER BY isi ASC";
    //$sql = "SELECT * FROM dataalasan ORDER BY isi ASC";
    $query = $this->db->query($sql);

    return $query->result();
}



function update_dataworking(){
    $data = array(  
            'id_working' => $this->input->post('idworking'),
            'negara' => $this->input->post('negara'),
            'jenis_usaha' => htmlspecialchars($this->input->post('jenis_usaha')),
            'posisi' => $this->input->post('posisi'),
            'penjelasan' => $this->input->post('penjelasan'),
            'masa_kerja' => $this->input->post('masa_kerja'),
            'barangdiproduksi' => $this->input->post('barangdiproduksi'),
            'masabulan' => $this->input->post('masabulan'),
            'tahun' => $this->input->post('tahun'),
            'alasan' => $this->input->post('alasan'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'satuan' => $this->input->post('satuan'),
            'gaji' => $this->input->post('gaji'),
            'detail_gaji' => htmlspecialchars($this->input->post('detail_gaji')),
        );
    $this->db->where('id_working', $this->input->post('idworking'));
    $this->db->update('working', $data);
}


}