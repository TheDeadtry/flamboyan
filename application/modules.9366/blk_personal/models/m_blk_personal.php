<?php
class M_blk_personal extends CI_Model{
    function __construct(){
        parent::__construct();
    }

 function personalff(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
personal.jeniskelamin as jeniskelamin,
personal.alamat as alamat,
personal.notelp as telp,
personal.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'FF%' ORDER BY personal.nama ASC ";
                $query = $this->db->query($sql);
            return $query->result();
	}
	 function personalfi(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
personal.jeniskelamin as jeniskelamin,
personal.alamat as alamat,
personal.notelp as telp,
personal.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'FI%' ORDER BY personal.nama ASC";
                $query = $this->db->query($sql);
            return $query->result();
	}
	 function personalmf(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
personal.jeniskelamin as jeniskelamin,
personal.alamat as alamat,
personal.notelp as telp,
personal.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'MF%' ORDER BY personal.nama ASC ";
                $query = $this->db->query($sql);
            return $query->result();
	}
	 function personalmi(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
personal.jeniskelamin as jeniskelamin,
personal.alamat as alamat,
personal.notelp as telp,
personal.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'MI%' ORDER BY personal.nama ASC ";
                $query = $this->db->query($sql);
            return $query->result();
	}
	 function personaljp(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
personal.jeniskelamin as jeniskelamin,
personal.alamat as alamat,
personal.notelp as telp,
personal.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'JP%' ORDER BY personal.nama ASC ";
                $query = $this->db->query($sql);
            return $query->result();
	}

 	function simpan_data_blk_personal(){
	 	$pilper = $this->input->post('pilihpersonal');
	 	if ($pilper != 'new11') {
	 		$nama = $this->db->query("SELECT nama FROM personal where id_biodata='$pilper'")->row()->nama;
		 	$pemilik = $this->input->post('pemilik2');
		 	$bahasa = $this->input->post('bahasa2');
		 	$eksnon = $this->input->post('eksnon2');
		 	$cluster = $this->input->post('cluster2');
		 	$negara = $this->input->post('negara');

			$data = array (
				'nama'			=> $nama,
				'pemilik' 		=> $pemilik,
				'nodaftar'		=> $pilper,
				'bahasa'		=> $bahasa,
				'eksnon'		=> $eksnon,
				'cluster'		=> $cluster,
				'negara'		=> 'TAIWAN',
			);

	 		$tp = $this->db->query("SELECT count(*) as total FROM personal where id_biodata='$pilper'");
	 		if ( $tp->total == 0 ) {
				$this->db->insert('personalblk',$data);
	 		} else {
	 			exit('sudah ada');
	 		}
	 	} elseif ($pilper == 'new11') {
	 		$notki_ff = $this->input->post('notki_sektor').'-'.sprintf('%04d', $this->input->post('notki'));

		 	$nama = $this->input->post('nama');
		 	$pemilik = $this->input->post('pemilik');
		 	$sponsor = $this->input->post('sponsor');
		 	$nodisnaker = $this->input->post('nodisnaker');
		 	$notki = $notki_ff;
		 	$tempatlahir = $this->input->post('tempatlahir');
		 	$tanggallahir = $this->input->post('tanggalnyas');
		 	$jeniskelamin = $this->input->post('jeniskelamin');
		 	$alamat = $this->input->post('alamat');
		 	$notelp = $this->input->post('notelp');
		 	$pendidikan = $this->input->post('pendidikan');
		 	$noktp = $this->input->post('noktp');
		 	$negara = $this->input->post('negara');
		 	$bahasa = $this->input->post('bahasa');
		 	$eksnon = $this->input->post('eksnon');
		 	$cluster = $this->input->post('cluster');
		 	$nopaspor = $this->input->post('nopaspor');
		 	$foto = $this->input->post('foto');

			$data = array (
				'nama'=>$nama, 
				'pemilik'=>$pemilik,
				'sponsor'=>$sponsor,
				'nodisnaker'=>$nodisnaker,
				'nodaftar'=>$notki,
				'tempatlahir'=>$tempatlahir,
				'tanggallahir'=>$tanggallahir,
				'jeniskelamin'=>$jeniskelamin,
				'alamat'=>$alamat,
				'notelp'=>$notelp,
				'pendidikan'=>$pendidikan,
				'noktp'=>$noktp,
				'negara'=>$negara,
				'bahasa'=>$bahasa,
				'eksnon'=>$eksnon,
				'cluster'=>$cluster,
				'nopaspor'=>$nopaspor,
				'foto'=>$foto,
			);

	 		$tp = $this->db->query("SELECT count(*) as total FROM personal where id_biodata='$notki_ff'");
	 		if ( $tp->total == 0 ) {
				$this->db->insert('personalblk',$data);
	 		} else {
	 			exit('sudah ada');
	 		}
	 	}

		//return $data;
		//$this->db->insert('personalblk',$data);
	}

	function tampil_data_blk_personal($where, $limit){
		$sql = "SELECT 
			personalblk.nama as namanya,
			blk_pemilik.isi as pemilikx, 
			blk_pemilik.negara as negarapemilikx,
			datasponsor.kode_sponsor as kdsponsor, 
			personal.nama as personal_nama, 
			personal.kode_sponsor as personal_kodespons, 
			personal.jeniskelamin as personal_jk, 
			personalblk.jeniskelamin as blk_jk, 
			personalblk.nodaftar as nodaftar, 
			personalblk.id_personalblk as id_personalblk, 
			personal.statterbang as optterbang, 
			personalblk.statterbang as hk_optterbang,
			personalblk.sponsor as blk_sponsor,
			personal.negara1 as extra_1,
			personal.negara2 as extra_2,
			personal.calling as extra_3,
			personal.skill1 as extra_4,
			personal.skill2 as extra_5,
			personal.skill3 as extra_6
			FROM personalblk 
			LEFT JOIN blk_pemilik
			ON personalblk.pemilik=blk_pemilik.id_pemilik 
			LEFT JOIN datasponsor
			ON personalblk.sponsor=datasponsor.nama
			LEFT JOIN personal
			ON personalblk.nodaftar=personal.id_biodata
			$where ORDER BY personalblk.id_personalblk DESC $limit";
			
			$query = $this->db->query($sql);

            return $query->result();
	} /*
	function tampil_data_blk_personalNN($where, $limit){
		$sql = "SELECT *,personalblk.nama as namanya,blk_pemilik.isi as pemilikx, blk_pemilik.negara as negarapemilikx,datasponsor.kode_sponsor as kdsponsor, personal.nama as personal_nama, personal.kode_sponsor as personal_kodespons, personal.jeniskelamin as personal_jk, personalblk.jeniskelamin as blk_jk, personalblk.nodaftar as nodaftar, personalblk.id_personalblk as id_personalblk
FROM personalblk 
LEFT JOIN blk_pemilik
ON personalblk.pemilik=blk_pemilik.id_pemilik 
LEFT JOIN datasponsor
ON personalblk.sponsor=datasponsor.nama
LEFT JOIN personal
ON personalblk.nodaftar=personal.id_biodata
$where ORDER BY personalblk.id_personalblk DESC $limit";
                $query = $this->db->query($sql);

            return $query->result();
	} */

    function datatables_count($table, $primaryKey, $pilsek) {
        $query = "SELECT COUNT($primaryKey) as 'key' FROM $table 
				LEFT JOIN blk_pemilik
				ON personalblk.pemilik=blk_pemilik.id_pemilik 
				LEFT JOIN datasponsor
				ON personalblk.sponsor=datasponsor.nama 
				LEFT JOIN personal
				ON personalblk.nodaftar=personal.id_biodata
				where personalblk.nodaftar LIKE '$pilsek%'";
        $q = $this->db->query($query);
        return $q->row();
    }

    function datatables_count_where($table, $primaryKey, $where) {
        $query = "SELECT COUNT($primaryKey) as 'filter' FROM $table 
				LEFT JOIN blk_pemilik
				ON personalblk.pemilik=blk_pemilik.id_pemilik 
				LEFT JOIN datasponsor
				ON personalblk.sponsor=datasponsor.nama 
				LEFT JOIN personal
				ON personalblk.nodaftar=personal.id_biodata
				 $where";
        $q = $this->db->query($query);
        return $q->row();
    }

	function update_data_blk_personal() {
		$id = $this->input->post('id_personalblk');

	$nama = $this->input->post('nama');
 	$pemilik = $this->input->post('pemilik');
 	$sponsor = $this->input->post('sponsor');
 	$nodisnaker = $this->input->post('nodisnaker');
 	$notki = $this->input->post('notki');
 	$tempatlahir = $this->input->post('tempatlahir');
 	$tanggallahir = $this->input->post('tanggalnyas');
 	$jeniskelamin = $this->input->post('jeniskelamin');
 	$alamat = $this->input->post('alamat');
 	$notelp = $this->input->post('notelp');
 	$pendidikan = $this->input->post('pendidikan');
 	$noktp = $this->input->post('noktp');
 	$negara = $this->input->post('negara');
 	$bahasa = $this->input->post('bahasa');
 	$eksnon = $this->input->post('eksnon');
 	$cluster = $this->input->post('cluster');
 	$nopaspor = $this->input->post('nopaspor');
 	$foto = $this->input->post('foto');

		$data = array (
			'nama'=>$nama, 
			'pemilik'=>$pemilik,
			'sponsor'=>$sponsor,
			'nodisnaker'=>$nodisnaker,
			'nodaftar'=>$notki,
			'tempatlahir'=>$tempatlahir,
			'tanggallahir'=>$tanggallahir,
			'jeniskelamin'=>$jeniskelamin,
			'alamat'=>$alamat,
			'notelp'=>$notelp,
			'pendidikan'=>$pendidikan,
			'noktp'=>$noktp,
			'negara'=>$negara,
			'bahasa'=>$bahasa,
			'eksnon'=>$eksnon,
			'cluster'=>$cluster,
			'nopaspor'=>$nopaspor,
			'foto'=>$foto,
			);
		$this->db->where('id_personalblk', $id);
		$this->db->update('personalblk', $data);
	}

	function hapus_data_blk_personal() {
		$id = $this->input->post('id_personalblk');
		$this->db->where('id_personalblk', $id);
		$this->db->delete('personalblk');
	}

	function ambil_id($id) {
		return $this->db->get_where('datablk_personal', array('id_blk_personal' => $id))->row();
	}


		function tampil_data_pemilik_tki(){
		$sql = "SELECT * FROM blk_pemilik";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_jk_tki(){
		$sql = "SELECT * FROM blk_jk";
                $query = $this->db->query($sql);

            return $query->result();
		} 

				function tampil_data_negara_tki(){
		$sql = "SELECT * FROM blk_negara_tujuan";
                $query = $this->db->query($sql);

            return $query->result();
		} 

				function tampil_data_bahasa_tki(){
		$sql = "SELECT * FROM blk_bahasa";
                $query = $this->db->query($sql);

            return $query->result();
		} 
		function tampil_data_eksnon_tki(){
		$sql = "SELECT * FROM blk_eks_non";
                $query = $this->db->query($sql);

            return $query->result();
		} 
		function tampil_data_cluster_tki(){
		$sql = "SELECT * FROM blk_cluster_profesi";
                $query = $this->db->query($sql);

            return $query->result();
		} 

	function edit_show_Data($id) {
		$sql = "SELECT *,personalblk.nama as namanya,blk_pemilik.isi as pemilikx, blk_pemilik.negara as negarapemilikx,datasponsor.kode_sponsor as kdsponsor
		FROM personalblk 
		LEFT JOIN blk_pemilik
		ON personalblk.pemilik=blk_pemilik.id_pemilik 
		LEFT JOIN datasponsor
		ON personalblk.sponsor=datasponsor.nama
		WHERE id_personalblk='$id'
		ORDER BY personalblk.id_personalblk DESC";
        $query = $this->db->query($sql);
		return $query->row_array();
	}

	function tampil_data_sponsor(){
		$sql = "SELECT * FROM datasponsor";
        $query = $this->db->query($sql);
		return $query->result();
	} 
 
}
