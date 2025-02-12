<?php
class M_new_psv extends CI_Model{
    function __construct(){
        parent::__construct();
	}
	
	function tabel($table, $search = ''){
		return $this->db->query("SELECT * FROM $table WHERE id_biodata LIKE '%$search%' ")->result();
		}

		function tampil_data_psv($where, $limit) {
    
			$pilagen 	= $this->session->userdata('xxidagen');
			$pilmaj 	= $this->session->userdata('xxidmaj');
	
			if ($pilagen != NULL) {
				$fieldagen = 'f.id_agen='.$pilagen.' and ';
				if ($pilmaj != NULL) {
					$fieldmaj = $fieldagen.'c.id_majikan='.$pilmaj.' and ';
				} else {
					$fieldmaj = $fieldagen;
				}	
			} else {
				$fieldagen 	= "f.id_agen='' and ";
				$fieldmaj 	= $fieldagen;
			}
	
			$sql = "SELECT 
			a.id_biodata as perbio,
			a.id_majikan as id_maj,
			a.tglsimpansuhan,
			a.statsuhan,
			a.ketsuhan,
			a.tglsimpanvp,
			a.statvp,
			a.ketpermit,
			g.tanggalterbang,
			b.nama as namaindon,
			h.nama_mandarin as namamandarinn,
			c.nama as majikannama,
			c.namamajikan as majikannamamandarin,
			d.no_suhan as suhanno,
			d.tglterbit as suhantglterbit,
			d.tglexp as suhantglexp,
			d.tglterima as suhantglterima,
			d.tglsimpan as suhantglsimpan,
			e.no_visapermit as vpno,
			e.tglterbitvs as vptglterbit,
			e.tglexpvs as vptglexp,
			e.tglterimavs as vptglterima,
			e.tglsimpanvs as vptglsimpan,
			g.nama_titipan as namatitip,
			g.id_biodata_titipan as idbiotitip,
			g.tgl_terbang_titipan as tglterbangtitip,
			g.nama_dititipkan as namadititip,
			g.id_biodata_dititipkan as idbiodititip,
			g.tgl_terbang_dititipkan as tglterbangdititip,
			g.nama_dititipkan2 as namadititip2,
			g.id_biodata_dititipkan2 as idbiodititip2,
			g.tgl_terbang_dititipkan2 as tglterbangdititip2,
			g.tempatsuhandok as tempatsuhan,
			g.tempatvpdok as tempatvp
			FROM majikan a
			LEFT JOIN disnaker b ON a.id_biodata=b.id_biodata 
			LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
			LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
			LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit
			LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
			LEFT JOIN visa g ON a.id_biodata=g.id_biodata
			LEFT JOIN personal h ON a.id_biodata=h.id_biodata 
			where ".$fieldmaj."(a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL) ORDER BY id_maj DESC ".$limit ;
			$tampil = $this->db->query($sql);
			return $tampil->result();
	
		}

	function tampil_data_psv_ditaiwan($where, $limit) {
    
		$pilagen 	= $this->session->userdata('xxidagen');
		$pilmaj 	= $this->session->userdata('xxidmaj');

        if ($pilagen != NULL) {
			$fieldagen = 'f.id_agen='.$pilagen.' and ';
			if ($pilmaj != NULL) {
				$fieldmaj = $fieldagen.'c.id_majikan='.$pilmaj.' and ';
			} else {
				$fieldmaj = $fieldagen;
			}	
		} else {
			$fieldagen 	= "f.id_agen='' and ";
			$fieldmaj 	= $fieldagen;
		}

        $sql = "SELECT 
		a.id_biodata as perbio,
		a.id_majikan as id_maj,
		a.tglsimpansuhan,
		a.statsuhan,
		a.ketsuhan,
		a.tglsimpanvp,
		a.statvp,
		a.ketpermit,
		g.tanggalterbang,
		b.nama as namaindon,
		h.nama_mandarin as namamandarinn,
		c.nama as majikannama,
		c.namamajikan as majikannamamandarin,
		d.no_suhan as suhanno,
		d.tglterbit as suhantglterbit,
		d.tglexp as suhantglexp,
		d.tglterima as suhantglterima,
		d.tglsimpan as suhantglsimpan,
		e.no_visapermit as vpno,
		e.tglterbitvs as vptglterbit,
		e.tglexpvs as vptglexp,
		e.tglterimavs as vptglterima,
		e.tglsimpanvs as vptglsimpan,
		g.nama_titipan as namatitip,
		g.id_biodata_titipan as idbiotitip,
		g.tgl_terbang_titipan as tglterbangtitip,
		g.nama_dititipkan as namadititip,
		g.id_biodata_dititipkan as idbiodititip,
		g.tgl_terbang_dititipkan as tglterbangdititip,
		g.nama_dititipkan2 as namadititip2,
		g.id_biodata_dititipkan2 as idbiodititip2,
		g.tgl_terbang_dititipkan2 as tglterbangdititip2,
		g.tempatsuhandok as tempatsuhan,
		g.tempatvpdok as tempatvp
		FROM majikan a
		LEFT JOIN disnaker b ON a.id_biodata=b.id_biodata 
		LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
		LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
		LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit
		LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
		LEFT JOIN visa g ON a.id_biodata=g.id_biodata
		LEFT JOIN personal h ON a.id_biodata=h.id_biodata 
        where ".$fieldmaj." (g.tempatsuhandok='寄臺灣KE TAIWAN' || NULL) and (a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL) ORDER BY id_maj DESC ".$limit ;
        $tampil = $this->db->query($sql);
        return $tampil->result();

	}

	function tampil_data_psv_diindo($where, $limit) {
    
		$pilagen 	= $this->session->userdata('xxidagen');
		$pilmaj 	= $this->session->userdata('xxidmaj');

        if ($pilagen != NULL) {
			$fieldagen = 'f.id_agen='.$pilagen.' and ';
			if ($pilmaj != NULL) {
				$fieldmaj = $fieldagen.'c.id_majikan='.$pilmaj.' and ';
			} else {
				$fieldmaj = $fieldagen;
			}	
		} else {
			$fieldagen 	= "f.id_agen='' and ";
			$fieldmaj 	= $fieldagen;
		}

        $sql = "SELECT 
		a.id_biodata as perbio,
		a.id_majikan as id_maj,
		a.tglsimpansuhan,
		a.statsuhan,
		a.ketsuhan,
		a.tglsimpanvp,
		a.statvp,
		a.ketpermit,
		b.nama as namaindon,
		h.nama_mandarin as namamandarinn,
		c.nama as majikannama,
		c.namamajikan as majikannamamandarin,
		d.no_suhan as suhanno,
		d.tglterbit as suhantglterbit,
		d.tglexp as suhantglexp,
		d.tglterima as suhantglterima,
		d.tglsimpan as suhantglsimpan,
		e.no_visapermit as vpno,
		e.tglterbitvs as vptglterbit,
		e.tglexpvs as vptglexp,
		e.tglterimavs as vptglterima,
		e.tglsimpanvs as vptglsimpan,
		g.nama_titipan as namatitip,
		g.id_biodata_titipan as idbiotitip,
		g.tgl_terbang_titipan as tglterbangtitip,
		g.nama_dititipkan as namadititip,
		g.id_biodata_dititipkan as idbiodititip,
		g.tgl_terbang_dititipkan as tglterbangdititip,
		g.nama_dititipkan2 as namadititip2,
		g.id_biodata_dititipkan2 as idbiodititip2,
		g.tgl_terbang_dititipkan2 as tglterbangdititip2,
		g.tempatsuhandok as tempatsuhan,
		g.tanggalterbang,
		g.tempatvpdok as tempatvp
		FROM majikan a
		LEFT JOIN disnaker b ON a.id_biodata=b.id_biodata 
		LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
		LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
		LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit
		LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
		LEFT JOIN visa g ON a.id_biodata=g.id_biodata
		LEFT JOIN personal h ON a.id_biodata=h.id_biodata 
        where ".$fieldmaj." (g.tempatsuhandok='放印尼 DI INDONESIA' || NULL) and (a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL) ORDER BY id_maj DESC ".$limit ;
        $tampil = $this->db->query($sql);
        return $tampil->result();

    }
    
    function psv_count_where($where) {

		$pilagen 	= $this->session->userdata('xxidagen');
        if ($pilagen != NULL) {
			$fieldagen = 'f.id_agen='.$pilagen.' and ';
		} else {
			$fieldagen 	= "f.id_agen='' and ";
		}
        // $fieldmajz = "where ".$fieldmaj."(a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL)";
		$sql = "SELECT count(*) as total
		FROM majikan a 
		LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
		LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
		LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
        LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit
		LEFT JOIN dataagen f ON a.kode_agen=f.id_agen"
		//."$fieldmajz"
		;
        $tampil = $this->db->query($sql);
        return $tampil->row();
	}

	function psv_count() {
        $sql = "SELECT count(*) as total
		FROM majikan a 
		LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
		LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
		LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
		LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit 
		LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
		where (a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL)";
		$tampil = $this->db->query($sql);
		return $tampil->row();
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