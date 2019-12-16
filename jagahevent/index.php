<?php

     include "controller.php";



  	if(isset($_POST['submit'])){
 		$name=$_POST['firstname'].' '. $_POST['lastname'];
 		$email=$_POST['email'];
 		$event=$_POST['event'];
 		$webhook = new webhook;

 		$url=$webhook->getCompanyHookUrl($email);

 		$webhookdata=$webhook->getWebHookData($name, $email, $event);
 		 $webhook->sendWebhook($url, $webhookdata);
 	}
 ?>

<html>

<head> 
<title>Event Registration</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
 <h1>Register for Available Events</h1>
 <form method="POST" action="index.php">

  <label for="fname">First Name</label>
  <input type="text" id="fname" name="firstname" placeholder="Your name.." required="required">

  <label for="lname">Last Name</label>
  <input type="text" id="lname" name="lastname" placeholder="Your last name.." required="required">

  <label for="email">Email Address</label>
  <input type="email" id="email" name="email" placeholder="Your Email" required="required">

  <label for="event">Event</label>
  <select  id="event" name="event" required="required">
  	<option></option>
  	<option>Jagah Boot camp</option>
  	<option>Kazeem's Seminar</option>
  </select> 



  <input type="submit" name="submit" value="Submit">

</form>

</body>

</html>