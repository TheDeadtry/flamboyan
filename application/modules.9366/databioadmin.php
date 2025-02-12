
	<style>
		.fix_tbl {
			margin: 0 auto;
			width: 100%;
			clear: both;
			border-collapse: collapse;
			table-layout: fixed; // ***********add this
			word-wrap:break-word; // ***********and this
		}

        * {
            font-weight: bold;
        }
        #customdewa {
            background-color: #f5f9b1;
        }
        .panel-flat > .panel-heading {
            background-color: #f5f9b1;
        }
	</style>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    
                    <span class="text-semibold">DATA BIODATA PERSONAL</span>
                </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-display4 text-primary"></i> <span> DATA BIODATA PERSONAL</span></a>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                                <!-- Style combinations -->
                <div class="panel panel-flat " id="customdewa">
                    <div class="panel-heading">
                        <a href="<?php echo site_url('dashboard/'); ?>" class="btn btn-warning btn-medium" type="button">MENU UTAMA</a>
                        <div class="btn-group btn-group-animated">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">SEKTOR DIPILIH <?php echo $pilsek;?><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('databio/setpilih/'); ?>"><i class="icon-menu7"></i> TAMPIL SEMUA</a></li>
                                <li><a href="<?php echo site_url('databio/setpilih/MF'); ?>"><i class="icon-menu7"></i> Male Formal</a></li>
                                <li><a href="<?php echo site_url('databio/setpilih/FF'); ?>"><i class="icon-screen-full"></i> Female Formal</a></li>
                                <li><a href="<?php echo site_url('databio/setpilih/MI'); ?>"><i class="icon-mail5"></i> Male Informal</a></li>
                                <li><a href="<?php echo site_url('databio/setpilih/FI'); ?>"><i class="icon-user"></i> Female Informal</a></li>
                                <li><a href="<?php echo site_url('databio/setpilih/JP'); ?>"><i class="icon-gear"></i> Panti Jompo</a></li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('databio/setpilihstat/'.$statshowscript) ?>" type="button" class="btn bg-slate-700">PILIH <?php echo $statshowtext;?></a>
                        <a href="<?php echo site_url('databio/setpilihundur/'.$undurscript) ?>" type="button" class="btn bg-brown"><?php echo $undurtext;?></a>
                        <a href="<?php echo site_url('databio/printdata'); ?>" class="btn btn-warning btn-medium" type="button">PRINT</a>
                        <h5 class="panel-title"> 

                        </h5>

                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                                <table class="table table-bordered " id="example" >
                             
                                        <thead>
                                           <tr>
                                                <th scope="col" rowspan="3" class="kuning" >NO.</th>  
                                                <th scope="col" rowspan="3" class="kuning" >ID</th>  
                                                <th scope="col" rowspan="3" class="kuning" >STAT</th>  
                                                <th scope="col" rowspan="3" class="kuning" >NAMA BIO<br/>NAMA DO</th>  

                                                <th colspan="8" class="text-center">BIODATA DAN DISNAKER ONLINE</th>
                                                <th rowspan="3" class="text-center">LAINNYA</th>
                                                <th colspan="7" class="text-center">DOK RUMAH</th>
                                                <th class="text-center">SRT KEHIL</th>
                                                <th class="text-center">MED PRA</th>
                                                <th colspan="2" class="text-center">MED FULL</th>
                                                <th class="text-center" colspan="5">BLK</th>
                                                <th class="text-center" colspan="2">PASPOR</th>
                                                <th class="text-center" colspan="2">SKCK</th>
                                                <th class="text-center" colspan="5">MAJIKAN DAN DOK DARI TAIWAN</th>
                                                <th class="text-center">LEG+NOT</th>
                                                <th class="text-center">ASURANSI</th>
                                                <th class="text-center">BANK</th>
                                                <th class="text-center"></th>
                                                <th class="text-center">PAP KE-TAIWAN</th>
                                                 <!-- <th scope="col" colspan="3" class="kuning" >DISNAKER ONLINE</th>  -->
                                                
                                                <th scope="col" rowspan="3" class="kuning" >MENU <br>(di pilih)
                                                </th> 
                                            </tr>
                                            <tr>

                                                <th class="text-center">(ID-KODE SPONSOR)</th><!--
                                                <th class="text-center">NAMA (BIODATA)</th>-->
                                                <th class="text-center">TP LAHIR (BIO)</th>
                                                <th class="text-center">TGL LAHIR (BIO)</th>
                                                <th class="text-center">UMUR (BIO)</th>
                                                <th class="text-center">STATUS BIO</th>
                                                <th class="text-center">TG CM</th>
                                                <th class="text-center">PENDIDIKAN</th>
                                                <th class="text-center">A/C-TGL</th>
                                                <th class="text-center">B/K/L(3)</th>
                                                <th rowspan="2" class="text-center">KET ADM</th>
                                                <th class="text-center">KTP</th>
                                                <th class="text-center">AKTE</th>
                                                <th class="text-center">SKCK</th>
                                                <th class="text-center">IJASAH</th>
                                                <th class="text-center">ARC TW</th>
                                                <th class="text-center">PERLU?</th>
                                                <th class="text-center">TGL(*)</th>
                                                <th class="text-center">TGL(*)</th>
                                                <th class="text-center">EXP(#)</th>
                                                <th class="text-center">TGL REG(13)</th>
                                                <th class="text-center">PERKIRAAN UJK BLK</th>
                                                <th class="text-center">FINGER (HARI)</th>
                                                <th class="text-center">NILAI RATA2 MANDARIN</th>
                                                <th rowspan="2" class="text-center">CATATAN</th>
                                                <th class="text-center">A/C-(TGL PENGAJUAN)</th>
                                                <th class="text-center">A/C-(TGL TERIMA(5))</th>
                                                <th class="text-center">A/C (TGL AJU SKCK)</th>
                                                <th class="text-center">TGL EXP</th>
                                                <th class="text-center">TGL MAJIKAN (7)</th>
                                                <th class="text-center">MAJ - BANDARA TUJUAN</th><!--
                                                <th class="text-center">KODE MAJIKAN (FORMAL) - BANDARA TUJUAN</th>
                                                <th class="text-center">NAMA MAJIKAN TAIWAN (INFORMAL) - BANDARA TAIWAN</th>-->
                                                <th class="text-center">TGL TRM SUHAN</th>
                                                <th class="text-center">NO.SUHAN</th>
                                                <th class="text-center">TGL EXP SUHAN</th>
                                                <th class="text-center">TGL LEGALITAS</th>
                                                <th class="text-center">PRA</th>
                                                <th class="text-center">TGL PENGAJUAN BANK(9)<br/>A/C (TGL TRM CS)(10)</th>
                                                <th class="text-center">A/C (TGL TRM LEGIS)</th>
                                                <th class="text-center">AC (TGL TKI PAP)</th>
                                              <!--    <th scope="col" rowspan="1" class="kuning" >NAMA</th> 
                                                  <th scope="col" rowspan="1" class="kuning" >TEMPAT TGL LAHIR</th> 
                                                   <th scope="col" rowspan="1" class="kuning" >STATUS</th>  -->
                                            </tr>

                                            <tr>
                                                <th class="text-center">TGL DAFTAR</th><!--
                                                <th class="text-center">NAMA (DISNAKER ONLINE)</th>-->
                                                <th class="text-center">TP LAHIR (DO)</th>
                                                <th class="text-center">TGL LAHIR (DO)</th>
                                                <th class="text-center">UMUR (DO)</th>
                                                <th class="text-center">STATUS DO</th>
                                                <th class="text-center">BRT KG</th>
                                                <th class="text-center">NO HP TKI+KELUARGA</th>
                                                <th class="text-center">ID DO(4)</th>
                                                <th class="text-center">PP LM EXP</th>
                                                <th class="text-center">KK</th>
                                                <th class="text-center">IJIN</th>
                                                <th class="text-center">SN</th>
                                                <th class="text-center">PP</th>
                                                <th class="text-center">AS TW</th>
                                                <th class="text-center">TGL TRM</th>
                                                <th class="text-center">HASIL(1)</th>
                                                <th class="text-center">HASIL(2)</th>
                                                <th class="text-center">TGL FING MED</th>
                                                <th class="text-center">SELESAI DUR BLK</th>
                                                <th class="text-center">HASIL UJK(14)</th>
                                                <th class="text-center">TGL TERAKHIR FING</th>
                                                <th class="text-center">NILAI SIKAP MENTAL</th>
                                                <th class="text-center">A/C (TGL FOTO)</th>
                                                <th class="text-center">TGL EXP</th>
                                                <th class="text-center">A/C (TGL TERIMA) (6)</th>
                                                <th class="text-center"></th>
                                                <th class="text-center">KODE AGEN</th>
                                                <th class="text-center">TGL TRM PK(8)</th>
                                                <th class="text-center">TGL TRM VISA PERMIT</th>
                                                <th class="text-center">NO.VISA PERMIT</th>
                                                <th class="text-center">TGL EXP VISA</th>
                                                <th class="text-center">TGL NOTARISAN</th>
                                                <th class="text-center">MASA</th>
                                                <th class="text-center">A/C (TGL TKI TD TANGAN BANK)</th>
                                                <th class="text-center">A/C (TGL TRIMA VISA)(11)</th>
                                                <th class="text-center">A/C (TGL TIBA) (12)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                            </table>

                </div>
                <!-- /style combinations -->


                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

        <script type="text/javascript" charset="utf-16">
        $(document).ready(function(){
            $('#example').dataTable({
                /*
                aLengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
                iDisplayLength: 10,
                bPaginate: true,
                processing: true,
                bServerSide: true,*//*
                serverSide: true,
                processing: true,
                paging: true,
                searching: { "regex": true },
                lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
                pageLength: 10,
                ajax:{
                    "url"     : "<?php echo site_url('databio/show_data') ?>",
                    "type"    : "POST"
                },
                columnDefs: [
                { 
                    orderable: false,
                    width: "1px",
                    targets: [0]
                }
                ],
                scrollX: true,
                scrollY: '400px',
                scrollCollapse: true,
                fixedColumns: {
                    leftColumns: 4,
                    rightColumns: 1
                }*/
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: '400px',
                //ordering: false,
                fixedColumns: {
                    leftColumns: 4,
                    rightColumns: 1
                },
                "columnDefs": [
                	{ 
    					"width": "1000px",
    					"targets": 1 
    				},
                	{ 
    					"width": "100%",
    					"targets": 2 
    				},
                	{ 
    					"width": "100%",
    					"targets": 3 
    				}

    			],
    			"autoWidth": false,
                ajax: {
                    "url"       : "<?php echo site_url('databio/show_data') ?>",
                    "type"      : "POST"
                }
            });
        });
        </script>