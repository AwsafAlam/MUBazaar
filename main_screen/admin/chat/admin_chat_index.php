<?php include "../../db.php";?>

<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (isset($_SESSION['admin_id'])) {
        $admin_id =$_SESSION['admin_id'];
        $query = "SELECT * FROM admin ";
        $query .= "WHERE id = {$admin_id};";

        $select_admin_query = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($select_admin_query);

        $admin_name = $row['admin_name'];

    }
}
?>


<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>Chat | ChatApp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="css/chat-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<style type="text/css">
    .chat_content{


        border: 1px solid #000;
        border-radius: 5px;
        padding: 5px 10px;
        display: inline-block;
        color: white;
    }
    .chat_content#blue{
        background-color: #3498db;
        border-color: #2980b9;
        margin-bottom: 10px;
    }

    .chat_content#green{
        background-color: #2ecc71;
        border-color: #27ae60;
        margin-bottom: 5px;
    }

    .rightMessage{
        text-align: right;
    }
    .leftMessage{
        text-align: left;
    }

</style>



<body class="chat">

<p id="sampleId"></p>




  <div class="chat__sidebar">

      <a href="../index.php" class="fa fa-home" style="font-size:36px; color:white;"></a>
    <h3 style="margin-left: 0; " >Customers</h3>
    <div id="users"></div>

    <div class="btn-group-vertical btn-block btn-group-toggle" data-toggle="buttons">
        <?php
        $customer_query = "SELECT ID, Customer_Name FROM customer WHERE customer_active = 'Y';";
        $customer_rslt = mysqli_query($connect, $customer_query);
        if(mysqli_num_rows($customer_rslt) > 0){

        while($customer_row  = mysqli_fetch_assoc($customer_rslt)){

            $customer_name = $customer_row['Customer_Name'];
            $customer_id = $customer_row['ID'];


        ?>


      <label class="btn btn-success">
        <input type="radio" name="options" id="option2"  value="<?php echo $customer_id ?>"  autocomplete="off"> <?php echo $customer_name ; ?>
      </label>


        <?php  }   }else{   ?>


            <div class="alert alert-danger">
                Customer database is empty
            </div>

        <?php } ?>

        <?php
        $customer_query = "SELECT ID, Customer_Name FROM customer WHERE customer_active = 'N';";
        $customer_rslt = mysqli_query($connect, $customer_query);
        if(mysqli_num_rows($customer_rslt) > 0){

            while($customer_row  = mysqli_fetch_assoc($customer_rslt)){

                $customer_name = $customer_row['Customer_Name'];
                $customer_id = $customer_row['ID'];


                ?>


                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option2"  value="<?php echo $customer_id ?>"  autocomplete="off"> <?php echo $customer_name ; ?>
                </label>


            <?php  }   }
        ?>

    </div>


  </div>




  <div class="chat__main" >

      <div id="no_message_dialog"  class="alert alert-danger" style="text-align: center; display: none">
          No messaging history is available with this user!
      </div>


    <ol id="messages" class="chat__messages" >




    </ol>

    <div class="chat__footer">
      <form method="post" action="./send_message.php" id="message-form">
        <input id="message_content" name="message" type="text" placeholder="Message" autofocus autocomplete="off"/>
        <button id="message_btn">Send</button>
      </form>
<!--      <button id="send-location">Send location</button>-->
    </div>
  </div>


<script type="text/javascript">


    var customerId = -1;

    var totalMessageCount = 0;

    document.getElementById("message_btn").disabled = true;




    function messageUpdate(customerID){
        var hr = new XMLHttpRequest();

        var url = 'admin_fetch_message.php';

        var vars = "customerId=" + customerID;
        hr.open("POST", url, true);

        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        hr.onreadystatechange = function() {
            if(hr.readyState === 4 && hr.status === 200) {
                var result = $.parseJSON(hr.responseText);

                if(customerID != customerId)
                    return;

                if(totalMessageCount === 0 && result.length === 0){
                    document.getElementById('no_message_dialog').style.display = "block";
                }else{
                    document.getElementById('no_message_dialog').style.display = "none";
                }

                if(result.length <= totalMessageCount){
                    setTimeout(messageUpdate(customerID), 3000);
                    return;
                }


                var string = '';


                for(var i = totalMessageCount; i < result.length; i++){

                    if(parseFloat(result[i]['sender_id']) == customerId){
                        string = '<li class="leftMessage">';
                        string += '<div><span style="font-size: 80%">';
                        string += result[i]['chat_time'] + '</span></div><div class="message__body chat_content" id="green" ><p>';
                        string += result[i]['chat_content'] + '</p></div></li>';
                    }else{
                        string = '<li class="rightMessage">';
                        string += '<div><span style="font-size: 80%">';
                        string += result[i]['chat_time'] + '</span></div><div class="message__body chat_content" id="blue" ><p>';
                        string += result[i]['chat_content'] + '</p></div></li>';
                    }

                    document.getElementById("messages").innerHTML +=   string ;

                    totalMessageCount += 1;

                    var chat_main_scroll = document.getElementById('messages');
                    chat_main_scroll.scrollTop = chat_main_scroll.scrollHeight;
                }


                setTimeout(messageUpdate(customerID), 3000);
            }
        };


        hr.send(vars);

    }


    $(document).ready(function() {
        $('input[type=radio][name=options]').change(function() {

            document.getElementById("message_btn").disabled = false;

            document.getElementById("messages").innerHTML = "" ;


            customerId = this.value;

            totalMessageCount = 0;


            messageUpdate(customerId);




//            var hr = new XMLHttpRequest();
//
//            var url = 'admin_fetch_message.php';
//
//            var vars = "customerId=" + customerId;
//            hr.open("POST", url, true);
//
//            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//
//            hr.onreadystatechange = function() {
//                if(hr.readyState === 4 && hr.status === 200) {
//                    var result = $.parseJSON(hr.responseText);
//
//
//                    var string = '';
//
//                    $.each(result, function (key, value) {
//                        console.log(parseFloat(value['sender_id']));
//                        if(parseFloat(value['sender_id']) == customerId){
//                            string = '<li class="leftMessage">';
//                            string += '<div><span style="font-size: 80%">';
//                            string += value['chat_time'] + '</span></div><div class="message__body chat_content" id="green" ><p>';
//                            string += value['chat_content'] + '</p></div></li>';
//                        }else{
//                            string = '<li class="rightMessage">';
//                            string += '<div><span style="font-size: 80%">';
//                            string += value['chat_time'] + '</span></div><div class="message__body chat_content" id="blue" ><p>';
//                            string += value['chat_content'] + '</p></div></li>';
//                        }
//
//                        document.getElementById("messages").innerHTML +=   string ;
//
//                        var chat_main_scroll = document.getElementById('messages');
//                        chat_main_scroll.scrollTop = chat_main_scroll.scrollHeight;
//
//                    });
//                }
//            };
//
//
//            hr.send(vars);
//
//            var chat_main_scroll = document.getElementById('messages');
//            chat_main_scroll.scrollTop = chat_main_scroll.scrollHeight;


        });



    });

    $(document).ready(function() {
        $('#message-form').submit(function (e) {

            e.preventDefault();

            var data0 = {message: $("#message-form").serialize(), customerId : customerId};

            var json = JSON.stringify(data0 );


            var message_content = document.getElementById("message_content").value;


            $.ajax({

                type: "POST",
                url: "admin_send_message.php",
                data: {message: message_content, customerId:customerId},
                success: function (data) {
                    console.log(data);

                }

            });

//            var newMessage = document.getElementById("message_content").value;
//
//            var currentdate = new Date();
//            var datetime =currentdate.getFullYear() + "-" +
//                (currentdate.getMonth()+1) + "-" +
//                currentdate.getDate() + " " +
//                + currentdate.getHours() + ":"
//                + currentdate.getMinutes() + ":"
//                + currentdate.getSeconds();
//
//            var string = '';
//
//            string = '<li class="rightMessage">';
//            string += '<div><span style="font-size: 80%">';
//            string += datetime + '</span></div><div class="message__body chat_content" id="blue" ><p>';
//            string += newMessage + '</p></div></li>';
//            document.getElementById("messages").innerHTML +=   string ;


            document.getElementById("message_content").value = '';


            var chat_main_scroll = document.getElementById('messages');
            chat_main_scroll.scrollTop = chat_main_scroll.scrollHeight;



        })
    });






</script>



    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>


</body>

</html>
