<?php
include "db.php";
session_start();
ob_start();

$card_name = "Select Card Type";

$customer_id = $_SESSION['customer_id'];

$credit_card_no = "";
$credit_card_balance = 0;
$credit_cvv = "";
$credit_password = "";
$deposit_message = "";
$card_type = "";
$has_card = true;



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
        $deposit_message = "No Credit Card Info Found For This Card Type";
        $has_card = false;
    }


}


if(isset($_GET['card_no'])){


    $credit_card_no = $_GET['card_no'];





    $query = "SELECT Credit_No, Credit_Balance, CVV, Password FROM credit_card WHERE ID = {$customer_id} AND Card_Type = '{$card_type}' AND Credit_No = '{$credit_card_no}';";
    $rslt = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($rslt);
    $credit_card_no = $row['Credit_No'];

    $_POST['card_no'] = $credit_card_no;

    $credit_card_balance = $row['Credit_Balance'];
    $credit_cvv = $row['CVV'];
    $credit_password = $row['Password'];



    if(mysqli_num_rows($rslt) == 0){
        $deposit_message = 'Card Input Error';
    }
}


if(isset($_POST['deposit_btn'])){



    $deposit_amount = $_POST['card_deposit'];
    $credit_card_no =  $_POST['card_number'];
    $password = $_POST['card_password'];
    $CVV =  $_POST['card_CVV'];



    $query = "UPDATE credit_card  set Credit_Balance = Credit_Balance + {$deposit_amount} WHERE ID = {$customer_id} AND Card_Type = '{$card_type}' AND Credit_No = '{$credit_card_no}' ";
    $query .= "AND Password = '{$password}' AND CVV = '{$CVV}';";
    if(mysqli_num_rows($rslt) == 0){
        $deposit_message = 'Failed to deposit money';
    }else{
        $rslt = mysqli_query($connect,$query);
    }




    $_POST['deposited'] = 1;

    $_POST['card_no'] = $credit_card_no;
    $_POST['card_type'] = $card_type;
//    header("Location: show_credit.php");
}



?>





<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Deposit Form</title>

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
                            <form role="form" action="?card_type=<?php echo $card_type ?>" id="deposit-form" method="post">
                                <div class="row">
                                    <div class="col-xs-12">


                                        <div class="form-group">
                                            <label for="cardNumber">CARD TYPE</label>

                                            <!-- Example split danger button -->
                                            <!-- Split button -->
                                            <div class="btn-group btn-block">
                                                <button  type="button" class="btn btn-info"><?php echo $card_name; ?></button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="show_credit.php?card_type=visa">Visa</a></li>
                                                    <li><a href="show_credit.php?card_type=master">Master Card</a></li>
                                                    <li><a href="show_credit.php?card_type=american_express">American Express Card</a></li>
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


                                        <div class="form-group">
                                            <label for="Balance">Deposit Money</label>
                                            <div class="input-group">
                                               
                                                <input 

                                                       type="number"
                                                       min="1"
                                                       class="form-control"
                                                       name="card_deposit"
                                                       placeholder="Add money to your account"
                                                       required autofocus 
                                                       />
                                                
                                                <span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                                            </div>
                                        </div>




                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button  name="deposit_btn" <?php if (!$has_card){ ?> disabled <?php   } ?> class="btn btn-success btn-lg btn-block" type="submit">Deposit Money</button>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p class="payment-errors"><?php
                                            if(isset($_POST['deposited']))
                                            {
                                                $query = "SELECT Credit_Balance FROM credit_card WHERE ID = {$_SESSION['customer_id']} ";
                                                $query .= "AND Card_Type = '{$_POST['card_type']}' AND Credit_No = '{$_POST['card_no']}';";
                                                $rslt = mysqli_query($connect, $query);
                                                $row = mysqli_fetch_assoc($rslt);

                                                echo $deposit_message."\n Your Balance Now: {$row['Credit_Balance']}";

                                            }else{
                                                echo $deposit_message;
                                            }

                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-12">
                                        <p><a href="add_card.php">Click here to update your card info</a> </p>
                                    </div>


                                    <div class="col-xs-12">
                                        <p><a href="index.php">Back To Home</a> </p>
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
