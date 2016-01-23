<!DOCTYPE html>

<html >
    <head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	    <!-- Bootstrap -->
		<link rel="stylesheet" 
		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" 
		integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" 
		crossorigin="anonymous">

		<link rel="stylesheet" href"style.css">
	    
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <title>Credly API Demo</title>
    </head>
    <body>
	<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">Credly</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <div class="col-sm-3 col-md-3">
	        <form class="navbar-form" method="GET">
	        <div class="input-group">
	            <input type="text" class="form-control" placeholder="Enter Credly ID" name="id">
	            <div class="input-group-btn">
	                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	            </div>
	        </div>
	        </form>
	    </div>
	  </div><!-- /.navbar-collapse -->
	</nav>
    	<div class="col-md-10 col-md-offset-1">
        <h1>Enter Credly ID Above to View Badges</h1>
        <?php       
	        if( !empty($_GET['id']) ){
	        	include 'credly.php';
	        	include 'config.php';
	        	$handle = new Credly_Handler($API_KEY, $APP_SECRET);
	        	$badges = $handle->getMemberBadges( $_GET['id'] );
	        	echo "<div id='output' class= 'table-container'>";
	        	echo $handle->renderBadgeTable($badges);
	        	echo "</div>";
	        }
        ?>


    </body>
</html>
