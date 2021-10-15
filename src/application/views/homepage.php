<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<head>
    <title>Search</title>
    <!--referenced from https://www.webslesson.info/2018/07/autocomplete-search-box-using-typeahead-in-codeigniter.html -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <style>
        .box {
            width: 100%;
            max-width: 650px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<section class="home_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Welcome to Foodmoji</h1>
            </div>
        </div>
        <div id="prefetch">
            <input type="text"
                   name="search_box" id="search_box" class="form-control input-lg typeahead"
                   placeholder="Search product name here"/>
        </div>
    </div>
</section>
<section class="main_area">
    <div class="main_container">
        <div class="product_wrapper">
            <div class="product_gallery">
                <div class="product_content">
                    <div class="product_image" style="background-image:url(<?php echo base_url('uploads/'.$fruit_path) ?>)">
                    </div>
                    <div class="product_name">
                        <h2><?php echo $fruit['product_name']?></h2>
                    </div>
                    <div class="product_description">
                        <p>$ <span><?php echo $fruit['price']?></span></p>
                        <p>Production date: <span><?php echo $fruit['created_at']?></span></p>
                        <p>Manufacturer: <span><?php echo $fruit['uploader']?></span></p>
                        <p>Delivery: <span>Auspost</span></p>
                        <p>Rating: <span>4</span></p>
                    </div>
                    <form action="<?php echo base_url();?>homepage/post_information" method="post">
                        <input type="hidden" name="id" value="<?php echo $fruit['id']?>">
                        <button class="product_button" type="submit">View More</button>
                    </form>
                </div>
                <div class="product_content">
                    <div class="product_image" style="background-image:url(<?php echo base_url('uploads/'.$vegetable_path) ?>)">
                    </div>
                    <div class="product_name">
                        <h2><?php echo $vegetable['product_name']?></h2>
                    </div>
                    <div class="product_description">
                        <p>$ <span><?php echo $vegetable['price']?></span></p>
                        <p>Production date: <span><?php echo $vegetable['created_at']?></span></p>
                        <p>Manufacturer: <span><?php echo $vegetable['uploader']?></span></p>
                        <p>Delivery: <span>Auspost</span></p>
                        <p>Rating: <span>4</span></p>
                    </div>
                    <form action="<?php echo base_url();?>homepage/post_information" method="post">
                        <input type="hidden" name="id" value="<?php echo $vegetable['id']?>">
                        <button class="product_button" type="submit">View More</button>
                    </form>
                </div>
                <div class="product_content">
                    <div class="product_image" style="background-image:url(<?php echo base_url('uploads/'.$processed_food_path) ?>)">
                    </div>
                    <div class="product_name">
                        <h2><?php echo $processed_food['product_name']?></h2>
                    </div>
                    <div class="product_description">
                        <p>$ <span><?php echo $processed_food['price']?></span></p>
                        <p>Production date: <span><?php echo $processed_food['created_at']?></span></p>
                        <p>Manufacturer: <span><?php echo $processed_food['uploader']?></span></p>
                        <p>Delivery: <span>Auspost</span></p>
                        <p>Rating: <span>4</span></p>
                    </div>
                    <form action="<?php echo base_url();?>homepage/post_information" method="post">
                        <input type="hidden" name="id" value="<?php echo $processed_food['id']?>">
                        <button class="product_button" type="submit">View More</button>
                    </form>
                </div>
                <div class="product_content">
                    <div class="product_image" style="background-image:url(<?php echo base_url('uploads/'.$snacks_path) ?>)">
                    </div>
                    <div class="product_name">
                        <h2><?php echo $snacks['product_name']?></h2>
                    </div>
                    <div class="product_description">
                        <p>$ <span><?php echo $snacks['price']?></span></p>
                        <p>Production date: <span><?php echo $snacks['created_at']?></span></p>
                        <p>Manufacturer: <span><?php echo $snacks['uploader']?></span></p>
                        <p>Delivery: <span>Auspost</span></p>
                        <p>Rating: <span>4</span></p>
                    </div>
                    <form action="<?php echo base_url();?>homepage/post_information" method="post">
                        <input type="hidden" name="id" value="<?php echo $snacks['id']?>">
                        <button class="product_button" type="submit">View More</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    $(document).ready(function () {
        var sample_data = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?php echo base_url(); ?>autocomplete/fetch',
            remote: {
                url: '<?php echo base_url(); ?>autocomplete/fetch/%QUERY',
                wildcard: '%QUERY'
            }
        });


        $('#prefetch .typeahead').typeahead(null, {
            name: 'sample_data',
            display: 'name',
            source: sample_data,
            limit: 10,
            templates: {
                suggestion: Handlebars.compile('<div class="row">' +
                    '<div class="col-md-2" style="color:black; padding-right:5px; padding-left:5px;">' +
                    '<img src="../../proj/uploads/{{image}}" class="img-thumbnail" width="48" />' +
                    '</div>' +
                    '<p><a href="{{actual_url}}">{{name}}</a></p>' +
                    '</div>')
            }
        });
    });
</script>