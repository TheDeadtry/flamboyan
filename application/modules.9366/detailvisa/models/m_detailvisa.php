<?php
class M_detailvisa extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

 	function tampil_data_sektor(){
		$sql = "SELECT kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin FROM datasektor";
		$query = $this->db->query($sql);
		return $query->result();
	} 

 	function tampil_data_negara(){
		$sql = "SELECT kode_negara,isi,mandarin FROM datanegara";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function tampil_data_calling(){
		$sql = "SELECT kode_calling,isi FROM datacalling";
		$query = $this->db->query($sql);
		return $query->result();
	} 

	function tampil_data_pildok(){
		$sql = "SELECT * FROM datadokdibawa";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function tampil_data_skillnya(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
		$query = $this->db->query($sql);
		return $query->result();
	} 

	function tampil_data_dataairport(){
		$sql = "SELECT * FROM dataairport";
		$query = $this->db->query($sql);
		return $query->result();
	} 
 
	function tampil_data_agama(){
		$sql = "SELECT id_agama,isi,mandarin FROM dataagama";
		$query = $this->db->query($sql);
		return $query->result();
	} 

	function tampil_data_pendidikan(){
		$sql = "SELECT isi,mandarin FROM datapendidikan";
		$query = $this->db->query($sql);
		return $query->result();
	} 
	function tampil_data_provinsi(){
		$sql = "SELECT isi,mandarin FROM dataprovinsi";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function tampil_data_signing($idnya){
		$sql = "SELECT * FROM signingbank LEFT JOIN datakreditbank
		ON signingbank.idkredit=datakreditbank.id_kreditbank
		WHERE signingbank.id_biodata='".$idnya."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function hitung_data_visa($idnya){
		$sql = "SELECT count(*) as total FROM visa WHERE id_biodata='".$idnya."'";
		$query = $this->db->query($sql)->row_array();
		return $query['total'];
	}

	function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function tampil_data_visa($idnya){
		$sql = "SELECT *,DATE_ADD(tglberlaku, INTERVAL 3 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$idnya."' LIMIT 1";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function tampil_data_terbang($idnya){
		$sql = "SELECT * FROM terbang JOIN dataterbang ON terbang.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$idnya."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function tampil_dataterbang(){
		$sql = "SELECT * FROM dataterbang order by detailberangkat1";
		$query = $this->db->query($sql);
		return $query->result();
	} 
	function tambahvisa() {
		$data = array(  
			'id_biodata' => $this->input->post('idbiodata'),
			'novisa' => $this->input->post('novisa'),
			'tglberlaku' => $this->input->post('tglberlaku'),
			'tglsampai' => $this->input->post('tglsampai'),
			'kocokan' => $this->input->post('tglkocokan'),
			'statuskocokan' => $this->input->post('kocokana'),
			'finger' => $this->input->post('tglfinger'),
			'statusfinger' => $this->input->post('fingera'),
			'terima' => $this->input->post('tglterima'),
			'statusterima' => $this->input->post('terimaa'),
			'nopap' => $this->input->post('nopap'),
			'pap' => $this->input->post('tglpap'),
			'statuspap' => $this->input->post('papa'),
			'ktkln' => $this->input->post('tglktkln'),
			'statusktkln' => $this->input->post('ktklna'),/*

			'tanggalterbang' => $this->input->post('tanggalterbang'),
			'statustgl' => $this->input->post('tanggalterbanga'),
			'id_terbang' => $this->input->post('id_terbang'),
			'tiket' => $this->input->post('tiket'),
			'tglberangkat' => $this->input->post('tglberangkat'),
			'statusterbang' => $this->input->post('berangkata'),
			'airport' => $this->input->post('airport'),*/

			'tglterimadok' => $this->input->post('tglterimadok'),
			'statsuhandok' => $this->input->post('statsuhandok'),
			'tempatsuhandok' => $this->input->post('tempatsuhandok'),
			'ketdoksuhan' => $this->input->post('ketdoksuhan'),
			'statvpdok' => $this->input->post('statvpdok'),
			'tempatvpdok' => $this->input->post('tempatvpdok'),
			'ketdokvp' => $this->input->post('ketdokvp'),
			'jddok' => $this->input->post('jddok'),
			'arcdok' => $this->input->post('arcdok'),
			'icdok' => $this->input->post('icdok'),
			'ketdok' => $this->input->post('ketdok'),

			'isidok1' => $this->input->post('isidok1'),
			'statdok1' => $this->input->post('statdok1'),

			'isidok2' => $this->input->post('isidok2'),
			'statdok2' => $this->input->post('statdok2'),

			'isidok3' => $this->input->post('isidok3'),
			'statdok3' => $this->input->post('statdok3'),

			'isidok4' => $this->input->post('isidok4'),
			'statdok4' => $this->input->post('statdok4'),

			'isidok5' => $this->input->post('isidok5'),
			'statdok5' => $this->input->post('statdok5'),

			'isidok6' => $this->input->post('isidok6'),
			'statdok6' => $this->input->post('statdok6'),

			'isidok7' => $this->input->post('isidok7'),
			'statdok7' => $this->input->post('statdok7'),

			'isidok8' => $this->input->post('isidok8'),
			'statdok8' => $this->input->post('statdok8'),
			'apendik_a' => $this->input->post('apendik_a'),
			'apendik_b' => $this->input->post('apendik_b'),
			'apendik_c' => $this->input->post('apendik_c'),
			'apendik_d' => $this->input->post('apendik_d'),
			'tanggal_input' => date('Y-m-d H:i:s'),
		);

        $idid = $this->input->post('idbiodata');
        $cek_visa = $this->db->query("SELECT count(*) as total FROM visa WHERE id_biodata='$idid'")->row();
		if ($cek_visa->total == 0) {
        	$this->db->insert('visa', $data);
        }
	} 
	function ubahvisa() {
		$data = array(  
			'id_biodata' => $this->input->post('idbiodata'),
			'novisa' => $this->input->post('novisa'),
			'tglberlaku' => $this->input->post('tglberlaku'),
			'tglsampai' => $this->input->post('tglsampai'),
			'kocokan' => $this->input->post('tglkocokan'),
			'statuskocokan' => $this->input->post('kocokana'),
			'finger' => $this->input->post('tglfinger'),
			'statusfinger' => $this->input->post('fingera'),
			'terima' => $this->input->post('tglterima'),
			'statusterima' => $this->input->post('terimaa'),
			'nopap' => $this->input->post('nopap'),
			'pap' => $this->input->post('tglpap'),
			'statuspap' => $this->input->post('papa'),
			'ktkln' => $this->input->post('tglktkln'),
			'statusktkln' => $this->input->post('ktklna'),
			
			/*
				'tanggalterbang' => $this->input->post('tanggalterbang'),
				'statustgl' => $this->input->post('tanggalterbanga'),
				'id_terbang' => $this->input->post('id_terbang'),
				'tiket' => $this->input->post('tiket'),
				'tglberangkat' => $this->input->post('tglberangkat'),
				'statusterbang' => $this->input->post('berangkata'),
				'airport' => $this->input->post('airport'),
			*/

			'tglterimadok' => $this->input->post('tglterimadok'),
			'statsuhandok' => $this->input->post('statsuhandok'),
			'tempatsuhandok' => $this->input->post('tempatsuhandok'),
			'ketdoksuhan' => $this->input->post('ketdoksuhan'),
			'statvpdok' => $this->input->post('statvpdok'),
			'tempatvpdok' => $this->input->post('tempatvpdok'),
			'ketdokvp' => $this->input->post('ketdokvp'),
			'jddok' => $this->input->post('jddok'),
			'arcdok' => $this->input->post('arcdok'),
			'icdok' => $this->input->post('icdok'),
			'ketdok' => $this->input->post('ketdok'),
			'id_biodata_titipan' => $this->input->post('id_biodata_titipan'),
			'nama_titipan' => $this->input->post('nama_titipan'),
			'tgl_terbang_titipan' => $this->input->post('tgl_terbang_titipan'),
			'no_vp_titipan' => $this->input->post('no_vp_titipan'),
			'no_suhan_titipan' => $this->input->post('no_suhan_titipan'),
			'id_biodata_dititipkan' => $this->input->post('id_biodata_dititipkan'),
			'nama_dititipkan' => $this->input->post('nama_dititipkan'),
			'tgl_terbang_dititipkan' => $this->input->post('tgl_terbang_dititipkan'),
			'no_suhan_dititipkan' => $this->input->post('no_suhan_dititipkan'),
			'id_biodata_dititipkan2' => $this->input->post('id_biodata_dititipkan2'),
			'nama_dititipkan2' => $this->input->post('nama_dititipkan2'),
			'tgl_terbang_dititipkan2' => $this->input->post('tgl_terbang_dititipkan2'),
			'no_vp_dititipkan' => $this->input->post('no_vp_dititipkan'),

			'isidok1' => $this->input->post('isidok1'),
			'statdok1' => $this->input->post('statdok1'),

			'isidok2' => $this->input->post('isidok2'),
			'statdok2' => $this->input->post('statdok2'),

			'isidok3' => $this->input->post('isidok3'),
			'statdok3' => $this->input->post('statdok3'),

			'isidok4' => $this->input->post('isidok4'),
			'statdok4' => $this->input->post('statdok4'),

			'isidok5' => $this->input->post('isidok5'),
			'statdok5' => $this->input->post('statdok5'),

			'isidok6' => $this->input->post('isidok6'),
			'statdok6' => $this->input->post('statdok6'),

			'isidok7' => $this->input->post('isidok7'),
			'statdok7' => $this->input->post('statdok7'),

			'isidok8' => $this->input->post('isidok8'),
			'statdok8' => $this->input->post('statdok8'),
			'apendik_a' => $this->input->post('apendik_a'),
			'apendik_b' => $this->input->post('apendik_b'),
			'apendik_c' => $this->input->post('apendik_c'),
			'apendik_d' => $this->input->post('apendik_d'),
			'tanggal_input' => date('Y-m-d H:i:s'),
		);
		if($this->input->post('idbiodata') != ""){
			$update = $this->ToUpdate([$data], "visa", "id_biodata");
			// echo "<pre>";
			// var_dump($data);
			$this->db->query($update);
			// die();
		}
		//$this->db->insert('visapermit', $data);
		// $this->db->where('id_biodata', $this->input->post('idbiodata'));
		// $this->db->update('visa', $data);
	} 

	function ToUpdate($data, $table = 'test', $wht = 'kode') {
        if (count($data) > 0) {
            $keys = array_keys($data[0]);
            $query = 'UPDATE ' . $table . ' aa , ( ';
            $query .= 'SELECT ' . implode(', ', array_map(function ($g) {
                return 'a.' . $g;
            }, $keys));
            $query .= ' FROM (';
            $query .= implode("\n UNION ALL \n", array_map(function ($w) use ($keys) {
                $f = ' SELECT ';
                $f .= implode(', ', array_map(function ($q) use ($w) {
                    return '"' . str_replace('"', '\\"', $w[$q]) . '" `' . str_replace(" ","" ,$q) . '`';
                }, $keys));
                return $f;
            }, $data));
            $query .= ') a ) bb SET ';
            $query .= implode(',', array_map(function ($c) {
                return ' aa.' . $c . ' = bb.' . $c;
            }, $keys));
            $query .= ' WHERE ';
            if (is_array($wht)) {
                $query .= implode(" AND ", array_map(function ($whtx) {
                    return ' aa.' . $whtx . ' = bb.' . $whtx;
                }, $wht));
            } else {
                $query .= ' aa.' . $wht . ' = bb.' . $wht;
            }
            return $query;
        } else {
            return [];
        }
    }

	function tanggaltiba($idbiodata){
		$kode_desa="";
			$result = Dbs::load("SELECT * FROM signingbank where id_biodata='$idbiodata'");
				while($row = mysqli_fetch_array($result)){
					$kode_desa =$row['tgltrmleg'];
				}
			return $kode_desa;
		}

}
?>