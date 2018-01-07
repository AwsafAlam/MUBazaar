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
include "../../db.php";



if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $admin_name = $_SESSION['admin_name'];
}

$result_array = array();

$customer_id = $_POST['customerId'];

$message_query  = "SELECT * FROM chat WHERE (sender_id = {$admin_id} AND recipient_id = {$customer_id}) OR (sender_id = {$customer_id} AND recipient_id = {$admin_id}) ORDER BY chat_id ASC;";

$customer_name_q = "SELECT Customer_Name FROM customer WHERE ID = {$customer_id};";
$customer_rslt = mysqli_query($connect, $customer_name_q);
$customer_row = mysqli_fetch_assoc($customer_rslt);
$customer_name = $customer_row['Customer_Name'];

$message_rslt = mysqli_query($connect, $message_query);
while($message_row = mysqli_fetch_assoc($message_rslt)){

    if($message_row['sender_id'] >= 1152000){
        $sender_name = $customer_name;
    }else{
        $sender_name = $admin_name;
    }

    $myArray = array("sender_name" => $sender_name, "sender_id" => $message_row['sender_id'], "chat_content" => $message_row['chat_content'],  "chat_time" => $message_row['chat_time']);
    array_push($result_array, $myArray);
}


echo json_encode($result_array);