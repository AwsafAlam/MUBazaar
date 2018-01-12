<?php ob_start(); ?>
<?php include "../db.php"; ?>
<?php session_start(); ?>

<?php

$is_selected = false;
$selected_offer = 'nothing selected';
$select_array = array();


$select_offer_query = "SELECT occasion FROM special_offer WHERE offer_active = 'Y';";
$select_offer_rslt = mysqli_query($connect, $select_offer_query);




if(mysqli_num_rows($select_offer_rslt) > 0){
    while($select_offer_row = mysqli_fetch_assoc($select_offer_rslt)){
        array_push($select_array, $select_offer_row['occasion']);
    }
    $is_selected = true;
}


if(isset($_POST['offer_btn'])){
//    $offer = $_POST['offer'];
//
//    if($is_selected){
//        $offer_query = "UPDATE special_offer SET offer_active = 'N' WHERE occasion = '{$selected_offer}';";
//        mysqli_query($connect, $offer_query);
//    }
//
//
//
//    if($offer != "-1"){
//
//        $offer_query = "UPDATE special_offer SET offer_active = 'Y' WHERE occasion = '{$offer}';";
//        mysqli_query($connect, $offer_query);
//        $selected_offer = $offer;
//    }else{
//        $selected_offer = 'nothing selected';
//    }


    $offer = $_POST['offer_name'];


        $offer_query = "UPDATE special_offer SET offer_active = 'N' ;";
        mysqli_query($connect, $offer_query);



    $select_array = array();
    foreach ($_POST['offer_name'] as $select)
    {
        //echo "You have selected :" .$select; // Displaying Selected Value
        $query = "UPDATE special_offer SET offer_active = 'Y' WHERE occasion = '{$select}';";
        $rslt = mysqli_query($connect,$query);
        array_push($select_array, $select);
        if(!$rslt){
            die("FAILED " . mysqli_error($connect));
        }
    }


}











?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>

        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/dropdown.css" rel="stylesheet"/>
        <link href="css/vertical.css" rel="stylesheet"/>

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            .tooltip {
                position: relative;
                display: inline-block;
                border-bottom: 1px dotted black;
            }

            .tooltip .tooltiptext {
                visibility: hidden;
                width: 120px;
                background-color: black;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px 0;

                /* Position the tooltip */
                position: absolute;
                z-index: 1;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
            }
        </style>

    </head>

<body>


<div id="wrapper">

    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">



            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1>Selected Offer: <?php $myArray = "" ; foreach ($select_array as $singleOffer) $myArray .= ucfirst($singleOffer) . "," ; echo rtrim($myArray,", ");?></h1>

                    <div class="col-sm-4">


                            <form action="" method="post" name="offer_form">

<!--                            <select name="offer" class="b-select">-->
<!--                                <option value="-1" selected>Invalidate Offer</option>-->
<!--                                <option value="winter">Winter</option>-->
<!--                                <option value="summer">Summer</option>-->
<!--                                <option value="eid">EID</option>-->
<!--                            </select>-->

                                <select multiple class="form-control" id="sel2" name="offer_name[]">
                                    <option value="summer">summer</option>
                                    <option value="winter">winter</option>
                                    <option value="eid">eid</option>
                                    <option value="none">none</option>
                                </select>



                    </div>



                    


                    <div class="col-sm-4">
                        <div style="text-align:center;">

                            <input class="btn btn-primary btn-block" style="-moz-border-radius: 20px;
                                                                            -webkit-border-radius: 20px;
                                                                            border-radius: 20px;" type="submit" name="offer_btn" value="Apply">

                            </form>
                        </div>
                    </div>






                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>