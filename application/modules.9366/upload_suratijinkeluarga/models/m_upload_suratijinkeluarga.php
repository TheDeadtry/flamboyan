<?php
class M_upload_suratijinkeluarga extends CI_Model{
    function __construct(){
        parent::__construct();
    }

 function simpan_foto_suratijinkeluarga($idbio){

 		$nmfile =time().$idbio; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path']   = FCPATH.'/upload-suratijinkeluarga/';
		if(!file_exists($config['upload_path'])){
			mkdir($config['upload_path'],0777,true);
		}
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx';
        $config['file_name'] = $nmfile;
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$gbr = $this->upload->data();

        	$token=$this->input->post('token_foto');
        	$nmfile=$gbr['file_name'];
        	$idbiox=$idbio;
        	$jenisdata="suratijinkeluarga";

        	$this->db->insert('foto',array('id_biodata'=>$idbiox,'token'=>$token,'jenis'=>$jenisdata,'namafile'=>$nmfile));
        }
	}

	 function hapus_foto_suratijinkeluarga(){

		//Ambil token foto
		$token=$this->input->post('token');

		
		$foto=$this->db->get_where('foto',array('token'=>$token));


		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->nama_foto;
			if(file_exists($file=FCPATH.'/upload-suratijinkeluarga/'.$nama_foto)){
				unlink($file);
			}
			$this->db->delete('foto',array('token'=>$token));

		}


		echo "{}";
	}


	function simpan_data_suratijinkeluarga() {
		$curr_timestamp = date("Y_m_d H:i:s");
		
		$this->load->library('upload');
		$this->load->library('image_lib');

		$nmfile =time().$this->input->post('idbiodata'); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/upload_suratijinkeluarga/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		$config['image_library'] = 'gd2';
		$config['quality']      = 10;

		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
            	 $data = array(
            	 	'id_biodata'=>$this->input->post('idbiodata'),
					'namadok'=>$this->input->post('namadok'),
					'penting'=>$this->input->post('penting'),
					'cekdokumen'=>$this->input->post('cekdokumen'),
					'tglterima'=>$this->input->post('tglterima'),
					'keterangan'=>$this->input->post('keterangan'),
				);
			$this->db->insert('upload_suratijinkeluarga', $data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'id_biodata'=>$this->input->post('idbiodata'),
					'namadok'=>$this->input->post('namadok'),
					'penting'=>$this->input->post('penting'),
					'cekdokumen'=>$this->input->post('cekdokumen'),
					'tglterima'=>$this->input->post('tglterima'),
					'keterangan'=>$this->input->post('keterangan'),
					'file' => $gbr['file_name'],

					
				);
			$this->db->insert('upload_suratijinkeluarga', $data);
			
			}
		}
	}

function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_suratijinkeluarga($idnya){
		$sql = "SELECT * FROM upload_suratijinkeluarga WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function ambildatafoto($idnya){
		$sql = "SELECT * FROM foto WHERE id_biodata='".$idnya."' AND jenis='suratijinkeluarga'";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function hitungan($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as hitungan FROM upload_suratijinkeluarga WHERE id_biodata='".$idnya."'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['hitungan'];
			}
		return $kode_desa;
	}


	function update_data_suratijinkeluarga() {
		$id_suratijinkeluarga =$this->input->post('id_suratijinkeluarga');
		
		$this->load->library('upload');
		$nmfile =$this->input->post('namafile'); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/upload_suratijinkeluarga/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
            	 $data = array(
					'namadok'=>$this->input->post('namadok'),
					'penting'=>$this->input->post('penting'),
					'cekdokumen'=>$this->input->post('cekdokumen'),
					'tglterima'=>$this->input->post('tglterima'),
					'keterangan'=>$this->input->post('keterangan'),
				);
			$this->db->where('id_suratijinkeluarga', $id_suratijinkeluarga);
		$this->db->update('upload_suratijinkeluarga', $data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'namadok'=>$this->input->post('namadok'),
					'penting'=>$this->input->post('penting'),
					'cekdokumen'=>$this->input->post('cekdokumen'),
					'tglterima'=>$this->input->post('tglterima'),
					'keterangan'=>$this->input->post('keterangan'),
					'file' => $gbr['file_name'],

					
				);
			$this->db->where('id_suratijinkeluarga', $id_suratijinkeluarga);
		$this->db->update('upload_suratijinkeluarga', $data);
			
			}
		}


		
	}

	function hapus_data_suratijinkeluarga() {
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('foto');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataagama', array('id_agama' => $id))->row();
	}
 
}
?>