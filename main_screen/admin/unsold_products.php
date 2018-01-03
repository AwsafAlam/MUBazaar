<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>

<?php

if (isset($_SESSION['admin_name']) && isset($_GET['delete']) && isset($_GET['email'])) {
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM customer WHERE ID = {$the_user_id}";
    $delete_user_query = mysqli_query($connect, $query);

    $message_body = "Your account has been deleted by admin. For more info please contact with us! We are always there to here from you. ";
    $message_email = $_GET['email'];
    $mailSender = new MailSender($message_email, "MUBazaar :: your can't use your account anymore!!!", "Account Deleted", $message_body);

    $mailSender->requestMailSend();

    header("Location: view_customers.php");

}

if (isset($_SESSION['admin_name']) && isset($_GET['unblock']) && isset($_GET['email'])) {
    $the_user_id = $_GET['unblock'];
    $query = "UPDATE customer SET Status = 'verified' WHERE ID = {$the_user_id}";
    $unblock_user_query = mysqli_query($connect, $query);


    $message_body = "Congratulations, your account has been unblocked by admin. Now you are able to enjoy smooth shopping experience at MUBazaar again!!! ";
    $message_email = $_GET['email'];
    $mailSender = new MailSender($message_email, "MUBazaar :: your account is enabled!!!", "Account Unblocked!!!!", $message_body);

    $mailSender->requestMailSend();


    header("Location: view_customers.php");

}


if (isset($_SESSION['admin_name']) && isset($_GET['block']) && isset($_GET['email'])) {
    $the_user_id = $_GET['block'];
    $query = "UPDATE customer SET Status = 'blocked' WHERE ID = {$the_user_id}";
    $block_user_query = mysqli_query($connect, $query);

    $message_body = "Your account has been blocked by admin. For more info please contact with us! We are always there to here from you. ";
    $message_email = $_GET['email'];
    $mailSender = new MailSender($message_email, "MUBazaar :: your account is blocked!!!", "Account Blocked", $message_body);

    $mailSender->requestMailSend();


    header("Location: view_customers.php");

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

                    <h1>Unsold Products of MUBazaar</h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Sub-category</th>
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
                            $query = "SELECT * FROM category";
                            $select_all_categories= mysqli_query($connect, $query);
                            $category_count = mysqli_num_rows($select_all_categories);

                            $i = 0;
                            while($row = mysqli_fetch_assoc($select_all_categories)) {
                                $category_name[$i] = strtolower(str_replace(" ","_",$row['Category_Name']));

                                //counting total prod, total sold
                                $query = "SELECT sub_category, name, price, units_in_stock FROM `{$category_name[$i]}` WHERE item_sold=0;";
                                $result = mysqli_query($connect, $query);
                                while($row_2 = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$category_name[$i]}</td>";
                                    echo "<td>{$row_2['sub_category']}</td>";
                                    echo "<td>{$row_2['name']}</td>";
                                    echo "<td>{$row_2['units_in_stock']}</td>";
                                    echo "<td>{$row_2['price']}</td>";
                                    echo "</tr>";
                                }

                                $i++;
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