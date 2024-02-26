<?php
session_start();

if (!isset($_SESSION["signIn"])) {
   header("Location: ../../sign/admin/sign_in.php");
   exit;
}
require "../../config/config.php";

$petugas = queryReadData("SELECT * FROM admin");

if (isset($_POST["search"])) {
   $member = searchPetugas($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add"
      viewBox="0 0 16 16">
      <path
         d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
      <path
         d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
   </svg>
   <title>Member terdaftar</title>
</head>

<style>
.person-edit {
   background-image: url('../../assets/person-vcard.svg');
}
</style>

<body>
   <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">
            <img src="../../assets/logoNav.png" alt="logo" width="90px">
         </a>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../dashboardAdmin.php">Dashboard</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-success" href="tambahPetugas.php">Tambah Buku</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <br><br><br><br>
   <div class="p-4 mt-5">
      <!--search engine --->
      <form action="" method="post" class="mt-5">
         <div class="input-group d-flex justify-content-end mb-3">
            <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword"
               placeholder="cari data member...">
            <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i
                  class="fa-solid fa-magnifying-glass"></i></button>
         </div>
      </form>

      <caption>List of Petugas</caption>
      <div class="table-responsive mt-3">
         <table class="table table-striped table-hover">
            <thead class="text-center">
               <tr>
                  <th class="bg-primary text-light">Id</th>
                  <th class="bg-primary text-light">Nama Petugas</th>
                  <th class="bg-primary text-light">Kode Petugas</th>
                  <th class="bg-primary text-light">Nomor Telepon</th>
                  <th class="bg-primary text-light">Role</th>
                  <th class="bg-primary text-light">Aksi</th>
               </tr>
            </thead>
            <?php foreach ($petugas as $item) : ?>
            <tr>
               <td><?= $item["id"]; ?></td>
               <td><?= $item["nama_admin"]; ?></td>
               <td><?= $item["kode_admin"]; ?></td>
               <td><?= $item["no_tlp"]; ?></td>
               <td><?= $item["role"]; ?></td>
               <td>
                  <div class="action">
                     <a href="deletePetugas.php?id=<?= $item["id"]; ?>" class="btn btn-danger"
                        onclick="return confirm('Yakin ingin menghapus data Petugas ?');">Hapus</a>
                     <a href="editPetugas.php?id=<?= $item["id"]; ?>" class="btn btn-primary">Edit</a>
                  </div>
               </td>
            </tr>
            <?php endforeach; ?>
         </table>
      </div>
   </div>

   <footer class="fixed-bottom shadow-lg bg-subtle p-3">
      <div class="container-fluid d-flex justify-content-between">
         <p class="mt-2">Created by <span class="text-primary"> Regatama</span> © 2023</p>
         <p class="mt-2">versi 1.0</p>
      </div>
   </footer>

   <script src="../../assets/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
   </script>
</body>

</html>