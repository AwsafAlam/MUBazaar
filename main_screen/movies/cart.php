<?php
include "../db.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
//    $customer_id = $_SESSION['customer_id'];
}

if(isset($_POST['search_movie'])){
    $searchVal = $_POST['search_movie'];
}
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];


}


?>



<?php

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $movie_id = $_GET['id'];

    $cart_query = "DELETE FROM movie_cart WHERE customer_id = {$customer_id} AND ";
    $cart_query .= "movie_id = {$movie_id};";


    $cart_query_rslt = mysqli_query($connect,$cart_query);
    if(!$cart_query_rslt){
        die(mysqli_error($connect));
    }
    header("Location: cart.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>MUMovies :: Search</title>
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
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<!-- banner-slider -->
<link href="css/jquery.slidey.min.css" rel="stylesheet">
<!-- //banner-slider -->
<!-- pop-up -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- banner-bottom-plugin -->
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]
	 
		});
	 
	}); 
</script> 
<!-- //banner-bottom-plugin -->
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
</head>
	
<body>
<!-- header -->
	<?php include "header.php"?>
<!-- //nav -->

<!-- //banner-bottom -->
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
<!-- general -->
	<div class="general">
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
<!--				<ul id="myTab" class="nav nav-tabs" role="tablist">-->
<!--					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Featured</a></li>-->
<!--					<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Top Sold</a></li>-->
<!--					<li role="presentation"><a href="#rating" id="rating-tab" role="tab" data-toggle="tab" aria-controls="rating" aria-expanded="true">Top Rating</a></li>-->
<!--					<li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab" aria-controls="imdb" aria-expanded="false">Recently Added</a></li>-->
<!--				</ul>-->
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">




                                <div class="col-md-2 w3l-movie-gride-agile">

                                    <div class="container">
                                        <h2>Your Movie Cart</h2>
                                        <p>Please checkout first for high quality online streaming of your movies</p>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Movie</th>
                                                <th>Price</th>
                                                <th style="text-align:center">Remove</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $cart_query = "SELECT * FROM movie_cart WHERE customer_id = {$customer_id};";
                                            $cart_rslt = mysqli_query($connect, $cart_query);
                                            $total_cost = 0;

                                            while($cart_row = mysqli_fetch_assoc($cart_rslt)){
                                                $movie_id = $cart_row['movie_id'];
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
                                                $movie_image= $row['image'];
                                                $total_cost += $movie_price;



                                            ?>



                                            <tr>
                                                <td style="text-align: left" class="w3-list-img"><a target="_blank" href="single.php?id=<?php echo $movie_id; ?>"><img width="56px" height="75px" src="images/<?php echo $movie_image ?>" alt="" /> <span><?php echo $movie_name ?></span></a></td>
                                                <td style="text-align: left"><?php echo $movie_price ?></td>
                                                <?php echo "<td align='center'><a  href = 'cart.php?action=delete&id={$movie_id}' style='color:black;' class='trash-button delete_anchor glyphicon glyphicon-trash'></a></p></td>"; ?>
                                            </tr>



                                            <?php  } ?>

                                            <tr>
                                                <td style="text-align:center;" colspan="7">Your Total Cost: <?php echo $total_cost; ?></td>
                                                <?php $_SESSION['total_cost'] = $total_cost; ?>
                                            </tr>

                                            <tr>
                                                <td style="text-align:center;border: 0;" colspan="3">
                                                    <div style="text-align:center;">

                                                        <form action="movie_credit.php?"
                                                              method="post" id="cartform">



                                                        <input
                                                                <?php if($total_cost < 1){ ?> disabled <?php  } ?>
                                                                 class="btn btn-primary btn-block" style="-moz-border-radius: 20px;
                                                                            -webkit-border-radius: 20px;
                                                                            border-radius: 20px;" type="submit" name="edit_customer" value="Proceed to checkout">
                                                    </div>

                                                        </form>


                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>






                        <div class="clearfix"> </div>


					</div>

						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //general -->
<!-- Latest-tv-series -->

	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<div id="small-dialog" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
	</div>
	<div id="small-dialog1" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/148284736"></iframe>
	</div>
	<div id="small-dialog2" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
	</div>
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
<!-- //Latest-tv-series -->
<!-- footer -->
<?php include "footer.php"; ?>
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