<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 1/2/2018
 * Time: 4:34 PM
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



$deliveryCost = 'undefined';

if(isset($_POST['minDist'])){
    $deliveryCost = $_POST['minDist'] * 2 ; // per km 2 taka
    $_SESSION['delivery_cost'] = $deliveryCost;

}

echo $deliveryCost;




?>