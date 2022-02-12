<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<?php 
  include "includes/config.php";

  $kodeadmin = $_GET["edit"];
  $editadmin = mysqli_query($connection, "SELECT * FROM admin WHERE adminID = '$kodeadmin'");
  $rowedit = mysqli_fetch_array($editadmin);
  

  if(isset($_POST['Edit']))
  {
    $current = MD5($_POST['inputcurrent']);
    if(isset($_REQUEST['inputkode']))
    {
      $Adminkode = $_REQUEST['inputkode'];
    }

    if(!empty($Adminkode))
    {
      $Adminkode = $_POST['inputkode'];
    }
    else
    {
      ?> <h1>Harus diisi</h1> <?php
      die('Anda harus memasukkan data');
    }
    if($current != $rowedit["adminpassword"])
    {
      ?> 
      <a href="change.php" class="btn btn-info btn-user btn-block" style="width: 100px">Back</a>
      <h1>Salah memasukkan password lama</h1><br>
       <?php
      die('Hanya bisa mengganti ke password baru jika mengetahui password lama');
    }

    $Adminnama = $_POST['inputnama'];
    $Adminemail = $_POST['inputemail'];
    $Adminpassword = MD5($_POST['inputpassword']);

    mysqli_query($connection, "UPDATE admin SET adminnama = '$Adminnama', adminemail = '$Adminemail', adminpassword = '$Adminpassword' WHERE adminID = '$Adminkode'");
    header('location:change.php');
  }
  
?>

<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

 

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-light" >
  <div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
        <div class="container">
          <h1 class="display-4">Change Password</h1>
        </div>
      </div> <!-- penutup jumbotron-->
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

      <p style="color: red">Hubungi Database Administrator anda jika ingin mengubah email atau nama</p>

      <form method="POST">
      <div class="form-group row">
        <label for="kodeadmin" class="col-sm-2 col-form-label">Kode Admin</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kodeadmin" name="inputkode" value="<?php echo $rowedit["adminID"]?>" readonly
          maxlength="4">
        </div>
      </div>

      <div class="form-group row">
        <label for="namaadmin" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="inputnama"id="namaadmin"value="<?php echo $rowedit["adminnama"]?>"readonly>
        </div>
      </div>


      <div class="form-group row">
        <label for="emailadmin" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="inputemail"id="emailadmin" value="<?php echo $rowedit["adminemail"]?>"readonly>
        </div>
      </div>

      <div class="form-group row">
        <label for="currentadmin" class="col-sm-2 col-form-label">Password lama</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="inputcurrent"id="currentadmin" placeholder="Password lama">
        </div>
      </div>

      <div class="form-group row">
        <label for="passwordadmin" class="col-sm-2 col-form-label">Password baru</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="inputpassword"id="passwordadmin" placeholder="Password baru">
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-10"> 
     <input type="submit" class="btn btn-primary" value="Edit" name="Edit">
     <a class="btn btn-secondary" href="change.php">Batal</a>
        </div>
      </div>

      </div>
<div class="col-sm-1">
  

</div>
</div> <!-- penutup class row -->


<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</body>
<?php include "footer.php";?>
<?php
  mysqli_close($connection);
  ob_end_flush();
?>
</html>