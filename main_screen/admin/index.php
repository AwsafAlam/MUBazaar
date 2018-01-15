<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>

<?php
$query = "SELECT * FROM category";
$select_all_categories= mysqli_query($connect, $query);
$category_count = mysqli_num_rows($select_all_categories);

$query = "SELECT * FROM review";
$select_all_reviews= mysqli_query($connect, $query);
$review_count = mysqli_num_rows($select_all_reviews);

$query = "SELECT * FROM contact";
$select_all_contacts= mysqli_query($connect, $query);
$contact_count = mysqli_num_rows($select_all_contacts);

$query = "SELECT COUNT(*) FROM customer WHERE customer_active='Y'";
$select_all_chat= mysqli_query($connect, $query);
$select_all_chat_rows = mysqli_fetch_assoc($select_all_chat);
$chat_count = $select_all_chat_rows['COUNT(*)'];



$count_query = "SELECT SUM(count) FROM community_poll;";
$count_polls_rslt = mysqli_query($connect, $count_query);
$count_polls_row = mysqli_fetch_assoc($count_polls_rslt);
$poll_count = $count_polls_row["SUM(count)"];


$query = "SELECT * FROM product_less_amount";
$select_all_less_amount= mysqli_query($connect, $query);
$less_amount_count = mysqli_num_rows($select_all_less_amount);


$query = "SELECT * FROM customer";
$select_all_users = mysqli_query($connect, $query);
$user_count = mysqli_num_rows($select_all_users);

$query = "SELECT * FROM customer WHERE status = 'verified'";
$select_all_verified = mysqli_query($connect, $query);
$verified_count = mysqli_num_rows($select_all_verified);

$query = "SELECT * FROM customer WHERE status = 'blocked'";
$select_all_blocked = mysqli_query($connect, $query);
$blocked_count = mysqli_num_rows($select_all_blocked);

$i=0;
$total_unsold = 0;
$total_sold = 0;
$total_zero_sold = 0;
while($row = mysqli_fetch_assoc($select_all_categories)) {
    $category_name[$i] = strtolower(str_replace(" ","_",$row['Category_Name']));
    $query = "SELECT COUNT(*) FROM product WHERE category =  '{$category_name[$i]}'";
    $result = mysqli_query($connect, $query);
    $row_1 = mysqli_fetch_assoc($result);
    $category_wise_count[$i] = $row_1['COUNT(*)'];

    //counting total prod, total sold
    $query = "SELECT units_in_stock, item_sold FROM product WHERE category =  '{$category_name[$i]}';";
    $result = mysqli_query($connect, $query);
    while($row_2 = mysqli_fetch_assoc($result)) {
        $total_unsold += $row_2['units_in_stock'];
        //if( $row_2['item_sold'] > 0 )
        $total_sold += $row_2['item_sold'];
        if($row_2['item_sold'] == 0){
            $total_zero_sold+=1;
        }
    }

    $i++;
}
$total_products = $total_unsold + $total_sold;
//
//$query = "SELECT COUNT (*) FROM `{$category_name[$i]}` WHERE item_sold=0;";
//$result = mysqli_query($connect, $query);
//$row_2 = mysqli_fetch_assoc($result);
//$total_zero_sold = $row_2['COUNT(*)'];
?>



<?php

$distinct_product_query = "SELECT DISTINCT category FROM product;";
$distinct_product_rslt = mysqli_query($connect, $distinct_product_query);


$pi_lebel= array();

$pi_val= array();

while($distinct_product_row = mysqli_fetch_assoc($distinct_product_rslt)){
    array_push($pi_lebel, $distinct_product_row['category']);

}


$category_tables = array("appliances", "electronics", "clothes", "office_supplies", "sports_equipments");
foreach ($category_tables as $single_table) {

    if(isset($_GET['sdate']) && isset($_GET['edate'])){
        $sdate = $_GET['sdate'];
        $edate = $_GET['edate'];
        $p_query = "SELECT SUM(total_cost) FROM customer_order C1 INNER JOIN customer_ordered_products C2 ON C1.order_id = C2.order_id WHERE C2.product_category =  '{$single_table}' ";
        $p_query .= "AND order_date BETWEEN '{$sdate}' AND '{$edate}';";
    }else{
        $p_query = "SELECT SUM(total_cost) FROM customer_order C1 INNER JOIN customer_ordered_products C2 ON C1.order_id = C2.order_id WHERE C2.product_category =  '{$single_table}' ;";
    }
    $p_query_rslt = mysqli_query($connect, $p_query);
    $p_query_row = mysqli_fetch_assoc($p_query_rslt);
    array_push($pi_val, $p_query_row['SUM(total_cost)']);

}

$value = max($pi_val);
$key = array_search($value, $pi_val);
$category_name_max_sold = $category_tables[$key];

$category_name_max_sold = ucfirst(str_replace("_"," ",$category_name_max_sold));
$category_name_max_sold = "Top Category: ".$category_name_max_sold;



$distinct_movie_query = "SELECT DISTINCT category FROM movie;";
$distinct_movie_rslt = mysqli_query($connect, $distinct_movie_query);


$pi_lebel_movie= array();

$pi_val_movie= array();

$total_income_m = 0;

while($distinct_movie_row = mysqli_fetch_assoc($distinct_movie_rslt)){
    array_push($pi_lebel_movie, $distinct_movie_row['category']);

    $cat =  $distinct_movie_row['category'];

    $p_query = "SELECT SUM(price * sold) FROM movie WHERE category =  '{$cat}';";

    $p_query_rslt = mysqli_query($connect, $p_query);
    $p_query_row = mysqli_fetch_assoc($p_query_rslt);
    $total_income_m = $total_income_m  + $p_query_row['SUM(price * sold)'];
    array_push($pi_val_movie, $p_query_row['SUM(price * sold)']);

}







?>


    <script src="./js/plotly-latest.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div id="wrapper">




    <!--  Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin!
                        <small><?php echo $_SESSION['admin_name']; ?></small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-diamond" style="font-size:50px"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><h4 > <?php echo $category_name_max_sold ?></h4></div>
                                    <div>Sale Chart</div>
                                </div>
                            </div>
                        </div>
                        <a href="category_sold.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-ban	 fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php echo "<div class='huge'>{$total_zero_sold}</div>"; ?>
                                    <div>Zero Sold Products</div>
                                </div>
                            </div>
                        </div>
                        <a href="unsold_products.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    echo "<div class='huge'>{$user_count}</div>";
                                    ?>

                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_customers.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-flask	 fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    //                                    echo "<div class='huge'>{$less_amount_count}</div>";
                                    ?>
                                    <div> Almost Finished Products</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_products_close_to_finish.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="panel " style="background-color: #f06292; color: white">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    echo "<div class='huge'>{$review_count}</div>";
                                    ?>
                                    <div>Products Reviews</div>
                                </div>
                            </div>
                        </div>
                        <a href="review.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel " style="background-color: #7b1fa2; color: white">
                        <div class="panel-heading" ">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-bar-chart	 fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php
                                echo "<div class='huge'>{$poll_count}</div>";
                                ?>
                                <div>View polls</div>
                            </div>
                        </div>
                    </div>
                    <a href="view_polls.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel " style="background-color:#00897b; color: white">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-vcard fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php
                                echo "<div class='huge'>{$contact_count}</div>";
                                ?>
                                <div>Contacts</div>
                            </div>
                        </div>
                    </div>
                    <a href="view_contacts.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel " style="background-color:#5d4037; color: white">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php
                                echo "<div class='huge'>{$chat_count}</div>";
                                ?>
                                <div>Chat</div>
                            </div>
                        </div>
                    </div>
                    <a href="chat/admin_chat_index.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


        </div>

        <!-- /.row -->



            <div class="row">



                <a target="_blank" href="category_sold.php"><h1 style="color: black;"> Category wise sale chart on MUBazaar</h1></a>
                <div class="container-fluid"  id="two"></div>
                <script type="text/javascript">
                    var values=<?php echo json_encode($pi_val);?>;
                    var labels=<?php echo json_encode($pi_lebel);?>;

                    var data=[{
                        values:values,labels:labels,type:'pie'
                    }];

                    var layout={
                        height:600,width:800
                    };

                    Plotly.newPlot('two',data,layout);

                </script>

                <h1 style="color: black;"> Category wise sale chart on MUMovies</h1>

                <h2>Total income so far: <?php echo $total_income_m ?> Taka</h2>
                <div class="container-fluid"  id="three"></div>
                <script type="text/javascript">
                    var values=<?php echo json_encode($pi_val_movie);?>;
                    var labels=<?php echo json_encode($pi_lebel_movie);?>;

                    var data=[{
                        values:values,labels:labels,type:'pie'
                    }];

                    var layout={
                        height:600,width:800
                    };

                    Plotly.newPlot('three',data,layout);

                </script>


                <p id="demo"></p>

                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {


                        var data1 = google.visualization.arrayToDataTable([
                            ['Customers', 'number of customers'],
                            <?php
                            $element_text = ['All Customers', 'Verified', 'Unverified', 'Blocked'];
                            $element_count = [$user_count, $verified_count, $verified_count-$blocked_count,  $blocked_count];

                            for($i=0; $i<4; $i++){
                                echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
                            }
                            ?>
                            //['Posts', 1000],
                        ]);

                        var data2 = google.visualization.arrayToDataTable([
                            ['Categories', 'Types of Products'],
                            <?php
                            //                                $element_text = ['Appliances', 'Electronics', 'Clothes', 'Office Supplies', 'Sports Equipments'];
                            //                                $element_count = [$user_count, $verified_count, $blocked_count,$category_count];

                            for($i=0; $i<$category_count; $i++){
                                echo "['{$category_name[$i]}'".","."{$category_wise_count[$i]}],";
                            }
                            ?>
                            //['Posts', 1000],
                        ]);

                        var data3 = google.visualization.arrayToDataTable([
                            ['Products', 'number of Products'],
                            <?php
                            $element_text = ['All Products', 'Sold', 'Unsold'];
                            $element_count = [$total_products, $total_sold, $total_unsold];

                            for($i=0; $i<3; $i++){
                                echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
                            }
                            ?>
                            //['Posts', 1000],
                        ]);

                        var options1 = {
                            chart: {
                                title: 'Customers of MUBazar',
                                subtitle: '',
                            },
                            titleTextStyle: {
                                color: 'black',
                                fontSize: 30,
                                bold: true,
                            },
                            colors: '#ffc107',
                        };
                        var options2 = {
                            chart: {
                                title: 'Varieties of Products of MUBazar',
                                subtitle: '',
                            },
                            titleTextStyle: {
                                color: 'black',
                                fontSize: 30,
                                bold: true,
                            },
                            colors: '#4fc3f7',
                        };
                        var options3 = {
                            chart: {
                                title: 'Sold and Unsold Products',
                                subtitle: '',
                            },
                            titleTextStyle: {
                                color: 'black',
                                fontSize: 30,
                                bold: true,
                            },
                            colors: '#00e676',
                        };
                        var chart1 = new google.charts.Bar(document.getElementById('columnchart_material_1'));
                        var chart2 = new google.charts.Bar(document.getElementById('columnchart_material_2'));
                        var chart3 = new google.charts.Bar(document.getElementById('columnchart_material_3'));



                        chart1.draw(data1, google.charts.Bar.convertOptions(options1));
                        chart2.draw(data2, google.charts.Bar.convertOptions(options2));
                        chart3.draw(data3, google.charts.Bar.convertOptions(options3));
                    }

                </script>
                <div id="columnchart_material_1" style="width: 'auto'; height: 500px;"></div>
                <div id="columnchart_material_2" style="width: 'auto'; height: 500px;"></div>
                <div id="columnchart_material_3" style="width: 'auto'; height: 500px;"></div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>