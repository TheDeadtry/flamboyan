<?php 



if (isset($_POST['upload'])) {
	// var_dump($_FILES['file']);
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	$file_size = $_FILES['file']['size'];
	$file_tem_loc = $_FILES['file']['tmp_name'];
	$file_store = "assets/doksuhan/".$_POST['id']."_".$file_name;


	if (file_exists("assets/doksuhan/".$_POST['id']."_".$file_name)) {
		echo "file sdah ada";
	}else{
		move_uploaded_file($file_tem_loc, $file_store);
	}
}

 ?>




<form action="" method="POST" enctype="multipart/form-data">
	<label><h1>Upload File here: </h1></label>
	<input type="hidden" name="id" value="<?= $idnya; ?>">
	<input type="file" name="file"><br>
	<input type="submit" class="btn btn-success" name="upload"><br><br>
</form>


<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">File sudah di upload</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	    <?php 

		$data= $idnya;
		$karakter = strlen($data);

		$resource = opendir("assets/doksuhan");
		?>
		<?php while($entry = readdir($resource)) : ?>

			<?php if($entry != "." && $entry != "..") : ?> 
				
			<?php if(substr($entry, 0, $karakter) == $data) : ?>
					
					<div class="col-sm-4">
						<img style="width: 90%; padding: 5%" src="<?= base_url(); ?>assets/doksuhan/<?= $entry; ?>" >
						<button onclick="hapus('<?= $entry; ?>')">hapus</button>
					</div>
				<!-- assets/doksuhan -->

				<?php endif; ?>
			<?php endif; ?>
		<?php endwhile; ?>
			
		</div>
  </div>
  <div>
  	<?= $idnya; ?>
  </div>
</div>
<script type="text/javascript">
	function hapus(nilai){
		var id = <?= $idnya; ?>;
		 var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
	         if(tanya === true) {
	           window.location.href = "<?= site_url(); ?>new_suhan/hapus/"+nilai+"/"+id+"";
	         }else{
         } 
	}

	function get_hapus(nilai){
		$("#test").text(nilai);
	}
</script>