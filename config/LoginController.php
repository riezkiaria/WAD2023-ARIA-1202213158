<?php

require 'connect.php';

// function untuk melakukan login
function login($input) {

    // (1) Panggil variabel global $db dari file config
    global $connect;
    // 

    // (2) Ambil nilai input dari form login
        // a. Ambil nilai input email
        // b. Ambil nilai input password
    $email = $input['email'];
    $password = $input['password'];       
    // 

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    // 

    // (4) Buatlah perkondisian ketika email ditemukan ( gunakan mysqli_num_rows == 1 )
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        if (password_verify($password, $data["password"])) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $data['id'];


            if (isset($input['remember'])) {
                setcookie('id', $data['id'], time() + 3600);
            }
            
        } else {
            $_SESSION['message'] = "Password Salah!";
            $_SESSION['color'] = 'danger';
        }
    }
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        
        // 

        // b. Lakukan verifikasi password menggunakan fungsi password_verify
            // c. Set variabel session dengan key login untuk menyimpan status login
            // d. Set variabel session dengan key id untuk menyimpan id user
            // e. Buat kondisi untuk mengecek apakah checkbox "remember me" terisi kemudian set cookie dan isi dengan id
        // f. Buat kondisi else dan isi dengan variabel session dengan key message untuk meanmpilkan pesan error ketika password tidak sesuai
    // (5) Buat kondisi else, kemudian di dalamnya
else{
    $_SESSION['message'] = "Email Tidak Ditemukan!";
    $_SESSION['color'] = 'danger';
}    //     Buat variabel session dengan key message untuk menampilkan pesan error ketika email tidak ditemukan
} 


// 

// function untuk fitur "Remember Me"
function rememberMe($cookie)
{
    // (6) Panggil variabel global $db dari file config
    global $connect;
    // 

    // (7) Ambil nilai cookie yang ada
    $id = $_COOKIE['id']; 

    // (8) Buat dan lakukan query untuk mencari data dengan id yang sama
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    // 

    // (9) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc


        // b. Set variabel session dengan key login untuk menyimpan status login
        
        // c. Set variabel session dengan key id untuk menyimpan id user

    }
       
        
    
    // 
}
// 

?>