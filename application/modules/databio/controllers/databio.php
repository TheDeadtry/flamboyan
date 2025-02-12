<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Databio extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_databio');			
	}

	function home() {
		$data['namamodule'] = "databio";
		$data['namafileview'] = "manajemen_tki";
		echo Modules::run('template/kosongan_template2', $data); 
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
				$pilsek = $this->session->userdata('pilsektor');
				$stat = $this->session->userdata('pilstat');

				$data['pilsek'] = $pilsek;
				$data['pilstat'] = $stat;

				$data['hitung_data_mf'] = $this->M_databio->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_databio->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_databio->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_databio->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_databio->hitung_data_jp();
				$data['tampil_data_personal'] = $this->M_databio->tampil_data_personal();


				$data['namamodule'] = "databio";
				$data['namafileview'] = "databioadmin";
				echo Modules::run('template/new_admin2_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "databio";
				$data['namafileview'] = "databioagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function setpilih($pilihan=""){
		$this->session->set_userdata('pilsektor', $pilihan);
		redirect('databio/');
	}

	function setstat($pilihan=""){
		$pilihanfixed = str_replace("%20", " ", $pilihan); 
		$this->session->set_userdata('pilstat', $pilihanfixed);
		redirect('databio/');
	}

	function setpilihstat($stat){
		$this->session->set_userdata('zstat', $stat);
		redirect('databio/');
	}

	function setpilihundur($undur){
		$this->session->set_userdata('zundur', $undur);
		redirect('databio/');
	}

	public function deletedata($user_id) {
    	$this->M_databio->delete_personal($user_id);
		redirect('databio');
    }

  	public function detaildata($user_id) {
  	  	$this->session->set_userdata("detailuser",$user_id);
		redirect('detailpersonal');
    }

   	function show_data() {
   	
		$request = '$_POST';
		$table = 'personal';

		// Table's primary key
		$primaryKey = 'id_biodata';

		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes

		$columns22 = array(
			'personal.id_biodata',
			'personal.nama',  		
			'personal.kode_sponsor'
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

		
		$bindings = array();
		
		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);
		
		$pilsek = isset($_POST['pilsek']) ? $_POST['pilsek']:'';
		$pilstat = isset($_POST['pilstat']) ? $_POST['pilstat']:'';

		if ($pilstat == '') {
			$final_destination = "";			
		} elseif ($pilstat == 'UNFIT') {
			$final_destination = "(statusaktif='Mengundurkan diri' || statusaktif='UNFIT') AND ";
		} elseif ($pilstat == 'BELUMTERBANG') {
			$final_destination = "personal.statterbang = '' and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
		} elseif ($pilstat == 'SUDAHTERBANG') {
			$final_destination = "personal.statterbang=1 and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
		} elseif ($pilstat == 'PENDING') {
			$final_destination = "personal.statterbang = '' and statusaktif='PENDING' AND ";
		} elseif ($pilstat == 'SUDAHTERBANGLALUKABUR') {
			$final_destination = "statusaktif='SUDAH TERBANG LALU KABUR' AND ";
		} elseif ($pilstat == 'SUDAHTERBANGINTERMINATE') {
			$final_destination = "statusaktif='SUDAH TERBANG INTERMINATE' AND ";
		} elseif ($pilstat == 'AMBILDOKUMENT') {
			$final_destination = "statusaktif='AMBIL DOKUMENT' AND ";
		} 
		// echo $pilsek;
		// die();
		if ($where != NULL) {
			$where_dd = "WHERE 1 = 1 AND ".$final_destination." personal.id_biodata LIKE '".$pilsek."%' AND ".$where;
		} else {
			$where_dd = "WHERE 1 = 1 AND ".$final_destination." personal.id_biodata LIKE '".$pilsek."%'";
		}

		// var_dump($where_dd);
		// die();
		
		$idbio = $this->M_databio->ambiltki($where_dd, $limit);
		
		$custQuryBaru = " AND (";
		$custQuryBaru2 = [];
		foreach($idbio as $iddaribio){
			$custQuryBaru .= " id_biodata = '$iddaribio' OR ";
			$custQuryBaru2[] = "'$iddaribio'";
		}
		$custQuryBaru = rtrim($custQuryBaru, " OR ") . ")";
		$custQuryBaru2 = join(",", $custQuryBaru2);

		$personal_namadata = $this->M_databio->ambilnamasemua($custQuryBaru2);
		
		// echo "<pre>";
		// var_dump($personal_namadata);
		// die();
		$medic1 = $this->M_databio->manual("SELECT id_biodata, nama namamed, tanggal FROM medical  where 1=1 $custQuryBaru order by id_medical ASC  ");
		
		for($i=0;$i<count($idbio);$i++){
			$where_personal[$i] = "where personal.id_biodata='$idbio[$i]'";
			// $personal[]= $this->M_databio->ambilnama($where_personal[$i]);
			$personal[]= isset($personal_namadata[$idbio[$i]])?$personal_namadata[$idbio[$i]]:[];
			
			// master medical
		    $medical1 = isset($medic1[$idbio[$i]]) ? $medic1[$idbio[$i]]:[];
		    $medical2 = $this->M_databio->medical2($idbio[$i]);
			$medical3 = $this->M_databio->medical3($idbio[$i]);
			$majikan = $this->M_databio->majikan($idbio[$i]);
			$datamajikan = $this->M_databio->datamajikan( $majikan['kode_majikan'] );
			$dataagen = $this->M_databio->datamajikan( $majikan['kode_agen'] );
			$psikotes = $this->db->query("SELECT ifnull((SELECT 1 FROM blk_psikolog WHERE id_biodata = '".$idbio[$i]."' LIMIT 1),0) stat")->row()->stat;
			// master medical end
            $uploadpk = $this->db->query("SELECT ifnull((SELECT 1 FROM upload_pk WHERE id_biodata = '".$idbio[$i]."' AND tglterima IS NOT NULL LIMIT 1),0) stat")->row()->stat;
			// master medical end
			
			$medical[]= isset($medical1['namamed']) ? $medical1['namamed'] : "";
			$medicaltgl[]= isset($medical1['tanggal']) ? $medical1['tanggal'] : "";
			
			$hitungmed= $medical3['hitung'];
			$pk[]=$uploadpk;
			
			
			if($hitungmed=='0'){
    			$namamedicalfulltgl[]= $medical2['tanggal'];
    			$namamedicalhasilfull[]= $medical2['nama'];
    			$namamedicalexpfull[]= $medical2['expired'];
    			$namamedicalfingerfull[]= $medical2['tglsidik'];
			}else{
    			$namamedicalfulltgl[]= $medical3['tanggal'];
    			$namamedicalhasilfull[]= $medical3['nama'];
    			$namamedicalexpfull[]= $medical3['expired'];
    			$namamedicalfingerfull[]= $medical3['tglsidik'];
			}

			$personalblk = $this->M_databio->personalblk($idbio[$i]);
            
            $psiko[] = $psikotes;
			$tglregblk[]= $personalblk['adm_tglreg'];
			$hitunganfingernodaftujuh[]= $this->M_databio->hitunganfingernodaftujuh($idbio[$i]);
			$hitunganfingernodaft[]= $this->M_databio->hitunganfingernodaft($idbio[$i]);
			$kelulusan[]= $personalblk['statujk'];

			$jmlfingerpagi[]= $this->M_databio->jmlfingerpagi($idbio[$i]);
			$jmlfingersore[]= $this->M_databio->jmlfingersore($idbio[$i]);
			$tglterakhirfinger[]= $this->M_databio->tglterakhirfinger($idbio[$i]);

			$paspor = $this->M_databio->paspor($idbio[$i]);
			$skck = $this->M_databio->skck($idbio[$i]);
			
			$ajupaspor[]= $paspor['tglpengajuan'];
			$ajustatpaspor[]= $paspor['statuspengajuan'];
			$fotopaspor[]= $paspor['tglfoto'];
			$fotostatpaspor[]= $paspor['statusfoto'];
			$terimapaspor[]= $paspor['tglterima'];
			$terimastatpaspor[]=  $paspor['statusterima'];
			$expiredpaspor[]= $paspor['expired'];

			
			$pengajuan_skck[]= $skck['pengajuan'];
			$pengajuanstat_skck[]= $skck['statuspengajuan'];
			$terima_skck[]= $skck['terima'];
			$terimastat_skck[]= $skck['statusterima'];
			$tglexp_skck[]= $skck['tglexp'];

			$tglmajikan[]= $majikan['tglterpilih'];
			$kodeagen[]= $dataagen['kode_agen'];

			$tglpk[] = $majikan['tglpk'];

			$stat = substr($idbio[$i], 0, 2);
			if($stat=='MF' || $stat=='FF' || $stat=='JP'){
				$kodemajikan[]= $datamajikan['kode_majikan'];
				$jadwal= $this->M_databio->jadwal($idbio[$i]);
				$keberangkatan[]= $this->M_databio->keberangkatan($jadwal);
			}
			else
			{
				$kodemajikan[]= $majikan['namamajikan'];
				$jadwal= $this->M_databio->jadwal($idbio[$i]);
				$keberangkatan[]= $this->M_databio->keberangkatan($jadwal);
			}
			
			$ambilsuhanss = $majikan['kode_suhan'];
			if ($ambilsuhanss == 0) {
				$tglterimasuhan[]= $majikan['tglterimasuhan'];
				$tglexp_suhan[]= '';
				$no_suhan[]= $majikan['id_suhan'];
			} else {
				$tglterimasuhan[]= $this->M_databio->tglterimasuhan($ambilsuhanss);
				$tglexp_suhan[]= $this->M_databio->tglexp_suhan($ambilsuhanss);
				$no_suhan[]= $this->M_databio->no_suhan($ambilsuhanss);
			}

			$ambilvisapermitsss = $majikan['kode_visapermit'];

			if ($ambilvisapermitsss == 0) {
				$tglterimavisapermit[]= $majikan['tglterimapermit'];
				$tglexp_visapermit[]= '';
				$no_visapermit[]= $majikan['id_visapermit'];
			} else {
				$tglterimavisapermit[]= $this->M_databio->tglterimavisapermit($ambilvisapermitsss);
				$tglexp_visapermit[]= $this->M_databio->tglexp_visapermit($ambilvisapermitsss);
				$no_visapermit[]= $this->M_databio->no_visapermit($ambilvisapermitsss);
			}

			$ambillegalitas[]= $this->M_databio->ambillegalitas($idbio[$i]);
			$ambilnotarisan[]= $this->M_databio->ambilnotarisan($idbio[$i]);

			$asuransipra[]= $this->M_databio->asuransipra($idbio[$i]);
			$asuransimasa[]= $this->M_databio->asuransimasa($idbio[$i]);

			$signingbank = $this->M_databio->signingbank($idbio[$i]);

			$tglapplycs[]= $signingbank['tglapplycs'];
			$tglterimacs[]= $signingbank['tglterimacs'];
			$statustglterimacs[]= $signingbank['statustglterimacs'];
			$tgltkittd[]= $signingbank['tgl_tki_ttd'];
			$tglterimaleg[]= $signingbank['tgltrmleg'];
			$statustglterimaleg[]= $signingbank['statustgltrmleg'];

			$visadata = $this->M_databio->visa($idbio[$i]);
			$visa[]= $visadata['terima'];
			$statusvisa[]= $visadata['statusterima'];
			$pap[]= $visadata['pap'];
			$statuspap[]= $visadata['statuspap'];
			$tglterbangs[]= $visadata['tanggalterbang'];
			$statustglterbang[]= $visadata['statustgl'];


			$bandaratujumajikan[]= $majikan['bandaratuju'];
			$ambilrekomskck[]= $this->M_databio->ambilrekomskck($idbio[$i]);
			$ambilrekomskck2[]= $this->M_databio->ambilrekomskck2($idbio[$i]);


			if ($medicaltgl[$i] != NULL && $medical[$i] != NULL) {
				$stat1[$i] = '1';
				$statv1[$i] = 'V';
			} else {
				$stat1[$i] = '-';
				$statv1[$i] = '-';
			}
			if ($namamedicalfulltgl[$i] != NULL && $namamedicalhasilfull[$i] != NULL) {
				$stat2[$i] = '2';
				$statv2[$i] = 'V';
			} else {
				$stat2[$i] = '-';
				$statv2[$i] = '-';
			}
			if ($personal[$i][43] == 'L') {
				$stat3[$i] = '3';
				$statv3[$i] = 'V';
			} else {
				$stat3[$i] = '-';
				$statv3[$i] = '-';
			}
			if ($personal[$i][19] == 'A' && $personal[$i][20] != NULL) {
				$stat4[$i] = '4';
				$statv4[$i] = 'V';
			} else {
				$stat4[$i] = '-';
				$statv4[$i] = '-';
			}
			if ($terimastatpaspor[$i] == 'A' && $terimapaspor[$i] != NULL) {
				$stat5[$i] = '5';
				$statv5[$i] = 'V';
			} else {
				$stat5[$i] = '-';
				$statv5[$i] = '-';
			}
			if ($terimastat_skck[$i] == 'A' && $terima_skck[$i] != NULL) {
				$stat6[$i] = '6';
				$statv6[$i] = 'V';
			} else {
				$stat6[$i] = '-';
				$statv6[$i] = '-';
			}
			if ($tglmajikan[$i] != NULL) {
				$stat7[$i] = '7';
				$statv7[$i] = 'V';
			} else {
				$stat7[$i] = '-';
				$statv7[$i] = '-';
			}
			if ($tglpk[$i] != NULL) {
				$stat8[$i] = '8';
				$statv8[$i] = 'V';
			} else {
				$stat8[$i] = '-';
				$statv8[$i] = '-';
			}
			if ($tglapplycs[$i] == 'A' && $tglapplycs[$i] != NULL) {
				$stat9[$i] = '9';
				$statv9[$i] = 'V';
			} else {
				$stat9[$i] = '-';
				$statv9[$i] = '-';
			}
			if ($statustglterimacs[$i] == 'A' && $tglterimacs[$i] != NULL) {
				$stat10[$i] = '10';
				$statv10[$i] = 'V';
			} else {
				$stat10[$i] = '-';
				$statv10[$i] = '-';
			}
			if ($statusvisa[$i] == 'A' && $visa[$i] != NULL) {
				$stat11[$i] = '11';
				$statv11[$i] = 'V';
			} else {
				$stat11[$i] = '-';
				$statv11[$i] = '-';
			}
			if ($statustglterbang[$i] != NULL && $tglterbangs[$i] != NULL) {
				$stat12[$i] = '12';
				$statv12[$i] = 'V';
			} else {
				$stat12[$i] = '-';
				$statv12[$i] = '-';
			}
			if ($tglregblk[$i] != NULL) {
				$stat13[$i] = '13';
				$statv13[$i] = 'V';
			} else {
				$stat13[$i] = '-';
				$statv13[$i] = '-';
			}
			if ($kelulusan[$i] != NULL && $kelulusan[$i] == 'LULUS') {
				$stat14[$i] = '14';
				$statv14[$i] = 'V';
			} else {
				$stat14[$i] = '-';
				$statv14[$i] = '-';
			}
			if ($ambilnotarisan[$i] != NULL) {
				$stat15[$i] = '15';
				$statv15[$i] = 'V';
			} else {
				$stat15[$i] = '-';
				$statv15[$i] = '-';
			}
			if ($ambilrekomskck[$i] != NULL) {
				$stat16[$i] = '16';
				$statv16[$i] = 'V';
			} else {
				$stat16[$i] = '-';
				$statv16[$i] = '-';
			}
            if ($psiko[$i] != 0) {
				$stat17[$i] = '17';
				$statv17[$i] = 'V';
			} else {
				$stat17[$i] = '-';
				$statv17[$i] = '-';
			}
            if ($pk[$i] != 0) {
				$stat18[$i] = '17';
				$statv18[$i] = 'V';
			} else {
				$stat18[$i] = '-';
				$statv18[$i] = '-';
			}



		}

		$idper=$idbio;

        $data2=array();
		$no=intval($_POST['start']);
        for($i=0;$i<count($idper);$i++) {

        	$tanggalbukarek = $this->M_databio->ambildatamod($personal[$i][0], "tanggal_buka_rek", "buka_rekening_baru", "id_biodata", "tanggal_buka_rek");

			$kode_status = '<div class="text-wrap width-160">'.$personal[$i][0].$personal[$i][37].$personal[$i][38].$personal[$i][39].'-'.$personal[$i][40].$personal[$i][41].$personal[$i][42].'</div>'; 
			$no++;
			array_push($data2,
				array(
					$no,
					$kode_status,
					//$statsz[$i],
					$personal[$i][36].'<br/>'.
					'<a id="popff3'.$i.'" data-container="body" data-trigger="hover" data-html="true" data-toggle="popover" title="DETAIL" data-content="
					<tr><td>(01) MED AWAL FIT           </td><td> = '.$statv1[$i].'</td></tr>/br>
					<tr><td>(02) MED FULL FIT           </td><td> = '.$statv2[$i].'</td></tr></br>
					<tr><td>(03) DOK RUMAH LENGKAP      </td><td> = '.$statv3[$i].'</td></tr></br>
					<tr><td>(04) SUDAH ISI NO ID DO     </td><td> = '.$statv4[$i].'</td></tr></br>
					<tr><td>(05) ISI TGL TRM PASPOR ACT </td><td> = '.$statv5[$i].'</td></tr></br>
					<tr><td>(06) ISI TGL TRM SCKCK ACT  </td><td> = '.$statv6[$i].'</td></tr></br>
					<tr><td>(07) ISI TGL DAPAT MAJIKAN  </td><td> = '.$statv7[$i].'</td></tr></br>
					<tr><td>(08) ISI TGL TRM PK         </td><td> = '.$statv8[$i].'</td></tr></br>
					<tr><td>(09) ISI TGL PENGAJUAN BANK </td><td> = '.$statv9[$i].'</td></tr></br>
					<tr><td>(10) ISI TGL TRM CS-ACT     </td><td> = '.$statv10[$i].'</td></tr></br>
					<tr><td>(11) ISI TGL TRM VISA-ACT   </td><td> = '.$statv11[$i].'</td></tr></br>
					<tr><td>(12) ISI TGL TERBANG ACT    </td><td> = '.$statv12[$i].'</td></tr></br>
					<tr><td>(13) SUDAH REG BLK          </td><td> = '.$statv13[$i].'</td></tr></br>
					<tr><td>(14) HASIL UJK LULUS        </td><td> = '.$statv14[$i].'</td></tr></br>
					<tr><td>(15) NOTARISAN              </td><td> = '.$statv15[$i].'</td></tr></br>
					<tr><td>(16) REKOM SKCK             </td><td> = '.$statv16[$i].'</td></tr></br>
					<tr><td>(17) PSIKOTES               </td><td> = '.$statv17[$i].'</td></tr></br>
					<tr><td>(18) TERIMA PK               </td><td> = '.$statv18[$i].'</td></tr></br>
					
					">'.$stat1[$i].', '.$stat2[$i].', '.$stat3[$i].', '.$stat4[$i].', '.$stat5[$i].', '.$stat6[$i].', '.$stat7[$i].', '.$stat8[$i].', '.$stat9[$i].', '.$stat10[$i].', '.$stat11[$i].', '.$stat12[$i].', '.$stat13[$i].', '.$stat14[$i].', '.$stat15[$i].', '.$stat16[$i].', '.$stat17[$i].', '.$stat18[$i].'</a>'.'<script>$("#popff3'.$i.'").popover({ container: "body" });</script>',
					$personal[$i][1],
					$personal[$i][2].'<br>'.$personal[$i][3],
					//$personal[$i][1].'<br>'.$personal[$i][14],
					$personal[$i][4].'<br>'.$personal[$i][15],
					$personal[$i][5].'<br>'.$personal[$i][16],
					$personal[$i][12].'<br>'.$personal[$i][17],
					$personal[$i][9].'<br>'.$personal[$i][18],
					$personal[$i][6].'<br>'.$personal[$i][7],
					$personal[$i][8].'<br>'.$personal[$i][10].' / '.$personal[$i][11],
					$personal[$i][19].' / '.$personal[$i][20].'<br>'.$personal[$i][35],
					$personal[$i][21],
					$personal[$i][43].'  <a data-toggle="modal" data-target="#edit'.$i.'"><i class="icon-pencil3"></i><span></span></a><BR/>'.$personal[$i][22],
					wordwrap($personal[$i][44],15,"<br>\n").'  <a data-toggle="modal" data-target="#ketadm_edit'.$i.'"><i class="icon-pencil3"></i><span></span></a><BR/>',
					$personal[$i][23].'<br>'.$personal[$i][24],
					$personal[$i][25].'<br>'.$personal[$i][26],
					$personal[$i][27].'<br>'.$personal[$i][28],
					$personal[$i][29].'<br>'.$personal[$i][30],
					$personal[$i][31].'<br>'.$personal[$i][32],
					$personal[$i][33].'<br>'.$personal[$i][34],
					$medicaltgl[$i].'<br>'.$medical[$i],
					$namamedicalfulltgl[$i].'<br>'.$namamedicalhasilfull[$i],
					$namamedicalexpfull[$i].'<br>'.$namamedicalfingerfull[$i],
					$tglregblk[$i].'<br>'.$hitunganfingernodaftujuh[$i],
					$hitunganfingernodaft[$i].'<br>'.$kelulusan[$i],
					'Pagi :'.$jmlfingerpagi[$i].' Sore'.$jmlfingersore[$i].'<br>'.$tglterakhirfinger[$i],
					'',
					'',
					'('.$ajustatpaspor[$i].') '.$ajupaspor[$i].'<br>('.$fotostatpaspor[$i].') '.$fotopaspor[$i],
					'('.$terimastatpaspor[$i].') '.$terimapaspor[$i].'<br>'.$expiredpaspor[$i],
					htmlspecialchars($tanggalbukarek),
					'('.$pengajuanstat_skck[$i].') '.$pengajuan_skck[$i].'<br>('.$terimastat_skck[$i].') '.$terima_skck[$i],
					$tglexp_skck[$i],
					$tglmajikan[$i].'<br>'.$kodeagen[$i],
					$kodemajikan[$i].' - '.$bandaratujumajikan[$i].'<br/>'.$tglpk[$i],
					$tglterimasuhan[$i].'<br>'.$tglterimavisapermit[$i],
					$no_suhan[$i].'<br>'.$no_visapermit[$i],
					$tglexp_suhan[$i].'<br>'.$tglexp_visapermit[$i],
					$ambillegalitas[$i].'<br>'.$ambilnotarisan[$i],
					'- '.$asuransipra[$i].'<br>- '.$asuransimasa[$i],
					$tglapplycs[$i].'<br/>('.$statustglterimacs[$i].') '.$tglterimacs[$i].'<br>'.$tgltkittd[$i],
					'('.$statustglterimaleg[$i].') '.$tglterimaleg[$i].'<br>('.$statusvisa[$i].') '.$visa[$i],
					'('.$statuspap[$i].') '.$pap[$i].'<br>('.$statustglterbang[$i].') '.$tglterbangs[$i],
					$ambilrekomskck2[$i],
					'<a class="label label-primary" type="button" href="'.site_url('databiomaleformal/detaildata/'.$personal[$i][0]).'">BIO</a>
            		<a class="label label-warning" type="button" href="'.site_url('dataadministrasi/detaildata/'.$personal[$i][0]).'">ADM</a>
            		<a class="label label-success" type="button" href="'.site_url('databiomaleformal/detaildataupload/'.$personal[$i][0]).'">DOK</a>
            		|||<a class="label label-warning" type="button"  data-href="'.site_url('databio/deletedata/'.$personal[$i][0]).'" onclick="event.preventDefault(); window.DeletePersonal? window.DeletePersonal(this):null;">Hapus</a>'.
            		
					'<div class="modal fade" id="edit'.$i.'" tabindex="-2" role="dialog">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <form class="form-horizontal" method="post" action="'.site_url('databio/updateket').'">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">TAMBAH KETERANGAN</h5>
                                </div>
                               <div class="modal-body">
                                  <input type="hidden" class="form-control" name="idbio" value="'.$personal[$i][0].'">
                                <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN </label>
                                                    <select class="form-control" name="bnknl">
                                                    	<option value="'.$personal[$i][43].'">'.$personal[$i][43].'</option>
                                                    	<option value="B">B</option>
                                                    	<option value="K">K</option>
                                                    	<option value="L">L</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                               </div>
                               <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                               </div>
                               </form>
                             </div>
                           </div>
                         </div>'.
						'<div class="modal fade" id="ketadm_edit'.$i.'" tabindex="-2" role="dialog">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <form class="form-horizontal" method="post" action="'.site_url('databio/updateketadm').'">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">KETERANGAN ADMIN</h5>
                                </div>
                               <div class="modal-body">
                                  <input type="hidden" class="form-control" name="idbio" value="'.$personal[$i][0].'">
                                <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN </label>
                                                    <textarea class="form-control" name="ket_adm">'.$personal[$i][44].'</textarea>
                                                </div>
                                            </div>
                                        </div>
                               </div>
                               <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                               </div>
                               </form>
                             </div>
                           </div>
                         </div>'
				)
			);
		}

		//AND statusaktif!='Mengundurkan diri'  AND statusaktif!='UNFIT'
		if ($where != NULL) {
			$where_filter = "where ".$final_destination." id_biodata is not null and id_biodata LIKE '".$pilsek."%' AND ".$where;
		} else {
			$where_filter = "where ".$final_destination." id_biodata is not null and id_biodata LIKE '".$pilsek."%'";
		}
		$resFilterLength = $this->M_databio->datatables_count_where($table, $primaryKey, $where_filter);
			
		$recordsFiltered = $resFilterLength->filter;

		$resTotalLength =  $this->M_databio->datatables_count($table, $primaryKey, $pilsek);

		$recordsTotal = $resTotalLength->key;

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

	function updateket() {
			$this->M_databio->updateket();
			redirect('databio');
	}

	function updateketadm() {
			$this->M_databio->updateketadm();
			redirect('databio');
	}

	function printdata(){
		$data['tampil_status'] = $this->M_databio->select("SELECT kode_sponsor, nama FROM datasponsor order by kode_sponsor");
		$data['namamodule'] = "databio";
		$data['namafileview'] = "printdata";
		echo Modules::run('template/new_admin2_template', $data);
	}

	/*
		menampilkan data print pk 
	*/
	function printdatapk(){
		$data['tampil_status'] = $this->M_databio->select("SELECT kode_sponsor, nama FROM datasponsor order by kode_sponsor");
		$data['majikan'] = $this->M_databio->select("SELECT id_majikan id, kode_majikan, nama, namamajikan taiwan FROM datamajikan");
		$data['namamodule'] = "databio";
		$data['namafileview'] = "printdatapk";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function testjompo(){
		$data['tampil_status'] = $this->M_databio->select("SELECT kode_sponsor, nama FROM datasponsor order by kode_sponsor");
		$data['majikan'] = $this->M_databio->select("SELECT id_majikan id, kode_majikan, nama, namamajikan taiwan FROM datamajikan");
		$data['namamodule'] = "databio";
		$data['namafileview'] = "testjompo";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function cetaktest(){
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();

		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$document = $PHPWord->loadTemplate('files/template_document/testtki.docx');

		$idtki 	= $this->input->post('sektor');

		$filename = 'testpk.docx';
		$this->load->model('Testdoc');
		
		$this->Testdoc->datapk([
		  "idtki" => $idtki
		], $document);

		$isinya=$document->save($filename);

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

	function printdataprocesspk(){
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();

		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$document = $PHPWord->loadTemplate('files/printpkbaru.docx');

		$date1 		= $this->input->post('date1');
		$date2 		= $this->input->post('date2');
		$idbiozx 	= $this->input->post('xpilsektor');
		$datapilih 	= $this->input->post('datapilih');

		$filename = 'data-pk.docx';
		$this->load->model('Mpk');
		
		$this->Mpk->datapk([
		  "date1" => $date1,
		  "date2" => $date2,
		  "datapilih" => $datapilih,
		  "sektor" => $idbiozx
		], $document);

//die();
		$isinya=$document->save($filename);

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

	function printdataprocess() {
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();

		$date1 		= $this->input->post('date1');
		$date2 		= $this->input->post('date2');
		$status 	= $this->input->post('status');
		$sponsorr	= $this->input->post('sponsor');
		$idbiozx 	= $this->input->post('xpilsektor');
		$msablk 	= $this->input->post('masa_berlaku');

		$PHPWord = new PHPWord();

		if ( $status == 21 || $status == 22 || $status == 23 || $status == 24 ) {
			$document = $PHPWord->loadTemplate('files/databio_nm_sponsor_paspor.docx');
		} else {
			$document = $PHPWord->loadTemplate('files/databio_nm_sponsor.docx');
		}


		//=========================================
		if ($idbiozx == "SEMUA"){
			$idbioz = '';
			$idbio_query = "a.id_biodata like '%'";
		} else {
			$idbioz = $idbiozx;
			$sektor = $idbioz != "SEMUA" ? $idbioz : null ;
			$idbio_query = ($sektor?" ( ".join(" OR ",array_map(function($sc){
				return " a.id_biodata like '".$sc."%' ";
			},explode(",", $sektor)) )." ) ":"");
			// echo $idbio_query;
			// $idbio_query = "a.id_biodata like '".$idbioz."%'";
		}

		//=========================================
		if ($date1 != NULL && $date2 != NULL) {
			$dats 	= str_replace('-', '.', $date1);
			$dats2 	= str_replace('-', '.', $date2);
			
			$dante 	= date('d/m/Y', strtotime($date1));
			$dante2 = date('d/m/Y', strtotime($date2));

			$tgldaft = 'format_tanggal(tanggaldaftar) BETWEEN format_tanggal("'.$dats.'") AND format_tanggal("'.$dats2.'") and';
		} else {
			$dante 	= '-';
			$dante2	= '-';
			$tgldaft = '';
		}

		//=========================================
		if ($sponsorr == 'SEMUA') {
			$fspons = '';
			$f_s_spon = '';
			$full_sponsorr = 'SEMUA';
		} else {
			$fspons = 'kode_sponsor like "%'.$sponsorr.'%" and';
			$f_s_spon = $sponsorr;
			$get_sponsor = $this->M_databio->select_row('SELECT kode_sponsor,nama FROM datasponsor where kode_sponsor="'.$sponsorr.'"');
			$full_sponsorr = $get_sponsor->kode_sponsor.' - '.$get_sponsor->nama;
		}

		if ($status == 1) {
			$status_half = "(lower(statusaktif)=lower('Mengundurkan diri') || lower(statusaktif)=lower('UNFIT') || lower(statusaktif)=lower('Pending')) and";
			$status_word = "MENGUNDURKAN DIRI+UNFIT+PENDING";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT kode_sponsor, nama, id_biodata FROM personal a where '.$fullfinss.' '.$idbio_query.' ORDER BY id_biodata ASC';

		} elseif ($status == 2) {
			$status_half = "a.statterbang=1 and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_word = "SUDAH TERBANG";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT kode_sponsor, nama, id_biodata FROM personal a where '.$fullfinss.' '.$idbio_query.' ORDER BY id_biodata ASC';

		} elseif ($status == 3) {
			$status_half = "a.statterbang = '' and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_word = "SUDAH PROSES (SDH MAJ+BLM MAJ)";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT kode_sponsor, nama, id_biodata FROM personal a where '.$fullfinss.' '.$idbio_query.' ORDER BY id_biodata ASC';

			// echo $final_fulliest;
			// die();

		} elseif ($status == 4) {
			$status_half = "a.statterbang = '' and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_word = "PROSES (BLM MAJ)";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata FROM personal a LEFT JOIN majikan b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' 
			AND nullif(b.tglterpilih,\'\') IS NULL 
			AND nullif(a.nama,\'\') IS NOT NULL
			AND lower( a.statusaktif ) <> \'mengundurkan diri\'
			AND lower( a.statusaktif ) NOT LIKE \'%pindah%\'
			AND lower( a.statusaktif ) NOT LIKE \'%ptm%\'
			ORDER BY id_biodata ASC';
		} elseif ($status == 5) {
			
			$status_half = "a.statterbang = '' and a.statusaktif!='Mengundurkan diri' AND a.statusaktif!='UNFIT' AND ";
			$status_word = "PROSES (SDH MAJ)";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata FROM personal a LEFT JOIN majikan b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' and b.tglterpilih!="" ORDER BY id_biodata ASC';

		} elseif ($status == 6) {
			
			$status_half = "(b.nodisnaker != '' && lower(statusaktif)=lower('Mengundurkan diri')) and";
			$status_word = "MENGUNDURKAN DIRI + SDH ID DO";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata, b.nodisnaker FROM personal a LEFT JOIN disnaker b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' ORDER BY a.id_biodata ASC';

		} elseif ($status == 7) {
			
			$status_half = "b.nodisnaker = '' and a.statusaktif!='Mengundurkan diri' AND a.statusaktif!='UNFIT' AND ";
			$status_word = "PROSES (BLM ID DO)";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata, b.nodisnaker FROM personal a LEFT JOIN disnaker b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' ORDER BY a.id_biodata ASC';

		} elseif ($status == 8) {

			$status_half = "a.statterbang = '' and (a.statusaktif='PROSES' || a.statusaktif='pra medikal fit' || a.statusaktif='SUDAH ADA ID') AND ";
			$status_word = "BELUM TERBANG (PROSES)";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata FROM personal a LEFT JOIN majikan b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' ORDER BY id_biodata ASC';

		} elseif ($status == 9) {
			$status_half = "a.statusaktif='SUDAH TERBANG LALU KABUR' AND ";
			$status_word = "SUDAH TERBANG KABUR";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata FROM personal a LEFT JOIN majikan b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' ORDER BY id_biodata ASC';

		} elseif ($status == 10) {
			$status_half = "a.statusaktif='SUDAH TERBANG INTERMINATE' AND ";
			$status_word = "SUDAH TERBANG INTERMINATE";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata FROM personal a LEFT JOIN majikan b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' ORDER BY id_biodata ASC';
		} elseif ($status == 11) {
			$status_half = "a.statusaktif='AMBIL DOKUMENT' AND ";
			$status_word = "AMBIL DOKUMENT";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata FROM personal a LEFT JOIN majikan b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' ORDER BY id_biodata ASC';
		} elseif ($status == 13) {
			$status_half = "";
			$status_word = "SEMUA";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT kode_sponsor, nama, id_biodata FROM personal a where '.$fullfinss.' '.$idbio_query.' ORDER BY id_biodata ASC';
		} elseif ($status == 21) {
			$status_half = "statterbang = '' and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_word = "ADA ID + PASPOR";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = '(SELECT a.kode_sponsor, a.nama, a.id_biodata, DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) as expired FROM personal a JOIN paspor b ON a.id_biodata=b.id_biodata JOIN disnaker c ON a.id_biodata=c.id_biodata where '.$fullfinss.' '.$idbio_query.' and YEAR( DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) ) >= '.$msablk.'  ORDER BY a.id_biodata ASC)'
				;
		} elseif ($status == 22) {
			$status_half = "statterbang = '' and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_word = "ADA ID + BELUM PASPOR";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = '(SELECT a.kode_sponsor, a.nama, a.id_biodata, DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) as expired FROM personal a LEFT JOIN paspor b ON a.id_biodata=b.id_biodata JOIN disnaker c ON a.id_biodata=c.id_biodata where '.$fullfinss.' '.$idbio_query.' and b.id_biodata is null ORDER BY a.id_biodata ASC)
								UNION
								(SELECT a.kode_sponsor, a.nama, a.id_biodata, DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) as expired FROM personal a JOIN paspor b ON a.id_biodata=b.id_biodata JOIN disnaker c ON a.id_biodata=c.id_biodata where '.$fullfinss.' '.$idbio_query.' and YEAR( DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) ) < '.$msablk.'  ORDER BY a.id_biodata ASC)
								';
		} elseif ($status == 23) {
			$status_half = "statterbang = '' and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_word = "BELUM ID + PASPOR";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = '(SELECT a.kode_sponsor, a.nama, a.id_biodata, DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) as expired FROM personal a JOIN paspor b ON a.id_biodata=b.id_biodata LEFT JOIN disnaker c ON a.id_biodata=c.id_biodata where '.$fullfinss.' '.$idbio_query.' and c.id_biodata is null and YEAR( DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) ) >= '.$msablk.'  ORDER BY a.id_biodata ASC)
				';
		} elseif ($status == 24) {
			$status_half = "statterbang = '' and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_word = "BELUM ID + BELUM PASPOR";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata, DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) as expired FROM personal a LEFT JOIN paspor b ON a.id_biodata=b.id_biodata LEFT JOIN disnaker c ON a.id_biodata=c.id_biodata where '.$fullfinss.' '.$idbio_query.' and b.id_biodata is null and c.id_biodata is null  ORDER BY a.id_biodata ASC';
		} elseif ($status == 31) {
			$status_half = "(lower(statusaktif)=lower('Mengundurkan diri') || lower(statusaktif)=lower('UNFIT') || lower(statusaktif)=lower('Pending')) and (b.nodisnaker != '' && lower(statusaktif)=lower('Mengundurkan diri')) and";
			$status_word = "MENGUNDURKAN DIRI+UNFIT+PENDING + SDH ID DO";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata, b.nodisnaker FROM personal a JOIN disnaker b ON a.id_biodata=b.id_biodata where '.$fullfinss.' '.$idbio_query.' ORDER BY a.id_biodata ASC';
		} elseif ($status == 32) {
			$status_half1 = "a.statterbang=1 and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_half2 = "a.statterbang = '' and statusaktif!='Mengundurkan diri' AND statusaktif!='UNFIT' AND ";
			$status_word = "SUDAH TERBANG + PROSES";
			$final_fulliest = '
			(SELECT 
			a.kode_sponsor, a.nama, a.id_biodata
			FROM personal a 
			where '.$status_half1.' '.$fspons.' '.$tgldaft.' '.$idbio_query.' ORDER BY a.id_biodata ASC)
			UNION
			(SELECT 
			a.kode_sponsor, a.nama, a.id_biodata
			FROM personal a 
			where '.$status_half2.' '.$fspons.' '.$tgldaft.' '.$idbio_query.' ORDER BY a.id_biodata ASC)';
		} elseif ($status == 33) {
			$status_half = "statterbang = '' and statusaktif NOT LIKE 'Mengundurkan diri' AND statusaktif NOT LIKE 'UNFIT' AND trim(statusaktif) NOT LIKE 'PINDAH HONGKONG' AND ";
			$status_word = "BELUM ID";
			$fullfinss = $status_half.' '.$fspons.' '.$tgldaft;
			$final_fulliest = 'SELECT a.kode_sponsor, a.nama, a.id_biodata, DATE_ADD(b.tglterbit, INTERVAL 5 YEAR) as expired FROM personal a LEFT JOIN paspor b ON a.id_biodata=b.id_biodata LEFT JOIN disnaker c ON a.id_biodata=c.id_biodata where '.$fullfinss.' '.$idbio_query.' and c.id_biodata is null  ORDER BY a.id_biodata ASC';
		}

		$quww = $final_fulliest;
		$zselectionz = $this->M_databio->select($quww);
		
		$document->cloneRow('value3',count($zselectionz));
		$nn=1;	
		foreach ($zselectionz as $value) {

			$xxc_sponsor = 'SELECT kode_sponsor,nama FROM datasponsor where kode_sponsor="'.$sponsorr.'"';
			$xxz_sponsor = $this->M_databio->select_row($xxc_sponsor);
			if ($xxz_sponsor != NULL) {
				$fsponsor[$nn] = $xxz_sponsor->kode_sponsor.' - '.$xxz_sponsor->nama;
			} else {
				$fsponsor[$nn] = '';
			}

			$xxc_tgldaftar = 'SELECT 
								tanggaldaftar,
								statusaktif,
								tgllahir,
								tinggi,
								berat,
								pendidikan,
								notelp,
								notelpkel,
								ketadm,
								ketdok,
								YEAR(CURDATE()) - YEAR(tgllahir) as umur
								FROM personal 
								where id_biodata ="'.$value->id_biodata.'"';

			
			$xxz_tgldaftar = $this->M_databio->select_row($xxc_tgldaftar);
			if ($xxz_tgldaftar->tanggaldaftar != NULL) {
				$ftgldaftar[$nn] = $xxz_tgldaftar->tanggaldaftar;
			} else {
				$ftgldaftar[$nn] = '-';
			}

			if ($xxz_tgldaftar->statusaktif != NULL) {
				$fstatusaktif[$nn] = $xxz_tgldaftar->statusaktif;
			} else {
				$fstatusaktif[$nn] = '-';
			}

			if ($xxz_tgldaftar->tgllahir != NULL) {
				$ftgllahir[$nn] = $xxz_tgldaftar->tgllahir;
			} else {
				$ftgllahir[$nn] = '-';
			}

			if ($xxz_tgldaftar->tinggi != NULL) {
				$ftinggi[$nn] = $xxz_tgldaftar->tinggi;
			} else {
				$ftinggi[$nn] = '-';
			}

			if ($xxz_tgldaftar->berat != NULL) {
				$fberat[$nn] = $xxz_tgldaftar->berat;
			} else {
				$fberat[$nn] = '-';
			}

			if ($xxz_tgldaftar->pendidikan != NULL) {
				$fpendidikan[$nn] = $xxz_tgldaftar->pendidikan;
			} else {
				$fpendidikan[$nn] = '-';
			}

			if ($xxz_tgldaftar->notelp != NULL) {
				$fnotelp[$nn] = $xxz_tgldaftar->notelp;
			} else {
				$fnotelp[$nn] = '-';
			}

			if ($xxz_tgldaftar->notelpkel != NULL) {
				$fnotelpkel[$nn] = $xxz_tgldaftar->notelpkel;
			} else {
				$fnotelpkel[$nn] = '-';
			}

			if ($xxz_tgldaftar->ketadm != NULL) {
				$fketadm[$nn] = $xxz_tgldaftar->ketadm;
			} else {
				$fketadm[$nn] = '-';
			}

			if ($xxz_tgldaftar->ketdok != NULL) {
				$fketdok[$nn] = $xxz_tgldaftar->ketdok;
			} else {
				$fketdok[$nn] = '-';
			}

			if ($xxz_tgldaftar->umur != NULL) {
				$fumur[$nn] = $xxz_tgldaftar->umur;
			} else {
				$fumur[$nn] = '-';
			}
			$xxc_disnaker = 'SELECT status,tglbuat,nodisnaker,perkiraan,tglonline FROM disnaker where id_biodata ="'.$value->id_biodata.'"';
			$xxz_disnaker = $this->M_databio->select_row($xxc_disnaker);
			if ($xxz_disnaker != NULL) {
				if ($xxz_disnaker->status != NULL) {
					$fdostatus[$nn] = $xxz_disnaker->status;
				} else {
					$fdostatus[$nn] = '-';
				}

				if ($xxz_disnaker->tglbuat != NULL) {
					$fdotglbuat[$nn] = $xxz_disnaker->tglbuat;
				} else {
					$fdotglbuat[$nn] = '-';
				}

				if ($xxz_disnaker->nodisnaker != NULL) {
					$fdonodisnaker[$nn] = $xxz_disnaker->nodisnaker;
				} else {
					$fdonodisnaker[$nn] = '-';
				}

				if ($xxz_disnaker->perkiraan != NULL) {
					$fdoperkiraan[$nn] = $xxz_disnaker->perkiraan;
				} else {
					$fdoperkiraan[$nn] = '-';
				}

				if ($xxz_disnaker->tglonline != NULL) {
					$fdotglonline[$nn] = $xxz_disnaker->tglonline;
				} else {
					$fdotglonline[$nn] = '-';
				}
			} else {
				$fdostatus[$nn] = '-';
				$fdotglbuat[$nn] = '-';
				$fdonodisnaker[$nn] = '-';
				$fdoperkiraan[$nn] = '-';
				$fdotglonline[$nn] = '-';
			}

			$jmlfingerpagi[$nn]= $this->M_databio->jmlfingerpagi($value->id_biodata);
			$jmlfingersore[$nn]= $this->M_databio->jmlfingersore($value->id_biodata);
			$tglterakhirfinger[$nn]= $this->M_databio->tglterakhirfinger($value->id_biodata);
			$ajupaspor[$nn]= $this->M_databio->ajupaspor($value->id_biodata);
			$terimapaspor[$nn]= $this->M_databio->terimapaspor($value->id_biodata);
			$expiredpaspor[$nn]= $this->M_databio->expiredpaspor($value->id_biodata);

			$tglmajikan[$nn]= $this->M_databio->tglmajikan($value->id_biodata);
			$kodeagen[$nn]= $this->M_databio->kodeagen($value->id_biodata);
			$tglpk[$nn] = $this->M_databio->tglpk($value->id_biodata);
			$tglterbangs[$nn]= $this->M_databio->tglterbangs($value->id_biodata);


			$medical[$nn]= $this->M_databio->namamedical($value->id_biodata);
			$medicaltgl[$nn]= $this->M_databio->namamedicaltgl($value->id_biodata);

			$hitungmed= $this->M_databio->hitungmed($value->id_biodata);
			if($hitungmed=='0'){
				$namamedicalfulltgl[$nn]	= $this->M_databio->namamedicalfulltgl2($value->id_biodata);
				$namamedicalhasilfull[$nn]	= $this->M_databio->namamedicalhasilfull2($value->id_biodata);
			} else {
				$namamedicalfulltgl[$nn]	= $this->M_databio->namamedicalfulltgl($value->id_biodata);
				$namamedicalhasilfull[$nn]	= $this->M_databio->namamedicalhasilfull($value->id_biodata);
			}

			$terimapaspor[$nn]= $this->M_databio->terimapaspor($value->id_biodata);
			$terimastatpaspor[$nn]= $this->M_databio->terimastatpaspor($value->id_biodata);
			
			$terimastat_skck[$nn]= $this->M_databio->terimastat_skck($value->id_biodata);
			$terima_skck[$nn]= $this->M_databio->terima_skck($value->id_biodata);
			
			$tglapplycs[$nn]= $this->M_databio->tglpengajuanbank($value->id_biodata);

			$tglterimacs[$nn]= $this->M_databio->tglterimacs($value->id_biodata);
			$statustglterimacs[$nn]= $this->M_databio->statustglterimacs($value->id_biodata);

			$visa[$nn]= $this->M_databio->visa($value->id_biodata);
			$statusvisa[$nn]= $this->M_databio->statusvisa($value->id_biodata);

			$tglterbangs[$nn]= $this->M_databio->tglterbangs($value->id_biodata);
			$statustglterbang[$nn]= $this->M_databio->statustglterbang($value->id_biodata);

			$tglregblk[$nn]= $this->M_databio->tglregblk($value->id_biodata);

			$kelulusan[$nn]= $this->M_databio->kelulusan($value->id_biodata);

			$ambilnotarisan[$nn]= $this->M_databio->ambilnotarisan($value->id_biodata);

			if ($medicaltgl[$nn] != NULL && $medical[$nn] != NULL) {
				$stat1[$nn] = '1';
			} else {
				$stat1[$nn] = '-';
			}
			if ($namamedicalfulltgl[$nn] != NULL && $namamedicalhasilfull[$nn] != NULL) {
				$stat2[$nn] = '2';
			} else {
				$stat2[$nn] = '-';
			}
			if ($fketdok[$nn] == 'L') {
				$stat3[$nn] = '3';
			} else {
				$stat3[$nn] = '-';
			}
			if ($fdoperkiraan[$nn] == 'A' && $fdotglonline[$nn] != NULL) {
				$stat4[$nn] = '4';
			} else {
				$stat4[$nn] = '-';
			}
			if ($terimastatpaspor[$nn] == 'A' && $terimapaspor[$nn] != NULL) {
				$stat5[$nn] = '5';
			} else {
				$stat5[$nn] = '-';
			}
			if ($terimastat_skck[$nn] == 'A' && $terima_skck[$nn] != NULL) {
				$stat6[$nn] = '6';
			} else {
				$stat6[$nn] = '-';
			}
			if ($tglmajikan[$nn] != NULL) {
				$stat7[$nn] = '7';
			} else {
				$stat7[$nn] = '-';
			}
			if ($tglpk[$nn] != NULL) {
				$stat8[$nn] = '8';
			} else {
				$stat8[$nn] = '-';
			}
			if ($tglapplycs[$nn] == 'A' && $tglapplycs[$nn] != NULL) {
				$stat9[$nn] = '9';
			} else {
				$stat9[$nn] = '-';
			}
			if ($statustglterimacs[$nn] == 'A' && $tglterimacs[$nn] != NULL) {
				$stat10[$nn] = '10';
			} else {
				$stat10[$nn] = '-';
			}
			if ($statusvisa[$nn] == 'A' && $visa[$nn] != NULL) {
				$stat11[$nn] = '11';
			} else {
				$stat11[$nn] = '-';
			}
			if ($statustglterbang[$nn] != NULL && $tglterbangs[$nn] != NULL) {
				$stat12[$nn] = '12';
			} else {
				$stat12[$nn] = '-';
			}
			if ($tglregblk[$nn] != NULL) {
				$stat13[$nn] = '13';
			} else {
				$stat13[$nn] = '-';
			}
			if ($kelulusan[$nn] != NULL) {
				$stat14[$nn] = '14';
			} else {
				$stat14[$nn] = '-';
			}
			if ($ambilnotarisan[$nn] != NULL) {
				$stat15[$nn] = '15';
			} else {
				$stat15[$nn] = '-';
			}

			//print_r($value);

			$negara1 = $this->M_databio->ambildatamod($value->id_biodata, "negara1", "personal", "id_biodata", "negara1");
			if ($negara1 != '') {
				$review1 = '-'.$negara1;
			}else{
				$review1 = '';
			}
			$negara2 = $this->M_databio->ambildatamod($value->id_biodata, "negara2", "personal", "id_biodata", "negara2");
			if ($negara2 != '') {
				$review2 = '-'.$negara2;
			}else{
				$review2 = '';
			}
			$calling = $this->M_databio->ambildatamod($value->id_biodata, "calling", "personal", "id_biodata", "calling");
			if ($calling != '') {
				$review3 = '-'.$calling;
			}else{
				$review3 = '';
			}
			$skill1 = $this->M_databio->ambildatamod($value->id_biodata, "skill1", "personal", "id_biodata", "skill1");
			if ($skill1 != '') {
				$review4 = '-'.$skill1;
			}else{
				$review4 = '';
			}
			$skill2 = $this->M_databio->ambildatamod($value->id_biodata, "skill2", "personal", "id_biodata", "skill2");
			if ($skill2 != '') {
				$review5 = '-'.$skill2;
			}else{
				$review5 = '';
			}
			$skill3 = $this->M_databio->ambildatamod($value->id_biodata, "skill3", "personal", "id_biodata", "skill3");
			if ($skill3 != '') {
				$review6 = '-'.$skill3;
			}else{
				$review6 = '';
			}

			// penambahan baru

			$alamatD = $this->M_databio->ambildatamod($value->id_biodata, "alamat", "disnaker", "id_biodata", "alamat");


		    $document->setValue('value1#'.$nn,$nn);

		    $document->setValue('value2#'.$nn,$value->id_biodata.$review1.$review2.$review3.$review4.$review5.$review6);
		    $document->setValue('value3#'.$nn,$value->nama);

		    $document->setValue('value4#'.$nn,$value->kode_sponsor);
		    $document->setValue('value5#'.$nn,$ftgldaftar[$nn]);

		    $document->setValue('value6#'.$nn,$fstatusaktif[$nn]);
		    $document->setValue('value7#'.$nn,$stat1[$nn].', '.$stat2[$nn].', '.$stat3[$nn].', '.$stat4[$nn].', '.$stat5[$nn].', '.$stat6[$nn].', '.$stat7[$nn].', '.$stat8[$nn].', '.$stat9[$nn].', '.$stat10[$nn].', '.$stat11[$nn].', '.$stat12[$nn].', '.$stat13[$nn].', '.$stat14[$nn].', '.$stat15[$nn]);

		    $document->setValue('value8#'.$nn,$fumur[$nn].'/'.$ftinggi[$nn].'/'.$fberat[$nn]);
		    $document->setValue('value9#'.$nn,$fdostatus[$nn]);

		    $document->setValue('value10#'.$nn,$fpendidikan[$nn]);
		    $document->setValue('value11#'.$nn,$fnotelp[$nn].'+'.$fnotelpkel[$nn]);

		    $document->setValue('value12#'.$nn,$fdotglbuat[$nn]);
		    $document->setValue('value13#'.$nn,$fdonodisnaker[$nn]);

		    $document->setValue('value14#'.$nn,$fketadm[$nn]);

		    $document->setValue('value15#'.$nn,'('.$jmlfingerpagi[$nn].')('.$jmlfingersore[$nn].')');
		    $document->setValue('value16#'.$nn,$tglterakhirfinger[$nn]);

			if ( $status == 21 || $status == 22 || $status == 23 || $status == 24 ) {
			    $document->setValue('value17#'.$nn,$expiredpaspor[$nn]);
			    $document->setValue('value18#'.$nn,'');
			} else {
			    $document->setValue('value17#'.$nn,$ajupaspor[$nn]);
			    $document->setValue('value18#'.$nn,$terimapaspor[$nn]);
			}

		    

		    $document->setValue('value19#'.$nn,$tglmajikan[$nn]);
		    $document->setValue('value20#'.$nn,$kodeagen[$nn]);

		    $document->setValue('value21#'.$nn,$tglpk[$nn]);
		    $document->setValue('value22#'.$nn,$tglterbangs[$nn]);
		    $document->setValue('alamat#'.$nn,$alamatD);

			$nn++;
		}

		$document->setValue('value23',$idbiozx);
		$document->setValue('value24',$dante.' ~ '.$dante2);
		$document->setValue('value25',$full_sponsorr);
		$document->setValue('value26',$status_word);
		$filename = 'filenya.docx';

		$isinya=$document->save($filename);

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

	function coba() {
		$pilsek = 'MF';
		$idbio = $this->M_databio->ambiltki($pilsek);
		for($i=0;$i<count($idbio);$i++){
			$where_personal[$i] = "where id_biodata='$idbio[$i]'";
			$personal[] = $this->M_databio->ambilnama($where_personal[$i]);
		}
		echo '<pre>';
		print_r($personal);
		echo '</pre>';

	}
}