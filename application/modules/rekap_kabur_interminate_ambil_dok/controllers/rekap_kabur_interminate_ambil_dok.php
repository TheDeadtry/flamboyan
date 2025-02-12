<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Rekap_kabur_interminate_ambil_dok extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');
		$this->load->model('modelku');

		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_admin');
		}		
		if ($id_user && $status!=1){
			redirect('dashboard');
		}
    }
    
    private $nama_table = "rekap_kabur_interminate_ambil_dok";
	
	function index() {	
		$data['ambil_nama'] = $this->M_session->select("SELECT * FROM disnaker ORDER BY nama ASC");
		$data['namamodule'] = "rekap_kabur_interminate_ambil_dok";
		$data['namafileview'] = "views";
		echo Modules::run('template/new_admin_template', $data);
    }
    
    public function tambahdata()
    {
        $start = $_POST['start'];
        $end = $_POST['ending'];
        $kondisi = $_POST['kondisi'];

        $simpan = $this->db->query("INSERT INTO ".$this->nama_table." (tgl_start, tgl_end, kondisi) VALUES ('$start', '$end', '$kondisi') ");

        if ($simpan) {
            echo "simpan";
        }

    }


    public function show()
    {
        $columns22 = array(
			'tgl_start',
			'tgl_end'
		);

		$strr = array();
		$string1 = $_POST['search']['value'];
		for ($i=0;$i<count($columns22);$i++) {
			$strr[] = " lower(".$columns22[$i].") LIKE '%".strtolower($string1)."%'";
		}
		$where = '';
		if ( count( $strr ) ) {
			$where = '('.implode(' OR ', $strr).')';
		}
		if ( $where !== '' ) {
			$where = $where;
		}

		$limit 		= "";
		$where_dd 	= "";
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "where ".$where;
		}

		$tampil_data = $this->M_session->select("SELECT * FROM ".$this->nama_table." $where_dd order by id desc $limit");

        $data2 	= array();
        $no 	= intval($_POST['start']);

	    foreach ($tampil_data as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    $row->tgl_start,
                    $row->tgl_end,
                    $row->kondisi,
                    "<button data-id='".$row->id."' class='btn btn-warning printdata'>Print</button>
                    <button data-id='".$row->id."' class='btn btn-danger deletedata'>Delete</button>",
                )
            );
        }

        $resFilterLength 	= $this->M_session->select_row("SELECT count(*) as total FROM ".$this->nama_table." $where_dd");
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->M_session->select_row("SELECT count(*) as total FROM ".$this->nama_table."");
        $recordsTotal 		= $resTotalLength->total;

        $r = array(
            "draw"            => isset ( $request['draw'] ) ?
                                    intval( $request['draw'] ) :
                                    0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $data2
        );

		$this->output->set_content_type('application/json')->set_output(json_encode($r));
    }

    public function hapus()
    {
        $id = $_POST['myid'];
        $hapus = $this->db->query("DELETE FROM ".$this->nama_table." WHERE id = '$id'");
        if ($hapus) {
            echo "dihapus";   
        }
    }

    public function print_prepaire()
    {
        $id = $_POST['myid'];
        $select = $this->db->query("SELECT * FROM ".$this->nama_table." WHERE id='$id'")->row();


        echo json_encode(array(
			"id" => $select->id,
			"tanggal_awal" => $select->tgl_start,
			"tanggal_akhir" => $select->tgl_end,
			"kondisi" => $select->kondisi,
		));
    }

    public function print_data($tgl_start, $tgl_ending, $kondisi)
    {
        $kondisi = str_replace("%20", " ", $kondisi);
        
        header ("Content-type: text/html; charset=utf-8");
        require_once 'PHPWord/PHPWord.php';
        $PHPWord = new PHPWord();
        
        if ($kondisi == "SUDAH TERBANG LALU KABUR") {
            $document = $PHPWord->loadTemplate('files/rekap/master_kabur.docx');
        }elseif ($kondisi == "SUDAH TERBANG INTERMINATE") {
            $document = $PHPWord->loadTemplate('files/rekap/master_kabur-2.docx');
        }elseif ($kondisi == "DOKUMENT SIAP DIAMBIL") {
            $document = $PHPWord->loadTemplate('files/rekap/master_kabur-3.docx');
        }elseif ($kondisi == "AMBIL DOKUMENT") {
            $document = $PHPWord->loadTemplate('files/rekap/master_kabur-4.docx');
        }
        
        echo $tgl_start.' - '.$tgl_ending.' - '.$kondisi;
        
        if ($kondisi == "SUDAH TERBANG LALU KABUR") {
            $opsidata = "admin_keadaan_tki_pilihan.nama = 'Kabur' AND";
        }elseif ($kondisi == "SUDAH TERBANG INTERMINATE") {
            $opsidata = " admin_keadaan_tki_pilihan.nama  = 'Mengundurkan Diri' OR admin_keadaan_tki_pilihan.nama  = 'Interminate'  AND";
        }





        if ($kondisi != "AMBIL DOKUMENT" || $kondisi != "DOKUMENT SIAP DIAMBIL" ) {
            $data = $this->db->query("
            
            SELECT 
                personal.nama,
                admin_keadaan_tki.*,
                admin_keadaan_tki_pilihan.nama as keadaan_nama 
                FROM admin_keadaan_tki 
                JOIN admin_keadaan_tki_pilihan ON admin_keadaan_tki.keadaan_id=admin_keadaan_tki_pilihan.id
            JOIN personal ON admin_keadaan_tki.id_biodata = personal.id_biodata 
            WHERE ".$opsidata." DATE(admin_keadaan_tki.tanggal) BETWEEN '".$tgl_start."' AND '".$tgl_ending."'
            
            ")->result();
        }
        
        
        $data_no = array();
        $data_id = array();
        $data_nama = array();
        foreach ($data as $key => $value) {
            $data_no[] = $key+1;            
            $data_id[] = $value->id_biodata;            
            $data_nama[] = $value->nama;        
        }
        
        if ($kondisi == "SUDAH TERBANG LALU KABUR") {
            $tanggal_kabur = array();
            $tanggal_terbang = array();
            $nama_agen = array();
            foreach ($data_id as $one => $nn) {
                $cek = $this->db->query("SELECT * FROM admin_keadaan_tki WHERE keadaan_id = 1 AND id_biodata = '$nn'");
                $majikan = $this->db->query("SELECT tglberangkat FROM visa WHERE id_biodata = '$nn'");
                $kodeagen = $this->db->query("SELECT kode_agen FROM majikan WHERE id_biodata = '$nn'")->row()->kode_agen;
                $nama_agen[] = $this->db->query("SELECT nama FROM dataagen WHERE id_agen = '$kodeagen'")->row()->nama;
                if ($cek->num_rows() != 0) {
                    $tanggal_kabur[] = $cek->row()->tanggal;
                }else{
                    $tanggal_kabur[] = "";
                }
                if ($majikan->num_rows() != 0) {
                    $tanggal_terbang[] = $majikan->row()->tglberangkat;
                }else{
                    $tanggal_terbang[] = "";
                }
            }
            
            // cloning row table
            $doklain = array(
                'no' => $data_no,
                'id' => $data_id,
                'nama' => $data_nama,
                'tanggal_berangkat' => $tanggal_terbang,
                'tanggal_kabur' => $tanggal_kabur,
                'agen'=> $nama_agen,
            );
            $document->cloneRow('data', $doklain);
            
        }elseif ($kondisi == "SUDAH TERBANG INTERMINATE") {
            $tanggal_kabur = array();
            $tanggal_terbang = array();
            foreach ($data_id as $one => $nn) {
                $cek = $this->db->query("SELECT * FROM admin_keadaan_tki WHERE keadaan_id = 3 AND id_biodata = '$nn'");
                $majikan = $this->db->query("SELECT tglberangkat FROM visa WHERE id_biodata = '$nn'");
                
                if ($cek->num_rows() != 0) {
                    $tanggal_kabur[] = $cek->row()->tanggal;
                }else{
                    $tanggal_kabur[] = "";
                }
                
                if ($majikan->num_rows() != 0) {
                    $tanggal_terbang[] = $majikan->row()->tglberangkat;
                }else{
                    $tanggal_terbang[] = "";
                }
                
            }
            
            // cloning row table
            $doklain = array(
                'no' => $data_no,
                'id' => $data_id,
                'nama' => $data_nama,
                'tanggal_berangkat' => $tanggal_terbang,
                'tanggal_kabur' => $tanggal_kabur,
            );

            $document->cloneRow('data', $doklain);
        }elseif ($kondisi == "DOKUMENT SIAP DIAMBIL") {
            
            $dataready = $this->db->query("SELECT * FROM infoberkas WHERE tgl_dok_siap IS NOT NULL")->result();

            $no = array();
            $id_biodata = array();
            $nama_tki = array();
            $tanggal_info = array();
            $tanggal_dok_siap = array();
            $hp_tki = array();
            $rak = array();

            foreach ($dataready as $thekey => $nilai) {
                if ($nilai->info_berkas != "") {
                    $no[] = $thekey+1;
                    $id_biodata[] = $nilai->id_biodata;
                    $datapersonal = $this->db->query("SELECT * FROM personal WHERE id_biodata = '".$nilai->id_biodata."'")->row();
                    $nama_tki[] = $datapersonal->nama;
                    $tanggal_info[] = $nilai->info_berkas;
                    $tanggal_dok_siap[] = $nilai->tgl_dok_siap;
                    $hp_tki[] = $nilai->hptki_berkas;
                    $rak[] = $nilai->rak_berkas;
                }
            }

            $doklain = array(
                'no' => $no,
                'id' => $id_biodata,
                'nama' => $nama_tki,
                'info' => $tanggal_info,
                'doksiap' => $tanggal_dok_siap,
                'nohptki' => $hp_tki,
                'rak' => $rak,
            );

            $document->cloneRow('data', $doklain);
        
        }elseif ($kondisi == "AMBIL DOKUMENT") {
            $dataready = $this->db->query("SELECT * FROM ambilberkas WHERE tgl_ambil_dok IS NOT NULL AND DATE(tgl_ambil_dok) BETWEEN '$tgl_start' AND '$tgl_ending'")->result();

            $nodok = array();
            $id_biodata = array();
            $nama_tki = array();
            $tanggal_ambili_dok = array();
            $nama_pengambil = array();
            $hubungan_pengambil = array();
            $no_telphone = array();
            $nama_serah = array();
            $tanggal_terbang = array();
            $berkasambil = array();
            foreach ($dataready as $numberdok => $nilai) {
                    if ($nilai->tgl_ambil_dok != "") {
                        $majikan = $this->db->query("SELECT tglberangkat FROM visa WHERE id_biodata = '".$nilai->id_biodata."'");
                        $nodok[] = $numberdok+1;
                        $id_biodata[] = $nilai->id_biodata;
                        $datapersonal = $this->db->query("SELECT * FROM personal WHERE id_biodata = '".$nilai->id_biodata."'")->row();
                        $nama_tki[] = $datapersonal->nama;
                        $tanggal_ambili_dok[] = $nilai->tgl_ambil_dok;
                        $nama_pengambil[] = $nilai->nama_ambil_dok;
                        $hubungan_pengambil[] = $nilai->hub_ambil_dok;
                        $no_telphone[] = $nilai->tel_ambil_dok;
                        $nama_serah[] = $nilai->nama_serah_dok;
                        $berkasambil[] = $nilai->dokdiserahkan;
                        if ($majikan->num_rows() != 0) {
                            $tanggal_terbang[] = $majikan->row()->tglberangkat;
                        }else{
                            $tanggal_terbang[] = "";
                        }
                    }
            }

            $doklain = array(
                'no' => $nodok,
                'id' => $id_biodata,
                'nama' => $nama_tki,
                'tanggal_ambil' => $tanggal_ambili_dok,
                'nama_ambil' => $nama_pengambil,
                'hub_ambil' => $hubungan_pengambil,
                'notel_ambil' => $no_telphone,
                'nama_serah' => $nama_serah,
                'tanggal_terbang' => $tanggal_terbang,
                'berkasambil' => $berkasambil,
            );

            $document->cloneRow('data', $doklain);
        }

        $document->setValue('tanggalstart', $tgl_start);
        $document->setValue('tanggalend', $tgl_ending);

        //  ------------------------------------------- save file ------------------------------------------------------------------//
        $tmp_file = 'files/rekap/interminate_kabur_ambil.docx';
        $document->save($tmp_file);

// ------------------------------------------- download file --------------------------------------------------------------//

        redirect('rekap_kabur_interminate_ambil_dok/print_result/');

    }

    public function print_result()
    {
        require_once 'gugus/phpword/PHPWord.php';
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('files/rekap/interminate_kabur_ambil.docx');

      

        $filename = 'files/rekap/interminate_kabur_ambil_result.docx';
        $isinya=$document->save($filename);
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename= rekapan.docx');
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
