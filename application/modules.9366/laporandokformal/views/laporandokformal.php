
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
             .merah {
                background-color: #FF99CC;
            }
            .biru {
                background-color: #B6DDE8;
            }



            .tengah {
                text-align: center;
            }


        </style>


<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-4">
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h2> <span class="text-semibold">Laporan Dokumen Formal + Jompo </span></h2>
                            </div>

                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                     <!-- Complex headers example -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Filter Data</h5>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="<?php echo site_url('laporandokformal/setpilih'); ?>">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Pilih Agen</label>
                                    <div class="col-lg-10">
                                        <select  name="idagen" class="form-control" id="dewgroup_id9" >
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
                                    if ($this->session->userdata("xxidagen") != NULL && $this->session->userdata("xxidmaj") != NULL) {
                                ?>
                                    <div class="form-group" id="jelasin_maj">
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
                                ?>
                                <div class="form-group">
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-info btn-medium" name="submit">Tampilkan</button>
                                        <a href="<?php echo site_url('dashboard/'); ?>" class='btn btn-warning btn-medium' type="button">Menu Utama</a>
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
                        <button data-dismiss="alert" class="close"> x </button> Laporan Dokumen per Agen untuk TKI Formal + Jompo
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">  

                    <div class="panel panel-flat"> 
                        <div class="panel-heading">
                            <h5 class="panel-title">(核准函+簽證函)循環 DOKUMEN DARI TAIWAN FORMAL PER MAJIKAN UNTUK PERHITUNGAN SUHAN DAN VISA PERMIT <br> </h5><br/>
                            <h5>
                                <?php 
                                    if ($this->session->userdata("xxidagen") != NULL) {
                                        echo "AGEN = ".$this->M_laporandokformal->select_row("SELECT nama FROM dataagen where id_agen=".$this->session->userdata("xxidagen"))->nama; 
                                    } else {
                                        echo "AGEN = <code class='text-danger'>Belum pilih agen</code>";
                                    }
                                    if ($this->session->userdata("xxidmaj") != NULL) {
                                        echo "<br/>MAJIKAN = ".$this->M_laporandokformal->select_row("SELECT nama FROM datamajikan where id_majikan=".$this->session->userdata("xxidmaj"))->nama; 
                                    } else {
                                        echo "<br/>MAJIKAN = <code class='text-danger'>Belum pilih Majikan</code>";
                                    }
                                    
                                ?>
                            </h5>
                            <div class="heading-elements">
                            </div>
                        </div> 
                        <div class="panel-body">
                            
                            <table class="table table-bordered" id="zzfindek">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="yellow bg-yyy">NO</th>
                                        <th colspan="2" class="yellow bg-yyy">雇主</th>
                                        <th colspan="11" class="bg-blue-300">核准函 SUHAN</th>
                                        <th colspan="11" class="bg-orange-300">簽證函VISA PERMIT</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="yellow bg-yyy">NAMA MAJIKAN</th>
                                        <th rowspan="2" class="bg-blue-300">號NO</th>
                                        <th colspan="2" class="bg-blue-300">日期 TGL</th>
                                        <th colspan="2" class="bg-blue-300">收件TERIMA </th>
                                        <th colspan="3" class="bg-blue-300">用給外勞TERPAKAI TKI</th>
                                        <th rowspan="2" class="bg-blue-300">寄臺灣<br/> TGL KIRIM<br/> KE<br/> TAIWAN</th>
                                        <th rowspan="2" class="bg-blue-300">放印尼 <br/>TGL<br/> SIMPAN</th>
                                        <th rowspan="2" class="bg-blue-300">備註<br/> KETERANGAN</th>
                                        <th rowspan="2" class="bg-orange-300">號NO</th>
                                        <th colspan="2" class="bg-orange-300">日期 TGL</th>
                                        <th colspan="2" class="bg-orange-300">收件TERIMA </th>
                                        <th colspan="3" class="bg-orange-300">用給外勞TERPAKAI TKI</th>
                                        <th rowspan="2" class="bg-orange-300">寄臺灣<br/> TGL KIRIM<br/> KE<br/> TAIWAN</th>
                                        <th rowspan="2" class="bg-orange-300">放印尼 <br/>TGL<br/> SIMPAN</th>
                                        <th rowspan="2" class="bg-orange-300">備註<br/> KETERANGAN</th>
                                    </tr>
                                    <tr>
                                        <th class="yellow bg-yyy">ENGLISH</th>
                                        <th class="yellow bg-yyy">MANDARIN</th>
                                        <th class="bg-blue-300">發行<br/> TERBIT</th>
                                        <th class="bg-blue-300">到期<br/> EXP</th>
                                        <th class="bg-blue-300">日期<br/> TGL</th>
                                        <th class="bg-blue-300">(A) ASLI /<br/>   (S)<br/> SIMPANAN</th>
                                        <th class="bg-blue-300">ID-編號</th>
                                        <th class="bg-blue-300">印尼名字<br/> NAMA<br/> INDONESIA</th>
                                        <th class="bg-blue-300">中文名字<br/> NAMA<br/> MANDARIN</th>
                                        <th class="bg-orange-300">發行<br/> TERBIT</th>
                                        <th class="bg-orange-300">到期<br/> EXP</th>
                                        <th class="bg-orange-300">日期<br/> TGL</th>
                                        <th class="bg-orange-300">(A) ASLI /<br/>   (S)<br/> SIMPANAN</th>
                                        <th class="bg-orange-300">ID-編號</th>
                                        <th class="bg-orange-300">印尼名字<br/> NAMA<br/> INDONESIA</th>
                                        <th class="bg-orange-300">中文名字<br/> NAMA<br/> MANDARIN</th>
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
                    $('#zzfindek').dataTable({
                        scrollX: true,
                        scrollY: "400px",
                        fixedColumns: {
                            leftColumns: 3,
                            rightColumns: 0
                        },
                        processing: true,
                        bFilter: false,
                        "lengthChange": false,
                        ordering: false,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('laporandokformal/show_data') ?>",
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
