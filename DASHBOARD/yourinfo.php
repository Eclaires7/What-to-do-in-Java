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
                    <h1 class="display-4" style="color: black">Your Info</h1>
                </div>
            </div>

            <?php 
              $profile = $_SESSION['emailuser'];
              $profilenama = mysqli_query($connection, "SELECT * FROM admin WHERE adminemail = '$profile'");
              $row = mysqli_fetch_array($profilenama);
            ?>

            <img style="border-radius: 50%;margin-right: 50px; float: left" src="img/profile.jpg"><br><br>
            <div style="font-size: 30px; color: black"><?php echo $row['adminnama']?></div>
            <div style="font-size: 20px; "><?php echo $_SESSION['emailuser'];?></div>
            <p>Administrator</p>
            <a href="change.php">Change Password</a>
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