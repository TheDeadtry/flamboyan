<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailskill extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailskill');	
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

			$data['tampil_data_sektor'] = $this->M_detailskill->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailskill->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailskill->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailskill->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailskill->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailskill->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailskill->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_detailskill->tampil_data_jobs();
				$data['tampil_data_keterampilan'] = $this->M_detailskill->tampil_data_keterampilan();
				$data['tampil_data_hobi'] = $this->M_detailskill->tampil_data_hobi();
				$data['tampil_data_mata'] = $this->M_detailskill->tampil_data_mata();
                
                $data['operasi'] = $this->M_detailskill->tampilkan_data_operasi($this->session->userdata("detailuser"));
                $data['alergi'] = $this->M_detailskill->tampilkan_data_alergi($this->session->userdata("detailuser"));
                $data['merokok'] = $this->M_detailskill->tampilkan_data_rokok($this->session->userdata("detailuser"));

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skill'] = $this->M_detailskill->tampil_data_skill($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailskill->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungskill'] = $this->M_detailskill->hitung_data_skill($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailskill";
				$data['namafileview'] = "detailskill";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailskill";
				$data['namafileview'] = "detailskillagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function tambahbiodata() {

// $idnya = $this->input->post("idp");

// echo "aasas".$idnya;
$this->form_validation->set_rules('idp', 'Idp', 'trim|required|is_unique[skill.id_biodata]');

$this->M_tambahbio->tambahskill();

		redirect('tambahbio');
		}

function tampildatarokok($id){
	$ambil = $this->M_detailskill->ambildatamod($id, "banyakrokok", "skillcondition", "id_biodata" ,"banyakrokok");
	exit($ambil);
}

    function ambildataalergi(){
        $master = $this->db->query("SELECT DISTINCT(data_alergi) AS alergi FROM data_alergi")->result();
        $data = array();
        foreach ($master as $key => $value) {
            $data[] = $value->alergi;
          } 

          $datakirim = json_encode($data);
          exit($datakirim);
    }


	function simpanalergi(){
        $data_id = $_POST["idnya"]; 
        $data_alergi = $_POST["datakirim"]; 

        $simpan = $this->db->query("INSERT INTO data_alergi (id_alergi, id_biodata, data_alergi) VALUES ('', '$data_id', '$data_alergi')");

        if($simpan){
        	echo "success";
        }else{
        	echo "gagal";
        }
    }

    function simpandataoperasi($id){
        $tahun = $_POST["datatahun"];
        $keterangan = $_POST["dataketerangan"];
        $simpan = $this->db->query("INSERT INTO data_operasi (id_operasi, id_biodata, tahun, keterangan, dihapus) VALUES ('', '$id', '$tahun', '$keterangan', '')");
        if ($simpan) {
            echo "success";
        }else{
            echo "gagal";
        }
    }

    function tampildataalergi($id){
    	$tampil =  $this->db->query("SELECT * FROM data_alergi WHERE id_biodata = '$id' ")->result();
    	$data = "";
        $no = 1;
    	foreach ($tampil as $key => $value) {
    		$data .= "
    		<div>
                <li onmouseover='showingmenu(".$no.")' onmouseout='hidingmenu(".$no.")'>
                   <span><i>".$no."</i>  ".$value->data_alergi."</span><a style='visibility: hidden' onclick='hapusdataalergi(".$value->id_alergi.")' class='btn btn-danger hide-menu".$no."'>hapus</a>
                </li>
            </div>
    		";
            $no++;
    	}
    	exit($data);
    }

    function ambildatatahunoperasi(){
        $master = $this->db->query("SELECT DISTINCT(tahun) AS tahun FROM data_operasi")->result();
        $data = array();
        foreach ($master as $key => $value) {
            $data[] = $value->tahun;
          } 

          $datakirim = json_encode($data);
          exit($datakirim);
    }

    function ambildataketeranganoperasi(){
        $master = $this->db->query("SELECT DISTINCT(keterangan) AS keterangan FROM data_operasi")->result();
        $data = array();
        foreach ($master as $key => $value) {
            $data[] = $value->keterangan;
          } 

          $datakirim = json_encode($data);
          exit($datakirim);
    }


function tampilkandataoperasi($key){
    $master = $this->db->query("SELECT * FROM data_operasi WHERE id_biodata = '$key' AND dihapus = ''")->result();
    $data = "";
    $no = 1;
    foreach ($master as $key => $value) {
        $data .= "
            <tr>
                <td>".$no."</td>
                <td>".$value->tahun."</td>
                <td>".$value->keterangan."</td>
                <td><button class='btn btn-danger' onclick='hapusoperasidata(".$value->id_operasi.")'>hapus</button></td>
            </tr>
        ";
        $no++;
    }
    exit($data);
}


function hapusdataalergi($key){
    $hapus = $this->db->query("DELETE FROM data_alergi WHERE id_alergi = $key");
    if ($hapus) {
    }else{
        echo "gagal";
    }
}
function hapusdataoperasi($key){
    $hapus = $this->db->query("UPDATE data_operasi SET dihapus = '1' WHERE id_operasi = '$key'");
    if ($hapus) {
    }else{
        echo "gagal";
    }
}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahbio');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahbio');
} 
		}

}