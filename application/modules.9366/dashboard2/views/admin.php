<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Dashboard</span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Dashboard Admin</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-info"> 
	<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
</div>

<div class='row-fluid pricing-tables'>
    <div class='span3 pricing-table'>
        <div class='header'>
            Male Formal
        </div>
        <div class='price blue-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_mf;?></strong>
                TKL
            </li>
            <li>
                <strong><?php echo $hitung_data_mf_terbang;?></strong>
                Terbang
            </li>
            
        </ul>
        <div class='footer'><!--
            <a href="<?php echo site_url().'/databiomaleformal'; ?>" class="btn btn-primary"><i class='icon-signin'></i>
                Detail
            </a>
            <strong><?php echo $hitung_data_mf_md;?></strong>
            MD/UNFIT-->
        </div>
    </div>
    <div class='span3 pricing-table'>
        <div class='header'>
            Male Informal
        </div>
        <div class='price orange-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_mi;?></strong>
                 TKL
            </li>
            <li>
                <strong><?php echo $hitung_data_mi_terbang;?></strong>
                Terbang
            </li>
            
        </ul>
        <div class='footer'><!--
            <a href="<?php echo site_url().'/databiomaleinformal'; ?>" class="btn btn-warning"><i class='icon-signin'></i>
                Detail
            </a>
            <strong><?php echo $hitung_data_mi_md;?></strong>
            MD/UNFIT-->
        </div>
    </div>
    <div class='span3 pricing-table'>
        <div class='header'>
            Female Formal
        </div>
        <div class='price red-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_ff;?></strong>
                 TKW
            </li>
            <li>
                <strong><?php echo $hitung_data_ff_terbang;?></strong>
                Terbang
            </li>
           
        </ul>
        <div class='footer'><!--
            <a href="<?php echo site_url().'/databiofemaleformal'; ?>" class="btn btn-danger"><i class='icon-signin'></i>
               Detail
            </a>
            <strong><?php echo $hitung_data_ff_md;?></strong>
            MD/UNFIT-->
        </div>
    </div>
    <div class='span3 pricing-table'>
        <div class='header'>
            Female Informal
        </div>
        <div class='price purple-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_fi;?></strong>
                TKW
            </li>
            <li>
                <strong><?php echo $hitung_data_fi_terbang;?></strong>
               Terbang
            </li>
            
        </ul>
        <div class='footer'><!--
            <a href="<?php echo site_url().'/databiofemaleinformal'; ?>" class="btn btn-info "><i class='icon-signin'></i>
               Detail
            </a>
            <strong><?php echo $hitung_data_fi_md;?></strong>
            MD/UNFIT-->
        </div>
    </div>
</div>

<div class='row-fluid pricing-tables'>
    <div class='span3 pricing-table'>
        <div class='header'>Panti Jompo</div>
        <div class='price green-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_jp;?></strong>
                TKW
            </li>
            <li>
                <strong><?php echo $hitung_data_jp_terbang;?></strong>
                Terbang
            </li>
        </ul>
        <div class='footer'><!--
            <a href="<?php echo site_url().'/databiopantijompo'; ?>" class="btn btn-warning"><i class='icon-signin'></i>
                Detail
            </a>
            <strong><?php echo $hitung_data_jp_md;?></strong>
            MD/UNFIT-->
        </div>
    </div>
</div>
<div class="row-fluid">
</div>