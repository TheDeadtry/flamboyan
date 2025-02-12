<style>
.map {
    position:relative
}
.map_title {
    position:absolute;
    border:3px solid red;
    background-color:red;
    text-align:center;
    display:block;
    cursor:pointer;
    font-family: "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 17px;
    font-weight: bold;
}
.map_title span {
    position: relative;
    top: 0%;
    color: white;
    transform: translateY(-45%);
}
</style>
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 style="font-family: Montserrat;font-weight: 400;color: #222222;font-size: 17.5px;" align="center"><b>MES 1</b></h4>
                    </div>

                    <div class="panel-body">
                        <div class="row" style="margin-bottom:30px;">
                            <div class="col-lg-12">
                                    <div class="map">
                                        <img <?php echo $opt; ?> src="<?php echo base_url('assets/dewa/denah/'.$type.'.jpeg?'.strtotime(date())) ?>" usemap="#map_example">
                                    </div>
                                    <map name="map_example">
                                        <?php
                                            if ($type == 'mes1') {
                                                $z3 = 0;
                                                for($x=1;$x<=10;$x++) {
                                                ?>
                                                    <area target="" alt="A<?php echo $x ?>" title="A<?php echo $x ?>" href="" coords="849,<?php echo 369+$z3 ?>,1055,<?php echo 422+$z3 ?>" shape="rect">
                                                <?php
                                                    if ($x <= 9) {
                                                ?>
                                                        <area target="" alt="B<?php echo $x ?>" title="B<?php echo $x ?>" href="" coords="639,<?php echo 369+$z3 ?>,839,<?php echo 422+$z3 ?>" shape="rect">
                                                        <area target="" alt="C<?php echo $x ?>" title="C<?php echo $x ?>" href="" coords="427,<?php echo 369+$z3 ?>,627,<?php echo 422+$z3 ?>" shape="rect">
                                                <?php
                                                    }
                                                    if ($x <= 6) {
                                                ?>
                                                        <area target="" alt="D<?php echo $x ?>" title="D<?php echo $x ?>" href="" coords="217,<?php echo 533+$z3 ?>,416,<?php echo 599+$z3 ?>" shape="rect">
                                                <?php
                                                    }
                                                    $z3 += 85;
                                                } 
                                            } else if ($type == 'mes2') {
                                                $zd1 = 0;
                                                for($x=1;$x<=10;$x++) {
                                                ?>
                                                    <area target="" alt="E<?php echo $x ?>" title="E<?php echo $x ?>" href="" coords="<?php echo 230+$zd1 ?>,145,<?php echo 310+$zd1 ?>,230" shape="rect">
                                                <?php
                                                    $zd1 += 90;
                                                } 
                                                $zd1 = 0;
                                                for($x=1;$x<=7;$x++) {
                                                ?>
                                                    <area target="" alt="F<?php echo $x ?>" title="F<?php echo $x ?>" href="" coords="<?php echo 500+$zd1 ?>,280,<?php echo 580+$zd1 ?>,370" shape="rect">
                                                <?php
                                                    $zd1 += 90;
                                                } 
                                                $zd1 = 0;
                                                for($x=1;$x<=3;$x++) {
                                                ?>
                                                    <area target="" alt="G<?php echo $x ?>" title="G<?php echo $x ?>" href="" coords="<?php echo 590+$zd1 ?>,375,<?php echo 670+$zd1 ?>,450" shape="rect">
                                                <?php
                                                    $zd1 += 90;
                                                } 
                                                $zd1 = 0;
                                                for($x=4;$x<=10;$x++) {
                                                ?>
                                                    <area target="" alt="G<?php echo $x ?>" title="G<?php echo $x ?>" href="" coords="<?php echo 410+$zd1 ?>,525,<?php echo 480+$zd1 ?>,610" shape="rect">
                                                <?php
                                                    $zd1 += 90;
                                                } 
                                                ?>
                                                    <area target="" alt="G11" title="G11" href="" coords="950,620,1050,680" shape="rect">
                                                    <area target="" alt="G12" title="G12" href="" coords="950,690,1050,750" shape="rect">
                                                <?php
                                                $zd1 = 0;
                                                for($x=1;$x<=6;$x++) {
                                                ?>
                                                    <area target="" alt="I<?php echo $x ?>" title="I<?php echo $x ?>" href="" coords="<?php echo 500+$zd1 ?>,850,<?php echo 570+$zd1 ?>,950" shape="rect">
                                                <?php
                                                    $zd1 += 90;
                                                } 
                                                $zd1 = 0;
                                                for($x=7;$x<=14;$x++) {
                                                ?>
                                                    <area target="" alt="I<?php echo $x ?>" title="I<?php echo $x ?>" href="" coords="<?php echo 600+$zd1 ?>,990,<?php echo 680+$zd1 ?>,1080" shape="rect">
                                                <?php
                                                    $zd1 += 90;
                                                }
                                                $zd1 = 0;
                                                for($x=1;$x<=12;$x++) {
                                                ?>
                                                    <area target="" alt="H<?php echo $x ?>" style="font-size:12px;" title="H<?php echo $x ?>" href="" coords="1230,<?php echo 310+$zd1 ?>,1380,<?php echo 355+$zd1 ?>" shape="rect">
                                                <?php
                                                    $zd1 += 53;
                                                }
                                                $zd1 = 0;
                                                for($x=1;$x<=14;$x++) {
                                                ?>
                                                    <area target="" alt="J<?php echo $x ?>" style="font-size:12px;" title="J<?php echo $x ?>" href="" coords="190,<?php echo 310+$zd1 ?>,320,<?php echo 355+$zd1 ?>" shape="rect">
                                                <?php
                                                    $zd1 += 53;
                                                }
                                            } else if ($type == 'mes3') {
                                                $datacoord = [
                                                    1,6,7,12,14,19,22,27
                                                ];
                                                $datacoord2 = [
                                                    2,5,8,11,15,18,23,26
                                                ];
                                                $datacoord3 = [
                                                    3,4,9,10,16,17,24,25
                                                ];
                                                $datacoord4 = [
                                                    13,20,21,28
                                                ];
                                                $zd1 = 0;
                                                $zd2 = 0;
                                                $zd3 = 0;
                                                $zd4 = 0;
                                                foreach($datacoord as $v) {
                                                ?>
                                                    <area target="" alt="atas_<?php echo $v ?>" title="atas_<?php echo $v ?>" href="" coords="430,<?php echo 90+$zd1 ?>,540,<?php echo 190+$zd1 ?>" shape="rect">
                                                    <area target="" alt="bawah_<?php echo $v ?>" title="bawah_<?php echo $v ?>" href="" coords="541,<?php echo 90+$zd1 ?>,650,<?php echo 190+$zd1 ?>" shape="rect">
                                                <?php
                                                    $zd1 += 130;
                                                } 
                                                foreach($datacoord2 as $v) {
                                                ?>
                                                    <area target="" alt="atas_<?php echo $v ?>" title="atas_<?php echo $v ?>" href="" coords="750,<?php echo 90+$zd2 ?>,850,<?php echo 190+$zd2 ?>" shape="rect">
                                                    <area target="" alt="bawah_<?php echo $v ?>" title="bawah_<?php echo $v ?>" href="" coords="851,<?php echo 90+$zd2 ?>,950,<?php echo 190+$zd2 ?>" shape="rect">
                                                <?php
                                                    $zd2 += 130;
                                                } 
                                                foreach($datacoord3 as $v) {
                                                ?>
                                                    <area target="" alt="atas_<?php echo $v ?>" title="atas_<?php echo $v ?>" href="" coords="1070,<?php echo 90+$zd3 ?>,1170,<?php echo 190+$zd3 ?>" shape="rect">
                                                    <area target="" alt="bawah_<?php echo $v ?>" title="bawah_<?php echo $v ?>" href="" coords="1171,<?php echo 90+$zd3 ?>,1270,<?php echo 190+$zd3 ?>" shape="rect">
                                                <?php
                                                    $zd3 += 130;
                                                } 
                                                foreach($datacoord4 as $v) {
                                                ?>
                                                    <area target="" alt="atas_<?php echo $v ?>" title="atas_<?php echo $v ?>" href="" coords="110,<?php echo 610+$zd4 ?>,210,<?php echo 710+$zd4 ?>" shape="rect">
                                                    <area target="" alt="bawah_<?php echo $v ?>" title="bawah_<?php echo $v ?>" href="" coords="211,<?php echo 610+$zd4 ?>,310,<?php echo 710+$zd4 ?>" shape="rect">
                                                <?php
                                                    $zd4 += 130;
                                                } 
                                            } else if ($type == 'mes4') {
                                                $datacoord = [
                                                    1,6,7,12,13,18,19,24,25,30,31,36,37,42,43,48,49,54,55,60,61
                                                ];
                                                $datacoord3 = [
                                                    3,4,9,10,15,16,21,22,27,28,33,34,39,40,45,46,51,52,57,58,63
                                                ];
                                                $zd1 = 0;
                                                $zd2 = 0;
                                                $zd3 = 0;
                                                foreach($datacoord as $v) {
                                                ?>
                                                    <area target="" alt="atas_<?php echo $v ?>" title="atas_<?php echo $v ?>" href="" coords="430,<?php echo 90+$zd1 ?>,650,<?php echo 190+$zd1 ?>" shape="rect">
                                                <?php
                                                    $zd1 += 130;
                                                } 
                                                for($v=2;$v<63;$v+=3) {
                                                ?>
                                                    <area target="" alt="atas_<?php echo $v ?>" title="atas_<?php echo $v ?>" href="" coords="750,<?php echo 90+$zd2 ?>,950,<?php echo 190+$zd2 ?>" shape="rect">
                                                <?php
                                                        $zd2 += 130;
                                                }
                                                foreach($datacoord3 as $v) {
                                                ?>
                                                    <area target="" alt="atas_<?php echo $v ?>" title="atas_<?php echo $v ?>" href="" coords="1350,<?php echo 90+$zd3 ?>,1450,<?php echo 190+$zd3 ?>" shape="rect">
                                                <?php
                                                    $zd3 += 130;
                                                } 
                                            }
                                        ?>
                                    </map> 
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
$(function () {
    // show title on mosue enter
    /*$('area').mouseenter(function () {
        // takes the coordinates
        var title = $(this).attr('title');
        var coor = $(this).attr('coords');
        var coorA = coor.split(',');
        var left = coorA[0];
        var top = coorA[1];
        var right = coorA[2];
        var bottom = coorA[3];

        // in order to properly calculate the height and width
        // left position must be less than the right
        if ( left > right) {
        console.log(left+' '+right);
            var tmp = right;
            right = left;
            left = tmp;
        }
        // The same applies to top and bottom
        if (top > bottom) {
console.log(bottom+' '+top);
            var tmp = top;
            top = bottom;
            bottom = tmp;
        }
        // has an error / bug when the mouse moves upward seat2 map will not hide
        // this works
        top--;

        // calculate the width and height of the rectangle
        var width = right - left;
        var height = bottom - top;
console.log(width+' '+height);
        // sets the position, the sizes and text for title
        // show the title
        var $map_title = $('#map_title');
        $map_title.find('span').text(title);
        $map_title.css({
            top: top + 'px',
            left: left + 'px',
            width: width,
            height: height
        }).show();
    })

    // hide title on mouse leave
    $('#map_title').mouseleave(function () {
        $(this).hide();
    })*/

    $.ajax({
            url             : "<?php echo site_url('blk_denah/mes_getdataall/'.$type) ?>",
            dataType        : 'json',
            encode          : true,
            success: function(datajson) 
            {
                $('area').each(function (i) {
                    var title = $(this).attr('title');
                    var coor = $(this).attr('coords');
                    var style = $(this).attr('style');
                    var coorA = coor.split(',');
                    var left = coorA[0];
                    var top = coorA[1];
                    var right = coorA[2];
                    var bottom = coorA[3];
                    console.log(datajson);
                    let dtjs = datajson[title]['no'];
                    let dtjs2 = datajson[title]['id'];
                    let dtjs3 = datajson[title]['tgl'];

                    if (dtjs != 'KOSONG' && dtjs != '') {
                        bgcolor = 'green';
                        brcolor = '3px solid green';
                    } else {
                        bgcolor = 'red';
                        brcolor = '3px solid red';
                    }
                    /*if ( left > right) {
                        var tmp = right;
                        right = left;
                        left = tmp;
                    }
                    
                    if (top > bottom) {
                        var tmp = top;
                        top = bottom;
                        bottom = tmp;
                    }*/
                    top--;

                    var width = right - left;
                    var height = bottom - top;
                    
                    let text = `<div class="map_title map_title_${i}" style="${style}" data-id="${dtjs2}" data-no="${dtjs}" data-tgl="${dtjs3}"><span>${title} <br/> ${dtjs}</span></div>`;
                    $('.map').append(text);
                    var $map_title = $(`.map_title_${i}`);
                    $map_title.css({
                        top: top + 'px',
                        left: left + 'px',
                        width: width,
                        height: height,
                        'background-color': bgcolor,
                        border : brcolor,
                    });
                });
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
})
</script>