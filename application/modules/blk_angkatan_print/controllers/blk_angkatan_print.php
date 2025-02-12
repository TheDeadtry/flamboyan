<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_angkatan_print extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');		
		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		} 	
		if ($id_user && $status!=2){
			redirect('dashboard');
		}
	}
	
	function index() {
		$pilsek = $this->session->userdata('pil_angkatan');
		$fi_filter = $this->session->userdata('fi_filter'); // Add session variable for FI filter
		
		$tki = "SELECT a.nama, b.date_angkatan, a.nodaftar FROM personalblk a LEFT JOIN personal_angkatan b ON a.nodaftar=b.nodaftar ORDER BY b.date_angkatan DESC";
		//$data['tampil_data_tki'] = $this->M_session->select($tki);
		$tampil_data_tki2 = $this->M_session->select($tki);

		$data33 = array();
		foreach($tampil_data_tki2 as $pkt) {
			if ($pkt->date_angkatan != NULL) {
	            $startpast = $pkt->date_angkatan;
	            $xnowday = date('Y-m-d');
	            $datetimeee = new DateTime($startpast);
	            $dayzz = $datetimeee->format('w');
	            if($dayzz == 1) {
	                $xfirstday  = $startpast;
	            } else {
	                $xfirstday  = date('Y-m-d', strtotime('next monday', strtotime($startpast)));
	            }
	            if ($xfirstday <= $xnowday) {
	                $dayss = round(abs(strtotime($xnowday)-strtotime($xfirstday))/86400);
	                $weekk = (int)($dayss / 7)+1;
	            } elseif ($xfirstday >= $xnowday) {
	                $weekk = 0;
	            } else {
	                $weekk = 0;
	            }
	            $weekk = 'M'.$weekk;
	        } else {
	            $weekk = "BELUM DIISI";
	        }

	        if ($pilsek != 'BLANK' && $pilsek != '') {
	        	if ($weekk == $pilsek) {
		        	$data33[] = array(
		        		'nama' 		=> $pkt->nama,
		        		'date' 		=> $pkt->date_angkatan,
		        		'nodaftar' 	=> $pkt->nodaftar,
		        		'angkatan' 	=> $weekk
		        	);
		        }
	        } elseif ($pilsek == 'BLANK' && $pkt->date_angkatan == NULL) {
	        	if ($weekk = "BELUM DIISI") {
		        	$data33[] = array(
		        		'nama' 		=> $pkt->nama,
		        		'date' 		=> $pkt->date_angkatan,
		        		'nodaftar' 	=> $pkt->nodaftar,
		        		'angkatan' 	=> $weekk
		        	);
	        	}
	        } elseif ($pilsek == '') {
	        	$data33[] = array(
	        		'nama' 		=> $pkt->nama,
	        		'date' 		=> $pkt->date_angkatan,
	        		'nodaftar' 	=> $pkt->nodaftar,
	        		'angkatan' 	=> $weekk
	        	);
	        }

		        
		}

		$query = $this->db->query("
        SELECT 
            CASE 
                WHEN u.ujk IS NULL THEN 
                    CONCAT('M', LPAD(m.hari, 2, '0'))
                ELSE 
                    CONCAT('M', LPAD(m.hari, 2, '0'))
            END AS kode,
            m.idblk id_biodata,
            ifnull(i.nama, p.nama) nama,
            f.fing1,
            u.tgl_keluar,
            tip.total ip,
            pt.total pkl,
            gh.hari,
            pi.hari pp,
            '-' graha_teori,
            tm.tglterpilih_majikan tgl_terpilih_majikan,
            tm.pekerjaan,
            dp.pekerjaan rangkuman_pekerjaan,
            tm.tglpk,
            tm.terimapk,
            tm.tglterbang,
            u.ujk
        FROM 
            tki_masuk m
        LEFT JOIN 
            daftar_ujk u 
            ON m.idblk = u.nodaftar
        LEFT JOIN 
            idblk i 
            ON m.idblk = i.nodaftar
        LEFT JOIN 
            personal_nama p
            ON m.idblk = p.id_biodata
        LEFT JOIN
            tki_finger_pertama f
            ON f.nodaftar = m.idblk
        LEFT JOIN graha_hari gh
            ON m.idblk = gh.nodaftar
        LEFT JOIN piket pi
            ON m.idblk = pi.nodaftar
        LEFT JOIN personal_nama tm
            ON m.idblk = tm.id_biodata
        LEFT JOIN detail_pekerjaan dp
            ON m.idblk = dp.id_biodata
        LEFT JOIN total_ijin_pulang tip
            ON m.idblk = tip.nodaftar
        LEFT JOIN pkl_total pt 
            ON m.idblk = pt.nodaftar
        WHERE (YEAR(f.fing1) > 2023 OR f.fing1 IS NULL) 
        AND (tm.tglterbang IS NULL OR tm.tglTERBANG >= CURRENT_DATE) 
        AND (tm.statusaktif = 'proses' OR tm.statusaktif = 'sudah ada id')
    ");

    // Apply gender filter if set
    if (!empty($gender_filter)) {
        $query .= " AND p.jenis_kelamin = '" . $this->db->escape_str($gender_filter) . "'";
    }

    $data['tampil_data_tki'] = $this->db->query($query)->result();
	$data['pilsek'] = $pilsek;
	$data['data_angkatan'] = $this->M_session->select("SELECT 
    m.idblk,
		ifnull(i.nama, p.nama) nama,
		pa.date_angkatan,
    CASE 
        WHEN u.ujk IS NOT NULL THEN 
            CONCAT(LPAD(m.hari, 2, '0'), 'M')
        ELSE 
            CONCAT('M', m.hari)
    END AS kode,
    u.ujk
FROM 
    tki_masuk m
LEFT JOIN 
    daftar_ujk u 
    ON m.idblk = u.nodaftar
LEFT JOIN 
		idblk i 
		ON m.idblk = i.nodaftar
LEFT JOIN 
		personal_nama p
		ON m.idblk = p.id_biodata
LEFT JOIN
		personal_angkatan pa 
		ON m.idblk = pa.nodaftar");
		$data['namamodule'] 	= "blk_angkatan_print";
		$data['namafileview'] 	= "blk_angkatan_print";
		echo Modules::run('template/blk_template', $data); 
	}

	function setpilih($pil_angkatan) {
		$this->session->set_userdata('pil_angkatan', $pil_angkatan);

		redirect('blk_angkatan_print/');
	}

	public function export_excel() {
		// Set headers for Excel download
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="blk_angkatan_' . date('Y-m-d') . '.xls"');
		header('Cache-Control: max-age=0');
	
		// Get the data similarly to your index method
		$pilsek = $this->session->userdata('pil_angkatan');
		
		$query = $this->db->query("
			SELECT 
				CASE 
					WHEN u.ujk IS NULL THEN 
						CONCAT('M', LPAD(m.hari, 2, '0'))
					ELSE 
						CONCAT('M', LPAD(m.hari, 2, '0'))
				END AS kode,
				m.idblk id_biodata,
				ifnull(i.nama, p.nama) nama,
				f.fing1,
				u.tgl_keluar,
				tip.total ip,
				pt.total pkl,
				gh.hari,
				pi.hari pp,
				'-' graha_teori,
				tm.tglterpilih_majikan tgl_terpilih_majikan,
				tm.pekerjaan,
				dp.pekerjaan rangkuman_pekerjaan,
				tm.tglpk,
				tm.terimapk,
				tm.tglterbang,
				u.ujk
			FROM 
				tki_masuk m
			LEFT JOIN 
				daftar_ujk u 
				ON m.idblk = u.nodaftar
			LEFT JOIN 
				idblk i 
				ON m.idblk = i.nodaftar
			LEFT JOIN 
				personal_nama p
				ON m.idblk = p.id_biodata
			LEFT JOIN
				tki_finger_pertama f
				ON f.nodaftar = m.idblk
			LEFT JOIN graha_hari gh
				ON m.idblk = gh.nodaftar
			LEFT JOIN piket pi
				ON m.idblk = pi.nodaftar
			LEFT JOIN personal_nama tm
				ON m.idblk = tm.id_biodata
			LEFT JOIN detail_pekerjaan dp
				ON m.idblk = dp.id_biodata
			LEFT JOIN total_ijin_pulang tip
				ON m.idblk = tip.nodaftar
			LEFT JOIN pkl_total pt 
				ON m.idblk = pt.nodaftar
			WHERE (YEAR(f.fing1) > 2023 OR f.fing1 IS NULL) 
			AND (tm.tglterbang IS NULL OR tm.tglTERBANG >= CURRENT_DATE) 
			AND (tm.statusaktif = 'proses' OR tm.statusaktif = 'sudah ada id')
			ORDER BY m.HARI ASC");
	
		$results = $query->result_array();
		
	
		// Create Excel header
		echo "<table border='3'>";
		
		// Print headers
		if (!empty($results)) {
			echo "<tr>";
			foreach (array_keys($results[0]) as $header) {
				echo "<th>" . htmlspecialchars($header) . "</th>";
			}
			echo "</tr>";
		}
	
		// Print data rows
		foreach ($results as $row) {
			echo "<tr>";
			foreach ($row as $value) {
				echo "<td>" . htmlspecialchars($value) . "</td>";
			}
			echo "</tr>";
		}
		
		echo "</table>";
		exit;
	}

	public function set_gender_filter() {
		$gender = $this->input->post('gender');
		$this->session->set_userdata('gender_filter', $gender);
		redirect('blk_angkatan_print/');
	}

	
}