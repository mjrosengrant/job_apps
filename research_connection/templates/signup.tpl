<center>
	<h1>Sign Up For New Account</h1>
	{{$error}}
	<a href="signin.php">Sign In Here</a></td>
</center>		
<div class="row">
    <form role="form" method="post" action="signup.php">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name" required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
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
            <div class="form-group">
                <label for="location">Enter Location</label>
                <div class="input-group">
                    <input type="text" name="location" id="location" class="form-control" required></input>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <input type="submit" name="btn-signup" id="submit" value="Submit" class="btn btn-info pull-right">
        </div>
    </form>
</div>
