
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12">

                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                
								<div class="panel">
									<div class="panel-heading bg-teal">
										<h5 class="panel-title">UPLOAD DATA ATTENDANCE TKI</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">

													<div class="row">
														<div class="col-lg-12">
															<button class="btn btn-xs bg-teal uploadform_btn">Upload</button>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-12">
															<div class="table-responsive">
					                                            <table class="table table-bordered table-striped" id="dkrh">
					                                            	<thead>
					                                            		<tr>
					                                            			<td>No</td>
						                                            		<td>Timestamp</td>
						                                            		<td>Excel Original</td>
						                                            		<td># </td>
						                                            		<td> </td>
						                                            		<td> </td>
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
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

	<div class="modal fade" id="upload_modal" tabindex="-2" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="upload_form" method="post" action="<?php echo site_url('blk_finger_new/show_after_upload') ?>" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">UPLOAD</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="file" class="form-control" name="userfile" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary upload_btn2">Upload</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title"></h4>
        </div>
        <div id="modalBody" class="modal-body"> </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
	$(function() {
		$('#dkrh').dataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax:{
                "url"       : "<?php echo site_url('blk_finger_new/show_index') ?>",
                "type"      : "POST"
            }
        });

        $('.uploadform_btn').click(function() {
            $('#upload_modal').modal('show');
        });

		$('#upload_form').find('.upload_btn').click(function(e) {

            e.preventDefault();
            //alert($("input[name=upload_input]").val());
            var file_data = $("input[name=upload_input]").prop("files")[0];

            var form_data = new FormData();                  
            form_data.append('file', file_data );    

            $.ajax({
                url             : "<?php echo site_url('blk_finger_new/show_after_upload/') ?>",
                type            : "POST",
                
                cache           : false,
                contentType     : false,
                processData     : false,
                data            : form_data,
                success: function(data) 
                {
                    if (!data.success) 
                    {
                        swal({
                            title: "Oops...",
                            text: (data.message)+" !",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } 
                    else 
                    {
                        $('#upload_modal').modal('hide');
                        $('#dkrh').DataTable().ajax.reload();
                        swal({
                            title: "Sukses ditambah!",
                            text: (data.message),
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                    }
                }
            });
        });

	});
	
</script>

