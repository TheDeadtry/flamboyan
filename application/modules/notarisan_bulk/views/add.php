
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Data Notarisan </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-lg-2">Tanggal</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Format tgl YYYY.MM.DD" name="tgl" id="tgl">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-lg-2">Pilih PMI</label>
                                    <div class="col-lg-10">
                                        <select class="dewselect2_multi" id="pmi" name="pmi[]" data-placeholder="Pilih PMI" required="required">
                                            <?php 
                                                foreach( $tampil_data_pmi as $row ) {
                                            ?>
                                                    <option value="<?php echo $row->id_biodata ?>"><?php echo $row->id_biodata.' - '.$row->nama ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a type="button" class="btn btn-success" href="<?php echo site_url('notarisan_bulk') ?>">KEMBALI</a>
                            <button type="button" class="btn btn-danger" id="dkrhreset">Reset</button>
                            <button type="button" class="btn btn-primary" id="dkrhadd">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">OPSI</td>
                                            <td max-width="100%" style="text-align:center">Nama TKI</td>
                                            <td max-width="100%" style="text-align:center">Tanggal</td>
                                            <td max-width="100%" style="text-align:center">Nama</td>
                                            <td max-width="100%" style="text-align:center">Nomor</td>
                                            <td max-width="100%" style="text-align:center">Hubungan</td>
                                            <td max-width="100%" style="text-align:center">Khusus</td>
                                        </tr>
                                    </thead>
                                    <form id="form123">
                                        <tbody id="dkrhbody">
                                        </tbody>
                                    </form>
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
    $(document).on('click','#dkrhadd',function () {
        let pmi = $('#pmi').val();
        let tgl = $('#tgl').val();
        if (pmi == null || tgl == '') {
            swal({
                title: "Error",
                text: 'Tanggal / Nama TKI harus diisi',
                confirmButtonColor: "#66BB6A",
                type: "error"
            });
        } else {
            $.ajax({
                url             : "<?php echo site_url('notarisan_bulk/add_addRow') ?>",
                type            : "POST",
                dataType        : 'json',
                encode          : true,
                data            : {
                    pmi: pmi,
                    tgl: tgl,
                },
                success: function(data) 
                {
                    $('#dkrhbody').html(data);
                }
            });
        }
    })
    $(document).on('click','#dkrhreset',function () {
        $('#dkrhbody').html('');
        $('#pmi').val('').change();
        $('#tgl').val('');
    })
    $(document).on('click',"#dkrhsave", function(event){
        event.preventDefault();

        $.ajax({
            url             : "<?php echo site_url('notarisan_bulk/add_save') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : $('.df').serialize(),
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
                    $('#dkrhbody').html('');
                    $("#pmi").val('').change();
                    $("#tgl").val('');
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
