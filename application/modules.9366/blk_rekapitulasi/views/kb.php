<style>
    #panel-edit{
        display: none;
    }
</style>


    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel">
                            <div class="panel-heading bg-info-700">
                                <h5 class="panel-title">
                                    TAMBAH REKAPITULASI KB
                                </h5>
                            </div>
                            <div class="panel-body">

                                <form id="simpandatatable">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Tanggal start
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="tanggal_start_kb" class="form-control dewdate2" placeholder=" Pilih Tanggal ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Tanggal ending
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="tanggal_ending_kb" class="form-control dewdate2" placeholder=" Pilih Tanggal ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">

                                            </div>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary">simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>

                            </div>
                        </div>

                        <div class="panel" id="panel-edit">
                            <div class="panel-heading bg-info-700">
                                <h5 class="panel-title">
                                    EDIT REKAPITULASI KB
                                </h5>
                            </div>
                            <div class="panel-body">

                                <form id="editdatatable">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Tanggal start
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="id">
                                                <input type="text" name="tanggal_start_kb" class="form-control dewdate2" placeholder=" Pilih Tanggal ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Tanggal ending
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="tanggal_ending_kb" class="form-control dewdate2" placeholder=" Pilih Tanggal ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">

                                            </div>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary">simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading bg-danger">
		                        <h5 class="panel-title">DATA KB</h5>
                            </div>
                            <div class="panel-body">
                                <?= $datatable; ?>

                                <script>
                                //Program a custom submit function for the form
                                $("form#simpandatatable").submit(function(event){
                                
                                //disable the default form submission
                                event.preventDefault();

                                //grab all form data  
                                var formData = new FormData($(this)[0]);

                                $.ajax({
                                url: '<?= site_url()?>/blk_rekapitulasi/tambah_rekapan_kb/',
                                type: 'POST',
                                data: formData,
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function (returndata) {
                                    tableku.ajax.reload();
                                    $("input").val('');
                                }
                                });

                                return false;
                                });


                                $("#tableku tbody").on("click", ".edit",function(){
                                    var dataId = $(this).attr("data-id");
                                    $("#panel-edit").css('display', 'block');
                                    $("#panel-edit input[name=id]").val(dataId);
                                    $.ajax({
                                        url: "<?= site_url() ?>/blk_rekapitulasi/kbeditdata",
                                        method: "post",
                                        dataType: "text",
                                        data:{
                                            id: dataId
                                        },success:function(response){
                                            var parsedata = JSON.parse(response);
                                            $("#panel-edit input[name=tanggal_start_kb]").val(parsedata.tanggal_start_kb);
                                            $("#panel-edit input[name=tanggal_ending_kb]").val(parsedata.tanggal_ending_kb);
                                            $("#panel-edit input[name=tanggal_start_kb]").focus();
                                        }
                                    })
                                })


                                //Program a custom submit function for the form
                                $("form#editdatatable").submit(function(event){
                                
                                //disable the default form submission
                                event.preventDefault();

                                //grab all form data  
                                var formData = new FormData($(this)[0]);

                                $.ajax({
                                url: '<?= site_url()?>/blk_rekapitulasi/update_rekapan_kb/',
                                type: 'POST',
                                data: formData,
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function (returndata) {
                                    $("#panel-edit").css('display', 'none');
                                    tableku.ajax.reload();
                                    $("input").val('');
                                }
                                });

                                return false;
                                });

                                </script>

                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
    $('#exs').DataTable({
        scrollX: true,
        scrollY: '400px',
        processing: true,
        serverSide: true,
        "ordering": false,
        "info":     false,
        "bFilter": false, 
        "bLengthChange": false,  
        ajax: {
            "url"       : "<?php echo site_url('blk_rekapitulasi/kb_show_data/'.$u_kb_pil_id) ?>",
            "type"      : "POST"
        }
    });
</script>