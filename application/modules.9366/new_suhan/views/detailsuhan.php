

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Suhan </span></h2>
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
                            <a class="btn btn-lg bg-teal-400" href="<?php echo site_url('pdf9/cetaksuhan/'); ?>">PRINT DATA SUHAN (SEMUA)</a>
                            <a class="btn btn-lg bg-indigo-400" href="<?php echo site_url('new_suhan/kontroldata/'); ?>">PRINT KONTROL DATA</a>
                            <a class="btn btn-lg bg-blue-400" href="<?php echo site_url('new_suhan/listdata/'); ?>">PRINT LIST DATA</a>
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
                                            

<!--
            <div class='modal hide fade' id='editsuhan<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah Data SUhan</h3>
                </div> 
                <form action="<?php echo site_url('majikans/update_suhan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id_suhan" value="<?php echo $row->id_suhan; ?>">
                            <div class="control-group">
                                <label class="control-label">Pilih Majikan </label>
                                <div class="controls">
                                    <select class="chosen" data-placeholder="Choose a Category" tabindex="1" name="majikan">
                                        <option value="<?php echo $row->id_majikan; ?>" /><?php echo $row->nama; ?>
                                        <?php foreach($tampil_data_majikan as $row2) { ?>
                                        <option value="<?php echo $row2->id_majikan; ?>"/><?php echo $row2->nama; ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
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
                                <label class="control-label">File Upload</label>
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/doksuhan/<?php echo "".$row->filesuhan?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" value="<?php echo $row->filesuhan; ?>" name="gambarnya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                    </div>
                                    <span class="label label-important">NOTE!</span>
                                    <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                </div>
                            </div>


                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>


 <div class="modal fade" id="hapussuhan<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/hapus_suhan'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data SUHAN</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_suhan" value="<?php echo  $row->id_suhan; ?>">
                            <input type="text" class="form-control" name="file" value="<?php echo $row->filesuhan; ?>">
                              <p>Apakah anda yakin akan menghapus data SUHAN ini? : <?php echo  $row->id_suhan; ?></p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>







                                        </tbody>
                                 </table>    
                        </div>
                     </div>
                 </div>
             </div>
 </div>
</br>-->
            <div class='modal fade' id='tambaha' role='dialog' tabindex='-2'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class='modal-header bg-primary'>
                            <button class='close' data-dismiss='modal' type='button'>&times;</button>
                            <h3>Tambah Data Marketing Awal</h3>
                        </div>
                        <form action="<?php echo site_url('new_suhan/simpan_data_suhan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <div class='modal-body'>
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Pilih Group </label>
                                    <div class="col-sm-9">
                                        <?php   echo form_dropdown("group",$option_group,"","id='group_id3' class='form-control'"); ?>
                                        <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>
                                    </div>
                                </div>
                                <div class="form-group" id="jelasin_agen">
                                    <label class="control-label col-sm-3">Pilih Agen </label>
                                    <div class="col-sm-9"">
                                        <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled class="form-control"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">No Suhan </label>
                                    <div class="col-sm-9"">
                                        <input type="text" name="no" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Terbit</label>
                                    <div class="col-sm-9"">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglterbit" />
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Expired </label>
                                    <div class="col-sm-9"">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglexp" />
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">File Upload</label>
                                    <div class="col-sm-9"">
                                        <input type="file" class="default" name="filenya" />
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




                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        scrollY: "400px",
                        processing: true,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('new_suhan/show_suhan') ?>",
                            "type"      : "POST"
                        }
                    });
        $("#group_id3").change(function(){
            var kode_group = {kode_group:$("#group_id3").val()};
            document.getElementById("load").style.display = "block";  // show the loading message.
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('new_suhan/select_agenlist3')?>",
                data: kode_group,
                success: function(msg) {
                $('#jelasin_agen').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            });
        });
                </script>
