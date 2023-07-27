<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Signup page - SecAD</title>
</head>
<body>
      	<h1>Sign Up for a new account</h1>
        
        

<?php
  //some code here
  echo "Current time: " . date("Y-m-d h:i:sa")
?>
          <form action="addnewuser.php" method="POST" class="form login">
          		Name:<input type="text" class="text_field" name="name" placeholder="Enter your name" required /> <br>
          		Email:<input type="email" class="text_field" name="email" placeholder="Enter your email" required 
              pattern="^[\w.-]+@[\w-]+(.[\w-]+)*$"
        title="Please enter a valid email"
        placeholder="Your email address"
        onchange="this.setCustomValidity(this.validity.patternMismatch?this.title: '');" /> <br>
          		Phone:<input type="tel" class="text_field" name="phone" placeholder="Enter your phone number" required /> <br>
                Username:<input type="text" class="text_field" name="username" placeholder="Enter your username" required/>
				 <br>
                Password: <input type="password" class="text_field" name="password" required
 pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&])[\w!@#$%^&]{8,}$"
 placeholder="Your password"
 title="Password must have at least 8 characters with 1 special symbol !@#$%^& 1 number,
1 lowercase, and 1 UPPERCASE"
 onchange="this.setCustomValidity(this.validity.patternMismatch?this.title: '');
form.repassword.pattern = this.value;" /> <br>
Retype Password: <input type="password" class="text_field" name="repassword"
 placeholder="Retype your password" required
 title="Password does not match"
 onchange="this.setCustomValidity(this.validity.patternMismatch?this.title: '');"/> <br>
                <button class="button" type="submit">
                  Sign Up
                </button>
          </form>

</body>
</html>

