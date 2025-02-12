<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Update Suhan </span>
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
                    <li class='active'>Update Suhan </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

               <div class="row-fluid">
                            <div class='span5 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Majikan</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
     <form action="<?php echo site_url('majikans/update_suhan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="hidden" class="form-control" name="id_suhan" value="<?php echo $row->id_suhan; ?>">

                                        <div class="control-group">
                                            <label class="control-label">No Suhan </label>
                                            <div class="controls">
                                                <input type="text" name="no" class="span10 popovers" value="<?php echo $row->no_suhan; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                                                <label class="control-label">Tgl Terbit</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbit"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterbit; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                  <div class="control-group">
                                                                <label class="control-label">Tgl Expired </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglexp"  placeholder='Select datepicker' type='text'value="<?php echo $row->tglexp; ?>" />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                               <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima; ?>"/>
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
                                        </div>
 <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/doksuhan/<?php echo "".$row->filesuhan?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" value="<?php echo $row->filesuhan; ?>" name="gambarnya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
                                </div>

<div class="form-actions">
                                            <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <a href="<?php echo site_url('majikans/suhan'); ?>" class="btn red btn-medium">Batal</a>
                                        </div>
                                    </form>
                        </div>
                    </div>