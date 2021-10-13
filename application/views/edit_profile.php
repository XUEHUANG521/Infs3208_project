<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1>New information</h1>
<hr />

<div class="row">
    <div class="col-md-3">
<!--        <img id="profile_img" class="mb-3 rounded-pill mt-1" src="--><?php //echo base_url().'uploads/'.$profile_img[0]["filename"];?><!--" alt="your picture"/>-->
<!--        --><?php //echo form_open_multipart('upload/update_profile_img');?>
        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-6 centered">

                <div class="form-group">
                    <input class="form-control" type="file" name="userfile">
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">

                    <a href="<?php echo base_url(); ?>upload_icon" class="btn btn-default"> Change </a>

<!--                    <button type="submit" class="btn btn-primary btn-sm" value="upload">Change</button>-->
                </div>
            </div>
        </div>
        <?php echo form_close();?>

        <br />

    </div>
    <div class="col-4 offset-4">
        <?php if($this->session->flashdata('error')):?>
            <?php echo '<p class="alert alert-dismissable alert-danger">'.$this->session->flashdata('error').'</p>';?>
        <?php endif;?>
        <?php echo form_open(base_url().'edit_profile/update'); ?>
        <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">')?>

        <div class="form-group">
            Username <input type="text" class="form-control" placeholder="Input your new username" name="username" value="<?php echo $users[0]['username']; ?>">
        </div>

        <div class="form-group">
            Email Address <input type="email" class="form-control" placeholder="Input your new email" name="email" value="<?php echo $users[0]['email']; ?>">
        </div>

        <div class="form-group">
<!--            <a href="--><?php //echo base_url(); ?><!--edit_profile" class="btn btn-default"> Edit Profile </a>-->
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
        <?php echo form_close(); ?>
    </div>


</div>