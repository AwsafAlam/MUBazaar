<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 12/31/2017
 * Time: 6:58 PM
 */

include "../db.php";

$query = "CALL PROCEDURE3(1152017);";

$rslt = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($rslt)){
    echo $row['customer_id'];
}



?>