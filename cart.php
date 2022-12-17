<?php

include("header.php");
include_once("conn.php");

if (isset($_GET["delid"])) {
    $index_id = $_GET["delid"];
    unset($_SESSION["cart_items"][$index_id]);
    //array_values($_SESSION["cart_items"]);
}

?>
<main class="main-content">
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">

                <h2 style="font-size:30px">Cart</h2>
            </ol>
        </div>
    </nav>
    <br><br>
    <div class="container">

        <div class="row">

            <table style="Width:100%;">
                <br>
                <br>
                <thead>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Quanity</th>
                    <th>Product Price</th>
                    <th>Total Price</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    if (isset($_SESSION["cart_items"])) {
                        foreach ($_SESSION["cart_items"] as $item) {
                            echo "<tr>";
                            echo  "<td>" . $item[0] . "</td>";
                            echo  "<td>" . $item[1] . "</td>";
                            echo  "<td>" . $item[2] . "</td>";
                            echo  "<td>" . $item[3] . "</td>";
                            echo  "<td>" . $item[2] * $item[3] . "</td>";
                            echo  "<td><a href='cart.php?delid=" . $i . "'> x </a></td>";
                            echo "</tr>";
                            $i++;
                        }
                        //  var_dump($_SESSION["cart_items"]);
                    }
                    ?>
               
                </tbody>
                
            </table>
            <br>
            <br>
            <div class="mt-5"> <a href="checkout.php" name="checkout_btn" class="btn" style="background-color:#fd9f9d !important;float:right;border:1px solid #fd9f9d;width:20%" > checkout</a></div>
        </div>
    </div>





    <br><br><br>
    <main class="main-content">
        <?php
        include("footer.php");
        ?>