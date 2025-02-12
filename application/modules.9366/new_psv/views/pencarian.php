<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
				    <thead>
				    	<td colspan="4">
				    		<?php $attributes = array('class' => 'row'); ?>
				    		<?php echo form_open('post/search',$attributes);?>
				    			<input type="text" name="keyword" placeholder="search" class="form-control col-md-5">
								<input type="submit" value="Cari" class="btn btn-warning col-md-1">
				    		<?php echo form_close();?>	
				    	</td>
				      <tr>
				        <th>Title</th>
				        <th>Post</th>
				        <th>Slug</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
						<?php foreach($post as $row){ ?>
						    <tr>
						        <td><?php echo $row->title ?></td>
						        <td><?php echo substr($row->detail_post, 0,100) ?></td>
						        <td><?php echo $row->slug_title  ?></td>
						        <td>
						        	<a href="<?php echo site_url('post/detail_post/'.$row->slug_title) ?>" class="btn btn-primary">Detail</a>
						        </td>
						    </tr>
				  		<?php  } ?>
				    </tbody>
				</table>

				<a href="<?php echo site_url('post') ?>" class="btn btn-success"><< Back to post</a>
			</div>
		</div>
	</div>
</body>
</html>