<!--map start-->


<!--map start-->

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript"
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOBKqPPiHf3tX0QzB6wmG9q0_8R1mOWdg&sensor=true&libraries=places">
</script>

<script src="google-maps/js/jquery.placepicker.js"></script>




<script>

    $(document).ready(function() {


        // Basic usage
        $(".placepicker").placepicker();

        // Advanced usage
        $("#advanced-placepicker").each(function() {
            var target = this;
            var $collapse = $(this).parents('.form-group').next('.collapse');
            var $map = $collapse.find('.another-map-class');

            var placepicker = $(this).placepicker({
                map: $map.get(0),
                placeChanged: function(place) {
                    console.log("place changed: ", place.formatted_address, this.getLocation());
                }
            }).data('placepicker');
        });

    }); // END document.ready

</script>

<!--map end-->

<body style="color:white;">
    <div id="content_zoom" class="container">
        <?php 
        $total_cost = 0;
        $query = "SELECT * FROM shopping_cart WHERE customer_id = {$_SESSION['customer_id']};";
        $query_result = mysqli_query($connect,$query);
        if(mysqli_num_rows($query_result) !== 0){


        ?>


        <table style="color:white;" class="table table-bordered">

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

                <tr style="border-right-style:hidden;border-left-style:hidden;border-bottom-style:hidden;">
                    <td style="border-right-style:hidden;" colspan="5">
                        <form action="checkout_credit.php" method="post" id="cart_form">
                            <div class="form-group">

<!--                                <input  type="text" name="shipping_address" placeholder="Shipping Address" class="form-control" required="">-->


<!--                                <div class="row" data-example>-->
                                    <div class="col-md-12">
<!--                                        <form>-->
<!--                                            <div class="form-group">-->
                                                <input type="text" name="shipping_address" placeholder="Shipping Address" required class="form-control placepicker" data-map-container-id="collapseOne" />
<!--                                            </div>-->

                                            <div id="collapseOne" class="collapse">
                                                <div class="placepicker-map thumbnail"></div>
                                            </div>

<!--                                            <button type="submit" class="btn btn-default">Submit</button>-->
<!--                                        </form>-->
                                    </div>
<!--                                </div>-->





                            </div>


                    </td>




                    <td style="text-align:center;border: 0;" colspan="2">
                        <div style="text-align:center;">

                            <input

                                    form="cart_form" class="btn btn-primary btn-block" style="-moz-border-radius: 20px;
                                                                            -webkit-border-radius: 20px;
                                                                            border-radius: 20px;" type="submit" name="edit_customer" value="Proceed to checkout">
                        </div>


                    </td>

                </tr>


                </form>



                <tr style="border-right-style:hidden;border-left-style:hidden;border-bottom-style:hidden;">
                <td style="text-align:center;" colspan="7"><p style="color: red;"> <?php echo $checkout_message ?></p></td>
            </tr>



            </tbody>

        </table>



        <?php } else{ ?>

        <div class="jumbotron">
            <h1>Your cart is empty</h1> 
        </div>

        <?php } ?>

    </div>

</body>







<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js'></script>-->
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js'></script>-->
<!---->
<!--<script  src="js/credit_index.js"></script>-->
<!---->
<!--<!-- Latest compiled and minified JavaScript -->-->
<!--<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
<!--</script>-->
<!---->



<?php

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $customer_id = $_SESSION['customer_id'];
    $product_category = $_GET['prod_cat'];
    $product_id = $_GET['prod_id'];

    $cart_query = "DELETE FROM shopping_cart WHERE customer_id = {$customer_id} AND ";
    $cart_query .= "prod_category = '{$product_category}' AND prod_id = {$product_id};";

    $cart_query_rslt = mysqli_query($connect,$cart_query);
    if(!$cart_query_rslt){
        die(mysqli_error($connect));
    }
    header("Location: show_content.php?source=cart#content_zoom");

}

?>