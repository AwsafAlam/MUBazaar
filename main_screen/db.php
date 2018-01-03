<?php

$connect = mysqli_connect('localhost','root','','ecommerce');

if(!$connect){
    die("Error connecting to database " . mysqli_error($connect));
}

?>