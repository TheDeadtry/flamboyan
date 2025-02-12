<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9"></html><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Dashboard PT Flamboyan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style_responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/uniform/css/uniform.default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-daterangepicker/daterangepicker.css" />
    
    
    <link href="<?php echo base_url(); ?>assets/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/uniform/css/uniform.default.css" />
    <link href="<?php echo base_url(); ?>assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body class="fixed-top">
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?php echo site_url().'/dashboard'; ?>"><img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="Admin Lab" /></a><a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="arrow"></span></a>
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>/assets/img/avatar1_small.jpg" alt="" /><span class="username"> <?php echo $tampil_nama_user; ?> </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url().'/logout'; ?>"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="container" class="row-fluid">
        <div id="sidebar" class="nav-collapse collapse">
            <div class="sidebar-toggler hidden-phone"></div>
            <div class="navbar-inverse">
                <form class="navbar-search visible-phone" />
                <input type="text" class="search-query" placeholder="Search" />
                </form>
            </div>
            <ul class="sidebar-menu">
                <li class="active"><a href="<?php echo site_url().'/dashboard'; ?>" class=""><span class="icon-box"><i class="icon-home"></i></span> Dashboard </span></a></li>
                <li class="active"><a href="<?php echo site_url().'/detailagengroup'; ?>" class=""><span class="icon-box"><i class="icon-group"></i></span> Data Agen </span></a></li>
            </ul>
            </ul>
        </div>
        <div id="main-content">
            <div class="container-fluid">

                <div id="page" class="dashboard">
                        <?php 
                        $this->load->view($namamodule.'/'.$namafileview);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="footer"> 2015 &copy; PT Flamboyan Gema Jasa
        <div class="span pull-right"><span class="go-top"><i class="icon-arrow-up"></i></span></div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />

    <script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap-fileupload.js"></script>

    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/js/excanvas.js"></script><script src="<?php echo base_url(); ?>assets/js/respond.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jquery-knob/js/jquery.knob.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.stack.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.crosshair.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.js"></script>
    
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/clockface/js/clockface.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.crosshair.js"></script>

    <script>
        jQuery(document).ready(function() {
          //  App.setMainPage(true);
            App.init()

        });

        function tambahchecked()
    {
        if(confirm("Tambahkan data baru ?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }
function savechecked()
    {
        if(confirm("Simpan data ?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }
function updatechecked()
    {
        if(confirm("update data ?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }
function deletechecked()
    {
        if(confirm("Delete selected data ?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }



        $(function() { 



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


         $('#idbiodata').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya+""+skillnya2+""+skillnya3);
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

         $('#idbiodata').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya+""+skillnya2+""+skillnya3);
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

         $('#idbiodata').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya+""+skillnya2+""+skillnya3);
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

         $('#idbiodata').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya+""+skillnya2+""+skillnya3);
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

         $('#idbiodata').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya+""+skillnya2+""+skillnya3);
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

         $('#idbiodata').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya+""+skillnya2+""+skillnya3);
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

         $('#idbiodata').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya+""+skillnya2+""+skillnya3);
       //   $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);


    }).change(); // Trigger the event




    $("#posisi_id").change(function(){

       // alert($("#posisi_id").val());
                var id_kategori = {id_kategori:$("#posisi_id").val()};

            
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('tambahworking/select_penjelasan')?>",
                        data: id_kategori,
                        success: function(msg){
                            $('#jelasin').html(msg);
                        }
                    });
        });


$('#paspor').change(function() {
 if ( this.value == 'Ada 有')
      //.....................^.......
      {
        $("#berlaku").show();
        $("#nomorpaspor").show();
        $("#office").show();
        $("#rencana").hide();
    }

 if ( this.value == 'Tidak ada 沒有')
      //.....................^.......
      {
        $("#rencana").show();
        $("#berlaku").hide();
        $("#nomorpaspor").hide();
        $("#office").hide();
    }


    }).change(); // Trigger the event

$('#mata').change(function() {
 if ( this.value == 'lolos 合格')
      //.....................^.......
      {
        $("#ukuranmata").hide();
    }else{

        $("#ukuranmata").show();
    }

    }).change(); // Trigger the event





});


    </script>
</body>
 
</html>