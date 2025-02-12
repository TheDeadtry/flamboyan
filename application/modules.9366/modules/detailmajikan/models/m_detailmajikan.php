<?php
class M_detailmajikan extends CI_Model{
    function __construct(){
        parent::__construct();
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
        $this->db->order_by('kode_group','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih No Group-';
            $result[$row->kode_group]= $row->nama;
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

       function tampilmajikandatanya($idnya){
        $sql = "SELECT *
FROM majikan
INNER JOIN dataagen
ON majikan.kode_agen=dataagen.id_agen WHERE majikan.id_biodata='".$idnya."'";
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
       
            );
        $this->db->where('id_biodata', $id);
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

}
?>