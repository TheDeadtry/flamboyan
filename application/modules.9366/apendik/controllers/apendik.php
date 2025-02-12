<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Apendik extends MX_Controller{
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
                redirect('apendik/document_send_taiwan/MF-1633');
            }
        }
    }





    function apendik_a($kategori, $key){



        header ("Content-type: text/html; charset=utf-8");
        require_once 'PHPWord/PHPWord.php';
        $PHPWord = new PHPWord();


        if ($kategori == 'a') {
            $document = $PHPWord->loadTemplate('files/apendik_a.docx');
        }elseif ($kategori == 'b') {
            $document = $PHPWord->loadTemplate('files/apendik_b.docx');
        }elseif ($kategori == 'c') {
            $document = $PHPWord->loadTemplate('files/apendik_c.docx');
        }elseif ($kategori == 'd') {
            $document = $PHPWord->loadTemplate('files/apendik_d.docx');
        }elseif ($kategori == 'b10') {
            $document = $PHPWord->loadTemplate('files/b10.docx');
        }elseif ($kategori == 'b10.2') {
            $document = $PHPWord->loadTemplate('files/B10.2.docx');
        }elseif ($kategori == 'C6') {
            $document = $PHPWord->loadTemplate('files/C6.docx');
        }elseif ($kategori == 'C7') {
            $document = $PHPWord->loadTemplate('files/C7.docx');
        }elseif ($kategori == 'C8') {
            $document = $PHPWord->loadTemplate('files/C8.docx');
        }elseif ($kategori == 'C9') {
            $document = $PHPWord->loadTemplate('files/C9.docx');
        }elseif ($kategori == 'C10') {
            $document = $PHPWord->loadTemplate('files/C10.docx');
        }elseif ($kategori == 'C11') {
            $document = $PHPWord->loadTemplate('files/C11.docx');
        }elseif ($kategori == 'C12') {
            $document = $PHPWord->loadTemplate('files/C12.docx');
        }elseif ($kategori == 'C13') {
            $document = $PHPWord->loadTemplate('files/C13.docx');
        }elseif ($kategori == 'C14') {
            $document = $PHPWord->loadTemplate('files/C14.docx');
        }elseif ($kategori == 'C15') {
            $document = $PHPWord->loadTemplate('files/C15.docx');
        }elseif ($kategori == 'C16') {
            $document = $PHPWord->loadTemplate('files/C16.docx');
        }elseif ($kategori == 'C17') {
            $document = $PHPWord->loadTemplate('files/C17.docx');
        }elseif ($kategori == 'amplopabc') {
            $document = $PHPWord->loadTemplate('files/amplopabc.docx');
        }elseif ($kategori == 'D.02') {
            $document = $PHPWord->loadTemplate('files/D.02.docx');
        }elseif ($kategori == 'pppt') {
            $document = $PHPWord->loadTemplate('files/PERNYATAAN PENGEMBALIAN PAJAK TKI.docx');
        }elseif ($kategori == 'spt') {
            $document = $PHPWord->loadTemplate('files/SURAT PERNYATAAN TKA.docx');
        }elseif ($kategori == 'ptdat') {
            $document = $PHPWord->loadTemplate('files/PERJANJIAN TKA DAN AGEN TAIWAN.docx');
        }elseif ($kategori == 'konker') {
            $document = $PHPWord->loadTemplate('files/KONTRAK KERJA.docx');
        }
// -------------------------------// content //--------------------------------------------------------// 
        $data = $this->db->query("
         SELECT
         a.id_biodata,
         a.nama,
         a.jeniskelamin,
         a.warganegara,
         a.nama_mandarin,
         b.kode_agen,
         c.nama AS nama_agen,
         c.namamandarin AS mandarin_agen,

         IF (
         b.namamajikan = 0,
         d.nama,
         b.namamajikan
     ) AS nama_majikan,

     IF (
     b.namataiwan = 0,
     d.namamajikan,
     b.namataiwan
 ) AS majikan_mandarin,
 e.nopaspor,
 f.no_suhan,
 g.no_visapermit,
 DATE(h.tglberangkat) AS tgltiba,
 h.statsuhandok,
 h.statvpdok,
 d.alamat_mandarin,
 d.alamat,
 d.hp,
 c.nosiup,
 c.alamat AS alamatagen2,
 c.alamatmandarin AS alamatmandarinagen,
 c.nosiup,
 c.notel AS notelpagen,
 c.direktur,
 c.direktur2 AS direkturmandarin,
 i.nama_bank,
 j.isikredit,
 h.ketdoksuhan,
 h.ketdokvp,
 k.alamat as alamattki
 FROM
 personal a
 LEFT JOIN majikan b ON a.id_biodata = b.id_biodata
 LEFT JOIN dataagen c ON b.kode_agen = c.id_agen
 LEFT JOIN datamajikan d ON b.kode_majikan = d.id_majikan
 LEFT JOIN paspor e ON a.id_biodata = e.id_biodata
 LEFT JOIN datasuhan f ON b.kode_suhan = f.id_suhan
 LEFT JOIN datavisapermit g ON b.kode_visapermit = g.id_visapermit
 LEFT JOIN visa h ON a.id_biodata = h.id_biodata
 LEFT JOIN signingbank i ON a.id_biodata = i.id_biodata
 LEFT JOIN datakreditbank j ON i.idkredit = j.id_kreditbank
 LEFT JOIN disnaker k ON a.id_biodata = k.id_biodata
 WHERE a.id_biodata = '$key'

 ")->row();

        $tanggal_tiba = $data->tgltiba;

        $tanggal_tiba = explode("-", $tanggal_tiba);


        if ($data->jeniskelamin == '男') {
            $jenis_kelamin = 'Pria';
        }elseif ($data->jeniskelamin == '女') {
            $jenis_kelamin = 'Wanita';
        }else{
            $jenis_kelamin = '';
        }


        // if ($data->$fotoktp == '男') {
        //     $jenis_kelamin = 'Pria';
        // }elseif ($data->jeniskelamin == '女') {
        //     $jenis_kelamin = 'Wanita';
        // }else{
        //     $jenis_kelamin = '';
        // }
        // $ambilktp = "SELECT * FROM foto WHERE id_biodata='$idbiodata' AND jenis='ktp'";
        // $tampildataktp = $this->db->query($ambilktp)->row();
        // $namaktp = $tampildataktp->namafile;

        // if(isset($namaktp)){

        //     $dataktpsaya="upload-ktp/".$namaktp;

        //     $aImgs7 = array(
        //         array(
        //             'img' => $dataktpsaya,
        //             'size' => array(265, 165),
        //         )
        //     );

        // }else{

        //     $document->setValue('{fotoktp}', '');

        // }

        // $document->setValue('{fotoktp}',htmlspecialchars ($fotoktp));
        $document->setValue('{agenmandarin}', htmlspecialchars ($data->mandarin_agen));     
        $document->setValue('{jeniskelamin}', htmlspecialchars ($data->jeniskelamin));     
        $document->setValue('{jeniskelaminindo}', strtoupper($jenis_kelamin));     
        $document->setValue('{warganegara}', htmlspecialchars ($data->warganegara));     
        $document->setValue('{majikanmandarin}', htmlspecialchars ($data->majikan_mandarin));     
        $document->setValue('{namamandarin}', htmlspecialchars ($data->nama_mandarin));     
        $document->setValue('{namaagen}', htmlspecialchars ($data->nama_agen));     
        $document->setValue('{namamajikan}', htmlspecialchars ($data->nama_majikan));     
        $document->setValue('{nama}', htmlspecialchars($data->nama));   
        $document->setValue('{alamattki}', htmlspecialchars ($data->alamattki));        
        $document->setValue('{idtki}', htmlspecialchars ($data->id_biodata));     
        $document->setValue('{nopaspor}', htmlspecialchars ($data->nopaspor));     
        $document->setValue('{tglkedatangan}', htmlspecialchars ($data->tgltiba));     
        $document->setValue('{suhan}', htmlspecialchars ($data->no_suhan));     
        $document->setValue('{visapermit}', htmlspecialchars ($data->no_visapermit));     
        $document->setValue('{keasliansuhan}', htmlspecialchars ($data->statsuhandok));     
        $document->setValue('{keaslianvisapermit}', htmlspecialchars ($data->statvpdok));     
        $document->setValue('{alamat_mandarin}', htmlspecialchars ($data->alamat_mandarin));     
        $document->setValue('{alamat}', htmlspecialchars ($data->alamat));     
        $document->setValue('{hp}', htmlspecialchars ($data->hp));   
        $document->setValue('{tgl}', $tanggal_tiba[2]);   
        $document->setValue('{bln}', $tanggal_tiba[1]);   
        $document->setValue('{thn}', $tanggal_tiba[0]);   
        $document->setValue('{namabank}', htmlspecialchars ($data->nama_bank));   
        $document->setValue('{typekredit}', htmlspecialchars ($data->isikredit));
        $document->setValue('{ketdoksuhan}', htmlspecialchars ($data->ketdoksuhan));
        $document->setValue('{ketdokvp}', htmlspecialchars ($data->ketdokvp));
        $document->setValue('{nosiup}', htmlspecialchars ($data->nosiup));
        $document->setValue('{direktur}', htmlspecialchars ($data->direktur));
        $document->setValue('{direkturmandarin}', htmlspecialchars ($data->direkturmandarin));
        $document->setValue('{notelpagen}', htmlspecialchars ($data->notelpagen));
        $document->setValue('{alamatmandarinagen}', htmlspecialchars ($data->alamatmandarinagen));
        $idagen = $data->kode_agen;
        echo "<pre>";

        $dapatkan_agen = $this->db->query("SELECT * FROM dataagen WHERE id_agen = '$idagen'")->row();

        $alamatagennya = htmlspecialchars($dapatkan_agen->alamat);        
        $document->setValue('{alamatagen2}', $alamatagennya);
        //echo $alamatagennya;
        
        
        

//  ------------------------------------------- save file ------------------------------------------------------------------//

        $tmp_file = 'biodata_cong_yi/apendik_a.docx';
        $document->save($tmp_file);

        
        $namannya = str_replace("'", "--" ,$data->nama);


// ------------------------------------------- download file --------------------------------------------------------------//

        redirect('apendik/hasil/'.$key.'/'.$kategori.'/'.$namannya);

    }

    function hasil($key, $kategori, $nama){

        $nama = str_replace("--", "'" ,$nama);

        require_once 'gugus/phpword/PHPWord.php';
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('biodata_cong_yi/apendik_a.docx');

        if ($kategori == 'a') {
            $namafile = "Apendik A ".date("d-m-Y");
        }elseif ($kategori == 'b') {
            $namafile = "Apendik B ".date("d-m-Y");
        }elseif ($kategori == 'c') {
            $namafile = "Apendik C ".date("d-m-Y");
        }elseif ($kategori == 'd') {
            $namafile = "Apendik D ".date("d-m-Y");
        }elseif ($kategori == 'b10') {
            $namafile = "b10 ".date("d-m-Y");
        }elseif ($kategori == 'b10.2') {
            $namafile = "b10.2 ".date("d-m-Y");
        }elseif ($kategori == 'C6') {
            $namafile = "C6 ".date("d-m-Y");
        }elseif ($kategori == 'C7') {
            $namafile = "C7 ".date("d-m-Y");
        }elseif ($kategori == 'C8') {
            $namafile = "C8 ".date("d-m-Y");
        }elseif ($kategori == 'C9') {
            $namafile = "C9 ".date("d-m-Y");
        }elseif ($kategori == 'C10') {
            $namafile = "C10 ".date("d-m-Y");
        }elseif ($kategori == 'C11') {
            $namafile = "C11 ".date("d-m-Y");
        }elseif ($kategori == 'C12') {
            $namafile = "C12 ".date("d-m-Y");
        }elseif ($kategori == 'C13') {
            $namafile = "C13 ".date("d-m-Y");
        }elseif ($kategori == 'C14') {
            $namafile = "C14 ".date("d-m-Y");
        }elseif ($kategori == 'C15') {
            $namafile = "C15 ".date("d-m-Y");
        }elseif ($kategori == 'C16') {
            $namafile = "C16 ".date("d-m-Y");
        }elseif ($kategori == 'C17') {
            $namafile = "C17 ".date("d-m-Y");
        }elseif ($kategori == 'amplopabc') {
            $namafile = "amplopabc ".date("d-m-Y");
        }elseif ($kategori == 'D.02') {
            $namafile = "D.02 ".date("d-m-Y");
        }elseif ($kategori == 'pppt') {
            $namafile = " PERNYATAAN PENGEMBALIAN PAJAK TKI ".date("d-m-Y");
        }elseif ($kategori == 'spt') {
            $namafile = " SURAT PERNYATAAN TKA ".date("d-m-Y");
        }elseif ($kategori == 'ptdat') {
            $namafile = " PERJANJIAN TKA DAN AGEN TAIWAN ".date("d-m-Y");
        }


        $filename = 'biodata_cong_yi/apendik_a_result.docx';
        $isinya=$document->save($filename);
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename= '.$nama.' '.$namafile.'.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        
        flush();
        readfile($isinya);
        unlink($isinya); // deletes the temporary file
        exit;
    }



    function document_send_taiwan($key){
        header ("Content-type: text/html; charset=utf-8");
        require_once 'PHPWord/PHPWord.php';
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('files/document_send_taiwan.docx');
// -------------------------------------------- area data ------------------------------------------------------------------//

        $data = $this->db->query("

            SELECT
            a.id_biodata,
            a.nama,
            a.nama_mandarin,
            b.kode_agen,
            c.nama AS nama_agen,
            c.namamandarin AS mandarin_agen,

            IF (
            d.nama IS NULL,
            b.namamajikan,
            d.nama
            ) AS nama_majikan,

            IF (
            d.namamajikan IS NULL,
            b.namataiwan,
            d.namamajikan
            ) AS majikan_mandarin,
            e.nopaspor,
            if(f.no_suhan IS NULL, b.id_suhan, f.no_suhan ) AS no_suhan,
            if(g.no_visapermit IS NULL, b.id_visapermit, g.no_visapermit ) AS no_visapermit,
            DATE(h.tglberangkat) AS tgltiba,
            h.statsuhandok,
            h.statvpdok,
            d.alamat_mandarin,
            d.alamat,
            d.hp,
            h.jddok,
            h.arcdok,
            h.icdok,
            h.apendik_a,
            h.apendik_b,
            h.apendik_c,
            h.apendik_d,
            h.ketdoksuhan,
            h.ketdokvp,
            h.isidok1,
            h.isidok2,
            h.isidok3,
            h.isidok4,
            h.isidok5,
            h.isidok6,
            h.isidok7,
            h.isidok8,
            h.statdok1,
            h.statdok2,
            h.statdok3,
            h.statdok4,
            h.statdok5,
            h.statdok6,
            h.statdok7,
            h.statdok8,
            h.tempatsuhandok,
            h.tempatvpdok,
            h.id_biodata_dititipkan,
            h.nama_dititipkan,
            h.tgl_terbang_dititipkan,
            h.no_suhan_dititipkan,
            h.id_biodata_dititipkan2,
            h.nama_dititipkan2,
            h.tgl_terbang_dititipkan2,
            h.no_vp_dititipkan,
            h.id_biodata_titipan,
            h.nama_titipan,
            h.tgl_terbang_titipan,
            h.no_suhan_titipan,
            h.no_vp_titipan,
            h.ketdok

            FROM
            personal a
            LEFT JOIN majikan b ON a.id_biodata = b.id_biodata
            LEFT JOIN dataagen c ON b.kode_agen = c.id_agen
            LEFT JOIN datamajikan d ON b.kode_majikan = d.id_majikan
            LEFT JOIN paspor e ON a.id_biodata = e.id_biodata
            LEFT JOIN datasuhan f ON b.kode_suhan = f.id_suhan
            LEFT JOIN datavisapermit g ON b.kode_visapermit = g.id_visapermit
            LEFT JOIN visa h ON a.id_biodata = h.id_biodata
            WHERE a.id_biodata = '$key'
            ")->row();

        $data22 = $this->db->query("SELECT * FROM signingbank LEFT JOIN datakreditbank
            ON signingbank.idkredit=datakreditbank.id_kreditbank
            WHERE signingbank.id_biodata='$key'")->row();


        $tanggal_tiba = $data->tgltiba;
        $tanggal_tiba = explode("-", $tanggal_tiba);


        $document->setValue('{agenmandarin}', $data->mandarin_agen);     
        $document->setValue('{majikanmandarin}', $data->majikan_mandarin);     
        $document->setValue('{namamandarin}', $data->nama_mandarin);  

       // lokasi trouble 
        $document->setValue('{namaagen}', htmlspecialchars($data->nama_agen));     
        $document->setValue('{namamajikan}', htmlspecialchars($data->nama_majikan));

        $document->setValue('{nama}', htmlspecialchars($data->nama));     
        $document->setValue('{idtki}', htmlspecialchars($data->id_biodata)); 
        $document->setValue('{ketdoc}', htmlspecialchars($data->ketdok)); 
        
        $document->setValue('{id_biodata_dititipkan}', htmlspecialchars($data->id_biodata_dititipkan));     
        $document->setValue('{nama_dititipkan}', htmlspecialchars($data->nama_dititipkan)); 
        $document->setValue('{tgl_terbang_dititipkan}', htmlspecialchars($data->tgl_terbang_dititipkan)); 
        $document->setValue('{id_biodata_dititipkan2}', htmlspecialchars($data->id_biodata_dititipkan2));     
        $document->setValue('{nama_dititipkan2}', htmlspecialchars($data->nama_dititipkan2)); 
        $document->setValue('{tgl_terbang_dititipkan2}', htmlspecialchars($data->tgl_terbang_dititipkan2)); 
        $document->setValue('{no_suhan_dititipkan}', htmlspecialchars($data->no_suhan_dititipkan)); 
        $document->setValue('{no_vp_dititipkan}', htmlspecialchars($data->no_vp_dititipkan)); 
        $document->setValue('{id_biodata_titipan}', htmlspecialchars($data->id_biodata_titipan));     
        $document->setValue('{nama_titipan}', htmlspecialchars($data->nama_titipan)); 
        $document->setValue('{tgl_terbang_titipan}', htmlspecialchars($data->tgl_terbang_titipan)); 
        $document->setValue('{no_suhan_titipan}', htmlspecialchars($data->no_suhan_titipan)); 
        $document->setValue('{no_vp_titipan}', htmlspecialchars($data->no_vp_titipan)); 

        $document->setValue('{nopaspor}', htmlspecialchars($data->nopaspor));     
        $document->setValue('{tglkedatangan}', htmlspecialchars($data->tgltiba));     
        $document->setValue('{suhan}', htmlspecialchars($data->no_suhan));     
        $document->setValue('{visapermit}', htmlspecialchars($data->no_visapermit));     
        $document->setValue('{keasliansuhan}', htmlspecialchars($data->statsuhandok));     
        $document->setValue('{keaslianvisapermit}', htmlspecialchars($data->statvpdok));     
        $document->setValue('{alamat_mandarin}', htmlspecialchars($data->alamat_mandarin));     
        $document->setValue('{alamat}', htmlspecialchars($data->alamat));     
        $document->setValue('{hp}', htmlspecialchars($data->hp));   
        // $document->setValue('{tgl}', $tanggal_tiba[2]));   
        // $document->setValue('{bln}', $tanggal_tiba[1]));   
        // $document->setValue('{thn}', $tanggal_tiba[0]));  
        $document->setValue('{jd}', htmlspecialchars($data->jddok));  
        $document->setValue('{arc}', htmlspecialchars($data->arcdok));  
        $document->setValue('{ic}', htmlspecialchars($data->icdok));
        $document->setValue('{ketdoksuhan}', htmlspecialchars($data->ketdoksuhan));
        $document->setValue('{ketdokvp}', htmlspecialchars($data->ketdokvp));
        $document->setValue('{negaratujuan}', htmlspecialchars($data->tempatsuhandok));
        $document->setValue('{negaratujuan2}', htmlspecialchars($data->tempatvpdok));

        //kredit bank
        $document->setValue('{kreditbank1}', htmlspecialchars($data22->mandarinnya));
        $document->setValue('{kreditbank2}', htmlspecialchars($data22->mandarinnya2));

        // if ($data->no_suhan_dititipkan != '') {
        //     $document->setValue('{no_suhan_dititipkan}',htmlspecialchars($data->no_suhan_dititipkan));
        // }else{
        //     $document->setValue('{no_suhan_dititipkan}' ,'Suhan Tidak diTitipkan');
        // }

        // if ($data->no_vp_dititipkan != '') {
        //     $document->setValue('{no_vp_dititipkan}',htmlspecialchars($data->no_vp_dititipkan));
        // }else{
        //     $document->setValue('{no_vp_dititipkan}' ,'Visa Permit Tidak Dititipkan');
        // }
        
        
        if ($data->apendik_b != '') {
            $document->setValue('{apendik_b}', '附索引B - TERLAMPIR APPENDIX B');
            $document->setValue('{apendik_b_terlampir}', '按要求SESUAI PERMINTAAN');
        }else{
            $document->setValue('{apendik_b}' ,'');
            $document->setValue('{apendik_b_terlampir}' ,'');
        }

        $permintaan_agen = array();
        $permintaan_agen_terlampir = array();

        if ($data->apendik_a != '') {
            $permintaan_agen[] = "附索引A - TERLAMPIR APPENDIX A";
            $permintaan_agen_terlampir[] = "按要求SESUAI PERMINTAAN";
        }else{
            $permintaan_agen[] = "";
            $permintaan_agen_terlampir[] = "";
        }

        if ($data->apendik_c != '') {
            $permintaan_agen[] = "附索引C - TERLAMPIR APPENDIX C";
            $permintaan_agen_terlampir[] = "按要求SESUAI PERMINTAAN";
        }else{
            $permintaan_agen[] = "";
            $permintaan_agen_terlampir[] = "";
        }

        if ($data->apendik_d != '') {
            $permintaan_agen[] = "附索引D - TERLAMPIR APPENDIX D";
            $permintaan_agen_terlampir[] = "按要求SESUAI PERMINTAAN";
        }else{
            $permintaan_agen[] = "";
            $permintaan_agen_terlampir[] = "";
        }


        $isidok = array();
        // if ($data->isidok1 != "") {
        //     $isidok[] =  $data->isidok1;
        // }

        // if ($data->isidok2 != "") {
        //     $isidok[] =  $data->isidok2;
        // }

        if ($data->isidok3 != "") {
            $isidok[] =  $data->isidok3;
        }

        if ($data->isidok4 != "") {
            $isidok[] =  $data->isidok4;
        }

        if ($data->isidok5 != "") {
            $isidok[] =  $data->isidok5;
        }

        if ($data->isidok6 != "") {
            $isidok[] =  $data->isidok6;
        }

        if ($data->isidok7 != "") {
            $isidok[] =  $data->isidok7;
        }

        if ($data->isidok8 != "") {
            $isidok[] =  $data->isidok8;
        }

        $statdok = array();

        // if ($data->statdok1 != "") {
        //     $statdok[] =  $data->statdok1;
        // }

        // if ($data->statdok2 != "") {
        //     $statdok[] =  $data->statdok2;
        // }

        if ($data->statdok3 != "") {
            $statdok[] =  $data->statdok3;
        }

        if ($data->statdok4 != "") {
            $statdok[] =  $data->statdok4;
        }

        if ($data->statdok5 != "") {
            $statdok[] =  $data->statdok5;
        }

        if ($data->statdok6 != "") {
            $statdok[] =  $data->statdok6;
        }

        if ($data->statdok7 != "") {
            $statdok[] =  $data->statdok7;
        }

        if ($data->statdok8 != "") {
            $statdok[] =  $data->statdok8;
        }

        $nodoklain = array();
        
        if (count($statdok) == 0) {
            $statdok[] = "";
            $nodoklain[] = "";
        }else{
            for ($i=0; $i < count($isidok); $i++) { 
                $nodoklain[] = $i+18;
            }
        }

        if (count($isidok) == 0) {
            $isidok[] = "";
        }

        $doklain = array(
            'no' => $nodoklain,
            'isidok' => $isidok,
            'statdok' => $statdok 
        );

        $document->cloneRow('datalain', $doklain);
        $document->cloneRow('datalain2', $doklain);

        $isikredit = array();
        
        if ($data22->mandarinnya != "") {
            $isikredit[] =  $data22->mandarinnya;
        }

        if ($data22->mandarinnya2 != "") {
            $isikredit[] =  $data22->mandarinnya2;
        }

        $statkredit = array();

        if ($data22->statuskredit != "") {
            $statkredit[] =  $data22->statuskredit;
        }

        if ($data22->statuskredit2 != "") {
            $statkredit[] =  $data22->statuskredit2;
        }

        $nokreditlain = array();
        
        if (count($statkredit) == 0) {
            $statkredit[] = "";
            $nokreditlain[] = "";
        }else{
            for ($i=0; $i < count($isikredit); $i++) { 
                $nokreditlain[] = $i+17;
            }
        }

        if (count($isikredit) == 0) {
            $isikredit[] = "";
        }


        $kreditlain = array(
            'nokredit' => $nokreditlain,
            'isikredit' => $isikredit,
            'statkredit' => $statkredit 
        );

        $document->cloneRow('datakredit', $kreditlain);
        $document->cloneRow('datakredit2', $kreditlain);

        $data_apendik = array(
            'apendik' => $permintaan_agen,
            'terlampir' => $permintaan_agen_terlampir,
        );

        $document->cloneRow('data', $data_apendik);

        $pinho = substr($data->id_biodata, -7, 2) ;

        if ($pinho == "FI" || $pinho == "MI") {
            $pinhonya = 'informal';
        }elseif ($pinho == "FF" || $pinho == "MF") {
            $pinhonya = 'formal';
        }elseif ($pinho == "JP") {
            $pinhonya = 'Jompo';
        }

        echo $pinhonya;

        $dapatkan_dokument_permintaan_agen = $this->modalku->buatarray("dokumen", "dokumen", "detail_dokumen", $data->kode_agen, "id_agen", " AND ( status = '$pinhonya' OR status = '') AND type_permintaan = 'Permintaan Agen'" );

        $dapatkan_dokument_permintaan_agen_status = $this->modalku->buatarray("stats", "stats", "detail_dokumen", $data->kode_agen, "id_agen", " AND ( status = '$pinhonya' OR status = '') AND type_permintaan = 'Permintaan Agen'" );

        $dapatkan_dokument_permintaan_majikan = $this->modalku->buatarray("dokumen", "dokumen", "detail_dokumen", $data->kode_agen, "id_agen", " AND ( status = '$pinhonya' OR status = '') AND type_permintaan = 'Permintaan Majikan'" );

        $dapatkan_dokument_permintaan_majikan_status = $this->modalku->buatarray("stats", "stats", "detail_dokumen", $data->kode_agen, "id_agen", " AND ( status = '$pinhonya' OR status = '') AND type_permintaan = 'Permintaan Majikan'" );


        $dapatkan_data_detail_document = $this->db->query("SELECT * FROM detail_dokumen WHERE id_agen = '$data->kode_agen'")->result();
        echo "<pre>";


        if (count($dapatkan_dokument_permintaan_majikan)==0) {
            $dapatkan_dokument_permintaan_majikan = array("");
            $dapatkan_dokument_permintaan_majikan_status = array("");
        }

        $permintaan = array(
            'permintaan_majikan' => $dapatkan_dokument_permintaan_majikan,
            'permintaan_majikan_status' => $dapatkan_dokument_permintaan_majikan_status,
        );

        $document->cloneRow('apendik', $permintaan);
        $document->cloneRow('apendik3', $permintaan);


        if (count($dapatkan_dokument_permintaan_agen)==0) {
            $dapatkan_dokument_permintaan_agen = array("");
            $dapatkan_dokument_permintaan_agen_status = array("");
        }

        $permintaan2 = array(
            'permintaan_majikan' => $dapatkan_dokument_permintaan_agen,
            'permintaan_majikan_status' => $dapatkan_dokument_permintaan_agen_status,
        );

        $document->cloneRow('apendik2', $permintaan2);

        $document->cloneRow('apendik4', $permintaan2);

//  ------------------------------------------- save file ------------------------------------------------------------------//

        $tmp_file = 'biodata_cong_yi/document_send_taiwan_master.docx';
        $document->save($tmp_file);


// ------------------------------------------- download file --------------------------------------------------------------//

        redirect('apendik/result_print_out/');
    }

    function document_sebelum_terbang($key){
        header ("Content-type: text/html; charset=utf-8");
        require_once 'PHPWord/PHPWord.php';
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('files/document_sebelum_terbang.docx');
// -------------------------------------------- area data ------------------------------------------------------------------//

        $data = $this->db->query("

            SELECT
            a.id_biodata,
            a.nama,
            a.nama_mandarin,
            b.kode_agen,
            c.nama AS nama_agen,
            c.namamandarin AS mandarin_agen,

            IF (
            d.nama IS NULL,
            b.namamajikan,
            d.nama
            ) AS nama_majikan,

            IF (
            d.namamajikan IS NULL,
            b.namataiwan,
            d.namamajikan
            ) AS majikan_mandarin,
            e.nopaspor,
            if(f.no_suhan IS NULL, b.id_suhan, f.no_suhan ) AS no_suhan,
            if(g.no_visapermit IS NULL, b.id_visapermit, g.no_visapermit ) AS no_visapermit,
            DATE(h.tglberangkat) AS tgltiba,
            h.statsuhandok,
            h.statvpdok,
            d.alamat_mandarin,
            d.alamat,
            d.hp,
            h.jddok,
            h.arcdok,
            h.icdok,
            h.apendik_a,
            h.apendik_b,
            h.apendik_c,
            h.apendik_d,
            h.ketdoksuhan,
            h.ketdokvp,
            h.isidok1,
            h.isidok2,
            h.isidok3,
            h.isidok4,
            h.isidok5,
            h.isidok6,
            h.isidok7,
            h.isidok8,
            h.statdok1,
            h.statdok2,
            h.statdok3,
            h.statdok4,
            h.statdok5,
            h.statdok6,
            h.statdok7,
            h.statdok8,
            h.tempatsuhandok,
            h.tempatvpdok,
            h.id_biodata_dititipkan,
            h.nama_dititipkan,
            h.tgl_terbang_dititipkan,
            h.no_suhan_dititipkan,
            h.id_biodata_dititipkan2,
            h.nama_dititipkan2,
            h.tgl_terbang_dititipkan2,
            h.no_vp_dititipkan,
            h.id_biodata_titipan,
            h.nama_titipan,
            h.tgl_terbang_titipan,
            h.no_suhan_titipan,
            h.no_vp_titipan,
            h.ketdok

            FROM
            personal a
            LEFT JOIN majikan b ON a.id_biodata = b.id_biodata
            LEFT JOIN dataagen c ON b.kode_agen = c.id_agen
            LEFT JOIN datamajikan d ON b.kode_majikan = d.id_majikan
            LEFT JOIN paspor e ON a.id_biodata = e.id_biodata
            LEFT JOIN datasuhan f ON b.kode_suhan = f.id_suhan
            LEFT JOIN datavisapermit g ON b.kode_visapermit = g.id_visapermit
            LEFT JOIN visa h ON a.id_biodata = h.id_biodata
            WHERE a.id_biodata = '$key'
            ")->row();

        $data22 = $this->db->query("SELECT * FROM signingbank LEFT JOIN datakreditbank
            ON signingbank.idkredit=datakreditbank.id_kreditbank
            WHERE signingbank.id_biodata='$key'")->row();


        $tanggal_tiba = $data->tgltiba;
        $tanggal_tiba = explode("-", $tanggal_tiba);


        $document->setValue('{agenmandarin}', $data->mandarin_agen);     
        $document->setValue('{majikanmandarin}', $data->majikan_mandarin);     
        $document->setValue('{namamandarin}', $data->nama_mandarin);  

       // lokasi trouble 
        $document->setValue('{namaagen}', htmlspecialchars($data->nama_agen));     
        $document->setValue('{namamajikan}', htmlspecialchars($data->nama_majikan));

        $document->setValue('{nama}', htmlspecialchars($data->nama));     
        $document->setValue('{idtki}', htmlspecialchars($data->id_biodata)); 
        $document->setValue('{ketdoc}', htmlspecialchars($data->ketdok)); 
        
        $document->setValue('{id_biodata_dititipkan}', htmlspecialchars($data->id_biodata_dititipkan));     
        $document->setValue('{nama_dititipkan}', htmlspecialchars($data->nama_dititipkan)); 
        $document->setValue('{tgl_terbang_dititipkan}', htmlspecialchars($data->tgl_terbang_dititipkan)); 
        $document->setValue('{id_biodata_dititipkan2}', htmlspecialchars($data->id_biodata_dititipkan2));     
        $document->setValue('{nama_dititipkan2}', htmlspecialchars($data->nama_dititipkan2)); 
        $document->setValue('{tgl_terbang_dititipkan2}', htmlspecialchars($data->tgl_terbang_dititipkan2)); 
        $document->setValue('{no_suhan_dititipkan}', htmlspecialchars($data->no_suhan_dititipkan)); 
        $document->setValue('{no_vp_dititipkan}', htmlspecialchars($data->no_vp_dititipkan)); 
        $document->setValue('{id_biodata_titipan}', htmlspecialchars($data->id_biodata_titipan));     
        $document->setValue('{nama_titipan}', htmlspecialchars($data->nama_titipan)); 
        $document->setValue('{tgl_terbang_titipan}', htmlspecialchars($data->tgl_terbang_titipan)); 
        $document->setValue('{no_suhan_titipan}', htmlspecialchars($data->no_suhan_titipan)); 
        $document->setValue('{no_vp_titipan}', htmlspecialchars($data->no_vp_titipan)); 

        $document->setValue('{nopaspor}', htmlspecialchars($data->nopaspor));     
        $document->setValue('{tglkedatangan}', htmlspecialchars($data->tgltiba));     
        $document->setValue('{suhan}', htmlspecialchars($data->no_suhan));     
        $document->setValue('{visapermit}', htmlspecialchars($data->no_visapermit));     
        $document->setValue('{keasliansuhan}', htmlspecialchars($data->statsuhandok));     
        $document->setValue('{keaslianvisapermit}', htmlspecialchars($data->statvpdok));     
        $document->setValue('{alamat_mandarin}', htmlspecialchars($data->alamat_mandarin));     
        $document->setValue('{alamat}', htmlspecialchars($data->alamat));     
        $document->setValue('{hp}', htmlspecialchars($data->hp));   
        // $document->setValue('{tgl}', $tanggal_tiba[2]));   
        // $document->setValue('{bln}', $tanggal_tiba[1]));   
        // $document->setValue('{thn}', $tanggal_tiba[0]));  
        $document->setValue('{jd}', htmlspecialchars($data->jddok));  
        $document->setValue('{arc}', htmlspecialchars($data->arcdok));  
        $document->setValue('{ic}', htmlspecialchars($data->icdok));
        $document->setValue('{ketdoksuhan}', htmlspecialchars($data->ketdoksuhan));
        $document->setValue('{ketdokvp}', htmlspecialchars($data->ketdokvp));
        $document->setValue('{negaratujuan}', htmlspecialchars($data->tempatsuhandok));
        $document->setValue('{negaratujuan2}', htmlspecialchars($data->tempatvpdok));

        //kredit bank
        $document->setValue('{kreditbank1}', htmlspecialchars($data22->mandarinnya));
        $document->setValue('{kreditbank2}', htmlspecialchars($data22->mandarinnya2));

        // if ($data->no_suhan_dititipkan != '') {
        //     $document->setValue('{no_suhan_dititipkan}',htmlspecialchars($data->no_suhan_dititipkan));
        // }else{
        //     $document->setValue('{no_suhan_dititipkan}' ,'Suhan Tidak diTitipkan');
        // }

        // if ($data->no_vp_dititipkan != '') {
        //     $document->setValue('{no_vp_dititipkan}',htmlspecialchars($data->no_vp_dititipkan));
        // }else{
        //     $document->setValue('{no_vp_dititipkan}' ,'Visa Permit Tidak Dititipkan');
        // }
        
        
        if ($data->apendik_b != '') {
            $document->setValue('{apendik_b}', '附索引B - TERLAMPIR APPENDIX B');
            $document->setValue('{apendik_b_terlampir}', '按要求SESUAI PERMINTAAN');
        }else{
            $document->setValue('{apendik_b}' ,'');
            $document->setValue('{apendik_b_terlampir}' ,'');
        }

        $permintaan_agen = array();
        $permintaan_agen_terlampir = array();

        if ($data->apendik_a != '') {
            $permintaan_agen[] = "附索引A - TERLAMPIR APPENDIX A";
            $permintaan_agen_terlampir[] = "按要求SESUAI PERMINTAAN";
        }else{
            $permintaan_agen[] = "";
            $permintaan_agen_terlampir[] = "";
        }

        if ($data->apendik_c != '') {
            $permintaan_agen[] = "附索引C - TERLAMPIR APPENDIX C";
            $permintaan_agen_terlampir[] = "按要求SESUAI PERMINTAAN";
        }else{
            $permintaan_agen[] = "";
            $permintaan_agen_terlampir[] = "";
        }

        if ($data->apendik_d != '') {
            $permintaan_agen[] = "附索引D - TERLAMPIR APPENDIX D";
            $permintaan_agen_terlampir[] = "按要求SESUAI PERMINTAAN";
        }else{
            $permintaan_agen[] = "";
            $permintaan_agen_terlampir[] = "";
        }


        $isidok = array();
        // if ($data->isidok1 != "") {
        //     $isidok[] =  $data->isidok1;
        // }

        // if ($data->isidok2 != "") {
        //     $isidok[] =  $data->isidok2;
        // }

        if ($data->isidok3 != "") {
            $isidok[] =  $data->isidok3;
        }

        if ($data->isidok4 != "") {
            $isidok[] =  $data->isidok4;
        }

        if ($data->isidok5 != "") {
            $isidok[] =  $data->isidok5;
        }

        if ($data->isidok6 != "") {
            $isidok[] =  $data->isidok6;
        }

        if ($data->isidok7 != "") {
            $isidok[] =  $data->isidok7;
        }

        if ($data->isidok8 != "") {
            $isidok[] =  $data->isidok8;
        }

        $statdok = array();

        // if ($data->statdok1 != "") {
        //     $statdok[] =  $data->statdok1;
        // }

        // if ($data->statdok2 != "") {
        //     $statdok[] =  $data->statdok2;
        // }

        if ($data->statdok3 != "") {
            $statdok[] =  $data->statdok3;
        }

        if ($data->statdok4 != "") {
            $statdok[] =  $data->statdok4;
        }

        if ($data->statdok5 != "") {
            $statdok[] =  $data->statdok5;
        }

        if ($data->statdok6 != "") {
            $statdok[] =  $data->statdok6;
        }

        if ($data->statdok7 != "") {
            $statdok[] =  $data->statdok7;
        }

        if ($data->statdok8 != "") {
            $statdok[] =  $data->statdok8;
        }

        $nodoklain = array();
        
        if (count($statdok) == 0) {
            $statdok[] = "";
            $nodoklain[] = "";
        }else{
            for ($i=0; $i < count($isidok); $i++) { 
                $nodoklain[] = $i+18;
            }
        }

        if (count($isidok) == 0) {
            $isidok[] = "";
        }


        $doklain = array(
            'no' => $nodoklain,
            'isidok' => $isidok,
            'statdok' => $statdok 
        );

        $document->cloneRow('datalain', $doklain);
        $document->cloneRow('datalain2', $doklain);

        $isikredit = array();
        
        if ($data22->mandarinnya != "") {
            $isikredit[] =  $data22->mandarinnya;
        }

        if ($data22->mandarinnya2 != "") {
            $isikredit[] =  $data22->mandarinnya2;
        }

        $statkredit = array();

        if ($data22->statuskredit != "") {
            $statkredit[] =  $data22->statuskredit;
        }

        if ($data22->statuskredit2 != "") {
            $statkredit[] =  $data22->statuskredit2;
        }

        $nokreditlain = array();
        
        if (count($statkredit) == 0) {
            $statkredit[] = "";
            $nokreditlain[] = "";
        }else{
            for ($i=0; $i < count($isikredit); $i++) { 
                $nokreditlain[] = $i+12;
            }
        }

        if (count($isikredit) == 0) {
            $isikredit[] = "";
        }


        $kreditlain = array(
            'nokredit' => $nokreditlain,
            'isikredit' => $isikredit,
            'statkredit' => $statkredit 
        );

        $document->cloneRow('datakredit', $kreditlain);
        $document->cloneRow('datakredit2', $kreditlain);

        $data_apendik = array(
            'apendik' => $permintaan_agen,
            'terlampir' => $permintaan_agen_terlampir,
        );

        $document->cloneRow('data', $data_apendik);

        $pinho = substr($data->id_biodata, -7, 2) ;

        if ($pinho == "FI" || $pinho == "MI") {
            $pinhonya = 'informal';
        }elseif ($pinho == "FF" || $pinho == "MF") {
            $pinhonya = 'formal';
        }

        echo $pinhonya;

        $dapatkan_dokument_permintaan_agen = $this->modalku->buatarray("dokumen", "dokumen", "detail_dokumen", $data->kode_agen, "id_agen", " AND ( status = '$pinhonya' OR status = '') AND type_permintaan = 'Permintaan Agen'" );

        $dapatkan_dokument_permintaan_agen_status = $this->modalku->buatarray("stats", "stats", "detail_dokumen", $data->kode_agen, "id_agen", " AND ( status = '$pinhonya' OR status = '') AND type_permintaan = 'Permintaan Agen'" );

        $dapatkan_dokument_permintaan_majikan = $this->modalku->buatarray("dokumen", "dokumen", "detail_dokumen", $data->kode_agen, "id_agen", " AND ( status = '$pinhonya' OR status = '') AND type_permintaan = 'Permintaan Majikan'" );

        $dapatkan_dokument_permintaan_majikan_status = $this->modalku->buatarray("stats", "stats", "detail_dokumen", $data->kode_agen, "id_agen", " AND ( status = '$pinhonya' OR status = '') AND type_permintaan = 'Permintaan Majikan'" );


        $dapatkan_data_detail_document = $this->db->query("SELECT * FROM detail_dokumen WHERE id_agen = '$data->kode_agen'")->result();
        echo "<pre>";


        if (count($dapatkan_dokument_permintaan_majikan)==0) {
            $dapatkan_dokument_permintaan_majikan = array("");
            $dapatkan_dokument_permintaan_majikan_status = array("");
        }

        $permintaan = array(
            'permintaan_majikan' => $dapatkan_dokument_permintaan_majikan,
            'permintaan_majikan_status' => $dapatkan_dokument_permintaan_majikan_status,
        );

        $document->cloneRow('apendik', $permintaan);
        $document->cloneRow('apendik3', $permintaan);


        if (count($dapatkan_dokument_permintaan_agen)==0) {
            $dapatkan_dokument_permintaan_agen = array("");
            $dapatkan_dokument_permintaan_agen_status = array("");
        }

        $permintaan2 = array(
            'permintaan_majikan' => $dapatkan_dokument_permintaan_agen,
            'permintaan_majikan_status' => $dapatkan_dokument_permintaan_agen_status,
        );

        $document->cloneRow('apendik2', $permintaan2);

        $document->cloneRow('apendik4', $permintaan2);

//  ------------------------------------------- save file ------------------------------------------------------------------//

        $tmp_file = 'biodata_cong_yi/document_send_taiwan_master.docx';
        $document->save($tmp_file);


// ------------------------------------------- download file --------------------------------------------------------------//

        redirect('apendik/result_print_out/');
    }

    function result_print_out(){
       require_once 'gugus/phpword/PHPWord.php';
       $PHPWord = new PHPWord();
       $document = $PHPWord->loadTemplate('biodata_cong_yi/document_send_taiwan_master.docx');

       

       $filename = 'biodata_cong_yi/apendik_a_result.docx';
       $isinya=$document->save($filename);
       header("Content-Description: File Transfer");
       header('Content-Disposition: attachment; filename= document send to taiwan.docx');
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