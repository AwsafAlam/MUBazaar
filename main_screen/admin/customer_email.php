<?php include "includes/admin_header.php" ;
require ('../mailer.php');?>



    <div id="wrapper">

    <!--  Navigation -->
    <?php include "includes/admin_navigation.php" ?>
    
    <?php

    $query = "SELECT Email, point, ID FROM customer ORDER BY point DESC";
    $select_categories = mysqli_query($connect, $query);

    $customers = array();
    $customer_points = array();
    $customer_ids = array();

     while ($row = mysqli_fetch_assoc($select_categories)) {
         $customer_email = $row['Email'];
         $customer_point = $row['point'];
         $customer_id = $row['ID'];
         array_push($customers, $customer_email);
         array_push($customer_points, $customer_point);
         array_push($customer_ids, $customer_id);
     }

    if(isset($_POST['customer_btn'])){
            
            $message_body =$_POST['email_body'];
            $message_subject = $_POST['email_subject'];
            $message_title = $_POST['email_title'];


        $status = $_POST['customer_ids'];

        $N = count($status);

        //echo("You selected $N door(s): ");
        for($i=0; $i < $N; $i++)
        {
            //echo($status[$i] . " ");

            $email = $customers[$status[$i]];
            $mailSender = new MailSender($email, $message_subject, $message_title, $message_body); // recipient, subject, title, body
            $mailSender->requestMailSend();
        }
        }
    
    ?>




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

                        <h4 style="font-weight: bold">From: mubazaar@gmail.com</h4>


                        <form action="" method="post">


                            <div class="form-group">
                                <label for="cat_title">Subject</label>
                                <input required = "" type="text" class="form-control" name="email_subject">
                            </div>

                            <div class="form-group">
                                <label for="cat_title">Title</label>
                                <input required = "" type="text" class="form-control" name="email_title">
                            </div>


                                <div class="form-group">
                                    <label for="cat_title">Body</label>
                                    <textarea class="form-control" name="email_body" required="" type="text"
                                              cols="30" rows="10">

                                    </textarea>
                                    <!--        <input style="min-height:200px;" required = "" type="text" class="form-control" name="description">-->
                                </div>


                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="customer_btn" value="Send Email">
                                </div>






                    </div> <!-- Add category form -->

                    <div class="col-xs-6">

                        <h4>Checked customers will receive this email</h4>

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Customers </th>
                                <th>Points </th>
                                <th>Check</th>
                            </tr>
                            </thead>
                            <tbody>



                            <?php
                            // Find all categories query


                            $i = 0;
                            foreach ($customers as $value) {

                                echo "<tr>";
                                echo "<td>{$value}</td>";
                                echo "<td>{$customer_points[$i]}</td>";
                                echo "<td><input type='checkbox' name='customer_ids[]' value='{$i}'></td>";
                                echo "</tr>";

                                $i++;

                            }

                            ?>


                            </tbody>
                        </table>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>