<?php


function insert_categories(){
    
    global $connect;
    
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
            echo "This field should not be empty";
        }
        else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUES('{$cat_title}')";

            $create_category_query = mysqli_query($connect,$query);
            if(!$create_category_query){
                die("QUERY FAILED ". mysqli_error($connect));

            }
        }
    }
}


?>