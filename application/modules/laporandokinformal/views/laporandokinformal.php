
        <style type="text/css">

            .bg-blue-300, .bg-orange-800, .bg-orange-300 {
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



<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-4">
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h2> <span class="text-semibold">Laporan Dokumen Informal </span></h2>
                            </div>

                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                         <!-- Complex headers example -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Filter Data <br> </h5>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="<?php echo site_url('laporandokinformal/setpilih'); ?>">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Pilih Agen</label>
                                    <div class="col-lg-10">
                                        <select  name="idagen" class="select-search">
                                            <option value="xpilihx">Pilih.....</option>
                                            <?php 
                                                foreach ($tampil_pilihan_agen as $row2) { 
                                                $sel3 = ($row2->id_agen == $this->session->userdata("idagen_inf"))?'selected="selected"':'';?>
                                            ?>
                                            <option value="<?php echo $row2->id_agen;?>" <?php echo $sel3; ?> ><?php echo $row2->nama;?></option>
                                            <?php 
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-info btn-medium" name="submit">Tampilkan</button>
                                        <a href="<?php echo site_url('dashboard/'); ?>" class='btn btn-warning btn-medium' type="button">Menu Utama</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="alert bg-info alert-styled-left">
                        <button data-dismiss="alert" class="close"> x </button> Laporan Dokumen per Agen untuk TKI Informal
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-flat"> 
                        <div class="panel-heading">
                            <h5 class="panel-title">(核准函+簽證函)循環 DOKUMEN DARI TAIWAN INFORMAL PER MAJIKAN UNTUK PERHITUNGAN SUHAN DAN VISA PERMIT <br> </h5><br/>
                            <h5>
                                <?php 
                                    if ($this->session->userdata("idagen_inf") != NULL) {
                                        echo "AGEN = ".$this->M_laporandokinformal->select_row("SELECT nama FROM dataagen where id_agen=".$this->session->userdata("idagen_inf"))->nama; 
                                    } else {
                                        echo "AGEN = <code class='text-danger'>Belum Pilih Agen</code>";
                                    }
                                ?>
                            </h5>
                            <div class="heading-elements">
                            </div>
                        </div> 
                        <div class="panel-body">
                            <table class="table table-bordered" id="fixedeks">
                                <thead>
                                    <tr>
                                        <td rowspan="3" class="yellow bg-yyy">NO</td>
                                        <td colspan="2" class="yellow bg-yyy">雇主</td>
                                        <td colspan="3" rowspan="2" class="bg-orange-800">用給外勞TERPAKAI TKI</td>
                                        <td colspan="8" class="bg-blue-300">核准函 SUHAN</td>
                                        <td colspan="8" class="bg-orange-300">簽證函VISA PERMIT</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="yellow bg-yyy">NAMA MAJIKAN</td>
                                        <td rowspan="2" class="bg-blue-300">號NO</td>
                                        <td colspan="2" class="bg-blue-300">日期 TGL</td>
                                        <td colspan="2" class="bg-blue-300">收件TERIMA </td>
                                        <td rowspan="2" class="bg-blue-300">寄臺灣<br/> TGL KIRIM<br/> KE<br/> TAIWAN</td>
                                        <td rowspan="2" class="bg-blue-300">放印尼 <br/>TGL<br/> SIMPAN</td>
                                        <td rowspan="2" class="bg-blue-300">備註<br/> KETERANGAN</td>
                                        <td rowspan="2" class="bg-orange-300">號NO</td>
                                        <td colspan="2" class="bg-orange-300">日期 TGL</td>
                                        <td colspan="2" class="bg-orange-300">收件TERIMA </td>
                                        <td rowspan="2" class="bg-orange-300">寄臺灣<br/> TGL KIRIM<br/> KE<br/> TAIWAN</td>
                                        <td rowspan="2" class="bg-orange-300">放印尼 <br/>TGL<br/> SIMPAN</td>
                                        <td rowspan="2" class="bg-orange-300">備註<br/> KETERANGAN</td>
                                    </tr>
                                    <tr>
                                        <td class="yellow bg-yyy">ENGLISH</td>
                                        <td class="yellow bg-yyy">MANDARIN</td>
                                        <td class="bg-orange-800">ID-編號</td>
                                        <td class="bg-orange-800">印尼名字<br/> NAMA<br/> INDONESIA</td>
                                        <td class="bg-orange-800">中文名字<br/> NAMA<br/> MANDARIN</td>
                                        <td class="bg-blue-300">發行<br/> TERBIT</td>
                                        <td class="bg-blue-300">到期<br/> EXP</td>
                                        <td class="bg-blue-300">日期<br/> TGL</td>
                                        <td class="bg-blue-300">(A) ASLI /<br/>   (S)<br/> SIMPANAN</td>
                                        <td class="bg-orange-300">發行<br/> TERBIT</td>
                                        <td class="bg-orange-300">到期<br/> EXP</td>
                                        <td class="bg-orange-300">日期<br/> TGL</td>
                                        <td class="bg-orange-300">(A) ASLI /<br/>   (S)<br/> SIMPANAN</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>
                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        fixedColumns: {
                            leftColumns: 3,
                            rightColumns: 0
                        },
                        processing: true,
                        bFilter: false,
                        "lengthChange": false,
                        ordering: false,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('laporandokinformal/show_data') ?>",
                            "type"      : "POST"
                        },
                        columnDefs: [
                            {
                                render: function (data, type, full, meta) {
                                    return "<div class='text-wrap width-100'>" + data + "</div>";
                                },
                                targets: 0
                            },
                            {
                                render: function (data, type, full, meta) {
                                    return "<div class='text-wrap width-200'>" + data + "</div>";
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
                                    return "<div class='text-wrap width-100'>" + data + "</div>";
                                },
                                targets: 3
                            }
                        ],
                        "bautoWidth": true
                    });
                </script>
                <!-- /complex headers example -->
