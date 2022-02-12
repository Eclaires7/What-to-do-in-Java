<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="img/favicon.ico" rel="shortcut icon">

    <title>Eclair's Travel</title>
  </head>
  	<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['emailuser']))
		header("location:login.php");
	?>
  <body>
  	<?php include "header.php";?>

  	<div class="container-fluid">
  	<div class="card shadow mb-4">
  	
<?php 
  include "includes/config.php";

  if(isset($_POST['Simpan']))
  {
  	if(isset($_REQUEST['inputkode']))
  	{
  		$Destinasikode = $_REQUEST['inputkode'];
  	}

  	if(!empty($Destinasikode))
  	{
  		$Destinasikode = $_POST['inputkode'];
  	}
  	else
  	{
  		?> <h1>Harus diisi</h1> <?php
  		die('Anda harus memasukkan data');
  	}

  	$Destinasinama = $_POST['inputnama'];
  	$Destinasialamat = $_POST['inputalamat'];
  	$Kategorikode = $_POST['kodekategori'];
  	$Areakode = $_POST['kodearea'];

  	mysqli_query($connection, "insert into destinasi values ('$Destinasikode', '$Destinasinama', '$Destinasialamat', '$Kategorikode','$Areakode')");
  	header('location:destinasi.php');
  }

  $datakategori = mysqli_query($connection, "SELECT * FROM kategori ORDER BY kategoriID");
  $dataarea = mysqli_query($connection, "SELECT * FROM area ORDER BY areaID");

?>
<html lang="en" >
<head >
	<title>Eclair's Travel</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link href="img/favicon.ico" rel="shortcut icon">
</head>
	<div class="row">
	<div class="col-sm-1">
      
    </div>
    <div class="col-sm-10">
    	<div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
				<div class="container">
					<h1 class="display-4">Input Destinasi Wisata</h1>
				</div>
			</div> <!-- penutup jumbotron-->
      <form method="POST">
		  <div class="form-group row">
		    <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="kodedestinasi" name="inputkode" placeholder="Kode Destinasi"
		      maxlength="5">
		    </div>
		  </div>


		  <div class="form-group row">
		    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="inputnama"id="namadestinasi"placeholder="Nama Destinasi">
		    </div>
		  </div>


		  <div class="form-group row">
		    <label for="alamatdestinasi" class="col-sm-2 col-form-label">Alamat</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="inputalamat"id="alamatdestinasi" placeholder="Alamat Destinasi">
		    </div>
		  </div>


		  <div class="form-group row">
		    <label for="kodekategori" class="col-sm-2 col-form-label">Kategori Wisata</label>
		  <div class="col-sm-10">
		    <select name="kodekategori" class="form-control" id="kodekategori">
			    	<?php while($row = mysqli_fetch_array($datakategori))
			    	{ ?>
				    	<option value="<?php echo $row["kategoriID"]?>">
				    		<?php echo $row["kategoriID"]?>
				    		<?php echo $row["kategorinama"]?>
				    	</option>
			    	<?php } ?>
		    </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="kodearea" class="col-sm-2 col-form-label">Area Wisata</label>
		  <div class="col-sm-10">
		    <select name ="kodearea" class="form-control" id="kodearea">
		    	<?php while($row = mysqli_fetch_array($dataarea))
		    	{ ?>
			    	<option value="<?php echo $row["areaID"]?>">
			    		<?php echo $row["areaID"]?>
			    		<?php echo $row["areanama"]?>
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
					<h1 class="display-4">Daftar Destinasi Wisata</h1>
					<h2>Hasil Entri Data Pada Tabel Destinasi</h2>
				</div>
			</div> <!-- penutup jumbotron-->

			<form method="POST">
				<div class="form-group row mb-2">
					<label for="search" class="col-sm-3">Nama Destinasi</label>
					<div class="col-sm-6">
						<input type="text" name="search" class="form-control" id="search" placeholder="Cari nama Destinasi" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>">
					</div>
					<input type="submit" name="kirim" class="col-sm-1 btn-primary" value="Search">
				</div>
			</form>


			<table class="table table-hover table-light">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Kode Destinasi</th>
						<th>Nama Destinasi</th>
						<th>Alamat Destinasi</th>
						<th>Kode Kategori</th>
						<th>Nama Kategori</th>
						<th>Kode Area</th>
						<th>Nama Area</th>
						<th colspan="2" style="text-align: center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($_POST["kirim"])) 
					{
						$search = $_POST['search'];
						$query = mysqli_query($connection, "SELECT destinasi.*, kategori.*, area.* FROM destinasi JOIN kategori USING(kategoriID) JOIN area USING(areaID) WHERE 
							destinasinama LIKE '%".$search."%' 
							OR destinasialamat LIKE '%".$search."%'
							OR destinasi.areaID LIKE '%".$search."%'
							OR destinasiID LIKE '%".$search."%'
							OR destinasi.kategoriID LIKE '%".$search."%'
							OR area.areanama LIKE '%".$search."%'
							OR kategori.kategorinama LIKE '%".$search."%'");
					} else
					{
						$query = mysqli_query($connection, "SELECT destinasi.*, kategori.*, area.* FROM destinasi JOIN kategori USING(kategoriID) JOIN area USING(areaID) ORDER BY destinasiID");
					}
						
						$nomor = 1;
						while ($row = mysqli_fetch_array($query)) 
						{ ?>
							<tr>
								<td><?php echo $nomor;?></td>
								<td><?php echo $row['destinasiID'];?></td>
								<td><?php echo $row['destinasinama'];?></td>
								<td><?php echo $row['destinasialamat'];?></td>
								<td><?php echo $row['kategoriID'];?></td>
								<td><?php echo $row['kategorinama'];?></td>
								<td><?php echo $row['areaID'];?></td>
								<td><?php echo $row['areanama'];?></td>

								<!-- icon edit dan delete-->
								<td>
									<center><a href="destinasiEdit.php?edit=<?php echo $row["destinasiID"]?>" class="btn btn-success btn-sm" title="Edit">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
										  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
										</svg>
									</a>
								</td>
								<td>
									<center><a href="destinasiHapus.php?hapus=<?php echo $row["destinasiID"]?>" class="btn btn-danger btn-sm" title="Delete">
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
		$('#kodekategori').select2({
			allowClear: true,
			placeholder:"Pilih Kategori Wisata"
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#kodearea').select2({
			allowClear: true,
			placeholder:"Pilih Area Wisata"
		});
	});
</script>

</div>
</div> <!--penutup container fluid-->
<?php include "footer.php";?>
<?php
	mysqli_close($connection);
	ob_end_flush();
?>

</html>