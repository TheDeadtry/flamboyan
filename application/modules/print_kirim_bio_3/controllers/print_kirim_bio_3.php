<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Print_kirim_bio_3 extends MX_Controller{
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





    function print_data($tgl, $idnya){
        header ("Content-type: text/html; charset=utf-8");

        require_once 'PHPWord/PHPWord.php';

        $PHPWord = new PHPWord();

        $document = $PHPWord->loadTemplate('files/kirim_biodata_ke_taiwan.docx');

//  ------------------------------------------- save file ------------------------------------------------------------------//



        $data_marka_biotoagen = $this->db->query("


            SELECT
                a.id_biodata,
                a.tgl_to_agen,
                a.nama_pabrik,
                b.nama AS nama_agen,
                c.nama AS nama_group,
                d.nama AS nama_majikan,
                a.tgl_pauliu,
                a.tgl_inter,
                e.nama
            FROM
                marka_biotoagen a
                LEFT JOIN dataagen b ON a.nama_agen = b.id_agen
                LEFT JOIN datagroup c ON a.grup_to_agen = c.id_group
                LEFT JOIN datamajikan d ON a.nama_pabrik= d.id_majikan
                LEFT JOIN personal e ON a.id_biodata = e.id_biodata
            WHERE
                nama_agen = '$idnya'
            AND tgl_to_agen = '$tgl'
            AND tgldilepas = ''
            ORDER BY tgl_to_agen ASC


            ")->result();


        $no = array();
        $id = array();
        $tglkirimbio = array();
        $namaagen = array();
        $namagroup = array();
        $namamajikan = array();
        $tglpauliu = array();
        $tglinterview = array();

        $angka = 1;
        foreach ($data_marka_biotoagen as $key => $value) {


            $no[] = $angka;
            $id[] = $value->id_biodata.' '.$value->nama;
            $tglkirimbio[] = $value->tgl_to_agen ;
            $namaagen[] = $value->nama_agen;
            $namagroup[] = $value->nama_group;

            if (is_numeric($value->nama_pabrik)) {
              $namamajikan[] = $value->nama_majikan;
            }else{
              $namamajikan[] = $value->nama_pabrik;
            }

            $tglpauliu[] = $value->tgl_pauliu;
            $tglinterview[] = $value->tgl_inter;

            $angka++;
        }





        $datamarka = array(
            'no' => $no,
            'id' => $id,
            'tglkirimbio' => $tglkirimbio,
            'namaagen' => $namaagen,
            'namagroup' => $namagroup,
            'namamajikan' => $namamajikan,
            'tglpauliu' => $tglpauliu,
            'tglinterview' => $tglinterview
        );

        $document->cloneRow('data', $datamarka);



        $tmp_file = 'biodata_cong_yi/send_bio_to_taiwan.docx';
        $document->save($tmp_file);

// ------------------------------------------- download file --------------------------------------------------------------//

        redirect('print_kirim_bio_3/hasil/');

    }

    function hasil(){

        require_once 'gugus/phpword/PHPWord.php';
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('biodata_cong_yi/send_bio_to_taiwan.docx');






        $filename = 'biodata_cong_yi/filenya.docx';
        $isinya=$document->save($filename);
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename= bio to taiwan.docx');
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
