<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>


<?php

$distinct_product_query = "SELECT DISTINCT Category_Name FROM category;";
$distinct_product_rslt = mysqli_query($connect, $distinct_product_query);
$sdate = '';

$edate = 'Today';

$pi_lebel= array();

$pi_val= array();

$grand_total = 0;

while($distinct_product_row = mysqli_fetch_assoc($distinct_product_rslt)){
    array_push($pi_lebel, $distinct_product_row['Category_Name']);

}

$total_cost_q = "SELECT SUM(total_cost) FROM customer_order C1 INNER JOIN customer_ordered_products C2 ON C1.order_id = C2.order_id ";
if(isset($_GET['sdate']) && isset($_GET['edate'])) {
    $sdate = $_GET['sdate'];
    $edate = $_GET['edate'];
    $total_cost_q .= "WHERE order_date BETWEEN '{$sdate}' AND '{$edate}';";
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
    $grand_total = $grand_total + $p_query_row['SUM(total_cost)'];
    array_push($pi_val, $p_query_row['SUM(total_cost)']);

}

$total_cost_rslt = mysqli_query($connect, $total_cost_q);




?>
    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">

    <script src="./js/plotly-latest.min.js" type="text/javascript"></script>

    <script>




        jQuery(document).ready(function () {
            jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

                window.location.replace("top_customers.php?top_no=" +  jQuery('#top_select').val());

//           xhttp.open("GET", "top_customers.php?top_no=" +  jQuery('#top_select').val() , true);
//           xhttp.send();

            });
        });


    </script>



    <div id="wrapper">



        <!--  Navigation -->
        <?php include "includes/admin_navigation.php" ?>


        <h1 style="color: white;"> Category wise sale chart on MUBazaar</h1>





        <div id="page-wrapper">



            <h4>Select date wise</h4>

            <form action="" method="get">
                Start Date:
                <input type="date" name="sdate" required>
                End Date:
                <input type="date" name="edate" required>
                <input class="btn btn-primary"  type="submit">
            </form>


            <h2>Start Date: <?php echo $sdate ?></h2>
            <h2>End Date: <?php echo $edate  ?></h2>
            <h2>Total Income: <?php echo $grand_total ?> Taka</h2>

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



            <!-- /.container-fluid -->

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Product Category</th>
                    <th>Total Sold(Number of items)</th>
                </tr>
                </thead>

                <tbody>

                <?php

                $category_tables = array("appliances", "electronics", "clothes", "office_supplies", "sports_equipments");
foreach ($category_tables as $single_table) {

    if(isset($_GET['sdate']) && isset($_GET['edate'])){
        $sdate = $_GET['sdate'];
        $edate = $_GET['edate'];
        $p_query = "SELECT SUM(product_quantity) FROM customer_order C1 INNER JOIN customer_ordered_products C2 ON C1.order_id = C2.order_id WHERE C2.product_category =  '{$single_table}' ";
        $p_query .= "AND order_date BETWEEN '{$sdate}' AND '{$edate}';";
    }else{
        $p_query = "SELECT SUM(product_quantity) FROM customer_order C1 INNER JOIN customer_ordered_products C2 ON C1.order_id = C2.order_id WHERE C2.product_category =  '{$single_table}' ;";
    }
    $p_query_rslt = mysqli_query($connect, $p_query);
    $p_query_row = mysqli_fetch_assoc($p_query_rslt);
    $prod_quantity = $p_query_row['SUM(product_quantity)'];



                ?>
<tr>
    <td><?php echo $single_table ?></td>
    <td><?php echo $prod_quantity ?></td>
</tr>


<?php } ?>
                </tbody>

            </table>


        </div>



        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>