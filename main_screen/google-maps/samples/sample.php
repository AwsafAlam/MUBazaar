<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 1/3/2018
 * Time: 12:10 AM
 */

echo $_POST['shipping_address'];

echo " --> ";

echo $_SESSION['total_cost'];

echo " --> ";

echo $_SESSION['delivery_cost'];


/*
 *
 * unset cost related session variables
 */

?>