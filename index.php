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
		
			<!-- start left content -->		
			<div class="col-md-4 col-lg-4 left-content">			
				<div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">Request</h3>
  					</div>
  					<div class="panel-body">
    					<form id="request-uri">
		  					<div class="form-group">
		    					<label for="uri">URI <small class="text-muted"> (https only)</small></label>
		    					<input type="url" class="form-control" id="uri" placeholder="example: https://id.who.int/icd/entity/1766440644" value="">
		  					</div>
		  					<button type="submit" class="btn btn-primary"><i class="fa fa-arrow-circle-o-right fa-fw" aria-hidden="true"></i> Submit</button>
						</form>						
						<br/><hr/><br/>
						<form id="request-search">
		  					<div class="form-group">
		    					<label for="search">Search <small class="text-muted"> (Foundation)</small></label>
		    					<input type="text" class="form-control" id="search" placeholder="example: tuberculosis" value="">
		  					</div>
		  					<button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw" aria-hidden="true"></i> Search</button>
						</form>	
  					</div>
				</div>				
			</div>
			<!-- end left content -->			
			
			<!-- start right content -->			
			<div class="col-md-8 col-lg-8 right-content">				
				<div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">Response</h3>
  					</div>
  					<div class="panel-body">
    					<div id="response">
    						<em class="text-muted">No request.</em>    										
    					</div>
  					</div>
				</div>
			</div>
			<!-- end right content -->
						
		</div> 
		<!-- end content -->    	    	
     	
	</div> <!-- /.container-fluid -->	
	<!-- end container -->
	
	<!-- vendor scripts -->
	<script src="bower_components/jquery/dist/jquery.min.js?v=<?php echo CACHE_BUSTING ?>"></script>
	<script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js?v=<?php echo CACHE_BUSTING ?>"></script>
	<script src="bower_components/prism/prism.js?v=<?php echo CACHE_BUSTING ?>" data-manual></script>
	<script src="bower_components/prism/components/prism-json.min.js?v=<?php echo CACHE_BUSTING ?>"></script>
	
	<script src="js/scripts.js?v=<?php echo CACHE_BUSTING ?>"></script>
  
</body>
</html>
