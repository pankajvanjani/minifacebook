<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login page - SecAD</title>
</head>
<body>
      	<h1>Team Project-SecAD</h1>
        <h2>Team 16: Pankaj Vanjani and Tejas Patil</h2>
        

<?php
  //some code here
  echo "Current time: " . date("Y-m-d h:i:sa")
?>
          <form action="index.php" method="POST" class="form login">
                Username:<input type="text" class="text_field" name="username" /> <br>
                Password: <input type="password" class="text_field" name="password" /> <br>
                <button class="button" type="submit">
                  Login
                </button>
          </form>
          <br>
          <a href="/teamproject/admin/form.php"> Are you an admin?</a> <br>
          <a href="registrationform.php"> New User? Sign Up </a>

</body>
</html>

