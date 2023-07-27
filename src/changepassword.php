<?php
	require "session_auth.php";
	require "database.php";
	$username=$_SESSION["username"];
	$newpassword=$_REQUEST["newpassword"];
	$nocsrftoken=$_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if(isset($username) AND isset($newpassword)){
		//echo "DEBUG:changepassword.php->Got: username=$username;newpassword=$newpassword\n";
		if(changepassword($username,$newpassword)){
			echo "<h4>New password has been set.</h4>";
		}else{
			echo "<h4>Error: Cannot change the password.</h4>";
		}	
	}else{
		echo "No provided username/password to change.";
	}
?>
<a href="index.php">Home</a> | <a href="logout.php">Logout</a>