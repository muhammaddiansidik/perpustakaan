<?php
// Halaman pengelolaan peminjaman buku perpustakaan
require "../../config/config.php";
session_start();
$id = $_SESSION['id'];
$dataPeminjam = queryReadData("SELECT peminjaman.id_peminjaman, peminjaman.id_buku, buku.judul, peminjaman.nisn, member.nama, member.kelas, member.jurusan, peminjaman.id_admin,  peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian,peminjaman.status
FROM peminjaman 
INNER JOIN member ON peminjaman.nisn = member.nisn
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
WHERE peminjaman.id_admin = $id");

if (isset($_POST['submit'])) {
   accBuku($_POST['status']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />

   <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
   <title>Kelola peminjaman buku || Petugas</title>
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
            List of Peminjaman
         </caption>
         <div class="table-responsive mt-3">
            <table class="table table-striped table-hover">
               <thead class="text-center">
                  <tr>
                     <th class="bg-primary text-light">Id Peminjaman</th>
                     <th class="bg-primary text-light">Id Buku</th>
                     <th class="bg-primary text-light">Judul Buku</th>
                     <th class="bg-primary text-light">Nisn Siswa</th>
                     <th class="bg-primary text-light">Nama siswa</th>
                     <th class="bg-primary text-light">Kelas</th>
                     <th class="bg-primary text-light">Jurusan</th>
                     <th class="bg-primary text-light">Id Petugas</th>
                     <th class="bg-primary text-light">Tanggal Peminjaman</th>
                     <th class="bg-primary text-light">Tanggal Pengembalian</th>
                     <th class="bg-primary text-light">Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($dataPeminjam as $item) : ?>
                  <?php if ($item['status'] == 'tidak') { ?>
                  <tr>
                     <td><?= $item["id_peminjaman"]; ?></td>
                     <td><?= $item["id_buku"]; ?></td>
                     <td><?= $item["judul"]; ?></td>
                     <td><?= $item["nisn"]; ?></td>
                     <td><?= $item["nama"]; ?></td>
                     <td><?= $item["kelas"]; ?></td>
                     <td><?= $item["jurusan"]; ?></td>
                     <td><?= $item["id_admin"]; ?></td>
                     <td><?= $item["tgl_peminjaman"]; ?></td>
                     <td><?= $item["tgl_pengembalian"]; ?></td>
                     <td>
                        <form action="" method="post">
                           <input type="hidden" value="<?= $item["id_peminjaman"]; ?>" name="status">
                           <button type="submit" id="status" name="submit"
                              class="btn btn-outline-primary">Terima</button>
                        </form>
                     </td>
                  </tr>
                  <?php } else { ?>
                  <?php continue; ?>
                  <?php } ?>
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