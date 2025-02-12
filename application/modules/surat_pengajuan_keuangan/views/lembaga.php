<script type="text/javascript">
    $(".js-example-basic-single").select2();
</script>
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h2> <span class="text-semibold">Surat Pengajuan ke Lembaga Keuangan </span></h2>
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
                <div class="col-lg-12" id="panel-2" style="display:none;">
                    <div class="panel">
                        <div class="panel-body">
                            <form action="<?php echo site_url('surat_pengajuan_keuangan/simpan_data_ctki/'.$kode);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                <div>
                                    <div>
                                        <h1 class="text-center">Tambah Data CTKI</h1>
                                    </div>
                                    <div class="form-group" id="formhead">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="col-lg-12 control-label">Pilih TKI </label>
                                                <div class="col-lg-12">
                                                    <select class="form-control select23" name="dctki[]" required="required">
                                                        <option value="">Pilih CTKI</option>
                                                        <?php 
                                                            foreach ($tampil_data_ctki as $key) {
                                                        ?>
                                                            <option value="<?php echo $key->id_biodata ?>"><?php echo $key->id_biodata.' - '.$key->nama ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-3">
                                                <label class="col-lg-12 control-label">Jumlah Pinjaman </label>
                                                <div class="col-lg-12">
                                                    <input type="text" name="pinjam[]" required="required" class="form-control" value="" placeholder=" EX : 13.675.000 + 8JT">
                                                </div>
                                            </div>
                
                                            <div class="col-lg-3">
                                                <label class="col-lg-12 control-label">Angsuran </label>
                                                <div class="col-lg-12">
                                                    <input type="text" name="loan[]" required="required" class="form-control" placeholder=" EX : 9">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="new">
                
                                    </div>
                                     
                                </div>
                                <div class="text-center">
                                    <button id='data_ctki' class="btn bg-orange-400">Tambah Row</button>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    <button type="button" class="btn btn-default" onclick="window.closepanel();" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" id="panel-1">
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <a href="<?php echo site_url('surat_pengajuan_keuangan/') ?>" class='btn bg-violet-800 btn-large'>Kembali</a>
                            <button onclick="window.openpanel();" class='btn bg-violet-800 btn-large' >Tambah Data CTKI</button>
                            <h5 class="panel-title text-center ">Input Data CTKI </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">     
                            <div class="table-responsive">        
                                <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Id Biodata</th>
                                            <th>Nama</th>
                                            <th>Jumlah Pinjaman</th>
                                            <th>Angsuran</th>
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

<script type="text/javascript">


    window.openpanel = function(){
        _id('panel-1').style.display = 'none';
        _id('panel-2').style.display = 'block';
    }

    window.closepanel = function(){
        _id('panel-1').style.display = 'block';
        _id('panel-2').style.display = 'none';
    }

    $('#fixedeks').dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('surat_pengajuan_keuangan/show_dctkix/'.$kode) ?>",
            "type"      : "POST"
        }
    });
    
    
    function fineContainer(nod){
        if(nod.parentNode.id != "formhead"){
            return fineContainer(nod.parentNode);
        }else{
            return nod.parentNode;
        }
    }
        
    $(".select23").select2().change(function(){
        let val = $(this).val();
        let pinjam = fineContainer(this).querySelector('input[name="pinjam[]"]');
        let load = fineContainer(this).querySelector('input[name="loan[]"]');
        $.ajax({
            url: '<?= site_url('surat_pengajuan_keuangan/get_nilaikreditbank') ?>/'+val,
            dataType: 'json',
            success:function(res){
                pinjam.value = res.nilaikredit
                load.value = Number(res.isikredit.toLowerCase().split('x').shift());
                console.log(res);
            }
        })
        console.log(val);
        console.log(pinjam);
        console.log(load);
    });
    
    
    (function() {

        var count = 0;


        $('#data_ctki').click(function() {

            var source = $('#formhead'),
                clone = source.clone();


            clone.insertBefore($('#new'));
            
            Array.from(document.querySelectorAll('form .select2-container')).forEach(function(j){
                j.remove();
            });
            
            setTimeout(function() {
                $(".select23").select2().change(function(){
                    let val = $(this).val();
                    let pinjam = fineContainer(this).querySelector('input[name="pinjam[]"]');
                    let load = fineContainer(this).querySelector('input[name="loan[]"]');
                    $.ajax({
                        url: '<?= site_url('surat_pengajuan_keuangan/get_nilaikreditbank') ?>/'+val,
                        dataType: 'json',
                        success:function(res){
                            pinjam.value = res.nilaikredit
                            load.value = Number(res.isikredit.toLowerCase().split('x').shift());
                            console.log(res);
                        }
                    })
                    console.log(val);
                    console.log(pinjam);
                    console.log(load);
                });
            }, 10);
            
            count++;
        });

    })();
</script>
