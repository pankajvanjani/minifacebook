<?php
	
	$mysqli = new mysqli('localhost',
							'ptuser' /*Database username*/,
							'pankajtejas' /*Database password*/,
							'secadteam16' /*Database name*/);
		if($mysqli->connect_errno){
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}    
	
				
	
  	function changepassword($username, $newpassword) {
  		global $mysqli;
		$prepared_sql="UPDATE users SET password=password(?) WHERE  username= ?;";
		echo "DEBUG>prepared_sql=$prepared_sql\n";
		if(!$stmt = $mysqli->prepare($prepared_sql)) return FALSE;
		$stmt->bind_param("ss",$newpassword,$username);
		if(!$stmt->execute()) return FALSE;
		return TRUE;
  	}

  	function addnewuser($username, $password, $name, $email, $phone) {
  		global $mysqli;
		$prepared_sql="INSERT INTO users VALUES(?,password(?),?,?,?);";
		echo "DEBUG>prepared_sql=$prepared_sql\n";
		if(!$stmt = $mysqli->prepare($prepared_sql)) return FALSE;
		$stmt->bind_param("sssss",$username,$password,$name,$email,$phone);
		if(!$stmt->execute()) return FALSE;
		return TRUE;
  	}

  	function sanitize_input($input) {
 		$input = trim($input);
 		$input = stripslashes($input);
 		$input = htmlspecialchars($input);
 		return $input;
	}

	function addposts($title,$content,$owner){
		global $mysqli;
		$prepared_sql="INSERT INTO posts VALUES(DEFAULT,?,?,NOW(),?);";
		echo "DEBUG>prepared_sql=$prepared_sql\n";
		if(!$stmt = $mysqli->prepare($prepared_sql)) return FALSE;
		$stmt->bind_param("sss",$title,$content,$owner);
		if(!$stmt->execute()) return FALSE;
		return TRUE;
	}

	function displayposts(){
		global $mysqli;
		$prepared_sql = "SELECT title, content, date FROM posts;";
		if(!$stmt = $mysqli->prepare($prepared_sql)) return FALSE;
		if(!$stmt->execute()) return FALSE;
		$title = NULL; $content = NULL; $date=NULL;
		if(!$stmt->bind_result($title, $content, $date)) echo "Binding failed ";
		while($stmt->fetch()){
			echo htmlentities($title) . ", " . htmlentities($content) . ", " .
 			htmlentities($date) . "<br>";}
	}

?>
