<?php

$servername = "localhost";


if($_SERVER["HTTP_HOST"] == 'localhost')
{
  $username = "root";
  $password = "";
  $dbname = 'cue';
}
else{
  $username = 'jkaufman_admin';
  $password = 'dontsharemypassword';
  $dbname = 'jkaufman_cue';
}

try{
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo $e->getMessage();
}

 ?>
