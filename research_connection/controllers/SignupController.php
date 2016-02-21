<?php

class SignupController{
	
	function __construct($model){
		$this->model = $model;
	}

	function signUp($firstname,$lastname,$email,$pwd,$location){
		$results = $this->model->loginManager->signup($firstname,$lastname,$email,$pwd,$location);
		$this->model->elasticHandle->syncUsersFromMysql();
	}
}


?>