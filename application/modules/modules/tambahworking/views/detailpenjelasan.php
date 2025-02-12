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

                                    <div class="control-group">
                                    <label class="control-label"> 工作性質 Penjelasan pekerjaan </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Pekerjaan" name="penjelasan[]" id="penjelasan" class="chosen span7" multiple="multiple" tabindex="6">
                                            	<?php foreach ($option_penjelasan as $daftar_list): ?>

													<option value="<?php echo $daftar_list->isi; echo $daftar_list->mandarin;?>"><?php echo $daftar_list->isi; echo $daftar_list->mandarin;?></option>
												<?php endforeach; ?>	

                                          
                                        </select>
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
        });</script>