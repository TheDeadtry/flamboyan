
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Update Suhan </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <a href="<?php echo site_url('new_majikans/tampildatasuhan/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup) ?>" class='btn btn-info btn-large' >Kembali</a>
                            <h5 class="panel-title text-center ">Data Majikan <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form action="<?php echo site_url('new_majikans/update_data_suhandata/'.$idnya.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                <input type="hidden" class="form-control" name="id_suhan" value="<?php echo $row->id_suhan; ?>">

                                <input type="hidden" class="form-control" name="kodemajikan" value="<?php echo $kodemajikan; ?>">
                                <input type="hidden" class="form-control" name="kode_agen" value="<?php echo $kodeagen; ?>">
                                <input type="hidden" class="form-control" name="group" value="<?php echo $kodegroup; ?>">

                                <div class="form-group">
                                    <label class="control-label col-sm-3">No Suhan </label>
                                    <div class="controls col-sm-9">
                                        <input type="text" name="no" class="form-control" value="<?php echo $row->no_suhan; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Terbit</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglterbit" value="<?php echo $row->tglterbit; ?>"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Expired </label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglexp" value="<?php echo $row->tglexp; ?>"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                                           <!--     <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div> -->
                                                            
<!-- 
                                                            <div class="control-group">
                                                                <label class="control-label">Tgl Minta </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglminta"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglminta; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                            <label class="control-label">Quota </label>
                                            <div class="controls">
                                                <input type="text" name="quota" class="span10 popovers" value="<?php echo $row->quotasuhan; ?>"/>
                                            </div>
                                        </div> -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3">File Upload</label>
                                    <div class="col-sm-9">
                                        <div class="thumbnail">
                                            <img max-width="250px" max-height="250px" src="<?php echo base_url() ?>/assets/doksuhan/<?php echo $row->filesuhan ?>" alt="KOSONG">
                                            <div class="caption">
                                                <input type="file" class="default" value="<?php echo $row->filesuhan; ?>" name="gambarnya" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions text-right">
                                    <?php echo form_submit('submit', 'Update', "class = 'btn btn-primary'"); ?>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>