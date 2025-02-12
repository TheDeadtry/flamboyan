<style type="text/css">
.gugus-group-menu-button{
  width: 100%;
  padding: 0;
  margin: 0;
  display: block;
  text-align: center;
}

.gugus-group-menu-button a{
  display: inline-block;
  width: 23%;
  height: auto;
  padding: 0;
  border-radius: 3px;
  margin-right: 1%;
  margin-bottom: 1%;
  text-align: center;
  transition: 1s;
  
  border: 1px solid #777;
}

.gugus-group-menu-button a:hover{
  background-color: #cccccc;
}

.pagin{
  display: block;
  padding: 10px;
  margin: 10px;
  background-color: transparent;
  text-align: right;
}

.pagin a{
  text-align: center;
  width: 50px;
  display: inline-block;
  padding: 10px;
  margin: 10px;
  background-color: transparent;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.ada-red{
  background-color: red;
  color: white;
}

.pagin a:hover{
  background-color: yellow;
}

</style>


<div class="row">

<div class="col-lg-4">
    <div class="panel panel-warning panel-bordered">
        
        <div class="panel-heading">
    <h5 class="panel-title text-center ">Pilih NIK PPTKIS</h5>
        </div>

        <div class="panel-body">
          
<form action="<?php echo base_url(); ?>index.php/new_pdf_ceklist/ceklist/<?php echo $id_pembuatan;?>" method="POST">
<select class="form-control" name="nikpptkis" required="required" data-placeholder="Choose a Category" tabindex="1">
      <?php 
          foreach ($datanikpptkis as $pptkis)
          {
      ?>
      <option value="<?php echo $pptkis->id_setting_nikpptkis;?>" /><?php echo $pptkis->nama.' - '.$pptkis->nik;?>
      <?php        
          }
      ?>
          </select>
          <br/>
          <button class="btn btn-primary" type="submit">Print</button>
</form>
        </div>
      </div>
    </div>













