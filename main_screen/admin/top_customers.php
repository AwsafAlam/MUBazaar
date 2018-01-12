<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>

<?php $top_no = 3 ?>
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

                    if(isset($_GET['top_no'])){
                        $top_no = $_GET['top_no'];
                    }



                    ?>

                    <h1 style="display: inline-block"> Top </h1>


                    <div style="display: inline-block;" class="form-group">
                        <label for="sel1"></label>
                        <form id="top_form" action="" method="get">
                        <select name="top_no" class="form-control" id="top_select" >
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

                    <h1 style="display: inline-block">     ranks of customers of <span style="color: red; font-weight: bold">MU</span><span style="font-weight: bold">Bazaar</span></h1>


<!--                    <button  style="margin-left: 5px;" form="top_form" name="top_btn" type="submit" class="btn btn-info">Query</button>-->



                    </form>









                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Point</th>
                        </tr>
                        </thead>

                        <tbody>


                        <?php

                        if (isset($_SESSION['admin_name'])){

//                            $query = "SELECT * FROM customer C1 WHERE {$top_no} > (SELECT COUNT(*) FROM customer C2 WHERE C2.point > C1.point) ORDER BY C1.point DESC;";
                            $query = "CALL TOP_CUSTOMERS({$top_no})";

                            $select_customer = mysqli_query($connect, $query);

                            while ($row = mysqli_fetch_assoc($select_customer)) {
                                $customer_id = $row['ID'];
                                $customer_name = $row['Customer_Name'];
                                $customer_mobile = $row['Mobile'];
                                $customer_address = $row['Address'];
                                $customer_email = $row['Email'];
                                $customer_point = $row['point'];

                                echo "<tr>";
                                echo "<td>{$customer_id}</td>";
                                echo "<td>{$customer_name}</td>";
                                echo "<td>{$customer_mobile}</td>";


                                echo "<td>{$customer_address}</td>";
                                echo "<td>{$customer_email}</td>";
                                echo "<td>{$customer_point}</td>";


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