<html>
    <head>
        <title>Upload Product Images</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>

        <!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
           
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js" type="text/javascript"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js" type="text/javascript"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
           
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- the main fileinput plugin file -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
        <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fas/theme.min.js"></script>
    </head>
    <style>
        body {
            background-color: skyblue;
        }
        .background_container {
            margin-top:200px;
        }
        .background_container::before {
            content:"";
            position:absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-image: url('../assets/images/upload_background_image.jpeg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            z-index: -1;
            animation: anim 20s linear infinite;

        }
        .background {
            background-color: white;
            padding: 20px 60px 120px 60px;
        }
    </style>

    <body>
        <div class="background_container">
            <div class="container background">
                <h1>Upload product images</h1>
                <?php echo form_open_multipart('index.php/upload_item/upload_product_image'); ?> 
                <label for="input_file">Step two: choose images for the product</label>
                <input id="input_file" name="image_name[]" type="file" multiple class="file-loading ">
                <?php echo form_close(); ?>
            </div>
        </div>

     
    </body>
</html>

<script>
    $('#input_file').fileinput({
        uploadUrl: "<?php echo base_url().'index.php/upload_item/upload_product_image'?>",
        
        maxFileCount: 5,
        showCaption: true,
        showUpload: true,
        showRemove: true,
        showClose: true,
        enctype: 'multipart/form-data',
        uploadAsync:false, 
        theme: 'fas',
       
        fileActionSettings: {
            showZoom: function(config) {
                if (config.type === 'pdf' || config.type === 'image') {
                    return true;
                }
                return false;
            }
        }
    }).on("filebatchuploadsuccess", function(event, data) {
        $.each(data.files, function(key, file) {
            console.log(file.name);
        });
    });

</script>