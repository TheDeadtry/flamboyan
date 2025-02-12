
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Visa Permit </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <button class="btn btn-lg btn-primary" data-toggle='modal' data-target='#tambaha' role='button'>TAMBAH DATA</button>
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('pdf9/cetakvisapermit/'); ?>">Print Data Visa Permit</a>
                            <h5 class="panel-title text-center ">Data Visa Permit <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>  
                                        <th></th>  
                                        <th>File</th>
                                        <th>No Suhan</th>
                                        <th>No Visa Permit</th>
                                        <th>Nama Group</th>
                                        <th>Nama Agen</th>
                                        <th>Nama Majikan</th>
                                        <th>tgl terbit</th>
                                        <th>tgl exp</th>
                                    </tr>
                                </thead>
                                <tbody>        

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class='modal fade' id='tambaha' role='dialog' tabindex='-2'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class='modal-header bg-primary'>
                            <button class='close' data-dismiss='modal' type='button'>&times;</button>
                            <h3>Tambah Data Visa Permit </h3>
                        </div>
                        <form action="<?php echo site_url('new_visapermit/simpan_data_visapermit');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <div class='modal-body'>
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Pilih Group </label>
                                    <div class="col-sm-9">
                                        <?php   echo form_dropdown("group",$option_group,"","id='group_id4' class='form-control'"); ?>
                                        <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>
                                    </div>
                                </div>

                                <div class="form-group" id="jelasin_agen">
                                    <label class="control-label col-sm-3">Pilih Agen </label>
                                    <div class="col-sm-9">
                                        <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled class="form-control"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">No Visa Permit </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Terbit</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglterbit"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Expired </label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglexp"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">File Upload</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="filenya" />
                                    </div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button class='btn' data-dismiss='modal'>Close</button>
                                <button class='btn btn-primary'>Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    

                                      

                                     <!--    <div class="control-group">
                                            <label class="control-label">Pilih Majikan </label>
                                            <div class="controls">
                                                <select class="chosen" data-placeholder="Choose a Category" tabindex="1" name="majikan">
                                                    <option value="" />Select...
                                                    <?php foreach($tampil_data_majikan as $row) { ?>
                                                    <option value="<?php echo $row->id_majikan; ?>"/><?php echo $row->nama; ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div> -->
                                                            </div>
<!-- 
                                                               <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Tgl Simpan </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglsimpan"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tgl Bawa </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglbawa"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglminta"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                             <div class="control-group">
                                            <label class="control-label">Quota </label>
                                            <div class="controls">
                                                <input type="text" name="quota" class="span10 popovers"/>
                                            </div>
                                        </div> -->


                            </div>
        </div>
                            </div>

        </div>
    </div>
</div>

                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        scrollY: "400px",
                        processing: true,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('new_visapermit/show_visapermit') ?>",
                            "type"      : "POST"
                        }
                    });
                </script>
