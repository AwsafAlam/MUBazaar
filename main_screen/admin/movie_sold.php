<?php include "includes/admin_header.php" ?>
<?php include "../db.php" ?>
<?php require('../mailer.php'); ?>
<?php ob_start(); ?>


<?php

$distinct_movie_query = "SELECT DISTINCT category FROM movie;";
$distinct_movie_rslt = mysqli_query($connect, $distinct_movie_query);


$pi_lebel_movie= array();

$pi_val_movie= array();

while($distinct_movie_row = mysqli_fetch_assoc($distinct_movie_rslt)){
    array_push($pi_lebel_movie, $distinct_movie_row['category']);

    $cat =  $distinct_movie_row['category'];

    $p_query = "SELECT SUM(sold) FROM movie WHERE category =  '{$cat}';";

    $p_query_rslt = mysqli_query($connect, $p_query);
    $p_query_row = mysqli_fetch_assoc($p_query_rslt);
    array_push($pi_val_movie, $p_query_row['SUM(sold)']);

}

?>
    <link rel="stylesheet" type="text/css" href="includes/admin_header.php">

    <script src="./js/plotly-latest.min.js" type="text/javascript"></script>

    <script>




        jQuery(document).ready(function () {
            jQuery('#top_select').change(function () {
//           alert('Changed to ' + jQuery('#top_select').val());

                window.location.replace("top_customers.php?top_no=" +  jQuery('#top_select').val());

//           xhttp.open("GET", "top_customers.php?top_no=" +  jQuery('#top_select').val() , true);
//           xhttp.send();

            });
        });


    </script>



    <div id="wrapper">



        <!--  Navigation -->
        <?php include "includes/admin_navigation.php" ?>







        <h1 style="color: white;"> Category wise sale chart on MUMovies</h1>

        <div id="page-wrapper">






                <div class="container-fluid"  id="three"></div>
                <script type="text/javascript">
                    var values=<?php echo json_encode($pi_val_movie);?>;
                    var labels=<?php echo json_encode($pi_lebel_movie);?>;

                    var data=[{
                        values:values,labels:labels,type:'pie'
                    }];

                    var layout={
                        height:600,width:800
                    };

                    Plotly.newPlot('three',data,layout);

                </script>


            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>