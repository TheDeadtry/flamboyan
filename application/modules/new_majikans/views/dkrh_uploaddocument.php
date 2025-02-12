<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Majikan > UPLOAD DOCUMENT</span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-9">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('new_majikans') ?>">KEMBALI</a>
                        </div>

                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-hover" id="dkrh">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tgl Input</th>
                                        <th>Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody>        
                                    <?php foreach($data1 as $key => $val) { ?>
                                        <tr>
                                            <th><?php echo $key+1 ?></th>
                                            <th><?php echo $val->filetglinput ?></th>
                                            <th>
                                                <?php
                                                    $imgs = '<a href="'.base_url().'assets/dokmajikan/file-file/'.$val->file.'">';
                                                    if (strpos($val->file, '.docx') !== false ) { 
                                                        $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/docx.png" /></a>';
                                                    } elseif (strpos($val->file, '.doc') !== false) { 
                                                        $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/doc.png" /></a>';
                                                    } elseif (strpos($val->file, '.xlsx') !== false ) { 
                                                        $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/xlsx.png" /></a>';
                                                    } elseif (strpos($val->file, '.xls') !== false) { 
                                                        $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/xls.png" /></a>';
                                                    } elseif (strpos($val->file, '.pdf') !== false) { 
                                                        $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/pdf.png" /></a>';
                                                    } else { 
                                                        $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/dokmajikan/file-file/'.$val->file.'"/></a>'; 
                                                    }
                                                    $filemajikans_data = $imgs.$imgss;
                                                    echo '<a href="'.base_url().'assets/dokmajikan/file-file/'.$val->file.'">'.$val->file.'</a>';
                                                ?>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            Upload baru
                        </div>

                        <div class="panel-body">
                            <form action="<?= site_url(); ?>/new_majikans/dkrh_uploadbaru" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $did ?>">
                                <input type="text" class="form-control" name="filetglinput" placeholder="Isi TGL INPUT" value="<?php echo date('Y.m.d') ?>"><br>
                                <input type="file" class="form-control" multiple name="file[]"><br>
                                <input type="submit" class="btn btn-success" name="upload" value="simpan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#fixedeks').dataTable({
            scrollX: true,
            scrollY: "400px",
            "searchable": true,
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 0
            },
            processing: true,
            bFilter: true,
            "lengthChange": false,
            serverSide: true,
            ajax: {
                url       : "<?php echo site_url('new_majikans/uploaddocumentshow'); ?> ",
                method      : "POST",
                //data        : {agenq: agen}
            }
        });

    });
</script>





