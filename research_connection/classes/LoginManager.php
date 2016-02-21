<?php
	class LoginManager{

		function __construct($db){
			$this->db = $db;
		}

		function signUp($firstname,$lastname,$email,$pwd,$location){

			$firstname = trim(mysqli_real_escape_string($this->db, $firstname )); 
			$lastname= trim(mysqli_real_escape_string($this->db, $lastname )); 
			$email= trim(mysqli_real_escape_string($this->db, $email )); 
			$pwd = md5($pwd);
			$location = trim(mysqli_real_escape_string($this->db, $location ));

			$sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `location`, `pwd`) VALUES ('$firstname','$lastname','$email', '$location', '$pwd')";
			
			$results = mysqli_query($this->db, $sql);
			
			if($results){
				$_SESSION["loggedIn"] = True;
				$_SESSION["username"] = $firstname;
				$_SESSION["location"] = $location;
			}
			else{
				echo "Error Signing Up";
			}

			return $results;
		}
		
		function signIn($email,$pwd){
			$email= trim(mysqli_real_escape_string($this->db, $email )); 
			$pwd = md5($pwd);
			$sql = "SELECT * FROM `users` WHERE email = '$email' AND pwd = '$pwd'";

            $results = mysqli_query($this->db, $sql);

			if(mysqli_num_rows($results)>0){
				$row = mysqli_fetch_assoc($results);
				$_SESSION["loggedIn"] = True;
				$_SESSION["username"] = $row["firstname"];
				$_SESSION["location"] = $row["location"];
			}
			else{
				echo "Unable to Log In =(";
			}
			return $results;
		}
		function signOut(){
			session_destroy();
		}
	}
?>
