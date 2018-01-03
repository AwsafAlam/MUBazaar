<?php

include "../db.php";


if (session_status() == PHP_SESSION_NONE) {
    session_start();
//    $customer_id = $_SESSION['customer_id'];
}



$customer_id  = 0;
if(isset($_SESSION['customer_id'])){
    $customer_id = $_SESSION['customer_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>One Movies an Entertainment Category Flat Bootstrap Responsive Website Template | List :: w3layouts</title>
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
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
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
<!-- tables -->
<link rel="stylesheet" type="text/css" href="list-css/table-style.css" />
<link rel="stylesheet" type="text/css" href="list-css/basictable.css" />
<script type="text/javascript" src="list-js/jquery.basictable.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });
	   $('#table-breakpoint1').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint2').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint3').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint4').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint5').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint6').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint7').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint8').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint9').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint10').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint11').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint12').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint13').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint14').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint15').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint16').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint17').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint18').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint19').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint20').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint21').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint22').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint23').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint24').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint25').basictable({
        breakpoint: 768
      });
	  $('#table-breakpoint26').basictable({
        breakpoint: 768
      });
    });
  </script>
<!-- //tables -->
</head>
	
<body>
<!-- header -->
	<?php include "header.php" ?>
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
<!-- faq-banner -->
	<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">My Movies List</h4>
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li class="active">My Collection</li>
					</ol>
				</div>
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">

									</div>
									<table id="table-breakpoint">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
                                              <th>Summary</th>
											<th>Year</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>


                                        <?php



                                        function truncate($string, $length, $dots = "...") {
                                            return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
                                        }


                                        $list_query = "SELECT movie_id FROM movie_customer WHERE customer_id = {$customer_id};";
                                        $list_rslt = mysqli_query($connect, $list_query);
                                        while($list_row  = mysqli_fetch_assoc($list_rslt)){
                                            $movie_id = $list_row['movie_id'];
                                            $movie_query = "SELECT * FROM movie WHERE id = {$movie_id};";
                                            $movie_result = mysqli_query($connect, $movie_query);
                                            while($movie_row  = mysqli_fetch_assoc($movie_result)){

                                                $movie_category = $movie_row['category'];
                                                $movie_name = $movie_row['name'];
                                                $movie_year = $movie_row['year'];
                                                $movie_trailer = $movie_row['trailer'];
                                                $movie_price = $movie_row['price'];
                                                $movie_poster = $movie_row['poster'];
                                                $movie_source = $movie_row['source'];
                                                $movie_summary = $movie_row['summary'];
                                                $movie_rating = $movie_row['imdb_rating'];
                                                $movie_image= $movie_row['image'];
                                                $movie_country= $movie_row['country'];






                                        ?>
										  <tr>
											<td><?php echo $movie_id ?></td>
											<td class="w3-list-img"><a target="_blank" href="show_a_movie.php?movie_id=<?php echo $movie_id; ?>"><img src="images/<?php echo $movie_image ?>" alt="" /> <span><?php echo $movie_name ?></span></a></td>
                                              <td><?php echo truncate($movie_summary, 100); ?></td>
											<td><?php echo $movie_year ?></td>
											<td class="w3-list-info"><a href="genres.php"><?php echo $movie_country ?></a></td>
											<td class="w3-list-info"><a href="comedy.html"><?php echo $movie_category ?></a></td>
											<td><?php echo $movie_rating ?></td>
										  </tr>

                                        <?php } } ?>

										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="a" aria-labelledby="a-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>17</span></h4>
									</div>
									<table id="table-breakpoint1">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>17</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="b" aria-labelledby="b-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>12</span></h4>
									</div>
									<table id="table-breakpoint2">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="c" aria-labelledby="c-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>15</span></h4>
									</div>
									<table id="table-breakpoint3">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="d" aria-labelledby="d-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>16</span></h4>
									</div>
									<table id="table-breakpoint4">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="e" aria-labelledby="e-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>9</span></h4>
									</div>
									<table id="table-breakpoint5">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="f" aria-labelledby="f-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>14</span></h4>
									</div>
									<table id="table-breakpoint6">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="g" aria-labelledby="g-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>25</span></h4>
									</div>
									<table id="table-breakpoint7">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>17</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>18</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>19</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>20</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>21</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>22</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>23</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>24</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>25</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="h" aria-labelledby="h-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>17</span></h4>
									</div>
									<table id="table-breakpoint8">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>17</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="i" aria-labelledby="i-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>12</span></h4>
									</div>
									<table id="table-breakpoint9">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.htmlgenres.html">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="j" aria-labelledby="j-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>15</span></h4>
									</div>
									<table id="table-breakpoint10">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="k" aria-labelledby="k-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>16</span></h4>
									</div>
									<table id="table-breakpoint11">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="l" aria-labelledby="l-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>14</span></h4>
									</div>
									<table id="table-breakpoint12">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="m" aria-labelledby="m-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>25</span></h4>
									</div>
									<table id="table-breakpoint13">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>17</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>18</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>19</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>20</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>21</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>22</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>23</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>24</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>25</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="n" aria-labelledby="n-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>17</span></h4>
									</div>
									<table id="table-breakpoint14">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>17</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="o" aria-labelledby="o-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>12</span></h4>
									</div>
									<table id="table-breakpoint15">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="p" aria-labelledby="p-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>16</span></h4>
									</div>
									<table id="table-breakpoint16">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="q" aria-labelledby="q-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>09</span></h4>
									</div>
									<table id="table-breakpoint17">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="r" aria-labelledby="r-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>14</span></h4>
									</div>
									<table id="table-breakpoint18">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="s" aria-labelledby="s-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>17</span></h4>
									</div>
									<table id="table-breakpoint19">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>17</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="t" aria-labelledby="t-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>17</span></h4>
									</div>
									<table id="table-breakpoint20">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>17</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="u" aria-labelledby="u-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>12</span></h4>
									</div>
									<table id="table-breakpoint21">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="v" aria-labelledby="v-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>16</span></h4>
									</div>
									<table id="table-breakpoint22">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="w" aria-labelledby="w-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>09</span></h4>
									</div>
									<table id="table-breakpoint23">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="x" aria-labelledby="x-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>14</span></h4>
									</div>
									<table id="table-breakpoint24">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="y" aria-labelledby="y-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>17</span></h4>
									</div>
									<table id="table-breakpoint25">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>13</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>14</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>15</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>16</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>17</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="z" aria-labelledby="z-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>12</span></h4>
									</div>
									<table id="table-breakpoint26">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Status</th>
											<th>Country</th>
											<th>Genre</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>2</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n2.jpg" alt="" /> <span>001 Southside with you</span></a></td>
											<td>2011</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Korea</a></td>
											<td class="w3-list-info"><a href="genres.php">Drama</a></td>
											<td>7.5</td>
										  </tr>
										  <tr>
											<td>3</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n11.jpg" alt="" /> <span>12 Bad Moms</span></a></td>
											<td>2010</td>
											<td>SD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>6.5</td>
										  </tr>
										  <tr>
											<td>4</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n3.jpg" alt="" /> <span>2 Sausage Party</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>5</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n4.jpg" alt="" /> <span>2.0 Morgan</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United States</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>6</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n5.jpg" alt="" /> <span>24</span></a></td>
											<td>2016</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">India</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Drama</a></td>
											<td>9.0</td>
										  </tr>
										  <tr>
											<td>7</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n6.jpg" alt="" /> <span>001 The Secret Life of Pets</span></a></td>
											<td>2012</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Euro, France</a></td>
											<td class="w3-list-info"><a href="genres.php">Thriller, Crime, Drama</a></td>
											<td>8.2</td>
										  </tr>
										  <tr>
											<td>8</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n7.jpg" alt="" /> <span>12 Hell or High Water</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">China</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy</a></td>
											<td>8.9</td>
										  </tr>
										  <tr>
											<td>9</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n8.jpg" alt="" /> <span>2 Central Intelligence</span></a></td>
											<td>2010</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>10</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n9.jpg" alt="" /> <span>3 The Jungle Book</span></a></td>
											<td>2014</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">Japan</a></td>
											<td class="w3-list-info"><a href="genres.php">Action</a></td>
											<td>7.1</td>
										  </tr>
										  <tr>
											<td>11</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n10.jpg" alt="" /> <span>01 Independence Day</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										  <tr>
											<td>12</td>
											<td class="w3-list-img"><a href="single.php"><img src="images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2013</td>
											<td>HD</td>
											<td class="w3-list-info"><a href="genres.php">United Kingdom</a></td>
											<td class="w3-list-info"><a href="genres.php">Comedy, Drama</a></td>
											<td>7.0</td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
				</div>
			</div>
	</div>
<!-- //faq-banner -->
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