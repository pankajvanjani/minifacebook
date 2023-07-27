<?php

	require "database.php";
	$username=sanitize_input($_POST["username"]);
	$password=sanitize_input($_POST["password"]);
	$name=sanitize_input($_POST["name"]);
	$email=sanitize_input($_POST["email"]);
	$phone=sanitize_input($_POST["phone"]);
	if(isset($username) AND isset($password) AND isset($name) AND isset($email) AND isset($phone)){
		//echo "DEBUG:addnewuser.php->Got: username=$username;password=$password;name=$name;email=$email;phone=$phone\n";
		if(addnewuser($username,$password,$name,$email,$phone)){
			echo "<h4>New user has been registered.</h4>";
		}else{
			echo "<h4>Error: Cannot register the user.</h4>";
		}	
	}else{
		echo "Please complete the form to register.";
	}
?>
<a href="form.php">Home</a> 