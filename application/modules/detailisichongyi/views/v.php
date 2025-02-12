
<style type="text/css">
    #satu{
        display: block;
        width: 95%;
        padding: 5px;
    }


    .modal-body label, .modal-body > input{
    padding: 15px;
    display: inline-block;
    font-size: 16px;
    }

    .inline-block{
    width: auto;
    min-width: 100px;
    display: inline-block;
    margin: 10px;
    }

    .menu-apendik a{
    min-width: 150px;
    margin: 10px;
    }


    .modal-gugus{
        position: absolute;
        position: fixed;
        display: none;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0,0,0,0.5);
        text-align: center;
    }

    .modal-pages{
        position: relative;
        display: inline-block;
        background-color: transparent;
        top: 10%;
        width: 600px;
        height: auto;
    }

    .card{
        width: 100%;
        margin: 0;
        padding: 0;
        background-color: white;
        border-radius: 3px;
        text-align: left;
    }

    .card-header,
    .card-body,
    .card-footer
    {
        width: calc(100% - 20px);
        padding: 10px;
    }

    .card-header
    {
        font-size: 25px;
        font-weight: bold;
        background-color: #aaaaFa;
        color: white;
    }

    .card-body{
        max-height: 480px;
        overflow-y: scroll;
    }

</style>


<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Isian Khusus Chongyi </span>
            </h1>
        </div>
    </div>
</div>




<div class="row-fluid">
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
                            $fotoo = base_url()."assets/uploads/".$row->foto;
                            $exif = exif_read_data($fotoo);
                            if($exif && isset($exif['Orientation']))
                            {
                                $orien = $exif['Orientation'];
                                if ($orien != 1)
                                {
                                    $img=imagecreatefromjpeg($fotoo);
                                    $deg = 0;
                                    switch ($orien)
                                    {
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
                                    if ($deg)
                                    {
                                        $img = imagerotate($img, $deg, 0);
                                        echo '<div style="display: table;"><div style="padding: 50% 0;height: 0;"><a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.$fotoo.'" style="display: block;transform-origin: top left;-ms-transform:rotate(270deg) translate(-100%); -webkit-transform:rotate(270deg) translate(-100%); transform:rotate(270deg) translate(-100%); margin-top: -50%;white-space: nowrap;" /></a></div></div>';
                                    }
                                    else
                                    {
                                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                                    }
                                }
                                else
                                {
                                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                                }
                            }
                            else
                            {
                                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                            }
                            $this->load->view('template/menuadministrasi');
                        ?>
                    </div>

                    <div class="span6">
                        <?php if($row->skill1==""){?>
                            <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                        <?php }else{?>
                            <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                        <?php }?>  
                        <?php if(count($tampil_data)==0){ ?>
                            <div class="alert alert-info">
                                <button data-dismiss="alert" class="close"> x </button> Data Belum di input.. silahkan menambahkan data pada tombol ini...
                                <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                            </div>
                        <?php }else{ ?>
                            <div class="alert alert-info">
                                <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini...
                                <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>
                            </div>
                            <?php foreach ($tampil_data as $row2) { ?>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="span3"> Kemampuan Bhs Mandarin :</td>
                                            <td> <?php echo $row2->kbm;?></td>
                                        </tr>
                                        <tr>
                                            <td class="span3"> Lama Belajar Bhs Mandarin :</td>
                                            <td> <?php echo $tampil_data_finger->total;?></td>
                                        </tr>
                                        <tr>
                                            <td class="span3"> Kemampuan Bhs Inggris :</td>
                                            <td> <?php echo $row2->kbi;?></td>
                                        </tr>
                                        <tr>
                                            <td class="span3"> Lama Belajar Bhs Inggris :</td>
                                            <td> <?php echo $row2->lbbi;?></td>
                                        </tr>
                                        <tr>
                                            <td class="span3"> Apakah ada saudara yang bekerja di Taiwan? :</td>
                                            <td> <?php echo $row2->sbt;?></td>
                                        </tr>
                                        <tr>
                                            <td class="span3"> Jika ada, Hubungannya apa? :</td>
                                            <td> <?php echo $row2->hub;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        <?php } ?>

                    </div>

                    <div class='span3 box box-transparent'>
                        <br><br><br>
                        <!--<h4>PRINT DOKUMEN </h4>
                        <div class='row-fluid'>
                            <div class=' box-quick-link blue-background'>
                                <a target='_blank' href='<?php echo site_url().'/pdf7/cetakbaru/'.$detailpersonalid; ?>'>
                                    <div class='header'>
                                        <div class='icon-book'></div>
                                    </div>
                                    <div class='content'>DL010. List Terbang</div>
                                </a>
                            </div>
                            </br>
                        </div>-->
                    </div>                              
                <?php }?>
            </div>
        </div>
    </div>
</div>


<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
    <div class='modal-header'>
        <button class='close' data-dismiss='modal' type='button'>&times;</button>
        <h3>Form in modal</h3>
    </div>
    <div class='modal-body'>
        <form action="<?php echo site_url('detailisichongyi/tambah');?>" method="post" class="form-horizontal" />
            <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
            <div class="control-group">
                <label class="control-label"> Kemampuan Bhs Mandarin </label>
                <div class="controls">
                    <select class="span7 " name="kbm" data-placeholder="Choose a Category" tabindex="1">
                            <option value="流利 Lancar" />流利 Lancar
                            <option value="好 Baik" />好 Baik
                            <option value="稍會 Sedikit-sedikit" />稍會 Sedikit-sedikit
                            <option value="初學者 Baru belajar" />初學者 Baru belajar
                        </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"> Kemampuan Bhs Inggris </label>
                <div class="controls">
                    <select class="span7 " name="kbi" data-placeholder="Choose a Category" tabindex="1">
                            <option value="流利 Lancar" />流利 Lancar
                            <option value="好 Baik" />好 Baik
                            <option value="稍會 Sedikit-sedikit" />稍會 Sedikit-sedikit
                            <option value="初學者 Baru belajar" />初學者 Baru belajar
                        </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Lama Belajar Bhs Inggris (Bulan) </label>
                <div class="controls">
                    <input class='span4'  name="lbbi"  placeholder='' type='number' /> Bulan
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"> Apakah ada saudara yang bekerja di Taiwan? </label>
                <div class="controls">
                    <select class="span7 " name="sbt" data-placeholder="Choose a Category" tabindex="1">
                        <option value="無 TIDAK ADA" />無 TIDAK ADA
                        <option value="有 ADA" />有 ADA
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jika ada, Hubungannya apa? </label>
                <div class="controls">
                    <input class='span7'  name="hub"  placeholder='' type='text' />
                </div>
            </div>
        </div>
        <div class='modal-footer'>
            <button class='btn' data-dismiss='modal'>Close</button>
            <button class='btn btn-primary'>Save changes</button>
        </div>
    </form>
</div>


<?php foreach ($tampil_data as $row2) { ?>
    <div class='modal hide fade' id='ubah' role='dialog' tabindex='-1'>
        <div class='modal-header'>
            <button class='close' data-dismiss='modal' type='button'>&times;</button>
            <h3>Form in modal</h3>
        </div>
        <div class='modal-body'>
            <form action="<?php echo site_url('detailisichongyi/ubah');?>" method="post" class="form-horizontal" />
                <input type="text" name="id" value="<?php echo $row2->id ?>" class="hidden" />
                <input type="text" id="idbiodata" name="idbiodata" value="<?php echo $row2->id_biodata ?>" class="hidden" />
                <div class="control-group">
                    <label class="control-label"> Kemampuan Bhs Mandarin </label>
                    <div class="controls">
                        <select class="span7 " name="kbm" data-placeholder="Choose a Category" tabindex="1">
                            <option value="<?php echo $row2->kbm ?>" /><?php echo $row2->kbm ?>
                            <option value="流利 Lancar" />流利 Lancar
                            <option value="好 Baik" />好 Baik
                            <option value="稍會 Sedikit-sedikit" />稍會 Sedikit-sedikit
                            <option value="初學者 Baru belajar" />初學者 Baru belajar
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"> Kemampuan Bhs Inggris </label>
                    <div class="controls">
                        <select class="span7 " name="kbi" data-placeholder="Choose a Category" tabindex="1">
                            <option value="<?php echo $row2->kbi ?>" /><?php echo $row2->kbi ?>
                            <option value="流利 Lancar" />流利 Lancar
                            <option value="好 Baik" />好 Baik
                            <option value="稍會 Sedikit-sedikit" />稍會 Sedikit-sedikit
                            <option value="初學者 Baru belajar" />初學者 Baru belajar
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Lama Belajar Bhs Inggris (Bulan) </label>
                    <div class="controls">
                        <input class='span4'  name="lbbi"  placeholder='' type='number' value="<?php echo $row2->lbbi ?>" /> Bulan
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"> Apakah ada saudara yang bekerja di Taiwan? </label>
                    <div class="controls">
                        <select class="span7 " name="sbt" data-placeholder="Choose a Category" tabindex="1">
                            <option value="<?php echo $row2->sbt ?>" /><?php echo $row2->sbt ?>
                            <option value="無 TIDAK ADA" />無 TIDAK ADA
                            <option value="有 ADA" />有 ADA
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Jika ada, Hubungannya apa? </label>
                    <div class="controls">
                        <input class='span7'  name="hub"  placeholder='' type='text' value="<?php echo $row2->hub ?>" />
                    </div>
                </div>
            </div>
            <div class='modal-footer'>
                <button class='btn' data-dismiss='modal'>Close</button>
                <button class='btn btn-primary'>Update</button>
            </div>
        </form>
    </div>
<?php } ?>