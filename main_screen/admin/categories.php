<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <!--  Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">



        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
<!--
                    <h1 class="page-header">
                        Welcome to Admin!
                        <small>Author</small>
                    </h1>
-->




                    <div class="col-xs-6">
                        <h1>Add Product</h1>





                        <?php 

    if(isset($_GET['add'])){
        include "includes/update_categories.php";
    }
                        ?>


                    </div> <!-- Add category form -->

                    <div class="col-xs-6">


                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                // Find all categories query

                                $query = "SELECT * FROM category";
                                $select_categories = mysqli_query($connect,$query);

                                while($row = mysqli_fetch_assoc($select_categories)){
                                    $cat_id = $row['Category_ID'];
                                    $cat_title = $row['Category_Name'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>"; 
                                    $url_category = strtolower(str_replace(" ","_",$cat_title));
                                    echo "<td><a href='categories.php?add={$url_category}'>Add product to this category</a></td>";                                   
                                    echo "</tr>";

                                }

                                ?>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>