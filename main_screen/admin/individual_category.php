<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>

<?php $table_name = 'electronics' ?>

    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">

<script>




    jQuery(document).ready(function () {
       jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

           window.location.replace("individual_category.php?table_name=" +  jQuery('#top_select').val());

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

                    if(isset($_GET['table_name'])){
                        $table_name = $_GET['table_name'];
                    }



                    ?>

                    <h1 style="display: inline-block; margin-right: 10px"> Top products of </h1>


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

<!--                    <h1 style="display: inline-block">     ranks of customers of <span style="color: red; font-weight: bold">MU</span><span style="font-weight: bold">Bazaar</span></h1>-->


<!--                    <button  style="margin-left: 5px;" form="top_form" name="top_btn" type="submit" class="btn btn-info">Query</button>-->



                    </form>









                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Item sold</th>
                        </tr>
                        </thead>

                        <tbody>


                        <?php

                        if (isset($_SESSION['admin_name'])){

                            $query = "SELECT name, item_sold FROM `{$table_name}` ORDER BY item_sold DESC;";

                            $select_customer = mysqli_query($connect, $query);

                            while ($row = mysqli_fetch_assoc($select_customer)) {
                                $product_name = $row['name'];
                                $item_sold = $row['item_sold'];

                                echo "<tr>";
                                echo "<td>{$product_name}</td>";
                                echo "<td>{$item_sold}</td>";


                                echo "</tr>";

                            }

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