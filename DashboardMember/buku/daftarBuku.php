<?php
session_start();

if (!isset($_SESSION["signIn"])) {
   header("Location: ../../sign/member/sign_in.php");
   exit;
}

require "../../config/config.php";
// query read semua buku
$buku = queryReadData("SELECT * FROM buku");
//search buku
if (isset($_POST["search"])) {
   $buku = search($_POST["keyword"]);
}
//read buku informatika
if (isset($_POST["informatika"])) {
   $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'informatika'");
}
//read buku bisnis
if (isset($_POST["bisnis"])) {
   $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'bisnis'");
}
//read buku filsafat
if (isset($_POST["filsafat"])) {
   $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'filsafat'");
}
//read buku novel
if (isset($_POST["novel"])) {
   $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'novel'");
}
//read buku sains
if (isset($_POST["sains"])) {
   $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'sains'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
   <title>Daftar Buku || Member</title>
</head>
<style>
.layout-card-custom {
   display: flex;
   flex-wrap: wrap;
   justify-content: center;
   gap: 1.5rem;
}

body {
   box-sizing: border-box;
}

.kategori {
   margin: 2% auto;
   display: flex;
   justify-content: space-evenly;
   text-align: center;

}

.item-kategori label {
   margin-bottom: 5%;
}

.item-kategori label img {
   width: 40%;

}

.container {
   margin: 1% auto;
}

@media only screen and (max-width: 412px) {
   .kategori {
      flex-wrap: wrap;
      justify-content: space-evenly;
      margin-bottom: 5%;
   }

   .item-kategori {
      width: 35%;

   }

}
</style>

<body>
   <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
         <a class="navbar-brand" href="#">
            <img src="../../assets/logoNav.png" alt="logo" width="90px">
         </a>

         <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
      </div>
   </nav>
   <br><br><br><br><br><br>
   <div class="container ">
      <div id="carouselExampleControlsNoTouching " class="carousel slide " data-bs-touch="false">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="../../assets/cloud library Public Library.png" class="d-block w-100 rounded" alt="...">
            </div>
            <div class="carousel-item">
               <img src="../../assets/cloud library Public Library.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="../../assets/cloud library Public Library.png" class="d-block w-100" alt="...">
            </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
         </button>
      </div>
      <br><br>
      <form action="" method="post">
         <div class="input-group d-flex justify-content-center p-5">

            <input type="text" class="form-control" type="text" name="keyword" id="keyword"
               placeholder="cari judul atau kategori...">

            <button class="border border-start-3 bg-outline-primary rounded rounded-start-0" type="submit"
               name="search"><i class="bi bi-search"><img src="../../assets/icon kategori/search (3).svg" alt=""
                     srcset=""></i></button>
         </div>
      </form>

      <form action="" method="post" class="kategori">
         <i class="item-kategori">

            <label for="semua"><img src="../../assets/icon kategori/Desain_tanpa_judul__2_-removebg-preview (1).png"
                  alt="" class="rounded"></label>
            <button id="semua" class="btn btn-outline-primary" type="submit">Semua</button>
         </i>
         <i class="item-kategori">
            <label for="informatika"><img src="../../assets/icon kategori/Desain_tanpa_judul__3_-removebg-preview.png"
                  alt="" class="rounded"></label>
            <button type="submit" id="informatika" name="informatika"
               class="btn btn-outline-primary">Informatika</button>
         </i><i class="item-kategori">
            <label for="bisnis"><img src="../../assets/icon kategori/Desain_tanpa_judul__4_-removebg-preview.png" alt=""
                  class="rounded"></label>
            <button type="submit" id="bisnis" name="bisnis" class="btn btn-outline-primary">Bisnis</button>
         </i><i class="item-kategori">
            <label for="filsafat"><img src="../../assets/icon kategori/Desain_tanpa_judul__6_-removebg-preview.png"
                  alt="" class="rounded"></label>
            <button type="submit" id="filsafat" name="filsafat" class="btn btn-outline-primary">Filsafat</button>
         </i><i class="item-kategori">
            <label for="novel"><img src="../../assets/icon kategori/Desain_tanpa_judul__4_-removebg-preview.png" alt=""
                  class="rounded"></label>
            <button type="submit" id="novel" name="novel" class="btn btn-outline-primary">Novel</button>
         </i><i class="item-kategori">
            <label for="sains"><img src="../../assets/icon kategori/Desain_tanpa_judul__2_-removebg-preview (1).png"
                  alt="" class="rounded"></label>
            <button type="submit" id="sains" name="sains" class="btn btn-outline-primary">Sains</button>
         </i>
      </form>



      <!--Card buku-->
      <div class="layout-card-custom">
         <?php foreach ($buku as $item) : ?>
         <div class="card" style="width: 15rem;">
            <img src="../../imgDB/<?= $item["cover"]; ?>" class="card-img-top" alt="coverBuku" height="250px">
            <div class="card-body">
               <h5 class="card-title"><?= $item["judul"]; ?></h5>
            </div>
            <ul class="list-group list-group-flush">
               <li class="list-group-item">Kategori : <?= $item["kategori"]; ?></li>
            </ul>
            <div class="card-body">
               <a class="btn btn-success" href="detailBuku.php?id=<?= $item["id_buku"]; ?>">Detail</a>
            </div>
         </div>
         <?php endforeach; ?>
      </div>
   </div>

   <footer class="shadow-lg bg-subtle p-3">
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