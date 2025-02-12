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
    <li role="presentation" class="active"><a href="#">Tambah</a></li>
</ul>        

<div class="content-halaman">
    <div class="row">
        <div class="cool-sm-12">
            
            <div class="row">
                <div class="col-sm-6">
                    <form action="<?= site_url(); ?>/buka_rek_baru/tambah_data/" method="post">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1>Buka Rekening Baru</h1>
                            </div>
                          <div class="panel-body">
                            <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
                            <div class="form-group">
                                <label>Tanggal Buka Rekening</label>
                                <input type="date" name="tanggal-berkas" style="width: calc(100% - 10px) ;" class="form-control">
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
