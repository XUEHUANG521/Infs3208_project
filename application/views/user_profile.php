<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1>User Profile</h1>
<hr/>
<div class="row">
    <div class="col-md-3">
        <div id="profile_img_div">
            <img id="profile_img" class="mb-3 rounded-pill mt-1" width="200px"
                 src="<?php echo base_url() . 'uploads' . $profile_img[0]["user_img_path"]; ?>" alt="your avatar"/>
            <?php echo form_open_multipart('upload_icon/upload_user_icon'); ?>
            <div class="row justify-content-center">
                <div class="col-md-4 col-md-offset-6 centered">

                    <div class="form-group">
                        <input class="form-control" type="file" name="userfile">
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm" value="upload">Change</button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <br/>
    </div>
    <div class="col-md-9">
        <div class="user-profile">
            <table class="table table-bordered">

                <tr>
                    <td><strong>User Name</strong></td>
                    <td><?php echo $users[0]['username']; ?></td>
                </tr>

                <tr>
                    <td><strong>Email</strong></td>
                    <td><?php echo $users[0]['email']; ?></td>
                </tr>

                <tr>
                    <td><strong>Created At</strong></td>
                    <td><?php echo $users[0]['date_created']; ?></td>
                </tr>

            </table>
        </div>
        <div class="userlinks">
            <a href="<?php echo base_url(); ?>edit_profile" class="btn btn-default"> Edit Profile </a>
            <a href="<?php echo base_url(); ?>reset_password" class="btn btn-default"> Reset Password </a>
            <a href="<?php echo base_url(); ?>show_address" class="btn btn-default"> My Address </a>
            <a href="<?php echo base_url(); ?>show_item" class="btn btn-default"> My Items </a>
        </div>
        <br>
        <br>
        <br>
        <h1>Recent Viewed</h1>
        <br>
        <blockquote>
            <table class="table text-center">
                <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>View Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_SESSION['viewed_products'])) {
                    $session_arr = $_SESSION['viewed_products'];
                    $cnt = count($session_arr);
                    for ($x = $cnt - 1; $x >= 0; $x--) {
                        $url = "index.php/homepage/get_information?id=" . $session_arr[$x]["id"];

                        echo "
                <tr>
                    <td> <img src='../../proj/uploads/{$session_arr[$x]["path"]}' class='rounded img-thumbnail' width='300px' /></td>
					<td> {$session_arr[$x]["product_name"]}</td>
					<td> {$session_arr[$x]["price"]}</td>
					<td> <a href='{$url}'>View</a></td>
				</tr>
			";

                    }
                }

                ?>
                </tbody>
            </table>
        </blockquote>
    </div>
</div>
<style>
    blockquote {
        padding: 20px;
        width: auto;
        background-color: white;
        box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0.1),
        0 0 0 2px rgb(255, 255, 255),
        0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
    }
</style>
<script>
    $(document).on("click", "#profile_img", function (e) {
        e.preventDefault();
        $("input[id='my_profile']").click();
        $(document).on('change', '#my_profile', function (e) {
            var property = event.target.files[0];
            var image_name = property.name;
            var form_data = new FormData();
            form_data.append("file", property);
            //var upload_data = new FormData($('#my_profile'));
            $.ajax({
                url: "<?php echo base_url() . 'upload/update_user_icon'; ?>",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var filename = data[0]['filename'];
                    console.log(filename);
                    img = `<img id="profile_img" class="mb-3 rounded-pill mt-1" src="<?php echo base_url(); ?>uploads/${data[0]['filename']}" alt="your picture"/>`;
                    $('#profile_img_div').html(img);
                }
            });
        });
    });

    function fetch_profile_img() {
        $.ajax({
            url: "<?php echo base_url() . 'user_profile/get_icon'; ?>",
            type: "post",
            dataType: "json",
            success: function (data) {
                if (data) {
                    //img = `<img src="' +'<?php echo base_url(); ?>/uploads/' +'${data[0]['filename']}' + '" />`;
                }
                $("#profile_img_div").html(data);
            }
        });
    }
</script>
