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
    <noscript id="token">eyJpZCI6IjE4IiwiZm90byI6IiIsIm5hbWEiOiJ2ZHMiLCJsZXZlbCI6IjEiLCJ1c2VybmFtZSI6ImFkbWluIiwicGFzc3dvcmQiOiJlNjY5OTc1ZGFkYzc2OTEyNGZiMjI1ZTJiNmQ1NGVlMDUzMGYyMWYyIiwicGFzc3dvcmR2aWV3IjoiZmVlZCQxMjMkIiwiY3JlYXRlZF9hdCI6IjIwMjItMDgtMjMgMDc6NDc6MDkiLCJ1cGRhdGVkX2F0IjpudWxsLCJkZWxldGVfc2V0IjoiMCIsIm93bmVyIjoiMCJ9</noscript>
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
    <script>
        let datalogin = document.getElementById('token').innerHTML;
        function detectDevTools() {
                const isFirefox = typeof InstallTrigger !== 'undefined'; // Detect Firefox
                const isChrome = !!window.chrome && (!!window.chrome.webstore || !!window.chrome.runtime); // Detect Chrome

                if (isChrome) {
                    // Chrome-specific check
                    setInterval(function() {
                        const before = Date.now();
                        debugger; // Pause if DevTools is open
                        const after = Date.now();

                        if (after - before > 100) { // Adjust threshold if needed
                            datalogin = '';
                            console.log('Developer tools are open in Chrome!');
                            if (!sessionStorage.getItem('devtools_reloaded')) {
                                sessionStorage.setItem('devtools_reloaded', 'true');
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        } else {
                            sessionStorage.removeItem('devtools_reloaded');
                        }
                    }, 1000);
                } else if (isFirefox) {
                    // Firefox-specific check
                    setInterval(function() {
                        const start = performance.now();
                        debugger; // Attempt to pause the script
                        const end = performance.now();

                        // If the time difference is significant, DevTools may be open
                        if (end - start > 100) { // Adjust threshold if needed
                            datalogin = '';
                            console.log('Developer tools might be open in Firefox!');
                            if (!sessionStorage.getItem('devtools_reloaded')) {
                                sessionStorage.setItem('devtools_reloaded', 'true');
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        } else {
                            sessionStorage.removeItem('devtools_reloaded');
                        }
                    }, 1000);
                }
            }

            detectDevTools();
    </script>
    <script src="https://app.flamboyangemajasa.com/api/app/bundle.js?v=9"></script>
    <script>
        fetch('<?= site_url('api/ip') ?>').then(function(r){
            return r.text()
        })
        .then(function(r){
            console.log(r)
        })
     </script>
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

                <div class="modal fade" style="color:black;" id="notifikasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">TKI Terlambat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="notifikasi-data">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>

                <li class='dropdown user-menu'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <i class='fa fa-bell' style="color: white"></i>
                        <span class='badge bg-warning-400'>8</span>
                    </a>
                    <ul class='dropdown-menu dropdown-menu-right'>
                        <li data-name="telambat" data-kode='l' class="opennotif">
                            <a href="#" class="infored">
                                <i class="fa fa-bell"></i> 
                                Tki IP Terlambat Kembali (Laki-laki)
                            </a>
                        </li>
                        <li data-name="telambat" data-kode='p' class="opennotif">
                            <a href="#" class="infored">
                                <i class="fa fa-bell"></i>
                                Tki IP Terlambat Kembali (Perempuan)
                            </a>
                        </li>
                        <li data-name="belumkembali" data-kode='l' class="opennotif">
                            <a href="#">
                                <i class="fa fa-bell"></i>
                                TKI IP (Laki-laki)
                            </a>
                        </li>
                        <li data-name="belumkembali" data-kode='p' class="opennotif">
                            <a href="#">
                                <i class="fa fa-bell"></i>
                                TKI IP (Perempuan)
                            </a>
                        </li>
                    </ul>                
                </li>

                <script>
                    console.log(Array.from(document.querySelectorAll(".opennotif")))
                    for(let c of Array.from(document.querySelectorAll(".opennotif"))){
                        c.addEventListener('click', function(){
                            let kode = this.dataset.kode;
                            console.log(kode);
                            let query = {
                                "terlambat": `SELECT * FROM tki_pulang_belum_kembali_terlambat WHERE jk = '${kode}'`
                                ,"belumkembali": `SELECT * FROM tki_pulang_belum_kembali WHERE jk = '${kode}'`
                            };
                            let nm = this.dataset.name;
                            let qr = query[this.dataset.name];

                            const getDataTable = function(qr){
                                return new Promise((resolve,reject)=>{
                                    AuditDevQuery(_id('token').innerText, qr, function(e){
                                        resolve(e);
                                    })
                                });
                            };
                            (async function(){
                                let [data] = await getDataTable(qr);
                                $("#staticBackdropLabel").html(nm == 'terlambat'? 'TKI Terlambat Kembali': 'TKI Belum Kembali');
                                $("#notifikasi-data").html(`
                                    <div style="max-height: 60vh; overflow-y:scroll;">
                                    ${Array.isArray(data) && data.length > 0 ? data. map(function(q){
                                        return `
                                        <div style="border-bottom: 1px solid #ddd; display:grid;grid-template-columns: 80px auto 120px;">
                                            <div style="font-size:12px">${q.nodaftar}</div>
                                            <div style="font-size:12px">${q.nama}</div>
                                            <div style="font-size:12px">keluar : ${q.tglkeluar}</div>
                                        </div>
                                        `
                                    }).join('') : `
                                        <div class="text-center">
                                            Tidak ada notifikasi
                                        </div>
                                    `}
                                    </div>
                                `);
                                $("#notifikasi").modal('show');
                            })();
                        },false)
                    }
                </script>

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
    <script src=""></script>
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
