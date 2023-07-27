<?php
	require "session_auth.php";
  $rand=bin2hex(openssl_random_pseudo_bytes(16));
  $_SESSION["nocsrftoken"]=$rand;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login page - SecAD</title>
</head>
<body>
      	<h1>Change Password-SecAD</h1>
        <h2>By Phu Phung</h2>
        

<?php
  //some code here
  echo "Current time: " . date("Y-m-d h:i:sa")
?>
          <form action="changepassword.php" method="POST" class="form login">
                Username:<!--input type="text" class="text_field" name="username" /--> 
                <?php echo htmlentities($_SESSION["username"]); ?>
                <br>
                <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>" />
                New Password: <input type="password" class="text_field" name="newpassword" /> <br>
                <button class="button" type="submit">
                  Change Password
                </button>
          </form>

</body>
</html>

