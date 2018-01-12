<?php

include "../db.php";

require ('../mailer.php');

if(isset($_POST['email'])){
    $email = $_POST['email'];

    $subscriber_select_query = "SELECT SUBSCRIBER_ENTRY_CHECK('{$email}') ;";

//    $subscriber_select_query = "SELECT * FROM movie_subscriber WHERE email = '{$email}';";
    $subscriber_select_rslt = mysqli_query($connect, $subscriber_select_query);
//
//    if(mysqli_num_rows($subscriber_select_rslt) < 1){
$row = mysqli_fetch_assoc($subscriber_select_rslt);
if($row["SUBSCRIBER_ENTRY_CHECK('{$email}')"] != 'TRUE'){

//    echo $row["SUBSCRIBER_ENTRY_CHECK('{$email}')"];
        $subscriber_query = "INSERT INTO movie_subscriber(email) VALUES('{$email}');";
        mysqli_query($connect, $subscriber_query);
//
        $message_body = "MUMovies is glad to get you as a subscriber for monthly newsletter. Here you will find your favourite movies. Don't forget to let us know if your favourite movie is not in our database.";
        $message_email = $email;
        $mailSender = new MailSender($message_email, "MUMovies :: Welcome to the world of movies!!!", "Take a break & enjoy your favourite movies", $message_body);
//
        $mailSender->requestMailSend();
    }


}

?>

<div class="footer">
    <div class="container">
        <div class="w3ls_footer_grid">
            <div class="col-md-6 w3ls_footer_grid_left">
                <div class="w3ls_footer_grid_left1">
                    <h2>Subscribe to us</h2>
                    <div class="w3ls_footer_grid_left1_pos">
                        <form action="" method="post">
                            <input type="email" name="email" placeholder="Your email..." required="">
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 w3ls_footer_grid_right">
                <div >
                    <a href="index.php"><h1  style="font-family: 'Rancho', cursive; color:white;font-size:75px;"><span style="color:red;">MU</span>Movies</h1></a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-5 w3ls_footer_grid1_left">

        </div>
<!--        <div class="col-md-7 w3ls_footer_grid1_right">-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <a href="genres.php">Movies</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="faq.html">FAQ</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="horror.html">Action</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="genres.php">Adventure</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="comedy.html">Comedy</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="icons.html">Icons</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="contact.html">Contact Us</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
        <div class="clearfix"> </div>
    </div>
</div>