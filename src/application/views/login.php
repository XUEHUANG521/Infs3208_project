<div class="container login_container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="form-content">
                <?php echo form_open(base_url() . 'login/check_login'); ?>
                <span class="heading">Login</span>
                <?php if ($this->session->flashdata('message')): ?>
                    <?php echo '<p class="alert alert-dismissable alert-success">' . $this->session->flashdata('message') . '</p>'; ?>
                <?php endif; ?>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="required"
                           name="username_or_email" value="<?php if ($username_or_email) {
                        echo $username_or_email;
                    } ?>">
                    <i class="fa fa-user" style="font-size:20px; padding: 2px 55px 5px;"></i>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="required"
                           name="password" value="<?php if ($password) {
                        echo $password;
                    } ?>">
                    <i class="fa fa-lock" style="font-size:20px; padding: 3px 56px 5px;"></i>
                </div>
                <!-- <div class="form-group">
                    <?php echo $error; ?>
                </div> -->
                <div class="form-group">
                    <div class="form-checkbox">
                        <input type="checkbox" value="None" id="checkbox1" name="remember"/>
                        <label for="checkbox1"></label>
                    </div>
                    <span class="text"> Remember me</span>
                    <a href="<?php echo base_url(); ?>forgot_password">Forgot Password?</a>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Log in</button>
                    <a href="<?php echo base_url(); ?>register" class="btn btn-default"> Create an account </a>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
