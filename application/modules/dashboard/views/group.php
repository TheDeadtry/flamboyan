  
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> Dashboard Agen </span></h2>
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
                         Welcome <span class="text-semibold"><u>Agen</u></span> PT Flamboyan Gema Jasa
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                
								<!-- Basic column chart -->
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"></h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
										<div class="table-responsive">
											<div class="chart-container">
												<div class="chart has-fixed-height" id="basic_columns"></div>
											</div>
										</div>
									</div>
								</div>
								<!-- /basic column chart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	
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
            'echarts/chart/bar',
            'echarts/chart/line'
        ],

        function (ec, limitless) {

            var basic_columns = ec.init(document.getElementById('basic_columns'), limitless);

            basic_columns_options = {

                // Setup grid
                grid: {
                    x: 80,
                    y: 35
                },

                // Add tooltip
                tooltip: {
                    trigger: 'axis'
                },

                // Add legend
                legend: {
                    data: ['還沒入境 – BELUM KE TAIWAN','已經入境 – SUDAH KE TAIWAN']
                },

                // Enable drag recalculate
                calculable: false,

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    data: ['FF', 'FI', 'MF', 'MI', 'JP']
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value'
                }],

                // Add series
                series: [
                    {
                        name: '還沒入境 – BELUM KE TAIWAN',
                        type: 'bar',
                        data: [<?php echo $chart1 ?>],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true,
                                    textStyle: {
                                        fontWeight: 500
                                    }
                                }
                            }
                        }
                    },
                    {
                        name: '已經入境 – SUDAH KE TAIWAN',
                        type: 'bar',
                        data: [<?php echo $chart2 ?>],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true,
                                    textStyle: {
                                        fontWeight: 500
                                    }
                                }
                            }
                        }
                    }
                ]
            };

            basic_columns.setOption(basic_columns_options);

            window.onresize = function () {
                setTimeout(function () {
                    basic_columns.resize();
                }, 200);
            }
        }
    );
</script>