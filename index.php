<?php

//koneksi database
$conn = mysqli_connect("localhost","root","","pelanggan");


//ambil data
$result = mysqli_query($conn, "SELECT * FROM tbl_pelanggan");

//ambil data pelanggan


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>TEST BOOTCAMP ARCADEMY</title>
  </head>
  <body>

    <h1 class="text-center">DATA PELANGGAN</h1>
   <div class="tambah text-right pb-2" style="padding-right:25px;">
      
       <a href="tambah.php" class="btn btn-primary active  btn-sm" role="button" data-bs-toggle="button" aria-pressed="true">Edit Data</a>
        </div>

    <div class="contaner text-center">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Nomor</th>
      <th scope="col">Email</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

  <?php $i =1; ?>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>

    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row["nama"]; ?></td>
      <td><?php echo $row["nomor"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><?php echo $row["tujuan"]; ?></td>
      <td>


        <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Edit</a>
        <a href="hapus.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Hapus</a>

      </td>
    </tr>
      <?php  $i++ ?>
      <?php endwhile;  ?>

  </tbody>
</table>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>