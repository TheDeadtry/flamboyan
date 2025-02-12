<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Keadaan TKI </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Detail Keadaan TKI </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


<div class="row-fluid " >

    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
        <div class='box-header blue-background'>
            <div class='title'>Detail Keadaan TKI</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link">
                    <i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link">
                </a>
            </div>
        </div>
        <div class='box-content box-no-padding'>
            <?php 
                foreach ($tampil_data_personal as $row) 
                { 
            ?>
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
        ?>
                        <?php 
                            $this->load->view('template/menuadministrasi');
                        ?>
                    </div>

                    <div class="span9">
                        <?php 
                            if ( $row->skill1 == "" )
                            {
                        ?>
                                <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                        <?php 
                            }
                            else
                            {
                        ?>
                                <h4>
                                    <?php echo $row->nama;?> 
                                    <br />
                                    <small>
                                        <?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?>
                                    </small>
                                </h4>
                        <?php 
                            }
                        ?>

                        <?php   
                            if( $hitungterbang == 0 )
                            {
                        ?>
                                <div class="alert alert-info">
                                    <button data-dismiss="alert" class="close"> x </button> 
                                    Silahkan menambahkan data pada tombol ini... 
                                    <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                                </div>
                        <?php
                            }
                            else
                            { 
                        ?>
                                <div class="alert alert-info">
                                    <button data-dismiss="alert" class="close"> x </button> 
                                    silahkan menambahkan data pada tombol ini...  
                                    <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                                </div>

                        <?php 
                            }
                        ?>

                        <div class="row-fluid">
                            <div class='span12 box bordered-box orange-border'>
                                <div class='box-header orange-background'>
                                    <div class='title'>Data Keadaan Setelah Terbang</div>
                                    <div class='actions'>
                                        <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                        </a>
                                        <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                        </a>
                                    </div>
                                </div>
                                <div class='box-content box-no-padding'>
                                    <div class='responsive-table'>
                                        <div class='scrollable-area'>
                                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Option</th>
                                                        <th>Tanggal Kejadian</th>
                                                        <th>Kejadian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $no = 1; 
                                                        foreach ($tampil_data as $row) 
                                                        { 
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $no;?></td>
                                                                <td>
                                                                    <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>">
                                                                        <span>Edit</span>
                                                                    </a>  
                                                                    <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>">
                                                                        <span>Hapus</span>
                                                                    </a>  
                                                                </td>
                                                                <td><?php echo $row->tanggal ?></td>
                                                                <td><?php echo $row->keadaan_nama ?></td>
                                                            </tr>

                                                            <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                                                                <div class='modal-header'>
                                                                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                                                    <h3>Update Keadaan</h3>
                                                                </div>  
                                                                <form class="form-horizontal" method="post" action="<?php echo site_url('keadaan_tki/ubah'); ?>">
                                                                    <div class="modal-body">
                                           
                                                                        <input type="text" name="id" value="<?php echo "". $row->id; ?>" class="hidden" />

                                                                        <div class="control-group" >
                                                                            <label class="control-label span4">Tanggal Kejadian</label>
                                                                            <div class="controls">
                                                                                <div class='datepicker input-append' id='datepicker'>
                                                                                    <input class='input-medium' name="tanggal" value="<?php echo "". $row->tanggal; ?>" placeholder='Select datepicker' type='text'/>
                                                                                    <span class='add-on'>
                                                                                        <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group" id="office">
                                                                            <label class="control-label span4">Keadaan</label>
                                                                            <div class="controls">
                                                                                <select name="keadaan" class="input-medium">
                                                                                    <option value="<?php echo $row->keadaan_id ?>"><?php echo $row->keadaan_nama ?></option>
                                                                                    <?php
                                                                                        foreach ( $tampil_data_keadaan as $row23 )
                                                                                        {
                                                                                    ?>
                                                                                            <option value="<?php echo $row23->id ?>"><?php echo $row23->nama ?></option>
                                                                                    <?php 
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </form>
                                                            </div>


                                                            <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form class="form-horizontal" method="post" action="<?php echo site_url('keadaan_tki/hapus'); ?>">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                                <h4 class="modal-title">Hapus Data Kondisi</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $row->id; ?>">
                                                                                <p>Apakah anda yakin akan menghapus data Kondisi ini? : <?php echo $row->tanggal; ?></p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    <?php 
                                                        $no++;
                                                        } 
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  

                    </div>
            <?php 
                }
            ?>
            
        </div>
    </div>
</div>

            <div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Keadaan</h3>
                </div>
                <form action="<?php echo site_url('keadaan_tki/tambah');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                    <div class='modal-body'>
                        <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                        <div class="control-group" >
                            <label class="control-label span4">Tanggal Kejadian</label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                    <input class='input-medium' name="tanggal" data-format="yyyy.MM.dd" placeholder='Select datepicker' type='text'/>
                                    <span class='add-on'>
                                        <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="control-group" id="office">
                            <label class="control-label span4">Keadaan</label>
                            <div class="controls">
                                <select name="keadaan" class="input-medium">
                                    <option></option>
                                    <?php
                                        foreach ( $tampil_data_keadaan as $row23 )
                                        {
                                    ?>
                                            <option value="<?php echo $row23->id ?>"><?php echo $row23->nama ?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button class='btn' data-dismiss='modal'>Close</button>
                        <button class='btn btn-primary'>Save changes</button>
                    </div>
                </form>
            </div>
