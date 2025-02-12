<?php

class M_detailpersonal extends CI_Model
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

    public function tampil_data_pilstat()
    {
        $sql = "SELECT * FROM datanamapilstat";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tampil_data_calling()
    {
        $sql = "SELECT kode_calling,isi FROM datacalling";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tampil_data_sponsor()
    {
        $sql = "SELECT * FROM datasponsor order by kode_sponsor,nama ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tampil_data_lokasi()
    {
        $sql = "SELECT isi,mandarin FROM datalokasikerja";
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

    public function tampil_data_pendidikan()
    {
        $sql = "SELECT isi,mandarin FROM datapendidikan";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function tampil_data_provinsi()
    {
        $sql = "SELECT isi,mandarin FROM dataprovinsi";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function tampil_data_personal($idnya)
    {
        $sql = "SELECT *,YEAR(CURDATE()) - YEAR(tgllahir) AS umur FROM personal WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tambahpersonal()
    {
        $this->load->library('upload');
        $nmfile = $this->input->post('idp').time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|webp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (empty($_FILES['gambarnya']['name'])) {
            $data = array(
                'id_biodata' => $this->input->post('idp'),
                'nama' => $this->input->post('namap'),
                'nama_mandarin' => $this->input->post('nama_mandarin'),
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
                'statusaktif' => "PENDING",
                'foto' => $this->input->post('gambarnya')."profile.jpg",
                'keterangan' => $this->input->post('keterangan'),
                'lokasikerja' => $this->input->post('lokasikerja'),
                'statuspendidikan' => $this->input->post('statuspendidikan'),

            );
            $this->db->insert('personal', $data);
        } else {
            if ($this->upload->do_upload('gambarnya')) {
                $gbr = $this->upload->data();
                $data = array(
                    'id_biodata' => $this->input->post('idp'),
                    'nama' => $this->input->post('namap'),
                    'nama_mandarin' => $this->input->post('nama_mandarin'),
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
                    'statusaktif' => "PENDING",
                    'foto' => $gbr['file_name'],
                    'keterangan' => $this->input->post('keterangan'),
                    'lokasikerja' => $this->input->post('lokasikerja'),
                    'statuspendidikan' => $this->input->post('statuspendidikan'),
                );
                $this->db->insert('personal', $data);
            }
        }
        $data3 = array(
        'id_biodata' => $this->input->post('idp'),);
        $this->db->insert('skck', $data3);
        $data4 = array(
            'id_biodata' => $this->input->post('idp'),
            'ktp' => "profile.jpg",
            'kk' => "profile.jpg",
            'akte' => "profile.jpg",
            'ijazah' => "profile.jpg",
            'paspor' => "profile.jpg",
            'arc' => "profile.jpg",
        );
        $this->db->insert('dokumen', $data4);
    }


    public function ubahpersonal()
    {
        $this->load->library('upload');
        $nmfile = $this->input->post('idp').time();
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|webp';
        $config['max_size'] = '5120';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $config['file_name'] = $nmfile;
        $config['overwrite'] = true;
        $config['remove_spaces'] = true;
        $this->upload->initialize($config);

        $datanya = "";
        $player = $this->input->post('lokasikerja');
        $datanya = $player[0];
        for ($i = 1; $i < sizeof($player); $i++) {
            $datanya = $datanya.",".$player[$i];
        }

        if (empty($_FILES['gambarnya']['name'])) {
            $data = array(
                'id_biodata' => $this->input->post('idp'),
                'nama' => $this->input->post('namap'),
                'nama_mandarin' => $this->input->post('nama_mandarin'),
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
                'keterangan' => $this->input->post('keterangan'),
                'lokasikerja' => $datanya,
                'email' => $this->input->post('email'),
                'statuspendidikan' => $this->input->post('statuspendidikan'),
                'jurusan' => $this->input->post('jurusan'),
                'tglinput' => $this->input->post('tglinput'),
            );
            $idbio = $this->input->post('idp');
            if ($idbio != "") {
                $this->db->where('id_biodata', $idbio);
                $this->db->update('personal', $data);
            }
        } else {
            if ($this->upload->do_upload('gambarnya')) {
                $gbr = $this->upload->data();
                $data = array(
                    'id_biodata' => $this->input->post('idp'),
                    'nama' => $this->input->post('namap'),
                    'nama_mandarin' => $this->input->post('nama_mandarin'),
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
                    'foto' => $gbr['file_name'],
                    'keterangan' => $this->input->post('keterangan'),
                    'lokasikerja' => $datanya,
                    'email' => $this->input->post('email'),
                    'statuspendidikan' => $this->input->post('statuspendidikan'),
                    'jurusan' => $this->input->post('jurusan'),
                    'tglinput' => $this->input->post('tglinput'),
                );
                $idbio = $this->input->post('idp');
                if ($idbio != "") {
                    $this->db->where('id_biodata', $idbio);
                    $this->db->update('personal', $data);
                }
            } else {
                $error = $this->upload->display_errors();
                return false;
            }
        }
        return true;
    }
    public function ubahstatus()
    {
        $data = array(
            'id_biodata' => $this->input->post('idp'),
            'statusaktif' => $this->input->post('statustki'),
        );
        $idbio = $this->input->post('idp');
        if ($idbio != "") {
            $this->db->where('id_biodata', $this->input->post('idp'));
            $this->db->update('personal', $data);
        }
        $data2 = array(
            'id_biodata'    => $this->input->post('idp'),
            'tanggal_ganti' => date('Y.m.d'),
            'status'        => $this->input->post('statustki')
        );
        $this->db->insert('personal_stat_history', $data2);
    }

    public function ubahidnya()
    {
        $idbio = $this->input->post('idp');
        $data = array(
            'id_biodata'    => $this->input->post('idp'),
            'negara1'       => $this->input->post('negara1'),
            'negara2'       => $this->input->post('negara2'),
            'calling'       => $this->input->post('namacalling'),
            'skill1'        => $this->input->post('namaskill'),
            'skill2'        => $this->input->post('namaskill2'),
            'skill3'        => $this->input->post('namaskill3'),
        );

        $idbios = $this->input->post('id_personal');
        if ($idbios != "") {
            $this->db->where('id_personal', $this->input->post('id_personal'));
            $this->db->update('personal', $data);
        }

        $data2 = array(
            'nodaftar'    => $this->input->post('idp')
        );
        if ($this->input->post('idp') != "") {
            $this->db->where('nodaftar', $this->input->post('idp'));
            $this->db->update('personalblk', $data2);
        }
    }
    public function hitung_biodatamf($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
    				   majikan.namamajikan,
    				   personal.*,
    				   family.*,
    				   working.*,
    				   skillcondition.*,
    				   request.*,	
    				   paspor.keterangan AS ketpas,
    				   paspor.berlaku,
    				   medical.keterangan AS ketmed
    			FROM personal 
    			JOIN majikan ON personal.id_biodata = majikan.id_biodata 
    			JOIN family ON personal.id_biodata = family.id_biodata
    			JOIN working ON personal.id_biodata = working.id_biodata
    			JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
    			JOIN request ON personal.id_biodata = request.id_biodata
    			JOIN paspor ON personal.id_biodata = paspor.id_biodata
    			JOIN medical ON personal.id_biodata = medical.id_biodata
    			WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_biodataff($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       majikan.namamajikan,
                       personal.*,
                       family.*,
                       working.*,
                       skillcondition.*,
                       request.*,   
                       paspor.keterangan AS ketpas,
                       paspor.berlaku,
                       medical.keterangan AS ketmed
                FROM personal 
                JOIN majikan ON personal.id_biodata = majikan.id_biodata 
                JOIN family ON personal.id_biodata = family.id_biodata
                JOIN working ON personal.id_biodata = working.id_biodata
                JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
                JOIN request ON personal.id_biodata = request.id_biodata
                JOIN paspor ON personal.id_biodata = paspor.id_biodata
                JOIN medical ON personal.id_biodata = medical.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_biodatafi($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
     				   personal.*,
     				   family.*,
     				   pengalaman.*,
                       tugas.*,
                       kettugas.*,
     				   paspor.keterangan AS ketpas,
     				   paspor.berlaku,
     				   paspor.tglterbit
     			FROM personal
     			JOIN family ON personal.id_biodata = family.id_biodata
     			JOIN pengalaman ON personal.id_biodata = pengalaman.id_biodata
                JOIN tugas ON personal.id_biodata = tugas.id_biodata
                JOIN kettugas ON personal.id_biodata = kettugas.id_biodata
     			JOIN paspor ON personal.id_biodata = paspor.id_biodata
     			WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_biodatajp($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                 personal.*,
                 family.*,
                 working.*,
                 skillcondition.*,
                 interview.*,
                 paspor.keterangan AS ketpas,
                 paspor.berlaku,
                 medical.keterangan AS ketmed
            FROM personal
            JOIN family ON personal.id_biodata = family.id_biodata
            JOIN working ON personal.id_biodata = working.id_biodata
            JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
            JOIN interview ON personal.id_biodata = interview.id_biodata
            JOIN paspor ON personal.id_biodata = paspor.id_biodata
            JOIN medical ON personal.id_biodata = medical.id_biodata
            WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_family($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       family.*
                FROM personal
                JOIN family ON personal.id_biodata = family.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_working($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       working.*
                FROM personal
                JOIN working ON personal.id_biodata = working.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_request($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       request.*
                FROM personal
                JOIN request ON personal.id_biodata = request.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_skillcondition($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       skillcondition.*
                FROM personal
                JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_medical($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       medical.*
                FROM personal
                JOIN medical ON personal.id_biodata = medical.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_pengalaman($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       pengalaman.*
                FROM personal
                JOIN pengalaman ON personal.id_biodata = pengalaman.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_tugas($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       tugas.*
                FROM personal
                JOIN tugas ON personal.id_biodata = tugas.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_kettugas($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       kettugas.*
                FROM personal
                JOIN kettugas ON personal.id_biodata = kettugas.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_interview($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       interview.*
                FROM personal
                JOIN interview ON personal.id_biodata = interview.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    public function hitung_paspor($id)
    {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       paspor.*
                FROM personal
                JOIN paspor ON personal.id_biodata = paspor.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
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

        return $array;
    }



}
