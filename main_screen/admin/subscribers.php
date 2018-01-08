<?php include "includes/admin_header.php" ;
require ('../mailer.php');?>



    <div id="wrapper">

    <!--  Navigation -->
    <?php include "includes/admin_navigation.php" ?>
    
    <?php

    $query = "SELECT * FROM movie_subscriber";
    $select_categories = mysqli_query($connect, $query);

    $subscribers = array();

     while ($row = mysqli_fetch_assoc($select_categories)) {
         $subscriber_email = $row['email'];
         array_push($subscribers, $subscriber_email);
     }

    if(isset($_POST['subscriber_btn'])){
            
            $message_body =$_POST['email_body'];
            $message_subject = $_POST['email_subject'];
            $message_title = $_POST['email_title'];



        foreach ($subscribers as $value) {

            $email = $value;
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
                                    <input class="btn btn-primary" type="submit" name="subscriber_btn" value="Send Email">
                                </div>



                        </form>


                    </div> <!-- Add category form -->

                    <div class="col-xs-6">


                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Subscribers (Recipients of this Email)</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            // Find all categories query


                            foreach ($subscribers as $value) {

                                echo "<tr>";
                                echo "<td>{$value}</td>";
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