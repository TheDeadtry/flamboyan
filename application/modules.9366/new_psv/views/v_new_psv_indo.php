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
        .abu {
            background-color: #008000;
            color :#FFF;
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
                                                echo form_dropdown("idmaj",array('Pilih Group'=>'Kosong,silahkan pilih agen lain'),'','disabled class="form-control"'); 
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
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title">
                                <div class='title'>PRINT LAPORAN DOKUMEN SUHAN BERDASARKAN AGEN</div> <br>
                            </h5>
                        </div>

                        <form target="_blank" id="printv2_form" action="<?php echo site_url('pdf7/cetaklaporanagen');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <div class="panel-body">   
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> PRINT MULAI TGL  </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="tglmulai" autocomplete="off" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3"> SAMPAI TGL </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="tglakhir" autocomplete="off" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label col-sm-3"> PILIH AGEN </label>
                                    <div class="col-sm-9">
                                        <select class="select-search" name="id_agen" data-placeholder="Pilih Agen">
                                                <option value="">Pilih Agen</option>
                                                <?php  foreach ($tampil_pilihan_agen as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_agen;?>" /><?php echo $pilihan->nama;?>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3"> </label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn bg-blue-800" id="printv1_btn"> PRINT <i class="icon-arrow-right14 position-right"></i></button>
                                    <!--<button type="submit" class="btn bg-orange-800" id="printv2_btn"> PRINT (BANK) <i class="icon-arrow-right14 position-right"></i></button>-->
                                </div>
                            </div>
                        </form>
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
                            <h5 class="panel-title">(核准函+簽證函)循環 PGM FORMAL PER AGEN UNTUK PERHITUNGAN SUHAN DAN VISA PERMIT <br><br> <b>SUHAN DI INDONESIA</b> </h5><br/>
                                </br></br>
                                <div class="btn-group btn-group-animated">
                                    <button type="button" class="btn bg-success dropdown-toggle" data-toggle="dropdown">TAMPILKAN&nbsp;<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('new_psv/semua'); ?>"><i class="icon-menu7"></i> SEMUA</a></li>
                                        <li><a href="<?php echo site_url('new_psv/diindo'); ?>"><i class="icon-menu7"></i> DI INDONESIA</a></li>
                                        <li><a href="<?php echo site_url('new_psv/ditaiwan'); ?>"><i class="icon-menu7"></i> DI TAIWAN</a></li>
                                    </ul>
                                </div>
                            </h5>
                            <!-- <a href="<?php base_url() ?>../index.php/new_psv/print_laporan" target="_blank" class="btn btn-info">Print<i class="icon-printer position-right"></i></a> -->
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
                                        echo "<br/><b>AGEN = ".$this->M_new_psv->select_row("SELECT nama FROM dataagen where id_agen=".$this->session->userdata("xxidagen"))->nama; 
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
                            <table class="table table-bordered" id="newpsv">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="army bg-yyy">NO</th>
                                        <th colspan="2" class="army bg-yyy">雇主 MAJIKAN</th>
                                        <th colspan="6" class="emerald bg-yyy">外劳数据 DATA TKI</th>
                                        <th colspan="8" class="bg-blue-300">核准函 SUHAN</th>
                                        <th colspan="9" class="bg-orange-300">簽證函 VISA PERMIT</th>
                                        <th colspan="2" class="ungu bg-yyy">TEMPAT</th>
                                        <th colspan="3" class="abu bg-yyy">DATA PENITIPAN</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="army bg-yyy">NAMA MAJIKAN</th>
                                        <th rowspan="2" class="emerald bg-yyy">ID-編號</th>
                                        <th rowspan="2" class="emerald bg-yyy">印尼名字<br/>NAMA<br/>INDONESIA</th>
                                        <th rowspan="2" class="emerald bg-yyy">中文名字<br/>NAMA<br/>MANDARIN</th>
                                        <!-- <th colspan="3" class="emerald bg-yyy">用給外勞 TERPAKAI TKI</th> -->
                                        <th rowspan="2" class="emerald bg-yyy">寄臺灣<br/>TGL KIRIM<br/>KE<br/>TAIWAN</th>
                                        <th rowspan="2" class="emerald bg-yyy">放印尼 <br/>TGL<br/>SIMPAN</th>>
                                        <!-- <th rowspan="2" class="emerald bg-yyy"><br/>DOKUMEN<br>TITIPAN<br/></th>>
                                        <th rowspan="2" class="emerald bg-yyy"><br/>DOKUMEN<br/> DITITIPKAN</th> -->
                                        <th rowspan="2" class="emerald bg-yyy">備註<br/>KETERANGAN</th>
                                        <th rowspan="2" class="bg-blue-300">號 NO</th>
                                        <th colspan="1" class="bg-blue-300">日期 TGL</th>
                                        <th colspan="2" class="bg-blue-300">收件 TERIMA </th>
                                        <th colspan="3" class="bg-blue-300">DITITIPKAN </th>
                                        <!--<th colspan="3" class="emerald bg-yyy">用給外勞 TERPAKAI TKI</th>
                                        <th rowspan="2" class="emerald bg-yyy">寄臺灣<br/> TGL KIRIM<br/> KE<br/> TAIWAN</th>
                                        <th rowspan="2" class="emerald bg-yyy">放印尼 <br/>TGL<br/> SIMPAN</th> -->
                                        <th rowspan="2" class="bg-blue-300">備註<br/>KETERANGAN</th>
                                        <th rowspan="2" class="bg-orange-300">號 NO</th>
                                        <th colspan="2" class="bg-orange-300">日期 TGL</th>
                                        <th colspan="2" class="bg-orange-300">收件 TERIMA</th>
                                        <th colspan="3" class="bg-orange-300">DITITIPKAN </th>
                                        <th rowspan="2" class="bg-orange-300">備註<br/>KETERANGAN</th>
                                        <th rowspan="2" class="ungu bg-yyy">SUHAN</th>
                                        <th rowspan="2" class="ungu bg-yyy">VISA PERMIT</th>
                                        <th colspan="3" class="abu bg-yyy">TITIPAN</th>
                                    </tr>
                                    <tr>
                                        <th class="army bg-yyy">ENGLISH</th>
                                        <th class="army bg-yyy">MANDARIN</th>
                                        <th class="bg-blue-300">發行<br/>TERBIT</th>
                                        <!--<th class="bg-blue-300">到期<br/>EXP</th>-->
                                        <th class="bg-blue-300">日期<br/>TGL</th>
                                        <th class="bg-blue-300">(A)ASLI/<br/>(S)SIMPANAN</th>
                                        <th class="bg-blue-300">ID</th>
                                        <th class="bg-blue-300">NAMA</th>
                                        <th class="bg-blue-300">TGL TERBANG</th>
                                        <!--<th class="emerald bg-yyy">ID-編號</th>
                                        <th class="emerald bg-yyy">印尼名字<br/> NAMA<br/> INDONESIA</th>
                                        <th class="emerald bg-yyy">中文名字<br/> NAMA<br/> MANDARIN</th>-->
                                        <th class="bg-orange-300">發行<br/>TERBIT</th>
                                        <th class="bg-orange-300">到期<br/>EXP</th>
                                        <th class="bg-orange-300">日期<br/>TGL</th>
                                        <th class="bg-orange-300">(A)ASLI/<br/>(S)SIMPANAN</th>
                                        <th class="bg-orange-300">ID</th>
                                        <th class="bg-orange-300">NAMA</th>
                                        <th class="bg-orange-300">TGL TERBANG</th>
                                        <th class="abu bg-yyy">ID</th>
                                        <th class="abu bg-yyy">NAMA</th>
                                        <th class="abu bg-yyy">TGL TERBANG</br>TITIPAN</th>
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
    $('#newpsv').dataTable({
        scrollX: true,
        scrollY: "400px",
        fixedColumns: {
            leftColumns: 3,
            rightColumns: 0
        },
        processing: true,
        "lengthChange": true,
        ordering: false,
        bFilter:false,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('new_psv/show_data_psv_diindo') ?>",
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

    $('#printv1_btn').click(function() {
            $( "#printv2_form" ).attr('action', '<?php echo site_url('pdf7/cetaklaporansuhanvp') ?>')
        });
</script>
                <!-- /complex headers example --> 