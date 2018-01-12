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

<?php $customer_type = 'all' ?>

<?php

if(isset($_GET['customer_type'])){
    $customer_type = $_GET['customer_type'];
}
?>

    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">


    <script>




        jQuery(document).ready(function () {
            jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

                window.location.replace("view_customers.php?customer_type=" +  jQuery('#top_select').val());

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


                    <div style="display: inline-block;" class="form-group">
                        <label for="sel1"></label>
                        <form id="top_form" action="" method="get">
                            <select name="table_name" class="form-control" id="top_select" >
                                <option value="all"  <?php if($customer_type == 'all') {  ?> selected <?php } ?>>All </option>
                                <option value="blocked"  <?php if($customer_type == 'blocked') {  ?> selected <?php } ?>>Blocked</option>
                                <option value="verified"  <?php if($customer_type == 'verified') {  ?> selected <?php } ?>>Verfiied</option>
                                <option value="unverified"  <?php if($customer_type == 'unverified') { ?> selected <?php } ?>>Unverified</option>
                            </select>

                    </div>


                    <h1 style="display: inline-block;"> Customers</h1>


                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>

                        <tbody>


                        <?php

                        if (isset($_SESSION['admin_name'])){

                            if($customer_type == "all"){
                                $query = "SELECT * FROM customer";
                            }
                            else if($customer_type == "blocked")
                                $query = "SELECT * FROM customer WHERE Status = 'blocked'";
                            else if($customer_type == "verified")
                                $query = "SELECT * FROM customer WHERE Status = 'verified'";
                            else
                                $query = "SELECT * FROM customer WHERE Status = 'unverified'";



                            $select_customer = mysqli_query($connect, $query);

                            while ($row = mysqli_fetch_assoc($select_customer)) {
                                $customer_id = $row['ID'];
                                $customer_name = $row['Customer_Name'];
                                $customer_mobile = $row['Mobile'];
                                $customer_address = $row['Address'];
                                $customer_email = $row['Email'];
                                $customer_status = $row['Status'];


                                echo "<tr>";
                                echo "<td>{$customer_id}</td>";
                                echo "<td>{$customer_name}</td>";
                                echo "<td>{$customer_mobile}</td>";


                                echo "<td>{$customer_address}</td>";
                                echo "<td>{$customer_email}</td>";
                                if ($customer_status == 'verified') {
                                    echo "<td align='center'><a class='material-icons' style='color:green;' title='verified'>verified_user</a></td>";
                                } else if ($customer_status == 'blocked') {
//        echo "<td align='center'><i style=\"color:red\" class=\"material-icons\">block</i></td>";
                                    echo "<td  align='center'><a style='color:red;font-size:24px;' class=\"fa fa-times-circle\" title='blocked'></a></td>";
                                } else {
                                    echo "<td align='center'><a class='material-icons' style='color:orange;' title='unverified'>warning</a></td>";
                                }


                                if ($customer_status == 'verified') {
                                    echo "<td style='text-align: center;'><a  style='margin-right:7px;color:red;font-size:24px;' class=\"fa fa-times-circle\" href='view_customers.php?block={$customer_id}&email={$customer_email}' title='block'></a><a style='font-size:24px' class='fa fa-trash' href='view_customers.php?delete={$customer_id}&email={$customer_email}' title='delete'></a></td>";
                                } else if ($customer_status == 'blocked') {
                                    echo "<td style='text-align: center;'><a style='margin-right:7px;font-size:24px;color:green;' class=\"fa fa-check\" href='view_customers.php?unblock={$customer_id}&email={$customer_email}' title='unblock'></a><a style='font-size:24px' class='fa fa-trash' href='view_customers.php?delete={$customer_id}&email={$customer_email}' title='delete'></a></td>";
                                } else {
                                    echo "<td style='text-align: center;'><a style='font-size:24px' class='fa fa-trash' href='view_customers.php?delete={$customer_id}&email={$customer_email}' title='delete'></a></td>";
                                }


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