<h1>My Items</h1>
<br />
    <?php if(!$uploads and !$buys): ?>
        <?php print_r('You haven\'t bought or post anything :)'); ?>
    <?php endif;?>
<div>
    <button id="upload_btn" onclick="show_upload()">
        Uploaded Items
    </button>
    <button id="bought_btn" onclick="show_bought()">
        Bought Items
    </button>
</div>


<div id="upload-items">
    <table class="table text-center">
        <thead class="thead-light">
        <tr>
            <th></th>
            <th>Product Name</th>
            <th>Price</th>
            <th>View Detail</th>
        </tr>
        </thead>
        <!--    <h2>Uploaded Items:</h2>-->
        <tbody>
        <?php
        foreach($uploads as $item) {
            $url = "index.php/homepage/get_information?id=".$item['id'];
            $path = explode(";", $item["image_filepath"]);

            if (count($path) > 1) {
                $show_path = $path[1];
            } else {
                $show_path = "aaa.png";
            }
            echo "
        <tr>
            <td> 
                <img src='../../proj/uploads/{$show_path}' class='rounded img-thumbnail' width='100px' />
            </td>

            <td>
                " . $item['product_name'] . "
            </td>
            <td>
                " . $item['price'] . "</span></p>
            </td>
            <td>
                <a href=".$url.">View more</a>
            </td>
        </tr>";
        } ?>
        </tbody>
    </table>
</div>

<div id="bought-items">
    <table class="table text-center">
        <!--    <h2>Bought Items:</h2>-->
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
        foreach($buys as $item) {
            $url = "index.php/homepage/get_information?id=".$item['id'];
            echo "
        <tr>
            <td> 
                <img src='../../proj/uploads/{$show_path}' class='rounded img-thumbnail' width='100px' />
            </td>

            <td>
                " . $item['product_name'] . "
            </td>
            <td>
                " . $item['price'] . "</span></p>
            </td>
            <td>
                <a href=".$url.">View more</a>
            </td>
        </tr>";
        } ?>
        </tbody>
    </table>
</div>

<style>
    #upload-items{
        display:inline;
    }
    #bought-items{
        display:none;
    }
    #upload_btn{
        color:blue;
        background-color: white
    }
    #bought_btn{
        color:black;
        background-color: white
    }
</style>
<script>
    var uploaded = 1;
    var bought = 0;
    function show_upload() {
        if (uploaded == 0) {
            document.getElementById("upload-items").style.display = "inline";
            document.getElementById("bought-items").style.display = "none";
            document.getElementById("upload_btn").style.color = "blue";
            document.getElementById("bought_btn").style.color = "black";
            uploaded = 1;
            bought = 0;
        }
    }

    function show_bought() {
        if (bought == 0) {
            document.getElementById("bought-items").style.display = "inline";
            document.getElementById("upload-items").style.display = "none";
            document.getElementById("upload_btn").style.color = "black";
            document.getElementById("bought_btn").style.color = "blue";
            bought = 1;
            uploaded = 0;
        }
    }
</script>