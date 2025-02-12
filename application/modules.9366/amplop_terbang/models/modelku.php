<?php
class Modelku extends CI_Model {
    function __construct() {
        parent::__construct();
    }


    function ambildatanamaNon($tanggal_awal = "", $tanggal_akhir = "", $permintaan="", $opsi="")
    {
        $ambildatavisa = $this->db->query("
		SELECT
			disnaker.id_biodata,
			disnaker.jeniskelamin,
			disnaker.tempatlahir,
			disnaker.tanggallahir,
			visa.novisa,
			visa.tanggalterbang,
			visa.tglberangkat,
			paspor.nopaspor AS paspornya,
			dataagen.nama AS namaagennya,
			personal.nama AS namatkinya,
			disnaker.alamat AS alamattkinya,
			datamajikan.nama AS formalmajikan,
			datamajikan.alamat AS formalalamat,
			majikan.namamajikan AS informalmajikan,
			majikan.alamatmajikan AS informalalamat
		FROM
			disnaker
		LEFT JOIN visa ON disnaker.id_biodata = visa.id_biodata
		LEFT JOIN paspor ON paspor.id_biodata = disnaker.id_biodata
		LEFT JOIN majikan ON majikan.id_biodata = disnaker.id_biodata
		LEFT JOIN dataagen ON majikan.kode_agen = dataagen.id_agen
		LEFT JOIN datamajikan ON majikan.kode_majikan = datamajikan.id_majikan
		LEFT JOIN personal ON disnaker.id_biodata = personal.id_biodata
		WHERE
			visa.tanggalterbang != ''
			".$opsi."
		AND visa.tglberangkat BETWEEN '".str_replace("-", ".",$tanggal_awal)."'
		AND '".str_replace("-", ".",$tanggal_akhir)."'
		AND paspor.keterangan = 'sudah'
		GROUP BY
			paspor.id_biodata
		ORDER BY
			visa.tanggalterbang ASC
		
        ")->result();
        
        $arr = array();

        foreach ($ambildatavisa as $key => $value) {
			if ($permintaan == 'key') {
				$arr[] = $key + 1;
			}else{
				$arr[] = $value->$permintaan;
			}
        }

        return $arr;

	}
	
	function ambildatapersonal($tanggal_awal = "", $tanggal_akhir = "", $permintaan="", $opsi="")
    {
        $ambildatavisa = $this->db->query("
		SELECT
			disnaker.id_biodata,
			disnaker.jeniskelamin,
			disnaker.tempatlahir,
			disnaker.tanggallahir,
			visa.novisa,
			visa.tanggalterbang,
			visa.tglberangkat,
			paspor.nopaspor AS paspornya,
			dataagen.nama AS namaagennya,
			personal.nama AS namatkinya,
			disnaker.alamat AS alamattkinya,
			datamajikan.nama AS formalmajikan,
			datamajikan.alamat AS formalalamat,
			majikan.namamajikan AS informalmajikan,
			majikan.alamatmajikan AS informalalamat
		FROM
			disnaker
		LEFT JOIN visa ON disnaker.id_biodata = visa.id_biodata
		LEFT JOIN paspor ON paspor.id_biodata = disnaker.id_biodata
		LEFT JOIN majikan ON majikan.id_biodata = disnaker.id_biodata
		LEFT JOIN dataagen ON majikan.kode_agen = dataagen.id_agen
		LEFT JOIN datamajikan ON majikan.kode_majikan = datamajikan.id_majikan
		LEFT JOIN personal ON disnaker.id_biodata = personal.id_biodata
		WHERE
			visa.tanggalterbang != ''
			".$opsi."
		AND visa.tglberangkat BETWEEN '".str_replace("-", ".",$tanggal_awal)."'
		AND '".str_replace("-", ".",$tanggal_akhir)."'
		AND paspor.keterangan = 'sudah'
		GROUP BY
			paspor.id_biodata
		ORDER BY
			visa.tanggalterbang ASC
		
        ")->result();
        
        $arr = array();

        foreach ($ambildatavisa as $key => $value) {

			$ambildataskill = $this->db->query("SELECT * FROM personal WHERE id_biodata = '".$value->id_biodata."'")->row();
			$negara1 = "";
			$negara2 = "";
			$calling = "";
			$skill1 = "";
			$skill2 = "";
			$skill3 = "";
				$arr[] = $value->id_biodata.' '.$ambildataskill->negara1.' '.$ambildataskill->negara2.' '.$ambildataskill->calling.' '.$ambildataskill->skill1.' '.$ambildataskill->skill2.' '.$ambildataskill->skill3;
				// $arr[] = $negara1.'-'.$negara2.'-'.$calling.'-'.$skill1.'-'.$skill2.'-'.$skill3;
        }

        return $arr;

    }

    function testData(Type $var = null)
    {
        $mydata = array("ok");
        return $mydata;        
    }

    function ubahdatamod($data, $data1, $nama_table, $kunci, $id){
        $row = explode(",",$data);
        $value = explode(",", $data1);

        $ubah = "";


        for ($i=0; $i < count($row) ; $i++) {
          if ($i == (count($row)-1)) {
            $ubah .= $row[$i]."= '".$value[$i]."'";
           }else{
            $ubah .= $row[$i]."= '".$value[$i]."',";
           }
        }
        $update = $this->db->query("UPDATE $nama_table SET $ubah WHERE $kunci = '$id'");
      
      }


}