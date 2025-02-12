<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9"></html><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
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
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
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

                    <li class='dropdown medium only-icon widget'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <i class='icon-tasks'></i>
                            <div class='label'>BIODATA</div>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href="<?php echo site_url().'/databiofemaleinformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-success'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            FEMALE INFORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/databiofemaleformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-success'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            FEMALE FORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/databiomaleformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            MALE FORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/databiomaleinformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            MALE INFORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/databiopantijompo'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            PANTI JOMPO
                                        </div>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class='dropdown medium only-icon widget'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <i class='icon-tasks'></i>
                            <div class='label'>ADMINISTRASI</div>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href="<?php echo site_url().'/dataadminfemaleinformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-success'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            FEMALE INFORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/dataadminfemaleformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-success'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            FEMALE FORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/dataadminmaleformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            MALE FORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/dataadminmaleinformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            MALE INFORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/dataadminpantijompo'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            PANTI JOMPO
                                        </div>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>


<li class='dropdown medium only-icon widget'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <i class='icon-tasks'></i>
                            <div class='label'>DOKUMEN</div>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href="<?php echo site_url().'/datadokumenfemaleinformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-success'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            FEMALE INFORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/datadokumenfemaleformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-success'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            FEMALE FORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/datadokumenmaleformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            MALE FORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/datadokumenmaleinformal'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            MALE INFORMAL
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class='divider'></li>
                            <li>
                                <a href="<?php echo site_url().'/datadokumenpantijompo'; ?>">
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            PANTI JOMPO
                                        </div>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>


                     <a class='toggle-nav btn pull-left' href='#'>
                    <i class='icon-reorder'> HIDE MENU </i>
                </a>

               


                    <li class='dropdown dark user-menu'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <img alt='Mila Kunis' height='23' src='<?php echo base_url();?>assets/img/avatar1_small.jpg' width='23' />
                            <span class='user-name hidden-phone'></span>
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
    </div>
</header>
<div id='wrapper'>

<?php 
                        $this->load->view($namamodule.'/'.$namafileview);
                    ?>
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

 
 function tampilSuhane()
 {
     kdkab = document.getElementById("majikan_id").value;
     $.ajax({
        url : "<?php echo site_url('detailmajikan/pilih_suhannya/')?>"+kdkab,

         success: function(response){
         $("#suhan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 
 function tampilvisapermite()
 {
     kdkec = document.getElementById("suhan_id").value;
     $.ajax({
         url:"<?php echo  base_url();?>detailmajikan/pilih_visapermitnya/"+kdkec+"",
         success: function(response){
         $("#visapermit_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }


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
        url : "<?php echo site_url('detailmajikan/select_agenlist')?>",
        data: kode_group,
        success: function(msg) {
        $('#jelasin_agen').html(msg);
            document.getElementById("load").style.display = "none";
        }
        });
    });

                    $("#group_id2").change(function(){
    var kode_group = {kode_group:$("#group_id2").val()};
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

    $("#group_idawal").change(function(){
    var kode_group = {kode_group:$("#group_idawal").val()};
    document.getElementById("load").style.display = "block";  // show the loading message.
    $.ajax({
        type: "POST",
        url : "<?php echo site_url('markawal/select_agenlist')?>",
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
        url : "<?php echo site_url('majikans/select_agenlist3')?>",
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
        url : "<?php echo site_url('majikans/select_agenlist4')?>",
        data: kode_group,
        success: function(msg) {
        $('#jelasin_agen').html(msg);
            document.getElementById("load").style.display = "none";
        }
        });
    });


                    $("#group_id5").change(function(){
    var kode_group = {kode_group:$("#group_id5").val()};
    document.getElementById("load").style.display = "block";  // show the loading message.
    $.ajax({
        type: "POST",
        url : "<?php echo site_url('detailmajikan/select_agenlist')?>",
        data: kode_group,
        success: function(msg) {
        $('#jelasin_agen').html(msg);
            document.getElementById("load").style.display = "none";
        }
        });
    });



    //       $("#agennya_id").change(function(){
    // var kode_group = {kode_group:$("#agennya_id").val()};
    // document.getElementById("load").style.display = "block";  // show the loading message.
    // $.ajax({
    //     type: "POST",
    //     url : "<?php echo site_url('detailmajikan/getmajikanList')?>",
    //     data: kode_group,
    //     success: function(msg) {
    //     $('#jelasin_majikan').html(msg);
    //         document.getElementById("load").style.display = "none";
    //     }
    //     });
    // });






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
            $(document).ready(function(){
                $("#idtki").autocomplete({
                    minLength:2,
                    source:'get_product.php',
                    select:function(event, ui){
                        $('#nama-produk').html(ui.item.nama);
                    }
                });
            });



    </script>
</body>
 
</html>