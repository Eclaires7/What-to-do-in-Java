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

  

  $area = mysqli_query($connection, "SELECT * FROM area");

  $joindestinasi = mysqli_query($connection, "SELECT * FROM destinasi JOIN fotodestinasi USING(destinasiID)");

  $destinasi = mysqli_query($connection, "SELECT * FROM destinasi");

  $foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");

  $kategori = mysqli_query($connection, "SELECT * FROM kategori");
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="shortcut icon">
<style>
.discover img:hover{
  opacity:0.4; transition: opacity 1s;
  -webkit-transform: scale(0.95);
        -ms-transform: scale(0.95);
        transform: scale(0.95);
}
.discover img{
  transition: transform .5s ease;
}
.textinpic{
  position: absolute;
  bottom: 30px;
  right: 20px;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
  font-weight: 600;
  font-size: 30px
}
.container1{
  margin: 0 10%
}
@media only screen and (max-width: 2000px) {
  .discover img{
    height: 300px;width: 100%
  }
  iframe{
    height:855px;
  }
  .news img{
    height: 400px;width: 100%
  }
  .disc h1{
    font-size: 45px; width: 380px;
  }

}
@media only screen and (max-width: 1280px) {
  .discover img{
    height: 250px;width: 100%
  }
  iframe{
    height:710px;
  }
  .news img{
    height: 300px;width: 100%
  }
  .disc h1{
    font-size: 40px; width: 330px;
  }
}
@media only screen and (max-width: 1080px) {
  .discover img{
    height: 200px;width: 100%
  }
  iframe{
    height:565px;
  }
  .news img{
    height: 250px;width: 100%
  }
  .disc h1{
    font-size: 35px; width: 270px;
  }
}
@media only screen and (max-width: 600px) {
  .discover img{
    height: 150px;width: 100%
  }
  iframe{
    height: 225px
  }
  .news img{
    height: 200px;width: 100%
  }
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
html {
  scroll-behavior: smooth;
}
.fact img{
  width: 100%; height: 400px
}
.fact{
  padding : 0 10%;
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


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="0">
          <iframe class="d-block w-100" width="100%" src="https://www.youtube.com/embed/linlz7-Pnvw?start=481&autoplay=1&mute=1&controls=0&rel=0&loop=1&autopause=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" frameborder="0" style="border:0;"></iframe>
          <div class="carousel-caption d-none d-md-block">
            <h1>Let's Travel To Switzerland</h1>
            <p>Travel From Home</p>
          </div>
        </div>
        <div class="carousel-item" data-interval="0">
          <iframe class="d-block w-100" height="950" width="100%"src="https://www.youtube.com/embed/Z-vJ7bXAqD0?controls=0&amp;start=47&autoplay=1&mute=1&rel=0&loop=1&autopause=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" frameborder="0" style="border:0;"></iframe>
          <div class="carousel-caption d-none d-md-block">
            <h1>See the beauty of Switzerland</h1>
            <p>Time Lapse</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container1 mt-5">
      <div class="row disc">
        <h1>Discover Switzerland now!</h1>
        <?php while($row = mysqli_fetch_array($joindestinasi)){ ?>
        <div class="col-sm-4">
          <figure class="figure discover">
            <img src="img/<?php echo $row["fotofile"] ?>" class="figure-img img-fluid" alt="Foto Tidak Ada">
            <p class="textinpic"><?php echo $row["destinasinama"] ?></p>           
          </figure>
        </div>
      <?php } ?>
      </div>
      <div class="row justify-content-center">
        <a class="btn btn-info btn-lg" href="destination.php">See More</a>
      </div>
      
    </div>

    <div class="container1"> 
      <iframe width="100%" height="315" src="https://www.youtube.com/embed/fVkRDWHtFW8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

    <div class="container1">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/a.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>The Swiss Marry Late</h3>
            <p style="background: rgba(82, 95, 96, 0.76);">Based on a report by the United Nations, the average marriage age for Swiss men is 31.8 and 29.5 for women. On the other hand, The Local CH reports that the divorce rate in Switzerland is about 40%, and as per the Central Intelligence Agency’s publication, the average age for Swiss women to have their first child is 30.4 years, which makes them the oldest women in Europe to do so.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/b.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Switzerland Has 7000 Lakes</h3>
            <p style="background: rgba(82, 95, 96, 0.76);">Switzerland’s lakes are the best ones to swim in and you have plenty to choose from. With an area of 580.03 km2 (224 sq mi), Lake Geneva is the largest lake in Switzerland.  It is shared with France (40.47% is within French territory) where it’s known as Lac Léman. The largest lake completely within Switzerland is Lake Neuchâtel with a surface area of 218.3 km2 (84 sq mi). For the most part, the freshwater is so clear that you can drink out of rivers and lakes. Only if you cannot see the bottom of a lake is it considered dirty.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/c.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>One of the Most Expensive Places to Live In</h3>
            <p style="background: rgba(82, 95, 96, 0.76);">Both the Worldwide Cost of Living Survey and the Mercer Cost of Living survey found Zurich to be the world’s third most expensive city. Zurich is also the most populated canton with 402,762 inhabitants.  The median home price there is CHF 13,000 ($13,036) per square meter, while the average monthly rental price: CHF 2,324 ($2,330) for a three-bedroom apartment. However, the average salary is CHF 103,296 ($103.298), so it’s not like they can complain.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
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