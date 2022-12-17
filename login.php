<?php
include('header.php');


?>


<main class="main-content">
    <section class="section-space">
        <div class="container" style="margin: auto 200px  auto 480px;width:40%">
            <div class="row mb-n8">

                <!--== Start Login Form ==-->
                <div class="my-account-item-wrap">
                    <h3 class="title text-center">Login</h3>
                    <div class="my-account-form">
                        <form action="#" method="post">
                            <div class="form-group mb-6">
                                <label for="login_username">Email Address <sup>*</sup></label>
                                <input type="email" name="email_txt" id="email_txt">
                            </div>

                            <div class="form-group mb-6">
                                <label for="login_pwsd">Password <sup>*</sup></label>
                                <input type="password" name="pswrd_txt" id="pswrd_txt">
                            </div>

                            <div class="form-group d-flex align-items-center mb-14">
                                <button type="submit" class="btn" name="btn_login">Login</button>

                                <div class="form-check ms-3">
                                    <input type="checkbox" class="form-check-input" id="remember_pwsd">
                                    <label class="form-check-label" for="remember_pwsd">Remember Me</label>
                                </div>

                            </div>
                            <br>

                            <div class="form-group mb-6">
                                <label>Don't Have An Account?<a href="register.php"><strong> Register</strong></a></label>

                            </div>
                        </form>
                    </div>
                </div>
                <!--== End Login Form ==-->


            </div>
        </div>
        </div>

</main>













<?php

include('footer.php');

?>