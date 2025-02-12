<?php
class M_tambahworking extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

	function tampil_data_jobs(){
		$sql = "SELECT * FROM datajobs";
                $query = $this->db->query($sql);

            return $query->result();
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

	function tampil_data_pekerjaan(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function tampil_data_kategoripekerjaan(){
		$sql = "SELECT id_kategori,isi,mandarin FROM kategoripekerjaan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_penjelasan(){
		$sql = "SELECT datapekerjaan.id_kategori,datapekerjaan.isi,datapekerjaan.mandarin,kategoripekerjaan.isi As kategorinya
				FROM datapekerjaan
				INNER JOIN kategoripekerjaan
				ON datapekerjaan.id_kategori=kategoripekerjaan.id_kategori;";
                $query = $this->db->query($sql);

            return $query->result();
	} 
function tampil_data_posisi(){
		$sql = "SELECT * FROM dataposisi";
                $query = $this->db->query($sql);

            return $query->result();
	} 

function getposisiList(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('kategoripekerjaan');
        $this->db->order_by('isi','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih jenis Usaha-';
            $result[$row->id_kategori]= $row->isi." ".$row->mandarin;
        }

        return $result;
    }

    function getposisiListupdate(){
        $result = array();
        $this->db->select('*');
        $this->db->from('kategoripekerjaan');
        $this->db->order_by('isi','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih jenis Usaha-';
            $result[$row->id_kategori]= $row->isi." ".$row->mandarin;
        }

        return $result;
    }

function getPenjelasanList(){
        $id_kategori = $this->input->post('id_kategori');

	$sql = "SELECT * FROM datapekerjaan where id_kategori='".$id_kategori."'";
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
 





	function tampil_data_alasan(){
		$sql = "SELECT * FROM dataalasan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
	function tampil_data_agama(){
		$sql = "SELECT id_agama,isi,mandarin FROM dataagama";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_pendidikan(){
		$sql = "SELECT id_pedidikan,isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_provinsi(){
		$sql = "SELECT id_provinsi,isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}

		function getnourut($idnya){

		$sql = "SELECT no_urut FROM datasektor WHERE kode_jenis='".$idnya."'";
                $query = $this->db->query($sql);
            return $query->row('no_urut');
	}


		function updateidsektor($idnya,$nourut){

		$sql = "UPDATE datasektor SET no_urut='".$nourut."' WHERE kode_jenis='".$idnya."'";

		$this->db->query($sql);

	}
	function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_working($idnya){
		$sql = "SELECT * FROM working WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

		function tampil_data_workingdetail($idnya,$id_working){
		$sql = "SELECT * FROM working INNER JOIN kategoripekerjaan ON kategoripekerjaan.id_kategori=working.jenis_usaha WHERE id_biodata='".$idnya."' AND id_working='".$id_working."'";
                $query = $this->db->query($sql);

            return $query->result();
	}



	function tambahworking() {
		$player = array();
		$datanya="";

		$player=$this->input->post('penjelasan');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}
		//echo "".$datanya;


            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'negara' => $this->input->post('negara'),
					'jenis_usaha' => $this->input->post('id_kategori'),
					'posisi' => $this->input->post('posisi'),
					'penjelasan' => $datanya,
					'masa_kerja' => $this->input->post('masakerja'),
					'barangdiproduksi' => $this->input->post('barangdiproduksi'),
					'masabulan' => $this->input->post('masabulan'),
					'tahun' => $this->input->post('tahun'),
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'satuan' => $this->input->post('satuan'),
                    'gaji' => $this->input->post('gaji'),
                    'detail_gaji' => $this->input->post('detail_gaji'),
					'alasan' => $this->input->post('alasan'),
				);
			$this->db->insert('working', $data);
	} 

		function ubahworking() {
		$player = array();
		$datanya="";

		$player=$this->input->post('penjelasan');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}
		//echo "".$datanya;


            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'negara' => $this->input->post('negara'),
					'jenis_usaha' => $this->input->post('id_kategori'),
					'posisi' => $this->input->post('posisi'),
					'penjelasan' => $datanya,
					'masa_kerja' => $this->input->post('masakerja'),
					'masabulan' => $this->input->post('masabulan'),
					'tahun' => $this->input->post('tahun'),
					'alasan' => $this->input->post('alasan'),
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'satuan' => $this->input->post('satuan'),
                    'gaji' => $this->input->post('gaji'),
                    'detail_gaji' => $this->input->post('detail_gaji'),
                    'alasan' => $this->input->post('alasan'),
				);
            $this->db->where('id_working', $this->input->post('idworking'));
			$this->db->update('working', $data);
		//	$this->db->insert('working', $data);
	} 

	function hapus_working($id) {
			$this->db->where('id_working', $id);
			$this->db->delete('working');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
	}



}
?>