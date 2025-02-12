<style>
    .content-halaman{
        display: block;
        padding: 10px;
        margin: 50px;
    }

    /*basic settings */

a:focus {
  outline: none !important;
  outline-offset: none !important;
}

body {
  background: #f5f6f5;
  color: #333;
}

/* helper classses */

.margin-top-20 {
  margin-top: 20px;
}

.margin-bottom-20 {
  margin-top: 20px;
}

.no-margin {
  margin: 0px;
}

/* box component */

.box {
  border-color: #e6e6e6;
  background: #FFF;
  border-radius: 6px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
  padding: 10px;
  margin-bottom: 40px;
}

.box-center {
  margin: 20px auto;
}

/* input [type = file]
----------------------------------------------- */

input[type=file] {
  display: block !important;
  right: 1px;
  top: 1px;
  height: 34px;
  opacity: 0;
  width: 100%;
  background: none;
  position: absolute;
  overflow: hidden;
  z-index: 2;
}

.control-fileupload {
  display: block;
  border: 1px solid #d6d7d6;
  background: #FFF;
  border-radius: 4px;
  width: 100%;
  height: 36px;
  line-height: 36px;
  padding: 0px 10px 2px 10px;
  overflow: hidden;
  position: relative;
  
  &:before, input, label {
    cursor: pointer !important;
  }
  /* File upload button */
  &:before {
    /* inherit from boostrap btn styles */
    padding: 4px 12px;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 20px;
    color: #333333;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
    cursor: pointer;
    background-color: #f5f5f5;
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border: 1px solid #cccccc;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-bottom-color: #b3b3b3;
    border-radius: 4px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    transition: color 0.2s ease;

    /* add more custom styles*/
    content: 'Browse';
    display: block;
    position: absolute;
    z-index: 1;
    top: 2px;
    right: 2px;
    line-height: 20px;
    text-align: center;
  }
  &:hover, &:focus {
    &:before {
      color: #333333;
      background-color: #e6e6e6;
      color: #333333;
      text-decoration: none;
      background-position: 0 -15px;
      transition: background-position 0.2s ease-out;
    }
  }
  
  label {
    line-height: 24px;
    color: #999999;
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    position: relative;
    z-index: 1;
    margin-right: 90px;
    margin-bottom: 0px;
    cursor: text;
  }
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
  <li role="presentation"><a href="<?= site_url(); ?>/buka_rek_baru/">Update</a></li>
  <li role="presentation" class="active"><a href="#">Tambah berkas</a></li>
</ul>        

<div class="content-halaman">
    <div class="row">
        <div class="cool-sm-12">
            
         <div class="box">
          <!-- fileuploader view component -->
          

          <!-- ./fileuploader view component -->
          <form action="<?= site_url(); ?>/buka_rek_baru/tambah_berkas" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-10">
              <span class="control-fileupload"> 
                <input type="hidden" name="andalas" value="<?= $detailpersonalid;  ?>">
                <label for="file1" class="text-left">Please choose a file on your computer.</label>
                <input type="file" id="file1" name="filedok">
              </span>
            </div>
            <div class="col-sm-2">  
              <button type="submit" class="btn btn-primary btn-block">
                <i class="icon-upload icon-white"></i> Upload
              </button>
            </div>
          </div>
        </div>
        </form>


        </div>

        <div class="cool-sm-12">
            
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>DATA SUDAH DIUPLOAD</h3>
              </div>
              <div class="panel-body">

                <div class="row">
                  
                  <?php $jsondata = json_decode($buka_rek_baru->data_berkas); ?>                    
                  <?php foreach ($jsondata as $key => $value): ?>
                    
                    <div class="col-sm-3">
                        <div class="margin-bottom-20"> 
                          <p><?= $value->nama_data; ?></p>
                          <?php if (
                            
                            strpos($value->nama_data, ".jpg") != false ||
                            strpos($value->nama_data, ".png") != false ||
                            strpos($value->nama_data, ".jpeg") != false

                          ): ?>
                              <div class="box-img">
                                
                                <img style="width: auto; max-width: 100% ;height: 30vh;" class="thumbnail box-center margin-top-20" alt="No image" src="<?= base_url(); ?>file_dokument_buka_rekening_baru/<?= $value->nama_data;  ?>">

                              </div>
                            <?php else: ?>
                              
                              <img style="width: 100%; height: auto;" class="thumbnail box-center margin-top-20" alt="No image" src="http://www.washaweb.com/tutoriaux/fileupload/imgs/image-temp-220.png">

                          <?php endif; ?>
                        </div>
                        <p>
                          <form action="<?= site_url(); ?>/buka_rek_baru/hapus/" method="post">
                            <input type="hidden" name="id_biodata" value="<?= $detailpersonalid;  ?>">
                            <input type="hidden" name="arrayke" value="<?= $key ?>">
                            <input type="hidden" name="namafile" value="<?= $value->nama_data; ?>">
                            <button type="submit" class="btn btn-sm" name="delete"><i class="icon-remove"></i> Remove</button>
                          </form>
                          <a class="btn btn-success" href="<?= base_url(); ?>file_dokument_buka_rekening_baru/<?= $value->nama_data; ?>">download</a>
                        </p>
                    </div>

                  <?php endforeach ?>

                </div>

              </div>
              <div class="panel-footer">Panel footer</div>
            </div>

        </div>
    </div>
</div>
  </div>

</div>

<script>
  $(function() {
    $('input[type=file]').change(function(){
      var t = $(this).val();
      var labelText = 'File : ' + t.substr(12, t.length);
      $(this).prev('label').text(labelText);
    })
  });
</script>
