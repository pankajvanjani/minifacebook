<?php
	require "session_auth.php";
	require "database.php";
	$username=$_SESSION["username"];
	$title=$_REQUEST["title"];
	//$date=date("mm/dd/YYYY");
	$content=$_REQUEST["content"];
	//$newpassword=$_REQUEST["newpassword"];
	$nocsrftoken=$_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if(isset($title) AND isset($content)){
		//echo "DEBUG:changepassword.php->Got: username=$username;newpassword=$newpassword\n";
		if(addposts($title,$content,$username)){
			echo "<h4>New post has been added.</h4>";
		}else{
			echo "<h4>Error: Cannot add the post.</h4>";
		}	
	}else{
		echo "No provided content to add.";
	}
?>
<a href="index.php">Home</a> | <a href="logout.php">Logout</a>