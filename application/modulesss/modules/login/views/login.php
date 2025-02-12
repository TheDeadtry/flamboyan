
 <div class="login-header">

        <div id="logo" class="center"><img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="logo" class="center" /></div>

    </div>



    <div id="login">

			<?php echo form_open('login/proses', array('class' => "form-vertical no-padding no-margin", 'autocomplete' => 'off','id'=>'loginform', 'role'=>'form')) ?>

        <div class="lock"><i class="icon-lock"></i></div>
        <div class="control-wrap">
            <h4>User Login</h4>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input id="input-username" type="text" placeholder="Username" name="userid"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend"><span class="add-on"><i class="icon-key"></i></span>
                        <input id="input-password" type="password" placeholder="Password" name="password" />
                    </div>
                    <div class="mtop10">
                        <div class="block-hint pull-left small">
                            <input type="checkbox" id="" /> Remember Me </div>
                        <div class="block-hint pull-right"><a href="javascript:;" class="" id="forget-password">Forgot Password?</a></div>
                    </div>
                    <div class="clearfix space5"></div>
                </div>
            </div>
        </div>
        <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
<?php echo form_close(); ?>

        <form id="forgotform" class="form-vertical no-padding no-margin hide" action="index.html" />
        <p class="center">Enter your e-mail address below to reset your password.</p>
        <div class="control-group">
            <div class="controls">
                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                    <input id="input-email" type="text" placeholder="Email" />
                </div>
            </div>
            <div class="space20"></div>
        </div>
        <input type="button" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
        </form>

    </div>

    <div id="login">
<h4> PT FLAMBOYAN GEMAJASA / 遠東國際人力有限公司</h4>
<h5>PERSON CONTACT /聯絡人 : </h5>
<h5>MS.MAHARTATI (洪慈蓉) (手機/HANDPHONE : 08129901823, 081945356777)</h5>

<h5>ADDRESS 地址 :</h5>
<h5>JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI KEC.LAWANG, KAB.MALANG, EAST JAVA , POST CODE 65251, INDONESIA</h5>
<h5>電話/ TEL : +62-341-425642</h5>
</div>

    <div id="login-copyright"> 2015 &copy; PT Flamboyan Gema Jasa </br> 遠東國際人力有限公司 </div>
<!-- 
 <h6>PT FLAMBOYAN GEMAJASA / 遠東國際人力有限公司</h6>
<h6>PERSON CONTACT /聯絡人 : </h6>
<h6>MS.MAHARTATI (洪慈蓉) (手機/HANDPHONE : 08129901823, 081945356777)</h6>

<h6>ADDRESS 地址 :</h6>
<h6>JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI KEC.LAWANG, KAB.MALANG, EAST JAVA , POST CODE 65251, INDONESIA</h6>
<h6>電話/ TEL : +62-341-425642</h6> -->

    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.blockui.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/scripts.js"></script>
    <script>
        jQuery(document).ready(function() {
            App.initLogin()
        });
    </script>