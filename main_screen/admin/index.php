<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>

<?php
$query = "SELECT * FROM category";
$select_all_categories= mysqli_query($connect, $query);
$category_count = mysqli_num_rows($select_all_categories);

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
$total_products = 0;
$total_sold = 0;
while($row = mysqli_fetch_assoc($select_all_categories)) {
    $category_name[$i] = strtolower(str_replace(" ","_",$row['Category_Name']));
    $query = "SELECT COUNT(*) FROM `{$category_name[$i]}`";
    $result = mysqli_query($connect, $query);
    $row_1 = mysqli_fetch_assoc($result);
    $category_wise_count[$i] = $row_1['COUNT(*)'];

    //counting total prod, total sold
    $query = "SELECT units_in_stock, item_sold FROM `{$category_name[$i]}`;";
    $result = mysqli_query($connect, $query);
    while($row_2 = mysqli_fetch_assoc($result)) {
        $total_products += 1;
        if( $row_2['item_sold'] > 0 )
            $total_sold += 1;
    }

    $i++;
}

$total_unsold = $total_products - $total_sold;

?>



<?php

$distinct_product_query = "SELECT DISTINCT Category_Name FROM category;";
$distinct_product_rslt = mysqli_query($connect, $distinct_product_query);


$pi_lebel= array();

$pi_val= array();

while($distinct_product_row = mysqli_fetch_assoc($distinct_product_rslt)){
    array_push($pi_lebel, $distinct_product_row['Category_Name']);

}


$category_tables = array("appliances", "electronics", "clothes", "office_supplies", "sports_equipments");
foreach ($category_tables as $single_table) {

    if(isset($_GET['sdate']) && isset($_GET['edate'])){
        $sdate = $_GET['sdate'];
        $edate = $_GET['edate'];
        $p_query = "SELECT SUM(product_quantity) FROM customer_order C1 JOIN customer_ordered_products C2 WHERE C2.product_category =  '{$single_table}' ";
        $p_query .= "AND order_date BETWEEN '{$sdate}' AND '{$edate}';";
    }else{
        $p_query = "SELECT SUM(product_quantity) FROM customer_order C1 JOIN customer_ordered_products C2 WHERE C2.product_category =  '{$single_table}' ;";
    }
    $p_query_rslt = mysqli_query($connect, $p_query);
    $p_query_row = mysqli_fetch_assoc($p_query_rslt);
    array_push($pi_val, $p_query_row['SUM(product_quantity)']);

}



$distinct_movie_query = "SELECT DISTINCT category FROM movie;";
$distinct_movie_rslt = mysqli_query($connect, $distinct_movie_query);


$pi_lebel_movie= array();

$pi_val_movie= array();

while($distinct_movie_row = mysqli_fetch_assoc($distinct_movie_rslt)){
    array_push($pi_lebel_movie, $distinct_movie_row['category']);

    $cat =  $distinct_movie_row['category'];

    $p_query = "SELECT SUM(sold) FROM movie WHERE category =  '{$cat}';";

    $p_query_rslt = mysqli_query($connect, $p_query);
    $p_query_row = mysqli_fetch_assoc($p_query_rslt);
    array_push($pi_val_movie, $p_query_row['SUM(sold)']);

}


?>


    <script src="./js/plotly-latest.min.js" type="text/javascript"></script>

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
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>0</div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
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
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php echo "<div class='huge'>{$total_unsold}</div>"; ?>
                                    <div>Unsold Products</div>
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
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    echo "<div class='huge'>{$category_count}</div>";
                                    ?>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
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

                <a target="_blank" href="category_sold.php"><h1 style="color: black;"> Category wise sale chart on MUMovies</h1></a>

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

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart1 = new google.charts.Bar(document.getElementById('columnchart_material_1'));
                        var chart2 = new google.charts.Bar(document.getElementById('columnchart_material_2'));
                        var chart3 = new google.charts.Bar(document.getElementById('columnchart_material_3'));

                        chart1.draw(data1, google.charts.Bar.convertOptions(options));
                        chart2.draw(data2, google.charts.Bar.convertOptions(options));
                        chart3.draw(data3, google.charts.Bar.convertOptions(options));
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