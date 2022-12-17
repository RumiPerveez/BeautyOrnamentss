<?php

include('header.php');
include_once('conn.php');

if (isset($_POST["btn_submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $msg = $_POST["message"];

    $con = new connec();
    $sql = "insert into contact values(0,'" . $name . "','" . $email . "','" . $msg . "');";
    $con->insert($sql, "We Will Contact You Soon On Your Email Address");
}

?>
<main class="main-content">
    <!--== Start Contact Area Wrapper ==-->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="offset-lg-6 col-lg-6">
                    <div class="section-title position-relative">
                        <h3 class="title">Contact Us</h3>
                        <p class="m-0">Should you have any questions, comments, or inquiries please reach out to us.</p>
                        <div class="line-left-style mt-4 mb-1"></div>
                    </div>
                    <!--== Start Contact Form ==-->
                    <div class="contact-form">
                        <form method="POST">
                            <div class="row">
                                <!--<div class="col-md-2">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="con_name" placeholder="Your Name">
                                            </div>
                                        </div>-->
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name" id="username" required placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" id="email" required placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <button name="btn_submit" class="btn btn-sm" type="submit">SUBMIT</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--== End Contact Form ==-->

                    <!--== Message Notification ==-->

                </div>
            </div>
        </div>
        <div class="contact-left-img" data-bg-img="assets/images/photos/contact.jpg"></div>
    </section>
    <!--== End Contact Area Wrapper ==-->
    <br>
    <br>


    <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d802879.9165497769!2d144.83475730949783!3d-38.180874157285366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1636803638401!5m2!1sen!2sbd"></iframe>
    </div>
</main>
<?php

include('footer.php');

?>