<?php

class IndexController{
	
	function __construct($model){
		$this->model = $model;
	}

	function searchForUser($firstname,$lastname,$location){
		$query_results = $this->model->elasticHandle->userQuery($firstname,$lastname,$location);
		$userList = json_decode($query_results, True);
		return $userList["hits"]["hits"];
	}

	function setMapUrl($userLocation,$friendLocation){
		if(!empty($friendLocation)){
			$mapUrl = $this->model->mapHandle->getDirectionsUrl($userLocation,$friendLocation);
		}
		else{
			$mapUrl = $this->model->mapHandle->showAddressUrl($userLocation);
		}
		return $mapUrl;
	}

	
}


?>