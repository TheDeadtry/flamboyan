
    <style type="text/css">

        .bg-blue-300, .bg-orange-800, .bg-orange-300, .bg-pink-300 {
            color: #000;
        }

        .kuning {
            background-color: #FCD5B4;
        }

        .coklat {
            background-color: #e88e25;
        }

        .yellow {
            background-color: #f7e031;
            border: 1px solid #ddd;
            border-color: #fff;
        }
         .merah {
            background-color: #FF99CC;
        }
        .biru {
            background-color: #B6DDE8;
        }
        .tengah {
            text-align: center;
        }
        


    </style>

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> PROGRESS MARKETING FORMAL</span>
                </h2>
            </div>

        </div>
        
    </div>

    <div class="page-container">

        <div class="page-content">

            <div class="content-wrapper">

                <div class="panel">
                    <div class="panel-heading bg-teal-700">
                        <h5 class="panel-title">PROGRESS MARKETING PABRIK-JOMPO - 工廠+養護機構 -進度表. </h5>
                    </div>

                    <div class="panel-body">
                        <form id="group_tampil" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <select class="dewselect2_n" name="kodegroup" tabindex="1">
                                            <option value="Semua" selected>Semua</option>
                                            <?php 
                                                foreach ($tampil_pilihan_agen as $pilihan) 
                                                {
                                            ?>
                                                    <option value="<?php echo $pilihan->id_agen;?>" /><?php echo $pilihan->id_agen.' '.$pilihan->nama ?>
                                            <?php
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <button type="button" class="btn bg-info-800 btn-large" id="tampil_agen">Tampilkan</button>
                                        <div class="btn-group btn-group-animated">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" id="statterbang_header">還沒入境 – BELUM KE TAIWAN <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li id="statterbangu_1" class="active">
                                                    <a class="rubah_statterbang" data-id="belum">
                                                        <i class="icon-spinner9"></i> 還沒入境 – BELUM KE TAIWAN
                                                    </a>
                                                </li>
                                                <li id="statterbangu_2">
                                                    <a class="rubah_statterbang" data-id="sudah">
                                                        <i class="icon-person"></i>  已經入境 – SUDAH KE TAIWAN
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="btn bg-pink-700" href="<?php echo site_url('admin_print/markformal_print') ?>" target="_blank">PRINT (xls)</a>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="panel" id="panel_agenats">
                    <div class="panel-heading bg-success-700">
                        <h5 class="panel-title" id="panel_agenbwh">還沒入境 – BELUM KE TAIWAN | SEMUA AGEN</h5>
                    </div>

                    <div class="panel-body">

                        <table class="table table-bordered" id="mark_datatable">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="4" class="bg-orange-300" >NO.</th>  
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th> 
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th> 
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th> 
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th> 
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th>                                              
                                    <th scope="col" colspan="5" class="bg-orange-300" > 初始過程 PROSES AWAL </th>
                                    <th scope="col" colspan="3" class="yellow"> 挑到雇主 DAPAT MAJIKAN </th>
                                    <th scope="col" colspan="7" class="bg-pink-300"> 離境 KEBERANGKATAN </th>
                                    <th scope="col" colspan="11" class="yellow"> DOKUMEN DARI TAIWAN - 臺灣文件 </th>
                                    <th scope="col" colspan="25" class="bg-pink-300"> PROSES DOK DI INDONESIA (印尼文件） </th>
                                    <th scope="col" rowspan="2" colspan="2"  class="bg-blue-300" >備註</th>  
                                </tr>
                                <tr>              
                                    <th scope="col" colspan="3" class="bg-orange-300"> 外勞 - TKI </th>
                                    <th scope="col" colspan="2" class="bg-orange-300"> 雇主 </th>
                                    <th scope="col" rowspan="2"  class="bg-orange-300"> 履歷表給臺灣日期 </th>
                                    <th scope="col" colspan="4" class="bg-orange-300"> 勞工網上報名 TKI ONLINE DEPNAKER  </th>
                                    <th scope="col" rowspan="2" class="yellow"> 挑工 日期 </th>
                                    <th scope="col" rowspan="2" class="yellow"> 聘工表 </th>
                                    <th scope="col" rowspan="2" class="yellow"> 雇主要求入境 </th>
                                    <th scope="col" rowspan="2" colspan="2" class="bg-pink-300"> 入境 MASUK TAIWAN </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300"> 班機 </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300"> 下機張 </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300"> 機票- </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300" colspan="2"> 飛TERBANG </th>
                                    <th scope="col" rowspan="1"  class="yellow"> 勞動契約 PK </th>
                                    <th scope="col" colspan="5"  class="bg-blue-300"> 核准函 SUHAN </th>
                                    <th scope="col" colspan="5" class="bg-orange-300"> 簽證函 VISA PERMIT </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300"> 久護照 PASPOR LAMA </th>
                                    <th scope="col" colspan="6"  class="bg-pink-300"> 新護照 PASPOR BARU </th>
                                    <th scope="col" colspan="5"  class="bg-pink-300"> 良民證 SKCK </th>
                                    <th scope="col" colspan="2"  class="bg-pink-300"> MEDIKAL FULL-大 體檢 </th>
                                    <th scope="col" colspan="6"  class="bg-pink-300"> VISA 簽證 </th>
                                    <th scope="col" colspan="5"  class="bg-pink-300"> 日期 TGL  </th>
                               </tr>
                               <tr>
                                    <th scope="col" colspan="1" class="bg-orange-300"> 姓名 NAMA </th>
                                    <th scope="col" colspan="1" class="bg-orange-300"></th>
                                    <th scope="col" colspan="1" class="bg-orange-300"> 編號 </th>
                                    
                                    <th scope="col" colspan="1" class="bg-orange-300"> MAJIKAN </th>
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th>
                                    <th scope="col" rowspan="2" class="bg-orange-300">  日期 TGL  </th>
                                    <th scope="col" rowspan="2" class="bg-orange-300"> 實A / 估-C </th>
                                    <th scope="col" colspan="1" class="bg-orange-300"> 勞工網上報名號碼  </th>
                                    <th scope="col" colspan="1" class="bg-orange-300"> 護照號碼 </th>
                                    <th scope="col" rowspan="2"  class="yellow">受到日期 TGL TERIMA</th>
                                    <th scope="col" rowspan="1"  class="bg-blue-300">收件日</th>
                                    <th scope="col" rowspan="2"  class="bg-blue-300">號碼 NO</th>
                                    <th scope="col" rowspan="1"  class="bg-blue-300" colspan="2">日期 TGL</th>
                                    <th scope="col" rowspan="1"  class="bg-blue-300">備註</th>
                                    <th scope="col" rowspan="1" class="bg-orange-300">收件日</th>
                                    <th scope="col" rowspan="2" class="bg-orange-300">號碼 NO</th>
                                    <th scope="col" rowspan="1" class="bg-orange-300"colspan="2">日期 TGL</th>
                                    <th scope="col" rowspan="1" class="bg-orange-300">備註</th>
                                    <th scope="col" colspan="6"  class="bg-pink-300"> 日期 TGL </th>
                                    <th scope="col" colspan="5"  class="bg-pink-300"> 日期 TGL </th>
                                    <th scope="col" colspan="2"  class="bg-pink-300"> 日期 TGL </th>
                                    <th scope="col" colspan="6"  class="bg-pink-300"> 日期 TGL </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">貸款 LOAN</th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">受訓-PAP</th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">實A / 估-C</th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">外勞卡 KTKLN</th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">實A / 估-C</th>
                                    <th scope="col" rowspan="2"  class="bg-blue-300" >KETERANGAN</th>  
                                    <th scope="col" rowspan="2"  class="bg-blue-300" >KETERANGAN 2</th>  
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-orange-300"> NO_INDUK </th>
                                    <th scope="col" class="bg-orange-300"> INDONESIA </th>
                                    <th scope="col" class="bg-orange-300"> MANDARIN </th>
                                    <th scope="col" class="bg-orange-300"> MANDARIN </th>
                                    <th scope="col" class="bg-orange-300" > ENGLISH </th>
                                    <th scope="col" class="bg-orange-300">TGL KIRIM BIO KE TAIWAN</th>
                                    <th scope="col" class="bg-orange-300"> NO ID ONLINE </th>
                                    <th scope="col" class="bg-orange-300"> NO PASPORT </th>
                                    <th scope="col" class="yellow">TGL TERPILIH</th>
                                    <th scope="col" class="yellow">JD</th>
                                    <th scope="col" class="yellow">TGL DIMINTA TERBANG</th>
                                    <th scope="col" class="bg-pink-300"> TGL日期 </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> RUTE_PENERBANGAN</th>
                                    <th scope="col" class="bg-pink-300">TUJUAN</th>
                                    <th scope="col" class="bg-pink-300">TIKET</th>
                                    <th scope="col" class="bg-pink-300"> TGL日期 </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-blue-300"> TGL TERIMA </th>
                                    <th scope="col" class="bg-blue-300"> 發行  TERBIT </th>
                                    <th scope="col" class="bg-blue-300"> 到期  EXP </th>
                                    <th scope="col" class="bg-blue-300"> KETERANGAN </th>
                                    <th scope="col" class="bg-orange-300"> TGL TERIMA </th>
                                    <th scope="col" class="bg-orange-300"> 發行  TERBIT </th>
                                    <th scope="col" class="bg-orange-300"> 到期  EXP </th>
                                    <th scope="col" class="bg-orange-300"> KETERANGAN </th>
                                    <th scope="col" class="bg-pink-300"> 到期EXP </th>
                                    <th scope="col" class="bg-pink-300"> 送 AJU </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 拍照  FOTO </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 受到 TERIMA </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 送PENGAJUAN </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 受到 TERIMA </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 到期 TGL EXP </th>
                                    <th scope="col" class="bg-pink-300"> 作-DILAKUKAN </th>
                                    <th scope="col" class="bg-pink-300"> 到期 EXP </th>
                                    <th scope="col" class="bg-pink-300">抽獎 KOCOKAN </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 指纹 FINGER PRINT </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 領 TERIMA </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
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

                                <div class="modal fade" id="edit" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">UBAH KETERANGAN</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="idbio" >
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>KETERANGAN </label>
                                                                <textarea rows="5" cols="5" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" id="save">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

    <script type="text/javascript" charset="utf-16">
        $(function(){
            var block = $('#panel_agenats');
            var block_loading = $(block).block({ 
                    message: '<i class="icon-spinner2 spinner"></i>',
                    overlayCSS: {
                        backgroundColor: '#fff',
                        opacity: 0.8,
                        cursor: 'wait',
                        'box-shadow': '0 0 0 1px #ddd'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'none'
                    }
                });

            $('#mark_datatable').dataTable({
                sProcessing: block_loading,
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: '400px',
                ordering: false,
                sorting: false,
                fixedColumns: {
                    leftColumns: 4,
                    rightColumns: 0
                },
                columnDefs: [
                    {
                        render: function (data, type, full, meta) {
                            return "<div class='text-wrap width-160'>" + data + "</div>";
                        },
                        targets: 1
                    },
                    {
                        render: function (data, type, full, meta) {
                            return "<div class='text-wrap width-200'>" + data + "</div>";
                        },
                        targets: 2
                    },
                    {
                        render: function (data, type, full, meta) {
                            return "<div class='text-wrap width-200'>" + data + "</div>";
                        },
                        targets: 3
                    },
                    {
                        render: function (data, type, full, meta) {
                            return "<div class='text-wrap width-200'>" + data + "</div>";
                        },
                        targets: 4
                    }
                ],
                "autoWidth": true,
                ajax: {
                    "url"       : "<?php echo site_url('admin_mark/formal_show') ?>",
                    "type"      : "POST"
                },
                "initComplete": function() {
                    $(block).unblock()
                }
            });

            $('#tampil_agen').click(function(e) {
                var kode = $('select[name=kodegroup]').val();
                e.preventDefault();
                var block = $('#panel_agenats');
                $(block).block({ 
                    message: '<i class="icon-spinner2 spinner"></i>',
                    overlayCSS: {
                        backgroundColor: '#fff',
                        opacity: 0.8,
                        cursor: 'wait',
                        'box-shadow': '0 0 0 1px #ddd'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'none'
                    }
                });

                $.ajax({
                    url             : "<?php echo site_url('admin_mark/formal_setagen') ?>",
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    data            : {
                        kodegroup: kode,
                        tl: $('#panel_agenbwh').text()
                    },
                    success: function(data)
                    {
                        $('#mark_datatable').DataTable().ajax.reload();
                        $('#panel_agenbwh').text(data.title);
                        $('select[name=kodegroup]').val(data.kodegroup).change();
                        $(block).unblock();
                    },
                    timeout: 3000
                });
            });

            $('.rubah_statterbang').click(function(e) {
                var id = $(this).data('id');
                e.preventDefault();
                var block = $('#panel_agenats');
                $(block).block({ 
                    message: '<i class="icon-spinner2 spinner"></i>',
                    overlayCSS: {
                        backgroundColor: '#fff',
                        opacity: 0.8,
                        cursor: 'wait',
                        'box-shadow': '0 0 0 1px #ddd'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'none'
                    }
                });

                $.ajax({
                    url             : "<?php echo site_url('admin_mark/formal_set_statterbang') ?>",
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    data            : {
                        id: id,
                        tl: $('#panel_agenbwh').text()
                    },
                    success: function(data)
                    {
                        $('#mark_datatable').DataTable().ajax.reload();
                        $('#statterbang_header').html(data.button);

                        $('#statterbangu_'+data.tipe1).removeAttr('class');
                        $('#statterbangu_'+data.tipe2).attr('class', 'active');

                        $('#panel_agenbwh').text(data.title);

                        $(block).unblock();

                    }
                });
            });

            $(document).on('click', '.mark_ubah', function() {

                var id = $(this).data('idbio');

                a = $('#edit');
                a.modal('show');
                a.find('.modal-title').text('UBAH KETERANGAN');
                a.find('#save').removeClass('save_ket1');
                a.find('#save').removeClass('save_ket2');
                a.find('#save').addClass('save_ket1');
                a.find('#save').show();

                a.find('input[name=idbio]').val(id);

                a.find("textarea[name=keterangan]").removeAttr('disabled');
                
                $.ajax({
                    url             : "<?php echo site_url('admin_mark/formal_detailket') ?>"+"/"+id,
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    success: function(data) 
                    {
                        a.find("textarea[name=keterangan]").val(data);
                    }
                });
            });

            $(document).on('click', '.save_ket1', function() {
                $.ajax({
                    url             : "<?php echo site_url('admin_mark/formal_updateket') ?>",
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    data            : $('.form-horizontal').serialize(),
                    success: function(data) 
                    {
                        $('#mark_datatable').DataTable().ajax.reload();
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
                            swal({
                                title: "Sukses diubah!",
                                text: (data.message),
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                            $('#edit').modal('toggle');
                        }
                    }
                });
            });

            $(document).on('click', '.mark_detail', function() {

                var id = $(this).data('idbio');

                a = $('#edit');
                a.modal('show');
                a.find('.modal-title').text('DETAIL KETERANGAN');
                a.find('#save').removeClass('save_ket1');
                a.find('#save').removeClass('save_ket2');
                a.find('#save').addClass('save_ket1');
                a.find('#save').hide();

                a.find('input[name=idbio]').val("");

                a.find("textarea[name=keterangan]").attr('disabled','disabled');

                $.ajax({
                    url             : "<?php echo site_url('admin_mark/formal_detailket') ?>"+"/"+id,
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    success: function(data) 
                    {
                        a.find("textarea[name=keterangan]").val(data);
                    }
                });

            });

            $(document).on('click', '.markket2_ubah', function() {

                var id = $(this).data('idbio');

                a = $('#edit');
                a.modal('show');
                a.find('.modal-title').text('UBAH KETERANGAN 2');
                a.find('#save').removeClass('save_ket1');
                a.find('#save').removeClass('save_ket2');
                a.find('#save').addClass('save_ket2');
                a.find('#save').show();

                a.find('input[name=idbio]').val(id);

                a.find("textarea[name=keterangan]").removeAttr('disabled');
                
                $.ajax({
                    url             : "<?php echo site_url('admin_mark/formal_detailket2') ?>"+"/"+id,
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    success: function(data) 
                    {
                        a.find("textarea[name=keterangan]").val(data);
                    }
                });
            });

            $(document).on('click', '.save_ket2', function() {
                $.ajax({
                    url             : "<?php echo site_url('admin_mark/formal_updateket2') ?>",
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    data            : $('.form-horizontal').serialize(),
                    success: function(data) 
                    {
                        $('#mark_datatable').DataTable().ajax.reload();
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
                            swal({
                                title: "Sukses diubah!",
                                text: (data.message),
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                            $('#edit').modal('toggle');
                        }
                    }
                });
            });

            $(document).on('click', '.markket2_detail', function() {

                var id = $(this).data('idbio');

                a = $('#edit');
                a.modal('show');
                a.find('.modal-title').text('DETAIL KETERANGAN 2');
                a.find('#save').removeClass('save_ket1');
                a.find('#save').removeClass('save_ket2');
                a.find('#save').addClass('save_ket2');
                a.find('#save').hide();

                a.find('input[name=idbio]').val("");

                a.find("textarea[name=keterangan]").attr('disabled','disabled');

                $.ajax({
                    url             : "<?php echo site_url('admin_mark/formal_detailket2') ?>"+"/"+id,
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    success: function(data) 
                    {
                        a.find("textarea[name=keterangan]").val(data);
                    }
                });

            });


        });
    </script>