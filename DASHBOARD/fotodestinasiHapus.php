<?php 
	include "includes/config.php";
	if(isset($_GET['hapus']))
	{
		$fotokode = $_GET['hapus'];
		$hapusfoto = mysqli_query($connection,"SELECT * FROM fotodestinasi
		   WHERE fotoID ='$fotokode'");
		$hapus = mysqli_fetch_array($hapusfoto);
		$namafile = $hapus['fotofile'];
		mysqli_query($connection, "DELETE FROM fotodestinasi WHERE fotoID = '$fotokode'");
		unlink('images/'.$namafile);
		
		  echo"<script>alert('DATA BERHASIL DIHAPUS');
		document.location = 'fotodestinasi.php'</script>";
	}
?>
