<?php

class M_detailmajikan extends CI_Model
{
    public $datamajikan = 'datamajikan';
    public $datasuhan = 'datasuhan';
    public $datavisapermit = 'datavisapermit';

    public function __construct()
    {
        parent::__construct();
    }

    public function getagenList()
    {
        $kode_group = $this->input->post('kode_group');
        $sql = "SELECT * FROM dataagen where kode_group='".$kode_group."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getagenlist_group($idgrup)
    {
        $result = array();
        $this->db->select('*');
        $this->db->from('dataagen');
        $this->db->where('statusnonaktif', 0);
        $this->db->where('kode_group', $idgrup);
        $this->db->order_by('kode_group', 'ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row) {
            $result[0] = '-Pilih Nama Agen-';
            $result[$row->id_agen] = $row->kode_agen.' : '. $row->nama;
        }
        return $result;
    }

    public function getmajikanlist_agen($kodeagen)
    {
        $result = array();
        $this->db->select('*');
        $this->db->from('datamajikan');
        $this->db->where('kode_agen', $kodeagen);
        $this->db->order_by('nama', 'ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row) {
            $result[0] = '-Pilih Nama Majikan-';
            $result[$row->id_majikan] = $row->nama;
        }
        return $result;
    }


    public function getsuhanlist_majikan($kodemajikan)
    {
        $result = array();
        $this->db->select('*');
        $this->db->from('datasuhan');
        $this->db->where('id_majikan', $kodemajikan);
        $this->db->order_by('id_majikan', 'ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row) {
            $result[0] = '-Pilih No Suhan-';
            $result[$row->id_suhan] = $row->no_suhan;
        }
        return $result;
    }

    public function getvisapermitlist_suhan($idsuhan)
    {
        $result = array();
        $this->db->select('*');
        $this->db->from('datavisapermit');
        $this->db->where('id_suhan', $idsuhan);
        $this->db->order_by('id_suhan', 'ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row) {
            $result[0] = '-Pilih No Visa Permit-';
            $result[$row->id_visapermit] = $row->no_visapermit;
        }
        return $result;
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


    public function tampilanmf($idnya)
    {
        $sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function hitung_data_majikan($idnya)
    {
        $sql = "SELECT count(*) as total FROM majikan WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql)->row_array();
        return $query['total'];
    }

    public function getposisiList_group()
    {
        $result = array();
        $this->db->select('*');
        $this->db->from('datagroup');
        $this->db->order_by('id_group', 'ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row) {
            $result[0] = '-Pilih Nama Group-';
            $result[$row->id_group] = $row->nama;
        }
        return $result;
    }

    public function simpan_data_majikan($kode, $nama, $hp, $email, $alamat, $status)
    {
        $data = array(
            'kode_majikan' => $kode,
            'nama' => $nama,
            'hp' => $hp,
            'email' => $email,
            'alamat' => $alamat,
            'status' => $status,
        );
        $this->db->insert('datamajikan', $data);
    }
    public function tampil_data_personal($idnya)
    {
        $sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'  LIMIT 1";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function tampil_data_majikan($idnya)
    {
        $sql = "SELECT *,majikan.kode_agen AS kdoeagenya FROM majikan 
        JOIN datasuhan ON majikan.id_majikannya=datasuhan.id_majikan 
        JOIN datavisapermit ON majikan.id_majikannya=datavisapermit.id_majikan 
        JOIN datamajikan ON majikan.id_majikannya=datamajikan.id_majikan 
        WHERE majikan.id_biodata='".$idnya."' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tampil_data_majikanformal($idnya)
    {
        $sql = "SELECT *, datagroup.nama as namagroup1, dataagen.nama as namaagen1, datasuhan.no_suhan as nosuhan1, datavisapermit.no_visapermit as novisapermit1, datamajikan.nama as namamajikan1
            FROM majikan 
            LEFT JOIN datagroup 
            ON majikan.kode_group=datagroup.id_group
            LEFT JOIN dataagen
            ON majikan.kode_agen=dataagen.id_agen
            LEFT JOIN datasuhan 
            ON majikan.kode_suhan=datasuhan.id_suhan 
            LEFT JOIN datavisapermit 
            ON majikan.kode_visapermit=datavisapermit.id_visapermit 
            LEFT JOIN datamajikan 
            ON majikan.kode_majikan=datamajikan.id_majikan 
            WHERE majikan.id_biodata='".$idnya."';";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tampilmajikandatanya($idnya)
    {
        $sql = "SELECT *,datagroup.nama as namagroupnya, dataagen.nama as namaagennya
        FROM majikan
        LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
        LEFT JOIN datagroup
        ON majikan.kode_group=datagroup.id_group
        WHERE majikan.id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function ambilkodesuhan($idnya)
    {
        $kode_desa = "";
        $result = Dbs::load("SELECT *,datagroup.nama as namagroupnya, dataagen.nama as namaagennya
        FROM majikan
        INNER JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
        INNER JOIN datagroup
        ON majikan.kode_group=datagroup.id_group
        WHERE majikan.id_biodata='".$idnya."'");
        while ($row = mysqli_fetch_array($result)) {
            $kode_desa = $row['kode_suhan'];
        }
        return $kode_desa;
    }

    public function tampilsuhannya($idnya)
    {
        $sql = "SELECT * FROM suhanhistory WHERE id_suhan='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function tampilvpnya($idnya)
    {
        $sql = "SELECT * FROM visapermithistory WHERE id_visapermit='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function ambilkodevp($idnya)
    {
        $kode_desa = "";
        $result = Dbs::load("SELECT *,datagroup.nama as namagroupnya, dataagen.nama as namaagennya
        FROM majikan
        INNER JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
        INNER JOIN datagroup
        ON majikan.kode_group=datagroup.id_group
        WHERE majikan.id_biodata='".$idnya."'");
        while ($row = mysqli_fetch_array($result)) {
            $kode_desa = $row['kode_visapermit'];
        }
        return $kode_desa;
    }


    public function tampilmajikandatanyaformal($idnya)
    {
        $sql = "SELECT *,datagroup.nama as namagroupnya, dataagen.nama as namaagennya, datasuhan.no_suhan as nosuhannya, datavisapermit.no_visapermit as novisapermitnya , datamajikan.nama as namamajikannya
            FROM majikan
            LEFT JOIN dataagen
            ON majikan.kode_agen=dataagen.id_agen 
            LEFT JOIN datagroup
            ON majikan.kode_group=datagroup.id_group
            LEFT JOIN datasuhan
            ON majikan.kode_suhan=datasuhan.id_suhan
            LEFT JOIN datavisapermit
            ON majikan.kode_visapermit=datavisapermit.id_visapermit
            LEFT JOIN datamajikan
            ON majikan.kode_majikan=datamajikan.id_majikan
            WHERE majikan.id_biodata='$idnya'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tampildatanya($idnya)
    {
        $sql = "SELECT * FROM majikan WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tampil_data_majikanfi()
    {
        $sql = "SELECT * FROM k";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tampil_data_agen()
    {
        $sql = "SELECT * FROM dataagen";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function tampil_data_group()
    {
        $sql = "SELECT * FROM datagroup";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tambahmajikan()
    {
        $this->load->helper('ggs_helper');
        $bio = $this->input->post('idbiodata');
        $pekerjaan  = [];
        if(is_array($this->input->post('pekerjaanlist'))) {
            foreach($this->input->post('pekerjaanlist') as $key => $value) {
                foreach($value as $key1 => $value1) {
                    $pekerjaan[] = [
                        "id_biodata" => $bio,
                        "nama" => $key,
                        "kode" => $value1,
                    ];
                }
            }
        }
        $this->db->query("DELETE FROM majikan_kriteria_pekerjaan WHERE id_biodata='$bio'");
        $q = ToInsert($pekerjaan, 'majikan_kriteria_pekerjaan',["kode", "nama", "id_biodata"]);
        $this->db->query($q);
        $data = array(
            'id_biodata' => $this->input->post('idbiodata'),
            'kode_group' => $this->input->post('group'),
            'kode_agen' => $this->input->post('kodeagen'),
            'kode_majikan' => $this->input->post('kode_majikan'),
            'kode_suhan' => $this->input->post('id_suhan'),
            'kode_visapermit' => $this->input->post('id_visapermit'),
            'id_majikannya' => $this->input->post('id_majikannya'),
            'id_suhan' => $this->input->post('suhan'),
            'id_visapermit' => $this->input->post('visapermit'),
            'tglterpilih' => $this->input->post('terpilih'),
            'JD	' => $this->input->post('jd'),
            'tglterbang' => $this->input->post('terbang'),
            'statustglterbang' => $this->input->post('terbanga'),
            'tglpk' => $this->input->post('tglpk'),
            'tgltrmspbg' => $this->input->post('tgltrmspbg'),
            'namamajikan' => $this->input->post('namamajikan'),
            'namataiwan' => $this->input->post('namataiwan'),
            'notelpmajikan' => $this->input->post('notelpmajikan'),
            'alamatmajikan' => $this->input->post('alamatmajikan'),
            'id_suhan' => $this->input->post('suhan'),
            'tglterbitsuhan' => $this->input->post('tglterbitsuhan'),
            'tglterimasuhan' => $this->input->post('tglterimasuhan'),
            'ketsuhan' => $this->input->post('ketsuhan'),
            'kirimsuhan' => $this->input->post('kirimsuhan'),
            'simpansuhan' => $this->input->post('simpansuhan'),
            'kirimvisapermit' => $this->input->post('kirimvisapermit'),
            'simpanvisapermit' => $this->input->post('simpanvisapermit'),

            'id_visapermit' => $this->input->post('visapermit'),
            'tglterbitpermit' => $this->input->post('tglterbitpermit'),
            'tglterimapermit' => $this->input->post('tglterimapermit'),
            'ketpermit' => $this->input->post('ketpermit'),
            'tanggal_input' => date('Y-m-d H:i:s'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'marketing' => $this->input->post('marketing'),
        );
        $idid = $this->input->post('idbiodata');
        $cek_majikan = $this->db->query("SELECT count(*) as total FROM majikan WHERE id_biodata='$idid'")->row();
        if ($cek_majikan->total == 0) {
            $this->db->insert('majikan', $data);
        }
    }

    public function tambahmajikanfi()
    {
        $this->load->helper('ggs_helper');
        $bio = $this->input->post('idbiodata');
        $pekerjaan  = [];
        if(is_array($this->input->post('pekerjaanlist'))) {
            foreach($this->input->post('pekerjaanlist') as $key => $value) {
                foreach($value as $key1 => $value1) {
                    $pekerjaan[] = [
                        "id_biodata" => $bio,
                        "nama" => $key,
                        "kode" => $value1,
                    ];
                }
            }
        }        
        $this->db->query("DELETE FROM majikan_kriteria_pekerjaan WHERE id_biodata='$bio'");
        $q = ToInsert($pekerjaan, 'majikan_kriteria_pekerjaan',["kode", "nama", "id_biodata"]);
        $this->db->query($q);
        $data = array(
            'id_biodata' => $this->input->post('idbiodata'),
            'kode_group' => $this->input->post('group'),
            'kode_agen' => $this->input->post('kodeagen'),
            'id_majikannya' => $this->input->post('id_majikannya'),
            'id_suhan' => $this->input->post('suhan'),
            'id_visapermit' => $this->input->post('visapermit'),
            'tglterpilih' => $this->input->post('terpilih'),
            'JD ' => $this->input->post('jd'),
            'tglterbang' => $this->input->post('terbang'),
            'statustglterbang' => $this->input->post('terbanga'),
            'kode_majikan' => $this->input->post('kode_majikan'),
            'kode_suhan' => $this->input->post('id_suhan'),
            'kode_visapermit' => $this->input->post('id_visapermit'),
            'tglpk' => $this->input->post('tglpk'),
            'tgltrmspbg' => $this->input->post('tgltrmspbg'),
            'namamajikan' => $this->input->post('namamajikan'),
            'namataiwan' => $this->input->post('namataiwan'),
            'notelpmajikan' => $this->input->post('notelpmajikan'),
            'alamatmajikan' => $this->input->post('alamatmajikan'),
            'id_suhan' => $this->input->post('suhan'),
            'tglterbitsuhan' => $this->input->post('tglterbitsuhan'),
            'tglterimasuhan' => $this->input->post('tglterimasuhan'),
            'ketsuhan' => $this->input->post('ketsuhan'),
            'id_visapermit' => $this->input->post('visapermit'),
            'tglterbitpermit' => $this->input->post('tglterbitpermit'),
            'tglterimapermit' => $this->input->post('tglterimapermit'),
            'ketpermit' => $this->input->post('ketpermit'),
            'tanggal_input' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('majikan', $data);
    }

    public function ToUpdate($data, $table = 'test', $wht = 'kode')
    {
        if (count($data) > 0) {
            $keys = array_keys($data[0]);
            $query = 'UPDATE ' . $table . ' aa , ( ';
            $query .= 'SELECT ' . implode(', ', array_map(function ($g) {
                return 'a.' . $g;
            }, $keys));
            $query .= ' FROM (';
            $query .= implode("\n UNION ALL \n", array_map(function ($w) use ($keys) {
                $f = ' SELECT ';
                $f .= implode(', ', array_map(function ($q) use ($w) {
                    return '"' . str_replace('"', '\\"', $w[$q]) . '" `' . str_replace(" ", "", $q) . '`';
                }, $keys));
                return $f;
            }, $data));
            $query .= ') a ) bb SET ';
            $query .= implode(',', array_map(function ($c) {
                return ' aa.' . $c . ' = bb.' . $c;
            }, $keys));
            $query .= ' WHERE ';
            if (is_array($wht)) {
                $query .= implode(" AND ", array_map(function ($whtx) {
                    return ' aa.' . $whtx . ' = bb.' . $whtx;
                }, $wht));
            } else {
                $query .= ' aa.' . $wht . ' = bb.' . $wht;
            }
            return $query;
        } else {
            return [];
        }
    }

    public function ubahmajikan()
    {
        $this->load->helper('ggs_helper');
        $bio = $this->input->post('idbiodata');
        $pekerjaan  = [];
        if(is_array($this->input->post('pekerjaanlist'))) {
            foreach($this->input->post('pekerjaanlist') as $key => $value) {
                foreach($value as $key1 => $value1) {
                    $pekerjaan[] = [
                        "id_biodata" => $bio,
                        "nama" => $key,
                        "kode" => $value1,
                    ];
                }
            }
        }
        $this->db->query("DELETE FROM majikan_kriteria_pekerjaan WHERE id_biodata='$bio'");
        $q = ToInsert($pekerjaan, 'majikan_kriteria_pekerjaan',["kode", "nama", "id_biodata"]);
        $this->db->query($q);
        $data = array(
            'id_biodata' => $bio,
            'kode_group' => $this->input->post('group'),
            'kode_agen' => $this->input->post('kodeagen'),
            'id_majikannya' => $this->input->post('id_majikannya'),
            'id_suhan' => $this->input->post('suhan'),
            'id_visapermit' => $this->input->post('visapermit'),
            'tglterpilih' => $this->input->post('terpilih'),
            'JD' => $this->input->post('jd'),
            'tglterbang' => $this->input->post('terbang'),
            'statustglterbang' => $this->input->post('terbanga'),
            'tglpk' => $this->input->post('tglpk'),
            'tgltrmspbg' => $this->input->post('tgltrmspbg'),
            'namamajikan' => $this->input->post('namamajikan'),
            'namataiwan' => $this->input->post('namataiwan'),
            'notelpmajikan' => $this->input->post('notelpmajikan'),
            'alamatmajikan' => $this->input->post('alamatmajikan'),
            'tglterbitsuhan' => $this->input->post('tglterbitsuhan'),
            'tglterimasuhan' => $this->input->post('tglterimasuhan'),
            'ketsuhan' => $this->input->post('ketsuhan'),
            'tglterbitpermit' => $this->input->post('tglterbitpermit'),
            'tglterimapermit' => $this->input->post('tglterimapermit'),
            'ketpermit' => $this->input->post('ketpermit'),
            'kirimsuhan' => $this->input->post('kirimsuhan'),
            'simpansuhan' => $this->input->post('simpansuhan'),
            'kirimvisapermit' => $this->input->post('kirimvisapermit'),
            'simpanvisapermit' => $this->input->post('simpanvisapermit'),
            'tglsimpansuhan' => $this->input->post('tglsimpansuhan'),
            'statsuhan' => $this->input->post('statsuhan'),
            'tglsimpanvp' => $this->input->post('tglsimpanvp'),
            'statvp' => $this->input->post('statvp'),
            'bandaratuju' => $this->input->post('bandaratuju'),
            'tanggal_input' => date('Y-m-d H:i:s'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'marketing' => $this->input->post('marketing'),
        );
        $d = [$data];
        $update = $this->ToUpdate($d, "majikan", "id_biodata");
        $this->db->query($update);
    }

    public function getmajikanList()
    {
        $result = array();
        $this->db->select('*');
        $this->db->from('datamajikan');
        $this->db->order_by('nama', 'ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row) {
            $result[0] = '-Pilih Majikan-';
            $result[$row->id_majikan] = $row->nama;
        }
        return $result;
    }

    public function getSuhanList()
    {
        $id_majikan = $this->input->post('id_majikan');
        $sql = "SELECT * FROM datasuhan where id_majikan='".$id_majikan."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function ubahgrupmajikan()
    {
        $id = $this->input->post('id_majikan');
        $data = array(
            'kode_group' => $this->input->post('group'),
            'kode_agen' => $this->input->post('kodeagen'),
            'kode_majikan' => $this->input->post('kode_majikan'),
            'kode_suhan' => $this->input->post('id_suhan'),
            'kode_visapermit' => $this->input->post('id_visapermit'),
        );
        $this->db->where('id_biodata', $id);
        $this->db->update('majikan', $data);
    }

    public function getvisapermitList()
    {
        $id_majikan = $this->input->post('id_majikan');
        $sql = "SELECT * FROM datavisapermit where id_majikan='".$id_majikan."'";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function ambil_majikan()
    {
        $sql_prov = $this->db->get($this->datamajikan);
        if ($sql_prov->num_rows() > 0) {
            foreach ($sql_prov->result_array() as $row) {
                $result['-'] = '- Pilih Majikan -';
                $result[$row['id_majikan']] = ucwords(strtolower($row['nama']));
            }
            return $result;
        }
    }

    public function ambil_suhan($kode_prop)
    {
        $this->db->where('id_majikan', $kode_prop);
        $this->db->order_by('no_suhan', 'asc');
        $sql_kabupaten = $this->db->get($this->datasuhan);
        if ($sql_kabupaten->num_rows() > 0) {
            foreach ($sql_kabupaten->result_array() as $row) {
                $result[$row['no_suhan']] = ucwords(strtolower($row['no_suhan']));
            }
        } else {
            $result['-'] = '- Belum Ada Majikanaaa -';
        }
        return $result;
    }

    public function ambil_visapermit($kode_kab)
    {
        $this->db->where('no_suhan', $kode_kab);
        $this->db->order_by('no_visapermit', 'asc');
        $sql_kecamatan = $this->db->get($this->datavisapermit);
        if ($sql_kecamatan->num_rows() > 0) {
            foreach ($sql_kecamatan->result_array() as $row) {
                $result[$row['id_visapermit']] = ucwords(strtolower($row['no_visapermit']));
            }
        } else {
            $result['-'] = '- Belum Ada Suhan  -';
        }
        return $result;
    }

    public function ambildatamod($key, $diminta, $dari, $selector, $kode)
    {
        $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."'")->row();
        $dikirim = isset($data->$diminta);
        if ($dikirim == 1) {
            $paket = $data->$diminta;
        } else {
            $paket = "";
        }
        return $paket;
    }

}
