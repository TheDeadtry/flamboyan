<?php

if (!defined('BASEPATH')) {
    exit('Maaf, akses secara langsung tidak diperkenankan.');
}

class Detailmajikan extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_session');
        $this->load->model('M_detailmajikan');
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
            //user sudah login
            if ($id_user && $status == 1) {

                $data['tampil_data_spbg'] = $this->db->query("SELECT * FROM setting_spbg")->result();
                $data['tampil_data_sektor'] = $this->M_detailmajikan->tampil_data_sektor();
                $data['tampil_data_negara'] = $this->M_detailmajikan->tampil_data_negara();
                $data['tampil_data_calling'] = $this->M_detailmajikan->tampil_data_calling();
                $data['tampil_data_skillnya'] = $this->M_detailmajikan->tampil_data_skillnya();
                $data['tampil_data_agama'] = $this->M_detailmajikan->tampil_data_agama();
                $data['tampil_data_pendidikan'] = $this->M_detailmajikan->tampil_data_pendidikan();
                $data['tampil_data_provinsi'] = $this->M_detailmajikan->tampil_data_provinsi();
                $data['tampil_data_agen'] = $this->M_detailmajikan->tampil_data_agen();
                $data['tampil_data_group'] = $this->M_detailmajikan->tampil_data_group();
                $data['tampil_data_majikanfi'] = $this->M_detailmajikan->tampilmajikandatanya($this->session->userdata("detailuser"));
                $data['detailmajikanid'] = $this->session->userdata("detailuser");
                $data['idbiodatanya'] = $this->session->userdata("detailuser");
                $data['detailpersonalid'] = $this->session->userdata("detailuser");
                $data['tampil_data_majikan'] = $this->M_detailmajikan->tampil_data_majikan($this->session->userdata("detailuser"));
                $data['tampil_data_majikanformal'] = $this->M_detailmajikan->tampil_data_majikanformal($this->session->userdata("detailuser"));
                $data['tampil_data_personal'] = $this->M_detailmajikan->tampil_data_personal($this->session->userdata("detailuser"));
                $data['hitungmajikan'] = $this->M_detailmajikan->hitung_data_majikan($this->session->userdata("detailuser"));
                $data['option_posisi'] = $this->M_detailmajikan->getmajikanList();
                $data['option_group'] = $this->M_detailmajikan->getposisiList_group();

                $idnya = $this->session->userdata("detailuser");

                $sql = "SELECT disnaker.*, datanamadisnaker.namadisnaker as namadisnakernama FROM disnaker LEFT JOIN datanamadisnaker ON disnaker.namadisnaker_id=datanamadisnaker.id_namadisnaker WHERE id_biodata='".$idnya."'";
                $data['disnaker'] = $this->db->query($sql)->row();

                $ambilkodesuhan = $this->M_detailmajikan->ambilkodesuhan($this->session->userdata("detailuser"));
                $ambilkodevp = $this->M_detailmajikan->ambilkodevp($this->session->userdata("detailuser"));


                $data["personal"] = $this->db->query("SELECT * FROM personal WHERE id_biodata = '".$this->session->userdata("detailuser")."' ")->row();

                if ($ambilkodesuhan != null) {
                    $data['option_suhan'] = $this->M_detailmajikan->tampilsuhannya($ambilkodesuhan);
                } else {
                    $data['option_suhan'] = '';
                }

                if ($ambilkodevp !== null) {
                    $data['option_vp'] = $this->M_detailmajikan->tampilvpnya($ambilkodevp);
                } else {
                    $data['option_vp'] = '';
                }

                $stts = substr($this->session->userdata("detailuser"), 0, 2);

                if ($stts == 'FI' || $stts == 'MI' || $stts == 'IM') {
                    if (count($this->db->query("SELECT * FROM majikan WHERE id_biodata = '".$this->session->userdata("detailuser")."'")->row()) == 1) {
                        $majikan = $this->db->query("SELECT * FROM majikan WHERE id_biodata = '".$this->session->userdata("detailuser")."'")->row();
                        $kodegroup = $stts == 'IM' ? 'IM' : $majikan->kode_group;
                        $data["dataagen"] = $this->db->query("SELECT * FROM dataagen WHERE kode_group = '$kodegroup' ")->result();
                        $data["datamajikan"] = $this->db->query("SELECT * FROM datamajikan WHERE kode_agen = '$majikan->kode_agen' ")->result();
                        $data["datasuhan"] = $this->db->query("SELECT * FROM datasuhan WHERE id_majikan = '$majikan->kode_majikan' ")->result();
                        $data["datavisapermit"] = $this->db->query("SELECT * FROM datavisapermit WHERE id_suhan = '$majikan->kode_suhan' ")->result();
                        $data['namamajikan_informal'] = $this->M_detailmajikan->ambildatamod($this->session->userdata("detailuser"), "namamajikan", "majikan", "id_biodata", "namamajikan");
                        $data['ketsuhan_informal'] = $this->M_detailmajikan->ambildatamod($this->session->userdata("detailuser"), "id_suhan", "majikan", "id_biodata", "id_suhan");
                    }
                } else {
                    if (count($this->db->query("SELECT * FROM majikan WHERE id_biodata = '".$this->session->userdata("detailuser")."'")->row()) == 1) {
                        $majikan = $this->db->query("SELECT * FROM majikan WHERE id_biodata = '".$this->session->userdata("detailuser")."'")->row();
                        $data["dataagen"] = $this->db->query("SELECT * FROM dataagen WHERE kode_group = '$majikan->kode_group' ")->result();
                        $data["datamajikan"] = $this->db->query("SELECT * FROM datamajikan WHERE kode_agen = '$majikan->kode_agen' ")->result();
                        $data["datasuhan"] = $this->db->query("SELECT * FROM datasuhan WHERE id_majikan = '$majikan->kode_majikan' ")->result();
                        $data["datavisapermit"] = $this->db->query("SELECT * FROM datavisapermit WHERE id_suhan = '$majikan->kode_suhan' ")->result();
                    }
                }

                //user sudah login
                $data['namamodule'] = "detailmajikan";
                $data['namafileview'] = "detailmajikan";
                echo Modules::run('template/admin_template', $data);
            } elseif ($id_user && $status == 2) {

                $data['namamodule'] = "detailmajikan";
                $data['namafileview'] = "detailmajikanagen";
                echo Modules::run('template/agen_template', $data);
            }

        }

    }

    public function print_invoice($id = "")
    {
        require_once 'assets/phpword/PHPWord.php';
        $PHPWord = new PHPWord();

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $document = $PHPWord->loadTemplate('files/invoice/invoice.docx');

        $filename = 'data-pk.docx';
        $this->load->model('Mpk');

        $this->Mpk->datapk(["id" => $id], $document);

        //die();
        $isinya = $document->save($filename);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $isinya . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        flush();
        readfile($isinya);
        unlink($isinya); // deletes the temporary file
        exit;
    }

    public function ambildataagen()
    {
        $idnya = $_POST['dataidagen'];
        $iddariagen = $this->db->query('SELECT * FROM dataagen WHERE statusnonaktif=0 and kode_group = "'.$idnya.'" ORDER BY nama ASC')->result();
        $response = "<option> --- pilih agen --- <option>";
        foreach ($iddariagen as $key => $agen) {
            $response .= "<option value='".$agen->id_agen."'>".$agen->nama."</option>";
        }
        exit($response);

    }

    public function ambildatamajikan()
    {
        $idnya = $_POST['dataidagen'];
        $iddariagen = $this->db->query('SELECT * FROM datamajikan WHERE kode_agen = '.$idnya.' ORDER BY nama ASC')->result();
        $response = "<option> --- pilih majikan --- <option>";
        foreach ($iddariagen as $key => $agen) {
            $response .= "<option value='".$agen->id_majikan."'>".$agen->nama."</option>";
        }
        exit($response);

    }

    public function ambilsuhanid()
    {
        $idnya = $_POST['dataidagen'];
        $iddariagen = $this->db->query('SELECT * FROM datasuhan WHERE id_majikan = '.$idnya.' ')->result();
        $response = "<option> --- pilih no suhan --- <option>";
        foreach ($iddariagen as $key => $agen) {
            $response .= "<option value='".$agen->id_suhan."'>".$agen->no_suhan."</option>";
        }
        exit($response);

    }

    public function ambilvisapermit()
    {
        $idnya = $_POST['dataidagen'];
        $iddariagen = $this->db->query('SELECT * FROM datavisapermit WHERE id_suhan = '.$idnya.' ')->result();
        $response = "<option> --- pilih no visa --- <option>";
        foreach ($iddariagen as $key => $agen) {
            $response .= "<option value='".$agen->id_visapermit."'>".$agen->no_visapermit."</option>";
        }
        exit($response);

    }

    public function vtambahmajikan()
    {
        $data['tampil_data_sektor'] = $this->M_detailmajikan->tampil_data_sektor();
        $data['tampil_data_negara'] = $this->M_detailmajikan->tampil_data_negara();
        $data['tampil_data_calling'] = $this->M_detailmajikan->tampil_data_calling();
        $data['tampil_data_skillnya'] = $this->M_detailmajikan->tampil_data_skillnya();
        $data['tampil_data_agama'] = $this->M_detailmajikan->tampil_data_agama();
        $data['tampil_data_pendidikan'] = $this->M_detailmajikan->tampil_data_pendidikan();
        $data['tampil_data_provinsi'] = $this->M_detailmajikan->tampil_data_provinsi();
        $data['tampil_data_agen'] = $this->M_detailmajikan->tampil_data_agen();
        $data['tampil_data_group'] = $this->M_detailmajikan->tampil_data_group();
        $data['detailmajikanid'] = $this->session->userdata("detailuser");
        $data['idbiodatanya'] = $this->session->userdata("detailuser");
        $data['tampil_data_majikanfi'] = $this->M_detailmajikan->tampilmajikandatanya($this->session->userdata("detailuser"));

        $data['tampil_data_majikan'] = $this->M_detailmajikan->tampil_data_majikan($this->session->userdata("detailuser"));
        $data['tampil_data_personal'] = $this->M_detailmajikan->tampil_data_personal($this->session->userdata("detailuser"));

        $data['hitungmajikan'] = $this->M_detailmajikan->hitung_data_majikan($this->session->userdata("detailuser"));
        $data['option_posisi'] = $this->M_detailmajikan->getmajikanList();
        $data['option_group'] = $this->M_detailmajikan->getposisiList_group();

        $data['datamajikane'] = $this->M_detailmajikan->ambil_majikan();

        //user sudah login
        $data['namamodule'] = "detailmajikan";
        $data['namafileview'] = "tambahmajikan";
        echo Modules::run('template/admin_template', $data);

    }

    public function vubahmajikan()
    {
        $data['detailpersonalid'] = $this->session->userdata("detailuser");
        $data['tampil_data_sektor'] = $this->M_detailmajikan->tampil_data_sektor();
        $data['tampil_data_negara'] = $this->M_detailmajikan->tampil_data_negara();
        $data['tampil_data_calling'] = $this->M_detailmajikan->tampil_data_calling();
        $data['tampil_data_skillnya'] = $this->M_detailmajikan->tampil_data_skillnya();
        $data['tampil_data_agama'] = $this->M_detailmajikan->tampil_data_agama();
        $data['tampil_data_pendidikan'] = $this->M_detailmajikan->tampil_data_pendidikan();
        $data['tampil_data_provinsi'] = $this->M_detailmajikan->tampil_data_provinsi();
        $data['tampil_data_agen'] = $this->M_detailmajikan->tampil_data_agen();
        $data['tampil_data_group'] = $this->M_detailmajikan->tampil_data_group();
        $data['detailmajikanid'] = $this->session->userdata("detailuser");
        $data['idbiodatanya'] = $this->session->userdata("detailuser");
        $data['tampil_data_majikanfi'] = $this->M_detailmajikan->tampilmajikandatanya($this->session->userdata("detailuser"));
        $data['tampil_data_majikan'] = $this->M_detailmajikan->tampil_data_majikan($this->session->userdata("detailuser"));
        $data['tampil_data_personal'] = $this->M_detailmajikan->tampil_data_personal($this->session->userdata("detailuser"));
        $data['hitungmajikan'] = $this->M_detailmajikan->hitung_data_majikan($this->session->userdata("detailuser"));
        $data['option_posisi'] = $this->M_detailmajikan->getmajikanList();
        $data['option_group'] = $this->M_detailmajikan->getposisiList_group();
        //user sudah login
        $data['namamodule'] = "detailmajikan";
        $data['namafileview'] = "ubahmajikan";
        echo Modules::run('template/admin_template', $data);
    }

    public function test_api()
    {
        echo date('Y-m-d');
    }




    public function vubahmajikanformal()
    {
        $data['detailpersonalid'] = $this->session->userdata("detailuser");
        $data['tampil_data_sektor'] = $this->M_detailmajikan->tampil_data_sektor();
        $data['tampil_data_negara'] = $this->M_detailmajikan->tampil_data_negara();
        $data['tampil_data_calling'] = $this->M_detailmajikan->tampil_data_calling();
        $data['tampil_data_skillnya'] = $this->M_detailmajikan->tampil_data_skillnya();
        $data['tampil_data_agama'] = $this->M_detailmajikan->tampil_data_agama();
        $data['tampil_data_pendidikan'] = $this->M_detailmajikan->tampil_data_pendidikan();
        $data['tampil_data_provinsi'] = $this->M_detailmajikan->tampil_data_provinsi();
        $data['tampil_data_agen'] = $this->M_detailmajikan->tampil_data_agen();
        $data['tampil_data_group'] = $this->M_detailmajikan->tampil_data_group();
        $data['detailmajikanid'] = $this->session->userdata("detailuser");
        $data['idbiodatanya'] = $this->session->userdata("detailuser");
        $data['tampil_data_majikanfi'] = $this->M_detailmajikan->tampilmajikandatanyaformal($this->session->userdata("detailuser"));
        $data['tampil_data_majikan'] = $this->M_detailmajikan->tampil_data_majikan($this->session->userdata("detailuser"));
        $data['tampil_data_personal'] = $this->M_detailmajikan->tampil_data_personal($this->session->userdata("detailuser"));
        $data['hitungmajikan'] = $this->M_detailmajikan->hitung_data_majikan($this->session->userdata("detailuser"));
        $data['option_posisi'] = $this->M_detailmajikan->getmajikanList();
        $data['option_group'] = $this->M_detailmajikan->getposisiList_group();
        //user sudah login
        $data['namamodule'] = "detailmajikan";
        $data['namafileview'] = "ubahmajikanformal";
        echo Modules::run('template/admin_template', $data);
    }



    public function select_agenlist()
    {
        $idgrup = $this->input->post('kode_group');
        $data['option_agen'] = $this->M_detailmajikan->getagenlist_group($idgrup);
        $this->load->view('detailmajikan/detailgroup', $data);
    }

    public function select_majikanlist()
    {
        $kodeagen = $this->input->post('kode_agen');
        $data['option_majikan'] = $this->M_detailmajikan->getmajikanlist_agen($kodeagen);
        $this->load->view('detailmajikan/detailmajikannya', $data);
    }
    public function select_suhanlist()
    {
        $kodemajikan = $this->input->post('kode_majikan');
        $data['option_suhan'] = $this->M_detailmajikan->getsuhanlist_majikan($kodemajikan);
        $this->load->view('detailmajikan/detailsuhannya', $data);
    }

    public function select_visapermitlist()
    {
        $idsuhan = $this->input->post('id_suhan');
        $data['option_visapermit'] = $this->M_detailmajikan->getvisapermitlist_suhan($idsuhan);
        $this->load->view('detailmajikan/detailvisapermitnya', $data);
    }

    public function select_suhan()
    {
        $data['option_suhan'] = $this->M_detailmajikan->getSuhanList();
        $data['option_visapermit'] = $this->M_detailmajikan->getvisapermitList();
        $this->load->view('detailmajikan/detailsuhan', $data);
    }

    public function simpan_data_majikan()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $hp	= $this->input->post('hp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $this->M_detailmajikan->simpan_data_majikan($kode, $nama, $hp, $email, $alamat, $status);
        redirect('detailmajikan/vtambahmajikan');
    }

    public function tambahmajikan()
    {
        $this->M_detailmajikan->tambahmajikan();
        redirect('detailmajikan');
    }

    public function ubahmajikan()
    {
        $this->M_detailmajikan->ubahmajikan();
        redirect('detailmajikan');
    }

    public function ubahgrupmajikan()
    {
        $this->M_detailmajikan->ubahgrupmajikan();
        redirect('detailmajikan');
    }

    public function simpanpkketaiwan()
    {
        $id = $_POST['id'];
        $pk = $_POST['pk'];
        $terima = $_POST['terima'];
        if ($id != "") {
            $update = $this->db->query("UPDATE personal SET tgl_pk = '$pk', terima_pk = '$terima' WHERE id_biodata = '$id' ");
            if ($update) {
                echo "success";
            } else {
                echo "gagal";
            }
        } else {
            echo "gagal";
        }
    }

    public function ambilpkketaiwan($id)
    {
        $ambil = $this->M_detailmajikan->ambildatamod($id, "tgl_pk", "personal", "id_biodata", "tgl_pk");
        exit($ambil);
    }

    public function ambilpkditrima($id)
    {
        $ambil = $this->M_detailmajikan->ambildatamod($id, "terima_pk", "personal", "id_biodata", "terima_pk");
        exit($ambil);
    }

    public function ambilstatuspk($id)
    {
        $ambil = $this->M_detailmajikan->ambildatamod($id, "status_pk", "personal", "id_biodata", "status_pk");
        exit($ambil);
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


    public function stauspkpk($nilai, $id)
    {
        if ($id != "") {
            $update = $this->db->query("UPDATE personal SET status_pk = '$nilai' WHERE id_biodata = '$id' ");
            if ($update) {
                echo "disimpan";
            } else {
                echo "tidak disimpan";
            }
        } else {
            echo "tidak disimpan";
        }
    }


    public function aturulang($idnya)
    {
        $backup = $this->db->query("SELECT * FROM majikan WHERE id_biodata = '".$idnya."'")->row();
        $dataz = [
            tgl_dibuat => date('Y.m.d H:i:s'),
            id_majikan => $backup->id_majikan,
            id_biodata => $backup->id_biodata,
            kode_group => $backup->kode_group,
            kode_agen => $backup->kode_agen,
            kode_majikan => $backup->kode_majikan,
            kode_suhan => $backup->kode_suhan,
            kode_visapermit => $backup->kode_visapermit,
            namamajikan => $backup->namamajikan,
            namataiwan => $backup->namataiwan,
            alamatmajikan => $backup->alamatmajikan,
            notelpmajikan => $backup->notelpmajikan,
            tglterpilih => $backup->tglterpilih,
            statustglterbang => $backup->statustglterbang,
            JD => $backup->JD,
            tglterbang => $backup->tglterbang,
            id_majikannya => $backup->id_majikannya,
            id_suhan => $backup->id_suhan,
            id_visapermit => $backup->id_visapermit,
            tglpk => $backup->tglpk,
            tglterbitsuhan => $backup->tglterbitsuhan,
            tglterimasuhan => $backup->tglterimasuhan,
            tglterbitpermit => $backup->tglterbitpermit,
            tglterimapermit => $backup->tglterimapermit,
            insterimasuhan => $backup->insterimasuhan,
            tglinfosuhan => $backup->tglinfosuhan,
            tgltransaksisuhan => $backup->tgltransaksisuhan,
            instransaksisuhan => $backup->instransaksisuhan,
            insterimapermit => $backup->insterimapermit,
            tglinfopermit => $backup->tglinfopermit,
            tgltransaksipermit => $backup->tgltransaksipermit,
            instransaksipermit => $backup->instransaksipermit,
            ketsuhan => $backup->ketsuhan,
            ketpermit => $backup->ketpermit,
            simpansuhan => $backup->simpansuhan,
            kirimsuhan => $backup->kirimsuhan,
            simpanvisapermit => $backup->simpanvisapermit,
            kirimvisapermit => $backup->kirimvisapermit,
            tglsimpansuhan => $backup->tglsimpansuhan,
            statsuhan => $backup->statsuhan,
            tglsimpanvp => $backup->tglsimpanvp,
            statvp => $backup->statvp,
            bandaratuju => $backup->bandaratuju,
        ];

        $this->db->insert('majikanhistory', $dataz);

        $aturulangkode = "
			UPDATE majikan
			SET kode_group = '',
			kode_agen = '',
			kode_majikan = '0',
			kode_suhan = '0',
			kode_visapermit = '0',
			namamajikan = '',
			namataiwan = '',
			alamatmajikan = '',
			notelpmajikan = '',
			tglterpilih = '',
			statustglterbang = '0',
			JD = '',
			tglterbang = '',
			id_majikannya = '0',
			id_suhan = '',
			id_visapermit = '',
			tglpk = '',
			tglterbitsuhan = '',
			tglterimasuhan = '',
			tglterbitpermit = '',
			tglterimapermit = '',
			insterimasuhan = NULL,
			tglinfosuhan = NULL,
			tgltransaksisuhan = NULL,
			instransaksisuhan = NULL,
			insterimapermit = NULL,
			tglinfopermit = NULL,
			tgltransaksipermit = NULL,
			instransaksipermit = NULL,
			ketsuhan = '',
			ketpermit = '',
			simpansuhan = '0',
			kirimsuhan = '0',
			simpanvisapermit = '0',
			kirimvisapermit = '0',
			tglsimpansuhan = '0',
			statsuhan = '0',
			tglsimpanvp = '0',
			statvp = '0',
			bandaratuju = ''
			WHERE id_biodata = '".$idnya."'
		 ";
        $aturulang = $this->db->query($aturulangkode);
        redirect('detailmajikan');
    }

    public function aturulangform($idnya)
    {
        $data['id'] = $idnya;
        $idprefix = substr($idnya, 0, 2);
        $backup = $this->db->query("SELECT * FROM majikanhistory WHERE id_biodata = '".$idnya."' ORDER BY tgl_dibuat DESC")->result();
        $table = '<tr>';
        $no = 1;
        foreach ($backup as $k => $v) {
            if ($idprefix == 'FI' || $idprefix == 'MI') {
                $dgroup = $this->M_session->getData('nama', 'datagroup', 'id_group', $v->kode_group);
                $dagen = $this->M_session->getData('nama', 'dataagen', 'id_agen', $v->kode_agen);
                $dmajikan = $v->namamajikan;
                $dsuhan = $v->id_suhan;
                $dvp = $v->id_visapermit;
            } else {
                $dgroup = $this->M_session->getData('nama', 'datagroup', 'id_group', $v->kode_group);
                $dagen = $this->M_session->getData('nama', 'dataagen', 'id_agen', $v->kode_agen);
                $dmajikan = $this->M_session->getData('nama', 'datamajikan', 'id_majikan', $v->kode_majikan);
                $dsuhan = $this->M_session->getData('no_suhan', 'datasuhan', 'id_suhan', $v->kode_suhan);
                $dvp = $this->M_session->getData('no_visapermit', 'datavisapermit', 'id_visapermit', $v->kode_visapermit);
            }

            $table .= '<td>'.$no.'</td>';
            $table .= '<td>'.$v->tgl_dibuat.'</td>';
            $table .= '<td>'.$dgroup.'</td>';
            $table .= '<td>'.$dagen.'</td>';
            $table .= '<td>'.$dmajikan.'</td>';
            $table .= '<td>'.$dsuhan.'</td>';
            $table .= '<td>'.$dvp.'</td>';
            $table .= '<td><a class="btn btn-success" href="'.site_url('detailmajikan/aturulangrestore/'.$v->id).'" >Pulihan</a></td>';

            $no++;
        }
        $data['datatable'] = $table;

        $data['namamodule'] = "detailmajikan";
        $data['namafileview'] = "detailaturulang";
        echo Modules::run('template/new_admin_template', $data);
    }


    public function aturulangrestore($id)
    {
        $restore = $this->db->query("SELECT * FROM majikanhistory WHERE id = '".$id."'")->row();
        $backup = $this->db->query("SELECT * FROM majikan WHERE id_biodata = '".$restore->id_biodata."'")->row();
        $dataz = [
            tgl_dibuat => date('Y.m.d H:i:s'),
            id_majikan => $backup->id_majikan,
            id_biodata => $backup->id_biodata,
            kode_group => $backup->kode_group,
            kode_agen => $backup->kode_agen,
            kode_majikan => $backup->kode_majikan,
            kode_suhan => $backup->kode_suhan,
            kode_visapermit => $backup->kode_visapermit,
            namamajikan => $backup->namamajikan,
            namataiwan => $backup->namataiwan,
            alamatmajikan => $backup->alamatmajikan,
            notelpmajikan => $backup->notelpmajikan,
            tglterpilih => $backup->tglterpilih,
            statustglterbang => $backup->statustglterbang,
            JD => $backup->JD,
            tglterbang => $backup->tglterbang,
            id_majikannya => $backup->id_majikannya,
            id_suhan => $backup->id_suhan,
            id_visapermit => $backup->id_visapermit,
            tglpk => $backup->tglpk,
            tglterbitsuhan => $backup->tglterbitsuhan,
            tglterimasuhan => $backup->tglterimasuhan,
            tglterbitpermit => $backup->tglterbitpermit,
            tglterimapermit => $backup->tglterimapermit,
            insterimasuhan => $backup->insterimasuhan,
            tglinfosuhan => $backup->tglinfosuhan,
            tgltransaksisuhan => $backup->tgltransaksisuhan,
            instransaksisuhan => $backup->instransaksisuhan,
            insterimapermit => $backup->insterimapermit,
            tglinfopermit => $backup->tglinfopermit,
            tgltransaksipermit => $backup->tgltransaksipermit,
            instransaksipermit => $backup->instransaksipermit,
            ketsuhan => $backup->ketsuhan,
            ketpermit => $backup->ketpermit,
            simpansuhan => $backup->simpansuhan,
            kirimsuhan => $backup->kirimsuhan,
            simpanvisapermit => $backup->simpanvisapermit,
            kirimvisapermit => $backup->kirimvisapermit,
            tglsimpansuhan => $backup->tglsimpansuhan,
            statsuhan => $backup->statsuhan,
            tglsimpanvp => $backup->tglsimpanvp,
            statvp => $backup->statvp,
            bandaratuju => $backup->bandaratuju,
        ];
        $this->db->insert('majikanhistory', $dataz);

        $datax = [
            kode_group => $restore->kode_group,
            kode_agen => $restore->kode_agen,
            kode_majikan => $restore->kode_majikan,
            kode_suhan => $restore->kode_suhan,
            kode_visapermit => $restore->kode_visapermit,
            namamajikan => $restore->namamajikan,
            namataiwan => $restore->namataiwan,
            alamatmajikan => $restore->alamatmajikan,
            notelpmajikan => $restore->notelpmajikan,
            tglterpilih => $restore->tglterpilih,
            statustglterbang => $restore->statustglterbang,
            JD => $restore->JD,
            tglterbang => $restore->tglterbang,
            id_majikannya => $restore->id_majikannya,
            id_suhan => $restore->id_suhan,
            id_visapermit => $restore->id_visapermit,
            tglpk => $restore->tglpk,
            tglterbitsuhan => $restore->tglterbitsuhan,
            tglterimasuhan => $restore->tglterimasuhan,
            tglterbitpermit => $restore->tglterbitpermit,
            tglterimapermit => $restore->tglterimapermit,
            insterimasuhan => $restore->insterimasuhan,
            tglinfosuhan => $restore->tglinfosuhan,
            tgltransaksisuhan => $restore->tgltransaksisuhan,
            instransaksisuhan => $restore->instransaksisuhan,
            insterimapermit => $restore->insterimapermit,
            tglinfopermit => $restore->tglinfopermit,
            tgltransaksipermit => $restore->tgltransaksipermit,
            instransaksipermit => $restore->instransaksipermit,
            ketsuhan => $restore->ketsuhan,
            ketpermit => $restore->ketpermit,
            simpansuhan => $restore->simpansuhan,
            kirimsuhan => $restore->kirimsuhan,
            simpanvisapermit => $restore->simpanvisapermit,
            kirimvisapermit => $restore->kirimvisapermit,
            tglsimpansuhan => $restore->tglsimpansuhan,
            statsuhan => $restore->statsuhan,
            tglsimpanvp => $restore->tglsimpanvp,
            statvp => $restore->statvp,
            bandaratuju => $restore->bandaratuju,
        ];
        $this->M_session->update($datax, 'majikan', $restore->id_majikan, 'id_majikan');
        redirect('detailmajikan');
    }
}
