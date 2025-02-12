
<!-- Complex headers example -->
<style type="text/css">
    .ggs-flyer{
        padding: 20px;
        visibility: hidden;
        display: block;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: #777;
        opacity: 0,5;
        z-index: 9999999;
    }

    .isi-box{
        padding: 20px;
        background-color: white;
        border-radius: 5px;
    }

    .isidatasaya{
        position: relative;
    }

    .isidatasaya > li {
        display: inline-block;
        position: relative;
    }

    .datachanger{
        margin: 10px;
    }

    .datachanger > button{
        display: block;
        position: absolute;
        z-index: 999999;
        width: 70px;
        height: 40px;

    }

    
</style>

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Majikan</span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('pdf9/cetak') ?>">PRINT MAJIKAN ALL</a>
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('pdf9/cetaksemuadata') ?>">PRINT TKI LINK MAJIKAN</a>
                            <h5 class="panel-title text-center ">DATA MAJIKAN <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-inline pull-right">
                              <div class="form-group">
                              PRINT MAJIKAN : 
                                <select style="width: 200px;" class="form-control" id="dapatAgen">
                                    <option value="All" selected>All</option>
                                    <?php $agenn = $this->db->query("SELECT * FROM dataagen ORDER BY nama ASC")->result(); ?>
                                    <?php foreach ($agenn as $key => $value): ?>
                                        <option id="<?= str_replace(" ", "", $value->nama); ?>" value="<?= $value->id_agen; ?>"><?= $value->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <a class="btn btn-lg btn-primary" id="btnprintmajikan" href="<?php echo site_url('pdf9/cetakselected') ?>" target="_blank">PDF</a>
                                <a class="btn btn-lg btn-primary" id="btnprintmajikan2" href="<?php echo site_url('pdf9/cetakselectedword') ?>" target="_blank">WORD</a>
                            </div>
                              
                            </form>
                            <div id="chech"></div>
                            <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Preview</th>
                                        <th>Dokumen</th>
                                        <th>Documents</th>
                                        <th></th>
                                        <th></th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Nama Taiwan</th>
                                        <th>Nama Pimpinan Mandarin</th>
                                        <th>Nama Pimpinan Indonesia</th>
                                        <th>Jabatan Pimpinan Mandarin</th>
                                        <th>Jabatan Pimpinan Indonesia</th>
                                        <th>Headphone</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Alamat Mandarin</th>
                                        <th>Nama Agen</th>
                                    </tr>
                                </thead>
                                <tbody>        

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary panel-bordered">
                        <div class="panel-heading ">
                            <h5 class="panel-title " style="vertical-align: middle">Input Majikan<br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo site_url('majikans/simpan_data_majikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Sektor</label>
                                    <div class="col-sm-9">
                                        <select id="sektor" class="form-control " data-placeholder="Choose a Category" required tabindex="1" name="datasektor_id">
                                            <option value="">Pilih sektor</option>
                                            <?php foreach($sektor as $st) :?>
                                                <option value="<?= $st->kode ?>"><?= $st->text ?></option>    
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Pilih Groups (jika tidak ada... Pilih Tidak Ada grup) </label>
                                    <div class="col-sm-9">
                                        <?php   echo form_dropdown("group",$option_group,"","id='group_id2' class='form-control'"); ?>
                                        <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="jelasin_agen">
                                    <label class="control-label col-sm-3">Pilih Agen </label>
                                    <div class="col-sm-9">
                                        <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled class="form-control"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kode </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="kode" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                               <div class="form-group">
                                    <label class="control-label col-sm-3">Nama Taiwan </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="namamajikan" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama Pimpinan Mandarin </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pimpinan_man" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama Pimpinan Indonesia </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pimpinan_indo" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Jabatan Pimpinan Mandarin </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jabatan_man" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Jabatan Pimpinan Indonesia </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jabatan_indo" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Handphone </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hp" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Alamat </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="alamat" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">File Upload</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="filenya"/>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="ggs-flyer">
    <div class="isi-box">
        <div class="box-content">
            <form action="<?= site_url(); ?>/new_majikans/uploaddatasaya" method="POST" enctype="multipart/form-data">
            <label><h1>Upload File here: </h1></label>
            <input type="hidden" name="id" class="datauntukdisimpan">
            <input type="file" multiple name="file[]"><br>
            <input type="submit" class="btn btn-success" name="upload" value="simpan"> <a href="#" class="btn btn-warning tutuphalaman">Tutup</a><br><br>
        </form>

        <div class="isidatasaya">
            
        </div>

        </div>
    </div>
</div>



                </div>
                <script type="text/javascript">

                    $(document).ready(function(){
                        /*sessionStorage.setItem('dataAgen', '');
                        if (sessionStorage.getItem("agenq") == null) {
                            var agen = sessionStorage.getItem("dataAgen");
                        }else{
                            var agen = sessionStorage.getItem("agenq");
                        }*/
                        $('#fixedeks').dataTable({
                            scrollX: true,
                            scrollY: "400px",
                            "searchable": true,
                            fixedColumns: {
                                leftColumns: 0,
                                rightColumns: 0
                            },
                            processing: true,
                            bFilter: true,
                            "lengthChange": false,
                            serverSide: true,
                            ajax: {
                                url       : "<?php echo site_url('new_majikans/show_majikan'); ?> ",
                                method      : "POST",
                                //data        : {agenq: agen}
                            }
                        });

                    });
                    $('#dapatAgen option[value=All]').attr('selected', 'selected');

                    $('#dapatAgen').change(function(){
                        //var idagen = $(this).attr('vvv');
                        var dapaTvalueAgen = $(this).val();
                        $('#btnprintmajikan').attr("href","<?php echo site_url('pdf9/cetakselected') ?>/"+dapaTvalueAgen)
                        $('#btnprintmajikan2').attr("href","<?php echo site_url('pdf9/cetakselectedword') ?>/"+dapaTvalueAgen)
                        $('#fixedeks').DataTable().destroy();
                        $('#fixedeks').dataTable({
                            scrollX: true,
                            scrollY: "400px",
                            "searchable": true,
                            fixedColumns: {
                                leftColumns: 0,
                                rightColumns: 0
                            },
                            processing: true,
                            bFilter: true,
                            "lengthChange": false,
                            serverSide: true,
                            ajax: {
                                url       : "<?php echo site_url('new_majikans/show_majikan'); ?> ",
                                method      : "POST",
                                data        : {agenq: dapaTvalueAgen}
                            }
                        });
/*
                        sessionStorage.setItem('agenq', dapaTvalueAgen);
                        location.reload();*/
                    });

                    $(".tutuphalaman").click(function(){
                        $(".ggs-flyer").css({"visibility":"hidden"});
                    })


                    function tampilkandatasaya(key){
                        $.ajax({
                            url         : "<?php echo site_url('new_majikans/lihatuploadandata'); ?> ",
                            method      : "POST",
                            dataType    : "text",
                            data        : {idupload: key},
                            success:function(response){
                                $(".isidatasaya").html(response);
                            }
                        })
                    }

                    function uploaddocuments(key){
                        // alert('ok');
                        sessionStorage.setItem("keya", key);
                        $(".ggs-flyer").css({"visibility":"visible"});
                        $(".datauntukdisimpan").val(key);
                        tampilkandatasaya(key);
                        
                    }

                    function unlink(key){
                        $.ajax({
                            url: "<?php echo site_url('new_majikans/unlinkdata/'); ?>/"+key,
                            success:function(response){
                                alert(response);
                                tampilkandatasaya(sessionStorage.getItem("keya"));
                            }
                        });
                    }


                    function downloaddata(key){
                        location.href = '<?= site_url(); ?>/new_majikans/ambiluploaddata/'+key;
                    }



                    function tambahtki(key){
                        location.href = "<?= site_url(); ?>/majikan_tambah_tki/majikan_tki/"+key;
                    }


                </script>





