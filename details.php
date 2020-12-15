<!-- Query DB for lesson table -->
<?php
include 'inc/connection.php';

if(isset($_GET['img_id']))
{
   $img_id = $_GET['img_id'];
 }
 elseif(isset($_POST['message']))
 {
   $img_id = $_POST['img_id'];
 }
   try{
 $results = $db->prepare('SELECT img_id, title, url, description, method, subject FROM img
   JOIN category ON img.category_id = category.category_id
	 JOIN code ON img.code_id = code.code_id
	 WHERE img.img_id = ?');
 $results->bindParam(1, $img_id);
 $results->execute();

 $image = $results->fetch(PDO::FETCH_ASSOC);
   if($image == FALSE)
   {
    echo 'Sorry, a lesson could not be found with the provided ID.';
      die();
   }
}
catch(Exception $e)
{
	echo $e->getMessage();
	die();
}


if(isset($_POST['message']))
{
  if($_POST['name'] == '')
  {
  $name = 'Anonymous';
  }
   else
  {
  $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
  }
  $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_SPECIAL_CHARS);
  try{
  $results = $db->prepare('INSERT INTO comments (name, comment, img_id)
                          VALUES (?, ?, ?)');
  $results->bindParam(1, $name);
  $results->bindParam(2, $comment);
  $results->bindParam(3, $img_id);
  $results->execute();
                        }
  catch(Exception $e){
    $error_message = $e->getMessage();
  }
}

if(isset($_GET['img_id']) || isset($_POST['img_id']))
{
  try{
  $results = $db->prepare('SELECT img_id, name, comment, approved FROM comments
  WHERE img_id = ?');
  $results->bindParam(1, $img_id);
  $results->execute();
  $comments = $results->fetchAll(PDO::FETCH_ASSOC);
}
catch(Exception $e)
{
  $error_message = $e->getMessage();
}

}

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'inc/styles.php'; ?>
	<title><?php echo $image['title'] ?></title>
</head>
<style>
a:hover{
	text-decoration: none;
}
</style>
<body>
	<?php include 'inc/nav.php'; ?>
<div class="container">
  <h1 class="nice">Details</h1>
  <span class="btn-group-justified"><a href="home.php" class="btn btn-lg btn-info">Home</a><a href="library.php" class="btn btn-lg btn-warning">Search</a></span>


		<article class="jumbotron">
		<?php
        echo '<h3 class="text-center">' . $image['title'] .'</h3>';
				echo '<p class="text-center">Subject: ' . $image['subject'];
				echo '. <b class="red">C</b><b class="green">U</b><b class="blue">E</b>: ' . $image['method'] . '</p>';
				echo '<figure>';
				echo '<img id="imageresource" src="img/' . $image['url'] . '.png"' . ' class="img-responsive center-block"/>';
				echo '<figcaption>' . $image['description'] . '</figcaption>';
        echo '<a class="btn btn-lg btn-default center-block" href="#" id="pop">Click Here To Zoom In</a>';
		?>
	</article>
  <br><br>
    <div class="jumbotron">
      <h2>Comments</h2>
      <?php
      if(isset($_POST['message']))
            {
              echo '<p class="alert alert-success center-block text-center">Your comment has been submitted and is awaiting approval.</p>';
            }
      foreach($comments as $display)
      {
        if($display['approved'] == 1)
        {
          echo '<aside class="commentbox"><br>';
          echo '<p class="black">' . $display['name'] . '</p>';
          echo '<q class="commentmessage">' . $display['comment'] . '</q><br><br>';
          echo '</aside><br>';
        }
      }
      ?>
      <hr>
  <form class="form" action="details.php" method="post">
  <div class="form-group row">
  <label class="col-xs-2" for="name">Name</label>
<div class="col-xs-10">
  <input type="text" id="name" name="name" placeholder="Anonymous" class="form-control">
</div>
</div>
<div class="form-group row">
  <label for="comment" class="col-xs-2">Comment</label>
<div class="col-xs-10">
  <textarea name="comment" id="comment" rows="6" class="form-control" required></textarea>
</div>
  <input type="hidden" name="img_id" value="<?php echo $image['img_id']; ?>">
  <input type="submit" name="message" value="Submit" class="btn btn-lg btn-success center-block"/>
  </form>
</div>
</div>
  </div>

	<!-- Creates the bootstrap modal where the image will appear -->
	<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h3 class="modal-title text-center" id="myModalLabel"><?php echo $image['title'] ?></h3>
	      </div>
	      <div class="modal-body">
					<?php echo '<figure>'; ?>
					<img src="img/<?php echo $image['url'];?>.png" id="imagepreview" class="center-block" style="width: 90%; height: 55%;" >
					<?php echo '<figcaption>' . $image['description'] . '</figcaption>'; ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger btn-lg center-block" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


	  <?php include 'inc/scripts.php'; ?>
		<script>
		$("#pop").on("click", function() {
		   $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
		   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
		});
		</script>
  </body>
  </html>
