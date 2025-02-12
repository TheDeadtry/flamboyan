<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9"></html><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Dashboard PT Flamboyan</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
  
    <!--[if lt IE 9]>
    <script src='assets/javascripts/html5shiv.js' type='text/javascript'></script>
    <![endif]-->

<!-- <style>
            #parent {
                height: 300px;
            }
            
            #fixTable {
                width: 1800px !important;
            }
        </style> -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/bootstrap/bootstrap.css' media='all' rel='stylesheet' type='text/css' />
    <link href='<?php echo base_url(); ?>assets/stylesheets/bootstrap/bootstrap-responsive.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery ui -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/jquery_ui/jquery-ui-1.10.0.custom.css' media='all' rel='stylesheet' type='text/css' />
    <link href='<?php echo base_url(); ?>assets/stylesheets/jquery_ui/jquery.ui.1.10.0.ie.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / switch buttons -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/bootstrap_switch/bootstrap-switch.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / xeditable -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/xeditable/bootstrap-editable.css' media='all' rel='stylesheet' type='text/css' />
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/common/bootstrap-wysihtml5.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / wysihtml5 (wysywig) -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/common/bootstrap-wysihtml5.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery file upload -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/jquery_fileupload/jquery.fileupload-ui.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / full calendar -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/fullcalendar/fullcalendar.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / select2 -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/select2/select2.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / mention -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/mention/mention.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / tabdrop (responsive tabs) -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/tabdrop/tabdrop.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jgrowl notifications -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/jgrowl/jquery.jgrowl.min.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / datatables -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/datatables/bootstrap-datatable.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / dynatrees (file trees) -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/dynatree/ui.dynatree.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / color picker -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/bootstrap_colorpicker/bootstrap-colorpicker.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / datetime picker -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / daterange picker) -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / flags (country flags) -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/flags/flags.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / slider nav (address book) -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/slider_nav/slidernav.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / fuelux (wizard) -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/plugins/fuelux/wizard.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / flatty theme -->
            <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />

    <link href='<?php echo base_url(); ?>assets/stylesheets/light-theme.css' id='color-settings-body-color' media='all' rel='stylesheet' type='text/css' />
    <!-- / demo -->
    <link href='<?php echo base_url(); ?>assets/stylesheets/demo.css' media='all' rel='stylesheet' type='text/css' />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body class="fixed-top">
<header>
    <div class='navbar'>
        <div class='navbar-inner'>
            <div class='container-fluid'>
                <a class='brand' href='<?php echo site_url().'/dashboard'; ?>'>
                   <!--  <i class='icon-heart-empty'></i> -->
                  <img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="Admin Lab" />
                   <!--  <span class='hidden-phone'>PT Flamboyan Gema Jasa </span> -->
                </a>
             
                <ul class='nav pull-right'>
                     <a class='toggle-nav btn pull-left' href='#'>
                    <i class='icon-reorder'> HIDE MENU </i>
                </a>

                    <li class='dropdown dark user-menu'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <img alt='Mila Kunis' height='23' src='<?php echo base_url();?>assets/img/avatar1_small.jpg' width='23' />
                            <span class='user-name hidden-phone'><?php echo $tampil_nama_user; ?></span>
                            <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu'>
                           <!--  <li>
                                <a href='user_profile.html'>
                                    <i class='icon-user'></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href='user_profile.html'>
                                    <i class='icon-cog'></i>
                                    Settings
                                </a>
                            </li> -->
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
    </div>
</header>
<div id='wrapper'>
<div id='main-nav-bg'></div>
<nav class='' id='main-nav'>
<div class='navigation'>
<div class='search'>
    <form accept-charset="UTF-8" action="search_results.html" method="get" /><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
        <div class='search-wrapper'>
            <input autocomplete="off" class="search-query" id="q" name="q" placeholder="Search..." type="text" value="" />
            <button class="btn btn-link icon-search" name="button" type="submit"></button>
        </div>
    </form>
</div>

 </br>
 

<ul class='nav nav-stacked'>
<li class=''>
    <a href='<?php echo site_url().'/dashboard'; ?>'>
        <i class='icon-dashboard'></i>
        <span>Dashboard</span>
    </a>
</li>
<li class=''>
    <a class='dropdown-collapse' href='#'>
        <i class='icon-edit'></i>
        <span>Biodata</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='<?php echo site_url().'/databiomaleformal'; ?>'>
                <i class='icon-caret-right'></i>
                <span>Male Formal</span>
            </a>
        </li>
        <li class=''>
            <a href='<?php echo site_url().'/databiofemaleformal'; ?>'>
                <i class='icon-caret-right'></i>
                <span>Female Formal</span>
            </a>
        </li>
        <li class=''>
            <a href='<?php echo site_url().'/databiomaleinformal'; ?>'>
                <i class='icon-caret-right'></i>
                <span>Male Informal</span>
            </a>
        </li>
        <li class=''>
            <a href='<?php echo site_url().'/databiofemaleinformal'; ?>'>
                <i class='icon-caret-right'></i>
                <span>female Informal</span>
            </a>
        </li>
         <li class=''>
            <a href='<?php echo site_url().'/databiopantijompo'; ?>'>
                <i class='icon-caret-right'></i>
                <span>Panti Jompo</span>
            </a>
        </li>
    </ul>
</li>

</ul>
</div>
</nav>
<section id='content'>
    <div class='container-fluid'>
        <div class='row-fluid' id='content-wrapper'>
            <div class='span12'>
<!-- <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Dashboard</span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
</div> -->
    <?php 
                        $this->load->view($namamodule.'/'.$namafileview);
                    ?>
            </div>
        </div>
    </div>
</section>
</div>
    <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    // <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js" type="text/javascript"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap-fileupload.js"></script>
<!-- / jquery -->
<script src='<?php echo base_url(); ?>assets/javascripts/jquery/jquery.min.js' type='text/javascript'></script>
<!-- / jquery mobile events (for touch and slide) -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/mobile_events/jquery.mobile-events.min.js' type='text/javascript'></script>
<!-- / jquery migrate (for compatibility with new jquery) -->
<script src='<?php echo base_url(); ?>assets/javascripts/jquery/jquery-migrate.min.js' type='text/javascript'></script>
<!-- / jquery ui -->
<script src='<?php echo base_url(); ?>assets/javascripts/jquery_ui/jquery-ui.min.js' type='text/javascript'></script>
<!-- / bootstrap -->
<script src='<?php echo base_url(); ?>assets/javascripts/bootstrap/bootstrap.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/flot/excanvas.js' type='text/javascript'></script>
<!-- / sparklines -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/sparklines/jquery.sparkline.min.js' type='text/javascript'></script>
<!-- / flot charts -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/flot/flot.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/flot/flot.resize.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/flot/flot.pie.js' type='text/javascript'></script>
<!-- / bootstrap switch -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_switch/bootstrapSwitch.min.js' type='text/javascript'></script>
<!-- / fullcalendar -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fullcalendar/fullcalendar.min.js' type='text/javascript'></script>
<!-- / datatables -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/datatables/jquery.dataTables.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/tableHeadFixer.js' type='text/javascript'></script>
<!-- / wysihtml5 -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/common/wysihtml5.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/common/bootstrap-wysihtml5.js' type='text/javascript'></script>
<!-- / select2 -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/select2/select2.js' type='text/javascript'></script>
<!-- / color picker -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_colorpicker/bootstrap-colorpicker.min.js' type='text/javascript'></script>
<!-- / mention -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/mention/mention.min.js' type='text/javascript'></script>
<!-- / input mask -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/input_mask/bootstrap-inputmask.min.js' type='text/javascript'></script>
<!-- / fileinput -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileinput/bootstrap-fileinput.js' type='text/javascript'></script>
<!-- / modernizr -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/modernizr/modernizr.min.js' type='text/javascript'></script>
<!-- / retina -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/retina/retina.js' type='text/javascript'></script>
<!-- / fileupload -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileupload/tmpl.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileupload/load-image.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileupload/canvas-to-blob.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileupload/jquery.iframe-transport.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileupload/jquery.fileupload.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileupload/jquery.fileupload-fp.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileupload/jquery.fileupload-ui.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fileupload/jquery.fileupload-init.js' type='text/javascript'></script>

<!-- / timeago -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/timeago/jquery.timeago.js' type='text/javascript'></script>
<!-- / slimscroll -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/slimscroll/jquery.slimscroll.min.js' type='text/javascript'></script>
<!-- / autosize (for textareas) -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/autosize/jquery.autosize-min.js' type='text/javascript'></script>
<!-- / charCount -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/charCount/charCount.js' type='text/javascript'></script>
<!-- / validate -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/validate/jquery.validate.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/validate/additional-methods.js' type='text/javascript'></script>
<!-- / naked password -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/naked_password/naked_password-0.2.4.min.js' type='text/javascript'></script>
<!-- / nestable -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/nestable/jquery.nestable.js' type='text/javascript'></script>
<!-- / tabdrop -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/tabdrop/bootstrap-tabdrop.js' type='text/javascript'></script>
<!-- / jgrowl -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/jgrowl/jquery.jgrowl.min.js' type='text/javascript'></script>
<!-- / bootbox -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootbox/bootbox.min.js' type='text/javascript'></script>
<!-- / inplace editing -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/xeditable/bootstrap-editable.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/xeditable/wysihtml5.js' type='text/javascript'></script>
<!-- / ckeditor -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/ckeditor/ckeditor.js' type='text/javascript'></script>
<!-- / filetrees -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/dynatree/jquery.dynatree.min.js' type='text/javascript'></script>
<!-- / datetime picker -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js' type='text/javascript'></script>
<!-- / daterange picker -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_daterangepicker/moment.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js' type='text/javascript'></script>
<!-- / max length -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_maxlength/bootstrap-maxlength.min.js' type='text/javascript'></script>
<!-- / dropdown hover -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/bootstrap_hover_dropdown/twitter-bootstrap-hover-dropdown.min.js' type='text/javascript'></script>
<!-- / slider nav (address book) -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/slider_nav/slidernav-min.js' type='text/javascript'></script>
<!-- / fuelux -->
<script src='<?php echo base_url(); ?>assets/javascripts/plugins/fuelux/wizard.js' type='text/javascript'></script>
<!-- / flatty theme -->
<script src='<?php echo base_url(); ?>assets/javascripts/nav.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/tables.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/theme.js' type='text/javascript'></script>
<!-- / demo -->
<script src='<?php echo base_url(); ?>assets/javascripts/demo/jquery.mockjax.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/demo/inplace_editing.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/demo/charts.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/javascripts/demo/demo.js' type='text/javascript'></script>




    <script>
        function printSponsordata()
{
   var divToPrint=document.getElementById("tabelSponsor");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

    function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
    function printData2()
{
   var divToPrint=document.getElementById("printTable2");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

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
  $(document).ready(function() {
                $("#fixTable").tableHeadFixer({"head" : true, "left" : 7}); 
               $('#fixTable').dataTable();
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

 $('#tgl_habisdurasi').change(function() {

var date1 = document.getElementById("tgl_update").value;
 var date2 = document.getElementById("tgl_habisdurasi").value;

// $selisih = ((abs(strtotime ($date1) - strtotime ($date2)))/(60*60*24));
        // $('#jml_hari').val($date1);
       //   $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);


    }).change(); // Trigger the event


    $("#posisi_id").change(function(){

    var id_kategori = {id_kategori:$("#posisi_id").val()};
    document.getElementById("load").style.display = "block";  // show the loading message.
    $.ajax({
        type: "POST",
        url : "<?php echo site_url('tambahworking/select_penjelasan')?>",
        data: id_kategori,
        success: function(msg) {
        $('#jelasin').html(msg);
            document.getElementById("load").style.display = "none";
        }
        });
    });

     $("#majikan_id").change(function(){
    var id_majikan = {id_majikan:$("#majikan_id").val()};
    document.getElementById("load").style.display = "block";  // show the loading message.
    $.ajax({
        type: "POST",
        url : "<?php echo site_url('majikans/select_suhanlist')?>",
        data: id_majikan,
        success: function(msg) {
        $('#jelasin_suhan').html(msg);
            document.getElementById("load").style.display = "none";
        }
        });
    });
          $("#group_id").change(function(){
    var kode_group = {kode_group:$("#group_id").val()};
    document.getElementById("load").style.display = "block";  // show the loading message.
    $.ajax({
        type: "POST",
        url : "<?php echo site_url('majikans/select_agenlist')?>",
        data: kode_group,
        success: function(msg) {
        $('#jelasin_agen').html(msg);
            document.getElementById("load").style.display = "none";
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

$('#jumlahpenerbangan').change(function() {

 if ( this.value == '1')
      //.....................^.......
      {
         $("#satupenerbangan").show();
        $("#duapenerbangan").hide();
    }else if(this.value == '2'){

        $("#satupenerbangan").show();
                $("#duapenerbangan").show();

    }else if( this.value == '0'){
 $("#satupenerbangan").hide();
        $("#duapenerbangan").hide();
    }

    }).change(); // Trigger the event



});
          



    </script>
</body>
 
</html>