
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> AGEN - KEUANGAN TKI TERBANG KE AGEN</span>
                </h2>
            </div>
        </div>  
    </div>


    <div class="row">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <form action="<?php echo site_url('new_perincian_keuangan_pt/detail_input_fee/'.$id) ?>" method="post">
                            
                            <div class="panel-heading bg-primary">
                                <h4 class="panel-title">
                                    <a class="btn btn-xs bg-warning" href="<?php echo site_url('new_perincian_keuangan_pt/index'); ?>">KEMBALI</a>
                                </h4>
                                <div class="heading-elements">
                                    <button type="submit" class="btn btn-xs bg-success">SIMPAN</button>
                                </div>
                            </div>


                            <div class="panel-body">

                                <table class="table table-xxs table-striped" id="dkrh_table2">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>Agen</td>
                                            <td>Tanggal Terbang</td>
                                            <td>No<br/>Nama</td>
                                            <td>Kredit</td>
                                            <td>Nilai Fee (NT)</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>

                            <div class="panel-footer">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    
                </div>

            </div>

            
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#form_per_group').hide();
            $('#form_per_agen').hide();
            $('input[name=tgl_transfer]').val('<?php echo date("Y.m.d") ?>');
            $('input[name=catatan]').val('');
            $('input[name=tgl1]').val('');
            $('input[name=tgl2]').val('');
            $('.change_minplus_hidden').val('+');

            $.ajax({
                url        : "<?php echo site_url('new_perincian_keuangan_pt/detail_show_table/'.$id) ?>",
                type       : "POST",
                dataType   : 'json',
                encode     : true,
                success: function(data) {
                    $('#dkrh_table2 > tbody')
                    .find('tr')
                    .remove()
                    .end()
                    .append(data);
                }
            });
        });

        $('#pilihan_agen').change(function() {
            var id = $(this).val();
            $('#form_per_group').hide();
            $('#form_per_agen').hide();
            if ( id == 1 )
            {

            }
            else if ( id == 2 )
            {
                $.ajax({
                    url        : "<?php echo site_url('new_perincian_keuangan_pt/index_ambil_agen') ?>",
                    type       : "POST",
                    dataType   : 'json',
                    encode     : true,
                    success: function(data) {
                        $('#pilih_agen')
                        .find('option')
                        .remove()
                        .end()
                        .append(data);
                        $('#form_per_group').hide();
                        $('#form_per_agen').show();
                    }
                });
            }
            else if ( id == 3 )
            {
                $.ajax({
                    url        : "<?php echo site_url('new_perincian_keuangan_pt/index_ambil_group') ?>",
                    type       : "POST",
                    dataType   : 'json',
                    encode     : true,
                    success: function(data) {
                        $('#pilih_group')
                        .find('option')
                        .remove()
                        .end()
                        .append(data);
                        $('#pilih_group').val("").change();
                        $('#form_per_group').show();
                        $('#form_per_agen').hide();
                    }
                });
            }
        });

        $(document).on("click", ".remove_btn", function() {
            $(this).parent().parent().parent().remove();
        });

        $(document).on('keyup', '.biaya_fee',function(event) {
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            if(event.which == 88 ) {
                $(this).val('X');
                return;
            }

            // format number
            $(this).val(function(index, value) {
                var vv = value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                return vv;
            });
        });

        $(document).on('click', '.add_new_row', function() {
            var no = $(this).parent().parent().find('.change_minplus_hidden').attr('name');
            var no2 = $(this).parent().parent().find('.biaya_fee').attr('name');

            $(this).parent().parent().parent().append(
                '<div class="input-group">'+
                    '<span class="input-group-btn">'+
                        '<button class="btn btn-default change_minplus" type="button"><i class="icon-plus2"></i></button>'+
                    '</span>'+
                    '<input type="hidden" class="change_minplus_hidden" value="+" name="'+no+'" />'+
                    '<input type="text" class="form-control biaya_fee" value="35.000" name="'+no2+'" />'+
                    '<span class="input-group-btn">'+
                        '<button class="btn btn-default remove_this_row" type="button"><i class="icon-trash"></i></button>'+
                    '</span>'+
                '</div>'
            );
        });

        $(document).on('click', '.remove_this_row', function() {
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.change_minplus', function() {
            var class2 = $(this).find('i').attr("class");
            if ( class2 == 'icon-plus2' )
            {
                $(this).find('i').attr('class', 'icon-minus2');
                $(this).parent().parent().find('.change_minplus_hidden').val("-");
            }
            else if ( class2 == 'icon-minus2' )
            {
                $(this).find('i').attr('class', 'icon-plus2');
                $(this).parent().parent().find('.change_minplus_hidden').val("+");
            }
        });

        $(document).on('click', '.remove_row_btn', function() {
            $(this).parent().parent().parent().remove();
        });



/*
        $(".biaya_fee").maskMoney({
            thousands:'.', 
            allowNegative: true,
            allowEmpty: true,
            precision: 0,
            prefix: 'NT$ '
        });*/
    </script>