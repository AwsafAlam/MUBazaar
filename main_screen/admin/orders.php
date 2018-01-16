<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>

<?php

if(isset($_POST['shipping_status'])) {
    $status = $_POST['shipping_status'];
}
if(empty($status))
{
    //echo("You didn't select any buildings.");
}
else
{
    $N = count($status);

    //echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
        //echo($status[$i] . " ");
        $query = "UPDATE customer_order SET shipping_status='shipped', shipped_date=sysdate() WHERE order_id = {$status[$i]}";
        mysqli_query($connect, $query);
    }
}

?>
    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">

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

                    <h1>All Customers</h1>

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
                            </tr>
                            </thead>

                            <tbody>


                            <?php

                            if (isset($_SESSION['admin_name'])){

                                $query = "SELECT * FROM customer_order";
                                $select_customer = mysqli_query($connect, $query);

                                while ($row = mysqli_fetch_assoc($select_customer)) {
                                    $customer_id = $row['customer_id'];
                                    $order_id = $row['order_id'];
                                    $_shipping_address = $row['shipping_address'];
                                    $_total_cost = $row['total_cost'];
                                    $_order_date = $row['order_date'];
                                    $_shipping_status = $row['shipping_status'];


                                    echo "<tr>";
                                    echo "<td>{$customer_id}</td>";
                                    echo "<td>{$order_id}</td>";
                                    echo "<td>{$_shipping_address}</td>";


                                    echo "<td>{$_total_cost}</td>";
                                    echo "<td>{$_order_date}</td>";

                                    if ($_shipping_status == 'shipped') {
                                        echo "<td align='center'><a class='material-icons' style='color:green;' title='verified'>verified_user</a></td>";
                                    } else{
//        echo "<td align='center'><i style=\"color:red\" class=\"material-icons\">block</i></td>";
                                        echo "<td  align='center'><input type='checkbox' name='shipping_status[]' value='{$order_id}'></td>";
                                    }

                                    echo "</tr>";

                                }

                            }

                            ?>

                            </tbody>
                        </table>
                        <input type="submit" name="form_submit" value="Submit">
                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>