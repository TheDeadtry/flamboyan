<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailexperience extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailexperience');	
			$this->load->library('form_validation');
		
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

			$data['tampil_data_sektor'] = $this->M_detailexperience->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailexperience->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailexperience->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailexperience->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailexperience->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailexperience->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailexperience->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_detailexperience->tampil_data_jobs();
				$data['tampil_data_keterampilan'] = $this->M_detailexperience->tampil_data_keterampilan();
				$data['tampil_data_hobi'] = $this->M_detailexperience->tampil_data_hobi();
				$data['tampil_data_mata'] = $this->M_detailexperience->tampil_data_mata();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skill'] = $this->M_detailexperience->tampil_data_skill($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailexperience->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungskill'] = $this->M_detailexperience->hitung_data_skill($this->session->userdata("detailuser"));

				$data['checker'] = $this->M_detailexperience->ambildatamod($this->session->userdata("detailuser"), 'data_pptk', 'pptk', 'id_biodata', 'data_pptk');



				
			//user sudah login
				$data['namamodule'] = "detailexperience";
				$data['namafileview'] = "detailexperience";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailexperience";
				$data['namafileview'] = "detailexperience";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}



// ----------------------------------------------------------- data alasan -------------------------------------------------------

	function dataalasanberhenti(){
		$data = $this->db->query("SELECT * FROM dataalasan")->result();
		$isi = "";
		foreach ($data as $key => $negara) {
			$isi .= "<li><button onclick='alasan(".'"'.$negara->isi.'"'.")' class='negara'>".$negara->isi."</button></li>";
		}

		exit($isi);
	}

	function dataalasanberhentiAutocomplete(){
		$data = $this->db->query("SELECT * FROM dataalasan")->result();
		$isi = array();
		foreach ($data as $key => $negara) {
			$isi[] = $negara->isi;
		}

		$kirim = json_encode($isi);
		exit($kirim);
	}

// ----------------------------------------------------------- data posisi -------------------------------------------------------

	function dataposisi(){
		$data = $this->db->query("SELECT * FROM dataposisi")->result();
		$isi = "";
		foreach ($data as $key => $negara) {
			$isi .= "<li><button onclick='posisi(".'"'.$negara->isi.'"'.")' class='negara'>".$negara->isi."</button></li>";
		}

		exit($isi);
	}

	function dataposisiAutocomplete(){
		$data = $this->db->query("SELECT * FROM dataposisi")->result();
		$isi = array();
		foreach ($data as $key => $negara) {
			$isi[] = $negara->isi;
		}

		$kirim = json_encode($isi);
		exit($kirim);
	}


// ----------------------------------------------------------- data negara -------------------------------------------------------

	function datanegara(){
		$data = $this->db->query("SELECT * FROM datanegara")->result();
		$isi = "";
		foreach ($data as $key => $negara) {
			$isi .= "<li><button onclick='negara(".'"'.$negara->isi.'"'.")' class='negara'>".$negara->isi."</button></li>";
		}

		exit($isi);
	}

	function datanegaraAutocomplete(){
		$data = $this->db->query("SELECT * FROM datanegara")->result();
		$isi = array();
		foreach ($data as $key => $negara) {
			$isi[] = $negara->isi;
		}

		$kirim = json_encode($isi);
		exit($kirim);
	}

	// ----------------------------------------------------- data kategori usaha --------------------------------------------------

	function datakategoripekerjaan(){
		$data = $this->db->query("SELECT * FROM kategoripekerjaan")->result();
		$isi = "";
		foreach ($data as $key => $negara) {
			$isi .= "<li><button onclick='kategoripekerjaan(".'"'.$negara->isi.'"'.")' class='negara'>".$negara->isi.$negara->mandarin."</button></li>";
		}

		exit($isi);
	}

	function datakategoripekerjaanAutocomplete(){
		$data = $this->db->query("SELECT * FROM kategoripekerjaan")->result();
		$isi = array();
		foreach ($data as $key => $negara) {
			$isi[] = $negara->isi;
		}

		$kirim = json_encode($isi);
		exit($kirim);
	}

	// ------------------------------------------------------ data pekerajaan -------------------------------------------------------


	function datapekerjaan(){
		$ditrima = $_POST['diminta'];


		$kategori = $this->M_detailexperience->ambildatamod($ditrima, "id_kategori", "kategoripekerjaan", "isi", "id_kategori");


		$data = $this->db->query("SELECT * FROM datapekerjaan WHERE id_kategori = $kategori")->result();
		$isi = '';
		$no = 1;
		foreach ($data as $key => $negara) {
			$isi .= '<li><input type="checkbox" class="datadetailpekerjaan" id="data'.$no.'" value="'.$negara->isi.$negara->mandarin.'"><label for="data'.$no.'">'.$negara->isi.$negara->mandarin.'</label></li>';
			$no++;
		}
		// $kirim = json_encode($isi);
		exit($isi);
	}

	// ------------------------------------------------------ simpan data -------------------------------------------------------


	function simpandata(){
		$id_biodata = $_POST['id_biodata'];
		$negara = $_POST['negara'];
		$jenis_usaha = $_POST['jenis_usaha'];
		$jenisusaha = $this->M_detailexperience->ambildatamod($jenis_usaha, 'id_kategori', 'kategoripekerjaan', 'isi', 'id_kategori');
		$posisi = $_POST['posisi'];
		$penjelasan = $_POST['penjelasan'];
		$masa_kerja = $_POST['masa_kerja'];
		$masa_bulan = $_POST['masa_bulan'];
		$tahun = $_POST['tahun'];
		$alasan= $_POST['alasan'];
		$nama_perusahaan= $_POST['nama_perusahaan'];
		$satuan= $_POST['satuan'];
		$gaji= $_POST['gaji'];
		$detail_gaji= $_POST['detail_gaji'];
		
		$simpan = $this->db->query("INSERT INTO working (
	id_working,
	id_biodata,
	negara,
	jenis_usaha,
	posisi,
	penjelasan,
	masa_kerja,
	masabulan,
	tahun,
	alasan,
	nama_perusahaan,
	satuan,
	gaji,
	detail_gaji
)
VALUES
	(
		'',
		'$id_biodata',
		'$negara',
		'$jenisusaha',
		'$posisi',
		'$penjelasan',
		'$masa_kerja',
		'$masa_bulan',
		'$tahun',
		'$alasan',
		'$nama_perusahaan',
		'$satuan',
		'$gaji',
		'$detail_gaji'
	)");


		if ($simpan) {
			echo $id_biodata;
		}else{
			echo "gagal disimpan";
		}
	}


// ----------------------------------------------------- update data working -----------------------------------------------------


	function updatedataworking(){
		$id_biodata = $_POST['id_biodata'];
		$negara = $_POST['negara'];
		$jenis_usaha = $_POST['jenis_usaha'];
		$jenisusaha = $this->M_detailexperience->ambildatamod($jenis_usaha, 'id_kategori', 'kategoripekerjaan', 'isi', 'id_kategori');
		$posisi = $_POST['posisi'];
		$penjelasan = $_POST['penjelasan'];
		$masa_kerja = $_POST['masa_kerja'];
		$masa_bulan = $_POST['masa_bulan'];
		$tahun = $_POST['tahun'];
		$alasan= $_POST['alasan'];
		$nama_perusahaan= $_POST['nama_perusahaan'];
		$satuan= $_POST['satuan'];
		$gaji= $_POST['gaji'];
		$detail_gaji= $_POST['detail_gaji'];
		$id_working= $_POST['id_working'];

		$updatedata = $this->db->query("UPDATE working SET
			negara = '$negara',
			jenis_usaha = '$jenisusaha',
			posisi = '$posisi',
			penjelasan = '$penjelasan',
			masa_kerja	= '$masa_kerja',
			masabulan = '$masa_bulan',
			tahun = '$tahun',
			alasan = '$alasan',
			nama_perusahaan = '$nama_perusahaan',
			satuan = '$satuan',
			gaji = '$gaji',
			detail_gaji = '$detail_gaji' WHERE id_working = '$id_working'
		 ");
	}


// ----------------------------------------------------- tampilkan data working --------------------------------------------------


	function tampildataworking($idnya){
		$data = $this->db->query("SELECT * FROM working where id_biodata like '%$idnya%'")->result();
		$isi = '';
		$no = 1;
		foreach ($data as $key => $negara) {
			$jenisusaha = $negara->jenis_usaha;
			$jenis_usaha = $this->M_detailexperience->ambildatamod($jenisusaha, 'isi', 'kategoripekerjaan', 'id_kategori','isi');
			$isi .= '
			<tr>
				<td><button class="btn btn-info">preview</button></td>
				<td>'.$no.'</td>
				<td>'.$negara->negara.'</td>
				<td>'.$negara->nama_perusahaan.'</td>
				<td>'.$jenis_usaha.'</td>
				<td>'.$negara->penjelasan.'</td>
				<td>'.$negara->posisi.'</td>
				<td>'.$negara->masa_kerja.'-'.$negara->masabulan.'</td>
				<td>'.$negara->tahun.'</td>
				<td>'.$negara->alasan.'</td>
				<td>'.$negara->satuan.' '.$negara->gaji.' '.$negara->detail_gaji.'</td>
				<td><button class="btn btn-warning" onclick="editdata('."'".$negara->id_working."'".')">edit</button><button class="btn btn-danger" ondblclick="hapus('."'".$negara->id_working."'".')">hapus</button></td>
			</tr>
			';
		$no++;
		}

		exit($isi);
	}

// ----------------------------------------------------- tampilkan working edit --------------------------------------------------

	function tampileditworking($idnya){
		$jenisusaha = $this->M_detailexperience->ambildatamod($idnya, "jenis_usaha", "working", "id_working", "jenis_usaha");
		$lihat = array(
			"negara" => $this->M_detailexperience->ambildatamod($idnya, "negara", "working", "id_working", "negara"),
			"nama_perusahaan" => $this->M_detailexperience->ambildatamod($idnya, "nama_perusahaan", "working", "id_working", "nama_perusahaan"),
			"jenis_usaha" => $this->M_detailexperience->ambildatamod($jenisusaha, "isi", "kategoripekerjaan", "id_kategori", "isi"),
			"penjelasan" => $this->M_detailexperience->ambildatamod($idnya, "penjelasan", "working", "id_working", "penjelasan"),
			"posisi" => $this->M_detailexperience->ambildatamod($idnya, "posisi", "working", "id_working", "posisi"),
			"masa_kerja" => $this->M_detailexperience->ambildatamod($idnya, "masa_kerja", "working", "id_working", "masa_kerja"),
			"masabulan" => $this->M_detailexperience->ambildatamod($idnya, "masabulan", "working", "id_working", "masabulan"),
			"tahun" => $this->M_detailexperience->ambildatamod($idnya, "tahun", "working", "id_working", "tahun"),
			"alasan" => $this->M_detailexperience->ambildatamod($idnya, "alasan", "working", "id_working", "alasan"),
			"satuan" => $this->M_detailexperience->ambildatamod($idnya, "satuan", "working", "id_working", "satuan"),
			"gaji" => $this->M_detailexperience->ambildatamod($idnya, "gaji", "working", "id_working", "gaji"),
			"detail_gaji" => $this->M_detailexperience->ambildatamod($idnya, "detail_gaji", "working", "id_working", "detail_gaji")
		);
		

		$encode = json_encode($lihat);
		exit($encode);
	}




// ----------------------------------------------------- tampilkan data working --------------------------------------------------

	function hapusdata($key){
		$aksi = $this->db->query("DELETE FROM working WHERE id_working = '$key'");
	}



}