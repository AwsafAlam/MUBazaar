<?php
session_start();

include "db.php";

if(isset($_GET['type'])){
    $type = $_GET['type'];
    
    if($type == 'admin'){

        $admin_active_query = "UPDATE admin SET  admin_active = 'N' WHERE id = {$_SESSION['admin_id']};";
        mysqli_query($connect, $admin_active_query);


        $_SESSION['admin_name'] = null;
        $_SESSION['admin_id'] = null;
        unset($_SESSION['admin_id'] );
        unset($_SESSION['admin_name']);

//        unset($_SESSION['entered']);

        header("Location: index.php");
    }
    else if($type == 'customer'){


        $customer_deactive_query = "UPDATE customer SET  customer_active = 'N' WHERE id = {$_SESSION['customer_id']};";
        mysqli_query($connect, $customer_deactive_query);
        
        $_SESSION['customer_name'] = null;
        $_SESSION['customer_id'] = null;
        $_SESSION['customer_email'] = null;
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_email']);
        if(isset($_SESSION['is_buetian'])){
            $_SESSION['is_buetian'] = null;
            unset($_SESSION['is_buetian']);

        }

//        unset($_SESSION['entered']);

        header("Location: index.php");
    }
}



?>