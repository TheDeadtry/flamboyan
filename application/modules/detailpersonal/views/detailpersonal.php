<?php
$sektor = Dbs::getSektor($detailpersonalid);
?>
<script type="text/javascript">
    $(document).ready(function() {

        var progressbox = $('#progressbox');
        var progressbar = $('#progressbar');
        var statustxt = $('#statustxt');
        var completed = '0%';

        var options = {
            target: '#output', // target element(s) to be updated with server response 
            beforeSubmit: beforeSubmit, // pre-submit callback 
            uploadProgress: OnProgress,
            success: afterSuccess, // post-submit callback 
            resetForm: true // reset the form after successful submit 
        };

        $('#MyUploadForm').submit(function() {
            $(this).ajaxSubmit(options);
            // return false to prevent standard browser submit and page navigation 
            return false;
        });

        //when upload progresses    
        function OnProgress(event, position, total, percentComplete) {
            //Progress bar
            progressbar.width(percentComplete + '%') //update progressbar percent complete
            statustxt.html(percentComplete + '%'); //update status text
            if (percentComplete > 50) {
                statustxt.css('color', '#fff'); //change status text to white after 50%
            }
        }

        //after succesful upload
        function afterSuccess() {
            $('#submit-btn').show(); //hide submit button
            $('#loading-img').hide(); //hide submit button

        }

        //function to check file size before uploading.
        function beforeSubmit() {
            //check whether browser fully supports all File API
            if (window.File && window.FileReader && window.FileList && window.Blob) {

                if (!$('#imageInput').val()) //check empty input filed
                {
                    $("#output").html("Are you kidding me?");
                    return false
                }

                var fsize = $('#imageInput')[0].files[0].size; //get file size
                var ftype = $('#imageInput')[0].files[0].type; // get file type

                //allow only valid image file types 
                switch (ftype) {
                    case 'image/png':
                    case 'image/gif':
                    case 'image/jpeg':
                    case 'image/pjpeg':
                        break;
                    default:
                        $("#output").html("<b>" + ftype + "</b> Unsupported file type!");
                        return false
                }

                //Allowed file size is less than 1 MB (1048576)
                if (fsize > 1048576) {
                    $("#output").html("<b>" + bytesToSize(fsize) + "</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
                    return false
                }

                //Progress bar
                progressbox.show(); //show progressbar
                progressbar.width(completed); //initial value 0% of progressbar
                statustxt.html(completed); //set status text
                statustxt.css('color', '#000'); //initial color of status text


                $('#submit-btn').hide(); //hide submit button
                $('#loading-img').show(); //hide submit button
                $("#output").html("");
            } else {
                //Output error to older unsupported browsers that doesn't support HTML5 File API
                $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
                return false;
            }
        }

        //function to format bites bit.ly/19yoIPO
        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Bytes';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }

    });
</script>
<link href="style/style.css" rel="stylesheet" type="text/css">
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url() . '/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Detail Personal </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
        <div class='box-header blue-background'>
            <div class='title'>Profile</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>


        <div class='box-content box-no-padding'>
            <?php foreach ($tampil_data_personal as $row) { ?>
                <div class="span3">



                    <?php
                    $fotoo = base_url() . "assets/uploads/" . $row->foto;
                    $exif = exif_read_data($fotoo);
                    if ($exif && isset($exif['Orientation'])) {
                        $orien = $exif['Orientation'];
                        if ($orien != 1) {
                            $img = imagecreatefromjpeg($fotoo);
                            $deg = 0;
                            switch ($orien) {
                                case 3:
                                    $deg = 180;
                                    break;
                                case 6:
                                    $deg = 270;
                                    break;
                                case 8:
                                    $deg = 90;
                                    break;
                            }
                            if ($deg) {
                                $img = imagerotate($img, $deg, 0);
                                echo '<div style="display: table;"><div style="padding: 50% 0;height: 0;"><a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="' . $fotoo . '" style="display: block;transform-origin: top left;-ms-transform:rotate(270deg) translate(-100%); -webkit-transform:rotate(270deg) translate(-100%); transform:rotate(270deg) translate(-100%); margin-top: -50%;white-space: nowrap;" /></a></div></div>';
                            } else {
                                echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="' . base_url() . "assets/uploads/" . $row->foto . '" /></a>';
                            }
                        } else {
                            echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="' . base_url() . "assets/uploads/" . $row->foto . '" /></a>';
                        }
                    } else {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="' . base_url() . "assets/uploads/" . $row->foto . '" /></a>';
                    }
                    ?>


                    <?php
                    $this->load->view('template/menudalam');
                    ?>
                </div>
                <div class="span6">
                    <?php if ($row->skill1 == "") { ?>
                        <h4>
                            <?php echo $row->nama; ?> <br /><small>
                                <?php echo "" . $detailpersonalid . "" . $row->negara1 . "" . $row->negara2 . "" . $row->calling . "" . $row->skill1 . "" . $row->skill2 . "" . $row->skill3; ?>
                            </small>
                        </h4>
                    <?php } else { ?>
                        <h4>
                            <?php echo $row->nama; ?> <br /><small>
                                <?php echo "" . $detailpersonalid . "" . $row->negara1 . "" . $row->negara2 . "" . $row->calling . "-" . $row->skill1 . "" . $row->skill2 . "" . $row->skill3; ?>
                            </small>
                        </h4>
                    <?php } ?>

                    <div class="alert alert-info">
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... <a href="<?php echo base_url() . "index.php/detailpersonal/ubahpersonal/" ?>" class="btn btn-mini
                        btn-primary">Ubah data</a>
                        <a href="<?php echo base_url() . "index.php/detailpersonal/ubahidpersonal/" ?>" class="btn btn-mini
                        btn-primary">Ubah ID</a>
                    </div>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="span3">Nama Mandarin :</td>
                                <td>
                                    <?php echo $row->nama_mandarin; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span3">Sponsor :</td>
                                <td>
                                    <?php echo $row->kode_sponsor; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span3">報到日期 Tanggal daftar :</td>
                                <td>
                                    <?php echo $row->tanggaldaftar; ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="span2"> Email :</td>
                                <td>
                                    <?php echo $row->email; ?>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $passs = "";
                                $exp = explode(" ", $row->nama);
                                if (isset($exp[0])) {
                                    $passs = $exp[0] . "f123@";
                                }
                                ?>
                                <td class="span2"> Password :</td>
                                <td>
                                    <?php echo $passs; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2">性別 Jenis kelamin :</td>
                                <td>
                                    <?php echo $row->jeniskelamin; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2">No Handphone :</td>
                                <td>
                                    <?php echo $row->notelp; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2">No Telpon Keluarga :</td>
                                <td>
                                    <?php echo $row->notelpkel; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2">國籍 Warganegara :</td>
                                <td>
                                    <?php echo $row->warganegara; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2">身 高 Tinggi Badan :</td>
                                <td>
                                    <?php echo $row->tinggi; ?> Cm 公分
                                </td>
                            </tr>
                            <tr>
                                <td class="span2">體 重 Berat Badan :</td>
                                <td>
                                    <?php echo $row->berat; ?> Kg 公斤
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 宗 教 Agama :</td>
                                <td>
                                    <?php echo $row->agama; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2">生日 Tanggal lahir :</td>
                                <td>
                                    <?php echo $row->tgllahir; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 出生地點 Tempat Lahir :</td>
                                <td>
                                    <?php echo $row->tempatlahir; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 年 齡 Umur :</td>
                                <td>
                                    <?php echo $row->umur . " tahun 嵗"; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2">婚姻狀況 Status :</td>
                                <td>
                                    <?php echo $row->status; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> Tanggal menikah / Cerai :</td>
                                <td>
                                    <?php echo $row->tglmenikah; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 教育程度 Pendidikan :</td>
                                <td>
                                    <?php echo $row->pendidikan; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> Status Pendidikan :</td>
                                <td>
                                    <?php echo $row->statuspendidikan; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 地址 Alamat :</td>
                                <td>
                                    <?php echo $row->alamat; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 省份 Propinsi :</td>
                                <td>
                                    <?php echo $row->provinsi; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 語言能力 Bahasa </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="span2"> 國語 Mandarin :</td>
                                <td>
                                    <?php echo $row->mandarin; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 台語 Taiyu (Khusus Female Informal):</td>
                                <td>
                                    <?php echo $row->taiyu; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 英語 Inggris :</td>
                                <td>
                                    <?php echo $row->inggris; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 廣東 Cantonese (Khusus Female Informal) :</td>
                                <td>
                                    <?php echo $row->cantonese; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 客家 Hakka (Khusus Female Informal) :</td>
                                <td>
                                    <?php echo $row->hakka; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> 備 注 Keterangan :</td>
                                <td>
                                    <?php echo $row->keterangan; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> Jurusan :</td>
                                <td>
                                    <?php echo $row->jurusan; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="span2"> Tanggal input :</td>
                                <td>
                                    <?php echo $row->tglinput; ?>
                                </td>
                            </tr>
                            <?php
                            $stts = substr($detailpersonalid, 0, 2);
                            if ($stts == 'FI') { ?>
                                <tr>
                                    <td class="span2"> 工作地點要求 Permintaan Lokasi Kerja :</td>
                                    <td>
                                        <?php echo $row->lokasikerja; ?>
                                    </td>
                                </tr>

                            <?php
                            } ?>
                            <tr>
                                <td class="span2"></td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="span3">
                    <h4>STATUS TKI</h4>
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="span12" value="<?php echo $row->statusaktif; ?>" data-trigger="hover" name="status" data-content="Status TKI saat INI" data-original-title="STATUS" readonly />
                        </div>
                    </div>
                    <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal">Ubah status</a>
                    <ul class="unstyled">
                        <h4>PRINT DOKUMEN</h4>
                        <!-- Button Print -->
                        <?php if($sektor == "HM" || $sektor  == 'HF' ) : ?>
                            <li>
                                <a class="btn btn-primary" href="<?php echo site_url('printout/biodata_word/1'); ?>">
                                    BIODATA <?= $sektor ?> (DOCX)
                                </a>
                            </li>

                            <li>
                                <a class="btn btn-primary" href="<?php echo site_url('printout/biodata_word/0/los'); ?>">
                                    Letter of Statement (DOCX)
                                </a>
                            </li>

                            <li>
                                <a class="btn btn-primary" href="<?php echo site_url('printout/biodata_word/0/los-lpk'); ?>">
                                    Letter of Statement LPK (DOCX)
                                </a>
                            </li>

                        <?php endif ?>

                        <li>
                            <a class="btn btn-primary" href="<?php echo site_url('printout/biodata_word/'); ?>">
                                BIODATA (DOCX)
                            </a>
                        </li>
                        <li>
                            <a class="wait-template btn btn-primary" href="<?php echo site_url('biodata_cong_yi') . '/hasil/' . $detailpersonalid; ?>">
                                BIODATA FORMAL (DOCX)
                            </a>
                        </li>
                        <li>
                            <a class="wait-template btn btn-primary" href="<?php echo site_url('biodata_cong_yi/hasil/' . $detailpersonalid); ?>">
                                BIODATA FORMAL CHONGYI (DOCX)
                            </a>
                            <!-- <a class="btn btn-primary" href="<?php echo site_url('detailisichongyi/printdata/' . $detailpersonalid); ?>">
                                BIODATA FORMAL CHONGYI (DOCX)
                            </a> -->
                        </li>
                        <!-- Button Print end -->
                    </ul>
                </div>

                <div class="space5"></div>

                <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel1">Modal Header</h3>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('detailpersonal/ubahstatus'); ?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                        <div class="control-group">
                            <label class="control-label">ID BIODATA</label>
                            <div class="controls">
                                <input type="text" readonly name="idp" value="<?php echo $detailpersonalid; ?>" required class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" readonly />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Status TKI</label>
                            <div class="controls">
                                <select class="span7 " name="statustki" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="<?php echo $row->statusaktif; ?>" />
                                    <?php echo $row->statusaktif; ?>
                                    <?php foreach ($tampil_data_pilstat as $pilihan) { ?>
                                        <option value="<?php echo $pilihan->namapilstat; ?>" />
                                        <?php echo $pilihan->namapilstat; ?>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>


</div>


<div class='modal hide fade' id='uploadfoto' role='dialog' tabindex='-2'>
    <div class='modal-header'>
        <button class='close' data-dismiss='modal' type='button'>&times;</button>
        <h3>Form in modal</h3>
    </div>
    <div class='modal-body'>
        <form action="<?php echo site_url('tambahmedical/tambahmedicaldata'); ?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

        <div id="upload-wrapper">
            <div align="center">
                <h3>Ajax Image Uploader with Progressbar</h3>
                <span class="">Image Type allowed: Jpeg, Jpg, Png and Gif. | Maximum Size 1 MB</span>
                <form action="processupload.php" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
                    <input name="image_file" id="imageInput" type="file" />
                    <input type="submit" id="submit-btn" value="Upload" />
                    <img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait" />
                </form>
                <div id="progressbox" style="display:none;">
                    <div id="progressbar"></div>
                    <div id="statustxt">0%</div>
                </div>
                <div id="output"></div>
            </div>
        </div>

        <div class='modal-footer'>
            <button class='btn' data-dismiss='modal'>Close</button>
            <button class='btn btn-primary'>Save changes</button>
        </div>
        </form>

    </div>
</div>

<script>
    for (let waiting of document.querySelectorAll(".wait-template")) {
        waiting.addEventListener("click", function(event) {
            event.preventDefault();
            let href = this.href;
            let loader = cssLoader();
            (function loadTemplate() {
                fetch("<?php echo site_url('biodata_cong_yi') . '/print_bio/' . $detailpersonalid; ?>")
                    .then(function(s) {
                        return s.text()
                    })
                    .then(function(s) {
                        loader.remove();
                        location.href = href;
                    })
            })();
        })
    }
</script>