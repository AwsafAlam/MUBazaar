<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php ob_start(); ?>

<?php


?>
    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">

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

                    <h1>Community Polls</h1>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Poll Topic</th>
                            <th style="text-align: center;">Percentage</th>
                        </tr>
                        </thead>

                        <tbody>


                        <?php

                        if (isset($_SESSION['admin_name'])){

                            $count_query = "SELECT SUM(count) FROM community_poll;";
                            $count_polls_rslt = mysqli_query($connect, $count_query);
                            $count_polls_row = mysqli_fetch_assoc($count_polls_rslt);
//                            print_r($count_polls_row);
                            $total = $count_polls_row["SUM(count)"];


                            $view_all_polls_query = "SELECT * FROM community_poll";
                            $select_poll = mysqli_query($connect, $view_all_polls_query);

                            while ($row = mysqli_fetch_assoc($select_poll)) {
                                $poll_id = $row['id'];
                                $poll_topic = $row['poll_topic'];
                                $poll_count = $row['count'];
                                $poll_percentage = round($poll_count / $total * 100, 2);

                                echo "<tr>";
                                echo "<td>{$poll_id}</td>";
                                echo "<td>{$poll_topic}</td>";
                                echo "<td style='text-align: center;'>{$poll_percentage}%</td>";
                                echo "</tr>";
                            }
                            echo "<tr>";
                            echo "<td colspan='3' style='text-align: center;'>Total Polls: {$total}</td>";
                            echo "</tr>";

                        }


                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>