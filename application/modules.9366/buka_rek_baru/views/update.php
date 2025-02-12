<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<style>
    .content-halaman{
        display: block;
        padding: 10px;
        margin: 50px;
    }

    .nav-stacked
{
    background-color: #ddd;
    padding: 5px;
}
.nav-stacked li{
    padding:10px;
    border-bottom: 1px solid white;
}
.nav-stacked li a{
    text-decoration: none;
    color: black;
    color: white;
}

.nav-stacked{
    margin: 10px;
}

.nav-stacked li{
    background-color:#777;
}
</style>
<div class="well well-lg">
    <h1>BUKA REKENING BARU</h1>
</div>

<div class="row">
  <div class="col-sm-3">
    <?php 
                        $this->load->view('template/menuadministrasi');
     ?>
  </div>
  <div class="col-sm-9">
    



<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Update</a></li>
  <li role="presentation"><a href="<?= site_url(); ?>/buka_rek_baru/keberkas/">Tambah berkas</a></li>
</ul>        

<div class="content-halaman">
    <div class="row">
        <div class="cool-sm-12">
            
            <div class="row">
                <div class="col-sm-6">
                    <form action="<?= site_url(); ?>/buka_rek_baru/update/" method="post">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1>Buka Rekening Baru</h1>
                            </div>
                          <div class="panel-body">
                            <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
                            <div class="form-group">
                                <label>Tanggal Buka Rekening</label>
                                <input type="date" name="tanggal-berkas" style="width: calc(100% - 10px) ;" class="form-control" value="<?= $buka_rek_baru->tanggal_buka_rek; ?>">
                            </div>
                          </div>
                          <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                       

                        <div class="list-group">
                          <a href="#" class="list-group-item disabled">
                            Cras justo odio
                          </a>
                          <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                          <a href="#" class="list-group-item">Morbi leo risus</a>
                          <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                          <a href="#" class="list-group-item">Vestibulum at eros</a>
                        </div>

                      </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

  </div>

</div>
