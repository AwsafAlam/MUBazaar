<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>

<?php $table_name = 'all' ;
if(isset($_GET['table_name'])){
    $table_name = $_GET['table_name'];
}
?>


<link rel="stylesheet" type="text/css" href="includes/admin_header.php">



<script>




    jQuery(document).ready(function () {
        jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

            window.location.replace("reduce_price.php?table_name=" +  jQuery('#top_select').val());

//           xhttp.open("GET", "top_customers.php?table_name=" +  jQuery('#top_select').val() , true);
//           xhttp.send();

        });
    });


</script>

<div id="wrapper">

    <!--  Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <!--
                                        <h1 class="page-header">
                                            Welcome to Admin!
                                            <small>Author</small>
                                        </h1>
                    -->

                    <?php


                    ?>



                    <form action='unsold_products.php?table_name=<?php echo $table_name?>' method='post'>

                        <div style="display: inline-block;" class="form-group">
                            <label for="sel1"></label>
                            <form id="top_form" action="" method="get">
                                <select name="table_name" class="form-control" id="top_select" >
                                    <option value="all"  <?php if($table_name == 'all') {  ?> selected <?php } ?>>All Product type</option>
                                    <option value="electronics"  <?php if($table_name == 'electronics') {  ?> selected <?php } ?>>Electronics</option>
                                    <option value="appliances"  <?php if($table_name == 'appliances') {  ?> selected <?php } ?>>Appliances</option>
                                    <option value="clothes"  <?php if($table_name == 'clothes') { ?> selected <?php } ?>>Clothes</option>
                                    <option value="office_supplies"  <?php if($table_name == 'office_supplies') { ?> selected <?php } ?>>Office Supplies</option>
                                    <option value="sports_equipments"  <?php if($table_name == 'sports_equipments') { ?> selected <?php } ?>>Sports Equipments</option>
                                </select>

                        </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Sub-category</th>
                                <?php  if($table_name != "all") { ?>
                                    <th>ID</th>
                                <?php } ?>
                                <th>Product Name</th>
                                <th>In Stock</th>
                                <th>Price</th>
                            </tr>
                            </thead>

                            <tbody>




                            <?php


                            if (isset($_SESSION['admin_name'])){

                                //$query = "SELECT * FROM customer C1 WHERE 3 > (SELECT COUNT(*) FROM customer C2 WHERE C2.point > C1.point) ORDER BY C1.point DESC;";
                                //MASFIQ EDITTED
                                // $query = "CALL TOP_CUSTOMERS(4);";
                                if($table_name == "all") {
                                    $query = "SELECT DISTINCT category FROM product";
                                    $select_all_categories = mysqli_query($connect, $query);
                                    $category_count = mysqli_num_rows($select_all_categories);

                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($select_all_categories)) {
                                        $category_name[$i] = strtolower(str_replace(" ", "_", $row['category']));

                                        //counting total prod, total sold
                                        $query = "SELECT id, sub_category, name, price, units_in_stock FROM product WHERE category =  '{$category_name[$i]}' ;";
                                        $result = mysqli_query($connect, $query);
                                        while ($row_2 = mysqli_fetch_assoc($result)) {
                                            $prod_id = $row_2['id'];
                                            $price = $row_2['price'];
                                            echo "<tr>";
                                            echo "<td>{$category_name[$i]}</td>";
                                            echo "<td>{$row_2['sub_category']}</td>";
                                            echo "<td>{$row_2['name']}</td>";
                                            echo "<td>{$row_2['units_in_stock']}</td>";
//                                            echo "<td>{$row_2['price']}</td>";
                                            echo "<td><a href='reduce_single_price.php?table={$category_name[$i]}&reduce_id={$prod_id}'>$price</a></td>";
                                            echo "</tr>";
                                        }

                                        $i++;
                                    }
                                }else{
                                    $query = "SELECT id, sub_category, name, price, units_in_stock FROM product WHERE category = '{$table_name}';";
                                    $result = mysqli_query($connect, $query);
                                    while ($row_2 = mysqli_fetch_assoc($result)) {
                                        $prod_id = $row_2['id'];
                                        $price = $row_2['price'];
                                        echo "<tr>";
                                        echo "<td>{$table_name}</td>";
                                        echo "<td>{$row_2['sub_category']}</td>";
                                        echo "<td>{$row_2['id']}</td>";
                                        echo "<td>{$row_2['name']}</td>";
                                        echo "<td>{$row_2['units_in_stock']}</td>";
                                        echo "<td><a href='reduce_single_price.php?table={$table_name}&reduce_id={$prod_id}'>$price</a></td>";
                                        echo "</tr>";
                                    }
                                }
                            }

                            ?>

                            </tbody>
                        </table>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>


