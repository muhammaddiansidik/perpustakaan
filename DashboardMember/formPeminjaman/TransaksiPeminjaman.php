<?php
session_start();

if (!isset($_SESSION["signIn"])) {
   header("Location: ../../sign/member/sign_in.php");
   exit;
}
require "../../config/config.php";
$akunMember = $_SESSION["member"]["nisn"];
$dataPinjam = queryReadData("SELECT peminjaman.id_peminjaman, peminjaman.id_buku, buku.judul, peminjaman.nisn, member.nama, admin.nama_admin, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, peminjaman.status,peminjaman.harga,peminjaman.no_tlp
FROM peminjaman
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
INNER JOIN member ON peminjaman.nisn = member.nisn
INNER JOIN admin ON peminjaman.id_admin = admin.id
WHERE peminjaman.nisn = $akunMember");





?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
   <title>Transaksi peminjaman Buku || Member</title>
</head>

<body>
   <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
         <a class="navbar-brand" href="#">
            <img src="../../assets/logoNav.png" alt="logo" width="90px">
         </a>

         <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
      </div>
   </nav>
   <br><br>
   <div class="p-4 mt-5">
      <div class="mt-5 alert alert-primary" role="alert">Riwayat transaksi Peminjaman Buku Anda - <span class="fw-bold text-capitalize"><?php echo htmlentities($_SESSION["member"]["nama"]); ?></span></div>

      <?php foreach ($dataPinjam as $item) {
         if ($item['status'] == 'tidak') { ?>
            <div class="alert alert-danger" role="alert">
               Buku tidak tersedia, harap hubungi nomor <b><?= $item['no_tlp']; ?></b>, untuk aktifasi!
            </div>
            <?php $dataPinjam = false; ?>
      <?php
         }
      } ?>
      <?php if ($dataPinjam == false) { ?>
         <div></div>
      <?php } else { ?>
         <div class="table-responsive mt-3">
            <table class="table table-striped table-hover">
               <thead class="text-center">
                  <tr>
                     <th class="bg-primary text-light">Id Peminjaman</th>
                     <th class="bg-primary text-light">Id Buku</th>
                     <th class="bg-primary text-light">Judul Buku</th>
                     <th class="bg-primary text-light">Nisn</th>
                     <th class="bg-primary text-light">Nama</th>
                     <th class="bg-primary text-light">Nama Admin</th>
                     <th class="bg-primary text-light">Tanggal Peminjaman</th>
                     <th class="bg-primary text-light">Tanggal Berakhir</th>
                     <th class="bg-primary text-light">No Telepon</th>
                     <th class="bg-primary text-light">Harga</th>
                     <th class="bg-primary text-light">Aksi</th>
                  </tr>
               </thead>

               <tr>
                  <?php foreach ($dataPinjam as $item) : ?>
                     <td><?= $item["id_peminjaman"]; ?></td>
                     <td><?= $item["id_buku"]; ?></td>
                     <td><?= $item["judul"]; ?></td>
                     <td><?= $item["nisn"]; ?></td>
                     <td><?= $item["nama"]; ?></td>
                     <td><?= $item["nama_admin"]; ?></td>
                     <td><?= $item["tgl_peminjaman"]; ?></td>
                     <td><?= $item["tgl_pengembalian"]; ?></td>
                     <td><?= $item["no_tlp"]; ?></td>
                     <td><?= $item["harga"]; ?></td>
                     <td>
                        <a class="btn btn-primary" href="bacabuku.php?id=<?= $item["id_buku"]; ?>"> Baca Buku</a>
                     </td>
                  <?php endforeach; ?>
               </tr>
            </table>
         </div>
   </div>
<?php } ?>


<footer class="fixed-bottom shadow-lg bg-subtle p-3">
   <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Regatama</span> © 2023</p>
      <p class="mt-2">versi 1.0</p>
   </div>
</footer>
</body>

<script src="../../assets/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>