<!doctype html>
<?php
  include "includes/config.php";
  $area = mysqli_query($connection, "SELECT * FROM area");

  $joindestinasi = mysqli_query($connection, "SELECT * FROM kategori k, destinasi d, fotodestinasi f
    WHERE k.kategoriID = d.kategoriID
    AND d.destinasiID = f.destinasiID");

  $destinasi = mysqli_query($connection, "SELECT * FROM destinasi");

  $foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");

  $kategori = mysqli_query($connection, "SELECT * FROM kategori");

  $hotel = mysqli_query($connection, "SELECT * FROM hotel");
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="shortcut icon">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="index.css">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
  ul li a{
    font-size: 20px
  }
@media only screen and (max-width: 3000px) {
  .titlee a{
    margin-left: 26%; font-family: 'Montserrat', sans-serif;font-weight: 300; text-transform: uppercase;font-size: 40px;
  }
  .titlee p{
    margin-left:60%; font-family: 'Lora', serif; color: black
  }
  .bar ul{
    padding-left: 2%; padding-top: 1.5%;width: 80%
  }
}
@media only screen and (max-width: 1280px) {
  .titlee a{
    margin-left: 25%; font-family: 'Montserrat', sans-serif;font-weight: 300; text-transform: uppercase;font-size: 25px;
  }
  .titlee p{
    margin-left:50%; font-family: 'Lora', serif;color: black
  }
  .sea{
    width: 30%
  }
  .bar ul{
    padding-left: 2%; padding-top: 1.5%;width: 80%
  }
}
@media only screen and (max-width: 1024px) {
  .bar ul li a{
    font-size: 15px
  }
  .titlee a{
    margin-left: 10%; font-family: 'Montserrat', sans-serif;font-weight: 300; text-transform: uppercase;font-size: 22px;
  }
  .titlee p{
    margin-left:25%; font-family: 'Lora', serif; font-size: 15px; color: black
  }
  .sea{
    width: 40%
  }
  .bar ul{
    padding-top: 1.5%;width: 60%
  }
}
@media only screen and (max-width: 600px) {
  .titlee a{
    margin-left: 40%;font-family: 'Montserrat', sans-serif;font-weight: 300; text-transform: uppercase;font-size: 30px;
  }
  .titlee p{
    margin-left:50%; font-family: 'Lora', serif;color: black
  }
  .bar ul{
    padding-left: 2%; padding-top: 1.5%;width: 80%
  }
}
</style>

    <title>Eclair's Travel</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse bar" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown dropright">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Destinations
            </a>
            <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
              <?php
                if(mysqli_num_rows($destinasi)>0){
                  while($row = mysqli_fetch_array($destinasi))
                  { ?>
                  <a class="dropdown-item" href="destination.php"><?php echo $row["destinasinama"]?></a>
                <?php } } ?>
            </div>
          </li>
          <li class="nav-item dropdown dropright">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <div class="dropdown-menu  bg-light" aria-labelledby="navbarDropdownMenuLink">
              <?php
                if(mysqli_num_rows($kategori)>0){
                  while($row2 = mysqli_fetch_array($kategori))
                  { ?>
                  <a class="dropdown-item" href="category.php"><?php echo $row2["kategorinama"]?></a>
                <?php } } ?>
            </div>
          </li>
          <li class="nav-item dropdown dropright  bg-light">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hotel
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
                if(mysqli_num_rows($hotel)>0){
                  while($row3 = mysqli_fetch_array($hotel))
                  { ?>
                  <a class="dropdown-item" href="hotel.php"><?php echo $row3["hotelnama"]?></a>
                <?php } } ?>
            </div>
          </li>
          <li class="nav-item bg-light">
            <a class="nav-link" href="map.php">
              About
            </a>
          </li>
          
          <li>
            <div class="titlee">
              <a class="navbar-brand" href="index.php">Eclair's Travel<span class="sr-only">(current)</span></a>
              <p>By Felicia K</p>
            </div>
          </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0 sea">
          <label class="mr-5">Looking for Something?</label>
          <a href="a.php" class="btn btn-outline-success my-2 my-sm-0">Search</a>
        </form>
      </div>
    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>