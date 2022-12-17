<?php

include('header.php');

?>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'beautyornaments');
if (!$conn) {
    echo "not connected" . mysqli_error($conn);
}
?>


<?php
$msg = '';
if (isset($_POST['submit'])) {

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "images/$image");

    $query = "INSERT INTO slide (img) VALUES ('$image')";
    $query_result = mysqli_query($conn, $query);

    if ($query_result) {
        $msg = 'image upload successfully!';
    } else {
        $msg = 'error' . mysqli_error($conn);
    }
}

$query = "SELECT * FROM slide";
$result = mysqli_query($conn, $query);

$rowcount = mysqli_num_rows($result);

$query = "SELECT * FROM best_product";
$result1 = mysqli_query($conn, $query);

$row_count = mysqli_num_rows($result);

?>

<?php


?>
<main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <section class="hero-two-slider-area position-relative">
        <div class="swiper hero-two-slider-container">
            <div class="swiper-wrapper">
                <?php

                for ($i = 1; $i <= $rowcount; $i++) {
                    $row = mysqli_fetch_array($result);
                ?>
                    <div class="swiper-slide hero-two-slide-item">
                        <div class="container">
                            <div class="row align-items-center position-relative">
                                <div class="col-12 col-md-6">
                                    <div class="hero-two-slide-content">
                                        <div class="hero-two-slide-text-img"></div>
                                        <h2 class="hero-two-slide-title"><?php echo $row["head"]; ?></h2>
                                        <p class="hero-two-slide-desc"><?php echo $row["descr"]; ?></p>
                                        <div class="hero-two-slide-meta">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="hero-two-slide-thumb">
                                        <img src="assets/images/slider/<?php echo $row['img']; ?>" width="600px" height="550px" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <!--== Add Pagination ==-->
            <div class="hero-two-slider-pagination"></div>
        </div>
    </section>
    <!--== End Hero Area Wrapper ==-->



    <!--== Start Product Area Wrapper ==-->
    <section class="section-space pt-0" style="margin-top:70px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">Best Product</h2>
                        <p class="m-0">Enfold the fall season with our Best Products which gives you a vibrant Look</p>
                    </div>
                </div>
            </div>
            <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                <?php
                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
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
                                            <a type="button" style="vertical-align:text-bottom !important;" class="product-action-btn action-btn-cart" href="product_desc.php?id=<?php echo $row["id"]; ?>">
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

                                    <button class="btn_cart" type="submit" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                        <span>View Details</span>
                                    </button>

                                </div>
                            </div>
                            <!--== End prPduct Item ==-->
                        </div>

                        <!--== End prPduct Item ==-->

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
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Product Banner Area Wrapper ==-->
    <section class="section-space pt-0">
        <div class="container">
            <!--== Start Product Category Item ==-->
            <a href="#" class="product-banner-item">
                <img src="assets/images/photos/banner.jpg" width="1170" height="240" alt="Image-HasTech">
            </a>
            <!--== End Product Category Item ==-->
        </div>
    </section>
    <!--== End Product Banner Area Wrapper ==-->





    <!--== Start Brand Logo Area Wrapper ==-->
    <div class="section-space pt-0">
        <div class="container">
            <div class="section-title">
                <h2 class="title"><a href="maingallery.php">Gallery</a></h2>
            </div>
            <div class="swiper brand-logo-slider-container">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide brand-logo-item" style="border:2px solid pink;border-radius:25px;">
                        <!--== gallery image 01 ==-->
                        <img src="assets/images/gallery/pinkLipstick.jpg" width="155" height="110" alt="Image-HasTech">
                        
                    </div>
                    <div class="swiper-slide brand-logo-item" style="border:2px solid pink;border-radius:25px;">
                        <!--== gallery image 02 ==-->
                        <img src="assets/images/gallery/matte-godenEarRing.jpg" width="155" height="110" alt="Image-HasTech">
                        
                    </div>
                    <div class="swiper-slide brand-logo-item" style="border:2px solid pink;border-radius:25px;">
                         <!--== gallery image 03 ==-->
                        <img src="assets/images/gallery/terracottaBlusher.jpg" width="155" height="110" alt="Image-HasTech">
                        
                    </div>
                    <div class="swiper-slide brand-logo-item" style="border:2px solid pink;border-radius:25px;">
                         <!--== gallery image 04 ==-->
                        <img src="assets/images/gallery/coralSeaweedFoundation.jpg" width="155" height="110" alt="Image-HasTech">
                        
                    </div>
                    <div class="swiper-slide brand-logo-item" style="border:2px solid pink;border-radius:25px;">
                         <!--== gallery image 05 ==-->
                        <img src="assets/images/gallery/4-metalShadeEyeShadow.jpg" width="155" height="110" alt="Image-HasTech">
                        
                    </div>
                    <div class="swiper-slide brand-logo-item" style="border:2px solid pink;border-radius:25px;">
                        <!--== gallery image 06 ==-->
                        <img src="assets/images/gallery/matte-goldenRing.jpg" width="155" height="110" alt="Image-HasTech">
                        
                    </div>
                    <div class="swiper-slide brand-logo-item" style="border:2px solid pink;border-radius:25px;">
                       <!--== gallery image 07 ==-->
                        <img src="assets/images/gallery/bangleMultiGolden.jpg" width="155" height="110" alt="Image-HasTech">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Brand Logo Area Wrapper ==-->




    <!--== Start News Letter Area Wrapper ==-->
    <section class="section-space pt-0">
        <div class="container">
            <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/background.jpg">
                <div class="newsletter-content">
                    <div class="section-title mb-0">
                        <h2 class="title">Join with us</h2>
                        <p>Sign up for our newsletter to receive updates on special offers, news and events</p>
                    </div>
                </div>
                <div class="newsletter-form">
                    <form>
                        <input type="email" class="form-control" placeholder="enter your email">
                        <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--== End News Letter Area Wrapper ==-->

</main>


<?php

include('footer.php');

?>