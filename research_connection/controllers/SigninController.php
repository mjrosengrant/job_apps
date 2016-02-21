<?php
require_once "model.php";
class SigninController{
	
	function __construct($model){
		$this->model = $model;
	}

	function signIn($email,$pwd){
		return $this->model->loginManager->signIn($email,$pwd);
	}


}


?>