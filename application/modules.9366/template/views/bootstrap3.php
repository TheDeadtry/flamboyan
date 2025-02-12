<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= base_url(); ?>templatemanual/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script src="<?= base_url(); ?>templatemanual/bootstrap-3.3.7-dist/js/jquery.js"></script>
	<script src="<?= base_url(); ?>templatemanual/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>

   <?php $this->load->view($namamodule.'/'.$namafileview); ?>

</body>
</html>