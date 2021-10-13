<?php
 //put your code here 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
    <script src="<?php echo base_url(); ?>assets/js/header.js"></script>    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/header.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/login.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/register.css">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/review_upload.css">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/product_info.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-4.1.3.min.css">
    <title>Product_item</title>
</head>
<header class="header-area">
        <div class="header_container">
            <div class="row">
                <div class="col-lg-2 logo-area">
                    <div>
                        <a href="<?php echo base_url();?>index.php/homepage"><img src="<?php echo base_url();?>assets/images/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="<?php echo base_url();?>index.php/homepage">Homepage</a></li>
							<li id="submenu">
                                <a href="#">Category</a>
                                <ul class="sub-menu">
                                        <li><a>Fruit</a></li>
                                        <li><a>Vegatable</a></li>
                                        <li><a>Processed Food</a></li>
                                        <li><a>Snacks</a></li>
                                </ul>
                        </li>
                            
							<li><a href="<?php echo base_url();?>index.php/upload_item">Post Trade</a></li>
							<li><a href="<?php echo base_url();?>index.php/cart">Cart</a></li>
							<li><a>About us</a></li>
                            <?php if(!$this->session->userdata('logged_in')) : ?>
                                <li>
                                    <a id="login_button" href="<?php echo base_url();?>index.php/login">Log in</a>
                                </li>
                                <li>
                                    <a id="register_button" href="<?php echo base_url();?>index.php/register">Register</a>
                                </li>
                                <?php endif; ?>
                                <?php if($this->session->userdata('logged_in')) : ?>
                                <li class="personal_logo"  id="sub-menu-1">
                                <?php
                                if($this->session->userdata('logged_in')){
                                    $user_info = $this->user_model->get_icon($_SESSION['username']);
                                    $username =$user_info[0]['username'];
                                    $user_icon_path = base_url().'uploads'.$user_info[0]["user_img_path"];
                                }
                                else{
                                    $username = 'dear';
                                    $user_icon_path = base_url().'assets/images/logo.png';
                                }?>
                                <a href="<?php echo base_url(); ?>user_profile"><img src="<?php echo $user_icon_path;?>" alt="logo"></a> Welcome, <?php echo $username; ?>
                                <ul class="sub-menu-1">
                                    <li><a href="<?php echo base_url(); ?>user_profile"> Profile </a ></li>
                                    <li><a id="logout_button" href="<?php echo base_url(); ?>login/logout"> Log out </a></li>
                                </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
