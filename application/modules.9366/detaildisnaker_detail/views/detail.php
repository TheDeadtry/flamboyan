
<script type="text/javascript">
    $("#navigation").change(function()
    {
        document.location.href = $(this).val();
    });
</script>
<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>DETAIL DISNAKER HISTORIKAL [<?php echo $idbio;?>] </i></b></h5>

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
                                <table class="table table-lg table-bordered table-striped table-hover" id="datatable_123">
                                    <thead>
                                        <tr>
                                            <th max-width="100%" style="text-align:center">No</th>
                                            <th>*</th>
                                            <th>Tanggal/IP Edit/PC</th>
                                            <th class="span3"> Tanggal BUAT</th>
                                            <th class="span3"> Tanggal TERIMA</th>
                                            <th class="span3"> No disnaker</th>
                                            <th class="span3"> tglonline</th>
                                            <th class="span2"> Nama</th>
                                            <th class="span2"> Tempatlahir</th>
                                            <th class="span2"> Tanggal Lahir</th>
                                            <th class="span2"> Nomor KTP</th>
                                            <th class="span2"> Jenis Kelamin</th>
                                            <th class="span2"> agama</th>
                                            <th class="span2"> status</th>
                                            <th class="span2"> pendidikan</th>
                                            <th class="span2"> alamat</th>
                                            <th class="span2"> namaayah</th>
                                            <th class="span2"> namaibu</th>
                                            <th class="span2"> alamat Orang Tua</th>
                                            <th class="span2"> Nama Pasangan</th>
                                            <th class="span2"> Alamat Pasangan</th>
                                            <th class="span2"> namakontak</th>
                                            <th class="span2"> alamatkontak</th>
                                            <th class="span2"> telpkontak</th>
                                            <th class="span2"> Hubungan Kontak</th>
                                            <th class="span2"> Negara</th>
                                            <th class="span2"> Jabatan</th>
                                            <th class="span2"> Nama Ahli Waris</th>
                                            <th class="span2"> Kota Ahli Waris</th>
                                            <th class="span2"> Jumlah anak dibawah umur 18 tahun dan belum menikah</th>
                                            <th class="span2"> Agency</th>
                                            <th class="span2"> Mata Uang</th>
                                            <th class="span2"> Sektor Usaha</th>
                                            <th class="span2"> Gaji TKI</th>
                                            <th class="span2"> No Paspor</th>
                                            <th class="span2"> Masa Berlaku</th>
                                            <th class="span2"> Masa Habis</th>
                                            <th class="span2"> Tgl Berangkat</th>
                                            <th class="span2"> Tgl Tiba</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php 
                                            $no = 1;
                                            foreach ($tampil_data as $row) {
                                        ?>
                                            <tr>
                                                <td style="text-align:center" ><?php echo $no ?></td>
                                                <td> <?php echo $row->ztipe ?></td>
                                                <td> <?php echo $row->date_created.' / '.$row->ip.' / '.$row->pc ?></td>
                                                <td> <?php echo $row->tglterima;?> </td>
                                                <td> <?php echo $row->tglbuat;?> </td>
                                                <td> <?php echo $row->nodisnaker;?> </td>
                                                <td> <?php echo $row->tglonline;
                                                 $hasil= $row->perkiraan;
                                                        if($hasil=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                                <td> <?php echo $row->nama;?> </td>
                                                <td> <?php echo $row->tempatlahir;?> </td>
                                                <td> <?php echo $row->tanggallahir;?> </td>
                                                <td> <?php echo $row->noktp;?> </td>
                                                <td> <?php echo $row->jeniskelamin;?> </td>
                                                <td> <?php echo $row->agama;?> </td>
                                                <td> <?php echo $row->status;?> </td>
                                                <td> <?php echo $row->pendidikan;?> </td>
                                                <td> <?php echo $row->alamat;?> </td>
                                                <td> <?php echo $row->namaayah;?> </td>
                                                <td> <?php echo $row->namaibu;?> </td>
                                                <td> <?php echo $row->alamatortu;?> </td>
                                                <td> <?php echo $row->namapasangan;?> </td>
                                                <td> <?php echo $row->alamatpasangan;?> </td>
                                                <td> <?php echo $row->namakontak;?> </td>
                                                <td> <?php echo $row->alamatkontak;?> </td>
                                                <td> <?php echo $row->telpkontak;?> </td>
                                                <td> <?php echo $row->hubkontak;?> </td>
                                                <td> <?php echo $row->negara;?> </td>
                                                <td> <?php echo $row->jabatan;?> </td>
                                                <td> <?php echo $row->ahliwaris;?> </td>
                                                <td> <?php echo $row->namaahli;?> </td>
                                                <td> <?php echo $row->jmlanak;?> </td>
                                                <td> <?php echo $row->agency;?> </td>
                                                <td> <?php echo $row->matauang;?> </td>
                                                <td> <?php echo $row->sektorusaha;?> </td>
                                                <td> <?php echo $row->gaji;?> </td>
                                                <td> <?php echo $row->nopaspor;?> </td>
                                                <td> <?php echo $row->masaberlaku;?> </td>
                                                <td> <?php echo $row->masahabis;?> </td>
                                                <td> <?php echo $row->tglberangkat;?> </td>
                                                <td> <?php echo $row->tgltiba;?> </td>
                                                
                                                
                                            </tr>   
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
                <!-- /user profile -->

        </div>
            <!-- /main content -->

    </div>
        <!-- /page content -->


        <!-- Footer -->
      <!--   <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div> -->
        <!-- /footer -->

</div>
    <!-- /page container -->

<script type="text/javascript">
    $('#datatable_123').dataTable({
        scrollX: "TRUE",
        scrollY: "400px",
    });
</script>