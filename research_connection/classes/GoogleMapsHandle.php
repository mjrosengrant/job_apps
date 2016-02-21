<?php
class GoogleMapsHandle{
	public $baseUrl = "https://www.google.com/maps/embed/v1/";

	function getDirectionsUrl($pointA,$pointB){
		$pointA = str_replace(' ', '%20', $pointA);
		$pointB = str_replace(' ', '%20', $pointB);
		$endpoint = "directions?origin=$pointA'&destination='$pointB&key=" . $this->getKey();
		return $this->baseUrl . $endpoint;
	}

	function showAddressUrl($addr){
		$addr = str_replace(' ', '%20', $addr);
		$endpoint = "place?q=$addr&key=" . $this->getKey();
		return $this->baseUrl . $endpoint;
	}

	function getKey(){
		require dirname(__FILE__) . "/../config.php";
		return $GOOGLE_MAPS_KEY;
	}
}

?>