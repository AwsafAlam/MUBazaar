<body style="color:white;">
        <div id="content_zoom" class="container">
        <?php 
        $query = "SELECT * FROM wishlist WHERE customer_id = {$_SESSION['customer_id']};";
        $query_result = mysqli_query($connect,$query);
        if(mysqli_num_rows($query_result) !== 0){


        ?>
        

            <table style="color:white;" class="table table-bordered">

                <thead>
                    <tr>
                        <th style="text-align:center">Wishlist ID</th>
                        <th style="text-align:center">Product Category</th>
                        <th style="text-align:center">Product ID</th>
                        <th style="text-align:center">Product Name</th>
                        <th style="text-align:center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

            while($query_rows = mysqli_fetch_assoc($query_result)){

                $customer_id = $query_rows['customer_id'];
                $wishlist_id = $query_rows['id'];
                $product_category = $query_rows['product_category'];
                $product_id = $query_rows['product_id'];

                $prod_q = "SELECT name FROM product WHERE category = '{$product_category}' AND id = {$product_id}";
                $prod_rslt = mysqli_query($connect, $prod_q);
                $prod_row = mysqli_fetch_assoc($prod_rslt);

                $product_name = $prod_row['name'];
                echo "<tr>";
                echo "<td align='center'>{$wishlist_id}</td>";
                echo "<td align='center'>{$product_category}</td>";
                echo "<td align='center'>{$product_id}</td>";
                echo "<td align='center'><a href='preview_edit.php?table={$product_category}&id={$product_id}#prod_zoom' target='_blank'>{$product_name}</a></td>";
                
                
//                echo "<td align='center'><p data-placement='top' data-toggle='tooltip' title='Delete'><form action='' method='post'><button type='submit' name='remove_wish' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></form></p></td>";
                
                echo "<td align='center'><a href = 'show_content.php?source=wishlist&action=delete&prod_cat={$product_category}&prod_id={$product_id}' style='color:white;' class='trash-button delete_anchor glyphicon glyphicon-trash'></a></p></td>";

                echo "</tr>";
            }


                    ?>


                </tbody>

            </table>
        

        <?php }else{ ?>
        
            <div class="jumbotron">
                <h1>Your wishlist is empty</h1> 
            </div>
        
        <?php } ?>
        
        </div>

    </body>
    
   
<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $customer_id = $_SESSION['customer_id'];
    $product_category = $_GET['prod_cat'];
    $product_id = $_GET['prod_id'];
    
    $cart_query = "DELETE FROM wishlist WHERE customer_id = {$customer_id} AND ";
    $cart_query .= "product_category = '{$product_category}' AND product_id = {$product_id};";

    $cart_query_rslt = mysqli_query($connect,$cart_query);
    if(!$cart_query_rslt){
        die(mysqli_error($connect));
    }
    header("Location: show_content.php?source=wishlist#content_zoom");

}

?>