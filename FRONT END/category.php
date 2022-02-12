<!doctype html>
<?php
  include "includes/config.php";

  $joinkategori = mysqli_query($connection, "SELECT * FROM kategori JOIN destinasi USING(kategoriID) JOIN fotodestinasi USING(destinasiID) WHERE kategorinama = 'Nature'");
  $joinkategori2 = mysqli_query($connection, "SELECT * FROM kategori JOIN destinasi USING(kategoriID) JOIN fotodestinasi USING(destinasiID) WHERE kategorinama = 'Ski'");
  $joinkategori3 = mysqli_query($connection, "SELECT * FROM kategori JOIN destinasi USING(kategoriID) JOIN fotodestinasi USING(destinasiID) WHERE kategorinama = 'Arts'");
  $joinkategori4 = mysqli_query($connection, "SELECT * FROM kategori JOIN destinasi USING(kategoriID) JOIN fotodestinasi USING(destinasiID) WHERE kategorinama = 'City'");
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
html {
  scroll-behavior: smooth;
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #6C8090;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #4C5964;
}
.pic img {
  width: 100%;
  height: auto;
  position: relative;
}
.pic h1{
  position: absolute; 
   top: 80%; 
   left: 10%; 
   width: 100%;
   font-size: 60px;
}
.pic h2{
  position: absolute; 
   top: 90%; 
   left: 10%; 
   width: 100%;
   font-size: 40px;
   font-family : Baskerville, Georgia, serif; 
   font-style : italic; 
}
.container1{
  margin: 0 10%
}
</style>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="index.css">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Eclair's Travel</title>
  </head>
  <body class="bg-light">
    <?php include "header.php";
    ?>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <div class="pic">
      <img src="images/mount.jpg">
      <h1 class="text-white">Categories</h1>
      <h2 class="text-white">"What Do You Wanna Pick?"</h2>  
    </div>
    
    <div class="container1">
      <h1 class="mb-5">Nature</h1>
      <div class="row">
        <?php while($row = mysqli_fetch_array($joinkategori)){ ?>
        <div class="col-sm-4">
          <figure class="figure discover">
            <img src="img/<?php echo $row["fotofile"] ?>" class="figure-img img-fluid" alt="Foto Tidak Ada">
            <h3><?php echo $row["destinasinama"] ?></h3>
            <p><?php echo $row["destinasialamat"] ?></p>
            <a href="destination.php" class="text-danger"><b>Learn More</b></a>     
          </figure>
        </div>
      <?php } ?>
      </div>

      <h1 class="mb-5 mt-5" style="border-top: 1px solid black;">Ski</h1>
      <div class="row">
        <?php while($row = mysqli_fetch_array($joinkategori2)){ ?>
        <div class="col-sm-4">
          <figure class="figure discover">
            <img src="img/<?php echo $row["fotofile"] ?>" class="figure-img img-fluid" alt="Foto Tidak Ada">
            <h3><?php echo $row["destinasinama"] ?></h3>
            <p><?php echo $row["destinasialamat"] ?></p>
            <a href="destination.php" class="text-danger"><b>Learn More</b></a>     
          </figure>
        </div>
      <?php } ?>
      </div>  

      <h1 class="mb-5 mt-5" style="border-top: 1px solid black;">Arts</h1>
      <div class="row">
        <?php while($row = mysqli_fetch_array($joinkategori3)){ ?>
        <div class="col-sm-4">
          <figure class="figure discover">
            <img src="img/<?php echo $row["fotofile"] ?>" class="figure-img img-fluid" alt="Foto Tidak Ada">
            <h3><?php echo $row["destinasinama"] ?></h3>
            <p><?php echo $row["destinasialamat"] ?></p>
            <a href="destination.php" class="text-danger"><b>Learn More</b></a>     
          </figure>
        </div>
      <?php } ?>
      </div>       

      <h1 class="mb-5 mt-5" style="border-top: 1px solid black;">City</h1>
      <div class="row">
        <?php while($row = mysqli_fetch_array($joinkategori4)){ ?>
        <div class="col-sm-4">
          <figure class="figure discover">
            <img src="img/<?php echo $row["fotofile"] ?>" class="figure-img img-fluid" alt="Foto Tidak Ada">
            <h3><?php echo $row["destinasinama"] ?></h3>
            <p><?php echo $row["destinasialamat"] ?></p>
            <a href="destination.php" class="text-danger"><b>Learn More</b></a>     
          </figure>
        </div>
      <?php } ?>
      </div>
    </div>

    <?php
    include "footer.php"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>
  </body>
</html>