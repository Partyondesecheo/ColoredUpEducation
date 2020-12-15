<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
{
header("Location: login.php");
}
include('inc/connection.php');
try{
$results = $db->query('SELECT img.img_id, url, comment_id, name, comment, approved FROM img
  JOIN comments on img.img_id = comments.img_id
  WHERE approved = 0');
  $results->fetch(PDO::FETCH_ASSOC);
  }
  catch(Exception $e)
  {
    echo $e->getMessage() . ' Query failed!';
    die();
  }
if(isset($_POST['approval']) && $_POST['approval'] === 'yes')
{
  try{
  $comment_id = $_POST['comment_id'];
  $approved = $db->query('UPDATE comments SET approved = 1
    WHERE comment_id =' . $comment_id);
    header("Location: admin.php");
    }
    catch(Exception $e)
  {
    echo $e->getMessage() . 'Could not approve comment';
    die();
  }
}
if(isset($_POST['approval']) && $_POST['approval'] === 'no')
{
  try{
  $comment_id = $_POST['comment_id'];
  $approved = $db->query('DELETE FROM comments
    WHERE comment_id =' . $comment_id);
    header("Location: admin.php");
    }
    catch(Exception $e)
  {
    echo $e->getMessage() . 'Could not delete comment';
    die();
  }
}

 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
   <?php include 'inc/styles.php'; ?>
 	<title>Admin Page</title>
 </head>
 <body>
   <h1 class="nice">Welcome to Admin!</h1>
   <a class="btn btn-lg btn-default center-block" href="logout.php">Exit Admin Portal</a><br>
   <?php foreach($results as $approval)
   {
     echo '<aside class="commentbox"><br>';
     echo '<p">Name: ' . $approval['name'] . '</p>';
     echo '<q class="commentmessage">Comment: ' .  $approval['comment'] . '</q><br>';
     echo '<img src="img/' . $approval['url'] . '.png"' . ' class="img-responsive center-block"/>';
     echo '<form method="post" action="admin.php">';
     echo '<input type="hidden" name="comment_id" value="' . $approval['comment_id'] .'">';
     echo '<div class="radio"><label><input type="radio" value="yes" name="approval">Approve</label></div>';
     echo '<div class="radio"><label><input type="radio" value="no" name="approval">Reject</label></div>';
     echo '<input type="submit" value ="Confirm" name="confirm">';
     echo '</aside><br>';
     echo '</form>';
   }
   ?>
   <?php include 'inc/scripts.php'; ?>
 </body>
 </html>
