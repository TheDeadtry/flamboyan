
<script type="text/javascript">
    $("#navigation").change(function()
    {
        document.location.href = $(this).val();
    });
</script>
<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">
            <div class="row">
                
                    <?php 
                        $this->load->view('blk_pelatihan/'.$pelatihanModular);
                    ?>
                
                    <?php 
                        $this->load->view('blk_personaldetail/mini_sidebar');
                    ?>

            </div>
                <!-- /user profile -->

        </div>
            <!-- /main content -->

    </div>
        <!-- /page content -->


        <!-- Footer -->
      <!--   <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div> -->
        <!-- /footer -->

</div>
    <!-- /page container -->

<script type="text/javascript">
    $('#datatable_123').dataTable();
</script>