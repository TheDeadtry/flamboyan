
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Majikan</span></h2>
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
                            <a class='btn btn-warning btn-large' data-toggle='modal' href='#tambaha' role='button'>Tambah Data</a>
                            <a onClick="window.close()" class='btn btn-warning' type="button">Kembali</a>
                            <h5 class="panel-title text-center ">DATA SUHAN <br> </h5><br/>
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
                                        <th>Majikan</th>
                                        <th>tgl terbit</th>
                                        <th>tgl exp</th>
                                        <th>AGEN</th>
                                    </tr>
                                </thead>
                                <tbody>        

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

            <div class='modal fade' id='tambaha' role='dialog' tabindex='-2'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class='modal-header bg-primary'>
                            <button class='close' data-dismiss='modal' type='button'>&times;</button>
                            <h3>Tambah Data Marketing Awal</h3>
                        </div>
                        <form action="<?php echo site_url('new_majikans/simpan_data_suhandata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <div class='modal-body'>
                                <input type="hidden" class="form-control" name="kodemajikan" value="<?php echo $kodemajikan; ?>">
                                <input type="hidden" class="form-control" name="group" value="<?php echo $kodegroup; ?>">
                                <input type="hidden" class="form-control" name="kode_agen" value="<?php echo $kodeagen; ?>">

                                <div class="form-group ">
                                    <label class="control-label">No Suhan </label>
                                    <div class="controls">
                                        <input type="text" name="no" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tgl Terbit</label>
                                    <div class="controls">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglterbit"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tgl Expired </label>
                                    <div class="controls">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglexp"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                                             <!--   <div class="control-group">
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
 -->
                                                           <!--  <div class="control-group">
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
 -->
                                                          <!--   <div class="control-group">
                                                                <label class="control-label">Tgl Minta </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglminta"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div> -->

                                                        <!--      <div class="control-group">
                                            <label class="control-label">Quota </label>
                                            <div class="controls">
                                                <input type="text" name="quota" class="span4 popovers"/>
                                            </div>
                                        </div> -->
                                <div class="form-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <input type="file" class="form-control" name="filenya" />
                                    </div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button class='btn btn-danger' data-dismiss='modal'>Close</button>
                                <button class='btn btn-primary'>Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        scrollY: true,
                        "searchable": false,
                        fixedColumns: {
                            leftColumns: 0,
                            rightColumns: 0
                        },
                        processing: true,
                        bFilter: true,
                        "lengthChange": false,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('new_majikans/show_suhan/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup) ?>",
                            "type"      : "POST"
                        }
                    });
                </script>