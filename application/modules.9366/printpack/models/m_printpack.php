<?php
class M_printpack extends CI_Model{
    function __construct(){
        parent::__construct();
    }
		function tampil_nama_agen($id_siswa){
			$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
        	 LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
			WHERE majikan.id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampil_nama_majikan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['namamajikan'];
			}
		return $kode_desa;
	} 
	function idtki($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
			while($row = mysql_fetch_array($result)){
                $id_biodata =$row['id_biodata'];
                  $negara1 =$row['negara1'];
                    $negara2 =$row['negara2'];
                      $calling =$row['calling'];
                        $skill1 =$row['skill1'];
                        $skill2 =$row['skill2'];
                        $skill3 =$row['skill3'];
			}

			$kode_desa=$id_biodata.''.$negara1.''.$negara2.''.$calling.'-'.$skill1.''.$skill2.''.$skill3;
		return $kode_desa;
	}

	function tampil_nama_majikanmandarin($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['namataiwan'];
			}
		return $kode_desa;
	} 
		function tampil_nama_majikanformal($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
JOIN datamajikan
ON datamajikan.id_majikan=majikan.kode_majikan
where majikan.id_biodata='".$id_siswa."'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	

	function tampil_nama_majikanmandarinformal($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
JOIN datamajikan
ON datamajikan.id_majikan=majikan.kode_majikan
where majikan.id_biodata='".$id_siswa."'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['namamajikan'];
			}
		return $kode_desa;
	} 

	function tampil_id_biodata($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_perjanjian_kerja_informal
WHERE surat_perjanjian_kerja_informal.id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['id_biodata'];
			}
		return $kode_desa;
	} 
	
	function tampil_nodisnaker($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker WHERE id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                 $kode_desa =$row['nodisnaker'];
		}
		return $kode_desa;
	} 
	
	function tampil_nama($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
		function tampil_nama_mandarin($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama_mandarin'];
			}
		return $kode_desa;
	} 
	
	function tampil_jabatan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_perjanjian_kerja_informal
        LEFT JOIN disnaker
        ON surat_perjanjian_kerja_informal.id_biodata=disnaker.id_biodata 
WHERE surat_perjanjian_kerja_informal.id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jabatan'];
			}
		return $kode_desa;
	} 
	
	function tampil_alamat($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	function tampil_nopaspor($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nopaspor'];
			}
		return $kode_desa;
	} 
	
	function tampil_tglterima($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tglterbit'];
			}
		return $kode_desa;
	} 
	
	function tampil_office($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['office'];
			}
		return $kode_desa;
	} 
	
	function tampil_tanggallahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 
	
	function tampil_tempatlahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampil_jeniskelamin($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	} 
	
	function tampil_status($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['status'];
			}
		return $kode_desa;
	} 
	
	
	function tampil_jumlah_anak($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jmlanak'];
			}
		return $kode_desa;
	} 
	
	
	function tampil_namaahli($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_siswa'");

			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['ahliwaris'];
			}
		return $kode_desa;
	} 
	
	function tampil_namakontak($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_siswa'");

			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['namakontak'];
			}
		return $kode_desa;
	} 
	
	function tampil_alamatkontak($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_siswa'");

			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	function tampil_telpkontak($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_siswa'");

			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['telpkontak'];
			}
		return $kode_desa;
	} 
	
	
	function tampil_hubkontak($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_siswa'");

			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['hubkontak'];
			}
		return $kode_desa;
	} 
		function fotopaspor($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM upload_pasporbaru where id_biodata='$id_siswa' AND tampilkan='Ya' ORDER BY id_pasporbaru ASC LIMIT 1");

			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['file'];
			}
		return $kode_desa;
	} 
			function fotopaspor2($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM upload_pasporbaru where id_biodata='$id_siswa' AND tampilkan='Ya' ORDER BY id_pasporbaru DESC LIMIT 1");

			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['file'];
			}
		return $kode_desa;
	} 

				function hitungpaspor($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT count(*) hitungan FROM upload_pasporbaru where id_biodata='$id_siswa' AND tampilkan='Ya'");

			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['hitungan'];
			}
		return $kode_desa;
	} 

	

    function ambil_id_negara1($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysql_fetch_array($result)){
            $kode_desa=$row['negara1'];
        }
        return $kode_desa;
    } 

    function ambil_id_negara2($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysql_fetch_array($result)){
            $kode_desa=$row['negara2'];
        }
        return $kode_desa;
    } 

    function ambil_id_calling($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysql_fetch_array($result)){
            $kode_desa=$row['calling'];
        }
        return $kode_desa;
    } 

    function ambil_id_skill1($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysql_fetch_array($result)){
            $kode_desa=$row['skill1'];
        }
        return $kode_desa;
    } 

    function ambil_id_skill2($id) {
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysql_fetch_array($result)){
            $kode_desa=$row['skill2'];
        }
        return $kode_desa;
    } 

    function ambil_id_skill3($id){
        $kode_desa="";
        $result = Dbs::load("Select * from personal where id_biodata='$id'");
        while($row = mysql_fetch_array($result)){
            $kode_desa=$row['skill3'];
        }
        return $kode_desa;
    } 

    function tampil_data_personal($idnya) {
        $sql = "SELECT personal.*,YEAR(CURDATE()) - YEAR(tgllahir) AS umur,datapendidikan.mandarin as pendidikan_mandarin FROM personal LEFT JOIN datapendidikan ON personal.pendidikan=datapendidikan.isi WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_family($idnya){
        $sql = "SELECT * FROM family WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_pengalaman($idnya){
        $sql = "SELECT * FROM pengalaman WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function tampil_data_tugas($idnya){
        $sql = "SELECT * FROM tugas WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_kettugas($idnya){
        $sql = "SELECT * FROM kettugas WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_paspor($idnya){
        $sql = "SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_medical($idnya){
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
                $query = $this->db->query($sql);

        return $query->row();
    }

    function hitung_data_medical2($idnya) {
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2 WHERE id_biodata='".$idnya."'  ORDER BY id_medical DESC LIMIT 1";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_data_medical3($idnya) {
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 WHERE id_biodata='".$idnya."'  ORDER BY id_medical DESC LIMIT 1";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function tampil_data_medical2($idnya){
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2 WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
                $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_medical3($idnya){
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
                $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_skill($idnya){
        $sql = "SELECT * FROM skillcondition WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_working($idnya){
        $sql = "SELECT * FROM working INNER JOIN kategoripekerjaan ON kategoripekerjaan.id_kategori=working.jenis_usaha WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function tampil_data_request($idnya){
        $sql = "SELECT * FROM request WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_majikan($idnya) {
        $sql = "SELECT kode_agen, kode_majikan, namamajikan FROM majikan WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function select_agen($idnya) {
        $sql = "SELECT kode_agen FROM dataagen WHERE id_agen='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function select_maji($idnya) {
        $sql = "SELECT kode_majikan FROM datamajikan WHERE id_majikan='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    function tampil_data_interview($idnya) {
        $sql = "SELECT * FROM interview WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);

        return $query->row();
    }
}
?>