<!-- Pada file ini kalian membuat coding untuk logika create / menambahkan mobil pada showroom -->

<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include("connect.php");

// 

// (2) Buatlah perkondisian untuk memeriksa apakah permintaan saat ini menggunakan metode POST
if ($_SERVER["REQUEST METHOD"] == "POST") {
    echo "<script>alert('Lanjut')</script>";
}else{
    echo "<script>alert('Error')</script>";
}
// 

// (3) Jika sudah coba deh kalian ambil data dari form (CLUE : pakai POST)

    // a. Ambil data nama mobil
    $nama_mobil = $_POST['nama_mobil'];

    // b. Ambil data brand mobil
    $brand_mobil = $_POST['brand_mobil'];

    // c. Ambil data warna mobil
    $warna_mobil = $_POST['warna_mobil'];

    // d. Ambil data tipe mobil
    $tipe_mobil = $_POST['tipe_mobil'];

    // e. Ambil data harga mobil
    $harga_mobil = $_POST['harga_mobil'];

    // (4) Kalau sudah, kita lanjut Query / Menambahkan data pada SQL (Disini ada perintah untuk SQL), Masukkan ke tabel showroom_mobil (include setiap nama column)
    $statement = "INSERT INTO showroom_mobil (nama_mobil, brand_mobil, warna_mobil, tipe_mobil, harga_mobil) VALUES ('$nama_mobil', '$brand_mobil', '$warna_mobil', '$tipe_mobil', '$harga_mobil')";

    // (5) Buatkan kondisi jika eksekusi query berhasil
if ($_QUERY){
    echo "Data Berhasil Ditambahkan";
}
    // (6) Jika terdapat kesalahan, buatkan eksekusi query gagalnya 
else{
    echo "Error";
}

// (7) Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($koneksi);
?>