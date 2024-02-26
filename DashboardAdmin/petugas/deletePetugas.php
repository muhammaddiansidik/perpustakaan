<?php
require "../../config/config.php";
$id = $_GET['id'];
if (deletePetugas($id) > 0) {
   echo "<script>
    alert('Admin berhasil dihapus!');
    document.location.href = 'daftarPetugas.php';
    </script>";
} else {
   echo "<script>
    alert('Admin gagal dihapus!');
    document.location.href = 'daftarPetugas.php';
    </script>";
}