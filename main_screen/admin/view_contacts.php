<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php ob_start(); ?>

<?php
    
    if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM contact WHERE id = {$id}";
    $delete_contact_query = mysqli_query($connect,$query);
    header("Location: view_contacts.php");
}
    
?>

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
                    <h1>Contacts</h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>


                            <?php

    $query = "SELECT * FROM contact;";
$select_contact = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($select_contact)){
    $contact_id = $row['id'];
    $contact_name = $row['name'];
    $contact_email = $row['email'];
    $contact_subject = $row['subject'];
    $contact_message = $row['message'];


    echo "<tr>";
    echo "<td>{$contact_id}</td>";
    echo "<td>{$contact_name}</td>";

    echo "<td>{$contact_email}</td>";
    echo "<td>{$contact_subject}</td>";
    echo "<td>{$contact_message}</td>";

 
    echo "<td><a href='view_contacts.php?delete={$contact_id}'>Delete</a></td>";
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