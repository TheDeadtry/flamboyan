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
    $st3 = '';

    $list = array (
    	1 => array (
    		'dataabsen',
    	),
    	2 => array (
    		'dataabsen_biayamakan',
    	),
        3 => array (
            'dataabsen_biayakategori',
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
            <a type="button" href="<?php echo site_url('blk_laporan/dataabsen') ?>" class="btn bg-primary <?php echo $st1 ?>">Data Absen</a>
            <a type="button" href="<?php echo site_url('blk_laporan/dataabsen_biayamakan') ?>" class="btn bg-violet <?php echo $st2 ?>">Data Absen + Biaya Makan</a>
            <a type="button" href="<?php echo site_url('blk_laporan/dataabsen_biayakategori'); ?>" class="btn bg-indigo <?php echo $st3 ?>">Data Absen + Biaya Per Kategori</a>
        </div>
    </div>