<?php
require 'session_auth.php';
$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand;
?>
<form action="addpost.php" method="post"> 
<div>
 
<p>Title:  <input type="text" name="title" placeholder="Name"></p>
Content:  <br><textarea name="content" required cols="50" rows="9" ></textarea>
   <br>
<p>  <button class="button" type="submit">submit new post
</button> </p>

</div>
<input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>" />

</form>
<a href="index.php">Home></a>