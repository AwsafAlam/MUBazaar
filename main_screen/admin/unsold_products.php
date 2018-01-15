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
<?php $table_name = 'all' ;
if(isset($_GET['table_name'])){
    $table_name = $_GET['table_name'];
}
?>

<?php

if(isset($_POST['discounts']) && isset($_POST['discount_pctg'])) {
    $discount = $_POST['discounts'];
    $discount_pctg = $_POST['discount_pctg'];
}
if(empty($discount))
{
    //echo("You didn't select any buildings.");
}
else
{
    $N = count($discount);
    $query2 = "";
    //echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
        //echo($status[$i] . " ");
        $query2 = "UPDATE product SET price= ROUND(price-price*{$discount_pctg}/100, 2) WHERE id = {$discount[$i]} AND category = '{$table_name}'";
        mysqli_query($connect, $query2);
    }
}
?>

<link rel="stylesheet" type="text/css" href="includes/admin_header.php">



<script>




    jQuery(document).ready(function () {
        jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

            window.location.replace("unsold_products.php?table_name=" +  jQuery('#top_select').val());

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


                    <h1 style="display: inline-block; margin-right: 10px">Unsold Products from </h1>
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
                                <?php  if($table_name != "all") { ?>
                                    <th>Discount ?</th>
                                <?php } ?>
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
                                        $query = "SELECT sub_category, name, price, units_in_stock FROM product WHERE category =  '{$category_name[$i]}' AND item_sold=0;";
                                        $result = mysqli_query($connect, $query);
                                        while ($row_2 = mysqli_fetch_assoc($result)) {
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
                                }else{
                                    $query = "SELECT id, sub_category, name, price, units_in_stock FROM product WHERE category = '{$table_name}' AND  item_sold=0;";
                                    $result = mysqli_query($connect, $query);
                                    while ($row_2 = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$table_name}</td>";
                                        echo "<td>{$row_2['sub_category']}</td>";
                                        echo "<td>{$row_2['id']}</td>";
                                        echo "<td>{$row_2['name']}</td>";
                                        echo "<td>{$row_2['units_in_stock']}</td>";
                                        echo "<td>{$row_2['price']}</td>";
                                        echo "<td  align='center'><input type='checkbox' name='discounts[]' value='{$row_2['id']}'></td>";
                                        echo "</tr>";
                                    }
                                }
                            }

                            ?>

                            </tbody>
                        </table>
                        <?php if($table_name != "all") {?>
                            Discount Percentage:<br>
                            <input type="text" name="discount_pctg" value="">
                            <br>
                            <input type="submit" name="form_submit" value="Submit">

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


