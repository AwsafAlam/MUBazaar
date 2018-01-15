<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>

<?php $x_var = 30 ?>
<?php $table_name = 'electronics' ;?>
<?php

?>
    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">

    <script>




        jQuery(document).ready(function () {
            jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

                window.location.replace("view_products_close_to_finish.php?table_name=" + jQuery('#top_select').val()  +"&x_var=" +  jQuery('#top_select2').val());

//           xhttp.open("GET", "top_customers.php?x_var=" +  jQuery('#top_select').val() , true);
//           xhttp.send();

            });
        });


        jQuery(document).ready(function () {
            jQuery('#top_select2').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

                window.location.replace("view_products_close_to_finish.php?table_name=" + jQuery('#top_select').val()  +"&x_var=" +  jQuery('#top_select2').val());

//           xhttp.open("GET", "top_customers.php?x_var=" +  jQuery('#top_select').val() , true);
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

                        if(isset($_GET['table_name'])){
                            $table_name = $_GET['table_name'];
                        }


                        if(isset($_GET['x_var'])){
                            $x_var = $_GET['x_var'];
                        }



                        ?>

                        <h1 style="display: inline-block"> Products from  </h1>


                        <div style="display: inline-block;" class="form-group">
                            <label for="sel1"></label>
                            <form id="top_form" action="" method="get">
                                <select name="table_name" class="form-control" id="top_select" >
                                    <option value="electronics"  <?php if($table_name == 'electronics') {  ?> selected <?php } ?>>Electronics</option>
                                    <option value="appliances"  <?php if($table_name == 'appliances') {  ?> selected <?php } ?>>Appliances</option>
                                    <option value="clothes"  <?php if($table_name == 'clothes') { ?> selected <?php } ?>>Clothes</option>
                                    <option value="office_supplies"  <?php if($table_name == 'office_supplies') { ?> selected <?php } ?>>Office Supplies</option>
                                    <option value="sports_equipments"  <?php if($table_name == 'sports_equipments') { ?> selected <?php } ?>>Sports Equipments</option>
                                </select>

                        </div>


                        <h1 style="display: inline-block"> in stock less than  </h1>

                        <div style="display: inline-block;" class="form-group">
                            <label for="sel1"></label>
                            <form id="top_form" action="" method="get">
                                <select name="x_var" class="form-control" id="top_select2" >
                                    <option <?php if($x_var == 5) {  ?> selected <?php } ?>>5</option>
                                    <option <?php if($x_var == 10) {  ?> selected <?php } ?>>10</option>
                                    <option <?php if($x_var == 20) {  ?> selected <?php } ?>>20</option>
                                    <option <?php if($x_var == 30) {  ?> selected <?php } ?>>30</option>
                                    <option <?php if($x_var == 40) {  ?> selected <?php } ?>>40</option>
                                    <option <?php if($x_var == 50) { ?> selected <?php } ?>>50</option>
                                    <option <?php if($x_var == 60) { ?> selected <?php } ?>>60</option>
                                    <option <?php if($x_var == 70) { ?> selected <?php } ?>>70</option>
                                    <option <?php if($x_var == 80) { ?> selected <?php } ?>>80</option>
                                    <option <?php if($x_var == 90) { ?> selected <?php } ?>>90</option>
                                    <option <?php if($x_var == 100) { ?> selected <?php } ?>>100</option>
                                    <option <?php if($x_var == 200) { ?> selected <?php } ?>>200</option>
                                    <option <?php if($x_var == 300) { ?> selected <?php } ?>>300</option>
                                    <option <?php if($x_var == 400) { ?> selected <?php } ?>>400</option>
                                </select>

                        </div>

                        <h1 style="display: inline-block">       of <span style="color: red; font-weight: bold">MU</span><span style="font-weight: bold">Bazaar</span></h1>


                        <!--                    <button  style="margin-left: 5px;" form="top_form" name="top_btn" type="submit" class="btn btn-info">Query</button>-->



                        </form>









                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Sub-category</th>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>In Stock</th>
                                <th>Price</th>
                            </tr>
                            </thead>

                            <tbody>


                            <?php

                            if (isset($_SESSION['admin_name'])){

//                                $query = "SELECT id, product_table_name from product_less_amount ;";

//                                $select_products = mysqli_query($connect, $query);

//                                while ($row = mysqli_fetch_assoc($select_products)) {
//                                    $id = $row['id'];
//                                    $product_table_name = $row['product_table_name'];
//
                                    $query = "SELECT sub_category, id, name, price, units_in_stock FROM product  WHERE category = '{$table_name}' AND  units_in_stock < $x_var ORDER BY units_in_stock ASC;";
                                    $result = mysqli_query($connect, $query);

                                    while($row_2 = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$row_2['sub_category']}</td>";
                                        echo "<td>{$row_2['id']}</td>";
                                        echo "<td>{$row_2['name']}</td>";
                                        echo "<td>{$row_2['units_in_stock']}</td>";
                                        echo "<td>{$row_2['price']}</td>";
                                        echo "</tr>";
                                    }

                                    // echo "</tr>";

//                                }

                            }

                            ?>

                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>