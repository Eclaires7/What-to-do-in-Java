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
      <img src="images/n.jpg">
      <h1 class="text-white">Destinations</h1>
      <h2 class="text-white">"Nature From Switzerland"</h2>  
    </div>
    
    <div class="container1 mt-5">
      <div class="row">
        <?php while($row = mysqli_fetch_array($joindestinasi)){ ?>
        <div class="col-sm-4">
          <figure class="figure discover">
            <img src="img/<?php echo $row["fotofile"] ?>" class="figure-img img-fluid" alt="Foto Tidak Ada">
            <h3><?php echo $row["destinasinama"] ?></h3>
            <p><?php echo $row["destinasialamat"] ?></p>
            <a href="https://www.myswitzerland.com/en-id/destinations/nature/swiss-parks/" class="text-danger"><b>Learn More</b></a>     
          </figure>
        </div>
      <?php } ?>
      </div>     
    </div>

    <div class="container1">
      <div class="row">
        <h1 style=" font-size: 45px; margin-bottom: 30px">See the News!</h1>
        <div class="row">
          <?php while($row2 = mysqli_fetch_array($joinberita)){ ?>
          <div class="col-sm-6" >
            <figure class="figure news">
              <img src="img/<?php echo $row2["fotofile"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada">
              <h4 style="color: black"><?php echo $row2["beritajudul"] ?></h4>
              <p style="text-align: justify;"><?php echo $row2["beritaketerangan"] ?></p>
              <a href="https://www.detik.com/" class="text-danger"><b>Learn More</b></a>
            </figure>
          </div>
        <?php } ?>
        </div>
        <div class="d-flex justify-content-center" style=" width: 100%">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal=1; echo $nomorhal ?>">First</a></li>
            <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++)
            { ?>
            <li class="page-item">
              <?php 
              if($nomorhal!=$halaman)
              { ?>
              <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal?></a>
              <?php } 
              else{ ?>
                <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal?></a>
              <?php } ?>
            </li>
            <?php } ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal-1 ?>">Last</a></li>
          </ul>
        </div>
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