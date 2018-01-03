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
$card_message = "";
$card_type = "-1";


if(isset($_POST['card_btn'])){

    if(isset($_GET['card_type']) && $_GET['card_type'] != "-1"){
        $card_type = $_GET['card_type'];
        $credit_card_no = $_POST['card_number'];
        $credit_card_balance = $_POST['card_balance'];
        $credit_password = $_POST['card_password'];
        $credit_cvv = $_POST['card_CVV'];
        $card_query = "INSERT INTO credit_card (ID, Password, Card_Type, CVV, Credit_No, Credit_Balance) ";
        $card_query .= "VALUES({$customer_id}, '{$credit_password}', '{$card_type}', '{$credit_cvv}', '{$credit_card_no}', {$credit_card_balance}) ";
//        echo $card_query;
        mysqli_query($connect,$card_query);

        $card_message = 'New Credit Card added successfully';

//        header("Location: show_credit.php");

    }
    else{
        $card_message = "Select Card Type First";

    }


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
}

?>


<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Add Card</title>

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
                            <form action="add_card.php?card_type=<?php echo $card_type?>" method="post">
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
                                                    <li><a href="add_card.php?card_type=visa">Visa</a></li>
                                                    <li><a href="add_card.php?card_type=master">Master Card</a></li>
                                                    <li><a href="add_card.php?card_type=american_express">American Express Card</a></li>
                                                </ul>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label for="cardNumber">Card Number</label>
                                            <div class="input-group">
                                                <input
                                                       type="text"
                                                       class="form-control"
                                                       name="card_number"
                                                       placeholder="Valid Card Number"
                                                       required  
                                                       />
                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                            </div>
                                        </div>  

                                        <div class="form-group">
                                            <label for="Balance">Credit Card Balance</label>
                                            <div class="input-group">
                                                <input
                                                       type="number"
                                                       class="form-control"
                                                       name="card_balance"
                                                       placeholder="0"
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
                                        <button  name="card_btn"  class="btn btn-success btn-lg btn-block" type="submit">Add This Card</button>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p class="payment-errors"><?php
//                                            if(isset($_POST['carded'])) echo $card_message.". Your Balance Now: $credit_card_balance";
                                            echo $card_message;
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-12">
                                        <p><a href="index.php">Get me back to the site!</a> </p>
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
