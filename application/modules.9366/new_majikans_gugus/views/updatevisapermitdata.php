
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Update Visa Permit </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info panel-bordered">

                        <div class="panel-heading">
                            <!-- <a target="_blank" href="<?php echo site_url('pdf9/cetakvisapermit/'); ?>" class="btn btn-large btn-primary" type="button">Print Data VisaPermit</a> -->
                            <a href="<?php echo site_url('new_majikans/tampildatavisapermit/'.$idsuhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup) ?>" class='btn btn-warning' type="button">Kembali</a>
                            <h5 class="panel-title text-center ">Update Visa Permit<br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form action="<?php echo site_url('new_majikans/update_data_visapermitdata/'.$row->id_visapermit.'/'.$idsuhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                <input type="hidden" class="form-control" name="id_visapermit" value="<?php echo $row->id_visapermit; ?>">
                                <input type="hidden" class="form-control" name="idsuhan" value="<?php echo $idsuhan; ?>">
                                <input type="hidden" class="form-control" name="kodemajikan" value="<?php echo $kodemajikan; ?>">
                                <input type="hidden" class="form-control" name="kode_agen" value="<?php echo $kodeagen; ?>">
                                <input type="hidden" class="form-control" name="group" value="<?php echo $kodegroup; ?>">

                                <div class="form-group">
                                    <label class="control-label col-sm-3">No Visa Permit </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no" class="form-control" value="<?php echo $row->no_visapermit; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Terbit</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglterbit"  value="<?php echo $row->tglterbitvs; ?>"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Expired </label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglexp" value="<?php echo $row->tglexpvs; ?>" />
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <!--   <div class="control-group">
                                    <label class="control-label">Tgl Terima </label>
                                    <div class="controls">
                                            <div class='datepicker input-append' id='datepicker'>
                                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterimavs; ?>"/>
                                    <span class='add-on'>
                                      <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                    </span>
                                            </div>
                                </div>
                                </div>
                               

                                <div class="control-group">
                                    <label class="control-label">Tgl Minta </label>
                                    <div class="controls">
                                            <div class='datepicker input-append' id='datepicker'>
                                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglminta"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglmintavs; ?>"/>
                                    <span class='add-on'>
                                      <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                    </span>
                                            </div>
                                </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Quota </label>
                                    <div class="controls">
                                        <input type="text" name="quota" class="span10 popovers" value="<?php echo $row->quotavs; ?>"/>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3">File Upload</label>
                                    <div class="col-sm-9">
                                        <div class="thumbnail">
                                            <img max-width="250px" max-height="250px" src="<?php echo base_url() ?>/assets/dokvisapermit/<?php echo $row->filevisapermit ?>" alt="KOSONG">
                                            <div class="caption">
                                                <input type="file" class="default" value="<?php echo $row->filevisapermit; ?>" name="gambarnya" />
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions text-center">
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