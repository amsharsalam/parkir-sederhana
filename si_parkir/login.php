<?php
include 'koneksi.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started 
   session_start();


if(isset($_SESSION['username'])) { // if already login
   header("location: home.php"); // send to home page
   exit; 
}

?>
<!DOCTYPE html>
<html>
<head></head>
<body>
  <style>
  body {
    background-color:#fff;
    font-family:arial;
    font-size:20px;
  }
  input, button, select, option, textarea {
    font-size: 100%;
  }

  </style>
  <div style = "float: center; display: inline-block; background-color: #00675b;">
    <br><h2> Login</h2>
    <form action = 'login_process.php' method='POST'>
      Enter   Username:   &nbsp;
      <input type="text" name="username" />  <br><br>
      Enter Password: &nbsp;
      <input type="password" name="password" />
      <br> <br>
      <input type = "submit" name="submit" value="Ok" />  
    </form>
  </div>
</body>
</html>