<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Agen_tambah_tki extends MX_Controller{
	public function __construct(){
			parent::__construct();
			$this->load->model('modelku');
			$this->load->model('M_session');
	}

	function majikan_tki($idagen = '0001'){
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

				$data['idagen'] = $idagen;

				$dataagen = $this->db->query("SELECT * FROM dataagen WHERE id_agen = '$idagen'")->row();

				$data['namamajikan'] = $dataagen->nama;

				$data['namamajikanmandarin'] = $dataagen->namamandarin;

				$data['namamodule'] = "agen_tambah_tki";
				$data['namafileview'] = "pilih_pkl";
				echo Modules::run('template/new_admin_template', $data);
			}
		}
	}



	function simpan_data_ke_marka_biotoagen(){


		echo "this page is active";
		echo "<br>";
		echo "simpan data ke markabioto agen";
		echo "<br>";
		echo "ubha filter berdasarkan tanggal";
		echo "<br>";
		echo "buat tampilan distic berdasarkan tanggal kirim majikan";
		echo "<br>";
		echo "buat menu klik untuk lihat data tki yang dockumennya dikirim";


		$tgl_to_agen = $_POST['tgl_to_agen'];
		$biodata = $_POST['biodata'];
		$idagen = $_POST['idagen'];


		$datagen = $this->db->query("SELECT * FROM dataagen WHERE id_agen = '$idagen'")->row();

		$nama_agen = $idagen;
		$group_to_agen = $datagen->kode_group;

		if (isset($_POST['tgl_pauliu'])) {
			$tgl_pauliu = $_POST['tgl_pauliu'];
		}else{
			$tgl_pauliu = "";
		}

		if (isset($_POST['tgl_inter'])) {
			$tgl_inter = $_POST['tgl_inter'];
		}else{
			$tgl_inter = "";
		}




		foreach ($biodata as $key => $id_biodata) {

			$this->db->query("INSERT INTO
			marka_biotoagen (id_marka_bioagen,
			id_biodata,
			tgl_to_agen,
			nama_agen,
			grup_to_agen,
			nama_pabrik,
			tgl_pauliu,
			tgl_inter,
			tgldilepas) VALUES (
				'',
				'$id_biodata',
				'$tgl_to_agen',
				'$nama_agen',
				'$group_to_agen',
				'',
				'$tgl_pauliu',
				'$tgl_inter',
				'')");

		}

		redirect("agen_tambah_tki/majikan_tki/".$nama_agen);


	}




	function tampilkan_distik_markabio($key = ""){

		if (isset($_POST['filter1'])) {
			$filter1 = $_POST['filter1'];
			$where2 = "AND tgl_to_agen = '".$filter1."' ";
		}else{
			$where2 = "";
		}

		$cari = "";
		if (isset($_POST['cari'])) {
		  $cari = "AND tgl_to_agen LIKE '%".$_POST['cari']."%'";
		}

		if (isset($_POST['filter2'])) {
			$filter2 = $_POST['filter2'];
		}

		if (isset($_POST['filter3'])) {
			$filter3 = $_POST['filter3'];
		}

		$limit = "LIMIT 0, 5";

		$pagin = 0;
		if (isset($_POST['halaman'])) {
			$pagin = ($_POST['halaman']-1)*5;
			$limit = "LIMIT ".$pagin.", 5";
		}

		$where = "nama_agen = ".$key." ".$cari;


		$kunci = $_POST['key'];

		if ($kunci == 'tabletglterbang') {

			$data = $this->db->query("
				SELECT
					DISTINCT(tgl_to_agen),
					nama_agen,
					grup_to_agen
				FROM
					marka_biotoagen
				WHERE
					$where
				AND
					tgldilepas = ''
					$cari
				ORDER BY
					tgl_to_agen DESC
					$limit
					")->result();

			$total_data = $this->db->query("
				SELECT
					DISTINCT(tgl_to_agen),
					nama_agen,
					grup_to_agen
				FROM
					marka_biotoagen
				WHERE
					$where
				AND
					tgldilepas = ''
				ORDER BY
					id_marka_bioagen DESC
			")->result();




		}elseif ($kunci == 'tampiltki') {
			$data = $this->db->query("
				SELECT

					DISTINCT(tgl_to_agen),
					id_biodata,
					nama_agen,
					grup_to_agen,
					nama_pabrik,
					tgl_pauliu,
					tgl_inter,
					nama_mandarin
				FROM
					marka_biotoagen
				WHERE
					$where
				AND
					tgl_to_agen = '$filter3'
				AND
					tgldilepas = ''
				ORDER BY
					id_marka_bioagen DESC
					")->result();
		}



		$nilai_data = "";


		if ($kunci == "tabletglterbang") {
			$no = 1+$pagin;
			foreach ($data as $key => $value) {


				$ambil_nama_agen = $this->modelku->ambildatamod($value->nama_agen, "nama", "dataagen", "id_agen", "*" );
				$ambil_nama_group_agen = $this->modelku->ambildatamod($value->grup_to_agen, "nama", "datagroup", "id_group", "*" );


				$nilai_data .= "

					<tr>
						<td>".$no."</td>
						<td>".$value->tgl_to_agen."</td>
						<td>".$ambil_nama_group_agen."</td>
						<td class='text-center'>

							<button class='btn btn-success ubahbio' data-agen='".$value->nama_agen."' >ubah kirim bio</button>

							<button
							 type='button'
							 onclick='tampiltkikirimbio(".'"'.$value->tgl_to_agen.'","'.$key.'","'.$value->tgl_to_agen.'"'.")' type='button' class='btn btn-info margin-5'>
								lihat
							</button>

							<button
							 type='button'
							 onclick='hapusalldatatoagen(".'"'.$value->tgl_to_agen.'"'.")' class='btn btn-danger tampilDatanya margin-5'>
								Hapus
							</button>

							<button
							 type='button'
							 onclick='printpertgltoagen(".'"'.$value->tgl_to_agen.'"'.")' class='btn btn-primary tampilDatanya margin-5'>
								Print
							</button>


						</td>
					</tr>



				";

				$no++;
			}

			$halaman = count($total_data);
			$halaman = ceil($halaman/5);
			$pagination = "";
			if ($pagin > 0) {
			  $pagination .= "<li><a class='pagin' data='tabletglterbang' href='#'><<</a></li>";
			}
			for ($i=0; $i < $halaman; $i++) {
			  $pagination .= "<li><a class='pagin' data='tabletglterbang' href='#'>".($i+1)."</a></li>";
			}

			if ($pagin < (($halaman*5)-5) ) {
			  $pagination .= "<li><a class='pagin' data='tabletglterbang' href='#'>>></a></li>";
			}



			$exitdata = array(
				'data' => $nilai_data,
				'pagination' => $pagination,
			);

		exit(json_encode($exitdata));
		}


		if ($kunci == "tampiltki") {

		 $no = 1;
			foreach ($data as $key => $value) {

				$nama_tki = $this->modelku->ambildatamod($value->id_biodata, "nama", "personal", "id_biodata", "nama" );

				if (is_numeric($value->nama_pabrik)) {
				  $nama_majikan = $this->modelku->ambildatamod($value->nama_pabrik, "nama", "datamajikan", "id_majikan", "nama");
				}else{
				  $nama_majikan = $value->nama_pabrik;
				}

				$pernyataan_sudahmjikan = $this->modelku->ambildatamod($value->id_biodata, "id_biodata" , "majikan", "id_biodata", "id_biodata");

				if ($pernyataan_sudahmjikan == NULL || $pernyataan_sudahmjikan == '') {
				  $status_majikan = "belum majikan";
				}else{
				  $status_majikan = "sudah majikan";
				}

				$nilai_data .= "

					<tr>
						<td>".$no."</td>
						<td><button onclick='ubahmajikannya(".'"'.$value->id_biodata.'","'.$value->tgl_to_agen.'","'.$value->nama_agen.'"'.")' class='btn btn-info'>ubah majikan</button></td>
						<td>".$value->id_biodata."</td>
						<td>".$nama_tki."</td>
						<td>".$nama_majikan."</td>
						<td class='edit-spc'>
							<input class='edt-data datainput1'
							data-agen='".$value->nama_agen."'
							data-toagen='".$value->tgl_to_agen."'
							data-id='".$value->id_biodata."' input-tanggal' id='pauliu".$no."' type='text' disabled value='".$value->tgl_pauliu."'>
						</td>
						<td class='edit-spc'>
							<input class='edt-data datainput2' data-agen='".$value->nama_agen."' data-toagen='".$value->tgl_to_agen."' data-id='".$value->id_biodata."'  id='interview".$no."' type='text' disabled value='".$value->tgl_inter."'>
						</td>
						<td class='text-center'>
							<input type='button'
							data-bio='".$value->id_biodata."'
							data-agen='".$value->nama_agen."'
							data-grup='".$value->grup_to_agen."'
							data-majikan='".$value->nama_pabrik."'
							data-majikanman='".$value->nama_mandarin."'
							class='btn btn-primary kirim-ke-majikan' value='".$status_majikan."' />

							<button class='btn btn-success link' data-bio='".$value->id_biodata."'>Link</button>



							<a class='btn btn-success margin-5' onclick='lepastki(".'"'.$value->id_biodata.'","'.$value->tgl_to_agen.'"'.")' >lepas</a>
							<a class='btn btn-danger margin-5' onclick='hapustkidaridaftar(".'"'.$value->id_biodata.'","'.$value->tgl_to_agen.'","'.$value->nama_pabrik.'"'.")' >hapus</a>
						</td>
					</tr>

				";

				$no++;
			}

		exit($nilai_data);

		}
	}


	function updatedatakirimbio()
	{
		$idgroup = $_POST['editmajikan'];
		$tgl_to_agen = $_POST['edittoagen'];
		$tgl_pauliu = $_POST['editpauliu'];
		$tgl_inter = $_POST['editinterview'];
		$namaagen = $_POST['editnamaagen'];


		// echo $tgl_inter.' '.$tgl_pauliu.' '.$tgl_inter.' '.$idgroup;

		$update = $this->db->query("UPDATE marka_biotoagen
		SET tgl_pauliu = '$tgl_pauliu',
		tgl_inter = '$tgl_inter'
		WHERE tgl_to_agen = '$tgl_to_agen'
		AND grup_to_agen = '$idgroup'
		AND nama_agen = '$namaagen'
		 ");

		if ($update) {
			echo "data sudah di update ";
		}else{
			echo "data gagal update ";
		}

		redirect("agen_tambah_tki/majikan_tki/".$namaagen);

	}


	function ambildatasesiini(){
		$idagen =  $_POST['idagen'];
		$tgl = $_POST['tgl'];




		$datanya = $this->db->query("SELECT * FROM marka_biotoagen WHERE nama_agen = '$idagen' AND tgl_to_agen = '$tgl'")->row();


		$data = array(

			"namaagen" => $datanya->nama_agen,
			"tgltoagen" => $datanya->tgl_to_agen,
			"tglpauliu" => $datanya->tgl_pauliu,
			"tglinter" => $datanya->tgl_inter
		);

		echo json_encode($data);

	}


	function ambil_data_tki(){

		if (isset($_POST['limit'])) {
			$start = $_POST['start'];
			$limit = $_POST['limit'];
			$pencarian = "";
			if ($_POST['pencarian']!= "") {
				$pencarian = "WHERE id_biodata LIKE '%".strtoupper($_POST['pencarian'])."%' OR nama LIKE '%".strtoupper($_POST['pencarian'])."%'";
			}
			$data = $this->db->query("SELECT * FROM personal $pencarian LIMIT $start, $limit")->result();
		}else{
			$data = $this->db->query("SELECT * FROM personal")->result();
		}


		$filedata = "";

		if (isset($_POST['key'])) {
			if ($_POST['key'] == 'tambah1')
			{

				foreach ($data as $key => $value) {
					$filedata .= "


					<label>
						<input datacari='"."'".$value->id_biodata."'"."' type='checkbox' name='cekdata' value='".$value->id_biodata."' /> ".$value->id_biodata.' '.$value->nama."
					</label>


					";
				}

			}
		}else{

			foreach ($data as $key => $value) {
				$filedata .= "<option value='".$value->id_biodata."'>".$value->id_biodata.' '.$value->nama."</option>";
			}

		}



		exit($filedata);

	}


	function ambildatamajikan(){

		if (isset($_POST['pencarian'])) {
			$cari =  'AND nama LIKE "%'.strtoupper($_POST['pencarian']).'%"';
		}else{
			$cari = '';
		}

		$kode_agen = $_POST['kodeagen'];
		$idmajikan = $_POST['idmajikan'];

		$idbio = $_POST['idbio'];
		$tgltoagen = $_POST['tgltoagen'];


		$data = $this->db->query("SELECT
		 *
		 FROM datamajikan
		 WHERE kode_majikan != ''
		 AND nama != ''
		 AND kode_agen = '$kode_agen' $cari
		 ORDER BY nama
		 ASC ")->result();

		$html = '';
		foreach ($data as $key => $value) {
			$html .= '
				<a onclick="simpanmajikan('."'".$idbio."','".$tgltoagen."','".$idmajikan."','".$value->id_majikan."'".')">'.$value->nama.'</a>
			';
		}


		exit($html);


	}

	function simpanmajikankebaru()
	{

		$idbio = $_POST['idbio'];
		$tgltoagen = $_POST['tgltoagen'];
		$nama_agen = $_POST['majikanawal'];
		$majikanubah = $_POST['majikanubah'];

		// echo $idbio.' - '.$tgltoagen.' - '.$nama_agen.' - '.$majikanubah;




		$update = $this->db->query("UPDATE marka_biotoagen
										SET nama_pabrik = '$majikanubah'
										WHERE tgl_to_agen = '$tgltoagen'
										AND id_biodata = '$idbio'
										AND nama_agen = '$nama_agen'
									");


		if ($update) {
			echo "data diubah";
		}else{
			echo "data tidak diubah";
		}

	}


	function simpantgldilepas(){
		$idtki =  $_POST["idtki"];
		$tgldilepas = $_POST["tgldilepas"];
		$tgl = $_POST["tgl"];


		$simpan = $this->db->query("UPDATE marka_biotoagen SET tgldilepas = '$tgldilepas' WHERE id_biodata = '$idtki' AND tgl_to_agen = '$tgl' ");

		if ($simpan) {
			echo "disimpan";
		}else{
			echo "tidak disimpan";
		}


	}


	function hapustkidaridaftar(){
		$idtki =  $_POST["idtki"];

		$tgl = $_POST["tgl"];

		$hapus = $this->db->query("DELETE FROM marka_biotoagen WHERE id_biodata = '$idtki' AND tgl_to_agen = '$tgl' ");

		if ($hapus) {
			echo "dihapus";
		}else{
			echo "tidak dihapus";
		}

	}


	function hapusdataalltoagen()
	{
		$tgl = $_POST['tanggal'];
		$namaPabrik = $_POST['idmajikan'];
		$hapus = $this->db->query("DELETE
									FROM
										marka_biotoagen
									where tgl_to_agen = '$tgl'
									AND nama_agen = '$namaPabrik'
		");

		if ($hapus) {
			echo "data telah dihapus";
		}else{
			echo "data tidak dihapus";
		}

	}


	 function datatkidilepas(){



		if (isset($_POST['pencarian']) ) {
			$pencarian = 'AND id_biodata LIKE "%'.$_POST['pencarian'].'%" ';
		}else{
			$pencarian = '';
		}


		$idmajikan = $_POST['idmajikan'];

		if ($_POST['render'] != '') {
				$render = $_POST['render'];
		}else{
				$render= 4;

		}


		if (isset($_POST['pages'])) {

			$start = $render*$_POST['pages'];
			$limit = 4;

		}else{
			$start = 0;
			$limit = 4;
		}

		$total = $this->db->query("
		SELECT
			*
		FROM marka_biotoagen
		WHERE
			nama_agen = '$idmajikan'
		AND tgldilepas != '' $pencarian  ")->result();

		$data = $this->db->query("
		SELECT
			*
		FROM marka_biotoagen
			WHERE
		nama_agen = '$idmajikan'
		AND tgldilepas != '' $pencarian
		ORDER BY id_marka_bioagen
		DESC
		limit $start, $limit ")->result();



		$html = "";

		$angka = 1;

		foreach ($data as $key => $value) {

			$ambilnama = $this->modelku->ambildatamod($value->id_biodata, "nama", "personal", "id_biodata", "nama");

			$html .= "

			<tr>
				<td>".($angka+$start)."</td>
				<td>".$value->id_biodata."</td>
				<td>".$ambilnama."</td>
				<td><a onclick='keluarkandata(".'"'.$value->id_biodata.'","'.$value->tgl_to_agen.'","'.$value->nama_pabrik.'"'.")' class='btn btn-danger'>keluarkan</a></td>
			</tr>


			";

			$angka++;
		}


		$json = array(
			"tabel"         => $html,
			"limit"         => $limit,
			"start"         => $start,
			"render"        => $render,
			"banyakdata"    => count($total)

		);

		echo json_encode($json);
	}


	function keluarkan(){
		$id = $_POST['id'];
		$tgl = $_POST['tgl'];
		$idmajikan = $_POST['idmajikan'];


		$keluarkan = $this->db->query("DELETE FROM marka_biotoagen WHERE id_biodata = '$id' AND tgl_to_agen = '$tgl' AND nama_pabrik = '$idmajikan'  ");

		if ($keluarkan) {
			echo "telah dikeluarkan";
		}else{
			echo "tidak jadi";
		}
	}



	function update_data_marka_biotoagen(){

		$id_biodata = $_POST['idBio'];
		$datatoagen = $_POST['datatoagen'];
		$dataagen = $_POST['dataagen'];
		$tgl_pauliu = $_POST['tglpauliu'];

		if ($_POST['key'] == 'pauliu') {

		  for ($i=0; $i < count($id_biodata) ; $i++) {
			$this->db->query("UPDATE marka_biotoagen SET tgl_pauliu = '".$tgl_pauliu[$i]."' WHERE id_biodata = '".$id_biodata[$i]."' AND tgl_to_agen = '".$datatoagen[$i]."' AND nama_agen = '".$dataagen[$i]."'");
		  }

		}elseif ($_POST['key'] == 'interview') {
		  for ($i=0; $i < count($id_biodata) ; $i++) {
			$this->db->query("UPDATE marka_biotoagen SET tgl_inter = '".$tgl_pauliu[$i]."' WHERE id_biodata = '".$id_biodata[$i]."' AND tgl_to_agen = '".$datatoagen[$i]."' AND nama_agen = '".$dataagen[$i]."'");
		  }
		}elseif ($_POST['key'] == 'pauliuone') {
		  $this->db->query("UPDATE marka_biotoagen SET tgl_pauliu = '".$tgl_pauliu."' WHERE id_biodata = '".$id_biodata."' AND tgl_to_agen = '".$datatoagen."' AND nama_agen = '".$dataagen."'");
		}elseif ($_POST['key'] == 'interviewone') {
		  $this->db->query("UPDATE marka_biotoagen SET tgl_inter = '".$tgl_pauliu."' WHERE id_biodata = '".$id_biodata."' AND tgl_to_agen = '".$datatoagen."' AND nama_agen = '".$dataagen."'");
		}

		echo "disimpan";
	}


	function simpan_perubahan_pabrik(){



	  $ubah  = $this->db->query("UPDATE
		marka_biotoagen
		  SET
		nama_pabrik = '".$_POST['nama_pabrik']."',
		nama_mandarin = '".$_POST['nama_mandarin']."'
		  WHERE
		id_biodata = '".$_POST['idbio']."'
		  AND
		tgl_to_agen = '".$_POST['tgltoagen']."'
		  AND
		nama_agen = '".$_POST['kodeagen']."' ");


	  if ($ubah) {
		echo "diubah";
	  }else{
		echo "tidak jadi diubah";
	  }
	}

	function data_edit_tambah_majikan(){
	  $kode_agen = $_POST['kodeagen'];
	  $idbio = $_POST['idbio'];
	  $tgltoagen = $_POST['tgltoagen'];

	  $data =  $this->db->query("SELECT * FROM marka_biotoagen WHERE id_biodata = '$idbio' AND nama_agen = '$kode_agen' AND tgl_to_agen = '$tgltoagen' ")->row();

	  $kirim = array(
		"majikan" => $data->nama_pabrik,
		"mandarin" => $data->nama_mandarin
	  );

	  $datajson = json_encode($kirim);

	  exit($datajson);


	}


// dalam ujicoba

	function simpan_data_ke_majikan(){

	  $id_biodata =   $_POST['id_biodata'];
	  $kode_group =   $_POST['kode_group'];
	  $kode_agen =   $_POST['kode_agen'];
	  $kode_majikan =   $_POST['kode_majikan'];
	  $namataiwan =   htmlspecialchars($_POST['namataiwan']);

	  $cek_data_majikan = $this->modelku->ambildatamod($id_biodata, "id_biodata", "majikan", "id_biodata", "id_biodata");

	  if ($cek_data_majikan == NULL || $cek_data_majikan == '') {
		if (is_numeric($kode_majikan)) {
		  $simpan = $this->db->query("INSERT
			  INTO majikan (
				id_biodata,
				kode_group,
				kode_agen,
				kode_majikan,
				kode_suhan,
				kode_visapermit,
				statustglterbang,
				id_majikan,
				simpansuhan,
				kirimsuhan,
				simpanvisapermit,
				kirimvisapermit
			  ) VALUES (
				'$id_biodata',
				'$kode_group',
				'$kode_agen',
				'$kode_majikan',
				'0',
				'0',
				'0',
				'0',
				'0',
				'0',
				'0',
				'0'
			  )
			");
		  }else{
			$simpan = $this->db->query("INSERT
				INTO majikan (
				  id_biodata,
				  kode_group,
				  kode_agen,
				  kode_majikan,
				  namamajikan,
				  namataiwan,
				  kode_suhan,
				  kode_visapermit,
				  statustglterbang,
				  id_majikan,
				  simpansuhan,
				  kirimsuhan,
				  simpanvisapermit,
				  kirimvisapermit
				) VALUES (
				  '$id_biodata',
				  '$kode_group',
				  '$kode_agen',
				  '',
				  '$kode_majikan',
				  '$namataiwan',
				  '0',
				  '0',
				  '0',
				  '0',
				  '0',
				  '0',
				  '0',
				  '0'
				)
			  ");
		  }
	  }else{

// clear

		if (is_numeric($kode_majikan)) {
			$simpan = $this->db->query("UPDATE majikan 
											SET
										kode_group = '$kode_group',
										kode_agen = '$kode_agen',
										kode_majikan = '$kode_majikan'
											WHERE
										id_biodata = '$id_biodata'

				 ");
		}else{
			$simpan = $this->db->query("UPDATE majikan 
											SET
										kode_group = '$kode_group',
										kode_agen = '$kode_agen',
										namamajikan = '$kode_majikan',
										namataiwan = '$namataiwan'
											WHERE
										id_biodata = '$id_biodata'
				 ");
		}


	  }

	  if ($simpan) {
		echo "berhasil disimpan";
	  }else{
		echo "gagal disimpan";
	  }


	}



	function link($data, $id){


		 $this->session->set_userdata('detailuser', $id);

		redirect($data);

	}


		function ubahtgltoagen(){
			$data =  $_POST['data_agen'];

				$datanya = $this->db->query("SELECT * FROM marka_biotoagen WHERE nama_agen = '".$data."' AND tgl_to_agen = ''")->result();

					$html = "";

					foreach ($datanya as $key => $value) {

							$ambil_nama = $this->modelku->ambildatamod($value->id_biodata, "nama", "personal", "id_biodata", "nama"); 


							$html .= "

								<tr>
									<td>".$value->id_biodata."</td>
									<td>".$ambil_nama."</td>
									<td><input type='text' class='edit-to-agen' data-agen='".$value->nama_agen."' data-bio='".$value->id_biodata."' placeholder='edit' /></td>
								</tr>




							";


					}

						exit($html);
	
		}


		function ubahdatatanggaltoagen(){


			$id_biodata = $_POST['id_biodata'];
			$nama_agen = $_POST['nama_agen'];
			$tgl_to_agen = $_POST['tgl_to_agen'];


			for ($i=0; $i < count($id_biodata); $i++) { 

				$simpan = $this->db->query("UPDATE marka_biotoagen SET tgl_to_agen = '$tgl_to_agen[$i]' WHERE nama_agen = '$nama_agen[$i]' AND id_biodata = '$id_biodata[$i]' ");

			}


			if ($simpan) {
						echo "disimpan";
			}else{
						echo "tidak disimpan";
			}


		}


}
