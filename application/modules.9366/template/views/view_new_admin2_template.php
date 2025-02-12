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
    <script type="text/javascript" src="<?php echo base_url('assets/blk/assets/js/plugins/notifications/bootbox.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/blk/assets/js/plugins/notifications/sweet_alert.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/blk/assets/js/plugins/media/fancybox.min.js') ?>"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dewa/datepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dewa/datepicker3.min.css" />

    <script src="<?php echo base_url(); ?>assets/dewa/bootstrap-datepicker.min.js"></script>
    <!-- / daterange picker -->
        


    <!-- /theme JS files -->


    <script type="text/javascript">

        $(document).ready(function(){
            $('.dewselect2_n').select2();
        });

    </script>

    <!-- /theme JS files -->

</head>

<body onload="process()">
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

        <div class="content-wrapper">
            <?php 
                $this->load->view($namamodule.'/'.$namafileview);
            ?>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $("#dewgroup_id9").change(function() {
            var kode_agen = {kode_agen:$("#dewgroup_id9").val()};
            document.getElementById("load").style.display = "block";
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('laporandokformal/select_maj') ?>",
                data: kode_agen,
                success: function(msg) {
                    $('#jelasin_maj').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            })
        });
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
    $('.dewdate').datepicker({
        autoclose: true,
        format: 'yyyy.mm.dd',
        todayHighlight: true
    });
    $('.dewdate2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });
    </script>
</body>
</html>
