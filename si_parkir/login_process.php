<html>
<body>
<style>
body {
    background-color: lightgreen;
    font-family:arial;
    font-size:20px;
}
</style>
<?php
error_reporting(0);
include 'koneksi.php'; //connect the connection page
  $username = $_POST['username'];
  $password = $_POST['password'];
if(empty($_SESSION)) // if the session not yet started 
   session_start();
if(!isset($_POST['submit'])) { // if the form not yet submitted
   header("Location: login.php");
   exit; 
}
$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
$result = mysqli_query($koneksi,$query) or die (mysqli_error());
$rows = mysqli_num_rows($result);
if($rows==1){
  $row2  = mysqli_fetch_array($result);               
	$_SESSION['username'] = $_POST['username'];
  $_SESSION['lastname'] = $row2['lastname'];
  $_SESSION['firstname']= $row2['firstname'];
  $_SESSION['pix'] =$row2['pix'];
  $_SESSION['lavel'] =$row2['lavel'];
  header("Location: home.php");
}else{ // if not a valid user  
  echo "<br>";
  echo "<h2> Invalid Password !!! Try Again </h2>"; 
  echo "<br>";
  echo "<font name='arial'> <font size='5'>";
  echo "<a href='logout.php'>Return To Login Page</a> " ;
  echo "</font></font>";
}

?>
</body>
</html>