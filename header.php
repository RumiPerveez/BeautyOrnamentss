<?php
session_start();
include("conn.php");

if (isset($_POST["btn_cnfrm_ordr"])) {
    $con = new mysqli("localhost", "root", "", "beautyornaments");

    $cust_id = $_POST["cust_id"];
    $cust_name = $_POST["full_name_txt"];
    $cust_email = $_POST["email_txt"];

    $cust_cntry = $_POST["country_txt"];
    $cust_city = $_POST["city_txt"];
    $cust_adress = $_POST["address_txt"];
    $cust_cellno = $_POST["cell_txt"];


    $deliver_charges = 200;
    $total_bill_amnt = $_SESSION["Total_Bill"];
    $order_date = date("Y/m/d");

    $payment_method = "COD";



    $sql_order = "insert into order_tbl values(0,$cust_id,'$order_date');";
    //$con->query($sql_order);


    if ($con->query($sql_order) === TRUE) {
        $last_id = $con->insert_id;
        $last_order_id = $last_id;

        $bill = "INSERT into billing_tbl VALUES(0,'" . $cust_name . "','" . $cust_email . "','" . $cust_cntry . "','" . $cust_city . "','" . $cust_adress . "','" . $cust_cellno . "',$cust_id,$last_order_id,$total_bill_amnt,'" . $order_date . "','" . $payment_method . "',none)";

        $con->query($bill);


        if (!empty($_SESSION["cart_items"])) {
            foreach ($_SESSION["cart_items"] as $items) {
                $p_id = $items[0];
                $p_price = $items[3];
                $p_qty = $items[2];
                $o_id = $last_order_id;

                $sql_order_detail = "insert into order_tbl_dt values(0,$p_id,$p_price,$p_qty,$o_id);";
                $con->query($sql_order_detail);
            }
        }
        $_SESSION["order_id"] = $last_order_id;
    } else {
        echo "Error: " . $sql_order . "<br>";
    }

    header("location:confirm_order.php");
}


if (isset($_POST["btn_login"])) {

    $email = $_POST["email_txt"];
    $password = $_POST["pswrd_txt"];

    $conn = mysqli_connect('localhost', 'root', '', 'beautyornaments');
    $query = "SELECT * FROM customer where email = '$email';";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row["email"] == $email && $row["pswrd"] == $password) {
            $_SESSION["customer_id"] = $row["id"];
            $_SESSION["customer_name"] = $row["name"];
            $_SESSION["customer_email"] = $row["email"];
            $_SESSION["customer_cellno"] = $row["cellno"];
            //echo '<script> alert("login")</script>';
            header("Location:index.php");
        } else {
            echo '<script> alert("login failed")</script>';
        }
    }
}


if (isset($_GET["action"])) {
    if ($_GET["action"] == "logout") {
        unset($_SESSION["customer_id"]);
        unset($_SESSION["customer_name"]);
        unset($_SESSION["customer_email"]);
        unset($_SESSION["customer_cellno"]);
        header("location:index.php");
    }
}
$conn = mysqli_connect('localhost', 'root', '', 'beautyornaments');
if (!$conn) {
    echo "not connected" . mysqli_error($conn);
}

$query1 = "SELECT * FROM sub_category where cate_id=1";
$result1 = mysqli_query($conn, $query1);
$rowcount1 = mysqli_num_rows($result1);


$query2 = "SELECT * FROM sub_category where cate_id=2";
$result2 = mysqli_query($conn, $query2);
$rowcount2 = mysqli_num_rows($result2);

?>



<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Beauty Ornaments</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Brancy - Cosmetic & Beauty Salon Website Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="bootstrap, ecommerce, ecommerce html, beauty, cosmetic shop, beauty products, cosmetic, beauty shop, cosmetic store, shop, beauty store, spa, cosmetic, cosmetics, beauty salon" />
    <meta name="author" content="codecarnival" />

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/plugins/fancybox.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/css/style.min.css">
    <!--gallery css-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

    <!--== Wrapper Start ==-->
    <div class="wrapper">

        <!--== Start Header Wrapper ==-->
        <header class="header-area sticky-header fixex-top">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-5 col-sm-6 col-lg-3">
                        <a href="index.html">
                            <img class="logo-main" src="assets/images/logo.png" style="height:150px;width:auto;" alt="Logo" />
                        </a>
                        <div class="header-logo">

                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="header-navigation">
                            <form method="post">
                                <ul class="main-nav justify-content-start">
                                    <li><a href="index.php">Home</a></li>

                                    <li class="has-submenu position-static"><a href="#">Shop</a>
                                        <ul class="submenu-nav-mega">
                                            <li><a href="#/" class="mega-title">Cosmetic</a>
                                                <ul>
                                                    <?php
                                                    for ($i = 1; $i <= $rowcount1; $i++) {
                                                        $row1 = mysqli_fetch_array($result1);
                                                    ?>
                                                        <li><a href="product.php?sc_id=<?php echo $row1['sub_cate_id']; ?>&&c_name=<?php echo $row1['sub_cate_name']; ?>"><?php echo $row1['sub_cate_name']; ?></a></li>
                                                    <?php
                                                    }
                                                    ?>

                                                </ul>
                                            </li>
                                            <li><a href="#/" class="mega-title">Jewellery</a>
                                                <ul>
                                                    <?php
                                                    for ($i = 1; $i <= $rowcount2; $i++) {
                                                        $row2 = mysqli_fetch_array($result2);
                                                    ?>
                                                        <li><a href="product.php?sc_id=<?php echo $row2['sub_cate_id']; ?>&&c_name=<?php echo $row2['sub_cate_name']; ?>"><?php echo $row2['sub_cate_name']; ?></a></li>
                                                    <?php
                                                    }
                                                    ?>

                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="maingallery.php">Gallery</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="faq.php">FAQ's</a></li>
                                    <li class="has-submenu"><a href="cart.php">Cart</a>

                                    </li>
                                    <li><a href="checkout.php">CheckOut</a></li>
                                    <?php
                                    if (empty($_SESSION["customer_name"])) {
                                        echo ' <li><a href="login.php" style="color:black">Login</a></li>';
                                    } else {
                                        echo ' <li><a href="index.php?action=logout" name="btn_logout">Logout</a></li>';
                                    }

                                    ?>
                                </ul>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!--== End Header Wrapper ==-->