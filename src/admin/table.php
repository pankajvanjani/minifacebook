<?php
include('database.php');
require "session_auth.php";
$query = "SELECT username, Name, Email, phone FROM users";
$result = mysqli_query($mysqli, $query);
?>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>SR No.</th>
    <th>Username</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile No</th>
    
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['username']; ?> </td>
   <td><?php echo $data['Name']; ?> </td>
   <td><?php echo $data['Email']; ?> </td>
   <td><?php echo $data['phone']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="7">No data found</td>
    </tr>
 <?php } ?>
 </table>