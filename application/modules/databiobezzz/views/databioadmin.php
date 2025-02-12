

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
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <a href="<?php echo site_url('dashboard/'); ?>" class="btn btn-warning btn-medium" type="button">Menu Utama</a>
                                                    <div class="btn-group btn-group-animated">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">SEKTOR DIPILIH <?php echo $pilsek;?><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('databiob/setpilih/'); ?>"><i class="icon-menu7"></i> TAMPIL SEMUA</a></li>
                                        <li><a href="<?php echo site_url('databiob/setpilih/MF'); ?>"><i class="icon-menu7"></i> Male Formal</a></li>
                                        <li><a href="<?php echo site_url('databiob/setpilih/FF'); ?>"><i class="icon-screen-full"></i> Female Formal</a></li>
                                        <li><a href="<?php echo site_url('databiob/setpilih/MI'); ?>"><i class="icon-mail5"></i> Male Informal</a></li>
                                        <li><a href="<?php echo site_url('databiob/setpilih/FI'); ?>"><i class="icon-user"></i> Female Informal</a></li>
                                        <li><a href="<?php echo site_url('databiob/setpilih/JP'); ?>"><i class="icon-gear"></i> Panti Jompo</a></li>
                                    </ul>
                                </div>
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
                        <table class="table" id="example">
                             
                                        <thead>
                                           <tr>
                                                <th scope="col" rowspan="2" class="kuning" >NO.</th>  
                                                <th scope="col" rowspan="2" class="kuning" >ID</th>  
                                                <th scope="col" rowspan="2" class="kuning" >STAT</th>  
                                                <th scope="col" rowspan="2" class="kuning" >NAMA</th>  
                                                <th scope="col" colspan="9" class="kuning" >BIODATA</th> 
                                                 <!-- <th scope="col" colspan="3" class="kuning" >DISNAKER ONLINE</th>  -->
                                                <th scope="col" rowspan="2" class="kuning" >MENU <br>(di pilih)</th> 
                                            </tr>
                                            <tr>
                                                <th scope="col" rowspan="1" class="kuning" >PL</th>  
                                                <th scope="col" rowspan="1" class="kuning" >TGL DAFTAR</th>  
                                                <th scope="col" rowspan="1" class="kuning" >Tempat TGL Lahir</th>  
                                                <th scope="col" rowspan="1" class="kuning" >UMUR</th>  
                                                <th scope="col" rowspan="1" class="kuning" >TINGGI</th>  
                                                <th scope="col" rowspan="1" class="kuning" >BERAT</th>  
                                                <th scope="col" rowspan="1" class="kuning" >PENDIDIKAN</th>  
                                                <th scope="col" rowspan="1" class="kuning" >STATUS</th> 
                                                <th scope="col" rowspan="1" class="kuning" >NO HP + NO KEL</th> 

                                              <!--    <th scope="col" rowspan="1" class="kuning" >NAMA</th> 
                                                  <th scope="col" rowspan="1" class="kuning" >TEMPAT TGL LAHIR</th> 
                                                   <th scope="col" rowspan="1" class="kuning" >STATUS</th>  -->
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
                    "url"     : "<?php echo site_url('databiob/show_data') ?>",
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
                ajax: "<?php echo site_url('databiob/show_data') ?>",
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
                }
            });
          });
        </script>
