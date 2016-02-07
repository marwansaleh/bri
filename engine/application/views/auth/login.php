<style>
    .form-group {margin-bottom: 5px;}
</style>
<div class="login-alert-box">
    <div id="alert-login" class="login-alert-content">
        <?php echo isset($message_error)?$message_error:''; ?>
    </div>
</div>
<div class="container">
    <form method="post" id="login-form" class="login-form validation" action="<?php echo $submit; ?>" >        
        <div class="login-wrap">
            <p class="login-img"><i class="glyphicon glyphicon-lock"></i></p>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username /email" value="<?php echo $submitted ? $submitted['username'] : (isset($remember) ? $remember->username:''); ?>" autofocus>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" value="<?php echo $submitted ? $submitted['password'] : (isset($remember) ? $remember->password:''); ?>" placeholder="Password">
            </div>
            <div class="row">
                <div class="col-sm-6"><?php echo $captcha['image']; ?></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="captcha" placeholder="Captcha">
                    </div>
                </div>
            </div>
            <label class="checkbox">
                <input type="checkbox" name="remember" value="remember-me" <?php echo ($submitted && $submitted['remember']) ? 'checked="checked"' : (isset($remember)?'checked="checked"':''); ?>> Remember me
                
            </label>
            <button id="btn-login" class="btn btn-primary btn-lg btn-block" data-loading-text="loading..." type="submit">Login</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('img#captcha').removeAttr('style').addClass('img-responsive');
        
        $('form.validation').validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                captcha: {
                    required: true
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            submitHandler: function (form){
                
            }
        });
    });
</script>
<script src="<?php echo get_lib_url('jquery-validation/jquery.validate.min.js'); ?>"></script>