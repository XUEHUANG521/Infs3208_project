<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
    body {
        font-family: 'Lato', sans-serif;
    }
}

    h1 {
        margin-bottom: 40px
    }

    label {
        color: #333
    }
    .product_button {
        padding: 10px;
        font-size: 18px;
        left:80px;
        top: 40px;
        /*bottom: 20px;*/
        position: absolute;
        border-radius: 15px;
        background-color: skyblue;
    }
    .product_button:hover{
        color:#117a8b;
        background-color: white;
        opacity: 0.8;
    }
    .upload_background {
        width: 100%;
        height: 100%;
        padding: 1rem;
    }
    .upload_background-image::before {
        content:"";
        position:absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-image: url('../assets/images/stock-photo-7809533.jpeg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        z-index: -1;
        animation: anim 20s linear infinite;

    }
    @keyframes anim {
    25% {
        filter:blur(1px);
        transform: scale(1.1);
    }
    50%{
        filter:blur(3px);
        transform: scale(1.2);
    }
    75%{
        filter:blur(5px);
        transform: scale(1.3);
    }
    100%{
        filter: 0;
        transform: scale(1);
    }
}
    .form_background {
        opacity: 0.8;
    }

    .btn-send {
        font-weight: 300;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        width: 80%;
        margin-left: 3px
    }

    .help-block.with-errors {
        color: #ff5050;
        margin-top: 5px
    }

    .card {
        margin-left: 10px;
        margin-right: 10px
    }
</style>
<div class="upload_background-image">
    <form action="<?php base_url()?>/proj/homepage">
            <button class="product_button" type="submit"> Home </button>
    </form>
    <div class="container upload_background"> 
    <div class=" text-center mt-5">
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container form_background">
                        <form action="<?php echo base_url(); ?>upload_item/upload" id="contact-form" role="form" method="post">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Product Name *</label> <input id="form_name" type="text" name="pname" class="form-control" placeholder="Please enter your product name *" required="required" data-error="Product name is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Price *</label> <input id="form_lastname" type="number" min="0" name="price" class="form-control" placeholder="Please enter your project price" required="required" data-error="Price is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Quantity *</label> <input id="form_email" type="number" min="0" name="qty" class="form-control" placeholder="Please enter your quantity *" required="required" data-error="Quantity is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_need">Which category *</label> <select id="form_need" name="category" class="form-control" required="required" data-error="Please select the category">
                                                <option value="" selected disabled>--Select Your Category--</option>
                                                <option>fruit</option>
                                                <option>vegetable</option>
                                                <option>processed_food</option>
                                                <option>snacks</option>
                                            </select> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"> <label for="form_name">Unit number *</label> <input id="form_name" type="text" name="unit" class="form-control" placeholder="enter Unit number *" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"> <label for="form_lastname">Street *</label> <input id="form_lastname" type="text" name="street" class="form-control" placeholder="enter Street *" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"> <label for="form_need">State *</label> <select id="form_need" name="state" class="form-control" required="required" data-error="Please select the category">
                                                <option value="" selected disabled>--Select State--</option>
                                                <option>NSW</option>
                                                <option>QLD</option>
                                                <option>SA</option>
                                                <option>TAS</option>
                                                <option>VIC</option>
                                                <option>WA</option>
                                                <option>ACT</option>
                                                <option>NT</option>
                                        </select> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">Description *</label> <textarea id="form_message" name="des" class="form-control" placeholder="Write your message here." rows="4" required="required" data-error="Please, leave us a message."></textarea> </div>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Send Message"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>
</div>
</div>
