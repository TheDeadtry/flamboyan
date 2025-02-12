<?php
class M_baru1 extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function ambildata($id_siswa,$kolom){
		$kode_desa="";
				$result = Dbs::load("SELECT * FROM pembuatan_perjanjian
		WHERE id_tki='$id_siswa'");
					while($row = mysqli_fetch_array($result)){
						$kode_desa =$row[$kolom];
					}
				return $kode_desa;
			} 

	function tampilnamatki($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 

	function tampilnoktp($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['noktp'];
			}
		return $kode_desa;
	} 

	function tampiltglnoktp($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglnoktp'];
			}
		return $kode_desa;
	} 

	function tampiltempatnoktp($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tempatnoktp'];
			}
		return $kode_desa;
	} 
				function ambilpendmandarin(){
$kode_desa=array();
        $result = Dbs::load("SELECT * FROM datapendidikan");
			while($row = mysqli_fetch_array($result)){
                $kode_desa[] =$row['mandarin'];
			}
		return $kode_desa;
	} 
	
	
	function tampiltempatlahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggallahir'];
			}
		return $kode_desa;
	} 
	
	function tampiljeniskelamin($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	} 
	
	function tampilalamat($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
		function tampilalamatkontak($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamatpasangan'];
			}
		return $kode_desa;
	}
	
	function tampilnotelp($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_perjanjian
        LEFT JOIN personal
        ON pembuatan_perjanjian.id_tki=personal.id_biodata 
WHERE pembuatan_perjanjian.id_tki='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['notelp'];
			}
		return $kode_desa;
	} 
	
	function tampilnama_bapak($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namaayah'];
			}
		return $kode_desa;
	}
    function tampilnama_ibu($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namaibu'];
            }
        return $kode_desa;
    } 

    function tampilnama_kontak($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namakontak'];
            }
        return $kode_desa;
    } 

		function tampilalamatortu($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamatortu'];
			}
		return $kode_desa;
	} 
	
	function tampilnotelpkel($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['telpkontak'];
			}
		return $kode_desa;
	} 
	
	function tampilpendidikan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['pendidikan'];
			}
		return $kode_desa;
	} 
	
	function tampilstatus($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['status'];
			}
		return $kode_desa;
	} 
	
	function tampilnama_istri_suami($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namapasangan'];
			}
		return $kode_desa;
	} 
	
	function tampil_gaji($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE disnaker.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['gaji'];
			}
		return $kode_desa;
	} 

	function tampil_lembur($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_perjanjian
WHERE pembuatan_perjanjian.id_tki='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['lembur'];
			}
		return $kode_desa;
	} 
	
	
	function tampil_hubungan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_perjanjian
WHERE pembuatan_perjanjian.id_tki='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['hubsaksi'];
			}
		return $kode_desa;
	} 


	function tampil_wali($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_perjanjian
WHERE pembuatan_perjanjian.id_tki='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namasaksi'];
			}
		return $kode_desa;
	} 

	function tampil_nama_dinas($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_perjanjian
WHERE pembuatan_perjanjian.id_tki='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namadinas'];
			}
		return $kode_desa;
	} 


	function tampil_kode_agen($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE disnaker.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['agency'];
			}
		return $kode_desa;
	} 

	function tampil_nama_agen($kode_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen
WHERE kode_agen='$kode_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 

		function tampil_id_pengguna($kode_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen
WHERE kode_agen='$kode_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nosiup'];
			}
		return $kode_desa;
	} 

	function tampil_nomer_pengguna($kode_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen
WHERE kode_agen='$kode_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['notel'];
			}
		return $kode_desa;
	} 

	function tampil_alamat_pengguna($kode_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen
WHERE kode_agen='$kode_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 

	function tampil_jabatan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker
WHERE disnaker.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jabatan'];
			}
		return $kode_desa;
	} 
		function tampilnomor($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_perjanjian
WHERE pembuatan_perjanjian.id_tki='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nomor'];
			}
		return $kode_desa;
	} 

	function tampiltanggal($id_siswa){
		$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_perjanjian
		WHERE pembuatan_perjanjian.id_tki='$id_siswa'");
		while($row = mysqli_fetch_array($result)){
            $kode_desa =$row['tanggal'];
		}
		return $kode_desa;
	} 

	function keabsahan_nomor($id){
	$kode_desa="";
		$result = Dbs::load("SELECT * FROM pembuatan_keabsahan
	WHERE id_pembuatan='$id'");
			while($row = mysqli_fetch_array($result)){
				$kode_desa =$row['nomor'];
			}
		return $kode_desa;
	} 
	function keabsahan_kepada($id){
	$kode_desa="";
	$result = Dbs::load("SELECT * FROM pembuatan_keabsahan
	WHERE id_pembuatan='$id'");
		while($row = mysqli_fetch_array($result)){
			$kode_desa =$row['kepada'];
		}
	return $kode_desa;
	} 
	function keabsahan_tgl($id){
	$kode_desa="";
	$result = Dbs::load("SELECT * FROM pembuatan_keabsahan
	WHERE id_pembuatan='$id'");
		while($row = mysqli_fetch_array($result)){
			$kode_desa =$row['tanggal'];
		}
	return $kode_desa;
	} 
	function keabsahan_daerah($id){
	$kode_desa="";
	$result = Dbs::load("SELECT * FROM pembuatan_keabsahan
	WHERE id_pembuatan='$id'");
		while($row = mysqli_fetch_array($result)){
			$kode_desa =$row['daerah'];
		}
	return $kode_desa;
	} 
}
?>