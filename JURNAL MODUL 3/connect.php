<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
    $koneksi= mysqli_connect("localhost", "root", "", "modul3_wad");
// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if ($koneksi){
    echo"<script>alert('Koneksi Telah Berhasil')</script>";
}else{
    echo"<script>alert('Koneksi Gagal Dibuat')</script>";
}
// 
?>