<?php include "../db.php";?>

<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];
        $query = "SELECT * FROM customer ";
        $query .= "WHERE ID = {$customer_id};";

        $select_customer_query = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($select_customer_query);

        $customer_name = $row['Customer_Name'];

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
        margin-bottom: 5px;
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
    <h3>MUChat</h3>
    <div id="users"></div>

    <div class="btn-group-vertical btn-block btn-group-toggle" data-toggle="buttons">
        <?php
        $active_admin_query = "SELECT * FROM admin WHERE admin_active = 'Y';";
        $active_admin_rslt = mysqli_query($connect, $active_admin_query);
        if(mysqli_num_rows($active_admin_rslt) > 0){
            $active_admin_row  = mysqli_fetch_assoc($active_admin_rslt);
                $admin_name =  $active_admin_row['admin_name'];
                $admin_id =  $active_admin_row['id'];

            ?>

            <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" value="<?php echo $admin_id ?>" autocomplete="off" checked> <?php echo $admin_name ; ?>
            </label>

       <?php

        while($active_admin_row  = mysqli_fetch_assoc($active_admin_rslt)){

            $admin_name =  $active_admin_row['admin_name'];
            $admin_id =  $active_admin_row['id'];


        ?>


      <label class="btn btn-secondary">
        <input type="radio" name="options" id="option2"  value="<?php echo $admin_id ?>"  autocomplete="off"> <?php echo $admin_name ; ?>
      </label>


        <?php  }   }else{   ?>


            <div class="alert alert-danger">
                No Admin is currently online
            </div>

        <?php } ?>

    </div>


  </div>




  <div class="chat__main" >
    <ol id="messages" class="chat__messages" >

        <li class="leftMessage">
<!--            <div class="message__title"  >-->

            <div style="margin-bottom: 5px;"  >
                <span>Created AAt</span>

            </div>

            <div class="message__body chat_content" id="blue" >
                <p>Text</p>
            </div>

        </li>


        <li class="rightMessage">
            <!--            <div class="message__title"  >-->

            <div style="margin-bottom: 5px;"  >
                <span>Created AAt</span>

            </div>

            <div class="message__body chat_content" id="green" >
                <p>Text</p>
            </div>

        </li>


    </ol>

    <div class="chat__footer">
      <form method="post" action="./send_message.php" id="message-form">
        <input id="message_content" name="message" type="text" placeholder="Message" autofocus autocomplete="off"/>
        <button>Send</button>
      </form>
<!--      <button id="send-location">Send location</button>-->
    </div>
  </div>


<script type="text/javascript">

    var customer_name = '<?php echo $customer_name ?>';
    var adminId = 1;

    var chat_main_scroll = document.getElementById('messages');
    chat_main_scroll.scrollTop = chat_main_scroll.scrollHeight;
    /*


    <li class="message">
            <div class="message__title">
                <h4>FROM</h4>
                <span>Created At</span>
            </div>
            <div class="message__body">
                <p>Text</p>
            </div>
        </li>

     */



    $(document).ready(function() {
        $('input[type=radio][name=options]').change(function() {

            document.getElementById("messages").innerHTML = "" ;


            adminId = this.value;

            var hr = new XMLHttpRequest();

            var url = 'fetch_message.php';

            var vars = "adminId=" + adminId;
            hr.open("POST", url, true);

            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            hr.onreadystatechange = function() {
                if(hr.readyState === 4 && hr.status === 200) {
                    var result = $.parseJSON(hr.responseText);


                    var string = '';

                    $.each(result, function (key, value) {
                        string = '<li class="message"><div class="message__title"><h4>';
                        string += value['sender_name'] + '</h4><span>';
                        string += value['chat_time'] + '</span></div><div class="message__body"><p>';
                        string += value['chat_content'] + '</p></div></li>';
                        document.getElementById("messages").innerHTML +=   string ;

                    });
                }
            };


            hr.send(vars);


        });

        var chat_main_scroll = document.getElementById('messages');
        chat_main_scroll.scrollTop = chat_main_scroll.scrollHeight;

    });

    $(document).ready(function() {
        $('#message-form').submit(function (e) {

            e.preventDefault();

            var data0 = {message: $("#message-form").serialize(), adminId : adminId};

            var json = JSON.stringify(data0 );


            var message_content = document.getElementById("message_content").value;


            $.ajax({

                type: "POST",
                url: "send_message.php",
                data: {message: message_content, adminId:adminId},
                success: function (data) {
                    console.log(data);

                }

            });

            var newMessage = document.getElementById("message_content").value;

            var currentdate = new Date();
            var datetime =currentdate.getFullYear() + "-" +
                (currentdate.getMonth()+1) + "-" +
                currentdate.getDate() + " " +
                + currentdate.getHours() + ":"
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();

            var string = '';

            string = '<li class="message"><div class="message__title"><h4>';
            string += customer_name + '</h4><span>';
            string += datetime + '</span></div><div class="message__body"><p>';
            string += newMessage + '</p></div></li>';
            document.getElementById("messages").innerHTML +=   string ;


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
