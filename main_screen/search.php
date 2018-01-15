<?php include "db.php";
require('paginator.php'); ?>
<?php
global $connect;
//$query = "SELECT * FROM electronics";


if (isset($_GET['sub_cat'])) {
    $sub_category = $_GET['sub_cat'];
    $query = "SELECT name, price, image_1, id FROM appliances WHERE sub_category = '{$sub_category}'";
} else {
    $query = "SELECT name,price,image_1,id FROM appliances";
}



?>


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
</head>
<body>


<?php include "dell_header.php" ?>


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
                                $query = "SELECT name, image_1, id FROM product WHERE category =  '{$single_table}' ORDER BY id DESC LIMIT 5;";
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
                                            <p><?php echo $prod_name; ?></p></a>


                                    <?php }
                                }
                            } ?>


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

                            $query = "SELECT Category_Name FROM category";
                            $rslt = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_assoc($rslt)) {
                                $category_name = $row['Category_Name'];
                                $link = str_replace(" ", "-", $category_name);
                                echo "<li><a href='$link.php#categories'>$category_name</a></li>";
                            }
                            ?>

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
                    <h3>Search Result</h3>


                    <div class="section group">
                        <a id="categories"></a>


                        <?php



                            $product_found_flag = 0;
                            $searchText = (isset($_GET['searchSubmit'])) ?  $_GET['searchText'] : '';


                            $query = "SELECT name,price,image_1,id, category FROM product WHERE  name LIKE '%$searchText%' ";

                            //these variables are passed via URL
                            $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 8; //movies per page
                            $page = (isset($_GET['page'])) ? $_GET['page'] : 1; //starting page
                            $links = 5;


                            $paginator = new Paginator($connect, $query); //__constructor is called
                            $results = $paginator->getData($limit, $page);





//                            $rslt = mysqli_query($connect, $query);
//                            $count = mysqli_num_rows($rslt);
//                            if (count($results->data) == 0) {
//                                echo "<h1 style='color:red;text-weight:bold'>NO PRODUCT FOUND FOR YOUR SEARCH!</h1>";
//                            } else {
                                $product_found_flag = 1;
                                for ($p = 0; $p < count($results->data); $p++){
                                    $row = $results->data[$p];
                                    $single_table = $row['category'];
                                    $prod_name = $row['name'];
                                    $prod_price = $row['price'];
                                    $prod_image_1 = $row['image_1'];
                                    $prod_id = $row['id'];


                                    ?>


                                    <div class="grid_1_of_4 images_1_of_4">
                                        <h4 style="min-height: 4.5em"><a
                                                    href="preview_edit.php?table=<?php echo $single_table; ?>&id=<?php echo $prod_id ?>"><?php echo strlen($prod_name) > 50 ? substr($prod_name, 0, 50) . "..." : $prod_name; ?></a>
                                        </h4>
                                        <a href="preview_edit.php?table=<?php echo $single_table; ?>&id=<?php echo $prod_id ?>"><img
                                                    src="images/<?php echo $single_table . "/" . $prod_image_1 ?>"
                                                    alt="" width="120" height="120"/></a>
                                        <div class="price-details">
                                            <div class="price-number">
                                                <p>

                                                    <?php if (isset($_SESSION['is_buetian'])) {


                                                        ?>
                                                        <del style="color:red;font-size:24px;"><span class="rupees">&#x9f3;<?php echo $prod_price ?> </span>
                                                        </del>
                                                    <?php } else {
                                                        ?>
                                                        <span class="rupees">&#x9f3;<?php echo $prod_price ?> </span>

                                                    <?php } ?>

                                                </p>
                                            </div>
                                            <div class="add-cart">
                                                <h4>
                                                    <a href="preview_edit.php?table=<?php echo $single_table; ?>&id=<?php echo $prod_id ?>">More
                                                        Info</a></h4>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>

                                <?php }

                            ?>








                    </div>

                    <div style="text-align:center;" class="container-fluid">
                        <?php echo $paginator->createLinks($links, 'pagination pagination-lg'); ?>
                    </div>


                    <div class="product-articles">
                        <h3>Popular Articles</h3>
                        <ul>
                            <li>
                                <div class="article">
                                    <p><span>Top E-commerce Trends to inform your 2017 marketing strategy</span></p>
                                    <p>We are now well into 2017. If you are to develop a winning e-commerce marketing
                                        strategy you'll need to start planning now. E-commerce continues to grow
                                        rapidly, but with the huge market acting as a magnet to brands large and small,
                                        competition will ramp up faster than the total growth of the market. This means
                                        customers will be harder to win, easier to lose and fussier on price and user
                                        experience.</p>
                                    <p>
                                        <a href="https://www.smartinsights.com/ecommerce/ecommerce-strategy/top-ecommerce-trends-inform-2017-marketing-strategy/">+
                                            Read Full article</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="article">
                                    <p><span>What is ecommerce marketing?</span></p>
                                    <p>Ecommerce marketing is the process of driving sales by raising awareness about an
                                        online store's brand and product offerings. Digital marketing for ecommerce
                                        applies traditional marketing principles to a multichannel, data-driven
                                        environment.</p>
                                    <p>
                                        <a href="https://www.bigcommerce.com/ecommerce-answers/what-ecommerce-marketing/">+
                                            Read Full article</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>

