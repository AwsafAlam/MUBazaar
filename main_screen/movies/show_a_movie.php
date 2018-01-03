<?php

include "../db.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$customer_id = $_SESSION['customer_id'];

$query = "SELECT * FROM customer ";
$query .= "WHERE ID = {$customer_id};";

$select_customer_query = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($select_customer_query);

$customer_name = $row['Customer_Name'];

$movie_id = 'invalid';

$has_movie = false;

if(isset($_GET['movie_id'])) {

    $movie_id = $_GET['movie_id'];
    $movie_query = "SELECT * FROM movie WHERE id = {$movie_id};";
    $movie_result = mysqli_query($connect, $movie_query);
    $movie_row  = mysqli_fetch_assoc($movie_result);
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



}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



    <title>Document</title>
</head>
<body style="background-color: #4b5257">


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><span style="color:white;">MU</span><span style="color:red;">Movies</span></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>

            <!--            <li><a href="#">Page 3</a></li>-->
        </ul>

        <ul class="nav navbar-nav" style="float: right">
            <li class="active" style="text-align: right;"><a href='../logout.php?type=customer'>Sign Out (<?php echo $customer_name ?>)</a></li>
        </ul>
    </div>
</nav>


<video poster="posters/<?php echo $movie_poster ?>" width="100%"  controls>
    <source  src="movies/<?php echo $movie_source; ?>" type="video/mp4">
    Your browser does not support the video tag.
</video>



</body>
</html>
