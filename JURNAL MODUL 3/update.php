<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include("connect.php");

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM showroom_mobil WHERE id = '$id'");

    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter

        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        if(isset($_POST['update'])){
            $id = $id;
            $nama_mobil = $POST['$nama_mobil'];
            $brand_mobil = $POST['$brand_mobil'];
            $warna_mobil = $POST['$warna_mobil'];
            $tipe_mobil = $POST['$tipe_mobil'];
            $harga_mobil = $POST['$harga_mobil'];
        }
        
        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $statement = "UPDATE showroom_mobil SET nama_mobil='nama_mobil', brand_mobil='brand_mobil', warna_mobil='warna_mobil', tipe_mobil='tipe_mobil', harga_mobil='harga_mobil' WHERE id = $id"; 

        // Eksekusi perintah SQL
        $query = mysql_query($statement, $koneksi)

        // Buatkan kondisi jika eksekusi query berhasil

        if(mysqli_query($connect,$update)){
            echo "<script>
            alert('Data berhasil diubah !');
            document.location.href = 'list_mobil.php';
        </script>";

        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        }else{
            echo "<script>
            alert('Data gagal diubah !');
            document.location.href = 'list_mobil.php';
        </script>";
        }

    }
    // Panggil fungsi update dengan data yang sesuai

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($connect);
}
?>