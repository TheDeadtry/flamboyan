
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Data Psikotes Yang Belum </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div style="magin-bottom: 10;">
                                <div style="display:grid; grid-template-columns: auto auto; grid-gap:10px;">
                                    <div class="form-group">
                                        <label for="">Sektor</label>
                                        <Select id="sektor" class="form-control">
                                            <?php
                                                $sektor = $this->db->query("SELECT kode_jenis, isi FROm datasektor")->result();
                                                ?>
                                            <?php foreach($sektor as $sektor) : ?>
                                                <option value="<?= $sektor->kode_jenis ?>">(<?= $sektor->kode_jenis ?>) <?= $sektor->isi ?></option>
                                            <?php endforeach; ?>
                                        </Select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" id="nama" class="form-control" placeholder="Cari nama TKI">
                                    </div>
                                </div>
                                <div>
                                    <label for="">Periode Tanggal Masuk</label>
                                    <div style="display:grid;grid-template-columns: auto 50px auto">
                                        <div>
                                            <div class="input-group">
                                                <input required type="text" id="date1" autocomplete="off" class="form-control dewdate2 pointer" placeholder="Select Datepicker">
                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                            <span class="help-block">Using <code>input type="date"</code></span>
                                        </div>
                                        <div style="text-align:center; padding-top:8px;">
                                            s/d
                                        </div>
                                        <div>
                                            <div class="input-group">
                                                <input required type="text" id="date2" autocomplete="off" class="form-control dewdate2 pointer" placeholder="Select Datepicker">
                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                            <span class="help-block">Using <code>input type="date"</code></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button onclick="window.cetaknotaris()" class="btn btn-default btn-sm">Cetak Data</button>
                            </div>

                            <div class="table-responsive" style="display:none; margin-top:10px;">
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
    
    window.cetaknotaris = function() {
        let sektor = _id('sektor').value;
        let nama = _id('nama').value;
        let date1 = _id('date1').value;
        let date2 = _id('date2').value;
        location.href =  "<?php echo site_url('notarisan_bulk/cetakpsikotes') ?>/"+sektor+'/'+(date1 !=''? date1:'-')+'/'+(date2 != ''? date2 : '-')+'/'+nama;
    }

    window.loaddata = function() {
        let load = cssLoader();
        $.ajax({
            url             : "<?php echo site_url('notarisan_bulk/belumdata') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : {
                sektor : _id('sektor').value,
                nama : _id('nama').value,
                date1 : _id('date1').value,
                date2 : _id('date2').value,
            },
            success: function(data) 
            {
                load.remove();
                $('#dkrh').html(data);
            }
        });
    }
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
        let loader = cssLoader();
        $.ajax({
            url             : "<?php echo site_url('notarisan_bulk/belumsimpan') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : form_data,
            success: function(data) 
            {
                loader.remove();
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
