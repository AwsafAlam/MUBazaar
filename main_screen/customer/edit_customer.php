<?php
include "../db.php";
require ('../mailer.php');


$customer_name = "";
$customer_email = "";
$customer_mobile = "";
$customer_address = "";
$customer_credit = "";
$customer_id = 100;

$customer_balance = 10000;

if(isset($_GET['customer_id']) && !isset($_GET['delete_customer'])){
    session_start();
    global $customer_id;
    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT * FROM customer ";
    $query .= "WHERE ID = {$customer_id};";

    $select_customer_query = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($select_customer_query);

    $customer_name = $row['Customer_Name'];
    $customer_email = $row['Email'];
    $customer_mobile = $row['Mobile'];
    $customer_address = $row['Address'];
//    $customer_credit = $row['Credit_No'];
//    $customer_balance = $row['Credit_Balance'];





}

if(isset($_POST['edit_customer'])){

    ob_start();

    $edit_customer_name = $_POST['edit_customer_name'];
    $edit_customer_password = $_POST['edit_customer_password'];
    $edit_customer_mobile = $_POST['edit_customer_mobile'];
    $edit_customer_address = $_POST['edit_customer_address'];
    $edit_customer_email = $_POST['edit_customer_email'];
    $edit_customer_credit = $_POST['edit_customer_credit'];

    $edit_customer_balance = $customer_balance;

    if($customer_credit !== $edit_customer_credit){
        $edit_customer_balance  =  mt_rand(10000,1000000);
    }

    $query = "UPDATE customer SET ";
    $query .= "Customer_Name = '{$edit_customer_name}', ";
    $query .= "Password = '{$edit_customer_password}', ";
    $query .= "Mobile = '{$edit_customer_mobile}', ";
    $query .= "Address = '{$edit_customer_address}', ";
    $query .= "Email = '{$edit_customer_email}', ";
    $query .= "Credit_No = {$edit_customer_credit}, ";
    $query .= "Credit_Balance = {$edit_customer_balance} ";
    $query .= "WHERE ID = {$customer_id};";

    $customer_update_query = mysqli_query($connect,$query);

    if(!$customer_update_query){
        die("FAILED " . mysqli_error($connect));
    }

    header("Location: ../index.php");


}
else if(isset($_GET['delete_customer'])){
    session_start();
    $delete_query = "DELETE FROM customer WHERE ID = {$_SESSION['customer_id']};";
    $row = mysqli_query($connect,$delete_query);
//    echo $delete_query;
    if(!$row){
        die(mysqli_error($connect));
    }

    $message_body = "Your account has been deleted . Please tell us why did u leave? We are always there to here from you. ";
    $message_email = $_SESSION['customer_email'];
    $mailSender = new MailSender($message_email, "MUBazaar :: your can't use your account anymore!!!", "Account Deleted", $message_body);
    $mailSender->requestMailSend();


    $_SESSION['customer_name'] = null;
    $_SESSION['customer_id'] = null;
    $_SESSION['customer_email'] = null;
    unset($_SESSION['customer_name']);
    unset($_SESSION['customer_id']);
    unset($_SESSION['customer_email']);



    header("Location: ../index.php");
}



?>



<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>



        <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Saira+Semi+Condensed" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/pop_style.css">

        <style type="text/css">
            body {

                font-weight: bold;
                font-family: 'Cinzel Decorative', cursive;
            }

            input {
                font-family: cursive;
            }

            .btn-circle {
                margin: auto;
            }

        </style>



    </head>


    <body background="img/edit_customer_background.jpg" style="position: relative;">



        <div class="cd-popup" role="alert">
            <div class="cd-popup-container">
                <p>Are you sure you want to delete your account?</p>
                <ul class="cd-buttons">
                    <li>
                        <a class="dialog" href="edit_customer.php?customer_id=<?php echo $customer_id; ?>&delete_customer=1">Yes</a>
                    </li>
                    <li>
                        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                        <a class="cd-popup-no dialog" href="#">No</a>
                    </li>
                </ul>
                <a href="#0" class="cd-popup-close img-replace">Close</a>
            </div>
            <!-- cd-popup-container -->
        </div>
        <!-- cd-popup -->
        <div class="container">
                <div class="col-xs-12">
                    <h1 style="color:black;"  class="text-center">Your Account</h1>


                    <form action="" method="post">

                        <div class="form-group">
                            <label style="color:black;font-weight:bold;" for="username">Name</label>
                            <input value="<?php echo $customer_name;?>" type="text" name="edit_customer_name" placeholder="Name" class="form-control" value="" required="">
                        </div>

                        <div class="form-group">
                            <label style="color:black;font-weight:bold;" for="email">Email</label>
                            <input value="<?php echo $customer_email;?>" type="email" name="edit_customer_email" placeholder="E-mail" class="form-control" value="" required="">
                        </div>

                        <div class="form-group">
                            <label style="color:black;font-weight:bold;" for="password">Password</label>
                            <input type="password" name="edit_customer_password" placeholder="Password" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label style="color:black;font-weight:bold;" for="mobile">Mobile</label>
                            <input value="<?php echo $customer_mobile;?>" type="text" name="edit_customer_mobile" placeholder="Mobile" class="form-control" value="" required="">
                        </div>

                        <div class="form-group">
                            <label style="color:black;font-weight:bold;" for="address">Address</label>
                            <input value="<?php echo $customer_address;?>" type="text" name="edit_customer_address" placeholder="Address" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label style="color:black;font-weight:bold;" for="address">Credit Card</label>
                            <input value="<?php echo $customer_credit;?>" type="text" name="edit_customer_credit" placeholder="Credit Card No." class="form-control" required="">
                        </div>

                        <div style="text-align:center;">

                            <input class="btn btn-primary btn-circle btn-block" style="-moz-border-radius: 20px;
                                                                                       -webkit-border-radius: 20px;
                                                                                       border-radius: 20px;" type="submit" name="edit_customer" value="Edit Account">
                        </div>



                    </form>

                    <div style="text-align:center;margin-top:20px;">
                        <input class="btn btn-danger btn-circle btn-block cd-popup-trigger" style="-moz-border-radius: 20px;
                                                                                                   -webkit-border-radius: 20px;
                                                                                                   border-radius: 20px;" type="submit" name="submit" value="Delete Account">
                    </div>


                </div>
                
                <!-- Credit Card Portion -->
<!--
                <div class="col-md-4">
                    <h1 style="color:black;"  class="text-center">Credit Card System</h1>

                   <form action="" method="post">
                    <div class="form-group">
                        <label style="color:black;font-weight:bold;" for="password">Password</label>
                        <input type="password" name="edit_credit_password" placeholder="Password" class="form-control" required="">
                    </div>

                    <div class="form-group">
                        <label style="color:black;font-weight:bold;" for="address">Credit Card</label>
                        <input value="<?php echo $customer_credit;?>" type="text" name="edit_credit" placeholder="Credit Card No." class="form-control" required="">
                    </div>

                    <div style="text-align:center;">

                        <input class="btn btn-primary btn-circle btn-block" style="-moz-border-radius: 20px;
                                                                                   -webkit-border-radius: 20px;
                                                                                   border-radius: 20px;" type="submit" name="edit_customer" value="Edit Account">
                    </div>
                    </form>

                </div>
-->

        </div>

        <script type="text/javascript">
            //      $("#dismiss").on('click',function(event){
            //        event.preventDefault();
            //        document.getElementsByClassName('cd-popup')[0].style.display = 'none';
            //    });

            $('.cd-popup').on('click', function(event){
                if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') || $(event.target).is('.cd-popup-no')) {
                    event.preventDefault();
                    $(this).removeClass('is-visible');
                }
            });

        </script>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/pop_index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
                crossorigin="anonymous"></script>


    </body>

</html>