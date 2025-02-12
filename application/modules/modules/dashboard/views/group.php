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
                    <li class='active'>Dashboard Group</li>
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
        <div class='header'>Male Formal</div>
        <div class='price blue-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_mf;?></strong>
                Tkw
            </li>
            <li>
                <strong>0</strong>
                Terbang
            </li>
            
        </ul>
        <div class='footer'>
            <a href="#" class="btn btn-primary"><i class='icon-signin'></i>
                Detail
            </a>
        </div>
    </div>
    <div class='span3 pricing-table'>
        <div class='header'>Male Informal</div>
        <div class='price orange-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_mi;?></strong>
                 Tkw
            </li>
            <li>
                <strong>0</strong>
                Terbang
            </li>
            
        </ul>
        <div class='footer'>
            <a href="#" class="btn btn-warning"><i class='icon-signin'></i>
                Detail
            </a>
        </div>
    </div>
    <div class='span3 pricing-table'>
        <div class='header'>Female Formal</div>
        <div class='price red-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_ff;?></strong>
                 Tkw
            </li>
            <li>
                <strong>0</strong>
                Terbang
            </li>
           
        </ul>
        <div class='footer'>
            <a href="#" class="btn btn-danger"><i class='icon-signin'></i>
               Detail
            </a>
        </div>
    </div>
    <div class='span3 pricing-table'>
        <div class='header'>Female Informal</div>
        <div class='price purple-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_fi;?></strong>
                users
            </li>
            <li>
                <strong>0</strong>
               Terbang
            </li>
            
        </ul>
        <div class='footer'>
            <a href="#" class="btn btn-info "><i class='icon-signin'></i>
               Detail
            </a>
        </div>
    </div>

</div>

<div class='row-fluid pricing-tables'>
        <div class='span3 pricing-table'>
        <div class='header'>Panti Jompo</div>
        <div class='price orange-background'>
            <span class='icon-group'></span>
        </div>
        <ul class='unstyled features'>
            <li>
                <strong><?php echo $hitung_data_jp;?></strong>
                 Tkw
            </li>
            <li>
                <strong>0</strong>
                Terbang
            </li>
            
        </ul>
        <div class='footer'>
            <a href="#" class="btn btn-warning"><i class='icon-signin'></i>
                Detail
            </a>
        </div>
    </div>
</div>
<div class="row-fluid">

                </div>
                    <div class="row-fluid">
                       <div class="span12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Rekapitulasi Biodata</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">
<!--
                                   <table class="table table-striped table-bordered" id="sample_1">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Id Biodata</th>
                                            <th>Nama Lengkap</th>
                                            <th>Kelamin</th>
                                            <th>Sponsor</th>
                                            <th>Status TKI</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal_group as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->id_biodata;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->jeniskelamin;?></td>
                                            <td><?php echo $row->namasponsor;?></td>
                                            <td><?php echo $row->statusaktif;?></td>
                                            <td><a href="<?php echo site_url('detail_personal_group/detail/'.$row->id_biodata); ?>">Detail</a></td>
                                            
                                        </tr>
                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>
-->


                                </div>
                            </div>
                        </div>
                </div>
                