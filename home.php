<!DOCTYPE html>
<?php
include('inc/connection.php');

	try{
	  $sql = "SELECT *, subject FROM img
		JOIN category on img.category_id = category.category_id ORDER BY RAND() LIMIT 2";
	$results = $db->query($sql);
	$results->fetch(PDO::FETCH_ASSOC);
	}
	catch(Exception $e){
	  //echo '<p>' . $e->getMessage() . '</p>';
	  die('FAILURE');
	}
	?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'inc/styles.php'; ?>
	<title>Home</title>
</head>
<body>
	<!-- Nav Menu-->
	<?php include 'inc/nav.php'; ?>
	<!-- /Nav Menu -->
<div class="container">
	<h2 class="nice">Home:</h2>
	<a class="center-block btn btn-warning btn-lg" href="library.php">Browse The Library</a>
<div class="jumbotron">
	<!-- Should Contain Home, About, Browse, Categories (Algebra, Art, Jokes Trigonometry, Tooltips), Contact, Login/Logout-->
<h2 class="red">What is a CUE?</h2>
<p>Before you get started using this library, you should know how it works.  It is definitely more of an unorthodox set of lessons!</p>
<p>A <b class="red">C</b><b class="green">U</b><b class="blue">E</b> is a special type of
<b class="red">c</b><b class="orange">o</b><b class="yellow">l</b><b class="green">o</b><b class="blue">r</b><b class="purple">e</b><b class="pink">d</b> tip that you get while reading a lesson that has a special meaning to it.</p>
<hr>
<h2 class="green">How many CUEs are there?</h2>
<p>Currently, there are three primary <b class="red">C</b><b class="green">U</b><b class="blue">E</b> types: Algorithm, Distinction, and View.  Within each lesson details, you should find the CUE type placed just above the picture next to the subject.
	<ol>
		<li><u class="black">Algorithm</u>: Colors of the <b class="red">R</b><b class="orange">a</b><b class="yellow">i</b><b class="green">n</b><b class="blue">b</b><b class="purple">o</b><b class="pink">w</b>
			are used in their general order to show how a method works step by step.  Algorithm <b class="red">C</b><b class="green">U</b><b class="blue">E</b>s are typically done in this order.
			<ol>
				<li class="red">Red</li>
				<li class="orange">Orange</li>
				<li class="yellow">Yellow</li>
				<li class="green">Green</li>
				<li class="blue">Blue</li>
				<li class="purple">Purple</li>
				<li class="pink">Pink</li>
			</ol>
		Sometimes colors are skipped (due to student preference) or not used (the question is very simple), so keep your eyes open!</li><br>
		<li><u class="black">Distinction</u>: This type of <b class="red">C</b><b class="green">U</b><b class="blue">E</b> is a little bit of a mixed bag.  Categories is another good name. These categories could be various things:<br>
	<div class="row"><div class="col-sm-6"><u>Parts of an equation:</u>
	<ol type="a">
	<li class="red">Red = ax<sup>2</sup></li>
	<li class="blue">Blue = bx</li>
	<li class="green">Green = c</li>
</ol>
	Which altogether form <b class="black">Y =</b> <b class="red">ax<sup>2</sup></b> <b class="blue">+bx</b> <b class = "green">c</b>, which is the generaly quadratic formula.<br><br></div>
	<div class="col-sm-6">
	 <u>Parts of a diagram:</u>
<ol type="a">
	<li class="teal"> Teal = Quadrant 1</li>
	<li class="pink"> Pink = Quadrant 2</li>
	<li class="purple"> Purple = Quadrant 3</li>
	<li class="brown"> Brown = Quadrant 4</li>
</ol>
These colors could indicate the four quadrants on the coordinate plane. </div>
</div>
<br>There are other ways distinction (categories) breaks parts of a lesson up for you.  The colors you see may vary from lesson to lesson, due to the tastes of different students who helped write this!<br><br>  The challenge is to figure out which colors match up with what. Not to worry though!  If you get stuck, reach out to us in the comments or contact us!
</li>
<br>
<li><u class="black">View</u>: These <b class="red">C</b><b class="green">U</b><b class="blue">E</b>s are pieces of work that are meant to be mostly appreciated for what they are.  The colors are just there to look pretty.  You will probably know once you see a view, because there is usually a joke or some art associated with it!</li>
	</ol>
	<hr>
	<h2 class="blue">Which colors &amp; subjects are available?</h2>
<div class="row">
	<div class="col-sm-6">
<b class="black">Colors</b> These are the colors you will find inside, coded in various ways to <b class="red">C</b><b class="green">U</b><b class="blue">E</b> you in:
	<ul>
    <li class="red">Red</li>
    <li class="burgundy">Burgundy</li>
    <li class="orange">Orange</li>
    <li class="yellow">Yellow</li>
    <li class="green">Green</li>
    <li class="blue">Blue</li>
    <li class="teal">Teal</li>
    <li class="purple">Purple</li>
    <li class="plum">Plum</li>
    <li class="magenta">Magenta</li>
    <li class="pink">Pink</li>
    <li class="brown">Brown</li>
    <li class="gray">Gray</li>
    <li class="black">Black</li>
  </ul>
</div>
<div class="col-sm-6">
<b class="black">Subjects:</b> We currently offer these subjects for you browse:
<ol>
	<li class="red">Algebra</li>
	<li class="orange">Arithmetic</li>
	<li class="yellow">Art</li>
	<li class="green">Graph</li>
	<li class="blue">Joke</li>
	<li class="purple">Reference</li>
	<li class="magenta">Shapes (contains Trigonometry too)</li>
</ol>
As time goes on, we will add <b class="brown">Geometry</b>, <b class="gray">Statistics</b>, and <b class="black">Computer Programming</b>. Be sure to stay tuned and give some feedback as this library grows!
</div>
</div>
<hr>
<h2>Random Sample: Click For Details</h2>

<?php
	foreach($results as $item)
	{
		echo '<article class="img-thumbnail center-block btn-default">';
		echo '<h5 class="text-center">' . $item['subject'] . ': ' . $item['title'] . '</h5>';
		echo '<a href="details.php?img_id=' . $item['img_id'] .'"><img src="img/' . $item['url'] . '.png"' . ' class="img-responsive center-block"/></a>';
		echo '</article><br>';
	}
	?>
	<a href="#top" class="btn btn-lg btn-default center-block">Back to top of the page</a>
</div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
