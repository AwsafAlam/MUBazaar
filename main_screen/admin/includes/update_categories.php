<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="cat_title">Category Name</label>


        <?php

        $cat_table = $_GET['add'];

        if(isset($_POST['add_product'])){

            $category_table = $_GET['add'];
////            $post_image_1 = $_FILES['image_1']['name'];
//            $post_image_temp_1 = $_FILES['image_1']['tmp_name'];
//            move_uploaded_file($post_image_temp_1,"../images/$category_table/$post_image_1");
//            echo $post_image_1;


            $sub_category = $_POST['sub_category'];
            $sub_category = mysqli_real_escape_string($connect,$sub_category);
            $name = $_POST['name'];
            $name = mysqli_real_escape_string($connect,$name);
            $description = $_POST['description'];
            $description = mysqli_real_escape_string($connect,$description);
            $price = $_POST['price'];
            $product_model = $_POST['product_model'];
            $shipping_weight = $_POST['shipping_weight'];
            $units_in_stock = $_POST['units_in_stock'];

            $image_1 =  $_FILES['image_1']['name'];
            $post_image_temp_1 = $_FILES['image_1']['tmp_name'];
            $image_1 = mysqli_real_escape_string($connect,$image_1);
            move_uploaded_file($post_image_temp_1,"../images/$category_table/$image_1");

            $image_2 =  $_FILES['image_2']['name'];
            $post_image_temp_2 = $_FILES['image_2']['tmp_name'];
            $image_2 = mysqli_real_escape_string($connect,$image_2);
            move_uploaded_file($post_image_temp_2,"../images/$category_table/$image_2");

            $image_3 =  $_FILES['image_3']['name'];
            $post_image_temp_3 = $_FILES['image_3']['tmp_name'];
            $image_3 = mysqli_real_escape_string($connect,$image_3);
            move_uploaded_file($post_image_temp_3,"../images/$category_table/$image_3");

            $image_4 =  $_FILES['image_4']['name'];
            $post_image_temp_4 = $_FILES['image_4']['tmp_name'];
            $image_4 = mysqli_real_escape_string($connect,$image_4);
            move_uploaded_file($post_image_temp_4,"../images/$category_table/$image_4");



            $query = "INSERT INTO `{$cat_table}` ";
            $query .= "(sub_category,name,description,price,product_model,shipping_weight,units_in_stock,image_1,image_2,image_3,image_4) ";
            $query .= "VALUES('{$sub_category}', '{$name}', '{$description}', '{$price}', '{$product_model}', '{$shipping_weight}', '{$units_in_stock}', '{$image_1}', '{$image_2}', '{$image_3}', '{$image_4}');";

//            echo $query;

            $rslt = mysqli_query($connect,$query);
            if(!$rslt){
                die("FAILED " . mysqli_error($connect));
            }

            //$offer = $_POST['offer_name'];
            $product_id = $connect->insert_id;
            foreach ($_POST['offer_name'] as $select)
            {
                //echo "You have selected :" .$select; // Displaying Selected Value
                $query = "INSERT INTO product_offer (table_name, product_id, offer) VALUES ('{$cat_table}', '{$product_id}', '{$select}')";
                $rslt = mysqli_query($connect,$query);
                if(!$rslt){
                    die("FAILED " . mysqli_error($connect));
                }
            }

        }




        ?>

        <input value="<?php if(isset($cat_table)){echo $cat_table;} ?>" type="text" class="form-control" name="cat_title" readonly>



        <?php
        // UPDATE QUERY

        if(isset($_POST['update_category'])){

            $the_cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id};";
            $update_query = mysqli_query($connection,$query);

            if(!$update_query){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }




        ?>



    </div>

    <div class="form-group">
        <label for="cat_title">Sub Category</label>
        <input required = "" type="text" class="form-control" name="sub_category">
    </div>

    <div class="form-group">
        <label for="cat_title">Name</label>
        <input required = "" type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label for="cat_title">Description</label>
        <textarea class="form-control" name="description" required = "" type="text" cols="30" rows="10">

        </textarea>
        <!--        <input style="min-height:200px;" required = "" type="text" class="form-control" name="description">-->
    </div>

    <div class="form-group">
        <label for="cat_title">Price</label>
        <input required = "" type="text" class="form-control" name="price">
    </div>

    <div class="form-group">
        <label for="cat_title">Product Model</label>
        <input required = "" type="text" class="form-control" name="product_model">
    </div>

    <div class="form-group">
        <label for="cat_title">Shipping Weight</label>
        <input required = "" type="text" class="form-control" name="shipping_weight">
    </div>

    <div class="form-group">
        <label for="cat_title">Units In Stock</label>
        <input required = "" type="text" class="form-control" name="units_in_stock">
    </div>

    <div class="form-group">
        <label for="cat_title">Image 1</label>
        <input required = "" type="file"  name="image_1">
    </div>

    <div class="form-group">
        <label for="cat_title">Image 2</label>
        <input required = "" type="file"  name="image_2">
    </div>

    <div class="form-group">
        <label for="cat_title">Image 3</label>
        <input required = "" type="file" name="image_3">
    </div>

    <div class="form-group">
        <label for="cat_title">Image 4</label>
        <input required = "" type="file"  name="image_4">
    </div>

    <div class="form-group">
        <label for="sel2">Mutiple select list (hold shift to select more than one):</label>
        <select multiple class="form-control" id="sel2" name="offer_name[]">
            <option value="summer">summer</option>
            <option value="winter">winter</option>
            <option value="eid">eid</option>
            <option value="none">none</option>
        </select>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_product" value="Add Product">
    </div>
</form>