<?php include ('../db.php');
require ('../mailer.php');


function endsWith($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 || 
        (substr($haystack, -$length) === $needle);
}


//    session_start();

$errors = array();
$name  = "";
$mobile = "";
$address = "";
$email = "";

if(isset($_POST['register'])){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $name = $_POST['username'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $cpassword = $_POST['cpassword'];
//    $credit_card_no = $_POST['credit_card_no'];

    $name = mysqli_real_escape_string($connect,$name);
    $password = mysqli_real_escape_string($connect,$password);
    $mobile = mysqli_real_escape_string($connect,$mobile);
    $address = mysqli_real_escape_string($connect,$address);
    $email = mysqli_real_escape_string($connect,$email);
    $cpassword = mysqli_real_escape_string($connect,$cpassword);



    if(empty($name)){
        array_push($errors,"Username is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
    }
    if(empty($mobile)){
        array_push($errors,"Mobile No. is required");
    }
    if(empty($address)){
        array_push($errors,"Address is required");
    }
    if(empty($email)){
        array_push($errors,"Email is required");
    }

    if($password != $cpassword){
        array_push($errors,"Passwords don't match");
    }

    $email_check_query = "SELECT Email, Status FROM customer";
    $email_check_rslt = mysqli_query($connect,$email_check_query);
    $row = "";
    while($row = mysqli_fetch_assoc($email_check_rslt )){
        if($row['Email'] == $email){
            if($row['Status'] === "blocked"){
                header("Location: index.php?blocked=1");
            }else{
                array_push($errors,"This email is already registered!");
            }
            break;
        }

    }

    if(count($errors) == 0){

        if(isset($_SESSION['admin_name'])){
            header("Location: index.php?alreadylogin=admin");
        }
        else if(isset($_SESSION['customer_id'])){
            header("Location: index.php?alreadylogin=customer");
        }else {
            $credit_balance = mt_rand(10000, 1000000);
            $confirm_code = mt_rand();

            $query = "INSERT INTO customer(Customer_Name,Password,Mobile,Address,Email,Confirm_Code) ";
            $query .= "VALUES('$name','$password','$mobile','$address','$email',  $confirm_code);";



            $rslt = mysqli_query($connect, $query);

            if (!$rslt) {
                echo "Failure on inserting data";
            } else {



                $last_id = $connect->insert_id;

                //            echo "<script>alert('Your ID: '+'$last_id')</script>";

                //            $_SESSION['customer_name'] = $name;
                //            $_SESSION['customer_id'] = $last_id;
                //            $_SESSION['customer_email'] = $email;

                $message_body = "Click here to verify your email address: http://localhost/demo/e-commerce/main_screen/index.php?id={$last_id}&code=$confirm_code";
                $message_email = $email;
                $mailSender = new MailSender($message_email, "MUBazaar :: Complete your registration process!!!", "Verify your email address", $message_body);

                $mailSender->requestMailSend();

                array_push($errors, "Verification link has been sent to your email account!");

            }
        }
    }
}

if(isset($_POST['signin'])){


    if(isset($_SESSION['admin_name'])){
        header("Location: index.php?alreadylogin=admin");
    }
    else if(isset($_SESSION['customer_id'])){
        header("Location: index.php?alreadylogin=customer");
    }
    else{
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $password = mysqli_real_escape_string($connect,$_POST['password']);

        if(empty($email)){
            array_push($errors,"Email is required");
        }
        if(empty($password)){
            array_push($errors,"Password is required");
        }

        if(count($errors) == 0){
            $query = "SELECT * FROM customer WHERE Email='$email' AND Password='$password'";
            $result = mysqli_query($connect,$query);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                if($row['Status'] === 'verified'){

                    $customer_active_query = "UPDATE customer SET  customer_active = 'Y' WHERE id = {$row['ID']};";
                    mysqli_query($connect, $customer_active_query);

                    $_SESSION['customer_name'] = $row['Customer_Name'];
                    $_SESSION['customer_email'] = $row['Email'];
                    $_SESSION['customer_id'] = $row['ID'];
                    if(endsWith($_SESSION['customer_email'], "@ugrad.cse.buet.ac.bd")){
                        $_SESSION['is_buetian'] = 1;
                    }
                    header("Location: index.php");
                    //            $_SESSION['success'] = "You are now logged in";
                    //            header('location: myaccount.php');
                }
                else if($row['Status'] === 'blocked'){
                    header("Location: index.php?blocked=1");
                }
                else{

                    $last_id = $row['ID'];
                    $confirm_code = mt_rand();
                    $confirm_update_query = "UPDATE customer SET Confirm_Code = {$confirm_code} WHERE ID = {$last_id}; ";
                    //                echo $confirm_update_query;

                    $confirm_rslt = mysqli_query($connect,$confirm_update_query);

                    if(!$confirm_rslt){
                        die(mysqli_error($connect));
                    }

                    $message_body = "Click here to complete verify your email address: http://localhost/demo/e-commerce/main_screen/index.php?id={$last_id}&code=$confirm_code"  ;
                    $mailSender = new MailSender( $row['Email'], "MUBazaar :: Complete your registration process!!!",  "Verify your email address", $message_body);

                    $mailSender->requestMailSend();

                    array_push($errors,"Verification link has been sent to your email account!");
                }
            }
            else{
                array_push($errors,"Wrong email or password");
            }
        }

    }


}

?>