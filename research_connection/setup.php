<?php
require_once "libs/smarty/libs/Smarty.class.php";

function setup_smarty(){
	$smarty = new Smarty();
	$smarty->setTemplateDir('templates/');
	$smarty->setCompileDir('libs/smarty/templates_c/');
	$smarty->setConfigDir('libs/smarty/configs/');
	$smarty->setCacheDir('libs/smarty/cache/');
	return $smarty;
}

function setup_session(){
	session_start();
	if(!isset($_SESSION["loggedIn"])){
		$_SESSION["loggedIn"] = False;
	}
}

//Create variables accesible to scripts that require setup.php
$smarty = setup_smarty();
setup_session();

?>