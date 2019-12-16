<?php
 
		 $json = json_decode(file_get_contents("php://input"), true);
		 	$name=$json['name'];
		 	$email=$json['email'];
		 	$event=$json['event'];	

		 	$data= "NAME: ".$name." EMAIL: ".$email." EVENT: ".$event;	     

		     $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
			
			 fwrite($myfile, $data."\n");
			 fclose($myfile);

			  //echo "Data Saved \n";	 

?>