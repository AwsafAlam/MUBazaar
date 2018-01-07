<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>


<?php

include "../../db.php";

$admin_active_query = "UPDATE admin SET  admin_active = 'N' WHERE id = {$_SESSION['admin_id']};";
mysqli_query($connect, $admin_active_query);

$_SESSION['admin_name'] = null;

$_SESSION['admin_id'] = null;

header("Location: ../../index.php");

?>