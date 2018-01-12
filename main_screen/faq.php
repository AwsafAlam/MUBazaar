<?php include "db.php";
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//session_start();



$customer_id = '';

?>
<!DOCTYPE HTML>
<head>
    <title>MUBazaar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>



    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script src="js/jquery.openCarousel.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>


    <link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true   // 100% fit in a container
            });
        });
    </script>
    <link rel="stylesheet" href="css/etalage.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .faq {
            font-weight: bold;
            font-size: 200%;
        }
        .faa {
            margin-top: 5px;
            margin-left: 30px;
            font-weight: bold;
            font-size: 150%;
        }
    </style>

    <script src="js/jquery.etalage.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
                click_callback: function (image_anchor, instance_id) {
                    alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                }
            });

        });
    </script>
    <script src="js/star-rating.js" type="text/javascript"></script>
</head>
<body>


<div class="header">
    <div class="wrap">
        <?php include "header.php" ?>
    </div>


</div>
<!------------End Header ------------>
<div class="main">
    <div class="wrap">
        <div class="preview-page">
            <div class="section group">
                <p style="font-size: 250%; font-weight: bold; text-align: center"><u>Frequently Asked Questions</u></p>
                <div id="prod_zoom" class="cont-desc span_1_of_2">


                    <p class="faq">1) I can't login using the link sent to my account</p>
                    <p class="faa">Most probably, you are refering to the old link. Please check the most recent mail. </p>

                    <p class="faq">2) My points have been reduced but I don't know why </p>
                    <p class="faa">If you put any immoral comment/review  then your points will be rediced by 10. </p>



                </div>
            </div>
        </div>
    </div>
</div>

<?php //include "footer.php" ?>

