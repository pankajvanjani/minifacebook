<?php
	/*$lifetime=15*60;
	$path="/";
	$domain="*.miniFacebook.com";
	$secure=TRUE;
	$httponly=TRUE;
	session_set_cookie_params($lifetime,$path,$domain,$secure,$httponly);*/
	session_start();
	//require "session_auth.php";
	$mysqli = new mysqli('localhost',
							'ptuser' /*Database username*/,
							'pankajtejas' /*Database password*/,
							'secadteam16' /*Database name*/);
		if($mysqli->connect_errno){
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}    
	
		if (isset($_POST["username"]) and isset($_POST["password"]) ){
	if (securechecklogin($_POST["username"],$_POST["password"])) {
		$_SESSION["logged"]=TRUE;
		$_SESSION["username"]=$_POST["username"];
		$_SESSION["browser"]=$_SERVER["HTTP_USER_AGENT"];
		
	}else{
		echo "<script>alert('Invalid username/password');</script>";
		session_destroy();
		header("Refresh:0; url=form.php");
		die();
	}
}

if(!isset($_SESSION["logged"]) or $_SESSION["logged"] != TRUE) {
	echo "<script>alert('You have not logged in. Please login first');</script>";
	header("Refresh:0; url=form.php");
		die();
	}
if($_SESSION["browser"]!=$_SERVER["HTTP_USER_AGENT"]){
	echo "<script>alert('Session Hijacking is detected!');</script>";
		header("Refresh:0; url=form.php");
		die();

}

?>
	<h1>Team Project-SecAD</h1>
        <h2>Team 16: Pankaj Vanjani and Tejas Patil</h2>
	<h2> Welcome <?php echo htmlentities($_SESSION['username']); ?> !</h2>
	<a href="showposts.php"> Show posts </a> <br>
	<a href="addpostform.php"> Add posts </a> <br>
	<a href="https://192.168.56.102:4430/"> Start chat </a> <br>
	<a href="changepasswordform.php">Change password</a> |
	<a href="logout.php">Logout</a>
<?php		
	
  	function securechecklogin($username, $password) {
  		global $mysqli;
		$prepared_sql="SELECT * FROM users WHERE  username= ? AND password=password(?);";
		if(!$stmt = $mysqli->prepare($prepared_sql))
			echo "Prepared Statement Error";
		$stmt->bind_param("ss",$username,$password);
		if(!$stmt->execute()) echo "Execute Error";
		if(!$stmt->store_result()) echo "Store_result Error";
		$result=$stmt;
		if($result->num_rows==1)
			return TRUE;
		return FALSE;
  	}
?>
