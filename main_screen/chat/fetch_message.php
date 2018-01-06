<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 1/6/2018
 * Time: 3:04 PM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../db.php";



if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $customer_name = $_SESSION['customer_name'];
}

$result_array = array();

$admin_id = $_POST['adminId'];

$message_query  = "SELECT * FROM chat WHERE (sender_id = {$customer_id} AND recipient_id = {$admin_id}) OR (sender_id = {$admin_id} AND recipient_id = {$customer_id});";


$admin_name_q = "SELECT admin_name FROM admin WHERE id = {$admin_id};";
$admin_rslt = mysqli_query($connect, $admin_name_q);
$admin_row = mysqli_fetch_assoc($admin_rslt);
$admin_name = $admin_row['admin_name'];





$message_rslt = mysqli_query($connect, $message_query);
while($message_row = mysqli_fetch_assoc($message_rslt)){

    if($message_row['sender_id'] > 1152000){
        $sender_name = $customer_name;
    }else{
        $sender_name = $admin_name;
    }

    $myArray = array("sender_name" => $sender_name, "chat_content" => $message_row['chat_content'], "customer_name" => $customer_name, "chat_time" => $message_row['chat_time']);
    array_push($result_array, $myArray);
}


echo json_encode($result_array);