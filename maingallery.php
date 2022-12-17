<?php
include('header.php');
include_once('conn.php');


$conn = new connec();
$query = "SELECT * FROM product;";
$result = $conn->select_by_query($query);

?>


<main class="main-content">

  <section id="menu" class="text-gray-700 body-font">
         <nav aria-label="breadcrumb" class="breadcrumb-style1">
      <div class="container">
        <ol class="breadcrumb justify-content-center">

          <h2 style="font-size:30px">Gallery</h2>
        </ol>
      </div>
         </nav>
    <br>
    <br><br>
      <div class="container ">
    
      <div class="flex flex-wrap -m-4">


        <?php

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <div class="lg:w-1/4 sm:w-1/2 p-4">
              <div class="flex relative">
                <img alt="gallery" style="height:360px; border: 2px solid pink;border-radius: 25px;" src="<?php echo $row["p_img"] ?>">
              </div>
            </div>
        <?php
          }
        }

        ?>

      </div>
   
  </section>

</main>

<?php
include('footer.php');

?>