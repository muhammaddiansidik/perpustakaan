<?php
require '../../config/config.php';
$paket = $_GET['paket'];
if (isset($_POST["tombol"])) {
   if (editPaket($_POST, $paket) > 0) {
      header('location: ./daftarPaket.php');
   } else {
      echo "<script>
    alert('Gagal update petugas!');
    </script>";
   }
}
$admin = queryReadData("SELECT * FROM paket WHERE paket=$paket");

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
   <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
   <title>Edit Paket</title>
   <style>
      body {
         background-image: url("../../assets/6761097.jpg");
         background-size: cover;
      }

      .konten {
         margin: 17% auto;
      }
   </style>
</head>

<body>
   <div class="container konten">
      <div class="card p-2 mt-5">
         <h1 class="pt-5 text-center fw-bold">Edit Paket</h1>
         <hr />
         <form action="" method="post" class="row g-3 p-4 needs-validation" novalidate>
            <?php foreach ($admin as $item) : ?>
               <label for="validationCustom01" class="form-label">Paket</label>
               <div class="input-group mt-0">
                  <input type="text" class="form-control" name="paket" value="Paket <?= $item['paket']; ?>" id="validationCustom01" required readonly />
                  <div class="invalid-feedback">Masukkan paket anda!</div>
               </div>
               <label for="validationCustom02" class="form-label">Waktu Pengembalian</label>
               <div class="input-group mt-0">
                  <input type="number" class="form-control" id="validationCustom02" value="<?= $item['waktu_pengembalian']; ?>" name="waktu_pengembalian" required />
                  <div class="invalid-feedback">Masukkan waktu pengembalian anda!</div>
               </div>
               <label for="validationCustom02" class="form-label">Harga</label>
               <div class="input-group mt-0">
                  <input type="text" class="form-control" id="validationCustom02" value="<?= $item['harga']; ?>" name="harga" required />
                  <div class="invalid-feedback">Masukkan harga paket anda!</div>
               </div>
            <?php endforeach; ?>
            <div class="col-12">
               <button class="btn btn-primary" type="submit" name="tombol">
                  Edit
               </button>
               <a class="btn btn-success" href="./daftarPetugas.php">Batal</a>
            </div>
         </form>
      </div>
   </div>


   <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>