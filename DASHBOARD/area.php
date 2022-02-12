<!DOCTYPE html>
<html lang="en">
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

  if(isset($_POST['Simpan']))
  {
  	if(isset($_REQUEST['inputkodearea']))
  	{
  		$Areakode = $_REQUEST['inputkodearea'];
  	}
    if(isset($_REQUEST['kodeprovinsi']))
    {
      $Provinsikode = $_REQUEST['kodeprovinsi'];
    }

  	if(!empty($Areakode))
  	{
  		$Areakode = $_REQUEST['inputkodearea'];
  	}
    else
    {
      ?> <h1>Harus diisi</h1> <?php
      die('Anda harus memasukkan data');
    }
    if(!empty($Provinsikode))
    {
      $Provinsikode = $_REQUEST['kodeprovinsi'];
    }
  	else
  	{
  		?> <h1>Harus diisi</h1> <?php
  		die('Anda harus memasukkan data');
  	}

  	$Areanama = $_POST['inputnama'];
  	$Areawilayah = $_POST['inputwilayah'];
  	$Areaketerangan = $_POST['inputket'];

  	mysqli_query($connection, "insert into area values ('$Areakode', '$Areanama', '$Areawilayah', '$Areaketerangan','$Provinsikode')");
  	header('location:area.php');
  }

  $dataprovinsi = mysqli_query($connection, "SELECT * FROM provinsi");

?>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link href="img/favicon.ico" rel="shortcut icon">
    <title>Area Wisata</title>
  </head>
  <body>
    <div class="row">
    <div class="col-sm-1">
      
    </div>
    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
        <div class="container">
          <h1 class="display-4">Input Area</h1>
        </div>
      </div> <!-- penutup jumbotron-->
      <form method="POST">
		  <div class="form-group row">
		    <label for="kodearea" class="col-sm-2 col-form-label">Kode Area</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="kodearea" name="inputkodearea" placeholder="Kode Area"
		      maxlength="4">
		    </div>
		  </div>


		  <div class="form-group row">
		    <label for="namaarea" class="col-sm-2 col-form-label">Nama</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="inputnama"id="namaarea"placeholder="Nama Area">
		    </div>
		  </div>


		  <div class="form-group row">
		    <label for="wilayaharea" class="col-sm-2 col-form-label">Wilayah</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="inputwilayah"id="wilayaharea" placeholder="Wilayah Area">
		    </div>
		  </div>


		  <div class="form-group row">
		    <label for="ketarea" class="col-sm-2 col-form-label">Keterangan</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="inputket"id="ketarea" placeholder="Keterangan Area">
		    </div>
		  </div>


      <div class="form-group row">
        <label for="kodekategori" class="col-sm-2 col-form-label">Kode Provinsi</label>
      <div class="col-sm-10">
        <select name="kodeprovinsi" class="form-control" id="kodeprovinsi">
            <?php while($row = mysqli_fetch_array($dataprovinsi))
            { ?>
              <option value="<?php echo $row["provinsiID"]?>">
                <?php echo $row["provinsiID"]?>
                <?php echo $row["provinsinama"]?>
              </option>
            <?php } ?>
        </select>
        </div>
      </div>


		  <div class="form-group row">
		    <div class="col-sm-2">
		    </div>
		    <div class="col-sm-10"> 
		 <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
		 <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
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
          <h1 class="display-4">Daftar Area</h1>
          <h2>Hasil Entri Data Pada Tabel Area</h2>
        </div>
      </div> <!-- penutup jumbotron-->

      <form method="POST">
        <div class="form-group row mb-2">
          <label for="search" class="col-sm-3">Cari Area</label>
          <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" placeholder="Cari Area" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>">
          </div>
          <input type="submit" name="kirim" class="col-sm-1 btn-primary" value="Search">
        </div>
      </form>


      <table class="table table-hover table-light">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Kode Area</th>
            <th>Nama Area</th>
            <th>Wilayah</th>
            <th>Keterangan</th>
            <th>Kode Provinsi</th>
            <th>Nama Provinsi</th>
            <th colspan="2" style="text-align: center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_POST["kirim"])) 
          {
            $search = $_POST['search'];
            $query = mysqli_query($connection, "SELECT area.*, provinsi.* FROM area JOIN provinsi USING(provinsiID) WHERE areanama LIKE '%".$search."%' 
              OR areaID LIKE '%".$search."%'
              OR provinsinama LIKE '%".$search."%'
              OR areawilayah LIKE '%".$search."%'
              OR areaketerangan LIKE '%".$search."%'
              OR provinsiID LIKE '%".$search."%'");
          } else
          {
            $query = mysqli_query($connection, "SELECT area.*, provinsi.* FROM area JOIN provinsi USING(provinsiID)");
          }
            
            $nomor = 1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $row['areaID'];?></td>
                <td><?php echo $row['areanama'];?></td>
                <td><?php echo $row['areawilayah'];?></td>
                <td><?php echo $row['areaketerangan'];?></td>
                <td><?php echo $row['provinsiID'];?></td>
                <td><?php echo $row['provinsinama'];?></td>
                <!-- icon edit dan delete-->
                <td>
                  <center><a href="areaEdit.php?edit=<?php echo $row["areaID"]?>" class="btn btn-success btn-sm" title="Edit">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a>
                </td>
                <td>
                  <center><a href="areaHapus.php?hapus=<?php echo $row["areaID"]?>" class="btn btn-danger btn-sm" title="Delete">
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#kodeprovinsi').select2({
      allowClear: true,
      placeholder:"Pilih Provinsi Wisata"
    });
  });
</script>
  </body>
<?php include "footer.php";?>
<?php
  mysqli_close($connection);
  ob_end_flush();
?>
</html>