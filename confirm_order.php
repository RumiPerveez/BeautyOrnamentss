<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Ornaments</title>
</head>

<body>
    <h4 class="mt-5 text-center">Thank you for your order...Your order id id: <?php echo $_SESSION["order_id"] ?> </h4>
</body>

</html>