
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 style="font-family: Montserrat;font-weight: 400;color: #222222;font-size: 17.5px;" align="center"><b>MES 4</b></h4>
                    </div>

                    <div class="panel-body">
                        <div class="row" style="margin-bottom:30px;">
                            <div class="col-lg-12">
                                <div class="dewdew"></div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div id="modaldkrh" class="modal fade">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">UBAH TEMPAT TIDUR</h5>
            </div>
            <form action="<?php echo site_url('blk_denah/mes_update'); ?>" class="form-horizontal" method="post">                                        
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_no_ranjang" id="id_no_ranjang" value="">
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-3">Tanggal Terima Ranjang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tanggal_mulai" id="tglterima" value="<?php echo date('Y-m-d') ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-3">IDBIO/NAMA</label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="idbio" id="modal_idbio">
                                    <option value="">-KOSONG-</option>
                                    <?php 
                                        foreach ($tampil_pemakai_ranjang as $row) { 
                                            $ubah_tipe = substr($row->nodaftar, 0, 2);
                                            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                                                $nama = $row->nama_taiwan;
                                            } else {
                                                $nama = $row->nama_hk;
                                            }

                                    ?>
                                            <option value="<?php echo $row->nodaftar?>" <?php //echo $sel;?>><?php echo $row->nodaftar.' - '.$nama?></option>
                                    <?php    
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block dkrhsimpanubah" id="dkrhbtnSimpan">SIMPAN</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    $.ajax({
        url             : "<?php echo site_url('blk_denah/mes4_get') ?>",
        dataType        : 'json',
        encode          : true,
        success: function(data) 
        {
            $(".dewdew").html(data);
        }
    });
    
    $(document).on('click','.map_title',function() {
        let id = $(this).data('id');
        let no = $(this).data('no');
        let tgl = $(this).data('tgl');
        $("#id_no_ranjang").val(id);
        $("#tglterima").val(tgl);
        $("#modal_idbio").val(no).change();
        $("#modaldkrh").modal('show');
    })
    
    $(document).on('click','#dkrhbtnSimpan',function() {
        var form_data = {
            id : $("#id_no_ranjang").val(),
            no : $("#modal_idbio").val(),
            tgl : $("#tglterima").val(),
        }
        $.ajax({
            url             : "<?php echo site_url('blk_denah/mes_update') ?>",
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
                    $("#modaldkrh").modal('hide');
                    swal({
                        title: "Sukses ditambah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    }, function() {
                        location.reload();
                    });
                }
            }
        });
    })
</script>