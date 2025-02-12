
    <div id='wrapper'>
        <div class='application'>
            <div class='application-content'>
                <a href="sign_in.html"><div><img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="logo" class="center" /></div>
                    <span>PT FLAMBOYAN GEMAJASA / 遠東國際人力有限公司</span>
                </a>
            </div>
        </div>
        <div class='controls'>
            <?php echo form_open('login/proses', array('class' => "form-vertical no-padding no-margin", 'autocomplete' => 'off','id'=>'loginform', 'role'=>'form')) ?>
            <div class='caret'>
            </div>
            <div class='form-wrapper'>
                <h1 class='text-center'>Sign in</h1>
                <form accept-charset="UTF-8" action="index.html" method="get" /><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
                    <div class='row-fluid'>
                        <div class='span12 icon-over-input'>
                            <input class="span12" id="email" placeholder="E-mail" type="text" value="" name="userid" />
                            <i class='icon-user muted'></i>
                        </div>
                    </div>
                    <div class='row-fluid'>
                        <div class='span12 icon-over-input'>
                            <input class="span12" id="password" name="password" placeholder="Password" type="password" value="" name="password"  />
                            <i class='icon-lock muted'></i>
                        </div>
                    </div>
                    <label class="checkbox" for="remember_me"><input id="remember_me" name="remember_me" type="checkbox" value="1" />
                        Remember me
                    </label>
         
                    <button class="btn btn-block" name="button" type="submit">Sign in <i class='icon-signin'></i></button>
                    <a  href='<?php echo base_url(); ?>' class='btn btn-block btn-info'>
                        Menu Utama <i class='icon-home'></i>
                    </a>
                </form>
                <div class='text-center'>
                    <hr class='hr-normal' />
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class='login-action text-center'>
            <i class='icon-user'></i>
            <strong>PT FLAMBOYAN GEMAJASA / 遠東國際人力有限公司</strong>
            <br/>
            <strong>PERSON CONTACT /聯絡人 : </strong>
            <br/>
            <strong>MS.MAHARTATI (洪慈蓉) (手機/HANDPHONE : 08129901823, 081945356777)</strong>
            <br/>
            <strong>ADDRESS 地址 :</strong>
            <br/>
            <strong>JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI KEC.LAWANG, KAB.MALANG, EAST JAVA , POST CODE 65251, INDONESIA</strong>
            <br/>
            <strong>電話/ TEL : +62-341-425642</strong>
        </div>
    </div>