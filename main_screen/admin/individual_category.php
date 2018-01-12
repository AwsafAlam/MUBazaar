<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>
<?php $top_no = 1 ?>
<?php $table_name = 'electronics' ;
$chooser = 1;?>

    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">

<script>




    jQuery(document).ready(function () {
        jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

            window.location.replace("individual_category.php?table_name=" +  jQuery('#top_select').val() +  "&top_no=" + jQuery('#top_select2').val()+  "&chooser=" + jQuery('#top_select3').val() );

        });
    });


    jQuery(document).ready(function () {
        jQuery('#top_select2').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

            window.location.replace("individual_category.php?table_name=" +  jQuery('#top_select').val() +  "&top_no=" + jQuery('#top_select2').val() + "&chooser=" +  jQuery('#top_select3').val());

        });
    });


    jQuery(document).ready(function () {
        jQuery('#top_select3').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

            window.location.replace("individual_category.php?table_name=" +  jQuery('#top_select').val() +  "&top_no=" + jQuery('#top_select2').val() + "&chooser=" +  jQuery('#top_select3').val());

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


                    if(isset($_GET['top_no'])){
                        $top_no = $_GET['top_no'];
                    }


                    if(isset($_GET['chooser'])){
                        $chooser = $_GET['chooser'];
                    }



                    ?>

                    <h1 style="display: inline-block; margin-right: 10px"> Top sold products of </h1>


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

                    <h1 style="display: inline-block;"> sold </h1>


                    <div style="display: inline-block;" class="form-group">
                        <label for="sel1"></label>
                        <form id="top_form2" action="" method="get">
                            <select name="chooser" class="form-control" id="top_select3" >
                                <option value="1" <?php if($chooser == 1) {  ?> selected <?php } ?>>greater</option>
                                <option value="2" <?php if($chooser== 2) {  ?> selected <?php } ?>>lesser</option>
                            </select>

                    </div>


                    <h1 style="display: inline-block;"> than</h1>

                    <div style="display: inline-block;" class="form-group">
                        <label for="sel1"></label>
                        <form id="top_form2" action="" method="get">
                            <select name="top_no" class="form-control" id="top_select2" >
                                <option <?php if($top_no == 1) {  ?> selected <?php } ?>>1</option>
                                <option <?php if($top_no == 2) {  ?> selected <?php } ?>>2</option>
                                <option <?php if($top_no == 3) { ?> selected <?php } ?>>3</option>
                                <option <?php if($top_no == 4) { ?> selected <?php } ?>>4</option>
                                <option <?php if($top_no == 5) { ?> selected <?php } ?>>5</option>
                                <option <?php if($top_no == 6) { ?> selected <?php } ?>>6</option>
                                <option <?php if($top_no == 7) { ?> selected <?php } ?>>7</option>
                                <option <?php if($top_no == 8) { ?> selected <?php } ?>>8</option>
                                <option <?php if($top_no == 9) { ?> selected <?php } ?>>9</option>
                                <option <?php if($top_no == 10) { ?> selected <?php } ?>>10</option>
                                <option <?php if($top_no == 11) { ?> selected <?php } ?>>11</option>
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

//                            $query = "SELECT name, item_sold FROM `{$table_name}` ORDER BY item_sold DESC;";
                            if($chooser == 1){
                                $query = "CALL PRODUCT_SOLD_LIST_FROM_CATEGORY({$top_no} ,'{$table_name}', 'greater')";
                            }else{
                                $query = "CALL PRODUCT_SOLD_LIST_FROM_CATEGORY({$top_no} ,'{$table_name}', 'lesser')";
                            }


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