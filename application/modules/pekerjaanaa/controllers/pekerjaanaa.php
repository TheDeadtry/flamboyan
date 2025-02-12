<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pekerjaanaa extends MX_Controller{
    public function __construct(){
            parent::__construct();
            $this->load->model('modelku');           
            $this->load->model('M_session'); 
    }
    
    function index(){
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']){
            //user belum login
            $data['namamodule'] = "login";
            $data['namafileview'] = "login";
            echo Modules::run('template/login_template', $data);
        }
        else{
        $id_user = $session['session_userid'];
        $status = $session['session_status'];
            //user sudah login
            if ($id_user && $status==1){
            //user sudah login

                $data['namamodule'] = "pekerjaanaa";
                $data['namafileview'] = "pilih_pkl";
                echo Modules::run('template/new_admin_template', $data);
            }
        }
    }


// fungsi menampilkan datanya

    function ambilData(){

        $delay_halaman = $_POST['nilaiData'];
        $delay_pencarian = $_POST['pencarian'];

        if ($delay_pencarian != 'all') {
            $search = 'WHERE isi LIKE "%'.$delay_pencarian.'%" OR mandarin LIKE "%'.$delay_pencarian.'%"';
        }else{
            $search = '';
        }

        // area ambil data______________________________________//

        $ambilData = $this->modelku->query('kategoripekerjaan', 'id_kategori, isi, mandarin', '  '.$search.' LIMIT '.$delay_halaman.', 20');
        $ambilDataTotal = $this->modelku->query('kategoripekerjaan', 'id_kategori, isi, mandarin', '  '.$search.'');


        // end of _____________________________________________//

        $kirim = "";
        $no = 1;
        foreach ($ambilData as $key => $datakirim) {
            // $check = $this->modelku->ambildatamod($datakirim->id_biodata, 'id_biodata', 'pptk', 'id_biodata', 'id_biodata');
            // if ($datakirim->id_biodata == $check) {
            //     $kirim .= "
            //         <a class='ada-red' href='".site_url()."/pekerjaanaa/pernyataan/".$datakirim->id_biodata."/red/'>
            //           <div>
            //             <h1>".$datakirim->id_biodata."</h1><p>".$datakirim->nama."</p>
            //           </div>
            //         </a>
            //     ";
            // }else{
                $kirim .= "
                    <tr>
                        <td>".$no."</td>
                        <td>".$datakirim->isi."</td>
                        <td>".$datakirim->mandarin."</td>
                        <td><a class='btn btn-info' href='".site_url()."/pekerjaanaa/pernyataan/".$datakirim->id_kategori."'>tambah</a> <a class='btn btn-success' onclick='editdata(".$datakirim->id_kategori.")'>edit</a> <a class='btn btn-warning' onclick='hapusdata(".$datakirim->id_kategori.")'> hapus </a></td>
                    </tr>
                ";
                $no++;
            // }
        }



         $data = array(
            "drawer" => 0,
            "totaldata" => 20,
            "pages" => (count($ambilDataTotal)/20),
            "data" => $kirim
        );

        echo json_encode($data);
    }


    function pernyataan($key){
        $data['datapekerjaan'] = $this->db->query("SELECT * FROM datapekerjaan WHERE id_kategori = '$key' ")->result();
        $data['namamodule'] = "pekerjaanaa";
        $data['namafileview'] = "pekerjaanaa";
        $data['iddata'] = $key;
        echo Modules::run('template/new_admin_template', $data);
    }


    function update_Data(){
        $dataid = $_POST['iddata'];
        $datakirim = $_POST['datakirim'];
        $query = $this->db->query("UPDATE pptk SET data_pptk = '$datakirim' WHERE id_biodata = '$dataid' ");
        if ($query) {
            echo "telah disimpan";
        }else{
            echo "gagal disimpan";
        }

        // redirect('pekerjaanaa');
    }

    function simpan_data(){
        $dataid = $_POST['iddata'];
        $datakirim = $_POST['datakirim'];
        $query = $this->db->query("INSERT INTO pptk (id_pptk, id_biodata, data_pptk) VALUES ('','$dataid','$datakirim')");
        if ($query) {
            echo "telah disimpan";
        }else{
            echo "gagal disimpan";
        }

        // redirect('pekerjaanaa');
    }


    function datadiambil($key){
        $data = $this->modelku->ambildatamod($key, 'data_pptk', 'pptk', 'id_biodata', 'data_pptk');
        echo $data;
    }


    function tambah_data_usaha(){
        $isi = $_POST["TPekerjaan"];
        $mandarin = $_POST["TMandarinPekerjaan"];

        $this->db->query("INSERT INTO kategoripekerjaan (id_kategori, isi, mandarin, keterangan) VALUES ('', '$isi', '$mandarin', '')");

        redirect('pekerjaanaa');
    }

    function tambah_data_pekerjaan(){
        $id = $_POST["id"];
        $isi = $_POST["TPekerjaan"];
        $mandarin = $_POST["TMandarinPekerjaan"];

        $this->db->query("INSERT INTO datapekerjaan (id_pekerjaan ,id_kategori, isi, mandarin, keterangan) VALUES ('', '$id','$isi', '$mandarin', '')");

        redirect('pekerjaanaa/pernyataan/'.$id);
    }


    function hapus_data_pekerjaan($key, $id){
        $this->db->query("DELETE FROM datapekerjaan WHERE id_pekerjaan = '$key'");
        redirect('pekerjaanaa/pernyataan/'.$id);
    }

    function ambildatapekerjaan($key, $pekerjaan){
        $data = $this->db->query("SELECT * FROM datapekerjaan WHERE id_kategori='$key' AND id_pekerjaan='$pekerjaan'")->row();

        $json = array(
            'isi' => $data->isi,
            'mandarin' => $data->mandarin
        );

        echo json_encode($json);
    }


    function edit_datapekerjaan(){
        $id_pekerjaan = $_POST['idpekerjaan'];
        $id_kategori = $_POST['idkategori'];
        $isi = $_POST['isi'];
        $mandarin = $_POST['mandarin'];

        $query = $this->db->query("UPDATE datapekerjaan SET isi = '$isi', mandarin = '$mandarin' WHERE id_pekerjaan = '$id_pekerjaan' AND id_kategori = '$id_kategori' ");

        redirect('pekerjaanaa/pernyataan/'.$id_kategori);

    }

    function ambildatakategori($key){
        $data = $this->db->query("SELECT * FROM kategoripekerjaan WHERE id_kategori = '$key'")->row();
        $json = array(
            "isi" => $data->isi,
            "mandarin" => $data->mandarin
        );

        echo json_encode($json);
    }

    function editdatakategori(){
        $id_kategori = $_POST['id_kategori'];
        $isi = $_POST['isi'];
        $mandarin = $_POST['mandarin'];

        $query = $this->db->query("UPDATE kategoripekerjaan SET isi = '$isi', mandarin = '$mandarin' WHERE id_kategori = '$id_kategori'");

        redirect("pekerjaanaa");

    }

    function hapusdatakategori($key){
        $this->db->query("DELETE FROM datapekerjaan WHERE id_kategori = '$key'");
        $this->db->query("DELETE FROM kategoripekerjaan WHERE id_kategori = '$key'");
        redirect("pekerjaanaa");

    }
}