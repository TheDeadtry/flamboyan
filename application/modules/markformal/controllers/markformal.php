<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class markformal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_markformal');			
	}
	
	function index(){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){
				redirect('markformal/tampidatagroup');
			}
		}	 
	}

	function filterdatamarketing(){
		$data['tampil_data_personal'] = $this->M_markformal->tampil_data_agen_group();

		$data['tampil_pilihan_agen'] = $this->M_markformal->tampil_pilihan_agen();

		$data['namamodule'] = "markformal";
		$data['namafileview'] = "markformalagen";
		echo Modules::run('template/admin_template', $data);
		
	}

	function setpilih(){
		$this->session->set_userdata('idagen', $this->input->post('idagen'));
		redirect('markformal/tampidatagroup');
	}

	function setpilihnya(){
		$this->session->set_userdata('idagen', $this->input->post('idagen'));
		redirect('markformal/tampidatagroupnya');
	}

	function updateket() {
			$this->M_markformal->updateket();
			redirect('markformal/tampidatagroup');
	}

	function tampidatagroup(){
				$session = $this->M_session->get_session();
				$id_user = $session['session_userid'];
				$idagen = $this->session->userdata('idagen');
				$data['idagen'] = $idagen;
			$data['tampil_pilihan_agen'] = $this->M_markformal->tampil_pilihan_agen();
$execute = $this->M_markformal->updatedataterbang();

				$ambiltki = $this->M_markformal->ambiltki();

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
$tgterbitpaspor=array();

 					$nonya=0;
				for($i=0;$i<count($ambiltki);$i++){
					// $namanya="";
					$namanya= $this->M_markformal->markawal($ambiltki[$i]);
					$agendata= $this->M_markformal->markagen($ambiltki[$i]);
					if($agendata!=null || $namanya!=null){
						
						if($namanya!=null && $agendata==null && $namanya==$idagen){
							$idbio[$nonya]= $this->M_markformal->idbiodata($ambiltki[$i]);
						}
						if($namanya==null && $agendata!=null && $agendata==$idagen){
							$idbio[$nonya]= $this->M_markformal->idbiodata($ambiltki[$i]);
						}
						if($namanya!=null && $agendata!=null && $agendata==$idagen){
							$idbio[$nonya]= $this->M_markformal->idbiodata($ambiltki[$i]);
						}
						if($namanya!=null && $agendata!=null && $agendata!=$idagen){
							$delete[]=$nonya;
						}
						$nonya++;
					}
				}
				for($i=0;$i<count($delete);$i++){
					$no=$delete[$i];
					array_splice($idbio, $no, 0);
					}

					for($i=0;$i<count($idbio);$i++){

					$ambilmajikan= $this->M_markformal->ambilmajikan($idbio[$i]);
					$namamajikan[]= $this->M_markformal->namamajikan($ambilmajikan);
					$namamajikanman[]= $this->M_markformal->namamajikanman($ambilmajikan);
					$dataketerangan[]= $this->M_markformal->datketerangan($idbio[$i]);

					$personal[]= $this->M_markformal->ambilnama($idbio[$i]);
					$tgltoagen[]= $this->M_markformal->marketawal($idbio[$i]);
					$tgldisnaker[]= $this->M_markformal->tgldisnaker($idbio[$i]);
					$perkiraandisnaker[]= $this->M_markformal->perkiraandisnaker($idbio[$i]);
					$nodisnaker[]= $this->M_markformal->nodisnaker($idbio[$i]);

					$terpilihmajikan[]= $this->M_markformal->terpilihmajikan($idbio[$i]);
					$jdmajikan[]= $this->M_markformal->jdmajikan($idbio[$i]);
					$terbangmajikan[]= $this->M_markformal->terbangmajikan($idbio[$i]);

					$tglberangkat[]= $this->M_markformal->tglberangkat($idbio[$i]);
					$statusberangkat[]= $this->M_markformal->statusberangkat($idbio[$i]);
					$jadwal= $this->M_markformal->jadwal($idbio[$i]);
					$keberangkatan[]= $this->M_markformal->keberangkatan($jadwal);
					$jamtiba[]= $this->M_markformal->jamtiba($jadwal);
					$tiket[]= $this->M_markformal->tiket($idbio[$i]);
					$tglnyaberangkat[]= $this->M_markformal->tglnyaberangkat($idbio[$i]);
					$statusterbang[]= $this->M_markformal->statusterbang($idbio[$i]);

					$tglpk[]= $this->M_markformal->tglpk($idbio[$i]);

					$ambilsuhan= $this->M_markformal->ambilsuhan($idbio[$i]);
					$tglterimasuhan[]= $this->M_markformal->tglterimasuhan($ambilsuhan);
					$no_suhan[]= $this->M_markformal->no_suhan($ambilsuhan);
					$tglterbit_suhan[]= $this->M_markformal->tglterbit_suhan($ambilsuhan);
					$tglexp_suhan[]= $this->M_markformal->tglexp_suhan($ambilsuhan);

					$ambilvisapermit= $this->M_markformal->ambilvisapermit($idbio[$i]);
					$tglterimavisapermit[]= $this->M_markformal->tglterimavisapermit($ambilvisapermit);
					$no_visapermit[]= $this->M_markformal->no_visapermit($ambilvisapermit);
					$tglterbit_visapermit[]= $this->M_markformal->tglterbit_visapermit($ambilvisapermit);
					$tglexp_visapermit[]= $this->M_markformal->tglexp_visapermit($ambilvisapermit);

					$pasporx= $this->M_markformal->pasporlama($idbio[$i]);
					$pasporx=str_replace('-','.',$pasporx);
					$pasporlama[]=$pasporx;

					$ajupaspor[]= $this->M_markformal->ajupaspor($idbio[$i]);
					$ajustatpaspor[]= $this->M_markformal->ajustatpaspor($idbio[$i]);
					$fotopaspor[]= $this->M_markformal->fotopaspor($idbio[$i]);
					$fotostatpaspor[]= $this->M_markformal->fotostatpaspor($idbio[$i]);
					$terimapaspor[]= $this->M_markformal->terimapaspor($idbio[$i]);
					$terimastatpaspor[]= $this->M_markformal->terimastatpaspor($idbio[$i]);
					$tgterbitpaspor[]= $this->M_markformal->tgterbitpaspor($idbio[$i]);

					$pengajuan_skck[]= $this->M_markformal->pengajuan_skck($idbio[$i]);
					$pengajuanstat_skck[]= $this->M_markformal->pengajuanstat_skck($idbio[$i]);
					$terima_skck[]= $this->M_markformal->terima_skck($idbio[$i]);
					$terimastat_skck[]= $this->M_markformal->terimastat_skck($idbio[$i]);
					$tglexp_skck[]= $this->M_markformal->tglexp_skck($idbio[$i]);

					$kocokan_visa[]= $this->M_markformal->kocokan_visa($idbio[$i]);
					$kocokanstats_visa[]= $this->M_markformal->kocokanstats_visa($idbio[$i]);
					$finger_visa[]= $this->M_markformal->finger_visa($idbio[$i]);
					$fingerstats_visa[]= $this->M_markformal->fingerstats_visa($idbio[$i]);
					$terima_visa[]= $this->M_markformal->terima_visa($idbio[$i]);
					$terimastats_visa[]= $this->M_markformal->terimastats_visa($idbio[$i]);

					$loanbank[]= $this->M_markformal->loanbank($idbio[$i]);

					$pap_visa[]= $this->M_markformal->pap_visa($idbio[$i]);
					$papstats_visa[]= $this->M_markformal->papstats_visa($idbio[$i]);
					$ktkln_visa[]= $this->M_markformal->ktkln_visa($idbio[$i]);
					$kklnstats_visa[]= $this->M_markformal->kklnstats_visa($idbio[$i]);

					$medicalpra=$this->M_markformal->medicalpra($idbio[$i]);
					$medicalfull=$this->M_markformal->medicalfull($idbio[$i]);
					$medikalnya="";
					$expnya="";
					if($medicalfull==null){
					$medikalnya=$this->M_markformal->medicalpra($idbio[$i]);
					$expnya=$this->M_markformal->medicalpraexp($idbio[$i]);
					}
					if($medicalfull!=null){
					$medikalnya=$this->M_markformal->medicalfull($idbio[$i]);
					$expnya=$this->M_markformal->medicalfullexp($idbio[$i]);
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

	$data['tglterimavisapermit']=$tglterimavisapermit;
	$data['no_visapermit']=$no_visapermit;
	$data['tglterbit_visapermit']=$tglterbit_visapermit;
	$data['tglexp_visapermit']=$tglexp_visapermit;

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

			$data['namamodule'] = "markformal";
			$data['namafileview'] = "markformal";
			echo Modules::run('template/kosongan_template2', $data);

	}

	function tampidatagroupnya(){
				$session = $this->M_session->get_session();
				$id_user = $session['session_userid'];
				$idagen = $this->session->userdata('idagen');
				$data['idagen'] = $idagen;
			$data['tampil_pilihan_agen'] = $this->M_markformal->tampil_pilihan_agen();


				$ambiltki = $this->M_markformal->ambiltkiterbang();

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
$tgterbitpaspor=array();

 					$nonya=0;
				for($i=0;$i<count($ambiltki);$i++){
					// $namanya="";
					$namanya= $this->M_markformal->markawal($ambiltki[$i]);
					$agendata= $this->M_markformal->markagen($ambiltki[$i]);

					if($agendata!=null || $namanya!=null){
						
						if($namanya!=null && $agendata==null && $namanya==$idagen){
							$idbio[$nonya]= $this->M_markformal->idbiodata($ambiltki[$i]);
						}
						if($namanya==null && $agendata!=null && $agendata==$idagen){
							$idbio[$nonya]= $this->M_markformal->idbiodata($ambiltki[$i]);
						}
						if($namanya!=null && $agendata!=null && $agendata==$idagen){
							$idbio[$nonya]= $this->M_markformal->idbiodata($ambiltki[$i]);
						}
						if($namanya!=null && $agendata!=null && $agendata!=$idagen){
							$delete[]=$nonya;
						}
						$nonya++;
					}
				}
				for($i=0;$i<count($delete);$i++){
					$no=$delete[$i];
					array_splice($idbio, $no, 0);
					}

					for($i=0;$i<count($idbio);$i++){

					$ambilmajikan= $this->M_markformal->ambilmajikan($idbio[$i]);
					$namamajikan[]= $this->M_markformal->namamajikan($ambilmajikan);
					$namamajikanman[]= $this->M_markformal->namamajikanman($ambilmajikan);
					$dataketerangan[]= $this->M_markformal->datketerangan($idbio[$i]);

					$personal[]= $this->M_markformal->ambilnama($idbio[$i]);
					$tgltoagen[]= $this->M_markformal->marketawal($idbio[$i]);
					$tgldisnaker[]= $this->M_markformal->tgldisnaker($idbio[$i]);
					$perkiraandisnaker[]= $this->M_markformal->perkiraandisnaker($idbio[$i]);
					$nodisnaker[]= $this->M_markformal->nodisnaker($idbio[$i]);

					$terpilihmajikan[]= $this->M_markformal->terpilihmajikan($idbio[$i]);
					$jdmajikan[]= $this->M_markformal->jdmajikan($idbio[$i]);
					$terbangmajikan[]= $this->M_markformal->terbangmajikan($idbio[$i]);

					$tglberangkat[]= $this->M_markformal->tglberangkat($idbio[$i]);
					$statusberangkat[]= $this->M_markformal->statusberangkat($idbio[$i]);
					$jadwal= $this->M_markformal->jadwal($idbio[$i]);
					$keberangkatan[]= $this->M_markformal->keberangkatan($jadwal);
					$jamtiba[]= $this->M_markformal->jamtiba($jadwal);
					$tiket[]= $this->M_markformal->tiket($idbio[$i]);
					$tglnyaberangkat[]= $this->M_markformal->tglnyaberangkat($idbio[$i]);
					$statusterbang[]= $this->M_markformal->statusterbang($idbio[$i]);

					$tglpk[]= $this->M_markformal->tglpk($idbio[$i]);

					$ambilsuhan= $this->M_markformal->ambilsuhan($idbio[$i]);
					$tglterimasuhan[]= $this->M_markformal->tglterimasuhan($ambilsuhan);
					$no_suhan[]= $this->M_markformal->no_suhan($ambilsuhan);
					$tglterbit_suhan[]= $this->M_markformal->tglterbit_suhan($ambilsuhan);
					$tglexp_suhan[]= $this->M_markformal->tglexp_suhan($ambilsuhan);

					$ambilvisapermit= $this->M_markformal->ambilvisapermit($idbio[$i]);
					$tglterimavisapermit[]= $this->M_markformal->tglterimavisapermit($ambilvisapermit);
					$no_visapermit[]= $this->M_markformal->no_visapermit($ambilvisapermit);
					$tglterbit_visapermit[]= $this->M_markformal->tglterbit_visapermit($ambilvisapermit);
					$tglexp_visapermit[]= $this->M_markformal->tglexp_visapermit($ambilvisapermit);

					$pasporx= $this->M_markformal->pasporlama($idbio[$i]);
					$pasporx=str_replace('-','.',$pasporx);
					$pasporlama[]=$pasporx;

					$ajupaspor[]= $this->M_markformal->ajupaspor($idbio[$i]);
					$ajustatpaspor[]= $this->M_markformal->ajustatpaspor($idbio[$i]);
					$fotopaspor[]= $this->M_markformal->fotopaspor($idbio[$i]);
					$fotostatpaspor[]= $this->M_markformal->fotostatpaspor($idbio[$i]);
					$terimapaspor[]= $this->M_markformal->terimapaspor($idbio[$i]);
					$terimastatpaspor[]= $this->M_markformal->terimastatpaspor($idbio[$i]);
					$tgterbitpaspor[]= $this->M_markformal->tgterbitpaspor($idbio[$i]);

					$pengajuan_skck[]= $this->M_markformal->pengajuan_skck($idbio[$i]);
					$pengajuanstat_skck[]= $this->M_markformal->pengajuanstat_skck($idbio[$i]);
					$terima_skck[]= $this->M_markformal->terima_skck($idbio[$i]);
					$terimastat_skck[]= $this->M_markformal->terimastat_skck($idbio[$i]);
					$tglexp_skck[]= $this->M_markformal->tglexp_skck($idbio[$i]);

					$kocokan_visa[]= $this->M_markformal->kocokan_visa($idbio[$i]);
					$kocokanstats_visa[]= $this->M_markformal->kocokanstats_visa($idbio[$i]);
					$finger_visa[]= $this->M_markformal->finger_visa($idbio[$i]);
					$fingerstats_visa[]= $this->M_markformal->fingerstats_visa($idbio[$i]);
					$terima_visa[]= $this->M_markformal->terima_visa($idbio[$i]);
					$terimastats_visa[]= $this->M_markformal->terimastats_visa($idbio[$i]);

					$loanbank[]= $this->M_markformal->loanbank($idbio[$i]);

					$pap_visa[]= $this->M_markformal->pap_visa($idbio[$i]);
					$papstats_visa[]= $this->M_markformal->papstats_visa($idbio[$i]);
					$ktkln_visa[]= $this->M_markformal->ktkln_visa($idbio[$i]);
					$kklnstats_visa[]= $this->M_markformal->kklnstats_visa($idbio[$i]);

					$medicalpra=$this->M_markformal->medicalpra($idbio[$i]);
					$medicalfull=$this->M_markformal->medicalfull($idbio[$i]);
					$medikalnya="";
					$expnya="";
					if($medicalfull==null){
					$medikalnya=$this->M_markformal->medicalpra($idbio[$i]);
					$expnya=$this->M_markformal->medicalpraexp($idbio[$i]);
					}
					if($medicalfull!=null){
					$medikalnya=$this->M_markformal->medicalfull($idbio[$i]);
					$expnya=$this->M_markformal->medicalfullexp($idbio[$i]);
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

	$data['tglterimavisapermit']=$tglterimavisapermit;
	$data['no_visapermit']=$no_visapermit;
	$data['tglterbit_visapermit']=$tglterbit_visapermit;
	$data['tglexp_visapermit']=$tglexp_visapermit;

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

			$data['namamodule'] = "markformal";
			$data['namafileview'] = "markformalterbang";
			echo Modules::run('template/kosongan_template2', $data);

	}

}