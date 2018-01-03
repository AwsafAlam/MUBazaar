<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 12/27/2017
 * Time: 8:20 AM
 */
$customer_id = 0;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    }





?>




<link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">


<div class="header">
    <div class="container">

        <div >
            <a href="index.php"><h1  style="font-family: 'Rancho', cursive; color:black;font-size:75px;"><span style="color:red;">MU</span>Movies</h1></a>

        </div>

        <div class="w3_search">
            <form action="search.php" method="post">
                <input type="text" name="search_movie" placeholder="Search" required="">
                <input type="submit" value="Go">
            </form>
        </div>
        <div class="w3l_sign_in_register">
            <ul>
                <li><i class="fa fa-phone" aria-hidden="true"></i> +8801811563457
                </li>
                <li>
                    <a href="../index.php">Return to MUBazaar</a>
                </li>







<!--                <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>-->

            </ul>
        </div>
        <div class="clearfix"> </div>

    </div>

</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Sign In & Sign Up
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                                <div class="tooltip">Click Me</div>
                            </div>
                            <div class="form">
                                <h3>Login to your account</h3>
                                <form action="#" method="post">
                                    <input type="text" name="Username" placeholder="Username" required="">
                                    <input type="password" name="Password" placeholder="Password" required="">
                                    <input type="submit" value="Login">
                                </form>
                            </div>
                            <div class="form">
                                <h3>Create an account</h3>
                                <form action="#" method="post">
                                    <input type="text" name="Username" placeholder="Username" required="">
                                    <input type="password" name="Password" placeholder="Password" required="">
                                    <input type="email" name="Email" placeholder="Email Address" required="">
                                    <input type="text" name="Phone" placeholder="Phone Number" required="">
                                    <input type="submit" value="Register">
                                </form>
                            </div>
                            <div class="cta"><a href="#">Forgot your password?</a></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $('.toggle').click(function(){
        // Switches the Icon
        $(this).children('i').toggleClass('fa-pencil');
        // Switches the forms
        $('.form').animate({
            height: "toggle",
            'padding-top': 'toggle',
            'padding-bottom': 'toggle',
            opacity: "toggle"
        }, "slow");
    });
</script>
<!-- //bootstrap-pop-up -->
<!-- nav -->
<div class="movies_nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">

                                            <?php
                                            $cat_query = "SELECT DISTINCT category FROM movie;";
                                            $cat_rslt = mysqli_query($connect, $cat_query);
                                            while($cat_row = mysqli_fetch_assoc($cat_rslt)){
                                                $movie_cat = $cat_row['category'];

                                            ?>

                                            <li><a href="genres.php?genre=<?php echo $movie_cat; ?>"> <?php echo $movie_cat; ?></a></li>

                                            <?php } ?>



                                        </ul>
                                    </div>
<!--                                    <div class="col-sm-4">-->
<!--                                        <ul class="multi-column-dropdown">-->
<!--                                            <li><a href="genres.html">Adventure</a></li>-->
<!--                                            <li><a href="comedy.html">Comedy</a></li>-->
<!--                                            <li><a href="genres.html">Documentary</a></li>-->
<!--                                            <li><a href="genres.html">Fantasy</a></li>-->
<!--                                            <li><a href="genres.html">Thriller</a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                    <div class="col-sm-4">-->
<!--                                        <ul class="multi-column-dropdown">-->
<!--                                            <li><a href="genres.html">Animation</a></li>-->
<!--                                            <li><a href="genres.html">Costume</a></li>-->
<!--                                            <li><a href="genres.html">Drama</a></li>-->
<!--                                            <li><a href="genres.html">History</a></li>-->
<!--                                            <li><a href="genres.html">Musical</a></li>-->
<!--                                            <li><a href="genres.html">Psychological</a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
<!--                        <li><a href="news.html">news</a></li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Country <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">

                                            <?php

                                            $country_query = "SELECT DISTINCT country FROM movie; ";
                                            $country_rslt = mysqli_query($connect, $country_query);
                                            while($country_row = mysqli_fetch_assoc($country_rslt)){
                                                $country_name = $country_row['country'] ;
                                            ?>

                                            <li><a href="country.php?country=<?php echo $country_name; ?>"><?php echo $country_name; ?></a></li>

                                            <?php } ?>

                                        </ul>
                                    </div>

                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
<!--                        <li><a href="short-codes.html">Short Codes</a></li>-->
                        <li><a href="list.php">A - z list</a></li>

                        <?php if(!isset($_SESSION['admin_name'])){ ?>


                                <?php if(isset($_SESSION['customer_name'])){
                                    include "../db.php";
                                    $total_num_cart_movies = 0;
                                    $total_cart_query  = "SELECT COUNT(*) FROM movie_cart WHERE customer_id = {$customer_id};";
                                    $total_cart_rslt = mysqli_query($connect, $total_cart_query);
                                    $total_cart_row = mysqli_fetch_assoc($total_cart_rslt);
                                    $total_num_cart_movies =  $total_cart_row['COUNT(*)'];

                                    echo "<li><a href='collection.php'>My Collection</a></li>";
                                    echo "<li><a href='cart.php'>Movie Cart (  {$total_num_cart_movies} )</a></li>";
                                    echo "<li><a href='../my_profile.php'>{$_SESSION['customer_name']}</a></li>";
                                }else{
                                    echo "<li><a href='../sign_process.php'>Sign In / Register</a></li>";
                                }
                                ?>




                        <?php }?>

                        <?php if(!isset($_SESSION['customer_name'])){ ?>

                            <li>
                                <?php if(isset($_SESSION['admin_name'])){
                                    echo "<a href='../admin/categories.php'>Admin: {$_SESSION['admin_name']}</a>";
                                }else{
                                    echo "<a href='../admin/admin-login.php'>Admin</a>";
                                }



                                ?>
                            </li>

                        <?php } ?>

                        <?php
                        if(isset($_SESSION['customer_name'])){
                            echo "<li>";
                            echo "<a href='../logout.php?type=customer'>Sign Out</a>";
                            echo "</li>";
                        }
                        else if(isset($_SESSION['admin_name'])){
                            echo "<li>";
                            echo "<a href='../logout.php?type=admin'>Sign Out</a>";
                            echo "</li>";
                        }

                        ?>


                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>

