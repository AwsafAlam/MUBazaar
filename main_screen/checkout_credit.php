<?php
include "db.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();

$card_name = "Select Card Type";

$customer_id = $_SESSION['customer_id'];

$total_cost = $_SESSION['total_cost'];

if(isset($_POST['shipping_address'])){
    $ship_address = $_POST['shipping_address'];

    $_SESSION['ship_address'] = $ship_address;
}


$credit_card_no = "Enter Card No";
$credit_card_balance = 0;
$credit_cvv = "";
$credit_password = "";
$checkout_message = "";
$card_type = "";
$checkout_flag = false;

$has_card = true;

if(isset($_POST['checkout_btn'])){
    $checkout_amount = $_POST['checkout_amount'];
    $checkout_password = $_POST['checkout_password'];
    $checkout_cvv = $_POST['checkout_cvv'];
    $checkout_query = "UPDATE credit_card set Credit_Balance = Credit_Balance + {$checkout_amount} ";
    $checkout_query .= "WHERE ID ={$_SESSION['customer_id']} ";
    $checkout_query .= "AND Password ='{$_POST['checkout_password']}' ";
    $checkout_query .= "AND Card_Type ='{$card_type}' ";
    $checkout_query .= "AND CVV ='{$_POST['checkout_cvv']}' ;";
    echo $checkout_query;
//    mysqli_query($connect,$checkout_query);
    $_POST['checkouted'] = 1;
//    header("Location: show_credit.php");
}


if(isset($_GET['card_type'])){
    $card_type = $_GET['card_type'];

    if($card_type === 'visa'){
        $card_name = 'Visa Card';
    }
    else if($card_type === 'master'){
        $card_name = 'Master Card';
    }
    else if($card_type === 'american_express'){
        $card_name = 'American Express';
    }

    $query = "SELECT Credit_No, Credit_Balance, CVV, Password FROM credit_card WHERE ID = {$customer_id} AND Card_Type = '{$card_type}';";
    $rslt = mysqli_query($connect,$query);
//    $row = mysqli_fetch_assoc($rslt);
//    $credit_card_no = $row['Credit_No'];
//    $credit_card_balance = $row['Credit_Balance'];
//    $credit_cvv = $row['CVV'];
//    $credit_password = $row['Password'];

    if(mysqli_num_rows($rslt) == 0){
        $checkout_message = "No Credit Card Info Found For This Card Type";
        $has_card = false;
    }


}

?>


<?php
if(isset($_GET['card_no'])){


    $credit_card_no = $_GET['card_no'];
    $_POST['card_no'] = $credit_card_no;
    $_POST['card_type'] = $card_type;




    $query = "SELECT Credit_No, Credit_Balance, CVV, Password FROM credit_card WHERE ID = {$customer_id} AND Card_Type = '{$card_type}' AND Credit_No = '{$credit_card_no}';";
    $rslt = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($rslt);
    $credit_card_no = $row['Credit_No'];

    $_POST['card_no'] = $credit_card_no;

    $credit_card_balance = $row['Credit_Balance'];
    $credit_cvv = $row['CVV'];
    $credit_password = $row['Password'];



    if(mysqli_num_rows($rslt) == 0){
        $checkout_message = 'Card Input Error';
    }
    else if($credit_card_balance < $total_cost){
        $checkout_message = "Insufficient Balance";
    }else{
        $checkout_flag = true;
    }
}
?>



<?php

    if(isset($_POST['checkout_final_btn'])){
//        $checkout_password = $_POST['checkout_password'];
//        $checkout_cvv = $_POST['checkout_cvv'];
        $credit_card_no =  $_POST['card_number'];
        $password = $_POST['card_password'];
        $CVV =  $_POST['card_CVV'];



        $query = "SELECT * FROM credit_card WHERE ID = {$customer_id} AND Card_Type = '{$card_type}' AND Credit_No = '{$credit_card_no}' ";
        $query .= "AND Password = '{$password}' AND CVV = '{$CVV}';";
        echo $query;
        $rslt = mysqli_query($connect,$query);

        if(mysqli_num_rows($rslt) != 0){
            $shipping_address = $_SESSION['ship_address'];
            echo $query = "INSERT INTO customer_order (customer_id, shipping_address, total_cost) VALUES({$customer_id}, '{$shipping_address}', {$total_cost});";
            $rslt = mysqli_query($connect, $query);
            $order_id = $connect->insert_id;

            $cart_query = "SELECT * FROM shopping_cart WHERE customer_id = {$customer_id};";

            $cart_rslt = mysqli_query($connect, $cart_query);

            while($query_rows = mysqli_fetch_assoc($cart_rslt)) {

                $product_category = $query_rows['prod_category'];

                $product_id = $query_rows['prod_id'];

                $product_quantity = $query_rows['prod_quantity'];


                $delete_prod_query = "UPDATE `{$product_category}` SET units_in_stock = units_in_stock  - {$product_quantity} ";
                $delete_prod_query .= "WHERE id = {$product_id}";
                mysqli_query($connect, $delete_prod_query);

                $sell_update_query = "UPDATE `{$product_category}` SET item_sold = item_sold + {$product_quantity} ";
                $sell_update_query .= "WHERE id = {$product_id}";;
                mysqli_query($connect, $sell_update_query);


                $prod_query = "INSERT INTO customer_ordered_products (order_id, product_category, product_id, product_quantity) ";
                $prod_query .= "VALUES( {$order_id}, '{$product_category}', '{$product_id}', '{$product_quantity}');";
                echo $prod_query;


                unset($_SESSION['total_cost']);



                mysqli_query($connect, $prod_query);
            }

        }

        $reduce_balance_query = "UPDATE credit_card SET Credit_Balance = (Credit_Balance  - $total_cost) WHERE ID = {$customer_id} AND Card_Type = '{$card_type}' AND Credit_No = '{$credit_card_no}' ";
        mysqli_query($connect, $reduce_balance_query);

        $delete_query = "DELETE FROM shopping_cart WHERE customer_id = {$customer_id};";
        mysqli_query($connect, $delete_query);

        $point_query = "UPDATE customer SET point = point + $total_cost * 0.1 WHERE ID = {$customer_id};";
        mysqli_query($connect, $point_query);

        header("Location: buying_history.php#content_zoom");


    }


?>


<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Checkout Form</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        

        <link rel="stylesheet" href="css/credit_style.css">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




        <style type="text/css">
            .nopadding {
                padding: 0 !important;
                margin: 0 !important;
                padding-left: 0 !important;
            }
        </style>
    </head>

    <body>
       
        <div class="container">
            <div class="row">
                <!-- You can make it whatever width you want. I'm making it full width
on <= small devices and 4/12 page width on >= medium devices -->
                <div class="col-xs-12 col-md-4">


                    <!-- CREDIT CARD FORM STARTS HERE -->
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table" >
                            <div class="row display-tr" >
                                <h3 class="panel-title display-td" >Credit Card Details</h3>
                                <div class="display-td" >                            
                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                </div>
                            </div>                    
                        </div>
                        <div class="panel-body">
                            <form action="checkout_credit.php?card_type=<?php echo $card_type ?>" role="form" id="checkout-form" method="post">
                                <div class="row">
                                    <div class="col-xs-12">


                                        <div class="form-group">
                                            <label for="cardNumber">CARD TYPE</label>

<!--                                             Example split danger button-->
<!--                                             Split button-->
                                            <div class="btn-group btn-block">
                                                <button  type="button" class="btn btn-info"><?php echo $card_name; ?></button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="checkout_credit.php?card_type=visa">Visa</a></li>
                                                    <li><a href="checkout_credit.php?card_type=master">Master Card</a></li>
                                                    <li><a href="checkout_credit.php?card_type=american_express">American Express Card</a></li>
                                                </ul>
                                            </div>

                                        </div>

                                        <?php
                                        if(isset($_GET['card_type']) && $has_card == true){

                                        ?>

                                        <div class="form-group">
                                            <label for="cardNumber">Card Number</label>


                                            <div class="btn-group btn-block">
                                                <button  type="button" class="btn btn-info">Choose a card</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>


                                                <ul class="dropdown-menu">
                                                    <?php

                                                    $query = "SELECT Credit_No FROM credit_card WHERE ID = {$_SESSION['customer_id']} AND Card_Type = '{$card_type}';";
                                                    $rslt = mysqli_query($connect, $query);
                                                    if(!$rslt){
                                                        mysqli_error($connect);
                                                    }

                                                    if(mysqli_num_rows($rslt) != 0) {

                                                        while ($row = mysqli_fetch_assoc($rslt)) { ?>

                                                            <li>
                                                                <a href="?card_type=<?php echo $card_type ?>&card_no=<?php echo $row['Credit_No']; ?>"><?php echo $row['Credit_No']; ?></a>
                                                            </li>

                                                        <?php }
                                                    }else{
                                                        $checkout_message = 'Please Enter your Credit Card Information First';

                                                        ?>

                                                        <li>
                                                            <a target="_blank" href="add_card.php">Enter a credit card info</a>
                                                        </li>

                                                    <?php }?>



                                                </ul>


                                            </div>

                                        </div>


                                            <div class="form-group">
                                                <label for="cardNumber">Card Number</label>
                                                <div class="input-group">
                                                    <input
                                                            readonly
                                                            value = "<?php echo $credit_card_no;?>"
                                                            type="text"
                                                            class="form-control"
                                                            name="card_number"
                                                            placeholder="Valid Card Number"
                                                            required
                                                    />
                                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                </div>
                                            </div>

                                            <?php

                                        }
                                        ?>




                                        <div class="form-group">
                                            <label for="Balance">Credit Card Balance</label>
                                            <div class="input-group">
                                                <input 
                                                       readonly
                                                       value = "<?php echo $credit_card_balance;?>"
                                                       type="number"
                                                       class="form-control"
                                                       name="card_balance"
                                                       placeholder="Valid Card Number"
                                                       required  
                                                       />
                                                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="Balance">Transaction Password</label>
                                            <div class="input-group">
                                                <input
                                                        type="password"
                                                        class="form-control"
                                                        name="card_password"
                                                        placeholder="Your Password"
                                                        required
                                                />
                                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="Balance">CVV</label>
                                            <div class="input-group">
                                                <input
                                                        type="number"
                                                        class="form-control"
                                                        name="card_CVV"
                                                        placeholder="CVV Number"
                                                        required
                                                />
                                                <span class="input-group-addon"><i class="	fa fa-copyright"></i></span>
                                            </div>
                                        </div>






                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button  name="checkout_final_btn" <?php if (empty($credit_card_no) || (!isset($_GET['card_type'])) || !$checkout_flag){ ?> disabled <?php   } ?> class="btn btn-success btn-lg btn-block" type="submit">Confirm Checkout</button>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p class="payment-errors"><?php
                                            if(isset($_POST['checkouted'])) echo $checkout_message.". Your Balance Now: $credit_card_balance";
                                            echo $checkout_message;
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-12">
                                        <p><a target="_blank" href="add_card.php">Click here to update your card info</a> </p>
                                    </div>


                                </div>

                            </form>
                        </div>
                    </div>            
                    <!-- CREDIT CARD FORM ENDS HERE -->


                </div>            



            </div>
        </div>




        <!-- If you're using Stripe for payments -->
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    </body>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js'></script>

    <script  src="js/credit_index.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    </body>
</html>
