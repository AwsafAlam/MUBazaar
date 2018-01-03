<?php session_start(); ?>
<?php include "server.php";?>
<?php ob_start(); ?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>





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
                <h2>Login</h2>

                <form action="sign_process.php" method="post">
                    <div class="inputs-w3ls-left">
                        <a class="fa fa-envelope-o" aria-hidden="true"></a>		
                        <input type="email" name="email" placeholder="Email" required=""/>
                    </div>
                    <div class="inputs-w3ls-left">
                        <a class="fa fa-key" aria-hidden="true"></a>
                        <input type="password" class="password" name="password" placeholder="Password" required=""/>
                    </div>

                    <input name="signin" type="submit" value="LOGIN">

                    <a style="color: white;" href="password_recovery.php" >Forgot Password?</a>

                </form>
            </div>
            <!--//form-ends-here-->
            <div class="right-map-w3-agile">
                <h3>Register</h3>
                
                
                
                
                <form action="sign_process.php" method="post">
                  
                  
                    
                   
                    <div class="inputs-w3ls">
                        <a class="fa fa-user" aria-hidden="true"></a>
                        <input type="text" name="username" placeholder="Name" required="" />
                    </div>
                    
                    <div class="inputs-w3ls">
                        <a class="fa fa-envelope-o" aria-hidden="true"></a>
                        <input type="email" class="email" name="email" placeholder="Email" required=""/>
                    </div>
                    
                    <div class="container">
                        <div class="inputs-w3ls">
                        <a class="fa fa-key" aria-hidden="true"></a>
                        <input type="password" class="password" name="password" id="password1" placeholder="Password" required=""/>
                    </div>
                    
                    <div class="inputs-w3ls">
                        <a class="fa fa-key" aria-hidden="true"></a>
                        <input type="password" class="password" name="cpassword" id="password2" placeholder="Confirm Password" required=""/>

                    </div>	
                    </div>
                    
                    <div class="container">
                        <div class="inputs-w3ls">
                        <a class="fa fa-mobile-phone" aria-hidden="true"></a>
                        <input type="text" name="mobile" placeholder="Mobile No" required="" />
                    </div>
                    
                    

                    <div class="inputs-w3ls">
                        <a class="fa fa-address-book" ></a>
                        <input type="text"  name="address" placeholder="Address" required=""/>
                    </div>

                    </div>
                    
<!--                    <div class="container">-->
<!--                        <div class="inputs-w3ls">-->
<!--                        <a class="fa fa-credit-card" aria-hidden="true"></a>-->
<!--                        <input type="text" name="credit_card_no" maxlength="19" placeholder="Credit Card No" required="" />-->
<!--                    </div>            -->
<!---->
<!--                    </div>-->
                    

                    <input class="register" name="register" type="submit" value="REGISTER">
                </form> 
                
                <div >
<!--                --><?php //include "errors.php"?>
                </div> 
                
                
            </div>
            <div class="clear"></div>

            <div style="text-align: center;"><?php include "errors.php"?></div>
        </div>
        
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