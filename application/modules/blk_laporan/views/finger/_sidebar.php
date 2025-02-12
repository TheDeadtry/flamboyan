<?php 
    $url_linkz      = $_SERVER['REQUEST_URI'];
    $exp_url_linkz  = explode ("/", $url_linkz);
    for ($varr = 0; $varr < count($exp_url_linkz); $varr++ ) {
        if ($exp_url_linkz[$varr] == 'blk_laporan') {
            $ccu = $varr;
        }
    }

    $ccuv = $ccu+1;

    $st1 = '';
    $st2 = '';

    $list = array (
    	1 => array (
    		'finger',
    	),
    	2 => array (
    		'finger_waktu',
    	),
    );
    foreach ( $list as $key => $val )
    {
	    foreach ( $val as $val2 )
	    {
	    	if ( $exp_url_linkz[$ccuv] == $val2 )
	    	{
	    		${'st'.$key} = 'disabled';
	    	}
	    }
    }
         
?>

    <div class="panel panel-flat">
        <div class="panel-heading">
            <a type="button" href="<?php echo site_url('blk_laporan/finger') ?>" class="btn bg-warning <?php echo $st1 ?>">Data Fingerprint per TKI</a>
            <a type="button" href="<?php echo site_url('blk_laporan/finger_waktu'); ?>" class="btn bg-teal <?php echo $st2 ?>">Data Fingerprint per Tanggal</a>
        </div>
    </div>