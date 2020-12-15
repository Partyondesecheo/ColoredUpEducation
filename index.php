 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
   <?php include 'inc/styles.php'; ?>
 	<title>Colored Up Education</title>
 </head>
 <body>


 <div class="container text-center">
   <h1 class="nice">Colored Up Education</span></h1><br>
   <h2 class="nice"><i class="fa fa-arrow-down" aria-hidden="true"></i>Featuring<i class="fa fa-arrow-down" aria-hidden="true"></i></h2>
 </div>
   <!--Carousel-->
   <div id="myCarousel" class="carousel slide">
     <div class="container-fluid">
       <ol class="carousel-indicators">
         <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
         <li data-target="#myCarousel" data-slide-to="3"></li>
         <li data-target="#myCarousel" data-slide-to="4"></li>
         <li data-target="#myCarousel" data-slide-to="5"></li>
         <li data-target="#myCarousel" data-slide-to="5"></li>
       </ol>
       <div class="carousel-inner">
         <!--Item 0 -->
         <div class="item active text-center">
              <h1 class="nice">References</h1>
   <img class="img-responsive" src="img/kaufman_form_2_index.png" alt="Rewritten area formula for regular shapes">

 </div>
         <!-- /Item0 -->
         <!--Item1 -->
         <div class="item text-center">
               <h1 class="nice">Arithmetic</h1>
  <img class="img-responsive" src="img/perfect_squares_4_index.png" alt="perfect squares and their ending digits">

</div>
         <!-- /Item1 -->
         <!--Item2 -->
         <div class="item text-center">
               <h1 class="nice">Graphs</h1>
  <img class="img-responsive" src="img/graph_poly_index.png" alt="slope intercept equation and graph">

</div>
         <!-- /Item2 -->
         <!--Item3 -->
         <div class="item text-center">
               <h1 class="nice">Algebra</h1>
  <img class="img-responsive" src="img/literal_eq_index.png" alt="perfect squares and their ending digits">

</div>
         <!-- /Item3 -->
         <!--Item3 -->
         <div class="item text-center">
               <h1 class="nice">Creative Art</h1>
  <img class="img-responsive" src="img/tetrahedrons_index.png" alt="two 3d printer pen drawn tetrahedrons">

</div>
         <!-- /Item4 -->
         <!--Item5 -->
         <div class="item text-center">
                <h1 class="nice">Shapes &amp; Trig</h1>
   <img class="img-responsive" src="img/trig_laws_index.png" alt="laws of sine and cosine">

 </div>
         <!-- /Item5 -->
         <!--Item6 -->
         <div class="item text-center">
               <h1 class="nice">Jokes</h1>
  <img class="img-responsive" src="img/evolution_index.png" alt="math evolution joke">

</div>
         <!-- /Item6 -->
         <!-- Left and right controls -->
           <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
           </a>
           <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
             <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
             <span class="sr-only">Next</span>
           </a>
           <!--/Controls -->
   </div>
   <!--End Carousel-->
   </div>
 </div>
 <div class="container jumbotron text-center">
   <h3>A Free <b class="red">C</b><b class="orange">o</b><b class="yellow">l</b><b class="green">o</b><b class="blue">r</b><b class="purple">e</b><b class="magenta">d</b> Digital Math Textbook</h3>
 <p><q>When you know the <span class="red">C</span><span class="blue">U</span><span class="green">E</span>, you get it!</q></p>

  <a class="btn btn-lg btn-success center-block" href="home.php">Click Here To Enter</a>

 </div>

   <?php include 'inc/scripts.php'; ?>
   <script>
      $(document).ready(function() {
        $('.carousel').carousel({
          interval: 3000
        })
      });
    </script>
   </body>
   </html>
