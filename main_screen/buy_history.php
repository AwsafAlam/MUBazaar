<?php include "db.php"?>
<?php ob_start(); ?>


<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
    <title>MUBazaar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script src="js/jquery.openCarousel.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>


    <style type="text/css">
        .trash-button:hover{
            color: #E44F2B !important;
        }
    </style>
</head>
<body style="background-color:#23272A;">

<?php  include "dell_header.php" ?>



<body style="color:white;">
<div id="content_zoom" class="container">
    <?php


    $card_type = $_GET['card_type'];
    $card_no = $_GET['card_no'];
    $shipping_address = $_POST['shipping_address'];
    $customer_id = $_SESSION['customer_id'];
    echo $query = "INSERT INTO customer_order (customer_id, shipping_address) VALUES({$customer_id}, '{$shipping_address}');";
    $rslt = mysqli_query($connect, $query);
    $order_id = $connect->insert_id;

    $cart_query = "SELECT * FROM shopping_cart WHERE customer_id = {$_SESSION['customer_id']};";

    $cart_rslt = mysqli_query($connect, $cart_query);

    while($query_rows = mysqli_fetch_assoc($cart_rslt)) {

        $product_category = $query_rows['prod_category'];

        $product_id = $query_rows['prod_id'];

        $product_quantity = $query_rows['prod_quantity'];


        $prod_query = "INSERT INTO customer_ordered_products (order_id, product_category, product_id, product_quantity) ";
        $prod_query .= "VALUES( {$order_id}, '{$product_category}', '{$product_id}', '{$product_quantity}');";
        echo $prod_query;

        mysqli_query($connect, $prod_query);
    }




    ?>


    <table style="color:white;" class="table table-bordered">

        <thead>
        <tr>
            <th style="text-align:center">Cart ID</th>
            <th style="text-align:center">Product Category</th>
            <th style="text-align:center">Product ID</th>
            <th style="text-align:center">Product Name</th>
            <th style="text-align:center">Quantity</th>
            <th style="text-align:center">Cost</th>
            <th style="text-align:center">Remove</th>
        </tr>
        </thead>
        <tbody>




        </tbody>

    </table>



</div>

</body>

<script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js'></script>

<script  src="js/credit_index.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</script>

<?php

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $customer_id = $_SESSION['customer_id'];
    $product_category = $_GET['prod_cat'];
    $product_id = $_GET['prod_id'];

    $cart_query = "DELETE FROM shopping_cart WHERE customer_id = {$customer_id} AND ";
    $cart_query .= "prod_category = '{$product_category}' AND prod_id = {$product_id};";

    $cart_query_rslt = mysqli_query($connect,$cart_query);
    if(!$cart_query_rslt){
        die(mysqli_error($connect));
    }
    header("Location: show_content.php?source=cart#content_zoom");

}

?>


<?php include "footer.php" ?>
