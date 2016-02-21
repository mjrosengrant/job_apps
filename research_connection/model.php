<?php
require_once "classes/GoogleMapsHandle.php";
require_once "classes/LoginManager.php";
require_once "classes/ElasticHandle.php";

class FriendFinderModel{
	function __construct(){
		$this->db = $this->setup_db();
		$this->mapHandle = new GoogleMapsHandle();
		$this->loginManager = new LoginManager($this->db);
		$this->elasticHandle = new ElasticHandle($this->db);
	}

	private function setup_db(){
		require "config.php";
		$db = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PWD,$DB_NAME);
		if (!$db) {
		    die('Could not connect: ' . mysqli_error());
		}
		return $db;
	}

}


?>