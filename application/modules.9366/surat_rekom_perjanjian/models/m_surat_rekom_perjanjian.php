<?php
class M_surat_rekom_perjanjian extends CI_Model{
    function __construct(){
        parent::__construct();
    }

 function tampil_data_personal($id_bio){
		$sql = "SELECT * FROM pembuatan_perjanjian
				INNER JOIN personal
				ON pembuatan_perjanjian.id_tki = personal.id_biodata
                WHERE personal.id_biodata='$id_bio'";
                $query = $this->db->query($sql);

            return $query->result();
	}

        function nama_bapak($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM family
WHERE id_biodata='$id_siswa'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
            }
        return $kode_desa;
    }

 function tampil_data_tki(){
        $sql = "SELECT * FROM personal ";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function tampil_data_namadisnaker(){
        $sql = "SELECT * FROM datanamadisnaker";
                $query = $this->db->query($sql);

            return $query->result();
    }

 function simpan_data_surat($id_bio){

        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $lembur = $this->input->post('lembur');
        $namasaksi = $this->input->post('namasaksi');
        $hubungan = $this->input->post('hubungan');
        $namadinas = $this->input->post('namadinas');
        $tanggal = $this->input->post('tanggal');
        $a1 = $this->input->post('a1');
        $a2 = $this->input->post('a2');
        $a3 = $this->input->post('a3');
        $a4 = $this->input->post('a4');
        $a5 = $this->input->post('a5');
        $a6 = $this->input->post('a6');
        $a7 = $this->input->post('a7');

        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'lembur' => $lembur,
            'namasaksi' => $namasaksi,
            'hubsaksi' => $hubungan,
            'namadinas' => $namadinas,
            'tanggal' => $tanggal,
            'a1' => $a1,
            'a2' => $a2,
            'a3' => $a3,
            'a4' => $a4,
            'a5' => $a5,
            'a6' => $a6,
            'a7' => $a7,
            );

        $this->db->insert('pembuatan_perjanjian',$data);
    }

 function edit_surat($id_bio){

        $id_pembuatan = $this->input->post('id_pembuatan');
        $id_tki = $id_bio;
        $nomor = $this->input->post('nomor');
        $lembur = $this->input->post('lembur');
        $namasaksi = $this->input->post('namasaksi');
        $hubungan = $this->input->post('hubungan');
        $namadinas = $this->input->post('namadinas');
        $tanggal = $this->input->post('tanggal');
        $a1 = $this->input->post('a1');
        $a2 = $this->input->post('a2');
        $a3 = $this->input->post('a3');
        $a4 =  nl2br($_POST['a4']);
        $a4 =  str_replace('<br />',"\n",$_POST['a4']);
        $a5 = $this->input->post('a5');
        $a6 = $this->input->post('a6');
        $a7 = $this->input->post('a7');

        $data = array (
            'id_tki' => $id_tki,
            'nomor' => $nomor,
            'lembur' => $lembur,
            'namasaksi' => $namasaksi,
            'hubsaksi' => $hubungan,
            'namadinas' => $namadinas,
            'tanggal' => $tanggal,
            'a1' => $a1,
            'a2' => $a2,
            'a3' => $a3,
            'a4' => $a4,
            'a5' => $a5,
            'a6' => $a6,
            'a7' => $a7,
            );

        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->update('pembuatan_perjanjian',$data);
    }

    function hapus_data_surat() {
        $id_pembuatan = $this->input->post('id_pembuatan');
        $this->db->where('id_pembuatan', $id_pembuatan);
        $this->db->delete('pembuatan_perjanjian');
    }

}
?>
