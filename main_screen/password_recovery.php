<?php session_start(); ?>
<?php include_once "db.php"; ?>
<?php include_once "server.php";?>

<?php ob_start(); ?>

<?php include_once "mailer.php" ?>

<?php
$reply_message = "";

if(isset($_POST['forgot_password'])){
    $query = "SELECT Password FROM customer WHERE Email = '{$_POST['forgot_email']}';";
    $rslt = mysqli_query($connect,$query);

    if(mysqli_num_rows($rslt) == 1){
        $row = mysqli_fetch_assoc($rslt);


        $message_body = "Your password is {$row['Password']} ";
        $message_email = $_POST['forgot_email'];
        $mailSender = new MailSender($message_email, "MUBazaar :: your password is here!!!", "Password Recovery Process!!!!", $message_body);

        $mailSender->requestMailSend();
        global $reply_message ;
        $reply_message = "Password has been sent to your email account.";
    }
    else{
        global $reply_message ;
        $reply_message = "No account found for this email.";
    }


}

?>

    <!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Password Recovery Process</title>





        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Splendid Bifold Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>



        <!-- Custom Theme files -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/style_sign_process.css" rel="stylesheet" type="text/css" media="all" />
        <!-- //Custom Theme files -->
        <!-- web font -->
        <link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- //web font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    </head>
    <body>
    <h1><span style="color:red;">MU</span>Bazaar</h1>
    <div class="main-agileits">
        <!--form-stars-here-->
        <!--    left-form-w3-agile-->
        <div class="left-form-w3-agile">
            <h2>Password Recovery Process</h2>

            <form action="" method="post">
                <div class="inputs-w3ls-left">
                    <a class="fa fa-envelope-o" aria-hidden="true"></a>
                    <input type="email" name="forgot_email" placeholder="Email" required=""/>
                </div>


                <input name="forgot_password" type="submit" value="Send Password">




            </form>



        </div>





        <!--//form-ends-here-->

        <div class="clear"></div>



    </div>

    <div style="text-align: center;"><p style="color: white;font-weight: bold;"><?php if(!empty($reply_message)) echo $reply_message ?></p></div>

    <!-- password-script -->
    <script type="text/javascript">
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }
        function validatePassword(){
            var pass2=document.getElementById("password2").value;
            var pass1=document.getElementById("password1").value;
            if(pass1!=pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }

    </script>
    <!-- //password-script -->
    </body>
    </html>
<?php ob_end_flush();?>