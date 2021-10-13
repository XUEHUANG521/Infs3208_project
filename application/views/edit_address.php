
<h1>Edit Address</h1>
<hr />
<br>
<br>
<br>
<br>
<br>
<div class="row">

    <div class="col-4 offset-4">
        <?php if($this->session->flashdata('error')):?>
            <?php echo '<p class="alert alert-dismissable alert-danger">'.$this->session->flashdata('error').'</p>';?>
        <?php endif;?>
        <?php echo form_open(base_url().'show_address/update?id='.$address_id); ?>
        <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">')?>

        <div class="form-group">
            Line 1 <input type="text" class="form-control" placeholder="Required" value="<?php echo $address1 ?>" name="line1">
        </div>
        <br />

        <div class="form-group">
            Line 2 <input type="text" class="form-control" placeholder="Optional" value="<?php echo $address2 ?>" name="line2">
        </div>
        <br />

        <div class="form-group">
            Suburb <input type="text" class="form-control" placeholder="Suburb" value="<?php echo $suburb ?>" name="suburb">
        </div>
        <br />

        <div class="form-group">
            Postcode <input type="text" class="form-control" placeholder="Postcode" value="<?php echo $postcode ?>" name="postcode">
        </div>
        <br />

        <div class="form-group">
            State <input type="text" class="form-control" placeholder="State" value="<?php echo $state ?>" name="state">
        </div>
        <br />

        <div class="form-group">
            Reciver <input type="text" class="form-control" placeholder="Receiver Name" value="<?php echo $receiver ?>" name="receiver">
        </div>
        <br />

        <div class="form-group">
            Phone Number <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo $phone_number ?>" name="phone_number">
        </div>
        <br />

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
        <?php echo form_close(); ?>
    </div>


</div>