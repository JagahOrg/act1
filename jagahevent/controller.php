<?php

   class webHook
   {

   	 public function getCompanyHookUrl($email){
    	$atPosition=strpos($email, '@');

    	$company=substr($email, $atPosition+1);
    	if($company != "hng.tech" && $company !="start.ng"){
            
            return false;
    	}


    	//$url = 'http://3.95.127.84/companies/'.$company.'/hooks/geteventsregistered.php';
    	$url = '127.0.0.1/act1/companies/'.$company.'/hooks/geteventsregistered.php';
    	return $url;
    	 }

    public function getWebHookData($name, $email, $event){
    	$webhookdata = array('name' => $name, 'email' => $email ,'event'=> $event);
    	$webhookdata=json_encode($webhookdata);



    	return $webhookdata;
    }
    public function sendWebhook($url, $webhookdata){

    	       if (!$url) {
    	       	  echo "Company not recognized";
    	       }

			  else {

					$curl = curl_init();

				curl_setopt_array($curl, [
				    CURLOPT_URL => $url,
				    CURLOPT_HEADER => true,
				    CURLOPT_RETURNTRANSFER => true,
				    CURLOPT_POST =>1,
				     CURLOPT_POSTFIELDS=>$webhookdata
				]);

				$response = curl_exec($curl);

				if($response){
                     $response="Webhook Sent Successfully";
				}

				if ($error = curl_error($curl)) {
				  throw new Exception($error);
				}

				curl_close($curl);
				//$response = json_decode($response, true);

				//var_dump('Response:', $response);

				echo $response;

				// Do some other awesome PHP stuff here...			
    }
   	}
   	
   }

    
?>