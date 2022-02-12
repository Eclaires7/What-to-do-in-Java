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

  <?php 
    include "includes/config.php";
    if(isset($_POST['Simpan']))
    {
        $kodefoto = $_POST['inputkode'];
        $namafoto = $_POST['inputnama'];
        $kodedestinasi = $_POST['kodedestinasi'];

        $nama = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];

        $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

        //periksa ekstensi file harus jpg atau JPG
        if(($ekstensifile == "jpg") OR ($ekstensifile == "JPG"))
        {
            move_uploaded_file($file_tmp, 'images/'.$nama); //unggah file ke folder images
            mysqli_query($connection, "INSERT INTO fotodestinasi VALUE('$kodefoto','$namafoto', '$kodedestinasi', '$nama')");
            header("location:fotodestinasi.php");
        }
    }

    $datadestinasi = mysqli_query($connection, "SELECT * FROM destinasi");

  ?>

  <body>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
                <div class="container">
                    <h1 class="display-4" style="color: black">Input Foto Destinasi Wisata</h1>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="kodefoto" class="col-sm-2 col-form-label">Kode Foto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kodefoto" name="inputkode" placeholder="Kode Foto" maxlength="4">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="namafoto" class="col-sm-2 col-form-label">Nama Foto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namafoto" name="inputnama" placeholder="Nama Foto">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="namadestinasi" name="kodedestinasi">
                            <?php 
                            while($row = mysqli_fetch_array($datadestinasi))
                            { ?>
                                <option value="<?php echo $row["destinasiID"]?>">
                                    <?php echo $row["destinasiID"]?>
                                    <?php echo $row["destinasinama"]?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="file" class="col-sm-2 col-form-label">Foto Wisata</label>
                    <div class="col-sm-10">
                        <input type="file" id="file" name="file">
                        <p class="help-block">Field ini digunakan untuk unggah file foto</p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
                        <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                    </div>
                </div>

            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid" style="background: url('img/bck.webp'); border-radius: 30px">
                <div class="container">
                    <h1 class="display-4" style="color: black">Daftar Foto Desinasi Wisata</h1>
                </div>
            </div> 

        <table class="table table-hover table-light">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Foto</th>
                    <th>Nama Foto Wisata</th>
                    <th>Kode Destinasi</th>
                    <th>Foto Destinasi</th>
                    <th colspan="2" style="text-align: center">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $query = mysqli_query($connection, "SELECT * FROM fotodestinasi");
                    $nomor = 1;
                    while ($row = mysqli_fetch_array($query)) 
                    { ?>
                        <tr>
                            <td><?php echo $nomor;?></td>
                            <td><?php echo $row['fotoID'];?></td>
                            <td><?php echo $row['fotonama'];?></td>
                            <td><?php echo $row['destinasiID'];?></td>
                            <td>
                                <?php if(is_file("images/".$row['fotofile']))
                                { ?>
                                    <img src="images/<?php echo $row['fotofile']?>" width="80">
                                <?php } 
                                else
                                    echo "<img src='images/noimage.png' width='80'>"
                                ?>
                            </td>
                            <!-- icon edit dan delete-->
                                <td>
                                    <center><a href="fotodestinasiEdit.php?edit=<?php echo $row["fotoID"]?>" class="btn btn-success btn-sm" title="Edit">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <center><a href="fotodestinasiHapus.php?hapus=<?php echo $row["fotoID"]?>" class="btn btn-danger btn-sm" title="Delete">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                    </a>
                                </td>
                                <!-- icon edit dan delete-->
                        </tr>
                        <?php $nomor = $nomor + 1;?>
                        <?php 
                    }
                ?>
            </tbody>
        </table>
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