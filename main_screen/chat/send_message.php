<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 1/6/2018
 * Time: 3:54 PM
 */




$chat_content = $_POST['message'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../db.php";



if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
}

$admin_id = $_POST['adminId'];
$date = date("Y-m-d H:i:s");

$message_query  = "INSERT INTO chat (sender_id, recipient_id, chat_content, chat_time) VALUES({$customer_id}, {$admin_id}, '{$chat_content}', '{$date}' );";


mysqli_query($connect, $message_query);
