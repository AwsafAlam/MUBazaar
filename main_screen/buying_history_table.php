<?php


    if(isset($_GET['prod_cat']) && isset($_GET['order_id']) && isset($_GET['prod_id'])){
        ob_start();
        $customer_id = $_SESSION['customer_id'];
        $prod_cat = $_GET['prod_cat'];
        $order_id = $_GET['order_id'];
        $product_id = $_GET['prod_id'];
        $delete_query = "DELETE  FROM customer_ordered_products WHERE  order_id = {$order_id}  AND product_category = '{$prod_cat}' AND product_id = {$product_id};";
        mysqli_query($connect, $delete_query);
//        header('Location: '.$_SERVER['REQUEST_URI']);


    }
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<thead>
                            <tr>
                                <th style="text-align:center">Order ID</th>
                                <th style="text-align:center">Shipping Addrress</th>
                                <th style="text-align:center">Product Category</th>
                                <th style="text-align:center">Product Name</th>
                                <th style="text-align:center">Quantity</th>
                                <th style="text-align:center">Total Cost<br>BDT</th>
                                <th style="text-align:center">Shipping Status</th>
                                <th style="text-align:center">Shipped Date </th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php

                            $query = "SELECT * FROM customer_order JOIN customer_ordered_products USING(order_id) WHERE customer_id = {$customer_id};";
                            $rslt = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_assoc($rslt)) {


                                $order_id = $row['order_id'];
                                $shipping_address = $row['shipping_address'];
                                $product_category = $row['product_category'];

                                $shipping_status = $row['shipping_status'];
                                $shipped_date = $row['shipped_date'];

                                $product_id = $row['product_id'];

                                $product_quantity = $row['product_quantity'];
                                $total_cost = $row['total_cost'];

                                $rowspanQuery = "SELECT COUNT(order_id) FROM customer_order JOIN customer_ordered_products USING(order_id) WHERE customer_id = {$customer_id} AND order_id = {$order_id};";
                                $rowspanQueryRslt = mysqli_query($connect, $rowspanQuery);
                                $rowspanQueryRow = mysqli_fetch_assoc($rowspanQueryRslt);
                                $rowspan =  $rowspanQueryRow['COUNT(order_id)'];

                                if($rowspan == 1){
                                    echo "<tr>";
                                    echo "<td align='center'>{$order_id}</td>";
                                    echo "<td  align='center'>{$shipping_address}</td>";


                                    $name_query = "SELECT name FROM `{$product_category}` WHERE id = {$product_id};";
                                    $name_rslt = mysqli_query($connect, $name_query);
                                    $name_row = mysqli_fetch_assoc($name_rslt);
                                    $prod_cat = $product_category;

                                    switch ($product_category) {
                                        case 'office_supplies':
                                            $product_category = "Office Supplies";
                                            break;
                                        case 'sports_equipments':
                                            $product_category = 'Sports';
                                            break;
                                        case 'electronics':
                                            $product_category = 'Electronics';
                                            break;
                                        case 'clothes':
                                            $product_category = 'Clothes';
                                            break;
                                        case 'appliances':
                                            $product_category = 'Appliances';
                                            break;
                                    }

                                    echo "<td align='center'>{$product_category}</a></td>";

                                    echo "<td align='center'>{$name_row['name']}</td>";
                                    echo "<td align='center'>{$product_quantity}</td>";
                                    echo "<td align='center'>{$total_cost}</td>";

//                                    if ($_shipping_status == 'shipped') {
//                                        echo "<td align='center'><a class='material-icons' style='color:green;' title='verified'>verified_user</a></td>";
//                                    } else{
//                                        echo "<td  align='center'><input type='checkbox' name='shipping_status[]' value='{$order_id}'></td>";
//                                    }

                                    if ($shipping_status == 'shipped') {
                                        echo "<td align='center'><a class=\"material-icons\">local_shipping</a></td>";
                                    }else{
                                        echo "<td align='center'>In queue</td>";
                                    }

                                    echo "<td align='center'>{$shipped_date}</td>";
//                                echo "<td align='center'>Remove</td>";
                                    echo "</tr>";

                                }else{

                                    echo "<tr>";
                                    echo "<td rowspan='{$rowspan}' align='center'>{$order_id}</td>";
                                    echo "<td rowspan='{$rowspan}' align='center'>{$shipping_address}</td>";


                                    $name_query = "SELECT name FROM `{$product_category}` WHERE id = {$product_id};";
                                    $name_rslt = mysqli_query($connect, $name_query);
                                    $name_row = mysqli_fetch_assoc($name_rslt);
                                    $prod_cat = $product_category;

                                    switch ($product_category) {
                                        case 'office_supplies':
                                            $product_category = "Office Supplies";
                                            break;
                                        case 'sports_equipments':
                                            $product_category = 'Sports';
                                            break;
                                        case 'electronics':
                                            $product_category = 'Electronics';
                                            break;
                                        case 'clothes':
                                            $product_category = 'Clothes';
                                            break;
                                        case 'appliances':
                                            $product_category = 'Appliances';
                                            break;
                                    }

                                    echo "<td align='center'>{$product_category}</a></td>";

                                    echo "<td align='center'>{$name_row['name']}</td>";
                                    echo "<td align='center'>{$product_quantity}</td>";
                                    echo "<td rowspan='{$rowspan}'>{$total_cost}</td>";
                                    if ($shipping_status == 'shipped') {
                                        echo "<td rowspan='{$rowspan}' align='center'><a class=\"material-icons\">local_shipping</a></td>";
                                    }else{
                                        echo "<td rowspan='{$rowspan}' align='center'>In queue</td>";
                                    }
                                    echo "<td rowspan='{$rowspan}' align='center'>{$shipped_date}</td>";
//                                echo "<td align='center'>Remove</td>";
                                    echo "</tr>";

                                    for($i = 1; $i < $rowspan; $i++){

                                        $row = mysqli_fetch_assoc($rslt);

                                        $order_id = $row['order_id'];
                                        $shipping_address = $row['shipping_address'];
                                        $product_category = $row['product_category'];

                                        $product_id = $row['product_id'];

                                        $product_quantity = $row['product_quantity'];
                                        $total_cost = $row['total_cost'];




                                        echo "<tr>";
//                                        echo "<td align='center'>{$shipping_address}</td>";


                                        $name_query = "SELECT name FROM `{$product_category}` WHERE id = {$product_id};";
                                        $name_rslt = mysqli_query($connect, $name_query);
                                        $name_row = mysqli_fetch_assoc($name_rslt);
                                        $prod_cat = $product_category;

                                        switch ($product_category) {
                                            case 'office_supplies':
                                                $product_category = "Office Supplies";
                                                break;
                                            case 'sports_equipments':
                                                $product_category = 'Sports';
                                                break;
                                            case 'electronics':
                                                $product_category = 'Electronics';
                                                break;
                                            case 'clothes':
                                                $product_category = 'Clothes';
                                                break;
                                            case 'appliances':
                                                $product_category = 'Appliances';
                                                break;
                                        }

                                        echo "<td align='center'>{$product_category}</a></td>";

                                        echo "<td align='center'>{$name_row['name']}</td>";
                                        echo "<td align='center'>{$product_quantity}</td>";
//                                        echo "<td align='center'>{$total_cost}</td>";
//                                echo "<td align='center'>Remove</td>";
                                        echo "</tr>";




                                    }
















                                }
                            }
                            ?>


</tbody>

