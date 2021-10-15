<div class="container profile_container">	
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="form-user" style="margin-bottom:16rem;">
                <?php
                    if($this->session->flashdata('message')){
                        echo '<p class="alert alert-dismissable alert-success">'.$this->session->flashdata('message').'</p>';
                    }
                    elseif ($this->session->flashdata('error')){
                        echo '<p class="alert alert-dismissable alert-danger">'.$this->session->flashdata('error').'</p>';
                    }
                ?>
				<?php echo form_open(base_url().'Edit_profile/update'); ?>
                <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">')?>
                    <div class="form-group" style="padding: 10px 0 0 0;">
						<a href="<?php echo base_url(); ?>user_profile" class="btn btn1" >Return</a>
					</div>
					<span class="heading" style="font-size: 32px; padding:60px 0 10px 11px;">Update information</span>       
                    <div class="form-group">
                        Username<input type="text" class="form-control" value="<?php echo $this->session->userdata('username') ?>" required="required" name="username">
					</div>
					<div class="form-group">
                        Email Address <input type="email" class="form-control" placeholder="Input your new email" name="email" value="<?php echo $this->user_model->get_email($this->session->userdata('username')) ?>">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Save</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
