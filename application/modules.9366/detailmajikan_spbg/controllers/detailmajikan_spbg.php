<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detailmajikan_spbg extends MX_Controller{
    public function __construct(){
            parent::__construct();
            $this->load->model('modalku'); 
            $this->load->model('M_session'); 
    }

    function index($id){
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
                redirect('detailmajikan_spbg/print1/'.$id);
            }
        }
    }

    function print_spbg($key){
        $data['detailpersonalid'] = $key;
        $data['ambil_data_propinsi_tipe'] = $this->M_session->select_one("disnaker where id_biodata='".$key."'", "propinsi_tipe");
        $data['tampil_data_spbg'] = $this->db->query("SELECT * FROM setting_spbg")->result();
        $data['dkrh'] = $this->db->query("SELECT * FROM setting_spbg_nilai")->row();


        $data['namamodule'] = "detailmajikan_spbg";
        $data['namafileview'] = "halaman_print";
        echo Modules::run('template/new_admin_template', $data);
    }

    function updateSetting($num,$id_biodata) {
        if ($num == 1) {
            $data = [
                'fpj1' => $this->input->post('fpj1'),
                'fpj2' => $this->input->post('fpj2'),
                'fpj3' => $this->input->post('fpj3'),
                'fpj4' => $this->input->post('fpj4'),
            ];
        } else if ($num == 2) {
            $data = [
                'flj1' => $this->input->post('flj1'),
                'flj2' => $this->input->post('flj2'),
                'flj3' => $this->input->post('flj3'),
                'flj4' => $this->input->post('flj4'),
            ];
        } else if ($num == 3) {
            $data = [
                'ipj1' => $this->input->post('ipj1'),
                'ipj2' => $this->input->post('ipj2'),
                'ipj3' => $this->input->post('ipj3'),
                'ipj4' => $this->input->post('ipj4'),
            ];
        } else if ($num == 4) {
            $data = [
                'ilj1' => $this->input->post('ilj1'),
                'ilj2' => $this->input->post('ilj2'),
                'ilj3' => $this->input->post('ilj3'),
                'ilj4' => $this->input->post('ilj4'),
            ];
        }

        $this->M_session->update($data, 'setting_spbg_nilai', '1', 'id');

        redirect('detailmajikan_spbg/print_spbg/'.$id_biodata);
    }

    function print1($id){
		require_once 'assets/phpword/PHPWord.php';
        $PHPWord = new PHPWord();
        $id_setting_spbg = $this->input->post('spbg');
        $input_tgl = $this->input->post('tgl');
        $input_tgl = explode(".",$input_tgl);
        $thn = $input_tgl[0];
        $bln = $input_tgl[1];
        $tgl = $input_tgl[2];

        $data_majikan_agen = $this->modalku->ambildatamod($id, "propinsi_tipe" ,"disnaker", "id_biodata" );
        

// -------------------------------// content //--------------------------------------------------------// butuh tambahana di status pendidikan lulus atau tidak


        $nama = $this->modalku->ambildatamod($id, "nama" ,"disnaker", "id_biodata" );
        $nopaspor = $this->modalku->ambildatamod($id, "nopaspor" ,"paspor", "id_biodata" );

        $kodeagen = $this->modalku->ambildatamod($id, "kode_agen" ,"majikan", "id_biodata" );
        $agennama = $this->modalku->ambildatamod($kodeagen, "nama" ,"dataagen", "id_agen" );
        $agennamamandarin = $this->modalku->ambildatamod($kodeagen, "namamandarin" ,"dataagen", "id_agen" );

        $dkrhspbgnilai = $this->db->query("SELECT * FROM setting_spbg_nilai")->row();

        $sektor = substr($id,0,2);


        $templateData = [];
        
        $templateData["FI/MI"] = [];
        $templateData["FI/MI"]["jawa"] = [];
        $templateData["FI/MI"]["luarjawa"] = [];
        $templateData["FI/MI"]["jawa"]["lama"] = "files/spbg/spbg_informal_jawa.docx";
        $templateData["FI/MI"]["jawa"]["baru"] = "files/spbg/spbg_new_inf_jawa.docx";
        $templateData["FI/MI"]["luarjawa"]["lama"] = "files/spbg/spbg_informal_luar_jawa.docx";
        $templateData["FI/MI"]["luarjawa"]["baru"] = "files/spbg/spbg_new_inf_jawa.docx";
        
        $templateData["FF/MF"] = [];
        $templateData["FF/MF"]["jawa"] = [];
        $templateData["FF/MF"]["luarjawa"] = [];
        $templateData["FF/MF"]["jawa"]["lama"] = "files/spbg/spbg_formal_jawa.docx";
        $templateData["FF/MF"]["luarjawa"]["lama"] = "files/spbg/spbg_formal_luar_jawa.docx";

        if($sektor == "FI" || $sektor == "MI") {
            $versi = $this->input->post('versi');
            if ($data_majikan_agen == "PULAU JAWA") {
                $filesloc = $templateData["FI/MI"]["jawa"]["lama"];
                $dkrh1 = htmlspecialchars($dkrhspbgnilai->ipj1);
                $dkrh2 = htmlspecialchars($dkrhspbgnilai->ipj2);
                $dkrh3 = htmlspecialchars($dkrhspbgnilai->ipj3);
                $dkrh4 = htmlspecialchars($dkrhspbgnilai->ipj4);
            }elseif ($data_majikan_agen == "LUAR PULAU JAWA") {
                $filesloc = $templateData["FI/MI"]["luarjawa"]["lama"];
                $dkrh1 = htmlspecialchars($dkrhspbgnilai->ilj1);
                $dkrh2 = htmlspecialchars($dkrhspbgnilai->ilj2);
                $dkrh3 = htmlspecialchars($dkrhspbgnilai->ilj3);
                $dkrh4 = htmlspecialchars($dkrhspbgnilai->ilj4);
            }else {
                echo '<h2>Propinsi tipe belum diisi di Disnaker..</h2><br/>';
                echo '<a class="btn btn-primary" href="'.site_url().'/detailmajikan'.'">KEMBALI</a>';
                die();
            }
            $namamajikan = $this->modalku->ambildatamod($id, "namamajikan" ,"majikan", "id_biodata" );
            $namamajikanmandarin = $this->modalku->ambildatamod($id, "namataiwan" ,"majikan", "id_biodata" );
            $pimpinanindo = $this->modalku->ambildatamod($kodeagen, "direktur" ,"dataagen", "id_agen" );
            $pimpinanman = $this->modalku->ambildatamod($kodeagen, "direktur2" ,"dataagen", "id_agen" );
            $jabatanindo = $this->modalku->ambildatamod($kodeagen, "jabatan_indo" ,"dataagen", "id_agen" );
            $jabatanman = $this->modalku->ambildatamod($kodeagen, "jabatan_man" ,"dataagen", "id_agen" );
        }else if($sektor == "FF" || $sektor == "MF" || $sektor == "JP") {
            if ($data_majikan_agen == "PULAU JAWA") {
                $filesloc = $templateData["FF/MF"]["jawa"]["lama"];
                $dkrh1 = htmlspecialchars($dkrhspbgnilai->fpj1);
                $dkrh2 = htmlspecialchars($dkrhspbgnilai->fpj2);
                $dkrh3 = htmlspecialchars($dkrhspbgnilai->fpj3);
                $dkrh4 = htmlspecialchars($dkrhspbgnilai->fpj4);
            }elseif ($data_majikan_agen == "LUAR PULAU JAWA") {
                $filesloc = $templateData["FF/MF"]["luarjawa"]["lama"];
                $dkrh1 = htmlspecialchars($dkrhspbgnilai->flj1);
                $dkrh2 = htmlspecialchars($dkrhspbgnilai->flj2);
                $dkrh3 = htmlspecialchars($dkrhspbgnilai->flj3);
                $dkrh4 = htmlspecialchars($dkrhspbgnilai->flj4);
            }else {
                exit();
                //$filesloc = 'files/spbg_formal.docx';
            }
            $kodemajikan = $this->modalku->ambildatamod($id, "kode_majikan" ,"majikan", "id_biodata" );
            $namamajikan = $this->modalku->ambildatamod($kodemajikan, "nama" ,"datamajikan", "id_majikan" );
            $namamajikanmandarin = $this->modalku->ambildatamod($kodemajikan, "namamajikan" ,"datamajikan", "id_majikan" );
            $pimpinanindo = $this->modalku->ambildatamod($kodemajikan, "pimpinan_indo" ,"datamajikan", "id_majikan" );
            $pimpinanman = $this->modalku->ambildatamod($kodemajikan, "pimpinan_man" ,"datamajikan", "id_majikan" );
            $jabatanindo = $this->modalku->ambildatamod($kodemajikan, "jabatan_indo" ,"datamajikan", "id_majikan" );
            $jabatanman = $this->modalku->ambildatamod($kodemajikan, "jabatan_man" ,"datamajikan", "id_majikan" );
            $agenpimpinanindo = $this->modalku->ambildatamod($kodeagen, "direktur" ,"dataagen", "id_agen" );
            $agenpimpinanman = $this->modalku->ambildatamod($kodeagen, "direktur2" ,"dataagen", "id_agen" );
            $agenjabatanindo = $this->modalku->ambildatamod($kodeagen, "jabatan_indo" ,"dataagen", "id_agen" );
            $agenjabatanman = $this->modalku->ambildatamod($kodeagen, "jabatan_man" ,"dataagen", "id_agen" );
        }
        $document = $PHPWord->loadTemplate($filesloc);
        
        if($sektor == "FI" || $sektor == "MI") {
            $hasilfilenama = $namamajikanmandarin.'-SPBG-D-'.$id.'-'.$nama.'-'.$thn.'-'.$bln.'-'.$tgl.'-'.$kodeagen;
        }else if($sektor == "FF" || $sektor == "MF") {
            $hasilfilenama = $namamajikanmandarin.'-SPBG-FAC-'.$id.'-'.$nama.'-'.$thn.'-'.$bln.'-'.$tgl.'-'.$kodeagen;
        }else if($sektor == "JP") {
            $hasilfilenama = $namamajikanmandarin.'-SPBG-NUR-'.$id.'-'.$nama.'-'.$thn.'-'.$bln.'-'.$tgl.'-'.$kodeagen;
        }

        $spbgno = $this->modalku->ambildatamod($id_setting_spbg, "k1" ,"setting_spbg", "id_setting_spbg" );
        $spbgnama = $this->modalku->ambildatamod($id_setting_spbg, "k2" ,"setting_spbg", "id_setting_spbg" );
        $spbgdirektur = $this->modalku->ambildatamod($id_setting_spbg, "k3" ,"setting_spbg", "id_setting_spbg" );

        $agennosiup = $this->modalku->ambildatamod($kodeagen, "nosiup" ,"dataagen", "id_agen" );
        $nopaspor = $this->modalku->ambildatamod($id, "nopaspor" ,"paspor", "id_biodata" );
        $document->setValue('dkrh1', number_format($dkrh1 , 0, ',', '.') );
        $document->setValue('dkrh2', number_format($dkrh2 , 0, ',', '.'));
        $document->setValue('dkrh3', number_format($dkrh3 , 0, ',', '.'));
        $document->setValue('dkrh4', number_format($dkrh4 , 0, ',', '.'));

        $document->setValue('nama', htmlspecialchars($nama));
        $document->setValue('nopaspor', htmlspecialchars($nopaspor));
        $document->setValue('a1', htmlspecialchars($namamajikan));
        $document->setValue('a2', htmlspecialchars($namamajikanmandarin));
        $document->setValue('spbgno', htmlspecialchars($spbgno));
        $document->setValue('spbgnama', htmlspecialchars($spbgnama));
        $document->setValue('spbgdirektur', htmlspecialchars($spbgdirektur));
        $document->setValue('agennama', htmlspecialchars($agennama));
        $document->setValue('agennamamandarin', htmlspecialchars($agennamamandarin));
        $document->setValue('a3', htmlspecialchars($pimpinanindo));
        $document->setValue('a4', htmlspecialchars($pimpinanman));
        $document->setValue('a5', htmlspecialchars($jabatanindo));
        $document->setValue('a6', htmlspecialchars($jabatanman));
        $document->setValue('agennosiup', htmlspecialchars($agennosiup));
        $document->setValue('a7', htmlspecialchars($thn));
        $document->setValue('a8', htmlspecialchars($bln));
        $document->setValue('a9', htmlspecialchars($tgl));
        if($sektor == "FF" || $sektor == "MF" || $sektor == "JP") {
            $document->setValue('a13', htmlspecialchars($agenpimpinanindo));
            $document->setValue('a11', htmlspecialchars($agenpimpinanman));
            $document->setValue('a14', htmlspecialchars($agenjabatanindo));
            $document->setValue('a12', htmlspecialchars($agenjabatanman));
        }

        $filename = 'ddd.docx';

        $isinya=$document->save($filename);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename= '.$hasilfilenama.'.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        
        flush();
        readfile($isinya);
        unlink($isinya);
        exit;
    }

}