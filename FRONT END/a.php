<!doctype html>
<?php
  include "includes/config.php";
  $jumlahtampilan = 4;
  $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
  $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

  $joinberita = mysqli_query($connection,"SELECT * FROM berita JOIN destinasi USING(destinasiID) JOIN fotodestinasi USING(destinasiID) ORDER BY beritaID LIMIT $mulaitampilan, $jumlahtampilan");

  $query = mysqli_query($connection, "SELECT * FROM berita ORDER BY beritaID");
  $jumlahrecord = mysqli_num_rows($query);
  $jumlahpage = ceil($jumlahrecord/$jumlahtampilan);

   $joindestinasi = mysqli_query($connection, "SELECT * FROM fotodestinasi f, destinasi d, area a 
    WHERE f.destinasiID = d.destinasiID AND
    d.areaID = a.areaID");
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.container1{
  margin: 0 10%;
}
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
   font-size: 60px
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
.gmbr img{
  width: 50%;
  margin-left: 25%;
  margin-top: 5%
}
.discover img:hover{
  opacity:0.4; transition: opacity 1s;
  -webkit-transform: scale(0.95);
        -ms-transform: scale(0.95);
        transform: scale(0.95);
}
.discover img{
  transition: transform .5s ease;
}
@media only screen and (max-width: 2000px) {
  .discover img, .news img{
    height: 350px;width: 100%
  }
}
@media only screen and (max-width: 1280px) {
  .discover img, .news img{
    height: 250px;width: 100%
  }
}
@media only screen and (max-width: 1080px) {
  .discover img, .news img{
    height: 200px;width: 100%
  }
}
@media only screen and (max-width: 600px) {
  .discover img, .news img{
    height: 150px;width: 100%
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
      <img src="images/search.jpg">
      <h1 class="text-white">Search</h1>
      <h2 class="text-white">"Looking for Something?"</h2>  
    </div>

    <div class="container1">
      <form method="POST">
        <div class="form-group row mb-2">
          <label for="search" class="col-sm-3">Search for Destination</label>
          <div class="col-sm-8">
            <input type="text" name="search" class="form-control" id="search" placeholder="Search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>">
          </div>
          <input type="submit" name="kirim" class="col-sm-1 btn-primary" value="Search">
        </div>
      </form>
    </div>
    <?php
          if (isset($_POST["kirim"])) 
          {
            $search = $_POST['search'];
            $query = mysqli_query($connection, "SELECT * FROM destinasi WHERE destinasinama LIKE '%".$search."%' 
              OR destinasialamat LIKE '%".$search."%'");
          } else
          {
            $query = mysqli_query($connection, "SELECT * FROM destinasi");
          } ?>

          <div class="container">
            <div class="row">
              <?php while ($row = mysqli_fetch_array($query)) 
              { ?>
              <div class="col-sm-4">
                <figure class="figure discover">
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
