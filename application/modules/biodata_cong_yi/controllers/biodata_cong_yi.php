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

    function print_bio($key=""){
        
        ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
        

        header ("Content-type: text/html; charset=utf-8");
    
        require_once 'PHPWord/PHPWord.php';
    
        $PHPWord = new PHPWord();

        $data_majikan_agen = $this->modalku->ambildatamod($key, "kode_agen" ,"majikan", "id_biodata", "kode_agen" );

        if ($data_majikan_agen == '64') {
            $document = $PHPWord->loadTemplate('files/biodatacongyi.docx');
        }else{
            $document = $PHPWord->loadTemplate('files/biodatabaru.docx');
        }

        // var_dump($document);
// -------------------------------// content //--------------------------------------------------------// butuh tambahana di status pendidikan lulus atau tidak

        $document->setValue('{kerjaposisi}', '${kerjaposisi}');
        $document->setValue('{namaagen}', '${namaagen}');
        $document->setValue('{namamajikan}', '${namamajikan}');
        $document->setValue('{kodeid}', '${kodeid}');
        $document->setValue('{pl}', '${kodepl}');
        $document->setValue('{alamat}', '${alamat}');
        $document->setValue('{Provinsi}', '${provinsi}');


        $document->setValue('{nama}', '${nama}');
        $document->setValue('{namamandarin}', '${namamandarin}');
        $document->setValue('{tanggaldaftar}', '${tanggaldaftar}');
        $document->setValue('{jeniskelamin}', '${jeniskelamin}');
        $document->setValue('{tinggibadan}', '${tinggibadan}');
        $document->setValue('{warganegara}', '${warganegara}');
        $document->setValue('{beratbadan}', '${beratbadan}');
        $document->setValue('{tanggallahir}', '${tanggallahir}');
        $document->setValue('{agama}', '${agama}');
        $document->setValue('{tempatlahir}', '${tempatlahir}');
        $document->setValue('{status}', '${status}');
        $document->setValue('{umur}', '${umur}');
        $document->setValue('{tanggalstatuspernnikahan}', '${tanggalpernikahan}');
        $document->setValue('{pendidikan}', '${pendidikan}');
        $document->setValue('{statuspendidikan}', '${statuspendidikan}');
        $document->setValue('{bahasamandarin}', '${bahasamandarin}');
        $document->setValue('{statusbahasamandarin}', '${statusbahasamandarin}');
        $document->setValue('{bahasainggriss}', '${bahasainggriss}');
        $document->setValue('{statusbahasainggriss}', '${statusbahasainggriss}');
        $document->setValue('{vaksin1}', '${vaksin1}');
        $document->setValue('{vaksin2}', '${vaksin2}');
        $document->setValue('{vaksin3}', '${vaksin3}');
        $document->setValue('{vaksin1tgl}', '${vaksin1tgl}');
        $document->setValue('{vaksin2tgl}', '${vaksin2tgl}');
        $document->setValue('{vaksin3tgl}', '${vaksin3tgl}');

        $ambildataulang = $this->db->query("SELECT * FROM upload_arc WHERE id_biodata = '$key'")->num_rows();
        $buatArraycek = array();
        for ($dx=0; $dx < $ambildataulang; $dx++) { 
            $buatArraycek[] = '${arc'.$dx.'}';
        }

        $document->setValue('{arc}', '${arc}');

        $dataarc = array(
            'arc' => $buatArraycek,
        );

        $document->cloneRow('arc', $dataarc);

// gambar-----------------------------------------------------------------------------------------------------------//

        $document->setValue('{gambar}', '${gambar}');


// data keluaraga---------------------------------------------------------------------------------------------------//



        $document->setValue('{namabapak}', '${namabapak}');
        $document->setValue('{umurbapak}', '${umurbapak}');
        $document->setValue('{pekerjaanbapak}', '${pekerjaanbapak}');
        $document->setValue('{namaibu}', '${namaibu}');
        $document->setValue('{umuribu}', '${umuribu}');
        $document->setValue('{pekerjaanibu}', '${pekerjaanibu}');
        $document->setValue('{namaistri}', '${namaistri}');
        $document->setValue('{umuristri}', '${umuristri}');
        $document->setValue('{pekerjaanistri}', '${pekerjaanistri}');
        $document->setValue('{banyaksaudaralaki}', '${banyaksaudaralaki}');
        $document->setValue('{banyaksaudaraperempuan}', '${banyaksaudaraperempuan}');
        $document->setValue('{anaknourutke}', '${anaknourutke}');
        $document->setValue('{anak}', '${anak}');

    // pengalaman kerja ---------------------------------------------------------------------------------------------------------//ok



        $negara = $this->modalku->buatarray('*', 'negara', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $posisi = $this->modalku->buatarray('*', 'posisi', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $tahun = $this->modalku->buatarray('*', 'tahun', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $masa_kerja = $this->modalku->buatarray('*', 'masa_kerja', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $masabulan = $this->modalku->buatarray('*', 'masabulan', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $masabulan = $this->modalku->buatarray('*', 'masabulan', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $jenis_usaha = $this->modalku->buatarray('*', 'jenis_usaha', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $nama_perusahaan = $this->modalku->buatarray('*', 'nama_perusahaan', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $gaji = $this->modalku->buatarray('*', 'gaji', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $detail_gaji = $this->modalku->detail_gaji('*', 'detail_gaji', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $penjelasan = $this->modalku->buatarray('*', 'penjelasan', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $alasan = $this->modalku->buatarray('*', 'alasan', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        $satuan = $this->modalku->buatarray('*', 'satuan', 'working', $key, 'id_biodata', 'ORDER BY tahun ASC');
        // echo '<pre>';


        // $negara = array('');
        // $posisi = array('');
        // $tahun = array('');
        // $masa_kerja = array('');
        // $masabulan = array('');
        // $jenis_usaha = array('');
        // $nama_perusahaan = array('');
        // $gaji = array('');
        // $detail_gaji = array('');
        // $penjelasan = array('');
        // $alasan = array('');
        // $satuan = array('');
        // $mandarin_detail_gaji = array('');

        if (count($negara) == 0) {
            $negara = array('');
            $posisi = array('');
            $tahun = array('');
            $masa_kerja = array('');
            $masabulan = array('');
            $jenis_usaha = array('');
            $nama_perusahaan = array('');
            $gaji = array('');
            $detail_gaji = array('');
            $penjelasan = array('');
            $alasan = array('');
            $satuan = array('');
            $mandarin_detail_gaji = array('');
        }





        $no = array();
        $kosong = array();
    






        for ($i=1; $i <= count($negara) ; $i++) { 
            $no[] = $i;
            $kosong[] = '';
        }

        $nama_jenis_usaha = array();

        for ($i=0; $i < count($jenis_usaha) ; $i++) { 

            $data_nama_usaha = $this->modalku->ambildatamod($jenis_usaha[$i], 'isi', 'kategoripekerjaan', 'id_kategori','isi');
            $data_nama_usaha_man = $this->modalku->ambildatamod($jenis_usaha[$i], 'mandarin', 'kategoripekerjaan', 'id_kategori','mandarin');
            $nama_jenis_usaha[] = htmlspecialchars($data_nama_usaha.' '.$data_nama_usaha_man);
        }

        $datapengalaman = array(
            'no' => $no,
            'negara' => $negara,
            'posisi' => $posisi,
            'mulaiend' => $tahun,
            'masakerja' => $masa_kerja,
            'masabulan' => $masabulan,
            'jenisusaha' => $nama_jenis_usaha,
            'namaperusahaan' => $nama_perusahaan,
            'satuan' => $satuan,
            'gaji' => $gaji,
            'pergaji' => $detail_gaji,
            'jenispekerjaan' => $penjelasan,
            'alasanberhenti' => $alasan,
            'kosong' => $kosong
        );

        // cloning table ---------------------------------------------------------------------------------------------------------//
        $document->cloneRow('cln', $datapengalaman);
        // keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------//

        $ambil_data_keterampilan = $this->modalku->ambildatarow('*', 'skillcondition', 'id_biodata', $key);

        $data_tangan_basah = $this->modalku->ambildatamod($key, "tanganbasah", "skillcondition", "id_biodata", "tanganbasah");
        $data_keterampilan = $this->modalku->ambildatamod($key, "keterampilan", "skillcondition", "id_biodata", "keterampilan");
        $data_hobi = $this->modalku->ambildatamod($key, "hobi", "skillcondition", "id_biodata", "hobi");
        $data_angkat = $this->modalku->ambildatamod($key, "angkat", "skillcondition", "id_biodata", "angkat");
        $data_food = $this->modalku->ambildatamod($key, "food", "skillcondition", "id_biodata", "food");
        $data_pushup = $this->modalku->ambildatamod($key, "pushup", "skillcondition", "id_biodata", "pushup");
        $data_alkohol = $this->modalku->ambildatamod($key, "alkohol", "skillcondition", "id_biodata", "alkohol");
        $data_butawarna = $this->modalku->ambildatamod($key, "butawarna", "skillcondition", "id_biodata", "butawarna");
        $data_merokok = $this->modalku->ambildatamod($key, "merokok", "skillcondition", "id_biodata", "merokok");
        $data_banyakrokok = $this->modalku->ambildatamod($key, "banyakrokok", "skillcondition", "id_biodata", "banyakrokok");
        $data_banyakrabun = $this->modalku->ambildatamod($key, "banyakrabun", "skillcondition", "id_biodata", "banyakrabun");
        $data_kidal = $this->modalku->ambildatamod($key, "kidal", "skillcondition", "id_biodata", "kidal");
        $data_tato = $this->modalku->ambildatamod($key, "tato", "skillcondition", "id_biodata", "tato");
        $data_operasi = $this->modalku->ambildatamod($key, "operasi", "skillcondition", "id_biodata", "operasi");
        $data_alergi = $this->modalku->ambildatamod($key, "alergi", "skillcondition", "id_biodata", "alergi");

        $tanganbasah = $data_tangan_basah;
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

        $document->setValue('{keterampilan}', htmlspecialchars($data_keterampilan));

        $document->setValue('{hoby}', htmlspecialchars($data_hobi));

        $document->setValue('{kemampuan}', htmlspecialchars($data_angkat));

        $document->setValue('{yangdimakan}', htmlspecialchars($data_food));

        $document->setValue('{pushup}', htmlspecialchars($data_pushup));

        $document->setValue('{minumalkohol}', htmlspecialchars($data_alkohol));

        $document->setValue('{butawarna}', htmlspecialchars($data_butawarna));

        $document->setValue('{merokok}', htmlspecialchars($data_merokok));

        $document->setValue('{banyakbatangrokok}', htmlspecialchars($data_banyakrokok));

        $document->setValue('{rabunjauh}', htmlspecialchars($penglihatan));

        $document->setValue('{banyakrabunjauh}', htmlspecialchars($data_banyakrabun));

        $document->setValue('{idiomatik}', htmlspecialchars($data_kidal));

        $document->setValue('{tanganbasah}', htmlspecialchars($tangan_basa));

        $document->setValue('{tato}', htmlspecialchars($data_tato));

        $document->setValue('{operasi}', htmlspecialchars($data_operasi));

        $document->setValue('{alergi}', htmlspecialchars($data_alergi));
        // $tahunoperasi = array('2001','2002','2006');

        $tahunoperasi = $this->modalku->buatarray('*', 'tahun', 'data_operasi', $key , 'dihapus = "" AND id_biodata');
        $dataoperasi = $this->modalku->buatarray('*', 'keterangan', 'data_operasi', $key , 'dihapus = "" AND id_biodata');
        
        $alergi = $this->modalku->buatarray('*', 'data_alergi', 'data_alergi', $key);



        if (count($alergi) == 0 && count($dataoperasi) == 0) {
            $tahunoperasi = array('');
            $dataoperasi = array('');
            $alergi = array('');
        }

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


        // $operasi = array(
        //     'alergi' => [0 => '$alergi'],
        //     'tahun' => [0 => '$tahunoperasi'],
        //     'ket' => [0 => '$dataoperasi'],
        // );
        
        // $document->cloneRow('operasi', $operasi);
        // var_dump($alergi);




    // keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------//ok

        $panggil_request = $this->modalku->ambildatarow('*', 'request', 'id_biodata', $key);
        $panggil_request_usahamajikan = $this->modalku->ambildatamod($key, "usahamajikan", "request", "id_biodata", "usahamajikan");
        $panggil_request_waktukerja = $this->modalku->ambildatamod($key, "waktukerja", "request", "id_biodata", "waktukerja");
        $panggil_request_kondisikerja = $this->modalku->ambildatamod($key, "kondisikerja", "request", "id_biodata", "kondisikerja");
        $panggil_request_jenispekerjaandiminta = $this->modalku->ambildatamod($key, "jenispekerjaan", "request", "id_biodata", "jenispekerjaan");
        $panggil_request_lokasikerja = $this->modalku->ambildatamod($key, "lokasikerja", "request", "id_biodata", "lokasikerja");
        $panggil_request_lemburkerja = $this->modalku->ambildatamod($key, "lembur", "request", "id_biodata", "lembur");
        $keterangan_data_personal = $this->modalku->ambildatamod($key, "keterangan", "personal", "id_biodata", "keterangan");
        $keterangan_data_personal_2 = $this->modalku->ambildatamod($key, "keterangan2", "personal", "id_biodata", "keterangan2");
        // $panggil_request_keterangankerja = $this->modalku->ambildatamod($key, "keterangankerja", "request", "id_biodata", "keterangankerja");

        $document->setValue('{usahamajikan}', $panggil_request_usahamajikan);
        $document->setValue('{waktukerja}', $panggil_request_waktukerja);
        $document->setValue('{kondisikerja}', $panggil_request_kondisikerja);
        $document->setValue('{jenispekerjaandiminta}', $panggil_request_jenispekerjaandiminta);
        $document->setValue('{lokasikerja}', $panggil_request_lokasikerja);
        $document->setValue('{lemburkerja}', $panggil_request_lemburkerja);
        $document->setValue('{keterangankerja}', $keterangan_data_personal.''.$keterangan_data_personal_2);


        $pangil_data_paspor = $this->modalku->ambildatarow('*, ADDDATE(tglterbit,INTERVAL 5 YEAR) AS tglberakhir', 'paspor', 'id_biodata', $key);
        $pangil_data_paspor_lama = $this->modalku->ambildatamod($key, 'barakhir', 'pasporlama', 'id_biodata', 'ADDDATE(tglterbit,INTERVAL 5 YEAR) AS barakhir');
        $pangil_data_paspor_keterangan = $this->modalku->ambildatamod($key, 'keterangan', 'paspor', 'id_biodata', 'keterangan');
        
        $tanggal_paspor = date($pangil_data_paspor_lama);
        $tanggal_sekarang = date("Y-m-d");

        if ($pangil_data_paspor_keterangan == 'sudah') {
            $status_paspor = 'SUDAH ADA – 有';
            $rencanakerjasampai = $pangil_data_paspor->tglterbit.' s/d '.$pangil_data_paspor->tglberakhir;
        }elseif ($pangil_data_paspor_keterangan == 'belum') {
            if ($tanggal_paspor > $tanggal_sekarang) {
                    $status_paspor = 'SUDAH ADA – 有';
                    $rencanakerjasampai = $tanggal_sekarang.' s/d '.$tanggal_paspor;
               }else{
                    $status_paspor = 'BELUM ADA – 沒有';
                    $rencanakerjasampai = '';
               }   
        }else{
            $status_paspor = 'BELUM ADA – 沒有';
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

        $ambil_data_disnaker_alamat = $this->modalku->ambildatamod($key, "alamat" ,"personal a LEFT JOIN disnaker b ON a.id_biodata = b.id_biodata" , "a.id_biodata" ,"IF(b.alamat IS NOT NULL, b.alamat, a.alamat) AS alamat");


        $document->setValue('{alamatkeluarga}', $ambil_data_disnaker_alamat);



    // keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------// ok
        $panggil_pptk = $this->modalku->ambildatarow('*', 'pptk', 'id_biodata', $key );
        
        $ambil_data_pptk_json = isset($panggil_pptk->data_pptk) && $panggil_pptk->data_pptk != NULL ? json_decode($panggil_pptk->data_pptk): NULL;

        $data_pptk_kosong = array();
        for ($i=1; $i <= 9; $i++) { 
            $data_pptk_kosong[] = 'NULL';
        }


        if (isset($ambil_data_pptk_json) && $ambil_data_pptk_json != NULL) {
            $data_pptk_ditampilkan = $ambil_data_pptk_json;
        }else{
            $data_pptk_ditampilkan = $data_pptk_kosong;
        }

        // hasilnya bjek dan hanya bisa dipanggil dengan foreach
        $no =1;
        foreach ($data_pptk_ditampilkan as $data => $value) {
            if ($data != "data1") {
                if ($no == 1) {
                    if ($value == 1) {
                        $pernyataannya = 'YA BERSEDIA / 願意';
                    }if ($value == 0) {
                        $pernyataannya = 'TIDAK BERSDIA / 不能';
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
        }



//  ------------------------------------------- save file ------------------------------------------------------------------//

        $tmp_file = 'biodata_cong_yi/gugusdata.docx';
        $document->save($tmp_file);

   
        // var_dump($document);

// ------------------------------------------- download file --------------------------------------------------------------//
        if(file_exists($tmp_file)){
            // redirect('biodata_cong_yi/hasil/'.$key);
            // $this->hasil($key);
            echo "success";
            // echo "<script>";
            // echo "setTimeout(function(){ location.href = 'biodata_cong_yi/hasil/$key' },500);";
            // echo "</script>";
        }

    }

    function hasil($key=""){
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        require_once 'gugus/phpword/PHPWord2.php';
        $PHPWord = new PHPWord2();
        $document = $PHPWord->loadTemplate('biodata_cong_yi/gugusdata.docx');

        $data_foto = $this->modalku->ambildatamod($key, "foto", "personal", "id_biodata", "foto");

        $personal = $this->modalku->ambildatarow(" *, DATE(tgllahir) AS lahir_tanggal ", "personal", "id_biodata", $key);
        $tanggal_sekarang = date("Y-m-d") - $personal->lahir_tanggal;
        // die();
// data personal -------------------------------------------------------------------------------------------------------------------//

        $posisinya = $this->modalku->ambildatamod($key, "posisi", "personal", "id_biodata", "
            IF (
                id_biodata LIKE '%MF%',
                '工廠工人 PEKERJA PABRIK',

            IF (
                id_biodata LIKE '%FF%',
                '工廠工人 PEKERJA PABRIK',

            IF (
                id_biodata LIKE '%JP%',
                'JOMPO',

            IF (
                id_biodata LIKE 'FI',
                'PRT',
                ''
            )
            )
            )
            ) AS posisi

            ");



        $namamajikan = $this->modalku->ambildatamod($key, "nama", "majikan a LEFT JOIN datamajikan b ON a.kode_majikan = b.id_majikan", "id_biodata", "IF(a.namataiwan = 0, b.namamajikan, a.namataiwan) AS nama");
        $namamajikanman = $this->modalku->ambildatamod($key, "namamandarin", "majikan a LEFT JOIN datamajikan b ON a.kode_majikan = b.id_majikan", "id_biodata", "IF(a.namamajikan = 0, b.nama, a.namamajikan) AS namamandarin");
        
        $namaagen = $this->modalku->ambildatamod($key, "nama", "majikan a LEFT JOIN dataagen b ON a.kode_agen = b.id_agen", "id_biodata", "b.nama AS nama");
        $namaagenman = $this->modalku->ambildatamod($key, "namaman", "majikan a LEFT JOIN dataagen b ON a.kode_agen = b.id_agen", "id_biodata", "b.namamandarin AS namaman");





            $negara1 = $this->modalku->ambildatamod($key, "negara1", "personal", "id_biodata", "negara1");
            if ($negara1 != '') {
              $review1 = '-'.$negara1;
            }else{
              $review1 = '';
            }
            $negara2 = $this->modalku->ambildatamod($key, "negara2", "personal", "id_biodata", "negara2");
            if ($negara2 != '') {
              $review2 = '-'.$negara2;
            }else{
              $review2 = '';
            }
            $calling = $this->modalku->ambildatamod($key, "calling", "personal", "id_biodata", "calling");
            if ($calling != '') {
              $review3 = '-'.$calling;
            }else{
              $review3 = '';
            }
            $skill1 = $this->modalku->ambildatamod($key, "skill1", "personal", "id_biodata", "skill1");
            if ($skill1 != '') {
              $review4 = '-'.$skill1;
            }else{
              $review4 = '';
            }
            $skill2 = $this->modalku->ambildatamod($key, "skill2", "personal", "id_biodata", "skill2");
            if ($skill2 != '') {
              $review5 = '-'.$skill2;
            }else{
              $review5 = '';
            }
            $skill3 = $this->modalku->ambildatamod($key, "skill3", "personal", "id_biodata", "skill3");
            if ($skill3 != '') {
              $review6 = '-'.$skill3;
            }else{
              $review6 = '';
            }   



            $umur_data = $this->modalku->ambildatamod($key, "tanggal", "personal", "id_biodata", "DATE(tgllahir) AS tanggal");

            $dates = date("Y-m-d");

            $umur_sekarang = $dates - $umur_data;


        $document->setValue('kerjaposisi', $posisinya);
        $document->setValue('namaagen', $namaagen.' - '.$namaagenman);
        $document->setValue('namamajikan', $namamajikanman.' - '.$namamajikan);
        $document->setValue('kodeid', $personal->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6);
        $document->setValue('kodepl', $personal->kode_sponsor);
        $document->setValue('alamat', $personal->alamat);
        $document->setValue('provinsi', $personal->provinsi);


        $document->setValue('nama', htmlspecialchars($personal->nama));
        $document->setValue('namamandarin', htmlspecialchars($personal->nama_mandarin));
        $document->setValue('tanggaldaftar', htmlspecialchars($personal->tanggaldaftar));
        $document->setValue('jeniskelamin', htmlspecialchars($personal->jeniskelamin));
        $document->setValue('tinggibadan', htmlspecialchars($personal->tinggi));
        $document->setValue('warganegara', htmlspecialchars($personal->warganegara));
        $document->setValue('beratbadan', htmlspecialchars($personal->berat));
        $document->setValue('tanggallahir', htmlspecialchars($personal->tgllahir));
        $document->setValue('agama', htmlspecialchars($personal->agama));
        $document->setValue('tempatlahir', htmlspecialchars($personal->tempatlahir));
        $document->setValue('status', htmlspecialchars($personal->status));
        $document->setValue('umur', $umur_sekarang);
        $document->setValue('tanggalpernikahan', htmlspecialchars($personal->tglmenikah));


        $document->setValue('pendidikan', htmlspecialchars($personal->pendidikan));
        $document->setValue('statuspendidikan', htmlspecialchars($personal->statuspendidikan));
        $document->setValue('bahasamandarin', '國語 MANDARIN');
        $document->setValue('statusbahasamandarin', htmlspecialchars($personal->mandarin));
        $document->setValue('bahasainggriss', '英語 INGGRIS');
        $document->setValue('statusbahasainggriss', htmlspecialchars($personal->inggris));


		$sql = "SELECT a.*,b.id_setting_vaksinlist as xid1,c.id_setting_vaksinlist as xid2,d.id_setting_vaksinlist as xid3,b.nama as xnama1,c.nama as xnama2,d.nama as xnama3 FROM vaksin a 
				LEFT JOIN setting_vaksinlist b ON a.nama1=b.id_setting_vaksinlist
				LEFT JOIN setting_vaksinlist c ON a.nama2=c.id_setting_vaksinlist 
				LEFT JOIN setting_vaksinlist d ON a.nama3=d.id_setting_vaksinlist  
				
				WHERE a.id_biodata='".$key."'";
                $vaksin = $this->db->query($sql)->row();

        $document->setValue('vaksin1', htmlspecialchars(isset($vaksin->xnama1)?$vaksin->xnama1:""));
        $document->setValue('vaksin2', htmlspecialchars(isset($vaksin->xnama2)?$vaksin->xnama2:""));
        $document->setValue('vaksin3', htmlspecialchars(isset($vaksin->xnama3)?$vaksin->xnama3:""));
        $document->setValue('vaksin1tgl', htmlspecialchars(isset($vaksin->tgl1)?$vaksin->tgl1:""));
        $document->setValue('vaksin2tgl', htmlspecialchars(isset($vaksin->tgl2)?$vaksin->tgl2:""));
        $document->setValue('vaksin3tgl', htmlspecialchars(isset($vaksin->tgl3)?$vaksin->tgl3:""));

// data family ---------------------------------------------------------------------------------------------------------------------//

        $family = $this->modalku->ambildatarow("*", "family", "id_biodata", $key);

        $document->setValue('namabapak', htmlspecialchars($family->nama_bapak));
        $document->setValue('umurbapak', htmlspecialchars($family->umur_bapak));
        $document->setValue('pekerjaanbapak', htmlspecialchars($family->kerja_bapak));
        $document->setValue('namaibu', htmlspecialchars($family->nama_ibu));
        $document->setValue('umuribu', htmlspecialchars($family->umur_ibu));
        $document->setValue('pekerjaanibu', htmlspecialchars($family->kerja_ibu));
        $document->setValue('namaistri', htmlspecialchars($family->nama_istri_suami));
        $document->setValue('umuristri', htmlspecialchars($family->umur_istri_suami));
        $document->setValue('pekerjaanistri', htmlspecialchars($family->kerja_istri_suami));
        $document->setValue('banyaksaudaralaki', htmlspecialchars($family->saudara_laki));
        $document->setValue('banyaksaudaraperempuan', htmlspecialchars($family->saudar_pr));
        $document->setValue('anaknourutke', htmlspecialchars($family->anak_ke));
        $document->setValue('anak', htmlspecialchars($family->data_anak));


// data working ------------------------------------------------------------------------------------------------------

        // $pengalaman = $this->modalku->ambildataresult('*', 'working', 'id_biodata', $key);
    
        // for ($i=1; $i <= count($pengalaman) ; $i++) { 
        //     $document->setValue('negara'.$i, $pengalaman[$i]->negara);
        // }





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

        $data_foto_arc = $this->db->query("SELECT * FROM upload_arc WHERE id_biodata = '$key'")->result();

        if ($data_foto_arc != null || $data_foto_arc != '') {
            foreach ($data_foto_arc as $keya => $data_foto_arc) {
                $datagambar="assets/upload_arc/".$data_foto_arc->file;
                $aImgs1 = array(
                    array(
                    'img'   => $datagambar,
                    'size'  => array(500, 302),
                    )
                );
                $document->replaceStrToImg( 'arc'.$keya, $aImgs1);
            }
        }else{
        
            $document->setValue('arc', '');

        }
        

        $filename = 'biodata_cong_yi/filenya.docx';

        $tmp_file = 'biodata_cong_yi/gugusdata.docx';

        $isinya=$document->save($filename);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename= '.$key.' '.htmlspecialchars($personal->nama).'.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
            
        flush();
        readfile($isinya);
        unlink($isinya);
        // unlink($tmp_file); // deletes the temporary file
        exit;
    }

}