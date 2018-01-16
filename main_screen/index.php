<?php include "db.php";



    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }



function endsWith($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 ||
        (substr($haystack, -$length) === $needle);
}

?>

<?php

// TODO:
//    The validation link will not be valid after first validation so if previously verified or account is not in database now then sorry alert should be given

if (isset($_GET['unverified'])) {
    echo "<script>alert(\"Sorry couldn\'t verify your email address! Probably your account has been deleted by admin!\")</script>";
}

if (isset($_GET['blocked'])) {
    echo "<script>alert(\"Sorry, Your email address has been blocked by admin! To learn more, send email at mubazaar@gmail.com\")</script>";
}

if (isset($_GET['alreadylogin'])) {
    if ($_GET['alreadylogin'] === 'customer') {
        echo "<script>alert(\"Already logged in as customer\")</script>";
    } else {
        echo "<script>alert(\"Already logged in as admin\")</script>";
    }
}


if (isset($_GET['id']) && isset($_GET['code'])) {
    $confirm_id = $_GET['id'];
    $confirm_code = $_GET['code'];

    $query = "SELECT Customer_Name,Email,ID,Status FROM customer WHERE ID='$confirm_id' AND Confirm_Code='$confirm_code';";

    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Status'] === "verified") {

            $customer_active_query = "UPDATE customer SET  customer_active = 'Y' WHERE id = {$row['ID']};";
            mysqli_query($connect, $customer_active_query);

            $_SESSION['customer_name'] = $row['Customer_Name'];
            $_SESSION['customer_email'] = $row['Email'];
            $_SESSION['customer_id'] = $row['ID'];

            if (endsWith($_SESSION['customer_email'], "@ugrad.cse.buet.ac.bd")) {
                $_SESSION['is_buetian'] = 1;
            }
            header("Location: index.php");
            //            $_SESSION['success'] = "You are now logged in";
            //            header('location: myaccount.php');
        } else if ($row['Status'] === "blocked") {
            header("Location: index.php?blocked=1");
        } else {
            $id = $row['ID'];
            $query = "UPDATE customer SET Status = 'verified', Confirm_Code = 0 WHERE ID = {$id};";
            mysqli_query($connect, $query);


            $customer_active_query = "UPDATE customer SET  customer_active = 'Y' WHERE id = {$row['ID']};";
            mysqli_query($connect, $customer_active_query);

            $_SESSION['customer_name'] = $row['Customer_Name'];
            $_SESSION['customer_email'] = $row['Email'];
            $_SESSION['customer_id'] = $row['ID'];
            if (endsWith($_SESSION['customer_email'], "@ugrad.cse.buet.ac.bd")) {
                $_SESSION['is_buetian'] = 1;
            }
            header("Location: index.php");

        }
    } else {
        header("Location: index.php?unverified=1");
    }
}


?>


    <!DOCTYPE HTML>
    <head>
        <title>MUBazaar</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">


        <!-- carousel extras start -->


        <!--    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	-->
        <!--    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />-->
        <!--    <link rel="stylesheet" href="css/bootstrap.css">-->
        <!--    <link rel="stylesheet" href="css/bootstrap-theme.css">-->
        <!--    <link href="css/responsive-slider.css" rel="stylesheet">-->
        <!--    <link rel="stylesheet" href="css/animate.css">-->
        <!--    <link rel="stylesheet" href="css/carousel_style.css">-->

        <!--    <link rel="stylesheet" href="css/carousel_font-awesome.min.css">-->

        <!-- carousel extras end -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
        <script src="js/jquery.openCarousel.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>



    <style>
        /* The Modal (background) */
        .modal {
            display: block; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

</head>
    <body>


    <?php
        $myArray = "";
        $flag = false;
        $image = '';
        if(!isset($_SESSION['entered'])) {

        $offer_query = "SELECT occasion, image FROM special_offer WHERE offer_active = 'Y';";
        $offer_rslt = mysqli_query($connect, $offer_query);

        if(mysqli_num_rows($offer_rslt) > 0){
            $offer_row = mysqli_fetch_assoc($offer_rslt);
            $flag = true;
            $image = $offer_row['image'];
            $myArray .= ucfirst($offer_row['occasion']) . "," ;
        }

        while($offer_row = mysqli_fetch_assoc($offer_rslt)) {

            $myArray .= ucfirst($offer_row['occasion']) . "," ;
        }}
        ?>
<?php if($flag){ ?>
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1 style="text-align: center; font-size: 200%">Special Discount in MUBazaar :: <?php echo rtrim($myArray,", "); ?> </h1>
        <div style="text-align: center"><img style="text-align: center" src="images/<?php echo  $image?>"/></div>

    </div>

</div>

<?php } ?>




<?php
$_SESSION['entered'] = 1;
include "dell_header.php" ?>


    <!------------End Header ------------>
<div class="main">
    <div class="content">
    <div class="content_top">
        <div class="wrap">
            <h3>Latest Products</h3>
        </div>
        <div class="line"></div>
        <div class="wrap">
            <div class="ocarousel_slider">
                <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                    <div class="ocarousel_window">


                        <?php

                        $category_tables = array("electronics", "appliances", "clothes", "office_supplies", "sports_equipments");
                        foreach ($category_tables as $single_table) {
                            $query = "SELECT name, image_1, id FROM product WHERE category = '{$single_table}' ORDER BY id DESC LIMIT 5;";
                            $rslt = mysqli_query($connect, $query);
                            $count = mysqli_num_rows($rslt);
                            if ($count == 0) {
//                                echo "<h1 style='color:red;text-weight:bold'>NO PRODUCT FOUND FOR YOUR SEARCH!</h1>";
                            } else {
                                while ($row = mysqli_fetch_assoc($rslt)) {
                                    $prod_name = $row['name'];
                                    $prod_image_1 = $row['image_1'];
                                    $prod_id = $row['id'];


                                    ?>
                                    <a href="preview_edit.php?table=<?php echo $single_table; ?>&id=<?php echo $prod_id; ?>"
                                       title="img1"> <img
                                                src="images/<?php echo $single_table . "/" . $prod_image_1; ?>"
                                                width="100px" height="100px" alt="<?php echo $prod_name; ?>"/>
                                        <p><?php echo $prod_name ; ?></p></a>


                                <?php }
                            }
                        } ?>


                        <!--                                            <a href="#" title="img2"> <img src="images/latest-product-img2.jpg" alt="" /><p>Suspendiss</p></a>-->
                        <!--                                <a href="#" title="img3"> <img src="images/latest-product-img3.jpg" alt="" /><p>Phasellus ferm</p></a>-->
                        <!--                                <a href="#" title="img4"> <img src="images/latest-product-img4.jpg" alt="" /><p>Veldignissim</p></a>-->
                        <!--                                <a href="#" title="img5"> <img src="images/latest-product-img5.jpg" alt="" /><p>Aliquam interd</p></a>-->
                        <!--                                <a href="#" title="img6"> <img src="images/latest-product-img6.jpg" alt="" /><p>Sapien lectus</p></a>-->
                        <!--                                <a href="#" title="img1"> <img src="images/latest-product-img1.jpg" alt="" /><p>Nuncvitae</p></a>-->
                        <!--                                <a href="#" title="img2"> <img src="images/latest-product-img2.jpg" alt="" /><p>Suspendiss</p></a>-->
                        <!--                                <a href="#" title="img3"> <img src="images/latest-product-img3.jpg" alt="" /><p>Phasellus ferm</p></a>-->
                        <!--                                <a href="#" title="img4"> <img src="images/latest-product-img4.jpg" alt="" /><p>Veldignissim</p></a>-->
                        <!--                                <a href="#" title="img5"> <img src="images/latest-product-img5.jpg" alt="" /><p>Aliquam interd</p></a>-->
                        <!--                                <a href="#" title="img6"> <img src="images/latest-product-img6.jpg" alt="" /><p>Sapien lectus</p></a>-->

                    </div>
                    <span>
                                <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
                                <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
                            </span>
                </div>
            </div>
        </div>
    </div>
    <div class="content_bottom">
    <div class="wrap">
    <div class="content-bottom-left">
        <div class="categories">
            <ul>
                <h3>Browse All Categories</h3>

                <?php

                $query = "SELECT DISTINCT category  FROM product";
                $rslt = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($rslt)) {
                    $category_name = $row['category'];
                    $link = str_replace(" ", "_", $category_name);
                    $cat_name = ucfirst(str_replace("_", " ", $category_name));
                    echo "<li><a href='$link.php#categories'>$cat_name</a></li>";
                }
                ?>

                <!--
<li><a href="#">Appliances</a></li>
<li><a href="#">Sports Equipments</a></li>
<li><a href="#">Computers & Electronics</a></li>
<li><a href="#">Office supplies</a></li>
<li><a href="#">Health & Beauty</a></li>
<li><a href="#">Home & Garden</a></li>
<li><a href="#">Apparel</a></li>
<li><a href="#">Toys & Games</a></li>
<li><a href="#">Automotive</a></li>
-->
            </ul>
        </div>
        <div class="buters-guide">
            <h3>Buyers Guide</h3>
            <p><span>We want you to be happy with your purchase.</span></p>
            <p>So we're committed to giving you all the tools to make the right decision with minimum
                fuss. </p>
        </div>
        <div class="add-banner">
            <img src="images/camera.png" alt=""/>
            <div class="banner-desc">
                <h4>Electronics</h4>
                <a href="#">More Info</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="add-banner add-banner2">
            <img src="images/computer.png" alt=""/>
            <div class="banner-desc">
                <h4>Computers</h4>
                <a href="#">More Info</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="content-bottom-right">
    <h3>Browse All Categories</h3>

    <div class="section group">


<?php



    $category_tables = array("electronics", "appliances", "clothes", "office_supplies", "sports_equipments");
    foreach ($category_tables as $single_table) {
        $query = "SELECT name,price,image_1,id FROM product WHERE category = '{$single_table}' ";
        $rslt = mysqli_query($connect, $query);
        $count = mysqli_num_rows($rslt);
        if ($count == 0) {
//                                echo "<h1 style='color:red;text-weight:bold'>NO PRODUCT FOUND FOR YOUR SEARCH!</h1>";
        } else {
            $product_found_flag = 1;
            while ($row = mysqli_fetch_assoc($rslt)) {
                $prod_name = $row['name'];
                $prod_price = $row['price'];
                $prod_image_1 = $row['image_1'];
                $prod_id = $row['id'];


                ?>

                <div class="grid_1_of_4 images_1_of_4">
                    <h4 style="min-height: 4.5em"><a href="preview_edit.php?table=<?php echo $single_table; ?>&id=<?php  echo $prod_id ?>"><?php echo strlen($prod_name) > 50 ? substr($prod_name,0,50)."..." : $prod_name; ?></a></h4>
                    <a href="preview_edit.php?table=<?php echo $single_table; ?>&id=<?php  echo $prod_id ?>"><img src="images/<?php echo $single_table."/".$prod_image_1?>" alt="" width="120" height="120"/></a>
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
                        </div>
                        <div class="add-cart">
                            <h4><a href="preview_edit.php?table=<?php echo $single_table; ?>&id=<?php  echo $prod_id ?>">More Info</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>



            <?php } } } ?>






                </div>


                <div class="product-articles">
                    <h3>Popular Articles</h3>
                    <ul>
                        <li>
                            <div class="article">
                                <p><span>Top E-commerce Trends to inform your 2017 marketing strategy</span></p>
                                <p>We are now well into 2017. If you are to develop a winning e-commerce marketing strategy you'll need to start planning now. E-commerce continues to grow rapidly, but with the huge market acting as a magnet to brands large and small, competition will ramp up faster than the total growth of the market. This means customers will be harder to win, easier to lose and fussier on price and user experience.</p>
                                <p><a href="https://www.smartinsights.com/ecommerce/ecommerce-strategy/top-ecommerce-trends-inform-2017-marketing-strategy/">+ Read Full article</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="article">
                                <p><span>What is ecommerce marketing?</span></p>
                                <p>Ecommerce marketing is the process of driving sales by raising awareness about an online store's brand and product offerings. Digital marketing for ecommerce applies traditional marketing principles to a multichannel, data-driven environment.</p>
                                <p><a href="https://www.bigcommerce.com/ecommerce-answers/what-ecommerce-marketing/">+ Read Full article</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
                <div class="clear"></div>





        <div id="chatBot" style="position: fixed;z-index: 1;display: none;
    right: 0px;
    bottom: 0px;">
        <iframe  width="350" height="430" src="https://console.dialogflow.com/api-client/demo/embedded/cd9c95f9-deb3-4159-9fa8-aee3bd0e7c05"></iframe>
        </div>

        <div id="collapseChat" style="position: fixed; right: 0px; bottom: 375px;z-index: 3; display: none">
            <a class="fa fa-angle-double-right" style="font-size:48px;color:red"></a>
        </div>

        <div id="expandChat" style="position: fixed; right: 0px; bottom: 375px;z-index: 2; display: block;">
            <a class="fa fa-angle-double-left" style="font-size:48px;color:dodgerblue"></a>
        </div>


        <script>
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            //    var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            //    btn.onclick = function() {
            //        modal.style.display = "block";
            //    }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

        <script type="text/javascript">
            $('#collapseChat').click(function () {
//                $('#chatBot').css("display", "none");
//                $('#chatBot').animate({
//                    right: "350px";
//                }, 2000);
                $('#chatBot').css("display", "none");
                $('#collapseChat').css("display", "none");
                $('#expandChat').css("display", "block");
            });

            $('#expandChat').click(function () {
                $('#chatBot').css("display", "block");
                $('#collapseChat').css("display", "block");
                $('#expandChat').css("display", "none");
            });
        </script>



                </div>
                </div>
                </div>
                </div>




                <?php include "footer.php" ?>