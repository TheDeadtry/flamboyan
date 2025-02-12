<?php
class m_detail_personal_agen extends CI_Model {
    function __construct() {
        parent::__construct();
    }

  function ambil_id($id) {
        return $this->db->get_where('dataMarketing', array('id_Marketing' => $id))->row();
    }

    function ambildatatki($id_biodata){
    $sql = "SELECT *, personal.nama as namatki, datamajikan.nama as namamjk,majikan.kode_agen as kodetkiagen FROM majikan JOIN datamajikan ON majikan.id_majikannya=datamajikan.id_majikan JOIN personal ON majikan.id_biodata=personal.id_biodata WHERE personal.id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_tki() {
            $data = array(  
                    'indukagen' => $this->input->post('noindukagen'),
                    'kirimbio' => $this->input->post('kirimbio'),   
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('personal', $data);
    } 


    function ambildatadisnaker($id_biodata){
    $sql = "SELECT * FROM disnaker JOIN paspor ON disnaker.id_biodata=paspor.id_biodata JOIN terbang ON disnaker.id_biodata=terbang.id_biodata WHERE disnaker.id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_terbang() {
            $data = array(  
                    'tglonline' => $this->input->post('tglonline'),
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('disnaker', $data);

            $data2 = array(  
                    'tanggalterbang' => $this->input->post('kiraterbang'),
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('terbang', $data2);
    } 
 
    function ambildatamajikan($id_biodata){
    $sql = "SELECT * FROM majikan WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function update_data_majikan() {
            $data = array(  
                    'tglterpilih' => $this->input->post('tglterpilih'),
                    'JD' => $this->input->post('tgljd'),    
                    'tglterbang' => $this->input->post('tglterbang'),   
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('majikan', $data);
    } 

        function ambildatapk($id_biodata){
    $sql = "SELECT * FROM personal WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function update_data_pk() {
            $data = array(  
                    'pk' => $this->input->post('tglpk'),
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('personal', $data);
    } 


    function ambilsuhan($id_biodata){
    $sql = "SELECT * FROM majikan INNER JOIN datasuhan ON majikan.id_suhan=datasuhan.no_suhan WHERE majikan.id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_suhan() {
            $data = array(  
                    'tglterbit' => $this->input->post('tglterbit'),
                    'tglexp' => $this->input->post('tglexp'),
                    'tglterima' => $this->input->post('tglterima'),
                    'tglsimpan' => $this->input->post('tglsimpan'), 
                    'tglbawa' => $this->input->post('tglbawa'),
                    'tglminta' => $this->input->post('tglminta'),   
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('no_suhan', $this->input->post('nosuhan'));
            $this->db->update('datasuhan', $data);
    } 

    function ambilvisapermit($id_biodata){
    $sql = "SELECT * FROM majikan JOIN datavisapermit ON majikan.id_visapermit=datavisapermit.no_visapermit WHERE majikan.id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_visapermit() {
            $data = array(  
                    'tglterbit' => $this->input->post('tglterbit'),
                    'tglexp' => $this->input->post('tglexp'),
                    'tglterima' => $this->input->post('tglterima'),
                    'tglsimpan' => $this->input->post('tglsimpan'), 
                    'tglbawa' => $this->input->post('tglbawa'),
                    'tglminta' => $this->input->post('tglminta'),   
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('no_visapermit', $this->input->post('novisapermit'));
            $this->db->update('datavisapermit', $data);
    } 

        function ambilpaspor($id_biodata){
    $sql = "SELECT *,berlaku + INTERVAL '5' YEAR as expired FROM paspor WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_paspor() {
            $data = array(  
                    'rencana' => $this->input->post('rencana'),
                    'berlaku' => $this->input->post('berlaku'), 
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('paspor', $data);
    } 

        function ambilskck($id_biodata){
    $sql = "SELECT * FROM skck WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_skck() {
            $data = array(  
                    'pengajuan' => $this->input->post('pengajuan'),
                    'terima' => $this->input->post('terima'),   
                    'tglexp' => $this->input->post('tglexp'),   
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('skck', $data);
    } 


        function ambilmedical($id_biodata){
    $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_medical() {
            $data = array(  
                    'tanggal' => $this->input->post('tanggal'),
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('medical', $data);
    } 


        function ambilvisa($id_biodata){
    $sql = "SELECT * FROM visa WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_visa() {
            $data = array(  
                    'kocokan' => $this->input->post('kocokan'),
                    'finger' => $this->input->post('finger'),   
                    'terima' => $this->input->post('terima'),   
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('visa', $data);
    } 

        function ambildatapap($id_biodata){
    $sql = "SELECT * FROM personal WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function update_data_pap() {
            $data = array(  
                    'pap' => $this->input->post('pap'),
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('personal', $data);
    } 


        function ambilbank($id_biodata){
    $sql = "SELECT * FROM bank WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function update_data_bank() {
            $data = array(  
                    'ttdbank' => $this->input->post('ttdbank'),
                    'ktkln' => $this->input->post('ktkln'), 
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('bank', $data);
    } 

    function ambilterbang2($id_biodata){
    $sql = "SELECT * FROM terbang JOIN dataterbang ON terbang.id_terbang=dataterbang.id_terbang WHERE terbang.id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function update_data_terbang2() {
            $data = array(  
                    'tanggalterbang' => $this->input->post('tanggalterbang'),   
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('terbang', $data);
    } 

            function ambildataremark($id_biodata){
    $sql = "SELECT * FROM personal WHERE id_biodata='$id_biodata'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function update_data_remark() {
            $data = array(  
                    'remark' => $this->input->post('remark'),
                );
            //$this->db->insert('bankpermit', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
            $this->db->update('personal', $data);
    } 
function tampil_data_personal($idnya){
        $sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
}