<?php
class M_markformal extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function tampil_data_personal() {
		$sql = "SELECT 
personal.id_biodata, 
personal.nama, 
personal.nama_mandarin,
personal.keterangan,
marka_biotoagen.tgl_to_agen,
marka_biotoagen.nama_agen,
disnaker.nodisnaker,
disnaker.tglonline,
disnaker.perkiraan,
dicoba.nopaspor,
dicoba.tglpengajuan,
dicoba.statuspengajuan,
dicoba.tglterima,
dicoba.statusterima,
dicoba.tglfoto,
dicoba.statusfoto,
majikan.tglterpilih,
majikan.JD,
majikan.tglterbang,
majikan.namamajikan,
majikan.namataiwan,
majikan.statustglterbang,
majikan.tglpk,
majikan.id_suhan,
majikan.tglterimasuhan,
majikan.tglterbitsuhan,
majikan.ketsuhan,
DATE_ADD(majikan.tglterbitsuhan, INTERVAL 6 month) as expiredsuhan,
majikan.id_visapermit,
majikan.tglterimapermit,
majikan.tglterbitpermit,
majikan.ketpermit,
DATE_ADD(majikan.tglterbitpermit, INTERVAL 6 month) as expiredpermit,
terbang.tanggalterbang,
terbang.statustgl,
terbang.tiket,
terbang.tglberangkat,
dataterbangx.ruteterbang,
dataterbangx.ruteterbang2,
skck.pengajuan,
skck.statuspengajuan,
skck.terima,
skck.statusterima AS statusterimaskck,
DATE_ADD(skck.tglexp, INTERVAL 6 month) as expskck,
skck.tglexp,
skck.statusexp,
visa.kocokan,
visa.statuskocokan,
visa.finger,
visa.statusfinger,
visa.terima AS terimavisa,
visa.statusterima AS statusterimavisa,
visa.pap,
visa.statuspap,
visa.ktkln,
visa.statusktkln,
markf.tgl_bank,
medicalnya.tanggal AS tglmed,
medicalnya.expmedical AS tglexpmed,
medicalnya3.tanggal AS tglmed3,
medicalnya3.expmedical3 AS tglexpmed3,
DATE_ADD(dicoba2.tglterbit, INTERVAL 6 year) as exppasporlama
FROM personal
LEFT JOIN marka_biotoagen
ON personal.id_biodata=marka_biotoagen.id_biodata
LEFT JOIN disnaker
ON personal.id_biodata=disnaker.id_biodata
LEFT JOIN ( SELECT paspor.* FROM paspor ORDER BY paspor.id_paspor DESC LIMIT 1) AS dicoba
ON personal.id_biodata = dicoba.id_biodata
LEFT JOIN ( SELECT pasporlama.* FROM pasporlama ORDER BY pasporlama.id_paspor DESC LIMIT 1) AS dicoba2
ON personal.id_biodata = dicoba2.id_biodata
LEFT JOIN majikan
ON personal.id_biodata=majikan.id_biodata
LEFT JOIN terbang
ON personal.id_biodata=terbang.id_biodata
LEFT JOIN ( SELECT dataterbang.* FROM dataterbang) AS dataterbangx
ON terbang.id_terbang = dataterbangx.id_terbang
LEFT JOIN skck
ON personal.id_biodata=skck.id_biodata
LEFT JOIN visa
ON personal.id_biodata=visa.id_biodata
LEFT JOIN markf
ON personal.id_biodata=markf.id_biodata
LEFT JOIN ( SELECT medical.*,DATE_ADD(medical.tanggal, INTERVAL 3 month) as expmedical FROM medical ORDER BY medical.id_medical ASC LIMIT 1) AS medicalnya
ON personal.id_biodata = medicalnya.id_biodata
LEFT JOIN ( SELECT medical3.*,DATE_ADD(medical3.tanggal, INTERVAL 3 month) as expmedical3 FROM medical3 ORDER BY medical3.id_medical ASC LIMIT 1) AS medicalnya3
ON personal.id_biodata = medicalnya3.id_biodata
WHERE personal.id_biodata LIKE 'FF%' OR personal.id_biodata LIKE 'MF%' OR personal.id_biodata LIKE 'JP%'";
        $query = $this->db->query($sql);
        return $query->result();
	} 


}
?>