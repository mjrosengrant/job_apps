<?php
class ElasticHandle{
	private $baseUrl = "http://localhost:9200/friendfinder/users/";
	
	function __construct($db){
		$this->db = $db;
	}

	function userQuery($firstname,$lastname,$location){
		$endpoint = "_search?q=";
		
		if(!empty($firstname)){
			$endpoint .= "firstname:$firstname";
		}
		if (!empty($firstname) and !empty($lastname)){
			$endpoint .= "%20and%20";
		}
		if(!empty($lastname)){
			$endpoint .= "lastname:$lastname";
		}
		if((!empty($firstname) or !empty($lastname)) and !empty($location)){
			$endpoint .= "%20and%20";
		}

		if(!empty($location)){
			$endpoint .= "location:". str_replace(' ', '%20', $location);
		}

		$results = file_get_contents($this->baseUrl . $endpoint . "&size=1000" );
		return $results;
	}

	function syncUsersFromMysql(){
		$sql = "SELECT id, firstname, lastname, email, location FROM users";
		$users = mysqli_query($this->db, $sql);

		$response = array();
		foreach($users as $user){
			$userObj = json_encode($user);
			$url = $this->baseUrl . $user["id"];
			$resp = $this->postDocument($userObj,$url);
			$response[$user["id"]] = $resp;
		}
		return $response;
	}

	function postDocument($doc,$url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $doc);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
        return $response;
	}
}

?>