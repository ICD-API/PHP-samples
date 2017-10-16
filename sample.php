<?php 
	$tokenEndpoint = "https://icdaccessmanagement.who.int/connect/token";
	$clientId = "..."; //of course not a good idea to put id and secret in the source code
	$clientSecret = "..."; //you could read from an encyrpted source in the production
	$grant_type = "client_credentials";
	$scope = "icdapi_access";
	
	
	// create curl resource to get the OAUTH2 token
	$ch = curl_init();
	
	// set URL to fetch
	curl_setopt($ch, CURLOPT_URL, $tokenEndpoint);
	
	// set HTTP POST
	curl_setopt($ch, CURLOPT_POST, TRUE);
	
	// set data to post
	curl_setopt($ch, CURLOPT_POSTFIELDS, array(
				'client_id' => $clientId,
				'client_secret' => $clientSecret,
				'scope' => $scope,
				'grant_type' => $grant_type
	));
	
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	$result = curl_exec($ch);
	$json_array = (json_decode($result, true));
	$token = $json_array['access_token'];
	
	// close curl resource
	curl_close($ch);
	
	
	
	// create curl resource to access ICD API
	$ch = curl_init();
	
	// set URL to fetch
	curl_setopt($ch, CURLOPT_URL, 'https://id.who.int/icd/entity');
	
	// HTTP header fields to set
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Authorization: Bearer '.$token,
				'Accept: application/json',
				'Accept-Language: en'
	));
	
	// grab URL and pass it to the browser
	curl_exec($ch);
	
	// close curl resource
	curl_close($ch);  	
?>