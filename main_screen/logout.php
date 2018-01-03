<?php
session_start();

if(isset($_GET['type'])){
    $type = $_GET['type'];
    
    if($type == 'admin'){
        $_SESSION['admin_name'] = null;
        unset($_SESSION['admin_name']);
        header("Location: index.php");
    }
    else if($type == 'customer'){
        
        $_SESSION['customer_name'] = null;
        $_SESSION['customer_id'] = null;
        $_SESSION['customer_email'] = null;
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_email']);
        if(isset($_POST['is_buetian'])){
            unset($_SESSION['is_buetian']);
        }

        header("Location: index.php");
    }
}



?>