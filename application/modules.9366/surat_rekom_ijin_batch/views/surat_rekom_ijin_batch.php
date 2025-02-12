
<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>PRINT SURAT REKOM IJIN BATCH/NAMA </i></b></h5>

                            <div class="heading-elements">
                                <input type="text" id="btn_tgl">
                                <button class="btn btn-xs bg-orange" id="btn_print">PRINT</button>
                            </div>
                        </div>

                        <div class="panel-body">
                            <select class="form-control" id="select_tanggal" onchange="show_table_rekom()">
                                <option id="select_default">Pilih Tanggal</option>
                                <?php 
                                    foreach ($ambil_tanggal as $row) {
                                ?>
                                        <option value="<?php echo $row->tanggal ?>" ><?php echo $row->tanggal ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <div class="table-responsive">
                                <table class="table table-lg table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">Nomor<br/>Surat</td>
                                            <td max-width="100%" style="text-align:center">Lampiran</td>
                                            <td max-width="100%" style="text-align:center">Perihal</td>
                                            <td max-width="100%" style="text-align:center">Kepada</td>
                                            <td max-width="100%" style="text-align:center">Kantor<br/>Imigrasi</td>
                                            <td max-width="100%" style="text-align:center">Tampilkan<br/>(dl06)</td>
                                            <td max-width="100%" style="text-align:center">Nama<br/>Lengkap</td>
                                            <td max-width="100%" style="text-align:center">Tempat &<br/>Tanggal Lahir</td>
                                            <td max-width="100%" style="text-align:center">Jabatan</td>
                                            <td max-width="100%" style="text-align:center">Alamat</td>
                                            <td max-width="100%" style="text-align:center">Daerah</td>
                                        </tr>
                                    </thead>
                                    <tbody id="table_rekom_data"> 
                                        <tr>
                                            <td colspan="13" class="text-center">Kosong...</td>
                                        </tr>
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
    function show_table_rekom() {
        $('#select_default').attr('disabled','disabled');
        $('#btn_tgl').val( $('#select_tanggal').val() );
        $.ajax({
            url     : "<?php echo site_url('surat_rekom_ijin_batch/ambil_data') ?>",
            type    : "POST",
            data    : {
                'tgl'          : $('#select_tanggal').val()        
            },
            success: function(data) {
                $('#table_rekom_data').html(data);
            }
        });
    }

    $(document).on("click", "#btn_print", function() {

        tgl = $('#btn_tgl').val();
        window.open("<?php echo site_url('surat_rekom_ijin_batch/print_pdf') ?>"+"/"+tgl);
    })
</script>