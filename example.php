<?php
	/**
	 * index page
	 *
	 * @version		1.0
	 * @author    	mdonada
	 * @package		pages
	 * @since 		icd-api-playground 1.0
	 */
	
	require_once 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ICD API playground</title>	
	<link href="css/app.css?v=<?php echo CACHE_BUSTING ?>" rel="stylesheet">
	<link href="bower_components/font-awesome/css/font-awesome.min.css?v=<?php echo CACHE_BUSTING ?>" rel="stylesheet">
	<link href="bower_components/prism/themes/prism.css?v=<?php echo CACHE_BUSTING ?>" rel="stylesheet">
	<!-- IE 8 and LOWER -->
	<!--[if lte IE 8]>	
		<script type="text/javascript">
			alert('This page is not available for old versions of Internet Explorer.\nPlease update your browser or download the Google Chrome browser');
			window.location.replace('http://whatbrowser.org/');
		</script> 
	<![endif]-->		
</head>

<body>
	<!-- start container -->
	<div class="container-fluid">	
	     
	    <!-- start navbar -->  
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
 					<a class="navbar-brand navbar-title" href="index.php" title="">ICD API Playground</a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
											
					<ul class="nav navbar-nav navbar-right">						
						<li><a href="index.php" role="button"><i class="fa fa-child fa-fw" aria-hidden="true"></i> Playground</a></li>
						<li><a href="example.php" role="button"><i class="fa fa-code fa-fw" aria-hidden="true"></i> Code example</a></li>																		
					</ul>
											
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<!-- end navbar -->
	      		
		<!-- start content -->
		<div class="row">		
			
			<!-- start content -->			
			<div class="col-lg-12 code-content">				
				<div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">ICD API Code example</h3>
  					</div>
  					<div class="panel-body">
  					
  						<p>In order to be able to use the ICD APIs you need to follow these steps:</p>
  						
  						<ul>
  							<li>Register to our access management portal (<a href="https://icdaccessmanagement.who.int" target="_blank">https://icdaccessmanagement.who.int</a>) and follow the instructions</li>
  							<li>The next step is getting an OAUTH 2.0 token from the server. You will make a request to the token endpoint with the following information.
  								<ul>
  									<li>Use Basic Authentication with your client Id and Secret</li>
  									<li>grant_type = client_credentials</li>
  									<li>scope = icdapi_access</li>
  									<li>Our token endpoint: https://icdaccessmanagement.who.int/connect/token</li>
  								</ul>
  							</li>
  							<li>Then the server returns back a token which you add to your future requests to the ICD API. Please note that the tokens are valid for about 1 hour and after that one has to get a new one.</li>
  						</ul>
  					  										
  					</div>
				</div>
			</div>
			<!-- end content -->
						
		</div> 
		<!-- end content -->  
		
		
		<!-- start content -->
		<div class="row">		
			
			<!-- start content -->			
			<div class="col-lg-6 code-content">				
				<div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">PHP example</h3>
  					</div>
  					<div class="panel-body">
  					
  						<p>Below you will find and example in PHP using the <a href="http://php.net/manual/en/book.curl.php" target="_blank">Client URL Library</a></p>
    					<pre>
    						<code class="language-php">
$tokenEndpoint = "https://icdaccessmanagement.who.int/connect/token";
$clientId = "..."; //of course not a good idea to put id and secret in the source code
$clientSecret = "..."; //you could read from an encyrpted source in the production
$scope = "icdapi_access";
$grant_type = "client_credentials";


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
							</code>
						</pre>   										
  					</div>
				</div>
			</div>
			
			<div class="col-lg-6 code-content">				
				<div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">Python example</h3>
  					</div>
  					<div class="panel-body">
  					
  						<p>Below you will find and example in Python using the <a href="http://docs.python-requests.org/en/master/" target="_blank">Requests library</a></p>
    					<pre>
    						<code class="language-python">
import requests

token_endpoint = 'https://icdaccessmanagement.who.int/connect/token'
client_id = '...'
client_secret = '...'
scope = 'icdapi_access'
grant_type = 'client_credentials'


# get the OAUTH2 token

# set data to post
payload = {'client_id': client_id, 
	   	   'client_secret': client_secret, 
           'scope': scope, 
           'grant_type': grant_type}
           
# make request
r = requests.post(token_endpoint, data=payload, verify=False).json()
token = r['access_token']


# access ICD API

uri = 'https://id.who.int/icd/entity'

# HTTP header fields to set
headers = {'Authorization':  'Bearer '+token, 
           'Accept': 'application/json', 
           'Accept-Language': 'en'}
           
# make request           
r = requests.get(uri, headers=headers, verify=False)

# print the result
print (r.text)						
							</code>
						</pre>   										
  					</div>
				</div>
			</div>
			<!-- end content -->
						
		</div> 
		<!-- end content -->   	    	
     	
	</div> <!-- /.container -->	
	<!-- end container -->
	
	<!-- vendor scripts -->
	<script src="bower_components/jquery/dist/jquery.min.js?v=<?php echo CACHE_BUSTING ?>"></script>
	<script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js?v=<?php echo CACHE_BUSTING ?>"></script>
	<script src="bower_components/prism/prism.js?v=<?php echo CACHE_BUSTING ?>"></script>
	<script src="bower_components/prism/components/prism-php.min.js?v=<?php echo CACHE_BUSTING ?>"></script>
	<script src="bower_components/prism/components/prism-python.min.js?v=<?php echo CACHE_BUSTING ?>"></script>
	
	<script src="js/scripts.js?v=<?php echo CACHE_BUSTING ?>"></script>
  
</body>
</html>
