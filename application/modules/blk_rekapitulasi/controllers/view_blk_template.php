<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT FLAMBOYAN GEMAJASA</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/blk/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/ui/drilldown.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/datatables_extension_fixed_columns.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_inputs.js"></script> <!-- /FORM INPUT -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>
    <!-- /theme JS files -->

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url().'/dashboard'; ?>"><img src="<?php echo base_url(); ?>assets/blk/assets/images/logo_light.png" alt=""></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">

            </ul>

          

            <ul class="nav navbar-nav navbar-right">
                

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>assets/blk/assets/images/placeholder.jpg" alt="">
                        <span>Admin</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                        <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Second navbar -->
    <div class="navbar navbar-default" id="navbar-second">
        <ul class="nav navbar-nav no-border visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="navbar-second-toggle">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url().'/dashboard'; ?>"><i class="icon-display4 position-left"></i> Beranda</a></li>
                
                <li class="dropdown">
                    <a href="<?php echo site_url().'/blk_personal'; ?>" >
                        <i class="icon-users4"></i> Personal BLK <span class="caret"></span>
                    </a>                    
                </li>
                
                 <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user-check"></i> Pelatihan <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-250">
                        <li class="dropdown-header">Pelatihan</li>
                        <li>
                            <a href='<?php echo site_url().'/pelatihan_blk'; ?>'><i class="icon-task"></i> Pelatihan TKI</a>
                        </li>
                        
                    </ul>
                </li> -->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user-check"></i> UJK <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-250">
                        <li class="dropdown-header">Administrasi UJK</li>
                        <li>
                            <a href='<?php echo site_url().'/formulir_blk'; ?>'><i class="icon-task"></i> Pengajuan UJK</a>
                        </li>
                        
                    </ul>
                </li>
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-users4"></i> Rekapitulasi <span class="caret"> </span>
                    </a>   

                    <ul class="dropdown-menu width-250">
                        <li class="dropdown-header">Rekapitulasi</li>
                        <li>
                            <a href='<?php echo site_url().'/blk_rekapitulasi/absensi'; ?>'><i class="icon-task"></i> Absensi</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url().'/blk_rekapitulasi/ijin'; ?>'><i class="icon-task"></i> IP & IJ</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url().'/blk_rekapitulasi/pkl'; ?>'><i class="icon-task"></i> PKL</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url().'/blk_rekapitulasi/jompo'; ?>'><i class="icon-accessibility2"></i> Praktek Jompo</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url().'/blk_rekapitulasi/tata_boga'; ?>'><i class="icon-wave2"></i> Praktek Tata Boga</a>
                        </li>
                        <li>
                            <a href='<?php echo site_url().'/blk_rekapitulasi/finger'; ?>'><i class="icon-touch"></i> Fingerprint</a>
                        </li>
                        
                    </ul>                 
                </li>
                
                <li class="dropdown mega-menu mega-menu-wide">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu"></i> Menu <span class="caret"></span></a>

                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">LAPORAN BULANAN</span>
                                    <ul class="menu-list">
                                        <li>
                                            <a href="#"><i class="icon-stack2"></i> Laporan FingerPrint</a>
                                            <ul>
                                                <li><a href="<?php echo site_url().'/dashboard/dataabsen'; ?>">Laporan Data Absensi</a></li>
                                                <li><a href="<?php echo site_url().'/dashboard/dataabsenbiaya'; ?>">Laporan Data Absensi + Biaya makan</a></li>
                                                <li><a href="<?php echo site_url().'/dashboard/dataabsenbiayakat'; ?>">Laporan Data Absensi + Biaya Per Kategori</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-stack2"></i> Laporan Bulanan</a>
                                            <ul>
                                                <li><a href="layout_navbar_fixed.html">Laporan Finger</a></li>
                                                <li><a href="layout_navbar_hideable.html">Laporan Bulanan</a></li>
                                                <li><a href="layout_sidebar_sticky_custom.html">Sticky sidebar (custom scroll)</a></li>
                                                <li><a href="layout_sidebar_sticky_native.html">Sticky sidebar (native scroll)</a></li>
                                                <li><a href="layout_footer_fixed.html">Fixed footer</a></li>
                                                <li><a href="../RTL/index.html">RTL version</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-file-text"></i> UJK 001</a>
                                            <ul>
                                                <li><a href="boxed_full.html">Boxed full width</a></li>
                                                <li><a href="boxed_default.html">Boxed with default sidebar</a></li>
                                                <li><a href="boxed_mini.html">Boxed with mini sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-file-text2"></i> UJK 002</a>
                                            <ul>
                                                <li><a href="../../layout_1/LTR/index.html" id="layout1">Layout 1</a></li>
                                                <li><a href="../../layout_2/LTR/index.html" id="layout2">Layout 2</a></li>
                                                <li><a href="../../layout_3/LTR/index.html" id="layout3">Layout 3</a></li>
                                                <li><a href="index.html" id="layout4">Layout 4 <span class="label bg-warning-400">Current</span></a></li>
                                                <li class="disabled"><a href="../../layout_5/LTR/index.html" id="layout5">Layout 5 <span class="label bg-slate-300">Coming soon</span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-file-text3"></i> UJK 003</a>
                                            <ul>
                                                <li><a href="../../layout_1/LTR/index.html" id="layout1">Layout 1</a></li>
                                                <li><a href="../../layout_2/LTR/index.html" id="layout2">Layout 2</a></li>
                                                <li><a href="../../layout_3/LTR/index.html" id="layout3">Layout 3</a></li>
                                                <li><a href="index.html" id="layout4">Layout 4 <span class="label bg-warning-400">Current</span></a></li>
                                                <li class="disabled"><a href="../../layout_5/LTR/index.html" id="layout5">Layout 5 <span class="label bg-slate-300">Coming soon</span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-book3"></i> Raport 004</a>
                                            <ul>
                                                <li><a href="colors_primary.html">Primary palette</a></li>
                                                <li><a href="colors_danger.html">Danger palette</a></li>
                                                <li><a href="colors_success.html">Success palette</a></li>
                                                <li><a href="colors_warning.html">Warning palette</a></li>
                                                <li><a href="colors_info.html">Info palette</a></li>
                                                <li class="divider"></li>
                                                <li><a href="colors_pink.html">Pink palette</a></li>
                                                <li><a href="colors_violet.html">Violet palette</a></li>
                                                <li><a href="colors_purple.html">Purple palette</a></li>
                                                <li><a href="colors_indigo.html">Indigo palette</a></li>
                                                <li><a href="colors_blue.html">Blue palette</a></li>
                                                <li><a href="colors_teal.html">Teal palette</a></li>
                                                <li><a href="colors_green.html">Green palette</a></li>
                                                <li><a href="colors_orange.html">Orange palette</a></li>
                                                <li><a href="colors_brown.html">Brown palette</a></li>
                                                <li><a href="colors_grey.html">Grey palette</a></li>
                                                <li><a href="colors_slate.html">Slate palette</a></li>
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">Invoice</span>
                                    <ul class="menu-list">
                                        <li>
                                            <a href="#"><i class="icon-calculator2"></i> Invoice UJK</a>
                                            <ul>
                                                <li><a href="sidebar_default_collapse.html">Default collapsible</a></li>
                                                <li><a href="sidebar_default_hide.html">Default hideable</a></li>
                                                <li><a href="sidebar_mini_collapse.html">Mini collapsible</a></li>
                                                <li><a href="sidebar_mini_hide.html">Mini hideable</a></li>
                                                <li>
                                                    <a href="#">Dual sidebar</a>
                                                    <ul>
                                                        <li><a href="sidebar_dual.html">Dual sidebar</a></li>
                                                        <li><a href="sidebar_dual_double_collapse.html">Dual double collapse</a></li>
                                                        <li><a href="sidebar_dual_double_hide.html">Dual double hide</a></li>
                                                        <li><a href="sidebar_dual_swap.html">Swap sidebars</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Double sidebar</a>
                                                    <ul>
                                                        <li><a href="sidebar_double_collapse.html">Collapse main sidebar</a></li>
                                                        <li><a href="sidebar_double_hide.html">Hide main sidebar</a></li>
                                                        <li><a href="sidebar_double_fix_default.html">Fix default width</a></li>
                                                        <li><a href="sidebar_double_fix_mini.html">Fix mini width</a></li>
                                                        <li><a href="sidebar_double_visible.html">Opposite sidebar visible</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="sidebar_categories.html">Separate categories</a></li>
                                                <li><a href="sidebar_hidden.html">Hidden sidebar</a></li>
                                                <li><a href="sidebar_dark.html">Dark sidebar</a></li>
                                                <li><a href="sidebar_components.html">Sidebar components</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-sort"></i> Biaya Pelatihan UJK</a>
                                            <ul>
                                                <li><a href="navigation_vertical_collapsible.html">Collapsible menu</a></li>
                                                <li><a href="navigation_vertical_accordion.html">Accordion menu</a></li>
                                                <li><a href="navigation_vertical_sizing.html">Navigation sizing</a></li>
                                                <li><a href="navigation_vertical_bordered.html">Bordered navigation</a></li>
                                                <li><a href="navigation_vertical_right_icons.html">Right icons</a></li>
                                                <li><a href="navigation_vertical_labels_badges.html">Labels and badges</a></li>
                                                <li><a href="navigation_vertical_disabled.html">Disabled navigation links</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-transmission"></i> Resi Pembayaran</a>
                                            <ul>
                                                <li><a href="navigation_horizontal_click.html">Submenu on click</a></li>
                                                <li><a href="navigation_horizontal_hover.html">Submenu on hover</a></li>
                                                <li><a href="navigation_horizontal_elements.html">With custom elements</a></li>
                                                <li><a href="navigation_horizontal_tabs.html">Tabbed navigation</a></li>
                                                <li><a href="navigation_horizontal_disabled.html">Disabled navigation links</a></li>
                                                <li><a href="navigation_horizontal_mega.html">Horizontal mega menu</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-magazine"></i> Resi Apresiasi PKL</a>
                                            <ul>
                                                <li><a href="navbar_single.html">Single navbar</a></li>
                                                <li>
                                                    <a href="#">Multiple navbars</a>
                                                    <ul>
                                                        <li><a href="navbar_multiple_navbar_navbar.html">Navbar + navbar</a></li>
                                                        <li><a href="navbar_multiple_header_navbar.html">Header + navbar</a></li>
                                                        <li><a href="navbar_multiple_navbar_content.html">Navbar + content</a></li>
                                                        <li><a href="navbar_multiple_top_bottom.html">Top + bottom</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="navbar_colors.html">Color options</a></li>
                                                <li><a href="navbar_sizes.html">Sizing options</a></li>
                                                <li><a href="navbar_hideable.html">Hide on scroll</a></li>
                                                <li><a href="navbar_components.html">Navbar components</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">Setting Data</span>
                                    <ul class="menu-list">
                                         <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/pemilik_tki'; ?>'><i class="icon-graph"></i> Pemilik TKI</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/jenis_kelamin'; ?>'><i class="icon-man-woman"></i> Jenis Kelamin</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/jenis_ujian'; ?>'><i class="icon-files-empty"></i> Jenis Ujian</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/cluster'; ?>'><i class="icon-profile"></i> Cluster / Profesi</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/negara_tujuan'; ?>'><i class="icon-city"></i> Negara Tujuan</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/eks_non'; ?>'><i class="icon-users2"></i> Eks / Non</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/bahasa'; ?>'><i class="icon-earth"></i> Bahasa</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/hasil_ujk'; ?>'><i class="icon-newspaper2"></i> Hasil UJK</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/lembaga_lsp'; ?>'><i class="icon-home5"></i>Lembaga LSP</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_adm_blk/tempat_pkl'; ?>'><i class="icon-home5"></i>Tempat PKL</a>
                                        </li>
                                       <li>
                                            <a href='<?php echo site_url().'/setting_pembinaan_tki_inf/instruktur'; ?>'><i class="icon-reading"></i> Instruktur</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_pembinaan_tki_inf/marketing'; ?>'><i class="icon-coin-dollar"></i> Marketing</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_pembinaan_tki_inf/adm_kantor'; ?>'><i class="icon-user-tie"></i> ADM Kantor</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_pembinaan_tki_inf/ranjang'; ?>'><i class="icon-bed2"></i> Ranjang</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_pembinaan_tki_inf/jenis_kb'; ?>'><i class="icon-theater"></i> Jenis KB</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo site_url().'/setting_pembinaan_tki_inf/izin_keperluan'; ?>'><i class="icon-file-check"></i> Izin Keperluan</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </li>               
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <i class="icon-history position-left"></i>
                        <span class="label label-inline position-right bg-success-400">1.2.1</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /second navbar -->

   <?php 
                        $this->load->view($namamodule.'/'.$namafileview);
                    ?>


</body>
</html>

<script type="text/javascript">
$('#Shipper').change(function() {
    selectedOption = $('option:selected', this);
    $("#pemilik").val(selectedOption.data('pemilikid')).change();
    $("#jeniskelamin").val(selectedOption.data('jeniskelaminss')).change();
    $("#negara").val(selectedOption.data('negara')).change();
    $('input[name=nama]').val( selectedOption.data('nama') );
    $('input[name=sponsor]').val( selectedOption.data('sponsor') );
    $('input[name=nodisnaker]').val( selectedOption.data('nodisnaker') );
    $('input[name=notki]').val( selectedOption.data('idbio') );
    $('input[name=tempatlahir]').val( selectedOption.data('tempatlahir') );
    $('input[name=tanggalnyas]').val( selectedOption.data('tanggallahirs') );
    $('input[name=alamat]').val( selectedOption.data('alamat') );
    $('input[name=notelp]').val( selectedOption.data('notelp') );
    $('input[name=pendidikan]').val( selectedOption.data('pendidikan') );
    $('input[name=noktp]').val( selectedOption.data('noktp') );
    $('input[name=nopaspor]').val( selectedOption.data('paspor') );
});
</script>


<script type="text/javascript">
jQuery(document).ready(function ($) {
        var $total = $('#total'),
            $value = $('.value');
        $value.on('input', function (e) {
            var total = 0;
            $value.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10))) total = total + parseInt(this.value, 10);
            });
            $total.val(total);
        });
    });

 function recalculateSum()
    {
        var num1 = parseInt(document.getElementById("lam").value);
        var num2 = parseInt(document.getElementById("tot").value);
        document.getElementById("total2").value = num1 + num2;
    }

     function recalculateSum2()
    {
        var num1 = parseInt(document.getElementById("lam2").value);
        var num2 = parseInt(document.getElementById("tot2").value);
        document.getElementById("total3").value = num1 + num2;
    }

        function recalculateSum3()
    {
        var num1 = parseInt(document.getElementById("lam3").value);
        var num2 = parseInt(document.getElementById("tot3").value);
        document.getElementById("total4").value = num1 + num2;
    }


$('#tambah').on('show.bs.modal', function (event) {
    var btn = document.getElementById("laundry_tgl"); 
    btn.onclick = function() {
        document.getElementById("input_tgl").value = "<?php echo date("Y-m-d") ?>";
    }
});
    
$('#Shipper').change(function() {
    selectedOption = $('option:selected', this);
    $("#pemilik").val(selectedOption.data('pemilikid')).change();
    $("#jeniskelamin").val(selectedOption.data('jeniskelaminss')).change();
    $("#negara").val(selectedOption.data('negara')).change();
    $('input[name=nama]').val( selectedOption.data('nama') );
    $('input[name=sponsor]').val( selectedOption.data('sponsor') );
    $('input[name=nodisnaker]').val( selectedOption.data('nodisnaker') );
    $('input[name=notki]').val( selectedOption.data('idbio') );
    $('input[name=tempatlahir]').val( selectedOption.data('tempatlahir') );
    $('input[name=tanggalnyas]').val( selectedOption.data('tanggallahirs') );
    $('input[name=alamat]').val( selectedOption.data('alamat') );
    $('input[name=notelp]').val( selectedOption.data('notelp') );
    $('input[name=pendidikan]').val( selectedOption.data('pendidikan') );
    $('input[name=noktp]').val( selectedOption.data('noktp') );
    $('input[name=nopaspor]').val( selectedOption.data('paspor') );
});
$('#tambah').on('show.bs.modal', function (event) {
    var button   = $(event.relatedTarget);
    var id       = button.data('id');
    var minggu    = button.data('minggu');
    var nodaftar    = button.data('nodaftar');
    var row      = button.data('row');
    var nilai    = button.data('nilai');
    var penilai    = button.data('penilai');
    var keterangan      = button.data('keterangan');
    
    var modal = $(this);
    modal.find('.tambah_nilai_id').val(id);
    modal.find('.tambah_nilai_minggu').val(minggu);
    modal.find('.tambah_nilai_nodaftar').val(nodaftar);
    modal.find('.tambah_nilai_row').val(row);
});
$('#edit').on('show.bs.modal', function (event) {
    var button   = $(event.relatedTarget);
    var id       = button.data('id');
    var minggu    = button.data('minggu');
    var nodaftar    = button.data('nodaftar');
    var row      = button.data('row');
    var nilai    = button.data('nilai');
    var penilai    = button.data('penilai');
    var keterangan      = button.data('keterangan');
    
    var modal = $(this);
    modal.find('.edit_nilai_id').val(id);
    modal.find('.edit_nilai_minggu').val(minggu);
    modal.find('.edit_nilai_nodaftar').val(nodaftar);
    modal.find('.edit_nilai_row').val(row);
    modal.find('.edit_nilai').val(nilai);
    modal.find('.edit_penilai').val(penilai);
    modal.find('.edit_keterangan').val(keterangan);
});
$('#tatagraha_ubah').on('show.bs.modal', function (event) {
    var button      = $(event.relatedTarget);
    var id          = button.data('id');
    var sesi        = button.data('sesi');
    var gl          = button.data('gl');
    var nodaftar    = button.data('nodaftar');
    var row         = button.data('row');
    var tgl         = button.data('tgl');
    var nilai_t     = button.data('nilaitulis');
    var nilai_p     = button.data('nilaipraktik');
    var penilai     = button.data('penilai');
    var keterangan  = button.data('keterangan');
    
    var modal = $(this);
    modal.find('.tatagraha_id').val(id);
    modal.find('.tatagraha_sesi').val(sesi);
    modal.find('.tatagraha_gl').val(gl);
    modal.find('.tatagraha_nodaftar').val(nodaftar);
    modal.find('.tatagraha_row').val(row);
    modal.find('.tatagraha_tgl').val(tgl);
    modal.find('.tatagraha_nilai_tulis').val(nilai_t);
    modal.find('.tatagraha_nilai_praktik').val(nilai_p);
    modal.find('.tatagraha_penilai').val(penilai);
    modal.find('.tatagraha_keterangan').val(keterangan);
});
</script>

