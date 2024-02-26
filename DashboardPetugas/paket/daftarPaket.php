<?php
// Halaman pengelolaan peminjaman buku perpustakaan
require "../../config/config.php";
session_start();

$dataPaket = queryReadData("SELECT * FROM paket");


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />

   <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
   <title>Kelola peminjaman buku || Petugas</title>
   <style>
   .aksi-button {
      margin-right: 5%;
   }
   </style>
</head>

<body>
   <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
         <a class="navbar-brand" href="#">
            <img src="../../assets/logoNav.png" alt="logo" width="90px" />
         </a>

         <a class="btn btn-tertiary" href="../dashboardPetugas.php">Dashboard</a>
      </div>
   </nav>

   <br /><br />

   <div class="p-4 mt-5">
      <div class="mt-5">
         <caption>
            List of Paket
         </caption>
         <div class="table-responsive mt-3">
            <table class="table table-striped table-hover">
               <thead class="text-center">
                  <tr>
                     <th class="bg-primary text-light">Paket</th>
                     <th class="bg-primary text-light">Waktu Pengembalian</th>
                     <th class="bg-primary text-light">Harga</th>
                     <th class="bg-primary text-light">Aksi</th>
                  </tr>
               </thead>
               <tbody class="text-center">
                  <?php foreach ($dataPaket as $item) : ?>
                  <tr>
                     <td>paket <?= $item["paket"]; ?></td>
                     <td><?= $item["waktu_pengembalian"]; ?> hari</td>
                     <td>Rp. <?= $item["harga"]; ?></td>
                     <td>
                        <a href="./editPaket.php?paket=<?= $item['paket']; ?>" class="btn btn-outline-primary">Edit</a>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <footer class="fixed-bottom shadow-lg bg-subtle p-3">
      <div class="container-fluid d-flex justify-content-between">
         <p class="mt-2">
            Created by <span class="text-primary"> Regatama</span> © 2023
         </p>
         <p class="mt-2">versi 1.0</p>
      </div>
   </footer>

   <script src="../../assets/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
   </script>
</body>

</html>