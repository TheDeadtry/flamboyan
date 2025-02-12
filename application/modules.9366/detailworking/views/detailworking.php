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
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
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
                        $this->load->view('template/menudalam');
                    ?>
                                </div>

                                <div class="span9">
                                      <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>                                <?php }?>

<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan menambahkan data pada tombol ini... 
                          <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>

                        </div>
                              
                                                          <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Working Experience</div>
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
                                             <th>Ubah</th>
                                                 <th>Hapus</th>
                                            <th>negara</th>
                                            <th>jenis usaha</th>
                                            <th>nama perusahaan</th>
                                             <th>posisi</th>
                                             <th>Barang diproduksi</th>
                                             <th>penjelasan Kerja</th>
                                             <th>masa kerja</th>
                                             <th>tahun masa kerja</th>
                                             <th>alasan Berhenti</th>
                                             <th>gaji</th>
                                              


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_working as $row) { ?>


                                        <tr>
                                            <td><?php echo $no;?></td>
                                              <td>  <a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/pernyataan_persetujuan_tenaga_kerja/ubah_data_working/"?><?php echo $row->id_working; ?>"> ubah </a></td>
                                        <td>  <a type="button" onclick="return deletechecked();" class="btn btn-mini" href="<?php echo base_url()."index.php/tambahworking/hapusworking/"?><?php echo $row->id_working; ?>">hapus </a></td>
                                            <td><?php echo $row->negara;?></td>
                                            <td><?php echo $row->isi."".$row->mandarin;?></td>
                                            <td><?php echo $row->nama_perusahaan;?></td>
                                            <td><?php echo $row->posisi;?></td>
                                            <td><?php echo $row->barangdiproduksi;?></td>
                                            <td><?php echo $row->penjelasan;?></td>
                                            <td><?php echo $row->masa_kerja;?> <?php echo $row->masabulan;?></td>
                                            <td><?php echo $row->tahun;?></td>
                                            <td><?php echo $row->alasan;?></td>

                                            <?php $detail_gaji = $row->detail_gaji;?>
                                            <?php $gaji_dibayar = str_replace("/", "", $detail_gaji) ?>
                                            <?php 
                                            if ($gaji_dibayar == "bulan") {
                                                $dibayarper = "月";
                                            }
                                            elseif ($gaji_dibayar == "minggu") {
                                                
                                                $dibayarper = "週";
                                            }
                                            elseif ($gaji_dibayar == "hari") {
                                                
                                                $dibayarper = "這一天";
                                            }
                                            else
                                            {
                                                $dibayarper = "belum dipilih";
                                            }


                                             ?>
                                            <td><?php echo htmlspecialchars($row->satuan).', '.$row->gaji.' '.htmlspecialchars($detail_gaji).htmlspecialchars($dibayarper);?></td>


                                      
                                            
                                        </tr>
                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                 </table>    
                        </div>
                     </div>
                 </div>
             </div>


                                </div>

                                <div class="space5"></div>

                                
                            </div>
        </div>
    </div>                   
          <div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('tambahworking/tambahworkingdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                                <div class="control-group">
                                                                <label class="control-label"> 受雇國家 Negara</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="negara" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_negara as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label"> 業務類別 Jenis Usaha </label>
                                                                <div class="controls span7">
                                                                   <?php   echo form_dropdown("id_kategori",$option_posisi,"","id='posisi_id'"); ?>
                                                                               <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                                                </div>
                                                            </div>

                                                             <div class="control-group" id="jelasin">
                                                                <label class="control-label"> 工作性質 Penjelasan pekerjaan </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_pekerjaan",array('Pilih Penjelasan'=>'Pilih Jenis Usaha Dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label"> 職務 Posisi </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="posisi" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($pilihan_posisi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            
                                                        <div class="control-group">
                                                            <label class="control-label"> Barang Diproduksi </label>
                                                            <div class="controls">
                                                                <select class="span7 " name="barangdiproduksi" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value="" />Select...
                                                                    <?php  foreach ($pilihan_barangdiproduksi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                            <div class="control-group">
                                    <label class="control-label"> 受雇期間 Masa Kerja</label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Masa Kerja" name="masakerja" class="chosen span5" tabindex="-1" id="masakerja">
                                            <option value="" />
                                         <optgroup label="tahun">
                                                <?php 
                                                for($i=1;$i<=50;$i++){?>

                                                    <option value="<?php echo"".$i." tahun 年" ?>" /><?php echo"".$i." tahun 年" ?>

                                                    <?php
                                                }
                                                    ?>
                                              </optgroup>

                                        </select>

                                        <select name="masabulan" class="chosen span5" tabindex="-1">
                                            <option value="" />
                                        <optgroup label="bulan">
                                                <?php 
                                                for($i=1;$i<=12;$i++){?>
                                                    <option value="<?php echo"".$i." bulan 月" ?>" /><?php echo"".$i." bulan 月" ?>
                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                              <optgroup label="minggu">
                                         <?php 
                                                for($i=1;$i<=3;$i++){?>

                                                    <option value="<?php echo"".$i." minggu 個星期" ?>" /><?php echo"".$i." minggu 個星期" ?>

                                                    <?php
                                                }
                                                    ?>
                                         </optgroup>

                                            

                                        </select>

                                       
                                    </div>
                                </div>
                                 <div class="control-group">
                                                            <label class="control-label"> 年 Tahun</label>
                                                            <div class="controls">
                                                                <input type="text" name="tahun" class="span7 popovers" data-trigger="hover" data-content="Input data tahun dengan di pisah '-' (ex: 2010-2015) " data-original-title="Tahun masa kerja" />
                                                            </div>
                                </div>

                                                            <div class="control-group">
                                                                <label class="control-label">離職原因 Alasan berhenti bekerja </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alasan" data-placeholder="pilih kategori" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($pilihan_alasan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Nama Perusahaan </label>
                                                                <div class="controls">
                                                                    <input type="text" name="nama_perusahaan" placeholder="inputkan nama perusahaan">
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label"> Pilih Mata uang </label>
                                                                <div class="controls">
                                                                    <select name="satuan" class="chosen span5">
                                                                        <option>-- pilih --</option>
                                                                        <option value="Rp">Rp</option>
                                                                        <option value="NT">NT</option>
                                                                        <option value="IDR">IDR</option>
                                                                        <option value="USD $">USD</option>
                                                                        <option value="RM">RM</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> jumlah gaji </label>
                                                                <div class="controls">
                                                                    <input type="text" id="rupiah" name="gaji" placeholder="inputkan nama perusahaan">
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Gaji ditrima per </label>
                                                                <div class="controls">
                                                                    <select name="detail_gaji" class="chosen span5">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="/bulan">Bulan 月</option>
                                                                        <option value="/minggu">Minggu 週</option>
                                                                        <option value="/hari">Hari 這一天</option>
                                                                        <option value="/perkiraan">perkiraan</option>
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



            <script type="text/javascript">
                
                $(document).ready(function(){

                    var rupiah = document.getElementById('rupiah');
                    rupiah.addEventListener('keyup', function(e){
                      // tambahkan 'Rp.' pada saat form di ketik
                      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                      rupiah.value = formatRupiah(this.value, '');
                    });
                 
                    /* Fungsi formatRupiah */
                    function formatRupiah(angka, prefix){
                      var number_string = angka.replace(/[^,\d]/g, '').toString(),
                      split       = number_string.split(','),
                      sisa        = split[0].length % 3,
                      rupiah        = split[0].substr(0, sisa),
                      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
                 
                      // tambahkan titik jika yang di input sudah menjadi angka ribuan
                      if(ribuan){
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                      }
                 
                      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                      return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                    }

                });

            </script>