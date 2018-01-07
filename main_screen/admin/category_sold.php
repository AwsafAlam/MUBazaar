<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>


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
    $p_query = "SELECT SUM(item_sold) FROM `{$single_table}` ;";
    $p_query_rslt = mysqli_query($connect, $p_query);
    $p_query_row = mysqli_fetch_assoc($p_query_rslt);
    array_push($pi_val, $p_query_row['SUM(item_sold)']);
}




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


            <form action="/action_page.php">
                Start Date:
                <input type="date" name="bday" required>
                End Date:
                <input type="date" name="bday" required>
                <input type="submit">
            </form>


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

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>