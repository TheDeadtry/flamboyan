
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Data Notarisan Yang Belum </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <a type="button" class="btn btn-success" href="<?php echo site_url('notarisan_bulk') ?>">KEMBALI</a>
                            <hr/>
                            <div class="table-responsive">
                                <table class="table table-xxs table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">PMI</td>
                                            <td max-width="100%" style="text-align:center">Tanggal</td>
                                            <td max-width="100%" style="text-align:center">Nama</td>
                                            <td max-width="100%" style="text-align:center">Nomor</td>
                                            <td max-width="100%" style="text-align:center">Hubungan</td>
                                            <td max-width="100%" style="text-align:center">Khusus</td>
                                            <td max-width="100%" style="text-align:center">OPSI</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dkrh">
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

<script type="text/javascript">
    
    function loaddata() {
        $.ajax({
            url             : "<?php echo site_url('notarisan_bulk/belumdata') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            success: function(data) 
            {
                $('#dkrh').html(data);
            }
        });
    }
    loaddata();
    $(document).on("click", ".dkrhsimpan", function() {
        let id = $(this).data('id');
        var form_data = {
            pmi : $('.pmix-'+id).val(),
            tanggal : $('.tgl-'+id).val(),
            nama : $('.nama-'+id).val(),
            nomor : $('.nomor-'+id).val(),
            hub : $('.hub-'+id).val(),
            khusus : $('.khusus-'+id).val(),
        }
        $.ajax({
            url             : "<?php echo site_url('notarisan_bulk/belumsimpan') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
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
                    $('.idrow-'+id).remove();
                    swal({
                        title: "Sukses ditambah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    }, function() {
                    });
                }
            }
        });
    });
</script>
