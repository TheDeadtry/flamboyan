<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Skill2 extends MX_Controller{
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

                $data["kategoriskill"] = $this->db->query("SELECT * FROM kategoriskill")->result();

                $data['namamodule'] = "skill2";
                $data['namafileview'] = "pilih_pkl";
                echo Modules::run('template/admin_template', $data);
            }
        }
    }



    function hapuskategori($id){
        $hapus = $this->db->query("DELETE FROM kategoriskill WHERE id_kategori = '$id' ");

        if ($hapus) {
            redirect("skill2");
        }
    } 

    function tambahkategori(){
        $isi = $_POST["isi"];
        $mandarin = $_POST["mandarin"];

        $insert = $this->db->query("INSERT INTO kategoriskill (isi, mandarin)VALUES('$isi','$mandarin')");
        if ($insert) {
            redirect("skill2");
        }



    }

    function editdatakategori(){
        $id_kategori = $_POST["id_kategori"];
        $isi = $_POST["isi"];
        $mandarin = $_POST["mandarin"];


        $ubah = $this->db->query("UPDATE kategoriskill SET isi = '$isi', mandarin = '$mandarin' WHERE id_kategori = '$id_kategori' ");
        if ($ubah) {
            redirect("skill2");
        }
    }

    function tampilskill($id) {
        $data["skill"] = $this->db->query("SELECT * FROM dataskill WHERE id_kategori = '$id'")->result();
        $data["id_kategori"] = $id;
        $data['namamodule'] = "skill2";
        $data['namafileview'] = "skill";
        echo Modules::run('template/admin_template', $data);
    }

    function tambahskil(){
        $id_kategori = $_POST["id_kategori"];
        $isi = $_POST["isi"];
        $mandarin = $_POST["mandarin"];

        $tambah = $this->db->query("INSERT INTO dataskill (id_kategori, isi, mandarin)VALUES('$id_kategori', '$isi','$mandarin')");

        if ($tambah) {
            redirect("skill2/tampilskill/".$id_kategori);
        }
    }

    function hapusskill($id_kategori, $id){
        $hapus = $this->db->query("DELETE FROM dataskill WHERE id_skill = '$id' ");

        if ($hapus) {
            redirect("skill2/tampilskill/".$id_kategori);
        }
    }

    function ubahskilll(){
        $id_skill = $_POST["id_skill"];
        $id_kategori = $_POST["id_kategori"];
        $isi = $_POST["isi"];
        $mandarin = $_POST["mandarin"];

        $ubah = $this->db->query("UPDATE dataskill SET isi = '$isi', mandarin = '$mandarin' WHERE id_kategori = '$id_kategori' AND id_skill = '$id_skill' ");
        
        if ($ubah) {
            redirect("skill2/tampilskill/".$id_kategori);
        }


    }

}