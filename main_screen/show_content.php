<?php include "db.php"?>
<?php ob_start(); ?>


<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
    <title>MUBazaar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script src="js/jquery.openCarousel.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>













    <style type="text/css">
        .trash-button:hover{
            color: #E44F2B !important;
        }

        .placepicker-map {
            width: 100%;
            height: 300px;
        }

        .another-map-class {
            width: 100%;
            height: 300px;
        }

        .pac-container {
            border-radius: 5px;
        }





    </style>
</head>
<body style="background-color:#23272A;">

    <?php  include "dell_header.php" ?>





    <?php
    switch($_GET['source']){
        case 'cart':
            include "show_cart_body.php"; 
            break;
        case 'wishlist':
            include "show_wishlist_body.php"; 
            break;
        case 'checkout':
            include "buying_history.php";
            break;
    }



    ?>



    





    <?php include "footer.php" ?>