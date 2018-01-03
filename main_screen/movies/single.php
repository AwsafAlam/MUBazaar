<?php
include "../db.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
//    $customer_id = $_SESSION['customer_id'];
}

$cart_flag = false;
$collection_flag = false;

$customer_id = 0;

if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
}

if(isset($_GET['id'])){
    $movie_id = $_GET['id'];




    if(isset($_GET['cart'])){


        if (isset($_SESSION['customer_id'])) {
            $customer_id = $_SESSION['customer_id'];
            $get_query = "SELECT id FROM movie_cart WHERE customer_id = {$customer_id} AND ";
            $get_query .= "movie_id = '{$movie_id}';";

            $get_result = mysqli_query($connect, $get_query);
            $num_rows = mysqli_num_rows($get_result);



            $set_query = "";
            if ($num_rows == 0) {

                $movie_id = mysqli_real_escape_string($connect, $movie_id);
                $customer_id = mysqli_real_escape_string($connect, $customer_id);

                $set_query = "INSERT INTO `movie_cart`( movie_id, customer_id)  VALUES({$movie_id},  {$customer_id})";
                $set_rslt = mysqli_query($connect, $set_query);
            }
            else {
                echo "<script>alert('Already added to cart!')</script>";
            }
        } else {
            echo "<script>alert('Sign in as a customer first')</script>";
        }


    }


    if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $get_query = "SELECT id FROM movie_cart WHERE customer_id = {$customer_id} AND ";
    $get_query .= "movie_id = {$movie_id};";



    $get_result = mysqli_query($connect, $get_query);
    $cart_num_rows = mysqli_num_rows($get_result);




    $get_query = "SELECT id FROM movie_customer WHERE customer_id = {$customer_id} AND ";

    $get_query .= "movie_id = {$movie_id};";




    $get_result = mysqli_query($connect, $get_query);

    $collection_num_rows = mysqli_num_rows($get_result);



    if (($collection_num_rows == 0) && ($cart_num_rows == 0)) {
            $cart_flag = true;
    }

    if ($collection_num_rows != 0 ) {
        $collection_flag = true;


    }


    }


}



?>

<?php
echo '<script src="sweetalert/sweetalert.min.js" type="text/javascript"></script>';

if(isset($_POST['comment'])){

    if(isset($_SESSION['customer_id'])){
        $comment = $_POST['comment'];
        $comment_query = "INSERT INTO movie_comment(customer_id, movie_id, comment_content, comment_date) ";
        $comment_query .= "VALUES({$customer_id}, {$movie_id}, '{$comment}', now());";
        mysqli_query($connect, $comment_query);
    }else{

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("what\'s the hurry??","fill everything first","error");';
        echo '}, 50);</script>';
    }


}



?>


<?php
$query = "SELECT * FROM movie WHERE id = {$movie_id};";
$rslt = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($rslt);
$movie_category = $row['category'];
$movie_name = $row['name'];
$movie_year = $row['year'];
$movie_trailer = $row['trailer'];
$movie_price = $row['price'];
$movie_poster = $row['poster'];
$movie_source = $row['source'];
$movie_summary = $row['summary'];
$movie_image = $row['image'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>MUMovies</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<!-- news-css -->
<link rel="stylesheet" href="news-css/news.css" type="text/css" media="all" />
<!-- //news-css -->
<!-- list-css -->
<link rel="stylesheet" href="list-css/list.css" type="text/css" media="all" />
<!-- //list-css -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>



<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,5],
		  itemsDesktopSmall : [414,4]
	 
		});
	 
	}); 
</script> 
<script src="js/simplePlayer.js"></script>
<script>
	$("document").ready(function() {
		$("#video").simplePlayer();
	});
</script>




</head>
	
<body>



<?php include "header.php"?>

<!-- //nav -->
<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
			<li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>				  
		</ul>
  </nav>
</div>
<!-- single -->
<div class="single-page-agile-main">
<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active"><?php echo $movie_name ?></li>
				</ol>
			</div>





			<div  class="single-page-agile-info">

                           <div class="show-top-grids-w3lagile">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
							<h3 style="text-align: center"><?php echo $movie_name  ?></h3>
					    </div>




                        <div class="row">




						<div class="video-grid-single-page-agileits" style="margin-left: 75px;" >


                            <iframe width="560" height="315" src="<?php echo $movie_trailer; ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>


<!--							<div data-video="dLmKio67pVQ" id="video"> <img src="images/5.jpg" alt="" class="img-responsive" /> </div>-->
						</div>

                        </div>

                        <div style="margin-left: 20px; margin-top: 25px;">
                            <?php echo $movie_summary; ?><br>

                            <?php if($cart_flag){ ?>

                            <form action="single.php?id=<?php echo $movie_id ?>&cart=<?php echo $movie_id?>#prod_zoom"
                            method="post" id="cartform">

                            </form>


                            <div id="add_cart" class="button">


                                <button form="cartform" name="add_cart" type="submit" class="btn btn-info btn-lg"><i class="fa fa-shopping-cart" style="font-size:24px"></i>&nbsp;&nbsp;Add To Cart!
                                </button>

                            </div>

                            <?php }else if($collection_flag){ ?>

                                <button class="btn btn-info btn-lg" type="button" onClick="javascript:location.href = 'show_a_movie.php?movie_id=<?php echo $movie_id;?>';" /><i class="fa fa-tv"></i>    Watch Now!</button>


                            <?php } ?>

                        </div>


					</div>



					<div class="song-grid-right">

					</div>


					<div class="clearfix"> </div>

					<div class="all-comments">
						<div class="all-comments-info">
							<a href="#">Comments</a>
							<div class="agile-info-wthree-box">





								<form action="" method="post">
<!--									<input name="" type="text" placeholder="Name" required="">-->
<!--									<input name="" type="text" placeholder="Email" required="">-->
<!--									<input name="" type="text" placeholder="Phone" required="">-->
									<textarea name="comment" placeholder="Write your comment here" required=""></textarea>
									<input type="submit" value="Comment">
									<div class="clearfix"> </div>
								</form>
							</div>
						</div>
                        <?php


                            $comment_query = "SELECT customer_id, comment_date, comment_content FROM movie_comment ";
                            $comment_query .= "WHERE movie_id = {$movie_id};";
                            $comment_query_result = mysqli_query($connect, $comment_query);
                            while($comment_query_row = mysqli_fetch_assoc($comment_query_result )){
                                $commenter_id = $comment_query_row['customer_id'];
                                $comment_date = $comment_query_row['comment_date'];
                                $comment_content = $comment_query_row['comment_content'];

                                $commenter_query = "SELECT Customer_Name, image FROM customer WHERE ID = {$commenter_id};";
                                $commenter_query_result = mysqli_query($connect, $commenter_query);
                                $commenter_query_row = mysqli_fetch_assoc($commenter_query_result );
                                $commenter_name = $commenter_query_row['Customer_Name'];
                                $commenter_image = $commenter_query_row['image'];
                                $commenter_image = '../images/customers/' . $commenter_image;
                                if($commenter_query_row['image'] == null){
                                    $commenter_image = 'images/user.jpg';
                                }



                        ?>


                        <div class="media-grids">
							<div class="media">
								<h3><?php echo $commenter_name ?></h3>
								<div class="media-left">
									<a href="#">
										<img width="50px" src="<?php echo $commenter_image; ?>" title="One movies" alt=" " />
									</a>
								</div>
								<div class="media-body">
									<h4><?php echo $comment_content; ?></h4>
									<span>On :<a href="#"> <?php  echo $comment_date; ?> </a></span>
								</div>
							</div>
						</div>
                            <?php } ?>
					</div>





				</div>

                               <div class="col-md-4 single-right">


                                       <img src="images/<?php echo $movie_image;?>">


                               </div>


				
				<div class="clearfix"> </div>
			</div>
				<!-- //movie-browse-agile -->
				<!--body wrapper start-->

		<!--body wrapper end-->
						
							 
				</div>
				<!-- //w3l-latest-movies-grids -->
			</div>	
		</div>
	<!-- //w3l-medile-movies-grids -->
	
<!-- footer -->
	<?php include "footer.php" ?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>