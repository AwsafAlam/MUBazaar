<?php include "db.php";
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//session_start(); 


$query_id = $_GET['id'];
$query_table = $_GET['table'];


$query = "SELECT * FROM product WHERE category = '" . $query_table . "' AND id = " . $query_id . ";";

$rslt = mysqli_query($connect, $query);

$row = mysqli_fetch_assoc($rslt);

$customer_id = '';


$prod_name = $row['name'];
$prod_price = $row['price'];
$prod_image_1 = $row['image_1'];
$prod_image_2 = $row['image_2'];;
$prod_image_3 = $row['image_3'];;
$prod_image_4 = $row['image_4'];;
$prod_sub_category = $row['sub_category'];;
$prod_description = $row['description'];;
$prod_model = $row['product_model'];;
$shipping_weight = $row['shipping_weight'];;
$units_in_stock = $row['units_in_stock'];;
$table_name = $query_table;

$page_name = ucfirst(str_replace("_", " ", $query_table));


if(isset($_SESSION['customer_id'])){
    $customer_id = $_SESSION['customer_id'];

    $recent_list_check_query = "SELECT * FROM `recently_viewed` WHERE customer_id = {$customer_id} AND product_table = '{$table_name}' AND product_id = {$query_id};";



    $recent_list_check_rslt =  mysqli_query($connect,$recent_list_check_query);


    if(mysqli_num_rows($recent_list_check_rslt) === 0){
        $recent_list_update_query = "INSERT INTO `recently_viewed` (customer_id, product_table, product_id)  VALUES( {$customer_id} , '{$table_name}' , {$query_id});";
        mysqli_query($connect,$recent_list_update_query);
    }


}

if(isset($_SESSION['customer_id']) &&  isset($_POST['poll_submit'])){

    $poll_query = "UPDATE community_poll SET count = count + 1 WHERE id = {$_POST['poll']}";
    mysqli_query($connect,$poll_query);
}


//
//
//
//unset($_SESSION['prod_name']);
//unset($_SESSION['prod_price']);
//unset($_SESSION['prod_image_1']);  
//unset($_SESSION['prod_image_2']);
//unset($_SESSION['prod_image_3']);
//unset($_SESSION['prod_image_4']);
//unset($_SESSION['prod_sub_category']);
//unset($_SESSION['prod_description']);
//unset($_SESSION['prod_model']);
//unset($_SESSION['shipping_weight']);
//unset($_SESSION['units_in_stock']);
//unset($_SESSION['table_name']);
//session_destroy();

?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
    <title>MUBazaar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>



    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script src="js/jquery.openCarousel.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>


    <link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true   // 100% fit in a container
            });
        });
    </script>
    <link rel="stylesheet" href="css/etalage.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="js/jquery.etalage.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
                click_callback: function (image_anchor, instance_id) {
                    alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                }
            });

        });
    </script>
    <script src="js/star-rating.js" type="text/javascript"></script>
</head>
<body>


<div class="header">
    <div class="wrap">
        <?php include "header.php" ?>
    </div>


</div>
<!------------End Header ------------>
<div class="main">
    <div class="wrap">
        <div class="preview-page">
            <div class="section group">
                <div id="prod_zoom" class="cont-desc span_1_of_2">
                    <ul class="back-links">
                        <li><a href="index.php">Home</a> ::</li>
                        <li><a href="<?php echo $page_name . '.php'; ?>"><?php echo $page_name; ?></a> ::</li>
                        <li>
                            <a href="<?php echo $page_name . '.php?sub_cat=' ?><?php echo $prod_sub_category . '#categories' ?>"><?php echo $prod_sub_category; ?></a>
                            ::
                        </li>
                        <li><?php echo $prod_name; ?></li>
                        <div class="clear"></div>
                    </ul>
                    <div class="product-details">
                        <div class="grid images_3_of_2">
                            <ul id="etalage">
                                <li>
                                    <a href="optionallink.html">
                                        <!--									<img class="etalage_thumb_image" src="images/preview-small-img1.png" />-->
                                        <img class="etalage_thumb_image"
                                             src="images/<?php echo $table_name . '/' . $prod_image_1 ?>"/>

                                        <img class="etalage_source_image"
                                             src="images/<?php echo $table_name . '/' . $prod_image_1 ?>" title=""/>

                                    </a>
                                </li>
                                <li>
                                    <img class="etalage_thumb_image"
                                         src="images/<?php echo $table_name . '/' . $prod_image_2 ?>"/>

                                    <img class="etalage_source_image"
                                         src="images/<?php echo $table_name . '/' . $prod_image_2 ?>" title=""/>
                                </li>
                                <li>
                                    <img class="etalage_thumb_image"
                                         src="images/<?php echo $table_name . '/' . $prod_image_3 ?>"/>

                                    <img class="etalage_source_image"
                                         src="images/<?php echo $table_name . '/' . $prod_image_3 ?>" title=""/>
                                </li>
                                <li>
                                    <img class="etalage_thumb_image"
                                         src="images/<?php echo $table_name . '/' . $prod_image_4 ?>"/>

                                    <img class="etalage_source_image"
                                         src="images/<?php echo $table_name . '/' . $prod_image_4 ?>" title=""/>
                                </li>
                            </ul>
                        </div>
                        <div class="desc span_3_of_2">





                            <h2><?php echo $prod_name ?></h2>
                            <p><?php echo $prod_description ?></p>

                            <?php if (isset($_SESSION['is_buetian']) ) {
                                ?>
                                <div class="price">
                                    <p>Price: &#x9f3;
                                        <del style="color:red;font-size:24px;"><?php echo $prod_price ?></del>
                                    </p>
                                </div>


                                <?php
                                $prod_price = $prod_price - $prod_price * 0.10;
                                ?>
                                <div class="price">
                                    <p>Price for you(BUETians only): &#x9f3; <span><?php echo $prod_price ?></span></p>
                                </div>

                            <?php } else { ?>

                                <div class="price">
                                    <p>Price : &#x9f3; <span><?php echo $prod_price ?></span></p>
                                </div>

                            <?php } ?>


                            <div class="available">
                                <ul>
                                    <li><span>Model:</span> &nbsp; <?php echo $prod_model ?></li>
                                    <li><span>Shipping Weight:</span>&nbsp; <?php echo $shipping_weight ?></li>
                                    <li><span>Units in Stock:</span>&nbsp; <?php echo $units_in_stock ?></li>
                                </ul>
                            </div>
                            <div class="share-desc">
                                <div class="share">
                                    <p>Number of units :</p>
                                    <form action="preview_edit.php?table=<?php echo $query_table ?>&id=<?php echo $query_id ?>#prod_zoom"
                                          method="post" id="cartform">
                                        <input name="qty" type="number" class="text_box" type="text" value="1" min="1"/>
                                    </form>
                                </div>


                                <div id="add_cart" class="button">

                                    <button form="cartform" name="add_cart" type="submit" class="btn btn-info btn-lg"><i
                                                class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;Add To Cart!
                                    </button>

                                </div>


                                <div class="clear"></div>


                                <div class="button">
                                    <p style="font-weight:bold;color:red;font-size: 110%;">
                                        <?php


                                        if (isset($_POST['add_cart'])) {
                                            if (isset($_SESSION['customer_id'])) {
                                                $prod_category = $_GET['table'];
                                                $prod_id = $_GET['id'];
                                                $prod_quantity = $_POST['qty'];
                                                $customer_id = $_SESSION['customer_id'];
                                                $customer_name = $_SESSION['customer_name'];
                                                $get_query = "SELECT cart_id,prod_quantity FROM shopping_cart WHERE customer_id = {$customer_id} AND ";
                                                $get_query .= "prod_category = '{$prod_category}' AND prod_id = {$prod_id};";

                                                $get_result = mysqli_query($connect, $get_query);
                                                $num_rows = mysqli_num_rows($get_result);

                                                $check_query = "SELECT units_in_stock FROM product WHERE category = '{$prod_category}' AND id = {$prod_id};";
                                                $check_query_result = mysqli_query($connect, $check_query);
                                                $check_query_row = mysqli_fetch_assoc($check_query_result);

                                                $units_in_stock = $check_query_row['units_in_stock'];


                                                $set_query = "";
                                                if ($num_rows == 0) {
                                                    if ($units_in_stock >= $prod_quantity) {
                                                        $prod_category = mysqli_real_escape_string($connect, $prod_category);
                                                        $prod_id = mysqli_real_escape_string($connect, $prod_id);
                                                        $prod_name = mysqli_real_escape_string($connect, $prod_name);
                                                        $prod_quantity = mysqli_real_escape_string($connect, $prod_quantity);
                                                        $prod_price = mysqli_real_escape_string($connect, $prod_price);
                                                        $customer_id = mysqli_real_escape_string($connect, $customer_id);

                                                        $set_query = "INSERT INTO `shopping_cart`( prod_category, prod_id, prod_name, prod_quantity, price_per_product, customer_id)  VALUES('{$prod_category}', '{$prod_id}', '{$prod_name}',  '{$prod_quantity}', '{$prod_price}', '{$customer_id}')";
                                                        $set_rslt = mysqli_query($connect, $set_query);
                                                        if(!$set_rslt){
                                                            die(mysqli_error($connect));
                                                        }
                                                        echo "Added to cart";
                                                    } else {
                                                        echo "You have added more to your cart than available!";
                                                    }
                                                } else {
                                                    $get_rows = mysqli_fetch_assoc($get_result);
                                                    $prev_quantity = $get_rows['prod_quantity'];
                                                    if ($units_in_stock >= ($prod_quantity + $prev_quantity)) {
                                                        $set_query = "UPDATE `shopping_cart` SET prod_quantity = (prod_quantity + {$prod_quantity}) WHERE customer_id = {$customer_id};";
                                                        mysqli_query($connect, $set_query);
                                                        echo "Added to cart";
                                                    } else {
                                                        echo "You have added more to your cart than available!";
                                                    }
                                                }
                                            } else {
                                                echo "Sign in as a customer first!";
                                            }
                                        }


                                        ?>

                                    </p>
                                </div>

                            </div>
                            <div id="wish_list" class="wish-list">
                                <ul>
                                    <!--                                        <li class="wish"><a href="#">Add to Wishlist</a></li>-->
                                    <div>

                                        <?php
                                        if (isset($_SESSION['customer_name'])) {
                                            $wishlist_query = "SELECT * FROM wishlist WHERE customer_id = '{$_SESSION['customer_id']}' AND product_category = '{$query_table}' AND product_id = '{$query_id}';";

                                            $wishlist_rslt = mysqli_query($connect, $wishlist_query);


                                            $num_rows = mysqli_num_rows($wishlist_rslt);
                                            if ($num_rows == 0) {

                                                ?>

                                                <form action="preview_edit.php?table=<?php echo $query_table ?>&id=<?php echo $query_id ?>"
                                                      method="post" id="wishform"></form>

                                                <?php
                                                if (isset($_POST['add_wishlist'])) {
                                                    $wishlist_insert_query = "INSERT INTO wishlist(customer_id, product_category, product_id) ";
                                                    $wishlist_insert_query .= "VALUES({$_SESSION['customer_id']}, '{$query_table}', '{$query_id}');";
                                                    mysqli_query($connect, $wishlist_insert_query);
                                                    header('Location: ' . $_SERVER['REQUEST_URI'] . '#prod_zoom');

                                                }
                                                ?>

                                                <button form="wishform" name="add_wishlist" type="submit"
                                                        class="btn btn-danger btn-lg"><i
                                                            class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Add To
                                                    Wishlist!
                                                </button>

                                            <?php } else { ?>

                                                <button type="submit" class="btn btn-success btn-lg"><i
                                                            class="fa fa-thumbs-up"></i>&nbsp;&nbsp;Added To Wishlist!
                                                </button>

                                            <?php }
                                        } ?>

                                    </div>
                                </ul>
                            </div>
                            <div class="colors-share">
                                <!--
<div class="color-types">
<h4>Available Colors</h4>
<form class="checkbox-buttons">
<ul>
<li><input id="r1" name="r1" type="radio"><label for="r1" class="grey"> </label></li>
<li><input id="r2" name="r1" type="radio"><label for="r2" class="blue"> </label></li>
<li><input id="r3" name="r1" type="radio"><label class="white" for="r3"> </label></li>
<li><input id="r4" name="r1" type="radio"><label class="black" for="r4"> </label></li>
</ul>
</form>
</div>
-->
                                <div class="social-share">
                                    <h4>Share Product</h4>
                                    <ul>
                                        <li><a class="share-face" href="#"> </a></li>
                                        <li><a class="share-twitter" href="#"> </a></li>
                                        <li><a class="share-google" href="#"> </a></li>
                                        <li><a class="share-rss" href="#"> </a></li>
                                        <div class="clear"></div>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="product_desc">
                        <div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <!--                                    <li>Specifications</li>-->
                                <li>Customer Reviews</li>
                                <li>Give Review</li>
                                <div class="clear"></div>
                            </ul>
                            <div class="resp-tabs-container">

                                <div class="product-specifications">

                                    <!-- Comment -->

                                    <?php
                                    $review_product_query = "SELECT review_author, review_email, review_content, review_date ";
                                    $review_product_query .= "FROM review WHERE product_category='{$table_name}' AND product_id={$query_id} ORDER BY review_id DESC;";


                                    $rslt = mysqli_query($connect, $review_product_query);
                                    while ($row = mysqli_fetch_assoc($rslt)) {
                                        echo "<div class='media'>";
                                        echo "<div class='media-body'>";
                                        echo "<h2 class='media-heading'>";

                                        echo "{$row['review_author']}";
                                        echo "<small>";
                                        echo "    {$row['review_date']}";
                                        echo "</small>";
                                        echo "</h2>";
                                        echo "{$row['review_content']}";
                                        echo "</div>";
                                        echo "</div>";
                                        //                echo "<td>{$row['review_email']}</td>";
                                    }

                                    ?>


                                    <!-- table comment start -->
                                    <!--
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Reviewer</th>
<th>Reviewer's email</th>
<th>Review</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
                                    //$review_product_query = "SELECT review_author, review_email, review_content, review_date ";
                                    //$review_product_query .= "FROM review WHERE product_category='{$table_name}' AND product_id={$query_id};";
                                    //
                                    //
                                    //
                                    //$rslt = mysqli_query($connect,$review_product_query);
                                    //while($row = mysqli_fetch_assoc($rslt)){
                                    //    echo "<tr>";
                                    //
                                    //    echo "<td>{$row['review_author']}</td>";
                                    //    echo "<td>{$row['review_email']}</td>";
                                    //    echo "<td>{$row['review_content']}</td>";
                                    //    echo "<td>{$row['review_date']}</td>";
                                    //    echo "</tr>";
                                    //}

                                    ?>
</tbody>
</table>
-->

                                    <!-- table comment end -->

                                </div>

                                <!--
<div class="product-tags">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
<h4>Add Your Tags:</h4>
<div class="input-box">
<input type="text" value="">
</div>
<div class="button"><span><a href="#">Add Tags</a></span></div>
</div>	
-->


                                <div class="review">

                                    <?php
                                    if (isset($_SESSION['customer_id'])) { ?>


                                        <h4>Review by <a href="#">Finibus Bonorum</a></h4>
                                        <h4>How Do You Rate This Product?</h4>


                                        <!--
<ul>
<li>Price : <div class="rating-stars"><div id="DIV1" name="submit" class="rating" data-rating-max="5"> </div> </div>
</li>
<li>Value : <div class="rating-stars"><div class="rating" data-rating-max="5"> </div> </div></li>
<li>Quality : <div class="rating-stars"><div class="rating" data-rating-max="5"> </div> </div></li>
</ul>
-->

                                        <div class="your-review">


                                            <p>Write Your Own Review</p>
                                            <form action="" method="post">
                                                <div>
                                                    <span><label>Name<span class="red">*</span></label></span>
                                                    <span><input name="review_author" required="" type="text"
                                                                 value="<?php echo $_SESSION['customer_name']; ?>"
                                                                 readonly></span>
                                                </div>
                                                <div><span><label>Email<span class="red">*</span></label></span>
                                                    <span><input name="review_email" required="" type="text"
                                                                 value="<?php echo $_SESSION['customer_email']; ?>"
                                                                 readonly></span>
                                                </div>
                                                <div>
                                                    <span><label>Review<span class="red">*</span></label></span>
                                                    <span><textarea name="review_content" required> </textarea></span>
                                                </div>
                                                <div>
                                                    <span><input name="review_submit" type="submit"
                                                                 value="SUBMIT REVIEW"></span>
                                                </div>
                                            </form>


                                            <?php
                                            if (isset($_POST['review_submit'])) {

                                                $review_author = $_SESSION['customer_name'];
                                                $review_email = $_SESSION['customer_email'];
                                                $review_content = $_POST['review_content'];

                                                if (empty($review_content)) {
                                                    echo "<h2>Please fill up the review field</h2>";
                                                } else {
                                                    $review_query = "INSERT INTO review (product_category, product_id, review_author,review_email,review_content,
                                                review_date) ";
                                                    $review_query .= "VALUES('{$table_name}', '{$query_id}', '{$review_author}', '{$review_email}', '{$review_content}', now());";

                                                    $rslt = mysqli_query($connect, $review_query);

                                                    echo "<meta http-equiv='refresh' content='0'>";


                                                    if (!$rslt) {
                                                        die(mysqli_error($connet));
                                                    }


                                                }


                                            }

                                            ?>


                                        </div>
                                        <script type="text/javascript">
                                            /* place inside document ready function */
                                            $(".rating").starRating({
                                                minus: true // step minus button
                                            });
                                        </script>
                                    <?php }
                                    else if (isset($_SESSION['admin_name'])){ ?>
                                        <h2>Admin can't give reviews.</h2>


                                    <?php }


                                    else {

                                        ?>
                                        <h2>You need to log in to give a review.</h2>

                                    <?php } ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rightsidebar span_3_of_1 sidebar">
                    <h3>Popular Products</h3>


                    <ul class="popular-products">

                        <?php
//                        $query = "SELECT * FROM " . $query_table . " T1 WHERE 3 > (SELECT COUNT(*) FROM " . $query_table . " T2 WHERE T1.item_sold < T2.item_sold) LIMIT 3;"  ;
                        $query = "CALL TOP_SOLD_PRODUCTS('$query_table', 3);";
                        $rslt = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_assoc($rslt)){
                            $prod_name = $row['name'];
                            $prod_price = $row['price'];
                            $prod_image_1 = $row['image_1'];
                            $prod_id = $row['id'];




                            ?>


                            <li>
                                <h4><a href="preview_edit.php?table=<?php echo $query_table; ?>&id=<?php  echo $prod_id ?>"><?php echo $prod_name ?></a></h4>
                                <a href="preview_edit.php?table=<?php echo $query_table; ?>&id=<?php  echo $prod_id ?>"><img src="images/<?php echo $query_table."/".$prod_image_1?>" alt="" width="120" height="120"/></a>
                                <div class="price-details">
                                    <div class="price-number">
                                        <p>

                                            <?php if (isset($_SESSION['is_buetian']) ) {


                                                ?>
                                                <del style="color:red;font-size:24px;"> <span class="rupees">&#x9f3;<?php echo $prod_price ?> </span></del>
                                            <?php } else{
                                                ?>
                                                <span class="rupees">&#x9f3;<?php echo $prod_price ?> </span>

                                            <?php } ?>


                                        </p>
                                        </p>
                                    </div>
                                    <div class="add-cart">
                                        <h4><a href="preview_edit.php?table=<?php echo $query_table; ?>&id=<?php  echo $prod_id ?>">More Info</a></h4>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </li>

                        <?php } ?>


                        <!--                        <li>-->
                        <!--                            <h4><a href="preview.html">Whirlpool LTE5243D 3.4 CuFt.... </a></h4>-->
                        <!--                            <a href="preview.html"><img src="images/product-img3.jpg" alt=""/></a>-->
                        <!--                            <div class="price-details">-->
                        <!--                                <div class="price-number">-->
                        <!--                                    <p><span class="rupees line-through">$899.95 </span> &nbsp; <span class="rupees">$839.93 </span>-->
                        <!--                                    </p>-->
                        <!--                                </div>-->
                        <!--                                <div class="add-cart">-->
                        <!--                                    <h4><a href="preview.html">More Info</a></h4>-->
                        <!--                                </div>-->
                        <!--                                <div class="clear"></div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                        <li>-->
                        <!--                            <h4><a href="preview.html">Whirlpool LTE5243D 3.4 CuFt.... </a></h4>-->
                        <!--                            <a href="preview.html"><img src="images/product-img4.jpg" alt=""/></a>-->
                        <!--                            <div class="price-details">-->
                        <!--                                <div class="price-number">-->
                        <!--                                    <p><span class="rupees line-through">$899.95 </span> &nbsp; <span class="rupees">$839.93 </span>-->
                        <!--                                    </p>-->
                        <!--                                </div>-->
                        <!--                                <div class="add-cart">-->
                        <!--                                    <h4><a href="preview.html">More Info</a></h4>-->
                        <!--                                </div>-->
                        <!--                                <div class="clear"></div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->


                    </ul>

                    <div class="community-poll">
                        <h3>Community POll</h3>
                        <p>What is the main reason for you to purchase products from MUBazaar?</p>
                        <div class="poll">
                            <form action="" method="post">
                                <ul>
                                    <li>
                                        <input type="radio" name="poll" class="radio" value="1">
                                        <span class="label"><label>More convenient shipping and delivery</label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="poll" class="radio" value="2">
                                        <span class="label"><label for="vote_2">Lower price</label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="poll" class="radio" value="3">
                                        <span class="label"><label for="vote_3">Bigger choice</label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="poll" class="radio" value="4">
                                        <span class="label"><label for="vote_5">Payments security </label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="poll" class="radio" value="5">
                                        <span class="label"><label
                                                    for="vote_6">30-day Money Back Guarantee</label></span>
                                    </li>
                                    <li>
                                        <input type="radio" name="poll" class="radio" value="6">
                                        <span class="label"><label for="vote_7">Other</label></span>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <input type="submit" class="form-control" name="poll_submit">
                                        </div>
                                    </li>

                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_top">
        <div class="wrap">
            <h3>Recently Viewed</h3>
        </div>
        <div class="line"></div>
        <div class="wrap">
            <div class="ocarousel_slider">
                <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                    <div class="ocarousel_window">

                        <?php
                        if (isset($_SESSION['customer_id'])){

                            include "db.php";

                        $customer_id = $_SESSION['customer_id'];
                        $recent_list_query = "SELECT id, product_table, product_id FROM `recently_viewed` WHERE customer_id = {$customer_id} ORDER BY id DESC;";
                        $recent_list_rslt = mysqli_query($connect,$recent_list_query);


                        while($recent_list_row = mysqli_fetch_assoc($recent_list_rslt)){
                        $recent_list_primary_key = $recent_list_row['id'];
                        $product_table =  $recent_list_row['product_table'];
                        $product_id = $recent_list_row['product_id'];

                        $single_product_query = "SELECT name, image_1, id FROM product WHERE category = '{$product_table}' AND id = {$product_id};";
                        $single_product_rslt = mysqli_query($connect, $single_product_query);
                        $single_product_row =  mysqli_fetch_assoc($single_product_rslt);

                        if(!$single_product_rslt ){
                            die(mysqli_error($connect));
                        }

                        $prod_name = $single_product_row['name'];
                        $prod_image_1 = $single_product_row['image_1'];
                        $prod_id = $single_product_row['id'];



                        ?>

                        <a href="preview_edit.php?table=<?php echo  $product_table; ?>&id=<?php echo $prod_id; ?>" title="img1"> <img src="images/<?php echo $product_table . "/" . $prod_image_1 ; ?>" width="100px" height="100px" alt="<?php echo strlen($prod_name) > 50 ? substr($prod_name,0,50)."..." : $prod_name;?>"/>

                            <?php }  } ?>


                            <!--                            <a href="#" title="img2"> <img src="images/latest-product-img2.jpg" alt="" /><p>Suspendiss</p></a>-->
                            <!--                            <a href="#" title="img3"> <img src="images/latest-product-img3.jpg" alt="" /><p>Phasellus ferm</p></a>-->
                            <!--                            <a href="#" title="img4"> <img src="images/latest-product-img4.jpg" alt="" /><p>Veldignissim</p></a>-->
                            <!--                            <a href="#" title="img5"> <img src="images/latest-product-img5.jpg" alt="" /><p>Aliquam interd</p></a>-->
                            <!--                            <a href="#" title="img6"> <img src="images/latest-product-img6.jpg" alt="" /><p>Sapien lectus</p></a>-->
                            <!--                            <a href="#" title="img1"> <img src="images/latest-product-img1.jpg" alt="" /><p>Nuncvitae</p></a>-->
                            <!--                            <a href="#" title="img2"> <img src="images/latest-product-img2.jpg" alt="" /><p>Suspendiss</p></a>-->
                            <!--                            <a href="#" title="img3"> <img src="images/latest-product-img3.jpg" alt="" /><p>Phasellus ferm</p></a>-->
                            <!--                            <a href="#" title="img4"> <img src="images/latest-product-img4.jpg" alt="" /><p>Veldignissim</p></a>-->
                            <!--                            <a href="#" title="img5"> <img src="images/latest-product-img5.jpg" alt="" /><p>Aliquam interd</p></a>-->
                            <!--                            <a href="#" title="img6"> <img src="images/latest-product-img6.jpg" alt="" /><p>Sapien lectus</p></a>-->


                    </div>
                    <span>
                            <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
                            <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
                        </span>
                </div>
            </div>


        </div>
    </div>
</div>



<?php include "footer.php" ?>

