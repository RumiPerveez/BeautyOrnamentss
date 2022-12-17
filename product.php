<?php
include('header.php');
include_once('conn.php');



$conn = new connec();
if (isset($_GET["sc_id"]) && isset($_GET["c_name"])) {
    $sub_cat_id = $_GET["sc_id"];
    $C_name = $_GET["c_name"];
}
$query = "SELECT * FROM product WHERE p_sub_cate_id= $sub_cat_id";
$result = $conn->select_by_query($query);

?>


<main class="main-content">

    <!--== Start Page Header  ==-->
    <section class="page-header-area pt-10 pb-9">

        <div class="row">
            <div class="col-md-12">
                <div class="page-header-st3-content text-center text-md-start">
                    <nav aria-label="breadcrumb" class="breadcrumb-style1">
                        <div class="container">
                            <ol class="breadcrumb justify-content-center">

                                <h2 style="font-size:25px"><?php echo $C_name; ?></h2>
                            </ol>
                        </div>
                    </nav>


                </div>
            </div>

        </div>

    </section>
    <!--== End Page Header ==-->


    <!--== Start Product Area ==-->
    <section class="section-space">
        <div class="container">
            <div class="row" style="margin-left:auto;margin-right:auto;">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>


                        <div class="col-sm-4 col-lg-3  mb-4 " style="box-shadow:2px 2px 2px 2px grey;border-radius:8px;margin:4%">

                            <!--== Start Product Item ==-->
                            <div class="product-item">
                                <div class="product-thumb">
                                    <a class="d-block" href="#">
                                        <img src="<?php echo $row["p_img"]; ?>" width="330" height="400" alt="Image-HasTech">
                                    </a>

                                    <div class="product-action">
                                        <button>
                                            <a type="button" style="vertical-align:text-bottom !important;" class="product-action-btn action-btn-cart" href="product_desc.php?id=<?php echo $row["p_id"]; ?>">
                                                <span style="margin-top:10px !important"> View Details</span>
                                            </a>
                                        </button>


                                    </div>
                                </div>
                                <div class="product-info">

                                    <h6><?php echo $row["p_name"]; ?></h6>
                                    <div class="prices">
                                        <span class="price">PKR<?php echo $row["p_price"]; ?>.00</span>

                                    </div>
                                    <br>

                                </div>
                                <div class="product-action-bottom">
                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                        <i class="fa fa-expand"></i>
                                    </button>
                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                        <i class="fa fa-heart-o"></i>
                                    </button>
                                    <button class="btn_cart" type="submit" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                        <span>View Details</span>
                                    </button>

                                </div>
                            </div>
                            <!--== End prPduct Item ==-->
                        </div>
                        <br>
                        <br>
                <?php
                    }
                } else {
                    echo '<h5>No Record Found</h5>';
                }
                ?>
            </div>



        </div>
        </div>
    </section>
    <br>
    <!--== End Product Area  ==-->

</main>

<?php
include('footer.php');
?>