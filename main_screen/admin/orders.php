<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>

<?php $top_no = "all" ?>

<?php //$delivery_man_no = "all" ?>

<?php

if(isset($_GET['top_no'])){
    $top_no = $_GET['top_no'];
}?>

<?php

if(isset($_POST['shipping_status'])) {
    $status = $_POST['shipping_status'];
    $delivery_man = $_POST['delivery_man_no'];
}
if(empty($status))
{
    //echo("You didn't select any buildings.");
}
if(empty($delivery_man))
{
   // echo("You didn't select any buildings.");
}

else
{
    $N = count($status);

    //echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
        echo($status[$i] . " ");
        echo($delivery_man[$i] . " ");

        $query = "UPDATE customer_order SET shipping_status='shipped', shipped_date=sysdate(),  delivery_man_id={$delivery_man[$i]}  WHERE order_id = {$status[$i]}";
        mysqli_query($connect, $query);
    }
}

?>
    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">


    <script>




        jQuery(document).ready(function () {
            jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

                window.location.replace("orders.php?top_no=" +  jQuery('#top_select').val());

//           xhttp.open("GET", "top_customers.php?top_no=" +  jQuery('#top_select').val() , true);
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

                    <h1 style="display: inline-block">Orders</h1>

                    <div style="display: inline-block;" class="form-group">
                    <form id="top_form" action="" method="get">
                        <select name="top_no" class="form-control" id="top_select" >
                            <option value="all" <?php if($top_no == "all") {  ?> selected <?php } ?>>All orders</option>
                            <option value="shipped" <?php if($top_no == "shipped") {  ?> selected <?php } ?>>Shipped orders</option>
                            <option value="not_shipped" <?php if($top_no == "not_shipped") { ?> selected <?php } ?>>Not shipped orders</option>
                        </select>
                    </form>
                    </div>

                    <form action='orders.php' method='post'>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Order ID</th>
                            <th>Shipping Address</th>
                            <th>Total Cost</th>
                            <th>Order Date</th>
                            <th>Shipping Status</th>
                            <th>Delivery Branch</th>
                            <th>Delivery Man</th>
                        </tr>
                        </thead>

                        <tbody>


                        <?php

                        if (isset($_SESSION['admin_name'])){

                            if($top_no == "all"){
                                $query = "SELECT * FROM customer_order";
                            }else {
                                $query = "SELECT * FROM customer_order WHERE shipping_status = '{$top_no}';";
                            }

                            $select_customer = mysqli_query($connect, $query);

                            while ($row = mysqli_fetch_assoc($select_customer)) {
                                $customer_id = $row['customer_id'];
                                $order_id = $row['order_id'];
                                $_shipping_address = $row['shipping_address'];
                                $_total_cost = $row['total_cost'];
                                $_order_date = $row['order_date'];
                                $_shipping_status = $row['shipping_status'];
                                $branch_id = $row['branch_id'];
                                $delivery_man_id = $row['delivery_man_id'];

                                $query = "SELECT place from shop_branch WHERE id= '{$branch_id}'";
                                $select_branch = mysqli_query($connect, $query);
                                $row = mysqli_fetch_assoc($select_branch);
                                $_delivery_branch = $row['place'];

                                echo "<tr>";
                                echo "<td>{$customer_id}</td>";
                                echo "<td>{$order_id}</td>";
                                echo "<td width='30%''>{$_shipping_address}</td>";


                                echo "<td>{$_total_cost}</td>";
                                echo "<td>{$_order_date}</td>";

                                if ($_shipping_status == 'shipped') {
                                    echo "<td align='center'><a class='material-icons' style='color:green;' title='verified'>verified_user</a></td>";
                                } else{
                                    echo "<td  align='center'><input type='checkbox' name='shipping_status[]' value='{$order_id}'></td>";
                                }

                                echo "<td>{$_delivery_branch}</td>";
                                echo "<td> ";
                                if($_shipping_status == 'not_shipped'){
                                ?>

                                <select name="delivery_man_no[]" class="form-control" id="delivery_man_select" >
                                    <?php

                                    $query2 = "SELECT id, name from employees WHERE branch_id= '{$branch_id}' AND department_id=1;";
                                    $result2 = mysqli_query($connect, $query2);
                                    $delivery_man_count = mysqli_num_rows($result2);

                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        ?>

                                        <option value='<?php echo $row2['id'] ?>' > <?php echo $row2['name'] ?> </option>";
                                        <?php
                                    }
                                    ?>
                                </select>

                                <?php }
                                else{//status = shipped
                                    $query2 = "SELECT name from employees WHERE id = '{$delivery_man_id}' ;";
                                    $result2 = mysqli_query($connect, $query2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $delivery_man_name = $row2['name'];
                                    echo $delivery_man_name;
                                }

                                ?>

                               <?php  echo  "</td>";
                                echo "</tr>";

                            }

                        }

                        ?>

                        </tbody>
                    </table>

                        <?php
                        if($top_no != "shipped"){
                            ?>
                        <input  class="btn btn-primary" type="submit" name="form_submit" value="Submit">

                        <?php } ?>
                        </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>