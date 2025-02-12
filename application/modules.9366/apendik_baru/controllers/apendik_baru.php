<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
use PhpOffice\PhpWord\TemplateProcessor;
class apendik_baru extends MX_Controller{
    public function __construct(){
        parent::__construct();
        //$this->load->model('modalku'); 
        $this->load->model('M_session');
    }

    public function print_apendik($type, $key){
        //header ("Content-type: text/html; charset=utf-8");
        require_once 'PHPWord/PHPWord.php';
        $PHPWord = new PHPWord();

        $location = 'files/apendik_baru/'.$type.'.docx';
        $document = $PHPWord->loadTemplate($location);

        $id_biodata = $key;
        
        $nama = $this->M_session->getData('nama','personal','id_biodata',$key);
        $jeniskelaminmandarin = $this->M_session->getData('jeniskelamin','personal','id_biodata',$key);
        $jeniskelamin = ($jeniskelaminmandarin == '男') ? 'Pria' : '';
        $jeniskelamin = ($jeniskelaminmandarin == '女') ? 'Wanita' : $jeniskelamin;
        $warganegara = $this->M_session->getData('warganegara','personal','id_biodata',$key);
        $nama_mandarin = $this->M_session->getData('nama_mandarin','personal','id_biodata',$key);

        $zzkode_majikan = $this->M_session->getData('kode_majikan','majikan','id_biodata',$key);
        $zzkode_suhan = $this->M_session->getData('kode_suhan','majikan','id_biodata',$key);
        $zzkode_visapermit = $this->M_session->getData('kode_visapermit','majikan','id_biodata',$key);
        $kode_agen = $this->M_session->getData('kode_agen','majikan','id_biodata',$key);
        $nama_majikan = $this->M_session->getData('namamajikan','majikan','id_biodata',$key);
        $majikan_mandarin = $this->M_session->getData('namataiwan','majikan','id_biodata',$key);

        $nama_agen = $this->M_session->getData('nama','dataagen','id_agen',$kode_agen);
        $mandarin_agen = $this->M_session->getData('namamandarin','dataagen','id_agen',$kode_agen);
        $nosiup = $this->M_session->getData('nosiup','dataagen','id_agen',$kode_agen);
        $alamatagen = $this->M_session->getData('alamat','dataagen','id_agen',$kode_agen);
        $alamatmandarinagen = $this->M_session->getData('alamatmandarin','dataagen','id_agen',$kode_agen);
        $notelpagen = $this->M_session->getData('notel','dataagen','id_agen',$kode_agen);
        $direktur = $this->M_session->getData('direktur','dataagen','id_agen',$kode_agen);
        $direkturmandarin = $this->M_session->getData('direktur2','dataagen','id_agen',$kode_agen);

        if($nama_majikan == 0) {
            $nama_majikan = $this->M_session->getData('nama','datamajikan','id_majikan',$zzkode_majikan);
            $majikan_mandarin = $this->M_session->getData('namamajikan','datamajikan','id_majikan',$zzkode_majikan);
        }
        $alamat_mandarin = $this->M_session->getData('alamat_mandarin','datamajikan','id_majikan',$zzkode_majikan);
        $alamat = $this->M_session->getData('alamat','datamajikan','id_majikan',$zzkode_majikan);
        $hp = $this->M_session->getData('hp','datamajikan','id_majikan',$zzkode_majikan);

        $nopaspor = $this->M_session->getData('nopaspor','paspor','id_biodata',$key);

        $no_suhan = $this->M_session->getData('no_suhan','datasuhan','id_suhan',$zzkode_suhan);

        $no_visapermit = $this->M_session->getData('no_visapermit','datavisapermit','id_visapermit',$zzkode_visapermit);

        $statsuhandok = $this->M_session->getData('statsuhandok','visa','id_biodata',$key);
        $statvpdok = $this->M_session->getData('statvpdok','visa','id_biodata',$key);
        $ketdoksuhan = $this->M_session->getData('ketdoksuhan','visa','id_biodata',$key);
        $ketdokvp = $this->M_session->getData('ketdokvp','visa','id_biodata',$key);
        $tgltiba = $this->M_session->getData('tglberangkat','visa','id_biodata',$key);
        $tgltibatemp = explode(".", $tgltiba);
        $tgltiba_tgl = (isset($tgltibatemp[2])) ? $tgltibatemp[2] : '';
        $tgltiba_bln = (isset($tgltibatemp[1])) ? $tgltibatemp[1] : '';
        $tgltiba_thn = (isset($tgltibatemp[0])) ? $tgltibatemp[0] : '';

        $zzidkredit = $this->M_session->getData('idkredit','signingbank','id_biodata',$key);
        $nama_bank = $this->M_session->getData('nama_bank','signingbank','id_biodata',$key);

        $isikredit = $this->M_session->getData('isikredit','datakreditbank','id_kreditbank',$zzidkredit);

        $alamattki = $this->M_session->getData('alamat','disnaker','id_biodata',$key);
        $kontaktki = $this->M_session->getData('telpkontak','disnaker','id_biodata',$key);

        $document->setValue('{agenmandarin}', htmlspecialchars ($mandarin_agen));     
        $document->setValue('{jeniskelamin}', htmlspecialchars ($jeniskelaminmandarin));     
        $document->setValue('{jeniskelaminindo}', strtoupper($jeniskelamin));     
        $document->setValue('{warganegara}', htmlspecialchars ($warganegara));     
        $document->setValue('{majikanmandarin}', htmlspecialchars ($majikan_mandarin));     
        $document->setValue('{namamandarin}', htmlspecialchars ($nama_mandarin));     
        $document->setValue('{namaagen}', htmlspecialchars ($nama_agen));     
        $document->setValue('{namamajikan}', htmlspecialchars ($nama_majikan));     
        $document->setValue('{nama}', htmlspecialchars($nama));   
        $document->setValue('{alamattki}', htmlspecialchars ($alamattki));        
        $document->setValue('{idtki}', htmlspecialchars ($id_biodata));     
        $document->setValue('{nopaspor}', htmlspecialchars ($nopaspor));     
        $document->setValue('{tglkedatangan}', htmlspecialchars ($tgltiba));     
        $document->setValue('{suhan}', htmlspecialchars ($no_suhan));     
        $document->setValue('{visapermit}', htmlspecialchars ($no_visapermit));     
        $document->setValue('{keasliansuhan}', htmlspecialchars ($statsuhandok));     
        $document->setValue('{keaslianvisapermit}', htmlspecialchars ($statvpdok));     
        $document->setValue('{alamat_mandarin}', htmlspecialchars ($alamat_mandarin));     
        $document->setValue('{alamat}', htmlspecialchars ($alamat));     
        $document->setValue('{hp}', htmlspecialchars ($hp));   
        $document->setValue('{tgl}', $tgltiba_tgl);   
        $document->setValue('{bln}', $tgltiba_bln);   
        $document->setValue('{thn}', $tgltiba_thn);   
        $document->setValue('{namabank}', htmlspecialchars ($nama_bank));   
        $document->setValue('{typekredit}', htmlspecialchars ($isikredit));
        $document->setValue('{ketdoksuhan}', htmlspecialchars ($ketdoksuhan));
        $document->setValue('{ketdokvp}', htmlspecialchars ($ketdokvp));
        $document->setValue('{nosiup}', htmlspecialchars ($nosiup));
        $document->setValue('{direktur}', htmlspecialchars ($direktur));
        $document->setValue('{direkturmandarin}', htmlspecialchars ($direkturmandarin));
        $document->setValue('{notelpagen}', htmlspecialchars ($notelpagen));
        $document->setValue('{alamatmandarinagen}', htmlspecialchars ($alamatmandarinagen));
        $document->setValue('{alamatagen2}', htmlspecialchars ($alamat));
        $document->setValue('{kontaktki}', htmlspecialchars ($kontaktki));

        $listNama = [
            '(1) APP.A-LAMP.14 RUMAH SAKIT',
            '(2) UMUM APP.B-LAMP.15',
            '(2A) KUONCHEN APP.B-LAMP.15',
            '(2B) UMT APP.B-LAMP.15',
            '(3) UMUM APP.C-LAMP.16',
            '(3A) KUONCHEN APP.C-LAMP.16',
            '(3B) UMT APP.C-LAMP.16',
            '(4) APP.D-LAMP.12 DIKIRIM SEBELUM TERBANG',
            '(5) SLIP SETOR BANK',
            'B9-C12-LAMP.6 UMUM SURAT PERJANJIAN KONTRAK KERJA TKA',
            'B9-C12-LAMP.6 CHYIICHYUAN SURAT PERJANJIAN KONTRAK KERJA TKA',
            'B10.1-C17.1-lamp.18 PERNYATAAN TIKET KEPULANGAN',
            'B10.2-C17.2-Lamp.19 PERSETUJUAN DEBIT',
            'B10.3-C17.3-Lamp.20 MEMAHAMI JD',
            'C3-Lamp.8 PENGEMBALIAN PAJAK',
            'C4-Lamp.11 BIAYA PEMAKAIAN AC',
            'C6-LAMP.17 DAFTAR DOK KHUSUS TKA',
            'C10-Lamp.4 MENGERTI PERATURAN PERBURUHAN TAIWAN',
            'C11-Lamp.5 PERNYATAAN KESEHATAN',
            'C13-LAMP.7 PENGGUNAAN DATA PRIBADI',
            'C14-Lamp.9 CEK NARKOBA',
            'KUONCHEN-BARU B10.4-C17.4-Lamp.22 LARANGAN MEROKOK',
            'KUONCHEN-BARU B10.5-C17.5-SURAT KUASA SIMPAN DOK',
            'UMT-BARU B10.4-C17.4 CICIL BANK',
            'D04-GLCH.05 SURAT KUASA PERWAKILAN',
        ];
        if (isset($listNama[$type-1])) {
            $namafile = $listNama[$type-1];
        } else if ($type == 'glch5') {
            $namafile = "GLCH.05 DELIVERY DOC BEFORE ARRIVAL";
        } else if ($type == 'glch6') {
            $namafile = "GLCH.06 SERAH TERIMA DOK DIBAWA TKI TERBANG";
        }

        $filename = 'files/apendik_baru/temp2.docx';
        $document->save($filename);
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename='.$key.' '.$nama.' '.$namafile.'.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
        exit;
    }
    public function surat_kuasa_perwakilan($key){
        $tglberangkat = $this->M_session->getData('tglberangkat','visa','id_biodata',$key);
        $kodemajikan = $this->M_session->getData('kode_majikan','majikan','id_biodata',$key);
        $namamajikan = $this->M_session->getData('nama','datamajikan','id_majikan',$kodemajikan);
        $data['listTki'] = $this->M_session->select('SELECT 
        personal.id_biodata,
        personal.nama
        FROM visa
        LEFT JOIN personal ON visa.id_biodata=personal.id_biodata
        LEFT JOIN majikan ON majikan.id_biodata=personal.id_biodata
        WHERE visa.tglberangkat="'.$tglberangkat.'" 
        AND majikan.kode_majikan="'.$kodemajikan.'" 
        ORDER BY personal.id_biodata ASC');
        $data['tglberangkat'] = $tglberangkat;
        $data['kodemajikan'] = $kodemajikan;
        $data['namamajikan'] = $namamajikan;
        $data['namamodule'] = "apendik_baru";
        $data['namafileview'] = "surat_kuasa_perwakilan";
        echo Modules::run('template/new_admin_template', $data);
    }
    public function print_surat_kuasa_perwakilan(){
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
        //$document = new TemplateProcessor('files/admin_print_biodata_male.docx');
        $document = $PHPWord->loadTemplate('files/apendik_baru/25.docx');
        
        $tglberangkat = $this->input->post('tglberangkat');
        $kodemajikan = $this->input->post('kodemajikan');
        $nama_majikan = $this->M_session->getData('nama','datamajikan','id_majikan',$kodemajikan);
        $nama_majikanf = str_replace(array('\\','/',':','*','?','"','<','>','|'),' ',$nama_majikan);
        $keyArr = $this->input->post('dkrhInput');
        $namaPertama = '';
        $namaManPertama = '';
        $document->cloneRow('d1',count($keyArr));
        
        $i = 0;
        foreach($keyArr as $val) {
            $nama_mandarin = $this->M_session->getData('nama_mandarin','personal','id_biodata',$val);
            $namaindo = $this->M_session->getData('nama','personal','id_biodata',$val);
            $jeniskelaminmandarin = $this->M_session->getData('jeniskelamin','personal','id_biodata',$val);
            $nopaspor = $this->M_session->getData('nopaspor','paspor','id_biodata',$val);
            if ($i == 0) {
                $namaPertama = $namaindo;
                $namaManPertama = $nama_mandarin;
            }
            $ne = $i+1;
            $document->setValue('d1#'.$ne, $ne);
            $document->setValue('d2#'.$ne, $namaindo);
            $document->setValue('d3#'.$ne, $jeniskelaminmandarin);
            $document->setValue('d4#'.$ne, $nopaspor);

            $i++;
        }

        $document->setValue('nama', $namaPertama);
        $document->setValue('namaman', $namaManPertama);

        $namafile = 'D04-GLCH.05 SURAT KUASA PERWAKILAN';
//'.$tglberangkat.' '.$nama_majikanf.'
        $filename = 'files/apendik_baru/temp2.docx';
        $isinya=$document->save($filename);
        //$document->save('php://output');

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="'.$namafile.'.docx"');
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