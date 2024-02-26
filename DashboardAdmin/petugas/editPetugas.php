<?php
require '../../config/config.php';
$id = $_GET['id'];
if (isset($_POST["tombol"])) {
   if (editPetugas($_POST, $id) > 0) {
      header('location: ./daftarPetugas.php');
   } else {
      echo "<script>
    alert('Gagal update petugas!');
    </script>";
   }
}
$admin = queryReadData("SELECT * FROM admin WHERE id=$id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
   <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
   <title>Edit Petugas</title>
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
         <h1 class="pt-5 text-center fw-bold">Edit Petugas</h1>
         <hr />
         <form action="" method="post" class="row g-3 p-4 needs-validation" novalidate>
            <?php foreach ($admin as $item) : ?>
            <label for="validationCustom01" class="form-label">Nama</label>
            <div class="input-group mt-0">
               <input type="text" class="form-control" name="nama" value="<?= $item['nama_admin']; ?>"
                  id="validationCustom01" required />
               <div class="invalid-feedback">Masukkan Nama anda!</div>
            </div>
            <label for="validationCustom02" class="form-label">Password</label>
            <div class="input-group mt-0">
               <input type="password" class="form-control" value="<?= $item['password']; ?>" id="validationCustom02"
                  name="password" required />
               <div class="invalid-feedback">Masukkan Password anda!</div>
            </div>
            <label for="validationCustom02" class="form-label">Kode Petugas</label>
            <div class="input-group mt-0">
               <input type="number" class="form-control" id="validationCustom02" value="<?= $item['kode_admin']; ?>"
                  name="kode_petugas" required />
               <div class="invalid-feedback">Masukkan kode petugas anda!</div>
            </div>
            <label for="validationCustom02" class="form-label">Nomor Telepon</label>
            <div class="input-group mt-0">
               <input type="text" class="form-control" id="validationCustom02" value="<?= $item['no_tlp']; ?>"
                  name="no_tlp" required />
               <div class="invalid-feedback">Masukkan kode nomor telepon anda!</div>
            </div>
            <div class="input-group mt-3">
               <select name="role" class="form-select" aria-label="Default select example">
                  <option selected>Pilih Role</option>
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
               </select>
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
      <?php if (isset($error)) : ?>
      <div class="alert alert-danger mt-2" role="alert">
         Nama atau Password Salah!
      </div>
      <?php endif; ?>
   </div>

   <script>
   // Example starter JavaScript for disabling form submissions if there are invalid fields
   (() => {
      "use strict";

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll(".needs-validation");

      // Loop over them and prevent submission
      Array.from(forms).forEach((form) => {
         form.addEventListener(
            "submit",
            (event) => {
               if (!form.checkValidity()) {
                  event.preventDefault();
                  event.stopPropagation();
               }

               form.classList.add("was-validated");
            },
            false
         );
      });
   })();
   </script>
   <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>