                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Dashboard <small>statistics and more</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
                            <li class="pull-right search-wrap">
                                <form class="hidden-phone" />
                                <div class="search-input-area">
                                    <input id=" " class="search-query" type="text" placeholder="Search" /><i class="icon-search"></i></div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>
                    <div class="row-fluid circle-state-overview">
                        <div class="span2 responsive clearfix" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle turquoise-color"><i class="icon-user"></i></div>
                                <p><strong><?php echo $hitung_data_mf;?></strong> Male Formal </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle red-color"><i class="icon-user"></i></div>
                                <p><strong><?php echo $hitung_data_mi;?></strong> Male Informal </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle green-color"><i class="icon-user"></i></div>
                                <p><strong><?php echo $hitung_data_ff;?></strong> Female Formal </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle gray-color"><i class="icon-user"></i></div>
                                <p><strong><?php echo $hitung_data_fi;?></strong> Female Informal </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle purple-color"><i class="icon-user-md"></i></div>
                                <p><strong><?php echo $hitung_data_jp;?></strong> Panti Jompo </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle blue-color"><i class="icon-plane"></i></div>
                                <p><strong>0</strong> Penerbangan </p>
                            </div>
                        </div>
                    </div>
					<div class="row-fluid">
                         <div class="span6">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Real Time Chart</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">
                                    <div class="btn-toolbar no-bottom-space clearfix" style="height: 50px">
                                        <div data-toggle="buttons-radio" class="btn-group">
                                            <button class="btn btn-mini">Web</button>
                                            <button class="btn btn-mini">Database</button>
                                            <button class="btn btn-mini">Static</button>
                                        </div>
                                    </div>
                                    <div id="chart_4" class="chart"></div>
                                    <div class="btn-toolbar no-bottom-space clearfix">
                                        <div data-toggle="buttons-radio" class="btn-group pull-right">
                                            <button class="btn btn-mini active">Asia</button>
                                            <button class="btn btn-mini"><span class="visible-phone">Eur</span><span class="hidden-phone">Europe</span></button>
                                            <button class="btn btn-mini">USA</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>