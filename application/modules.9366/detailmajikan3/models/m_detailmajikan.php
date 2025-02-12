<?php
class M_detailmajikan extends CI_Model{

var $datamajikan='datamajikan';
var $datasuhan='datasuhan';
var $datavisapermit='datavisapermit';

    function __construct(){
        parent::__construct();
    }
 
    function getagenList(){
        $kode_group = $this->input->post('kode_group');
    $sql = "SELECT * FROM dataagen where kode_group='".$kode_group."'";
                $query = $this->db->query($sql);
            return $query->result();
    }

        function getagenlist_group($idgrup){

    
        $result = array();
        $this->db->select('*');
        $this->db->from('dataagen');
        $this->db->where('kode_group',$idgrup);
        $this->db->order_by('kode_group','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Agen-';
            $result[$row->id_agen]= $row->kode_agen.' : '. $row->nama;
        }

        return $result;
    }



        function getmajikanlist_agen($kodeagen){
        $result = array();
        $this->db->select('*');
        $this->db->from('datamajikan');
        $this->db->where('kode_agen',$kodeagen);
        $this->db->order_by('nama','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Majikan-';
            $result[$row->id_majikan]= $row->nama;
        }
        return $result;
    }


        function getsuhanlist_majikan($kodemajikan){
        $result = array();
        $this->db->select('*');
        $this->db->from('datasuhan');
        $this->db->where('id_majikan',$kodemajikan);
        $this->db->order_by('id_majikan','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih No Suhan-';
            $result[$row->id_suhan]= $row->no_suhan;
        }
        return $result;
    }

            function getvisapermitlist_suhan($idsuhan){
        $result = array();
        $this->db->select('*');
        $this->db->from('datavisapermit');
        $this->db->where('id_suhan',$idsuhan);
        $this->db->order_by('id_suhan','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih No Visa Permit-';
            $result[$row->id_visapermit]= $row->no_visapermit;
        }
        return $result;
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
	
	function tampil_data_skillnya(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
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


 function tampilanmf($idnya){
        $sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }


	function hitung_data_majikan($idnya){
		$sql = "SELECT count(*) as total FROM majikan WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

    function getposisiList_group(){

    
        $result = array();
        $this->db->select('*');
        $this->db->from('datagroup');
        $this->db->order_by('id_group','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Group-';
            $result[$row->id_group]= $row->nama;
        }

        return $result;
    }

    function simpan_data_majikan($kode, $nama, $hp, $email,$alamat,$status){
        $data = array(
            'kode_majikan'=>$kode, 
            'nama'=>$nama,
            'hp'=>$hp, 
            'email'=>$email, 
            'alamat'=>$alamat, 
            'status'=>$status, 
            );
        $this->db->insert('datamajikan',$data);
    }
			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_majikan($idnya){
		$sql = "SELECT *,majikan.kode_agen AS kdoeagenya FROM majikan 
JOIN datasuhan ON majikan.id_majikannya=datasuhan.id_majikan 
JOIN datavisapermit ON majikan.id_majikannya=datavisapermit.id_majikan 
JOIN datamajikan ON majikan.id_majikannya=datamajikan.id_majikan 
WHERE majikan.id_biodata='".$idnya."' LIMIT 1";
                $query = $this->db->query($sql);

            return $query->result();
	}

                    function tampil_data_majikanformal($idnya){
        $sql = "SELECT *, datagroup.nama as namagroup1,majikan.id_majikan as idmajikanmu, dataagen.nama as namaagen1, datasuhan.no_suhan as nosuhan1, datavisapermit.no_visapermit as novisapermit1, datamajikan.nama as namamajikan1
FROM majikan 
LEFT JOIN datagroup 
ON majikan.kode_group=datagroup.id_group
LEFT JOIN dataagen
ON majikan.kode_agen=dataagen.id_agen
LEFT JOIN datasuhan 
ON majikan.kode_suhan=datasuhan.id_suhan 
LEFT JOIN datavisapermit 
ON majikan.kode_visapermit=datavisapermit.id_visapermit 
LEFT JOIN datamajikan 
ON majikan.kode_majikan=datamajikan.id_majikan 
WHERE majikan.id_biodata='".$idnya."';";
                $query = $this->db->query($sql);

            return $query->result();
    }

       function tampilmajikandatanya($idnya){
        $sql = "SELECT *,datagroup.nama as namagroupnya, dataagen.nama as namaagennya
FROM majikan
INNER JOIN dataagen
ON majikan.kode_agen=dataagen.id_agen 
INNER JOIN datagroup
ON majikan.kode_group=datagroup.id_group
WHERE majikan.id_biodata='".$idnya."'";
                $query = $this->db->query($sql);
            return $query->result();
    }

           function tampilmajikandatanyaformal($idnya){
        $sql = "SELECT *,datagroup.nama as namagroupnya,majikan.id_majikan as idmajikanmu, dataagen.nama as namaagennya, datasuhan.no_suhan as nosuhannya, datavisapermit.no_visapermit as novisapermitnya , datamajikan.nama as namamajikannya
FROM majikan
LEFT JOIN dataagen
ON majikan.kode_agen=dataagen.id_agen 
LEFT JOIN datagroup
ON majikan.kode_group=datagroup.id_group
LEFT JOIN datasuhan
ON majikan.kode_suhan=datasuhan.id_suhan
LEFT JOIN datavisapermit
ON majikan.kode_visapermit=datavisapermit.id_visapermit
LEFT JOIN datamajikan
ON majikan.kode_majikan=datamajikan.id_majikan
WHERE majikan.id_majikan='$idnya'";
                $query = $this->db->query($sql);
            return $query->result();
    }



                    function tampildatanya($idnya){
        $sql = "SELECT * FROM majikan WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }


    function tampil_data_majikanfi(){
        $sql = "SELECT * FROM datamajikan";
                $query = $this->db->query($sql);

            return $query->result();
    } 

	function tampil_data_agen(){
		$sql = "SELECT * FROM dataagen";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_group(){
		$sql = "SELECT * FROM datagroup";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	
	function tambahmajikan() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'kode_group' => $this->input->post('group'),
                    'kode_agen' => $this->input->post('kodeagen'),
					'kode_majikan' => $this->input->post('kode_majikan'),
                    'kode_suhan' => $this->input->post('id_suhan'),
                    'kode_visapermit' => $this->input->post('id_visapermit'),


					'id_majikannya' => $this->input->post('id_majikannya'),
					'id_suhan' => $this->input->post('suhan'),
					'id_visapermit' => $this->input->post('visapermit'),
					'tglterpilih' => $this->input->post('terpilih'),
					'JD	' => $this->input->post('jd'),
					'tglterbang' => $this->input->post('terbang'),
                    'statustglterbang' => $this->input->post('terbanga'),
				
                'tglpk' => $this->input->post('tglpk'),
                'namamajikan' => $this->input->post('namamajikan'),
                 'namataiwan' => $this->input->post('namataiwan'),
                  'notelpmajikan' => $this->input->post('notelpmajikan'),
                 'alamatmajikan' => $this->input->post('alamatmajikan'),
                 'id_suhan' => $this->input->post('suhan'),
                 'tglterbitsuhan' => $this->input->post('tglterbitsuhan'),
                 'tglterimasuhan' => $this->input->post('tglterimasuhan'),
                 'ketsuhan' => $this->input->post('ketsuhan'),

                 'id_visapermit' => $this->input->post('visapermit'),
                 'tglterbitpermit' => $this->input->post('tglterbitpermit'),
                 'tglterimapermit' => $this->input->post('tglterimapermit'),
                 'ketpermit' => $this->input->post('ketpermit'),

				);
			$this->db->insert('majikan', $data);
	} 

        function tambahmajikanfi() {
                 $data = array(  
                    'id_biodata' => $this->input->post('idbiodata'),
                    'kode_group' => $this->input->post('group'),
                    'kode_agen' => $this->input->post('kodeagen'),
                    'id_majikannya' => $this->input->post('id_majikannya'),
                    'id_suhan' => $this->input->post('suhan'),
                    'id_visapermit' => $this->input->post('visapermit'),
                    'tglterpilih' => $this->input->post('terpilih'),
                    'JD ' => $this->input->post('jd'),
                    'tglterbang' => $this->input->post('terbang'),
                    'statustglterbang' => $this->input->post('terbanga'),

                'tglpk' => $this->input->post('tglpk'),
                'namamajikan' => $this->input->post('namamajikan'),
                 'namataiwan' => $this->input->post('namataiwan'),
                 'notelpmajikan' => $this->input->post('notelpmajikan'),
                 'alamatmajikan' => $this->input->post('alamatmajikan'),
                 'id_suhan' => $this->input->post('suhan'),
                 'tglterbitsuhan' => $this->input->post('tglterbitsuhan'),
                 'tglterimasuhan' => $this->input->post('tglterimasuhan'),
                 'ketsuhan' => $this->input->post('ketsuhan'),
                 'id_visapermit' => $this->input->post('visapermit'),
                 'tglterbitpermit' => $this->input->post('tglterbitpermit'),
                 'tglterimapermit' => $this->input->post('tglterimapermit'),
                 'ketpermit' => $this->input->post('ketpermit'),

                );
            $this->db->insert('majikan', $data);
    } 

	function ubahmajikan() {
 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	
					'id_majikannya' => $this->input->post('id_majikannya'),
					'id_suhan' => $this->input->post('suhan'),
					'id_visapermit' => $this->input->post('visapermit'),
					'tglterpilih' => $this->input->post('terpilih'),
					'JD	' => $this->input->post('jd'),
					'tglterbang' => $this->input->post('terbang'),
                    'statustglterbang' => $this->input->post('terbanga'),
				
                'tglpk' => $this->input->post('tglpk'),
                'namamajikan' => $this->input->post('namamajikan'),
                 'namataiwan' => $this->input->post('namataiwan'),
                 'notelpmajikan' => $this->input->post('notelpmajikan'),
                 'alamatmajikan' => $this->input->post('alamatmajikan'),
                 'tglterbitsuhan' => $this->input->post('tglterbitsuhan'),
                 'tglterimasuhan' => $this->input->post('tglterimasuhan'),
                 'ketsuhan' => $this->input->post('ketsuhan'),
                 'tglterbitpermit' => $this->input->post('tglterbitpermit'),
                 'tglterimapermit' => $this->input->post('tglterimapermit'),
                 'ketpermit' => $this->input->post('ketpermit'),

				);
			//$this->db->insert('majikanpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('majikan', $data);
	}

    function ubahmajikanform() {
 $data = array(  
                     'tglpk' => $this->input->post('tglpk'),
                    'tglterpilih' => $this->input->post('terpilih'),
                    'JD ' => $this->input->post('jd'),
                    'tglterbang' => $this->input->post('terbang'),
                );
            //$this->db->insert('majikanpermit', $data);
            $this->db->where('id_majikan', $this->input->post('id_majikan'));
            $this->db->update('majikan', $data);
    }
        function hapus_majikanform() {
        $id = $this->input->post('id_majikan');
        $this->db->where('id_majikan', $id);
        $this->db->delete('majikan');
    }


	function getmajikanList(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('datamajikan');
        $this->db->order_by('nama','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Majikan-';
            $result[$row->id_majikan]= $row->nama;
        }

        return $result;
    }

    function getSuhanList(){
        $id_majikan = $this->input->post('id_majikan');

	$sql = "SELECT * FROM datasuhan where id_majikan='".$id_majikan."'";
                $query = $this->db->query($sql);

            return $query->result();


        // $result = array();
        // $this->db->select('*');
        // $this->db->from('datapekerjaan');
        // $this->db->where('id_kategori',$id_kategori);
        // $this->db->order_by('isi','ASC');
        // $array_keys_values = $this->db->get();
        // foreach ($array_keys_values->result() as $row)
        // {
        //     $result[0]= '-Pilih Penjelasan Pekerjaan-';
        //     $result[$row->id_pekerjaan]= $row->isi;
        // }
        // return $result;
    } 

        function ubahgrupmajikan() {
        $id = $this->input->post('id_majikan');
       
        $data = array(
         'kode_group' => $this->input->post('group'),
                    'kode_agen' => $this->input->post('kodeagen'),
                    'kode_majikan' => $this->input->post('kode_majikan'),
                    'kode_suhan' => $this->input->post('id_suhan'),
                    'kode_visapermit' => $this->input->post('id_visapermit'),

       
            );
        $this->db->where('id_biodata', $id);
        $this->db->update('majikan', $data);
    }

            function ubahgrupmajikanformal() {
        $id = $this->input->post('id_majikan');
        $data = array(
         'kode_group' => $this->input->post('group'),
                    'kode_agen' => $this->input->post('kodeagen'),
                    'kode_majikan' => $this->input->post('kode_majikan'),
                    'kode_suhan' => $this->input->post('id_suhan'),
                    'kode_visapermit' => $this->input->post('id_visapermit'),

       
            );
        $this->db->where('id_majikan', $id);
        $this->db->update('majikan', $data);
    }




        function getvisapermitList(){
        $id_majikan = $this->input->post('id_majikan');

	$sql = "SELECT * FROM datavisapermit where id_majikan='".$id_majikan."'";
                $query = $this->db->query($sql);

            return $query->result();


        // $result = array();
        // $this->db->select('*');
        // $this->db->from('datapekerjaan');
        // $this->db->where('id_kategori',$id_kategori);
        // $this->db->order_by('isi','ASC');
        // $array_keys_values = $this->db->get();
        // foreach ($array_keys_values->result() as $row)
        // {
        //     $result[0]= '-Pilih Penjelasan Pekerjaan-';
        //     $result[$row->id_pekerjaan]= $row->isi;
        // }
        // return $result;
    } 


public function ambil_majikan() {
    $sql_prov=$this->db->get($this->datamajikan);    
    if($sql_prov->num_rows()>0){
        foreach ($sql_prov->result_array() as $row)
            {
                $result['-']= '- Pilih Majikan -';
                $result[$row['id_majikan']]= ucwords(strtolower($row['nama']));
            }
            return $result;
        }
    }
    
    public function ambil_suhan($kode_prop){
    $this->db->where('id_majikan',$kode_prop);
    $this->db->order_by('no_suhan','asc');
    $sql_kabupaten=$this->db->get($this->datasuhan);
    if($sql_kabupaten->num_rows()>0){

        foreach ($sql_kabupaten->result_array() as $row)
        {
            $result[$row['no_suhan']]= ucwords(strtolower($row['no_suhan']));
        }
        } else {
           $result['-']= '- Belum Ada Majikanaaa -';
        }
        return $result;
    }
    
    public function ambil_visapermit($kode_kab){
    $this->db->where('no_suhan',$kode_kab);
    $this->db->order_by('no_visapermit','asc');
    $sql_kecamatan=$this->db->get($this->datavisapermit);
    if($sql_kecamatan->num_rows()>0){

        foreach ($sql_kecamatan->result_array() as $row)
        {
            $result[$row['id_visapermit']]= ucwords(strtolower($row['no_visapermit']));
        }
        } else {
           $result['-']= '- Belum Ada Suhan  -';
        }
        return $result;
    }


}
?>