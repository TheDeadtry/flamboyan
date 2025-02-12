<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Biodata_cong_yi extends MX_Controller{
    public function __construct(){
            parent::__construct();
            $this->load->model('modalku'); 
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
                redirect('biodata_cong_yi/print_bio');
            }
        }
    }




    function print_bio($key){

        $personal = $this->modalku->ambildatarow(" * ", "personal", "id_biodata", $key);
        $disnaker = $this->modalku->ambildatarow(" * ", "disnaker", "id_biodata", $key);
        $family = $this->modalku->ambildatarow("*", "family", "id_biodata", $key);
        $working = $this->modalku->ambildataresult('*', 'working', 'id_biodata', $key);
        $skill = $this->modalku->ambildatarow('*', 'skillcondition', 'id_biodata', $key);
        $request = $this->modalku->ambildatarow('*', 'request', 'id_biodata', $key);
        
        if (count($personal) == 0) {
            echo "data personal belum diisi";
        }else{
             if (count($disnaker) == 0) {
                echo "data disnaker belum diisi";
            }else{
                if (count($family) == 0) {
                    echo "data family belum diisi";
                }else{
                     if (count($working) == 0) {
                        echo "data working belum diisi";
                    }else{
                        if (count($skill) == 0) {
                            echo "data skill belum diisi";
                        }else{
                            if (count($request) == 0) {
                                echo "data request belum diisi";
                            }else{
                                redirect('biodata_cong_yi/bio/'.$key);
                            }   
                        }   
                    }   
                }   
            }   
        }
        
    }




    function bio($key){
        header ("Content-type: text/html; charset=utf-8");
    
        require_once 'PHPWord/PHPWord.php';
    
        $PHPWord = new PHPWord();   
        $document = $PHPWord->loadTemplate('files/biodatacongyi.docx');

// -------------------------------// content //--------------------------------------------------------// butuh tambahana di status pendidikan lulus atau tidak
        
        $ambil_personal = $this->modalku->ambildatarow(" *, DATE(tgllahir) AS lahir_tanggal ", "personal", "id_biodata", $key);
        $ambil_disnaker = $this->modalku->ambildatarow("*", "disnaker", "id_biodata", $key);


        $tanggal_sekarang = date("Y-m-d") - $ambil_personal->lahir_tanggal;


        $document->setValue('{kerjaposisi}', 'namanya');
        $document->setValue('{namaagen}', 'namanya');
        $document->setValue('{namamajikan}', 'namanya');


        $document->setValue('{nama}', $ambil_personal->nama);
        $document->setValue('{namamandarin}', $ambil_personal->nama_mandarin);
        $document->setValue('{tanggaldaftar}', $ambil_personal->tanggaldaftar);
        $document->setValue('{jeniskelamin}', $ambil_personal->jeniskelamin);
        $document->setValue('{tinggibadan}', $ambil_personal->tinggi);
        $document->setValue('{warganegara}', $ambil_personal->warganegara);
        $document->setValue('{beratbadan}', $ambil_personal->berat);
        $document->setValue('{tanggallahir}', $ambil_personal->tgllahir);
        $document->setValue('{agama}', $ambil_personal->agama);
        $document->setValue('{tempatlahir}', $ambil_personal->tempatlahir);
        $document->setValue('{status}', $ambil_personal->status);
        $document->setValue('{umur}', $tanggal_sekarang);
        $document->setValue('{tanggalstatuspernnikahan}', '');
        $document->setValue('{pendidikan}', $ambil_disnaker->pendidikan);
        $document->setValue('{statuspendidikan}', '');
        $document->setValue('{bahasamandarin}', '國語 MANDARIN');
        $document->setValue('{statusbahasamandarin}', $ambil_personal->mandarin);
        $document->setValue('{bahasainggriss}', '英語 INGGRIS');
        $document->setValue('{statusbahasainggriss}', $ambil_personal->inggris);



// gambar-----------------------------------------------------------------------------------------------------------//

        $document->setValue('{gambar}', '${gambar}');


// data keluaraga---------------------------------------------------------------------------------------------------//

        $ambil_family = $this->modalku->ambildatarow("*", "family", "id_biodata", $key);


        $document->setValue('{namabapak}', $ambil_family->nama_bapak);
        $document->setValue('{umurbapak}', $ambil_family->umur_bapak);
        $document->setValue('{pekerjaanbapak}', $ambil_family->kerja_bapak);
        $document->setValue('{namaibu}', $ambil_family->nama_ibu);
        $document->setValue('{umuribu}', $ambil_family->umur_ibu);
        $document->setValue('{pekerjaanibu}', $ambil_family->kerja_ibu);
        $document->setValue('{namaistri}', $ambil_family->nama_istri_suami);
        $document->setValue('{umuristri}', $ambil_family->umur_istri_suami);
        $document->setValue('{pekerjaanistri}', $ambil_family->kerja_istri_suami);
        $document->setValue('{banyaksaudaralaki}', $ambil_family->saudara_laki);
        $document->setValue('{banyaksaudaraperempuan}', $ambil_family->saudar_pr);
        $document->setValue('{anaknourutke}', $ambil_family->anak_ke);
        $document->setValue('{anak}', $ambil_family->data_anak);

    // pengalaman kerja ---------------------------------------------------------------------------------------------------------//ok


        $ambil_data_working = $this->modalku->ambildataresult('*', 'working', 'id_biodata', $key);

        $kosong = array();
        $negara = array();
        $posisi = array();
        $masakerja = array();
        $mulaiberakhir = array();
        $jenisusaha = array();
        $namaperusahaan = array();
        $gaji = array();
        $gajidibayar = array();
        $jenispekerjaan = array();
        $alasanberhenti = array();


        for ($i=0; $i < count($ambil_data_working); $i++) { 

            $jenis_usaha = $this->modalku->ambildatamod($ambil_data_working[$i]->jenis_usaha, 'isi', 'kategoripekerjaan', 'id_kategori','isi');
            $jenis_usaha_mandarin = $this->modalku->ambildatamod($ambil_data_working[$i]->jenis_usaha, 'mandarin', 'kategoripekerjaan', 'id_kategori','mandarin');


           $kosong[] = ' ';
           $negara[] = $ambil_data_working[$i]->negara;
           $posisi[] = $ambil_data_working[$i]->posisi;
           $masakerja[] = $ambil_data_working[$i]->masa_kerja.' s/d '.$ambil_data_working[$i]->masabulan;
           $mulaiberakhir[] = $ambil_data_working[$i]->tahun;
           $jenisusaha[] = $jenis_usaha.' - '.$jenis_usaha_mandarin;
           $namaperusahaan[] = $ambil_data_working[$i]->nama_perusahaan;
           $gaji[] = $ambil_data_working[$i]->satuan.'. '.$ambil_data_working[$i]->gaji;
           $gajidibayar[] = $ambil_data_working[$i]->detail_gaji;
           $jenispekerjaan[] = $ambil_data_working[$i]->penjelasan;
           $alasanberhenti[] = $ambil_data_working[$i]->alasan;
        }

        // var_dump($negara);

        $datapengalaman = array(
            'kosong' => $kosong,
            'negara' => $negara,
            'posisi' => $posisi,
            'masakerja' => $masakerja,
            'mulaiberakhir' => $mulaiberakhir,
            'jenisusaha' => $jenisusaha,
            'namaperusahaan' => $namaperusahaan,
            'gaji' => $gaji,
            'gajidibayar' => $gajidibayar,
            'jenispekerjaan' => $jenispekerjaan,
            'alasanberhenti' => $alasanberhenti
        );

        $document->cloneRow('pengalaman', $datapengalaman);
    // keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------//

        $ambil_data_keterampilan = $this->modalku->ambildatarow('*', 'skillcondition', 'id_biodata', $key);

        $tanganbasah = $ambil_data_keterampilan->tanganbasah;
        if ($tanganbasah == null) {
            $tangan_basa = '';
        } elseif ($tanganbasah == 0) {
            $tangan_basa = '';
        } elseif ($tanganbasah == 1) {
            $tangan_basa = 'Ya 是';
        } elseif ($tanganbasah == 2) {
            $tangan_basa = 'Tidak 沒有';
        }


        $penglihatan = $this->modalku->ambildatamod($key, "peglihatan", "skillcondition", "id_biodata", "peglihatan");

        $document->setValue('{keterampilan}', $ambil_data_keterampilan->keterampilan);
        $document->setValue('{hoby}', $ambil_data_keterampilan->hobi);
        $document->setValue('{kemampuan}', $ambil_data_keterampilan->angkat);
        $document->setValue('{yangdimakan}', $ambil_data_keterampilan->food);
        $document->setValue('{pushup}', $ambil_data_keterampilan->pushup);
        $document->setValue('{minumalkohol}', $ambil_data_keterampilan->alkohol);
        $document->setValue('{butawarna}', $ambil_data_keterampilan->butawarna);
        $document->setValue('{merokok}', $ambil_data_keterampilan->merokok);
        $document->setValue('{banyakbatangrokok}', $ambil_data_keterampilan->banyakrokok);
        $document->setValue('{rabunjauh}', $penglihatan);
        $document->setValue('{banyakrabunjauh}', $ambil_data_keterampilan->banyakrabun);
        $document->setValue('{idiomatik}', $ambil_data_keterampilan->kidal);
        $document->setValue('{tanganbasah}', $tangan_basa);
        $document->setValue('{tato}', $ambil_data_keterampilan->tato);
        $document->setValue('{operasi}', $ambil_data_keterampilan->operasi);
        $document->setValue('{alergi}', $ambil_data_keterampilan->alergi);
        $tahunoperasi = array('2001','2002','2006');
        $dataoperasi = array('paru_paru','gijal','hati');
        $alergi = array('udang', 'ikan asin', 'ikan lele', 'tiram');

        $banyak_alergi = count($alergi);
        $banyak_operasi = count($dataoperasi);

            if ($banyak_alergi < $banyak_operasi) {
                $nilai = $banyak_operasi-$banyak_alergi;
                for ($i= 0; $i < $nilai ; $i++) { 
                        $alergi[] = '';
                }
            } if ($banyak_alergi > $banyak_operasi) {
                $nilai = $banyak_alergi-$banyak_operasi;
                for ($i=0; $i < $nilai; $i++) { 
                    $dataoperasi[] = '';
                    $tahunoperasi[] = '';
                }
            }


        $operasi = array(
            'alergi' => $alergi,
            'tahun' => $tahunoperasi,
            'ket' => $dataoperasi,
        );

        $document->cloneRow('operasi', $operasi);




    // keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------//ok

        $panggil_request = $this->modalku->ambildatarow('*', 'request', 'id_biodata', $key);

        $document->setValue('{usahamajikan}', $panggil_request->usahamajikan);
        $document->setValue('{waktukerja}', $panggil_request->waktukerja);
        $document->setValue('{kondisikerja}', $panggil_request->kondisikerja);
        $document->setValue('{jenispekerjaandiminta}', $panggil_request->jenispekerjaan);
        $document->setValue('{lokasikerja}', $panggil_request->lokasikerja);
        $document->setValue('{lemburkerja}', $panggil_request->lemburkerja);
        $document->setValue('{keterangankerja}', '伊完');


        $pangil_data_paspor = $this->modalku->ambildatarow('*, ADDDATE(tglterbit,INTERVAL 5 YEAR) AS tglberakhir', 'paspor', 'id_biodata', $key);
        $pangil_data_paspor_lama = $this->modalku->ambildatamod($key, 'barakhir', 'pasporlama', 'id_biodata', 'ADDDATE(tglterbit,INTERVAL 5 YEAR) AS barakhir');
        
        $tanggal_paspor = date($pangil_data_paspor_lama);
        $tanggal_sekarang = date("Y-m-d");

        if ($pangil_data_paspor->keterangan == 'sudah') {
            $status_paspor = 'sudah';
            $rencanakerjasampai = $pangil_data_paspor->tglterbit.' s/d '.$pangil_data_paspor->tglberakhir;
        }elseif ($pangil_data_paspor->keterangan == 'belum') {
            if ($tanggal_paspor > $tanggal_sekarang) {
                    $status_paspor = 'sudah';
                    $rencanakerjasampai = $tanggal_sekarang.' s/d '.$tanggal_paspor;
               }else{
                    $status_paspor = 'belum';
                    $rencanakerjasampai = '';
               }   
        }else{
            $status_paspor = 'belum';
            $rencanakerjasampai = '';
        }
        $document->setValue('{pasport}', $status_paspor);
        $document->setValue('{rencanakerjasampai}', $rencanakerjasampai);

        $ambil_data_medikal = $this->modalku->ambildatamod($key, 'hasilmedis', 'medical a LEFT JOIN medical2 b ON a.id_biodata = b.id_biodata LEFT JOIN medical3 c ON a.id_biodata = c.id_biodata', 'a.id_biodata', 'IF(c.nama IS NOT NULL, c.nama, IF(b.nama IS NOT NULL, b.nama, IF(a.nama IS NOT NULL , a.nama, "kosong"))) AS hasilmedis');

        $document->setValue('{hasilpermeriksaankesehatan}', $ambil_data_medikal);

        $ambil_data_personal = $this->modalku->ambildatarow("*", "personal", "id_biodata", $key);

        $document->setValue('{nohp}', $ambil_data_personal->notelp);
        $document->setValue('{nohpkeluaraga}', $ambil_data_personal->notelpkel);

        
        $ambil_data_disnaker = $this->modalku->ambildatarow("*", "disnaker", "id_biodata", $key);
        $document->setValue('{alamatkeluarga}', $ambil_data_disnaker->alamat);



    // keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------// ok
        $panggil_pptk = $this->modalku->ambildatarow('*', 'pptk', 'id_biodata', $key );
        $ambil_data_pptk_json = json_decode($panggil_pptk->data_pptk);

        $data_pptk_kosong = array();
        for ($i=1; $i <= 9; $i++) { 
            $data_pptk_kosong[] = 'NULL';
        }


        if (isset($ambil_data_pptk_json)) {
            $data_pptk_ditampilkan = $ambil_data_pptk_json;
        }else{
            $data_pptk_ditampilkan = $data_pptk_kosong;
        }

        // hasilnya bjek dan hanya bisa dipanggil dengan foreach
        $no =1;
        foreach ($data_pptk_ditampilkan as $data => $value) {
            if ($no == 1) {
                if ($value == 1) {
                    $pernyataannya = 'SAYA BISA 我能';
                }if ($value == 0) {
                    $pernyataannya = 'SAYA TIDAK BISA 我不能';
                }if ($value == 'NULL' || $value == NULL) {
                    $pernyataannya = '';
                }
            }else{
                if ($value == 1) {
                    $pernyataannya = 'YA BERSEDIA / 願意';
                }if ($value == 0) {
                    $pernyataannya = 'TIDAK BERSDIA / 不能';
                }if ($value == 'NULL' || $value == NULL) {
                    $pernyataannya = '';
                }
            }

            $document->setValue('{pernyataan'.$no.'}', $pernyataannya);
            $no++;
        }



//  ------------------------------------------- save file ------------------------------------------------------------------//

        $tmp_file = 'biodata_cong_yi/gugusdata.docx';
        $document->save($tmp_file);

   


// ------------------------------------------- download file --------------------------------------------------------------//

        redirect('biodata_cong_yi/hasil/'.$key);

    }

    function hasil($key){

        require_once 'gugus/phpword/PHPWord.php';
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('biodata_cong_yi/gugusdata.docx');

        $data_foto = $this->modalku->ambildatamod($key, "foto", "personal", "id_biodata", "foto"); 

        // echo $data_foto;

        if($data_foto == null) {
            $datagambar="assets/uploads/profile.jpg";
            $resolution = getimagesize($datagambar);
            $lebargambar = $resolution[0];
            $tinggigambar = $resolution[1];

            $ubahresolution = $lebargambar/238;
            $ubah_tinggi = round($tinggigambar/$ubahresolution);
            $aImgs1 = array(
                array(
                'img'   => $datagambar,
                'size'  => array(238, $ubah_tinggi),
                )
            );
            $document->replaceStrToImg( 'gambar', $aImgs1);
            //$document->setValue( 'img','');
        } else {
            $datagambar="assets/uploads/".$data_foto;
            $aImgs1 = array(
                array(
                'img'   => $datagambar,
                'size'  => array(238, 302),
                )
            );
            $document->replaceStrToImg( 'gambar', $aImgs1);
        }






        $filename = 'biodata_cong_yi/filenya.docx';

        $isinya=$document->save($filename);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename= files/aman.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
            
        flush();
        readfile($isinya);
        unlink($isinya); // deletes the temporary file
        exit;
    }

}