<?php
include "db.php";
require('mailer.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$customer_id = $_SESSION['customer_id'];

$query = "SELECT * FROM customer ";
$query .= "WHERE ID = {$customer_id};";

$select_customer_query = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($select_customer_query);

$customer_name = $row['Customer_Name'];
$customer_email = $row['Email'];
$customer_mobile = $row['Mobile'];
$customer_address = $row['Address'];
$customer_status = $row['Status'];
$customer_point = $row['point'];

if($row['image'] == null){
    $customer_image = 'default.png';
}else{
    $customer_image = $row['image'];
}





$ranking_query = "SELECT COUNT(*) FROM customer C1 WHERE C1.point > (SELECT point FROM customer WHERE ID = {$customer_id})";
$ranking_rslt = mysqli_query($connect, $ranking_query);
$ranking_row = mysqli_fetch_assoc($ranking_rslt);
$my_ranking = $ranking_row['COUNT(*)'] + 1;



if(isset($_POST['save'])){

    ob_start();

    $edit_customer_name = $_POST['edit_customer_name'];
    $edit_customer_password = $_POST['edit_customer_password'];
    $edit_customer_mobile = $_POST['edit_customer_mobile'];
    $edit_customer_address = $_POST['edit_customer_address'];
    $edit_customer_email = $_POST['edit_customer_email'];


    $image_1 = '';
    if($_FILES['image']['name'] != null){
        $image_1 =  $_FILES['image']['name'];
        $post_image_temp_1 = $_FILES['image']['tmp_name'];
        $image_1 = mysqli_real_escape_string($connect,$image_1);
        move_uploaded_file($post_image_temp_1,"images/customers/$image_1");
    }



    $query = "UPDATE customer SET ";
    $query .= "Customer_Name = '{$edit_customer_name}', ";
    $query .= "Password = '{$edit_customer_password}', ";
    $query .= "Mobile = '{$edit_customer_mobile}', ";
    $query .= "Address = '{$edit_customer_address}', ";
    $query .= "Email = '{$edit_customer_email}' ";
    if($_FILES['image']['name'] != null){
        $query .= ", image = '{$image_1}' ";
    }
    $query .= "WHERE ID = {$customer_id};";

    $customer_exists_query = "SELECT ID FROM customer WHERE ID = {$customer_id} AND password = '{$edit_customer_password}';";
    $rslt = mysqli_query($connect, $customer_exists_query);
    if(mysqli_num_rows($rslt) == 0){
        echo "<script>alert('Password didn\'t match')</script>";
    }else{
        $customer_update_query = mysqli_query($connect,$query);

        if(!$customer_update_query){
            die("FAILED " . mysqli_error($connect));
        }
        header("Location: my_profile.php");
    }



    /*
    $customer_update_query = mysqli_query($connect,$query);

    if(!$customer_update_query){
        die("FAILED " . mysqli_error($connect));
    }

    header("Location: ../index.php");
    */


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>User Profile - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
        .img_choose{ max-width: 100%; max-height: 100%; }
        .img_button{ display: none; }
    </style>





    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function () {
        };
        var defaultCSS = document.getElementById('bootstrap-css');

        function changeCSS(css) {
            if (css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }

        $(document).ready(function () {
            var iframe_height = parseInt($('html').height());
            window.parent.postMessage(iframe_height, 'https://bootsnipp.com');
        });
    </script>

    <script src="bootstrap-confirmation.js"></script>


</head>
<body>



<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><span style="color:white;">MU</span><span style="color:red;">Bazaar</span></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>

            <li><a href="./chat/index.php">Chat</a></li>
<!--            <li><a href="#">Page 3</a></li>-->
        </ul>

        <ul class="nav navbar-nav" style="float: right">
            <li class="active" style="text-align: right;"><a href='logout.php?type=customer'>Sign Out (<?php echo $customer_name ?>)</a></li>
        </ul>
    </div>
</nav>

<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1><?php echo $customer_name ?></h1></div>
        <div class="col-sm-2"><a href="my_profile.php" class="pull-right"><img title="profile image"
                                                                       class="img-circle img-responsive"
                                                                       src="images/customers/<?php echo  $customer_image;?>"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span
                            class="pull-left"><strong>Email</strong></span> <?php echo $customer_email ?></li>
                <li class="list-group-item text-right"><span
                            class="pull-left"><strong> Mobile </strong></span> <?php echo $customer_mobile ?></li>
                <li class="list-group-item text-right"><span
                            class="pull-left"><strong>Address</strong></span> <?php echo $customer_address ?></li>

            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Account Status <i class="fa fa-link fa-1x"></i></div>
                <!--                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>-->
                <div class="panel-body"><p><?php echo $customer_status ?> </p></div>

<!--                <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i-->
<!--                        class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i-->
<!--                        class="fa fa-google-plus fa-2x"></i>-->


            </div>


            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span
                            class="pull-left"><strong>Total Points</strong></span> <?php echo $customer_point ?></li>
                <li class="list-group-item text-right"><span
                            class="pull-left"><strong>Ranking</strong></span> <?php echo $my_ranking ?></li>
                <!--                <li class="list-group-item text-right"><span class="pull-left"><strong>  </strong></span> 37</li>-->
                <!--                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>-->
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading"><span style="color:red;font-weight: bold;">Danger Zone</span></div>
                <div class="panel-body">


                    <div style="text-align:center;margin-top:20px;">
                        <input class="btn btn-danger btn-circle btn-block cd-popup-trigger" style="-moz-border-radius: 20px;
                                                                                                   -webkit-border-radius: 20px;
                                                                                                   border-radius: 20px;" type="submit" name="deleteAcc" value="Delete Account">

                    </div>
                </div>
            </div>

        </div><!--/col-3-->
        <div class="col-sm-9">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home" data-toggle="tab">Buying History</a></li>
<!--                <li><a href="#messages" data-toggle="tab">Messages</a></li>-->
                <li><a href="#settings" data-toggle="tab">Edit Profile</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="table-responsive">
                        <table class="table table-hover">


                            <?php include "buying_history_table.php" ?>


                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                            </div>
                        </div>
                    </div><!--/table-resp-->

                    <hr>

                </div><!--/tab-pane-->
                <div class="tab-pane" id="messages">

                    <h2></h2>

                    <ul class="list-group">
                        <li class="list-group-item text-muted">Inbox</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the
                                latest summary report from the..</a> 2.13.2014
                        </li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a
                                request on your account since that was..</a> 2.11.2014
                        </li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A
                                lobortis vitae, condimentum justo...</a> 2.11.2014
                        </li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A
                                lobortis vitae, condimentum justo...</a> 2.11.2014
                        </li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A
                                lobortis vitae, condimentum justo...</a> 2.11.2014
                        </li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A
                                lobortis vitae, condimentum justo...</a> 2.11.2014
                        </li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien
                                massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014
                        </li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor.
                                A lobortis vitae, condimentum justo...</a> 2.11.2014
                        </li>

                    </ul>

                </div><!--/tab-pane-->
                <div class="tab-pane" id="settings">

                    <form class="form" action="my_profile.php" method="post" id="registrationForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image-picker">
                                <img class="img_choose" id="image-preview"
                                     src="http://dummyimage.com/400x200/f5f5f5/000.jpg&text=Click+here+to+upload+your+image"
                                     alt="your image"/>
                            </label>
                            <input name="image" class="img_button" id="image-picker" type="file" accept="image/*"/>
                        </div>


                        <hr>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>Name</h4></label>
                                <input required type="text" class="form-control" name="edit_customer_name" id="first_name"
                                       placeholder="Enter Name Here" title="enter your first name if any." value="<?php echo $customer_name?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile"><h4>Mobile</h4></label>
                                <input required type="text" class="form-control" name="edit_customer_mobile" id="mobile"
                                       placeholder="Enter Mobile Number" title="enter your mobile number if any." value="<?php echo $customer_mobile?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input required type="email" class="form-control" name="edit_customer_email" id="email"
                                       placeholder="you@email.com" title="enter your email." value="<?php echo $customer_email ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Address</h4></label>
                                <input required type="text" class="form-control" id="location" placeholder="somewhere" name="edit_customer_address"
                                       title="enter a location" value="<?php echo $customer_address?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password"><h4>Password</h4></label>
                                <input   type="password" class="password form-control" name="edit_customer_password" id="password1" placeholder="Password" required="">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button name="save" class="btn btn-lg btn-success" type="submit"><i
                                            class="glyphicon glyphicon-ok-sign"></i> Save
                                </button>



                            </div>
                        </div>
                    </form>
                </div>

            </div><!--/tab-pane-->
        </div><!--/tab-content-->

    </div><!--/col-9-->
</div><!--/row-->

<script type="text/javascript">

    $("#image-picker").change(function (event) {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>



</body>
</html>
