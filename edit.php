<?php 

$conn = mysqli_connect("localhost","root","","pelanggan");

$id = $_GET["id"];

function query($query){
  global $conn;
  $result =mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result) ) {
    # code...
    $rows[] = $row;
  }
  return $rows;
}

$plg = query("SELECT * FROM tbl_pelanggan WHERE id = $id")[0];


if (isset($_POST["submit"])){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $nomor = $_POST["nomor"];
    $email = $_POST["email"];
    $tujuan = $_POST["tujuan"];

    $query =" UPDATE tbl_pelanggan SET
                  nama = '$nama',
                  nomor= '$nomor',
                  email= '$email',
                  tujuan= '$tujuan'

                  WHERE id = $id
                  "; 
    mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn) > 0){
        echo "
        <script>
          alert('Data berhasil diubah');
          document.location.href = 'index.php';
        </script>

        ";
    }
    else {
    echo "
        <script>
          alert('Data gagal diubah');
          document.location.href = 'index.php';
        </script>

    ";
      echo mysqli_error($conn);
    }
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>TEST BOOTCAMP ARKADEMY</title>
  </head>
  <body>
    
<div class="conteiner text-center">
    <form action="" method="post">
      <h1>TAMBAH DATA PELANGGAN</h1>
    <input type="hidden" name="id" value="<?= $plg["id"];?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $plg["nama"];?>">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nomor</label>
    <input type="text" name="nomor" class="form-control" id="exampleInputPassword1" value="<?= $plg["nomor"];?>">
  </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="<?= $plg["email"];?>">
  </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tujuan</label>
    <input type="text" name="tujuan" class="form-control" id="exampleInputPassword1" value="<?= $plg["tujuan"];?>">
  </div>
  <div class="pt-5">
  <button type="submit" name="submit" class="btn btn-primary ">Tambah Data</button>
  </div>
</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>


