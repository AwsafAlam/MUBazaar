<?php
include "../../db.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$customer_id = $_SESSION['customer_id'];

$query = "SELECT * FROM customer ";
$query .= "WHERE ID = {$customer_id};";

$select_customer_query = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($select_customer_query);

$customer_name = $row['Customer_Name'];




$latitudeArray = array();
$longitudeArray = array();
$indexArray = array();
$shop_query = "SELECT * FROM shop_branch;";
$shop_rslt = mysqli_query($connect, $shop_query);


while($shop_row = mysqli_fetch_assoc($shop_rslt)){
    array_push($indexArray, $shop_row['id']);
    array_push($latitudeArray ,$shop_row['latitude']);
    array_push($longitudeArray ,$shop_row['longitude']);
}









?>


<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8"/>

    <title>placepicker</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!--    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->
<!--    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"></link>-->
<!--    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet"></link>-->
<!---->
<!--    <script type="text/javascript"-->
<!--      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOBKqPPiHf3tX0QzB6wmG9q0_8R1mOWdg&sensor=true&libraries=places">-->
<!--    </script>-->
<!---->
<!--    <script src="../src/js/jquery.placepicker.js"></script>-->
<!---->
<!---->
<!--      <script type="text/javascript" src="map_request.js" ></script>-->


      <script src="../src/js/jquery-3.2.1.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"></link>
      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet"></link>


      <script type="text/javascript"
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOBKqPPiHf3tX0QzB6wmG9q0_8R1mOWdg&sensor=true&libraries=places">
      </script>



      <script src="../src/js/jquery.placepicker.js"></script>


      <script>

          $(document).ready(function() {

              // Basic usage
              $(".placepicker").placepicker();

              // Advanced usage
              $("#advanced-placepicker").each(function() {
                  var target = this;
                  var $collapse = $(this).parents('.form-group').next('.collapse');
                  var $map = $collapse.find('.another-map-class');

                  var placepicker = $(this).placepicker({
                      map: $map.get(0),
                      placeChanged: function(place) {
                          var locationObj = this.getLocation();
                          console.log("place changed: ", place.formatted_address);
                          var origin = new google.maps.LatLng(locationObj.latitude, locationObj.longitude);
                          getDistance(locationObj);



                      }
                  }).data('placepicker');
              });

          }); // END document.ready

      </script>

      <script>

          var maxDistance = 9007199254740991;


          function ajaxPHPCall(minDistance, minBranch){
              // Create our XMLHttpRequest object
              var hr = new XMLHttpRequest();
              // Create some variables we need to send to our PHP file
              var url = "ajaxPHP.php";
              var fn = minDistance;

              var vars = "minDist="+fn + "&minBranch=" + minBranch;
              hr.open("POST", url, true);
              // Set content type header information for sending url encoded variables in the request


              hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


//        // Access the onreadystatechange event for the XMLHttpRequest object
              hr.onreadystatechange = function() {
                  if(hr.readyState === 4 && hr.status === 200) {
                      var return_data = hr.responseText;
                      document.getElementById("deliveryCost").innerHTML =   return_data + " Tk.";
                      var total_cost = parseFloat(document.getElementById('total_cost').innerHTML);
                      var grand_total_cost = total_cost + parseFloat(return_data);
                      document.getElementById('total_cost').innerHTML = grand_total_cost;

                  }
              };
              // Send the data to PHP now... and wait for response to update the status div
              hr.send(vars); // Actually execute the request
//        document.getElementById("status").innerHTML = "processing...";
          }



          function getDistance(locationObj){


              var idArr = <?php echo json_encode($indexArray);?>;

              var stringLatArr = <?php echo json_encode($latitudeArray);?>;
              var stringLongArr = <?php echo json_encode($longitudeArray);?>;

              var origins = [];

              for(var c = 0; c < stringLatArr.length; c++){

                  origins.push(new google.maps.LatLng(parseFloat(stringLatArr[c]), parseFloat(stringLongArr[c])));
              }



              var destination = new google.maps.LatLng(locationObj.latitude, locationObj.longitude);

              var destinations = [];

              destinations.push(destination);



              var service = new google.maps.DistanceMatrixService();
              service.getDistanceMatrix(
                  {
                      origins: origins,
                      destinations: destinations,
                      travelMode: 'DRIVING'
                  }, callback);

              function callback(response, status) {
                  if (status == 'OK') {
                      var origins = response.originAddresses;
                      var destinations = response.destinationAddresses;

                      var minDist = maxDistance;

                      var minIndex = undefined;

                      for (var i = 0; i < origins.length; i++) {
                          var results = response.rows[i].elements;
                          for (var j = 0; j < results.length; j++) {
                              try{
                                  var element = results[j];
                                  var distance = element.distance.text;
                                  var duration = element.duration.text;
                                  var from = origins[i];
                                  var to = destinations[j];
                                  console.log(from + "->" + to + " : " + distance);
                                  distance = distance.replace(/,/g, "");
                                  var fields = distance.split(' ');
                                  var actualDistance = fields[0];
                                  var unit = fields[1];
                                  if(unit === 'm')
                                      actualDistance = actualDistance / 1000;

                                  actualDistance = parseFloat(actualDistance);
                                  if(actualDistance < minDist){
                                      minDist = actualDistance;
                                      minIndex = i;
                                  }
                              }
                              catch (e){
                                  console.log('Failed to calculate distance for driving option');
                              }
                          }
                      }
                      var numericalMinDist = minDist;
                      console.log("Minimum Distance is " + minDist + " index is " + minIndex);

                      if(numericalMinDist !== maxDistance){
                          ajaxPHPCall(numericalMinDist, idArr[minIndex]);
                          document.getElementById("proceedCheckout").disabled = false;
                      }else{ // means try block couldn't execute for at least one time
                          document.getElementById("deliveryCost").innerHTML =   "Undefined";
                          document.getElementById("proceedCheckout").disabled = true;
                      }

                  }
              }


          }









      </script>

    <style>

      .placepicker-map {
        width: 100%;
        height: 300px;
      }

      .another-map-class {
        width: 100%;
        height: 300px;
      }

      .pac-container {
        border-radius: 5px;
      }

    </style>

  </head>

  <body>




  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><span style="color:white;">MU</span><span style="color:red;">Bazaar</span></a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="../../index.php">Home</a></li>


        <!--            <li><a href="#">Page 3</a></li>-->
      </ul>

      <ul class="nav navbar-nav" style="float: right">
        <li class="active" style="text-align: right;"><a href='../../logout.php?type=customer'>Sign Out (<?php echo $customer_name ?>)</a></li>
      </ul>
    </div>
  </nav>


    <div class="container">





      <h3>Shipping Address</h3>

      <div class="row" data-example>

         <div class="col-md-6">
           <form id="proceedCheckoutForm" action="../../checkout_credit.php" method="post">
             <div class="form-group">
               <input form="proceedCheckoutForm" id="advanced-placepicker" name="shipping_address" class="form-control" data-map-container-id="collapseTwo" />
             </div>

             <div id="collapseTwo" class="collapse">
               <div class="another-map-class thumbnail"></div>
             </div>

         </div>



        <div class="col-md-6">


            <table class="table table-hover">

            <?php include "./cart_table.php";  ?>

            </table>


            <?php if($cart_empty == false){ ?>

            <button form="proceedCheckoutForm" id="proceedCheckout" disabled   type="submit" class="btn btn-default">Proceed to checkout</button>

            <?php  } ?>

        </div>





       </div>



    </div>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>



  </body>

</html>
