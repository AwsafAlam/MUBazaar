<?php 
include "db.php" ;

if(isset($_POST['contact_submit'])){
    $contact_name = $_POST['contact_submit'];
    $contact_name = mysqli_real_escape_string($connect,$contact_name);
    
    $contact_email = $_POST['contact_email'];
    $contact_email = mysqli_real_escape_string($connect,$contact_email);
    
    $contact_subject = $_POST['contact_subject'];
    $contact_subject = mysqli_real_escape_string($connect,$contact_subject);
    
    $contact_message = $_POST['contact_message'];
    $contact_message = mysqli_real_escape_string($connect,$contact_message);
    
    
    $contact_submit_query = "INSERT INTO contact(name, email, subject, message) ";
    $contact_submit_query .= "VALUES('{$contact_name}', '{$contact_email}', '{$contact_subject}', '{$contact_message}');";
//    echo $contact_submit_query;
    mysqli_query($connect,$contact_submit_query);
    
}
?>
<!DOCTYPE HTML>
<head>
<title>Contact Us</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
</head>
<body>
	<div class="header">
  	  		<div class="wrap">
			
             <?php 
                include "header.php" ;?>	
              
   		    </div>
          </div>
 <div class="main">
 	<div class="wrap">
     <div class="preview-page">
     				<div class="contact_info">
					    	  <div class="map">
					    	          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.5810790011938!2d90.3861506153888!3d23.72664954559928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8db59f7ff57%3A0x7e72e9fd2e6cd9fe!2sECE+Building%2CBUET!5e0!3m2!1sen!2sbd!4v1509723705495" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							   	    <br><small><a target="_blank" href="https://www.google.com.bd/maps/place/ECE+Building,BUET/@23.7266495,90.3861506,17z/data=!4m8!1m2!2m1!1sECE+Building+BUET!3m4!1s0x3755b8db59f7ff57:0x7e72e9fd2e6cd9fe!8m2!3d23.7265464!4d90.3886756?hl=en">View Larger Map</a></small>
							  </div>
      				</div>
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
<!--
				  	<form action="" method="post">
                      <div>
				  	    <input type="text" required>
				  	    </div>
				  	    <input type="submit" >
				  	</form>
-->
				  	
					    <form method="post" action="">
					    	<div>
						    	<input required name="contact_name" type="text" class="textbox textbox1" placeholder="Name"  />
						    	<input required name="contact_email" type="text" class="textbox" placeholder="Email" />
						    	<input required name="contact_subject" type="text" class="textbox" placeholder="Subject" />
						    	<div class="clear"></div>
						    	
						    </div>
						    <div>
						    	<textarea required name="contact_message" placeholder="Message:" > </textarea>
						    </div>
						   <div>
						   		<input type="submit" name="contact_submit" value="Submit"  class="mybutton">
						   		<div class="clear"></div>
						  </div>
					    </form>
				  </div>
			  </div>		
         </div> 
    </div>
 </div>
  
   <?php include "footer.php" ?>
