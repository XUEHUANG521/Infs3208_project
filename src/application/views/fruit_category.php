<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!--UI Style of this page referenced from https://codepen.io/armanshojaei/pen/MJmRbW-->
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body>
<div style=" margin-top: 100px;" class="container control-padding">
    <h1 style=" margin-bottom: 100px; text-align: center"> Category: <?php echo $array[0]['category']?></h1>
<?php
$test = "

    <div class=\"col-sm-4 col-xs-6 control-padding\">
        <!--- Card - start --->
        <div class=\"card\">
            
            <img style=\" object-fit:cover; max-height: 298px; \" src=\"%s\" alt=\"\">

            <div class=\"content\">
                <h3> Name: %s </h3>
                <label class=\"redColor\">Category: %s </label>
                <div class=\"price\">
                    <p class=\"gheymat\">$ %s</p>
                </div>
                <form class='card1' action=\"%s \">
                    <input type=\"hidden\" name=\"id\" value=\"%s\">
                    <button class='btn btn-success' type=\"submit\"> View details </button>
                </form>
            </div>
            
        </div>
        <!--- Card - end --->
    </div>
		";

foreach ($array as $arr) {
    $url = explode(";", $arr['image_filepath']);
    if (count($url) > 1) {
        $filepath = $url[1];
    } else {
        $filepath = "unnamed.jpg";
    }
    $image_path = "uploads/".$filepath;
    $product_id = $arr['id'];
    $action_url ="homepage/get_information";
    printf($test, $image_path, $arr['product_name'], $arr['category'],$arr['price'], $action_url,$product_id);
}


?>
</div>
</body>

<style>
    body {
        margin: 50px 0;
        background-color: #f5f3f3 !important;
        text-align: right !important;
        font-family: 'IRANSans', Tahoma !important
    }

    .control-padding {
        padding: 3px;
    }

    .card {

        bottom: 70px;
        right: 10px;
        background-color: white;
        padding: 0 !important;
        overflow: hidden;
        border: solid 1px rgba(0, 0, 0, 0.08);
        border-top: none;
        border-bottom: solid 2px rgba(0, 0, 0, 0.09)
    }

    @media (max-width: 768px) {
        .card {
            background-color: white;
            padding: 0 !important;

        }

        .productSection {
            padding: 0 !important;
        }

    }

    .card button {
        border-radius: 0px !important;
        border: none;
        border-radius: 0 !important;
    }

    .card img {
        width: 100%;
        display: block;
        margin: 0 auto;
    }

    .card .content {
        padding: 10px 20px;
    }

    .card .content h4 {
        font-size: 13px;
    }

    .card .content label {
        padding: 1px 5px;
        border-radius: 3px;
        font-size: 12px;
        font-weight: 300;
        color: #fff;
    }

    .card .content .price {
        margin-top: 15px;
    }

    .card .content .price p {
        padding: 0 !important;
        margin: 0 !important;
    }

    .card .content .price p.takhfif {
        text-decoration: line-through;
        color: rgba(0, 0, 0, 0.3);
        font-weight: 500 !important;
    }

    .card .content .price p.gheymat {
        color: #00C853;
        font-size: 18px;
        font-weight: bold !important;
    }

    /** Label Colors **/
    .redColor {
        background-color: #EF5350 !important;
        color: #fff !important;
    }

    .orangeColor {
        background-color: #FF6D00 !important;
        color: #fff !important;
    }

    .purpleColor {
        background-color: #7B1FA2 !important;
        color: #fff !important;
    }

</style>