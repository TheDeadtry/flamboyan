<?php 
    $url_linkz      = $_SERVER['REQUEST_URI'];
    $exp_url_linkz  = explode ("/", $url_linkz);
    for ($varr = 0; $varr < count($exp_url_linkz); $varr++ ) {
        if ($exp_url_linkz[$varr] == 'blk_jadwal') {
            $ccu = $varr;
        }
    }

    $ccuv = $ccu+1;

    $st1 = '';
    $st2 = '';
    $st3 = '';

    $list = array (
    	1 => array (
    		'pelajaran',
    		'pelajaran_revisi',
    		'pelajaran_materi'
    	),
    	2 => array (
    		'paket',
    		'paket_detail'
    	),
    	3 => array (
            'datapembelajaran',
            'datapembelajaran_detail'
    	),
    );
    foreach ( $list as $key => $val )
    {
	    foreach ( $val as $val2 )
	    {
	    	if ( $exp_url_linkz[$ccuv] == $val2 )
	    	{
	    		${'st'.$key} = 'bg-primary';
	    	}
	    }
    }
         
?>

    <div class="panel panel-flat">
        <div class="list-group list-group-borderless no-padding-top">
            <a href="<?php echo site_url('blk_jadwal/pelajaran'); ?>" class="list-group-item <?php echo $st1; ?>">
                <i class="icon-cog3"></i> 
                Data Pelajaran
            </a>
            <div class="list-group-divider"></div>
            <a href="<?php echo site_url('blk_jadwal/paket'); ?>" class="list-group-item <?php echo $st2; ?>">
                <i class="icon-cog3"></i> 
                Data Paket
            </a>
            <div class="list-group-divider"></div>
            <a href="<?php echo site_url('blk_jadwal/datapembelajaran'); ?>" class="list-group-item <?php echo $st3; ?>">
                <i class="icon-cog3"></i> 
                Jadwal Pembelajaran
            </a>
        </div>
    </div>