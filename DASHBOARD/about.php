<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <title>Eclair's Travel</title>
  </head>
  <?php
  ob_start();
  session_start();
  if(!isset($_SESSION['emailuser']))
    header("location:login.php");
  ?>
    <?php include "header.php";?>

    <div class="container-fluid">
    <div class="card shadow mb-4">

  <body>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
                <div class="container">
                    <h1 class="display-4" style="color: #6D4C41">About Us</h1>
                </div>
            </div>
            <div style="margin-bottom: 50px">
              <img style="border-radius: 15px; width: 500px; height: 300px; float: left; margin-right: 20px" src="img/aboutus.jpg">
              <h5 style="color: #6D4C41">Welcome Message</h3>
              <h3 style="color: #6D4C41">Hi, My name is Felicia</h3>
              <hr style="width:150px; height:3px; background:#6D4C41; margin:auto; border:0;">
              <p style="color:#696969; text-align:justify;">"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, </p>
              <p style="color:#696969; text-align:justify;">which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p>
            </div>
            <div>
              <img style="border-radius: 15px; width: 500px; height: 300px; float: right; margin-left: 20px" src="img/aboutus1.jpg">
              <h3 style="color: #6D4C41">Our Offices</h3>
              <hr style="width:150px; height:3px; background:#6D4C41; margin:auto; border:0; float: left"><br>
              <h4>Head Office#1</h4>
              <p>4096 N Highland St, Arlington VA 32101, USA</p>
              <p>Mon-Thu: 9:30 – 21:00</p>
              <p>Fri: 6:00 – 21:00</p>
              <h4>Head Office#2</h4>
              <p>4096 N Highland St, Arlington VA 32101, USA</p>
              <p>Mon-Thu: 9:30 – 21:00</p>
              <p>Fri: 6:00 – 21:00</p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7112613195645!2d106.78691281437231!3d-6.169404295533433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f65c8572640d%3A0xc0a066d78372614e!2sTarumanagara%20University%20Campus%201!5e0!3m2!1sen!2sid!4v1585743582895!5m2!1sen!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <div class="col-sm-1"></div>
    </div>

            

  </body>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <?php include "footer.php";?>
    <?php
      mysqli_close($connection);
      ob_end_flush();
    ?>
</html>