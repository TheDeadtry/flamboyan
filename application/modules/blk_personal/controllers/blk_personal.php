<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_personal extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		//$this->load->model('M_blk_personal');	
	}
	
	function index(){
		$data['pilsektor'] 	= $this->session->userdata('blkpersonal_pilsektor');
		$data['pilterbang'] = $this->session->userdata('blkpersonal_pilstatterbang');
		$data['pilujk'] 	= $this->session->userdata('blkpersonal_pilstatujk');

		// $data_blk = "SELECT  DISTINCT nodaftar FROM personalblk";
		// $data_blk_query = $this->M_session->select($data_blk);

		// $strr = array();
	 	// foreach ($data_blk_query as $tor) {
		// 	$strr[] = " personal.id_biodata!='".$tor->nodaftar."'";
		// }
		// $where = '';
		// if ( count( $strr ) ) {
		// 	$where = '('.implode(' AND ', $strr).')';
		// }
		// if ( $where !== '' ) {
		// 	$where = "WHERE (personal.id_biodata LIKE 'FF%' || 
		// 				personal.id_biodata LIKE 'FI%' || 
		// 				personal.id_biodata LIKE 'MF%' || 
		// 				personal.id_biodata LIKE 'MI%' || 
		// 				personal.id_biodata LIKE 'MC%' || 
		// 				personal.id_biodata LIKE 'MH%' || 
		// 				personal.id_biodata LIKE 'FH%' || 
		// 				personal.id_biodata LIKE 'HK%' || 
		// 				personal.id_biodata LIKE 'JP%') 
		// 				AND ".$where;
		// }
		
		// $sql = "SELECT 
		// 		datasponsor.nama as namasponsor,
		// 		disnaker.nodisnaker as nodisnaker,
		// 		personal.id_biodata as idbiodata,
		// 		personal.nama as nama,
		// 		personal.id_biodata as id_biodata,
		// 		personal.tempatlahir as tempatlahir,
		// 		personal.tgllahir as tanggallahir,
		// 		disnaker.jeniskelamin as jeniskelamin,
		// 		disnaker.alamat as alamat,
		// 		disnaker.telpkontak as telp,
		// 		disnaker.pendidikan as pendidikan,
		// 		disnaker.noktp as noktp,
		// 		disnaker.negara as negara,
		// 		(SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1) AS paspor
		// 		FROM personal
		// 		LEFT JOIN datasponsor 
		// 		ON personal.kode_sponsor= datasponsor.kode_sponsor
		// 		LEFT JOIN disnaker
		// 		ON personal.id_biodata = disnaker.id_biodata 
		// 		$where
		// 		ORDER BY personal.id_biodata ASC ";
		// var_dump($sql);
		// die();
		$sql = "
		SELECT p.* FROM (
			SELECT p.id_biodata, p.nama, tanggaldaftar FROM personal p 
		) p
		LEFT JOIN idblk b ON p.id_biodata = b.nodaftar
		WHERE 
		p.id_biodata IS NOT NULL 
		AND p.id_biodata NOT LIKE 'TSTT%'
		AND p.id_biodata <> ''
		AND b.nodaftar IS NULL
		ORDER BY p.tanggaldaftar desc
		";
		$data['personaltki'] = $this->M_session->select($sql);

	 	$data['tampil_data_pemilik_tki'] 	= $this->M_session->select_custom("blk_pemilik");
	 	$data['tampil_data_jk_tki'] 		= $this->M_session->select_custom("blk_jk");
	 	$data['tampil_data_negara_tki'] 	= $this->M_session->select_custom("blk_negara_tujuan");
	 	$data['tampil_data_bahasa_tki'] 	= $this->M_session->select_custom("blk_bahasa");
	 	$data['tampil_data_eksnon_tki'] 	= $this->M_session->select_custom("blk_eks_non");
	 	$data['tampil_data_cluster_tki'] 	= $this->M_session->select_custom("blk_cluster_profesi");

	 	$data['tampil_data_sponsor'] 		= $this->M_session->select_custom("datasponsor");
	 	$data['tampil_sektor_nt']  			= $this->M_session->select_custom("datasektor_nt");

		$data['namamodule'] 	= "blk_personal";
		$data['namafileview'] 	= "blk_personal";
		echo Modules::run('template/blk_template', $data);
	}

	function setsektor($pilihan="")
	{
		$pilihan = urldecode($pilihan);
		$this->session->set_userdata('blkpersonal_pilsektor', $pilihan);
		redirect('blk_personal');
	}

	function setstatterbang($pilihan="")
	{
		$pilihan = urldecode($pilihan);
		$this->session->set_userdata('blkpersonal_pilstatterbang', $pilihan);
		redirect('blk_personal');
	}

	function setstatujk($pilihan = "")
	{
		$pilihan = urldecode($pilihan);
		$this->session->set_userdata('blkpersonal_pilstatujk', $pilihan);
		redirect('blk_personal');
	}

	function simpan_data_blk_personal()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal Di Tambah';

		$list_sektor = [
			'FF' => 1,
			'FI' => 2,
			'JP' => 3,
			'MF' => 4,
			'MI' => 5,
			'HK' => 6,
			'S' => 7,
			'TS' => 8,
			'MH' => 9,
			'FH' => 10,
			'MC' => 11,
		];

		foreach($this->db->query("SELECT * FROM blk_sektor_kode bsk")->result() as $kk){
			if(!isset($list_sektor[$kk->sektor])){
				$list_sektor[$kk->sektor] = $kk->kode;
			}
		}

	 	$pilper = $this->input->post('pilihpersonal');
	 	if ($pilper != 'new11') 
	 	{
			 $dz = explode("-", $pilper);
			 $dz2 = $list_sektor[$dz[0]].$dz[1];
	 		$nama = $this->db->query("SELECT nama FROM personal where id_biodata='$pilper'")->row()->nama;
		 	$pemilik = $this->input->post('pemilik2');
		 	$bahasa = $this->input->post('bahasa2');
		 	//$eksnon = $this->input->post('eksnon2');
		 	$cluster = $this->input->post('cluster2');
		 	//$negara = $this->input->post('negara');

	 		$tp = $this->M_session->select_row("SELECT * FROM personal where id_biodata='".$pilper."'");

	 		$eksnon = 'NON';
	 		if ( $tp->negara1 != NULL && $tp->negara1 != '' )
	 		{
	 			$eksnon = 'EKS';
	 		}

			$dataq = array (
				'nama'			=> $nama,
				'pemilik' 		=> $pemilik,
				'nodaftar'		=> $pilper,
				'bahasa'		=> $bahasa,
				'eksnon'		=> $eksnon,
				'cluster'		=> $cluster,
				'negara'		=> 'TAIWAN',
			);

	 		$tpee = $this->M_session->select_count("personalblk where nodaftar='".$pilper."'");
	 		if ( $tpee == 0 ) 
	 		{
				$cekk2e = $this->M_session->insert($dataq, 'personalblk');
				if ( $cekk2e == TRUE )
				{
					$datapm['success'] = TRUE;
					$datapm['message'] = 'Sukses Di Tambah';
				}
	 		} 
	 		else 
	 		{
	 			$datapm['message'] = 'Sudah Ada';
	 		}
	 	} 
	 	elseif ($pilper == 'new11') 
	 	{
	 		$notki_ff = $this->input->post('notki_sektor').'-'.sprintf('%04d', $this->input->post('notki'));

			 $dz2 = $list_sektor[$this->input->post('notki_sektor')].sprintf('%04d', $this->input->post('notki'));
		 	$nama = $this->input->post('nama');
		 	$pemilik = $this->input->post('pemilik');
		 	$sponsor = $this->input->post('sponsor');
		 	$nodisnaker = $this->input->post('nodisnaker');
		 	$notki = $notki_ff;
		 	$tempatlahir = $this->input->post('tempatlahir');
		 	$tanggallahir = $this->input->post('tanggalnyas');
		 	$jeniskelamin = $this->input->post('jeniskelamin');
		 	$alamat = $this->input->post('alamat');
		 	$notelp = $this->input->post('notelp');
		 	$pendidikan = $this->input->post('pendidikan');
		 	$noktp = $this->input->post('noktp');
		 	$negara = $this->input->post('negara');
		 	$bahasa = $this->input->post('bahasa');
		 	$eksnon = $this->input->post('eksnon');
		 	$cluster = $this->input->post('cluster');
		 	$nopaspor = $this->input->post('nopaspor');
		 	$foto = $this->input->post('foto');

			$dataq = array (
				'nama'=>$nama, 
				'pemilik'=>$pemilik,
				'sponsor'=>$sponsor,
				'nodisnaker'=>$nodisnaker,
				'nodaftar'=>$notki,
				'tempatlahir'=>$tempatlahir,
				'tanggallahir'=>$tanggallahir,
				'jeniskelamin'=>$jeniskelamin,
				'alamat'=>$alamat,
				'notelp'=>$notelp,
				'pendidikan'=>$pendidikan,
				'noktp'=>$noktp,
				'negara'=>$negara,
				'bahasa'=>$bahasa,
				'eksnon'=>$eksnon,
				'cluster'=>$cluster,
				'nopaspor'=>$nopaspor,
				'foto'=>$foto,
			);

	 		$tpee = $this->M_session->select_count("personalblk where nodaftar='".$notki_ff."'");
	 		if ( $tpee == 0 ) 
	 		{
				$cekk2e = $this->M_session->insert($dataq, 'personalblk');
				if ( $cekk2e == TRUE )
				{
					$datapm['success'] = TRUE;
					$datapm['message'] = 'Sukses Di Tambah';
				}
	 		} 
	 		else 
	 		{
	 			$datapm['message'] = 'Sudah Ada';
	 		}
	 	}
		 if ($datapm['success'])
		 {
			$datasss = [
			   'pegawai_pin' => $dz2,
			   'pegawai_nama' => $nama,
			   'pegawai_alias' => $nama,
			];
		 }
		 $CI =& get_instance();
		$this->other_db = $CI->load->database('forum', TRUE); 
		$this->other_db->insert('pegawai', $datasss);

        $this->output->set_content_type('application/json')->set_output(json_encode($datapm));
	}
/*
	function update_data_blk_personal() {
			$this->M_blk_personal->update_data_blk_personal();
			redirect('blk_personal');
	}

	function hapus_data_blk_personal() {
		$this->M_blk_personal->hapus_data_blk_personal();
		redirect('blk_personal');
	}
*/
   	function show_data() 
   	{
		$pilsektor 	= isset($_POST['pilsektor'])? $_POST['pilsektor']:'';
		$pilterbang = isset($_POST['pilterbang'])? $_POST['pilterbang']:'';
		$pilujk 	= isset($_POST['pilujk'])? $_POST['pilujk']:'';

		$columns22 = array(
			0 => 'personalblk.nodaftar',
			1 => 'personalblk.nama',
			2 => 'personal.nama'
		);

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

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

		$sttsektor = "WHERE personalblk.nodaftar NOT LIKE 'TS%' AND personalblk.nodaftar LIKE '".$pilsektor."%'";

		$where_dd = $sttsektor;

		$sttbng = '';
		if ($pilterbang == 'BELUM TERBANG') 
		{
			$sttbng = " (personalblk.statterbang = '' && personal.statterbang = '')";
			$where_dd .= ' AND '.$sttbng;
		} 
		elseif ($pilterbang == 'SUDAH TERBANG') 
		{
			$sttbng = " (personalblk.statterbang = 1 || personal.statterbang = 1)";
			$where_dd .= ' AND '.$sttbng;
		}

		$sttujk = '';
		if ($pilujk == 'BELUM UJK') 
		{
			$sttujk= " personalblk.statujk != 'LULUS' ";
			$where_dd .= ' AND '.$sttujk;
		} 
		elseif ($pilujk == 'SUDAH UJK') 
		{
			$sttujk= " personalblk.statujk = 'LULUS' ";
			$where_dd .= ' AND '.$sttujk;
		}

		$where_ori = $where_dd;
		$where_dd .= ' AND '.$where;
		
		$querydata = "SELECT 
			personalblk.tgldaftar,
			personalblk.nodaftar,
			personalblk.nama as namanya,
			personalblk.nama as personal_nama,
			personalblk.statujk
			FROM idblk personalblk 
			LEFT JOIN personal_nama personal
			ON personalblk.nodaftar=personal.id_biodata
			$where_dd 
			ORDER BY personalblk.tgldaftar DESC, personalblk.nodaftar DESC  
			$limit
		";

		// echo $querydata;
		// die();

		$tampil_data_blk_personal = $this->M_session->select($querydata);

        $data2 	= array();
		$no 	= intval($_POST['start']);
  
        foreach ($tampil_data_blk_personal as $roew) 
        {
			$no++;

        	$dataTambahan = $this->M_session->select_row("SELECT 
				personalblk.jeniskelamin as blk_jk, 
				personalblk.nodaftar as nodaftar, 
				personalblk.id_personalblk as id_personalblk, 
				personalblk.statterbang as hk_optterbang,
				personalblk.sponsor as blk_sponsor,
				personal.kode_sponsor as personal_kodespons, 
				personal.jeniskelamin as personal_jk, 
				personal.negara1 as extra_1,
				personal.negara2 as extra_2,
				personal.calling as extra_3,
				personal.skill1 as extra_4,
				personal.skill2 as extra_5,
				personal.skill3 as extra_6,
				visa.tanggalterbang as optterbang, 
				blk_pemilik.isi as pemilikx, 
				blk_pemilik.negara as negarapemilikx,
				datasponsor.kode_sponsor as kdsponsor
				FROM personalblk 
				LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata
				LEFT JOIN visa ON personalblk.nodaftar=visa.id_biodata
				LEFT JOIN blk_pemilik ON personalblk.pemilik=blk_pemilik.id_pemilik 
				LEFT JOIN datasponsor ON personalblk.sponsor=datasponsor.nama
				where personalblk.nodaftar='$roew->nodaftar'
			");

			$nodaftr = $roew->nodaftar.$dataTambahan->extra_1.$dataTambahan->extra_2.$dataTambahan->extra_3.'-'.$dataTambahan->extra_4.$dataTambahan->extra_5.$dataTambahan->extra_6;

	        $jkk = '';
	        $foptterbang = "Belum Terbang";
            $ubah_tipe = substr($roew->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP' || $ubah_tipe == 'IM' || $ubah_tipe == 'FH' || $ubah_tipe == 'MC') 
            {
            	$nama 		= $roew->personal_nama;
            	$sponsor 	= $dataTambahan->personal_kodespons;

	            if ($dataTambahan->personal_jk=="男") 
	            {
	                $jkk = 'L';
	            } 
	            elseif ($dataTambahan->personal_jk=="女") 
	            {
	                $jkk = 'P';
	            }

	            if ($dataTambahan->optterbang != '')
	            {
	            	$foptterbang = "Sudah Terbang";
				}
				else{
	            	$foptterbang = "Belum Terbang";

				}
				
	            $edit_buttonz = '';
            } else {
            	$nama 		= $roew->namanya;
            	$sponsor 	= $dataTambahan->blk_sponsor;

	            if ($dataTambahan->blk_jk=="Laki-Laki") 
	            {
	                $jkk = 'L';
	            } 
	            elseif ($dataTambahan->blk_jk=="Perempuan") 
	            {
	                $jkk = 'P';
	            }

	            // if ($dataTambahan->optterbang = 1)
	            // {
	            // 	$foptterbang = "Sudah Terbang";
	            // }

	            if ($dataTambahan->optterbang != '')
	            {
	            	$foptterbang = "Belum Terbang";
	            }else{
	            	$foptterbang = "Sudah Terbang";
	            }
	            $edit_buttonz = '';
            }
/*
	        $tgl_ujk = $this->M_session->select_row("SELECT tgl_ujk FROM blk_detail_formulir
				LEFT JOIN blk_formulir
				ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
				LEFT JOIN blk_pengajuan_ujk
				ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
				LEFT JOIN blk_lembaga_lsp
				ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
				WHERE blk_detail_formulir.nodaftar='$roew->nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
*/
/*
			$tgl_ujk = $this->M_session->select_row("
				SELECT statujk
				FROM blk_detail_formulir
				WHERE nodaftar='".$roew->nodaftar."'
				ORDER BY id_detail_formulir DESC
			");
*/
	        $statujk = $roew->statujk;
	        if ($statujk == NULL || $statujk == '') {
	        	$statujk = "BELUM UJK";
	        }

			$posisiTki = "Di BLK";

			$getPosisi = $this->db->query("SELECT 
			nodaftar  
			, IF(nullif(tglkembali,'') IS NULL, 'TKI izin pulang', IF(now() < tglkembali, 'TKI izin pulang', 'Di BLK') ) sts
			FROM blk_izin_pulang 
			WHERE nodaftar = '$roew->nodaftar'
			GROUP BY nodaftar 
			ORDER BY tglkeluar DESC ")->row();

			if($getPosisi){
				$posisiTki = $getPosisi->sts;
			}

			array_push($data2,
				array(
					$no,
					$nodaftr,
					$nama,
					$posisiTki,
					date('d-m-Y', strtotime($roew->tgldaftar)),
					$jkk,
					$dataTambahan->pemilikx.' - '.$dataTambahan->negarapemilikx,
					$sponsor,
					$foptterbang,
					$statujk,
					'<a href="'.site_url('blk_personaldetail/index/'.$roew->nodaftar).'" target="_blank"><span class="label label-success">Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/pembinaan/'.$roew->nodaftar).'" target="_blank"><span class="label label-primary">Pembinaan</span></a>'.' '.
					'<a href="'.site_url('blk_pelatihan/index/'.$roew->nodaftar).'" target="_blank"><span class="label label-danger">Pelatihan</span></a> '.
					'<a data-href="'.site_url('blk_personal/hapuspersonal/'.$roew->nodaftar).'" target="_blank" onclick="event.preventDefault(); window.DeletePersonal? window.DeletePersonal(this):null;" ><span class="label label-danger">Delete</span></a>',
					''
					/*
					'<ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#" data-toggle="modal" data-target="#hapus" onclick=delete_bef('.$dataTambahan->id_personalblk.')><i class="icon-eraser"></i><span>Hapus</span></a></li>
                            </ul>
                        </li>
                    </ul>'*/
				)
			);
		}
		
		// echo "personalblk 
		// 	LEFT JOIN personal
		// 	ON personalblk.nodaftar=personal.id_biodata
		// 	".$where_dd;
		// die();
		$recordsFiltered = $this->M_session->select_count("
			idblk personalblk
			LEFT JOIN personal_nama personal
			ON personalblk.nodaftar=personal.id_biodata
			".$where_dd
		);
		$recordsTotal =  $this->M_session->select_count("
			idblk personalblk
			LEFT JOIN personal_nama personal
			ON personalblk.nodaftar=personal.id_biodata
			".$where_ori
		);
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

   	function edit_show() {
		$id = $this->input->post('id');
		//print_r($id);
		$data = $this->M_blk_personal->edit_show_Data($id);
		//print_r($data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
   		//print_r($k);
   	}

   	function edit_process() {
		$this->M_blk_personal->update_data_blk_personal();

		$info['success'] = TRUE;
		$info['message'] = "Berhasil Diubah";

		$this->output->set_content_type('application/json')->set_output(json_encode($info));
   	}

	function hapus() {
		$this->M_blk_personal->hapus_data_blk_personal();

		$info['success'] = TRUE;
		$info['message'] = "Berhasil Diubah";

		$this->output->set_content_type('application/json')->set_output(json_encode($info));
		//$this->M_blk_personal->hapus_data_finger();
		//redirect('blk_personal');
	}

	function hapuspersonal($nodaftar){
		$action = $this->db->query("DELETE FROM personalblk WHERE nodaftar = '$nodaftar'");
		if ($action) {
			redirect("blk_personal");
		}
	}

	function tesfingerspot()
	{
		$list_sektor = [
			'FF' => 1,
			'FI' => 2,
			'JP' => 3,
			'MF' => 4,
			'MI' => 5,
			'HK' => 6,
			'S' => 7,
			'TS' => 8,
			'MH' => 9,
			'FH' => 10,
			'MC' => 11,
		];
		
		foreach($this->db->query("SELECT * FROM blk_sektor_kode bsk")->result() as $kk){
			if(!isset($list_sektor[$kk->sektor])){
				$list_sektor[$kk->sektor] = $kk->kode;
			}
		}

		$tpee = $this->M_session->select("SELECT nodaftar,personalblk.nama from personalblk JOIN personal ON nodaftar=id_biodata where (nodaftar like 'MF-%' or nodaftar like 'MI-%' or nodaftar like 'FF-%' or nodaftar like 'FI-%' or nodaftar like 'JP-%') AND personal.statterbang = '' ");
		
		$CI =& get_instance();
		$this->other_db = $CI->load->database('forum', TRUE); 
		foreach ($tpee as $val)
		{
			$dz = explode("-", $val->nodaftar);
			$dz2 = $list_sektor[$dz[0]].$dz[1];
			$datasss = [
			   'pegawai_pin' => $dz2,
			   'pegawai_nama' => $val->nama,
			   'pegawai_alias' => $val->nama,
			];
		   $this->other_db->insert('pegawai', $datasss);
		}
		//print_r($tpee);
	}

}