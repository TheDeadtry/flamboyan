
<style type="text/css">
    .accordion:hover .accordion-item:hover .accordion-item-content,
    .accordion .accordion-item--default .accordion-item-content {
        height: 100%;
    }

    .accordion-item-content,
    .accordion:hover .accordion-item-content {
        height: 0;
        overflow: hidden;
    }

    .accordion {
        padding: 0;
        margin: 0 auto;
        width: 100%;
        font-family: "PT Sans" sans-serif;
    }

    .accordion .accordion-item {
        background-image: linear-gradient(90deg, #eee, #f5f5f5, #eee);
        border-bottom: 1px solid #666;
        color: #000;
    }

    .accordion .accordion-item-header {
        padding: 1em;
    }
/*
    .accordion .accordion-item-content {
        background-color: #fff;
        padding: 1em;
    }*/
</style>
            
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> Dashboard Admin </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12">

                    <div class="alert bg-info alert-styled-left">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                         Welcome <span class="text-semibold">admin</span> PT Flamboyan Gema Jasa
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4 col-xs-6">

                            <!-- Members online -->
                            <div class="panel bg-indigo-700">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>

                                    <h3 class="no-margin"><?php echo $hitung_data_mf; ?></h3>
                                    Male Formal
                                    <div class="text-muted text-size-small">Terbang <?php echo $hitung_data_mf_terbang; ?></div>
                                    <div class="text-muted text-size-small">MD <?php echo $hitung_data_mf_md; ?></div>
                                </div>

                                <div class="container-fluid">
                                    <div id="members-online"></div>
                                </div>
                            </div>
                           
                        </div>

                        <div class="col-lg-2 col-sm-4 col-xs-6">

                            <!-- Current server load -->
                            <div class="panel bg-teal-700">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                         <ul class="icons-list">
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>

                                    <h3 class="no-margin"><?php echo $hitung_data_mi; ?></h3>
                                    Male Informal
                                    <div class="text-muted text-size-small">Terbang <?php echo $hitung_data_mi_terbang; ?></div>
                                    <div class="text-muted text-size-small">MD <?php echo $hitung_data_mi_md; ?></div>
                                </div>

                                <div id="server-load"></div>
                            </div>
                            <!-- /current server load -->

                        </div>

                        <div class="col-lg-2 col-sm-4 col-xs-6">

                            <!-- Today's revenue -->
                            <div class="panel bg-brown-700">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>

                                    <h3 class="no-margin"><?php echo $hitung_data_ff; ?></h3>
                                    Female Formal
                                    <div class="text-muted text-size-small">Terbang <?php echo $hitung_data_ff_terbang; ?></div>
                                    <div class="text-muted text-size-small">MD <?php echo $hitung_data_ff_md; ?></div>
                                </div>

                                <div id="today-revenue"></div>
                            </div>
                            <!-- /today's revenue -->

                        </div>
                        
                        <div class="col-lg-2 col-sm-4 col-xs-6">

                            <!-- Current server load -->
                            <div class="panel bg-pink-700">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>

                                    <h3 class="no-margin"><?php echo $hitung_data_fi; ?></h3>
                                    Female Informal
                                    <div class="text-muted text-size-small">Terbang <?php echo $hitung_data_fi_terbang; ?></div>
                                    <div class="text-muted text-size-small">MD <?php echo $hitung_data_fi_md; ?></div>
                                </div>

                            <div id="server-load"></div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-4 col-xs-6">

                            <!-- Current server load -->
                            <div class="panel bg-blue-700">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>

                                    <h3 class="no-margin"><?php echo $hitung_data_jp; ?></h3>
                                    Panti Jompo
                                    <div class="text-muted text-size-small">Terbang <?php echo $hitung_data_jp_terbang; ?></div>
                                    <div class="text-muted text-size-small">MD <?php echo $hitung_data_jp_md; ?></div>
                                </div>

                            <div id="server-load"></div>
                            </div>
                        </div>
                            <!-- /current server load -->

                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="accordion">
                                    <section class="accordion-item accordion-item--default">
                                        <div class="accordion-item-header bg-danger-800">
                                            <h5 class="panel-title">Persentase Data TKI Keseluruhan</h5>
                                        </div>

                                        <div class="accordion-item-content">
                                            <div class="chart-container has-scroll">
                                                <div class="chart has-fixed-height has-minimum-width" id="basic_pie"></div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="accordion-item">
                                        <div class="accordion-item-header bg-primary-800">
                                            <h5 class="panel-title">Data Majikan Terbaru</h5>
                                        </div>

                                        <div class="accordion-item-content">
                                            <table class="table table-bordered" id="vindexsz">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>#</td>
                                                        <td>ID TKI</td>
                                                        <td>Nama TKI</td>
                                                        <td>Nama Majikan</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                    <section  class="accordion-item">
                                        <div class="accordion-item-header bg-success-800">
                                            <h5 class="panel-title">Data Passport Terbaru</h5>
                                        </div>

                                        <div class="accordion-item-content">
                                            <table class="table table-bordered" id="vindexsz_p">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>#</td>
                                                        <td>ID</td>
                                                        <td>Nama</td>
                                                        <td>No Paspor</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="accordion">
                                    <section class="accordion-item accordion-item--default">
                                        <div class="accordion-item-header bg-orange-800">
                                            <h5 class="panel-title">Persentase Data TKI per Sponsor</h5>
                                        </div>

                                        <div class="accordion-item-content">
                                            <div class="chart-container has-scroll">
                                                <div class="chart has-fixed-height has-minimum-width" id="basic_donut"></div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="accordion-item">
                                        <div class="accordion-item-header bg-teal-800">
                                            <h5 class="panel-title">Data Terbang Terbaru</h5>
                                        </div>
                                        <div class="accordion-item-content">
                                            <table class="table table-bordered" id="vindexsz_t">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>#</td>
                                                        <td>ID</td>
                                                        <td>Nama</td>
                                                        <td>Tgl Terbang</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                    <section class="accordion-item">
                                        <div class="accordion-item-header bg-slate-800">
                                            <h5 class="panel-title">Data MD/UNFIT Terbaru</h5>
                                        </div>

                                        <div class="accordion-item-content">
                                            <table class="table table-bordered" id="vindexsz_m">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>#</td>
                                                        <td>ID</td>
                                                        <td>Nama</td>
                                                        <td>Status</td>
                                                        <td>Tgl MD/UNFIT</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('#vindexsz').dataTable({
        scrollX: true,
        scrollY: "400px",
        ordering: false,
        "searchable": false,
        bFilter: false,
        "lengthChange": false,
        paging: false,
        "bInfo" : false,
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('dashboard/show1') ?>",
            "type"      : "POST"
        }
    });
    $('#vindexsz_t').dataTable({
        scrollX: true,
        scrollY: "400px",
        ordering: false,
        "searchable": false,
        bFilter: false,
        "lengthChange": false,
        paging: false,
        "bInfo" : false,
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('dashboard/show2') ?>",
            "type"      : "POST"
        }
    });
    $('#vindexsz_p').dataTable({
        scrollX: true,
        scrollY: "400px",
        ordering: false,
        "searchable": false,
        bFilter: false,
        "lengthChange": false,
        paging: false,
        "bInfo" : false,
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('dashboard/show3') ?>",
            "type"      : "POST"
        }
    });
    $('#vindexsz_m').dataTable({
        scrollX: true,
        scrollY: "400px",
        ordering: false,
        "searchable": false,
        bFilter: false,
        "lengthChange": false,
        paging: false,
        "bInfo" : false,
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('dashboard/show4') ?>",
            "type"      : "POST"
        }
    });

    require.config({
        paths: {
            echarts: '<?php echo base_url(); ?>assets/blk/assets/js/plugins/visualization/echarts'
        }
    });


    // Configuration
    // ------------------------------

    require(
        [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/pie',
            'echarts/chart/funnel'
        ],

        function (ec, limitless) {


            // Initialize charts
            // ------------------------------

            var basic_pie = ec.init(document.getElementById('basic_pie'), limitless);
            var basic_donut = ec.init(document.getElementById('basic_donut'), limitless);

            basic_pie_options = {

                // Add title
                title: {
                    text: 'Diagram TKI',
                    subtext: '',
                    x: 'center'
                },

                // Add tooltip
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ["Male Formal", "Male Informal", "Female Formal", "Female Informal", "Jompo"]
                },

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: false,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: false,
                            readOnly: true,
                            title: 'View data',
                            lang: ['View chart data', 'Close', 'Update']
                        },
                        magicType: {
                            show: false,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'Restore'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: false,

                // Add series
                series: [{
                    name: 'Data TKI',
                    type: 'pie',
                    radius: '80%',
                    center: ['50%', '57.5%'],
                    data: [
                        {value: <?php echo $hitung_data_mf ?>, name: 'Male Formal'},
                        {value: <?php echo $hitung_data_fi ?>, name: 'Female Informal'},
                        {value: <?php echo $hitung_data_ff ?>, name: 'Female Formal'},
                        {value: <?php echo $hitung_data_jp ?>, name: 'Jompo'},
                        {value: <?php echo $hitung_data_mi ?>, name: 'Male Informal'}
                    ]
                }]
            };


            basic_donut_options = {

                // Add title
                title: {
                    text: 'Diagram Sponsor',
                    subtext: '',
                    x: 'center'
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: []
                },

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: false,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: false,
                            readOnly: false,
                            title: 'View data',
                            lang: ['View chart data', 'Close', 'Update']
                        },
                        magicType: {
                            show: false,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'Restore'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: false,

                // Add series
                series: [
                    {
                        name: 'Browsers',
                        type: 'pie',
                        radius: ['50%', '70%'],
                        center: ['50%', '57.5%'],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true
                                },
                                labelLine: {
                                    show: true
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true,
                                    formatter: '{b}' + '\n\n' + '{c} ({d}%)',
                                    position: 'center',
                                    textStyle: {
                                        fontSize: '17',
                                        fontWeight: '500'
                                    }
                                }
                            }
                        },

                        data: [
                        <?php 
                            for ($nn=0; $nn<count($data_donut); $nn++) {
                                echo $data_donut[$nn];
                            }
                        ?>
                        ]
                    }
                ]
            };

            basic_pie.setOption(basic_pie_options);
            basic_donut.setOption(basic_donut_options);

            window.onresize = function () {
                setTimeout(function (){
                    basic_pie.resize();
                    basic_donut.resize();
                }, 200);
            }
        }
    );
</script>