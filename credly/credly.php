<?php
	Class Credly_Handler{
		private $apiKey;
		private $appSecret;
		private $BASE_URL = 'https://api.credly.com/v1.1/';

		function __construct($apiKey,$appSecret) {
	   		$this->apiKey = $apiKey;
	   		$this->appSecret = $appSecret; 
		}


		function getMemberBadges($id){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    	"X-Api-Key: " . $this->apiKey,
				"X-Api-Secret: " . $this->appSecret    
			));
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			
			$endpoint = $this->BASE_URL . "members/$id/badges";
			curl_setopt($ch, CURLOPT_URL, $endpoint);
			
			$results = json_decode( curl_exec($ch), true);
			curl_close($ch);

			$output = '';
			if($results["meta"]["status_code"] == 200){
				$output = json_encode($results["data"]);
			}
			else{
				$output = json_encode(array("success"=>0, "message"=>"Error getting Badges from Credly =("));
			}
			return $output;
		}

		function renderBadgeTable($badgesJson){
			$badgeData = json_decode($badgesJson, true);
			$tableHtml = "<table><th>Image</th><th>Badge Name</th><th>Description</th>";		
			foreach($badgeData as $badge){
				$image = "<img height='33%' width ='33%' src='" . $badge["image"] . "'/>";
				$badgeName = $badge["title"];
				$description = $badge["short_description"];			
				$tableHtml .= "<tr><td>$image</td> <td>$badgeName</td><td>$description</td></tr>";
			}
			$tableHtml .=  "</table>";
			return $tableHtml;
		}


	}

?>