<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>

<?php $table_name = 'all' ;




if(isset($_GET['reduce_id'])){
    $table_name = $_GET['table'];
    $reduce_id = $_GET['reduce_id'];

    if(isset($_POST['set_price'])){
        $new_price = $_POST['new_price'];
        $r_query = "UPDATE product SET price = {$new_price} WHERE category = '{$table_name}' AND id = {$reduce_id};";
        mysqli_query($connect, $r_query);

    }

    $query = "SELECT * FROM product WHERE category = '{$table_name}' AND id = {$reduce_id};";
    $query_rslt =  mysqli_query($connect, $query);
    $query_row = mysqli_fetch_assoc($query_rslt);

    $prod_name = $query_row['name'];
    $prod_price = $query_row['price'];
    $prod_id = $query_row['id'];
    $prod_model = $query_row['product_model'];
    $prod_units_in_stock = $query_row['units_in_stock'];
    $prod_sold = $query_row['item_sold'];

    $offer_q = "SELECT offer FROM product_offer WHERE table_name = '{$table_name}' AND product_id = {$prod_id};";
    $all_offers = '';
    $all_offer_array = array();
    $offer_rslt = mysqli_query($connect, $offer_q);
    if(mysqli_num_rows($offer_rslt) > 0){
        while($offer_row = mysqli_fetch_assoc($offer_rslt)){
            array_push($all_offer_array, $offer_row['offer']);
            $all_offers = $all_offers . ucfirst($offer_row['offer']) . "," ;
        }
    }

    $all_offers = rtrim($all_offers,',');


    $selected_offer = array();

    $selected_offer_q = "SELECT occasion FROM special_offer WHERE offer_active = 'Y'";
    $selected_offer_rslt = mysqli_query($connect, $selected_offer_q);
    while($selected_offer_row = mysqli_fetch_assoc($selected_offer_rslt)){
        array_push($selected_offer, $selected_offer_row['occasion']);
    }


    $result=array_intersect_key($all_offer_array,$selected_offer);
    $discount_flag = true;

    if(empty($result)){
        $discount_flag = false;
    }

}
?>


<link rel="stylesheet" type="text/css" href="includes/admin_header.php">



<div id="wrapper">

    <!--  Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">



                    <?php


                    ?>


                    <h2 style="margin-right: 10px"><?php echo $prod_name ?> </h2>



                    <h4>Model &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;   :            <?php echo $prod_model  ?></h4>
                    <h4>Offer on this product &nbsp;: <?php if($discount_flag){echo $all_offers; } else {echo "(None)";}  ?></h4>
                    <h4>Current price &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $prod_price; if($discount_flag) {echo "(Discounted)"; }    ?>  </h4>
                    <h4>Unist in stock &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $prod_units_in_stock?></h4>
                    <h4>Item Sold &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $prod_sold ?></h4>


                    <form action="" method="post">

                        <label style="">Set New Price:</label> <input required = "" name="new_price"   type="number">
                        <input class="btn btn-primary" type="submit" name="set_price" value="Set Price">


                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>


