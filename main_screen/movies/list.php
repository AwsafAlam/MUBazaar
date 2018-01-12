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

<!-- faq-banner -->
	<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">Movies List</h4>
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li class="active">List</li>
					</ol>
				</div>
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
<!--							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">0 - 9</a></li>-->
							<li role="presentation"><a href="list.php?search=a">A</a></li>
							<li role="presentation"><a href="list.php?search=b">B</a></li>
							<li role="presentation"><a href="list.php?search=c">C</a></li>
							<li role="presentation"><a href="list.php?search=d">D</a></li>
							<li role="presentation"><a href="list.php?search=e">E</a></li>
							<li role="presentation"><a href="list.php?search=f">F</a></li>
							<li role="presentation"><a href="list.php?search=g">G</a></li>
							<li role="presentation"><a href="list.php?search=h">H</a></li>
							<li role="presentation"><a href="list.php?search=i">I</a></li>
							<li role="presentation"><a href="list.php?search=j">J</a></li>
							<li role="presentation"><a href="list.php?search=k">K</a></li>
							<li role="presentation"><a href="list.php?search=l">L</a></li>
							<li role="presentation"><a href="list.php?search=m">M</a></li>
							<li role="presentation"><a href="list.php?search=n">N</a></li>
							<li role="presentation"><a href="list.php?search=o">O</a></li>
							<li role="presentation"><a href="list.php?search=p">P</a></li>
							<li role="presentation"><a href="list.php?search=q">Q</a></li>
							<li role="presentation"><a href="list.php?search=r">R</a></li>
							<li role="presentation"><a href="list.php?search=s">S</a></li>
							<li role="presentation"><a href="list.php?search=t">T</a></li>
							<li role="presentation"><a href="list.php?search=u">U</a></li>
							<li role="presentation"><a href="list.php?search=v">V</a></li>
							<li role="presentation"><a href="list.php?search=w">W</a></li>
							<li role="presentation"><a href="list.php?search=x">X</a></li>
							<li role="presentation"><a href="list.php?search=y">Y</a></li>
							<li role="presentation"><a href="list.php?search=z">Z</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
									</div>
									<table id="table-breakpoint">
										<thead>
										  <tr>
											<th>Movie </th>
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





                                        if(isset($_GET['search'])){

//                                            $list_query = "SELECT * FROM movie WHERE LOWER(name) LIKE '{$_GET['search']}%' ORDER by name ASC;";
                                            $sKey = $_GET['search'];
                                            $list_query  = "CALL MOVIE_SEARCH('{$sKey}')";
                                            $list_rslt = mysqli_query($connect, $list_query);

                                        }else{
                                            $list_query = "SELECT * FROM movie ORDER by name ASC;";
                                            $list_rslt = mysqli_query($connect, $list_query);
                                        }

                                        while($list_row  = mysqli_fetch_assoc($list_rslt)){
                                            $movie_category = $list_row['category'];
                                            $movie_name = $list_row['name'];
                                            $movie_year = $list_row['year'];
                                            $movie_trailer = $list_row['trailer'];
                                            $movie_price = $list_row['price'];
                                            $movie_poster = $list_row['poster'];
                                            $movie_source = $list_row['source'];
                                            $movie_summary = $list_row['summary'];
                                            $movie_id = $list_row['id'];
                                            $movie_rating = $list_row['imdb_rating'];
                                            $movie_image= $list_row['image'];
                                            $movie_country= $list_row['country'];


                                        ?>
										  <tr>
											<td class="w3-list-img"><a target="_blank" href="single.php?id=<?php echo $movie_id; ?>"><img src="images/<?php echo $movie_image ?>" alt="" /> <span><?php echo $movie_name ?></span></a></td>
                                              <td><?php echo truncate($movie_summary, 100); ?></td>
											<td><?php echo $movie_year ?></td>
											<td class="w3-list-info"><a href="genres.php"><?php echo $movie_country ?></a></td>
											<td class="w3-list-info"><a href="comedy.html"><?php echo $movie_category ?></a></td>
											<td><?php echo $movie_rating ?></td>
										  </tr>

                                        <?php } ?>

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