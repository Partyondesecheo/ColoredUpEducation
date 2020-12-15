<?php

session_start();

$username = 'ColoredUpAdmin';
$password = 't1219898';

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
header("Location: admin.php");

}
if(isset($_POST['username']) && isset($_POST['password']))
{
  if(($_POST['username'] == $username && $_POST['password'] == $password))
  {
    $_SESSION['logged_in'] = true;
    header("Location: admin.php");
  }
  else {
    echo '<div class="alert alert-danger" role="alert">INVALID!</div>';
  }
}

 ?>
<!DOCTYPE html>
 <html>
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'inc/styles.php'; ?>
</head>
 <body>
   <div class="container">
   <form class="form" method="post" action="login.php">
<div class="form-group">
     <label for="username">Username</label><input class="form-control" type="text" name="username">
   </div>
   <div class="form-group">
     <label for="password">Password</label><input class="form-control" type="password" name="password">
   </div>
     <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
   </form>
   <a class="btn btn-default btn-lg btn-block" href="index.php">Go Back</a>
 </div>
   <?php include 'inc/scripts.php'; ?>
 </body>
 </html>
