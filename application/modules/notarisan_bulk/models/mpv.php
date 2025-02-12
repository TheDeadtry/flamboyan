<?php
class Mpv extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    /*
      Cetak Laporan Daftar TKI Majikan PK
    */

    public function datapk($post, $document){

        $sektor = $post['sektor'];
		$nama = strtolower($post['nama']);
        $date1 = $post['date1'];
        $date2 = $post['date2'];

        $periode="";
        if($date1 != "-" && $date2 != "-"){
			$periode = " AND replace(nullif(personal.tanggaldaftar,''),'.','-') >= '$date1' ".
			" AND replace(nullif(personal.tanggaldaftar,''),'.','-') <= '$date2'";
		}

        $document->setValue('value1', "CETAK TGL: ".(date("d-m-Y"))." TKI $sektor BELUM PSIKOTEST\n ");
        $pop = "SELECT a.id_biodata, a.nama, a.keterangan, IF(b.idbio IS NULL, 1,0) status, b.nilai FROM (
                SELECT id_biodata, nama, ifnull(nullif(nullif(keterangan,0),''),'-') keterangan FROM personal WHERE personal.delete_set = 0 
                AND personal.statterbang <> 1 
                AND ( lower( statusaktif ) = 'proses'
                OR lower( statusaktif ) = 'sudah ada id')
                AND personal.id_biodata LIKE '$sektor-%'
		        AND lower(personal.nama) LIKE '%$nama%'
                $periode
        ) a
        LEFT JOIN (
                SELECT idbio, nilai FROM blk_psikolog_nilai
        ) b ON a.id_biodata = b.idbio HAVING `status` = 1 ORDER BY id_biodata DESC ";
		$data = $this->M_session->select($pop);
        $document->cloneRow('value2',count($data));
      	foreach ($data as $key => $res){
			$key += 1;
			$document->setValue('value2#'.$key, $key);
			$document->setValue('value3#'.$key , $res->id_biodata."\n".$res->nama);
			$document->setValue('value4#'.$key , $res->keterangan);
		}
    }
}