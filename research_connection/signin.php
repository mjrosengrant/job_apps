<?php
require_once "setup.php";
require_once "model.php";
require_once "controllers/SigninController.php";

$model = new FriendFinderModel();
$controller = new SigninController($model);

if(isset($_POST["btn-signin"])){

	$controller->signIn($_POST['email'], $_POST["pwd"]);

	if($_SESSION["loggedIn"]){
		header("Location: index.php");
	}
	else{
		$smarty->assign("navbar",false);
		$smarty->assign("page","signin");
		$smarty->assign("error","Login Unsuccesful =(");
	}
}
else{
	$smarty->assign("navbar",false);
	$smarty->assign("page","signin");
}

$smarty->display("index.tpl");

?>