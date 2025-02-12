<?php 
class M_detailkettugas extends CI_Model {
	function __construct(){
        parent::__construct();
    }

    function tampil_data_kettugas($idnya) {
    	$sql = "SELECT kettugas.*, personal.foto, personal.nama FROM kettugas 
    			JOIN personal ON kettugas.id_biodata = personal.id_biodata 
    			WHERE kettugas.id_biodata='$idnya'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function hitung_data_kettugas($idnya) {
    	$sql = "SELECT kettugas.*, personal.foto, personal.nama FROM kettugas 
    			JOIN personal ON kettugas.id_biodata = personal.id_biodata 
    			WHERE kettugas.id_biodata='$idnya'";
    	$tampil = $this->db->query($sql);
    	return $tampil->num_rows();
    }
  function tampil_data_personal($idnya){
        $sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
    function tambah_kettugas() {
    	$idid = $this->input->post('idbiodata');
    	// $t1_pengalaman = $this->input->post('t1_1');
    	// $t1_pengalaman=str_replace("0","", $t1_pengalaman);
    	$data = array(
    		'id_biodata' => $idid,
	    	't1_pengalaman' => $this->input->post('t1_1'),
	 		't1_latihan' => $this->input->post('t1_2'),
			't1_bersedia' => $this->input->post('t1_3'),
			't2_pengalaman' => $this->input->post('t2_1'),
	 		't2_latihan' => $this->input->post('t2_2'),
			't2_bersedia' => $this->input->post('t2_3'),
			't3_pengalaman' => $this->input->post('t3_1'),
	 		't3_latihan' => $this->input->post('t3_2'),
			't3_bersedia' => $this->input->post('t3_3'),
			't4_pengalaman' => $this->input->post('t4_1'),
			't4_latihan' => $this->input->post('t4_2'),
			't4_bersedia' => $this->input->post('t4_3'),
			't5_pengalaman' => $this->input->post('t5_1'),
	 		't5_bersedia' => $this->input->post('t5_3'),
			't6_pengalaman' => $this->input->post('t6_1'),
			't6_bersedia' => $this->input->post('t6_3'),
			't7_pengalaman' => $this->input->post('t7_1'),
	 		't7_bersedia' => $this->input->post('t7_3'),
			't8_pengalaman' => $this->input->post('t8_1'),
			't8_bersedia' => $this->input->post('t8_3'),
			't9_pengalaman' => $this->input->post('t9_1'),
			't9_bersedia' => $this->input->post('t9_3'),
			't10_pengalaman' => $this->input->post('t10_1'),
			't10_latihan' => $this->input->post('t10_2'),
			't10_bersedia' => $this->input->post('t10_3'),
			't11_pengalaman' => $this->input->post('t11_1'),
			't11_latihan' => $this->input->post('t11_2'),
			't11_bersedia' => $this->input->post('t11_3'),
			't12_pengalaman' => $this->input->post('t12_1'),
			't12_bersedia' => $this->input->post('t12_3'),
			't13_pengalaman' => $this->input->post('t13_1'),
			't13_bersedia' => $this->input->post('t13_3'),
			't14apengalaman' => $this->input->post('t14a1'),
			't14abersedia' => $this->input->post('t14a3'),
			't14bpengalaman' => $this->input->post('t14b1'),
			't14bbersedia' => $this->input->post('t14b3'),
			't15_pengalaman' => $this->input->post('t15_1'),
			't15_bersedia' => $this->input->post('t15_3'),
			't16_pengalaman' => $this->input->post('t16_1'),
			't16_bersedia' => $this->input->post('t16_3'),
			't17_pengalaman' => $this->input->post('t17_1'),
			't17_bersedia' => $this->input->post('t17_3'),
			't18_pengalaman' => $this->input->post('t18_1'),
			't18_bersedia' => $this->input->post('t18_3'),
			't19_pengalaman' => $this->input->post('t19_1'),
			't19_bersedia' => $this->input->post('t19_3'),
			't20_pengalaman' => $this->input->post('t20_1'),
			't20_bersedia' => $this->input->post('t20_3'),
			't21_pengalaman' => $this->input->post('t21_1'),
			't21_bersedia' => $this->input->post('t21_3'),
			't22_pengalaman' => $this->input->post('t22_1'),
			't22_bersedia' => $this->input->post('t22_3'),
			't23_pengalaman' => $this->input->post('t23_1'),
			't23_bersedia' => $this->input->post('t23_3'),
			't24_pengalaman' => $this->input->post('t24_1'),
			't24_bersedia' => $this->input->post('t24_3'),
			't25_pengalaman' => $this->input->post('t25_1'),
			't25_bersedia' => $this->input->post('t25_3'),
			't26_pengalaman' => $this->input->post('t26_1'),
			't26_bersedia' => $this->input->post('t26_3'),
			't27_pengalaman' => $this->input->post('t27_1'),
			't27_bersedia' => $this->input->post('t27_3'),
			't28_pengalaman' => $this->input->post('t28_1'),
			't28_bersedia' => $this->input->post('t28_3'),
			't29_pengalaman' => $this->input->post('t29_1'),
			't29_bersedia' => $this->input->post('t29_3'),
			't30_pengalaman' => $this->input->post('t30_1'),
			't30_bersedia' => $this->input->post('t30_3'),
			't31_pengalaman' => $this->input->post('t31_1'),
			't31_bersedia' => $this->input->post('t31_3'),
			't32_pengalaman' => $this->input->post('t32_1'),
			't32_bersedia' => $this->input->post('t32_3'),
			't33_pengalaman' => $this->input->post('t33_1'),
			't33_bersedia' => $this->input->post('t33_3'),
			't34_pengalaman' => $this->input->post('t34_1'),
			't34_bersedia' => $this->input->post('t34_3'),		
			't35_kg' => $this->input->post('t35_kg'),
		);
		$this->db->insert('kettugas',$data);
	}
	
	function update_kettugas() {
		$idid = $this->input->post('idbiodata');
    	$data = array(
    		'id_biodata' => $idid,
	    	't1_pengalaman' => $this->input->post('t1_1'),
	 		't1_latihan' => $this->input->post('t1_2'),
			't1_bersedia' => $this->input->post('t1_3'),
			't2_pengalaman' => $this->input->post('t2_1'),
	 		't2_latihan' => $this->input->post('t2_2'),
			't2_bersedia' => $this->input->post('t2_3'),
			't3_pengalaman' => $this->input->post('t3_1'),
	 		't3_latihan' => $this->input->post('t3_2'),
			't3_bersedia' => $this->input->post('t3_3'),
			't4_pengalaman' => $this->input->post('t4_1'),
			't4_latihan' => $this->input->post('t4_2'),
			't4_bersedia' => $this->input->post('t4_3'),
			't5_pengalaman' => $this->input->post('t5_1'),
	 		't5_bersedia' => $this->input->post('t5_3'),
			't6_pengalaman' => $this->input->post('t6_1'),
			't6_bersedia' => $this->input->post('t6_3'),
			't7_pengalaman' => $this->input->post('t7_1'),
	 		't7_bersedia' => $this->input->post('t7_3'),
			't8_pengalaman' => $this->input->post('t8_1'),
			't8_bersedia' => $this->input->post('t8_3'),
			't9_pengalaman' => $this->input->post('t9_1'),
			't9_bersedia' => $this->input->post('t9_3'),
			't10_pengalaman' => $this->input->post('t10_1'),
			't10_latihan' => $this->input->post('t10_2'),
			't10_bersedia' => $this->input->post('t10_3'),
			't11_pengalaman' => $this->input->post('t11_1'),
			't11_latihan' => $this->input->post('t11_2'),
			't11_bersedia' => $this->input->post('t11_3'),
			't12_pengalaman' => $this->input->post('t12_1'),
			't12_bersedia' => $this->input->post('t12_3'),
			't13_pengalaman' => $this->input->post('t13_1'),
			't13_bersedia' => $this->input->post('t13_3'),
			't14apengalaman' => $this->input->post('t14a1'),
			't14abersedia' => $this->input->post('t14a3'),
			't14bpengalaman' => $this->input->post('t14b1'),
			't14bbersedia' => $this->input->post('t14b3'),
			't15_pengalaman' => $this->input->post('t15_1'),
			't15_bersedia' => $this->input->post('t15_3'),
			't16_pengalaman' => $this->input->post('t16_1'),
			't16_bersedia' => $this->input->post('t16_3'),
			't17_pengalaman' => $this->input->post('t17_1'),
			't17_bersedia' => $this->input->post('t17_3'),
			't18_pengalaman' => $this->input->post('t18_1'),
			't18_bersedia' => $this->input->post('t18_3'),
			't19_pengalaman' => $this->input->post('t19_1'),
			't19_bersedia' => $this->input->post('t19_3'),
			't20_pengalaman' => $this->input->post('t20_1'),
			't20_bersedia' => $this->input->post('t20_3'),
			't21_pengalaman' => $this->input->post('t21_1'),
			't21_bersedia' => $this->input->post('t21_3'),
			't22_pengalaman' => $this->input->post('t22_1'),
			't22_bersedia' => $this->input->post('t22_3'),
			't23_pengalaman' => $this->input->post('t23_1'),
			't23_bersedia' => $this->input->post('t23_3'),
			't24_pengalaman' => $this->input->post('t24_1'),
			't24_bersedia' => $this->input->post('t24_3'),
			't25_pengalaman' => $this->input->post('t25_1'),
			't25_bersedia' => $this->input->post('t25_3'),
			't26_pengalaman' => $this->input->post('t26_1'),
			't26_bersedia' => $this->input->post('t26_3'),
			't27_pengalaman' => $this->input->post('t27_1'),
			't27_bersedia' => $this->input->post('t27_3'),
			't28_pengalaman' => $this->input->post('t28_1'),
			't28_bersedia' => $this->input->post('t28_3'),
			't29_pengalaman' => $this->input->post('t29_1'),
			't29_bersedia' => $this->input->post('t29_3'),
			't30_pengalaman' => $this->input->post('t30_1'),
			't30_bersedia' => $this->input->post('t30_3'),
			't31_pengalaman' => $this->input->post('t31_1'),
			't31_bersedia' => $this->input->post('t31_3'),
			't32_pengalaman' => $this->input->post('t32_1'),
			't32_bersedia' => $this->input->post('t32_3'),
			't33_pengalaman' => $this->input->post('t33_1'),
			't33_bersedia' => $this->input->post('t33_3'),
			't34_pengalaman' => $this->input->post('t34_1'),
			't34_bersedia' => $this->input->post('t34_3'),		
			't35_kg' => $this->input->post('t35_kg'),
		);
		$this->db->where('id_biodata', $idid);
    	$this->db->update('kettugas', $data);	
	}
}