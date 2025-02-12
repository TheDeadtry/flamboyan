<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pekerjaana extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pekerjaan');			
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
			//user sudah login
				// $data['namamodule'] = "pekerjaana";
				// $data['namafileview'] = "tampilkan_data";
				// echo Modules::run('template/admin_template', $data);
				$data['datapekerjaan'] = $this->db->query("SELECT * FROM kategoripekerjaan ORDER BY isi ASC")->result();
				$data['namamodule'] = "pekerjaana";
				$data['namafileview'] = "pekerjaanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "pekerjaana";
				$data['namafileview'] = "pekerjaanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function hapusdatasaya(){
		$id = $_POST['id'];
		$hapus = $this->db->query("DELETE FROM datapekerjaan WHERE id_pekerjaan = ".$id." ");
		if ($hapus) {
			$response ="success to delete";
		}else{
			$response ="failed to delete";
		}
		exit($response);
	}

	function hapusdatasayadua(){
		$id = $_POST['id'];
		$hapus = $this->db->query("DELETE FROM kategoripekerjaan WHERE id_kategori = ".$id." ");
		if ($hapus) {
			$response ="success to delete";
		}else{
			$response ="failed to delete";
		}
		exit($response);
	}


	

	function tambahkanUsaha(){
		$a = $_POST['dataa'];
		$b = $_POST['datab'];

		$tambah = $this->db->query('INSERT INTO kategoripekerjaan (isi, mandarin) VALUE ("'.$a.'", "'.$b.'")');
		if ($tambah) {
			$response ="success to uptodate";
		}else{
			$response ="failed to uptodate";
		}
		exit($response);
	}

	function tambahkanPekerjaan(){
		$a = $_POST['dataa'];
		$b = $_POST['datab'];
		$c = $_POST['datac'];

		$tambah = $this->db->query('INSERT INTO datapekerjaan (id_kategori, isi, mandarin) VALUE ('.$a.', "'.$b.'","'.$c.'")');
		if ($tambah) {
			$response ="success to uptodate";
		}else{
			$response ="failed to uptodate";
		}
		exit($response);
	}



	function edit_data(){
		$idData = $_POST['id'];
		$Pekerjaan = $_POST['pekerjaan'];
		$kategori = $_POST['kategori'];
		$Mandarin = $_POST['mandarin'];
		$uptodate = $this->db->query("UPDATE datapekerjaan SET isi = '".$Pekerjaan."', mandarin = '".$Mandarin."', id_kategori = ".$kategori." WHERE id_pekerjaan = ".$idData." ");
		if ($uptodate) {
			$response ="success to uptodate";
		}else{
			$response ="failed to uptodate";
		}
		exit($response);

	}

	function edit_data_2(){
		$idData = $_POST['id'];
		$Pekerjaan = $_POST['pekerjaan'];
		$Mandarin = $_POST['mandarin'];
		$uptodate = $this->db->query("UPDATE kategoripekerjaan SET isi = '".$Pekerjaan."', mandarin = '".$Mandarin."' WHERE id_kategori = ".$idData." ");
		if ($uptodate) {
			$response ="success to uptodate";
		}else{
			$response ="failed to uptodate";
		}
		exit($response);

	}

	function data_all($limites, $news){
		$perPage = 10;
		$limit = isset($limites) ? (int)$limites : 1;
		$start = ($limit > 1) ? ($limit * $perPage) - $perPage : 0;
		$current_page = isset($news)  ? (int)$news : 1;

		$datapekerjaan = $this->db->query("SELECT * FROM datapekerjaan")->result();
		$datapekerjaan_all = $this->db->query("SELECT * FROM datapekerjaan LIMIT ".$start.", ".$perPage." ")->result();
		$response = "
			<table class='table table-bordered table-striped' style='margin-bottom:0;'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
		";
		$no = 1;
		foreach ($datapekerjaan_all as $key => $nilai_data) {
			 	$kategoriUsaha = $this->M_session->select_row("SELECT * FROM kategoripekerjaan WHERE id_kategori = ".$nilai_data->id_kategori." ");
			 	$response .= "
			 	<tr>
			 		<td>".$no."</td>
			 		<td>".$kategoriUsaha->isi."</td>
			 		<td>".$nilai_data->isi."</td>
			 		<td>".$nilai_data->mandarin."</td>
			 		<td><input type='button' class='btn btn-warning' onclick='edit(".$nilai_data->id_pekerjaan.','.$nilai_data->id_kategori.',"'.$nilai_data->isi.'","'.$nilai_data->mandarin.'"'.")' value='edit'> | <a href='#' class='btn btn-danger' onclick='deletedata(".$nilai_data->id_pekerjaan.")'> delete </a></td>
			 	</tr>";
		$no++;
		}

		$response .= "

		</tbody>
     </table>

     ";
     	$total_halaman = count($datapekerjaan);
     	$pages = ceil($total_halaman/10);

     	if (($current_page+9)>$pages) {
			$endpage = $current_page - ($current_page-$pages);
			}else{
				$endpage = $current_page + 9;
			}

		$response .= "<div class='gg-pagination'>";
		if ($current_page > 1){
			$response .= "<a href='#' onclick='terimadataAll(".($current_page-1).','.($current_page-1).")'>&laquo;</a>";
		}
		for ($i=$current_page; $i < $endpage; $i++) { 
			$response .= "<a href='#' onclick='terimadataAll(".$i.','.$i.")'>".$i."</a>";
		}
		if ($current_page < $pages){
			$response .= "<a href='#' onclick='terimadataAll(".($current_page+1).','.($current_page+1).")'>&raquo;</a>";
		}

		$response .= "</div>";
		// $data['response'] = exit($response);
		// $data['datareponse'] = $response;
		exit($response);

		}

		function data_all_2($limites, $news){
		$perPage = 10;
		$limit = isset($limites) ? (int)$limites : 1;
		$start = ($limit > 1) ? ($limit * $perPage) - $perPage : 0;
		$current_page = isset($news)  ? (int)$news : 1;
		

		$datapekerjaan = $this->db->query("SELECT * FROM kategoripekerjaan")->result();
		$datapekerjaan_all = $this->db->query("SELECT * FROM kategoripekerjaan LIMIT ".$start.", ".$perPage." ")->result();
		$response = "
			<table class='table table-bordered table-striped' style='margin-bottom:0;'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
		";
		$no = 1;
		foreach ($datapekerjaan_all as $key => $nilai_data) {
			 	$response .= "
			 	<tr>
			 		<td>".$no."</td>
			 		<td>".$nilai_data->id_kategori."</td>
			 		<td>".$nilai_data->isi."</td>
			 		<td>".$nilai_data->mandarin."</td>
			 		<td><input type='button' class='btn btn-warning' onclick='editdua(".$nilai_data->id_kategori.',"'.$nilai_data->isi.'","'.$nilai_data->mandarin.'"'.")' value='edit'> | <a href='#' class='btn btn-danger' onclick='deletedatadua(".$nilai_data->id_kategori.")'> delete </a></td>
			 	</tr>";
		$no++;
		}

		$response .= "

		</tbody>
     </table>

     ";
     	$total_halaman = count($datapekerjaan);
     	$pages = ceil($total_halaman/10);

     	if (($current_page+9)>$pages) {
			$endpage = $current_page - ($current_page-$pages);
			}else{
				$endpage = $current_page + 9;
			}

		$response .= "<div class='gg-pagination'>";
		if ($current_page > 1){
			$response .= "<a href='#' onclick='terimadataAllDua(".($current_page-1).','.($current_page-1).")'>&laquo;</a>";
		}
		for ($i=$current_page; $i < $endpage; $i++) { 
			$response .= "<a href='#' onclick='terimadataAllDua(".$i.','.$i.")'>".$i."</a>";
		}
		if ($current_page < $pages){
			$response .= "<a href='#' onclick='terimadataAllDua(".($current_page+1).','.($current_page+1).")'>&raquo;</a>";
		}

		$response .= "</div>";
		// $data['response'] = exit($response);
		// $data['datareponse'] = $response;
		exit($response);

		}

	
	function test($searched, $limites, $news){
		$perPage = 10;
		$limit = isset($limites) ? (int)$limites : 1;
		$start = ($limit > 1) ? ($limit * $perPage) - $perPage : 0;
		$current_page = isset($news)  ? (int)$news : 1;
		$search = str_replace("_", " ", $searched);

		$datapekerjaan = $this->db->query("SELECT * FROM datapekerjaan WHERE isi LIKE '%".$search."%' OR mandarin LIKE '%".htmlspecialchars($search)."%'")->result();
		if ($search == "all") {
		$datapekerjaan_all = $this->db->query("SELECT * FROM datapekerjaan LIMIT ".$start.", ".$perPage." ")->result();	
		}else{
		$datapekerjaan_all = $this->db->query("SELECT * FROM datapekerjaan WHERE isi LIKE '%".$search."%' OR mandarin LIKE '%".htmlspecialchars($search)."%' LIMIT ".$start.", ".$perPage." ")->result();	
		}
			

		$response = "
			<table class='table table-bordered table-striped' style='margin-bottom:0;'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
		";
		$no = 1;
		foreach ($datapekerjaan_all as $key => $nilai_data) {
			 	$response .= "
			 	<tr>
			 		<td>".$no."</td>
			 		<td>".$nilai_data->id_kategori."</td>
			 		<td>".$nilai_data->isi."</td>
			 		<td>".$nilai_data->mandarin."</td>
			 		<td><input type='button' class='btn btn-warning' onclick='edit(".$nilai_data->id_pekerjaan.','.$nilai_data->id_kategori.',"'.$nilai_data->isi.'","'.$nilai_data->mandarin.'"'.")' value='edit'> | <a href='#' class='btn btn-danger' onclick='deletedata(".$nilai_data->id_pekerjaan.")'> delete </a></td>
			 	</tr>";
		$no++;
		}

		$response .= "

		</tbody>
     </table>

     ";
     	$total_halaman = count($datapekerjaan);
     	$pages = ceil($total_halaman/10);

     	if (($current_page+9)>$pages) {
			$endpage = $current_page - ($current_page-$pages);
			}else{
				$endpage = $current_page + 9;
			}

		$response .= "<div class='gg-pagination'>";
		if ($current_page > 1){
			$response .= "<a href='#' onclick='terimadata(".'"'.$search.'",'.($current_page-1).','.($current_page-1).")'>&laquo;</a>";
		}
		for ($i=$current_page; $i < $endpage; $i++) { 
			$response .= "<a href='#' onclick='terimadata(".'"'.$search.'",'.$i.','.$i.")'>".$i."</a>";
		}
		if ($current_page < $pages){
			$response .= "<a href='#' onclick='terimadata(".'"'.$search.'",'.($current_page+1).','.($current_page+1).")'>&raquo;</a>";
		}

		$response .= "</div>";
		// $data['response'] = exit($response);
		// $data['datareponse'] = $response;
		exit($response);

		}



		function test2($search, $limites, $news){
		$perPage = 10;
		$limit = isset($limites) ? (int)$limites : 1;
		$start = ($limit > 1) ? ($limit * $perPage) - $perPage : 0;
		$current_page = isset($news)  ? (int)$news : 1;
		$search = str_replace("%20", " ", $search);

		$datapekerjaan = $this->db->query("SELECT * FROM kategoripekerjaan WHERE isi LIKE '%".$search."%' OR mandarin LIKE '%".htmlspecialchars($search)."%'")->result();
		$datapekerjaan_all = $this->db->query("SELECT * FROM kategoripekerjaan WHERE isi LIKE '%".$search."%' OR mandarin LIKE '%".htmlspecialchars($search)."%' LIMIT ".$start.", ".$perPage." ")->result();
		$response = "
			<table class='table table-bordered table-striped' style='margin-bottom:0;'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
		";
		$no = 1;
		foreach ($datapekerjaan_all as $key => $nilai_data) {
			 	$response .= "
			 	<tr>
			 		<td>".$no."</td>
			 		<td>".$nilai_data->id_kategori."</td>
			 		<td>".$nilai_data->isi."</td>
			 		<td>".$nilai_data->mandarin."</td>
			 		<td><input type='button' class='btn btn-warning' onclick='editdua(".$nilai_data->id_kategori.',"'.$nilai_data->isi.'","'.$nilai_data->mandarin.'"'.")' value='edit'> | <a href='#' class='btn btn-danger' onclick='deletedatadua(".$nilai_data->id_kategori.")'> delete </a></td>
			 	</tr>";
		$no++;
		}

		$response .= "

		</tbody>
     </table>

     ";
     	$total_halaman = count($datapekerjaan);
     	$pages = ceil($total_halaman/10);

     	if (($current_page+9)>$pages) {
			$endpage = $current_page - ($current_page-$pages);
			}else{
				$endpage = $current_page + 9;
			}

		$response .= "<div class='gg-pagination'>";
		if ($current_page > 1){
			$response .= "<a href='#' onclick='terimadatadua(".'"'.$search.'",'.($current_page-1).','.($current_page-1).")'>&laquo;</a>";
		}
		for ($i=$current_page; $i < $endpage; $i++) { 
			$response .= "<a href='#' onclick='terimadatadua(".'"'.$search.'",'.$i.','.$i.")'>".$i."</a>";
		}
		if ($current_page < $pages){
			$response .= "<a href='#' onclick='terimadatadua(".'"'.$search.'",'.($current_page+1).','.($current_page+1).")'>&raquo;</a>";
		}

		$response .= "</div>";
		// $data['response'] = exit($response);
		// $data['datareponse'] = $response;
		exit($response);

		}
}