<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
use PhpOffice\PhpWord\TemplateProcessor;
class api extends MX_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function update(){
        $call = $this->db->query(" 
			UPDATE personal aa, (
            	SELECT 
            	p.id_biodata
            	, IF(v.tanggalterbang < now(), 1,'') statterbang
            	FROM (
            		SELECT 
            		personal.id_biodata,
            		personal.statterbang
            		FROM personal
            	) p JOIN (
            		SELECT id_biodata, tanggalterbang FROM visa
            	) v ON p.id_biodata = v.id_biodata
            	where statterbang != 1
            	and tanggalterbang != ''
            	order by statterbang, tanggalterbang desc
            ) bb SET aa.statterbang = bb.statterbang
            WHERE aa.id_biodata = bb.id_biodata
		");
        if($call){
            echo json_encode([
                "status" => "success",
            ]);
        }
    }


	function api_selection(){
		$data = $_POST;
		$this->load->model('Select2');
		$this->Select2->load_data($data);
	}

	function personal(){
		$call = $this->db->query("INSERT INTO personal_nama
		SELECT
			p.id_biodata,
			p.nama,
			p.statterbang 
		FROM
			personal p 
			LEFT JOIN personal_nama pn ON p.id_biodata = pn.id_biodata
		WHERE
			p.nama IS NOT NULL 
		AND p.id_biodata NOT LIKE 'TS%' AND pn.id_biodata IS NULL");
		if($call){
            echo json_encode([
                "status" => "success",
            ]);
        }
	}

	public function ip(){
		$ip = $_SERVER['HTTP_X_REAL_IP'];
		echo $ip;
		// $this->db->query("INSERT INTO ip_location (ip) VALUES('$ip') ");
	}

	public function logs() {
		$bc = $this->db->query("SELECT 
    table_name 
FROM 
    information_schema.table_constraints 
WHERE 
    constraint_type = 'PRIMARY KEY' 
    AND table_schema = 'u838782916_fgj'")->result();
		foreach ($bc as $key => $bcx) {
			$name = $bcx->table_name;  // Sesuaikan dengan nama database Anda
			
			// Mengecek apakah nama tabel tidak mengandung '_log'
			if (strpos($name, '_log') === false 
			&& strpos($name, '0blk') === false
			&& strpos($name, '[') === false
			&& strpos($name, ',') === false
			&& strpos($name, '/') === false
			) {
				if(
					$name != "personal"
					&& $name != "skck"
					&& $name != "disnaker"
					&& $name != "group_sektor"
					&& $name != "majikan"
					&& $name != "personalblk"
					&& $name != "tblattendance"
					&& $name != "user"
					&& $name != "vaksin"
					&& $name != "z_test"
					&& $name != "datamajikan"
					&& $name != "demo"
					&& $name != "blk_izin_pulang"
					&& $name != "_editrecords"
					&& $name != "_records"
					&& $name != "upload_legalitas"
					&& $name != "interview"
					&& $name != "coba"
					&& $name != "datasektor_nt"
					&& $name != "blk_setting_paket"
					&& $name != "suhanhistory"
					&& $name != "isichongyi"
					&& $name != "upload_desuhan"
					&& $name != "dataregdisnaker"
					&& $name != "amplop_terbang"
					&& $name != "blk_jadwalmateri_jompo"
				){
					echo "<br>";
					echo "call DuplicateTableStructure('$name')";
					$this->db->query("call DuplicateTableStructure('$name')");
				}
				
				// Lakukan dump tabel di sini
				// Contoh: $this->dumpTable($name);
			}
		}
	}

}