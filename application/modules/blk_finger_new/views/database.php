
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
										<h5 class="panel-title">DATABASE FINGERSPOT</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">

													<div class="row">
														<div class="col-lg-12">
															<button class="btn btn-xs bg-teal btn_tambah">TAMBAH</button>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-12">
															<div class="table-responsive">
					                                            <table class="table table-bordered table-striped" id="t1">
					                                            	<thead>
					                                            		<tr>
					                                            			<td>ID</td>
						                                            		<td>NAMA</td>
						                                            		<td>HAPUS</td>
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


<div class="modal fade" id="tambah-data" tabindex="-2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">TAMBAH</h5>
            </div>
            <form method="POST" action="<?php echo site_url('blk_finger_new/database_simpan/') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                                <select class="select-results-color" name="datatki[]" multiple="multiple" >
                                    <?php 
                                        foreach ($tampil_data_tki  as $row) {
                                    ?>
                                            <option value="<?php echo $row->nodaftar.' .-. '.$row->nama ?>"><?php echo $row->nodaftar.' - '.$row->nama ?></option>
                                    <?php        
                                        }
                                    ?>
                                </select>	
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function dd()
    {
        $.ajax({
            url             : "<?php echo site_url('blk_finger_new/database_get/') ?>",
            success: function(data) 
            {
                $('#t1 > tbody').html( data );
            }
        });
    }
	$(function() {
        dd();

        $(document).on("click",".btn_tambah",function() {
            $('#tambah-data').modal('show');
        });

        $(document).on("click",".btn_hapus",function() {
            var id = $(this).data('id');
            swal({
                title: "Apakah Yakin?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: "<?php echo site_url('blk_finger_new/database_hapus/') ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function () {
                        dd();
                        swal("Done!", "It was succesfully deleted!", "success");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            });
        });

	});
	
</script>

