<?php
	require_once "setup.php";
	require_once "model.php";
	require_once "controllers/IndexController.php";

	$model = new FriendFinderModel();
	$controller = new IndexController($model);

	//Checks if signout has been requested
	if($_GET["signout"] !== null and strcmp($_GET["signout"] ,"True") ==0){
		$model->loginManager->signout();
		header("Location: index.php");
	}

	//Redirect to signup page if not yet logged in
	if(!$_SESSION["loggedIn"]){
		header("Location: signup.php");
	}
	
	$userLocation = $_SESSION["location"];
	$friendLocation = null;
	if(isset($_GET["loc"])){
		$friendLocation = $_GET["loc"];
	}

	//If friend search has been requested, execute search and populate page
	if($_GET["friendSearch"] and strcmp($_GET["friendSearch"] ,"True") == 0){
		$userList = $controller->searchForUser($_GET["firstname"],$_GET["lastname"],$_GET["location"]);	
		$smarty->assign("results",$userList);
	}

	$mapUrl = $controller->setMapUrl($userLocation, $friendLocation);

	$smarty->assign("page","home");
	$smarty->assign("navbar",True);
	$smarty->assign("username",$_SESSION['username']);
	$smarty->assign("mapUrl",$mapUrl);
	
	$smarty->display('index.tpl');
	
?>