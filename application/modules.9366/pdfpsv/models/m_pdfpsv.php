<?php
class M_pdfpsv extends CI_Model{
    function __construct(){
        parent::__construct();
    }
function tampildatanyaagenpsv($idagen){

                $pilsek 	= $this->session->userdata('pilsektor');
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
        a.tglsimpansuhan,
        a.statsuhan,
        a.ketsuhan,
        a.tglsimpanvp,
        a.statvp,
        a.ketpermit,
        a.tglterbang,
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
        g.tgl_terbang_titipan as tglterbangtitip
        FROM majikan a
        LEFT JOIN disnaker b ON a.id_biodata=b.id_biodata
        LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
        LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
        LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit
        LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
        LEFT JOIN visa g ON a.kode_visa=g.id_visa
        LEFT JOIN personal h ON a.id_biodata=h.id_biodata 
        where ".$fieldmaj." (a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL) ORDER BY suhanno DESC " ;
        $tampil = $this->db->query($sql);
        return $tampil->result();
    }

function tampildatanyaagen($ambiltglmulai,$ambiltglakhir,$idagenxxxx){

                $sql = "SELECT
                a.id_biodata as perbio,
                a.tglsimpansuhan,
                a.statsuhan,
                a.ketsuhan,
                a.tglsimpanvp,
                a.statvp,
                a.ketpermit,
                a.tglterbang,
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
                g.tgl_terbang_titipan as tglterbangtitip
                FROM majikan a
                LEFT JOIN disnaker b ON a.id_biodata=b.id_biodata
                LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
                LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
                LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit
                LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
                LEFT JOIN visa g ON a.kode_visa=g.id_visa
                LEFT JOIN personal h ON a.id_biodata=h.id_biodata
                where ".$fieldmaj." (a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL) ORDER BY suhanno DESC " ;

                $query = $this->db->query($sql);

            return $query;
}

function hitungdatanyaagen($ambiltglmulai,$ambiltglakhir,$idagenxxxx){
        $kode_desa="";
                $result = Dbs::load("SELECT count(*) as hitungane
                ,paspor.nopaspor as paspornya
                ,dataagen.nama as namaagennya
                ,disnaker.nama as namatkinya
                ,disnaker.alamat as alamattkinya
                ,datamajikan.nama as formalmajikan
                ,datamajikan.alamat as formalalamat
                ,majikan.namamajikan as informalmajikan
                ,majikan.alamatmajikan as informalalamat
                ,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired
                from disnaker
                LEFT JOIN visa
                ON disnaker.id_biodata=visa.id_biodata 
                LEFT JOIN paspor
                ON paspor.id_biodata=disnaker.id_biodata
                LEFT JOIN majikan
                ON majikan.id_biodata=disnaker.id_biodata
                LEFT JOIN signingbank
                ON signingbank.id_biodata=disnaker.id_biodata
                LEFT JOIN datakreditbank
                ON signingbank.idkredit=datakreditbank.id_kreditbank
                LEFT JOIN dataagen
                ON majikan.kode_agen=dataagen.id_agen
                LEFT JOIN datamajikan
                ON majikan.kode_majikan=datamajikan.id_majikan
                LEFT JOIN datasuhan
                ON majikan.kode_suhan=datasuhan.id_suhan
                LEFT JOIN datavisapermit
                ON majikan.kode_visapermit=datavisapermit.id_visapermit
                LEFT JOIN personal
                ON disnaker.id_biodata=personal.id_biodata
                WHERE visa.tanggalterbang!=''
                AND visa.tanggalterbang between '$ambiltglmulai' and '$ambiltglakhir'
                AND paspor.keterangan='sudah'
                AND dataagen.id_agen='$idagenxxxx'");
                while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['hitungane'];
                        }
                return $kode_desa;
        }
        
        function namanyaagen($idagen){
                $kode_desa="";
                        $result = Dbs::load("SELECT * FROM dataagen where id_agen='$idagen'");
                        while($row = mysqli_fetch_array($result)){
                        $kode_desa =$row['nama'];
                        }
                        return $kode_desa;
        }
}