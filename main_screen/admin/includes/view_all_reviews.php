<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>review</th>
            <th>Email</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>


        <?php

        $query = "SELECT * FROM review";
        $select_reviews = mysqli_query($connect,$query);

        while($row = mysqli_fetch_assoc($select_reviews)){
            $review_id = $row['review_id'];
            $review_author = $row['review_author'];
            $review_email = $row['review_email'];
            $review_content = $row['review_content'];
            $review_date = $row['review_date'];
            $product_table = $row['product_category'];
            $product_id = $row['product_id'];


            echo "<tr>";
            echo "<td>{$review_id}</td>";
//            echo "<td>{$review_post_id}</td>";
            echo "<td>{$review_author}</td>";
            echo "<td>{$review_content}</td>";





            //            $query = "SELECT * FROM categories WHERE cat_id = '{$review_category_id}'";
            //            $select_categories_id = mysqli_query($connect,$query);
            //
            //            $row = mysqli_fetch_assoc($select_categories_id);
            //            
            // 
            //   
            //
            //        echo "<td>{$row['cat_title']}</td>";
            
            
            
            

            echo "<td>{$review_email}</td>";
            
            $query = "SELECT * FROM `{$product_table}` WHERE id = $product_id;";
            $select_post_id_query = mysqli_query($connect,$query);
            $row = mysqli_fetch_assoc($select_post_id_query);
            $product_id = $row['id'];
            $product_name = $row['name'];
            
            
            echo "<td><a href='../preview_edit.php?table=$product_table&id=$product_id' target='_blank'>{$product_name}</a></td>";
            
            
            echo "<td>{$review_date}</td>";
            echo "<td><a href='review.php?delete={$review_id}'>Delete</a></td>";
            echo "</tr>";

        }

        ?>

    </tbody>
</table>

<?php

if(isset($_GET['delete'])){
    $the_review_id = $_GET['delete'];
    $query = "DELETE FROM review WHERE review_id = {$the_review_id}";
    $delete_query = mysqli_query($connect,$query);
    header("Location: review.php");

}
?>