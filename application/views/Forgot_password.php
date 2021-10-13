<br>

<?php
    if($this->session->flashdata('message')){
        echo '<p class="alert alert-dismissable alert-success">'.$this->session->flashdata('message').'</p>';
    }
    elseif ($this->session->flashdata('error')){
        echo '<p class="alert alert-dismissable alert-danger">'.$this->session->flashdata('error').'</p>';
    }
?>

<div class="container">
    <p>Enter your registered Email and new password</p>
    <br>
    <div class="col-4 offset-4">
        <?php echo form_open(base_url().'forgot_password/validate');?>
        <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">');?>
        <div class="form-group">
            Email Address <input type="email" class="form-control" placeholder="Input your email" required="required" name="email">
        </div>
        <div class="form-group">
            New Password <input type="password" class="form-control" id="pwd" placeholder="Minimum 8 characters password" required="required" name="password">
            <div><span id="span1"></span><span id="span2"></span><span id="span3"></span></div>
        </div>
        <div class="form-group">
            Confirm Password <input type="password" class="form-control" placeholder="Input your new password again" required="required" name="password2">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>


<style type="text/css">

    .weak {background: #FF9900;}
    .medium {background: #33CC00;}
    .strong {background: #008000;}
    #submit {margin-top: 2rem;}
    span {display: inline-block;width: 30%;height: 5px;line-height: 5px;background: #ddd;margin: 0.5rem 2px;}
</style>
<script type="text/javascript">
    window.onload = function(){
        var passwordInput = document.getElementById('pwd');
        passwordInput.value = '';
        var span1 = document.getElementById('span1');
        var span2 = document.getElementById('span2');
        var span3 = document.getElementById('span3');

        passwordInput.onkeyup = function(){
            //default strength
            span1.className = span2.className = span3.className = "default";
            console.log(span1.className);
            var pwd = passwordInput.value;
            console.log(pwd);
            var result = 0;
            for(var i = 0, len = pwd.length; i < len; ++i){
                console.log(pwd.charCodeAt(i));
                result |= charType(pwd.charCodeAt(i));
            }
            var level = 0;
            //calculate strength level
            for(var i = 0; i <= 4; i++){
                if(result & 1){
                    level ++;
                }
                console.log("result: "+result);
                console.log("level: "+level);
                //right shift 1 digit
                result = result >>> 1;
            }
            if(pwd){
                console.log(pwd);
                console.log("switch level: "+level);
                switch (level) {
                    case 1:
                        span1.className = "weak";
                        break;
                    case 2:
                        span1.className = "medium";
                        span2.className = "medium";
                        break;
                    case 3:
                    case 4:
                        span1.className = "strong";
                        span2.className = "strong";
                        span3.className = "strong";
                        break;

                }
                console.log(span1.className);
            }
        }
    }
    /*
      num 0001 -->1 48~57
      lower case latter 0010 -->2 97~122
      upper case latter 0100 -->4 65~90
      special 1000 --> 8
    */
    function charType(num){
        if(num >= 48 && num <= 57){
            return 1;
        }
        if (num >= 97 && num <= 122) {
            return 2;
        }
        if (num >= 65 && num <= 90) {
            return 4;
        }
        return 8;
    }
</script>
