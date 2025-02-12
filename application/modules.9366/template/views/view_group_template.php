<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT FLAMBOYAN GEMAJASA</title>

    <!-- Global stylesheets -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css' media='all' rel='stylesheet' type='text/css' />
    
    <style>

    .table > caption + thead > tr:first-child > th, 
    .table > colgroup + thead > tr:first-child > th, 
    .table > thead:first-child > tr:first-child > th, 
    .table > caption + thead > tr:first-child > td, 
    .table > colgroup + thead > tr:first-child > td, 
    .table > thead:first-child > tr:first-child > td {   
        border-top-width: 1px;
        border-top-style: solid;
        border-top-color: rgb(221, 221, 221);
        padding:12px 40px 12px 20px;

    }

    .daterangepicker.dropdown-menu {
        z-index: 1600 !important;
    }

    .not-allowed { 
        cursor: not-allowed; 
    }

    .pointer { 
        cursor: pointer; 
    }

    .settingonhover {
        font-family: Montserrat;
    }

    .settingonhover .htulis {
        background-color: #e5e6e8;
        color: black;
        font-size: 5;
    }

    .settingonhover .panel-body {
        padding: 0px;
    }

    .settingonhover .icon {
        font-size: 40px;
    }

    .settingonhover .tulisan {
        font-family: inherit;
        text-transform: uppercase;
        font-size: 94%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #5b5b5b;
        background-color: #dbdbdb;
        border-bottom: 1px solid #cecece;
        padding: 5px;
    }
    .settingonhover:hover .tulisan {
        text-decoration: underline;
    }

    .settingonhover:hover .icon {
        font-size: 40px;
    }

    .settingonhover:hover .bg-blue-600 {
        background-color: #0277BD;
    }

    .settingonhover:hover .bg-success-600 {
        background-color: #2E7D32;
    }

    .settingonhover:hover .bg-orange-600 {
        background-color: #EF6C00;
    }

    .settingonhover:hover .bg-purple-600 {
        background-color: #4527A0;
    }

    .settingonhover:hover .bg-danger-600 {
        background-color: #C62828;
    }

    .settingonhover:hover .bg-grey-600 {
        background-color: #444444;
    }

    .settingonhover:hover .htulis {
        background-color: #d1d3d6;
    }
    </style>
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/ui/drilldown.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/datatables_basic.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/datatables_extension_fixed_columns.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/app.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/libraries/jquery_ui/interactions.min.js"></script><!--
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_inputs.js"></script> <!-- /FORM INPUT -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/components_popups.js"></script>
<!--
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/pickers/pickadate/legacy.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/picker_date.js"></script>
    <script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js' type='text/javascript'></script>
    <script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_daterangepicker/moment.min.js' type='text/javascript'></script>-->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dewa/datepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dewa/datepicker3.min.css" />

    <script src="<?php echo base_url(); ?>assets/dewa/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/visualization/echarts/echarts.js"></script>
    <!-- / daterange picker -->
    <script type="text/javascript">

    $(document).ready(function(){
            $('.dewdate').datepicker({
                autoclose: true,
                format: 'yyyy.mm.dd',
                todayHighlight: true,
                minDate: "dateToday"
            });

            $('.dewdate2').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                minDate: "dateToday"
            });

            $('.dewdate3').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                todayHighlight: true,
                minDate: "dateToday"
            });

            $('.date').datepicker({
                autoclose: true,
                format: 'yyyy.mm.dd',
                todayHighlight: true,
                minDate: "dateToday"
            });
        $('.dewselect').select2();
    });
  $( function() {
    $( "#dewdate" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
  } );

    </script>
        


    <!-- /theme JS files -->


    <!-- /theme JS files -->

</head>

<body>
    <div class="navbar" style="background-color: #f34541">
        <div class="navbar-header" >
            <a class="navbar-brand" href="<?php echo site_url().'/dashboard'; ?>">
                  <img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="Admin Lab" />
            </a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class='dropdown user-menu' style="background-color: #aa0e0b">
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <img alt='Mila Kunis' height='23' src='<?php echo base_url();?>assets/img/avatar1_small.jpg' width='23' />
                        <span class='user-name hidden-phone' style="color: white"><?php echo $tampil_nama_user; ?></span>
                        <b class='caret' style="color: white"></b>
                    </a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="<?php echo site_url().'/logout/change2'; ?>">
                                <i class="icon-user-plus"></i> 
                                Move BLK
                            </a>
                        </li>
                        <li class='divider'></li>
                        <li>
                            <a href='<?php echo site_url().'/logout'; ?>'>
                                <i class='icon-signout'></i>
                                Sign out
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!-- /main navbar -->
    <div class="page-container sidebar-default">

    <div class="page-content">

        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class='navigation navigation-main navigation-accordion'>
                            <li class=''>
                                <a href='<?php echo site_url().'/dashboard'; ?>'>
                                    <span>首頁 - HOME</span>
                                </a>
                            </li>

                            <li class=''>
                                <a class='dropdown-collapse' href='#'>
                                    <span>Progress Marketing</span>
                                    <i class='icon-angle-down angle-down'></i>
                                </a>
                                <ul class='nav nav-stacked'>
                                    <li class=''>
                                        <a href='<?php echo site_url().'/markinformal'; ?>'>
                                            <span>PGM Informal</span>
                                        </a>
                                    </li>
                                    <li class=''>
                                        <a href='<?php echo site_url().'/markformal'; ?>'>
                                            <span>PGM Formal/Jompo</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="content-wrapper">
            <?php 
                $this->load->view($namamodule.'/'.$namafileview);
            ?>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $("#group_id2").change(function(){
            var kode_group = {
                    kode_group:$("#group_id2").val()
                };
            document.getElementById("load").style.display = "block";  // show the loading message.
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('new_majikans/select_agenlist')?>",
                data: kode_group,
                success: function(msg) {
                    $('#jelasin_agen').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            });
        });
        $("#group_id3").change(function(){
            var kode_group = {kode_group:$("#group_id3").val()};
            document.getElementById("load").style.display = "block";  // show the loading message.
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('new_suhan/select_agenlist3')?>",
                data: kode_group,
                success: function(msg) {
                $('#jelasin_agen').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            });
        });
        $("#group_id4").change(function(){
            var kode_group = {kode_group:$("#group_id4").val()};
            document.getElementById("load").style.display = "block";  // show the loading message.
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('new_visapermit/select_agenlist4')?>",
                data: kode_group,
                success: function(msg) {
                $('#jelasin_agen').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            });
        });


        $(document).ready(function(){
            $('#submit1').click(function(){
                printData();
            });
             $('#submit2').click(function(){
                printData2();
            });
             $('#printsponsor').click(function(){
                printSponsordata();
            });
        });

        function printData() {
            var divToPrint=document.getElementById("printTable");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }


        $('#namasektor').change(function() {
            var strsektor = document.getElementById("namasektor").value;
            var datasektor = strsektor.split(" ");
            var sektornya = datasektor[0];
            var jekanya = datasektor[1];

            var negaranya1 = document.getElementById("negara1").value;
            var negaranya2 = document.getElementById("negara2").value;
            var callingnya = document.getElementById("namacalling").value;
            var skillnya = document.getElementById("namaskill").value;
            var skillnya2 = document.getElementById("namaskill2").value;
            var skillnya3 = document.getElementById("namaskill3").value;


            $('#idbiodata').val(sektornya);
            //  $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);

            $('#jeniskelamin').val(jekanya);


        }).change(); // Trigger the event

        $('#negara1').change(function() {
            var strsektor = document.getElementById("namasektor").value;
            var datasektor = strsektor.split(" ");
            var sektornya = datasektor[0];
            var jekanya = datasektor[1];

            var negaranya1 = document.getElementById("negara1").value;
            var negaranya2 = document.getElementById("negara2").value;
            var callingnya = document.getElementById("namacalling").value;
            var skillnya = document.getElementById("namaskill").value;
            var skillnya2 = document.getElementById("namaskill2").value;
            var skillnya3 = document.getElementById("namaskill3").value;

            $('#negara1isi').val(negaranya1);
            //   $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);

        }).change(); // Trigger the event

        $('#negara2').change(function() {
            var strsektor = document.getElementById("namasektor").value;
            var datasektor = strsektor.split(" ");
            var sektornya = datasektor[0];
            var jekanya = datasektor[1];

            var negaranya1 = document.getElementById("negara1").value;
            var negaranya2 = document.getElementById("negara2").value;
            var callingnya = document.getElementById("namacalling").value;
            var skillnya = document.getElementById("namaskill").value;
            var skillnya2 = document.getElementById("namaskill2").value;
            var skillnya3 = document.getElementById("namaskill3").value;

            $('#negara2isi').val(negaranya2);
            //  $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);


        }).change(); // Trigger the event

        $('#namacalling').change(function() {
            var strsektor = document.getElementById("namasektor").value;
            var datasektor = strsektor.split(" ");
            var sektornya = datasektor[0];
            var jekanya = datasektor[1];

            var negaranya1 = document.getElementById("negara1").value;
            var negaranya2 = document.getElementById("negara2").value;
            var callingnya = document.getElementById("namacalling").value;
            var skillnya = document.getElementById("namaskill").value;
            var skillnya2 = document.getElementById("namaskill2").value;
            var skillnya3 = document.getElementById("namaskill3").value;

             $('#callvisa1isi').val(callingnya);
            //           $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);

        }).change(); // Trigger the event

        $('#namaskill').change(function() {
            var strsektor = document.getElementById("namasektor").value;
            var datasektor = strsektor.split(" ");
            var sektornya = datasektor[0];
            var jekanya = datasektor[1];

            var negaranya1 = document.getElementById("negara1").value;
            var negaranya2 = document.getElementById("negara2").value;
            var callingnya = document.getElementById("namacalling").value;
            var skillnya = document.getElementById("namaskill").value;
            var skillnya2 = document.getElementById("namaskill2").value;
            var skillnya3 = document.getElementById("namaskill3").value;

            $('#skill1isi').val(skillnya);
            //   $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);
        }).change(); // Trigger the event

        $('#namaskill2').change(function() {
            var strsektor = document.getElementById("namasektor").value;
            var datasektor = strsektor.split(" ");
            var sektornya = datasektor[0];
            var jekanya = datasektor[1];

            var negaranya1 = document.getElementById("negara1").value;
            var negaranya2 = document.getElementById("negara2").value;
            var callingnya = document.getElementById("namacalling").value;
            var skillnya = document.getElementById("namaskill").value;
            var skillnya2 = document.getElementById("namaskill2").value;
            var skillnya3 = document.getElementById("namaskill3").value;

            $('#skill2isi').val(skillnya2);
            //   $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);

        }).change(); // Trigger the event

        $('#namaskill3').change(function() {
            var strsektor = document.getElementById("namasektor").value;
            var datasektor = strsektor.split(" ");
            var sektornya = datasektor[0];
            var jekanya = datasektor[1];

            var negaranya1 = document.getElementById("negara1").value;
            var negaranya2 = document.getElementById("negara2").value;
            var callingnya = document.getElementById("namacalling").value;
            var skillnya = document.getElementById("namaskill").value;
            var skillnya2 = document.getElementById("namaskill2").value;
            var skillnya3 = document.getElementById("namaskill3").value;

            $('#skill3isi').val(skillnya3);
            //   $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);

        }).change(); // Trigger the event

    </script>
</body>
</html>
