<?php
class Select2 extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function tki_rekom($data=""){
        return "
            SELECT 
                personal.id_biodata id
                , concat(personal.id_biodata,' ',personal.nama) text 
            FROM personal_nama personal
            LEFT JOIN paspor
            ON paspor.id_biodata=personal.id_biodata 
            WHERE 1=1
            AND (
                lower(personal.nama) LIKE concat('%',lower('{search}'),'%')
                OR lower(personal.id_biodata) LIKE concat('%',lower('{search}'),'%') 
            )
            AND paspor.keterangan='sudah' 
            AND nullif(personal.id_biodata,'') IS NOT NULL
            order by personal.id_biodata ASC limit {start}, {limit}
        ";
    }

	function load_data($data=[]){
        ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
        
        if(isset($data["model"])){
            $name = $data["model"];
            $txt = $this->$name();
            $txt = str_replace("{limit}", $data["limit"] , $txt);
            $txt = str_replace("{start}", $data["offset"] , $txt);
            $txt = str_replace("{search}", isset($data["q"]) ? $data["q"] : "", $txt);
            $counter = "SELECT count(*) total FROM ".(explode(" FROM ", $txt)[1]);
            $counter = explode(" LIMIT ", $counter)[0];
            $counter = explode(" limit ", $counter)[0];
            $getData = $this->db->query($txt)->result();
            $getDataCount = $this->db->query($counter)->row()->total;
            // var_dump($counter);       
            $response = [
                'results' => $getData ,
                'total' => $getDataCount,
                'qrc' => $counter // Total number of results
            ];

            echo json_encode($response);
        } else {
            echo json_encode(['error' => 'Model parameter is required']);
        }
	} 
 
}