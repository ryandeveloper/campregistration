<?php 
View::$title = 'Request Password';
View::$bodyclass = 'loginpage';
View::header('users'); 
?>
<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="login" class=" form">
            <section class="login_content">
                <form>
                    <h1>User Login</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="#">Log in</a>
                        <a class="reset_pass" href="<?php echo View::url('user/lostpassword'); ?>">Lost your password?</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="<?php echo View::url('user/register'); ?>" class="to_register"> Create Account </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Odeon & Co.!</h1>

                            <p><?php echo Configuration::sitetitle; ?></p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<?php View::footer('users'); ?>