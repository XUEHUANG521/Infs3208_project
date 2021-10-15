<h1>My Address</h1>
<br />
<br />
<br />
<br />
<br />
<?php if($this->session->flashdata('error')):?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('error').'</p>';?>
<?php endif;?>

<?php foreach($address as $item){
    if ($item['receiver']){
        $receiver = $item['receiver'];
    }
    else{
        $receiver = $_SESSION['username'];
    }
    $edit_url = "index.php/show_address/edit?id=".$item["address_id"];
    $del_url = "index.php/show_address/delete?id=".$item["address_id"];
    echo "<div class='container'>
    <div class=\'address_info\'>
        <h3>Address:</h3>
        <p><span>".$item['address1']."</span></p>
        <p><span>".$item['address2']."</span></p>
        <p><span>".$item['suburb']."</span> <span>".$item['postcode']."</span></p>
        <p><span>".$item['state']."</span></p>
        <p>Receiver: <span>".$receiver."</span></p>
        <p>Phone Number: <span>".$item['phone_number']."</span></p>
        <a href='{$edit_url}'>Edit</a>
        <a href='{$del_url}'>Delete</a>
    </div>
</div>
<br />";
} ?>
<div class="addresslinks">
<!--    <a href="--><?php //echo base_url(); ?><!--edit_address" class="btn btn-default"> Edit Address </a>-->
    <a href="<?php echo base_url(); ?>show_address/add" class="btn btn-default"> Add Address </a>
</div>