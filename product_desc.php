<?php

include('header.php');
include_once('conn.php');
$con = new connec();

$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$query = "SELECT * FROM product WHERE p_id = $id";
$result = $con->select_by_query($query);


if (isset($_POST["btn_addcart"])) {
    $product_id = $id;
    $product_name = $_POST["p_name"];
    $product_qty = $_POST["p_qty"];
    $product_price = $_POST["p_price"];
    $items_arr = array($product_id, $product_name, $product_qty, $product_price);

    if (!empty($_SESSION["cart_items"])) {
        array_push($_SESSION["cart_items"], $items_arr);
    } else {
        $_SESSION["cart_items"] = array();
        array_push($_SESSION["cart_items"], $items_arr);
    }

}
?>
<main class="main-content">

    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">

                <h2 style="font-size:30px">Product Description</h2>
            </ol>
        </div>
    </nav>


    <!--== Start Product Details ==-->
    <section class="section-space">
        <div class="container">

            <form method="post">

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                ?>
                        <div class="row product-details">
                            <div class="col-lg-6">
                                <div class="product-details-thumb">
                                    <!--<img src="assets/images/gallery/bangles/b1.jpg" style="height:500px;width:550px" class="img_desc" alt="Image">-->
                                    <img src="<?php echo $row["p_img"]; ?>" style="height:500px;width:450px;border: 2px solid pink;border-radius: 25px;" class="img_desc" alt="Image">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details-content " style="padding-left:-5px">
                                    <!--Product Name--->
                                    <h3 style="font-size:20px"><strong><?php echo $row["p_name"]; ?></strong></h3>
                                    <!--Product color--->

                                    <h4 style="line-height:40px;color:#C7BEA2"><strong>Color: <?php echo $row["p_color"]; ?></strong></h4>
                                    <!--Product quantity--->

                                    <?php
                                    if ($row["p_qty"] == 0) {
                                        echo '<br><br>';
                                        echo '<h5 style="color:grey !important;font-size:15px!important"> <strong> Out Of Stock<strong> </h5>';
                                    } else {

                                        echo '<h5 style="line-height:20px;color:#C7BEA2;font-size:17px;"> <strong>In Stock</strong> </h5>';
                                        echo '<h2 style="font-size:18px;margin-top:40px"><strong>Qunatity</strong></h2>';
                                        echo ' <input type="number" class="form-control" name="p_qty" min="1" max="' . $row["p_qty"] . '" 
                                    aria-describedby="helpId" placeholder="" required>';

                                    ?>
                                        <h4 style="font-size:24px;font-weight:600;line-height:45px;margin-top:40px">PKR <?php echo $row["p_price"]; ?>.00</h4>
                                        <hr>
                                    <?php

                                        //echo '<div class="product-details-pro-qty mt-5" >  <div class="pro-qty"> <input   id="p_qty" name="p_qty" style="border:1px solid #fd9f9d" title="Quantity" min="1" max="' . $row["p_qty"] . '" name="p_qty" id="p_qty" value="01" aria-describedby="helpId" class="form-control"/> </div> </div>';
                                        echo '<br>';
                                        echo '<div > <button   type="submit" id="btn_addcart" name="btn_addcart" class="btn" style="background-color:#fd9f9d !important;border:1px solid #fd9f9d" >Add To Cart</button> <a href="cart.php" name="checkout_btn" class="btn" style="background-color:#fd9f9d !important;border:1px solid #fd9f9d" >Check Cart</a></div>';
                                    }
                                    ?>
                                    <br>



                                    <input type="hidden" name="p_name" value="<?php echo $row["p_name"]; ?>" />
                                    <input type="hidden" name="p_price" value="<?php echo $row["p_price"]; ?>" />



                                    <!--Product details--->
                                    <h2 style="font-size:18px;margin-top:40px;"><strong>Product details</strong></h3>
                                        <p class="mb-7"><?php echo $row["p_details"]; ?></p>



                                </div>

                            </div>
                        </div>


                <?php
                    }
                }

                ?>
            </form>
            <script>
                function link() {
                    var qty = document.getElementById("p_qty").value;
                    document.getElementById("btn_addcart").href = "product_desc.php?p_id=<?php echo $row["p_id"]; ?>&action=add&p_qty=" + qty;
                }
            </script>




        </div>
    </section>
    <!--== End Product Details ==-->











</main>

<?php
include('footer.php');
?>