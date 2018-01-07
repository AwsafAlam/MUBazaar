<?php if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if(isset($_SESSION['customer_id'])){
            $customer_id = $_SESSION['customer_id'];

        }

    }
 ?>





<div class="header_top">
    <div style="text-align: right;"  >

        <?php
        $customer_image = 'default.png';
        if(isset($_SESSION['customer_id'])){
            $customer_id = $_SESSION['customer_id'];
            $query = "SELECT * FROM customer ";
            $query .= "WHERE ID = {$customer_id};";

            $select_customer_query = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($select_customer_query);

            if($row['image'] == null){
                $customer_image = 'default.png';
            }else{
                $customer_image = $row['image'];
            }

        }
        ?>
        <a style="margin-left: 10px"
            <?php if(isset($_SESSION['customer_id'])) { ?> href="my_profile.php" <?php }else{
        ?>
            href="sign_process.php"
                <?php } ?>
                class="pull-right"><img title="profile image"
                                                         width="40px"
                                                         height="40px"
                                                         class="img-circle img-responsive"
                                                         src="images/customers/<?php echo  $customer_image;?>"></a>
    </div>


    <div class="logo">
        <a href="index.php"><h1 style="color:white;font-size:75px;"><span style="color:red;">MU</span>Bazaar</h1></a><br>
    </div>
    

    <div class="header_top_right">
        <div class="search_box">

                <span style="color:white;">Search</span>

                <form action="search.php#categories" method="get">
                    <input name="searchText" type="text" value="" style="color:white;"><input name="searchSubmit" type="submit" value="1">

                </form>

            <div class="clear"></div>
        </div>

        
        <?php if(isset($_SESSION['customer_id'])) { ?>
        <div class="logo">
        <a target="_blank" href="show_credit.php"><h1 style="color:white;font-size:20px;"><span style="color:red;">Your Credit Card</span></h1></a>
        </div>
            <br>
        <div class="logo">
            <a target="_blank" href="add_card.php"><h1 style="color:white;font-size:20px;"><span style="color:red;">Add Credit Card</a>
        </div>
            <br>
            <div class="logo">
                <a target="_blank" href="chat/index.php"><h1 style="color:white;font-size:20px;"><span style="color:red;">Chat with Admin</a>
            </div>
            
            <?php }?>
        
    </div>
    <div class="clear"></div>
</div>     
<div class="header">
    <div class="navigation">
        <a class="toggleMenu" href="#">Menu</a>
        <ul class="nav">
            <li>
                <a href="index.php">Home</a>
            </li>
            <!--                    <li  class="test">-->

            <?php 

            $query = "SELECT Category_Name FROM category";
            $rslt = mysqli_query($connect,$query);
            while($row = mysqli_fetch_assoc($rslt)){
                $category_name = $row['Category_Name'];
                $link = str_replace(" ","_",$category_name).'.php'.'#categories';
                echo "<li>";
                echo"<a href=$link>$category_name</a>";

                $sub_category_query = "SELECT DISTINCT sub_category FROM " . strtolower(str_replace(" ","_",$category_name));
                $sub_category_result = mysqli_query($connect,$sub_category_query);
                echo "<ul>";
                while($sub_category_row = mysqli_fetch_assoc($sub_category_result)){

                    echo "<li>";
                    $sub_cat_link = strtolower(str_replace(" ","_",$category_name)).'.php' . "?sub_cat=";
                    $sub_cat_link .= $sub_category_row['sub_category'];
                    $sub_cat_link .= "#categories";
                    echo "<a href='$sub_cat_link'>{$sub_category_row['sub_category']}</a>";

                    echo "</li>";



                }
                echo "</ul>";

                echo"</li>";                                
            }

            echo"<li>";

                echo "<a target='_blank' href='movies/index.php'>Movies</a>";;

            echo"</li>";



            ?>


            

            <?php if(!isset($_SESSION['admin_name'])){ ?>

            <li>
                <?php if(isset($_SESSION['customer_name'])){
    echo "<a href='my_profile.php'>{$_SESSION['customer_name']}</a>";
}else{
    echo "<a href='sign_process.php'>Sign In / Register</a>";
}
                ?>
            </li>
            
            

            <?php }?>

            <?php if(!isset($_SESSION['customer_name'])){ ?>

            <li>
                <?php if(isset($_SESSION['admin_name'])){
                echo "<a href='admin/categories.php'>Admin: {$_SESSION['admin_name']}</a>";    
                }else{
                echo "<a href='admin/admin-login.php'>Admin</a>";
                }
                                                         


                ?>
            </li>

            <?php } ?>
            
            <?php if(isset($_SESSION['customer_name']) || isset($_SESSION['admin_name'])){?>
            
            <?php }?>
            
            <?php
            if(isset($_SESSION['customer_name'])){
                $itemsInCurtQ = "SELECT COUNT(*) FROM  shopping_cart WHERE customer_id = {$customer_id};";
                $rslt = mysqli_query($connect, $itemsInCurtQ);
                $row = mysqli_fetch_assoc($rslt);

                echo "<li>";
                echo "<a href='google-maps/samples/index.php'>My Cart(<span style='color: white;'>{$row['COUNT(*)']}</span>)</a>";
                echo "</li>";
                
                // Wishlist
                echo "<li>";
                echo "<a href='show_content.php?source=wishlist#content_zoom'>My Wishlist</a>";
                echo "</li>";

                echo "<li>";
                echo "<a href='buying_history.php#content_zoom'>History</a>";
                echo "</li>";
            }
            ?>
            
            <?php
            if(isset($_SESSION['customer_name'])){
                echo "<li>";
                echo "<a href='logout.php?type=customer'>Sign Out</a>";
                echo "</li>";
            }
            else if(isset($_SESSION['admin_name'])){
                echo "<li>";
                echo "<a href='logout.php?type=admin'>Sign Out</a>";
                echo "</li>";
            }
            
            ?>
            
            <li>
                <a href="contact.php">Contact Us</a>
            </li>

        </ul>
        <span class="left-ribbon"> </span> 
        <span class="right-ribbon"> </span>    
    </div>
</div>