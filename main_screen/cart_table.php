<?php
$total_cost = 0;
$query = "SELECT * FROM shopping_cart WHERE customer_id = {$_SESSION['customer_id']};";
$query_result = mysqli_query($connect,$query);
if(mysqli_num_rows($query_result) !== 0){


    ?>


    <table style="color:black;" class="table table-bordered">

        <thead>
        <tr>
            <th style="text-align:center">Cart ID</th>
            <th style="text-align:center">Product Category</th>
            <th style="text-align:center">Product ID</th>
            <th style="text-align:center">Product Name</th>
            <th style="text-align:center">Quantity</th>
            <th style="text-align:center">Cost</th>
            <th style="text-align:center">Remove</th>
        </tr>
        </thead>
        <tbody>
        <?php

        while($query_rows = mysqli_fetch_assoc($query_result)){

            $customer_id = $query_rows['customer_id'];
            $_POST['customer_id'] = $customer_id;

            $cart_id = $query_rows['cart_id'];
            $product_category = $query_rows['prod_category'];
            $_POST['product_category'] = $product_category;

            $product_id = $query_rows['prod_id'];
            $_POST['product_id'] = $product_id;

            $product_name = $query_rows['prod_name'];
            $product_quantity = $query_rows['prod_quantity'];
            $products_cost = $product_quantity * $query_rows['price_per_product'];
            $total_cost += $products_cost;
            $_SESSION['total_cost'] = $total_cost;

            echo "<tr>";
            echo "<td align='center'>{$cart_id}</td>";
            echo "<td align='center'>{$product_category}</td>";
            echo "<td align='center'>{$product_id}</td>";
            echo "<td align='center'><a  href='preview_edit.php?table={$product_category}&id={$product_id}#prod_zoom' target='_blank'>{$product_name}</a></td>";
            echo "<td align='center'>{$product_quantity}</td>";
            echo "<td align='center'>{$products_cost}</td>";



            //                echo "<td align='center'><p data-placement='top' data-toggle='tooltip' title='Delete'><form action='' method='post'> <button type='submit' name='remove_cart' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete'><a href = 'show_content.php?source=cart&prod_cat={$product_category}&prod_id={$product_id}&customer_id={$customer_id}' style='color:white;text-decoration: underline;' class='delete_anchor glyphicon glyphicon-trash'></a></button></form></p></td>";

            echo "<td align='center'><a  href = 'show_content.php?source=cart&action=delete&prod_cat={$product_category}&prod_id={$product_id}' style='color:white;' class='trash-button delete_anchor glyphicon glyphicon-trash'></a></p></td>";

        }


        ?>



        <tr>
            <td style="text-align:center;" colspan="7">Your Total Cost: <?php echo $total_cost; ?></td>
        </tr>




        <?php

        $card_type = '';
        $card_no = 0;
        ?>

        <?php

        $card_name = 'Choose Card';
        $checkout_message = '';
        $checkout_flag = false;
        ?>


        <?php
        if(isset($_GET['card_type']) && isset($_GET['card_no'])){

            $card_type = $_GET['card_type'];
            $card_name = $card_type;
            $card_no = $_GET['card_no'];
            $query = "SELECT Credit_Balance FROM credit_card WHERE Credit_No = {$card_no} AND Card_Type = '{$card_type}';";
            $rslt = mysqli_query($connect, $query);

            $row = mysqli_fetch_assoc($rslt);
            if($row['Credit_Balance'] < $total_cost){
                $checkout_message = "Insufficient Balance";
            }else{
                $checkout_flag = true;
            }
        }
        ?>




        </tbody>

    </table>



<?php } else{ ?>

    <div class="jumbotron">
        <h1>Your cart is empty</h1>
    </div>

<?php } ?>