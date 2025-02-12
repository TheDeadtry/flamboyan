<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class markinformal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_markinformal');			
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
				redirect('markinformal/tampidatagroup');
			}
		}	 
	}

	function filterdatamarketing(){
		$data['tampil_data_personal'] = $this->M_markinformal->tampil_data_agen_group();

		$data['tampil_pilihan_agen'] = $this->M_markinformal->tampil_pilihan_agen();

		$data['namamodule'] = "markinformal";
		$data['namafileview'] = "markinformalagen";
		echo Modules::run('template/admin_template', $data);
	}

	function setpilih(){
		$this->session->set_userdata('idagen', $this->input->post('idagen'));
		redirect('markinformal/tampidatagroup');
	}

	function setpilihnya(){
		$this->session->set_userdata('idagen', $this->input->post('idagen'));
		redirect('markinformal/tampidatagroupnya');
	}

	function setpilih2(){
		$this->session->set_userdata('idagen', $this->input->post('idagen'));
		redirect('markinformal/tampidatagroupagen');
	}

	function updateket() {
		$this->M_markinformal->updateket();
		redirect('markinformal/tampidatagroup');
	}

	function tampidatagroup(){
				$session = $this->M_session->get_session();
				$id_user = $session['session_userid'];
				$idagen = $this->session->userdata('idagen');
				$data['idagen'] = $idagen;
			$data['tampil_pilihan_agen'] = $this->M_markinformal->tampil_pilihan_agen();


				$ambiltki = $this->M_markinformal->ambiltki();

 $idbio=array();
 $namatki=array();
 $namamandarin=array();
 $delete=array();

 $tgltoagen=array();
 $personal=array();
 $tgldisnaker=array();
 $namamajikan=array();
 $namamajikanman=array();
 $perkiraandisnaker=array();
 $dataketerangan=array();

 $nodisnaker=array();
 $terpilihmajikan=array();
 $jdmajikan=array();
 $terbangmajikan=array();
 $tglberangkat=array();

 $statusberangkat=array();
 $tgldisnaker=array();
 $jamtiba=array();
 $tiket=array();
 $tglnyaberangkat=array();


 $statusberangkat=array();
 $tglpk=array();
 $tglterimasuhan=array();
 $no_suhan=array();
 $tglexp_suhan=array();


 $tglterimavisapermit=array();
 $no_visapermit=array();
 $tglterbit_visapermit=array();
 $tglexp_visapermit=array();
 $pasporlama=array();


 $ajupaspor=array();
 $ajustatpaspor=array();
 $fotopaspor=array();
 $fotostatpaspor=array();
 $terimapaspor=array();


 $terimastatpaspor=array();
 $pengajuan_skck=array();
 $pengajuanstat_skck=array();
 $terima_skck=array();
 $terimastat_skck=array();

 $tglexp_skck=array();
 $kocokan_visa=array();
 $kocokanstats_visa=array();
 $finger_visa=array();
 $fingerstats_visa=array();

 $terima_visa=array();
 $terimastats_visa=array();
 $loanbank=array();
 $pap_visa=array();
 $papstats_visa=array();

 $ktkln_visa=array();
 $kklnstats_visa=array();
  $keberangkatan=array();
 $statusterbang=array();
  $tglterbit_suhan=array();
   $medicalpra="";
    $medicalfull="";
 
   $medical=array();
   $medicalexp=array();
$keterangan_suhan=array();
$keterangan_visapermit=array();
$ambilmajikan2="";
$tgterbitpaspor=array();

$hitunganfingernodaftujuh=array();
$hitunganfingernodafbelas=array();
$tglterakhirfinger=array();
$jmlfingerpagi=array();
$jmlfingersore=array();

 					$nonya=0;
				for($i=0;$i<count($ambiltki);$i++){
					// $namanya="";
					$namanya= $this->M_markinformal->markawal($ambiltki[$i]);
					$agendata= $this->M_markinformal->markagen($ambiltki[$i]);

					// echo "".$ambiltki[$i];
					// echo "".$namanya;
					// echo "+".$idagen;
					// echo "-".$agendata."<br>";

					if($agendata!=null || $namanya!=null){
						// echo "mas";
						if($namanya!=null && $agendata==null && $namanya==$idagen){
							// echo "mas1";
							// echo "isinyaloo".$ambiltki[$i];
							$idbio[$nonya]= $this->M_markinformal->idbiodata($ambiltki[$i]);
							// echo "isinyaloo".$nonya;
						}
						if($namanya==null && $agendata!=null && $agendata==$idagen){
							// echo "mas2";
							$idbio[$nonya]= $this->M_markinformal->idbiodata($ambiltki[$i]);
						}
						if($namanya!=null && $agendata!=null && $agendata==$idagen){
							// echo "mas3";
							$idbio[$nonya]= $this->M_markinformal->idbiodata($ambiltki[$i]);
						}
						if($namanya!=null && $agendata!=null && $agendata!=$idagen){
							// echo "mas4";
							$delete[]=$nonya;
						}
					$nonya++;
					}
						
				}
					// echo "string jumah".count($idbio);

// echo "ssdsdsdsd".$idbio[0];

				for($i=0;$i<count($delete);$i++){
					// echo "i nya ".count($i);
					$no=$delete[$i];
					array_splice($idbio, $no, 0);
					}

					
					for($i=0;$i<count($idbio);$i++){
						// echo "string".$idbio[$i];

					$ambilmajikan2= $this->M_markinformal->ambilmajikan($idbio[$i]);
					$namamajikan[]= $this->M_markinformal->namamajikan($idbio[$i]);
					$namamajikanman[]= $this->M_markinformal->namamajikanman($idbio[$i]);
					$dataketerangan[]= $this->M_markinformal->datketerangan($idbio[$i]);

					$hitunganfingernodaftujuh[]= $this->M_markinformal->hitunganfingernodaftujuh($idbio[$i]);
					$hitunganfingernodafbelas[]= $this->M_markinformal->hitunganfingernodafbelas($idbio[$i]);
					$tglterakhirfinger[]= $this->M_markinformal->tglterakhirfinger($idbio[$i]);

					$jmlfingerpagi[]= $this->M_markinformal->jmlfingerpagi($idbio[$i]);
					$jmlfingersore[]= $this->M_markinformal->jmlfingersore($idbio[$i]);



					$personal[]= $this->M_markinformal->ambilnama($idbio[$i]);
					$tgltoagen[]= $this->M_markinformal->marketawal($idbio[$i]);
					$tgldisnaker[]= $this->M_markinformal->tgldisnaker($idbio[$i]);
					$perkiraandisnaker[]= $this->M_markinformal->perkiraandisnaker($idbio[$i]);
					$nodisnaker[]= $this->M_markinformal->nodisnaker($idbio[$i]);

					$terpilihmajikan[]= $this->M_markinformal->terpilihmajikan($idbio[$i]);
					$jdmajikan[]= $this->M_markinformal->jdmajikan($idbio[$i]);
					$terbangmajikan[]= $this->M_markinformal->terbangmajikan($idbio[$i]);

					$tglberangkat[]= $this->M_markinformal->tglberangkat($idbio[$i]);
					$statusberangkat[]= $this->M_markinformal->statusberangkat($idbio[$i]);
					$jadwal= $this->M_markinformal->jadwal($idbio[$i]);
					$keberangkatan[]= $this->M_markinformal->keberangkatan($jadwal);
					$jamtiba[]= $this->M_markinformal->jamtiba($jadwal);
					$tiket[]= $this->M_markinformal->tiket($idbio[$i]);
					$tglnyaberangkat[]= $this->M_markinformal->tglnyaberangkat($idbio[$i]);
					$statusterbang[]= $this->M_markinformal->statusterbang($idbio[$i]);

					$tglpk[]= $this->M_markinformal->tglpk($idbio[$i]);

					$ambilsuhan= $this->M_markinformal->ambilsuhan($idbio[$i]);
					$tglterimasuhan[]= $this->M_markinformal->tglterimasuhan($idbio[$i]);
					$no_suhan[]= $this->M_markinformal->no_suhan($idbio[$i]);
					$tglterbit_suhan[]= $this->M_markinformal->tglterbit_suhan($idbio[$i]);
					$tglexp_suhan[]= $this->M_markinformal->tglexp_suhan($idbio[$i]);
					$keterangan_suhan[]= $this->M_markinformal->keterangan_suhan($idbio[$i]);


					$ambilvisapermit= $this->M_markinformal->ambilvisapermit($idbio[$i]);
					$tglterimavisapermit[]= $this->M_markinformal->tglterimavisapermit($idbio[$i]);
					$no_visapermit[]= $this->M_markinformal->no_visapermit($idbio[$i]);
					$tglterbit_visapermit[]= $this->M_markinformal->tglterbit_visapermit($idbio[$i]);
					$tglexp_visapermit[]= $this->M_markinformal->tglexp_visapermit($idbio[$i]);
					$keterangan_visapermit[]= $this->M_markinformal->keterangan_visapermit($idbio[$i]);

					$pasporx= $this->M_markinformal->pasporlama($idbio[$i]);
					$pasporx=str_replace('-','.',$pasporx);
					$pasporlama[]=$pasporx;

					$ajupaspor[]= $this->M_markinformal->ajupaspor($idbio[$i]);
					$ajustatpaspor[]= $this->M_markinformal->ajustatpaspor($idbio[$i]);
					$fotopaspor[]= $this->M_markinformal->fotopaspor($idbio[$i]);
					$fotostatpaspor[]= $this->M_markinformal->fotostatpaspor($idbio[$i]);
					$terimapaspor[]= $this->M_markinformal->terimapaspor($idbio[$i]);
					$terimastatpaspor[]= $this->M_markinformal->terimastatpaspor($idbio[$i]);
					$tgterbitpaspor[]= $this->M_markinformal->tgterbitpaspor($idbio[$i]);

					$pengajuan_skck[]= $this->M_markinformal->pengajuan_skck($idbio[$i]);
					$pengajuanstat_skck[]= $this->M_markinformal->pengajuanstat_skck($idbio[$i]);
					$terima_skck[]= $this->M_markinformal->terima_skck($idbio[$i]);
					$terimastat_skck[]= $this->M_markinformal->terimastat_skck($idbio[$i]);
					$tglexp_skck[]= $this->M_markinformal->tglexp_skck($idbio[$i]);

					$kocokan_visa[]= $this->M_markinformal->kocokan_visa($idbio[$i]);
					$kocokanstats_visa[]= $this->M_markinformal->kocokanstats_visa($idbio[$i]);
					$finger_visa[]= $this->M_markinformal->finger_visa($idbio[$i]);
					$fingerstats_visa[]= $this->M_markinformal->fingerstats_visa($idbio[$i]);
					$terima_visa[]= $this->M_markinformal->terima_visa($idbio[$i]);
					$terimastats_visa[]= $this->M_markinformal->terimastats_visa($idbio[$i]);

					$loanbank[]= $this->M_markinformal->loanbank($idbio[$i]);

					$pap_visa[]= $this->M_markinformal->pap_visa($idbio[$i]);
					$papstats_visa[]= $this->M_markinformal->papstats_visa($idbio[$i]);
					$ktkln_visa[]= $this->M_markinformal->ktkln_visa($idbio[$i]);
					$kklnstats_visa[]= $this->M_markinformal->kklnstats_visa($idbio[$i]);

					$medicalpra=$this->M_markinformal->medicalpra($idbio[$i]);
					$medicalfull=$this->M_markinformal->medicalfull($idbio[$i]);
					$medikalnya="";
					$expnya="";
					if($medicalfull==null){
					$medikalnya=$this->M_markinformal->medicalpra($idbio[$i]);
					$expnya=$this->M_markinformal->medicalpraexp($idbio[$i]);
					}
					if($medicalfull!=null){
					$medikalnya=$this->M_markinformal->medicalfull($idbio[$i]);
					$expnya=$this->M_markinformal->medicalfullexp($idbio[$i]);
					}
					$medical[]=$medikalnya;
					$expnya=str_replace('-','.',$expnya);
					$medicalexp[]=$expnya;

					}

	$data['personal']=$personal;
	$data['tgltoagen']=$tgltoagen;
	$data['namamajikan']=$namamajikan;
	$data['namamajikanman']=$namamajikanman;
$data['dataketerangan']=$dataketerangan;
	$data['tgldisnaker']=$tgldisnaker;
	$data['perkiraandisnaker']=$perkiraandisnaker;
	$data['nodisnaker']=$nodisnaker;
	$data['tglterakhirfinger']=$tglterakhirfinger;

	$data['jmlfingerpagi'] = $jmlfingerpagi;
	$data['jmlfingersore'] = $jmlfingersore;

	$data['terpilihmajikan']=$terpilihmajikan;
	$data['jdmajikan']=$jdmajikan;
	$data['terbangmajikan']=$terbangmajikan;

	$data['tglberangkat']=$tglberangkat;
	$data['statusberangkat']=$statusberangkat;
	$data['keberangkatan']=$keberangkatan;
	$data['jamtiba']=$jamtiba;
	$data['tiket']=$tiket;
	$data['tglnyaberangkat']=$tglnyaberangkat;
	$data['statusterbang']=$statusterbang;

	$data['tglpk']=$tglpk;

	$data['tglterimasuhan']=$tglterimasuhan;
	$data['no_suhan']=$no_suhan;
	$data['tglterbit_suhan']=$tglterbit_suhan;
	$data['tglexp_suhan']=$tglexp_suhan;
	$data['keterangan_suhan']=$keterangan_suhan;

	$data['tglterimavisapermit']=$tglterimavisapermit;
	$data['no_visapermit']=$no_visapermit;
	$data['tglterbit_visapermit']=$tglterbit_visapermit;
	$data['tglexp_visapermit']=$tglexp_visapermit;
	$data['keterangan_visapermit']=$keterangan_visapermit;

	$data['hitunganfingernodaftujuh'] = $hitunganfingernodaftujuh;
	$data['hitunganfingernodafbelas'] = $hitunganfingernodafbelas;

	$data['pasporlama']=$pasporlama;

	$data['ajupaspor']=$ajupaspor;
	$data['ajustatpaspor']=$ajustatpaspor;
	$data['fotopaspor']=$fotopaspor;
	$data['fotostatpaspor']=$fotostatpaspor;
	$data['terimapaspor']=$terimapaspor;
	$data['terimastatpaspor']=$terimastatpaspor;
$data['tgterbitpaspor']=$tgterbitpaspor;
	$data['pengajuan_skck']=$pengajuan_skck;
	$data['pengajuanstat_skck']=$pengajuanstat_skck;
	$data['terima_skck']=$terima_skck;
	$data['terimastat_skck']=$terimastat_skck;
	$data['tglexp_skck']=$tglexp_skck;

	$data['kocokan_visa']=$kocokan_visa;
	$data['kocokanstats_visa']=$kocokanstats_visa;
	$data['finger_visa']=$finger_visa;
	$data['fingerstats_visa']=$fingerstats_visa;
	$data['terima_visa']=$terima_visa;
	$data['terimastats_visa']=$terimastats_visa;

	$data['loanbank']=$loanbank;

	$data['pap_visa']=$pap_visa;
	$data['papstats_visa']=$papstats_visa;
	$data['ktkln_visa']=$ktkln_visa;
	$data['kklnstats_visa']=$kklnstats_visa;

	$data['medical']=$medical;
	$data['medicalexp']=$medicalexp;

			$data['namamodule'] = "markinformal";
			$data['namafileview'] = "markinformal";
			echo Modules::run('template/kosongan_template2', $data);

	}

			function tampidatagroupnya(){
					$session = $this->M_session->get_session();
				$id_user = $session['session_userid'];
				$idagen = $this->session->userdata('idagen');
				$data['idagen'] = $idagen;
			$data['tampil_pilihan_agen'] = $this->M_markinformal->tampil_pilihan_agen();


				$ambiltki = $this->M_markinformal->ambiltkiterbang();

 $idbio=array();
 $namatki=array();
 $namamandarin=array();
 $delete=array();

 $tgltoagen=array();
 $personal=array();
 $tgldisnaker=array();
 $namamajikan=array();
 $namamajikanman=array();
 $perkiraandisnaker=array();
 $dataketerangan=array();

 $nodisnaker=array();
 $terpilihmajikan=array();
 $jdmajikan=array();
 $terbangmajikan=array();
 $tglberangkat=array();

 $statusberangkat=array();
 $tgldisnaker=array();
 $jamtiba=array();
 $tiket=array();
 $tglnyaberangkat=array();


 $statusberangkat=array();
 $tglpk=array();
 $tglterimasuhan=array();
 $no_suhan=array();
 $tglexp_suhan=array();


 $tglterimavisapermit=array();
 $no_visapermit=array();
 $tglterbit_visapermit=array();
 $tglexp_visapermit=array();
 $pasporlama=array();


 $ajupaspor=array();
 $ajustatpaspor=array();
 $fotopaspor=array();
 $fotostatpaspor=array();
 $terimapaspor=array();


 $terimastatpaspor=array();
 $pengajuan_skck=array();
 $pengajuanstat_skck=array();
 $terima_skck=array();
 $terimastat_skck=array();

 $tglexp_skck=array();
 $kocokan_visa=array();
 $kocokanstats_visa=array();
 $finger_visa=array();
 $fingerstats_visa=array();

 $terima_visa=array();
 $terimastats_visa=array();
 $loanbank=array();
 $pap_visa=array();
 $papstats_visa=array();

 $ktkln_visa=array();
 $kklnstats_visa=array();
  $keberangkatan=array();
 $statusterbang=array();
  $tglterbit_suhan=array();
   $medicalpra="";
    $medicalfull="";
 
   $medical=array();
   $medicalexp=array();
$keterangan_suhan=array();
$keterangan_visapermit=array();
$ambilmajikan2="";
$tgterbitpaspor=array();

$hitunganfingernodaftujuh=array();
$hitunganfingernodafbelas=array();
$tglterakhirfinger=array();
$jmlfingerpagi=array();
$jmlfingersore=array();

 					$nonya=0;
				for($i=0;$i<count($ambiltki);$i++){
					// $namanya="";
					$namanya= $this->M_markinformal->markawal($ambiltki[$i]);
					$agendata= $this->M_markinformal->markagen($ambiltki[$i]);

					// echo "".$ambiltki[$i];
					// echo "".$namanya;
					// echo "+".$idagen;
					// echo "-".$agendata."<br>";

					if($agendata!=null || $namanya!=null){
						// echo "mas";
						if($namanya!=null && $agendata==null && $namanya==$idagen){
							// echo "mas1";
							// echo "isinyaloo".$ambiltki[$i];
							$idbio[$nonya]= $this->M_markinformal->idbiodata($ambiltki[$i]);
							// echo "isinyaloo".$nonya;
						}
						if($namanya==null && $agendata!=null && $agendata==$idagen){
							// echo "mas2";
							$idbio[$nonya]= $this->M_markinformal->idbiodata($ambiltki[$i]);
						}
						if($namanya!=null && $agendata!=null && $agendata==$idagen){
							// echo "mas3";
							$idbio[$nonya]= $this->M_markinformal->idbiodata($ambiltki[$i]);
						}
						if($namanya!=null && $agendata!=null && $agendata!=$idagen){
							// echo "mas4";
							$delete[]=$nonya;
						}
					$nonya++;
					}
						
				}
					// echo "string jumah".count($idbio);

// echo "ssdsdsdsd".$idbio[0];

				for($i=0;$i<count($delete);$i++){
					// echo "i nya ".count($i);
					$no=$delete[$i];
					array_splice($idbio, $no, 0);
					}

					
					for($i=0;$i<count($idbio);$i++){
						// echo "string".$idbio[$i];

					$ambilmajikan2= $this->M_markinformal->ambilmajikan($idbio[$i]);
					$namamajikan[]= $this->M_markinformal->namamajikan($idbio[$i]);
					$namamajikanman[]= $this->M_markinformal->namamajikanman($idbio[$i]);
					$dataketerangan[]= $this->M_markinformal->datketerangan($idbio[$i]);

					$hitunganfingernodaftujuh[]= $this->M_markinformal->hitunganfingernodaftujuh($idbio[$i]);
					$hitunganfingernodafbelas[]= $this->M_markinformal->hitunganfingernodafbelas($idbio[$i]);
					$tglterakhirfinger[]= $this->M_markinformal->tglterakhirfinger($idbio[$i]);

					$jmlfingerpagi[]= $this->M_markinformal->jmlfingerpagi($idbio[$i]);
					$jmlfingersore[]= $this->M_markinformal->jmlfingersore($idbio[$i]);



					$personal[]= $this->M_markinformal->ambilnama($idbio[$i]);
					$tgltoagen[]= $this->M_markinformal->marketawal($idbio[$i]);
					$tgldisnaker[]= $this->M_markinformal->tgldisnaker($idbio[$i]);
					$perkiraandisnaker[]= $this->M_markinformal->perkiraandisnaker($idbio[$i]);
					$nodisnaker[]= $this->M_markinformal->nodisnaker($idbio[$i]);

					$terpilihmajikan[]= $this->M_markinformal->terpilihmajikan($idbio[$i]);
					$jdmajikan[]= $this->M_markinformal->jdmajikan($idbio[$i]);
					$terbangmajikan[]= $this->M_markinformal->terbangmajikan($idbio[$i]);

					$tglberangkat[]= $this->M_markinformal->tglberangkat($idbio[$i]);
					$statusberangkat[]= $this->M_markinformal->statusberangkat($idbio[$i]);
					$jadwal= $this->M_markinformal->jadwal($idbio[$i]);
					$keberangkatan[]= $this->M_markinformal->keberangkatan($jadwal);
					$jamtiba[]= $this->M_markinformal->jamtiba($jadwal);
					$tiket[]= $this->M_markinformal->tiket($idbio[$i]);
					$tglnyaberangkat[]= $this->M_markinformal->tglnyaberangkat($idbio[$i]);
					$statusterbang[]= $this->M_markinformal->statusterbang($idbio[$i]);

					$tglpk[]= $this->M_markinformal->tglpk($idbio[$i]);

					$ambilsuhan= $this->M_markinformal->ambilsuhan($idbio[$i]);
					$tglterimasuhan[]= $this->M_markinformal->tglterimasuhan($idbio[$i]);
					$no_suhan[]= $this->M_markinformal->no_suhan($idbio[$i]);
					$tglterbit_suhan[]= $this->M_markinformal->tglterbit_suhan($idbio[$i]);
					$tglexp_suhan[]= $this->M_markinformal->tglexp_suhan($idbio[$i]);
					$keterangan_suhan[]= $this->M_markinformal->keterangan_suhan($idbio[$i]);


					$ambilvisapermit= $this->M_markinformal->ambilvisapermit($idbio[$i]);
					$tglterimavisapermit[]= $this->M_markinformal->tglterimavisapermit($idbio[$i]);
					$no_visapermit[]= $this->M_markinformal->no_visapermit($idbio[$i]);
					$tglterbit_visapermit[]= $this->M_markinformal->tglterbit_visapermit($idbio[$i]);
					$tglexp_visapermit[]= $this->M_markinformal->tglexp_visapermit($idbio[$i]);
					$keterangan_visapermit[]= $this->M_markinformal->keterangan_visapermit($idbio[$i]);

					$pasporx= $this->M_markinformal->pasporlama($idbio[$i]);
					$pasporx=str_replace('-','.',$pasporx);
					$pasporlama[]=$pasporx;

					$ajupaspor[]= $this->M_markinformal->ajupaspor($idbio[$i]);
					$ajustatpaspor[]= $this->M_markinformal->ajustatpaspor($idbio[$i]);
					$fotopaspor[]= $this->M_markinformal->fotopaspor($idbio[$i]);
					$fotostatpaspor[]= $this->M_markinformal->fotostatpaspor($idbio[$i]);
					$terimapaspor[]= $this->M_markinformal->terimapaspor($idbio[$i]);
					$terimastatpaspor[]= $this->M_markinformal->terimastatpaspor($idbio[$i]);
					$tgterbitpaspor[]= $this->M_markinformal->tgterbitpaspor($idbio[$i]);

					$pengajuan_skck[]= $this->M_markinformal->pengajuan_skck($idbio[$i]);
					$pengajuanstat_skck[]= $this->M_markinformal->pengajuanstat_skck($idbio[$i]);
					$terima_skck[]= $this->M_markinformal->terima_skck($idbio[$i]);
					$terimastat_skck[]= $this->M_markinformal->terimastat_skck($idbio[$i]);
					$tglexp_skck[]= $this->M_markinformal->tglexp_skck($idbio[$i]);

					$kocokan_visa[]= $this->M_markinformal->kocokan_visa($idbio[$i]);
					$kocokanstats_visa[]= $this->M_markinformal->kocokanstats_visa($idbio[$i]);
					$finger_visa[]= $this->M_markinformal->finger_visa($idbio[$i]);
					$fingerstats_visa[]= $this->M_markinformal->fingerstats_visa($idbio[$i]);
					$terima_visa[]= $this->M_markinformal->terima_visa($idbio[$i]);
					$terimastats_visa[]= $this->M_markinformal->terimastats_visa($idbio[$i]);

					$loanbank[]= $this->M_markinformal->loanbank($idbio[$i]);

					$pap_visa[]= $this->M_markinformal->pap_visa($idbio[$i]);
					$papstats_visa[]= $this->M_markinformal->papstats_visa($idbio[$i]);
					$ktkln_visa[]= $this->M_markinformal->ktkln_visa($idbio[$i]);
					$kklnstats_visa[]= $this->M_markinformal->kklnstats_visa($idbio[$i]);

					$medicalpra=$this->M_markinformal->medicalpra($idbio[$i]);
					$medicalfull=$this->M_markinformal->medicalfull($idbio[$i]);
					$medikalnya="";
					$expnya="";
					if($medicalfull==null){
					$medikalnya=$this->M_markinformal->medicalpra($idbio[$i]);
					$expnya=$this->M_markinformal->medicalpraexp($idbio[$i]);
					}
					if($medicalfull!=null){
					$medikalnya=$this->M_markinformal->medicalfull($idbio[$i]);
					$expnya=$this->M_markinformal->medicalfullexp($idbio[$i]);
					}
					$medical[]=$medikalnya;
					$expnya=str_replace('-','.',$expnya);
					$medicalexp[]=$expnya;

					}

	$data['personal']=$personal;
	$data['tgltoagen']=$tgltoagen;
	$data['namamajikan']=$namamajikan;
	$data['namamajikanman']=$namamajikanman;
$data['dataketerangan']=$dataketerangan;
	$data['tgldisnaker']=$tgldisnaker;
	$data['perkiraandisnaker']=$perkiraandisnaker;
	$data['nodisnaker']=$nodisnaker;
	$data['tglterakhirfinger']=$tglterakhirfinger;

	$data['jmlfingerpagi'] = $jmlfingerpagi;
	$data['jmlfingersore'] = $jmlfingersore;

	$data['terpilihmajikan']=$terpilihmajikan;
	$data['jdmajikan']=$jdmajikan;
	$data['terbangmajikan']=$terbangmajikan;

	$data['tglberangkat']=$tglberangkat;
	$data['statusberangkat']=$statusberangkat;
	$data['keberangkatan']=$keberangkatan;
	$data['jamtiba']=$jamtiba;
	$data['tiket']=$tiket;
	$data['tglnyaberangkat']=$tglnyaberangkat;
	$data['statusterbang']=$statusterbang;

	$data['tglpk']=$tglpk;

	$data['tglterimasuhan']=$tglterimasuhan;
	$data['no_suhan']=$no_suhan;
	$data['tglterbit_suhan']=$tglterbit_suhan;
	$data['tglexp_suhan']=$tglexp_suhan;
	$data['keterangan_suhan']=$keterangan_suhan;

	$data['tglterimavisapermit']=$tglterimavisapermit;
	$data['no_visapermit']=$no_visapermit;
	$data['tglterbit_visapermit']=$tglterbit_visapermit;
	$data['tglexp_visapermit']=$tglexp_visapermit;
	$data['keterangan_visapermit']=$keterangan_visapermit;

	$data['hitunganfingernodaftujuh'] = $hitunganfingernodaftujuh;
	$data['hitunganfingernodafbelas'] = $hitunganfingernodafbelas;

	$data['pasporlama']=$pasporlama;

	$data['ajupaspor']=$ajupaspor;
	$data['ajustatpaspor']=$ajustatpaspor;
	$data['fotopaspor']=$fotopaspor;
	$data['fotostatpaspor']=$fotostatpaspor;
	$data['terimapaspor']=$terimapaspor;
	$data['terimastatpaspor']=$terimastatpaspor;
$data['tgterbitpaspor']=$tgterbitpaspor;
	$data['pengajuan_skck']=$pengajuan_skck;
	$data['pengajuanstat_skck']=$pengajuanstat_skck;
	$data['terima_skck']=$terima_skck;
	$data['terimastat_skck']=$terimastat_skck;
	$data['tglexp_skck']=$tglexp_skck;

	$data['kocokan_visa']=$kocokan_visa;
	$data['kocokanstats_visa']=$kocokanstats_visa;
	$data['finger_visa']=$finger_visa;
	$data['fingerstats_visa']=$fingerstats_visa;
	$data['terima_visa']=$terima_visa;
	$data['terimastats_visa']=$terimastats_visa;

	$data['loanbank']=$loanbank;

	$data['pap_visa']=$pap_visa;
	$data['papstats_visa']=$papstats_visa;
	$data['ktkln_visa']=$ktkln_visa;
	$data['kklnstats_visa']=$kklnstats_visa;

	$data['medical']=$medical;
	$data['medicalexp']=$medicalexp;

			$data['namamodule'] = "markinformal";
			$data['namafileview'] = "markinformalterbang";
			echo Modules::run('template/kosongan_template2', $data);

	}


}