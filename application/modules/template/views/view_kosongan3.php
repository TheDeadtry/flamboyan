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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/visualization/echarts/echarts.js"></script>

    <!-- /theme JS files -->


    <!-- /theme JS files -->

</head>

<body>

    <!-- Main navbar -->
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



   <?php 
                        $this->load->view($namamodule.'/'.$namafileview);
                    ?>


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
</script>
</body>
</html>
