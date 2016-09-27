<?php 
View::$title = 'User Login';
View::$bodyclass = 'page-body login-page login-light';
View::header('users'); 
?>
<div class="login-container">

<a class="hiddenanchor" id="toregister"></a>
<a class="hiddenanchor" id="tologin"></a>
    
    <form method="post" id="login" class="login-form fade-in-effect in">
        <input type="hidden" name="action" value="login" />

        <div class="login-header text-center">
            <a href="dashboard-1.html" class="logo">
                <?php View::image('logo-odeon.png','','big img-responsive'); ?>
            </a>
            <br>
            <p>Please Sign in to Access Your Account</p>
            <br>
            <?php echo View::getMessage(); ?>
        </div>
        
        <div class="form-group">
            <label class="control-label" for="username">Enter User ID</label>
            <input type="text" class="form-control" name="usr" required="" />
        </div>
        
        <div class="form-group">
            <label class="control-label" for="passwd">Password</label>
            <input type="password" class="form-control" name="pwd" required="" />
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary submit btn-block text-center" href="#">
                <i class="fa-lock"></i>
                Log In
            </button>
        </div>
        
        <div class="login-footer text-center">
            <div class="col-xs-6">
                <a href="<?php echo View::url('users/register'); ?>" class="to_register"> Create Account </a>
            </div>
            <div class="col-xs-6">
                <a class="reset_pass" href="<?php echo View::url('users/lostpassword'); ?>">Lost your password?</a>
            </div>
            <div class="clearfix"></div>
   
        </div>
        
    </form>
    
</div>
<?php View::footer('users'); ?>