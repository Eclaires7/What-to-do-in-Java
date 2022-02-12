<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
   
<?php 
  include "includes/config.php";

  if(isset($_POST['Simpan']))
  {
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

    $Adminnama = $_POST['inputnama'];
    $Adminemail = $_POST['inputemail'];
    $Adminpassword = MD5($_POST['inputpassword']);

    mysqli_query($connection, "insert into admin values ('$Adminkode', '$Adminnama', '$Adminemail', '$Adminpassword')");
    header('location:register.php');
  }

?>
<html lang="en">
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
<body class="bg-gradient-light">
  <div class="row">
  <div class="col-sm-1">
      
    </div>
    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
        <div class="container">
          <h1 class="display-4">Register Akun</h1>
        </div>
      </div> <!-- penutup jumbotron-->
      <form method="POST">
      <div class="form-group row">
        <label for="kodeadmin" class="col-sm-2 col-form-label">Kode Admin</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kodeadmin" name="inputkode" placeholder="Kode Admin"
          maxlength="4">
        </div>
      </div>


      <div class="form-group row">
        <label for="namaadmin" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="inputnama"id="namaadmin"placeholder="Nama Admin">
        </div>
      </div>


      <div class="form-group row">
        <label for="emailadmin" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="inputemail"id="emailadmin" placeholder="Email Admin">
        </div>
      </div>

      <div class="form-group row">
        <label for="passwordadmin" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="inputpassword"id="passwordadmin" placeholder="Password">
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-10"> 
     <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
     <a class="btn btn-secondary" href="login.php">Batal</a>
        </div>
      </div>

<div class="col-sm-1">
  
</div>
</div>
</div> <!-- penutup class row -->
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
        <div class="container">
          <h1 class="display-4">Daftar Akun</h1>
          <h2>Hasil Entri Data Pada Tabel Register</h2>
        </div>
      </div> <!-- penutup jumbotron-->
      <p style="color: red">Jika ingin mengedit password dapat dilakukan setelah login, di menu Change Password</p>
      <table class="table table-hover table-danger">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Kode Admin</th>
            <th>Nama Admin</th>
            <th>Email</th>
            <th colspan="1" style="text-align: center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
            $query = mysqli_query($connection, "SELECT * FROM admin");
          
            
            $nomor = 1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $row['adminID'];?></td>
                <td><?php echo $row['adminnama'];?></td>
                <td><?php echo $row['adminemail'];?></td>
                <!-- icon edit dan delete-->
                <td>
                  <center><a href="registerHapus.php?hapus=<?php echo $row["adminID"]?>" class="btn btn-danger btn-sm" title="Delete">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                    </svg>
                  </a>
                </td>
                <!-- icon edit dan delete-->
              </tr>
              <?php $nomor = $nomor + 1; ?>
            <?php } 
          ?>
        </tbody>

      </table>

    </div>
    <div class="col-sm-1"></div>
  </div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</div>
</div> <!--penutup container fluid-->
</body>

</html>