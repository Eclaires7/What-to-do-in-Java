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
  <div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
  <div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
        <div class="container">
          <h1 class="display-4" style="color: black">Account</h1>
        </div>
      </div> <!-- penutup jumbotron-->
      <div class="col-sm-1"></div>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      </div>
      </div>

      <table class="table table-hover table-light">
        <thead class="thead-dark">
          <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan="1" style="text-align: center">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = mysqli_query($connection, "SELECT * FROM admin");
            $nomor = 1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
              <tr>
                <?php if($_SESSION['emailuser']==$row['adminemail']){?>
                <td><?php echo $row['adminID'];?></td>
                <td><?php echo $row['adminnama'];?></td>
                <td><?php echo $row['adminemail'];?></td>
                <td><?php echo '-'?></td>
                
                <!-- icon edit dan delete-->
                <td>
                  <center><a href="changeEdit.php?edit=<?php echo $row["adminID"]?>" class="btn btn-success btn-sm" title="Edit">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a>
                </td>
                <!-- icon edit dan delete-->
              </tr>
              <?php
                }
              
              $nomor = $nomor + 1; ?>
              <?php } 
          ?>
        </tbody>

      </table>
    
<div class="col-sm-1">
  

</div>
</div> <!-- penutup class row -->


<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</div>
</div> <!--penutup container fluid-->
</body>
<?php include "footer.php";?>
<?php
  mysqli_close($connection);
  ob_end_flush();
?>
</html>