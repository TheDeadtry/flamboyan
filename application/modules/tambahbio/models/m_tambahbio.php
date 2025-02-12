<?php

class M_tambahbio extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function tampil_data_sektor()
    {
        $sql = "SELECT kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin FROM datasektor";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function tampil_data_negara()
    {
        $sql = "SELECT kode_negara,isi,mandarin FROM datanegara";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function tampil_data_calling()
    {
        $sql = "SELECT kode_calling,isi FROM datacalling";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function tampil_data_skillnya()
    {
        $sql = "SELECT kode_skillnya,isi FROM dataskillnya";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function tampil_data_agama()
    {
        $sql = "SELECT id_agama,isi,mandarin FROM dataagama";
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function tampil_data_lokasi()
    {
        $sql = "SELECT isi,mandarin FROM datalokasikerja";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function tampil_data_sponsor()
    {
        $sql = "SELECT * FROM datasponsor";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function tampil_data_pendidikan()
    {
        $sql = "SELECT id_pedidikan,isi,mandarin FROM datapendidikan order by isi asc";
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function tampil_data_provinsi()
    {
        $sql = "SELECT id_provinsi,isi,mandarin FROM dataprovinsi";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function getnourut($idnya)
    {

        $sql = "SELECT no_urut FROM datasektor WHERE kode_jenis='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->row('no_urut');
    }


    public function updateidsektor($idnya, $nourut)
    {

        $sql = "UPDATE datasektor SET no_urut='".$nourut."' WHERE kode_jenis='".$idnya."'";

        $this->db->query($sql);

    }


    public function buatarray($kode, $diminta, $dari, $tambahan = "")
    {
        $data = $this->db->query("SELECT ".$kode." FROM ".$dari.$tambahan)->result();
        $array = array();
        if (isset($data)) {
            foreach ($data as $key => $dataarr) {
                $array[] = strtoupper($dataarr->$diminta);
            }
        } else {
            $array[] = "";
        }
    }
    public function tambahpersonal()
    {
        $this->load->library('upload');
        $nmfile = $this->input->post('idp'); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|webp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $config['overwrite'] = true;
        $config['remove_spaces'] = true;

        $datanya = "";
        $player = $this->input->post('lokasikerja');
        $datanya = $player[0];
        for ($i = 1;$i < sizeof($player);$i++) {
            $datanya = $datanya.",".$player[$i];
        }

        $this->upload->initialize($config);

        if (!empty($_FILES['gambarnya']['name'])) {
            if ($this->upload->do_upload('gambarnya')) {
                $gbr = $this->upload->data();
                $foto = $gbr['file_name'];
            } else {
                $foto = "profile.jpg";
            }
        } else {
            $foto = "profile.jpg";
        }

        $data = array(
            'id_biodata' => $this->input->post('idp'),
            'negara1' => $this->input->post('negara1isi'),
            'negara2' => $this->input->post('negara2isi'),
            'calling' => $this->input->post('callvisa1isi'),
            'skill1' => $this->input->post('skill1isi'),
            'skill2' => $this->input->post('skill2isi'),
            'skill3' => $this->input->post('skill3isi'),
            'nama' => $this->input->post('namap'),
            'nama_mandarin' => $this->input->post('namamandarin'),
            'kode_sponsor' => $this->input->post('sponsor'),
            'jeniskelamin' => $this->input->post('jkp'),
            'notelp' => $this->input->post('notelp'),
            'notelpkel' => $this->input->post('notelpkel'),
            'tanggaldaftar' => $this->input->post('daftarp'),
            'tinggi' => $this->input->post('tinggip'),
            'berat' => $this->input->post('beratp'),
            'hp' => $this->input->post('hpp'),
            'hpkel' => $this->input->post('hpkelp'),
            'warganegara' => $this->input->post('wargap'),
            'tempatlahir' => $this->input->post('tempatp'),
            'tgllahir' => $this->input->post('tgllahirp'),
            'agama' => $this->input->post('agamap'),
            'status' => $this->input->post('statusp'),
            'tglmenikah' => $this->input->post('tglnikahp'),
            'pendidikan' => $this->input->post('pendidikanp'),
            'alamat' => $this->input->post('alamatp'),
            'provinsi' => $this->input->post('provinsip'),
            'mandarin' => $this->input->post('mandarinp'),
            'taiyu' => $this->input->post('taiyup'),
            'inggris' => $this->input->post('inggrisp'),
            'cantonese' => $this->input->post('cantonesep'),
            'hakka' => $this->input->post('hakkap'),
            'statuspendidikan' => $this->input->post('statuspendidikan'),
            'statusaktif' => "PROSES",
            'foto' => $foto,
            'keterangan' => $this->input->post('keterangan'),
            'lokasikerja' => $datanya,
            'email' => $this->input->post('email'),
            'ip_created' => $this->session->userdata('session_ip')
        );
        $this->db->insert('personal', $data);

        $data4 = array(
            'id_biodata' => $this->input->post('idp'),
            'ktp' => "profile.jpg",
            'kk' => "profile.jpg",
            'akte' => "profile.jpg",
            'ijazah' => "profile.jpg",
            'si' => "profile.jpg",
            'sn' => "profile.jpg",
            'paspor' => "profile.jpg",
            'arc' => "profile.jpg",
            'asuransi' => "profile.jpg",
            'medikal1' => "profile.jpg",
            'medikal2' => "profile.jpg",
            'medikal3' => "profile.jpg",
            'skck' => "profile.jpg",
            'fingerprint' => "profile.jpg",
            'visa' => "profile.jpg",
            'pap' => "profile.jpg",
            );
        $this->db->insert('dokumen', $data4);

        $data8 = array(
            'id_markb' => '',
            'id_biodata' => $this->input->post('idp'),
            );
        $this->db->insert('markb', $data8);

        $data9 = array(
            'id_markc' => '',
            'id_biodata' => $this->input->post('idp'),
            );
        $this->db->insert('markc', $data9);

        $dat10 = array(
            'id_marke' => '',
            'id_biodata' => $this->input->post('idp'),
            );
        $this->db->insert('marke', $dat10);

        $dat11 = array(
            'id_markf' => '',
            'id_biodata' => $this->input->post('idp'),
            );
        $this->db->insert('markf', $dat11);

        $dat12 = array(
            'id_markg' => '',
            'id_biodata' => $this->input->post('idp'),
            );
        $this->db->insert('markg', $dat12);

        $dat13 = array(
            'id_biodata' => $this->input->post('idp'),
            );
        $this->db->insert('durasidetail', $dat13);
    }

}
