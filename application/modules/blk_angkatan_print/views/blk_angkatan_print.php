<?php if(isset($extra_js)) echo $extra_js; 
?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <div class="heading-elements">
            </div>
        </div>
    </div>
    <!-- /page header -->


    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel">
                            <div class="panel-heading bg-primary">
                                <h5 class="panel-title text-center">PRINT TKI PER ANGKATAN</h5>
                                <button class="export-button" onclick="exportTableToExcel('jadwaltables', ['ANGKATAN', 'Date'], 'tableData')">Export to Excel</button>
                           <style>
                            .export-button {
                                background-color: #4CAF50; /* Green */
                                border: none;
                                color: white;
                                padding: 10px 20px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px;
                                margin: 4px 2px;
                                cursor: pointer;
                                border-radius: 5px; /* Rounded corners */
                            }
                            .FI-button {
                                background-color:rgb(175, 76, 170); /* Green */
                                border: none;
                                color: white;
                                padding: 10px 20px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px;
                                margin: 4px 2px;
                                cursor: pointer;
                                border-radius: 5px; /* Rounded corners */
                            }
                            </style>
                                <div class="btn-group btn-group-animated">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">ANGKATAN DIPILIH <span class="caret"></span><br/><?php if ($pilsek != NULL) echo $pilsek; else echo '-';?></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/'); ?>"><i class="icon-spinner9"></i> TAMPIL SEMUA</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/BLANK'); ?>"><i class="icon-person"></i> BELUM DIISI</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M1'); ?>"><i class="icon-woman"></i> M01</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M2'); ?>"><i class="icon-woman"></i> M02</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M3'); ?>"><i class="icon-woman"></i> M03</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M4'); ?>"><i class="icon-woman"></i> M04</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M5'); ?>"><i class="icon-woman"></i> M05</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M6'); ?>"><i class="icon-woman"></i> M06</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M7'); ?>"><i class="icon-woman"></i> M07</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M8'); ?>"><i class="icon-woman"></i> M08</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M9'); ?>"><i class="icon-woman"></i> M09</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M10'); ?>"><i class="icon-woman"></i> M10</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M11'); ?>"><i class="icon-woman"></i> M11</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M12'); ?>"><i class="icon-woman"></i> M12</a></li>
                                    </ul>
                                </div>
                                <form method="post" action="<?php echo site_url('blk_angkatan_print/set_gender_filter'); ?>">
                                    <label for="gender">Filter by Gender:</label>
                                    <select name="gender" id="gender">
                                        <option value="">All</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <button type="submit">Filter</button>
                                </form>
<!--
                                <form method="POST" action="<?php echo site_url('blk_angkatan_print/set_pilih') ?>">
                                    <select name="pil_angkatan" class="form-control select-search">
                                        <option value="kosong">Belum diisi</option>
                                        <?php 
                                            for($x=1; $x<=12; $x++) {
                                        ?>
                                                <option value="<?php echo $x ?>"><?php echo 'M'.$x ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-xxs bg-primary">ENTER</button>
                                </form>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>-->
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                        <thead>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td max-width="100%" style="text-align:center">NO</td>
                                                <td max-width="100%" style="text-align:center">ANGKATAN</td>
                                                <td style="text-align:center">ID TKI</td>
                                                <td max-width="100%" style="text-align:center">TKI</td>
                                                <td max-width="100%" style="text-align:center">Tanggal Angkatan</td>
                                                <td max-width="100%" style="text-align:center">FING1</td>
                                                <td max-width="100%" style="text-align:center">UJK</td>
                                                <td max-width="100%" style="text-align:center">IP</td>
                                                <td max-width="100%" style="text-align:center">PKL</td>
                                                <td max-width="100%" style="text-align:center">GR</td>
                                                <td max-width="100%" style="text-align:center">T</td>
                                                <td max-width="100%" style="text-align:center">PP</td>
                                                <td max-width="100%" style="text-align:center">MAJ</td>
                                                <td max-width="100%" style="text-align:center">DET KRJ</td>
                                                <td max-width="100%" style="text-align:center">SCAN PK</td>
                                                <td max-width="100%" style="text-align:center">PK ASLI</td>
                                                <td max-width="100%" style="text-align:center">TERB</td>
                                                <td style="text-align:center">ACTION</td>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php 
                                                $no     = 1;
                                                foreach ($tampil_data_tki as $pkt) {
                                                $pkt = (array) $pkt;
                                            ?>
                                            <tr>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $no; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['kode']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['id_biodata']; ?></td>
                                                <td style="white-space:nowrap; text-align:left"><?php echo $pkt['nama']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['terimapk']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['fing1']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['tgl_keluar']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['ip']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['pkl']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['hari']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['graha_teori']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['pp']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['tgl_terpilih_majikan']; ?></td>
                                                <td style="text-align:center; width: 320px;"><?php echo $pkt['pekerjaan']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['terimapk']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['tglpk']; ?></td>
                                                <td style="white-space:nowrap; text-align:center"><?php echo $pkt['tglterbang']; ?></td>
                                                <td style="white-space:nowrap; text-align:center">
                                                    <a href="<?php echo site_url('blk_personaldetail/index/'.$pkt['id_biodata']) ?>" target="_blank">
                                                        <span class="label label-success">Detail</span>
                                                    </a>
                                                </td>  
                                            </tr>    
                                            <?php 
                                                $no++;
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017. <a href="">PT FLAMBOYAN GEMAJASA</a> by <a href="" target="_blank">DKRH</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /page container -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".txx").select2({
                maximumSelectionLength: 2
            });
            $(".tyy").select2();
        });

        $('#jadwaltables').dataTable();     
    </script>
    <script>
        function exportTableToExcel(tableID, selectedColumns = ['kode','id_biodata','nama'], filename = '') {
    // Input validation
    if (!tableID) {
        console.error('Table ID is required');
        return;
    }

    const dataType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
    const tableSelect = document.getElementById(tableID);
    
    // Check if table exists
    if (!tableSelect) {
        console.error(`Table with ID "${tableID}" not found`);
        return;
    }

    // Set filename with default value
    filename = filename ? filename + '.xlsx' : 'excel_data.xlsx';
    
    try {
        // Clone the table to avoid modifying the original
        const tableClone = tableSelect.cloneNode(true);
        
        // Get all header cells
        const headerRow = tableClone.querySelector('tr');
        const headers = [...headerRow.cells];
        
        // If no columns specified, export all columns
        if (!selectedColumns.length) {
            selectedColumns = headers.map(header => header.textContent.trim());
        }
        
        // Find indices of columns to remove (in reverse order to avoid shifting issues)
        const columnsToRemove = headers
            .map((header, index) => ({
                index,
                remove: !selectedColumns.includes(header.textContent.trim())
            }))
            .filter(col => col.remove)
            .map(col => col.index)
            .sort((a, b) => b - a);  // Sort in descending order
        
        // Remove unwanted columns from each row
        const rows = tableClone.getElementsByTagName('tr');
        for (let row of rows) {
            for (let columnIndex of columnsToRemove) {
                if (row.cells[columnIndex]) {
                    row.deleteCell(columnIndex);
                }
            }
        }

        // Create workbook from filtered table
        const workbook = XLSX.utils.table_to_book(tableClone, {sheet: "Sheet1"});
        const wbout = XLSX.write(workbook, {bookType:'xlsx', type: 'binary'});
        
        // Convert string to ArrayBuffer
        const s2ab = s => {
            const buf = new ArrayBuffer(s.length);
            const view = new Uint8Array(buf);
            for (let i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        };
        
        // Create blob and download link
        const blob = new Blob([s2ab(wbout)], {type: dataType});
        const downloadLink = document.createElement("a");
        downloadLink.href = URL.createObjectURL(blob);
        downloadLink.download = filename;
        
        // Clean up after download
        downloadLink.onclick = () => {
            setTimeout(() => {
                URL.revokeObjectURL(downloadLink.href);
                downloadLink.remove();
            }, 150);
        };
        
        // Trigger download
        document.body.appendChild(downloadLink);
        downloadLink.click();

    } catch (error) {
        console.error('Error exporting table to Excel:', error);
    }
}
    </script>