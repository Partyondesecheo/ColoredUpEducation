
<?php
include 'inc/connection.php';

try{
$sql = 'SELECT *, subject FROM img
  JOIN category ON img.category_id = category.category_id
  ORDER BY RAND()';
  $results = $db->query($sql);
  $results->fetch(PDO::FETCH_ASSOC);
  }
catch(Exception $e)
{
  echo $e->getMessage() . ' Bad Query';
  die();
}
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'inc/styles.php'; ?>
	<title>Browse</title>
  <style>
  a:link{
    color: ##c00;
  }
  a:hover{
    color: #00c;
  }
  a:visited{
    color: #0c0;
  }
  </style>
</head>
<body>
	<!-- Nav Menu-->
	<?php include 'inc/nav.php'; ?>
<div class="container-fluid">
  <div class="jumbotron">
  <h1><b class="black">The</b> <b class="red">L</b><b class="orange">i</b><b class="yellow">b</b><b class="green">r</b><b class="blue">a</b><b class="purple">r</b><b class="magenta">y</b></h1>
  <p>You can filter the data by Title or Subject. Click on either the Thumbnail <b>or</b> the Title to see the full lesson.</p>
  </div>
  <div class="jumbotron">
<table id="sortbox" class="table table-hover table-condensed">
  <thead>
  <tr class="row"><th class="col-lg-2">Thumbnail</th><th class="col-lg-5">Title</th><th class="col-lg-5">Subject</th></tr></thead>
  <tbody>
  <?php
  	foreach($results as $item)
  	{
      echo '<tr class="row">';
  		echo '<td class="col-lg-2"><a href="details.php?img_id=' . $item['img_id'] .'"><img src="img/' . $item['url'] . '.png"' . ' class="img-responsive center-block" style="max-width: 50px; max-height: 50px;"/></a></td>';
  		echo '<td class="col-lg-5"><a href="details.php?img_id=' . $item['img_id'] .'">' .  $item['title'] . '</td></a>';
  		echo '<td class="col-lg-5">' . $item['subject'] . '</td>';
      echo '</tr>';
  	}
  	?>
  </tbody>
  </table>
</div>
</div>
<?php
include 'inc/scripts.php';
 ?>
 <script>
 $(document).ready(function () {
               $('#sortbox').dataTable();
           });
 </script>
 </body>
 </html>
