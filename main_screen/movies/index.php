<?php
include "../db.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
//    $customer_id = $_SESSION['customer_id'];
}



$query = "SELECT * FROM movie;";
$rslt = mysqli_query($connect, $query);



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
<!-- banner -->
	<div id="slidey" style="display:none;">
		<ul>


            <?php

            while($row = mysqli_fetch_assoc($rslt)){
                $movie_category = $row['category'];
                $movie_name = $row['name'];
                $movie_year = $row['year'];
                $movie_trailer = $row['trailer'];
                $movie_price = $row['price'];
                $movie_poster = $row['poster'];
                $movie_source = $row['source'];
                $movie_summary = $row['summary'];
                $movie_id = $row['id'];




            ?>

                <li><img src="posters/<?php echo $movie_poster ?>" alt=" "><p class="title"><a style="color: white;" href="single.php?id=<?php echo $movie_id; ?>" class='title'><?php  echo $movie_name?></a></p><p class='description'> <?php echo $movie_summary ?></p></li>


            <?php } ?>


<!--			<li><img src="images/5.jpg" alt=" "><p class='title'>Tarzan</p><p class='description'> Tarzan, having acclimated to life in London, is called back to his former home in the jungle to investigate the activities at a mining encampment.</p></li>-->
<!--			<!--<li><img src="images/2.jpg" alt=" "><p class='title'>Maximum Ride</p><p class='description'>Six children, genetically cross-bred with avian DNA, take flight around the country to discover their origins. Along the way, their mysterious past is ...</p></li>-->-->
<!--			<li><img src="images/3.jpg" alt=" "><p class='title'>Independence</p><p class='description'>The fate of humanity hangs in the balance as the U.S. President and citizens decide if these aliens are to be trusted ...or feared.</p></li>-->
<!--			<li><img src="images/4.jpg" alt=" "><p class='title'>Central Intelligence</p><p class='description'>Bullied as a teen for being overweight, Bob Stone (Dwayne Johnson) shows up to his high school reunion looking fit and muscular. Claiming to be on a top-secret ...</p></li>-->
<!--			<li><img src="images/6.jpg" alt=" "><p class='title'>Ice Age</p><p class='description'>In the film's epilogue, Scrat keeps struggling to control the alien ship until it crashes on Mars, destroying all life on the planet.</p></li>-->
<!--			<li><img src="images/7.jpg" alt=" "><p class='title'>X - Man</p><p class='description'>In 1977, paranormal investigators Ed (Patrick Wilson) and Lorraine Warren come out of a self-imposed sabbatical to travel to Enfield, a borough in north ...</p></li>-->
		</ul>   	
    </div>
    <script src="js/jquery.slidey.js"></script>
    <script src="js/jquery.dotdotdot.min.js"></script>
	   <script type="text/javascript">
			$("#slidey").slidey({
				interval: 8000,
				listCount: 5,
				autoplay: false,
				showList: true
			});
			$(".slidey-list-description").dotdotdot();
		</script>
<!-- //banner -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">






                    <?php

                    $rslt =mysqli_query($connect, $query);

                    while($row = mysqli_fetch_assoc($rslt)){
                        $movie_id = $row['id'];
                    $movie_category = $row['category'];
                    $movie_name = $row['name'];
                    $movie_year = $row['year'];
                    $movie_trailer = $row['trailer'];
                    $movie_price = $row['price'];
                    $movie_poster = $row['poster'];
                    $movie_source = $row['source'];
                    $movie_summary = $row['summary'];




                    ?>






                    <div class="item">
                        <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                            <a href="single.php?id=<?php echo $movie_id ?>" class="hvr-shutter-out-horizontal"><img src="posters/<?php echo $movie_poster ?>" title="album-name" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="single.php?id=<?php echo $movie_id ?>"> <?php echo $movie_name ?></a></h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p><?php echo $movie_year ?></p>

                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>
                    </div>





<?php  } ?>










				</div>
			</div>			
		</div>
	</div>
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
		<h4 class="latest-text w3_latest_text">Featured Movies</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Featured</a></li>
					<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Top Sold</a></li>
					<li role="presentation"><a href="#rating" id="rating-tab" role="tab" data-toggle="tab" aria-controls="rating" aria-expanded="true">Top Rating</a></li>
					<li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab" aria-controls="imdb" aria-expanded="false">Recently Added</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">


						<div class="w3_agile_featured_movies">


                            <?php


                            $query = "SELECT * FROM movie ";
                            $rslt = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($rslt)){


                                $movie_category = $row['category'];
                                $movie_name = $row['name'];
                                $movie_year = $row['year'];
                                $movie_trailer = $row['trailer'];
                                $movie_price = $row['price'];
                                $movie_poster = $row['poster'];
                                $movie_source = $row['source'];
                                $movie_summary = $row['summary'];
                                $movie_id = $row['id'];
                                $movie_image = $row['image'];





                                ?>






                                <div class="col-md-2 w3l-movie-gride-agile">
                                    <a href="single.php?id=<?php echo $movie_id ?>" class="hvr-shutter-out-horizontal"><img src="images/<?php echo $movie_image ?>" title="album-name" class="img-responsive" alt=" " />
                                        <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_w3layouts_mid_1_home">
                                        <div class="w3l-movie-text">
                                            <h6><a href="single.php?id=<?php echo $movie_id ?>"> <?php echo $movie_name ?></a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p><?php echo $movie_year ?></p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                </div>

                            <?php  } ?>


							<div class="clearfix"> </div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">

                        <?php


                        $query = "SELECT * FROM movie ORDER BY sold DESC";
                        $rslt = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_assoc($rslt)){


                            $movie_category = $row['category'];
                            $movie_name = $row['name'];
                            $movie_year = $row['year'];
                            $movie_trailer = $row['trailer'];
                            $movie_price = $row['price'];
                            $movie_poster = $row['poster'];
                            $movie_source = $row['source'];
                            $movie_summary = $row['summary'];
                            $movie_id = $row['id'];
                            $movie_image = $row['image'];





                            ?>






                            <div class="col-md-2 w3l-movie-gride-agile">
                                <a href="single.php?id=<?php echo $movie_id ?>" class="hvr-shutter-out-horizontal"><img src="images/<?php echo $movie_image ?>" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.php?id=<?php echo $movie_id ?>"> <?php echo $movie_name ?></a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p><?php echo $movie_year ?></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            </div>

                        <?php  } ?>




                        <div class="clearfix"> </div>
					</div>



					<div role="tabpanel" class="tab-pane fade" id="rating" aria-labelledby="rating-tab">

                        <?php


                        $query = "SELECT * FROM movie ORDER BY imdb_rating DESC";
                        $rslt = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_assoc($rslt)){


                            $movie_category = $row['category'];
                            $movie_name = $row['name'];
                            $movie_year = $row['year'];
                            $movie_trailer = $row['trailer'];
                            $movie_price = $row['price'];
                            $movie_poster = $row['poster'];
                            $movie_source = $row['source'];
                            $movie_summary = $row['summary'];
                            $movie_id = $row['id'];
                            $movie_image = $row['image'];





                            ?>






                            <div class="col-md-2 w3l-movie-gride-agile">
                                <a href="single.php?id=<?php echo $movie_id ?>" class="hvr-shutter-out-horizontal"><img src="images/<?php echo $movie_image ?>" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.php?id=<?php echo $movie_id ?>"> <?php echo $movie_name ?></a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p><?php echo $movie_year ?></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            </div>

                        <?php  } ?>




						<div class="clearfix"> </div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="imdb" aria-labelledby="imdb-tab">



                        <?php


                        $query = "SELECT * FROM movie ORDER BY id DESC";
                        $rslt = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_assoc($rslt)){


                            $movie_category = $row['category'];
                            $movie_name = $row['name'];
                            $movie_year = $row['year'];
                            $movie_trailer = $row['trailer'];
                            $movie_price = $row['price'];
                            $movie_poster = $row['poster'];
                            $movie_source = $row['source'];
                            $movie_summary = $row['summary'];
                            $movie_id = $row['id'];
                            $movie_image = $row['image'];





                            ?>






						<div class="col-md-2 w3l-movie-gride-agile">
							<a href="single.php?id=<?php echo $movie_id ?>" class="hvr-shutter-out-horizontal"><img src="images/<?php echo $movie_image ?>" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.php?id=<?php echo $movie_id ?>"> <?php echo $movie_name ?></a></h6>
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p><?php echo $movie_year ?></p>

									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>

                        <?php  } ?>


						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //general -->
<!-- Latest-tv-series -->
	<div class="Latest-tv-series">
		<h4 class="latest-text w3_latest_text w3_home_popular">Most Popular Movies</h4>
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">


                                <?php


                                $query = "SELECT * FROM movie ORDER BY sold DESC";
                                $rslt = mysqli_query($connect, $query);
                                while($row = mysqli_fetch_assoc($rslt)){


                                    $movie_category = $row['category'];
                                    $movie_name = $row['name'];
                                    $movie_year = $row['year'];
                                    $movie_trailer = $row['trailer'];
                                    $movie_price = $row['price'];
                                    $movie_poster = $row['poster'];
                                    $movie_source = $row['source'];
                                    $movie_summary = $row['summary'];
                                    $movie_id = $row['id'];
                                    $movie_image = $row['image'];
                                    $movie_imdb_rating = $row['imdb_rating'];





                                    ?>


                        <li>
                            <div class="agile_tv_series_grid">





                            <div class="col-md-6 agile_tv_series_grid_left">
                                        <div class="w3ls_market_video_grid1">
                                            <img src="posters/<?php echo $movie_poster; ?>" alt=" " class="img-responsive" />
                                            <a class="w3_play_icon" href="#small-dialog<?php echo $movie_id ?>">
                                                <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
                                            </a>
                                        </div>
                                    </div>




								<div class="col-md-6 agile_tv_series_grid_right">
									<p class="fexi_header"><?php echo $movie_name ?></p>
									<p class="fexi_header_para"><span class="conjuring_w3">Summary: <label>:</label></span> <?php echo $movie_summary ?></p>
									<p class="fexi_header_para"><span>Release Year<label>:</label></span> <?php  echo $movie_year; ?> </p>
									<p class="fexi_header_para">
										<span>Genres<label>:</label> </span>
										<a href="genres.php?genre=<?php  echo $movie_category; ?>"><?php  echo $movie_category; ?></a> |
									</p>
									<p class="fexi_header_para fexi_header_para1"><span>IMDB Rating<label>:</label></span>
                                    <p> <?php echo $movie_imdb_rating; ?> </p>
<!--										<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>-->
<!--										<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>-->
<!--										<a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>-->
<!--										<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>-->
<!--										<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>-->
									</p>
								</div>
                                <div class="clearfix"> </div>
                                <div class="agileinfo_flexislider_grids">


                                    <div id="small-dialog<?php echo $movie_id ?>" class="mfp-hide">
                                        <!--		<iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>-->
                                        <iframe src="<?php echo $movie_trailer; ?>"></iframe>

                                    </div>


                                <?php  } ?>






					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
	</div>
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
<!--	<div id="small-dialog" class="mfp-hide">-->
<!--<!--		<iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>-->-->
<!--        <iframe src="https://www.youtube.com/embed/d2S8D_SCAJY"></iframe>-->
<!---->
<!--	</div>-->






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
	<?php include "footer.php";  ?>
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