<?php

include('header.php');
include_once('conn.php');
$con = new connec();
$table_name = "faq";
$result = $con->select_all($table_name);

?>

<main class="main-content">
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">

                <h2 style="font-size:30px">FAQs</h2>
            </ol>
        </div>
    </nav>
    <div class="container">


        <br>
        <br>
        <div class="row pt-5 pb-5 mt-5" style="display:flex;background-color:#f0eded;border-radius:20px;width:auto">

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>

                    <p style="font-size:18px" class="mt-1"><strong><?php echo $row["question"]; ?></strong></p>

                    <p style="font-size:18px"><?php echo $row["answer"]; ?></p>


            <?php


                }
            }
            ?>

        </div>
        <br>
        <br>

    </div>
</main>

<?php

include('footer.php');

?>