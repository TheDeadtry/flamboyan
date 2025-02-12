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
            <div class='title'>Detail Bank</div>
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
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                     <?php 
                        $this->load->view('template/menudalam');
                    ?>
                                </div>

                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>
<?php   
                                  if($hitungbank==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a href="<?php echo base_url()."index.php/detailbank/vtambahbank"?>" class="btn btn-mini btn-primary">Tambah data bank</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... <a href="<?php echo base_url()."index.php/detailbank/vubahbank"?>" class="btn btn-mini btn-primary">Ubah data</a>
                        </div>
                                 <?php foreach ($tampil_data_bank as $row) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Kode Bank :</td>
                                                <td> <?php echo $row->kode_bank;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> No rekening :</td>
                                                <td> <?php echo $row->norek;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Tanggal rekening :</td>
                                                <td> <?php echo $row->tglrek;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> TTD Bank:</td>
                                                <td> <?php echo $row->ttdbank;?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> Tanggal KTKLN :</td>
                                                <td> <?php echo $row->ktkln;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>


                            
                                   
                                     <?php }

                                 } ?>

                                </div>

                                <div class="space5"></div>


                            </div>
        </div>

                </div>


