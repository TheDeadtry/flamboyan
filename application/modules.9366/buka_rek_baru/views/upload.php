<style>
    .content-halaman{
        display: block;
        padding: 10px;
        margin: 50px;
    }
</style>
<div class="well well-lg">
    <h1>BUKA REKENING BARU</h1>
</div>
<hr>
<ul class="nav nav-tabs">
    <li role="presentation"><a href="<?= site_url(); ?>/buka_rek_baru/">Update</a></li>
  <li role="presentation"><a href="#">Tambah berkas</a></li>
</ul>        

<div class="content-halaman">
    <div class="row">
        <div class="cool-sm-12">
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>Buka Rekening Baru</h1>
                        </div>
                      <div class="panel-body">
                        <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
                        <div class="form-group">
                            <label>Tanggal Buka Rekening</label>
                            <input type="text" name="tanggal-berkas" style="width: calc(100% - 10px) ;" class="form-control">
                        </div>
                      </div>
                      <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
                        <div class="form-group">
                            <label>Tanggal Buka Rekening</label>
                            <input type="text" name="tanggal-berkas" style="width: calc(100% - 10px) ;" class="form-control">
                        </div>
                      </div>
                      <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>


















<div class="row-fluid">
    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
        <div class='box-header blue-background'>
            <div class='title'>Buka Rekening Baru</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content box-no-padding'>
                <div class="span6">
                 
            <?php if (count($buka_rek_baru) == 1 ) : ?>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#update">update</button>
                <br><br>
                <div class='row-fluid'>
                    <div class='span12 box box-transparent'>
                        <div class='row-fluid'>
                            <div class='span6 box-quick-link blue-background'>
                                <a data-toggle="modal" data-target="#uploaddok">
                                    <div class='header'>
                                        <div class='icon-flag'></div>
                                    </div>
                                    <div class='content'><b>UPLOAD BERKAS</b></div>
                                    <div class='content'><b>0 DOKUMEN</b></div> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                <br>
                <br>
            <?php endif; ?>



<!-- tombol untuk tambah data -->
           
            <div class='box-header orange-background'>
                <div class='title'>BERKAS BUKA REKENING</div>
                </div>
                <div class='box-content box-no-padding'>
                    <div class='responsive-table'>
                        <div class='scrollable-area'>
                    
                        </div>
                     </div>
                 </div>
             </div>
            <div class="space5"></div>
        </div>
    </div>
</div>


<!-- Modal -->

<form action="<?= site_url(); ?>/buka_rek_baru/tambah_berkas/" method="post">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Data Buka Rekening Baru</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
            <div class="form-group">
                <label>Tanggal Buka Rekening</label>
                <input type="text" name="tanggal-berkas" style="width: calc(100% - 10px) ;" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-default">Simpan</button>
          </div>
        </div>

      </div>
    </div>
</form>


<!-- Modal -->

    <div id="update" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="<?= site_url(); ?>/buka_rek_baru/update/" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Buka Rekening Baru</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
                    <div class="form-group">
                        <label>Tanggal Buka Rekening</label>
                        <input type="text" name="tanggal-berkas" style="width: calc(100% - 10px) ;" class="form-control" value="<?= $buka_rek_baru->tanggal_buka_rek; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Simpan</button>
                  </div>
                </div>
            </form>
      </div>
    </div>

<form action="<?= site_url(); ?>/buka_rek_baru/tambah_berkas" method="post" enctype="multipart/form-data">
    <!-- Modal uploda document -->
    <div id="uploaddok" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <input type="hidden" name="andalas" value="<?= $detailpersonalid; ?>">
                <input type="file" name="filedok" class="form-control">
            </div>

          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">simpan</button>
          </div>
        </div>
  </div>
</div>
</form>