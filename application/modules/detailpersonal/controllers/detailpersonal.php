<?php

if (!defined('BASEPATH')) {
    exit('Maaf, akses secara langsung tidak diperkenankan.');
}

class Detailpersonal extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_session');
        $this->load->model('M_detailpersonal');
        $this->load->library('form_validation');

    }

    public function index()
    {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']) {
            //user belum login
            $data['namamodule'] = "login";
            $data['namafileview'] = "login";
            echo Modules::run('template/login_template', $data);
        } else {
            $id_user = $session['session_userid'];
            $status = $session['session_status'];
            if ($id_user && $status == 1) {
                $data['detailpersonalid'] = $this->session->userdata("detailuser");
                $data['tampil_data_sektor'] = $this->M_detailpersonal->tampil_data_sektor();
                $data['tampil_data_pilstat'] = $this->M_detailpersonal->tampil_data_pilstat();
                $data['tampil_data_negara'] = $this->M_detailpersonal->tampil_data_negara();
                $data['tampil_data_calling'] = $this->M_detailpersonal->tampil_data_calling();
                $data['tampil_data_skillnya'] = $this->M_detailpersonal->tampil_data_skillnya();
                $data['tampil_data_agama'] = $this->M_detailpersonal->tampil_data_agama();
                $data['tampil_data_pendidikan'] = $this->M_detailpersonal->tampil_data_pendidikan();
                $data['tampil_data_provinsi'] = $this->M_detailpersonal->tampil_data_provinsi();
                $data['hitung_biodatamf'] = $this->M_detailpersonal->hitung_biodatamf($this->session->userdata("detailuser"));
                $data['hitung_biodatafi'] = $this->M_detailpersonal->hitung_biodatafi($this->session->userdata("detailuser"));
                $data['hitung_biodatajp'] = $this->M_detailpersonal->hitung_biodatajp($this->session->userdata("detailuser"));
                $data['hitung_biodataff'] = $this->M_detailpersonal->hitung_biodataff($this->session->userdata("detailuser"));
                $data['hitung_family'] = $this->M_detailpersonal->hitung_family($this->session->userdata("detailuser"));
                $data['hitung_working'] = $this->M_detailpersonal->hitung_working($this->session->userdata("detailuser"));
                $data['hitung_skill'] = $this->M_detailpersonal->hitung_skillcondition($this->session->userdata("detailuser"));
                $data['hitung_request'] = $this->M_detailpersonal->hitung_request($this->session->userdata("detailuser"));
                $data['hitung_pengalaman'] = $this->M_detailpersonal->hitung_pengalaman($this->session->userdata("detailuser"));
                $data['hitung_tugas'] = $this->M_detailpersonal->hitung_tugas($this->session->userdata("detailuser"));
                $data['hitung_kettugas'] = $this->M_detailpersonal->hitung_kettugas($this->session->userdata("detailuser"));
                $data['hitung_interview'] = $this->M_detailpersonal->hitung_interview($this->session->userdata("detailuser"));
                $data['hitung_paspor'] = $this->M_detailpersonal->hitung_paspor($this->session->userdata("detailuser"));
                $data['hitung_medical'] = $this->M_detailpersonal->hitung_medical($this->session->userdata("detailuser"));
                $data['tampil_data_personal'] = $this->M_detailpersonal->tampil_data_personal($this->session->userdata("detailuser"));
                $data['tampil_data_sponsor'] = $this->M_detailpersonal->tampil_data_sponsor();
                $data['tampil_data_lokasi'] = $this->M_detailpersonal->tampil_data_lokasi();
                $data['namamodule'] = "detailpersonal";
                $data['namafileview'] = "detailpersonal";
                echo Modules::run('template/admin_template', $data);
            } elseif ($id_user && $status == 2) {

                $data['namamodule'] = "detailpersonal";
                $data['namafileview'] = "detailpersonalagen";
                echo Modules::run('template/agen_template', $data);
            }
        }
    }

    public function ubahpersonal()
    {
        $data['tampil_data_sektor'] = $this->M_detailpersonal->tampil_data_sektor();
        $data['tampil_data_negara'] = $this->M_detailpersonal->tampil_data_negara();
        $data['tampil_data_calling'] = $this->M_detailpersonal->tampil_data_calling();
        $data['tampil_data_skillnya'] = $this->M_detailpersonal->tampil_data_skillnya();
        $data['tampil_data_agama'] = $this->M_detailpersonal->tampil_data_agama();
        $data['tampil_data_pendidikan'] = $this->M_detailpersonal->tampil_data_pendidikan();
        $data['tampil_data_provinsi'] = $this->M_detailpersonal->tampil_data_provinsi();
        $data['personalid'] = $this->session->userdata("detailuser");
        $data['tampil_data_personal'] = $this->M_detailpersonal->tampil_data_personal($this->session->userdata("detailuser"));
        $data['tampil_data_lokasi'] = $this->M_detailpersonal->tampil_data_lokasi();
        $data['tampil_data_sponsor'] = $this->M_detailpersonal->tampil_data_sponsor();
        $statusindopendik = $this->M_detailpersonal->buatarray("*", "isi", "statuspendidikan", "");
        $statusmandapendik = $this->M_detailpersonal->buatarray("*", "mandarin", "statuspendidikan", "");
        $liststatuspendidikan = array();
        $valuestatuspendidikan = array();
        $liststatuspendidikan[] = " - pilih data - ";
        $valuestatuspendidikan[] = "";
        foreach ($statusindopendik as $key => $value) {
            $liststatuspendidikan[] = $value.' '.$statusmandapendik[$key];
            $valuestatuspendidikan[] = $value.' '.$statusmandapendik[$key];
        }
        $data["liststatuspendidikan"] = $liststatuspendidikan;
        $data["valuestatuspendidikan"] = $valuestatuspendidikan;
        $data['namamodule'] = "detailpersonal";
        $data['namafileview'] = "ubahpersonal";
        echo Modules::run('template/admin_template', $data);
    }

    public function ubahidpersonal()
    {
        $data['tampil_data_sektor'] = $this->M_detailpersonal->tampil_data_sektor();
        $data['tampil_data_negara'] = $this->M_detailpersonal->tampil_data_negara();
        $data['tampil_data_calling'] = $this->M_detailpersonal->tampil_data_calling();
        $data['tampil_data_skillnya'] = $this->M_detailpersonal->tampil_data_skillnya();
        $data['tampil_data_agama'] = $this->M_detailpersonal->tampil_data_agama();
        $data['tampil_data_pendidikan'] = $this->M_detailpersonal->tampil_data_pendidikan();
        $data['tampil_data_provinsi'] = $this->M_detailpersonal->tampil_data_provinsi();

        $data['personalid'] = $this->session->userdata("detailuser");
        $data['tampil_data_personal'] = $this->M_detailpersonal->tampil_data_personal($this->session->userdata("detailuser"));
        $data['tampil_data_lokasi'] = $this->M_detailpersonal->tampil_data_lokasi();
        $data['tampil_data_sponsor'] = $this->M_detailpersonal->tampil_data_sponsor();

        $data['namamodule'] = "detailpersonal";
        $data['namafileview'] = "ubahidpersonal";
        echo Modules::run('template/admin_template', $data);
    }

    public function ubahdatapersonal()
    {
        $idnya = $this->input->post("idp");
        $this->M_detailpersonal->ubahpersonal();
        redirect('detailpersonal');
    }

    public function ubahidnya()
    {
        $this->M_detailpersonal->ubahidnya();
        redirect('databio');
    }

    public function ubahstatus()
    {
        $idnya = $this->input->post("idp");
        $this->M_detailpersonal->ubahstatus();
        redirect('detailpersonal');
    }

    public function tambahbiodata()
    {
        $this->form_validation->set_rules('idp', 'Idp', 'trim|required|is_unique[personal.id_biodata]');
        $this->M_tambahbio->tambahpersonal();
        redirect('tambahbio');
    }

    public function setidbiodata()
    {
        if (isset($_POST['setid'])) {
            $dataid = $this->input->post("idbiodata");
            $jenis = $this->input->post("jeniskelamin");
            $this->session->set_userdata("idbiodata", $dataid);
            $this->session->set_userdata("jeniskelamin", $jenis);
            redirect('tambahbio');
        }
        if (isset($_POST['resetid'])) {
            $this->session->set_userdata("idbiodata", "");
            $this->session->set_userdata("jeniskelamin", "");
            redirect('tambahbio');
        }
    }

}
