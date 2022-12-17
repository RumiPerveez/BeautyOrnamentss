<?php

include('header.php');

$cust_name = $_SESSION["customer_name"];
$cust_email = $_SESSION["customer_email"];
$cust_cellno = $_SESSION["customer_cellno"];
$id = $_SESSION["customer_id"];
?>



<main class="main-content">
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">

                <h2 aria-current="page">Checkout</h2>
            </ol>
        </div>
    </nav>





    <section class="shopping-checkout-wrap section-space">
        <div class="container">
            <form method="post">
                <div class="row">
                    <input type="hidden" name="cust_id" value="<?php echo $id; ?>">
                    <div class="col-lg-6">
                        <!--== Start Billing  ==-->
                        <div class="checkout-billing-details-wrap">
                            <h2 class="title">Billing details</h2>
                            <div class="billing-form-wrap">
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="f_name">Your name <abbr class="required" title="required">*</abbr></label>
                                                <input name="full_name_txt" type="text" class="form-control" value="<?php echo $cust_name; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email address <abbr class="required" title="required">*</abbr></label>
                                                <input id="email_txt" name="email_txt" value="<?php echo $cust_email; ?>" type="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label for="country">Country <abbr class="required" title="required">*</abbr></label>
                                                <select style="height:500px !important;" class="wide" name="country_txt" >
                                                    <option>Select Country</option>
                                                    <option value="Pakistan">Pakistan</option>


                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label for="country">City <abbr class="required" title="required">*</abbr></label>
                                                <select id="country" class="form-select wide" name="city_txt">
                                                    <option>Select City</option>
                                                    <option value="Karachi">Karachi</option>
                                                    <option value="Islamabad">Islamabad</option>


                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="street-address">Street Address <abbr class="required" title="required">*</abbr></label>
                                                <input id="street-address" type="text" name="address_txt" class="form-control" placeholder="House number and street name" required>
                                            </div>

                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone">Phone </label>
                                                <input id="phone" type="text" name="cell_txt" value="<?php echo $cust_cellno; ?>" class="form-control" required>
                                            </div>
                                        </div>



                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--== End Billing  ==-->
                    </div>
                    <div class="col-lg-6">
                        <!--== Start Order Details  ==-->
                        <div class="checkout-order-details-wrap">
                            <div class="order-details-table-wrap table-responsive">
                                <h2 class="title mb-25">Your order</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product Name</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $_SESSION["cart_items"];
                                    $tot_qty = 0;
                                    $tot_price = 0;

                                    if (!empty($_SESSION["cart_items"])) {


                                        foreach ($_SESSION["cart_items"] as $item) {
                                            $total = $item[2] * $item[3];

                                            $tot_qty += $item[2];
                                            $tot_price += $total;
                                            $ship = 200;

                                    ?>
                                            <tbody class="table-body">
                                                <tr class="cart-item">
                                                    <td class="product-name"><?php echo $item[1] ?> <span class="product-quantity">× <?php echo $item[2] ?></span></td>
                                                    <td class="product-total"><?php echo $item[3] ?></td>
                                                </tr>

                                            </tbody>

                                        <?php
                                        }
                                        $final = $ship + $tot_price;
                                        ?>
                                        <tfoot class="table-foot">
                                            <tr class="order-total">
                                                <th>Total Quantity</th>
                                                <td><?php echo $tot_qty; ?></td>
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><?php echo $tot_price; ?></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td name="ship_chrg">Flat rate:PKR <?php echo $ship; ?></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total </th>
                                                <td><?php echo $final;
                                                    $_SESSION["Total_Bill"] = $final; ?></td>
                                            </tr>
                                        </tfoot>
                                    <?php

                                    }
                                    ?>

                                </table>
                                <div class="shop-payment-method">
                                    <h3><strong>Payment Method</strong></h3>
                                    <div id="PaymentMethodAccordion">

                                        <div class="card">
                                            <div class="card-header" id="check_payments3">
                                                <input type="radio" class="title" value="COD" id="ep" name="p_metdh" data-bs-toggle="collapse" data-bs-target="#itemThree" aria-controls="itemTwo" aria-expanded="false" /> Cash on delivery
                                            </div>
                                            <div id="itemThree" class="collapse" aria-labelledby="check_payments3" data-bs-parent="#PaymentMethodAccordion">
                                                <div class="card-body">
                                                    <p>Pay with cash upon delivery.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                    <p class="p-text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#/">privacy policy.</a></p>
                                    <div class="agree-policy">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="privacy" class="custom-control-input visually-hidden">
                                            <label for="privacy" class="custom-control-label">I have read and agree to the website terms and conditions <span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <button type="submit" name="btn_cnfrm_ordr" class="btn-place-order">Place order</button>
                                </div>
                            </div>
                        </div>
                        <!--== End Order Details  ==-->
                    </div>
                </div>

            </form>
        </div>
    </section>



</main>









<?php

include('footer.php');
?>