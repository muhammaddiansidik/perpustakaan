<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
   <!-- <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script> -->
   <title>cloud library.com</title>
   <link rel="icon" href="assets/logoUrl.png" type="image/png">
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
      viewBox="0 0 16 16">
      <path
         d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
   </svg>
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-border-width"
      viewBox="0 0 16 16">
      <path
         d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5" />
   </svg>
</head>

<body>
   <!--Navbar-->
   <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-sm justify-space-between">
      <div class="container-fluid">
         <div class="nav-brand"><img src="assets/logoNav.png" alt="logo" width="90px"></div>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#home">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#aboutSection">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#footer">Contact</a>
               </li>
            </ul>
         </div>
      </div>
      </div>
   </nav>


   <br><br>
   <section id="homeSection" class="p-3">
      <div class="d-flex flex-wrap justify-content-center">
         <div class="col mt-5">
            <h2 class="fw-bold text-success"><span class="text-primary">cloud</span>library</h2>
            <a class="btn btn-primary" href="sign/link_login.html">Get started</a>
         </div>
      </div>
   </section>
   <?php
   require "config/config.php";
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
   <style>
   body {
      box-sizing: border-box;
   }

   .layout-card-custom {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1.5rem;
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

   <div class="container">
      <div id="carouselExampleControlsNoTouching " class="carousel slide" data-bs-touch="false">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="./assets/cloud library.png" class="d-block w-100 rounded" alt="...">
            </div>
            <div class="carousel-item">
               <img src="./assets/cloud library - Where Every Book Holds a Universe..png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="./assets/cloud library Public Library.png" class="d-block w-100" alt="...">
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
               name="search"><i class="bi bi-search"><img src="./assets/icon kategori/search (3).svg" alt=""
                     srcset=""></i></button>
         </div>
      </form>


      <form action="" method="post" class="kategori">
         <i class="item-kategori">
            <label for="semua"><img src="./assets/icon kategori/Desain_tanpa_judul__2_-removebg-preview (1).png" alt=""
                  class="rounded"></label>
            <button id="semua" class="btn btn-outline-primary tombol" type="submit">Semua</button>
         </i>
         <i class="item-kategori">
            <label for="informatika"><img src="./assets/icon kategori/Desain_tanpa_judul__3_-removebg-preview.png"
                  alt="" class="rounded"></label>
            <button type="submit" id="informatika" name="informatika"
               class="btn btn-outline-primary tombol">Informatika</button>
         </i><i class="item-kategori">
            <label for="bisnis"><img src="./assets/icon kategori/Desain_tanpa_judul__4_-removebg-preview.png" alt=""
                  class="rounded"></label>
            <button type="submit" id="bisnis" name="bisnis" class="btn btn-outline-primary tombol">Bisnis</button>
         </i><i class="item-kategori">
            <label for="filsafat"><img src="./assets/icon kategori/Desain_tanpa_judul__6_-removebg-preview.png" alt=""
                  class="rounded"></label>
            <button type="submit" id="filsafat" name="filsafat" class="btn btn-outline-primary tombol">Filsafat</button>
         </i><i class="item-kategori">
            <label for="novel"><img src="./assets/icon kategori/Desain_tanpa_judul__4_-removebg-preview.png" alt=""
                  class="rounded"></label>
            <button type="submit" id="novel" name="novel" class="btn btn-outline-primary tombol">Novel</button>
         </i><i class="item-kategori">
            <label for="sains"><img src="./assets/icon kategori/Desain_tanpa_judul__2_-removebg-preview (1).png" alt=""
                  class="rounded"></label>
            <button type="submit" id="sains" name="sains" class="btn btn-outline-primary tombol">Sains</button>
         </i>
      </form>




      <!--Card buku-->
      <div class="layout-card-custom">
         <?php foreach ($buku as $item) : ?>
         <div class="card" style="width: 10rem;">
            <a href="sign/member/sign_in.php"><img src="imgDB/<?= $item["cover"]; ?>" class="card-img-top"
                  alt="coverBuku" height="200px"></a>
            <div class="card-body">
               <h6 class="card-title"><?= $item["judul"]; ?></h6>
            </div>
            <ul class="list-group list-group-flush">
               <li class="list-group-item">Kategori : <?= $item["kategori"]; ?></li>
            </ul>
         </div>
         <?php endforeach; ?>
      </div>
   </div>
   </section>

   <section class="bg-body-secondary p-5" id="aboutSection">
      <div class="row">
         <div class="d-flex">
            <h2 class="text-primary">Cari Buku Disini!</h2>
         </div>
      </div>
      </div>
      <div class="d-flex justify-content-center">
         <h3 class="text-secondary">Dikembangkan Oleh :</h3>
      </div>

      <div class="d-flex justify-content-center flex-wrap gap-4 mt-4">
         <div class="card border-info mb-3" style="max-width: 18rem;">
            <div class="card-header">Regatama</div>
            <div class="card-body">
               <h5 class="card-title">Student At SMK Madya Depok</h5>
            </div>
         </div>
      </div>
   </section>

   <footer id="footer" class="p-3 bg-dark">
      <div class="row">
         <div class="col">
            <img src="assets/logoFooter.png" width="200px">
         </div>
      </div>
      <div class="row p-3">
         <div class="col mt-3">
            <h3 class="text-light fs-5">Alamat</h3>
            <p class="text-secondary fs-6">JL Lewinanggung</p>
         </div>
         <hr class="text-light mt-3">
         <div class="d-flex justify-content-center gap-4">
            <a href="" class="fs-3"><i class="fa-brands fa-github"></i></a>
            <a href="" class="fs-3"><i class="fa-brands fa-telegram"></i></a>
            <a href="" class="fs-3"><i class="fa-brands fa-instagram"></i></a>
         </div>
         <div class="d-flex justify-content-center align-items-center mt-3">
            <p class="text-light">Made width ❤️ <a href="" class="text-decoration-none"> Regatama</a> 2023</p>
         </div>
      </div>
   </footer>

   <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>