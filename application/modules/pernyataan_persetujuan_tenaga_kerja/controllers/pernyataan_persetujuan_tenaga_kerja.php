<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pernyataan_persetujuan_tenaga_kerja extends MX_Controller{
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

                $data['namamodule'] = "pernyataan_persetujuan_tenaga_kerja";
                $data['namafileview'] = "pilih_pkl";
                echo Modules::run('template/new_admin_template', $data);
            }
        }
    }


    function ambilData(){

        $delay_halaman = $_POST['nilaiData'];
        $delay_pencarian = $_POST['pencarian'];

        if ($delay_pencarian != 'all') {
            $search = 'WHERE nama LIKE "%'.$delay_pencarian.'%"';
        }else{
            $search = '';
        }

        $ambilData = $this->modelku->query('personal', 'id_biodata, nama', '  '.$search.' LIMIT '.$delay_halaman.', 20');
        $ambilDataTotal = $this->modelku->query('personal', 'id_biodata, nama', '  '.$search.'');

        $kirim = "";
        foreach ($ambilData as $key => $datakirim) {
            $kirim .= "
                <a href='#'>
                  <div>
                    <h1>".$datakirim->id_biodata."</h1><p>".$datakirim->nama."</p>
                  </div>
                </a>
            ";
        }



         $data = array(
            "drawer" => 0,
            "totaldata" => 20,
            "pages" => count($ambilDataTotal),
            "data" => $kirim
        );

        echo json_encode($data);
    }


    function ubah_data_working($key){
        $data['namamodule'] = "pernyataan_persetujuan_tenaga_kerja";
        $data['namafileview'] = "update_working";
        $data['working'] = $this->modelku->ambildatarow("*", "working", "id_working", $key);
        $data['negara'] = $this->modelku->ambildataresult("*", "datanegara ORDER BY isi ASC");
        $data['kategoripekerjaan'] = $this->modelku->ambildataresult("*", "kategoripekerjaan ORDER BY isi ASC");
        $data['posisi'] = $this->modelku->ambildataresult("*", "dataposisi ORDER BY isi ASC");
        $data['alasan'] = $this->modelku->ambildataresult("*", "dataalasan ORDER BY isi ASC");
        $data['pilihan_barangdiproduksi'] = $this->modelku->tampil_data_barangdiproduksi();
        $data['idworking'] = $key;
        echo Modules::run('template/new_admin_template', $data);
    }

    function dapatkan_data_datapekerjaan($key){
        $result = $this->modelku->ambildataresult("*", "datapekerjaan", "id_kategori", $key);
        $data = '';
        foreach ($result as $key => $datanya) {
            // $data .= $datanya->isi;

            $data .= '<li><label><input type="checkbox" name="data" value="'."'".$datanya->isi." ".$datanya->mandarin."'".'">'."'".$datanya->isi." ".$datanya->mandarin."'".'</label></li>';
        }

        exit($data);
        // echo "test";

    }

    function update_data_working(){
        $this->modelku->update_dataworking();

        redirect(site_url().'/detailworking');

    }

    function print_apendik($key){
        $data['detailpersonalid'] = $key;
        $data['namamodule'] = "pernyataan_persetujuan_tenaga_kerja";
        $data['namafileview'] = "print_apendik";
        echo Modules::run('template/new_admin_template', $data);
    }


}