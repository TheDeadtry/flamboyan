    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            background-color: #f7f591;
        }
        .panel-flat > .panel-heading {
            background-color: #f7f591;
        }

        .text-wrap{
            white-space:normal;
        }
        .width-160{
            width:160px;
        }
        .width-200{
            width:200px;
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
                                <?php
                                    //get data sektor
                                    $getSektor = $this->db->query("SELECT kode_jenis kode, isi text, IF(jeniskelamin = '女 Perempuan','fa-solid fa-person','fa-solid fa-person-dress') gen FROM datasektor ORDER BY kode_jenis ASC")->result();
                                ?>
                                <?php foreach($getSektor as $sektor) :?>
                                <li><a href="<?php echo site_url('databio/setpilih/'.$sektor->kode); ?>"> <i class="<?= $sektor->gen ?>"></i> <?= $sektor->text ?>(<?= $sektor->kode ?>)</a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="btn-group btn-group-animated">
                            <button type="button" class="btn bg-brown dropdown-toggle" data-toggle="dropdown">STATUS DIPILIH <?php echo $pilstat;?><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('databio/setstat/'); ?>"><i class="icon-menu7"></i> TAMPIL SEMUA</a></li>
                                <li><a href="<?php echo site_url('databio/setstat/PENDING'); ?>"><i class="icon-menu7"></i> PENDING</a></li>
                                <li><a href="<?php echo site_url('databio/setstat/UNFIT'); ?>"><i class="icon-menu7"></i> UNFIT/MD</a></li>
                                <li><a href="<?php echo site_url('databio/setstat/BELUMTERBANG'); ?>"><i class="icon-screen-full"></i> BELUM TERBANG</a></li>
                                <li><a href="<?php echo site_url('databio/setstat/SUDAHTERBANG'); ?>"><i class="icon-mail5"></i> SUDAH TERBANG</a></li>
                                <li><a href="<?php echo site_url('databio/setstat/SUDAHTERBANGLALUKABUR'); ?>"><i class="icon-mail5"></i> SUDAH TERBANG KABUR</a></li>
                                <li><a href="<?php echo site_url('databio/setstat/SUDAHTERBANGINTERMINATE'); ?>"><i class="icon-mail5"></i> SUDAH TERBANG INTERMINATE</a></li>
                                <li><a href="<?php echo site_url('databio/setstat/AMBILDOKUMENT'); ?>"><i class="icon-mail5"></i>AMBIL DOKUMENT</a></li>
                            </ul>
                        </div>
                        <!--
                        <a href="<?php echo site_url('databio/setpilihstat/'.$statshowscript) ?>" type="button" class="btn bg-slate-700">PILIH <?php echo $statshowtext;?></a>
                        <a href="<?php echo site_url('databio/setpilihundur/'.$undurscript) ?>" type="button" class="btn bg-brown"><?php echo $undurtext;?></a>-->
                        <a href="<?php echo site_url('databio/printdata'); ?>" class="btn bg-teal btn-medium" type="button">DATA TKI PRINT</a>
                        <a href="<?php echo site_url('cetak_ketadm/'); ?>" class="btn bg-teal btn-medium" type="button">KETADM PRINT</a>
                        <a href="<?php echo site_url('cetak_laprekdisnaker/'); ?>" class="btn bg-teal btn-medium" type="button">LAP REK DO PRINT</a>
                        <!--<a href="<?php echo site_url('databioprint'); ?>" class="btn bg-teal btn-medium" type="button">PRINT DATA PER SPONSOR</a>-->
                        <a href="<?php echo site_url('databio/printdatapk'); ?>" class="btn bg-teal btn-medium" type="button">DATA PK PRINT</a>
                        <a href="<?php echo site_url('databio/testjompo'); ?>" class="btn bg-teal btn-medium" type="button">TEST TKI</a>
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
                    <?php 
                    $c = 0;
                    $sektorActive = $this->session->userdata('pilsektor');
                    $statusActrive = $this->session->userdata('pilstat');
                    if($sektorActive && $sektorActive != ''){
                        $c++;
                    }
                    if($statusActrive && $statusActrive != ''){
                        $c++;
                    }
                    ?>
                    <?php if($c > 0) : ?>
                    <div style="padding: 0 20px;"> 
                        Filter Active :
                        <?php if($sektorActive && $sektorActive != '') :?>
                            <div style="margin-bottom:5px; overflow:hidden; border-radius:5px; display:grid;width: 210px;grid-template-columns: auto 25px">
                                <div style="font-size:12px; padding: 0 10px;display:flex; align-items:center; outline:none;border:none;border-radius:0; background:white;">sektor : <?= $sektorActive ?></div>
                                <a  href="<?php echo site_url('databio/setpilih/'); ?>" style="outline:none;border:none;border-radius:0; background:gray;text-align:center;color:white"> <i class="fas fa-times"></i> </a>
                            </div>
                        <?php endif; ?>
                        <?php if($statusActrive && $statusActrive != '') :?>
                            <div style="margin-bottom:5px; overflow:hidden; border-radius:5px; display:grid;width: 210px;grid-template-columns: auto 25px">
                                <div style="font-size:12px; padding: 0 10px;display:flex; align-items:center; outline:none;border:none;border-radius:0; background:white;">status : <?= $statusActrive ?></div>
                                <a  href="<?php echo site_url('databio/setstat/'); ?>" style="outline:none;border:none;border-radius:0; background:gray;text-align:center;color:white"> <i class="fas fa-times"></i> </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <div class="panel-body">
                                <table class="table table-bordered " id="example" style="background-color: #f7f591;border:1px solid black;">
                             
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
                                                <th class="text-center" rowspan="3">BUKA REKENING TABUNGAN</th>
                                                <th class="text-center" colspan="2">SKCK</th>
                                                <th class="text-center" colspan="5">MAJIKAN DAN DOK DARI TAIWAN</th>
                                                <th class="text-center">LEG+NOT</th>
                                                <th class="text-center">ASURANSI</th>
                                                <th class="text-center">BANK</th>
                                                <th class="text-center"></th>
                                                <th class="text-center">PAP KE-TAIWAN</th>
                                                 <!-- <th scope="col" colspan="3" class="kuning" >DISNAKER ONLINE</th>  -->
                                                
                                                <th scope="col" rowspan="3" class="kuning" >REKOM<br/>SKCK
                                                </th> 
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

        window.DeletePersonal = function(e){
            let link = e.dataset.href;
            swal({
                title: "Are you sure?",
                text: "Do you really want to delete this item?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                // Perform the delete operation
                location.href = link;
                } else {
                swal("Cancelled", "Your item is safe!", "info");
                }
            });
        }


        $(document).ready(function(){
            window.myTable = $('#example').dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: '400px',
                ordering: false,
                fixedColumns: {
                    leftColumns: 5,
                    rightColumns: 1
                },
                "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
                columnDefs: [
                    {
                        render: function (data, type, full, meta) {
                            return "<div class='text-wrap width-160'>" + data + "</div>";
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
                            return "<div class='text-wrap width-200'>" + data + "</div>";
                        },
                        targets: 3
                    },
                    {
                        render: function (data, type, full, meta) {
                            return "<div class='text-wrap width-200'>" + data + "</div>";
                        },
                        targets: 3
                    }
                ],
    			"autoWidth": true,
                searchDelay: 1500,
                ajax: {
                    "url"       : "<?php echo site_url('databio/show_data') ?>",
                    "type"      : "POST",
                    "data" : {
                        "pilsek" : "<?=$sektorActive?>",
                        "pilstat" : "<?=$statusActrive?>"
                    }
                }
            });
            myTable.on('draw', function() {
            // Your callback logic here
                console.log('Table has been redrawn');
                // For example, you can reinitialize tooltips, update UI elements, etc.
            });
        });
        </script>