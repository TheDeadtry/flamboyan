
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Detail Daftar CTKI </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>               

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title">
                                <div class='title'>Data Daftar CTKI</div> <br>
                            </h5>
                            <div class="heading-elements">
                                <a class='btn bg-warning-800 btn-large' data-toggle='modal' href='#tambahagama' role='button'>Tambah CTKI</a>
                                <a href="<?php echo site_url('surat_rekom_tabelpap/'); ?>" class='btn bg-warning-800 btn-large' type="button">Kembali</a>
                            </div>
                        </div>

                        <div class="panel-body">     
                            <div class="table-responsive">  
                                <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>ID BIODATA</th>
                                            <th>NAMA</th>
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

                        <div class="modal fade" id="editvv" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-orange-800">
                                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                                        <h3>Update Agreement <?php echo $id_pembuatan?> </h3>
                                    </div>  
                                    <form class="form-horizontal" method="post" action="<?php echo site_url('surat_rekom_tabelpap/update_tabelpap/'.$id_pembuatan) ?>">
                                        <div class="modal-body">
                                            <input type="hidden" class="form-control" name="id_pembuatan" id="detail_id" value="">
                                            
                                            <div class="form-group">
                                                <label class="control-label col-sm-3"> PILIH CTKI </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="id1" data-placeholder="Choose a Category" id="edit_ctki">
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="updatepap" class="btn btn-primary" name="submit">Submit</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class='modal fade' id='tambahagama' role='dialog'>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class='modal-header bg-teal-800'>
                                        <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                        <h3>Tambah Agreement  <?php echo $id_pembuatan; ?></h3>
                                    </div>
                                    <form action="<?php echo site_url('surat_rekom_tabelpap/simpan_data_tabelpap/'.$id_pembuatan);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                        <div class='modal-body'>
                                            <input type="hidden" class="form-control" id="id_pembuatan" name="id_pembuatan" value="<?php echo $id_pembuatan ?>">

                                            <div class="form-group" id="ctki1">
                                                <label class="control-label"> PILIH CTKI</label>
                                                <select class="form-control" name="id1" multiple data-placeholder="Choose a Category" id="xdetail_ctki1">
                                                    <option value="" />
                                                </select>
                                            </div>

                                        </div>           
                                        <div class='modal-footer'>
                                            <button type="button" class='btn' data-dismiss='modal'>Close</button>
                                            <button type="button" id="simpandata" class='btn btn-primary'>Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

    <script type="text/javascript">

        const _select2 = function(id="xdetail_ctki1", url='/api/api_selection', model='tki_rekom'){
            $("#"+id)
            .select2({
                ajax: {
                    url: '<?= site_url('') ?>'+url,
                    method:'post',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // Search term
                            limit: 15,      // Number of results per request
                            offset: params.page * 15 || 0,
                            model: model    // Offset for pagination
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 0;
                        return {
                            results: data.results,
                            pagination: {
                                more: (params.page * 15) < data.total // Check if more results are available
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Search for an item',
            });
        } 

        _select2();
        _select2("edit_ctki");

        $("#updatepap").click(function(){
            var tki = $("#edit_ctki").val();
            var idp = $("#detail_id").val();
            let data = [{
                id_biodata: tki,
                id_pembuatan: idp
            }].ToUpdate('detail_tabelpap', ['id_pembuatan']);
            AuditDevQuery(datalogin, data, function(){
                $("#editvv").modal("toggle")
                _table._fnReDraw();
            })
        })

        $("#simpandata").click(function(){
            var tki = $("#xdetail_ctki1").val();
            var idp = $("#id_pembuatan").val();
            if(tki){
                console.log(idp);
                let nw = (Array.isArray(tki)? tki:[]).map(function(d){
                    return {
                        id_tabelpap: idp,
                        id_biodata: d
                    }
                }).ToInsert("detail_tabelpap",["id_tabelpap", "id_biodata"]);
                console.log(nw);
                AuditDevQuery(datalogin, nw, function(){
                    _table._fnReDraw();
                    $("#xdetail_ctki1").val('').trigger("change")
                    $("#tambahagama").modal("toggle")
                })
            }
        })

        const _table = $('#fixedeks').dataTable({ 
            processing: true,
            serverSide: true,
            ajax: {
                "url"       : "<?php echo site_url('surat_rekom_tabelpap/show_data_detail/'.$id_pembuatan) ?>",
                "type"      : "POST"
            }
        });

        function edit999(id) {
            $.ajax({
                url: '<?php echo site_url('surat_rekom_tabelpap/edit_detail_show') ?>',
                type: 'POST',
                dataType: 'json',
                data: 'id='+id,
                encode:true,
                success:function (data) {
                    $('#detail_id').val(data.id_pembuatan);
                    console.log(
                        data
                    )
                    var newOption = new Option(data.nama, data.id_biodata, true, true);
                    $('#edit_ctki').append(newOption).trigger('change');
                }
            })
        }

        function hapus999(id) {
             swal({
                title: "Are you sure?",
                text: "Do you really want to delete this item?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                // Perform the delete operation
                    console.log(id)
                    if(id != ''){
                        AuditDevQuery(datalogin, `DELETE FROM detail_tabelpap WHERE id_pembuatan = '${id}'`, function(){
                            swal("Deleted", "File deleted!", "success");
                            _table._fnReDraw();
                        })
                    }
                } else {
                swal("Cancelled", "Your item is safe!", "info");
                }
            });
        }

    </script>