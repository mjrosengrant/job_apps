<?php
require_once "setup.php";
require_once "model.php";
require_once "controllers/SignupController.php";

$model = new FriendFinderModel();
$controller = new SignupController($model);


//User Sign Up Form Submitted
if(isset($_POST["btn-signup"])){
	
	$controller->signUp(
		$_POST["firstname"],
		$_POST["lastname"],
		$_POST["email"],
		$_POST["pwd"],
		$_POST["location"]
		);

	if($_SESSION["loggedIn"]){
		header("Location: index.php");
	}
	else{
		$smarty->assign("navbar",false);
		$smarty->assign("page","signin");
		$smarty->assign("error","Signup Unsuccesful =(");
	}

}
else{
	$smarty->assign("navbar",false);
	$smarty->assign("page","signup");
}

$smarty->display("index.tpl");

?>