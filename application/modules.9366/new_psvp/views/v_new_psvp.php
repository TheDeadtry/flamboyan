<style type="text/css">

        .bg-blue-300, .bg-orange-800, .bg-orange-300 {
            color: #000;
        }
        .kuning {
            background-color: #FCD5B4;
        }

        .coklat {
            background-color: #e88e25;
        }

        .yellow {
            background-color: #f7e031;
            border-color: #fff;
        }
        .army {
            background-color: #FF0033;
            color :#FFF;
        }
        .biru {
            background-color: #9966FF;
            color :#FFF;
        }
        .ungu {
            background-color: #9B59B6;
            color :#FFF;
        }
        .emerald {
            background-color: #2ECC71;
            color: #000;
        }
        
</style>

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h2> <span class="text-semibold">PGM Suhan Visa Permit Formal + Jompo </span></h2>
                            </div>
                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                     <!-- Complex headers example -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Filter Data</h5>
                            <div class="heading-elements">
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="<?php echo site_url('new_psv/setpilih'); ?>">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Pilih Agen</label>
                                    <div class="col-lg-10">
                                        <select  name="idagen" class="form-control" class="dewgroup_id9">
                                            <option value="">Pilih Agen</option>
                                            <?php 
                                                foreach ($tampil_pilihan_agen as $row2) { 
                                                $sel3 = ($row2->id_agen == $this->session->userdata("xxidagen"))?'selected="selected"':'';?>
                                            ?>
                                            <option value="<?php echo $row2->id_agen;?>" <?php echo $sel3; ?> ><?php echo $row2->nama;?></option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
                                        <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" />
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    if ($this->session->userdata("xxidagen") != NULL) {
                                ?>
                                    <!-- <div class="form-group" id="jelasin_maj">
                                        <label class="control-label col-lg-2">Pilih Majikan </label>
                                        <div class="col-lg-10">
                                            <select  name="idmaj" class="form-control">
                                                <?php 
                                                    $sel3 = '';
                                                    foreach ($tampil_pilihan_maj as $row1) { 
                                                    $sel3 = ($row1->id_majikan == $this->session->userdata("xxidmaj"))?'selected="selected"':'';?>
                                                ?>
                                                <option value="<?php echo $row1->id_majikan;?>" <?php echo $sel3; ?> ><?php echo $row1->nama;?></option>
                                                <?php 
                                                    } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php
                                    } elseif ($this->session->userdata("xxidagen") != NULL && $this->session->userdata("xxidmaj") == NULL) {
                                ?>
                                    <div class="form-group" id="jelasin_maj">
                                        <label class="control-label col-lg-2">Pilih Majikan </label>
                                        <div class="col-lg-10">
                                            <?php    
                                                echo form_dropdown("idmaj",array('Pilih Group'=>'Kosong, silahkan pilih agen lain'),'','disabled class="form-control"'); 
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                    } else {
                                ?>
                                    <div class="form-group" id="jelasin_maj">
                                        <label class="control-label col-lg-2">Pilih Majikan </label>
                                        <div class="col-lg-10">
                                            <?php    
                                                echo form_dropdown("idmaj",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled class="form-control"'); 
                                            ?>
                                        </div>
                                    </div>
                                <?php 
                                    }
                                ?> -->
                                <div class="form-group">
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-success btn-medium" name="submit">Tampilkan</button>
                                        <a href="<?php echo site_url('dashboard/'); ?>" class='btn btn-info btn-medium' type="button">Menu Utama</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert bg-info alert-styled-left">
                    <button data-dismiss="alert" class="close"> x </button><marquee> PGM FORMAL + JOMPO PER AGEN UNTUK PERHITUNGAN SUHAN DAN VISA PERMIT</marquee>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-flat"> 
                        <div class="panel-heading">
                            <h5 class="panel-title">(核准函+簽證函)循環 PGM FORMAL PER AGEN UNTUK PERHITUNGAN SUHAN DAN VISA PERMIT <br> </h5><br/>
                                </br></br>
                                <a href="<?php base_url() ?> ../index.php/pdfpsv/cetaklaporanagenpsv"  target="_blank" class="btn btn-warning">Print<i class="icon-arrow-right14 position-right"></i></a>
                                </br>  </br><select class="menu-utama">
                                    <option value="1">DI TAIWAN</option>
                                    <option value="2">DI INDONESIA</option>
                                </select>
                              </h5>
                            <div class="heading-elements">
                            </div>
                        </div> 
                        <div class="panel-body">
                            <h5>
                                <?php 
                                    // if ($this->session->userdata("xxidagen") != NULL) {
                                    //     echo "GROUP = ".$this->M_new_psv->select_row("SELECT datagroup.nama as namagroupnya
                                    //     FROM dataagen 
                                    //     LEFT JOIN datagroup 
                                    //     ON dataagen.kode_group=datagroup.kode_group WHERE id_agen=".$this->session->userdata("xxidagen"))->namagroupnya; 
                                    // } else {
                                    //     echo "GROUP = <code class='text-danger'>Belum pilih Grup</code>";
                                    // }
                                    if ($this->session->userdata("xxidagen") != NULL) {
                                        echo "<br/><b>AGEN = ".$this->M_new_psvp->select_row("SELECT nama FROM dataagen where id_agen=".$this->session->userdata("xxidagen"))->nama; 
                                    } else {
                                        echo "<br/>AGEN = <code class='text-danger'>Belum pilih agen</code>";
                                    }
                                    ?>
                                    <!-- // if ($this->session->userdata("xxidmaj") != NULL) {
                                    //     echo "<br/><b>MAJIKAN = ".$this->M_new_psv->select_row("SELECT nama FROM datamajikan where id_majikan=".$this->session->userdata("xxidmaj"))->nama; 
                                    // } else {
                                    //     echo "<br/>MAJIKAN = <code class='text-danger'>Belum pilih Majikan</code>";
                                    // }
                               -->
                            </h5>
                            <table class="table table-bordered" id="newpsvp">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="army bg-yyy">NO</th>
                                        <th colspan="2" class="army bg-yyy">雇主 MAJIKAN</th>
                                        <th colspan="6" class="emerald bg-yyy">外劳数据 DATA TKI</th>
                                        <th colspan="5" class="bg-blue-300">核准函 SUHAN</th>
                                        <th colspan="5" class="bg-orange-300">簽證函 VISA PERMIT</th>
                                        <th colspan="2" class="ungu bg-yyy">TEMPAT</th>
                                        <th colspan="3" class="ungu bg-yyy">DATA PENITIPAN</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="army bg-yyy">NAMA MAJIKAN</th>
                                        <th rowspan="2" class="emerald bg-yyy">ID-編號</th>
                                        <th rowspan="2" class="emerald bg-yyy">印尼名字<br/> NAMA<br/> INDONESIA</th>
                                        <th rowspan="2" class="emerald bg-yyy">中文名字<br/> NAMA<br/> MANDARIN</th>
                                        <!-- <th colspan="3" class="emerald bg-yyy">用給外勞 TERPAKAI TKI</th> -->
                                        <th rowspan="2" class="emerald bg-yyy">寄臺灣<br/> TGL KIRIM<br/> KE<br/> TAIWAN</th>
                                        <th rowspan="2" class="emerald bg-yyy">放印尼 <br/>TGL<br/> SIMPAN</th>>
                                        <!-- <th rowspan="2" class="emerald bg-yyy"><br/>DOKUMEN<br>TITIPAN<br/></th>>
                                        <th rowspan="2" class="emerald bg-yyy"><br/>DOKUMEN<br/> DITITIPKAN</th> -->
                                        <th rowspan="2" class="emerald bg-yyy">備註<br/> KETERANGAN</th>
                                        <th rowspan="2" class="bg-blue-300">號 NO</th>
                                        <th colspan="1" class="bg-blue-300">日期 TGL</th>
                                        <th colspan="2" class="bg-blue-300">收件 TERIMA </th>
                                        <!-- <th colspan="3" class="emerald bg-yyy">用給外勞 TERPAKAI TKI</th>
                                        <th rowspan="2" class="emerald bg-yyy">寄臺灣<br/> TGL KIRIM<br/> KE<br/> TAIWAN</th>
                                        <th rowspan="2" class="emerald bg-yyy">放印尼 <br/>TGL<br/> SIMPAN</th> -->
                                        <th rowspan="2" class="bg-blue-300">備註<br/> KETERANGAN</th>
                                        <th rowspan="2" class="bg-orange-300">號 NO</th>
                                        <th colspan="2" class="bg-orange-300">日期 TGL</th>
                                        <th colspan="2" class="bg-orange-300">收件 TERIMA </th>
                                        <th rowspan="2" class="ungu bg-yyy">SUHAN</th>
                                        <th rowspan="2" class="ungu bg-yyy">VISA PERMIT</th>
                                        <th rowspan="2" class="ungu bg-yyy">ID</th>
                                        <th rowspan="2" class="ungu bg-yyy">NAMA</th>
                                        <th rowspan="2" class="ungu bg-yyy">TGL TERBANG </br>TITIPAN</th>
                                    </tr>
                                    <tr>
                                        <th class="army bg-yyy">ENGLISH</th>
                                        <th class="army bg-yyy">MANDARIN</th>
                                        <th class="bg-blue-300">發行<br/> TERBIT</th>
                                        <!-- <th class="bg-blue-300">到期<br/> EXP</th> -->
                                        <th class="bg-blue-300">日期<br/> TGL</th>
                                        <th class="bg-blue-300">(A) ASLI /<br/>(S)<br/> SIMPANAN</th>
                                        <!-- <th class="emerald bg-yyy">ID-編號</th>
                                        <th class="emerald bg-yyy">印尼名字<br/> NAMA<br/> INDONESIA</th>
                                        <th class="emerald bg-yyy">中文名字<br/> NAMA<br/> MANDARIN</th> -->
                                        <th class="bg-orange-300">發行<br/> TERBIT</th>
                                        <th class="bg-orange-300">到期<br/> EXP</th>
                                        <th class="bg-orange-300">日期<br/> TGL</th>
                                        <th class="bg-orange-300">(A) ASLI /<br/>(S)<br/> SIMPANAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                <script type="text/javascript">
                    $('#newpsvp').dataTable({
                        scrollX: true,
                        scrollY: "400px",
                        fixedColumns: {
                            leftColumns: 3,
                            rightColumns: 0
                        },
                        processing: true,
                        "lengthChange": true,
                        ordering: false,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('new_psvp/show_data') ?>",
                            "type"      : "POST"
                        },
                        columnDefs: [
                            {
                                render: function (data, type, full, meta) {
                                    return "<div class='text-wrap width-100'>" + data + "</div>";
                                },
                                targets: 0
                            },
                            {
                                render: function (data, type, full, meta) {
                                    return "<div class='text-wrap width-200'>" + data + "</div>";
                                },
                                targets: 1
                            },
                            {
                                render: function (data, type, full, meta) {
                                    return "<div class='text-wrap width-200'>" + data + "</div>";
                                },
                                targets: 2
                            },
                            {
                                render: function (data, type, full, meta) {
                                    return "<div class='text-wrap width-100'>" + data + "</div>";
                                },
                                targets: 3
                            }
                        ],
                        "bautoWidth": true
                            
                    });
            </script>
                <!-- /complex headers example --> 