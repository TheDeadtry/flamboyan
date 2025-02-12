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

    <script type="text/javascript" src="<?php echo base_url('assets/blk/assets/js/plugins/notifications/bootbox.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/blk/assets/js/plugins/notifications/sweet_alert.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/blk/assets/js/plugins/media/fancybox.min.js') ?>"></script>
    
        


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
                                    <i class='icon-home'></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/tambahbio'; ?>'>
                                    <i class='icon-pencil7'></i>
                                    <span>Tambah Biodata</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/databio'; ?>'>
                                    <i class='icon-list3'></i>
                                    <span>Data Biodata</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/laporandokinformal'; ?>'>
                                    <i class='icon-bookmark'></i>
                                    <span>Laporan Dok Informal</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/laporandokformal'; ?>'>
                                    <i class='icon-bookmark'></i>
                                    <span>Laporan Dok Formal</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/admin_mark/informal'; ?>'>
                                    <i class='icon-stats-bars3'></i>
                                    <span>PGM Informal</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/admin_mark/formal'; ?>'>
                                    <i class='icon-stats-bars3'></i>
                                    <span>PGM Formal/Jompo</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/sponsor'; ?>'>
                                    <i class='icon-user'></i>
                                    <span>Data Sponsor</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/agen'; ?>'>
                                    <i class='icon-bubbles4'></i>
                                    <span>Data Agen</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/new_majikans'; ?>'>
                                    <i class='icon-users4'></i>
                                    <span>Data Majikan</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/new_suhan'; ?>'>
                                    <i class='icon-drawer'></i>
                                    <span>Data Suhan</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/new_visapermit'; ?>'>
                                    <i class='icon-credit-card'></i>
                                    <span>Data Visapermit</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/setting'; ?>'>
                                    <i class='icon-cogs'></i>
                                    <span>Setting Data</span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='<?php echo site_url().'/print_data'; ?>'>
                                    <i class='icon-cogs'></i>
                                    <span>Print SURAT</span>
                                </a>
                            </li>
                            <li class=''>
                                <a class='dropdown-collapse' href='#'>
                                    <i class='icon-pencil5'></i>
                                    <span>Laporan </span>
                                </a>
                                <ul class='nav nav-stacked'>
                                    <li class=''>
                                        <a href='<?php echo site_url().'/laporanasuransi'; ?>'>
                                            <span>Pembayaran Asuransi</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class='nav nav-stacked'>
                                    <li class=''>
                                        <a href='<?php echo site_url().'/laporanasuransipap'; ?>'>
                                            <span>Pembayaran Asuransi PRA </span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class='nav nav-stacked'>
                                    <li class=''>
                                        <a href='<?php echo site_url().'/laporanasuransimasa'; ?>'>
                                            <span>Pembayaran Asuransi MASA</span>
                                        </a>
                                    </li>
                                </ul>
                            </li><!--
                            <li class=''>
                                <a href='<?php echo site_url().'/invoice'; ?>'>
                                    <i class='icon-calculator'></i>
                                    <span>Invoice</span>
                                </a>
                            </li>-->
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
            alert('dd');
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
        });/*
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
    $('.dewselect2').prepend('<option></option>').select2().val("").change();*/

    $('.dewdate').datepicker({
        autoclose: true,
        format: 'yyyy.mm.dd',
        todayHighlight: true,
        minDate: "dateToday",
        todayBtn: "linked",
        clearBtn: true,
        zIndexOffset: 1600
    }).click(function() {    
        $(this).datepicker('setDate', $(this).val() );
    }).removeClass('pointer').addClass('pointer').attr('readonly','readonly');

    $('.dewdate2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        minDate: "dateToday",
        todayBtn: "linked",
        clearBtn: true,
        zIndexOffset: 1600
    }).click(function() {    
        $(this).datepicker('setDate', $(this).val() );
    }).removeClass('pointer').addClass('pointer').attr('readonly','readonly');

    $('.dewdate3').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        minDate: "dateToday",
        todayBtn: "linked",
        clearBtn: true,
        zIndexOffset: 1600
    }).click(function() {    
        $(this).datepicker('setDate', $(this).val() );
    }).removeClass('pointer').addClass('pointer').attr('readonly','readonly');

    $('.dewdate4').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        minDate: "dateToday",
        todayBtn: "linked",
        clearBtn: true,
        zIndexOffset: 1600
    }).click(function() {    
        $(this).datepicker('setDate', $(this).val() );
    }).removeClass('pointer').addClass('pointer').attr('readonly','readonly');

    $('.dewdate5').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        minDate: "dateToday",
        todayBtn: "linked",
        clearBtn: true,
        zIndexOffset: 1600
    }).click(function() {    
        $(this).datepicker('setDate', $(this).val() );
    }).removeClass('pointer').addClass('pointer').attr('readonly','readonly');

    $('.dewselect2').prepend('<option></option>').select2().val("").change();
/*
    $('.dewselect2_multi').attr('multiple', 'multiple').select2().val("").change();

    $('.dewselect2_teal').select2({
        containerCssClass: 'bg-teal-400'
    });

    $('.dewselect2_notrigger').select2().attr('disabled','disabled');

    $('.dewselect2_n').select2();

    $('.dewselect-reset').each(function(){
        $(this).next('span').andSelf().wrapAll('<div class="input-group"></div>');
    }).parent().append(
            '<span class="input-group-btn">'+
            '<button class="btn btn-default dewselect-reset-btn" type="button">Clear</button>'+
        '</span>'
    );

    $('.dewselect-reset-btn').click(function() {
        $(this).parent().parent().find('select').select2().val("").change();
    });
    
    $('[data-popup="lightbox"]').fancybox({
        padding: 3
    });

    $(".dkrhRadio, .multiselect-container input").uniform({
        radioClass: 'choice'
    });

    $('.number').keyup(function(event) {

        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "");
        });
    });

    $('.modal-lvl2').on('shown.bs.modal', function() {
        $('body').append('<div class="modal-backdrop2"></div>');
    });

    $('.modal-lvl2').on('hidden.bs.modal', function() {
        $('.modal-backdrop2').remove();
    });

    $('[readonly]').removeClass('not-allowed').addClass('not-allowed');

    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    $( "#dewtable" ).dataTable({
        "searching": false,
        "paging":   false,
        "ordering": false,
        "info":     false
    });

    $( ".dewtable2" ).dataTable();



    $(".dewselect3").attr('multiple', 'multiple').multipleSelect({
        filter: true
    }).multipleSelect("uncheckAll");;

    $('select[class=dewselect3]').each(function(){
        $(this).next('div').andSelf().wrapAll('<div class="input-group"></div>');
    }).parent().append(
        '<span class="input-group-btn">'+
            '<button class="btn btn-default dewselect-reset-btn" type="button">Clear</button>'+
        '</span>'
    );

    $('.dewselect-reset-btn').click(function() {
        $(this).parent().parent().find('select').multipleSelect("uncheckAll");
    });
    
    $(".dewpopover").popover({ 
        container: "body" 
    });*/

    </script>
</body>
</html>
