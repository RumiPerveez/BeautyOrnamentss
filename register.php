<?php
if (isset($_POST["btn_reg"])) {
    $name = $_POST["reg_full_name"];
    $email = $_POST["reg_email"];
    $cellno = $_POST["reg_number_txt"];
    $gender = $_POST["reg_gender_txt"];
    $paswrd = $_POST["reg_psw"];
    include_once('conn.php');

    if ($paswrd != null) {
        $conn = new connec();
        $sql = "insert into customer values(0,'$name','$email','$cellno','$gender','$paswrd')";
        $conn->insert($sql, "Customer Registered Now You Can Login");
        header("location:login.php");
    } else {
?>
        <script>
            alert("not registerd");
        </script>
<?php
    }
}
include('header.php');

?>

<main class="main-content">
    <section class="section-space">
        <div class="container" style="margin: auto 200px  auto 480px;width:40%">
            <div class="row mb-n8">


                <!--== Start Register Area  ==-->
                <div class="my-account-item-wrap">
                    <h3 class="title">Register</h3>
                    <div class="my-account-form">
                        <form method="post">
                            <div class="form-group mb-6">
                                <label for="register_username">Username <sup>*</sup></label>
                                <input type="text" name="reg_full_name" required>
                            </div>
                            <div class="form-group mb-6">
                                <label for="register_username"> Email Address <sup>*</sup></label>
                                <input type="email" name="reg_email" required>
                            </div>
                            <div class="form-group mb-6">
                                <label for="register_username">CellNo <sup>*</sup></label>
                                <input type="number" name="reg_number_txt" required>
                            </div>
                            <div class="form-group mb-6">
                                <label for="register_username">Gender</label>
                                <input type="radio" name="reg_gender_txt" value="male">Male
                                <input type="radio" name="reg_gender_txt" value="female">Female
                            </div>

                            <div class="form-group mb-6">
                                <label for="register_pwsd">Password <sup>*</sup></label>
                                <input type="password" name="reg_psw">
                            </div>

                            <div class="form-group">
                                <p class="desc mb-4">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                                <button type="submit" name="btn_reg" class="btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--== End Register Area ==-->



            </div>
        </div>
        </div>

</main>













<?php

include('footer.php');

?>