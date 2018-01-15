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

if(isset($_POST['minDist']) && isset($_POST['minBranch'])){
    $deliveryCost = $_POST['minDist'] * 2 ; // per km 2 taka
    $_SESSION['delivery_cost'] = $deliveryCost;
    $_SESSION['branchId'] = $_POST['minBranch'];
//    $branch_id = $_POST['branhc_id'];
//    $_SESSION['branch_id'] = 1;

}

echo $deliveryCost;




?>