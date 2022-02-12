<!doctype html>

<?php
ob_start();
session_start();

include "includes/config.php";

if(!isset($_SESSION['emailuser']))
	header("location:login.php");
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="img/favicon.ico" rel="shortcut icon">


    <title>Eclair's Travel</title>
  </head>
  <body>
  	<?php include "header.php";?>
  	<div class="jumbotron jumbotron-fluid" >
  		<div class="container">
        <img src="img/logo.png" style="width:50px; height:50px; float:left;">
  			<h1 class="display-4" style="color:#8D6E63;">Dashboard Eclair's Travel</h1>
  		</div>
  	</div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="1000">
          <img src="img/home1.jpg" class="d-block w-100" style="background-size: 100%; height:500px">
        </div>
        <div class="carousel-item">
          <img src="img/home4.jpg" class="d-block w-100" style="background-size: 100%; height:500px">
        </div>
        <div class="carousel-item">
          <img src="img/home3.jpg" class="d-block w-100" style="background-size: 100%; height:500px">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  	<?php include "footer.php";?>
  </body>
  <?php
  mysqli_close($connection);
	ob_end_flush();
	?>
</html>