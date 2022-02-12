<!doctype html>
<?php
  include "includes/config.php";
  $joinhotel = mysqli_query($connection, "SELECT * FROM hotel h, destinasi d
    WHERE h.destinasiID = d.destinasiID");
  $hotel = mysqli_query($connection, "SELECT * FROM hotel")
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
      <img src="images/about.jpg">
      <h1 class="text-white">About Me</h1>
      <h2 class="text-white">"Let Me Introduce Myself"</h2>  
    </div>
    

    <div class="container1">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            
            <div style="margin-bottom: 50px">
              <img style="border-radius: 15px; width: 500px; height: 300px; float: left; margin-right: 20px" src="images/aboutus.jpg">
              <h5 style="color: #696969">Welcome Message</h3>
              <h3 style="color: #696969">Hi, My name is Felicia</h3>
              <hr style="width:150px; height:3px; background: #696969; margin:auto; border:0;">
              <p style="color:#696969; text-align:justify;">"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, </p>
              <p style="color:#696969; text-align:justify;">which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p>
            </div>
            <div>
              <img style="border-radius: 15px; width: 500px; height: 300px; float: right; margin-left: 20px" src="images/aboutus1.jpg">
              <h3 style="color: #696969">Our Offices</h3>
              <hr style="width:150px; height:3px; background:#696969; margin:auto; border:0; float: left"><br>
              <h4 style="color:#696969;">Head Office#1</h4>
              <p style="color:#696969;">4096 N Highland St, Arlington VA 32101, USA</p>
              <p style="color:#696969;">Mon-Thu: 9:30 – 21:00</p>
              <p style="color:#696969;">Fri: 6:00 – 21:00</p>
              <h4 style="color:#696969;">Head Office#2</h4>
              <p style="color:#696969;">4096 N Highland St, Arlington VA 32101, USA</p>
              <p style="color:#696969;">Mon-Thu: 9:30 – 21:00</p>
              <p style="color:#696969;">Fri: 6:00 – 21:00</p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7112613195645!2d106.78691281437231!3d-6.169404295533433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f65c8572640d%3A0xc0a066d78372614e!2sTarumanagara%20University%20Campus%201!5e0!3m2!1sen!2sid!4v1585743582895!5m2!1sen!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <div class="col-sm-1"></div>
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