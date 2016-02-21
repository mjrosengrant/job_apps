	<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	    </button>
	    <a class="navbar-brand" href="index.php">FriendFinder</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="col-sm-3 col-md-6">
	        <form class="navbar-form" method="GET">
	        <div class="input-group">
	            <input type="hidden" class="form-control" name="friendSearch" value="True">
	            <input type="text" class="form-control" placeholder="Friends First Name" name="firstname">
	            <input type="text" class="form-control" placeholder="Friends Last Name" name="lastname">
	            <input type="text" class="form-control" placeholder="Friends Location" name="location">

	            <div class="input-group-btn">
	                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	            </div>
	        </div>
                <div class="pull-right navbar-right"><a href="index.php?signout=True">Sign Out</a></div>
	            <div>
	            	<a href="index.php?friendSearch=True&firstname=*&lastname=*">View All Users</a>
	            </div>
	        </form>
	    </div>
	</nav>