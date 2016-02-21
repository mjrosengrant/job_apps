<center>
	<h1>Log In To Existing Account</h1>
	<a href="signup.php">Sign Up Here</a>
</center>

<div class="row">
        <form role="form" method="post" action="signin.php">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <label for="email">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailFirst" name="email" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <input type="submit" name="btn-signin" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>