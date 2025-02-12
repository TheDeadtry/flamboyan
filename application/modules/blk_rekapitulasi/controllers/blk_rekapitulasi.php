<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_rekapitulasi extends MX_Controller{
	
	private $table1 = "blk_rekapitulasi_kb";
	
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');
	}

	function kb() {
		$pil_tkw = $this->session->userdata('kb_search_tkw');

		$data['u_kb_pil_id'] = $pil_tkw;

		$ambil_data_tkw_kb 			= "SELECT distinct(nodaftar) as id FROM blk_kb ORDER BY nodaftar";
		$data['tampil_data_tkw_kb'] = $this->M_session->select($ambil_data_tkw_kb);

		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "kb";

		$this->load->library('Createtable');	
		$this->createtable->location('blk_rekapitulasi/halo');
		$this->createtable->table_name('tableku');
		$this->createtable->create_row(['#', 'Tanggal Start', 'Tanggal Ending', 'tanggal input', 'tanggal_update','Action']);
		$data['datatable'] = $this->createtable->create();
		
		echo Modules::run('template/blk_template',$data);
	}

	public function kbeditdata()
	{
		$id = $_POST['id'];
		$data = $this->db->query("SELECt * FROM ".$this->table1." WHERE id = '".$id."'")->row();
		$arr = array(
			"tanggal_start_kb" => $data->tanggal_start_kb,
			"tanggal_ending_kb" => $data->tanggal_ending_kb
		);

		echo json_encode($arr);
	}
	
	public function halo($action = 'show', $keyword = '')
    {
		$this->load->library('Datatablegugus');	
        // default order for get order from datatable 
        if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;
        $this->datatablegugus->action($action);
        $this->datatablegugus->set_table($this->table1);
        if($action == 'show'){
			$this->datatablegugus->edit_show(true);
			$this->datatablegugus->location_view('blk_rekapitulasi/print_rekapitulasi_blk_kb');
            $this->datatablegugus->set_draw($_POST['draw']);
            $this->datatablegugus->set_search($_POST['search']['value'], ['tanggal_start_kb', 'tanggal_ending_kb']);
            $this->datatablegugus->set_order_data(['id', 'tanggal_start_kb', 'tanggal_ending_kb', 'tanggal_input', 'tanggal_update'], $setorder);
            $this->datatablegugus->set_limit($_POST['start'], $_POST['length']);
            $this->datatablegugus->set_table_show('id', ['tanggal_start_kb', 'tanggal_ending_kb', 'tanggal_input', 'tanggal_update']);
        }elseif($action == 'delete'){
            $query_del = $this->datatablegugus->set_delete_query('id = '.$_POST['id']);
            $this->datatablegugus->delete_data($query_del);
        }elseif($action == 'update'){
            $this->datatablegugus->get_key_update('id' ,$keyword);
            return view('update', ['data'=> $this->datatablegugus->get_data_update()]);
        }
        $this->datatablegugus->release();
	}
	
	public function tambah_rekapan_kb()
	{
		$tanggal_start_kb = $_POST['tanggal_start_kb'];
		$tanggal_ending_kb = $_POST['tanggal_ending_kb'];
		$tanggal_input = date('Y-m-d H:i:s');
		$tanggal_update = date('Y-m-d H:i:s');
		$simpan = $this->db->query("INSERT INTO blk_rekapitulasi_kb (
			tanggal_start_kb
			,tanggal_ending_kb
			,tanggal_input
			,tanggal_update
			) VALUES (
				'$tanggal_start_kb'
				,'$tanggal_ending_kb'
				,'$tanggal_input'
				,'$tanggal_update'
			)");

		if ($simpan) {
			echo "disimpan";
		}
	}


	public function print_rekapitulasi_blk_kb($id)
	{

		$datarekap = $this->db->query("SELECT * FROM blk_rekapitulasi_kb WHERE id = '$id'")->row();

		$ambil_data_kb = $this->db->query("SELECT * FROM blk_kb WHERE tgl_suntik BETWEEN '".$datarekap->tanggal_start_kb."' AND '".$datarekap->tanggal_ending_kb."'")->result();
		$no = array();
		$nama = array();
		$jenis = array();
		$suntik = array();
		$kadaluarsa = array();

		foreach ($ambil_data_kb as $key => $value) {
			$no[] = $key + 1;
			$personal = $this->db->query("SELECT * FROM personalblk WHERE nodaftar = '".$value->nodaftar."'")->row();
			$nama[] = $value->nodaftar.' - '.$personal->nama;
			$jeniskbnama = $this->db->query("SELECT * FROM blk_jenis_kb WHERE id_jenis_kb = '".$value->id_jenis_kb."'")->row();
			$jenis[] = $jeniskbnama->ket;
			$suntik[] = $value->tgl_suntik;
			$kadaluarsa[] = $value->masa_kadaluwarsa;
		}

		
		header ("Content-type: text/html; charset=utf-8");
        require_once 'PHPWord/PHPWord.php';
        $PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/blk_kb/blk_kb.docx');
		
		$doklain = array(
			'no' => $no,
			'nama' => $nama,
			'jenis' => $jenis,
			'suntik' => $suntik,
			'kadaluarsa' => $kadaluarsa 
		);

		$document->cloneRow('data', $doklain);
		
		$tmp_file = 'files/blk_kb/blk_kb_result.docx';
        $document->save($tmp_file);
        redirect('blk_rekapitulasi/hasil_kb/');
	}


    function hasil_kb(){
		require_once 'gugus/phpword/PHPWord.php';
        $PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/blk_kb/blk_kb_result.docx');

		$filename = 'files/blk_kb/blk_kb_result_ok.docx';
        $isinya=$document->save($filename);
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename= rekapitulasi_kb.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
            
        flush();
        readfile($isinya);
        unlink($isinya); // deletes the temporary file
        exit;
	}

	public function update_rekapan_kb()
	{
		$id = $_POST['id'];
		$tanggal_start_kb = $_POST['tanggal_start_kb'];
		$tanggal_ending_kb = $_POST['tanggal_ending_kb'];
		$tanggal_update = date('Y-m-d H:i:s');
		$simpan = $this->db->query("UPDATE 
			blk_rekapitulasi_kb 
			SET 
			tanggal_start_kb = '$tanggal_start_kb'
			,tanggal_ending_kb = '$tanggal_ending_kb'
			,tanggal_update = '$tanggal_update'
			WHERE id = $id
			");

		if ($simpan) {
			echo "disimpan";
		}
	}


	function kb_search_tkw($id_tkw) {
		$this->session->set_userdata('kb_search_tkw', $id_tkw);

		redirect('blk_rekapitulasi/kb');
	}

	function kb_show_data($pil_tkw=NULL) {
		if ($pil_tkw != NULL) {
			$where = "WHERE  nodaftar='$pil_tkw'";
		} else {
			$where = "";
		}

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		$sql = "SELECT distinct
		    	nodaftar,
		    	id_instruktur as id
		    	FROM blk_kb 
		    	$where 
		    	order by nodaftar ASC 
		    	$limit";

	 	$get_table 	= $this->M_session->select($sql);
		

		$data2 = array();
		$no=intval($_POST['start']);
		foreach ($get_table as $kp) {
			$no++;
			$sql2 		= "SELECT count(*) as total FROM blk_kb where nodaftar='".$kp->nodaftar."'";
			$total_kb 	= $this->M_session->select_row($sql2)->total;

			$sql3 		= "SELECT * 
							FROM blk_kb 
							where nodaftar='".$kp->nodaftar."'";
			$queryzz 	= $this->M_session->select($sql3);

            $ubah_tipe = substr($kp->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                $ambil_nama_taiwan = $this->M_session->select_row("SELECT nama FROM personal WHERE id_biodata='$kp->nodaftar'");
                $nama_tkw_kb = $ambil_nama_taiwan->nama;
            } else {
                $ambil_nama_nontaiwan = $this->M_session->select_row("SELECT nama FROM personalblk WHERE nodaftar='$kp->nodaftar'");
                $nama_tkw_kb = "";
	            if ($ambil_nama_nontaiwan != NULL) {
	                $nama_tkw_kb = $ambil_nama_nontaiwan->nama;
	            }
            }

			$no_x = 1;
			$row_jenis_kb 	= "";
			$row_tgl_suntik = "";
			$row_kb_suntik 	= "";
			$row_nama_ins 	= "";
			$row_ket_kb 	= "";
			foreach($queryzz as $r) {

				$ambil_jenis_kb 		= "SELECT kode_jenis_kb, ket FROM blk_jenis_kb where id_jenis_kb='".$r->id_jenis_kb."'";
				$ambil_tgl_suntik 		= "SELECT tgl_suntik, masa_kadaluwarsa FROM blk_kb where id_kb='".$r->id_kb."'";
				$ambil_kb_suntik 		= "SELECT kb_suntik FROM blk_kb where id_kb='".$r->id_kb."'";
				$ambil_nama_ins 		= "SELECT nama FROM blk_instruktur where id_instruktur='".$r->id_instruktur."'";
				$ambil_ket_kb   		= "SELECT ket FROM blk_kb where id_kb='".$r->id_kb."'";

				$query1 	= $this->M_session->select_row($ambil_jenis_kb);
				$query2 	= $this->M_session->select_row($ambil_tgl_suntik);
				$query3 	= $this->M_session->select_row($ambil_kb_suntik);
				$query4 	= $this->M_session->select_row($ambil_nama_ins);
				$query5 	= $this->M_session->select_row($ambil_ket_kb);

				$q1="";
				$q2="";
				$q3="";
				$q4="";
				$q5="";
				$q6="";
				$q7="";
				if ($query1->kode_jenis_kb != NULL) {
					$q1 = $query1->kode_jenis_kb;
				} else {
					$q1 = '-';
				}
				if ($query1->ket != NULL) {
					$q2 = $query1->ket;
				} else {
					$q2 = '-';
				}
				if ($query2->tgl_suntik != NULL) {
					$q3 = $query2->tgl_suntik;
				} else {
					$q3 = '-';
				}
				if ($query2->masa_kadaluwarsa != NULL) {
					$q4 = $query2->masa_kadaluwarsa;
				} else {
					$q4 = '-';
				}
				if ($query3->kb_suntik != NULL) {
					$q5 = $query3->kb_suntik;
				} else {
					$q5 = '-';
				}
				if ($query4->nama != NULL) {
					$q6 = $query4->nama;
				} else {
					$q6 = '-';
				}
				if ($query5->ket != NULL) {
					$q7 = $query5->ket;
				} else {
					$q7 = '-';
				}

				if ($total_kb != $no_x) {
					$style = "border-bottom:1px solid black";
				} else {
					$style = "";
				}

				$row_jenis_kb 	= $row_jenis_kb.'<div style="'.$style.'">'.$q1.'  '.$q2.'</div>';
				$row_tgl_suntik = $row_tgl_suntik.'<div style="'.$style.'">'.$q3.' ~ '.$q4.'</div>';
				$row_kb_suntik 	= $row_kb_suntik.'<div style="'.$style.'">'.$q5.'</div>';
				$row_nama_ins 	= $row_nama_ins.'<div style="'.$style.'">'.$q6.'</div>';
				$row_ket_kb 	= $row_ket_kb.'<div style="'.$style.'">'.$q7.'</div>';
			$no_x++;
			}

			array_push($data2,
				array(
					$no,
					'<a href="'.site_url('blk_personaldetail/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-success">Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/pembinaan/'.$kp->nodaftar.'/kb').'" target="_blank"><span class="label label-primary">Pembinaan</span></a>'.' '.
					'<a href="'.site_url('blk_pelatihan/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-danger">Pelatihan</span></a>',
					$kp->nodaftar,
					$nama_tkw_kb,
					$total_kb,
					$row_jenis_kb,
					$row_tgl_suntik,
					$row_kb_suntik,
					$row_nama_ins,
					$row_ket_kb
				)
			);
		}

		$sql1998 = "SELECT distinct
	    	count(distinct(nodaftar)) as total 
	    	FROM blk_kb  
	    	$where 
	    	order by nodaftar ASC";

	    $sql1999 = "SELECT distinct
	    	count(distinct(nodaftar)) as total 
	    	FROM blk_kb ";

		
		$recordsFiltered 	= $this->M_session->select_row($sql1998)->total;
		$recordsTotal 		= $this->M_session->select_row($sql1999)->total;

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

	//================================ IJIN KELUAR ==========================================//
	function ik() {
		$pil_tki= $this->session->userdata('ik_search_tki');

		$data['u_ik_pil_id'] = $pil_tki;

		$ambil_data_tki 			= "SELECT distinct(nodaftar) as id FROM blk_izin_keluar ORDER BY nodaftar";
		$data['tampil_data_tki'] = $this->M_session->select($ambil_data_tki);

		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "ik";
		echo Modules::run('template/blk_template',$data);
	}

	function ik_search_tki($id_tki) {
		$this->session->set_userdata('ik_search_tki', $id_tki);

		redirect('blk_rekapitulasi/ik');
	}

	function ik_show_data($pil_tki=NULL) {
		if ($pil_tki != NULL) {
			$where = "WHERE  nodaftar='$pil_tki'";
		} else {
			$where = "";
		}

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		$sql = "SELECT distinct
		    	nodaftar
		    	FROM blk_izin_keluar
		    	$where 
		    	order by nodaftar ASC 
		    	$limit";

	 	$get_table 	= $this->M_session->select($sql);
		

		$data2 = array();
		$no=intval($_POST['start']);
		foreach ($get_table as $kp) {
			$no++;
			$sql2 		= "SELECT count(*) as total FROM blk_izin_keluar where nodaftar='".$kp->nodaftar."'";
			$total_ik 	= $this->M_session->select_row($sql2)->total;

			$sql3 		= "SELECT * 
							FROM blk_izin_keluar 
							where nodaftar='".$kp->nodaftar."'";
			$queryzz 	= $this->M_session->select($sql3);

            $ubah_tipe = substr($kp->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                $ambil_nama_taiwan = $this->M_session->select_row("SELECT nama FROM personal WHERE id_biodata='$kp->nodaftar'");
                $nama_tki = $ambil_nama_taiwan->nama;
            } else {
                $ambil_nama_nontaiwan = $this->M_session->select_row("SELECT nama FROM personalblk WHERE nodaftar='$kp->nodaftar'");
                $nama_tki = "";
	            if ($ambil_nama_nontaiwan != NULL) {
	                $nama_tki = $ambil_nama_nontaiwan->nama;
	            }
            }

			$no_x = 1;
			$row_tgl 		= "";
			$row_jamkeluar 	= "";
			$row_jamkembali	= "";
			$row_terlambat 	= "";
			$row_keperluan	= "";
			$row_blk 		= "";
			$row_ket 		= "";
			foreach($queryzz as $r) {

				$ambil_tgl 			= "SELECT tgl, jam_keluar, jam_kembali, terlambat, ket FROM blk_izin_keluar where id_izin_keluar='".$r->id_izin_keluar."'";
				$ambil_blk 			= "SELECT kode_instruktur, nama FROM blk_instruktur where id_instruktur='".$r->blk_pemberi_izin."'";
				$ambil_keperluan 	= "SELECT kode_izin_keperluan, ket FROM blk_izin_keperluan where id_izin_keperluan='".$r->keperluan."'";
				

				$query1 	= $this->M_session->select_row($ambil_tgl);
				$query2 	= $this->M_session->select_row($ambil_blk);
				$query3 	= $this->M_session->select_row($ambil_keperluan);

				$q1="";
				$q2="";
				$q3="";
				$q4="";
				$q5="";
				$q6="";
				$q7="";
				$q8="";
				$q9="";
				if ($query1->tgl != NULL) {
					$q1 = $query1->tgl;
				} else {
					$q1 = '-';
				}
				if ($query1->jam_keluar != NULL) {
					$q2 = $query1->jam_keluar;
				} else {
					$q2 = '-';
				}
				if ($query1->jam_kembali != NULL) {
					$q3 = $query1->jam_kembali;
				} else {
					$q3 = '-';
				}
				if ($query1->terlambat != NULL) {
					$q4 = $query1->terlambat;
				} else {
					$q4 = '-';
				}
				if ($query1->ket != NULL) {
					$q5 = $query1->ket;
				} else {
					$q5 = '-';
				}

				if ($query2->kode_instruktur != NULL) {
					$q6 = $query2->kode_instruktur;
				} else {
					$q6 = '-';
				}
				if ($query2->nama != NULL) {
					$q7 = $query2->nama;
				} else {
					$q7 = '-';
				}

				if ($query3->kode_izin_keperluan != NULL) {
					$q8 = $query3->kode_izin_keperluan;
				} else {
					$q8 = '-';
				}
				if ($query3->ket != NULL) {
					$q9 = $query3->ket;
				} else {
					$q9 = '-';
				}

				if ($total_ik != $no_x) {
					$style = "border-bottom:1px solid black";
				} else {
					$style = "";
				}

				$row_tgl 		= $row_tgl.'<div style="'.$style.'">'.$q1.'</div>';
				$row_jamkeluar 	= $row_jamkeluar.'<div style="'.$style.'">'.$q2.'</div>';
				$row_jamkembali = $row_jamkembali.'<div style="'.$style.'">'.$q3.'</div>';
				$row_terlambat 	= $row_terlambat.'<div style="'.$style.'">'.$q4.'</div>';
				$row_blk 		= $row_blk.'<div style="'.$style.'">'.$q6.' - '.$q7.'</div>';
				$row_ket 		= $row_ket.'<div style="'.$style.'">'.$q5.'</div>';
				$row_keperluan	= $row_keperluan.'<div style="'.$style.'">'.$q8.' - '.$q9.'</div>';
			$no_x++;
			}

			array_push($data2,
				array(
					$no,
					'<a href="'.site_url('blk_personaldetail/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-success">Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/pembinaan/'.$kp->nodaftar.'/ik').'" target="_blank"><span class="label label-primary">Pembinaan</span></a>'.' '.
					'<a href="'.site_url('blk_pelatihan/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-danger">Pelatihan</span></a>',
					$kp->nodaftar,
					$nama_tki,
					$total_ik,
					$row_tgl,
					$row_jamkeluar,
					$row_jamkembali,
					$row_terlambat,
					$row_keperluan,
					$row_blk,
					$row_ket
				)
			);
		}

		$sql1998 = "SELECT distinct
	    	count(distinct(a.nodaftar)) as total 
	    	FROM blk_izin_keluar a 
	    	JOIN personal b
	    	ON a.nodaftar=b.id_biodata  
	    	$where 
	    	order by nodaftar ASC";

	    $sql1999 = "SELECT distinct
	    	count(distinct(a.nodaftar)) as total 
	    	FROM blk_izin_keluar a 
	    	JOIN personal b
	    	ON a.nodaftar=b.id_biodata";

		
		$recordsFiltered 	= $this->M_session->select_row($sql1998)->total;
		$recordsTotal 		= $this->M_session->select_row($sql1999)->total;

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

	//============================================================
	function ith() {
		$pil_tki = $this->session->userdata('ith_search_tki');

		$data['u_ith_pil_id'] = $pil_tki;

		$ambil_data_tki 			= "SELECT distinct(nodaftar) as id FROM blk_izin_tdk_hadir ORDER BY nodaftar";
		$data['tampil_data_tki'] = $this->M_session->select($ambil_data_tki);

		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "ith";
		echo Modules::run('template/blk_template',$data);
	}

	function ith_search_tki($id_tki) {
		$this->session->set_userdata('ith_search_tki', $id_tki);

		redirect('blk_rekapitulasi/ith');
	}

	function ith_show_data($pil_tki=NULL) {
		if ($pil_tki != NULL) {
			$where = "WHERE  nodaftar='$pil_tki'";
		} else {
			$where = "";
		}

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		$sql = "SELECT distinct
		    	nodaftar
		    	FROM blk_izin_tdk_hadir
		    	$where 
		    	order by nodaftar ASC 
		    	$limit";

	 	$get_table 	= $this->M_session->select($sql);
		

		$data2 = array();
		$no=intval($_POST['start']);
		foreach ($get_table as $kp) {
			$no++;
			$sql2 		= "SELECT count(*) as total FROM blk_izin_tdk_hadir where nodaftar='".$kp->nodaftar."'";
			$total_ith 	= $this->M_session->select_row($sql2)->total;

			$sql3 		= "SELECT * 
							FROM blk_izin_tdk_hadir 
							where nodaftar='".$kp->nodaftar."'";
			$queryzz 	= $this->M_session->select($sql3);

            $ubah_tipe = substr($kp->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                $ambil_nama_taiwan = $this->M_session->select_row("SELECT nama FROM personal WHERE id_biodata='$kp->nodaftar'");
                $nama_tki = $ambil_nama_taiwan->nama;
            } else {
                $ambil_nama_nontaiwan = $this->M_session->select_row("SELECT nama FROM personalblk WHERE nodaftar='$kp->nodaftar'");
                $nama_tki = "";
	            if ($ambil_nama_nontaiwan != NULL) {
	                $nama_tki = $ambil_nama_nontaiwan->nama;
	            }
            }

			$no_x = 1;
			$row_keluar 	= "";
			$row_kembali 	= "";
			$row_keperluan 	= "";
			$row_mark 	 	= "";
			$row_adm 	 	= "";
			$row_blk 	 	= "";
			foreach($queryzz as $r) {

				$ambil_keluar 		= "SELECT tglkeluar, jamkeluar FROM blk_izin_tdk_hadir where id_izin_tdk_hadir='".$r->id_izin_tdk_hadir."'";
				$ambil_kembali 		= "SELECT tglkembali, jamkembali FROM blk_izin_tdk_hadir where id_izin_tdk_hadir='".$r->id_izin_tdk_hadir."'";
				$ambil_keperluan 	= "SELECT kode_izin_keperluan, ket FROM blk_izin_keperluan where id_izin_keperluan='".$r->keperluan."'";
				$ambil_mark 		= "SELECT kode_marketing, nama FROM blk_marketing where id_marketing='".$r->mark."'";
				$ambil_adm   		= "SELECT kode_adm_kantor, nama FROM blk_adm_kantor where id_adm_kantor='".$r->adm."'";
				$ambil_blk 			= "SELECT kode_instruktur, nama FROM blk_instruktur where id_instruktur='".$r->blk."'";

				$query1 	= $this->M_session->select_row($ambil_keluar);
				$query2 	= $this->M_session->select_row($ambil_kembali);
				$query3 	= $this->M_session->select_row($ambil_keperluan);
				$query4 	= $this->M_session->select_row($ambil_mark);
				$query5 	= $this->M_session->select_row($ambil_adm);
				$query6 	= $this->M_session->select_row($ambil_blk);

				$q1  = "";
				$q2  = "";
				$q3  = "";
				$q4  = "";
				$q5  = "";
				$q6  = "";
				$q7  = "";
				$q8  = "";
				$q9  = "";
				$q10 = "";
				$q11 = "";
				$q12 = "";
				if ($query1->tglkeluar != NULL) {
					$q1 = $query1->tglkeluar;
				} else {
					$q1 = '-';
				}
				if ($query1->jamkeluar != NULL) {
					$q2 = $query1->jamkeluar;
				} else {
					$q2 = '-';
				}
				if ($query2->tglkembali != NULL) {
					$q3 = $query2->tglkembali;
				} else {
					$q3 = '-';
				}
				if ($query2->jamkembali != NULL) {
					$q4 = $query2->jamkembali;
				} else {
					$q4 = '-';
				}
				if ($query3->kode_izin_keperluan != NULL) {
					$q5 = $query3->kode_izin_keperluan;
				} else {
					$q5 = '-';
				}
				if ($query3->ket != NULL) {
					$q6 = $query3->ket;
				} else {
					$q6 = '-';
				}
				if ($query4->kode_marketing != NULL) {
					$q7 = $query4->kode_marketing;
				} else {
					$q7 = '-';
				}
				if ($query4->nama != NULL) {
					$q8 = $query4->nama;
				} else {
					$q8 = '-';
				}
				if ($query5->kode_adm_kantor != NULL) {
					$q9 = $query5->kode_adm_kantor;
				} else {
					$q9 = '-';
				}
				if ($query5->nama != NULL) {
					$q10 = $query5->nama;
				} else {
					$q10 = '-';
				}
				if ($query6->kode_instruktur != NULL) {
					$q11 = $query6->kode_instruktur;
				} else {
					$q11 = '-';
				}
				if ($query6->nama != NULL) {
					$q12 = $query6->nama;
				} else {
					$q12 = '-';
				}


				if ($total_ith != $no_x) {
					$style = "border-bottom:1px solid black";
				} else {
					$style = "";
				}

				$row_keluar 	= $row_keluar.'<div style="'.$style.'">'.$q1.'  '.$q2.'</div>';
				$row_kembali 	= $row_kembali.'<div style="'.$style.'">'.$q3.'  '.$q4.'</div>';
				$row_keperluan 	= $row_keperluan.'<div style="'.$style.'">'.$q5.'  '.$q6.'</div>';
				$row_mark 	 	= $row_mark.'<div style="'.$style.'">'.$q7.'  '.$q8.'</div>';
				$row_adm 	 	= $row_adm.'<div style="'.$style.'">'.$q9.'  '.$q10.'</div>';
				$row_blk 	 	= $row_blk.'<div style="'.$style.'">'.$q11.'  '.$q12.'</div>';
			$no_x++;
			}

			array_push($data2,
				array(
					$no,
					'<a href="'.site_url('blk_personaldetail/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-success">Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/pembinaan/'.$kp->nodaftar.'/ith').'" target="_blank"><span class="label label-primary">Pembinaan</span></a>'.' '.
					'<a href="'.site_url('blk_pelatihan/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-danger">Pelatihan</span></a>',
					$kp->nodaftar,
					$nama_tki,
					$total_ith,
					$row_keluar,
					$row_kembali,
					$row_keperluan,
					$row_mark,
					$row_adm,
					$row_blk
				)
			);
		}

		$sql1998 = "SELECT distinct
	    	count(distinct(nodaftar)) as total 
	    	FROM blk_izin_tdk_hadir 
	    	$where 
	    	order by nodaftar ASC";

	    $sql1999 = "SELECT distinct
	    	count(distinct(nodaftar)) as total 
	    	FROM blk_izin_tdk_hadir";

		
		$recordsFiltered 	= $this->M_session->select_row($sql1998)->total;
		$recordsTotal 		= $this->M_session->select_row($sql1999)->total;

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

	//============================================================
	function ip() {
		$pil_tki = $this->session->userdata('ip_search_tki');

		$data['u_ip_pil_id'] = $pil_tki;

		$ambil_data_tki 			= "SELECT distinct(nodaftar) as id FROM blk_izin_pulang ORDER BY nodaftar";
		$data['tampil_data_tki'] = $this->M_session->select($ambil_data_tki);

		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "ip";
		echo Modules::run('template/blk_template',$data);
	}

	function ip_search_tki($id_tki) {
		$this->session->set_userdata('ip_search_tki', $id_tki);

		redirect('blk_rekapitulasi/ip');
	}

	function ip_show_data($pil_tki=NULL) {
		if ($pil_tki != NULL) {
			$where = "AND nodaftar='$pil_tki'";
		} else {
			$where = "";
		}

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		$sql = "SELECT
		    	nodaftar
		    	FROM blk_izin_pulang
		    	where 1=1 $where 
				group by nodaftar
		    	order by tglkeluar DESC, nodaftar DESC
		    	$limit";

	 	$get_table 	= $this->M_session->select($sql);
		

		$data2 = array();
		$no=intval($_POST['start']);
		foreach ($get_table as $kp) {
			$no++;
			$sql2 		= "SELECT count(*) as total FROM blk_izin_pulang where nodaftar='".$kp->nodaftar."'";
			$total_ip 	= $this->M_session->select_row($sql2)->total;

			$sql3 		= "SELECT *
							FROM blk_izin_pulang 
							where nodaftar='".$kp->nodaftar."'";
			$queryzz 	= $this->M_session->select($sql3);

            $ubah_tipe = substr($kp->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                $ambil_nama_taiwan = $this->M_session->select_row("SELECT nama FROM personal WHERE id_biodata='$kp->nodaftar'");
                $nama_tki = $ambil_nama_taiwan->nama;
            } else {
                $ambil_nama_nontaiwan = $this->M_session->select_row("SELECT nama FROM personalblk WHERE nodaftar='$kp->nodaftar'");
                $nama_tki = "";
	            if ($ambil_nama_nontaiwan != NULL) {
	                $nama_tki = $ambil_nama_nontaiwan->nama;
	            }
            }

			$no_x = 1;
			$row_keluar 	= "";
			$row_kembali 	= "";
			$row_actual 	= "";
			$row_akmulasi 	= "";
			$row_keperluan 	= "";
			$row_mark 	 	= "";
			$row_adm 	 	= "";
			$row_blk 	 	= "";
			foreach($queryzz as $r) {
				$ambil_keluar 		= "SELECT tglkeluar, jamkeluar FROM blk_izin_pulang where id_izin_pulang='".$r->id_izin_pulang."'";
				$ambil_kembali 		= "SELECT tglkembali, jamkembali FROM blk_izin_pulang  where id_izin_pulang='".$r->id_izin_pulang."'";
				$ambil_actual  	 	= "SELECT tglactual, jamactual FROM blk_izin_pulang  where id_izin_pulang='".$r->id_izin_pulang."'";
				//$ambil_akumulasi 	= "";
				$ambil_keperluan 	= "SELECT kode_izin_keperluan, ket FROM blk_izin_keperluan where id_izin_keperluan='".$r->keperluan."'";
				$ambil_mark 		= "SELECT kode_marketing, nama FROM blk_marketing where id_marketing='".$r->mark."'";
				$ambil_adm   		= "SELECT kode_adm_kantor, nama FROM blk_adm_kantor where id_adm_kantor='".$r->adm."'";
				$ambil_blk 			= "SELECT kode_instruktur, nama FROM blk_instruktur where id_instruktur='".$r->blk."'";
				$query1 	= $this->M_session->select_row($ambil_keluar);
				$query2 	= $this->M_session->select_row($ambil_kembali);
				$query3 	= $this->M_session->select_row($ambil_actual);
				//$query4 	= $this->M_session->select_row($ambil_akumulasi);
				$query5 	= $this->M_session->select_row($ambil_mark);
				$query6 	= $this->M_session->select_row($ambil_adm);
				$query7 	= $this->M_session->select_row($ambil_blk);
				$query8 	= $this->M_session->select_row($ambil_keperluan);

				$q1  = "";
				$q2  = "";
				$q3  = "";
				$q4  = "";
				$q5  = "";
				$q6  = "";
				//$q7  = "";
				$q8  = "";
				$q9  = "";
				$q10 = "";
				$q11 = "";
				$q12 = "";
				$q13 = "";
				$q14 = "";
				$q15 = "";
				if ($query1->tglkeluar != NULL) {
					$q1 = $query1->tglkeluar;
				} else {
					$q1 = '-';
				}
				if ($query1->jamkeluar != NULL) {
					$q2 = $query1->jamkeluar;
				} else {
					$q2 = '-';
				}
				if ($query2->tglkembali != NULL) {
					$q3 = $query2->tglkembali;
				} else {
					$q3 = '-';
				}
				if ($query2->jamkembali != NULL) {
					$q4 = $query2->jamkembali;
				} else {
					$q4 = '-';
				}
				if ($query3->tglactual != NULL) {
					$q5 = $query3->tglactual;
				} else {
					$q5 = '-';
				}
				if ($query3->jamactual != NULL) {
					$q6 = $query3->jamactual;
				} else {
					$q6 = '-';
				}
				/*
				if ($query4->kode_marketing != NULL) {
					$q7 = $query4->kode_marketing;
				} else {
					$q7 = '-';
				}*/

				if ($query5->kode_marketing != NULL) {
					$q8 = $query5->kode_marketing;
				} else {
					$q8 = '-';
				}
				if ($query5->nama != NULL) {
					$q9 = $query5->nama;
				} else {
					$q9 = '-';
				}
				if ($query6->kode_adm_kantor != NULL) {
					$q10 = $query6->kode_adm_kantor;
				} else {
					$q10  = '-';
				}
				if ($query6->nama != NULL) {
					$q11 = $query6->nama;
				} else {
					$q11 = '-';
				}
				if ($query7->kode_instruktur != NULL) {
					$q12 = $query7->kode_instruktur;
				} else {
					$q12 = '-';
				}
				if ($query7->nama != NULL) {
					$q13 = $query7->nama;
				} else {
					$q13 = '-';
				}

				if ($query8->kode_izin_keperluan != NULL) {
					$q14 = $query8->kode_izin_keperluan;
				} else {
					$q14 = '-';
				}
				if ($query8->ket != NULL) {
					$q15 = $query8->ket;
				} else {
					$q15 = '-';
				}


				if ($total_ip != $no_x) {
					$style = "border-bottom:1px solid black";
				} else {
					$style = "";
				}

				$row_keluar 	= $row_keluar.'<div style="'.$style.'">'.$q1.'  '.$q2.'</div>';
				$row_kembali 	= $row_kembali.'<div style="'.$style.'">'.$q3.'  '.$q4.'</div>';
				$row_actual 	= $row_actual.'<div style="'.$style.'">'.$q5.'  '.$q6.'</div>';
				//$row_akumulasi 	= '';
				$row_mark 	 	= $row_mark.'<div style="'.$style.'">'.$q8.'  '.$q9.'</div>';
				$row_adm 	 	= $row_adm.'<div style="'.$style.'">'.$q10.'  '.$q11.'</div>';
				$row_blk 	 	= $row_blk.'<div style="'.$style.'">'.$q12.'  '.$q13.'</div>';
				$row_keperluan 	= $row_keperluan.'<div style="'.$style.'">'.$q14.'  '.$q15.'</div>';
			$no_x++;
			}

			array_push($data2,
				array(
					$no,
					'<a href="'.site_url('blk_personaldetail/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-success">Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/pembinaan/'.$kp->nodaftar.'/ip').'" target="_blank"><span class="label label-primary">Pembinaan</span></a>'.' '.
					'<a href="'.site_url('blk_pelatihan/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-danger">Pelatihan</span></a>',
					$kp->nodaftar,
					$nama_tki,
					$total_ip,
					$row_keluar,
					$row_kembali,
					$row_actual,
					'',//$row_akumulasi,
					$row_keperluan,
					$row_mark,
					$row_adm,
					$row_blk
				)
			);
		}

		$sql1998 = "SELECT distinct
	    	count(distinct(nodaftar)) as total 
	    	FROM blk_izin_pulang 
	    	where 1=1 $where 
	    	order by nodaftar ASC";

	    $sql1999 = "SELECT distinct
	    	count(distinct(nodaftar)) as total 
	    	FROM blk_izin_pulang";

		
		$recordsFiltered 	= $this->M_session->select_row($sql1998)->total;
		$recordsTotal 		= $this->M_session->select_row($sql1999)->total;

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

	//============================= IJIN INAP ===============================
	function ii() {
		$pil_tki = $this->session->userdata('ii_search_tki');

		$data['u_ii_pil_id'] = $pil_tki;

		$ambil_data_tki 			= "SELECT distinct(nodaftar) as id FROM blk_izin_inap ORDER BY nodaftar";
		$data['tampil_data_tki'] = $this->M_session->select($ambil_data_tki);

		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "ii";
		echo Modules::run('template/blk_template',$data);
	}

	function ii_search_tki($id_tki) {
		$this->session->set_userdata('ii_search_tki', $id_tki);

		redirect('blk_rekapitulasi/ii');
	}

	function ii_show_data($pil_tki=NULL) {
		if ($pil_tki != NULL) {
			$where = "WHERE  nodaftar='$pil_tki'";
		} else {
			$where = "";
		}

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		$sql = "SELECT distinct
		    	nodaftar
		    	FROM blk_izin_inap
		    	$where 
		    	order by nodaftar ASC 
		    	$limit";

	 	$get_table 	= $this->M_session->select($sql);

		$data2 = array();
		$no=intval($_POST['start']);
		foreach ($get_table as $kp) {
			$no++;
			$sql2 		= "SELECT count(*) as total FROM blk_izin_inap where nodaftar='".$kp->nodaftar."'";
			$total_ii 	= $this->M_session->select_row($sql2)->total;

			$sql3 		= "SELECT * 
							FROM blk_izin_inap 
							where nodaftar='".$kp->nodaftar."'";
			$queryzz 	= $this->M_session->select($sql3);

            $ubah_tipe = substr($kp->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                $ambil_nama_taiwan = $this->M_session->select_row("SELECT nama FROM personal WHERE id_biodata='$kp->nodaftar'");
                $nama_tki = $ambil_nama_taiwan->nama;
            } else {
                $ambil_nama_nontaiwan = $this->M_session->select_row("SELECT nama FROM personalblk WHERE nodaftar='$kp->nodaftar'");
                $nama_tki = "";
	            if ($ambil_nama_nontaiwan != NULL) {
	                $nama_tki = $ambil_nama_nontaiwan->nama;
	            }
            }

			$no_x = 1;
			$row_keluar 	= "";
			$row_kembali 	= "";
			$row_akumulasi 	= "";
			$row_blk 	 	= "";
			$row_ket 	 	= "";
			foreach($queryzz as $r) {

				$ambil_keluar 		= "SELECT tglkeluar, jamkeluar FROM blk_izin_inap where id_izin_inap='".$r->id_izin_inap."'";
				$ambil_kembali 		= "SELECT tglmasuk, jammasuk FROM blk_izin_inap where id_izin_inap='".$r->id_izin_inap."'";
				$ambil_akumulasi 	= "SELECT terlambat FROM blk_izin_inap where id_izin_inap='".$r->id_izin_inap."'";
				$ambil_blk 			= "SELECT kode_instruktur, nama FROM blk_instruktur where id_instruktur='".$r->blk_pemberi_izin."'";
				$ambil_ket  		= "SELECT ket FROM blk_izin_inap where id_izin_inap='".$r->id_izin_inap."'";

				$query1 	= $this->M_session->select_row($ambil_keluar);
				$query2 	= $this->M_session->select_row($ambil_kembali);
				$query3 	= $this->M_session->select_row($ambil_akumulasi);
				$query4 	= $this->M_session->select_row($ambil_blk);
				$query5 	= $this->M_session->select_row($ambil_ket);

				$q1  = "";
				$q2  = "";
				$q3  = "";
				$q4  = "";
				$q5  = "";
				$q6  = "";
				$q7  = "";
				$q8  = "";
				if ($query1->tglkeluar != NULL) {
					$q1 = $query1->tglkeluar;
				} else {
					$q1 = '-';
				}
				if ($query1->jamkeluar != NULL) {
					$q2 = $query1->jamkeluar;
				} else {
					$q2 = '-';
				}
				if ($query2->tglmasuk != NULL) {
					$q3 = $query2->tglmasuk;
				} else {
					$q3 = '-';
				}
				if ($query2->jammasuk != NULL) {
					$q4 = $query2->jammasuk;
				} else {
					$q4 = '-';
				}

				if ($query3->terlambat != NULL) {
					$q5 = $query3->terlambat;
				} else {
					$q5 = '-';
				}

				if ($query4->kode_instruktur != NULL) {
					$q6 = $query4->kode_instruktur;
				} else {
					$q6 = '-';
				}
				if ($query4->nama != NULL) {
					$q7 = $query4->nama;
				} else {
					$q7 = '-';
				}

				if ($query5->ket != NULL) {
					$q8 = $query5->ket;
				} else {
					$q8 = '-';
				}


				if ($total_ii != $no_x) {
					$style = "border-bottom:1px solid black";
				} else {
					$style = "";
				}

				$row_keluar 	= $row_keluar.'<div style="'.$style.'">'.$q1.'  '.$q2.'</div>';
				$row_kembali 	= $row_kembali.'<div style="'.$style.'">'.$q3.'  '.$q4.'</div>';
				$row_akumulasi 	= $row_akumulasi.'<div style="'.$style.'">'.$q5.'</div>';
				$row_blk 	 	= $row_blk.'<div style="'.$style.'">'.$q6.'  '.$q7.'</div>';
				$row_ket 	 	= $row_ket.'<div style="'.$style.'">'.$q8.'</div>';
			$no_x++;
			}

			array_push($data2,
				array(
					$no,
					'<a href="'.site_url('blk_personaldetail/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-success">Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/pembinaan/'.$kp->nodaftar.'/ii').'" target="_blank"><span class="label label-primary">Pembinaan</span></a>'.' '.
					'<a href="'.site_url('blk_pelatihan/index/'.$kp->nodaftar).'" target="_blank"><span class="label label-danger">Pelatihan</span></a>',
					$kp->nodaftar,
					$nama_tki,
					$total_ii,
					$row_keluar,
					$row_kembali,
					$row_akumulasi,
					$row_blk,
					$row_ket
				)
			);
		}

		$sql1998 = "SELECT distinct
	    	count(distinct(nodaftar)) as total 
	    	FROM blk_izin_inap 
	    	$where 
	    	order by nodaftar ASC";

	    $sql1999 = "SELECT distinct
	    	count(distinct(nodaftar)) as total 
	    	FROM blk_izin_inap";

		
		$recordsFiltered 	= $this->M_session->select_row($sql1998)->total;
		$recordsTotal 		= $this->M_session->select_row($sql1999)->total;

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

	//================================ FINGERPRINT FORMAL+JOMPO ==========================================//
	function finger() {
		$pil_tki = $this->session->userdata('finger_search_tki');
		$data['u_finger_pil_id'] = $pil_tki;
		$ambil_data_tki 		 = "SELECT distinct(idblk) as id FROM tblattendance WHERE idblk NOT LIKE '0%' ORDER BY idblk";
		$data['tampil_data_tki'] = $this->M_session->select($ambil_data_tki);
		$data['data_idbio']		 = $this->M_session->select("SELECT distinct(personalblk.nodaftar), personal.nama as twnama, personalblk.nama as hknama FROM personalblk LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata");
		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "finger";
		echo Modules::run('template/blk_template',$data);
	}

	function finger_search_tki($id_tki) {
		$this->session->set_userdata('finger_search_tki', $id_tki);

		redirect('blk_rekapitulasi/finger');
	}

	function finger_show_data($pil_tki=NULL) {
		if ($pil_tki != NULL) {
			$where = "WHERE  idblk='$pil_tki'";
		} else {
			$where = "";
		}

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		$sql = "SELECT distinct
		    	idblk 
		    	FROM tblattendance 
		    	$where 
		    	order by idblk ASC 
		    	$limit";

	 	$tampil_data_finger 	= $this->M_session->select($sql);
		

		$data2 = array();
		$no=intval($_POST['start']);
		foreach ($tampil_data_finger as $row) {
			$no++;
			/*
			$ambil_finger = $this->M_session->select("SELECT * FROM tblattendance WHERE idblk='$row->idblk'");
			$total_finger = count($ambil_finger);*/
			$ambil_data_rekap_finger = $this->M_session->select("SELECT distinct month(dteDate) as bulan, year(dteDate) as tahun FROM tblattendance WHERE idblk='$row->idblk'");

			$total_login_bulanan = "";
			foreach ($ambil_data_rekap_finger as $row2) {
				$list = array();
				for($d=1; $d<=31; $d++)
				{
				    $time=mktime(12, 0, 0, $row2->bulan, $d, $row2->tahun);          
				    if (date('m', $time)==$row2->bulan) {      
				        $list[]=date('d.m.Y', $time);
				    }
				}
				$tgl_per_bln = $list;

				$total = 0;
				foreach ($tgl_per_bln as $yt) {
					$blnn = $row2->tahun.'-'.sprintf('%02d', $row2->bulan).'-'.date("d",strtotime($yt));
					$rt = $this->M_session->select_row("SELECT count(*) as tot FROM tblattendance where idblk='$row->idblk' and dteDate like '$blnn'");
					if ($rt->tot >= 1) {
						$total = $total + 1;
					} elseif ($rt->tot == 0) {
						$total = $total + 0;
					}
				}
				$total_login_bulanan = $total_login_bulanan+$total;
			}
			



            $ubah_tipe = substr($row->idblk, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                $ambil_nama_taiwan = $this->M_session->select_row("SELECT nama FROM personal WHERE id_biodata='$row->idblk'");
                $nama_tki = $ambil_nama_taiwan->nama;
            } else {
                $ambil_nama_nontaiwan = $this->M_session->select_row("SELECT nama FROM personalblk WHERE nodaftar='$row->idblk'");
                $nama_tki = "";
	            if ($ambil_nama_nontaiwan != NULL) {
	                $nama_tki = $ambil_nama_nontaiwan->nama;
	            }
            }

			array_push($data2,
				array(
					$no,
					$row->idblk,
					$nama_tki,
					$total_login_bulanan, 
					'<a onClick=poptastic("'.site_url('blk_rekapitulasi/finger_detail/'.$row->idblk).'")><span class="label label-warning">Finger Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/index/'.$row->idblk).'" target="_blank"><span class="label label-success">Personal Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/pembinaan/'.$row->idblk.'/kb').'" target="_blank"><span class="label label-primary">Pembinaan</span></a>'.' '.
					'<a href="'.site_url('blk_pelatihan/index/'.$row->idblk).'" target="_blank"><span class="label label-danger">Pelatihan</span></a>',
					
				)
			);
		}

		$sql1998 = "SELECT distinct
	    	count(distinct(idblk)) as total 
	    	FROM tblattendance 
	    	$where 
	    	order by idblk ASC";

	    $sql1999 = "SELECT distinct
	    	count(distinct(idblk)) as total 
	    	FROM tblattendance ";

		
		$recordsFiltered 	= $this->M_session->select_row($sql1998)->total;
		$recordsTotal 		= $this->M_session->select_row($sql1999)->total;

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

	function finger_detail($id_tki) {
		$ambil_data_rekap_finger = $this->M_session->select("SELECT distinct month(dteDate) as bulan, year(dteDate) as tahun FROM tblattendance WHERE idblk='$id_tki'");

		$data['tampil_data_rekap_finger'] = $ambil_data_rekap_finger;
		$data['id_tki']					  = $id_tki;
		$data['tampil_data_pmi'] 		  = $this->M_session->select("SELECT a.nodaftar, a.nama as nontaiwan_nama, b.nama as taiwan_nama FROM personalblk a LEFT JOIN personal b ON a.nodaftar=b.id_biodata ORDER BY a.nodaftar ASC");

		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "finger_detail";
		echo Modules::run('template/blk_template',$data);
	}

	function finger_detail_add($id_tki) 
	{
		$idblk = $id_tki;
		$dates = $this->input->post('dteDate');
		$date2 = $this->input->post('dteDate2');
		$waktu = $this->input->post('waktuJam');

		if ( $dates > $date2 )
		{
			exit('error12');
		}
		echo '<pre>';
		$datetime1 = new DateTime( date('Y-m-d', strtotime( str_replace(".", "-", $dates) ) ) );
		$datetime2 = new DateTime( date('Y-m-d', strtotime( str_replace(".", "-", $date2) ) ) );

		$interval = $datetime1->diff($datetime2);
		$selisih = $interval->format('%a');

		$data = array();
		for ( $k=0; $k<=$selisih; $k++ ) 
		{
			for ( $i=0; $i<count($waktu); $i++ ) 
			{
				$waktu_exp = explode(',', $waktu[$i]);

				$dates_new = date('Y-m-d', strtotime( str_replace(".", "-", $dates) ) );
				$dates_pls = date('Y-m-d', strtotime($dates_new . "+" . $k . " days") );

				$cek_ada = $this->M_session->select_row(" SELECT count(*) as total FROM tblattendance WHERE idblk='".$idblk."' AND dteDate='".$dates_pls."' AND waktu='".$waktu_exp[0]."' ");

				if ( $waktu_exp[0] == 'pagi' ) {
					$qq_jam = '07:00:00';
				} elseif ( $waktu_exp[0] == 'sore' ) {
					$qq_jam = '18:30:00';
				} else {
					exit('error33');
				}

				if ( $cek_ada->total == 0 ) 
				{
					$data[] = array
					(
						'idblk' => $idblk,
						'dteDate' => $dates_pls,
						'tmeTime' => $qq_jam,
						'waktu' => $waktu_exp[0],
						'rec' => date('Y-m-d H:i:s'),
					);
				}
			}	
		}

		//print_r($data);

		if ( $data != NULL ) 
		{
			$ty = $this->M_session->insert_batch($data, 'tblattendance');
			if ( $ty == TRUE ) 
			{
				redirect('blk_rekapitulasi/finger_detail/'.$idblk);
			}
			else
			{
				exit('error26');
			}
		}
	}

	function finger_detail_add_2()
	{
		$idblk = $this->input->post('idbiopil');
		$dates = $this->input->post('dteDate');
		$date2 = $this->input->post('dteDate2');
		$waktu = $this->input->post('waktuJam');

		if ( $dates > $date2 )
		{
			exit('error12');
		}
		
		$datetime1 = new DateTime( date('Y-m-d', strtotime( str_replace(".", "-", $dates) ) ) );
		$datetime2 = new DateTime( date('Y-m-d', strtotime( str_replace(".", "-", $date2) ) ) );

		$interval = $datetime1->diff($datetime2);
		$selisih = $interval->format('%a');

		$data = array();
		for ( $k=0; $k<=$selisih; $k++ ) 
		{
			for ( $i=0; $i<count($waktu); $i++ ) 
			{
				$waktu_exp = explode(',', $waktu[$i]);

				$dates_new = date('Y-m-d', strtotime( str_replace(".", "-", $dates) ) );
				$dates_pls = date('Y-m-d', strtotime($dates_new . "+" . $k . " days") );

				$cek_ada = $this->M_session->select_row(" SELECT count(*) as total FROM tblattendance WHERE idblk='".$idblk."' AND dteDate='".$dates_pls."' AND waktu='".$waktu_exp[0]."' ");

				if ( $waktu_exp[0] == 'pagi' ) {
					$qq_jam = '07:00:00';
				} elseif ( $waktu_exp[0] == 'sore' ) {
					$qq_jam = '18:30:00';
				} else {
					exit('error33');
				}

				if ( $cek_ada->total == 0 ) 
				{
					$data[] = array
					(
						'idblk' => $idblk,
						'dteDate' => $dates_pls,
						'tmeTime' => $qq_jam,
						'waktu' => $waktu_exp[0],
						'rec' => date('Y-m-d H:i:s'),
					);
				}
			}	
		}

		//print_r($data);

		if ( $data != NULL ) 
		{
			$ty = $this->M_session->insert_batch($data, 'tblattendance');
			if ( $ty == TRUE ) 
			{
				redirect('blk_rekapitulasi/finger');
			}
			else
			{
				exit('error26');
			}
		}
	}

	//================================ FINGERPRINT PER WAKTU ==========================================//
	function finger_waktu() {
		$pil_tki = $this->session->userdata('finger_search_tki');

		$data['u_finger_pil_id'] = $pil_tki;

		$ambil_data_tki 			= "SELECT distinct(idblk) as id FROM tblattendance ORDER BY idblk";
		$data['tampil_data_tki'] = $this->M_session->select($ambil_data_tki);

		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "finger_waktu";
		echo Modules::run('template/blk_template',$data);
	}

	function tampil_setting() {
		$validasi = array
		(
			array('field'=>'tgl','label'=>'1','rules'=>'required'),
			array('field'=>'waktu','label'=>'2','rules'=>'required'),
		);
		$this->form_validation->set_rules($validasi);
		if ($this->form_validation->run()===FALSE) 
		{
			$info['success'] = FALSE;
			$info['message'] = validation_errors();
		} 
		else 
		{
			$info['success'] = TRUE;

			$tgl 	= $this->input->post('tgl');
	        $waktu 	= $this->input->post('waktu');

	        if ( $waktu == 'pagi' ) {
	        	$whee = "and tmeTime between '06:00:00' and '10:00:00' ";
	        } else if ( $waktu == 'siang' ) {
	        	$whee = "and tmeTime between '10:00:01' and '15:00:00' ";
	        } else if ( $waktu == 'sore' ) {
	        	$whee = "and tmeTime between '15:00:01' and '22:00:00' ";
	        }

			$where_dd 	= "where a.dteDate='$tgl' ".$whee;

			$tampil_data = $this->M_session->select("SELECT 
													a.idblk as id, 
													a.dteDate, 
													a.tmeTime, 
													b.nama as non_nama, 
													c.nama as taiwan_nama
													FROM tblattendance a 
													LEFT JOIN personalblk b 
													ON a.idblk=b.nodaftar 
													LEFT JOIN personal c 
													ON a.idblk=c.id_biodata 
													$where_dd 
													ORDER BY idblk DESC");

	        $no 	= 0;
	        $hasil 	= "";
		    foreach ($tampil_data as $row) 
		    {

	            $no++;
	            $hasil .= '<tr>';
	            $hasil .= '<td>'.$no.'</td>';
	            $hasil .= '<td>'.$row->id.'</td>';

                $ubah_tipe = substr($row->id, 0, 2);
                if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') 
                {
	            	$hasil .= '<td>'.$row->taiwan_nama.'</td>';
                } 
                else 
                {
	            	$hasil .= '<td>'.$row->non_nama.'</td>';
                }
	            $hasil .= '<td>'.$row->dteDate.'</td>';
	            $hasil .= '<td>'.$row->tmeTime.'</td>';
	            $hasil .= '</tr>';

	        }
	        $info['table'] = $hasil;

		}
		$this->output->set_content_type('application/json')->set_output(json_encode( $info ) );
	}
	//===== kegiatan luar (PKL PAP)
	public function pkl() {
		$data['tampil_data_pmi'] = $this->M_session->select_custom("personalblk ORDER BY nodaftar ASC");
		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "dkrh_pkl";
		echo Modules::run('template/blk_template',$data);
	}

	public function pkl_show() {
		$columns22 = array(
            'a.id_biodata','b.nama'
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

		$where_dd 	= "WHERE a.tipe='pkl'";
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd .= " AND ".$where;
		}

		$tampil_data = $this->M_session->select("SELECT 
			a.id,a.id_biodata,b.nama,a.tglmulai,a.tglselesai,a.ket,a.tipe 
			from blk_dkrh_kegiatanluar a
			JOIN personalblk b ON a.id_biodata=b.nodaftar 
			$where_dd 
			order by id desc 
			$limit
		");

        $data2 	= array();
        $no 	= intval($_POST['start']);
	    foreach ($tampil_data as $row) 
	    {
			$no++;
			array_push($data2,
				array(
					$no,
					'<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button> '.
					'<button class="btn btn-xs bg-danger" onClick="modal_hapus('.$row->id.')" >HAPUS</button> ',
					$row->id_biodata.' - '.$row->nama,
					$row->tglmulai,
					$row->tglselesai,
					$row->ket,
				)
			);
	    }

        $recordsFiltered 	= $this->M_session->select_count("blk_dkrh_kegiatanluar a
			LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
			$where_dd
		");

        $recordsTotal 		= $this->M_session->select_count("blk_dkrh_kegiatanluar a
			LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
		");

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

	public function pkl_insert() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$data = array(
			'id_biodata' => $this->input->post('pmi'),
			'tipe' => 'pkl',
			'tglmulai' => $this->input->post('tgl1'),
			'tglselesai' => $this->input->post('tgl2'),
			'ket' => $this->input->post('ket'),
		);
		
		if ($this->M_session->insert($data, 'blk_dkrh_kegiatanluar')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function pkl_edit($id) {
		$data = $this->M_session->select_row("SELECT * FROM blk_dkrh_kegiatanluar WHERE id='$id'");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function pkl_update() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$id = $this->input->post('id');
		$data = array(
			'id_biodata' => $this->input->post('pmi'),
			'tglmulai' => $this->input->post('tgl1'),
			'tglselesai' => $this->input->post('tgl2'),
			'ket' => $this->input->post('ket'),
		);
		
		if ($this->M_session->update($data, 'blk_dkrh_kegiatanluar',$id,'id')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function pkl_delete() {
		$id = $this->input->post('id');
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		if ($this->M_session->delete('blk_dkrh_kegiatanluar',$id,'id')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}
    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function pap() {
		$data['tampil_data_pmi'] = $this->M_session->select_custom("personalblk ORDER BY nodaftar ASC");
		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "dkrh_pap";
		echo Modules::run('template/blk_template',$data);
	}
	public function pap_show() {
		$columns22 = array(
            'a.id_biodata','b.nama'
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

		$where_dd 	= "WHERE a.tipe='pap'";
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd .= " AND ".$where;
		}

		$tampil_data = $this->M_session->select("SELECT 
			a.id,a.id_biodata,b.nama,a.tglmulai,a.tglselesai,a.ket,a.tipe 
			from blk_dkrh_kegiatanluar a
			JOIN personalblk b ON a.id_biodata=b.nodaftar 
			$where_dd 
			order by id desc 
			$limit
		");

        $data2 	= array();
        $no 	= intval($_POST['start']);
	    foreach ($tampil_data as $row) 
	    {
			$no++;
			array_push($data2,
				array(
					$no,
					'<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button> '.
					'<button class="btn btn-xs bg-danger" onClick="modal_hapus('.$row->id.')" >HAPUS</button> ',
					$row->id_biodata.' - '.$row->nama,
					$row->tglmulai,
					$row->tglselesai,
					$row->ket,
				)
			);
	    }

        $recordsFiltered 	= $this->M_session->select_count("blk_dkrh_kegiatanluar a
			LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
			$where_dd
		");

        $recordsTotal 		= $this->M_session->select_count("blk_dkrh_kegiatanluar a
			LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
		");

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

	public function pap_insert() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$data = array(
			'id_biodata' => $this->input->post('pmi'),
			'tipe' => 'pap',
			'tglmulai' => $this->input->post('tgl1'),
			'tglselesai' => $this->input->post('tgl2'),
			'ket' => $this->input->post('ket'),
		);
		
		if ($this->M_session->insert($data, 'blk_dkrh_kegiatanluar')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function pap_edit($id) {
		$data = $this->M_session->select_row("SELECT * FROM blk_dkrh_kegiatanluar WHERE id='$id'");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function pap_update() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$id = $this->input->post('id');
		$data = array(
			'id_biodata' => $this->input->post('pmi'),
			'tglmulai' => $this->input->post('tgl1'),
			'tglselesai' => $this->input->post('tgl2'),
			'ket' => $this->input->post('ket'),
		);
		
		if ($this->M_session->update($data, 'blk_dkrh_kegiatanluar',$id,'id')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function pap_delete() {
		$id = $this->input->post('id');
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		if ($this->M_session->delete('blk_dkrh_kegiatanluar',$id,'id')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}
    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}


	public function teto() {
		$data['tampil_data_pmi'] = $this->M_session->select_custom("personalblk ORDER BY nodaftar ASC");
		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "dkrh_teto";
		echo Modules::run('template/blk_template',$data);
	}
	public function teto_show() {
		$columns22 = array(
            'a.id_biodata','b.nama'
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

		$where_dd 	= "WHERE a.tipe='teto'";
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd .= " AND ".$where;
		}

		$tampil_data = $this->M_session->select("SELECT 
			a.id,a.id_biodata,b.nama,a.tglmulai,a.tglselesai,a.ket,a.tipe 
			from blk_dkrh_kegiatanluar a
			JOIN personalblk b ON a.id_biodata=b.nodaftar 
			$where_dd 
			order by id desc 
			$limit
		");

        $data2 	= array();
        $no 	= intval($_POST['start']);
	    foreach ($tampil_data as $row) 
	    {
			$no++;
			array_push($data2,
				array(
					$no,
					'<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button> '.
					'<button class="btn btn-xs bg-danger" onClick="modal_hapus('.$row->id.')" >HAPUS</button> ',
					$row->id_biodata.' - '.$row->nama,
					$row->tglmulai,
					$row->tglselesai,
					$row->ket,
				)
			);
	    }

        $recordsFiltered 	= $this->M_session->select_count("blk_dkrh_kegiatanluar a
			LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
			$where_dd
		");

        $recordsTotal 		= $this->M_session->select_count("blk_dkrh_kegiatanluar a
			LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
		");

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

	public function teto_insert() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$data = array(
			'id_biodata' => $this->input->post('pmi'),
			'tipe' => 'teto',
			'tglmulai' => $this->input->post('tgl1'),
			'tglselesai' => $this->input->post('tgl2'),
			'ket' => $this->input->post('ket'),
		);
		
		if ($this->M_session->insert($data, 'blk_dkrh_kegiatanluar')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function teto_edit($id) {
		$data = $this->M_session->select_row("SELECT * FROM blk_dkrh_kegiatanluar WHERE id='$id'");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function teto_update() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$id = $this->input->post('id');
		$data = array(
			'id_biodata' => $this->input->post('pmi'),
			'tglmulai' => $this->input->post('tgl1'),
			'tglselesai' => $this->input->post('tgl2'),
			'ket' => $this->input->post('ket'),
		);
		
		if ($this->M_session->update($data, 'blk_dkrh_kegiatanluar',$id,'id')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function teto_delete() {
		$id = $this->input->post('id');
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		if ($this->M_session->delete('blk_dkrh_kegiatanluar',$id,'id')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}
    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function noticetki() {
		$data['tampil_data_pmi'] = $this->M_session->select_custom("personalblk ORDER BY nodaftar ASC");
		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "dkrh_noticetki";
		echo Modules::run('template/blk_template',$data);
	}

	public function noticetki_show()
	{
		$r = $this->M_session->fingerspot_select("SELECT
													blk_izin_pulang.*, personalblk.nama
													FROM blk_izin_pulang
													LEFT JOIN personalblk 
													WHERE blk_izin_pulang.nodaftar=personalblk.nodaftar
													ORDER BY tglkembali DESC");
		$nnn = date('Y-m-d');
		$e = [];
		$e2 = '';
		$f = [];
		$f2 = '';
		foreach($r as $v)
		{
			$ccc = $this->M_session->getDataWhereCount('idblk', 'tblattendance', ' idblk="'.$v->nodaftar.'" and dteDate="'.$nnn.'"');
			if ($ccc == 0) {
				if ($v->tglkembali == '') {
					$e[] = $v;
				} else {
					$f[] = $v;
				}
			}
		}

		foreach ($e as $v) 
		{
			$e2 .= '
				<tr>
					<td></td>
					<td>'.$v->nodaftar.' - '.$v->nama.'</td>
					<td>'.$v->tglkeluar.' - '.$v->tglkembali.'</td>
					<td>'.$v->ket.'</td>
				</tr>
			';
		}
		foreach ($f as $v) 
		{
			$f2 .= '
				<tr>
					<td></td>
					<td>'.$v->nodaftar.' - '.$v->nama.'</td>
					<td>'.$v->tglkeluar.'</td>
					<td>'.$v->ket.'</td>
				</tr>
			';
		}
		$aa = [
			't1' => $e2,
			't2' => $f2,
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($aa));

	}
}