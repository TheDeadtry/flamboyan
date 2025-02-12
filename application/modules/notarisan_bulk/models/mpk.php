<?php
class Mpk extends CI_Model{

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

        $document->setValue('value1', "CETAK TGL: ".(date("d-m-Y"))." TKI $sektor BELUM NOTARISAN\n ");
        $pop = "SELECT personal.nama,personal.id_biodata, ifnull(nullif(nullif(personal.keterangan,0),''),'-') keterangan FROM personal 
		LEFT JOIN notarisan ON personal.id_biodata=notarisan.id_biodata
		WHERE notarisan.id_biodata IS NULL 
		AND (lower( statusaktif ) = 'proses'
		or lower( statusaktif ) = 'sudah ada id' )
		AND ( personal.id_biodata LIKE '$sektor-%'
		AND lower(personal.nama) LIKE '%$nama%' )
        $periode
        ORDER BY personal.id_personal DESC ";
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